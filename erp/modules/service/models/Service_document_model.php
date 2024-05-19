<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Service_document_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
        $user_id = $this->session->userdata('DX_user_id');

        $this->db->select('service_document.*,service_type.service_type');
        $this->db->from('service_document');
        $this->db->join('service_type','service_type.id = service_document.service_type_id');
        $this->db->order_by("service_document.id", "desc");
        $this->db->group_by("service_document.service_type_id");
		
		if (!empty($params['search']['service_type'])) {           
            $this->db->like('service_document.service_type_id', $params['search']['service_type']);
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