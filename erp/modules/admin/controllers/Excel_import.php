<?php
include_once 'BaseController.php';

class Excel_import extends BaseController
{
    private $excelData = null;

    public function __construct()
    {
        parent::__construct();
       // $this->dx_auth->check_uri_permissions();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
       $this->lang->load('config', $this->session->userdata('lang_file'));
       //$this->load->model('applicant/registration_model', 'reg_model');
       $this->load->model('admin/excel_import_model', 'import_model');
       //$this->load->model('applicant/payment_model', 'payment_model');
       $this->load->library('excel');
        $this->load->model('admin/application_model');

    }

	
	public function index2()
    {
       
        $con = "id = '1'";
         $data= $this->Shows->getThisValue($con, "guideline");       
        $this->data['guideline_data']=$data;
        $this->data['dynamicView'] = "admin/import/edit";
        $this->_commonPageLayout('viewer');
    }

    public function index()
    {

        // $data_sms['mobile'] ='01730233032';
        // $data_sms['message'] ='Hello Mamun';
        // sms_helper($data_sms);
        $totalRec = @count($this->import_model->get_user_data());
        $config['target'] = '#blogList';
        $config['base_url'] = base_url() . 'admin/import/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->import_model->get_user_data(array('limit' => $this->total_row));
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
		$this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
		$this->data['dynamicView'] = "import/index";
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
        $totalRec = @count($this->import_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#importList';
        $config['base_url'] = base_url() . 'admin/import/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->import_model->get_user_data($conditions);
        $this->load->view('admin/import/home', $data);

    }



    function import()
	{
        $this->excelData = [];
		if(isset($_FILES["import_file"]["name"])){
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
						'full_name'		                 =>	$worksheet->getCellByColumnAndRow(0, $row)->getValue(),
						'full_name_bn'			         =>	$worksheet->getCellByColumnAndRow(1, $row)->getValue(),
						'mobile'				         =>	$worksheet->getCellByColumnAndRow(2, $row)->getValue(),
						'nid_no'		                 =>	$worksheet->getCellByColumnAndRow(3, $row)->getValue(),
						'birth_certificate_no'			 =>	$worksheet->getCellByColumnAndRow(4, $row)->getValue(),
						'email'			                 =>	$worksheet->getCellByColumnAndRow(5, $row)->getValue(),
						'org_name'			             =>	$worksheet->getCellByColumnAndRow(6, $row)->getValue(),
						'org_name_bn'			         =>	$worksheet->getCellByColumnAndRow(7, $row)->getValue(),
						'off_address'			         =>	$worksheet->getCellByColumnAndRow(8, $row)->getValue(),
						'off_address_bn'			     =>	$worksheet->getCellByColumnAndRow(9, $row)->getValue(),
						'off_division'			         =>	$worksheet->getCellByColumnAndRow(10, $row)->getValue(),
						'off_district'			         =>	$worksheet->getCellByColumnAndRow(11, $row)->getValue(),
						'off_upazila'			         =>	$worksheet->getCellByColumnAndRow(12, $row)->getValue(),
						'pro_address'			         =>	$worksheet->getCellByColumnAndRow(13, $row)->getValue(),
						'pro_address_bn'			     =>	$worksheet->getCellByColumnAndRow(14, $row)->getValue(),
						'pro_division'			         =>	$worksheet->getCellByColumnAndRow(15, $row)->getValue(),
						'pro_district'			         =>	$worksheet->getCellByColumnAndRow(16, $row)->getValue(),
						'pro_upazila'			         =>	$worksheet->getCellByColumnAndRow(17, $row)->getValue(),
						'industry_type'			         =>	$worksheet->getCellByColumnAndRow(18, $row)->getValue(),
						'business_type'			         =>	$worksheet->getCellByColumnAndRow(19, $row)->getValue(),
						'entre_name'			         =>	$worksheet->getCellByColumnAndRow(20, $row)->getValue(),
						'entre_name_bn'			         =>	$worksheet->getCellByColumnAndRow(21, $row)->getValue(),
						'entre_off_address'			     => $worksheet->getCellByColumnAndRow(22, $row)->getValue(),
						'entre_off_address_bn'			 =>	$worksheet->getCellByColumnAndRow(23, $row)->getValue(),
						'entre_division'			     =>	$worksheet->getCellByColumnAndRow(24, $row)->getValue(),
						'entre_district'			     =>	$worksheet->getCellByColumnAndRow(25, $row)->getValue(),
						'entre_upazila'			         =>	$worksheet->getCellByColumnAndRow(26, $row)->getValue(),
						'year'			                 =>	$worksheet->getCellByColumnAndRow(27, $row)->getValue(),
						'month'			                 =>	$worksheet->getCellByColumnAndRow(28, $row)->getValue(),
						'local_market'			         =>	$worksheet->getCellByColumnAndRow(29, $row)->getValue(),
						'export_market'			         =>	$worksheet->getCellByColumnAndRow(30, $row)->getValue(),
						'fixed_asset_total'			     =>	$worksheet->getCellByColumnAndRow(31, $row)->getValue(),
						'current_capital_total'			 =>	$worksheet->getCellByColumnAndRow(32, $row)->getValue(),
						'total_investment'			     =>	$worksheet->getCellByColumnAndRow(33, $row)->getValue(),
						'local_entrepreneur'			 =>	$worksheet->getCellByColumnAndRow(34, $row)->getValue(),
						'foreign_entrepreneur'			 =>	$worksheet->getCellByColumnAndRow(35, $row)->getValue(),
						'local_entrep_total'			 =>	$worksheet->getCellByColumnAndRow(36, $row)->getValue(),
						'foreign_entrep_total'			 =>	$worksheet->getCellByColumnAndRow(37, $row)->getValue(),
						'management_employee'			 =>	$worksheet->getCellByColumnAndRow(38, $row)->getValue(),
						'skilled_sem_skl_emp'			 =>	$worksheet->getCellByColumnAndRow(39, $row)->getValue(),
						'unskilled_employee'			 =>	$worksheet->getCellByColumnAndRow(40, $row)->getValue(),
						'product_description'			 =>	$worksheet->getCellByColumnAndRow(41, $row)->getValue(),
						'annual_raw_material_details'	 =>	$worksheet->getCellByColumnAndRow(42, $row)->getValue(),
						'fixed_assets'			         =>	$worksheet->getCellByColumnAndRow(43, $row)->getValue(),
						'current_capital'			     =>	$worksheet->getCellByColumnAndRow(44, $row)->getValue(),
						'local_machine_list'			 =>	$worksheet->getCellByColumnAndRow(45, $row)->getValue(),
						'imported_machine_list'			 =>	$worksheet->getCellByColumnAndRow(46, $row)->getValue(),
						'certificate_date'			     =>	$worksheet->getCellByColumnAndRow(47, $row)->getValue(),
						'application_type'			     =>	$worksheet->getCellByColumnAndRow(48, $row)->getValue(),
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
        if($data['mobile'] != ''){
            try {
                $this->db->trans_begin();
                $this->checkDouble($data);
                $entrepreneur_id = $this->user_add($data);            
                $contact_id = $this->en_contact_add($entrepreneur_id, $data);            
                $this->application_status_add($contact_id);
                $business_id = $this->en_business_add($entrepreneur_id, $contact_id, $data);
                $this->raw_material($business_id, $data);
                $this->curent_capital($business_id, $data);
                $this->product_description($business_id, $data);
                $this->fixed_asset($business_id, $data);
                $this->local_machine($contact_id,$business_id,$data);
                $this->import_machine($contact_id,$business_id,$data);
                $this->insert_document($contact_id,$entrepreneur_id);
                $this->payment($contact_id,$entrepreneur_id,$data);
                $this->db->trans_commit();
            } catch (Exception $ex) {
                $msg = $ex->getMessage();
                $line = $ex->getLine();
                $file = $ex->getFile();
                $this->db->trans_rollback();
    
                $this->insert_import_log($data['excel_row'],$msg);
            }
        }
    }
    function checkDouble ($data) {
        $mobile = $data['mobile'];
        $if_user = $this->import_model->checkUserExits($mobile);
        if ($if_user != true) {
            throw new Exception('User Already Exits. ('. $data['mobile'] .' )');
            return ;
        }
    }
    function user_add($data)
    {
        if(empty($data['mobile']) || empty($data['full_name']) || empty($data['full_name_bn'])|| empty($data['nid_no'] )){
            throw new Exception("Users data format not valid (users).");
            return ;
        } else {
            $insert_data = array(
                'role_id' => 2,
                'username' => $data['mobile'],
                'password' => crypt($this->dx_auth->_encode(123456), ''),
                'full_name' => $data['full_name'],
                'full_name_bn' => $data['full_name_bn'],
                'mobile' => $data['mobile'],
                'nid_no' => $data['nid_no'],
                'birth_certificate_no' => $data['birth_certificate_no'],
                'email' => $data['email'],
                'status_id' => 1
            );
            return $entrepreneur_id=$this->Shows->insertData($insert_data,'users');
        }
       
    }

    function en_contact_add($entrepreneur_id, $data)
    {
        $application_id = $this->reg_model->getAutoIncKey('APPLICATION_ID', 'en_contact', 'application_id');

        if(
         empty($entrepreneur_id) || empty($application_id) || empty($data['org_name']) || empty($data['org_name_bn'])|| empty($data['mobile']) || empty($data['off_address']) || empty($data['off_address_bn'])
         || empty($data['off_division']) || empty($data['off_district']) || empty($data['off_upazila']) || empty($data['pro_division'])
         || empty($data['pro_district']) || empty($data['pro_upazila']) || empty($data['industry_type']) || empty($data['business_type'])
         || empty($data['entre_division']) || empty($data['entre_district']) || empty($data['entre_upazila']) || empty($data['pro_address'])
         || empty($data['pro_address_bn']) || empty($data['entre_name'])
         || empty($data['entre_name_bn']) || empty($data['nid_no']) || empty($data['entre_off_address']) || empty($data['entre_off_address_bn'])
         || empty($data['pro_address_bn']) || empty($data['entre_name']) || empty($data['application_type'])
         ){
            throw new Exception("Entrepreneur data format not valid (ec_contact).");
            return ;
        } else {
            $insert_data = array(
                'application_id' =>  $application_id,
                'entrepreneur_id' => $entrepreneur_id,
                'org_name' =>  $data['org_name'],
                'org_name_bn' =>  $data['org_name_bn'],
                'phone_no' =>  $data['mobile'],
                'email' =>  $data['email'],
                'off_address' =>  $data['off_address'],
                'off_address_bn' =>  $data['off_address_bn'],
                'off_division' =>  $this->import_model->getId('division', "division_name LIKE '%".$data['off_division']."%'"),
                'off_district' =>  $this->import_model->getId('district', "district_name LIKE '%".$data['off_district']."%'"),
                'off_upazila' =>   $this->import_model->getId('upazila', "upazila_name LIKE '%".$data['off_upazila']."%'"),
                'pro_address' =>  $data['pro_address'],
                'pro_address_bn' =>  $data['pro_address_bn'],
                'pro_division' =>  $this->import_model->getId('division', "division_name LIKE '%".$data['pro_division']."%'"),
                'pro_district' =>  $this->import_model->getId('district', "district_name LIKE '%".$data['pro_district']."%'"),
                'pro_upazila' =>  $this->import_model->getId('upazila', "upazila_name LIKE '%".$data['pro_upazila']."%'"),
                'industry_type' =>  $this->import_model->getId('industry_type', "type_name LIKE '%".$data['industry_type']."%'"),
                'business_type' =>   $this->import_model->getId('business_type', "type_name LIKE '%".$data['business_type']."%'"),
                'no_of_entrepreneur' =>  1,
                'entre_name' =>  $data['entre_name'],
                'entre_name_bn' =>  $data['entre_name_bn'],
                'nid_no' =>  $data['nid_no'],
                'birth_certificate_no' =>  $data['birth_certificate_no'],
                'entre_phone_no' =>  $data['mobile'],
                'entre_email' =>  $data['email'],
                'entre_off_address' =>  $data['entre_off_address'],
                'entre_off_address_bn' =>  $data['entre_off_address_bn'],
                'entre_division' =>   $this->import_model->getId('division', "division_name LIKE '%".$data['entre_division']."%'"),
                'entre_district' =>   $this->import_model->getId('district', "district_name LIKE '%".$data['entre_district']."%'"),
                'entre_upazila' =>   $this->import_model->getId('upazila', "upazila_name LIKE '%".$data['entre_upazila']."%'"),
                'created_date' =>  date('Y-m-d'),
                'application_type' =>  $data['application_type'],
                'status' => 6,
                'payment_status' => 3,
                'process_status' => 6,
                'is_import' => 1
            );
        }



        $contact_id =$this->Shows->insertData($insert_data,'en_contact');
        if( $contact_id){
            return  $contact_id;
        }else{
            throw new Exception("Entrepreneur data format not valid (ec_contact).");
            return ;
        }
    }

    function application_status_add($contact_id)
    {

        if(empty($contact_id)){
            throw new Exception("application_status data format not valid (application_status).");
            return ;
        } else {
           // Add application status
            $application_status_data = array(
                'contact_id' => $contact_id, 
                'application_date' => date('Y-m-d H:i:s'),
                'reg_review_date' => date('Y-m-d H:i:s'),
                'approche_insp_date' => date('Y-m-d H:i:s'),
                'assign_inspector_date' => date('Y-m-d H:i:s'),
                'inspection_date' => date('Y-m-d H:i:s'),
                'inpected_aprv_date' => date('Y-m-d H:i:s'),
                'certificate_confirm_date' => date('Y-m-d H:i:s'),
                'certificate_delivery_date' => date('Y-m-d H:i:s'),
                'application_status' => 8,
                'status' => 1,
            );
            $this->Shows->insertData($application_status_data, "application_status");
        }
    }

    function en_business_add($entrepreneur_id, $contact_id, $data)
    {

        $en_business = array(
            'contact_id' => $contact_id,				
            'entrepreneur_id' => $entrepreneur_id,				
            'year' => $data['year'],				
            'month' => $data['month'],
            'local_market' => $data['local_market'],
            'export_market' => $data['export_market'],
            'fixed_asset_total' => $data['fixed_asset_total'],
            'current_capital_total' => $data['current_capital_total'],
            'total_investment' => $data['total_investment'],
            'local_entrepreneur' => $data['local_entrepreneur'],
            'foreign_entrepreneur' => $data['foreign_entrepreneur'],
            'local_entrep_total' => $data['local_entrep_total'],				
            'foreign_entrep_total' => $data['foreign_entrep_total'],				
            'management_employee' => $data['management_employee'],				
            'skilled_sem_skl_emp' => $data['skilled_sem_skl_emp'],				
            'unskilled_employee' => $data['unskilled_employee'],				
            'created_date' => date("Y-m-d")
        );
       
        if(empty($contact_id) || empty($entrepreneur_id) || empty($data['fixed_asset_total']) ||
        empty($data['total_investment'])
        ||  empty($data['management_employee']) ||  empty($data['skilled_sem_skl_emp'])||  empty($data['unskilled_employee'])){
           
            throw new Exception("En_business data format not valid (en_business).");
            return ;
        } else {
        // Add application status
            $en_business = array(
                'contact_id' => $contact_id,				
                'entrepreneur_id' => $entrepreneur_id,				
                'year' => $data['year'],				
                'month' => $data['month'],
                'local_market' => $data['local_market'],
                'export_market' => $data['export_market'],
                'fixed_asset_total' => $data['fixed_asset_total'],
                'current_capital_total' => $data['current_capital_total'],
                'total_investment' => $data['total_investment'],
                'local_entrepreneur' => $data['local_entrepreneur'],
                'foreign_entrepreneur' => $data['foreign_entrepreneur'],
                'local_entrep_total' => $data['local_entrep_total'],				
                'foreign_entrep_total' => $data['foreign_entrep_total'],				
                'management_employee' => $data['management_employee'],				
                'skilled_sem_skl_emp' => $data['skilled_sem_skl_emp'],				
                'unskilled_employee' => $data['unskilled_employee'],				
                'created_date' => date("Y-m-d")
            );
            return $business_id=$this->Shows->insertData($en_business,'en_business');
        }

    }
    function enterpeneur_insert($data)
    {    
        // Add multiple enterpenure
        // if(!empty($enterpeneur_info) AND count($enterpeneur_info)>0){
        //     foreach ($enterpeneur_info as $ei) {
        //         if(!empty($ei->enter_name_m)){
        //             $array_epn = array(
        //                 'contact_id' => $contact_id,
        //                 'entre_name' => $ei->enter_name_m,
        //                 'entre_name_bn' => $ei->enter_name_bn_m,
        //                 'entre_email' => $ei->enter_email_m,
        //                 'nid_no' => $ei->nid_no_m,
        //                 'birth_certificate_no' => $ei->birth_certificate_no_m,
        //                 'entre_phone_no' => $ei->entre_phone_no_m,
        //                 'entre_fax' => $ei->entre_fax_m,
        //                 'entre_off_address' => $ei->entre_off_address_m,
        //                 'entre_off_address_bn' => $ei->entre_off_address_bn_m,
        //                 'entre_division' => $ei->entre_division_m,
        //                 'entre_district' => $ei->entre_district_m,
        //                 'entre_upazila' => $ei->entre_upazila_m
        //             );
        //             $this->Shows->insertData($array_epn,'en_enterpeneurs');
        //         }
        //     }
        // }
    }

    function product_description($business_id, $data)
    {
       
            //product description
            $product_description = array_filter(explode('/', $data['product_description']));
            foreach ($product_description as $value) {
                $pro_val = array_filter(explode(',', $value));
                if(!empty($business_id) && isset($pro_val[0]) && isset($pro_val[1]) && isset($pro_val[2])){
                    $array=array(
                        'business_id'=>$business_id,
                        'product'=>$pro_val[0],
                        'quantity'=>$pro_val[1],
                        'rate'=>$pro_val[2]
                    );
                    $this->Shows->insertData($array,'en_business_description');
                }else{
                    throw new Exception("Product description data format not valid (en_business_description).");
                    return ;
                }
            }
      

    }

    function raw_material($business_id, $data)
    {
        $business_raw_materials = array_filter(explode('/', $data['annual_raw_material_details']));
         // Annual Raw Material Details
         foreach ($business_raw_materials as $brm) {
            $mat_val = array_filter(explode(',', $brm));
            if ($business_id && isset($mat_val[0]) && isset($mat_val[1]) && isset($mat_val[2])){
                $rm_array = array(
                    'business_id'=>$business_id,
                    'product'=>$mat_val[0],
                    'quantity'=>$mat_val[1],
                    'rate'=>$mat_val[2]
                );
                $this->Shows->insertData($rm_array,'en_business_raw_materials');
            } else {
                throw new Exception("Raw Materials data format not valid (en_business_raw_materials).");
                return ;
            }
        }
    }
    function curent_capital($business_id, $data)
    {
        $current_capital = array_filter(explode('/', $data['current_capital']));
         // Current Capital
         foreach ($current_capital as $cp) {
            $cap_val = array_filter(explode(',', $cp));
            if ($business_id && isset($cap_val[0]) && isset($cap_val[1]) && isset($cap_val[2])){
                $cap_array=array(
                    'business_id'=>$business_id,
                    'product'=>$cap_val[0],
                    'quantity'=>$cap_val[1],
                    'total_amt'=>$cap_val[2]
                );
                $this->Shows->insertData($cap_array,'en_business_capital');
            } else {
                throw new Exception("Curent capital data format not valid (en_business_capital).");
                return ;
            }
        }
    }

    function fixed_asset($business_id,$data)
    {
        $business_assets = explode('/', $data['fixed_assets']);
         //a Fixed Assets
         foreach ($business_assets as $value) {
            $ba_val = array_filter(explode(',', $value));
            if (isset($ba_val[0]) && isset($ba_val[1]) && isset($ba_val[2])){
                $array=array(
                    'business_id'=>$business_id,
                    'product'=>$ba_val[0],
                    'quantity'=>$ba_val[1],
                    'total_amt'=>$ba_val[2]
                );
                $this->Shows->insertData($array,'en_business_asset');

            } else {
                throw new Exception("Asset data format not valid (en_business_asset).");
                return ;
            }
        }
    }

    function local_machine($contact_id,$business_id,$data)
    {
        if (!empty($data['local_machine_list'])){
            $machineries_local = explode('/', $data['local_machine_list']);
            // Add local machine list
            foreach ($machineries_local as $mlv) {
                $ml_val = array_filter(explode(',', $mlv));
                if ($contact_id && $business_id && isset($ml_val[0]) && isset($ml_val[1]) && isset($ml_val[2])){
                    $array_lm = array(
                        'contact_id' => $contact_id,
                        'business_id' => $business_id,
                        'machine_type' => 1,
                        'machine_name' => $ml_val[0],
                        'quantity' => $ml_val[1],
                        'estimated_rate' => $ml_val[2],
                    );
                    $this->Shows->insertData($array_lm,'en_machineries_list');
                } else {
                    throw new Exception("Add local machine list data format not valid (en_machineries_list).");
                    return ;
                }
            }
        }
        
    }

    function import_machine($contact_id,$business_id,$data)
    {
        if (!empty($data['imported_machine_list'])){
            $machineries_imported = explode('/', $data['imported_machine_list']);
            // Add imported machine list
            if(!empty($machineries_imported)){
                foreach ($machineries_imported as $imv) {
                    $imv_val = array_filter(explode(',', $imv));
                    if ($contact_id && $business_id && isset($imv_val[0]) && isset($imv_val[1]) && isset($imv_val[2])){
                        $array_im = array(
                            'contact_id' => $contact_id,
                            'business_id' => $business_id,
                            'machine_type' => 2,
                            'machine_name' =>  $imv_val[0],
                            'quantity' =>  $imv_val[1],
                            'estimated_rate' =>  $imv_val[2]
                        );
                        $this->Shows->insertData($array_im,'en_machineries_list');
                    } else {
                        throw new Exception("Add imported machine list data format not valid (en_machineries_list).");
                        return ;
                    }
                }
            }
        }
    }
    function insert_document($contact_id,$entrepreneur_id)
    {
        // Add document
        if ($contact_id && $entrepreneur_id){
            
            $array_im = array(
                'contact_id' => $contact_id,
                'entrepreneur_id' => $entrepreneur_id,
            );
            $document_id = $this->Shows->insertData($array_im,'en_documents');
            $addi_doc_array=array(
				'document_id'=>$document_id,
				'title'=>'',
				'file_name'=> ''
			);
			$this->Shows->insertData($addi_doc_array,'en_document_additional');
        } else {
            throw new Exception("Add document data format not valid (en_documents).");
            return ;
        }
    }

    function get_application_fee($id){
		
		$data= $this->payment_model->getvalue_row('en_contact','payment_status,process_status,is_renew,industry_type',array('id' => $id));
		
		if($data!=''){
			$payment= $this->payment_model->getvalue_row('master_payment_configuration','*',array('status' => 1,'industry_type_id'=>$data[0]['industry_type']));
			$status='success';
			if(isset($payment[0]['certi_fees'])){
                $amount=$payment[0]['certi_fees'];
				$config_id=$payment[0]['id'];
				$payment_type=2;
            }else{
                $amount = '';
				$payment_type = '';
            }

			//$response_data=array("status" => $status,"amount" => $amount, "config_id" => $payment[0]['id'],"payment_type" => $payment_type);
			if(!empty($payment_type)){
				$payment_data= $this->db->query("select * from payments where contact_id=".$id." and payment_type=".$payment_type ." and pay_status='pending'")->num_rows();
				if($payment_data>0){
                    throw new Exception("payment not found.");
                    return ;
				}
			}
             $pay_data['amount'] = $amount;
             $pay_data['config_id'] = $config_id;
             return $pay_data;
		}else{
			throw new Exception("payment not found.");
            return ;
		}
    }
    
    function payment ($contact_id= '', $entrepreneur_id='', $data=[]) {
        $amount = $this->get_application_fee($contact_id)['amount'];
        $config_id = $this->get_application_fee($contact_id)['config_id'];

        if(empty($contact_id) || empty($config_id) || empty($amount) || empty($entrepreneur_id || empty($data['certificate_date']))){
            throw new Exception("Payments data format not valid (payments).");
            return ;
        } else {
            $paymet_data = array(
                'contact_id' => $contact_id,
                'payment_configaration_id' => $config_id,				
                'payment_type' => 2,
                'amount' => $amount,
                'transaction_no' => uniqid(),
                'trnx_currency' =>"BDT",
                'mac_addr' => "172.22.10.144",
                'user_id' =>$entrepreneur_id,
                'created_date' => date("Y-m-d H:i:s"),
                'pay_status' => 'success',
                'status' => 1,
                'is_import' => 1
            );
            $payment_id = $this->Shows->insertData($paymet_data, "payments");
            $this->certificate_save($contact_id, $payment_id, $entrepreneur_id, $data['certificate_date']);
        }
    }

    function certificate_save($contact_id = '', $payment_id = '', $entrepreneur_id = '',$updated_date) {
        $certificate_details_bn= $this->certificate_no_bn($contact_id);
        $certificate_details_en= $this->certificate_no_en($contact_id);

        if(empty($certificate_details_bn['certificate_no']) || empty($certificate_details_en['certificate_no']) ||
         empty($certificate_details_en['certificate_serial']) || empty($entrepreneur_id || empty($contact_id) ||
          empty($payment_id) || empty($updated_date))){
            throw new Exception("Certificate data format not valid (certificate).");
            return ;
        } else {
            $data = array(
                'contact_id' => $contact_id,    
                'payment_id' => $payment_id,    
                'certificate_no' => $certificate_details_bn['certificate_no'],               
                'certificate_no_en' => $certificate_details_en['certificate_no'],               
                'certificate_serial' => $certificate_details_en['certificate_serial'],               
                'user_id' => $entrepreneur_id,
                'status' => 0,
                'updated_date' => $updated_date,
                'is_import' => 1
            );
            $data['created_date'] = $updated_date;
            $this->Shows->insertData($data, "certificate");
        }
    }

    protected function certificate_no_en($contact_id=''){
        $certificate_data= $this->application_model->get_certificate_no($contact_id);
        $division_code=$certificate_data[0]['division_code'];
        $district_code=$certificate_data[0]['district_code'];
        $upazila_code=$certificate_data[0]['upazila_code'];
        $industry_name=$certificate_data[0]['certificate_name'];
        $year=date('Y');

        if(empty($contact_id) || empty($certificate_data) || empty($division_code) ||empty($district_code) ||empty($upazila_code) ||empty($industry_name)){
            throw new Exception("Certificate number (English) format not valid. Please check Geo Code");
            return ;
        }else{
            $certificate_serial1 = $this->reg_model->getAutoIncKey('CERTIFICATE_SERIAL', 'certificate', 'certificate_serial');

            $certificate_serial=str_pad($certificate_serial1, 4, '0', STR_PAD_LEFT);
    
            if($this->office_category_id==2){
                $certificate_no= '013.'.$division_code.'.'.$district_code.'.'.$upazila_code.'.'.$industry_name.'.'.$certificate_serial.'.'.$year;
            }else{
                $certificate_no=$division_code.'.'.$district_code.'.'.$upazila_code.'.'.$industry_name.'.'.$certificate_serial.'.'.$year;
            }
    
             $result['certificate_no']=$certificate_no;
             $result['certificate_serial']=$certificate_serial1;
    
             return $result;
        }
    }

    protected function certificate_no_bn($contact_id=''){
        $certificate_data= $this->application_model->get_certificate_no($contact_id);
        $division_code=Converter::en_to_bn($certificate_data[0]['division_code']);
        $district_code=Converter::en_to_bn($certificate_data[0]['district_code']);
        $upazila_code=Converter::en_to_bn($certificate_data[0]['upazila_code']);
        $industry_name=Converter::en_to_bn($certificate_data[0]['certificate_name_bn']);
        $year= Converter::en_to_bn(date('Y'));

        if(empty($contact_id) || empty($certificate_data) || empty($division_code) ||empty($district_code) ||empty($upazila_code) ||empty($industry_name)){
            throw new Exception("Certificate number (Bangla) format not valid. Please check Geo Code");
            return ;
        }else{

            $certificate_serial1 = $this->reg_model->getAutoIncKey('CERTIFICATE_SERIAL', 'certificate', 'certificate_serial');

            $certificate_serial= Converter::en_to_bn(str_pad($certificate_serial1, 4, '0', STR_PAD_LEFT));

            if($this->office_category_id==2){
                $certificate_no= '০১৩.'.$division_code.'.'.$district_code.'.'.$upazila_code.'.'.$industry_name.'.'.$certificate_serial.'.'.$year;
            }else{
                $certificate_no=$division_code.'.'.$district_code.'.'.$upazila_code.'.'.$industry_name.'.'.$certificate_serial.'.'.$year;
            }

            $result['certificate_no']=$certificate_no;
            $result['certificate_serial']=$certificate_serial1;

            return $result;
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
            $this->Shows->insertData($array_log,'import_log');
        } else {
            throw new Exception("Add document data format not valid (en_documents).");
            return ;
        }
    }
    function delete($id)
    {
        $con = "id = '$id'";
        $result = $this->Shows->deleteThisValue($con,"import_log");       
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