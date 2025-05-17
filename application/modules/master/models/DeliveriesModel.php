<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model DeliveriesModel
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @param     ...
 * @return    ...
 *
 */

class DeliveriesModel extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function tableName()
  {
    return $name = ' deliveries';
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

    $nama_lay = $this->input->post('nama_lay', TRUE);
    $type_layanan = $this->input->post('type_layanan', TRUE);
    $harga = $this->input->post('harga', TRUE);
    $poli_id = $this->input->post('poli', TRUE);

    $data = array(
      'name' => ucwords($nama_lay),
      'type_layanan' => $type_layanan,
      'harga' => $harga,
      'clinic_id' => $poli_id,
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

/* End of file DeliveriesModel.php */
/* Location: ./application/models/DeliveriesModel.php */