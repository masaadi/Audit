<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Application_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }
    public function getvalue_row($tbl, $fn, $fcon = array()) {
        $this->db->select($fn);
        $this->db->where($fcon);
        $query = $this->db->get($tbl);
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }

    public function get_register_user_info($params = array()){
        $this->db->select('u.*');
        $this->db->from('users u');

        if (!empty($params['user_email'])) {
            $this->db->like('u.email',$params['user_email']);
        }
        if (!empty($params['user_name'])) {
            $this->db->like('u.username',$params['user_name']);
        }
        if (!empty($params['user_phone'])) {
            $this->db->like('u.mobile',$params['user_phone']);
        }

        if (!empty($params['start_date']) && !empty($params['end_date'])) {
            
            $this->db->where('date(u.created) >=', $params['start_date']);
            $this->db->where('date(u.created) <=', $params['end_date']);         
        }



        $this->db->group_start();
            $this->db->where('u.role_id',2);
            $this->db->or_where('u.role_id',3);
        $this->db->group_end();
        //$this->db->where('u.status_id',1);
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        //echo $this->db->last_query();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;

    }
    public function get_user_info_by_id($id){
        $language = $this->session->userdata('lang_file');
        $this->db->select('enc.*, enb.id id_business,enb.year, enb.month, enb.local_market, enb.export_market, enb.fixed_asset_total, enb.current_capital_total, enb.total_investment, enb.local_entrepreneur, enb.foreign_entrepreneur, enb.local_entrep_total,enb.foreign_entrep_total,end.id id_document,end.photo1,end.photo2,end.photo3,end.photo4,end.photo5,end.photo6,end.photo7,end.birth_certificate_no,end.nid_owner_name,end.license_no,end.land_type,end.land_type_title,end.land_additional_documents,end.building_type,end.building_type_title,end.building_additional_documents,end.file_land,end.file_building,end.file_land_documents,end.file_building_documents');
        $this->db->from('en_contact enc');
        $this->db->join('en_business enb', 'enb.contact_id = enc.id');
        $this->db->join('en_documents end', 'end.contact_id = enc.id');
        $this->db->where('enc.id',$id);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function get_new_user_info($params = array()){
        $language = $this->session->userdata('lang_file');
        $this->db->select('enc.*, enb.year, enb.month, enb.local_market, enb.export_market, enb.fixed_asset_total, enb.current_capital_total, enb.total_investment, enb.local_entrepreneur, enb.foreign_entrepreneur, enb.local_entrep_total,enb.foreign_entrep_total,end.id as end_id,end.photo1,end.photo2,end.photo3,end.photo4,end.photo5,end.photo6,end.photo7');
        $this->db->from('en_contact enc');
        $this->db->join('en_business enb', 'enb.contact_id = enc.id');
        $this->db->join('en_documents end', 'end.contact_id = enc.id');
        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                $this->db->where_in('enc.pro_district', $sub_result);
            }
            else{
                $this->db->join('district', 'district.id = enc.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        #End for get value permission wise
        if (!empty($params['app_id'])) {
            $this->db->like('enc.application_id',$params['app_id']);
        }
        if (!empty($params['app_name'])) {
            if($language=='bn'){
                $this->db->like('enc.org_name_bn',$params['app_name']);
            }else{
                $this->db->like('enc.org_name',$params['app_name']);
            }
        }
        if (!empty($params['app_type'])) {
            $this->db->like('enc.industry_type',$params['app_type']);
        }
        if (!empty($params['app_status'])) {
            $this->db->like('enc.process_status',$params['app_status']);
        }
        

        $this->db->where('enc.status',1);
        //$this->db->or_where('enc.status',3);
        $this->db->where('enc.payment_status',2);
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get(); ///echo "<pre>"; print_r($this->db->last_query()); exit;
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
    public function get_new_pending_user(){
        $this->db->select('count(enc.id) total_pending');
        $this->db->from('en_contact enc');
        $this->db->where('enc.status',1);
        $this->db->where('enc.payment_status',2);
        $this->db->where('enc.process_status',1);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
    
    public function get_re_new_user_info($params = array()){
        $language = $this->session->userdata('lang_file');
        $this->db->select('enc.*, enb.year, enb.month, enb.local_market, enb.export_market, enb.fixed_asset_total, enb.current_capital_total, enb.total_investment, enb.local_entrepreneur, enb.foreign_entrepreneur, enb.local_entrep_total,enb.foreign_entrep_total,end.id as end_id,end.photo1,end.photo2,end.photo3,end.photo4,end.photo5,end.photo6,end.photo7');
        $this->db->from('en_contact enc');
        $this->db->join('en_business enb', 'enb.contact_id = enc.id');
        $this->db->join('en_documents end', 'end.contact_id = enc.id');
        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                $this->db->where_in('enc.pro_district', $sub_result);
            }
            else{
                $this->db->join('district', 'district.id = enc.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        #End for get value permission wise
        if (!empty($params['app_id'])) {
            $this->db->like('enc.application_id',$params['app_id']);
        }
        if (!empty($params['app_name'])) {
            if($language=='bn'){
                $this->db->like('enc.org_name_bn',$params['app_name']);
            }else{
                $this->db->like('enc.org_name',$params['app_name']);
            }
        }
        if (!empty($params['app_type'])) {
            $this->db->like('enc.industry_type',$params['app_type']);
        }
        if (!empty($params['app_status'])) {
            $this->db->like('enc.process_status',$params['app_status']);
        }
        $this->db->where('enc.status',4);
        $this->db->where('enc.payment_status',2);
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
    public function get_re_new_pending_user(){
        $this->db->select('count(enc.id) total_pending');
        $this->db->from('en_contact enc');
        $this->db->where('enc.status',4);
        $this->db->where('enc.payment_status',2);
        $this->db->where('enc.process_status',1);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
    public function get_resubmission_user_info($params = array()){
        $language = $this->session->userdata('lang_file');
        $this->db->select('enc.*, enb.year, enb.month, enb.local_market, enb.export_market, enb.fixed_asset_total, enb.current_capital_total, enb.total_investment, enb.local_entrepreneur, enb.foreign_entrepreneur, enb.local_entrep_total,enb.foreign_entrep_total,end.id as end_id,end.photo1,end.photo2,end.photo3,end.photo4,end.photo5,end.photo6,end.photo7');
        $this->db->from('en_contact enc');
        $this->db->join('en_business enb', 'enb.contact_id = enc.id');
        $this->db->join('en_documents end', 'end.contact_id = enc.id');
        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                $this->db->where_in('enc.pro_district', $sub_result);
            }
            else{
                $this->db->join('district', 'district.id = enc.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        #End for get value permission wise
        if (!empty($params['app_id'])) {
            $this->db->like('enc.application_id',$params['app_id']);
        }
        if (!empty($params['app_name'])) {
            if($language=='bn'){
                $this->db->like('enc.org_name_bn',$params['app_name']);
            }else{
                $this->db->like('enc.org_name',$params['app_name']);
            }
        }
        if (!empty($params['app_type'])) {
            $this->db->like('enc.industry_type',$params['app_type']);
        }
        if (!empty($params['app_status'])) {
            $this->db->like('enc.process_status',$params['app_status']);
        }
        $this->db->where('enc.status',5);
        $this->db->where('enc.payment_status',2);
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
    public function get_resubmission_pending_user(){
        $this->db->select('count(enc.id) total_pending');
        $this->db->from('en_contact enc');
        $this->db->where('enc.status',5);
        $this->db->where('enc.payment_status',2);
        $this->db->where('enc.process_status',1);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }
    
    public function get_review_user_info($params = array()){
        $language = $this->session->userdata('lang_file');
        $this->db->select('enc.*');
        $this->db->from('en_contact enc');
        if (!empty($params['app_id'])) {
            $this->db->like('enc.application_id',$params['app_id']);
        }
        if (!empty($params['app_name'])) {
            if($language=='bn'){
                $this->db->like('enc.org_name_bn',$params['app_name']);
            }else{
                $this->db->like('enc.org_name',$params['app_name']);
            }
        }
        if (!empty($params['app_type'])) {
            $this->db->like('enc.industry_type',$params['app_type']);
        }
        if (!empty($params['app_date'])) {
            $this->db->like('enc.created_date',$params['app_date']);
        }
        if (!empty($params['ser_business_type'])) {
            $this->db->where('enc.business_type',$params['ser_business_type']);
        }
        $this->db->where('enc.process_status',2);
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        //echo $this->db->last_query();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function get_approve_user_info($params = array()){
        $language = $this->session->userdata('lang_file');
        $this->db->select('enc.*');
        $this->db->from('en_contact enc');
        if (!empty($params['app_id'])) {
            $this->db->like('enc.application_id',$params['app_id']);
        }
        if (!empty($params['app_name'])) {
            if($language=='bn'){
                $this->db->like('enc.org_name_bn',$params['app_name']);
            }else{
                $this->db->like('enc.org_name',$params['app_name']);
            }
        }
        if (!empty($params['app_type'])) {
            $this->db->like('enc.industry_type',$params['app_type']);
        }
        if (!empty($params['app_date'])) {
            $this->db->like('enc.created_date',$params['app_date']);
        }
        if (!empty($params['ser_business_type'])) {
            $this->db->where('enc.business_type',$params['ser_business_type']);
        }
        $this->db->where('enc.process_status',2);
        $this->db->where('enc.status',6);
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get();
        //echo $this->db->last_query();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


    public function get_certificate_no($id){
        $this->db->select('enc.id,division.code as division_code,district.code as district_code,upazila.code as upazila_code,industry_type.certificate_name,,industry_type.certificate_name_bn');
        $this->db->from('en_contact enc');
        $this->db->join('division', 'division.id = enc.pro_division');
        $this->db->join('district', 'district.id = enc.pro_district');
        $this->db->join('upazila', 'upazila.id = enc.pro_upazila');
        $this->db->join('industry_type', 'industry_type.id = enc.industry_type');
        $this->db->where('enc.id',$id);
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

   
	
	
	public function checkId($id)
    {
        return $this->db->query("select * from approval_step where id = " . $id)->result();
    }


}