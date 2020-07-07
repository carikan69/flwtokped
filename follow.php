<?php

function request($url, $data, $headers, $put = null) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	if($put):
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	endif;
	if($data):
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
	curl_setopt($ch, CURLOPT_TIMEOUT, 120);
	endif;
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	if($headers):
    curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	endif;
	curl_setopt($ch, CURLOPT_ENCODING, "GZIP");
	return curl_exec($ch);
}

$url = "https://gql.tokopedia.com/";
    $data = '[{"operationName":"followShopMutation","variables":{"shopID":"3255630","action":"follow"},"query":"mutation followShopMutation($shopID: String!, $action: String, $adKey: String) {\n  followShop(input: {shopID: $shopID, action: $action, adKey: $adKey}) {\n    success\n    message\n    isFirstTime\n    __typename\n  }\n}\n"}]';
    $headers = array();
    $headers [] = "Content-Type: application/json";
    $headers [] = "X-Method: POST";
    $headers [] = "User-Agent: TkpdConsumer/3.56 (Android 5.1.1;)";
    $headers [] = "X-User-ID: 104025198";
    $headers [] = "Request-Method: POST";
    $headers [] = "X-Tkpd-App-Version: android-3.56";
    $headers [] = "X-Tkpd-App-Name: com.tokopedia.customerappp";
    $headers [] = "Date: Fri 17 Jan 2020 12:10:16 +0700";
    $headers [] = "os_version: 22";
    $headers [] = "X-APP-VERSION: 315600000";
    $headers [] = "X-Device: android-3.56";
    $headers [] = "Tkpd-UserId: 104025198";
    $headers [] = "Accounts-Authorization: Bearer sJLtaJ-gSrO8s512rvNS-w";
    $headers [] = "Content-Type: application/json; charset=UTF-8";
    $headers [] = "Content-Length: 369";
    $headers [] = "Host: gql.tokopedia.com";
    $headers [] = "Connection: Keep-Alive";
    $headers [] = "Accept-Encoding: gzip";


$getotp = request($url, $data, $headers);
$json = json_decode($getotp, true);
var_dump($json);
