<?php
include_once 'BaseController.php';
class Common_api_auth extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('session');
    }

    public function index()
    {
        echo 'connected..';
    }

    public function getMenuAll($ln = '', $user_id = 0)
    {

        $lang = ($ln == '') ? 'en' : $ln;
        if (is_numeric($user_id)) {
            $userArray = $this->Shows->getThisValue("TOKEN_NO=$user_id", "USER_LOGIN_INFO", "USER_ID", "", "ID DESC");
            if ($userArray) {
                
                $module_array = $this->Shows->get_menu_all_data($userArray[0]->USER_ID, $lang);

                // echo "<pre>";
                // print_r($module_array);
                // exit;

                echo json_encode($module_array);
            } else {
                echo 'Error';
            }
        } else {
            echo 'Error';
        }

    }

    public function getMenuAllNew($ln = '', $token_no = 0)
    {
        $lang = ($ln == 'bn') ? $ln : 'en';

        if ($token_no) {
            $module_array = $this->Shows->get_menu_all_data_new($lang, $token_no);

            if ($module_array) {
                echo json_encode($module_array);
            } else {
                echo "No menu previlege found.";
            }
        } else {
        	echo "No token found.";
        }
    }


    public function getMenuAll1()
    {
        $module_array = $this->Shows->getThisValue("STATUS = 1 AND TYPE=1", "MASTER_MODULE", "", "", "ID ASC");

        echo json_encode(array('module' => $module_array, 'subModule' => $sub_module_array, 'menu' => $menu_array));

    }

    public function getSumMenuAll()
    {
        $module_array = $this->Shows->getThisValue(" STATUS = 1 ", "MASTER_SUB_MODULE", "", "", "SORTING_ORDER ASC");
        echo json_encode($module_array);
    }

    public function authenticate()
    {
        $datas  = json_decode(file_get_contents("php://input"));
        $result = $this->Shows->check_login($datas);
        echo json_encode($result);
    }

    public function get_user_data()
    {
        $res = array(
            'username' => 'jaynal'
            , 'password' => '12345'
            , 'firstName' => 'jaynal'
            , 'lastName' => 'abedin',
        );

        echo json_encode($res);

    }

    public function change_language($ln = 'en')
    {
        $this->session->set_userdata('lang', $ln);
        print_r($this->session->userdata());

        echo $this->session->userdata('lang_file');
        echo $this->session->userdata('lang');
    }

    public function show_language()
    {
        print_r($this->session->userdata());

        //echo $this->session->userdata('lang_file');
        echo $this->session->userdata('lang');
    }

    public function userLiginInfo($id = 0)
    {
        $data = $this->Shows->check_user_login_info($id);

        // echo "<pre>";
        // echo $id."<br>";
        // print_r($data);
        // exit;
        
        echo $data[0]['USER_INFO'];
    }

}
