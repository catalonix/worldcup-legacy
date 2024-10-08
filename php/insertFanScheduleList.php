<?
include "../include/db_connect.php";

$remoteCode = $_POST["remoteCode"];
$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];
$timeList = $_POST["timeList"];
$reserveTime = $_POST["reserveTime"];
$reserveComment = $_POST["reserveComment"];

$dateList = getDatesBetween($startDate,$endDate);

$dateTimeList = array();
$dateTimeList2 = array();

for($i=0;$i<count($dateList);$i++) {
    for($j=0;$j<count($timeList);$j++) {
        if($timeList[$j]==''){
            continue;
        }
        $reserveStart = $dateList[$i]." ".$timeList[$j];


        // 주어진 날짜-시간
        $dateString = $reserveStart;
        // DateTime 객체 생성
        $date = new DateTime($dateString);
        $reserveStart = $date->format('Y-m-d H:i');
        // x분 더하기
        $date->add(new DateInterval('PT'.$reserveTime.'M'));

        // YYYY-MM-DD HH:MI 형식으로 출력
        $reserveEnd = $date->format('Y-m-d H:i');
        array_push($dateTimeList,$reserveStart);
        array_push($dateTimeList2,$reserveEnd);
    }
}

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local, "set names utf8");

for($j=0;$j<count($dateTimeList);$j++) {

    $qry = "INSERT INTO FAN_RESERVATION_DETAIL VALUES(NULL,?,?,?,?,'S001')";

    $stmt = mysqli_prepare($connect_local, $qry);

    $reserveStart = $dateTimeList[$j];
    $reserveEnd = $dateTimeList2[$j];

    $bind = mysqli_stmt_bind_param($stmt, "ssis", $reserveStart, $reserveEnd, $reserveTime, $reserveComment);

    if ($bind === false) {

    } else {
        if (mysqli_stmt_execute($stmt)) {
            $last_id = mysqli_insert_id($connect_local);

            for ($i = 0; $i < count($remoteCode); $i++) {
                mysqli_query($connect_local, "INSERT INTO FAN_RESERVATION_TARGET VALUES(NULL,$last_id,'$remoteCode[$i]')");
            }
        }
    }
}
dbclose_local_mysql($connect_local);

function getDatesBetween($startDate, $endDate) {
    $start = new DateTime($startDate);
    $end = new DateTime($endDate);
    $interval = new DateInterval('P1D');
    $dateRange = new DatePeriod($start, $interval, $end->modify('+1 day')); // 종료일 포함

    $dates = [];
    foreach ($dateRange as $date) {
        $dates[] = $date->format('Y-m-d');
    }

    return $dates;
}
?>