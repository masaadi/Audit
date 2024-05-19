<?php
/*
  +-------------------------------------------------------------------------------------------------------+
  |																			  	  						|
 * 		@Author			Nur Ahmed				                               		*
 * 		@Email			nur2510@gmail.com		                                                         	*
  |																			      						|
  +-------------------------------------------------------------------------------------------------------+
 */
//helper for dropdown list creation
  function compnay_info()
  {
   $ci = &get_instance();
   $ci->load->model('Common_Tasks');
   return $ci->Common_Tasks->company_details();
}

function defaultOption()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listCommon();
}

function get_child_ac_list($acid) {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listparentac($acid);
}

function get_main_ac_list() {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listmainac();
}
function getPaymentGroupName() {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listPaymentGroupName();
}
function getSmstCategoryName() {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listSmsCategoryName();
}
function getOwner() {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listowner();
}
function getRoleType($office_id) {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->lisroletype($office_id);
}
function getCertificateType() {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->lisCertificateType();
}

function year($syear = "+1", $endyear = 2000)
{
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        // $year = array('' => '-- সিলেক্ট --',);
        $year = array(date('Y') => date('Y'),);
        for ($i = date('Y') + 1; $i > $endyear; $i--):
            $year[$i] = Converter::en_to_bn($i);
        endfor;
    } else {
        // $year = array('' => '-- select --',);
        $year = array(date('Y') => date('Y'),);
        for ($i = date('Y') + 1; $i > $endyear; $i--):
            $year[$i] = $i;
        endfor;
    }
    return $year;
}

function css_year(){
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        $year = array(''=>'-- নির্বাচন করুন --',);
        for ($i = date('Y') - 1; $i < date('Y')+2; $i++):
            $year[$i] = Converter::en_to_bn($i);
        endfor;
    } else {    
        $year = array(''=>'-- Select --',);
        for ($i = date('Y') - 1; $i < date('Y')+2; $i++):
            $year[$i] = $i;
        endfor;
    }
    return $year;
}

function prl_year()
{
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn"){
        $year = array('' => '-- সিলেক্ট --',);
    }else{
        $year = array('' => '-- Select --',);
    }
    for ($i = date('Y') - 10; $i < date('Y') + 100; $i++){
      
        if ($language == "bn"){
        $year[$i] = Converter::en_to_bn($i);
        }else{
            $year[$i] = $i;
        }
        

    }
    return $year;
}

function month($withTitle = false)
{
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        $array = array(
            '' => '----- নির্বাচন করুন -----',
            '01' => 'জানুয়ারী',
            '02' => 'ফেব্রুয়ারী',
            '03' => 'মার্চ',
            '04' => 'এপ্রিল',
            '05' => 'মে',
            '06' => 'জুন',
            '07' => 'জুলাই',
            '08' => 'আগস্ট',
            '09' => 'সেপ্টেম্বর',
            '10' => 'অক্টোবর',
            '11' => 'নভেম্বর',
            '12' => 'ডিসেম্বর'
        );
    }else{
        $array = array(
            '' => '----- Select -----',
            '01' => 'January',
            '02' => 'February',
            '03' => 'March',
            '04' => 'April',
            '05' => 'May',
            '06' => 'June',
            '07' => 'July',
            '08' => 'August',
            '09' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December'
        );
    }
    return $array;
}

//office type by wing id

function getOptionOfficeTypeByWingId($wing_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOfficeTypeByWingId($wing_id);

}

function getOptionsStatus($withTitle = false)
{
    $ci = &get_instance();
    $array = array(
        '' => '----- Select -----',
        '0' => 'Active',
        '1' => 'Inactive'
    );

    return $array;
}

function getLogicalStatus($withTitle = false)
{
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
     if ($language == "bn") {
        $array = array(
            '' => '----- নির্বাচন করা -----',
            '1' => 'হাঁ',
            '2' => 'না',

        );
    }
    else
    {
        $array = array(
            '' => '----- Select -----',
            '1' => 'Yes',
            '2' => 'No',

        );
    }

    return $array;
}

