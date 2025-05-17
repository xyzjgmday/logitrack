<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model OutletsModel
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @param     ...
 * @return    ...
 *
 */

class OutletsModel extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function tableName()
  {
    return $name = ' outlets';
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  function getData()
  {
    $results = array();
    $query = $this->db->query("SELECT * FROM" . $this->tableName());
    if ($query->num_rows() > 0) {
      $results = $query->result();
    }
    return $results;
  }

  function save_data($input_mode, $id = '')
  {
    $this->load->library('form_validation');

    $nama_outlets = $this->input->post('nama_outlets', TRUE);
    $no_hp = $this->input->post('no_hp', TRUE);
    $address = $this->input->post('address', TRUE);
    $latitude = $this->input->post('latitude', TRUE);
    $longitude = $this->input->post('longitude', TRUE);

    $data = array(
      'name' => ucwords($nama_outlets),
      'phone' => $no_hp,
      'address' => $address,
      'latitude' => $latitude,
      'longitude' => $longitude,
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

/* End of file OutletsModel.php */
/* Location: ./application/models/OutletsModel.php */