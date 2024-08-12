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
      case 'follow-up':
        $tab_active = "#m_tabs_3_2";
        break;

      default:
        $tab_active = "#m_tabs_3_1";
        break;
    }

    $error = $this->input->get('error');

    $data = [
      'title' => "Rekam Medis",
      'url' => base_url() . 'medical-record/vital-sign',
      'url_tabs' => base_url() . 'medical-record/resume',
      'tabs' => $tab_active,
      'error' => $error,
      'var' => '<script src="' . base_url() . 'assets/app/js/module/medic-record/table-remdik.js?v=' . time() . '"></script>'
    ];

    $this->layout->utama('remdis', $data, 'rekam_medis');
  }

  function viewlist($status = null)
  {
    header("Content-Type: application/json");
    $result = $this->RemdisModel->get_patient_subjective($status);
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

  function create($mrn)
  {
    $get_medhist = $this->db->select('*')->from('medical_history')->get();
    $get_service = $this->db->select('*')->from('services')->get();
    $get_subjective = $this->RemdisModel->get_patient_subjective($mrn);
    $data = array(
      'title' => 'Pemeriksaan Pasien',
      'url' => base_url() . 'rekam_medis/insert_data',
      'medical' => $get_medhist->result(),
      'services' => $get_service->result(),
      'subject' => $get_subjective,
      'riwayat_penyakit_array' => json_decode($get_subjective->riwayat_penyakit, true),
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

  public function submit()
  {
    $mrn = $this->input->post('mrn');
    $nama = $this->input->post('nama');

    if (!$this->RemdisModel->check_mrn_init($mrn)) {
      redirect('medical-record/resume' . '?error=true');
    } else {
      redirect('medical-record/create/' . urlencode($mrn));
    }
  }
}


/* End of file Rekam_medis.php */
/* Location: ./application/controllers/Rekam_medis.php */