function getRelation($withTitle = false)
{
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
     if ($language == "bn") {
    $array = array(
        '' => '----- Select -----',
        '1' => 'পুত্র/কন্যা',
        '2' => 'নাতি/নাতনী'
    );
    }else{
         $array = array(
        '' => '----- Select -----',
        '1' => 'Son/Daughter',
        '2' => 'Grandson/granddaughter'
       );
     }

    return $array;
}

function getDeepRelation($withTitle = false)
{
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
     if ($language == "bn") {
        $array = array(
            '' => '----- Select -----',
            '1' => 'পৈতৃক',
            '2' => 'মাতৃক'
        );
    }else{
       $array = array(
        '' => '----- Select -----',
        '1' => 'Paternal',
        '2' => 'Maternal'
    );
   }

    return $array;
}

function getCurrentActionType()
{
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        $array = array(
            '' => '----- নির্বাচন করা -----',
            '1' => 'কার্যকর না',
            '2' => 'বি.এস.আর ',
            '3' => 'আর.বি.এস.আর ',
            '4' => 'কাজের কাগজ',
            '5' => 'সভার মিনিট'
        );
    }
    else
    {
        $array = array(
            '' => '----- Select -----',
            '1' => 'No Action',
            '2' => 'BSR',
            '3' => 'RBSR',
            '4' => 'Working Paper',
            '5' => 'Meeting Minutes'
        );
    }

    return $array;
}
function getResultType()
{
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        $array = array(
            '' => '----- নির্বাচন করা -----',
            '1' => 'প্রথম বিভাগ / ক্লাস',
            '2' => 'দ্বিতীয় বিভাগ / ক্লাস',
            '3' => 'তৃতীয় বিভাগ / ক্লাস',
            '4' => 'শ্রেণী',
        );
    }
    else
    {
        $array = array(
            '' => '----- Select -----',
            '1' => 'First Division/Class',
            '2' => 'Second Division/Class',
            '3' => 'Third Division/Class',
            '4' => 'Grade',
        );
    }

    return $array;
}

function getResultTypeID($id){
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        if($id == 1){
            return 'প্রথম';
        }else if($id == 2){
            return 'দ্বিতীয়';
        }else if($id == 3){
            return 'তৃতীয়';
        // }else if($id == 4){
        //     return 'শ্রেণী';
        }
    }else{
       if($id == 1){
        return 'First';
    }else if($id == 2){
        return 'Second';
    }else if($id == 3){
        return 'Third';
    // }else if($id == 4){
    //     return 'Grade';
    } 
}
}

