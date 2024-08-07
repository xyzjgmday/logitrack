<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PendaftaranRajalModel extends CI_Model
{

  private $tableName = 'pendaftaran_rajal
  ';

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
            a.status,
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

  public function save_data($input_mode = false, $id = '')
  {
    $this->load->library('form_validation');

    $nama = $this->input->post('nama', TRUE);
    $tgl_lahir = $this->input->post('tgl_lahir', TRUE);
    $mrn = $this->input->post('mrn', TRUE);
    $ktp = $this->input->post('ktp', TRUE);
    $pembiayaan = $this->input->post('pembiayaan', TRUE);
    $jenis_kelamin = $this->input->post('jenis_kelamin', TRUE);
    $no_rjk = $this->input->post('no_rjk', TRUE);
    $poli_id = $this->input->post('poli_id', TRUE);
    $nakes_id = $this->input->post('nakes_id', TRUE);
    $tgl_konsul = date('Y-m-d');
    $no_antrian = $this->generate_no_antrian($tgl_konsul, $poli_id);

    $data = array(
      'nama' => ucwords($nama),
      'tgl_lahir' => $tgl_lahir,
      'mrn' => $mrn,
      'ktp' => $ktp,
      'jenis_kelamin' => $jenis_kelamin,
      'pembiayaan' => $pembiayaan,
      'no_rjk' => $no_rjk,
      'poli_id' => $poli_id,
      'nakes_id' => $nakes_id,
      'tgl_konsul' => $tgl_konsul,
      'no_antrian' => $no_antrian,
      'created_at' => date('Y-m-d H:i:s')
    );

    $clean_array = array_map('strip_tags', $data);

    $this->db->where('mrn', $mrn);
    $this->db->where('DATE(tgl_konsul)', $tgl_konsul);
    $query = $this->db->get($this->tableName);

    if ($query->num_rows() > 0) {
      return array(
        'success' => false,
        'message' => 'MRN already registered today'
      );
    }

    switch ($input_mode) {
      case true:
        $this->db->where(array('id' => $id));
        $this->db->update($this->tableName, $clean_array);
        return array(
          'success' => true,
          'message' => 'Data successfully updated'
        );

      default:
        $this->db->insert($this->tableName, $clean_array);
        return array(
          'success' => true,
          'message' => 'Data successfully inserted'
        );
    }
  }

  public function generate_no_antrian($tgl_konsul, $registrasi_id)
  {
    $this->db->where('tgl_konsul', $tgl_konsul);
    $this->db->where('poli_id', $registrasi_id);
    $this->db->from($this->tableName);
    $count = $this->db->count_all_results();
    return $count + 1;
  }

  private function generate_nomor_kartu()
  {
    return 'KRT' . strtoupper(uniqid());
  }

  public function get_patient_by_id($id)
  {
    return $this->db->get_where($this->table, array('id' => $id))->row();
  }

  public function get_all_patients()
  {
    return $this->db->get($this->table)->result();
  }

  public function delete_patient($id)
  {
    $this->db->where('id', $id);
    $this->db->delete($this->table);
    return $this->db->affected_rows();
  }
}