<?php

// Your SureVoIP details
$username = '';
$password = '';

$data = array(
   "to" => "447930323266",
   "from" => "SureVoIP",
   "message" => "Do you love VoIP?"
);                                                                    
$data_string = json_encode($data);                                                                                   
 
$ch = curl_init('https://api.surevoip.co.uk/sms');                                                                      
curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");                                                                     
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 1);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_USERAGENT, "SureVoIP API PHP Lib Send SMS Example/1.0");
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
// to poll
//
print $result;

?>
