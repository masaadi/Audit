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

function prl_year()
{
    $year = array('' => '-- Select --',);
    for ($i = date('Y') - 10; $i < date('Y') + 100; $i++):
        $year[$i] = $i;
    endfor;
    return $year;
}

function month($withTitle = false)
{
    $ci = &get_instance();
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
    $array = array(
        '' => '----- Select -----',
        '1' => 'Yes',
        '2' => 'No'
    );

    return $array;
}

function getRelation($withTitle = false)
{
    $ci = &get_instance();
    $array = array(
        '' => '----- Select -----',
        '1' => 'Son/Daughter',
        '2' => 'Grandson/granddaughter'
    );

    return $array;
}

function getDeepRelation($withTitle = false)
{
    $ci = &get_instance();
    $array = array(
        '' => '----- Select -----',
        '1' => 'Paternal',
        '2' => 'Maternal'
    );

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

function getOptionDistrictbyDivision($div)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listDistrictbydiv($div);
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

function getOptionRcaOfficeName()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getRcaOfficeOptions();
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

//Thana master
function getOptionthana($id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listThana($id);
}

/*get all thana*/
function getAllOptionthana()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllThana();
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

function getOptionOffice_1($office_type_id,$wing_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->list_office_typewise($office_type_id,$wing_id);

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

function usermodule_by_id($user_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listUserModule($user_id);
}

function userSubModuleById($user_id, $module_id)
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


//end