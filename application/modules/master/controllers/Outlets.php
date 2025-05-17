<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Drivers
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @param     ...
 * @return    ...
 * TODO: Add kolom tindakan
 */

class Outlets extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth->cek_auth();
    $this->load->model('OutletsModel');
  }

  public function index()
  {
    $data = [
      'title' => "Data Outlets",
      'url' => base_url() . 'master/outlets/insert',
      'var' => '<script src="' . base_url() . 'assets/app/js/module/master/table-outlets.js?v=' . time() . '"></script>'
    ];

    $this->layout->utama('outlets/outlets', $data, 'master', 'poli');
  }

  function viewlist()
  {
    header("Content-Type: application/json");
    $result = $this->OutletsModel->getData();
    $json_data = json_encode(['data' => $result]);

    echo $json_data;
  }

  function insert()
  {
    $get_poli = $this->db->select('*')->from('clinics')->get();

    $data = array(
      'title' => 'Buat Layanan',
      'url' => base_url() . 'master/outlets/insert_data',
      'poli' => $get_poli->result(),
      'var' => '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
      <script src="' . base_url() . 'assets/app/js/module/master/input-outlets.js?v=' . time() . '"></script>'
    );

    $this->layout->utama('outlets/InputOutlets', $data, 'master', 'poli');
  }

  function change($id)
  {
    $this->session->set_flashdata('ses_decode', $id);
    $get_poli = $this->db->select('*')->from('clinics')->get();

    $data = array(
      'title' => 'Ubah Data',
      'url' => base_url() . 'master/outlets/update_data',
      'poli' => $get_poli->result(),
      'var' => '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
      <script src="' . base_url() . 'assets/app/js/module/master/input-outlets.js?v=' . time() . '"></script>',
      'hasil' => $this->OutletsModel->filter_data($id)
    );
    $this->layout->utama('outlets/UpdateOutlets', $data, 'master', 'poli');
  }

  function insert_data()
  {
    $input_mode = 'insert';
    $data = $this->OutletsModel->save_data($input_mode);

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
    $data = $this->OutletsModel->save_data($input_mode, $id);

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
      $deleted = $this->db->delete($this->OutletsModel->tableName());

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


/* End of file Outlets.php */
/* Location: ./application/controllers/Drivers.php */