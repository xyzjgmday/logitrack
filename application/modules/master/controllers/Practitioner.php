<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Practitioner
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @param     ...
 * @return    ...
 *
 */

class Practitioner extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth->cek_auth();
    $this->load->model('PractitionerModel');
  }

  public function index()
  {
    $data = [
      'title' => "Data Tenaga Medis",
      'url' => base_url() . 'master/practitioner/insert',
      'var' => '<script src="' . base_url() . 'assets/app/js/module/master/table-nakes.js?v=' . time() . '"></script>'
    ];

    $this->layout->utama('practitioner/nakes', $data, 'master', 'poli');
  }

  function viewlist()
  {
    header("Content-Type: application/json");
    $result = $this->PractitionerModel->getData();
    $json_data = json_encode(['data' => $result]);

    echo $json_data;
  }

  function insert()
  {
    $get_edu = $this->db->select('*')->from('education_levels')->get();
    $get_poli = $this->db->select('*')->from('clinics')->get();
    $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();

    $data = array(
      'title' => 'Tambah Tenaga Kesehatan',
      'url' => base_url() . 'master/practitioner/insert_data',
      'edu' => $get_edu->result(),
      'poli' => $get_poli->result(),
      'provinsi' => $get_prov->result(),
      'var' => '<script src="' . base_url() . 'assets/app/js/module/master/input-nakes.js?v=' . time() . '"></script>'
    );

    $this->layout->utama('practitioner/InputNakes', $data, 'master', 'poli');
  }

  function change($id)
  {
    $this->session->set_userdata('ses_decode', $id);

    $get_edu = $this->db->select('*')->from('education_levels')->get();
    $get_poli = $this->db->select('*')->from('clinics')->get();
    $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();

    $data = array(
      'title' => 'Ubah Data',
      'url' => base_url() . 'master/practitioner/update_data',
      'edu' => $get_edu->result(),
      'poli' => $get_poli->result(),
      'provinsi' => $get_prov->result(),
      'var' => '<script src="' . base_url() . 'assets/app/js/module/master/input-nakes.js?v=' . time() . '" type="text/javascript"></script>',
      'results' => $this->PractitionerModel->filter_data($id)
    );
    $this->layout->utama('practitioner/UpdateNakes', $data, 'master', 'poli');
  }

  function insert_data()
  {
    $data = $this->PractitionerModel->save_data();

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
    $id = $this->session->userdata('ses_decode');
    $data = $this->PractitionerModel->save_data(true, $id);
    $this->session->unset_userdata('ses_decode');

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
      $deleted = $this->db->delete($this->PractitionerModel->tableName());

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


/* End of file Practitioner.php */
/* Location: ./application/controllers/Practitioner.php */