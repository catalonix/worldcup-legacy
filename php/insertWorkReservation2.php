<?
include "../include/db_connect.php";
session_start();
$userId = $_SESSION["userId"];

$workDate = $_POST["workDate"];
$primaryWork = $_POST["primaryWork"];
$amWorkMains = $_POST["amWorkMain"];
$pmWorkMains = $_POST["pmWorkMain"];
$amWorkSubs = $_POST["amWorkSub"];
$pmWorkSubs = $_POST["pmWorkSub"];

$amWorkLocs = $_POST["amWorkLoc"];
$pmWorkLocs = $_POST["pmWorkLoc"];

$amWorkMain = "";
$pmWorkMain = "";
$amWorkSub = "";
$pmWorkSub = "";
$amWorkLoc = "";
$pmWorkLoc = "";

for($i=0;$i<count($amWorkMains);$i++){
    $amWorkMain .= $amWorkMains[$i].";;";
    $amWorkSub .= $amWorkSubs[$i].";;";
    $amWorkLoc .= $amWorkLocs[$i].";;";
}

for($i=0;$i<count($pmWorkMains);$i++) {
    $pmWorkMain .= $pmWorkMains[$i].";;";
    $pmWorkSub .= $pmWorkSubs[$i].";;";
    $pmWorkLoc .= $pmWorkLocs[$i].";;";
}

$amWorkMain = substr($amWorkMain,0,strlen($amWorkMain)-2);
$pmWorkMain = substr($pmWorkMain,0,strlen($pmWorkMain)-2);
$amWorkSub = substr($amWorkSub,0,strlen($amWorkSub)-2);
$pmWorkSub = substr($pmWorkSub,0,strlen($pmWorkSub)-2);

$amWorkLoc = substr($amWorkLoc,0,strlen($amWorkLoc)-2);
$pmWorkLoc = substr($pmWorkLoc,0,strlen($pmWorkLoc)-2);

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local, "set names utf8");

$qry = "INSERT INTO WORK_RESERVATION (WORK_DATE,GROUP_CODE, PRIMARY_WORK, AM_WORK_MAIN, AM_WORK_SUB, PM_WORK_MAIN, PM_WORK_SUB, USER_ID,AM_WORK_LOC,PM_WORK_LOC) 
        VALUES (?, 'S001',?, ?, ?, ?, ?, ?,?,?)
        ON DUPLICATE KEY UPDATE 
        PRIMARY_WORK = VALUES(PRIMARY_WORK),
        AM_WORK_MAIN = VALUES(AM_WORK_MAIN),
        AM_WORK_SUB = VALUES(AM_WORK_SUB),
        PM_WORK_MAIN = VALUES(PM_WORK_MAIN),
        PM_WORK_SUB = VALUES(PM_WORK_SUB),
        USER_ID = VALUES(USER_ID),
        AM_WORK_LOC = VALUES(AM_WORK_LOC),
        PM_WORK_LOC = VALUES(PM_WORK_LOC)";

$stmt = mysqli_prepare($connect_local, $qry);

$bind = mysqli_stmt_bind_param($stmt, "sssssssss",$workDate,$primaryWork,$amWorkMain,$amWorkSub,$pmWorkMain,$pmWorkSub,$userId,$amWorkLoc,$pmWorkLoc);

if ($bind === false) {

}else{
    mysqli_stmt_execute($stmt);
}

dbclose_local_mysql($connect_local);

?>