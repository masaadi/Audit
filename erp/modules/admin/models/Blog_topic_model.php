<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Blog_topic_model extends CI_Model
{

    protected $language;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->language= $this->session->userdata('lang_file');
    }

    public function get_user_data($params = array()){

        $this->db->select('*');
        $this->db->from('blogtopic');
          
		if (!empty($params['search']['topic_name'])) {
            if($this->language=='bn'){
                $this->db->like('lower(blogtopic.topic_name_bn)', strtolower($params['search']['topic_name']));
            }else{
                $this->db->like('lower(blogtopic.topic_name)', strtolower($params['search']['topic_name']));
            }
        }

        $this->db->order_by("blogtopic.id", "desc");

       

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
        return $this->db->query("select * from blogtopic where id = " . $id)->result();
    }


}