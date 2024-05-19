<?php
include_once 'BaseController.php';

class Checklist extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       $this->lang->load('master', $this->session->userdata('lang_file'));
       $this->load->model('admin/checklist_model', 'D_model');
    }


    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#checkList';
        $config['base_url'] = base_url() . 'admin/checklist/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "checklist/index";
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
        $name = $this->input->post('title');      

        if (!empty($name)) {
            $conditions['search']['title'] = $name;
        }
        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#checkList';
        $config['base_url'] = base_url() . 'admin/checklist/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/checklist/home', $data);

    }
	
	public function add()
    {
       
        $this->load->view('admin/checklist/entry');

    }
	
	function added()
    {
      
        $this->form_validation->set_rules('title', 'Checklist title', 'trim|required|xss_clean');

    
        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $data = array(
                'title' => $this->input->post('title'),    
				'created_date' => date("Y-m-d"),
                'status' => 1
            );
            $this->Shows->insertData($data, "checklist");
            $this->toastr->success('Inserted Successfully!');

            //user log submit
            $log_des='('. text_format($this->input->post('title'),30)  .')'. "  Checklist created.";
            user_log($log_des,'admin/checklist');

            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }

    }
	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "checklist");       
        $this->load->view('admin/checklist/edit', $data);
    }

    public function show($id,$count1)
    {
		$data['count1'] = $count1;
        $data['array'] = $this->D_model->singlechecklist($id); 
        $this->load->view('admin/checklist/show', $data);
    }
	
	function update()
    {

        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            $original_value = $this->D_model->checkId($id);
            
            $this->form_validation->set_rules('title', 'Checklist title', 'trim|required|xss_clean');




           if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                
                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');
                  
                $data = array(
                'title' => $this->input->post('title'),    
                );
        
               

                $con = "id = '$id'";
                $this->Shows->updateThisValue($data, "checklist", $con);
                 $this->toastr->success('Updated Successfully!');

                //user log submit
                $log_des='('. text_format($this->input->post('title'),30)  .')'. "  Checklist updated.";
                user_log($log_des,'admin/checklist');

				  echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));
             
            }

        }

    }
	
	function delete($id)
    {

        $con = "id = '$id'";

        //user log submit
        $original_value = $this->D_model->checkId($id);
        $log_des="(".$original_value[0]->title.")"." Checklist deleted.";
        user_log($log_des,'admin/checklist');

        $result = $this->Shows->deleteThisValue($con,"checklist");       
       echo json_encode(array("status" => "success", "message" => "Data Deleted Successfully!"));
       

    }

    protected function now_upload($data, $file)
    {
        $nfile = explode(".", $file);
        $fileExt = array_pop($nfile);
        $file_name = date('d-m-Y') . '_' . time() . "." . $fileExt;
        $config['upload_path'] = './public/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size'] = 100000;
        $config['max_width'] = 102400;
        $config['max_height'] = 100000;
        $config['encrypt_name'] = true;
        $config['file_name'] = $file_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($data)) {
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
