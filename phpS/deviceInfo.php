<?
    header("Content-Type: application/json");
    
    $branchNo = $_GET["branchNo"];
    
    include "../include/db_connect.php";
    
    $connect_local = dbconn_local_mysql('grow');
    mysqli_query($connect_local_mysql,"set names utf8");
    
    $qry = "SELECT * FROM DEVICE_INFO WHERE BRANCH_NO = '".$branchNo."' ";
    
    $result = mysqli_query($connect_local,$qry);
    
    $list = array();
    
    while($row = mysqli_fetch_assoc($result)){
        array_push($list,$row);
    }
    
    dbclose_local_mysql($connect_local_mysql);
    
    
    echo json_encode($list);
?>