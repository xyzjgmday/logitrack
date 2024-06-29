<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errors extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function permission_denied()
    {
        $this->load->view('errors/html/404');
    }

    public function index()
    {
        $this->output->set_status_header('404');
        $this->load->view('errors/html/404');
    }


}

/* End of file Errors.php */
/* Location: ./application/controllers/Errors.php */