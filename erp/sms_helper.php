<?php
    const API_TOKEN = "SystechNon-c7a532e7-b2db-47a4-98c4-48b5d5bbcf3b";
    const SID = "SystechNon";
    const DOMAIN = "https://smsplus.sslwireless.com";

    function sms_helper($sms_info=[])
    {
        $mobile = $sms_info=['mobile'];
        $message = $sms_info=['message'];
        $csmsId = uniqid();

        singleSms($mobile, $message, $csmsId);

    }

    function singleSms($msisdn, $messageBody, $csmsId)
    {
        $params = [
            "api_token" => API_TOKEN,
            "sid" => SID,
            "msisdn" => $msisdn,
            "sms" => $messageBody,
            "csms_id" => $csmsId
        ];
        $url = trim(DOMAIN, '/')."/api/v3/send-sms";
        $params = json_encode($params);
        callApi($url, $params);
    }

    function callApi($url, $params)
    {
        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($params),
            'accept:application/json'
        ));

        $response = curl_exec($ch);
        curl_close($ch);
    }

?>