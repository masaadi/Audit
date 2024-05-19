<?php
include_once 'BaseController.php';

class Privilege extends BaseController
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


    public function index(){

        $this->data['users'] = $this->db->where('users.status_id',1)->where('users.user_type',1)->get('users')->result();
        $priv = $this->U_model->get_all_privileges();
        $this->data['privileges'] = array();


        $m_index = 'module_name';
        if($this->session->userdata("lang_file")=='bn'){
            $m_index = 'module_name_bn';
        }

        if($priv){
            foreach ($priv as $k => $v) {
                $this->data['privileges'][$v[$m_index]][] = $v;
            }
        }
        //echo "<pre>"; print_r($data['privileges']); die();
        $this->data['roles'] = $this->D_model->role_name();

        $this->data['dynamicView'] = "previlege/index";
        $this->_commonPageLayout('viewer');
    }

    public function edit($id){
        $con = "id = '$id'";
        $data['array'] = $this->Shows->getThisValue($con, "users");
        $role_id = $data['array'][0]->role_id;

        #previlege 
        $priv = $this->U_model->get_all_privileges();
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
        $data['cur_pvlg'] =  $this->U_model->updated_user_privilege($data['array'][0]->id);
        if(count($data['cur_pvlg']['menu']) == $count_menu){
            $all_check_res = true;
        }
        $data['all_check_res'] = $all_check_res;
        #end previlege
        $data['roles'] = $this->D_model->role_name();
        $data['user_id'] = $id;
       
        $this->load->view('admin/previlege/edit', $data);
    }

    public function update(){
        if ($this->input->post('user_id')) {
            $user_id = $this->input->post('user_id');
        // Usr privilage
            $privilege_cou = 0;
            if(!empty($this->input->post('menu_ck_id')) AND count($this->input->post('menu_ck_id')) > 0 ){
                $privilege_cou = count($this->input->post('menu_ck_id'));
            }
            $con = "user_id = '$user_id'";
            $result = $this->Shows->deleteThisValue($con,"user_privilege");

            if($privilege_cou>0){
                $data1 = array();
                for($i=0; $i<count($this->input->post('menu_ck_id')) ;$i++){
                    $explode_data = explode("~",base64_decode($this->input->post('menu_ck_id')[$i]));
                    $menu_id   = $explode_data[0];
                    $module_id = $explode_data[1];

                    $data1[$i] = array(
                        'user_id' => $user_id,
                        'module_id' => $module_id,
                        'menu_id' => $menu_id,
                        'created_by' => $this->userId
                        );
                }

                $this->db->insert_batch('user_privilege', $data1); 
            }

            $this->toastr->success('Updated Successfully!');

        }


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