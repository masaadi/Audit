<?php
include_once 'BaseController.php';

class Tracking_report extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('reports/tracking_report_model', 'personal_model');
    }


    public function index(){
		$this->data['dynamicView'] = "tracking_report/index";
        $this->_commonPageLayout('viewer');     
    }

    public function show_status($service_id){
        $data['processing_status'] = $this->db->select('approval_steps.*,personal_info.employee_name,designation.designation_name,service_action_message.message,service_action_message.action_type')
                ->join('personal_info','personal_info.employee_id = approval_steps.employee_id','left')
                ->join('job_info','personal_info.employee_id = job_info.employee_id','left')
                ->join('designation','designation.id = job_info.current_desig','left')
                ->join('service_action_message','service_action_message.step_id = approval_steps.id','left')
                ->where('approval_steps.service_id',$service_id)
                ->where('approval_steps.status',1)
                ->order_by('approval_steps.id','asc')
                ->get('approval_steps')->result();
        $data['application_info'] = $this->db->select('service_type.service_type, personal_info.employee_name,service_register.registration_id')
                ->join('personal_info','personal_info.employee_id = service_register.employee_id','left')
                ->join('service_type','service_type.id = service_register.service_type_id','left')
                ->where('service_register.id',$service_id)
                ->get('service_register')
                ->row();

        // echo "<pre>"; print_r($data); die();   
        $this->load->view('reports/tracking_report/status', $data);
    }
   
    public function paginate_data(){
        $conditions = array();
        //calc offset number
        $page = $this->input->post('page');

        if (!$page) {
            $offset = 0;
            $data['loop_start'] = 0;
			 $data['count1'] = 0;
        } else {
            $offset = $page;
            $data['loop_start'] = $page;
			$data['count1'] = $page ;
        }
        $service_type = $this->input->post('service_type');      
        $reg_no = $this->input->post('reg_no');      
        $status = $this->input->post('status');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        if (!empty($service_type)) {
            $conditions['search']['service_type'] = $service_type;
        }
        if (!empty($reg_no)) {
            $conditions['search']['reg_no'] = $reg_no;
        }
        if (!empty($status)) {
            $conditions['search']['status'] = $status;
        }
        if (!empty($start_date)) {
            $conditions['search']['start_date'] = $start_date;
        }
        if (!empty($end_date)) {
            $conditions['search']['end_date'] = $end_date;
        }
        
        // echo "<pre>"; print_r($conditions); die();


        $totalRec = @count($this->personal_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#service_type';
        $config['base_url'] = base_url() . 'reports/tracking_report/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;
        $data['conditions'] = $conditions;
        $data['wings'] = $this->personal_model->get_user_data($conditions);
        // echo "<pre>"; print_r($data['conditions']); die();
        if($status == '1'){
            $this->load->view('reports/tracking_report/present_desk', $data);
        }else{
            $this->load->view('reports/tracking_report/home', $data);
        }
        

    }

    public function paginate_data_two(){
        $conditions = array();
        //calc offset number
        $page = $this->input->post('page');

        if (!$page) {
            $offset = 0;
            $data['loop_start'] = 0;
             $data['count1'] = 0;
        } else {
            $offset = $page;
            $data['loop_start'] = $page;
            $data['count1'] = $page ;
        }
        $service_type = $this->input->post('service_type');      
        $reg_no = $this->input->post('reg_no');      
        $status = $this->input->post('status');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        if (!empty($service_type)) {
            $conditions['search']['service_type'] = $service_type;
        }
        if (!empty($reg_no)) {
            $conditions['search']['reg_no'] = $reg_no;
        }
        if (!empty($status)) {
            $conditions['search']['status'] = $status;
        }
        if (!empty($start_date)) {
            $conditions['search']['start_date'] = $start_date;
        }
        if (!empty($end_date)) {
            $conditions['search']['end_date'] = $end_date;
        }
        
        // echo "<pre>"; print_r($conditions); die();


        $totalRec = @count($this->personal_model->get_user_data_two($conditions));

        //pagination configuration
        $config['target'] = '#service_type';
        $config['base_url'] = base_url() . 'reports/tracking_report/paginate_data_two';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;
        $data['conditions'] = $conditions;
        $data['wings'] = $this->personal_model->get_user_data_two($conditions);
        // echo "<pre>"; print_r($data['conditions']); die();
        $this->load->view('reports/tracking_report/present_desk', $data);
         
    }


    public function generateListPdf(){
        error_reporting('E_NONE');
        $this->load->library('mpdf/mpdf');
        $mpdf = new mPDF('', 'A4-P', 11, 'nikosh');             
        $mpdf->AddPage('P');

        $service_type = $this->input->post('service_type');      
        $reg_no = $this->input->post('reg_no');      
        $status = $this->input->post('status');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        if (!empty($service_type)) {
            $conditions['search']['service_type'] = $service_type;
        }
        if (!empty($reg_no)) {
            $conditions['search']['reg_no'] = $reg_no;
        }
        if (!empty($status)) {
            $conditions['search']['status'] = $status;
        }
        if (!empty($start_date)) {
            $conditions['search']['start_date'] = $start_date;
        }
        if (!empty($end_date)) {
            $conditions['search']['end_date'] = $end_date;
        }

        if($status == '1'){
            $data['wings'] = $this->personal_model->get_user_data_two($conditions);
        }else{
            $data['wings'] = $this->personal_model->get_user_data($conditions);
        }

        
        
        $data['pdf'] = 1;
        if($status == '1'){
            $html = $this->load->view('reports/tracking_report/pdf_two', $data, true);
        }else{
            $html = $this->load->view('reports/tracking_report/pdf', $data, true);
        }

        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('tracking_report.pdf', 'D');
        exit;
    }
    


    protected function _commonPageLayout($viewName, $cacheIt = FALSE){
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_BACKEND_TOP_HEADER}' => $this->load->view('backend/site_top_header', $this->data, TRUE),
            '{SITE_BACKEND_LEFT_MENU}' => $this->load->view('backend/site_left_menu', NULL, TRUE),
            '{SITE_BACKEND_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE)
            );
        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }
	


}
