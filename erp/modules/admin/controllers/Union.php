<?php
include_once 'BaseController.php';

class Union extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       $this->lang->load('master', $this->session->userdata('lang_file'));
        $this->load->model('admin/union_model', 'D_model');
    }



    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#unionList';
        $config['base_url'] = base_url() . 'admin/union/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "union/index";
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

        $union_name = $this->input->post('union_name');      
        $upazila_id = $this->input->post('upazila_id');      
        $district_id = $this->input->post('district_id');      
        $division_id = $this->input->post('division_id');      

        if (!empty($union_name)) {
            $conditions['search']['union_name'] = $union_name;
        }
        if (!empty($upazila_id)) {
            $conditions['search']['upazila_id'] = $upazila_id;
        }
        if (!empty($district_id)) {
            $conditions['search']['district_id'] = $district_id;
        }
         if (!empty($division_id)) {
            $conditions['search']['division_id'] = $division_id;
        }


        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#unionList';
        $config['base_url'] = base_url() . 'admin/union/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/union/home', $data);

    }
	
	public function add()
    {
        $this->load->view('admin/union/entry');

    }
	
	function added()
    {

        $this->form_validation->set_rules('union_name', 'Union', 'trim|required|is_unique[master_union.union_name]|xss_clean');
        $this->form_validation->set_rules('union_name_bn', 'Union', 'trim|required|is_unique[master_union.union_name_bn]|xss_clean');

        $this->form_validation->set_rules('division_id', 'Division', 'trim|required|xss_clean');
        $this->form_validation->set_rules('district_id', 'District', 'trim|required|xss_clean');

          if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $data = array(
                'division_id' => $this->input->post('division_id'), 
                'district_id' => $this->input->post('district_id'), 
                'upazila_id' => $this->input->post('upazila_id'), 
                'union_name' => $this->input->post('union_name'), 
                'union_name_bn' => $this->input->post('union_name_bn'),               
                'created_by' => $this->userId,
				'created_date' => date("Y-m-d")
            );
            $this->Shows->insertData($data, "master_union");
            //user log submit
            $log_des='('. text_format($this->input->post('union_name'),30)  .')'. "  Union creatrd.";
            user_log($log_des,'admin/union');

            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }

    }
	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;

        $data['array'] = $this->Shows->getThisValue($con, "master_union");  

        $this->load->view('admin/union/edit', $data);
    }
	
	function update()
    {

        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            $original_value = $this->D_model->checkId($id);
             if (strtolower($this->input->post('union_name')) != strtolower($original_value[0]->union_name)) {
                $is_unique = '|is_unique[master_union.union_name]';
                $is_unique_bn = '|is_unique[master_union.union_name_bn]';
            } else {
                $is_unique ='';
                $is_unique_bn = '';
            }
            // $this->form_validation->set_rules('wing_id', 'Wing ID', 'trim|required|xss_clean');
            $this->form_validation->set_rules('union_name', 'Union Name', 'trim|required|xss_clean'. $is_unique);
            $this->form_validation->set_rules('union_name_bn', 'Union Name (Bangla)', 'trim|required|xss_clean'. $is_unique);
            $this->form_validation->set_rules('division_id', 'Division', 'trim|required|xss_clean');
            $this->form_validation->set_rules('district_id', 'District', 'trim|required|xss_clean');
            $this->form_validation->set_rules('upazila_id', 'Upazila', 'trim|required|xss_clean');
            
           if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');
                // $wing_id = $this->input->post('wing_id');
                $union_name = $this->input->post('union_name');                
                    $data = array(
                        // 'WING_ID' => $this->input->post('wing_id'),
                        'union_name' => $this->input->post('union_name'),  
                        'union_name_bn' => $this->input->post('union_name_bn'),
                        'division_id' => $this->input->post('division_id'),    
                        'district_id' => $this->input->post('district_id'),     
                        'upazila_id' => $this->input->post('upazila_id')                
                    );
                    $con = "id = '$id'";
                    $this->Shows->updateThisValue($data, "master_union", $con);

                    //user log submit
                    $log_des='('. text_format($this->input->post('union_name'),30)  .')'. "  Union updated.";
                    user_log($log_des,'admin/union');


                     $this->toastr->success('Updated Successfully!');
					  echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));
                   // echo json_encode(array("status" => "success", "message" => "Data Updated Successfully"));
             
            }

        }

    }
	
	function delete($id,$action)
    {

       //  $con = "id = '$id'";
       //  $result = $this->Shows->deleteThisValue($con,"master_union");       
       // echo json_encode(array("status" => "success", "message" => "Data Active Successfully!"));

       

        $message = "Data Active Successfully!";
        $con = "id = '$id'";
        $status='Active';
        if($action==2){
            $data = array(
                'status' => 0                 
            );
        $message = "Data Inactive Successfully!";
        $status='Inactive';

        }
        elseif($action==1){
            $data = array(
                'status' => 1                
            );
        }
        $result = $this->Shows->updateThisValue($data, "master_union", $con);

         //user log submit
         $original_value = $this->D_model->checkId($id);
         $log_des="(".$original_value[0]->union_name.")"." Union ".$status.".";
         user_log($log_des,'admin/union');


        echo json_encode(array("status" => "success", "message" => $message));
       

    }


    
    public function generateListPdf(){
        error_reporting('E_NONE');
        $this->load->library('mpdf/mpdf');
        $mpdf = new mPDF('', 'A4-P', 11, 'nikosh');             
        $mpdf->AddPage('P');
        

        $name = $this->input->post('pdf_name');
        $upazila_id = $this->input->post('pdf_upazila_id');
        $district_id = $this->input->post('pdf_district_id');
        $division_id = $this->input->post('pdf_division_id');
        
       
        if (!empty($name)) {
            $conditions['search']['union_name'] = $name;
        }

        if (!empty($district_id)) {
            $conditions['search']['district_id'] = $district_id;
        }

        if (!empty($division_id)) {
            $conditions['search']['division_id'] = $division_id;
        }

        if (!empty($upazila_id)) {
            $conditions['search']['upazila_id'] = $upazila_id;
        }

        //user log submit
        $log_des="Union list pdf download.";
        user_log($log_des,'admin/union');

        $data['wings'] =  $this->D_model->get_user_data($conditions);
        $data['name'] = $name;
        $data['pdf'] = 1;
        $html = $this->load->view('admin/union/report', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('union-list-report.pdf', 'D');
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
