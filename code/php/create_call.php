<?php

// Your SureVoIP details
$username = '';
$password = '';

// "from" will be rung first and when answered,
// the second leg of the call will begin using 
// the caller ID set in "caller_id"
//
// "from" can also be a SIP uri like:
//
// sip:01224900123@ip_address
//
// You should validate calls to 0870, 09, 118, 
// 999, 070, international etc. e,g. just allow
// calls "to" 01/02/07XXXXXXXXX but not 
// 070XXXXXXXX
// 
// Contact SureVoIP for advice on this and the
// options we can help you with as you will be 
// billed otherwise.
//
$data = array(
   "to" => "447930323266",
   "from" => "441224279484",
   "caller_id" => "01224900123"
);                                                                    
$data_string = json_encode($data);                                                                                   
 
$ch = curl_init('https://api.surevoip.co.uk/calls');                                                                      
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, "SureVoIP API PHP Lib Create Call Example/1.0");
curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string))                                                                       
);                                                                                                                   
 
$result = curl_exec($ch);

// 
// You can use json_decode here with CURLOUT_HEADER=0
//
// $returned_data = json_decode($result);
// print $returned_data->{'Location'}. "\n";
//
// Use Location from the returned body in your browser or
// to poll to see the current state of the telephone call
//
print $result;

?>
