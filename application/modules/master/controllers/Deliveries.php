<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Deliveries
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @param     ...
 * @return    ...
 * TODO: Add kolom tindakan
 */

class Deliveries extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth->cek_auth();
    $this->load->model('DeliveriesModel');
  }

  public function index()
  {
    $data = [
      'title' => "Data Deliveries",
      'url' => base_url() . 'master/deliveries/insert',
      'var' => '<script src="' . base_url() . 'assets/app/js/module/master/table-deliveries.js?v=' . time() . '"></script>'
    ];

    $this->layout->utama('deliveries/deliveries', $data, 'master', 'poli');
  }

  function viewlist()
  {
    header("Content-Type: application/json");
    $result = $this->DeliveriesModel->getData();
    $json_data = json_encode(['data' => $result]);

    echo $json_data;
  }

  function insert()
  {
    $get_outlet = $this->db->select('*')->from('outlets')->get();
    $get_sales = $this->db->select('*')->from('sales')->get();
    $get_driver = $this->db->select('*')->from('drivers')->get();

    $data = array(
      'title' => 'Buat Layanan',
      'url' => base_url() . 'master/deliveries/insert_data',
      'outlet' => $get_outlet->result(),
      'sales' => $get_sales->result(),
      'driver' => $get_driver->result(),
      'var' => '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
      <script src="' . base_url() . 'assets/app/js/module/master/input-deliveries.js?v=' . time() . '"></script>'
    );

    $this->layout->utama('deliveries/InputDeliveries', $data, 'master', 'poli');
  }

  function change($id)
  {
    $this->session->set_flashdata('ses_decode', $id);
    $get_poli = $this->db->select('*')->from('clinics')->get();

    $data = array(
      'title' => 'Ubah Data',
      'url' => base_url() . 'master/deliveries/update_data',
      'poli' => $get_poli->result(),
      'var' => '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
      <script src="' . base_url() . 'assets/app/js/module/master/input-deliveries.js?v=' . time() . '"></script>',
      'hasil' => $this->DeliveriesModel->filter_data($id)
    );
    $this->layout->utama('deliveries/UpdateDeliveries', $data, 'master', 'poli');
  }

  function insert_data()
  {
    $input_mode = 'insert';
    $data = $this->DeliveriesModel->save_data($input_mode);

    if ($data) {
      $response = array('success' => true, 'message' => 'Data berhasil disimpan');
    } else {
      $response = array('success' => false, 'message' => 'Gagal menyimpan data');
    }

    header('Content-Type: application/json');
    echo json_encode($response);
  }

  function update_data()
  {
    $input_mode = 'update';
    $id = $this->session->flashdata('ses_decode');
    $data = $this->DeliveriesModel->save_data($input_mode, $id);

    if ($data) {
      $response = array('success' => true, 'message' => 'Data berhasil disimpan');
    } else {
      $response = array('success' => false, 'message' => 'Gagal menyimpan data');
    }

    header('Content-Type: application/json');
    echo json_encode($response);
  }

  public function delete($id)
  {
    if ($id) {
      $this->db->where('id', $id);
      $deleted = $this->db->update($this->DeliveriesModel->tableName(), array('status' => 0));

      if ($deleted) {
        $response = array('success' => true);
      } else {
        $response = array('success' => false);
      }
    } else {
      $response = array('success' => false);
    }

    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode($response));
  }
}


/* End of file Deliveries.php */
/* Location: ./application/controllers/Deliveries.php */