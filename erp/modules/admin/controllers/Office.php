<?php
include_once 'BaseController.php';

class Office extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('config', $this->session->userdata('lang_file'));
        $this->load->model('admin/office_model', 'D_model');
    }



    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#officeList';
        $config['base_url'] = base_url() . 'admin/office/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "office/index";
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
        $name = $this->input->post('off_name');      
        $cat = $this->input->post('off_cat');      

        if (!empty($name)) {
            $conditions['search']['off_name'] = $name;
        }
        if (!empty($cat)) {
            $conditions['search']['off_cat'] = $cat;
        }

        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#officeList';
        $config['base_url'] = base_url() . 'admin/office/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/office/home', $data);

    }
	
	public function add()
    {
       
        $this->load->view('admin/office/entry');

    }
	
	function added()
    {

        $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');

        $this->form_validation->set_rules('office_name', 'Office Name', 'trim|required|is_unique[office.office_name]|xss_clean');

		if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);
        } else {
            $data = array(
			    'office_name' => $this->input->post('office_name'),
                'address' => $this->input->post('address'),
                'contact_no' => $this->input->post('contact_no'),		
                'created_by' => $this->userId,
                //'district_id' => $this->input->post('district_id'),
				'created_date' => date("Y-m-d")
            );
            $last_insert_id = $this->Shows->insertData($data, "office");

                //user log submit
                $log_des='('. text_format($this->input->post('office_name'),30)  .')'. " . Office created.";
                user_log($log_des,'admin/office');

            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }
    }
	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "office");

        $data['region_list'] =  $this->D_model->region_name_list();
        $data['region_info'] =  $this->D_model->get_region_data($id);

        $this->load->view('admin/office/edit', $data);
    }
	
	function update()
    {

        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            $original_value = $this->D_model->checkId($id);
             if (strtolower($this->input->post('office_name')) != strtolower($original_value[0]->office_name)) {
                $is_unique = '|is_unique[office.office_name]';
            } else {
                $is_unique = '';
            }
			
            $this->form_validation->set_rules('address', 'Address', 'trim|required|xss_clean');

            $duplicate_check_category_wise = $this->D_model->duplicate_check_category_wise($this->input->post('office_name'), $id);
            #duplicate check
            if($duplicate_check_category_wise){
                $this->form_validation->set_rules('office_name', 'Office Name', 'trim|required|is_unique[office.office_name]|xss_clean');
            }else{
                $this->form_validation->set_rules('office_name', 'Office Name', 'trim|required|xss_clean');
            }

		   if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');
                // $wing_id = $this->input->post('wing_id');
                $office_name = $this->input->post('office_name');                
                    $data = array(
                        'office_name' => $this->input->post('office_name'),
						'address' => $this->input->post('address'),
						'contact_no' => $this->input->post('contact_no'),				
                        //'district_id' => $this->input->post('district_id'),                      
                    );
                    $con = "id = '$id'";
                    $this->Shows->updateThisValue($data, "office", $con);
                    
                    //user log submit
                    $log_des='('. text_format($this->input->post('office_name'),30)  .')'. " . Office updated.";
                    user_log($log_des,'admin/office');

                    $this->toastr->success('Updated Successfully!');
					  echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));             
            }

        }

    }
	
	function delete($id)
    {

        $con = "id = '$id'";
        $result = $this->Shows->deleteThisValue($con,"office");       
       echo json_encode(array("status" => "success", "message" => "Data Active Successfully!"));
       

    }

    public function generateListPdf(){
        error_reporting('E_NONE');
        $this->load->library('mpdf/mpdf');
        $mpdf = new mPDF('', 'A4-P', 11, 'nikosh');             
        $mpdf->AddPage('P');
        

        $cat = $this->input->post('pdf_cat');
        $name = $this->input->post('pdf_name');
        if (!empty($cat)) {
            $conditions['search']['off_cat'] = $cat;
        }
        if (!empty($name)) {
            $conditions['search']['off_name'] = $name;
        }

        //user log submit
        $log_des="Office list report pdf download.";
        user_log($log_des,'admin/office');


        $data['wings'] =  $this->D_model->get_user_data($conditions);
        $data['cat'] = $cat;
       // $data['type'] = $type;
        $data['name'] = $name;
        $data['pdf'] = 1;
        $html = $this->load->view('admin/office/office_report', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('office-list-report.pdf', 'D');
        exit;
    }

    public function get_disctrict_region(){
        $id = $this->input->post('office_id');

        $data['region_list'] =  $this->D_model->region_name_list();
        $data['region_info'] =  $this->D_model->get_region_data($id);
        $data['action'] = $id;

        $con = "id = '$id'";
        $data['array'] = $this->Shows->getThisValue($con, "office");

        $this->load->view('admin/office/get_district_region', $data);
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
