<?
    header("Content-Type: application/json");

    include "../include/db_connect.php";

    $tm = $_POST["tm"];

    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local,"set names utf8");

    $qry = "SELECT * FROM WORK_RESERVATION WHERE WORK_DATE = '$tm' AND GROUP_CODE='S001'";

    $result = mysqli_query($connect_local,$qry);

    $list = array();

    while($row = mysqli_fetch_assoc($result)){
        array_push($list,$row);
    }

    dbclose_local_mysql($connect_local);

    echo json_encode($list);
?>