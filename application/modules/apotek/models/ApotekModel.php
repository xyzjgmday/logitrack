<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model ApotekModel
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @param     ...
 * @return    ...
 *
 */

class ApotekModel extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function tableName()
  {
    return $name = ' drugs';
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

    $kd_obat = $this->input->post('kd_obat', TRUE);
    $nama_obat = $this->input->post('nama_obat', TRUE);
    $stok = $this->input->post('qty', TRUE);
    $harga = $this->input->post('harga', TRUE);

    $data = array(
      'nama_obat' => ucwords($nama_obat),
      'kode' => (!$kd_obat) ? $id : $kd_obat,
      'harga' => $harga,
      'qty' => $stok,
      'status' => 1,
      'created_at' => date('Y-m-d H:i:s')
    );

    $clean_array = array_map('strip_tags', $data);

    switch ($input_mode) {
      case 'insert':
        $this->db->insert($this->tableName(), $clean_array);
        return true;

      case 'update':
        $this->db->where(array('kode' => $id));
        $this->db->update($this->tableName(), $clean_array);
        return true;
    }
  }

  function filter_data($id)
  {
    return $this->db->get_where($this->tableName(), array('kode' => $id))->row();
  }

  public function getDrugs($term)
  {
    $this->db->like('nama_obat', $term);
    $query = $this->db->get($this->tableName());
    return $query->result_array();
  }

  // ------------------------------------------------------------------------

}

/* End of file ApotekModel.php */
/* Location: ./application/models/ApotekModel.php */