function getLevelEducation()
{
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        $array = array(
            '' => '----- নির্বাচন করা -----',
            '1' => 'মাধ্যমিক',
            '2' => 'উচ্চ মাধ্যমিক',
            '3' => 'ডিপ্লোমা',
            '4' => 'স্নাতক',
            '5' => 'মাস্টার্স',
            '6' => 'পিএইচডি'
        );
    }
    else
    {
        $array = array(
            '' => '----- Select -----',
            '1' => 'Secondary',
            '2' => 'Higher Secondary',
            '3' => 'Diploma',
            '4' => 'Bachelor/Honors',
            '5' => 'Masters',
            '6' => 'PHD'
        );
    }

    return $array;
}
function getLevelEducationById($id)
{
    $array = array();
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        if($id == 1){
            return 'মাধ্যমিক';
        }elseif($id == 2){
            return 'উচ্চ মাধ্যমিক';
        }elseif($id == 3){
            return 'ডিপ্লোমা';
        }elseif($id == 4){
            return 'স্নাতক';
        }elseif($id == 5){
            return 'মাস্টার্স';
        }elseif($id == 6){
            return 'পিএইচডি';
        }
    }
    else
    {
        if($id == 1){
            return 'Secondary';
        }elseif($id == 2){
            return 'Higher Secondary';
        }elseif($id == 3){
            return 'Diploma';
        }elseif($id == 4){
            return 'Bachelor/Honors';
        }elseif($id == 5){
            return 'Masters';
        }elseif($id == 6){
            return 'PHD';
        }
    }
}
function getPaymentSector($check = null)
{
    // var_dump($check);die;
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        $array = array(
            '' => '----- নির্বাচন করা -----',
            '1' => 'আনুতোষিক',
            '2' => 'প্রদেয় ভবিয্য তহবিল',
            '3' => 'গোষ্ঠী বীমা',
            '4' => 'অন্যান্য'
        );
    }
    else
    {
        $array = array(
            '' => '----- Select -----',
            '1' => 'Gratuity',
            '2' => 'CPF/GPF',
            '3' => 'Group insurance',
            '4' => 'Others'
        );
    }
    if($check){
        // for($i = 0; $i< count($check);$i++){
        foreach ($check as  $value) {
            unset($array[$value]);   
        }
        
        // }
    }

    return $array;
}
function getPaymentSectorById($id)
{
   $ci = &get_instance();
   $language = $ci->session->userdata('lang_file');
   if ($language == "bn") {
    if($id == 1){
        return 'আনুতোষিক';
    }elseif($id == 2){
        return 'প্রদেয় ভবিয্য তহবিল';
    }elseif($id == 3){
        return 'গোষ্ঠী বীমা';
    }elseif($id == 4){
        return 'অন্যান';
    }
}
else
{
    if($id == 1){
        return 'Gratuity';
    }elseif($id == 2){
        return 'CPF/GPF';
    }elseif($id == 3){
        return 'Group insurance';
    }elseif($id == 4){
        return 'Others';
    }
}

// return $array;
}

//training_type
function getTrainingType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listTrainingType();
}

function getTrainingTypeId($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listTrainingTypeId($id);
}
function getOptionInspectionTime()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listInspectionList();
}
// supplier
function getSupplierData()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listSupplierList();
}
// end

//areaGet
function getOptionArea()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listHRentArea();
}
//GetPurchaseOrderType
function GetPurchaseOrderType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listPurchaseOrderType();
}

//portGet
function getOptionPort()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listPort();
}

//cnfAgentGet
function getOptionCnfAgent()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listCnfAgent();
}

//Gender masterlistArea
function getOptionGender()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listGender();
}

function getOptionGenderId($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listGenderId($id);
}

function getOptionAction()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAction();
}
function getFormTypeData()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listFormTypeData();
}

function getOptionHeadType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listHeadTtype();
}

//end

//Gender master
function getOptionMaritalStatus()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listMaritalStatus();
}

//getRoute_name
function getRoute_name()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listRootList();
}

//vechile type
function getVechicle_type()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listvechileTypeList();
}

//end


// code for inventory Master 
function getOptionUser()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listUser();
}

//blood group master
function getOptionBloodGroup()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listBloodGroup();
}

//end

// master
function getOptionReligion()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listReligion();
}

//end
//// master
function getBonusType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listBonusType();
}

//end


//pool master
function getOptionPool()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listPool();
}

//office type master

function getOptionOfficeType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOfficeType();
}

//emp type master

function getOptionEmployeeType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listEmployeeType();
}

function getOptionEmployeeTypeAll()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listEmployeeTypeAll();
}

function getOptionEmployeeByDesgId($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listEmployeeByDesgId($id);
}
function getOptionEmployeeByOfcId($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listEmployeeByOfcId($id);
}
// function getOptionSmsGroup()
// {
//     $ci = &get_instance();
//     $ci->load->model('Common_Tasks');
//     return $ci->Common_Tasks->listSmsGroup();
// }
// function getOptionSmsCategory()
// {
//     $ci = &get_instance();
//     $ci->load->model('Common_Tasks');
//     return $ci->Common_Tasks->listSmsCategory();
// }

/*option house rent*/
/*function getOptionHouseRentArea()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listHRentArea();
}*/

