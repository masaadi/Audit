<?php
include_once 'BaseController.php';

class Qualification_info extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('hr/qualification_info_model', 'personal_model');
    }


    public function index(){
        //echo "Personal info"; die();
        $totalRec = @count($this->personal_model->get_user_data());
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'hr/qualification_info/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->personal_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "qualification_info/index";
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
        $config['base_url'] = base_url() . 'hr/qualification_info/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->personal_model->get_user_data($conditions);
        $this->load->view('hr/qualification_info/home', $data);

    }
	
	public function add()
    {       
        $this->load->view('hr/qualification_info/entry');
    }

    public function added(){
        $employee_id = $this->input->post('employee_id');
        $qualification = $this->input->post('qualification');
        $details = $this->input->post('details');

            $data = array();
            $i=0;
            foreach ($qualification as $value) {
                $data['qualification'] = $value;
                $data['employee_id'] = $employee_id;
                $data['detail'] = $details[$i];

                $this->db->insert('qualification_info',$data);
                $i++;
            }            

            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));
    }

    public function edit($employee_id,$page){
        $data['qualification_info'] = $this->db->where('employee_id',$employee_id)->get('qualification_info')->result();
        $this->load->view('hr/qualification_info/edit', $data);
    }

    public function update(){
        $id = $this->input->post('id');
        $employee_id = $this->input->post('employee_id');
        $qualification = $this->input->post('qualification');
        $details = $this->input->post('details');

        $update = array();
        $i = 0;
        foreach($qualification as  $value){

            if(isset($id[$i]) && ($id[$i] != '')){
                $update['qualification'] = $value;
                $update['detail'] = $details[$i];
                $this->db->where('id',$id[$i])->update('qualification_info',$update);
            }else{
                $data['qualification'] = $value;
                $data['employee_id'] = $employee_id;
                $data['detail'] = $details[$i];
                $this->db->insert('qualification_info',$data);
            }
            
            $i++;
            $this->toastr->success('saved successfully');
        }

            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));
    }

    public function show($employee_id,$count1){
        $data['qualification_info'] = $this->db->select('qualification_info.*,personal_info.employee_name')->join('personal_info','qualification_info.employee_id = personal_info.employee_id','left')->where('qualification_info.employee_id',$employee_id)->get('qualification_info')->result();
        //echo "<pre>"; print_r($data['education_info']); die();      
        $this->load->view('hr/qualification_info/show', $data);
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
