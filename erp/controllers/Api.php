<?php
include_once 'BaseController.php';
class Api extends BaseController {

	public function sendSingleSMS()
	{
		$this->load->helper('sms_sender');
		$mobile_no = "01814233642";
		// echo $mobile_no;
		$message = "Namaz bad diya ki koren?";
		single_sms($mobile_no, $message);
	}

}