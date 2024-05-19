<?php
include_once 'BaseController.php';

class Module extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('config', $this->session->userdata('lang_file'));
        $this->load->model('admin/module_model', 'D_model');
    }



    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#moduleList';
        $config['base_url'] = base_url() . 'admin/module/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "module/index";
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
        $name = $this->input->post('mod_name');      

        if (!empty($name)) {
            $conditions['search']['mod_name'] = $name;
        }
        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#moduleList';
        $config['base_url'] = base_url() . 'admin/module/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/module/home', $data);

    }
	
	public function add()
    {
       
        $this->load->view('admin/module/entry');

    }
	
	function added()
    {

        $this->form_validation->set_rules('module_name', 'Module Name', 'trim|required|is_unique[module.module_name]|xss_clean');

        $this->form_validation->set_rules('sorting_order', 'Sorting Order', 'trim|required|is_unique[module.sorting_order]|xss_clean');

		if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $icon_name = '';
            $icon_uplo = $_FILES['pro_icon']['name'];


            if ($icon_uplo != '') {
                $icon_name = $this->now_upload('pro_icon', $icon_uplo);
            }

            $data = array(
                'module_name' => $this->input->post('module_name'), 
				'sorting_order' => $this->input->post('sorting_order'),
                'icon' => $icon_name,                
                // 'icon' => $this->input->post('pro_icon'),				
                'created_by' => $this->userId,
                'status' => 1,
				'created_date' => date("Y-m-d")
            );
            $this->Shows->insertData($data, "module");


            //user log submit
            $log_des='('. text_format($this->input->post('module_name'),30)  .')'. "  Module created.";
            user_log($log_des,'admin/module');

            
            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }

    }
	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "module");       
        $this->load->view('admin/module/edit', $data);
    }
	
	function update()
    {

        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            $original_value = $this->D_model->checkId($id);
             if (strtolower($this->input->post('module_name')) != strtolower($original_value[0]->module_name)) {
                $is_unique = '|is_unique[module.module_name]';
            } else {
                $is_unique = '';
            }
			

            if (strtolower($this->input->post('sorting_order')) != strtolower($original_value[0]->sorting_order)) {
                $is_unique2 = '|is_unique[module.sorting_order]';
            } else {
                $is_unique2 = '';
            }
            
            $this->form_validation->set_rules('module_name', 'Module Name', 'trim|required|xss_clean'. $is_unique);

           $this->form_validation->set_rules('sorting_order', 'Sorting Order', 'trim|required|xss_clean'.$is_unique2);
		   if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');
                // $wing_id = $this->input->post('wing_id');
                $module_name = $this->input->post('module_name');                
                    $data = array(
                       'module_name' => $this->input->post('module_name'), 
                       'sorting_order' => $this->input->post('sorting_order'),                      
				       //'icon' => $this->input->post('pro_icon'),
                       //'status' => 1,                      
                    );

                    $icon_name = '';
                    $icon_uplo = $_FILES['pro_icon']['name'];


                    if ($icon_uplo != '') {
                        $icon_name = $this->now_upload('pro_icon', $icon_uplo);
                        $data['icon'] = $icon_name;
                    }

                    $con = "id = '$id'";
                    $this->Shows->updateThisValue($data, "module", $con);

                    //user log submit
                    $log_des='('. text_format($this->input->post('module_name'),30)  .')'. "  Module updated.";
                    user_log($log_des,'admin/module');

                     $this->toastr->success('Updated Successfully!');
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
        $result = $this->Shows->updateThisValue($data, "module", $con);

         //user log submit
         $original_value = $this->D_model->checkId($id);
         $log_des="(".$original_value[0]->module_name.")"." Module ".$status.".";
         user_log($log_des,'admin/module');
         



       echo json_encode(array("status" => "success", "message" => $message));
       

    }

    protected function now_upload($data, $file)
    {
        $nfile = explode(".", $file);
        $fileExt = array_pop($nfile); 
        $file_name = date('d-m-Y') . '_' . time() . "." . $fileExt;
        $config['upload_path'] = './public/uploads/module_icon/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 100000;
        $config['max_width'] = 102400;
        $config['max_height'] = 100000;
        $config['encrypt_name'] = true;
        $config['file_name'] = $file_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($data)) {
            echo $this->upload->display_errors(); exit; 
            return $this->upload->display_errors();
        } else {
            return $recipe_file = $this->upload->data('file_name');
            // $file = $config['file_name'];
            // return $file;
        }
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
