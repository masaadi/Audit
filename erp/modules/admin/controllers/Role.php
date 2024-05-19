<?php
include_once 'BaseController.php';

class Role extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('role', $this->session->userdata('lang_file'));
        $this->load->model('admin/role_model', 'D_model');
    }



    public function index()
    {
        //method for check permissions
         $user_privileges=$this->session->userdata('user_privileges');
         checkResult($user_privileges);
         
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#roleList';
        $config['base_url'] = base_url() . 'admin/role/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "role/index";
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
        $name   = $this->input->post('r_name');      
        $s_parent_id   = $this->input->post('s_parent_id');      

        if (!empty($name)) {
            $conditions['search']['r_name'] = $name;
        }
        if (!empty($s_parent_id)) {
            $conditions['search']['s_parent_id'] = $s_parent_id;
        }
        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#roleList';
        $config['base_url'] = base_url() . 'admin/role/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/role/home', $data);

    }
	
	public function add()
    {
        $this->load->view('admin/role/entry');
    }
	
	function added()
    {

		$this->form_validation->set_rules('name', 'Role Name', 'trim|required|xss_clean');

		
		if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $data = array(
                'name' => $this->input->post('name'), 				
                'created_by' => $this->userId
            );
            $this->Shows->insertData($data, "roles");
            $this->toastr->success('Inserted Successfully!');
            //user log submit
            $log_des='('. text_format($this->input->post('name'),30)  .')'. "  Role updated.";
            user_log($log_des,'admin/role');
            

            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }

    }
	
	public function edit($id,$count1)
    {
        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "roles");       
        $this->load->view('admin/role/edit', $data);
    }
	
	function update()
    {
        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            
            $this->form_validation->set_rules('name', 'Role Name', 'trim|required|xss_clean');
            
		   if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');

                $menu_name = $this->input->post('menu_name');                
                $data = array(
                    'name' => $this->input->post('name'),               
                );
                $con = "id = '$id'";
                $this->Shows->updateThisValue($data, "roles", $con);
                $this->toastr->success('Updated Successfully!');

                //user log submit
                $log_des='('. text_format($this->input->post('name'),30)  .')'. "  Role updated.";
                user_log($log_des,'admin/role');

				echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));
             
            }

        }

    }
	
	function delete($id)
    {
        $con = "id = '$id'";
        $result = $this->Shows->deleteThisValue($con,"roles");       
        echo json_encode(array("status" => "success", "message" => "Data Active Successfully!"));
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
