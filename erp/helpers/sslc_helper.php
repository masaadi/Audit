<?php
	/**
	* SSLCOMMERZ PAYMENT GATEWAY FOR CodeIgniter
	*
	* Module: Pay Via API (CodeIgniter 3.1.6)
	* Developed By: Prabal Mallick
	* Email: prabal.mallick@sslwireless.com
	* Author: Software Shop Limited (SSLWireless)
	*
	**/

	defined('BASEPATH') OR exit('No direct script access allowed');

	define("SSLCZ_STORE_ID", "synco5d22d4a4b07e1");
	define("SSLCZ_STORE_PASSWD", "synco5d22d4a4b07e1@ssl");

	# IF SANDBOX TRUE, THEN IT WILL CONNECT WITH SSLCOMMERZ SANDBOX (TEST) SYSTEM
	define("SSLCZ_IS_SANDBOX", true);

	# IF BROWSE FROM LOCAL HOST, KEEP true
	define("SSLCZ_IS_LOCAL_HOST", true);