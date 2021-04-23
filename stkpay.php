<?php
if(isset($_POST['submit'])) {
    //STK PUSH
    date_default_timezone_set('Africa/Nairobi');

    // access token
$consumerKey = '8ltJIEEhHIeTTGNHcGwFMgDRtm8sjoP9';
$consumerSecret = 'Z1j0GCXC2Dh3R4zZ';

// define the variables
// provide the details, this is found on test credentials on developer account
$Amount = $_POST['amount'];
$BusinessShortCode = "174379";
$PassKey = 'MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMTgwNDA5MDkzMDAy';

$PartyA = $_POST['phone'];
$AccountReference = $_POST['jina'];
$TransactionDesc = 'test';

//Get timestamp, format YYmmdd
$Timestamp = date('YmdHis');

// Get base64 encoded string --> $password
$Password = base64_encode($BusinessShortCode.$PassKey.$Timestamp);

//header
$headers = ['Content-Type:application/json; charset=utf8'];

// Mpesa endpoint urls
$access_token_url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$initiate_url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

//callback url
$CallBackUrl = "https://claude555.github.io/Mpesa-stk-push/index.php";

$curl = curl_init($access_token_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HEADER, FALSE);
curl_setopt($curl, CURLOPT_USERPWD, $consumerKey.':').$consumerSecret;
$result = curl_exec($curl);
$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
$result = json_decode($result);
$access_token = $result->access_token;
curl_close($curl);


// header for stk push
$stkheader = ['Content-Type:application/json','Authorization:Bearer'.$access_token];

#initiating the transaction
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $initiate_url);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkheader);

$curl_post_data = array(
    //Fill in the request parameters with valid values
    'BusinessShortCode' => $BusinessShortCode,
    'Password' => $Password,
    'Timestamp' => $Timestamp,
    'TransactionType' => 'CustomerPayBillOnline',
    'Amount"' => $Amount,
    'PartyA' => $PartyA,
    'PartyB' => $BusinessShortCode,
    'PhoneNumber' => $PartyA,
    'CallBackURL' => $CallBackUrl,
    'AccountReference' => $AccountReference,
    'TransactionDesc' => $TransactionDesc
  );

  $data_string = json_encode($curl_post_data);
  
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
  
  $curl_response = curl_exec($curl);
  print_r($curl_response);
  
  echo $curl_response;


}


?>