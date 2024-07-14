<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Services
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @param     ...
 * @return    ...
 *
 */

class Services extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth->cek_auth();
    $this->load->model('ServicesModel');
  }

  public function index()
  {
    $data = [
      'title' => "Data Services",
      'url' => base_url() . 'master/services/insert',
      'var' => '<script src="' . base_url() . 'assets/app/js/module/master/table-service.js?v=' . time() . '"></script>'
    ];

    $this->layout->utama('services/services', $data, 'master', 'poli');
  }

  function viewlist()
  {
    header("Content-Type: application/json");
    $result = $this->ServicesModel->getData();
    $json_data = json_encode(['data' => $result]);

    echo $json_data;
  }

  function insert()
  {
    $get_poli = $this->db->select('*')->from('clinics')->get();

    $data = array(
      'title' => 'Buat Layanan',
      'url' => base_url() . 'master/services/insert_data',
      'poli' => $get_poli->result(),
      'var' => '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
      <script src="' . base_url() . 'assets/app/js/module/master/input-service.js?v=' . time() . '"></script>'
    );

    $this->layout->utama('services/InputService', $data, 'master', 'poli');
  }

  function change($id)
  {
    $this->session->set_flashdata('ses_decode', $id);
    $get_poli = $this->db->select('*')->from('clinics')->get();

    $data = array(
      'title' => 'Ubah Data',
      'url' => base_url() . 'master/services/update_data',
      'poli' => $get_poli->result(),
      'var' => '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
      <script src="' . base_url() . 'assets/app/js/module/master/input-service.js?v=' . time() . '"></script>',
      'hasil' => $this->ServicesModel->filter_data($id)
    );
    $this->layout->utama('services/UpdateService', $data, 'master', 'poli');
  }

  function insert_data()
  {
    $input_mode = 'insert';
    $data = $this->ServicesModel->save_data($input_mode);

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
    $data = $this->ServicesModel->save_data($input_mode, $id);

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
      $this->db->where('Order', $id);
      $deleted = $this->db->delete($this->ServicesModel->tableName());

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


/* End of file Services.php */
/* Location: ./application/controllers/Services.php */