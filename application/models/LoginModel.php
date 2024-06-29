<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Login_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @param     ...
 * @return    ...
 *
 */

class LoginModel extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------

  // ------------------------------------------------------------------------
  function cek_user($username, $password)
  {
    $query = "SELECT
                  a.id, a.username, a.email, a.last_log_date, a.level_id
              FROM
                  users a
              WHERE (a.username = " . $this->db->escape($username) . " OR a.email = " . $this->db->escape($username) . ")";
    $query .= (!empty($password)) ? " AND a.password='$password'" : "";
    return $this->db->query($query)->result_array();
  }

  // ------------------------------------------------------------------------

  function last_log_on($id_cek)
  {
    $data = array(
      'last_log_date' => date('Y-m-d H:i:s')
    );
    $this->db->where(array('id' => $id_cek));
    $this->db->update('users', $data);
  }
}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */