<?php
include_once 'BaseController.php';
require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Data_importer extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
    }


    public function index(){
    	$this->data['dynamicView'] = "importer/index";
        $this->_commonPageLayout('viewer');
    }

    public function import_personal_data(){
    	$upload_file = $_FILES['data_file']['name'];
        $extension = pathinfo($upload_file,PATHINFO_EXTENSION);
        if($extension == 'xls'){
            $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else{
            $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreed_sheet = $reader->load($_FILES['data_file']['tmp_name']);
        $sheet_data = $spreed_sheet->getActiveSheet()->toArray();
        $sheetcount = count($sheet_data);
        //echo $sheetcount; die();
        //echo "<pre>"; print_r($sheet_data);
        if($sheetcount >1){
            
            for ($i=2; $i < $sheetcount; $i++) { 
                set_time_limit(0);
                $dot_id = $sheet_data[$i][0];
                $employee_name = $sheet_data[$i][1];
                $gender = $sheet_data[$i][2];
                //$date_of_birth = $sheet_data[$i][3];
                $phone_no = $sheet_data[$i][3];

                $data = array();
                $data['employee_id'] = $dot_id;
                $data['employee_name'] = $employee_name;
                $data['gender'] = $gender;
                //$data['dob'] = $date_of_birth;
                $data['phone'] = $phone_no;
                //echo "<pre>"; print_r($data);

                $this->db->insert('personal_info',$data);

            }
            // $str = $this->db->last_query();
            // echo $str; die();

            $this->toastr->success('saved successfully');
            redirect('hr/data_importer/index');

            
        }
    }

    public function import_job_data(){
        
        $upload_file = $_FILES['data_file']['name'];
        $extension = pathinfo($upload_file,PATHINFO_EXTENSION);
        if($extension == 'xls'){
            $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else{
            $reader= new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreed_sheet = $reader->load($_FILES['data_file']['tmp_name']);
        $sheet_data = $spreed_sheet->getActiveSheet()->toArray();
        $sheetcount = count($sheet_data);
         //echo $sheetcount; die();
        // echo "<pre>"; print_r($sheetcount); die();
        if($sheetcount >1){
            $job = array();
            $user = array();
            $password = '123456';
            for ($i=2; $i < $sheetcount; $i++) { 
                set_time_limit(0);
                $dot_id = $sheet_data[$i][0];
                $employee_name = $sheet_data[$i][1];
                
                $job['employee_id'] = $dot_id;
                $job['employee_name'] = $employee_name;

                $user['role_id'] = 2;
                $user['username'] = $dot_id;
                $user['employee_id'] = $dot_id;
                $user['user_type'] = 2;
                $user['password'] = crypt($this->dx_auth->_encode($password, ''));
                
                

                $this->db->insert('job_info',$job);
                $this->db->insert('users',$user);

            }
            // $str = $this->db->last_query();
            // echo $str; die();

            $this->toastr->success('saved successfully');
            redirect('hr/data_importer/index');

            
        }
    }

    public function dload(){
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="hello_world.xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');

        $writer = new Xlsx($spreadsheet);
        $writer->save("php://output");
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