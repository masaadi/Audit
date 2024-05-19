<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Seniority_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
        $user_id = $this->session->userdata('DX_user_id');

        $this->db->select('seniority_info.*,office.office_name,designation.designation_name,job_info.employee_name');
        $this->db->from('seniority_info');
        $this->db->join('job_info','job_info.employee_id = seniority_info.employee_id');
        $this->db->join('office','office.id = job_info.current_office');
        $this->db->join('designation','designation.id = job_info.current_desig');
        $this->db->order_by("seniority_info.id", "desc");
		
        if (!empty($params['search']['emp_id'])) {           
            $this->db->like('seniority_info.employee_id', $params['search']['emp_id']);
        }       

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    } 
}