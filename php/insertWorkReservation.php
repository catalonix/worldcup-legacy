<?
include "../include/db_connect.php";
session_start();
$userId = $_SESSION["userId"];

$workDate = $_POST["workDate"];
$primaryWork = $_POST["primaryWork"];
$amWorkMain = $_POST["amWorkMain"];
$pmWorkMain = $_POST["pmWorkMain"];
$amWorkSub = $_POST["amWorkSub"];
$pmWorkSub = $_POST["pmWorkSub"];

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local, "set names utf8");

$qry = "INSERT INTO WORK_RESERVATION (WORK_DATE, PRIMARY_WORK, AM_WORK_MAIN, AM_WORK_SUB, PM_WORK_MAIN, PM_WORK_SUB, USER_ID) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
        ON DUPLICATE KEY UPDATE 
        PRIMARY_WORK = VALUES(PRIMARY_WORK),
        AM_WORK_MAIN = VALUES(AM_WORK_MAIN),
        AM_WORK_SUB = VALUES(AM_WORK_SUB),
        PM_WORK_MAIN = VALUES(PM_WORK_MAIN),
        PM_WORK_SUB = VALUES(PM_WORK_SUB),
        USER_ID = VALUES(USER_ID)";

$stmt = mysqli_prepare($connect_local, $qry);

$bind = mysqli_stmt_bind_param($stmt, "sssssss",$workDate,$primaryWork,$amWorkMain,$amWorkSub,$pmWorkMain,$pmWorkSub,$userId);

if ($bind === false) {

}else{
    mysqli_stmt_execute($stmt);
}

dbclose_local_mysql($connect_local);

?>
