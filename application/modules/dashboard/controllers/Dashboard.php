<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Dashboard
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller DEFAULT
 * @param     ...
 * @return    ...
 *
 */

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->auth->cek_auth();
  }

  public function index()
  {
    $month = date('m');
    $year = date('Y');
    $data = [
      'title' => "Dashboard",
    ];
    $this->layout->utama('dashboard', $data, 'Dashboard');
  }

}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */