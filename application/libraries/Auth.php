<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
    public function cek_auth()
    {
        $this->ci =& get_instance();
        $this->sesi = $this->ci->session->userdata('isLogin');
        if ($this->sesi != TRUE) {
            redirect('login', 'refresh');
            exit();
        }
    }
}