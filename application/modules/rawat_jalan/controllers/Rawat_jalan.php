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
    $this->load->model('pasien/PasienModel');
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
    $get_poli = $this->PolyclinicsModel->getData(1, $this->get_referer());
    $get_nakes = $this->PractitionerModel->getData($this->get_referer());
    $get_no_antrian = $this->PendaftaranRajalModel->generate_no_antrian(date('Y-m-d'), $this->get_referer());

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
    $response = $this->PendaftaranRajalModel->save_data();
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

  public function cetak_kartu($mrn)
  {
    $this->db->where('mrn', $mrn);
    $query = $this->db->get($this->PasienModel->tableName());

    if ($query->num_rows() > 0) {
      $dataPasien = $query->row();

      $nama = $dataPasien->nama;
      $mrn = $dataPasien->mrn;
      $tanggal = date('Y-m-d', strtotime($dataPasien->created_at));

      $data = array(
        'title' => 'Cetak Pasien ' . $nama,
        'nama' => $nama,
        'mrn' => $mrn,
        'tanggal' => tglIndo($tanggal),
      );

      $this->load->view('cetak_kartu', $data);
    } else {
      $data = array(
        'title' => 'Error',
        'message' => 'Data pasien tidak ditemukan.'
      );

      $this->load->view('error_view', $data);
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


/* End of file Rawat_jalan.php */
/* Location: ./application/controllers/Rawat_jalan.php */