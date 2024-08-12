<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RemdisModel extends CI_Model
{

  private $tableName = 'initial_assessment';

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  function getData($id, $status)
  {
    $conditional = ($status) ? "a.poli_id = $id AND a.status = '" . $status . "'" : "a.poli_id = $id";

    $results = array();
    $query = $this->db->query("
        SELECT
            a.id,
            a.nama,
            a.mrn,
            a.jenis_kelamin,
            a.no_antrian,
            a.tgl_konsul,
            b.nama_nakes 
        FROM
            pendaftaran_rajal a
            INNER JOIN practitioner b ON a.nakes_id = b.id
        WHERE " . $conditional . " ORDER BY tgl_konsul DESC");

    if ($query->num_rows() > 0) {
      $results = $query->result_array();
      foreach ($results as &$row) {
        $row['tgl_konsul'] = tglIndo($row['tgl_konsul']);
      }
    }
    return $results;
  }


  public function get_last_id()
  {
    $this->db->select('id');
    $this->db->from($this->tableName);
    $this->db->order_by('id', 'DESC');
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->id;
    } else {
      return null; // Jika tidak ada data, kembalikan null atau nilai yang sesuai
    }
  }

  public function save_data($updated = false, $id = '')
  {
    $this->load->library('form_validation');

    $mrn = $this->input->post('mrn', TRUE);

    if (!$this->check_mrn_exists($mrn)) {
      return array('success' => false, 'message' => 'Pasien belum terdaftar.');
    }

    $data = array(
      'mrn' => $mrn,
      'ktp' => $this->input->post('ktp', TRUE),
      'is_pregnant' => $this->input->post('is_pregnant', TRUE),
      'is_lactating' => $this->input->post('is_lactating', TRUE),
      'stat_smoke' => $this->input->post('stat_smoke', TRUE),
      'keluhan_utama' => $this->input->post('keluhan_utama', TRUE),
      'rwt_alegi_obat' => $this->input->post('rwt_alegi_obat', TRUE),
      'suhu_tubuh' => $this->input->post('suhu_tubuh', TRUE),
      'nadi' => $this->input->post('nadi', TRUE),
      'sistole' => $this->input->post('sistole', TRUE),
      'diastole' => $this->input->post('diastole', TRUE),
      'respiratory_rate' => $this->input->post('respiratory_rate', TRUE),
      'tinggiBadan' => $this->input->post('tinggiBadan', TRUE),
      'beratBadan' => $this->input->post('beratBadan', TRUE),
      'imt' => $this->input->post('imt', TRUE),
      'created_at' => date('Y-m-d H:i:s')
    );

    $data['riwayat_penyakit'] = json_encode($this->input->post('riwayat_penyakit', TRUE));

    $clean_array = array_map('strip_tags', $data);

    if ($updated) {
      $this->db->where(array('id' => $id));
      $this->db->update($this->tableName, $clean_array);
      return array('success' => true, 'message' => 'Data updated successfully.');
    } else {
      $this->db->insert($this->tableName, $clean_array);
      return array('success' => true, 'message' => 'Data inserted successfully.');
    }
  }

  private function check_mrn_exists($mrn)
  {
    $this->db->where('mrn', $mrn);
    $query = $this->db->get('pendaftaran_rajal');

    return $query->num_rows() > 0;
  }

  public function generate_no_antrian($tgl_konsul, $registrasi_id)
  {
    $this->db->where('tgl_konsul', $tgl_konsul);
    $this->db->where('poli_id', $registrasi_id);
    $this->db->from($this->tableName);
    $count = $this->db->count_all_results();
    return $count + 1;
  }

  public function get_patient_by_id($id)
  {
    return $this->db->get_where($this->table, array('id' => $id))->row();
  }

  public function get_patient_subjective($mrn = NULL, $status = NULL)
  {
    $this->db->select('a.id, a.mrn, a.nama, a.tanggal_lahir, a.jenis_kelamin, a.gol_darah, b.is_pregnant, b.is_lactating, b.stat_smoke, b.keluhan_utama, b.rwt_alegi_obat, b.riwayat_penyakit');
    $this->db->from('patients AS a');
    $this->db->join('initial_assessment AS b', 'a.mrn = b.mrn', 'inner');

    if ($mrn) {
      $this->db->where('a.mrn', $mrn);
      $query = $this->db->get();
      return $query->row();
    } else {
      $query = $this->db->get();
      return $query->result_array();
    }

  }

  public function check_mrn_init($mrn)
  {
    $today = date('Y-m-d');

    $this->db->where('mrn', $mrn);
    $this->db->where('DATE(created_at)', $today);
    $query = $this->db->get('initial_assessment');

    return $query->num_rows() > 0;
  }
}