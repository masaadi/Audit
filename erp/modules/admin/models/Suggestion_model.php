<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Suggestion_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('suggestion.*,users.full_name,users.mobile');
        $this->db->from('suggestion');
        $this->db->join('users', 'suggestion.user_id=users.id','left');
        $this->db->order_by("suggestion.id", "desc");
		
		if (!empty($params['search']['div_name'])) {
           

            $this->db->like('suggestion.suggestion_content', $params['search']['div_name']);
           
           
        }
		
       

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


    public function singlesuggestion($id)
    {
        $this->db->select('suggestion.*');
        $this->db->from('suggestion');
        $this->db->WHERE('suggestion.id', $id);

        return $this->db->get()->result();
    }

   
	
	
	public function checkId($id)
    {
        return $this->db->query("select * from suggestion where id = " . $id)->result();
    }


}