<?
header("Content-Type: application/json");

include "../include/db_connect.php";

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");

$qry = "SELECT PROGRAM_ID,PROGRAM_NAME,TARGET_PUMP,STATUS,RUNNING_TIME,CASE WHEN END_TIME>NOW() THEN END_TIME ELSE NULL END AS 'END_TIME' FROM WATER_PROGRAM";

$result = mysqli_query($connect_local,$qry);

$list = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($list,$row);
}

dbclose_local_mysql($connect_local);

echo json_encode($list);
?>