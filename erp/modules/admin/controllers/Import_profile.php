<?php
include_once 'BaseController.php';

class Import_profile extends BaseController
{
    private $excelData = null;

    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       $this->lang->load('config', $this->session->userdata('lang_file'));
       $this->load->model('applicant/registration_model', 'reg_model');
       $this->load->model('admin/import_profile_model', 'import_profile_model');
       $this->load->model('applicant/payment_model', 'payment_model');
       $this->load->library('excel');
        $this->load->model('admin/application_model');

    }

	
	public function index2()
    {
       
        $con = "id = '1'";
         $data= $this->Shows->getThisValue($con, "guideline");       
        $this->data['guideline_data']=$data;
        $this->data['dynamicView'] = "admin/import_profile/edit";
        $this->_commonPageLayout('viewer');
    }

    public function index()
    {

        $totalRec = @count($this->import_profile_model->get_user_data());
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'admin/import_profile/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->import_profile_model->get_user_data(array('limit' => $this->total_row));
		
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "import_profile/index";
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
        $totalRec = @count($this->import_profile_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#importList';
        $config['base_url'] = base_url() . 'admin/import_profile/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->import_profile_model->get_user_data($conditions);
        $this->load->view('admin/import_profile/home', $data);

    }



    function import()
	{
        $this->excelData = [];
		if(isset($_FILES["import_file"]["name"]))
		{
			$path = $_FILES["import_file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet)
			{
				$highestRow = $worksheet->getHighestRow();
                $highestColumn = $worksheet->getHighestColumn();
                
				for($row=2; $row<=$highestRow; $row++)
				{
                    $data = null;
					$data = array(
						'mobile'		                 =>	$worksheet->getCellByColumnAndRow(0, $row)->getValue(),
						'email'			         =>	$worksheet->getCellByColumnAndRow(1, $row)->getValue(),
						'employee_name'				      =>	$worksheet->getCellByColumnAndRow(2, $row)->getValue(),
						'employee_name_bn'			    =>	$worksheet->getCellByColumnAndRow(3, $row)->getValue(),
						'office_category_id'	    =>	$worksheet->getCellByColumnAndRow(4, $row)->getValue(),
						'office_id'			         =>	$worksheet->getCellByColumnAndRow(5, $row)->getValue(),
						'department_id'			        =>	$worksheet->getCellByColumnAndRow(6, $row)->getValue(),
						'designation_id'			     =>	$worksheet->getCellByColumnAndRow(7, $row)->getValue(),
						'gender'			         =>	$worksheet->getCellByColumnAndRow(8, $row)->getValue(),
						'birth_date'			         =>	$worksheet->getCellByColumnAndRow(9, $row)->getValue(),
						'religion'			         =>	$worksheet->getCellByColumnAndRow(10, $row)->getValue(),
						'division_id'			         =>	$worksheet->getCellByColumnAndRow(11, $row)->getValue(),
						'district_id'			     =>	$worksheet->getCellByColumnAndRow(12, $row)->getValue(),
						'upazila_id'			         =>	$worksheet->getCellByColumnAndRow(13, $row)->getValue(),
						'address'			         =>	$worksheet->getCellByColumnAndRow(14, $row)->getValue(),
						'address_bn'			         =>	$worksheet->getCellByColumnAndRow(15, $row)->getValue(),
						'excel_row'			             =>	$row
                    );

                    $this->insertData($data);
                }
                
			}
            $response_data['success'] = true;
            $response_data['message'] = "Data import success.";
            echo json_encode($response_data);
		}	
    }

    private function insertData($data)
    {
        try {
            $this->db->trans_begin();
            $user_id = $this->user_add($data);            
            $user_profile = $this->profile_add($user_id, $data);            
            $this->db->trans_commit();
        } catch (Exception $ex) {
            $msg = $ex->getMessage();
            $this->db->trans_rollback();
            $this->insert_import_log($data['excel_row'],$msg);
        }
    }
    
    function user_add($data)
    {
        if(empty($data['mobile']) || empty($data['email']) || empty($data['employee_name']) || empty($data['employee_name_bn'])){
            throw new Exception("Users data format not valid (users).");
            return ;
        } else {
            $insert_data = array(
                'role_id' => 1,
                'username' => $data['mobile'],
                'password' => crypt($this->dx_auth->_encode(123456), ''),
                'full_name' => $data['employee_name'],
                'full_name_bn' => $data['employee_name_bn'],
                'mobile' => $data['mobile'],
                'nid_no' => '',
                'birth_certificate_no' => '',
                'email' => $data['email'],
                'status_id' => 1
            );
            return $entrepreneur_id=$this->Shows->insertData($insert_data,'users');
        }
       
    }

    function profile_add($user_id, $data)
    {

        if(
         empty($user_id) || empty($data['employee_name']) || empty($data['employee_name_bn'])|| empty($data['office_category_id']) || empty($data['office_id'])
         || empty($data['department_id']) || empty($data['designation_id']) || empty($data['gender']) || empty($data['birth_date'])
         || empty($data['religion']) || empty($data['division_id']) || empty($data['district_id']) || empty($data['upazila_id']) || empty($data['address']) || empty($data['address_bn'])

         ){
            throw new Exception("Profile data format not valid (profile).");
            return ;
        } else {
            $insert_data = array(
                'user_id' =>  $user_id,
                'employee_name' => $data['employee_name'],
                'employee_name_bn' => $data['employee_name_bn'],
                'office_category_id' =>  $this->import_profile_model->getId('office_category', "office_category_name LIKE '%".$data['office_category_id']."%'"),
                'office_id' =>  $this->import_profile_model->getId('office', "office_name LIKE '%".$data['office_id']."%'"),
                'department_id' => $this->import_profile_model->getId('department', "department_name LIKE '%".$data['department_id']."%'"),
                'designation_id' => $this->import_profile_model->getId('designation', "designation_name LIKE '%".$data['designation_id']."%'"),
                'gender' => $data['gender'],
                'birth_date' => $data['birth_date'],
                'religion' => $data['religion'],
                'division_id' => $this->import_profile_model->getId('division', "division_name LIKE '%".$data['division_id']."%'"),
                'district_id' => $this->import_profile_model->getId('district', "district_name LIKE '%".$data['district_id']."%'"),
                'upazila_id' =>  $this->import_profile_model->getId('upazila', "upazila_name LIKE '%".$data['upazila_id']."%'"),
                'address' => $data['address'],
                'address_bn' => $data['address_bn'],
                'contact_no' => $data['mobile'],
                'email' => $data['email'],
                'created_by' =>$this->userId,
                'created_date' => date('Y-m-d h:m:i'),

            );
            $this->Shows->insertData($insert_data,'profile');
        }
       
    }


    
    function insert_import_log($row,$err_des)
    {
        // Add error log
        if ($row && $err_des){
            $array_log = array(
                'excel_row' => $row,
                'error_des' => $err_des,
                'created_date' =>  date('Y-m-d H:i:s')
            );
            $this->Shows->insertData($array_log,'import_log_profile');
        } else {
            throw new Exception("Add document data format not valid (en_documents).");
            return ;
        }
    }
    function delete($id)
    {
        $con = "id = '$id'";
        $result = $this->Shows->deleteThisValue($con,"import_log_profile");       
        echo json_encode(array("status" => "success", "message" => "Data delete Successfully!"));
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

?>