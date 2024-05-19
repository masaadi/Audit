<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Client_reg_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('*');
        $this->db->from('client');
          
        $this->db->order_by("client.id", "desc");
		
		if (!empty($params['search']['company_name'])) {
           
           $this->db->like('client.company_name', $params['search']['company_name']);
           
        }
		
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

	public function checkId($id)
    {
        return $this->db->query("select * from designation where id = " . $id)->result();
    }


}