<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model ServicesModel
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @param     ...
 * @return    ...
 *
 */

class ServicesModel extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function tableName()
  {
    return $name = ' services';
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

    $username = $this->input->post('username', TRUE);
    $email = $this->input->post('email', TRUE);
    $password = $this->input->post('password', TRUE);
    $level_id = $this->input->post('idLevels', TRUE);

    $data = array(
      'username' => $username,
      'email' => $email,
      'password' => md5($password . $this->config->item('key_login')),
      'level_id' => $level_id,
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

/* End of file ServicesModel.php */
/* Location: ./application/models/ServicesModel.php */