<?php

$call_data = json_decode(file_get_contents("php://input"));
echo 'SureVoIP ' . $call_data->surevoip;
echo "\nSureVoIP API " . $call_data->surevoip_api . "\n";

?>
