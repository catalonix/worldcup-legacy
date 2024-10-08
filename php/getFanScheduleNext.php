<?
    header("Content-Type: application/json");

    include "../include/db_connect.php";

    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local_mysql,"set names utf8");

    $qry = "SELECT * FROM FAN_SCHEDULE A JOIN 
            (SELECT REMOTE_CODE,MIN(RESERVE_START) RESERVE_START FROM FAN_SCHEDULE 
            WHERE RESERVE_START > NOW() 
            GROUP BY REMOTE_CODE) B
            USING(REMOTE_CODE,RESERVE_START)";

    $result = mysqli_query($connect_local,$qry);

    $list = array();

    while($row = mysqli_fetch_assoc($result)){
        array_push($list,$row);
    }

    dbclose_local_mysql($connect_local_mysql);

    echo json_encode($list);
?>