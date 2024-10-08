<?
    include "../include/db_connect.php";

    $reserveNo = $_POST["no"];

    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local, "set names utf8");

    $qry = "DELETE FROM FAN_RESERVATION_DETAIL WHERE RESERVE_NO=?";

    $stmt = mysqli_prepare($connect_local, $qry);

    $bind = mysqli_stmt_bind_param($stmt, "s",$reserveNo);

    if ($bind === false) {

    }else{
        mysqli_stmt_execute($stmt);
    }

    dbclose_local_mysql($connect_local);

?>