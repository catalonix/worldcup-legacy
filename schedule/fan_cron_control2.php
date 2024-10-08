<?php
error_reporting( E_ALL );
include "/home/ec2-user/worldcup/include/db_connect.php";

date_default_timezone_set('Asia/Seoul');

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");

$nowTime = date("Y-m-d H:i");

//시작 처리
$qry = "SELECT * FROM FAN_RESERVATION_DETAIL D JOIN FAN_RESERVATION_TARGET T 
        ON D.RESERVE_NO=T.RESERVE_NO 
        WHERE RESERVE_START LIKE '$nowTime%' AND GROUP_CODE='S001'";

$result = mysqli_query($connect_local,$qry);

while($row = mysqli_fetch_assoc($result)){
    fanOn($row["REMOTE_CODE"]);
}

//종료 처리
$qry2 = "SELECT * FROM FAN_RESERVATION_DETAIL D JOIN FAN_RESERVATION_TARGET T 
         ON D.RESERVE_NO=T.RESERVE_NO 
         WHERE RESERVE_END LIKE '$nowTime%' AND GROUP_CODE='S001'";

$result2 = mysqli_query($connect_local,$qry2);

while($row2 = mysqli_fetch_assoc($result2)){
    fanOff($row2["REMOTE_CODE"]);
}
function fanOn($fanId)
{
    $nowTime = date("Y-m-d H:i:s");
    echo "[".$nowTime."]".$fanId." ON\n";

    $fanId = strtolower($fanId);
    $url = "https://seoul-api.fieldon.io/api/services/switch/turn_on";
    //$entity = "fan99_on";
    $entity = $fanId."_on";

    $data = new stdClass();
    $data->entity_id = "switch." . $entity;

    $headers = array(
        "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiIzYjhiYWY3NmFjYjE0ZjM1YTgwYmU4YTZjODRjNDI2YiIsImlhdCI6MTY3MDU3OTQwMCwiZXhwIjoxOTg1OTM5NDAwfQ.OuC-DCFJ4pXOPap_zh2j0zVGqC04X9TEQTnRPzsu1uQ"
    );

    $jsonData = json_encode($data);

    $ch = curl_init();                                 //curl 초기화
    curl_setopt($ch, CURLOPT_URL, $url);               //URL 지정하기
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

    $response = curl_exec($ch);
    curl_close($ch);

    echo $response."\n";
}


function fanOff($fanId)
{
    $nowTime = date("Y-m-d H:i:s");
    echo "[".$nowTime."]".$fanId." OFF\n";

    $fanId = strtolower($fanId);
    $url = "https://seoul-api.fieldon.io/api/services/switch/turn_off";
    //$entity = "fan99_on";
    $entity = $fanId."_on";

    $data = new stdClass();
    $data->entity_id = "switch." . $entity;

    $headers = array(
        "Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiIzYjhiYWY3NmFjYjE0ZjM1YTgwYmU4YTZjODRjNDI2YiIsImlhdCI6MTY3MDU3OTQwMCwiZXhwIjoxOTg1OTM5NDAwfQ.OuC-DCFJ4pXOPap_zh2j0zVGqC04X9TEQTnRPzsu1uQ"
    );

    $jsonData = json_encode($data);

    $ch = curl_init();                                 //curl 초기화
    curl_setopt($ch, CURLOPT_URL, $url);               //URL 지정하기
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);

    $response = curl_exec($ch);
    curl_close($ch);

    echo $response."\n";
}
?>
