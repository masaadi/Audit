<?php
include_once 'BaseController.php';

class Assign_designation extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       $this->lang->load('config', $this->session->userdata('lang_file'));
        $this->load->model('admin/assign_designation_model', 'D_model');
    }



    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#designationList';
        $config['base_url'] = base_url() . 'admin/assign_designation/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		$this->data['dynamicView'] = "assign_designation/index";
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
        $name = $this->input->post('office_id');      

        if (!empty($name)) {
            $conditions['search']['office_id'] = $name;
        }
        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#designationList';
        $config['base_url'] = base_url() . 'admin/designation/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/assign_designation/home', $data);

    }
	
	public function add()
    {
       
        $this->load->view('admin/assign_designation/entry');

    }
	
	function added()
    {
        $designation_id = $this->input->post('designation_id');
        $office_id = $this->input->post('office_id');

        $this->form_validation->set_rules('office_id', 'Office', 'trim|required');
        $this->form_validation->set_rules('designation_id', 'Designation', 'trim|required');

        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $duplicate_check = $this->db->where('office_id',$office_id)->where('designation_id',$designation_id)->get('assign_designation')->row();

            if(!empty($duplicate_check)){
                $this->toastr->warning('Data Already exist');
                echo json_encode(array("status" => "warning", "message" => "Data Already exist")); 
            }else{
                $data = array(
                'office_id' => $this->input->post('office_id'), 
                'designation_id' => $this->input->post('designation_id'), 
                'created_by' => $this->userId,
                'created_date' => date("Y-m-d")
                );
                $this->Shows->insertData($data, "assign_designation");
                  //user log submit
                  $log_des='('. text_format($this->input->post('designation_id'),30)  .')'. " Designation Assigned.";
                  user_log($log_des,'admin/assign_designation');

                $this->toastr->success('Inserted Successfully!');
                echo json_encode(array("status" => "success", "message" => "Data save successfully")); 
            }

                      

        }

    }
	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "assign_designation");       
        $this->load->view('admin/assign_designation/edit', $data);
    }
	
	function update()
    {

        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            $designation_id = $this->input->post('designation_id');
            $office_id = $this->input->post('office_id');

            $this->form_validation->set_rules('office_id', 'Office', 'trim|required');
            $this->form_validation->set_rules('designation_id', 'Designation', 'trim|required');

           if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $duplicate_check = $this->db->where('office_id',$office_id)->where('designation_id',$designation_id)->get('assign_designation')->row();

                if(!empty($duplicate_check) && ($duplicate_check != $id)){
                    $this->toastr->warning('Data Already exist');
                    echo json_encode(array("status" => "warning", "message" => "Data Already exist")); 
                }else{
                    $id = $this->input->post('id');
                    $page_num = $this->input->post('page_no');
                    $designation_name = $this->input->post('designation_name');                
                        $data = array(
                            'office_id' => $this->input->post('office_id'), 
                            'designation_id' => $this->input->post('designation_id'), 
                            'created_by' => $this->userId,
                            'created_date' => date("Y-m-d")
                        );
                        $con = "id = '$id'";
                        $this->Shows->updateThisValue($data, "assign_designation", $con);

                          //user log submit
                          $log_des='('. text_format($this->input->post('designation_id'),30)  .')'. " Designation Assigned.";
                          user_log($log_des,'admin/assign_designation');

                        $this->toastr->success('Inserted Successfully!');
                        echo json_encode(array("status" => "success", "message" => "Data save successfully"));
                }                
             
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

        $result = $this->Shows->updateThisValue($data, "assign_designation", $con);
        //user log submit
        $original_value = $this->D_model->checkId($id);
        $log_des="(".$original_value[0]->designation_id.")"." Designation ".$status.".";
        user_log($log_des,'admin/designation');
        
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
