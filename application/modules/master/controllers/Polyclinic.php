<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Polyclinic
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @param     ...
 * @return    ...
 *
 */

class Polyclinic extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth->cek_auth();
    $this->load->model('PolyclinicsModel');
  }

  public function index()
  {
    $data = [
      'title' => "Data Polyclinic",
      'url' => base_url() . 'master/polyclinic/insert',
      'var' => '<script src="' . base_url() . 'assets/app/js/module/master/table-poli.js?v=' . time() . '"></script>'
    ];

    $this->layout->utama('polyclinic/poli', $data, 'master', 'poli');
  }

  function viewlist()
  {
    header("Content-Type: application/json");
    $result = $this->PolyclinicsModel->getData();
    $json_data = json_encode(['data' => $result]);

    echo $json_data;
  }

  function insert()
  {
    $data = array(
      'title' => 'Tambah Poliklinik',
      'url' => base_url() . 'master/polyclinic/insert_data',
      'var' => '<script src="' . base_url() . 'assets/app/js/module/master/input-poli.js?v=' . time() . '"></script>'
    );

    $this->layout->utama('polyclinic/InputPolyclinic', $data, 'master', 'user');
  }

  function change($id)
  {
    $this->session->set_flashdata('ses_decode', $id);

    $data = array(
      'title' => 'Ubah Data',
      'url' => base_url() . 'master/polyclinic/update_data',
      'var' => '<script src="' . base_url() . 'assets/app/js/module/master/input-poli.js?v=' . time() . '"></script>',
      'hasil' => $this->PolyclinicsModel->filter_data($id)
    );
    $this->layout->utama('polyclinic/UpdatePoli', $data, 'master', 'user');
  }

  function insert_data()
  {
    $input_mode = 'insert';
    $data = $this->PolyclinicsModel->save_data($input_mode);

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
    $data = $this->PolyclinicsModel->save_data($input_mode, $id);

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
      $deleted = $this->db->update($this->PolyclinicsModel->tableName(), array('status' => 0));

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


/* End of file Polyclinic.php */
/* Location: ./application/controllers/Polyclinic.php */