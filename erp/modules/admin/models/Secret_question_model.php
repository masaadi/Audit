<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Secret_question_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('*');
        $this->db->from('master_secret_ques');
          
        $this->db->order_by("master_secret_ques.id", "desc");
		
		if (!empty($params['search']['div_name'])) {
           
                $this->db->WHERE('master_secret_ques.question', $params['search']['div_name']);
           
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
        return $this->db->query("select * from master_secret_ques where id = " . $id)->result();
    }


}