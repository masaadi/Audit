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




function defaultOption(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listCommon();
}

function year()
{
    $year = array(''=>'-- Select --',);
    for ($i = date('Y') + 1; $i > 1971; $i--):
        $year[$i] = $i;
    endfor;
    return $year;
}

function prl_year()
{
    $year = array(''=>'-- Select --',);
    for ($i = date('Y') - 10; $i < date('Y')+100; $i++):
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
//training_type
function getTrainingType()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listTrainingType();
}

//areaGet
function getOptionArea()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listHRentArea();
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

function getOptionAction(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAction();
}

function getOptionHeadType(){
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

//asset catagory master
function getOptionAssetCatagory()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAssetCatagory();
}

function getAllOptionOffice()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listAllOffice();

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
function getOptionOffice($office_type_id)
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listOffice($office_type_id);

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

function getOptionTravelType(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listTravelType();
}

//District master
function getOptionDistrict()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listDistrict();
}

// getDealerType

function getDealerType(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getDealerType();
}
// dealerCategory
function dealerCategory(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->dealerCategory();
}
// salecenter

function salecenterOptions(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getSaleCenterOptions();
}
// regionOptions

function regionOptions(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->getRegionOptions();
}

//Designation master
function getOptionDesignation()
{
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listDesignation();
}

// getOptionAttenCat

function getOptionAttenCat(){
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
function getOptionTransferType(){
 $ci = &get_instance();
 $ci->load->model('Common_Tasks');
 return $ci->Common_Tasks->listTransferType();
}
function getOptionPunishmentType(){
 $ci = &get_instance();
 $ci->load->model('Common_Tasks');
 return $ci->Common_Tasks->listPunishmentType();
}

function getOptionMonthName(){
 $ci = &get_instance();
 $ci->load->model('Common_Tasks');
 return $ci->Common_Tasks->listMonth();
}

/*function getOptionYearName(){
 $ci = &get_instance();
 $ci->load->model('Common_Tasks');
 return $ci->Common_Tasks->listYear();
}*/



function getOptionComplaintType($withTitle = false){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listComplaintType();
}
function getOptionQuotaType(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listQuotaType();
}

function getOptionComplaintPresentSituation($withTitle = false){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listComplaintPresentSituation();

}
function getOptionDivision($withTitle = false){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listDivision();

}
function getOptionMinistry($withTitle = false){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listMinistry();

}
function getOptionShift($withTitle = false){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listShift();

}


//get section by office wise
function getOptionSectionOfficeWise($office_id){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listSectionOfficeWise($office_id);

}

/*querter*/
function getOptionQuarter(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listQuerterOptions();

}
/*building*/
function getOptionBuilding(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listBuildingOptions();

}
/*approved*/
function approvedOrdenay(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listApprovedOptions();

}

function getOptionLeaveType(){
    $ci = &get_instance();
    $ci->load->model('Common_Tasks');
    return $ci->Common_Tasks->listLeaveTypeOptions();

}

function amPmTimeToMunite($time)
{
    $time_formate = explode(' ', $time);
    $time = $time_formate[0];
    $formate = $time_formate[1];
    $hour_munite = explode(':', $time);
    $hour = $hour_munite[0];
    $munite = $hour_munite[1];
    if($formate == 'am'){
        $int_time = ($hour*60)+$munite;
    }elseif($formate == 'pm'){
        $int_time = ((12+$hour)*60)+$munite;
    }

    return $int_time;
}

function minuteToAmPmTime($minutes){
    if($minutes > 720){
        $minutes = ($minutes-720);
        $hours = floor($minutes / 60);
        $mts = ($minutes % 60);
        $time = sprintf('%02s', $hours).':'.sprintf('%02s', $mts).' pm';
    }else{
        $hours = floor($minutes / 60);
        $mts = ($minutes % 60);
        $time = sprintf('%02s', $hours).':'.sprintf('%02s', $mts).' am';
    }
    return $time;

}

function weekendCheck($date){
    $timestamp = strtotime($date);
    $weekday= date("l", $timestamp );
    $normalized_weekday = strtolower($weekday);
    if (($normalized_weekday == "friday") || ($normalized_weekday == "saturday")) {
        return true;
    } else {
        return false;
    }
}

function totalWeekend($start_date, $end_date){
    $begin = new DateTime($start_date);
    $end   = new DateTime($end_date);
    $tw = 0;
    for($i = $begin; $i <= $end; $i->modify('+1 day')){
        if(($i->format("l") == 'Friday') || ($i->format("l") == 'Saturday')){
            $tw++;
        }
    }
    return $tw;
}