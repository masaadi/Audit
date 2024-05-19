<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Approval_chain_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
        $user_id = $this->session->userdata('DX_user_id');

        $this->db->select('approval_chain.*,service_type.service_type,count(approval_chain.id) as total');
        $this->db->from('approval_chain');
        $this->db->join('service_type','service_type.id = approval_chain.service_type_id');
        $this->db->order_by("approval_chain.id", "desc");
        $this->db->group_by("approval_chain.service_type_id");
		
		if (!empty($params['search']['service_type'])) {           
            $this->db->like('approval_chain.service_type_id', $params['search']['service_type']);
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