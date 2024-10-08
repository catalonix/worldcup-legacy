<?
include "../include/db_connect.php";

$remoteCode = $_POST["remoteCode"];
$reserveStart = $_POST["reserveStart"];
$reserveEnd = $_POST["reserveEnd"];
$reserveTime = $_POST["reserveTime"];
$reserveComment = $_POST["reserveComment"];

// 주어진 날짜-시간
$dateString = $reserveStart;

// DateTime 객체 생성
$date = new DateTime($dateString);

// x분 더하기
$date->add(new DateInterval('PT'.$reserveTime.'M'));

// YYYY-MM-DD HH:MI 형식으로 출력
$reserveEnd = $date->format('Y-m-d H:i');

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local, "set names utf8");

$qry = "INSERT INTO FAN_SCHEDULE VALUES(NULL,?,?,?,?,?)";

$stmt = mysqli_prepare($connect_local, $qry);

$bind = mysqli_stmt_bind_param($stmt, "sssis",$remoteCode,$reserveStart,$reserveEnd,$reserveTime,$reserveComment);

if ($bind === false) {

}else{
    mysqli_stmt_execute($stmt);
}

dbclose_local_mysql($connect_local);
?>