//Evaluation Head  master

function getOptionEvaluationHead()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listEvaluationHead();
}
function getOptionEvaluationHeadEditMood($emp_t_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listEvaluationHeadEditMood($emp_t_id);
}


//office type master

function getOptionClass()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listEmployeeClass();
}

//wing master
function getOptionWing()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listWing();
}

//RCA MAPPING master
function getAllOfficeForRCA()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listRcaMapping();
}

//asset catagory master
function getOptionAssetCatagory()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAssetsCatagory();
}
function getOptionAssetsNameById($catID)
{
    // echo $catID;die();
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAssetNameByCat($catID);
}
function getOptionOfficeByType($wid)
{
    // echo $catID;die();
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOfficeByType($wid);
}
function getOptionOfficeByOffice($wng)
{
    // echo $catID;die();
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOfficeByOffice($wng);
}

function getOptionAssetsCatagory()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAssetsCatagory();
}
function getOptionAssetsName()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAssetsName();
}

function getAllOptionOffice()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllOffice();

}
function getAllOptionOfficer()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllOfficer();

}
function getAllOptionOfficer2($office,$desig)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllOfficer2($office,$desig);

}

/*get union*/
function getOptionUnionByU($upozila_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listUnion($upozila_id);

}

//areaGet
function getFertilizerType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllFertilizerType();
}

function getFertilizerName()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllFertilizerName();
}

function getOptionWhUser()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->warehouse_users();
}

function getWarehouseName()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listWarehouseName();
}

function getTransportAgent()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listTransportAgent();
}

/*get all union*/
function getOptionAllUnion()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listUnionAll();

}

function getOptionOfficeSearch($wing_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOfficeSearch($wing_id);
}


function getScaleById($id){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listGradeScalById($id);
}

function getOptionOt(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOt();
}
function getOptionOffice($office_type_id, $wing_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOffice($office_type_id, $wing_id);

}

function getOptionDivisionalOffice($cat_id){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listDiviOffice($cat_id);
}


function getOptionRCAOffice2($rca_id){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listRCAOffice($rca_id);
}


function getOptionRole($office_id){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listRole($office_id);
}

function getOptionRole_common($type_id){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listRole_common($type_id);
}

function getOptionSupRole($role_type_id){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listSupRole($role_type_id);
}

function getOptionOfficeByWingId($wing_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOfficeByWingId($wing_id);

}
function getOptionOfficeByCatId($cat_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOfficeByCatId($cat_id);

}
function getOptionBank()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listBank();

}

function getOptionOfficeByWing($wingid, $office_type_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOfficeByWing($wingid, $office_type_id);

}

function getOptionOfficeForRCA($office_type_id,$district_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOfficeForRCA($office_type_id,$district_id);

}

function getOptionSection()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listSection();

}

//posting status
function getPostStatus()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listPostStatus();

}
function getPostStatusById($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listPostStatusById($id);

}

function getOfficeCategory()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOfficeCategory();

}

function getOptionAllSubSection()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllSubSection();

}

function getOptionSubSection($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listSubSection($id);

}

function getOptionModule()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listModule();
}

function getOptionSubModule($module_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listSubModule($module_id);
}

//grade master
function getOptionGrade()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listGrade();
}

//grade Step
function getOptionGradeStep($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listGradeStep($id);
}
//grade Step
function getOptionGradeStepJust()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listGradeStepJust();
}
function getOptionScaleStep($id,$cur_year)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listGradeScale($id,$cur_year);
}

function getOptionGradeStepScal()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listGradeStepScal();
}

function getOptionAllGradeStep()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllGradeStep();
}

//Country master
function getOptionCountry()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listCountry();
}

// Travel type

function getOptionTravelType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listTravelType();
}

function getOptionTravelTypeId($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listTravelTypeId($id);
}

//District master
function getOptionDistrict()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listDistrict();
}


//Root master
function getOptionRoot()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listRoot();
}

//punishment master
function getOptionPunishmentTypeD()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listPunishementType();
}

