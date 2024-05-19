<?php
include_once 'BaseController.php';

class Slider_image extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       $this->lang->load('webinfo', $this->session->userdata('lang_file'));
       $this->load->model('admin/slider_image_model', 'D_model');
    }


    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#slider_imageList';
        $config['base_url'] = base_url() . 'admin/slider_image/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "slider_image/index";
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
        $config['target'] = '#slider_imageList';
        $config['base_url'] = base_url() . 'admin/slider_image/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/slider_image/home', $data);

    }
	
	public function add()
    {
       
        $this->load->view('admin/slider_image/entry');

    }
	
	function added()
    {

        $slider_img_name = '';
        $user_slider_img = $_FILES['image_url']['name'];
        if ($user_slider_img != '') {
            $slider_img_name = $this->now_upload('image_url', $user_slider_img);
        }

        $this->form_validation->set_rules('image_title', 'Image Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('image_title_bn', 'Image Title (Bangla)', 'trim|required|xss_clean');        

        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $data = array(
                'image_title' => $this->input->post('image_title'),    
                'image_title_bn' => $this->input->post('image_title_bn'),
                'image_url' => $slider_img_name,               
                'created_by' => $this->userId,
				'created_date' => date("Y-m-d"),
                'status' => 1
            );
            $this->Shows->insertData($data, "slider_image");

                //user log submit
                $log_des='('.text_format($this->input->post('image_title'),30).')'. "  Slider created.";
                user_log($log_des,'admin/slider_image');

            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }

    }

	
	public function edit($id,$count1)
    {

        $con = "id = '$id'";
		$data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "slider_image");       
        $this->load->view('admin/slider_image/edit', $data);
    }

    public function see($id,$count1)
    {

        $con = "id = '$id'";
        $data['count1'] = $count1;
        $data['array'] = $this->Shows->getThisValue($con, "slider_image");       
        $this->load->view('admin/slider_image/see', $data);
    }
	
	function update()
    {



        if ($this->input->post('id')) {
			$id = $this->input->post('id');
            $original_value = $this->D_model->checkId($id);
            
            $this->form_validation->set_rules('image_title', 'Image Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('image_title_bn', 'Image Title (Bangla)', 'trim|required|xss_clean');

           if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $slider_img_name = '';
                $user_slider_img = $_FILES['image_url']['name'];
                if ($user_slider_img != '') {
                    $slider_img_name = $this->now_upload('image_url', $user_slider_img);
                }

                $id = $this->input->post('id');
				$page_num = $this->input->post('page_no');
                  
                if(empty($slider_img_name)){
                     $data = array(
                        'image_title' => $this->input->post('image_title'),    
                        'image_title_bn' => $this->input->post('image_title_bn'),
                    );
                }else{
                    $data = array(
                        'image_title' => $this->input->post('image_title'),    
                        'image_title_bn' => $this->input->post('image_title_bn'),
                        'image_url' => $slider_img_name,    
                    );
                }
               

                $con = "id = '$id'";
                $this->Shows->updateThisValue($data, "slider_image", $con);

                //user log submit
                $log_des='('.text_format($this->input->post('image_title'),30).')'. "  Slider update.";
                user_log($log_des,'admin/slider_image');

                 $this->toastr->success('Updated Successfully!');
				  echo json_encode(array("status" => "success","page_num"=>$page_num, "message" => "Data Updated Successfully"));
               // echo json_encode(array("status" => "success", "message" => "Data Updated Successfully"));
             
            }

        }

    }
	
	function delete($id)
    {

        $con = "id = '$id'";
        $result = $this->Shows->deleteThisValue($con,"slider_image");       
       echo json_encode(array("status" => "success", "message" => "Data Active Successfully!"));
       

    }


    public function active($id){
        $con = "id = '$id'";
        $data = array('status' => 1);
        $result = $this->Shows->updateThisValue($data, 'slider_image', $con);       
        echo json_encode(array("status" => "success", "message" => "Data Active Successfully!"));
    }

    public function inactive($id){
        $con = "id = '$id'";
        $data = array('status' => 0);
        $result = $this->Shows->updateThisValue($data, 'slider_image', $con);       
        echo json_encode(array("status" => "success", "message" => "Data Inactive Successfully!"));
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
