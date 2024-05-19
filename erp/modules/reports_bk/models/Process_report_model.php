<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Process_report_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
        $user_id = $this->session->userdata('DX_user_id');

        $this->db->select('service_register.*,service_type.service_type,personal_info.employee_name');
        $this->db->from('service_register');
        $this->db->join('personal_info','personal_info.employee_id = service_register.employee_id','left');
        $this->db->join('service_type','service_type.id = service_register.service_type_id','left');
        $this->db->where("service_register.status", "processing");
        $this->db->order_by("service_register.id", "desc");
		
		if (!empty($params['search']['emp_id'])) {           
            $this->db->like('service_register.employee_id', $params['search']['emp_id']);
        }
        if (!empty($params['search']['regi_no'])) {           
            $this->db->like('service_register.registration_id', $params['search']['regi_no']);
        }
        if (!empty($params['search']['service_type'])) {           
            $this->db->like('service_register.service_type_id', $params['search']['service_type']);
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