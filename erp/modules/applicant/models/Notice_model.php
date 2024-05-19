<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Notice_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){

        $user_id=$this->session->userdata('DX_user_id');
        $this->db->select('notice.*,notice_seen_unseen.status as seen_status,notice_seen_unseen.id as notice_seen_unseen_id,');
        $this->db->from('notice');
        $this->db->join('notice_seen_unseen', 'notice.id = notice_seen_unseen.notice_id');
        $this->db->WHERE('notice.publish_status', 1);
        $this->db->WHERE('notice.status', 1);
        $this->db->WHERE('notice_seen_unseen.user_id', $user_id);

	    if (!empty($params['search']['title'])) {
           
            $language = $this->session->userdata('lang_file');

            if($language=='bn'){
                $this->db->like('notice.notice_title_bn', $params['search']['title']);
            }else{
                $this->db->like('notice.notice_title', $params['search']['title']);
            }
        }
        $this->db->order_by("notice.id", "desc");


        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


   
    public function singlenotice($id)
    {


        $this->db->select('notice.*');
        $this->db->from('notice');
        $this->db->WHERE('notice.id', $id);
        
        return $this->db->get()->result();
    }


    
   public function get_unseen_notice()
   {
        $user_id=$this->session->userdata('DX_user_id');
        $this->db->select('notice_seen_unseen.status');
        $this->db->from('notice_seen_unseen');
        $this->db->join('notice', 'notice_seen_unseen.notice_id = notice.id');
        $this->db->WHERE('notice_seen_unseen.user_id', $user_id);
        $this->db->WHERE('notice.status', 1);
        $this->db->WHERE('notice.publish_status', 1);
        $this->db->WHERE('notice_seen_unseen.status', 0);

        $total_unseen= $this->db->count_all_results();

        if($total_unseen<0){
            return 0;
        }else{
            return $total_unseen;
        }

    }

	
	
	public function checkId($id)
    {
        return $this->db->query("select * from notice where id = " . $id)->result();
    }


}