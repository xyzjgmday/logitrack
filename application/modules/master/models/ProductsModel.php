<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model ProductsModel
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @param     ...
 * @return    ...
 *
 */

class ProductsModel extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  public function tableName()
  {
    return $name = ' products';
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

    $product_code = $this->input->post('product_code', TRUE);
    $name = $this->input->post('name', TRUE);
    $quantity = $this->input->post('quantity', TRUE);
    $price = $this->input->post('price', TRUE);

    $data = array(
      'product_code' => $product_code,
      'name' => $name,
      'quantity' => $quantity,
      'price' => $price,
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

/* End of file ProductsModel.php */
/* Location: ./application/models/ProductsModel.php */