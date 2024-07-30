<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Pasien
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @param     ...
 * @return    ...
 *
 */

class Pasien extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth->cek_auth();
    $this->load->model('PasienModel');
  }

  public function index()
  {
    $data = [
      'title' => "Data Patients",
      'url' => base_url() . 'patients/insert',
      'var' => '<script src="' . base_url() . 'assets/app/js/module/pasien/table-pasien.js?v=' . time() . '"></script>'
    ];

    $this->layout->utama('pasien', $data, 'pasien');
  }

  function viewlist()
  {
    header("Content-Type: application/json");
    $result = $this->PasienModel->getData();
    $json_data = json_encode(['data' => $result]);

    echo $json_data;
  }

  function insert()
  {
    $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
    $get_religi = $this->db->select('*')->from('religions')->get();
    $get_work = $this->db->select('*')->from('occupations')->get();

    $data = array(
      'title' => 'Tambah Pasien',
      'url' => base_url() . 'patients/insert_data',
      'provinsi' => $get_prov->result(),
      'agama' => $get_religi->result(),
      'kerja' => $get_work->result(),
      'var' => '<script src="' . base_url() . 'assets/app/js/module/pasien/form-pasien.js?v=' . time() . '"></script>'
    );

    $this->layout->utama('InputPasien', $data, 'pasien');
  }

  function change($id)
  {
    $this->session->set_userdata('ses_decode', $id);

    $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
    $get_religi = $this->db->select('*')->from('religions')->get();
    $get_work = $this->db->select('*')->from('occupations')->get();

    $data = array(
      'title' => 'Ubah Data Pasien',
      'url' => base_url() . 'patients/update_data',
      'provinsi' => $get_prov->result(),
      'agama' => $get_religi->result(),
      'kerja' => $get_work->result(),
      'var' => '<script src="' . base_url() . 'assets/app/js/module/pasien/form-pasien.js?v=' . time() . '"></script>',
      'results' => $this->PasienModel->filter_data($id)
    );
    $this->layout->utama('UpdatePasien', $data, 'pasien');
  }

  function insert_data()
  {
    $data = $this->PasienModel->save_data();

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
    $data = $this->PasienModel->save_data(true, $id);
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
      $this->db->where('id', $id);
      $deleted = $this->db->update($this->PasienModel->tableName(), array('status' => 0));

      if ($deleted) {
        $response = array('success' => true);
      } else {
        $response = array('success' => false);
      }
    } else {
      $response = array('success' => false);
    }
  }

  public function check_nik()
  {
    $nik = $this->input->post('nik');

    $this->db->where('nik', $nik);
    $query = $this->db->get('patients');
    $exists = $query->num_rows() > 0;

    echo json_encode(['exists' => $exists]);
  }

  public function get_patients()
  {
    $term = $this->input->get('term');
    $patients = $this->PasienModel->get_patients_by_name($term);
    echo json_encode($patients);
  }


}


/* End of file Pasien.php */
/* Location: ./application/controllers/Pasien.php */