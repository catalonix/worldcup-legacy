<?
header("Content-Type: application/json");

include "../include/db_connect.php";

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");

$qry = "SELECT DISTINCT MAIN_TYPE FROM WORK_TYPE_DEF ORDER BY SORT";

$result = mysqli_query($connect_local,$qry);

$list = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($list,$row["MAIN_TYPE"]);
}

dbclose_local_mysql($connect_local);

echo json_encode($list);
?>