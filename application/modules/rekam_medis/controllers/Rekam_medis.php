<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Rekam_medis
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @param     ...
 * @return    ...
 *
 */

class Rekam_medis extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth->cek_auth();
    $this->load->model('RemdisModel');
    $this->load->model('master/PolyclinicsModel');
    $this->load->model('master/PractitionerModel');
  }

  function index($params = null)
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

  function viewlist($params, $status = null)
  {
    $id = ($params === "general") ? 1 : 2;
    header("Content-Type: application/json");
    $result = $this->RemdisModel->getData($id, $status);
    $json_data = json_encode(['data' => $result]);

    echo $json_data;
  }

  function kajian_awal()
  {
    $get_medhist = $this->db->select('*')->from('medical_history')->get();

    $data = array(
      'title' => 'Kajian Awal',
      'url' => base_url() . 'rekam_medis/insert_data',
      'medical' => $get_medhist->result(),
      'var' => '<script src="' . base_url() . 'assets/app/js/module/medic-record/form-kajian-awal.js?v=' . time() . '"></script>'
    );

    $this->layout->utama('input', $data, 'rekam_medis');
  }

  function create()
  {
    $get_medhist = $this->db->select('*')->from('medical_history')->get();

    $data = array(
      'title' => 'Pemeriksaan Pasien',
      'url' => base_url() . 'rekam_medis/insert_data',
      'medical' => $get_medhist->result(),
      'var' => '<script src="' . base_url() . 'assets/app/js/module/medic-record/form-create.js?v=' . time() . '"></script>'
    );

    $this->layout->utama('create', $data, 'rekam_medis');
  }

  function change($id)
  {
    $this->session->set_userdata('ses_decode', $id);

    $get_prov = $this->db->select('*')->from('wilayah_provinsi')->get();
    $get_religi = $this->db->select('*')->from('religions')->get();
    $get_work = $this->db->select('*')->from('occupations')->get();

    $data = array(
      'title' => 'Ubah Data Rekam_medis',
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
    $response = $this->RemdisModel->save_data();
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

  private function get_referer()
  {
    $referer = $this->input->server('HTTP_REFERER');
    $parsed_url = parse_url($referer);
    $path = isset($parsed_url['path']) ? $parsed_url['path'] : '';
    $path_segments = explode('/', trim($path, '/'));
    $last_segment = end($path_segments);

    if ($last_segment === "general") {
      return 1;
    } else {
      return 2;
    }
  }

}


/* End of file Rekam_medis.php */
/* Location: ./application/controllers/Rekam_medis.php */