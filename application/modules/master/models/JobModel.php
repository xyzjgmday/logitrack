<?php
class JobModel extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function tableName()
    {
        return $name = ' occupations';
    }

    public function getJobs($term)
    {
        $this->db->like('occupation_name', $term);
        $query = $this->db->get($this->tableName());
        return $query->result_array();
    }
}
