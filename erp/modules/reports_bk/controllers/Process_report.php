<?php
include_once 'BaseController.php';

class Process_report extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('reports/process_report_model', 'personal_model');
    }


    public function index(){
        $totalRec = @count($this->personal_model->get_user_data());
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'reports/process_report/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->personal_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "process_report/index";
        $this->_commonPageLayout('viewer');
     
   }
   
   public function paginate_data()
    {
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
        $emp_id = $this->input->post('emp_id');      
        $regi_no = $this->input->post('regi_no');      
        $service_type = $this->input->post('service_type');      

        if (!empty($emp_id)) {
            $conditions['search']['emp_id'] = $emp_id;
        }
        if (!empty($regi_no)) {
            $conditions['search']['regi_no'] = $regi_no;
        }
        if (!empty($service_type)) {
            $conditions['search']['service_type'] = $service_type;
        }

        $totalRec = @count($this->personal_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#service_type';
        $config['base_url'] = base_url() . 'reports/process_report/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->personal_model->get_user_data($conditions);
        $this->load->view('reports/process_report/home', $data);

    }

    public function generateListPdf(){
        error_reporting('E_NONE');
        $this->load->library('mpdf/mpdf');
        $mpdf = new mPDF('', 'A4-P', 11, 'nikosh');             
        $mpdf->AddPage('P');

        $id = $this->input->post('id');
        
        $data['wings'] = $this->db->select('service_register.*,service_type.service_type,personal_info.employee_name')
                        ->join('personal_info','personal_info.employee_id = service_register.employee_id','left')
                        ->join('service_type','service_type.id = service_register.service_type_id','left')
                        ->where("service_register.status", "processing")
                        ->order_by("service_register.id", "desc")
                        ->get('service_register')->result_array();
        $data['pdf'] = 1;
        $html = $this->load->view('reports/process_report/pdf', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('processes_services.pdf', 'D');
        exit;
    }

    // ajax

    public function delete_doc(){
        $doc_id = $this->input->post('doc_id');
        $reg_id = $this->input->post('reg_id');
        $this->db->where('id',$doc_id)->delete('service_regi_document');        
    }
    public function get_emp($emp_id){
        $emp_info = $this->db->select('personal_info.employee_name,job_info.current_scale,designation.designation_name,designation.id as desig_id,office.office_name,office.id as office_id')
                    ->join('job_info','job_info.employee_id = personal_info.employee_id')
                    ->join('designation','designation.id = job_info.current_desig')
                    ->join('office','office.id = job_info.current_office')
                    ->where('personal_info.employee_id',$emp_id)
                    ->get('personal_info')->row();
        echo json_encode($emp_info);
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
