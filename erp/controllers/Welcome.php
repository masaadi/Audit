<?php
include_once 'BaseController.php';

class Welcome extends BaseController {

   public function __construct() {
        parent::__construct();
        $this->layout->setLayout('backend');
        $this->lang->load('default', $this->session->userdata('lang_file'));
        $this->load->model('admin/blog_model', 'D_model');
    }
  
    public function notfound(){
        $data['main_content'] = '404';
        $this->load->view('frontend/master',$data);
    }
	public function index()
	{
      //echo "<pre>";  print_r($_SERVER['ORIG_PATH_INFO']); die();

	  $slider_cond = "status = 1";
	  $data['slider'] = $this->Shows->getThisValue($slider_cond, 'slider_image', '*', 5);

	  $web_blocks_cond = "";
      $data['web_blocks'] = $this->Shows->getThisValue($web_blocks_cond, 'web_blocks', '*');
	  $data['file_data'] = $this->db->where('id','1')->get('service_help')->row();
      //print_r($data['file_data']); die();

        //$this->load->view("welcome", $data);
      $data['reviews'] = $this->db->query('select review.*,users.full_name from review left join users ON review.created_by= users.id where review.status=1 order by id desc')->result();

      $data['main_content'] = 'frontend/home';
      $this->load->view('frontend/master',$data);
      
	}

	public function get_contact(){
		// print_r($_POST);

		$this->form_validation->set_rules('office_category_id', 'Office Category', 'trim|required|xss_clean');
        $this->form_validation->set_rules('office_id', 'Office', 'trim|required|xss_clean');

        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {
        	
            $office_category_id = $this->input->post('office_category_id');
            $office_id = $this->input->post('office_id');
            
            //$con = "id = '$office_id' AND office_category_id = '$office_category_id'";
            $data['office'] = $this->D_model->get_contact($office_id, $office_category_id);
            $data['office_category_id'] = $office_category_id;
            $data['office_id'] = $office_id;

            $this->load->view('frontend/contact_info', $data);
        }
    }
	public function verify_entreprenure(){

            $this->load->view('frontend/verify_entrepreneur');
        
    }
	public function get_certificate(){

            $certificate_no= $this->input->post('id');

            $certificate= $this->db->query(
              "select certificate.certificate_no,certificate.certificate_pdf,en_contact.entre_name,en_contact.entre_name_bn,en_contact.org_name,en_contact.org_name_bn,en_contact.phone_no,
              en_contact.email,en_contact.off_address,en_contact.off_address_bn,en_contact.off_division,en_contact.off_district
               from certificate left join en_contact ON certificate.contact_id= en_contact.id where certificate_no='$certificate_no'" )->row();
            
            if($certificate){
                echo json_encode($certificate);
            }else{
                $result['error']=true;
                $result['message']="Invalid certifate no.";
                echo json_encode($result);
            }
    }
    


    

    public function newslatter_subscribtion(){
        $this->form_validation->set_rules('subscriber_name', 'Name', 'trim|required|xss_clean|alpha_numeric');
        $this->form_validation->set_rules('subscriber_email', 'Email', 'trim|required|xss_clean|valid_email');
        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);
        }else{
            $subscriber_name = $this->input->post('subscriber_name');
            $subscriber_email = $this->input->post('subscriber_email');


            $data = array(
                'subscriber_name' => $subscriber_name,               
                'subscriber_email' => $subscriber_email,               
				'created_date' => date("Y-m-d")
            );
            $this->Shows->insertData($data, "newslatter");


          //  $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Subscribe  successfully completed.")); 

            die();
            // $config = array(
            //     'protocol' => 'smtp',
            //     'smtp_host' => 'ssl://smtp.googlemail.com',
            //     'smtp_host' => 465,
            //     'smtp_user' => 'email2ashraful@gmail.com',
            //     'smtp_pass' => '*ppG-2459',
            //     'mailtype'  => 'html',
            //     'charset'   => 'iso-8859-1',
            //     'wordwrap'  => TRUE
            // );
            $config = Array(
             'protocol' => 'smtp',
             'smtp_host' => 'ssl://smtp.googlemail.com',
             'smtp_port' => 465,
             'smtp_user' => 'email2ashraful@gmail.com',
             'smtp_pass' => '*ppG-2459',
             );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('email2ashraful@gmail.com', 'BSCIC ADMIN');
            $this->email->to('email2ashraful@gmail.com');
            $this->email->subject('This is subject.');
            $this->email->message('This is message.');

            if($this->email->send()){
                echo 'Your email was sent.';
            }else{
                show_error($this->email->print_debugger());
            }
        }
        // print_r($_POST);
    }
    
    


	
}
