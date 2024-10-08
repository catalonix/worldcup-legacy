<?
    header("Content-Type: application/json");
    
    $userId = $_POST["userId"];
    
    include "../include/db_connect.php";

    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local_mysql,"set names utf8");
    
    $qry = "SELECT * FROM USER_INFO WHERE USER_ID='$userId'";
    
    $result = mysqli_query($connect_local,$qry);

    $row = mysqli_fetch_assoc($result);
    $row["PASSWORD"] = "";
    
    dbclose_local_mysql($connect_local_mysql);
    
    echo json_encode($row);
?>