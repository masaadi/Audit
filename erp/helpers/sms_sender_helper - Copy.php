<?php
    //const BASEURL = "http://bulkmsg.teletalk.com.bd/api/";
    const URL = "https://bulksms.teletalk.com.bd/link_sms_send.php?";
    
    function ban_sms($msisdn, $message_body, $encoding = 'UTF-8')
    {
    	try {
    			$contact = '88' . $msisdn;
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
                $contact = '88' . $msisdn;
                $message_body = rawurlencode($message_body);

            $query_params = "op=SMS&user=DOT&pass=DOT12365458p&mobile={$contact}&charset={$encoding}&sms={$message_body}";
            $url = URL . $query_params;
            // $ret = call_api($url);
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