<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Dashboard_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @param     ...
 * @return    ...
 *
 */

class DashboardModel extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function countProdByMonth($month, $year)
  {
    $this->db->from('dataproduksi');
    $this->db->where("MONTH(STR_TO_DATE(Created_On, '%Y-%m-%d')) = ", $month);
    $this->db->where("YEAR(STR_TO_DATE(Created_On, '%Y-%m-%d')) = ", $year);

    return $this->db->count_all_results();
  }

  public function countDlvByMonth($month, $year)
  {
    $this->db->from('datadelivery');
    $this->db->where('MONTH(Created_on)', $month);
    $this->db->where('YEAR(Created_on)', $year);

    return $this->db->count_all_results();
  }

  public function countPartsByMonth($month, $year)
  {
    $this->db->from('datalean');
    $this->db->where('MONTH(Act_StartTime)', $month);
    $this->db->where('YEAR(Act_StartTime)', $year);

    return $this->db->count_all_results();
  }

  public function countStockByMonth($month, $year)
  {
    $this->db->from('stok');
    $this->db->where('MONTH(Posting_date)', $month);
    $this->db->where('YEAR(Posting_date)', $year);

    return $this->db->count_all_results();
  }

  // ------------------------------------------------------------------------

}

/* End of file Dashboard_model.php */
/* Location: ./application/models/Dashboard_model.php */