<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Occupations extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('JobModel');
    }

    public function index()
    {
        // $this->load->view('job_view');
    }

    public function getJobs()
    {
        $term = $this->input->get('term');
        $jobs = $this->JobModel->getJobs($term);
        echo json_encode($jobs);
    }
}
