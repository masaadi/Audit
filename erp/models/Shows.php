<?php

/*
 * ***********************************************************************************************************
 * 																											*
 * 		Authentication library for Code Igniter.															*
 * 		@File Type		Model Public Class																	*
 * 		@Author			Kazi Sanchoy Ahmed (B.Sc in CSE)													*
 * 		@Email			sanchoy7@gmail.com		                                     						*
 * 		@Profession		Web Application Developer & Programmer												*
 * 		@Based on		CL Auth by Jason Ashdown (http://http://www.jasonashdown.co.uk/)					*
 * 																											*
 * ***********************************************************************************************************
 */

class Shows extends CI_Model
{

    function  __construct()
    {
        parent::__construct();
        $this->_prefix = $this->config->item('DX_table_prefix');
        //$this->_branch_table = $this->_prefix.$this->config->item('DX_branch_table');	
    }

    // Code For Dublicate data check	
    function getThisValue($cond = FALSE, $tableName = '', $select_qry = '*', $limit = '', $order = 'id ASC')
    {
        $tableName = $this->_prefix . $tableName;
        $this->db->select($select_qry, FALSE);
        if ($cond) {
            $this->db->where($cond);
        }
        $this->db->order_by($order);
        return $this->db->get($tableName, $limit)->result();
    }
	
	function getNameById($cond, $table, $field) {
        $data = '';
        if (!empty($cond)):
            $array = $this->Shows->getThisValue($cond, $table, $field, '1');
            if (count($array)): foreach ($array as $row): endforeach;
                $data = $row->$field;
            endif;
            return $data;
        else:
            return $data;
        endif;
    }

    function insertThisValue($data = '', $tableName = '')
    {
        $tableName = $this->_prefix . $tableName;
        $this->db->insert($tableName, $data);
        return $this->db->insert_id();
    }

    function insertData($data = '', $tableName = '')
    {
        $tableName = $this->_prefix . $tableName;
        $this->db->insert($tableName, $data);
        return $this->db->insert_id();
    }

    function deleteThisValue($cond = FALSE, $tableName = '', $row_id = '')
    {
        if (!empty($cond)): $this->db->where($cond); endif;
        $this->db->delete($tableName);
		if($row_id>0){
           $this->deletelog($menu_title = 1, $row_id);
		}
    }

    function updateThisValue($data = '', $tableName = '', $cond = '', $row_id = '')
    {
        $tableName = $this->_prefix . $tableName;
        $this->db->where($cond);
        $this->db->update($tableName, $data);
		if($row_id>0){
          $this->editlog($this->session->userdata('menu_title'), $row_id);
		}
    }
    function verify_pass($key)
    {
        $this->db->where('verify_password',$key);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0){
            $user_id = $query->row()->id;
            $this->db->set('verify_password', '');
            $this->db->set('status_id', 1);
            $this->db->where('id',$user_id);
            $this->db->update('users');
            return true;
        }
        else{
            return false;
        }
    }

    function get_max_id_from_application_status($contact_id){
        return $this->db->query('SELECT MAX(id) AS maxid FROM application_status WHERE contact_id='.$contact_id)->row()->maxid;
    }

    

   

   
function convert_bn($englishNumber)
  {
    $englishNumber = (string)$englishNumber;
    $banglaNumber = '';
    $indexLimit = strlen($englishNumber);
    for ($i = 0; $i < $indexLimit; $i++) {
        switch ($englishNumber[$i]) {
            case "0":
                $banglaNumber .= '০';
                break;
            case "1":
                $banglaNumber .= '১';
                break;
            case "2":
                $banglaNumber .= '২';
                break;
            case "3":
                $banglaNumber .= '৩';
                break;
            case "4":
                $banglaNumber .= '৪';
                break;
            case "5":
                $banglaNumber .= '৫';
                break;
            case "6":
                $banglaNumber .= '৬';
                break;
            case "7":
                $banglaNumber .= '৭';
                break;
            case "8":
                $banglaNumber .= '৮';
                break;
            case "9":
                $banglaNumber .= '৯';
                break;
            default:
                $banglaNumber .= $englishNumber[$i];
                break;
        }
    }
    return $banglaNumber;
 }

	

}

?>