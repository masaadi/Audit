<?php
include_once 'BaseController.php';

class Profile extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        if ($this->dx_auth->is_logged_in()): else: redirect(''); endif;
        $this->lang->load('master', $this->session->userdata('lang_file'));
        $this->lang->load('config', $this->session->userdata('lang_file'));
        $this->lang->load('user', $this->session->userdata('lang_file'));
        $this->load->model('admin/profile_model', 'D_model');
        $this->load->model('admin/user_model', 'U_model');
    }



    public function index()
    {
        //method for check permissions
        $user_privileges=$this->session->userdata('user_privileges');
        checkResult($user_privileges);
        
        $totalRec = @count($this->D_model->get_user_data());
        $config['target'] = '#profileList';
        $config['base_url'] = base_url() . 'admin/profile/index';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);
        $wings = $this->D_model->get_user_data(array('limit' => $this->total_row));
        
        $this->data['wings'] = $wings;
        $this->data['loop_start'] = 0;
        $this->data['count1'] = 0;
		//echo "<pre>";print_r($wings);die();
        $this->data['dynamicView'] = "profile/index";
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

        
        if (!empty($this->input->post('office_id'))) {
            $conditions['search']['office_id'] = $this->input->post('office_id');
        }
        
        if (!empty($this->input->post('designation_id'))) {
            $conditions['search']['designation_id'] = $this->input->post('designation_id');
        }
        

        $totalRec = @count($this->D_model->get_user_data($conditions));

        //pagination configuration
        $config['target'] = '#profileList';
        $config['base_url'] = base_url() . 'admin/profile/paginate_data';
        $config['total_rows'] = $totalRec;
        $config['per_page'] = $this->total_row;
        $config['link_func'] = 'searchFilter';
        $this->ajax_pagination->initialize($config);

        //set start and limit
        $conditions['start'] = $offset;
        $conditions['limit'] = $this->total_row;

        $data['wings'] = $this->D_model->get_user_data($conditions);
        $this->load->view('admin/profile/home', $data);

    }
    
    public function add()
    {       
        $this->load->view('admin/profile/entry');
    }
    
    function added()
    {
      
        $this->form_validation->set_rules('employee_id', 'Employee ID/Name', 'trim|required|xss_clean');
        $this->form_validation->set_rules('full_name', 'Employee Name (en)', 'trim|required|xss_clean');
        $this->form_validation->set_rules('office_id', 'Office', 'trim|required|xss_clean');
        $this->form_validation->set_rules('designation_id', 'Designation', 'trim|required|xss_clean');

        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|xss_clean');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('address', 'Confirm Password', 'required');



        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {

            $img_name = '';
            $user_img = $_FILES['pro_image']['name'];

            if ($user_img != '') {
                $img_name = $this->now_upload('pro_image', $user_img);
            }

            # For user table ===
            $userdata = array(
                'full_name' => $this->input->post('full_name'),
                'employee_id' => $this->input->post('employee_id'),
                'office_id' => $this->input->post('office_id'),
                'designation_id' => $this->input->post('designation_id'),
                'mobile' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'username' => $this->input->post('username'),
                'password' => crypt($this->dx_auth->_encode($this->input->post("password")), ''),
                'status_id' => $this->input->post('status'),             
                'photo' => $img_name,             
                'created' => date("Y-m-d"),
                'user_type' => 1
                );

            $this->Shows->insertThisValue($userdata, "users");

            # For profile ===
            
            //user log submit
            $log_des='('. text_format($this->input->post('username'),30)  .')'. " . User profile created.";
            user_log($log_des,'admin/profile');

            $this->toastr->success('Inserted Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));
        }

    }
    
    

    protected function now_upload($data, $file)
    {
        $nfile = explode(".", $file);
        $fileExt = array_pop($nfile);
        $file_name = date('d-m-Y') . '_' . time() . "." . $fileExt;
        $config['upload_path'] = './public/uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size'] = 100000;
        $config['max_width'] = 102400;
        $config['max_height'] = 100000;
        $config['encrypt_name'] = true;
        $config['file_name'] = $file_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($data)) {
            return $this->upload->display_errors();
        } else {
            return $recipe_file = $this->upload->data('file_name');
            // $file = $config['file_name'];
            // return $file;
        }
    }
    
    public function show($id,$count1)
    {

        $con = "id = '$id'";
        $data['count1'] = $count1;
        $data['array'] = $this->D_model->single_profile($id);       
        $this->load->view('admin/profile/show', $data);
    }
    



    public function edit($id){
        $con = "id = '$id'";
        $data['user_val'] = $this->D_model->get_user($id);
        
        $this->load->view('admin/profile/edit', $data);
    }
    
    function update()
    {

        if ($this->input->post('id')) {
         $id = $this->input->post('id');

         $original_value = $this->D_model->checkId($id);
         if (strtolower($this->input->post('username')) != strtolower($original_value[0]->username)) {
            $is_unique = '|is_unique[users.username]';
        } else {
            $is_unique = '';
        }
        
        
        $this->form_validation->set_rules('full_name', 'Employee Name (en)', 'trim|required|xss_clean');
        $this->form_validation->set_rules('office_id', 'Office', 'trim|required|xss_clean');
        $this->form_validation->set_rules('designation_id', 'Designation', 'trim|required|xss_clean');

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean'. $is_unique);

        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|xss_clean');
        $this->form_validation->set_rules('address', 'Confirm Password', 'required');

        
        
        if ($this->form_validation->run() == false) {
            $value = $this->form_validation->error_array();
            echo json_encode($value);

        } else {



            # For user table ===
            $userdata = array(
                'full_name' => $this->input->post('full_name'),
                'employee_id' => $this->input->post('employee_id'),
                'office_id' => $this->input->post('office_id'),
                'designation_id' => $this->input->post('designation_id'),
                'mobile' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'username' => $this->input->post('username'),
                'password' => crypt($this->dx_auth->_encode($this->input->post("password")), ''),
                'status_id' => $this->input->post('status'),             
                'created' => date("Y-m-d")
                );

            if(!empty($_FILES['pro_image']['name'])){
                $img_name = '';
                $user_img = $_FILES['pro_image']['name'];

                if ($user_img != '') {
                    $img_name = $this->now_upload('pro_image', $user_img);
                }
                $userdata['photo'] = $img_name;
            }
            
            $cond = "id = '$id'";
            $this->Shows->updateThisValue($userdata, "users",$cond);
            
            //user log submit
            $log_des='('. text_format($this->input->post('username'),30)  .')'. " . User profile created.";
            user_log($log_des,'admin/profile');

            $this->toastr->success('Updated Successfully!');
            echo json_encode(array("status" => "success", "message" => "Data save successfully"));             
        }

    }

}

