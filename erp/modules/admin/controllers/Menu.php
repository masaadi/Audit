<?php
include_once 'BaseController.php';

class Menu extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('config', $this->session->userdata('lang_file'));
        $this->load->model('admin/menu_model', 'D_model');
    }



    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#menuList';
        $config['base_url'] = base_url() . 'admin/menu/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "menu/index";
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
        $name   = $this->input->post('m_name');      
        $mdl_id = $this->input->post('mdl_id');      

        if (!empty($name)) {
            $conditions['search']['m_name'] = $name;
        }
        if (!empty($mdl_id)) {
            $conditions['search']['module_id'] = $mdl_id;
        }
        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#menuList';
        $config['base_url'] = base_url() . 'admin/menu/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/menu/home', $data);

    }
	
	public function add()
    {
        
        $data['module_list'] = $this->D_model->moduel_list();
        $this->load->view('admin/menu/entry', $data);

    }
	
	function added()
    {

        //$this->form_validation->set_rules('module_id', 'Module Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('menu_name', 'Menu Name', 'trim|required|is_unique[menu.menu_name]|xss_clean');       

		$this->form_validation->set_rules('url', 'Url', 'trim|required|xss_clean');

        $duplicate_check_module_soart = $this->D_model->duplicate_check_module_soart($this->input->post('module_id'),$this->input->post('sorting_order'));

        if($duplicate_check_module_soart){
            $this->form_validation->set_rules('sorting_order', 'Sorting Order', 'trim|required|is_unique[menu.sorting_order]|xss_clean');
        }else{
            $this->form_validation->set_rules('sorting_order', 'Sorting Order', 'trim|required|xss_clean');
        }
		
		
		if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $data = array(
                'menu_name' => $this->input->post('menu_name'),
                'module_id' => $this->input->post('module_id'), 				
				'sorting_order' => $this->input->post('sorting_order'),
                'url' => $this->input->post('url'),             
                'status' => 1,             
                'created_by' => $this->userId,
				'created_date' => date("Y-m-d")
            );
            $this->Shows->insertData($data, "menu");

            //user log submit
            $log_des='('. text_format($this->input->post('menu_name'),30)  .')'. "  Menu created.";
            user_log($log_des,'admin/menu');


            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }

    }
	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "menu");   
        $data['module_list'] = $this->D_model->moduel_list();    
        $this->load->view('admin/menu/edit', $data);
    }
	
	function update()
    {

        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            $original_value = $this->D_model->checkId($id);
             if (strtolower($this->input->post('menu_name')) != strtolower($original_value[0]->menu_name)) {
                $is_unique = '|is_unique[menu.menu_name]';
            } else {
                $is_unique = '';
            }
			

            if (strtolower($this->input->post('sorting_order')) != strtolower($original_value[0]->sorting_order)) {
                $is_unique2 = '|is_unique[menu.sorting_order]';
            } else {
                $is_unique2 = '';
            }
            
            $this->form_validation->set_rules('menu_name', 'Menu Name', 'trim|required|xss_clean'. $is_unique);

		    $this->form_validation->set_rules('url', 'Url', 'trim|required|xss_clean');

            $duplicate_check_module_soart = $this->D_model->duplicate_check_module_soart($this->input->post('module_id'), $this->input->post('sorting_order'), $id);
            
            if($duplicate_check_module_soart){
                $this->form_validation->set_rules('sorting_order', 'Sorting Order', 'trim|required|is_unique[menu.sorting_order]|xss_clean');
            }else{
                $this->form_validation->set_rules('sorting_order', 'Sorting Order', 'trim|required|xss_clean');
            }


		   if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');
                // $wing_id = $this->input->post('wing_id');
                $menu_name = $this->input->post('menu_name');                
                    $data = array(
                       'menu_name' => $this->input->post('menu_name'),
                'module_id' => $this->input->post('module_id'), 				
				'sorting_order' => $this->input->post('sorting_order'),
                'url' => $this->input->post('url'),
                //'icon' => $this->input->post('pro_icon'),                         
                    );
                    $con = "id = '$id'";
                    $this->Shows->updateThisValue($data, "menu", $con);

                    //user log submit
                    $log_des='('. text_format($this->input->post('menu_name'),30)  .')'. "  Menu updated.";
                    user_log($log_des,'admin/menu');


                    echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));
                   // echo json_encode(array("status" => "success", "message" => "Data Updated Successfully"));
             
            }

        }

    }
	
	function delete($id,$action)
    {
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
       $result = $this->Shows->updateThisValue($data, "menu", $con);

        //user log submit
        $original_value = $this->D_model->checkId($id);
        $log_des="(".$original_value[0]->menu_name.")"." Menu ".$status.".";
        user_log($log_des,'admin/menu');
        
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
