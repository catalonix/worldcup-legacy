<?
header("Content-Type: application/json");

$remoteCode = $_GET["remoteCode"];

include "../include/db_connect.php";

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");

$qry = "SELECT * FROM FAN_SCHEDULE WHERE REMOTE_CODE='$remoteCode'";

if($remoteCode=='all'){
    $qry = "SELECT * FROM FAN_SCHEDULE";
}

$result = mysqli_query($connect_local,$qry);

$list = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($list,$row);
}

dbclose_local_mysql($connect_local);

echo json_encode($list);
?>