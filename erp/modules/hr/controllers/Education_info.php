<?php
include_once 'BaseController.php';

class Education_info extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('hr/education_info_model', 'personal_model');
    }


    public function index(){
        //echo "Personal info"; die();
        $totalRec = @count($this->personal_model->get_user_data());
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'hr/education_info/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->personal_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "education_info/index";
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
        $config['base_url'] = base_url() . 'hr/education_info/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->personal_model->get_user_data($conditions);
        $this->load->view('hr/education_info/home', $data);

    }
	
	public function add()
    {       
        $this->load->view('hr/education_info/entry');
    }

    public function added(){
        $employee_id = $this->input->post('employee_id');
        $exam_name = $this->input->post('exam_name');
        $subject = $this->input->post('subject');
        $institute = $this->input->post('institute');
        $pass_year = $this->input->post('pass_year');
        $result = $this->input->post('result');
        $board = $this->input->post('board');

            $data = array();
            $i=0;
            foreach ($exam_name as $value) {
                $data['exam_name'] = $value;
                $data['employee_id'] = $employee_id;
                $data['subject'] = $subject[$i];
                $data['institute'] = $institute[$i];
                $data['passing_year'] = $pass_year[$i];
                $data['result'] = $result[$i];
                $data['board'] = $board[$i];

                $this->db->insert('education_info',$data);
                $i++;
            }            

            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));
    }

    public function edit($employee_id,$page){
        $data['education_info'] = $this->db->where('employee_id',$employee_id)->get('education_info')->result();
        $this->load->view('hr/education_info/edit', $data);
    }

    public function update(){
        $id = $this->input->post('id');
        $employee_id = $this->input->post('employee_id');
        $exam_name = $this->input->post('exam_name');
        $subject = $this->input->post('subject');
        $institute = $this->input->post('institute');
        $pass_year = $this->input->post('pass_year');
        $result = $this->input->post('result');
        $board = $this->input->post('board');

        $update = array();
        $i = 0;
        foreach($exam_name as  $value){

            if(isset($id[$i]) && ($id[$i] != '')){
                $update['exam_name'] = $value;
                $update['employee_id'] = $employee_id;
                $update['subject'] = $subject[$i];
                $update['institute'] = $institute[$i];
                $update['passing_year'] = $pass_year[$i];
                $update['result'] = $result[$i];
                $update['board'] = $board[$i];
                $this->db->where('id',$id[$i])->update('education_info',$update);
            }else{
                $data['exam_name'] = $value;
                $data['employee_id'] = $employee_id;
                $data['subject'] = $subject[$i];
                $data['institute'] = $institute[$i];
                $data['passing_year'] = $pass_year[$i];
                $data['result'] = $result[$i];
                $data['board'] = $board[$i];

                $this->db->insert('education_info',$data);
            }
            
            $i++;
            $this->toastr->success('saved successfully');
        }

            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));
    }

    public function show($employee_id,$count1){
        $data['education_info'] = $this->db->select('education_info.*,personal_info.employee_name')->join('personal_info','education_info.employee_id = personal_info.employee_id','left')->where('education_info.employee_id',$employee_id)->get('education_info')->result();
        //echo "<pre>"; print_r($data['education_info']); die();      
        $this->load->view('hr/education_info/show', $data);
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
        $html = $this->load->view('hr/family_info/pdf', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('family_info.pdf', 'D');
        exit;
    }


    protected function _commonPageLayout($viewName, $cacheIt = FALSE){
        $view = $this->layout->view($viewName, $this->data, TRUE);
        $replaces = array(
            '{SITE_BACKEND_TOP_HEADER}' => $this->load->view('backend/site_top_header', $this->data, TRUE),
            '{SITE_BACKEND_LEFT_MENU}' => $this->load->view('backend/site_left_menu', NULL, TRUE),
            '{SITE_BACKEND_MIDDLE_CONTENT}' => $this->load->view($this->data['dynamicView'], NULL, TRUE)
            );
        $this->load->view('view', array('view' => $view, 'replaces' => $replaces));
    }
	


}
