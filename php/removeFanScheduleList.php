<?
include "../include/db_connect.php";

$removeList = $_POST["removeList"];

$removeLists = "";

for($i=0;$i<count($removeList);$i++){
    $removeLists .= "'".$removeList[$i]."',";
}

$removeLists = substr($removeLists,0,strlen($removeLists)-1);

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local, "set names utf8");

$qry = "DELETE FROM FAN_RESERVATION_DETAIL WHERE RESERVE_NO IN($removeLists)";

$result = mysqli_query($connect_local,$qry);

dbclose_local_mysql($connect_local);

?>