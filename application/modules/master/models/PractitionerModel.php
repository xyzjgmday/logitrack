<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model PractitionerModel
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @param     ...
 * @return    ...
 *
 */

class PractitionerModel extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function tableName()
  {
    return $name = ' practitioner';
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  function getData()
  {
    $results = array();
    $query = $this->db->query("SELECT a.id, a.nama_nakes, a.role, a.status, b.nama_poli FROM practitioner a INNER JOIN clinics b ON a.poli_id = b.id");
    if ($query->num_rows() > 0) {
      $results = $query->result();
    }
    return $results;
  }

  function save_data($updated = false, $id = '')
  {
    $this->load->library('form_validation');

    $poli_id = $this->input->post('poli_id', TRUE);
    $nama_nakes = $this->input->post('nama_nakes', TRUE);
    $role = $this->input->post('role', TRUE);
    $no_telp = $this->input->post('no_telp', TRUE);
    $provinsi_id = $this->input->post('prov', TRUE);
    $kota_id = $this->input->post('kab', TRUE);
    $kecamatan_id = $this->input->post('kec', TRUE);
    $desa_id = $this->input->post('des', TRUE);
    $alamat = $this->input->post('alamat', TRUE);
    $experience = $this->input->post('experience', TRUE);
    $edu = $this->input->post('edu', TRUE);
    $institution = $this->input->post('institution', TRUE);
    $graduation_year = $this->input->post('graduation_year', TRUE);
    $no_str = $this->input->post('no_str', TRUE);
    $sip = $this->input->post('sip', TRUE);
    $note = $this->input->post('note', TRUE);

    $data = array(
      'poli_id' => $poli_id,
      'nama_nakes' => ucwords($nama_nakes),
      'role' => $role,
      'no_telp' => $no_telp,
      'provinsi_id' => $provinsi_id,
      'kota_id' => $kota_id,
      'kecamatan_id' => $kecamatan_id,
      'desa_id' => $desa_id,
      'alamat' => $alamat,
      'experience' => $experience,
      'education_id' => $edu,
      'institution' => $institution,
      'graduation_year' => $graduation_year,
      'no_str' => $no_str,
      'sip' => $sip,
      'note' => $note,
      'created_at' => date('Y-m-d H:i:s'),
      'status' => 1
    );

    $clean_array = array_map('strip_tags', $data);

    switch ($updated) {
      case true:
        $this->db->where('id', $id);
        $this->db->update($this->tableName(), $clean_array);
        return true;
      default:
        $this->db->insert($this->tableName(), $clean_array);
        return true;
    }
  }

  function filter_data($id)
  {
    return $this->db->get_where($this->tableName(), array('id' => $id))->row();
  }

  // ------------------------------------------------------------------------

}

/* End of file PractitionerModel.php */
/* Location: ./application/models/PractitionerModel.php */