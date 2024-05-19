<?php
include_once 'BaseController.php';

class Office_category extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('config', $this->session->userdata('lang_file'));
        $this->load->model('admin/office_category_model', 'D_model');
    }



    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#office_categoryList';
        $config['base_url'] = base_url() . 'admin/office_category/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "office_category/index";
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
        $name = $this->input->post('off_cat_name');      

        if (!empty($name)) {
            $conditions['search']['off_cat_name'] = $name;
        }
        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#office_categoryList';
        $config['base_url'] = base_url() . 'admin/office_category/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/office_category/home', $data);

    }
	
	public function add()
    {
       
        $this->load->view('admin/office_category/entry');

    }
	
	function added()
    {

        $this->form_validation->set_rules('office_category_name', 'Office Category', 'trim|required|is_unique[office_category.office_category_name]|xss_clean');

        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);
        } else {

            $data = array(
                'office_category_name' => $this->input->post('office_category_name'),
                'created_by' => $this->userId,
				'created_date' => date("Y-m-d")
            );
            $this->Shows->insertData($data, "office_category");

            //user log submit
            $log_des='('. text_format($this->input->post('office_category_name'),30)  .')'. " . Office category created.";
            user_log($log_des,'admin/office_category');

            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }

    }
	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "office_category");       
        $this->load->view('admin/office_category/edit', $data);
    }
	
	function update()
    {

        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            $original_value = $this->D_model->checkId($id);
             if (strtolower($this->input->post('office_category_name')) != strtolower($original_value[0]->office_category_name)) {
                $is_unique = '|is_unique[office_category.office_category_name]';
            } else {
                $is_unique = '';
            }
            // $this->form_validation->set_rules('wing_id', 'Wing ID', 'trim|required|xss_clean');
            $this->form_validation->set_rules('office_category_name', 'Office Category', 'trim|required|xss_clean'. $is_unique);
           if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {
                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');
                $office_category_name = $this->input->post('office_category_name');               
                $data = array(
                    'office_category_name' => $this->input->post('office_category_name'),          
                );
                    $con = "id = '$id'";
                    $this->Shows->updateThisValue($data, "office_category", $con);

                    //user log submit
                    $log_des='('. text_format($this->input->post('office_category_name'),30)  .')'. " . Office category updated.";
                    user_log($log_des,'admin/office_category');

                     $this->toastr->success('Updated Successfully!');
					  echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));             
            }

        }

    }
	
	function delete($id)
    {

        $con = "id = '$id'";
        $result = $this->Shows->deleteThisValue($con,"office_category");       
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
