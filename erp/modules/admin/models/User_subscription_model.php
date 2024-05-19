<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_subscription_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_subscription_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('*');
        $this->db->from('newslatter');
          
        $this->db->order_by("newslatter.id", "desc");
		
		if (!empty($params['search']['subscriber_name'])) {
           
                $this->db->WHERE('newslatter.subscriber_name', $params['search']['subscriber_name']);
           
        }

		if (!empty($params['search']['subscriber_email'])) {
           
            $this->db->WHERE('newslatter.subscriber_email', $params['search']['subscriber_email']);
       
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
        return $this->db->query("select * from newslatter where id = " . $id)->result();
    }


}