<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
    }

    function index()
    {
        $session = $this->session->userdata('isLogin');
        if ($session == FALSE) {
            $this->load->view('loginView');
        } else {
            redirect('dashboard');
        }
    }

    function identifier()
    {
        $username = $this->input->post("email-username");
        $password = md5($this->input->post("password") . $this->config->item('key_login'));

        $cek = $this->LoginModel->cek_user($username, $password);
        if (count($cek) == 1) {
            foreach ($cek as $cek) {
                $level_cek = $cek['level_id'];
                $id_cek = $cek['id'];
                $username_cek = $cek['username'];
                $email_cek = $cek['email'];
            }

            $this->session->set_userdata(
                array(
                    'isLogin' => TRUE,
                    's_level_data' => $level_cek,
                    's_id_log' => $id_cek,
                    's_username' => $username_cek,
                    's_email' => $email_cek,
                    'session_key' => ($level_cek == 1 || $level_cek == 3) ? NULL : $this->generateRandomKey()
                )
            );
            $this->LoginModel->last_log_on($id_cek);
            $url = 'dashboard';

        } else {
            $html = '<div class="alert alert-danger" id="myAlert" role="alert">Username / Password salah</div>';
            $url = 'login';
        }
        $this->session->set_flashdata('message', $html);
        redirect(site_url($url));
    }

    function register()
    {
        $session = $this->session->userdata('isLogin');
        if ($session == FALSE) {
            $this->load->view('RegistView');
        } else {
            redirect('dashboard');
        }
    }

    function sign_up()
    {
        $data = $this->LoginModel->save_data();

        if ($data) {
            $response = array('action' => 'success', 'message' => 'Data berhasil disimpan');
        } else {
            $response = array('action' => 'danger', 'message' => 'Email sudah terdaftar!');
        }
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-outline-' . $response['action'] . '" id="myAlert" role="alert">
            ' . $response['message'] . '
              </div>'
        );
        redirect('auth/sign-up');
    }

    // fungsi untuk logout
    function logout()
    {
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }

    function generateRandomKey($length = 32)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomKey = '';
        for ($i = 0; $i < $length; $i++) {
            $randomKey .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomKey;
    }
} // end controller Login