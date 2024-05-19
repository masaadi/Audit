<?php
include_once 'BaseController.php';

class Web_blocks extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       $this->lang->load('webinfo', $this->session->userdata('lang_file'));
       //$this->load->model('admin/web_blocks_model', 'D_model');
    }


    public function service()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);

        $con = "id = 1";
        $this->data['service'] = $this->Shows->getThisValue($con, "web_blocks");
		        
		$this->data['dynamicView'] = "web_blocks/service";
        $this->_commonPageLayout('viewer');
     
    }

    public function added_service(){
        $this->form_validation->set_rules('service_title', 'Service Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('service_title_bn', 'Service Title (Bangla)', 'trim|required|xss_clean');
        $this->form_validation->set_rules('service_content', 'Service Content', 'trim|required|xss_clean');
        $this->form_validation->set_rules('service_content_bn', 'Service Content (Bangla)', 'trim|required|xss_clean');

        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $data = array(
                'block_title' => $this->input->post('service_title'),    
                'block_title_bn' => $this->input->post('service_title_bn'),
                'block_content' => $this->input->post('service_content'),    
                'block_content_bn' => $this->input->post('service_content_bn'),
                'created_by' => $this->userId,
                'created_date' => date("Y-m-d"),
                'status' => 1
            );
            $this->Shows->insertData($data, "web_blocks");
            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }
    }

    public function update_service(){
        if ($this->input->post('id')) {
            
            
            $this->form_validation->set_rules('service_title', 'Service Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('service_title_bn', 'Service Title (Bangla)', 'trim|required|xss_clean');

            $this->form_validation->set_rules('service_content', 'Service Content', 'trim|required|xss_clean');
            $this->form_validation->set_rules('service_content_bn', 'Service Content (Bangla)', 'trim|required|xss_clean');


           if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $id = $this->input->post('id');                  
                
                $data = array(
                    'block_title' => $this->input->post('service_title'),    
                    'block_title_bn' => $this->input->post('service_title_bn'),
                    'block_content' => $this->input->post('service_content'),    
                    'block_content_bn' => $this->input->post('service_content_bn'),
                );               

                $con = "id = '$id'";
                $this->Shows->updateThisValue($data, "web_blocks", $con);
                 //user log submit
                 $log_des='('.text_format($this->input->post('service_title'),30).')'. "  Services updated.";
                 user_log($log_des,'admin/web_blocks');


                 $this->toastr->success('Updated Successfully!');
                  echo json_encode(array("status" => "success", "message" => "Data Updated Successfully"));
             
            }

        }
    }

    public function about()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);

        $con = "id = 2";
        $this->data['about'] = $this->Shows->getThisValue($con, "web_blocks");
                
        $this->data['dynamicView'] = "web_blocks/about";
        $this->_commonPageLayout('viewer');
     
    }

    public function added_about(){
        $this->form_validation->set_rules('about_title', 'About Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('about_title_bn', 'About Title (Bangla)', 'trim|required|xss_clean');
        $this->form_validation->set_rules('about_content', 'About Content', 'trim|required|xss_clean');
        $this->form_validation->set_rules('about_content_bn', 'About Content (Bangla)', 'trim|required|xss_clean');

        $about_img_name_1 = '';
        $user_about_img_1 = $_FILES['image_url1']['name'];
        if ($user_about_img_1 != '') {
            $about_img_name_1 = $this->now_upload('image_url1', $user_about_img_1);
        }

        $about_img_name_2 = '';
        $user_about_img_2 = $_FILES['image_url2']['name'];
        if ($user_about_img_2 != '') {
            $about_img_name_2 = $this->now_upload('image_url2', $user_about_img_2);
        }

        $about_img_name_3 = '';
        $user_about_img_3 = $_FILES['image_url3']['name'];
        if ($user_about_img_3 != '') {
            $about_img_name_3 = $this->now_upload('image_url3', $user_about_img_3);
        }

        $about_img_name_4 = '';
        $user_about_img_4 = $_FILES['image_url4']['name'];
        if ($user_about_img_4 != '') {
            $about_img_name_4 = $this->now_upload('image_url4', $user_about_img_4);
        }

        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $data = array(
                'block_title' => $this->input->post('about_title'),    
                'block_title_bn' => $this->input->post('about_title_bn'),
                'block_content' => $this->input->post('about_content'),    
                'block_content_bn' => $this->input->post('about_content_bn'),
                'image_url1' => $about_img_name_1,
                'image_url2' => $about_img_name_2,
                'image_url3' => $about_img_name_3,
                'image_url4' => $about_img_name_4,
                'created_by' => $this->userId,
                'created_date' => date("Y-m-d"),
                'status' => 1
            );
            $this->Shows->insertData($data, "web_blocks");
            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }
    }

    public function update_about(){
        if ($this->input->post('id')) {
            
            
            $this->form_validation->set_rules('about_title', 'About Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('about_title_bn', 'About Title (Bangla)', 'trim|required|xss_clean');

            $this->form_validation->set_rules('about_content', 'About Content', 'trim|required|xss_clean');
            $this->form_validation->set_rules('about_content_bn', 'About Content (Bangla)', 'trim|required|xss_clean');


           if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $about_img_name_1 = $this->input->post('up_image_url1');
                $user_about_img_1 = $_FILES['image_url1']['name'];
                if ($user_about_img_1 != '') {
                    $about_img_name_1 = $this->now_upload('image_url1', $user_about_img_1);
                }

                $about_img_name_2 = $this->input->post('up_image_url2');
                $user_about_img_2 = $_FILES['image_url2']['name'];
                if ($user_about_img_2 != '') {
                    $about_img_name_2 = $this->now_upload('image_url2', $user_about_img_2);
                }

                $about_img_name_3 = $this->input->post('up_image_url3');
                $user_about_img_3 = $_FILES['image_url3']['name'];
                if ($user_about_img_3 != '') {
                    $about_img_name_3 = $this->now_upload('image_url3', $user_about_img_3);
                }

                $about_img_name_4 = $this->input->post('up_image_url4');
                $user_about_img_4 = $_FILES['image_url4']['name'];
                if ($user_about_img_4 != '') {
                    $about_img_name_4 = $this->now_upload('image_url4', $user_about_img_4);
                }

                $id = $this->input->post('id');                  
                
                $data = array(
                    'block_title' => $this->input->post('about_title'),    
                    'block_title_bn' => $this->input->post('about_title_bn'),
                    'block_content' => $this->input->post('about_content'),    
                    'block_content_bn' => $this->input->post('about_content_bn'),
                    'image_url1' => $about_img_name_1,
                    'image_url2' => $about_img_name_2,
                    'image_url3' => $about_img_name_3,
                    'image_url4' => $about_img_name_4,

                );               

                $con = "id = '$id'";
                $this->Shows->updateThisValue($data, "web_blocks", $con);

                     //user log submit
                     $log_des='('.text_format($this->input->post('about_title'),30).')'. "  About updated.";
                     user_log($log_des,'admin/web_blocks');
    
                 $this->toastr->success('Updated Successfully!');
                  echo json_encode(array("status" => "success", "message" => "Data Updated Successfully"));
             
            }

        }
    }

    public function get_info()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $con = "id = 3";
        $this->data['get_info'] = $this->Shows->getThisValue($con, "web_blocks");
                
        $this->data['dynamicView'] = "web_blocks/get_info";
        $this->_commonPageLayout('viewer');
     
    }

    public function added_get_info(){
        $this->form_validation->set_rules('get_info_title', 'Get Information Title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('get_info_title_bn', 'Get Information Title (Bangla)', 'trim|required|xss_clean');
        $this->form_validation->set_rules('get_info_content', 'Get Information Content', 'trim|required|xss_clean');
        $this->form_validation->set_rules('get_info_content_bn', 'Get Information Content (Bangla)', 'trim|required|xss_clean');

        $get_info_img_name_1 = '';
        $user_get_info_img_1 = $_FILES['image_url1']['name'];
        if ($user_get_info_img_1 != '') {
            $get_info_img_name_1 = $this->now_upload('image_url1', $user_get_info_img_1);
        }

        $get_info_img_name_2 = '';
        $user_get_info_img_2 = $_FILES['image_url2']['name'];
        if ($user_get_info_img_2 != '') {
            $get_info_img_name_2 = $this->now_upload('image_url2', $user_get_info_img_2);
        }


        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $data = array(
                'block_title' => $this->input->post('get_info_title'),    
                'block_title_bn' => $this->input->post('get_info_title_bn'),
                'block_content' => $this->input->post('get_info_content'),    
                'block_content_bn' => $this->input->post('get_info_content_bn'),
                'image_url1' => $get_info_img_name_1,
                'image_url2' => $get_info_img_name_2,
                'created_by' => $this->userId,
                'created_date' => date("Y-m-d"),
                'status' => 1
            );
            $this->Shows->insertData($data, "web_blocks");
            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));           

        }
    }

    public function update_get_info(){
        if ($this->input->post('id')) {
            
            
            $this->form_validation->set_rules('get_info_title', 'Get Information Title', 'trim|required|xss_clean');
            $this->form_validation->set_rules('get_info_title_bn', 'Get Information Title (Bangla)', 'trim|required|xss_clean');

            $this->form_validation->set_rules('get_info_content', 'Get Information Content', 'trim|required|xss_clean');
            $this->form_validation->set_rules('get_info_content_bn', 'Get Information Content (Bangla)', 'trim|required|xss_clean');


           if ($this->form_validation->run() == false) {
                $value = $this->form_validation->error_array();
                echo json_encode($value);

            } else {

                $get_info_img_name_1 = $this->input->post('up_image_url1');
                $user_get_info_img_1 = $_FILES['image_url1']['name'];
                if ($user_get_info_img_1 != '') {
                    $get_info_img_name_1 = $this->now_upload('image_url1', $user_get_info_img_1);
                }

                $get_info_img_name_2 = $this->input->post('up_image_url2');
                $user_get_info_img_2 = $_FILES['image_url2']['name'];
                if ($user_get_info_img_2 != '') {
                    $get_info_img_name_2 = $this->now_upload('image_url2', $user_get_info_img_2);
                }

                $id = $this->input->post('id');                  
                
                $data = array(
                    'block_title' => $this->input->post('get_info_title'),    
                    'block_title_bn' => $this->input->post('get_info_title_bn'),
                    'block_content' => $this->input->post('get_info_content'),    
                    'block_content_bn' => $this->input->post('get_info_content_bn'),
                    'image_url1' => $get_info_img_name_1,
                    'image_url2' => $get_info_img_name_2,

                );               

                $con = "id = '$id'";
                $this->Shows->updateThisValue($data, "web_blocks", $con);

                  //user log submit
                  $log_des='('.text_format($this->input->post('get_info_title'),30).')'. "  Get info updated.";
                  user_log($log_des,'admin/web_blocks');
 
                 $this->toastr->success('Updated Successfully!');
                  echo json_encode(array("status" => "success", "message" => "Data Updated Successfully"));
             
            }

        }
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
        if ($this->upload->do_upload($data)) {
            return $this->upload->data('file_name');
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
