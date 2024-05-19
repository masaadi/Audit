<?php
include_once 'BaseController.php';

class Common extends BaseController
{
    public function __construct()
    {
        parent::__construct();
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
	
	function getDistrict_1()
	{
		if ($_POST):
			$div_id = $this->input->post("id");
			echo form_dropdown("off_district", getOptionDistrictbyDivision($div_id), "off_district", ' class="form-control" id="district_id"');
		endif;
	}
	function getDistrict_2()
	{
		if ($_POST):
			$div_id = $this->input->post("id");
			echo form_dropdown("pro_district", getOptionDistrictbyDivision($div_id), "pro_district", ' class="form-control" id="district_id"');
		endif;
	}
	function getUpazilaByDivisionDistrict()
	{
		if ($_POST):
			$div_id = $this->input->post("div");
			$dis_id = $this->input->post("dis");
			echo form_dropdown("off_upazila", getUpazilaByDivisionDistrict($div_id,$dis_id), "off_upazila", ' class="form-control" id="off_upazila"');
		endif;
	}
	function getUpazilaByDivisionDistrictPro()
	{
		if ($_POST):
			$div_id = $this->input->post("div");
			$dis_id = $this->input->post("dis");
			echo form_dropdown("pro_upazila", getUpazilaByDivisionDistrict($div_id,$dis_id), "pro_upazila", ' class="form-control" id="pro_upazila"');
		endif;
	}
	function getUpazilaByDivisionDistrictEntre()
	{
		if ($_POST):
			$div_id = $this->input->post("div");
			$dis_id = $this->input->post("dis");
			echo form_dropdown("entre_upazila", getUpazilaByDivisionDistrict($div_id,$dis_id), "entre_upazila", ' class="form-control" id="entre_upazila"');
		endif;
	}
	function getDistrict_3()
	{
		if ($_POST):
			$div_id = $this->input->post("id");
			echo form_dropdown("entre_district", getOptionDistrictbyDivision($div_id), "entre_district", ' class="form-control" id="district_id"');
		endif;
	}
	
	function getOfficeByCat()
	{
		if ($_POST):
			$cat_id = $this->input->post("id");

			 echo form_dropdown('office_id', officeByCat($cat_id), '', 'id="office_id" class="form-control"');
		endif;
	}
	

}

?>