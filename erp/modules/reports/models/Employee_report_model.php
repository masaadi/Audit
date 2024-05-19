<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Employee_report_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
        $user_id = $this->session->userdata('DX_user_id');

        $this->db->select('personal_info.*,office.office_name,designation.designation_name');
        $this->db->from('personal_info');
        $this->db->join('job_info','job_info.employee_id=personal_info.employee_id','left');
        $this->db->join('office','office.id=job_info.current_office','left');
        $this->db->join('designation','designation.id=job_info.current_desig','left');
        $this->db->order_by("personal_info.id", "desc");
		
		if (!empty($params['search']['employee_id'])) {           
            $this->db->like('personal_info.employee_id', $params['search']['employee_id']);
        }
        if (!empty($params['search']['employee_name'])) {           
            $this->db->like('personal_info.employee_name', $params['search']['employee_name']);
        }
        if (!empty($params['search']['designation'])) {           
            $this->db->like('job_info.current_desig', $params['search']['designation']);
        }
        if (!empty($params['search']['office'])) {           
            $this->db->like('job_info.current_office', $params['search']['office']);
        }
        if (!empty($params['search']['gender'])) {           
            $this->db->like('personal_info.gender', $params['search']['gender']);
        }
        if (!empty($params['search']['dob'])) {           
            $this->db->like('personal_info.dob', $params['search']['dob']);
        }
        if (!empty($params['search']['prl_date'])) {           
            $this->db->like('job_info.prl_date', $params['search']['prl_date']);
        }
        if (!empty($params['search']['quota'])) {           
            $this->db->like('job_info.quota', $params['search']['quota']);
        }
        if (!empty($params['search']['marital_status'])) {           
            $this->db->like('personal_info.marital_status', $params['search']['marital_status']);
        }
        if (!empty($params['search']['blood_group'])) {           
            $this->db->like('personal_info.blood_group', $params['search']['blood_group']);
        }
        if (!empty($params['search']['status'])) {           
            $this->db->like('personal_info.status', $params['search']['status']);
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