// getDealerType

function getDealerType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getDealerType();
}

function getFiscalYear()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listFiscalYear();
}

function getVehicleInfo()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllVehicleInfo();
}

// dealerCategory
function dealerCategory()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->dealerCategory();
}
//audit type master
function getAuditTypeList() {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAudit();
}

//audit type cat
function getAuditCatList($audit_type_id) {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getAuditCat($audit_type_id);
}

//audit category master
function getAuditCategoryList() {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAuditcat();
}
//audit nature master
function getAuditNatureList() {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAuditnature();
}

//audit classification master
function getAuditClassificationList() {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAuditclassification();
}


// salecenter

function salecenterOptions()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getSaleCenterOptions();
}

// regionOptions

function regionOptions()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getRegionOptions();
}

function salesrRegionOptions()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getSalesRegionOptions();
}

function ferShortRegionOptions()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getFertilizerRegion();
}

function getOptionRcaOfficeName()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getRcaOfficeOptions();
}
// Fertilizer regions
function getOptionFerRegion()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getFerRegionOptions();
}

//Designation master
function getOptionDesignation()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listDesignation();
}

function getInsuranceFor()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listInsuranceFor();
}

function getVehicleInfoByRoute($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listVehicleInfoByRoute($id);
}

// getOptionAttenCat

function getOptionAttenCat()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAttenCat();
}


//Designation  by Name
function getOptionNameByDesignation()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listNameByDesignation();
}

//WingById
function getOptionWingById($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listWingById($id);
}



/*get all thana*/
function getAllOptionthana()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllThana();
}


function getOptionEvaluationHeadById($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listEvaluationData($id);
}

function getAllOptionthanaByDistrict($district_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllThanaByDistrict($district_id);
}

//Upazilla master
function getOptionUnion($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listUnion($id);
}

/*get all Upazilla*/

/*get all thana*/
function getAllOptionUnion()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllUnion();
}

/*get all name by designation*/
function getOptionNameBd($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllNameBdesig($id);
}

/*get all Sec name by designation*/
function getSecOptionNameBd($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllNameBdesig($id);
}

function getLeaveType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listLeaveType();
}

function getOptionTransferType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listTransferType();
}

function getOptionPunishmentType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listPunishmentType();
}

function getOptionMonthName()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listMonth();
}

function getOptionYearName(){
 $ci = &get_instance();
 $ci->load->model('Common_Tasks');
 return $ci->Common_Tasks->listYear();
}


function getOptionComplaintType($withTitle = false)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listComplaintType();
}

function getOptionQuotaType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listQuotaType();
}

function getOptionComplaintPresentSituation($withTitle = false)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listComplaintPresentSituation();

}

function getOptionDivision($withTitle = false)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listDivision();

}

function getOptionMinistry($withTitle = false)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listMinistry();

}

function getOptionShift($withTitle = false)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listShift();

}


//get section by office wise
function getOptionSectionOfficeWise($office_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listSectionOfficeWise($office_id);

}

//getInsurance_type
function getInsurance_type()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listIndurenceType();

}

/*querter*/
function getOptionQuarter()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listQuerterOptions();

}

/*approved*/
function approvedOrdenay()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listApprovedOptions();

}


function getOptionOffice_common($office_type_id,$wing_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->list_office_typewise($office_type_id,$wing_id);
}

function getOptionOfficebytype_common($office_type_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->list_officebytype_typewise($office_type_id);
}

function getOptionOffice_1($office_type_id,$wing_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->list_office_typewise_99($office_type_id,$wing_id);
}

function getOptionOfficeById($office_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->list_office_by_id($office_id);
}

function getBranchIds($bank_id){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->list_branch($bank_id);
}

/*building*/
function getOptionBuilding()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listBuildingOptions();
    // listBuildingByQtrId

}

function getOptionLeaveType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listLeaveTypeOptions();

}