function delete($id,$action)
{

        // $con = "id = '$id'";
        // $result = $this->Shows->deleteThisValue($con,"profile");       
        // echo json_encode(array("status" => "success", "message" => "Data Active Successfully!"));
    $message = "Data Active Successfully!";
    $con = "id = '$id'";
    $status='Active';
    if($action==2){
        $data = array(
            'status_id' => 0                 
            );
        $message = "Data Inactive Successfully!";
    }
    elseif($action==1){
        $data = array(
            'status_id' => 1                
            );
    }

         //user log submit
    $original_value = $this->U_model->checkId($id);
    $log_des="(".$original_value[0]->username.")"." Profile ".$status.".";
    user_log($log_des,'admin/profile');

    $result = $this->Shows->updateThisValue($data, "users", $con);
    echo json_encode(array("status" => "success", "message" => $message));
    

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
    $html = $this->load->view('admin/profile/profile_pdf', $data, true);
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

public function get_user_privilege_ajax(){
    $role_id = $this->input->post("role_id");

    $priv = $this->U_model->get_all_privileges($role_id);
    $data['privileges'] = array();

    $m_index = 'module_name';
    if($this->session->userdata("lang_file")=='bn'){
        $m_index = 'module_name_bn';
    }
    if($priv){
        foreach ($priv as $k => $v) {
            $data['privileges'][$v[$m_index]][] = $v;
        }
    }
    $this->load->view('admin/profile/user_privilege', $data);

}

public function get_user_privilege_ajax_previous(){
    $id = $this->input->post('id');
    $role_id = $this->input->post('role_id');

    $con = "id = '$id'";
    $data['array'] = $this->Shows->getThisValue($con, "profile");
    $data['user_val'] = $this->D_model->get_user($data['array'][0]->user_id);

        #previlege 
    $priv = $this->U_model->get_all_privileges($role_id);
    $data['privileges'] = array();

    $m_index = 'module_name';
    if($this->session->userdata("lang_file")=='bn'){
        $m_index = 'module_name_bn';
    }

    $all_check_res = false;
    $count_menu = 0;
    if($priv){
        foreach ($priv as $k => $v) {
            if($v['module_id']){
                $data['privileges'][$v[$m_index]."~".$v['module_id']][] = $v;
                $count_menu++;
            }else{
                $data['privileges'][$v[$m_index]][] = $v;
                $count_menu++;
            }
            
        }
    }
    $data['cur_pvlg'] =  $this->U_model->updated_user_privilege($data['array'][0]->user_id);
    if(count($data['cur_pvlg']['menu']) == $count_menu){
        $all_check_res = true;
    }
    $data['all_check_res'] = $all_check_res;
        #end previlege
    $data['roles'] = $this->D_model->role_name();
    $this->load->view('admin/profile/user_privilege_previous', $data);

}

public function get_busniess_type(){
    $id   = $this->input->post('id');
    $type = $this->input->post('type');

    $business_type_options = getOptionBusinessType();
    $new_array = array('0' => 'All');
    $bus_typ_ids = array();
    if($business_type_options){
        foreach($business_type_options as $k => $v){
            if($k){
                $new_array[$k] = $v; 
                $bus_typ_ids[] = $k;
            }
        }
    }
    $bus_typ_id = $bus_typ_ids;

    $data['new_array'] = $new_array;
    if($type='edit' && $id){
        $data['selected_business_ids'] =  $this->D_model->get_selected_business_ids($id);
    }else{
        $data['selected_business_ids'] =  array();
    }
    

    $this->load->view('admin/profile/select', $data);
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
