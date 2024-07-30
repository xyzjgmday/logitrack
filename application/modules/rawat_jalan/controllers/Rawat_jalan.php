<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Rawat_jalan
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @param     ...
 * @return    ...
 *
 */

class Rawat_jalan extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth->cek_auth();
    $this->load->model('PendaftaranRajalModel');
    $this->load->model('master/PolyclinicsModel');
    $this->load->model('master/PractitionerModel');
  }

  function index_general($params = null)
  {
    switch ($params) {
      case 'waiting':
        $tab_active = "#m_tabs_3_2";
        break;

      case 'done':
        $tab_active = "#m_tabs_3_3";
        break;

      case 'cancel':
        $tab_active = "#m_tabs_3_4";
        break;

      default:
        $tab_active = "#m_tabs_3_1";
        break;
    }

    $data = [
      'title' => "Rawat Jalan - Poli Umum",
      'url' => base_url() . 'appointment/registration',
      'url_tabs' => base_url() . 'appointment/general',
      'tabs' => $tab_active,
      'var' => '<script src="' . base_url() . 'assets/app/js/module/rawat-jalan/table-rajal.js?v=' . time() . '"></script>'
    ];

    $this->layout->utama('rawat_jalan', $data, 'rawat_jalan');
  }

  public function index_dentistry($params = null)
  {
    switch ($params) {
      case 'waiting':
        $tab_active = "#m_tabs_3_2";
        break;

      case 'done':
        $tab_active = "#m_tabs_3_3";
        break;

      case 'cancel':
        $tab_active = "#m_tabs_3_4";
        break;

      default:
        $tab_active = "#m_tabs_3_1";
        break;
    }

    $data = [
      'title' => "Rawat Jalan - Poli Gigi",
      'url' => base_url() . 'appointment/registration',
      'url_tabs' => base_url() . 'appointment/dentistry',
      'tabs' => $tab_active,
      'var' => '<script src="' . base_url() . 'assets/app/js/module/rawat-jalan/table-rajal.js?v=' . time() . '"></script>'
    ];

    $this->layout->utama('rawat_jalan', $data, 'rawat_jalan');
  }

  function viewlist($params, $status = null)
  {
    $id = ($params === "general") ? 1 : 2;
    header("Content-Type: application/json");
    $result = $this->PendaftaranRajalModel->getData($id, $status);
    $json_data = json_encode(['data' => $result]);

    echo $json_data;
  }

  function registration()
  {
    $get_id = $this->PendaftaranRajalModel->get_last_id();
    $get_poli = $this->PolyclinicsModel->getData(1);
    $get_nakes = $this->PractitionerModel->getData();
    $get_no_antrian = $this->PendaftaranRajalModel->generate_no_antrian(date('Y-m-d'), $get_id);

    $data = array(
      'title' => 'Registrasi Rawat Jalan',
      'url' => base_url() . 'rawat_jalan/insert_data',
      'poli' => $get_poli,
      'nakes' => $get_nakes,
      'antrian' => $get_no_antrian,
      'var' => '<script src="' . base_url() . 'assets/app/js/module/rawat-jalan/form-rajal.js?v=' . time() . '"></script>'
    );

    $this->layout->utama('InputRegistrasi', $data, 'rawat_jalan');
  }

  function change($id)
  {
    $this->session->set_userdata('ses_decode', $id);

    $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
    $get_religi = $this->db->select('*')->from('religions')->get();
    $get_work = $this->db->select('*')->from('occupations')->get();

    $data = array(
      'title' => 'Ubah Data Rawat_jalan',
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
    $data = $this->PendaftaranRajalModel->save_data();

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
      $deleted = $this->db->delete($this->PasienModel->tableName());

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

  public function check_nik()
  {
    $nik = $this->input->post('nik');

    $this->db->where('nik', $nik);
    $query = $this->db->get('patients');
    $exists = $query->num_rows() > 0;

    echo json_encode(['exists' => $exists]);
  }

}


/* End of file Rawat_jalan.php */
/* Location: ./application/controllers/Rawat_jalan.php */