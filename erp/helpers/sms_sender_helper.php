<?php
    //const BASEURL = "http://bulkmsg.teletalk.com.bd/api/";
    const URL = "https://bulksms.teletalk.com.bd/link_sms_send.php?";
    
    function ban_sms($msisdn, $message_body, $encoding = 'UTF-8')
    {
    	try {
    			$contact = '88' . $msisdn;
				$msf = explode('',$message_body);
                $message_body = rawurlencode($message_body);

			$query_params = "op=SMS&user=DOT&pass=DOT12365458p&mobile={$contact}&charset={$encoding}&sms={$message_body}";
			$url = URL . $query_params;
            // $ret = call_api($url);
    	} catch (Exception $ex) {
    		echo $ex->getMessage();
    	}
        
    }

    function eng_sms($msisdn, $message_body, $encoding = 'ASCII')
    {
			



	   try {
              /*   $contact = '88' . $msisdn;
                $message_body = rawurlencode($message_body);

               $query_params = "op=SMS&user=DOT&pass=DOT12365458p&mobile={$contact}&charset={$encoding}&sms={$message_body}";
              $url = URL . $query_params; */
            // $ret = call_api($url);
			
			$username = "test";
			$password = "test";
			$to='88' . $msisdn;
			//$message = str_replace(" ","%20",$message_body);
			$message = $message_body;
			$url1 = "http://10.1.4.18:13015/cgi-bin/sendsms?username=$username&password=$password&from=Teletalk&to=$to&smsc=smscpriority&text=$message&coding=2&charset=UTF-8" ;
			$ch = curl_init($url1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$response = curl_exec($ch);
			curl_close($ch);
			return $response;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        
    }

    function call_api($url)
    {
       return file_get_contents($url);

        $cURLConnection = curl_init();

        curl_setopt($cURLConnection, CURLOPT_URL, $url);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($cURLConnection, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($cURLConnection);
        curl_close($cURLConnection);
        return $response;
    }

?>