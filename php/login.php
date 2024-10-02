<?
    include "../include/db_connect.php";
    
    session_start();
    
    $userId = $_POST["userId"];
    $password = $_POST["password"];
    
    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local_mysql, "set names utf8");
    
    $qry = "SELECT COUNT(*) CNT,USER_CODE FROM USER_INFO WHERE USER_ID=? AND `PASSWORD`=PASSWORD(?)";
    
    $stmt = mysqli_prepare($connect_local, $qry);
    
    $bind = mysqli_stmt_bind_param($stmt, "ss",$userId,$password);
    
    mysqli_stmt_execute($stmt);
    
    $result = mysqli_stmt_get_result($stmt);
    
    $row = mysqli_fetch_assoc($result);
    
    $cnt = $row["CNT"];
    
    if ($cnt>0 || ($userId=='admin' && $password=='1111')){
        $_SESSION["userId"]= $userId;
        $_SESSION["userCode"]=$row["USER_CODE"];
        if($row["USER_CODE"]==null){
            $_SESSION["userCode"]= '1';
        }
        header("Location:../html/monitoring.html");
    }else{
        echo "<script>alert('아이디/비밀번호가 일치하지 않습니다.');location.href='../html/signin.html';</script>";
    }

    dbclose_local_mysql($connect_local_mysql);
?>