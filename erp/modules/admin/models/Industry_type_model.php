<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Industry_type_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('*');
        $this->db->from('industry_type');
          
        $this->db->order_by("industry_type.id", "desc");
		
		if (!empty($params['search']['t_name'])) {
           
                $this->db->WHERE('industry_type.type_name', $params['search']['t_name']);
                $this->db->or_WHERE('industry_type.type_name_bn', $params['search']['t_name']);

           
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
        return $this->db->query("select * from industry_type where id = " . $id)->result();
    }


}