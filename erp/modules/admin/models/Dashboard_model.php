<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function total_application($params = array()){
		// Total Application
        $this->db->select('en_contact.*');
        $this->db->from('en_contact');
        $this->db->join('users', 'en_contact.entrepreneur_id = users.id');
        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $sub_result);
            }
            else{
                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        #End for get value permission wise
        $this->db->where_in('en_contact.payment_status',[2,3,4]);
        $query1 = $this->db->get();
        $data['total_application'] = ($query1->num_rows() > 0) ? $query1->num_rows() : 0;

        // Total Retistration
        $this->db->select('users.*');
        $this->db->from('users');
        $this->db->where_in('users.role_id',[2,3]);
        $query2 = $this->db->get();
        $data['total_registration'] = ($query2->num_rows() > 0) ? $query2->num_rows() : 0;

        // Total Rejected Registration
        $this->db->select('en_contact.*');
        $this->db->from('en_contact');
        $this->db->join('application_status', 'en_contact.id = application_status.contact_id');
        $this->db->join('users', 'en_contact.entrepreneur_id = users.id');
        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $sub_result);
            }
            else{
                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        // $this->db->where('en_contact.process_status',9);
        $this->db->where('application_status.application_status',9);
        #End for get value permission wise
        $query3 = $this->db->get(); ///echo "<pre>"; print_r($this->db->last_query()); exit;
        $data['total_rejected_registration'] = ($query3->num_rows() > 0) ? $query3->num_rows() : 0;

        // Total resubmit application
        $this->db->select('en_contact.*');
        $this->db->from('en_contact');
        $this->db->join('application_status', 'en_contact.id = application_status.contact_id');
        $this->db->join('users', 'en_contact.entrepreneur_id = users.id');
        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $sub_result);
            }
            else{
                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        $this->db->where('application_status.status',2);
        #End for get value permission wise
        $query4 = $this->db->get(); ///echo "<pre>"; print_r($this->db->last_query()); exit;
        $data['total_resubmit'] = ($query4->num_rows() > 0) ? $query4->num_rows() : 0;

        // Total renew
        $this->db->select('en_contact.*');
        $this->db->from('en_contact');
        $this->db->join('users', 'en_contact.entrepreneur_id = users.id');
        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $sub_result);
            }
            else{
                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        $this->db->where('en_contact.is_renew',1);
        #End for get value permission wise
        $query5 = $this->db->get(); ///echo "<pre>"; print_r($this->db->last_query()); exit;
        $data['total_renew'] = ($query5->num_rows() > 0) ? $query5->num_rows() : 0;

        // Total certificate expired
        $expired_date = $this->db->query("select * from master_configuration where status = 1")->row();
        $this->db->select('en_contact.*');
        $this->db->from('en_contact');
        $this->db->join('users', 'en_contact.entrepreneur_id = users.id');
        $this->db->join('certificate', 'en_contact.id = certificate.contact_id');
        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $sub_result);
            }
            else{
                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        $this->db->where('DATE_ADD(certificate.updated_date, INTERVAL '.$expired_date->certificate_validity_period.' YEAR)<', date('Y-m-d'));
        #End for get value permission wise
        $query6 = $this->db->get();
        $data['total_expired'] = ($query6->num_rows() > 0) ? $query6->num_rows() : 0;

        // Total deliverd certificate
        $this->db->select('en_contact.*');
        $this->db->from('en_contact');
        $this->db->join('users', 'en_contact.entrepreneur_id = users.id');
        $this->db->join('certificate', 'en_contact.id = certificate.contact_id');
        $this->db->join('renew_history', 'certificate.id = renew_history.certificate_id');
        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $sub_result);
            }
            else{
                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        $this->db->where('certificate.status', 1);
        #End for get value permission wise
        $query7 = $this->db->get();//echo $this->db->last_query(); exit;
        $data['total_deliverd_certificate'] = ($query7->num_rows() > 0) ? $query7->num_rows() : 0;

        // Total payment collected
        $this->db->select('sum(payments.amount) as total_payment_amount');
        $this->db->from('en_contact');
        $this->db->join('users', 'en_contact.entrepreneur_id = users.id');
        $this->db->join('payments', 'en_contact.id = payments.contact_id');
        #Added for get value permission wise
        if(array_key_exists("user_id", $params) && $params['user_id'] !=1 && $params['office_category_id'] != 2){
            if($params['office_category_id'] == 1){
                $sub_result = array_map("current", $this->db->query("select office.district_id from office 
                    JOIN region_wise_office ON office.id=region_wise_office.office_id
                    where region_wise_office.region_id = ".$params['office_id']." GROUP BY office.district_id")->result_array());
                if(count($sub_result) < 1){
                    $sub_result = array(0);
                }
                $this->db->where_in('en_contact.pro_district', $sub_result);
            }
            else{
                $this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        $this->db->where('payments.pay_status', 'success');
        #End for get value permission wise
        $query8 = $this->db->get(); 
        $res = ($query8->num_rows() > 0) ? $query8->result_array() : 0;
        if($res){
             $data['total_payment_collected'] = $res[0]['total_payment_amount'];
        }else{
            $data['total_payment_collected'] = 0;
        }
       
        // Total user
        $this->db->select('users.*');
        $this->db->from('users');
        $this->db->where_in('users.role_id',[1,4]);
        $query2 = $this->db->get();
        $data['total_user'] = ($query2->num_rows() > 0) ? $query2->num_rows() : 0;


        return $data;
    }

    public function get_applicant_view($tbl, $fn, $fcon = array()){

        $this->db->select($fn);
        $this->db->where($fcon);
        $query = $this->db->get($tbl);
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }

    public function inspector_option_list(){
        $this->db->select('inspector.id as ins_id,profile.*');
        $this->db->from('inspector');
        $this->db->join('profile', 'profile.id = inspector.profile_id');
        $this->db->join('business_type', 'FIND_IN_SET(business_type.id, inspector.business_type_id)');
        $this->db->join('office_category', 'office_category.id = profile.office_category_id');
        $this->db->join('office', 'office.id = profile.office_id');
        $this->db->join('department', 'department.id = profile.department_id');
        $this->db->join('designation', 'designation.id = profile.designation_id');
        $this->db->join('district', 'profile.district_id = district.id');
        $this->db->join('upazila', 'profile.upazila_id = upazila.id');
        $this->db->group_by("inspector.id");

        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function get_process_status($fn, $tbl){

        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where('name', $fn);
        $query = $this->db->get();
        return ($query->num_rows() > 0)?$query->result_array():FALSE;

    }

    public function get_applicant_contact($id){

        $this->db->select('en_contact.*, users.full_name, business_type.type_name as business_type_name, business_type.type_name_bn as business_type_name_bn');
        $this->db->from('en_contact');
        $this->db->join('users', 'en_contact.entrepreneur_id = users.id');
        $this->db->join('business_type', 'business_type.id = en_contact.business_type');
        $this->db->WHERE("en_contact.id", $id);
        
        $query = $this->db->get();
        return ($query->num_rows() > 0) ? $query->row() : FALSE;
    }

    public function get_applicant_inspector($params = array()){

        $this->db->select('profile.*,
        office_category.office_category_name,
        office_category.office_category_name_bn ,office.office_name,
        office.office_name_bn, users.username, users.full_name, users.full_name_bn,
        assign_inspector.from_date as sch_from_date, assign_inspector.to_date as sch_to_date,
        GROUP_CONCAT(
          CONCAT(DATE_FORMAT(assign_inspector.from_date, "%d/%m/%Y"),"-",DATE_FORMAT(assign_inspector.to_date, "%d/%m/%Y"))  
          SEPARATOR "<br>"
        ) as concat_date,
        COUNT(IF(en_contact.process_status = 4, 1, NULL)) assign_status,
        GROUP_CONCAT( en_contact.application_id SEPARATOR "~") as assigned_for,
        GROUP_CONCAT( en_contact.pro_address SEPARATOR "~") as assigned_area,
        GROUP_CONCAT( en_contact.pro_address_bn SEPARATOR "~") as assigned_area_bn
        ');
        $this->db->from('profile');
        $this->db->join('users', 'profile.user_id = users.id');
        //$this->db->join('business_type', 'FIND_IN_SET(business_type.id, inspector.business_type_id)');
        $this->db->join('office_category', 'office_category.id = profile.office_category_id');
        $this->db->join('office', 'office.id = profile.office_id');
        $this->db->join('department', 'department.id = profile.department_id');
        $this->db->join('designation', 'designation.id = profile.designation_id');
        $this->db->join('district', 'profile.district_id = district.id', 'left');
        $this->db->join('upazila', 'profile.upazila_id = upazila.id', 'left');

        $this->db->join('assign_inspector', 'assign_inspector.profile_id = profile.id', 'left');
        $this->db->join('en_contact', 'en_contact.id = assign_inspector.en_con_id', 'left');
        
        $this->db->order_by("profile.id", "desc");
        $this->db->group_by("profile.id");

        $this->db->WHERE("users.is_inspector", 1);

        if (!empty($params['search']['ser_application_id2'])) {
            $this->db->like('en_contact.application_id', $params['search']['ser_application_id2']);
        }
        
        // if (!empty($params['search']['ser_off_cat_id'])) {
        //     $this->db->WHERE('en_contact.office_category_id', $params['search']['ser_off_cat_id']);
        // }
        // if (!empty($params['search']['ser_office_id'])) {
        //     $this->db->WHERE('en_contact.office_id', $params['search']['ser_office_id']);
        // }
        if (!empty($params['search']['ser_inspector_id'])) {
            //$this->db->WHERE('users.username', $params['search']['ser_inspector_id']);
            $this->db->where("(LOWER(users.full_name) LIKE '%".strtolower($params['search']['ser_inspector_id'])."%' OR LOWER(users.full_name_bn) LIKE '%".strtolower($params['search']['ser_inspector_id'])."%' OR LOWER(users.username) LIKE '%".strtolower($params['search']['ser_inspector_id'])."%')", NULL, FALSE);
        }
        if (!empty($params['search']['ser_status2'])) {
            $ser_status = $params['search']['ser_status2'];
            if($ser_status == 1){
                $this->db->HAVING('assign_status > ', 0);
            }elseif($ser_status == 2){
                $this->db->HAVING('assign_status < ', 1);
            }
        }
        
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        
        $query = $this->db->get(); //echo $this->db->last_query(); exit;
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }

    public function get_edit_data($assign_inspector_id){

        $this->db->select('assign_inspector.*, users.username, users.full_name, users.full_name_bn, profile.user_id');
        $this->db->from('assign_inspector');
        $this->db->join('profile', 'profile.id=assign_inspector.profile_id');
        $this->db->join('users', 'profile.user_id=users.id');
        $this->db->where('assign_inspector.id', $assign_inspector_id);
        $query = $this->db->get();
        return $query->row();

        //return $this->db->query("select * from ".$tbl." where ". $con)->row();
    }

    public function checkId($con)
    {
        return $this->db->query("select * from users where ". $con)->row();
    }

    public function inspector_list($search_text)
    {
        $this->db->select('profile.*,users.username, users.full_name, users.full_name_bn');
        $this->db->from('profile');
        $this->db->join('users', 'profile.user_id=users.id');
        $this->db->where('users.is_inspector', 1);
        $this->db->where("(LOWER(users.full_name) LIKE '%".strtolower($search_text)."%' OR LOWER(users.full_name_bn) LIKE '%".strtolower($search_text)."%' OR LOWER(users.username) LIKE '%".strtolower($search_text)."%')", NULL, FALSE);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_username_as_inspectory($con){
        return $this->db->query("select * from users where ". $con)->row()->username;
    }

    public function get_id_from_assign_inspector($con){
        return $this->db->query("select * from assign_inspector where ". $con)->row();
    }

}