<?php
include_once 'BaseController.php';

class Family_info extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('applicant/family_info_model', 'personal_model');
    }


    public function index(){
        //echo "Personal info"; die();
        $totalRec = @count($this->personal_model->get_user_data());
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'applicant/family_info/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->personal_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "family_info/index";
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
        $emp_id = $this->input->post('emp_id');      

        if (!empty($emp_id)) {
            $conditions['search']['emp_id'] = $emp_id;
        }

        $totalRec = @count($this->personal_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'applicant/family_info/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->personal_model->get_user_data($conditions);
        $this->load->view('applicant/family_info/home', $data);

    }
	
	public function add()
    {       
        $this->load->view('applicant/family_info/entry');
    }

    public function added(){
        $employee_id = $this->input->post('employee_id');
        $duplicate = $this->db->where('employee_id',$employee_id)->get('family_info')->row();
        if(!empty($duplicate)){
            $this->toastr->success('Data Already exist!');
            echo json_encode(array("status" => "warning", "message" => "Data Already exist!"));
        }else{
            $spouse = array();
            $spouse['employee_id'] = $employee_id;
            $spouse['spouse_name'] = $this->input->post('spouse_name');
            $spouse['occupation'] = $this->input->post('occupation');
            $spouse['organization'] = $this->input->post('organization');
            $spouse['designation'] = $this->input->post('designation');
            $spouse['qualification'] = $this->input->post('qualification');
            $spouse['work_address'] = $this->input->post('working_place');
            $spouse['gender'] = $this->input->post('spouse_gender');
            $spouse['contact'] = $this->input->post('contact');
            $spouse['district'] = $this->input->post('district');

            $this->db->insert('family_info',$spouse);

            $child_name = $this->input->post('child_name');

            $child_gender = $this->input->post('child_gender');
            $dob = $this->input->post('dob');

            if($child_name[0] != ''){
                $child = array();
                $i = 0;
                foreach ($child_name as $value) {
                    $child['employee_id'] = $employee_id;
                    $child['child_name'] = $value;
                    $child['gender'] = $child_gender[$i];
                    $child['date_of_birth'] = $dob[$i];
                    $child['row_count'] = 1;
                    $i++;
                    $this->db->insert('child_info',$child);
                }
            }

            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));
        }
    }

    public function edit($id){
        $data['spouse_info'] = $this->personal_model->get_spouse_info($id);
        $data['child_info'] = $this->personal_model->get_child_info($data['spouse_info']->employee_id);
        $this->load->view('applicant/family_info/edit', $data);
    }

    public function update(){
        $spouse_id = $this->input->post('spouse_id');
        $employee_id = $this->input->post('employee_id');

        $spouse = array();
            $spouse['spouse_name'] = $this->input->post('spouse_name');
            $spouse['occupation'] = $this->input->post('occupation');
            $spouse['organization'] = $this->input->post('organization');
            $spouse['designation'] = $this->input->post('designation');
            $spouse['qualification'] = $this->input->post('qualification');
            $spouse['work_address'] = $this->input->post('working_place');
            $spouse['gender'] = $this->input->post('spouse_gender');
            $spouse['contact'] = $this->input->post('contact');
            $spouse['district'] = $this->input->post('district');


            $child_id = $this->input->post('child_id');
            $child_name = $this->input->post('child_name');
            $child_gender = $this->input->post('child_gender');
            $dob = $this->input->post('dob');

            if($child_id[0] != ''){
                $child = array();
                $i = 0;
                foreach ($child_id as $value) {
                    $child['child_name'] = $child_name[$i];
                    $child['gender'] = $child_gender[$i];
                    $child['date_of_birth'] = $dob[$i];
                    $this->db->where('id',$value)->update('child_info',$child);
                    $i++;
                }
            }

            $this->db->where('employee_id',$employee_id)->update('family_info',$spouse);
            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));
    }

    public function show($id,$count1){
        $data['spouse_info'] = $this->personal_model->get_spouse_info($id);
        $data['child_info'] = $this->personal_model->get_child_info($data['spouse_info']->employee_id);       
        $this->load->view('applicant/family_info/show', $data);
    }


    public function generateListPdf(){
        error_reporting('E_NONE');
        $this->load->library('mpdf/mpdf');
        $mpdf = new mPDF('', 'A4-P', 11, 'nikosh');             
        $mpdf->AddPage('P');

        $id = $this->input->post('id');
        
        $data['spouse_info'] = $this->personal_model->get_spouse_info($id);
        $data['child_info'] = $this->personal_model->get_child_info($data['spouse_info']->employee_id);
        $data['pdf'] = 1;
        $html = $this->load->view('applicant/family_info/pdf', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('family_info.pdf', 'D');
        exit;
    }


    protected function _commonPageLayout($viewName, $cacheIt = FALSE)
    {
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_BACKEND_TOP_HEADER}' => $this->load->view('backend/site_top_header', $this->data, TRUE),
            '{SITE_BACKEND_LEFT_MENU}' => $this->load->view('backend/site_left_menu_applicant', NULL, TRUE),
            '{SITE_BACKEND_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE)
        );
        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }
	


}
