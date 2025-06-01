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
    $sql = "SELECT
            sales.sales_name,
            drivers.driver_name,
            outlets.outlet_name,
            outlets.address,
            DATE(deliveries.date) AS delivery_date,
            deliveries.status,
            deliveries.id
          FROM
            sales
            INNER JOIN deliveries ON sales.id = deliveries.sales_id
            INNER JOIN drivers ON drivers.id = deliveries.driver_id
            INNER JOIN outlets ON outlets.id = deliveries.outlet_id
          ORDER BY drivers.driver_name ASC";

    $query = $this->db->query($sql);

    if ($query->num_rows() > 0) {
      $rawResults = $query->result();
      foreach ($rawResults as $row) {
        $row->delivery_date = tglIndo($row->delivery_date);
        $results[] = $row;
      }
    }
    return $results;
  }


  function save_data($input_mode, $id = '')
  {
    $this->load->library('form_validation');

    $outlet_id = $this->input->post('outlet_id', TRUE);
    $sales_id = $this->input->post('sales_id', TRUE);
    $driver_id = $this->input->post('driver_id', TRUE);
    $date = $this->input->post('date', TRUE);

    $data = array(
      'outlet_id' => $outlet_id,
      'sales_id' => $sales_id,
      'driver_id' => $driver_id,
      'date' => $date,
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