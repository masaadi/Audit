<?php
include_once 'BaseController.php';

class User extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('config', $this->session->userdata('lang_file'));
        $this->lang->load('user', $this->session->userdata('lang_file'));
        $this->load->model('admin/user_model', 'D_model');
    }



    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#userList';
        $config['base_url'] = base_url() . 'admin/user/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "user/index";
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

        $ser_name     = $this->input->post('ser_name');      
        $ser_username = $this->input->post('ser_username');      
        $ser_email    = $this->input->post('ser_email');      
        $ser_roel_id  = $this->input->post('ser_roel_id');      

        if (!empty($ser_name)) {
            $conditions['search']['ser_name'] = $ser_name;
        }
        if (!empty($ser_username)) {
            $conditions['search']['ser_username'] = $ser_username;
        }
        if (!empty($ser_email)) {
            $conditions['search']['ser_email'] = $ser_email;
        }
        if (!empty($ser_roel_id)) {
            $conditions['search']['ser_roel_id'] = $ser_roel_id;
        }
        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#userList';
        $config['base_url'] = base_url() . 'admin/user/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/user/home', $data);

    }
	
	public function add()
    {
        
        $priv = $this->D_model->get_all_privileges();
        $data['privileges'] = array();

        $m_index = 'module_name';
        if($this->session->userdata("lang_file")=='bn'){
            $m_index = 'module_name_bn';
        }

        if($priv){
            foreach ($priv as $k => $v) {
                $data['privileges'][$v[$m_index]][] = $v;
            }
        }
        $this->load->view('admin/user/entry', $data);

    }
	
	function added()
    {
        $this->form_validation->set_rules('role_id', 'Usertype', 'trim|required|xss_clean');
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
		
		
		if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {
            $verify_pass=md5(rand().rand().rand());
            $data = array(
                'role_id' => $this->input->post('role_id'),
                'first_name' => $this->input->post('first_name'), 				
                'last_name' => $this->input->post('last_name'),
				'full_name' => $this->input->post('first_name')." ".$this->input->post('last_name'),
                'username' => $this->input->post('username'),
				'user_prefixe' => $this->input->post('user_prefixe'),
                'password' => crypt($this->dx_auth->_encode($this->input->post("password")), ''),
                'verify_password' =>$verify_pass,               
                'email' => $this->input->post('email'),             
                'status_id' => $this->input->post('status_id'),				
				'created' => date("Y-m-d")
            );
            $insert_id = $this->Shows->insertData($data, "users");

            $privilege_cou = 0;
            if(!empty($this->input->post('menu_ck_id')) AND count($this->input->post('menu_ck_id')) > 0 ){
                $privilege_cou = count($this->input->post('menu_ck_id'));
            }
            if($privilege_cou>0){
                $data1 = array();
                for($i=0; $i<count($this->input->post('menu_ck_id')) ;$i++){
                    $explode_data = explode("~",base64_decode($this->input->post('menu_ck_id')[$i]));
                    $menu_id   = $explode_data[0];
                    $module_id = $explode_data[1];

                    $data1[$i] = array(
                        'user_id' => $insert_id,
                        'module_id' => $module_id,
                        'menu_id' => $menu_id,
                        'created_by' => $this->userId
                    );
                }
                $this->db->insert_batch('user_privilege', $data1); 
            }

            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }

    }
	
	public function edit($id,$count1)
    {
        #previlege 
        $priv = $this->D_model->get_all_privileges();
        $data['privileges'] = array();

        $m_index = 'module_name';
        if($this->session->userdata("lang_file")=='bn'){
            $m_index = 'module_name_bn';
        }

        $all_check_res = false;
        $count_menu = 0;
        if($priv){
            foreach ($priv as $k => $v) {
                if($v['module_id']){
                    $data['privileges'][$v[$m_index]."~".$v['module_id']][] = $v;
                    $count_menu++;
                }else{
                    $data['privileges'][$v[$m_index]][] = $v;
                    $count_menu++;
                }
                
            }
        }
        $data['cur_pvlg'] =  $this->D_model->updated_user_privilege($id);
        if(count($data['cur_pvlg']['menu']) == $count_menu){
            $all_check_res = true;
        }
        $data['all_check_res'] = $all_check_res;
        #end previlege

        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "users");       
        $this->load->view('admin/user/edit', $data);
    }
	
	function update()
    {

        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            $original_value = $this->D_model->checkId($id);
             if (strtolower($this->input->post('username')) != strtolower($original_value[0]->username)) {
                $is_unique = '|is_unique[users.username]';
            } else {
                $is_unique = '';
            }
			
            $this->form_validation->set_rules('role_id', 'Usertype', 'trim|required|xss_clean');
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|xss_clean');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean'. $is_unique);

            if($this->input->post("password") OR $this->input->post("confirm_password")){
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'matches[password]');
            }
            
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
		   if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');

                $data = array(
                    'role_id' => $this->input->post('role_id'),
                    'first_name' => $this->input->post('first_name'),               
                    'last_name' => $this->input->post('last_name'),
                    'full_name' => $this->input->post('first_name')." ".$this->input->post('last_name'),
                    'username' => $this->input->post('username'),  
                    'user_prefixe' => $this->input->post('user_prefixe'),            
                    'email' => $this->input->post('email'),  
                    'status_id' => $this->input->post('status_id'),            
                    'created' => date("Y-m-d")
                );
                if($this->input->post("password")){
                    $data['password'] =  crypt($this->dx_auth->_encode($this->input->post("password")),'');
                }
                $con = "id = '$id'";
                $this->Shows->updateThisValue($data, "users", $con);

                // Usr privilage
                $privilege_cou = 0;
                if(!empty($this->input->post('menu_ck_id')) AND count($this->input->post('menu_ck_id')) > 0 ){
                    $privilege_cou = count($this->input->post('menu_ck_id'));
                }
                if($privilege_cou>0){
                    $data1 = array();
                    for($i=0; $i<count($this->input->post('menu_ck_id')) ;$i++){
                        $explode_data = explode("~",base64_decode($this->input->post('menu_ck_id')[$i]));
                        $menu_id   = $explode_data[0];
                        $module_id = $explode_data[1];

                        $data1[$i] = array(
                            'user_id' => $id,
                            'module_id' => $module_id,
                            'menu_id' => $menu_id,
                            'created_by' => $this->userId
                        );
                    }
                    $con = "user_id = '$id'";
                    $result = $this->Shows->deleteThisValue($con,"user_privilege");

                    $this->db->insert_batch('user_privilege', $data1); 
                }

                $this->toastr->success('Updated Successfully!');
				echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));
            }

        }

    }
	
	function delete($id)
    {

        $con = "id = '$id'";
        $result = $this->Shows->deleteThisValue($con,"menu");       
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
