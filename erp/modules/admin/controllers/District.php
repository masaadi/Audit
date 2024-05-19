<?php
include_once 'BaseController.php';

class District extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       $this->lang->load('master', $this->session->userdata('lang_file'));
        $this->load->model('admin/district_model', 'D_model');
    }



    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#districtList';
        $config['base_url'] = base_url() . 'admin/district/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "district/index";
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
        $name = $this->input->post('div_name');      

        if (!empty($name)) {
            $conditions['search']['div_name'] = $name;
        }
        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#districtList';
        $config['base_url'] = base_url() . 'admin/district/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/district/home', $data);

    }
	
	public function add()
    {
        $this->load->view('admin/district/entry');

    }
	
	function added()
    {

        $this->form_validation->set_rules('district_name', 'District Name', 'trim|required|is_unique[district.district_name]|xss_clean');
        $this->form_validation->set_rules('code', 'Code ', 'trim|required|xss_clean');

        $this->form_validation->set_rules('division_id', 'Division', 'trim|required|xss_clean');

          if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $data = array(
                'division_id' => $this->input->post('division_id'), 
                'district_name' => $this->input->post('district_name'),
                'code' => $this->input->post('code'),               
                'created_by' => $this->userId,
				'created_date' => date("Y-m-d")
            );
            $this->Shows->insertData($data, "district");
             //user log submit
             $log_des='('. text_format($this->input->post('district_name'),30)  .')'. "  District created.";
             user_log($log_des,'admin/district');

            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }

    }
	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;

        $data['array'] = $this->Shows->getThisValue($con, "district");  

        $this->load->view('admin/district/edit', $data);
    }
	
	function update()
    {

        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            $original_value = $this->D_model->checkId($id);
             if (strtolower($this->input->post('district_name')) != strtolower($original_value[0]->district_name)) {
                $is_unique = '|is_unique[district.district_name]';
            } else {
                $is_unique = '';
            }

            // if (strtolower($this->input->post('code')) != strtolower($original_value[0]->code)) {
            //     $is_unique_code = '|is_unique[district.code]';
            // } else {
            //     $is_unique_code = '';
            // }


            // $this->form_validation->set_rules('wing_id', 'Wing ID', 'trim|required|xss_clean');
            $this->form_validation->set_rules('district_name', 'District Name', 'trim|required|xss_clean'. $is_unique);
            $this->form_validation->set_rules('code', 'Code ', 'trim|required|xss_clean');

            $this->form_validation->set_rules('division_id', 'Division', 'trim|required|xss_clean');
           if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');
                // $wing_id = $this->input->post('wing_id');
                $district_name = $this->input->post('district_name');                
                    $data = array(
                        // 'WING_ID' => $this->input->post('wing_id'),
                        'district_name' => $this->input->post('district_name'),  
                        'code' => $this->input->post('code'),  
                        'division_id' => $this->input->post('division_id'),                      
                    );
                    $con = "id = '$id'";
                    $this->Shows->updateThisValue($data, "district", $con);

                    //user log submit
                    $log_des='('. text_format($this->input->post('district_name'),30)  .')'. "  District updated.";
                    user_log($log_des,'admin/district');

                     $this->toastr->success('Updated Successfully!');
					  echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));
                   // echo json_encode(array("status" => "success", "message" => "Data Updated Successfully"));
             
            }

        }

    }
	
	function delete($id,$action)
    {

       //  $con = "id = '$id'";
       //  $result = $this->Shows->deleteThisValue($con,"district");       
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
       $result = $this->Shows->updateThisValue($data, "district", $con);

        //user log submit
        $original_value = $this->D_model->checkId($id);
        $log_des="(".$original_value[0]->district_name.")"." District ".$status.".";
        user_log($log_des,'admin/district');




        echo json_encode(array("status" => "success", "message" => $message));
       

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
