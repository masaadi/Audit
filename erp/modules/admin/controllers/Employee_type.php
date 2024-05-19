<?php
include_once 'BaseController.php';

class Employee_type extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('config', $this->session->userdata('lang_file'));
        $this->load->model('admin/employee_type_model', 'D_model');
    }



    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#designationList';
        $config['base_url'] = base_url() . 'admin/employee_type/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "employee_type/index";
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
        $name = $this->input->post('employee_type');      

        if (!empty($name)) {
            $conditions['search']['type_name'] = $name;
        }
        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#sectionList';
        $config['base_url'] = base_url() . 'admin/employee_type/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/employee_type/home', $data);

    }
	
	public function add()
    {
       
        $this->load->view('admin/employee_type/entry');

    }
	
	function added()
    {

        $this->form_validation->set_rules('type_name', 'Employee Type', 'trim|required|is_unique[employee_type.type_name]|xss_clean');

        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $data = array(
                'type_name' => $this->input->post('type_name'), 
                'created_by' => $this->userId,
				'created_date' => date("Y-m-d")
            );
            $this->Shows->insertData($data, "employee_type");
              //user log submit
              $log_des='('. text_format($this->input->post('type_name'),30)  .')'. " section created.";
              user_log($log_des,'admin/type_name');

            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }

    }
	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "employee_type");       
        $this->load->view('admin/employee_type/edit', $data);
    }
	
	function update()
    {

        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            $original_value = $this->D_model->checkId($id);
             if (strtolower($this->input->post('type_name')) != strtolower($original_value[0]->type_name)) {
                $is_unique = '|is_unique[employee_type.type_name]';
            } else {
                $is_unique = '';
            }
            $this->form_validation->set_rules('type_name', 'Employee Type', 'trim|required|xss_clean'. $is_unique);
           if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');
                $type_name = $this->input->post('type_name');                
                    $data = array(
                       'type_name' => $this->input->post('type_name'), 
                    );
                    $con = "id = '$id'";
                    $this->Shows->updateThisValue($data, "employee_type", $con);

                    //user log submit
                    $log_des='('. text_format($this->input->post('type_name'),30)  .')'. " Employee Type updated.";
                    user_log($log_des,'admin/type_name');

                    $this->toastr->success('Updated Successfully!');
					  echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));             
            }

        }

    }
	
	function delete($id,$action)
    {
        
        $message = "Data Active Successfully!";
        $status='Active';
        $con = "id = '$id'";
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

        $result = $this->Shows->updateThisValue($data, "employee_type", $con);
        //user log submit
        $original_value = $this->D_model->checkId($id);
        $log_des="(".$original_value[0]->type_name.")"." employee_type ".$status.".";
        user_log($log_des,'admin/employee_type');
        
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
