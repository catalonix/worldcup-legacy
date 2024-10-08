<?
    header("Content-Type: application/json");
    
    $workNo = $_POST["workNo"];
    
    include "../include/db_connect.php";

    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local_mysql,"set names utf8");
    
    $qry = "SELECT * FROM WATER_TASK WHERE WORK_NO='$workNo'";
    
    $result = mysqli_query($connect_local,$qry);

    $row = mysqli_fetch_assoc($result);
    
    dbclose_local_mysql($connect_local_mysql);
    
    echo json_encode($row);
?>