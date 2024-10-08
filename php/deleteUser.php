<?
    include "../include/db_connect.php";
    
    if($_SESSION["userCode"]!="1"){
        header("Location:../html/user-management.html");
    }
    
    $userId = $_POST["userId"];
    
    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local_mysql, "set names utf8");
    
    $qry = "DELETE FROM USER_INFO WHERE USER_ID=?";
    
    $stmt = mysqli_prepare($connect_local, $qry);
    
    $bind = mysqli_stmt_bind_param($stmt, "s",$userId);
    
    if ($bind === false) {
        
    }else{
        mysqli_stmt_execute($stmt);
    }
    
    dbclose_local_mysql($connect_local_mysql);
    
    header("Location:../html/user-management.html");
?>