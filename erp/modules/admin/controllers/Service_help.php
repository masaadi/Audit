<?php
include_once 'BaseController.php';

class Service_help extends BaseController
{
    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('config', $this->session->userdata('lang_file'));
    }



    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $config['target'] = '#moduleList';
        $config['base_url'] = base_url() . 'admin/module/index';
        $config['total_rows'] = 1;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
		
        $this->data['file_data'] = $this->db->where('id',1)->get('service_help')->row();
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>"; print_r($wings);die();
		$this->data['dynamicView'] = "service_help/index";
        $this->_commonPageLayout('viewer');
     
   }
	
	public function edit()
    {       
        $this->load->view('admin/service_help/edit');
    }
	
	function update(){
        $data = array();
        $data['updated_date'] = date('Y-m-d');
        $data['updated_by'] = $this->userId;

        $config['upload_path']='public/uploads/help';
        $config['allowed_types']='jpg|png|jpeg|pdf';
        $fdata=array();
        $error=array();
        $this->load->library('upload', $config);
        if(!empty($_FILES['help_file']['name'])){
            if ( ! $this->upload->do_upload('help_file'))
            {
                $error = array('error' => $this->upload->display_errors());
                print_r ($error);
            }
            else
            {
                $fdata =($this->upload->data());
                $data['document']='public/uploads/help/'.$fdata['file_name'];
            }
        }
        $this->db->where('id','1')->update('service_help',$data);
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
