<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Apotek
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @param     ...
 * @return    ...
 */

class Apotek extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth->cek_auth();
    $this->load->model('ApotekModel');
  }

  public function index()
  {
    $data = [
      'title' => "Data Obat",
      'url' => base_url() . 'pharmacy/drugs/insert',
      'var' => '<script src="' . base_url() . 'assets/app/js/module/apotek/table-obat.js?v=' . time() . '"></script>'
    ];

    $this->layout->utama('obat/obat', $data, 'apotek');
  }

  function viewlist()
  {
    header("Content-Type: application/json");
    $result = $this->ApotekModel->getData();
    $json_data = json_encode(['data' => $result]);

    echo $json_data;
  }

  function insert()
  {
    $get_poli = $this->db->select('*')->from('clinics')->get();

    $data = array(
      'title' => 'Tambah Obat',
      'url' => base_url() . 'apotek/insert_data',
      'poli' => $get_poli->result(),
      'var' => '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
      <script src="' . base_url() . 'assets/app/js/module/apotek/input-obat.js?v=' . time() . '"></script>'
    );

    $this->layout->utama('obat/InputObat', $data, 'apotek');
  }

  function change($id)
  {
    $this->session->set_flashdata('ses_decode', $id);

    $data = array(
      'title' => 'Update Obat',
      'url' => base_url() . 'apotek/update_data',
      'var' => '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
            <script src="' . base_url() . 'assets/app/js/module/apotek/input-obat.js?v=' . time() . '"></script>',
      'obat' => $this->ApotekModel->filter_data($id)
    );
    $this->layout->utama('obat/UpdateObat', $data, 'apotek');
  }

  function insert_data()
  {
    $input_mode = 'insert';
    $data = $this->ApotekModel->save_data($input_mode);

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
    $data = $this->ApotekModel->save_data($input_mode, $id);

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
      $deleted = $this->db->update($this->ApotekModel->tableName(), array('status' => 0));

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

  public function get_drugs()
  {
    $term = $this->input->get('term');
    $jobs = $this->ApotekModel->getDrugs($term);
    echo json_encode($jobs);
  }
}


/* End of file Apotek.php */
/* Location: ./application/controllers/Apotek.php */