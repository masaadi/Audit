<?php

  function expay_payment($pay_info=[])
  {
     date_default_timezone_set("Asia/Dhaka");
    $ekp_arrya = array();
    $ekp_array["mer_info"]= array("mer_reg_id"=>"bscic_ereg", "mer_pas_key"=>"BsCiC@Reg2k");

   // $ekp_array["req_timestamp"]= date('Y-m-d H:i:s ', strtotime(' + 5 hours')).' GMT+6';
	$ekp_array["req_timestamp"]= date('Y-m-d H:i:s').' GMT+6';

    $ekp_array["feed_uri"]= array("s_uri"=>$pay_info['s_uri'], 
                                    "f_uri"=>$pay_info['f_uri'],
                                    "c_uri"=>$pay_info['c_uri']
                                  );

    $ekp_array["cust_info"]= array("cust_id"=>$pay_info['cust_id'], 
                                    "cust_name"=>$pay_info['cust_name'],
                                    "cust_mobo_no"=>$pay_info['cust_mobo_no'],
                                    "cust_email"=>$pay_info['cust_email'],
                                    "cust_mail_addr"=>$pay_info['cust_mail_addr']
                                  );

    $ekp_array["trns_info"]= array("trnx_id"=>$pay_info['trnx_id'], 
                                    "trnx_amt"=>$pay_info['trnx_amt'],
                                    "trnx_currency"=>"BDT",
                                    "ord_id"=>$pay_info['ord_id'],
                                    "ord_det"=>$pay_info['ord_det']
                                  );

    $ekp_array["ipn_info"]= array("ipn_channel"=>$pay_info['ipn_channel'],
                                    "ipn_email"=>$pay_info['ipn_email'],
                                    "ipn_uri"=>$pay_info['ipn_uri']
                                  );

    $ekp_array["mac_addr"]= "114.130.116.144";




    $adminUrl="https://pg.ekpay.gov.bd/ekpaypg/v1/merchant-api";
    $ch = curl_init();
    
    $data_string = json_encode($ekp_array);
    $ch = curl_init($adminUrl);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER , false); // add this line
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
    );

    $result1 = curl_exec($ch);
    $result=  json_decode($result1);
    curl_close($ch);

    if(isset($result) && $result->secure_token){
        $sToken = $result->secure_token;
        $trnsID = $ekp_array["trns_info"]["trnx_id"];
        if(!empty($sToken) ANd !empty($trnsID)){
            return 'https://pg.ekpay.gov.bd/ekpaypg/v1?sToken='.$sToken.'&trnsID='.$trnsID;
        }
        
    }

  }