function timeToMunite($time)
{
    $hour_munite = explode(':', $time);
    $hour = $hour_munite[0];
    $munite = $hour_munite[1];
    $int_time = ($hour * 60) + $munite;
    return $int_time;
}

function minuteTime($minutes)
{    
    $hours = floor($minutes / 60);
    $mts = ($minutes % 60);
    $time = sprintf('%02s', $hours) . ':' . sprintf('%02s', $mts);
    return $time;
}

function weekendCheck($date)
{
    $timestamp = strtotime($date);
    $weekday = date("l", $timestamp);
    $normalized_weekday = strtolower($weekday);
    if (($normalized_weekday == "friday") || ($normalized_weekday == "saturday")) {
        return true;
    } else {
        return false;
    }
}

function totalWeekend($start_date, $end_date)
{
    $begin = new DateTime($start_date);
    $end = new DateTime($end_date);
    $tw = 0;
    for ($i = $begin; $i <= $end; $i->modify('+1 day')) {
        if (($i->format("l") == 'Friday') || ($i->format("l") == 'Saturday')) {
            $tw++;
        }
    }
    return $tw;
}

function getWeekends($start_date, $end_date)
{
    $begin = new DateTime($start_date);
    $end = new DateTime($end_date);
    $tw = array();
    for ($i = $begin; $i <= $end; $i->modify('+1 day')) {
        if (($i->format("l") == 'Friday') || ($i->format("l") == 'Saturday')) {
            $tw[] = $i->format("Y-m-d");
        }
    }
    return $tw;
}


function allHolidays()
{
    $ci = &get_instance();
    $ci->load->model('Shows');
    return $ci->Shows->getValue('', 'BIO_MT_HOLIDAY');
}

function createDateRangeArray($strDateFrom, $strDateTo)
{
    $aryRange = array();
    $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
    $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));

    if ($iDateTo >= $iDateFrom) {
        array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
        while ($iDateFrom < $iDateTo) {
            $iDateFrom += 86400; // add 24 hours
            array_push($aryRange, date('Y-m-d', $iDateFrom));
        }
    }
    return $aryRange;
}

//menu load user wise

function usermodule_by_id($param,$flag)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listUserModule($param,$flag);
}

function userSubModuleById($param, $module_id,$flag)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listUserSubMenu($param, $module_id,$flag);
}

function p_usermodule_by_id($user_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listUserModule($user_id);
}

function p_userSubModuleById($user_id, $module_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listUserSubMenu($user_id, $module_id);
}

function submod_p_list($role, $id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->arrsubmodp($role, $id);
}

function getOptionCategory()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listCategoryOptions();
}
function getOptionProcurementMethod()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listProcurementOptions();
}

function getOptionItem()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listItemOptions();
}

function getOptionMeasure_unit()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listMeasureUnitOptions();
}

function getAllOptionSubCategory()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listSubCategoryOptions();
}
function getAllOptionBankType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listBankTypeOptions();
}
function getAllOptionBankCategory()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listBankCategoryOptions();
}

function getOptionSubcategory($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listSubcategoryById($id);
}

function getOptionItemName($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listItemNameById($id);
}
function getOptionItemNameBySubcat($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listItemNameBySubId($id);
}
function getOptionItemNameByCatAndSubcat($cond)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listItemNameByCatAndSubId($cond);
}

function getOptionMeasurement()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listMeasurement();
}

function getOptionCondemned()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listCondemned();
}

function getOptDesignationbyoffice($officeid)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getDesignation($officeid);
}


function getConditionData()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getItemCondition();
}

function get_Option_Office($office_type_id,$wing_id)
{

    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOffice($office_type_id,$wing_id);

}

function getOptionByQtrId($qtr_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listBuildingByQtrId($qtr_id);

}

function budgetType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->budget_type();
    // listBuildingByQtrId

}

function getOptionPayFixationYear()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listPayFixationYear();
    // listBuildingByQtrId

}

function getOptionLatestScale()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listLatestScale();
    // listBuildingByQtrId

}

function fiscal_year(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->fiscalYear();
}

