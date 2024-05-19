<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Complain_chain_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('users.*');
        $this->db->from('users');

		
		if (!empty($params['search']['user_id'])) {
           
            $this->db->where('users.username' , $params['search']['user_id']);
            $this->db->where('users.role_id !=' , '2');
            $this->db->where('users.role_id !=' , '3');
            $this->db->where('users.role_id !=' , '4');
        }
        $this->db->order_by("users.id", "desc");

      
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function select_users()
    {
        $this->db->select('users.*');
        $this->db->from('users');
        $this->db->where('users.role_id !=' , '2');
        $this->db->where('users.role_id !=' , '3');
        $this->db->where('users.role_id !=' , '4');

        return $this->db->get()->result();
    }

    public function chain_users()
    {
        $this->db->select('complain_chain.*,users.full_name');
        $this->db->join('users','complain_chain.user_id=users.id');
        $this->db->from('complain_chain');

        return $this->db->get()->result();
    }

   
	
	
	public function checkId($id)
    {
        return $this->db->query("select * from complain_chain where user_id = " . $id)->num_rows();
    }


}