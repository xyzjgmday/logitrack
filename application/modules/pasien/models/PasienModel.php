<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model PasienModel
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @param     ...
 * @return    ...
 *
 */

class PasienModel extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function tableName()
  {
    return $name = ' patients';
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  function getData()
  {
    $results = array();
    $query = $this->db->query("SELECT id, mrn, nik, nama, tempat_lahir, tanggal_lahir, jenis_kelamin FROM" . $this->tableName());
    if ($query->num_rows() > 0) {
      $results = $query->result();
    }
    return $results;
  }

  function getSystemStatus()
  {
    $results = array();
    $query = $this->db->query("SELECT System_Status as name FROM dataproduksi GROUP BY System_status");
    if ($query->num_rows() > 0) {
      $results = $query->result();
    }
    return $results;
  }

  private function get_or_insert_job($job_name)
  {
    $job_name = strip_tags($job_name);

    $this->db->select('id');
    $this->db->from('occupations');
    $this->db->where('occupation_name', $job_name);
    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      return $query->row()->id;
    } else {
      $data = array(
        'occupation_name' => $job_name,
        'created_at' => date('Y-m-d H:i:s')
      );
      $this->db->insert('occupations', $data);
      return $this->db->insert_id();
    }
  }

  private function generate_mr_number()
  {
    $today = date('ymd');

    $this->db->like('created_at', date('Y-m-d'), 'after');
    $this->db->from($this->tableName());
    $count = $this->db->count_all_results();
    $new_count = $count + 1;

    $mr_number = "MRN" . $today . str_pad($new_count, 4, '0', STR_PAD_LEFT);
    return $mr_number;
  }


  function save_data($updated = false, $id = '')
  {
    $this->load->library('form_validation');
    $data = array(
      'nik' => $this->input->post('nik', TRUE),
      'bpjs' => $this->input->post('bpjs', TRUE),
      'nama' => $this->input->post('name', TRUE),
      'tempat_lahir' => $this->input->post('tmp_lahir', TRUE),
      'tanggal_lahir' => $this->input->post('tgl_lahir', TRUE),
      'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
      'gol_darah' => $this->input->post('gol_darah', TRUE),
      'alamat' => $this->input->post('alamat', TRUE),
      'provinsi_id' => $this->input->post('prov', TRUE),
      'kota_id' => $this->input->post('kab', TRUE),
      'kecamatan_id' => $this->input->post('kec', TRUE),
      'desa_id' => $this->input->post('des', TRUE),
      'agama_id' => $this->input->post('agama', TRUE),
      'status_pernikahan' => $this->input->post('stat_kawin', TRUE),
      'created_at' => date('Y-m-d H:i:s')
    );

    if (!$updated) {
      $data['mrn'] = $this->generate_mr_number();
    }

    $job_name = $this->input->post('job', TRUE);
    $data['occupation_id'] = $this->get_or_insert_job($job_name);

    $clean_array = array_map('strip_tags', $data);

    switch ($updated) {
      case true:
        $this->db->where(array('id' => $id));
        $this->db->update($this->tableName(), $clean_array);
        return true;
      default:
        $this->db->insert($this->tableName(), $clean_array);
        return true;
    }
  }

  function filter_data($id)
  {
    return $this->db->select('a.*, b.occupation_name')
      ->from('patients as a')
      ->join('occupations as b', 'a.occupation_id = b.id', 'inner')
      ->where('a.id', $id)
      ->get()->row();
  }

  public function get_patients_by_name($term)
  {
    $this->db->like('a.nama', $term);
    $this->db->select('
        a.id, 
        a.nama, 
        a.tanggal_lahir as tgl_lahir, 
        a.mrn, 
        a.nik, 
        a.jenis_kelamin, 
        CONCAT(a.alamat, ", ", b.nama, ", ", c.nama, ", ", d.nama, ", ", e.nama) as alamat_lengkap
    ');
    $this->db->from($this->tableName() . ' as a');
    $this->db->join('wilayah_desa as b', 'a.desa_id = b.id', 'inner');
    $this->db->join('wilayah_kecamatan as c', 'a.kecamatan_id = c.id', 'inner');
    $this->db->join('wilayah_kabupaten as d', 'a.kota_id = d.id', 'inner');
    $this->db->join('wilayah_provinsi as e', 'a.provinsi_id = e.id', 'inner');
    $query = $this->db->get();
    return $query->result_array();
  }

  // ------------------------------------------------------------------------

}

/* End of file PasienModel.php */
/* Location: ./application/models/PasienModel.php */