<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Notice_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();

        $this->db->select('notice.*');
        $this->db->from('notice');

        $this->db->order_by("notice.id", "desc");
		
		if (!empty($params['search']['title'])) {
           
            $this->db->like('notice.notice_title', $params['search']['title']);
            $this->db->or_like('notice.notice_title_bn', $params['search']['title']);
           
        }
		
       

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function get_user_by_role($role_id)
    {
        $this->db->select('users.id');
        $this->db->from('users');
        $this->db->WHERE('users.role_id', $role_id);

        return $this->db->get()->result();
    }
   
    public function singlenotice($id)
    {
        $this->db->select('notice.*');
        $this->db->from('notice');
        $this->db->WHERE('notice.id', $id);

        return $this->db->get()->result();
    }

   public function get_unseen_notice($params=[])
    {
        $user_id=$this->session->userdata('DX_user_id');
        $this->db->select('notice_user.*,notice.*');
        $this->db->from('notice_user');
        $this->db->join('notice', 'notice_user.notice_id = notice.id', 'left');  

        if (!empty($params['role_id'])) {
            $this->db->WHERE('notice_user.role_id=',$params['role_id']);
        }

        if (!empty($params['limit'])) {
            $this->db->limit($params['limit'],0);
        }



        $this->db->order_by("notice_user.notice_id", "desc");


        return $this->db->get()->result();
    }

	
	
	public function checkId($id)
    {
        return $this->db->query("select * from notice where id = " . $id)->result();
    }


}