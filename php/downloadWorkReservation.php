<?php
include "../include/db_connect.php";

// MySQLi 연결
$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local, "set names utf8");

// 데이터베이스에서 데이터 선택
$query = "SELECT * FROM WORK_RESERVATION WHERE GROUP_CODE='S001' ORDER BY WORK_DATE ASC";
$result = mysqli_query($connect_local, $query);

// 다운로드할 CSV 파일명
$filename = "data.csv";

// 브라우저에게 응답을 CSV 파일로 처리하도록 지시
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="'.$filename.'"');

// 파일 포인터를 표준 출력으로 열기
$fp = fopen('php://output', 'w');

// UTF-8 BOM 추가
fwrite($fp, "\xEF\xBB\xBF");

// 열 이름을 CSV 파일에 쓰기 (옵션)
$headers = array("작업일자","주요일정","오전작업","오후작업");

fputcsv($fp, $headers);

// 데이터를 한 줄씩 CSV 파일에 쓰기
while ($row = mysqli_fetch_assoc($result)) {

    $amWork = explode(";;",$row["AM_WORK_MAIN"]);
    $pmWork = explode(";;",$row["PM_WORK_MAIN"]);
    $amSub = explode(";;",$row["AM_WORK_SUB"]);
    $pmSub = explode(";;",$row["PM_WORK_SUB"]);

    $amLoc = explode(";;",$row["AM_WORK_LOC"]);
    $pmLoc = explode(";;",$row["PM_WORK_LOC"]);

    $am = "";
    $pm = "";

    for($i=0;$i<count($amWork);$i++){
        if($amWork[$i]=="미정" || trim($amWork[$i])==""){
            continue;
        }
        if($amLoc[$i]==null){
            $amLoc[$i] = "";
        }
        $am .= $amLoc[$i]." ".$amWork[$i]." : ".$amSub[$i]." / ";
    }

    for($i=0;$i<count($pmWork);$i++){
        if($pmWork[$i]=="미정" || trim($pmWork[$i])==""){
            continue;
        }
        if($pmLoc[$i]==null){
            $pmLoc[$i] = "";
        }
        $pm .= $pmLoc[$i]." ".$pmWork[$i]." : ".$pmSub[$i]." / ";
    }

    $am = substr($am,0,strlen($am)-2);
    $pm = substr($pm,0,strlen($pm)-2);

    $data = array($row["WORK_DATE"],$row["PRIMARY_WORK"],$am,$pm);

    if($row["PRIMARY_WORK"]!="" || $am!="" || $pm!="") {
        fputcsv($fp, $data);
    }
}

// 파일 포인터 닫기
fclose($fp);

// 데이터베이스 연결 닫기
dbclose_local_mysql($connect_local);

// 스크립트 종료 (출력 버퍼를 플러시하고 종료)
exit;
?>
