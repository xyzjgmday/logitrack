<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model PolyclinicsModel
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @param     ...
 * @return    ...
 *
 */

class PolyclinicsModel extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function tableName()
  {
    return $name = ' clinics';
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  function getData($cat = false, $referer)
  {
    $results = array();
    $query = "SELECT * FROM " . $this->tableName();

    if ($cat) {
      // Pastikan untuk menghindari SQL injection dengan menggunakan parameter binding
      $query .= " WHERE kategori = ? AND id = ? AND status = 1";
      $results = $this->db->query($query, array($cat, $referer))->result();
    } else {
      $results = $this->db->query($query)->result();
    }

    return $results;
  }


  function save_data($input_mode, $id = '')
  {
    $this->load->library('form_validation');

    $nama_poli = $this->input->post('nama_poli', TRUE);
    $kategori = $this->input->post('kategori_poli', TRUE);
    $spesialisasi = $this->input->post('spesialisasi', TRUE);

    $data = array(
      'nama_poli' => ucwords($nama_poli),
      'kategori' => $kategori,
      'spesialisasi' => ucwords($spesialisasi),
      'status' => 1,
      'created_at' => date('Y-m-d H:i:s')
    );

    $clean_array = array_map('strip_tags', $data);

    switch ($input_mode) {
      case 'insert':
        $this->db->insert($this->tableName(), $clean_array);
        return true;

      case 'update':
        $this->db->where(array('id' => $id));
        $this->db->update($this->tableName(), $clean_array);
        return true;
    }
  }

  function filter_data($id)
  {
    return $this->db->get_where($this->tableName(), array('id' => $id))->row();
  }

  // ------------------------------------------------------------------------

}

/* End of file PolyclinicsModel.php */
/* Location: ./application/models/PolyclinicsModel.php */