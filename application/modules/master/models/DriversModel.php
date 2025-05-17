<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model DriversModel
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @param     ...
 * @return    ...
 *
 */

class DriversModel extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function tableName()
  {
    return $name = ' drivers';
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

    $nama_drivers = $this->input->post('nama_drivers', TRUE);
    $no_hp = $this->input->post('no_hp', TRUE);
    $plat_no = $this->input->post('plat_no', TRUE);

    $data = array(
      'name' => ucwords($nama_drivers),
      'phone' => $no_hp,
      'plat_nomor' => $plat_no,
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

/* End of file DriversModel.php */
/* Location: ./application/models/DriversModel.php */