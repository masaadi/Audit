<?php
include_once 'BaseController.php';
require FCPATH.'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Tracking_report_excel extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->load->model('reports/tracking_report_model', 'personal_model');
    }

    public function dload(){

        $service_type = $this->input->post('service_type');      
        $reg_no = $this->input->post('reg_no');      
        $status = $this->input->post('status');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        $conditions = array();
        if (!empty($service_type)) {
            $conditions['search']['service_type'] = $service_type;
        }
        if (!empty($reg_no)) {
            $conditions['search']['reg_no'] = $reg_no;
        }
        if (!empty($status)) {
            $conditions['search']['status'] = $status;
        }
        if (!empty($start_date)) {
            $conditions['search']['start_date'] = $start_date;
        }
        if (!empty($end_date)) {
            $conditions['search']['end_date'] = $end_date;
        }

        $service_data = $this->personal_model->get_service_data($conditions);
        // echo "<pre>"; print_r($data['wings']); die();

        $approval_steps = $this->db->select('approval_steps.*,personal_info.employee_name,designation.designation_name,service_action_message.message,service_action_message.action_type')
                ->join('personal_info','personal_info.employee_id = approval_steps.employee_id','left')
                ->join('job_info','personal_info.employee_id = job_info.employee_id','left')
                ->join('designation','designation.id = job_info.current_desig','left')
                ->join('service_action_message','service_action_message.step_id = approval_steps.id','left')
                ->where('approval_steps.service_id',2)
                ->where('approval_steps.status',1)
                ->order_by('approval_steps.id','asc')
                ->get('approval_steps')->result();
            // echo "<pre>"; print_r($approval_steps); die();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="tracking-report.xlsx"');

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $col_second = 'F';
        $row = 3;

        $sheet->setCellValue('A1', 'Service Reg. No.')->getColumnDimension('A')->setWidth(30);
        $sheet->setCellValue('B1', 'Service Type')->getColumnDimension('B')->setWidth(30);
        $sheet->setCellValue('C1', 'Applicant Name')->getColumnDimension('C')->setWidth(30);
        $sheet->setCellValue('D1', 'Service Status')->getColumnDimension('D')->setWidth(30);
        $sheet->setCellValue('E1', 'Application Date')->getColumnDimension('E')->setWidth(30);

        foreach ($service_data as $key => $value) {
            $approval_steps = $this->db->select('approval_steps.*,personal_info.employee_name,designation.designation_name,service_action_message.message,service_action_message.action_type')
                ->join('personal_info','personal_info.employee_id = approval_steps.employee_id','left')
                ->join('job_info','personal_info.employee_id = job_info.employee_id','left')
                ->join('designation','designation.id = job_info.current_desig','left')
                ->join('service_action_message','service_action_message.step_id = approval_steps.id','left')
                ->where('approval_steps.service_id',$value->id)
                ->where('approval_steps.status',1)
                ->order_by('approval_steps.id','asc')
                ->get('approval_steps')->result();


            $sheet->setCellValue('A'.$row, $value->registration_id);
            $sheet->setCellValue('B'.$row, $value->service_type);
            $sheet->setCellValue('C'.$row, $value->employee_name);
            $sheet->setCellValue('D'.$row, $value->status);
            $sheet->setCellValue('E'.$row, $value->created_date);

            foreach ($approval_steps as $step_value) {
                $action_status = '';

                if($step_value->action_type == 1){$action_status = "Forward";}else{$action_status = "Backward";}
                $sheet->setCellValue($col_second.'1', 'Responsible Person')->getColumnDimension($col_second)->setWidth(30);
                $sheet->setCellValue($col_second.$row, $step_value->employee_name);
                $col_second++;

                if($step_value->action_type == 1){$action_status = "Forward";}else{$action_status = "Backward";}
                $sheet->setCellValue($col_second.'1', 'Designation')->getColumnDimension($col_second)->setWidth(30);
                $sheet->setCellValue($col_second.$row, $step_value->designation_name);
                $col_second++;

                if($step_value->action_type == 1){$action_status = "Forward";}else{$action_status = "Backward";}
                $sheet->setCellValue($col_second.'1', 'Action Message')->getColumnDimension($col_second)->setWidth(30);
                $sheet->setCellValue($col_second.$row, $step_value->message);
                $col_second++;

                if($step_value->action_type == 1){$action_status = "Forward";}else{$action_status = "Backward";}
                $sheet->setCellValue($col_second.'1', 'Action Taken')->getColumnDimension($col_second)->setWidth(30);
                $sheet->setCellValue($col_second.$row, $step_value->created_date);
                $col_second++;
                
                if($step_value->action_type == 1){$action_status = "Forward";}else{$action_status = "Backward";}
                $sheet->setCellValue($col_second.'1', 'Action Type')->getColumnDimension($col_second)->setWidth(30);
                $sheet->setCellValue($col_second.$row, $action_status);
                $col_second++;
                
                
                
            }
            $col_second = 'F';
            $row++;
        }
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