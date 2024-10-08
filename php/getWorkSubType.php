<?
header("Content-Type: application/json");

$mainType = $_GET["mainType"];

include "../include/db_connect.php";

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");

$qry = "SELECT SUB_TYPE FROM WORK_TYPE_DEF WHERE MAIN_TYPE='$mainType' ORDER BY SORT";

$result = mysqli_query($connect_local,$qry);

$list = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($list,$row["SUB_TYPE"]);
}

dbclose_local_mysql($connect_local);

echo json_encode($list);
?>