function scaleFormat ($scale = null) {
    return substr($scale,0,strpos($scale,'-')).substr($scale,strrpos($scale,'-'));
}

function getOptionFixationType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->fixationType();
}

function getOptionDealerRegFor()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->dealerRegFor();
}

function getOptionDealerRegType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->dealerRegType();
}

function getFundTransferType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->FundTransferType();
}

function getBanktoAc($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->BanktoAc($id);
}

function getOfficetoAc($id,$officeid)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->OfficetoAc($id,$officeid);
}

function getSectiontoAc($id,$sectionid)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->SectiontoAc($id,$sectionid);
}

function getAllOffice()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllOffice();
}

function getOptionApplicantCategory() {
   $ci = &get_instance();
   $ci->load->model('Common_Tasks');
   return $ci->Common_Tasks->applicantCategory();
}

function getOptionLeaveAccountType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->leaveAccountType();
}

function getOptionLeaveAccountNumber()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->leaveAccountNumber();
}

function getOptionPetitionType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listPetitionType();
}

function getOptionLawRegion()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listLawRegion();
}

function getOptionLawZone()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllLawZone();
}

function getOptionLawZoneId($region_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listLawZone($region_id);
}

function getOptionLawCourt()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listLawCourt();
}

function getOptionLawCaseCategory()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listLawCaseCategory();
}

function getOptionSMSGroup() {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listSMSGroup();
}

function getOptionSMSCategory() {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listSMSCategory();
}

// bill type
function getBillType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listBillType();
}

// expence head
function getExpenceHead()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listExpenceHead();
}

// Project List
function getProjectList($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getProjectProgram($id);
}
// Fund Source
function getFundSource()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listFundSource();
}
// Fund Type
function getFundType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listFundType();
}

function getOptionDivOfficeByWingId($wing_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listDivOfficeByWingId($wing_id);

}

function getoptionplanhead($headid)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getoptionplanhead($headid);

}
function getoptionplanmainhead()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getoptionplanmainhead();

}

function obj_present_situation()
{
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        $array = array(
            '' => '----- নির্বাচন করা -----',
            '1' => 'মীমাংসিত',
            '2' => 'অমীমাংসিত'
        );
    }else{
        $array = array(
            '' => '----- Select -----',
            '1' => 'Settled',
            '2' => 'Unsettled'
        );
    }

    return $array;
}

function getChargeTypeOption(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getOptionChargeType();
}

function getFtDealerOption(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listFtDealer();
}

function getFtDealerOptionRegionWise($region_id = null) {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listFtDealerRegionWise($region_id);
}

function getOptionCrop() {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listCropType();
}
function getOptionCropName() {
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listCropName();
}

