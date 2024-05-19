<?php
include_once 'BaseController.php';

class Application_report extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('config', $this->session->userdata('lang_file'));
        $this->lang->load('master', $this->session->userdata('lang_file'));
        $this->lang->load('registration', $this->session->userdata('lang_file'));
        $this->lang->load('application', $this->session->userdata('lang_file'));
        $this->load->model('admin/application_report_model', 'D_model');
    }
    

    public function index()
    {
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);

        $row = $this->D_model->get_new_user_info(array('user_id' => $this->userId, 'office_category_id' => $this->office_category_id, 'office_id' => $this->office_id));
        $totalRec = ($row!='') ? count($row):0;
        $config['target'] = '#postData';
        $config['base_url'] = base_url() . 'admin/application_report/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $this->data['conditions'] = json_encode(array('user_id' => $this->userId, 'office_category_id' => $this->office_category_id, 'office_id' => $this->office_id, 'limit' => $this->total_row));
        $this->data['posts'] = $this->D_model->get_new_user_info(array('user_id' => $this->userId, 'office_category_id' => $this->office_category_id, 'office_id' => $this->office_id, 'limit' => $this->total_row));
        //$this->data['fees'] = $this->D_model->getvalue_row('master_payment_configuration','app_form_fees',array('status'=>1));
        //$this->data['process_steps']=$this->reg_model->getvalue_row('process_steps','*' ,array());
        $this->data['types'] = $this->D_model->getvalue_row('industry_type','id,type_name_bn,type_name',array('status'=>1));
        $this->data['total_application'] = $totalRec;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
        $this->data['offset'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "application_report/index";
        $this->_commonPageLayout('viewer');
     
    }
    public function new_page_data($page = 0){
        $conditions = array();
        $page = $this->input->post('page');
        if (!$page) {
            $offset = 0;
        } else {
            $offset = $page;
        }
        $data['offset']=$offset;

        $report_for    = $this->input->post('report_for');
        $industry_type = $this->input->post('industry_type');
        $business_type = $this->input->post('business_type');
        $district_id   = $this->input->post('district_id');
        $upazila_id    = $this->input->post('upazila_id');
        $ser_from_date = $this->input->post('ser_from_date');
        $ser_to_date   = $this->input->post('ser_to_date');

        if (!empty($report_for)) {
            $conditions['report_for'] = $report_for;
        }
        if (!empty($industry_type)) {
            $conditions['industry_type'] = $industry_type;
        }
        if (!empty($business_type)) {
            $conditions['business_type'] = $business_type;
        }
        if (!empty($district_id)) {
            $conditions['district_id'] = $district_id;
        }
        if (!empty($upazila_id)) {
            $conditions['upazila_id'] = $upazila_id;
        }
        if (!empty($ser_from_date)) {
            $conditions['ser_from_date'] = $ser_from_date;
        }
        if (!empty($ser_to_date)) {
            $conditions['ser_to_date'] = $ser_to_date;
        }
        $row = $this->D_model->get_new_user_info($conditions);
        $totalRec = ($row!='')?count($row):0;
        //pagination configuration
        $config['target'] = '#postList';
        $config['base_url'] = base_url() . 'admin/application_report/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;
        //$data['fees'] = $this->D_model->getvalue_row('master_payment_configuration','app_form_fees',array('status'=>1));
        //$this->data['process_steps']=$this->reg_model->getvalue_row('process_steps','*' ,array());
        $data['types'] = $this->D_model->getvalue_row('industry_type','id,type_name_bn,type_name',array('status'=>1));
        $data['conditions'] = json_encode($conditions);
        $data['posts'] = $this->D_model->get_new_user_info($conditions);
        $this->load->view('application_report/all_list_data', $data, false);
    }
    

   
   public function preview($id=0){
        $data['posts'] = $this->application_model->get_user_info_by_id($id);
        $data['heading'] = $this->application_model->getvalue_row('master_report_heading','report_heading_name,report_heading_name_bn,address,address_bn,logo_url',array());
        if($data['posts']){
            $id_business=$data['posts'][0]['id_business'];
            $id_document=$data['posts'][0]['id_document'];
            $data['document_additional'] = $this->application_model->getvalue_row('en_document_additional','*',array('document_id'=>$id_document));
            $data['business_asset'] = $this->application_model->getvalue_row('en_business_asset','*',array('business_id'=>$id_business));
            $data['business_capital'] = $this->application_model->getvalue_row('en_business_capital','*',array('business_id'=>$id_business));
            $data['business_description'] = $this->application_model->getvalue_row('en_business_description','*',array('business_id'=>$id_business));
        }
        $html=$this->load->view('application/preview', $data, false);
        //print_r($data['posts']);
        //echo json_encode(array("status" => $status, "message" => $html)); 
        
   }
    public function review_new_application(){
        $contact_id = $this->input->post('contact_id');
        $rev_note = $this->input->post('rev_note');
        $rev_type = $this->input->post('rev_type');
        if($rev_type==1){
            $data=array(
                'process_status'=>2,
                'notes'=>$rev_note
            );

            $data_application_status=array(
                'application_status'=> 2,
                'reg_review_date'=> date('Y-m-d H:i:s'),
                'reg_reviewer_note'=> $rev_note
            );
        }else{
            $data=array(
                'process_status'=>9,
                'notes'=>$rev_note
            );

            $data_application_status=array(
                'application_status'=> 9,
                'reg_review_date'=> date('Y-m-d H:i:s'),
                'reg_reviewer_note'=> $rev_note
            );
        }
        $this->Shows->updateThisValue($data, "en_contact",array('id'=>$contact_id));
        // Update Application Status
        $get_max_id = $this->application_model->get_max_id_from_application_status($contact_id);
        $this->Shows->updateThisValue($data_application_status, "application_status",array('id'=>$get_max_id));
        echo '2';

    }
    public function review_enothi(){
        $contact_id = $this->input->post('contact_id');
        $data=array(
            'status'=>6
        );
        $this->Shows->updateThisValue($data, "en_contact",array('id'=>$contact_id));
        echo '2';
    }
    public function inspection(){
        $contact_id = $this->input->post('contact_id');
        $data=array(
            'process_status'=>3
        );

        $application_status_data = array(
            'approche_insp_date' => date('Y-m-d H:i:s'), 
            'application_status' => 3
        );

        $this->Shows->updateThisValue($data, "en_contact",array('id'=>$contact_id));

        $get_max_id = $this->application_model->get_max_id_from_application_status($contact_id);
        $this->Shows->updateThisValue($application_status_data, "application_status",array('id'=>$get_max_id));
        echo '2';
    }

	function added()
    {
        $this->form_validation->set_rules('office_category_id', 'Office Category', 'trim|required|xss_clean');
        $this->form_validation->set_rules('designation_id', 'Designation', 'trim|required|xss_clean');
        $this->form_validation->set_rules('step_id', 'Step', 'trim|required|xss_clean');
		if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {
             $cat = $this->input->post('office_category_id');
			 $step = $this->input->post('step_id');
			 $deg = $this->input->post('designation_id');
			 $check = $this->Shows->getThisValue("office_category_id = '$cat' and step_id = '$step'","approval_step");
			 $check1 = $this->Shows->getThisValue("office_category_id = '$cat' and designation_id = '$deg'","approval_step");
             
			 if(count($check)){
				 echo json_encode(array("status" => "error", "message" => "Step Exists"));            
			 }
			 else if(count($check1)){
				 echo json_encode(array("status" => "error", "message" => "Designation Exists"));            
			 }
			 else{
					 $data = array(
						'office_category_id' => $this->input->post('office_category_id'),
						'designation_id' => $this->input->post('designation_id'),				
						'step_id' => $this->input->post('step_id'),                				
						'created_by' => $this->userId,
						'created_date' => date("Y-m-d")
					);
					$this->Shows->insertData($data, "approval_step");
					$this->toastr->success('Inserted Successfully!');
					echo json_encode(array("status" => "success", "message" => "Data save successfully"));  
			 }			

        }

    }
	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "approval_step");       
        $this->load->view('admin/approval_step/edit', $data);
    }
	
	function update()
    {

        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            
          $this->form_validation->set_rules('office_category_id', 'Office Category', 'trim|required|xss_clean');
          $this->form_validation->set_rules('designation_id', 'Designation', 'trim|required|xss_clean');
          $this->form_validation->set_rules('step_id', 'Step', 'trim|required|xss_clean');
		   if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');
                  $cat = $this->input->post('office_category_id');
			 $step = $this->input->post('step_id');
			 $deg = $this->input->post('designation_id');
			 $check = $this->Shows->getThisValue("office_category_id = '$cat' and step_id = '$step' and id != '$id'","approval_step");
			 $check1 = $this->Shows->getThisValue("office_category_id = '$cat' and designation_id = '$deg' and id != '$id'","approval_step");
             
			 if(count($check)){
				 echo json_encode(array("status" => "error", "message" => "Step Exists"));            
			 }
			 else if(count($check1)){
				 echo json_encode(array("status" => "error", "message" => "Designation Exists"));            
			 }
               else{             
                    $data = array(
                      'office_category_id' => $this->input->post('office_category_id'),
                       'designation_id' => $this->input->post('designation_id'),				
                       'step_id' => $this->input->post('step_id'),     
				     );
                    $con = "id = '$id'";
                    $this->Shows->updateThisValue($data, "approval_step", $con);
                    $this->toastr->success('Updated Successfully!');
					echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));
                 } 
             
            }

        }

    }
	
	function delete($id)
    {

        $con = "id = '$id'";
        $result = $this->Shows->deleteThisValue($con,"approval_step");       
       echo json_encode(array("status" => "success", "message" => "Data Active Successfully!"));
       

    }

    public function applicationReportPdf(){

        error_reporting('E_NONE');
       $this->load->library('mpdf/mpdf');
       $mpdf = new mPDF('', 'A4-P', 11, 'nikosh');             
       $mpdf->AddPage('P');

       $pdf_conditions = $this->input->post('pdf_conditions');
       $conditions = array();

       if($pdf_conditions){
        $conditions = json_decode($pdf_conditions, true);
        unset($conditions["start"]);
        unset($conditions["limit"]);
       } 
       
        $data['posts'] =  $this->D_model->get_new_user_info($conditions);
        $html = $this->load->view('admin/application_report/application_pdf', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('application_report_pdf.pdf', 'D');
        exit;
    }


        protected function _commonPageLayout($viewName, $cacheIt = FALSE)
        {
            $view = $this->layout->view($viewName, $this->data, TRUE);
            $replaces = array(
                '{SITE_BACKEND_TOP_HEADER}' => $this->load->view('backend/site_top_header', $this->data, TRUE),
                '{SITE_BACKEND_LEFT_MENU}' => $this->load->view('backend/site_left_menu', NULL, TRUE),
                '{SITE_BACKEND_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE)
            );
            $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
        }


    }
