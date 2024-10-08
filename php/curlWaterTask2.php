<?php

include "../include/db_connect.php";

$programId = $_GET["programId"];
$action = $_GET["action"];
$programTime = $_GET["programTime"];
// Initialize cURL session

$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, 'https://seoul-api.fieldon.io/api/services/script/turn_on');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

$headers = array();
$headers[] = 'Accept: */*';
$headers[] = 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiIzYjhiYWY3NmFjYjE0ZjM1YTgwYmU4YTZjODRjNDI2YiIsImlhdCI6MTY3MDU3OTQwMCwiZXhwIjoxOTg1OTM5NDAwfQ.OuC-DCFJ4pXOPap_zh2j0zVGqC04X9TEQTnRPzsu1uQ';
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$data = json_encode(array('entity_id' => 'script.rainbird_program_'.$programId.$programTime.$action));
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Execute cURL session and get the response
$response = curl_exec($ch);
curl_close($ch);

// Print the response (optional)
echo json_encode($response);

$connect_local = dbconn_local_mysql('ctlx');

$runningTime = 0;

$qry = "SELECT * FROM WATER_PROGRAM_V2 WHERE PROGRAM_ID='$programId' AND PROGRAM_TIME='$programTime'";
$result = mysqli_query($connect_local,$qry);
$row = mysqli_fetch_assoc($result);

$runningTime = $row["RUNNING_TIME"];

if($action=="_start") {

    $qry = "UPDATE WATER_PROGRAM_V2 SET END_TIME=DATE_ADD(NOW(),INTERVAL $runningTime MINUTE),STATUS='ON' WHERE PROGRAM_ID='$programId' AND PROGRAM_TIME='$programTime'";
    $result = mysqli_query($connect_local, $qry);

    $logQry = "INSERT INTO WATER_PROGRAM_LOG_V2 VALUES(NULL,'$programId','$programTime',NOW(),DATE_ADD(NOW(),INTERVAL $runningTime MINUTE),'시간종료')";
    $result = mysqli_query($connect_local, $logQry);
}else{
    $logQry = "UPDATE WATER_PROGRAM_LOG_V2 SET END_TIME=NOW(),STOP_TYPE='사용자종료' WHERE PROGRAM_ID='$programId' AND PROGRAM_TIME='$programTime' AND END_TIME>NOW()";
    $result = mysqli_query($connect_local, $logQry);

    $qry = "UPDATE WATER_PROGRAM_V2 SET END_TIME=NULL,STATUS='OFF' WHERE PROGRAM_ID='$programId' AND PROGRAM_TIME='$programTime'";
    $result = mysqli_query($connect_local, $qry);
}

dbclose_local_mysql($connect_local);
//echo $logQry;
?>