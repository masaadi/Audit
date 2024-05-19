<?php
include_once 'BaseController.php';

class Client_registration extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('master', $this->session->userdata('lang_file'));
        $this->lang->load('config', $this->session->userdata('lang_file'));
        $this->lang->load('user', $this->session->userdata('lang_file'));
        $this->load->model('admin/client_reg_model', 'D_model');
    }



    public function index()
    {
        //method for check permissions        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#profileList';
        $config['base_url'] = base_url() . 'admin/client_reg/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
        
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
        $this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
        $this->data['dynamicView'] = "client_reg/index";
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
        $company_name = $this->input->post('company_name');      

        if (!empty($company_name)) {
            $conditions['search']['company_name'] = $company_name;
        }
        

        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#profileList';
        $config['base_url'] = base_url() . 'admin/client_reg/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/client_reg/home', $data);

    }
    
    public function add()
    {       
        $this->load->view('admin/client_reg/entry');
    }
    
    function added(){

        $data = array();
        $company_name = $this->input->post('company_name');
        $representative = $this->input->post('representative');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $address = $this->input->post('address');

        $duplicate_check = $this->db->where('phone',$phone)->get('client')->row();
        if(!empty($duplicate_check)){
            $this->toastr->success('Already Exist');
            echo json_encode(array("status" => "warning", "message" => "Already Exist"));
        }else{
            $data['company_name'] = $company_name;
            $data['representative'] = $representative;
            $data['phone'] = $phone;
            $data['email'] = $email;
            $data['address'] = $address;
            $data['status'] = 1;

            $this->db->insert('client',$data);
            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));
        }

    }

    public function edit($id){
        $data['company_info'] = $this->db->where('id',$id)->get('client')->row();        
        $this->load->view('admin/client_reg/edit', $data);
    }
    
function update(){
    $data = array();
        $id = $this->input->post('id');
        $company_name = $this->input->post('company_name');
        $representative = $this->input->post('representative');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $address = $this->input->post('address');

        $duplicate_check = $this->db->where('phone',$phone)->get('client')->row();
        if(!empty($duplicate_check) && ($duplicate_check->id != $id)){
            $this->toastr->success('Already Exist');
            echo json_encode(array("status" => "warning", "message" => "Already Exist"));
        }else{
            $data['company_name'] = $company_name;
            $data['representative'] = $representative;
            $data['phone'] = $phone;
            $data['email'] = $email;
            $data['address'] = $address;
            $data['status'] = 1;

            $this->db->where('id',$id)->update('client',$data);
            $this->toastr->success('Updated Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data Updated successfully"));
        }
        

}

function delete($id,$action)
{
    $con = "id = '$id'";
    if($action==1){
        $data = array(
            'status' => 0                 
            );
    }
    elseif($action==0){
        $data = array(
            'status' => 1                
        );
    }

    $result = $this->Shows->updateThisValue($data, "client", $con);
    echo json_encode(array("status" => "success", "message" => "Status changed successfully")); 

}

public function generateListPdf(){
    error_reporting('E_NONE');
    $this->load->library('mpdf/mpdf');
    $mpdf = new mPDF('', 'A4-P', 11, 'nikosh');             
    $mpdf->AddPage('P');

    $id = $this->input->post('id');
    
    $data['array'] =  $this->D_model->single_profile($id);
    $data['cat'] = $cat;
    $data['type'] = $type;
    $data['name'] = $name;
    $data['pdf'] = 1;
    $html = $this->load->view('admin/client_reg/profile_pdf', $data, true);
    $mpdf->SetHtmlHeader('');
    $mpdf->WriteHTML($html);
    $mpdf->Output('profile_pdf.pdf', 'D');
    exit;
}

public function get_username_id(){
    $role_id = $this->input->post('role_id');
    $user = $this->D_model->get_latest_user_name_id($role_id);

    $user_name = null;
    if($user){
        $user_name = substr($user->username, strlen($user->user_prefixe))+1;
    }else{
        $user_name = '1001';
    }
    echo $user_name; exit;
    
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
