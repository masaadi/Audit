<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Application_report_model extends CI_Model
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

    

    public function get_new_user_info($params = array()){
        $language = $this->session->userdata('lang_file');
        $this->db->select('enc.*, enb.year, enb.month, enb.local_market, enb.export_market, enb.fixed_asset_total, enb.current_capital_total, enb.total_investment, enb.local_entrepreneur, enb.foreign_entrepreneur, enb.local_entrep_total,enb.foreign_entrep_total,end.id as end_id,end.photo1,end.photo2,end.photo3,end.photo4,end.photo5,end.photo6,end.photo7, aps.*, enc.id as id, enc.status as status, aps.status as aps_status, aps.is_renew as is_renew');
        $this->db->from('en_contact enc');
        $this->db->join('application_status aps', 'aps.contact_id = enc.id');
        $this->db->join('en_business enb', 'enb.contact_id = enc.id');
        $this->db->join('en_documents end', 'end.contact_id = enc.id');
        #Added for get value permission wise
        $this->db->order_by("enc.application_id", "asc");
        $this->db->order_by("aps.application_date", "asc");
        
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
        if (!empty($params['report_for'])) {
            if($params['report_for']==1){
                $this->db->where('aps.status', $params['report_for']);
            }
            elseif($params['report_for']==2){
                $this->db->where('aps.status', $params['report_for']);
            }
            elseif($params['report_for']==3){
                // $this->db->where('aps.status', $params['report_for']);
                $this->db->where('aps.is_renew', 1);
            }
            elseif($params['report_for']==4){
                $this->db->where('aps.application_status', 9);
            }
            
        }
        if (!empty($params['industry_type'])) {
            $this->db->where('enc.industry_type',$params['industry_type']);
        }
        if (!empty($params['business_type'])) {
            $this->db->where('enc.business_type',$params['business_type']);
        }
        if (!empty($params['district_id'])) {
            $this->db->where('enc.pro_district',$params['district_id']);
        }
        if (!empty($params['upazila_id'])) {
            $this->db->where('enc.pro_upazila',$params['upazila_id']);
        }
        if (!empty($params['ser_from_date'])) {
            $this->db->where('DATE(aps.application_date) >=',$params['ser_from_date']);
        }
        if (!empty($params['ser_to_date'])) {
            $this->db->where('DATE(aps.application_date) <=',$params['ser_to_date']);
        }
        // $this->db->where('enc.payment_status',2);
        $this->db->where_in('enc.payment_status',[2,3,4]);
        //$this->db->where('aps.status',1);

        $this->db->order_by("enc.application_id asc, aps.status asc, aps.application_date asc");
        if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit'], $params['start']);
        } elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
            $this->db->limit($params['limit']);
        }
        $query = $this->db->get(); ///echo "<pre>"; print_r($this->db->last_query()); exit;
        return ($query->num_rows() > 0) ? $query->result_array() : FALSE;
    }


}