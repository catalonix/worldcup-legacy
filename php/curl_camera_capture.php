<?php

//$camera = $_POST["cemera"];
// Initialize cURL session
$ch = curl_init();

$resultList = array();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, 'https://seoul-api.fieldon.io/api/services/script/turn_on');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiIzYjhiYWY3NmFjYjE0ZjM1YTgwYmU4YTZjODRjNDI2YiIsImlhdCI6MTY3MDU3OTQwMCwiZXhwIjoxOTg1OTM5NDAwfQ.OuC-DCFJ4pXOPap_zh2j0zVGqC04X9TEQTnRPzsu1uQ';
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$data = json_encode(array('entity_id' => 'script.r003_still_shot'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Execute cURL session and get the response
$response = curl_exec($ch);
array_push($resultList,$response);
// Check for errors and close the session
if (curl_errno($ch)) {
    //echo 'Error:' . curl_error($ch);
}

$data = json_encode(array('entity_id' => 'script.r002_still_shot'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Execute cURL session and get the response
$response2 = curl_exec($ch);
array_push($resultList,$response2);

// Check for errors and close the session
if (curl_errno($ch)) {
    //echo 'Error:' . curl_error($ch);
}

$data = json_encode(array('entity_id' => 'script.r001_still_shot'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Execute cURL session and get the response
$response3 = curl_exec($ch);
array_push($resultList,$response3);

// Check for errors and close the session
if (curl_errno($ch)) {
    //echo 'Error:' . curl_error($ch);
}

curl_close($ch);

// Print the response (optional)
echo json_encode($resultList);

?>