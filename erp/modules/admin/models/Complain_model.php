<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Complain_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
        
    }

    public function get_user_data($params = array()){
		//echo $this->userId;die();
        $user_id=$this->session->userdata('DX_user_id');

        $this->db->select('complain.*,users.full_name,users.mobile');
        $this->db->from('complain');
        $this->db->join('users', 'complain.user_id=users.id','left');
        $this->db->join('complain_user', 'complain.id=complain_user.complain_id','left');

        $this->db->WHERE('complain_user.user_id', $user_id);

		
		if (!empty($params['search']['complain_title'])) {
           
            $this->db->like('complain.complain_title', $params['search']['complain_title']);
        
        }
        
		if (!empty($params['search']['complain_status'])) {
           
            $complain_status= $params['search']['complain_status'];

            if($complain_status=='completed'){
                $this->db->WHERE('complain_user.chain_status', 2);
            }
            if($complain_status=='pending'){
                $this->db->WHERE('complain_user.chain_status', 1);
            }
        }else{
            $this->db->WHERE('complain_user.chain_status', 1);
        }

		
        if (!empty($params['search']['from_date']) && !empty($params['search']['to_date'])) {
           
            $this->db->where('created_date >=', $params['search']['from_date']);
            $this->db->where('created_date <=', $params['search']['to_date']);        
        }
        
		
        $this->db->order_by("complain.id", "desc");


        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function complain_reply($id)
    {
        $this->db->select('complain_reply.*,users.*');
        $this->db->from('complain_reply');
        $this->db->join('users', 'complain_reply.user_id=users.id','left');
        $this->db->WHERE('complain_reply.complain_id', $id);

        return $this->db->get()->result();
    }

    public function singleComplain($id)
    {
        $this->db->select('complain.*');
        $this->db->from('complain');
        $this->db->WHERE('complain.id', $id);

        return $this->db->get()->result();
    }

    public function get_complain_users($id)
    {
        $this->db->select('complain_user.*,users.*');
        $this->db->from('complain_user');
        $this->db->join('users', 'complain_user.user_id=users.id','left');
        $this->db->WHERE('complain_user.complain_id', $id);
        return $this->db->get()->result();
    }
    
    public function get_next_users($id)
    {
        $this->db->select('complain_user.*,users.full_name');
        $this->db->from('complain_user');
        $this->db->join('users','complain_user.user_id=users.id');

        $this->db->WHERE('complain_user.chain_status', 0);
        $this->db->WHERE('complain_user.complain_id', $id);

        return $this->db->get()->result();
    }

    public function reply_check($complain_id)
    {
        $user_id=$this->session->userdata('DX_user_id');

        $this->db->select('complain_reply.*');
        $this->db->from('complain_reply');
        $this->db->WHERE('complain_reply.complain_id', $complain_id);
        $this->db->WHERE('complain_reply.user_id', $user_id);

        $total_row= $this->db->count_all_results();

        if($total_row>0){
            return true;
        }else{
            return false;
        }  
    }
	public function ongoing_completed_check($complain_id)
    {

        $this->db->select('complain_user.*');
        $this->db->from('complain_user');
        $this->db->WHERE('complain_user.complain_id',$complain_id);
        $this->db->WHERE('complain_user.chain_status',1);

        $total_row= $this->db->count_all_results();

        if($total_row>0){
            return true;
        }else{
            return false;
        }  
    }
	public function seen_unseen_check($complain_id)
    {
        $user_id=$this->session->userdata('DX_user_id');

        $this->db->select('complain_alert.*');
        $this->db->from('complain_alert');
        $this->db->WHERE('complain_alert.complain_id',$complain_id);
        $this->db->WHERE('complain_alert.status',0);
        $this->db->WHERE('complain_alert.receiver_id',$user_id);

        $total_row= $this->db->count_all_results();

        if($total_row>0){
            return true;
        }else{
            return false;
        }  
    }
	
	public function checkId($id)
    {
        return $this->db->query("select * from complain where id = " . $id)->result();
    }


}