<?
header("Content-Type: application/json");

include "../include/db_connect.php";

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");

$qry = "SELECT * FROM 
        (SELECT * FROM FAN_RESERVATION_DETAIL JOIN FAN_RESERVATION_TARGET USING(RESERVE_NO)) A 
        JOIN
        (SELECT REMOTE_CODE,MIN(RESERVE_START) RESERVE_START FROM FAN_RESERVATION_DETAIL JOIN FAN_RESERVATION_TARGET USING(RESERVE_NO)
        WHERE RESERVE_END > NOW() 
        GROUP BY REMOTE_CODE) B
        ON A.REMOTE_CODE=B.REMOTE_CODE AND A.RESERVE_START = B.RESERVE_START
        WHERE GROUP_CODE='S001'";

$result = mysqli_query($connect_local,$qry);

$list = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($list,$row);
}

dbclose_local_mysql($connect_local);

echo json_encode($list);
?>