function numberTowords($num)
{
    $ones = array(
        0 => "ZERO",
        1 => "ONE",
        2 => "TWO",
        3 => "THREE",
        4 => "FOUR",
        5 => "FIVE",
        6 => "SIX",
        7 => "SEVEN",
        8 => "EIGHT",
        9 => "NINE",
        10 => "TEN",
        11 => "ELEVEN",
        12 => "TWELVE",
        13 => "THIRTEEN",
        14 => "FOURTEEN",
        15 => "FIFTEEN",
        16 => "SIXTEEN",
        17 => "SEVENTEEN",
        18 => "EIGHTEEN",
        19 => "NINETEEN",
        "014" => "FOURTEEN"
    );

    $tens = array( 
    0 => "ZERO",
    1 => "TEN",
    2 => "TWENTY",
    3 => "THIRTY", 
    4 => "FORTY", 
    5 => "FIFTY", 
    6 => "SIXTY", 
    7 => "SEVENTY", 
    8 => "EIGHTY", 
    9 => "NINETY" 
    ); 

    $hundreds = array( 
    "HUNDRED", 
    "THOUSAND", 
    "MILLION", 
    "BILLION", 
    "TRILLION", 
    "QUARDRILLION" 
    ); /*limit t quadrillion */
    
    $num = number_format($num,2,".",","); 
    $num_arr = explode(".",$num); 
    $wholenum = $num_arr[0]; 
    $decnum = $num_arr[1]; 
    $whole_arr = array_reverse(explode(",",$wholenum)); 
    krsort($whole_arr,1); 
    $rettxt = ""; 
    foreach($whole_arr as $key => $i){
        
    while(substr($i,0,1)=="0")
            $i=substr($i,1,5);
    if($i < 20){ 
    /* echo "getting:".$i; */
    $rettxt .= $ones[$i]; 
    }elseif($i < 100){ 
    if(substr($i,0,1)!="0")  $rettxt .= $tens[substr($i,0,1)]; 
    if(substr($i,1,1)!="0") $rettxt .= " ".$ones[substr($i,1,1)]; 
    }else{ 
    if(substr($i,0,1)!="0") $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
    if(substr($i,1,1)!="0")$rettxt .= " ".$tens[substr($i,1,1)]; 
    if(substr($i,2,1)!="0")$rettxt .= " ".$ones[substr($i,2,1)]; 
    } 
    if($key > 0){ 
    $rettxt .= " ".$hundreds[$key]." "; 
    }
    } 
    if($decnum > 0){
    $rettxt .= " and ";
    if($decnum < 20){
    $rettxt .= $ones[$decnum];
    }elseif($decnum < 100){
    $rettxt .= $tens[substr($decnum,0,1)];
    $rettxt .= " ".$ones[substr($decnum,1,1)];
    }
    }
    return $rettxt;
}

function office_category()
{
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        $array = array(
            '' => '----- নির্বাচন করা -----',
            '1' => 'বিভাগীয় অফিস',
            '2' => 'আরসিএ অফিস'
        );
    }else{
        $array = array(
            '' => '----- Select -----',
            '1' => 'Divisional Office',
            '2' => 'RCA Office'
        );
    }

    return $array;
}

function deduction_type(){
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        $array = array(
            '' => '----- নির্বাচন করা -----',
            '1' => 'সিপিএফ',
            '2' => 'অন্যান্য'
        );
    }else{
        $array = array(
            '' => '----- Select -----',
            '1' => 'CPF',
            '2' => 'Others'
        );
    }

    return $array;
}

function increment_status(){
    $ci = &get_instance();
    $language = $ci->session->userdata('lang_file');
    if ($language == "bn") {
        $array = array(
            '' => '----- নির্বাচন করা -----',
            '0' => 'সক্রিয়',
            '1' => 'রহিত'
        );
    }else{
        $array = array(
            '' => '----- Select -----',
            '0' => 'Active',
            '1' => 'Hold'
        );
    }

    return $array;
}

/*******************************************************************************/
                            //irrigation module functions
                            //irrigation module functions
                            //irrigation module functions
/*******************************************************************************/


//All Regions
function irri_getAllOptionRegion()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->irri_listAllRegion();
}

// All Zones
function irri_getAllOptionZone()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->irri_listAllZone();
}

// All Units
function irri_getAllOptionUnit()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->irri_listAllUnit();
}

//Zones By Region ID
function irri_getZoneByRegion($region_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->irri_listZoneByRegion($region_id);
}

//All Sectors
function irri_getAllOptionSector()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->irri_listAllSector();
}



function getOptionDistrictbyDivision($div)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listDistrictbydiv($div);
}

//Thana master
function getOptionthana($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listThana($id);
}

//Thana master
function getOptionPostOffice($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listPostOffice($id);
}

function getOptionOfficeByOfficeType($office_type_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOfficeByOfficeType($office_type_id);

}

function getOptionEmployeeByDesgingnation($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listEmployeeByDesgignation($id);
}

//punishment master
function getOptionPunishmentName($punishment_type)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listPunishementName($punishment_type);
}

/*******************************************************************************/
                            //irrigation module functions
                            //irrigation module functions
                            //irrigation module functions
/*******************************************************************************/



//end