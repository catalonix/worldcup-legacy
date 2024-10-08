<?
header("Content-Type: application/json");

$remoteCode = $_GET["remoteCode"];
$tm = $_GET["tm"];

$remoteList = "";

for($i=0;$i<count($remoteCode);$i++){
    $remoteList .= "'".$remoteCode[$i]."',";
}

$remoteList = substr($remoteList,0,strlen($remoteList)-1);

include "../include/db_connect.php";

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");

$qry = "SELECT * FROM FAN_RESERVATION_DETAIL D JOIN FAN_RESERVATION_TARGET T
        ON D.RESERVE_NO=T.RESERVE_NO 
        JOIN FAN_INFO USING(REMOTE_CODE) 
        WHERE RESERVE_START LIKE '%$tm%' AND GROUP_CODE='S001'";

$result = mysqli_query($connect_local,$qry);

$list = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($list,$row);
}

dbclose_local_mysql($connect_local);

echo json_encode($list);
?>