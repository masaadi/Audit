<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Review_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('review.*,users.full_name,users.mobile');
        $this->db->from('review');
        $this->db->join('users', 'review.created_by=users.id','left');
        $this->db->order_by("review.id", "desc");
		
		if (!empty($params['search']['div_name'])) {
           

            $this->db->like('review.review_content', $params['search']['div_name']);
           
           
        }
		
       

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


    public function singlereview($id)
    {
        $this->db->select('review.*');
        $this->db->from('review');
        $this->db->WHERE('review.id', $id);

        return $this->db->get()->result();
    }

   
	
	
	public function checkId($id)
    {
        return $this->db->query("select * from review where id = " . $id)->result();
    }


}