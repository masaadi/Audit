<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Checklist_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('*');
        $this->db->from('checklist');
          
        $this->db->order_by("checklist.id", "asc");
		
		if (!empty($params['search']['title'])) {
           
                $this->db->like('checklist.title', $params['search']['title']);
				 $this->db->or_like('checklist.title_bn', $params['search']['title']);
           
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
        return $this->db->query("select * from checklist where id = " . $id)->result();
    }


}