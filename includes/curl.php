
	<?php
//User clicked post URL

//Get URL
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$compUrl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//Get URL query - clicked post entry url
$postUrl = $_SERVER['QUERY_STRING'];

//My Mercury API key
$apiKey = 'ARFQEA5HeWYdvLPb6pgdo7P71x3V6UDcGho1BS63';
//Mercury API URL
$url = "https://mercury.postlight.com/parser?url=$postUrl";

//Create cURL resource
$curl = curl_init($url);

//Set request headers
$header = array(
   "x-api-key:".$apiKey, 
   "Content-Type: application/json");

// pass header variable in curl method
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
//curl_setopt($curl, CURLOPT_URL, $postUrl);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
//Run cURL

$response = curl_exec($curl);
if($response === false){
        echo 'curl error: ' . curl_error($curl);
    }
curl_close($curl);

$final = preg_replace('/\\\\n/', '', $response);

echo $final;



