<?php
include_once 'BaseController.php';

class Personal_info extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('hr/personal_info_model', 'personal_model');
    }
	
	
	public function import()
	{
       error_reporting(0);
		if ($this->input->post('submit')) {

			$path = 'public/';
			require_once APPPATH . "/third_party/PHPExcel.php";
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'xlsx|xls|csv';
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('uploadFile')) {
				$error = array('error' => $this->upload->display_errors());
			} else {
				$data = array('upload_data' => $this->upload->data());
			}
			if (empty($error)) {
				if (!empty($data['upload_data']['file_name'])) {
					$import_xls_file = $data['upload_data']['file_name'];
				} else {
					$import_xls_file = 0;
				}
				$inputFileName = $path . $import_xls_file;

				try {
					$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
					$objReader = PHPExcel_IOFactory::createReader($inputFileType);
					$objPHPExcel = $objReader->load($inputFileName);
					$allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
					//echo "<pre>";print_r($allDataInSheet);die();
					
					$i = 0;
					foreach ($allDataInSheet as $value) {
						if($i>0) {
							$pid = true;
							$eid = $value['C'];						
							$pArray = $this->Shows->getThisValue("employee_id = '$eid'", "personal_info", "id");
							if (count($pArray)) {
								$pid =false;
							}
							if ($pid) {
								$data = array(
									'employee_id' => $value['C'],
									'employee_name' => $value['B'],
									'phone' => $value['D']
								  );
								$this->db->insert('personal_info',$data);
								
								$data2 = array(
									'employee_id' => $value['C'],
									'employee_name' => $value['B'],
									'joining_date' => date('Y-m-d',strtotime($value['E'])),
									'current_joining' => date('Y-m-d',strtotime($value['F'])),
									'current_office' => $value['G'],
									'current_desig' => $value['H'],
									'emp_type' => $value['I'],								
									
								  );
								// echo "<pre>";print_r($data2); 
								 $this->db->insert('job_info',$data2);
								 $pass = "123456";
								 
								    $login['user_type'] = 2;
									$login['role_id'] = 2;
									$login['username'] = $value['C'];
									$login['employee_id'] = $value['C'];
									$login['full_name'] = $value['B'];
									$login['status_id'] = 1;
									$login['password'] = crypt($this->dx_auth->_encode($pass), '');
									$this->db->insert('users',$login);								
							}
						}
						$i++;
					}

					$this->session->set_flashdata('message', '<div id="message">Imported Succesfully.</div>');


				} catch (Exception $e) {
					die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
						. '": ' . $e->getMessage());
				}
			} else {
				echo $error['error'];
			}

		}
		$this->data['dynamicView'] = "personal_info/import";
		$this->_commonPageLayout('viewer');

	}


    public function index(){
        //echo "Personal info"; die();
        $totalRec = @count($this->personal_model->get_user_data());
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'hr/personal_info/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->personal_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "personal_info/index";
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
        $emp_name = $this->input->post('emp_name');      
        $emp_id = $this->input->post('emp_id');      

        if (!empty($emp_name)) {
            $conditions['search']['emp_name'] = $emp_name;
        }
        if (!empty($emp_id)) {
            $conditions['search']['emp_id'] = $emp_id;
        }

        $totalRec = @count($this->personal_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'hr/personal_info/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->personal_model->get_user_data($conditions);
        $this->load->view('hr/personal_info/home', $data);

    }
	
	public function add()
    {       
        $this->load->view('hr/personal_info/entry');
    }

    public function added(){
        $employee_id = $this->input->post('employee_id');
        $duplicate = $this->db->where('employee_id',$employee_id)->get('personal_info')->row();
        if(!empty($duplicate)){
            $this->toastr->success('Data Already exist!');
            echo json_encode(array("status" => "warning", "message" => "Data Already exist!"));
        }else{
            $data = array();
            $data['employee_id'] = $this->input->post('employee_id');
            //$data['cpf_no'] = $this->input->post('cpf_no');
            $data['employee_name'] = $this->input->post('employee_name');
            $data['emp_photo'] = $this->input->post('emp_photo');
            $data['gender'] = $this->input->post('gender');
            /*$data['dob'] = $this->input->post('dob');
            $data['f_name'] = $this->input->post('f_name');
            $data['m_name'] = $this->input->post('m_name');
            $data['nid'] = $this->input->post('nid');
            $data['blood_group'] = $this->input->post('blood_group');
            $data['marital_status'] = $this->input->post('marital_status');
            $data['passport'] = $this->input->post('passport');
            $data['driving'] = $this->input->post('driving');
            $data['pre_division'] = $this->input->post('pre_division');
            $data['pre_district'] = $this->input->post('pre_district');
            $data['pre_upazila'] = $this->input->post('pre_upazila');
            $data['pre_address'] = $this->input->post('pre_address');
            $data['per_division'] = $this->input->post('per_division');
            $data['per_district'] = $this->input->post('per_district');
            $data['per_upazila'] = $this->input->post('per_upazila');
            $data['per_address'] = $this->input->post('per_address');*/
            $data['phone'] = $this->input->post('phone');
            $data['email'] = $this->input->post('email');
            /*$data['emergency_name'] = $this->input->post('emergency_name');
            $data['relation'] = $this->input->post('relation');
            $data['emergency_phone'] = $this->input->post('emergency_phone');
            $data['remarks'] = $this->input->post('remarks');*/

            $config['upload_path']='public/uploads/employee';
            $config['allowed_types']='jpg|png|jpeg|pdf';
            $fdata=array();
            $error=array();
            $this->load->library('upload', $config);
            if(!empty($_FILES['emp_photo']['name'])){
                if ( ! $this->upload->do_upload('emp_photo'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    print_r ($error);
                }
                else
                {
                    $fdata =( $this->upload->data());
                    $data['emp_photo']='public/uploads/employee/'.$fdata['file_name'];
                }
            }
            /*if(!empty($_FILES['nid_photo']['name'])){
                if ( ! $this->upload->do_upload('nid_photo'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    print_r ($error);
                }
                else
                {
                    $fdata =( $this->upload->data());
                    $data['nid_photo']='public/uploads/employee/'.$fdata['file_name'];
                }
            }*/

            $this->db->insert('personal_info',$data);
            $this->toastr->success('saved successfully');
            echo json_encode(array("status" => "success", "message" => "saved successfully!"));
        }
    }

    public function edit($id){
        $con = "id = '$id'";
        $data['employee'] = $this->db->where('id',$id)->get('personal_info')->row();       
        $this->load->view('hr/personal_info/edit', $data);
    }
// To update personal information
    public function update(){
        $id = $this->input->post('id');
        $employee_id = $this->input->post('employee_id');
        $duplicate = $this->db->where('employee_id',$employee_id)->get('personal_info')->row();
        if(!empty($duplicate) && ($duplicate->id != $id)){
            $this->toastr->success('Data Already exist!');
            echo json_encode(array("status" => "warning", "message" => "Data Already exist!"));
        }else{
            $data = array();
            //$data['employee_id'] = $this->input->post('employee_id');
            //$data['cpf_no'] = $this->input->post('cpf_no');
            $data['employee_name'] = $this->input->post('employee_name');
            $data['gender'] = $this->input->post('gender');
            /*$data['dob'] = $this->input->post('dob');
            $data['f_name'] = $this->input->post('f_name');
            $data['m_name'] = $this->input->post('m_name');
            $data['nid'] = $this->input->post('nid');
            $data['blood_group'] = $this->input->post('blood_group');
            $data['marital_status'] = $this->input->post('marital_status');
            $data['passport'] = $this->input->post('passport');
            $data['driving'] = $this->input->post('driving');
            $data['pre_division'] = $this->input->post('pre_division');
            $data['pre_district'] = $this->input->post('pre_district');
            $data['pre_upazila'] = $this->input->post('pre_upazila');
            $data['pre_address'] = $this->input->post('pre_address');
            $data['per_division'] = $this->input->post('per_division');
            $data['per_district'] = $this->input->post('per_district');
            $data['per_upazila'] = $this->input->post('per_upazila');
            $data['per_address'] = $this->input->post('per_address');*/
            $data['phone'] = $this->input->post('phone');
            $data['email'] = $this->input->post('email');
            /*$data['emergency_name'] = $this->input->post('emergency_name');
            $data['relation'] = $this->input->post('relation');
            $data['emergency_phone'] = $this->input->post('emergency_phone');
            $data['remarks'] = $this->input->post('remarks');*/

            $config['upload_path']='public/uploads/employee';
            $config['allowed_types']='jpg|png|jpeg|pdf';
            $fdata=array();
            $error=array();
            $this->load->library('upload', $config);

            if($_FILES['emp_photo']['name']){
                if ( ! $this->upload->do_upload('emp_photo'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    print_r ($error);
                }
                else
                {
                    $fdata =( $this->upload->data());
                    $data['emp_photo']='public/uploads/employee/'.$fdata['file_name'];
                }
            }
            /*if($_FILES['nid_photo']['name']){
                if ( ! $this->upload->do_upload('nid_photo'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    print_r ($error);
                }
                else
                {
                    $fdata =( $this->upload->data());
                    $data['nid_photo']='public/uploads/employee/'.$fdata['file_name'];
                }
            }*/

            $this->db->where('id',$id)->update('personal_info',$data);
            $this->toastr->success('updated successfully');
            echo json_encode(array("status" => "success", "message" => "updated successfully!"));
    }
}

    public function show($id,$count1){
        //echo $id; die();
        $con = "id = '$id'";
        $data['count1'] = $count1;
        $data['array'] = $this->db->select('personal_info.*,pre_upazila.upazila_name as pre_upazila,pre_district.district_name as pre_district, pre_division.division_name as pre_division,per_upazila.upazila_name as per_upazila,per_district.district_name as per_district, per_division.division_name as per_division')
            ->where('personal_info.id',$id)
            ->join('upazila as pre_upazila','pre_upazila.id = personal_info.pre_upazila','left')
            ->join('district as pre_district','pre_district.id = personal_info.pre_district','left')
            ->join('division as pre_division','pre_division.id = personal_info.pre_division','left')
            ->join('upazila as per_upazila','per_upazila.id = personal_info.per_upazila','left')
            ->join('district as per_district','per_district.id = personal_info.per_district','left')
            ->join('division as per_division','per_division.id = personal_info.per_division','left')
            ->get('personal_info')->row();       
        $this->load->view('hr/personal_info/show', $data);
    }


    public function generateListPdf(){
        error_reporting('E_NONE');
        $this->load->library('mpdf/mpdf');
        $mpdf = new mPDF('', 'A4-P', 11, 'nikosh');             
        $mpdf->AddPage('P');

        $id = $this->input->post('id');
        
        $data['array'] = $this->db->select('personal_info.*,pre_upazila.upazila_name as pre_upazila,pre_district.district_name as pre_district, pre_division.division_name as pre_division,per_upazila.upazila_name as per_upazila,per_district.district_name as per_district, per_division.division_name as per_division')
            ->where('personal_info.id',$id)
            ->join('upazila as pre_upazila','pre_upazila.id = personal_info.pre_upazila')
            ->join('district as pre_district','pre_district.id = personal_info.pre_district')
            ->join('division as pre_division','pre_division.id = personal_info.pre_division')
            ->join('upazila as per_upazila','per_upazila.id = personal_info.per_upazila')
            ->join('district as per_district','per_district.id = personal_info.per_district')
            ->join('division as per_division','per_division.id = personal_info.per_division')
            ->get('personal_info')->row();
        $data['pdf'] = 1;
        $html = $this->load->view('hr/personal_info/pdf', $data, true);
        $mpdf->SetHtmlHeader('');
        $mpdf->WriteHTML($html);
        $mpdf->Output('personal_info.pdf', 'D');
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
