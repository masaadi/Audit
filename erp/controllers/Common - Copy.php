<?php
include_once 'BaseController.php';

class Common extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    function getOfficeByWingSearch()
    {
        if ($_POST):
            $wing_id = $this->input->post("wingId");
            echo form_dropdown("office_id", getOptionOfficeSearch($wing_id), "office_id", "  id='office_id' class='form-control'");
        endif;
    }

    function getOfficeByDistrict()
    {
        if ($_POST):
            $district_id = $this->input->post("district_id");
            echo form_dropdown("office_id", getOptionOfficeByDistrict($district_id), "office_id", "  id='office_id' class='form-control'");
        endif;
    }
    
    public function getemplist()
    {
        $designation=$this->input->post('designation');
        $office_id = $this->config->item('AccountsDivision');
        
        $array= $this->db->query("SELECT T2.EMPLOYEE_NAME,T2.ID FROM HR_CURRENT_JOB_INFO T1 
        INNER JOIN HR_PERSONALINFO T2 ON T1.PERSONAL_INFO_ID=T2.ID 
        WHERE CURR_DESIGNATION_ID='".$designation."' AND CURR_OFFICE_ID = '".$office_id."'")->result();
        
        foreach($array as $ar)
        {
            echo '<option value="'.$ar->ID.'">'.$ar->EMPLOYEE_NAME.'</option>';
        }
    }
    
    

    function getBranchs()
    {
        if ($_POST):
            $bank_id = $this->input->post("bank_id");            
            echo form_dropdown("branch_id", getBranchIds($bank_id), "branch_id", " class='form-control' id='branch_id'");
        endif;
    }
    /*if ($_POST):
        $office_type_id = $this->input->post("office_type_id");
        $wing_id = $this->input->post("cur_wing_id");
        echo form_dropdown("cur_office_id", get_Option_Office($office_type_id, $wing_id), "cur_office_id", " class='form-control' id='cur_office_id'");
    endif;*/
    function getOffice_1()
    {
        if ($_POST):
            $office_type_id = $this->input->post("office_type_id");
            $wing_id = $this->input->post("wing_id");            
            echo form_dropdown("office_id", get_Option_Office($office_type_id, $wing_id), "office_id", " class='form-control' id='office_id'");
        endif;
    }

    function get_Option_Office_sindata()
    {
        if ($_POST):
            $office_type_id = $this->input->post("office_type_id");
            echo form_dropdown("office_id", get_Option_Office_sing($office_type_id), "office_id", " class='form-control' id='office_id'");
        endif;
    }

    function getOffice_dep()
    {
        if ($_POST):
            $office_type_id = $this->input->post("dep_office_type_id");
            $wing_id = $this->input->post("dep_wing_id");            
            echo form_dropdown("dep_office_id", get_Option_Office($office_type_id, $wing_id), "dep_office_id", " class='form-control' id='dep_office_id'");
        endif;
    }
    
    function getOffice_2($id = null)
    {
        if ($_POST):
            $office_category_id = $this->input->post("office_category_id");
            echo form_dropdown("office_id", getOptionOfficeByCatId($office_category_id), (!empty($id))?$id:"office_id", " class='form-control' id='office_id_sds'");
        endif;
    }

    function getOfficeForDeposite()
    {
        if ($_POST):
            $office_type_id = $this->input->post("office_type_id");            
            echo form_dropdown("office_id", getOptionOfficebytype_common($office_type_id), "office_id", " id='office_id' style='width:150px;padding: 4px 5px 8px 4px;'");
        endif;
    }
    function getRole()
    {
        if ($_POST):
            $office_id = $this->input->post("office_id");
            $query = $this->Shows->getValue(" OFFICE_ID = '$office_id'","ADD_OFFICE_ROLE");    
            if(count($query)){
               $type_id = $query[0]->ROLE_TYPE_ID;
               echo form_dropdown("role_id", getOptionRole_common($type_id), "role_id", " id='role_id' class='form-control'");

           }
           else{

            echo form_dropdown("role_id", getOptionRole($office_id), "role_id", " id='role_id' class='form-control'");   
        }        
        
        endif;
   }
   
   function getRole2()
    {
        if ($_POST):
            $office_id = $this->input->post("office_id");
            $query = $this->Shows->getValue(" OFFICE_ID = '$office_id'","ADD_OFFICE_ROLE");    
            if(count($query)){
               $type_id = $query[0]->ROLE_TYPE_ID;
               echo form_dropdown("role_id_1", getOptionRole_common($type_id), "role_id_1", " id='role_id_1' class='form-control'");

           }
           else{

            echo form_dropdown("role_id_1", getOptionRole($office_id), "role_id_1", " id='role_id_1' class='form-control'");   
        }        
        
        endif;
   }



function getOfficeRole()
{
    if ($_POST):
        $office_id = $this->input->post("office_id");
        $query = $this->Shows->getValue(" OFFICE_ID = '$office_id'","ADD_OFFICE_ROLE"); 
        
        echo form_dropdown("role_id", getOptionRole($office_id), "role_id", " id='role_id' class='form-control'");   
        
        
    endif;
}
function getSupRole()
{
    if ($_POST):
        $role_type_id = $this->input->post("role_type_id");
        echo form_dropdown("role_id", getOptionSupRole($role_type_id), "role_id", " id='role_id' class='form-control'");
    endif;
}


function getAssetNameByCat()
{
    if ($_POST):
        $catID = $this->input->post("category");
        echo form_dropdown("asset_name", getOptionAssetsNameById($catID), "asset_name", "  id='asset_name' class='form-control'");
    endif;
}

function getOfficeByType()
{
    if ($_POST):
        $wng = $this->input->post("wing");
        echo form_dropdown("office_id", getOptionOfficeByType($wng), "office_id", "  id='office_id' class='form-control'");
    endif;
}

function getFieldOfficeByType()
{
    if ($_POST):
        $wng = $this->input->post("wing");
        echo form_dropdown("field_office_id", getOptionFieldOfficeByType($wng), "field_office_id", "  id='field_office_id' class='form-control'");
    endif;
}

function getOfficeByOfficeId()
{
    if ($_POST):
            // $officeId = $this->input->post("oid");
        $wng = $this->input->post("wid");
        echo form_dropdown("field_office", getOptionOfficeByOffice($wng), "field_office", "  id='field_office' class='form-control'");
    endif;
}

function getOffice()
{
    if ($_POST):
        $office_type_id = $this->input->post("office_type_id");
        $wing_id = $this->input->post("wing_id");
        echo form_dropdown("office_id", getOptionOffice_common($office_type_id, $wing_id), "office_id", " class='form-control office_id_chk' id='office_id' onchange='loadParas()'");
    endif;
}

function getOfficeByWingId()
{
    if ($_POST):
        $wing_id = $this->input->post("wing_id");
        echo form_dropdown("office_id", getOptionOfficeByWingId($wing_id), "office_id", " class='form-control' id='office_id' onchange='loadParas()'");
    endif;

}


function getOfficeByWingSearchHome()
{
    if ($_POST):
        $wingid = $this->input->post("wing");
            // $office_type_id = $this->input->post("office");

        echo form_dropdown("office_id", getOptionOfficeByWingId($wingid), "office_id", "  id='office_id' style='width:150px;padding: 4px 5px 8px 4px;'");
    endif;
}

function getOfficeBySectionSearchHome()
{
    if ($_POST):
        $office_type_id = $this->input->post("office");
        $wingid = $this->input->post("wing");

        echo form_dropdown("office_id", getOptionOffice($office_type_id, $wingid), "office_id", "  id='office_id' style='width:150px;padding: 4px 5px 8px 4px;'");
    endif;
}


function getOfficeByWing()
{
    if ($_POST):
        $wingid = $this->input->post("wing");
        $office_type_id = $this->input->post("office");
            /*echo "<pre>";
            print_r($wingid);
            exit();*/
            echo form_dropdown("office_id", getOptionOfficeByWing($wingid, $office_type_id), "office_id", "  id='office_id' class='form-control'");
        endif;
    }


    function getOfficeByWingCreate()
    {
        if ($_POST):
            $wingid = $this->input->post("wing");
            $office_type_id = $this->input->post("office");
            /*echo "<pre>";
            print_r($wingid);
            exit();*/
            echo form_dropdown("office_id", getOptionOfficeByWing($wingid, $office_type_id), "office_id", "  id='office_id' class='form-control'");
        endif;
    }

    function getOfficeForRCA()
    {
        if ($_POST):
            $wing_id = $this->input->post("wing_id");
            $district = $this->input->post("district");
            echo form_dropdown("office_id[]", getOptionOfficeForRCA($wing_id,$district), "office_id", " class='form-control office_id' id='select2' multiple='true' ");
        endif;
    }

    function getCurOffice()
    {
        if ($_POST):
            $office_type_id = $this->input->post("office_type_id");
            $wing_id = $this->input->post("cur_wing_id");
            echo form_dropdown("cur_office_id", getOptionOffice($office_type_id, $wing_id), "cur_office_id", " class='form-control' id='cur_office_id'");
        endif;
    }

    function getOffice_id_using_wing_officeType()
    {
        if ($_POST):
            $office_type_id = $this->input->post("office_type_id");
            $wing_id = $this->input->post("cur_wing_id");
            echo form_dropdown("office_id", getOptionOffice($office_type_id, $wing_id), "office_id", " class='form-control' id='office_id'");
        endif;
    }


//for select2 patern
    function getOfficeForSelect2()
    {
        if ($_POST):
            $office_type_id = $this->input->post("office_type_id");
            $wing_id = $this->input->post("wing_id");
            echo form_dropdown("child_office_id[]", getOptionOffice($office_type_id, $wing_id), "child_office_id", " class='form-control child_office_id' id='select2' multiple='true' ");
        endif;
    }


    //for select2 patern update mode
    function getOfficeForUpdate()
    {
        if ($_POST):
            $office_type_id = $this->input->post("office_type_id");
            echo form_dropdown("child_office_id", getOptionOffice($office_type_id), "child_office_id", " class='form-control child_office_id'");
        endif;
    }
    
    function getSubModule_1(){

       if ($_POST):
        $module_id = $this->input->post("module_id");
        echo form_dropdown("sub_module_id_1", getOptionSubModule($module_id), "sub_module_id_1", " class='form-control', style='width:200px' id='sub_module_id_1'");
    endif;
    
}

function getSubModule()
{

    if ($_POST):
        $module_id = $this->input->post("module_id");
        echo form_dropdown("sub_module_id", getOptionSubModule($module_id), "sub_module_id", " class='form-control', id='sub_module_id'");
    endif;
}

function getWing()
{
    if ($_POST):
        $id = $this->input->post("id");
        echo form_dropdown("wing_id", getOptionWingById($id), "wing_id", " class='form-control', id='wing_id'");
    endif;
}


function getDistrict()
{
    if ($_POST):
        $div_id = $this->input->post("id");
        echo form_dropdown("district_id", getOptionDistrictbyDivision($div_id), "district_id", ' class="form-control" id="district_id"');
    endif;
}

function getThana()
{
    if ($_POST):
        $dis_id = $this->input->post("id");
        echo form_dropdown("upazila_id", getOptionthana($dis_id), "upazila_id", " class='form-control', id='upazila_id'");
    endif;
}


function getThanaPre()
{
    if ($_POST):
        $dis_id = $this->input->post("district_id");
        echo form_dropdown("upazila_id_per", getOptionthana($dis_id), "upazila_id", " class='form-control', id='upazila_id'");
    endif;
}

function getUnion()
{
    if ($_POST):
        $upazila_id = $this->input->post("upazila_id");
        echo form_dropdown("union_id", getOptionUnion($upazila_id), "union_id", " class='form-control', id='union_id'");
    endif;
}

function getNmeByDsg()
{
    if ($_POST):
        $first_officer_designation_id = $this->input->post("first_officer_designation_id");
        echo form_dropdown("first_officer_id", getOptionNameBd($first_officer_designation_id), "first_officer_id", " class='form-control', id='first_officer_id'");
    endif;
}

function getSecNmeByDsg()
{
    if ($_POST):
        $second_officer_designation_id = $this->input->post("second_officer_designation_id");
        echo form_dropdown("second_officer_id", getSecOptionNameBd($second_officer_designation_id), "second_officer_id", " class='form-control', id='second_officer_id'");
    endif;
}


function getSubsection()
{

    if ($_POST):
        $Sec_id = $this->input->post("section_id");
        echo form_dropdown("subsection_id", getOptionSubSection($Sec_id), "subsection_id", " class='form-control', id='sub_section_id'");
    endif;
}

function getGradeStep()
{

    if ($_POST):
        $Sec_id = $this->input->post("grade_id");
        $year = $this->input->post("year");
        echo form_dropdown('basic_salary', getOptionGradeStep($Sec_id,$year), 'basic_salary', 'class="form-control" id="basic_salary"');
    endif;
}

function getGradeScale()
{
    if ($_POST):
        $Sec_id  = $this->input->post("grade_id");
        $year = $this->input->post("year");
        echo form_dropdown('grade_step_id', getOptionScaleStep($Sec_id,$year), 'grade_step_id', 'class="form-control" id="grade_step_id"');
    endif;
}

function getCurGradeStep()
{

    if ($_POST):
        // $Sec_id = $this->input->post("grade_id");
        // $cur_year = $this->input->post("cur_year");
        // echo form_dropdown('cur_basic_salary', getOptionGradeStep($Sec_id), 'cur_grade_step_id', 'class="form-control" id="cur_basic_salary"');

        $cur_grade_step_id = $this->input->post("cur_grade_step_id");
        echo form_dropdown('cur_basic_salary', getOptionGradeStep($cur_grade_step_id), 'cur_basic_salary', 'class="form-control" id="cur_basic_salary"');
    endif;
}

function getCurScale()
{

    if ($_POST):
        $Sec_id = $this->input->post("grade_id");
        $cur_year = $this->input->post("cur_year");
        echo form_dropdown('cur_grade_step_id', getOptionScaleStep($Sec_id,$cur_year), 'cur_grade_step_id', 'class="form-control" id="cur_grade_step_id"');
    endif;
}



    //function chechkEmployeeId


//get section by office wise
function getSectionOfficeWise($id = null)
{

    if ($_POST):
        $office_id = $this->input->post("office_id");
        echo form_dropdown("section_id", getOptionSectionOfficeWise($office_id), (!empty($id))?$id:"section_id", " class='form-control', id='section_id'");
    endif;
}

function getOfficeSelectedTypes()
{
    if ($_POST):
        $wing_id = $this->input->post("wing_id");
        echo form_dropdown("office_type_id", getOptionOfficeTypeByWingId($wing_id), "office_type_id", " class='form-control', id='office_type_id'");
    endif;
}

function getSubCtegory()
{
    if ($_POST):
        $cat_name = $this->input->post("category_name");
        echo form_dropdown("sub_category_name", getOptionSubcategory($cat_name), "sub_category_name", " class='form-control', id='sub_category_name'");
    endif;
}

function getShipName()
{
    if ($_POST):
        $lc_id = $this->input->post("lc_id");
        echo form_dropdown("ship_name", getOptionShipName($lc_id), "lc_no", " class='form-control', id='ship_name'");
    endif;
}

function getItemName()
{
    if ($_POST):
        $item_name = $this->input->post("category_name");
        echo form_dropdown("item_name", getOptionItemName($item_name), "item_name", " class='form-control', id='item_name'");
    endif;
}
function getItemByCtegory()
{
    if ($_POST):
        $item_name = $this->input->post("category_name");
        echo form_dropdown("item_name", getOptionItemName($item_name), "item_name", " class='form-control', id='item_name'");
    endif;
}
function getItemBySubcat()
{
    if ($_POST):
        $item_name = $this->input->post("sub_cat_name");
        echo form_dropdown("item_name", getOptionItemNameBySubcat($item_name), "item_name", " class='form-control', id='item_name'");
    endif;
}

function getItemByCanAndSubcat()
{
    if ($_POST):
        $cond['cat'] = $this->input->post("category_name");
        $cond['subCat'] = $this->input->post("sub_cat_name");
        echo form_dropdown("item_name", getOptionItemNameByCatAndSubcat($cond), "item_name", " class='form-control', id='item_name'");
    endif;
}
function getItemAgainestCatSubCatCtegory()
{
    if ($_POST):
        $category_name = $this->input->post("category_name");
        $sub_category_name = $this->input->post("sub_category_name");
        echo form_dropdown("item_name", getOptionItemAgnCatAndSubcat($category_name,$sub_category_name), "item_name", " class='form-control', id='item_name'");
    endif;
}

function getVehicleName()
{
    if ($_POST):
        $v_type = $this->input->post("v_type");
        echo form_dropdown("vehicle_name", getOptionVehicleName($v_type), "vehicle_name", " class='form-control dupliChk', id='vehicle_name'");
    endif;
}

function getVehicleNameTemp()
{
    if ($_POST):
        $v_type = $this->input->post("v_type");
        echo form_dropdown("vehicle_name", getOptionVehicleName($v_type), "vehicle_name", " class='form-control', id='vehicle_nameTemp'");
    endif;
}

function getMesUnitName()
{
    if ($_POST):?>
    <?php
    $unit = $this->input->post("unitName");
    $con = "ID = '$unit'";
    $unitData = $this->Shows->getValue($con, "INV_ITEM");
    $munit_id = "";
    if(count($unitData)){
        $munit_id = $unitData[0]->MEASUREMENT_UNIT;
    }
    if (!empty($unitData)) {
        echo form_dropdown("measure_unit", getOptionMeasure_unit_new($munit_id), $munit_id, " class='form-control', id='measure_unit'");
    }else{
        echo form_dropdown("measure_unit", getOptionMeasure_unit_new($munit_id), $munit_id, " class='form-control', id='measure_unit'");
    }
    
endif;
}
function getAssetMesUnitName()
{
    if ($_POST):?>
    <?php
    $unit = $this->input->post("unitName");
    $con = "ID = '$unit'";
    $unitData = $this->Shows->getValue($con, "INV_ITEM");
    $munit_id = "";
    if(count($unitData)){
        $munit_id = $unitData[0]->MEASUREMENT_UNIT;
    }
    if (!empty($unitData)) {
        echo form_dropdown("measure_unit", getOptionMeasure_unit_new($munit_id), $munit_id, " class='form-control', id='measure_unit'");
    }else{
        echo form_dropdown("measure_unit", getOptionMeasure_unit_new($munit_id), $munit_id, " class='form-control', id='measure_unit'");
    }
    
endif;
}

function getDesignation_1()
{
    if ($_POST):
        $condition = array();
        $office_id = $this->input->post("office_id");
        $ci = &get_instance();
        $ci->load->model('Common_Tasks');
        if (!empty($office_id)) {
            $condition['office_id'] = $office_id;
        }

        $array = $ci->Common_Tasks->getDesignation($condition);
        $str = "";
        $str .= '<select name="cur_designation_id" id="cur_designation_id" class="form-control" >
        <option value="">Select </option>';
        if (!empty($array)):
            foreach ($array as $row):
                if(!empty($row->REMARK)){
                    $str .= '<option data-id="' . $row->ID . '" value="' . $row->DESIGNATION_ID . '">' . $row->REMARK . '</option>';
                }else{
                    $str .= '<option data-id="' . $row->ID . '" value="' . $row->DESIGNATION_ID . '">' . $row->DESIGNATION . '</option>';
                }   
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;

    endif;
}

function getDesignation_2()
{
    if ($_POST):
        $condition = array();
        $office_id = $this->input->post("office_id");
        $ci = &get_instance();
        $ci->load->model('Common_Tasks');
        if (!empty($office_id)) {
            $condition['office_id'] = $office_id;
        }

        $array = $ci->Common_Tasks->getDesignation($condition);
        $str = "";
        $str .= '<select name="cur_designation_id" id="cur_designation_id" class="form-control" >
        <option value="">Select </option>';
        if (!empty($array)):
            foreach ($array as $row):
                if(!empty($row->REMARK)){
                    $str .= '<option data-id="' . $row->ID . '" value="' . $row->DESIGNATION_ID . '">' . $row->REMARK . '</option>';
                }else{
                    $str .= '<option data-id="' . $row->ID . '" value="' . $row->DESIGNATION_ID . '">' . $row->DESIGNATION . '</option>';
                }   
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;

    endif;
}

function getDesignation_3()
{
    if ($_POST):
        $condition = array();
        $office_id = $this->input->post("office_id");
        $ci = &get_instance();
        $ci->load->model('Common_Tasks');
        if (!empty($office_id)) {
            $condition['office_id'] = $office_id;
        }

        $array = $ci->Common_Tasks->getDesignation($condition);
        $str = "";
        $str .= '<select name="super_desg" id="super_desg" class="form-control" >
        <option value="">Select </option>';
        if (!empty($array)):
            foreach ($array as $row):
                if(!empty($row->REMARK)){
                    $str .= '<option data-id="' . $row->ID . '" value="' . $row->DESIGNATION_ID . '">' . $row->REMARK . '</option>';
                }else{
                    $str .= '<option data-id="' . $row->ID . '" value="' . $row->DESIGNATION_ID . '">' . $row->DESIGNATION . '</option>';
                }   
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;

    endif;
}

function get_designation_by_id(){
    if ($_POST):
        $condition = array();
        $designation_id = $this->input->post("first_officer_designation_id");
        $ci = &get_instance();
        $ci->load->model('Common_Tasks');

        $array = $ci->Common_Tasks->getDesignationById($designation_id);
        $str = "";
        $str .= '<select name="employee_id" id="employee_id" class="form-control" >
        <option value="">Select </option>';
        if (!empty($array)):
            foreach ($array as $row):
                $str .= '<option value="' . $row['EMPLOYEE_ID'] . '">' . $row['EMPLOYEE_NAME'] . '</option>';
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;

    endif;
}

function getOffice_p()
{
    if ($_POST):
        $condition = array();
        $wing_id = $this->input->post("wing_id");
        $pool_id = $this->input->post("pool_id");
        $office_type_id = $this->input->post("office_type_id");

        if (!empty($pool_id)) {
            $condition['pool_id'] = $pool_id;
        }
        if (!empty($office_type_id)) {
            $condition['office_type_id'] = $office_type_id;
        }
        if (!empty($wing_id)) {
            $condition['wing_id'] = $wing_id;
        }
        $ci = &get_instance();
        $ci->load->model('Common_Tasks');

        $language = $this->session->userdata('lang_file');
        $array = $ci->Common_Tasks->getofficep($condition);
        $str = "";
        $str .= '<select name="office_id" id="office_id" class="form-control" >
        <option value="">Select </option>';
        if (!empty($array)):
            foreach ($array as $row):
                if ($language == "bn") {

                    $str .= '<option value="' . $row->ID . '">' . $row->OFFICE_NAME_BN . '</option>';
                }
                else{
                    $str .= '<option value="' . $row->ID . '">' . $row->OFFICE_NAME . '</option>';

                }
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;

    endif;
}


function getDesignation()
{
    if ($_POST):
        $condition = array();
        $office_id = $this->input->post("office_id");
        $pool_id = $this->input->post("pool_id");
        $office_type_id = $this->input->post("office_type_id");
        $wing_id = $this->input->post("wing_id");
        if (!empty($office_id)) {
            $condition['office_id'] = $office_id;
        }
        if (!empty($pool_id)) {
            $condition['pool_id'] = $pool_id;
        }
        if (!empty($office_type_id)) {
            $condition['office_type_id'] = $office_type_id;
        }
        if (!empty($wing_id)) {
            $condition['wing_id'] = $wing_id;
        }
        $ci = &get_instance();
        $ci->load->model('Common_Tasks');

        $language = $this->session->userdata('lang_file');
        $array = $ci->Common_Tasks->getDesignation($condition);
        $str = "";
        $str .= '<select name="designation_id" id="designation_id" class="form-control" >';
        if ($language == "bn") {
            $str .= '<option value="">--নির্বাচন করুন--</option>';
        }else{
            $str .= '<option value="">--Select-- </option>';
        }
        if (!empty($array)):
            foreach ($array as $row):
                if ($language == "bn") {
                    if(!empty($row->REMARKS_BN)){
                        $str .= '<option data-id="' . $row->ID . '" value="' . $row->DESIGNATION_ID . '">' . $row->REMARKS_BN . '</option>';
                    }else{
                        $str .= '<option data-id="' . $row->ID . '" value="' . $row->DESIGNATION_ID . '">' . $row->DESIGNATION_BN . '</option>';
                    }
                }
                else{
                    if(!empty($row->REMARK)){
                        $str .= '<option data-id="' . $row->ID . '" value="' . $row->DESIGNATION_ID . '">' . $row->REMARK . '</option>';
                    }else{
                        $str .= '<option data-id="' . $row->ID . '" value="' . $row->DESIGNATION_ID . '">' . $row->DESIGNATION . '</option>';
                    }
                }
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;

    endif;
}

// function getDesignationJob()
// {
//     if ($_POST):
//         $condition = array();
//         $office_id = $this->input->post("office_id");
//         $pool_id = $this->input->post("pool_id");
//         $office_type_id = $this->input->post("office_type_id");
//         $wing_id = $this->input->post("wing_id");
//         if (!empty($office_id)) {
//             $condition['office_id'] = $office_id;
//         }
//         if (!empty($pool_id)) {
//             $condition['pool_id'] = $pool_id;
//         }
//         if (!empty($office_type_id)) {
//             $condition['office_type_id'] = $office_type_id;
//         }
//         if (!empty($wing_id)) {
//             $condition['wing_id'] = $wing_id;
//         }
//         $ci = &get_instance();
//         $ci->load->model('Common_Tasks');

//         $language = $this->session->userdata('lang_file');
//         $array = $ci->Common_Tasks->getDesignation($condition);
//         $str = "";
//         $str .= '<select name="designation_id" id="designation_id" class="form-control" >
//         <option value="">Select </option>';
//         if (!empty($array)):
//             foreach ($array as $row):
//                 if ($language == "bn") {
//                     $str .= '<option value="' . $row->DESIGNATION_ID . '">' . $row->DESIGNATION_BN . '</option>';
//                 }
//                 else{
//                     $str .= '<option value="' . $row->DESIGNATION_ID . '">' . $row->DESIGNATION . '</option>';
//                 }
//             endforeach;
//         endif;
//         $str .= '</select>';
//         echo $str;

//     endif;
// }


function getOfficeByCurrWingId()
{
    if ($_POST):
        $wing_id = $this->input->post("cur_wing_id");
        echo form_dropdown("cur_office_id", getOptionOfficeByWingId($wing_id), "cur_office_id", " class='form-control' id='cur_office_id'");
    endif;

}

function get_Cur_Office()
{
    if ($_POST):
        $office_type_id = $this->input->post("office_type_id");
        $wing_id = $this->input->post("cur_wing_id");
        echo form_dropdown("cur_office_id", get_Option_Office($office_type_id, $wing_id), "cur_office_id", " class='form-control' id='cur_office_id'");
    endif;
}


function searchOfficeByWingId()
{
    if ($_POST):
        $wing_id = $this->input->post("wing_id");
        echo form_dropdown("s_office_id", getOptionOfficeByWingId($wing_id), "s_office_id", " id='s_office_id' class='form-control' style='padding: 4px 5px 8px 4px;'");
    endif;

}

function searchOffice()
{
    if ($_POST):
        $office_type_id = $this->input->post("office_type_id");
        $wing_id = $this->input->post("wing_id");
        echo form_dropdown("s_office_id", getOptionOffice($office_type_id, $wing_id), "s_office_id", " class='form-control' id='s_office_id' style='padding: 4px 5px 8px 4px;'");
    endif;
}


function get_office_info()
{
    if ($_POST):
        $wing_id = $this->input->post("wing_id");
        $office_type_id = $this->input->post("office_type_id");
        $category_id = $this->input->post("category_id");
        $district_id = $this->input->post("district_id");
        $upazilla_id = $this->input->post("thana_id");
        $cond = "WING_ID = '$wing_id'";
        if($office_type_id>0){
            $cond.=" AND OFFICE_TYPE_ID = '$office_type_id'";               
        }
        if($category_id>0){
            $cond.=" AND CATEGORY_ID = '$category_id'";             
        }
        if($district_id>0){
            $cond.=" AND DISTRICT_ID = '$district_id'";             
        }
        if($upazilla_id>0){
            $cond.=" AND UPAZILLA_ID = '$upazilla_id'";             
        }
        
        
        $language = $this->session->userdata('lang_file');
        $array = $this->Shows->getThisValue($cond,"MASTER_OFFICE");
        $str = "";
        $str .= '<select name="office_id" id="office_id" class="form-control" style="width:195px" >
        <option value="">Select </option>';
        if (!empty($array)):
            foreach ($array as $row):

             if ($language == "bn") {
                $str .= '<option value="' . $row->ID . '">' . $row->OFFICE_NAME_BN . '</option>';
            }
            else{
               $str .= '<option value="' . $row->ID . '">' . $row->OFFICE_NAME . '</option>';                

           }
       endforeach;
   endif;
   $str .= '</select>';
   echo $str;

endif;
}

function getBulidingByQuarterId()
{
    if ($_POST):
        $qtr_id = $this->input->post('qtr_id');
        echo form_dropdown("blt_id", getOptionByQtrId($qtr_id), "blt_id", " class='form-control' id='blt_id'");
    endif;

}

function getZoneByRegionId()
{
    if ($_POST):
        $region_id = $this->input->post('region_id');
        echo form_dropdown("zone_id", getOptionLawZoneId($region_id), "zone_id", " class='form-control' id='zone_id'");
    endif;
}

function searchDivisionOfficeByWingId()
{
    if ($_POST):
        $wing_id = $this->input->post("wing_id");
        echo form_dropdown("p_office_id", getOptionDivOfficeByWingId($wing_id), "p_office_id", " id='p_office_id' class='form-control' ");
    endif;

}

function searchDivisionOfficeByWingId2()
{
    if ($_POST):
        $wing_id = $this->input->post("wing_id");
        echo form_dropdown("division_office_id", getOptionDivOfficeByWingId($wing_id), "division_office_id", " id='division_office_id' class='form-control' ");
    endif;

}

function getOfficeEmployee(){
    if ($_POST):
      $office_id = $this->input->post("office_id");
      $designation_id = $this->input->post("designation_id");       
      $ci = &get_instance();
      $ci->load->model('Common_Tasks');
      $array = $ci->Common_Tasks->getEmployee($office_id,$designation_id);
      $str = "";
      $str .= '<select name="employee_id" id="employee_id" class="form-control" >
      <option value="">Select </option>';
      if (!empty($array)):
        foreach ($array as $row):
            $str .= '<option value="' . $row['EMPLOYEE_ID'] . '">' . $row['EMPLOYEE_NAME'] . '</option>';
        endforeach;
    endif;
    $str .= '</select>';
    echo $str;
   endif;
}

function getProjectProgram(){
    if ($_POST):
        $audit_type_id = $this->input->post("audit_type_id");
        $ci = &get_instance();
        $ci->load->model('Common_Tasks');
        $array = $ci->Common_Tasks->getProjectProgram($audit_type_id);

        $str = "";
        $str .= '<select name="project_program_id" id="project_program_id" class="form-control" >';
        if (!empty($array)):
            foreach ($array as $key => $val ):
                $str .= '<option value="' . $key . '">' . $val . '</option>';
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;
    endif;
}

function getCategoryTypeList(){
    if ($_POST):
        $audit_type_id = $this->input->post("audit_type_id");
        $ci = &get_instance();
        $ci->load->model('Common_Tasks');
        $array = $ci->Common_Tasks->getAuditCat($audit_type_id);

        $str = "";
        $str .= '<select name="audit_cat_id" id="audit_cat_id" class="form-control" onchange="loadParas()">';
        if (!empty($array)):
            foreach ($array as $key => $val ):
                $str .= '<option value="' . $key . '">' . $val . '</option>';
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;
    endif;
}
function getTypeOfMeeting(){
        $language = $this->session->userdata('lang_file');
        $cid = $this->input->post("cid");
        $str = "";
        $str .= '<select name="meeting_type_id" id="meeting_type_id" class="form-control" >';
            if($language == 'bn'){
                $str .= '<option value="">----- সিলেক্ট -----</option>';
            }else{
                $str .= '<option value="">----- Select -----</option>';
            }
        if($cid == 1){    
            if($language == 'bn'){
                $str .= '<option value="1">দ্বিপাক্ষিক সভা</option>';
                $str .= '<option value="2">ত্রিপক্ষীয় সভা</option>';
                $str .= '<option value="3">পিএ কমিটির সভা</option>';
            }else{       
                $str .= '<option value="1">Bilateral Meeting</option>';
                $str .= '<option value="2">Tripartite Meeting</option>';
                $str .= '<option value="3">PA Committee Meeting</option>';
            } 
        }elseif($cid == 2){
            if($language == 'bn'){
                $str .= '<option value="1">এওএসসি ১</option>';
                $str .= '<option value="2">এওএসসি 2</option>';
                $str .= '<option value="3">এওএসসি 3</option>';
                $str .= '<option value="4">Others</option>';
            }else{
                $str .= '<option value="1">AOSC 1</option>';
                $str .= '<option value="2">AOSC 2</option>';
                $str .= '<option value="3">AOSC 3</option>';
                $str .= '<option value="4">Others</option>';
            }
        }      
        $str .= '</select>';
        echo $str;
}

    function irri_ZoneByRegion()
    {
        if ($_POST):
            $region_id = $this->input->post("region_id");
            echo form_dropdown("zone_id", irri_getZoneByRegion($region_id), "zone_id", " class='form-control', id='zone_id'");
        endif;
    }

    function irri_UnitByZone()
    {
        if ($_POST):
            $zone_id = $this->input->post("zone_id");
            echo form_dropdown("unit_id", getOptionUnit($zone_id), "unit_id", " class='form-control', id='unit_id'");
        endif;
    }

    function getDivisionalOffice(){
        if ($_POST):
            $id = $this->input->post("id");
            echo form_dropdown("office_id", getOptionDivisionalOffice($id), "office_id", " class='form-control', id='office_id'");
        endif;
    }

    function getOfficeRCA(){
        $language = $this->session->userdata('lang_file');
        if ($_POST):
            $rca_id = $this->input->post("rca_id");
            // echo form_dropdown("office_id", getOptionRCAOffice2($rca_id), "office_id", " class='form-control', id='office_id'");
            $rca_offices = getOptionRCAOffice2($rca_id);
            echo '<select name="office_id" class="form-control" ,="" id="office_id">';
            echo '<option value="">----- Select -----</option>';
            foreach ($rca_offices as $aRca) {
                if ($language == "bn") {
                    echo '<option value="'.$aRca['ID'].'">'.$aRca['OFFICE_NAME_BN'].'</option>';
                }else{
                    echo '<option value="'.$aRca['ID'].'">'.$aRca['OFFICE_NAME'].'</option>';
                }
            }
            echo '</select>';
        endif;
    }

    function getDefaultOffice(){
            echo form_dropdown("office_id", defaultOption(), "office_id", " class='form-control', id='office_id'");
    }
    
 function get_off_employee(){
    if ($_POST):
      $office_id = $this->input->post("office_id");
      
      $ci = &get_instance();
      $ci->load->model('Common_Tasks');
      $array = $ci->Common_Tasks->getEmployee_1($office_id);
      $str = "";
      $str .= '<select name="employee_id" id="employee_id" class="form-control" >
      <option value="">Select </option>';
      if (!empty($array)):
        foreach ($array as $row):
            $str .= '<option value="' . $row['EMPLOYEE_ID'] . '">' . $row['EMPLOYEE_NAME'] . '</option>';
        endforeach;
    endif;
    $str .= '</select>';
    echo $str;
   endif;
}
  function get_message(){
      $language = $this->session->userdata('lang_file');
    if ($_POST):
      $category_id = $this->input->post("category_id");
      
      $ci = &get_instance();
      $ci->load->model('Common_Tasks');
      $array = $this->Shows->getThisValue("SMS_CATEGORY_ID = '$category_id'","SMS_TEMPLATE");;
      $str = "";
      $str .= '<select name="sms_template_id" id="sms_template_id" class="form-control" onchange="showdata(this.value)" >
      <option value="">Select </option>';
      if (!empty($array)):
        foreach ($array as $row):
             if ($language == "bn") {
                   $str .= '<option value="' . $row->ID . '">' . $row->MESSAGE_DETAILS_BN . '</option>';
                }else{
                    $str .= '<option value="' . $row->ID . '">' . $row->MESSAGE_DETAILS. '</option>';
                }
            
        endforeach;
    endif;
    $str .= '</select>';
    echo $str;
   endif;
}

// present
    function getDistrictByDivisionPre()
    {
        if ($_POST):
            $division_id_pre = $this->input->post("division_id_pre");
            echo form_dropdown("district_pre", getOptionDistrictbyDivision($division_id_pre), "district_pre", "class='form-control' id='district_pre'");
        endif;
    }
    function getPreThana()
{

    if ($_POST):
        $dis_id = $this->input->post("district_id");
        echo form_dropdown("thana_pre", getOptionThana($dis_id), "thana_pre", " class='form-control' id='thana_pre'");
    endif;
}

function getPrePostOffice()
{

    if ($_POST):
        $post = $this->input->post("thana_id");
        echo form_dropdown("post_office_pre", getOptionPostOffice($post), "post_office_pre", " class='form-control' id='post_office_pre'");
    endif;
}


// permanent
    function getDistrictByDivisionPer()
    {
        if ($_POST):
            $division_id_pre = $this->input->post("division_id_pre");
            echo form_dropdown("district_per", getOptionDistrictbyDivision($division_id_pre), "district_per", "class='form-control' id='district_per'");
        endif;
    }


function getPerThana()
{

    if ($_POST):
        $dis_id = $this->input->post("district_id");
        echo form_dropdown("thana_per", getOptionThana($dis_id), "thana_per", " class='form-control' id='thana_per'");
    endif;
}


function getPerPostOffice()
{

    if ($_POST):
        $post = $this->input->post("thana_id");
        echo form_dropdown("post_office_per", getOptionPostOffice($post), "post_office_per", " class='form-control' id='post_office_per'");
    endif;
}

public function getHeadByClass(){
     if ($_POST):
        $empId = $this->input->post("type_id");
        echo form_dropdown("evaluationId", getOptionEvaluationHeadById($empId), "evaluationId", "class='form-control' id='evaluationId2'");
    endif;

}


function getOfficeByOfficeType()
{
    if ($_POST):
        $office_type_id = $this->input->post("office_type_id");            
        echo form_dropdown("office_id", getOptionOffice_1($office_type_id), "office_id", " id='office_id' class='form-control'");
    endif;
}


function getNameByPunishmentType()
{
    if ($_POST):
        $punishment_type = $this->input->post("punishment_type");            
        echo form_dropdown("punishment_name", getOptionPunishmentName($punishment_type), "punishment_name", " id='punishment_name' class='form-control'");
    endif;
}

function getSubModuleFour($module_id)
{

    if ($_POST):
        
        echo form_dropdown("sub_module_id", getOptionSubModule($module_id), "sub_module_id", " class='form-control', id='sub_module_id'");
    endif;
}



function getDesignationByWing()
{
    if ($_POST):
        $condition = array();
        $wing_id = $this->input->post("wing_id");
        $ci = &get_instance();
        $ci->load->model('Common_Tasks');
        if (!empty($wing_id)) {
            $condition['wing_id'] = $wing_id;
        }

        $array = $ci->Common_Tasks->getDesignation($condition);
        $str = "";
        $str .= '<select name="cur_designation_id" id="cur_designation_id" class="form-control" >
        <option value="">Select </option>';
        if (!empty($array)):
            foreach ($array as $row):
                if(!empty($row->REMARK)){
                    $str .= '<option value="' . $row->DESIGNATION_ID . '">' . $row->REMARK . '</option>';
                }else{
                    $str .= '<option value="' . $row->DESIGNATION_ID . '">' . $row->DESIGNATION . '</option>';
                }   
            endforeach;
        endif;
        $str .= '</select>';
        echo $str;

    endif;
}

function getSubModule_11()
{

    if ($_POST):
        $module_id = $this->input->post("module_id");
        echo form_dropdown("s_sub_module_id", getOptionSubModule($module_id), "s_sub_module_id", " class='form-control', id='s_sub_module_id'");
    endif;
}

function getSubSubModule()
{

    if ($_POST):
        $module_id = $this->input->post("module_id");
        $sub_module_id = $this->input->post("sub_module_id");
        
        echo form_dropdown("sub_sub_module_id", getOptionSubSubModule($module_id,$sub_module_id), "sub_sub_module_id", " class='form-control', id='sub_sub_module_id'");
    endif;
}


function getPostOffice()
{

    if ($_POST):
        $district_id = $this->input->post("district_id");
        $thana_id = $this->input->post("thana_id");
        
        echo form_dropdown("post_office_id", getOptionPostOfficeName($district_id,$thana_id), "post_office_id", " class='form-control', id='post_office_id'");
    endif;
}
function getAllUnion()
{

    if ($_POST):
        $district_id = $this->input->post("district_id");
        $thana_id = $this->input->post("thana_id");
        
        echo form_dropdown("union_id", getOptionAllUnions($district_id,$thana_id), "union_id", " class='form-control', id='union_id'");
    endif;
}

function getCurGradeStep_pfix()
{

    if ($_POST):
     
        $cur_grade_step_id = $this->input->post("cur_grade_step_id");
        echo form_dropdown('fixed_salary', getOptionGradeStep($cur_grade_step_id), 'fixed_salary', 'class="form-control" id="fixed_salary"');
    endif;
}

function getOffice_2_ft_transfer($id = null)
    {
        if ($_POST):
            $office_category_id = $this->input->post("office_category_id");
            echo form_dropdown("office_id_1", getOptionOfficeByCatId($office_category_id), (!empty($id))?$id:"office_id_1", " class='form-control' id='office_id_1'");
        endif;
    }


}

?>