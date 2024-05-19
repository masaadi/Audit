<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class User_log_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){

        $this->db->select('users_log.*,users.username');
        $this->db->from('users_log');
        $this->db->join('users','users_log.user_id=users.id');
       
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            $this->db->join('profile','users_log.user_id=profile.user_id');

            if($params['office_category_id'] == 1){
                $office_ids=$this->db->query("Select office.id from office join region_wise_office on office.id=region_wise_office.office_id
                where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.id
                ")->result();
                
                $office_ids=array_map('current',$office_ids);
                $office_ids[]=$params['office_id'];

                $this->db->where_in('profile.office_id',$office_ids);
                //echo "<pre>"; print_r( $office_ids); 
                //exit();
            }
            else{
                
                $this->db->join('office', 'profile.office_id = office.id');
                $this->db->where('office.id', $params['office_id']);
            }


        }






        $this->db->order_by("users_log.id", "desc");
		
		if (!empty($params['search']['username'])) {
            $this->db->like('users.username', $params['search']['username']);
        }
		if (!empty($params['search']['office_id'])) {
            $this->db->where('profile.office_id', $params['search']['office_id']);
        }
	
        
		if (!empty($params['search']['ip_address'])) {
            $this->db->like('users_log.ip_address', $params['search']['ip_address']);
        }
		if (!empty($params['search']['url'])) {
            $this->db->like('users_log.url', $params['search']['url']);
        }

	
		if (!empty($params['search']['from_date'])  && !empty($params['search']['to_date'])) {
            $from_date = $params['search']['from_date'];
            $to_date = $params['search']['to_date'];
            $this->db->where('DATE_FORMAT(users_log.date_time,"%Y-%m-%d")>=',$from_date);
            $this->db->where('DATE_FORMAT(users_log.date_time,"%Y-%m-%d")<=',$to_date);
        }elseif (!empty($params['search']['from_date'])) {
            $from_date = $params['search']['from_date'];
            $this->db->where('DATE_FORMAT(users_log.date_time,"%Y-%m-%d")>=',$from_date);
            $this->db->where('DATE_FORMAT(users_log.date_time,"%Y-%m-%d")<=',$from_date);
        }elseif (!empty($params['search']['to_date'])) {
            $to_date = $params['search']['to_date'];
            $this->db->where('DATE_FORMAT(users_log.date_time,"%Y-%m-%d")>=',$to_date);
            $this->db->where('DATE_FORMAT(users_log.date_time,"%Y-%m-%d")<=',$to_date);
        }
	
		
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


}