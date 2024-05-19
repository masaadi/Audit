<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Inspection_report_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        
    }

    public function get_user_data($params = array()){
		
        $this->db->select('en_contact.*, users.full_name, users.id as user_id, business_type.type_name as business_type_name, 
        business_type.type_name_bn as business_type_name_bn, profile.id as ins_profile_id,
        assign_inspector.from_date as sch_from_date, assign_inspector.to_date as sch_to_date, inspection_report.created_at as inspection_date, profile.employee_name as inspector_name, profile.employee_name_bn as inspector_name_bn, profile.user_id as inspector_id, inspection_report.location_picture as location_picture, inspection_report.id as inspection_report_id, district.district_name as pro_district_name, district.district_name_bn as pro_district_name_bn, en_contact.status as status, en_contact.id as id, 0 as aps_status, 0 as application_status, 0 as aps_id, en_contact.is_renew as is_renew
        ');
        $this->db->from('en_contact');
        $this->db->join('users', 'en_contact.entrepreneur_id = users.id');
        $this->db->join('business_type', 'business_type.id = en_contact.business_type');
        $this->db->join('assign_inspector', 'en_contact.id = assign_inspector.en_con_id');
        //$this->db->join('inspector', 'assign_inspector.inspector_id =  inspector.id');
        $this->db->join('profile', 'assign_inspector.profile_id =  profile.id');
        $this->db->join('district', 'en_contact.pro_district =  district.id');
        $this->db->join('inspection_report', 'en_contact.id =  inspection_report.en_cn_id', 'left');
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
                //$this->db->join('district', 'district.id = en_contact.pro_district');
                $this->db->join('office', 'office.district_id = district.id');
                $this->db->where('office.id', $params['office_id']);
            }
        }
        #End for get value permission wise
        
        // $this->db->order_by("assign_inspector.id", "desc");
        //$this->db->WHERE('en_contact.process_status>', 4);
        $this->db->where("(en_contact.process_status>4 OR en_contact.is_renew=1)");
        //$this->db->WHERE('assign_inspector.inspector_id', $params['userid']);

        if (!empty($params['search']['ser_application_id'])) {
            $this->db->like('en_contact.application_id', $params['search']['ser_application_id']);
        }
        if (!empty($params['search']['ser_inspector_id_name'])) {
           $this->db->where("(LOWER(profile.employee_name) LIKE '%".strtolower($params['search']['ser_inspector_id_name'])."%' OR LOWER(profile.employee_name_bn) LIKE '%".strtolower($params['search']['ser_inspector_id_name'])."%')", NULL, FALSE);
        }
        if (!empty($params['search']['ser_district_id'])) {
            $this->db->like('en_contact.pro_district', $params['search']['ser_district_id']);
        }
        if (!empty($params['search']['ser_status'])) {
            if($params['search']['ser_status']==1){
                $this->db->WHERE('en_contact.process_status', 5);
            }
            elseif($params['search']['ser_status']==2){
                $this->db->WHERE('en_contact.process_status', 6);
            }
            elseif($params['search']['ser_status']==3){
                $this->db->WHERE('en_contact.process_status', 9);
            }
        }
        
        if (!empty($params['search']['ser_from_date']) || !empty($params['search']['ser_to_date'])) {

            $from_date = isset($params['search']['ser_from_date'])?$params['search']['ser_from_date']:'';
            $to_date = isset($params['search']['ser_to_date'])?$params['search']['ser_to_date']:'';

            if($from_date && !$to_date){
                $sql = "SELECT id FROM assign_inspector WHERE '$from_date' BETWEEN DATE(from_date) AND DATE(to_date)";
            }
            elseif(!$from_date && $to_date){
                $sql = "SELECT id FROM assign_inspector WHERE '$to_date' BETWEEN DATE(from_date) AND DATE(to_date)";
            }elseif($from_date && $to_date){
                $sql = "SELECT id FROM assign_inspector WHERE ( (DATE(from_date) BETWEEN '$from_date' AND '$to_date' ) OR (DATE(to_date) BETWEEN '$from_date' AND '$to_date' ) )  ";
            }
            $ids = array_map("current",$this->db->query($sql)->result_array());
            
            if(count($ids)>0){
                $this->db->where_in('assign_inspector.id',$ids);
            }else{
                $this->db->where_in('assign_inspector.id',array(0));
            }
            //$this->db->WHERE('assign_inspector.from_date>=', $params['search']['ser_from_date']);
        }

        $query1 = $this->db->get_compiled_select();

        // if (!empty($params['search']['ser_office_id'])) {
        //     $this->db->WHERE('en_contact.office_id', $params['search']['ser_office_id']);
        // }
        
        // if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
        //     $this->db->limit($params['limit'], $params['start']);
        // } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
        //     $this->db->limit($params['limit']);
        // }
        // $query = $this->db->get();
        // return ($query->num_rows() > 0) ? $query->result_array() : FALSE;

        //=================================================
        //=================================================
        //=================================================

        $this->db->select('en_contact.*, users.full_name, users.id as user_id, business_type.type_name as business_type_name, 
        business_type.type_name_bn as business_type_name_bn, profile.id as ins_profile_id,
        history_assign_inspector.from_date as sch_from_date, history_assign_inspector.to_date as sch_to_date, history_inspection_report.created_at as inspection_date, profile.employee_name as inspector_name, profile.employee_name_bn as inspector_name_bn, profile.user_id as inspector_id, history_inspection_report.location_picture as location_picture, history_inspection_report.id as inspection_report_id, district.district_name as pro_district_name, district.district_name_bn as pro_district_name_bn, en_contact.status as status, en_contact.id as id, aps.status as aps_status, aps.application_status as application_status, aps.id as aps_id, aps.is_renew as is_renew
        ');
        $this->db->from('en_contact');
        $this->db->join('application_status aps', 'aps.contact_id = en_contact.id');
        $this->db->join('users', 'en_contact.entrepreneur_id = users.id');
        $this->db->join('business_type', 'business_type.id = en_contact.business_type');
        // $this->db->join('history_assign_inspector', 'en_contact.id = history_assign_inspector.en_con_id');
        $this->db->join('history_assign_inspector', 'aps.id = history_assign_inspector.app_status_id');
        
        $this->db->join('profile', 'history_assign_inspector.profile_id =  profile.id');
        $this->db->join('district', 'en_contact.pro_district =  district.id');
        //$this->db->join('history_inspection_report', 'en_contact.id =  history_inspection_report.en_cn_id', 'left');
        $this->db->join('history_inspection_report', 'aps.id =  history_inspection_report.app_status_id', 'left');
        
        //$this->db->order_by("history_assign_inspector.id", "desc");
        $this->db->WHERE('aps.application_status>', 4);
        //$this->db->WHERE('assign_inspector.inspector_id', $params['userid']);

        if (!empty($params['search']['ser_application_id'])) {
            $this->db->like('en_contact.application_id', $params['search']['ser_application_id']);
        }
        if (!empty($params['search']['ser_inspector_id_name'])) {
           $this->db->where("(LOWER(profile.employee_name) LIKE '%".strtolower($params['search']['ser_inspector_id_name'])."%' OR LOWER(profile.employee_name_bn) LIKE '%".strtolower($params['search']['ser_inspector_id_name'])."%')", NULL, FALSE);
        }
        if (!empty($params['search']['ser_district_id'])) {
            $this->db->like('en_contact.pro_district', $params['search']['ser_district_id']);
        }
        if (!empty($params['search']['ser_status'])) {
            if($params['search']['ser_status']==1){
                $this->db->WHERE('aps.application_status', 5);
            }
            elseif($params['search']['ser_status']==2){
                $this->db->WHERE('aps.application_status', 6);
            }
            elseif($params['search']['ser_status']==3){
                $this->db->WHERE('aps.application_status', 9);
            }
        }
        
        if (!empty($params['search']['ser_from_date']) || !empty($params['search']['ser_to_date'])) {

            $from_date = isset($params['search']['ser_from_date'])?$params['search']['ser_from_date']:'';
            $to_date = isset($params['search']['ser_to_date'])?$params['search']['ser_to_date']:'';

            if($from_date && !$to_date){
                $sql = "SELECT id FROM history_assign_inspector WHERE '$from_date' BETWEEN DATE(from_date) AND DATE(to_date)";
            }
            elseif(!$from_date && $to_date){
                $sql = "SELECT id FROM history_assign_inspector WHERE '$to_date' BETWEEN DATE(from_date) AND DATE(to_date)";
            }elseif($from_date && $to_date){
                $sql = "SELECT id FROM history_assign_inspector WHERE ( (DATE(from_date) BETWEEN '$from_date' AND '$to_date' ) OR (DATE(to_date) BETWEEN '$from_date' AND '$to_date' ) )  ";
            }
            $ids = array_map("current",$this->db->query($sql)->result_array());
            
            if(count($ids)>0){
                $this->db->where_in('history_assign_inspector.id',$ids);
            }else{
                $this->db->where_in('history_assign_inspector.id',array(0));
            }
            //$this->db->WHERE('assign_inspector.from_date>=', $params['search']['ser_from_date']);
        }

        $query2 = $this->db->get_compiled_select();

        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $query = $this->db->query($query1 . ' UNION ALL ' . $query2. ' ORDER BY application_id,inspection_date'.' LIMIT '. $params['limit']. ' OFFSET ' .$params['start']);
            return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $query = $this->db->query($query1 . ' UNION ALL ' . $query2. ' ORDER BY application_id,inspection_date'.' LIMIT '. $params['limit']);
            return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }
        elseif (!array_key_exists("start", $params) && !array_key_exists("limit", $params)) {
            $query = $this->db->query($query1 . ' UNION ALL ' . $query2. ' ORDER BY application_id,inspection_date');
            return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
        }
    }

    public function get_applicant_view($tbl, $fn, $fcon = array()){

        $this->db->select($fn);
        $this->db->where($fcon);
        $query = $this->db->get($tbl);
        return ($query->num_rows() > 0)?$query->result_array():FALSE;
    }

}