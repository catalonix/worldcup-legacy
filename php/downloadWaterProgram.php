<?php
include "../include/db_connect.php";

// MySQLi 연결
$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local, "set names utf8");

// 데이터베이스에서 데이터 선택
$query = "SELECT L.*,P.PROGRAM_NAME,TIMESTAMPDIFF(MINUTE,L.START_TIME,L.END_TIME) AS USE_TIME FROM WATER_PROGRAM_LOG L JOIN WATER_PROGRAM P USING(PROGRAM_ID) ORDER BY PROGRAM_ID,LOG_NO";
$result = mysqli_query($connect_local, $query);

// 다운로드할 CSV 파일명
$filename = "서울월드컵경기장 관수기록_".date("Ymd").".csv";

// 브라우저에게 응답을 CSV 파일로 처리하도록 지시
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="'.$filename.'"');

// 파일 포인터를 표준 출력으로 열기
$fp = fopen('php://output', 'w');

// UTF-8 BOM 추가
fwrite($fp, "\xEF\xBB\xBF");

// 열 이름을 CSV 파일에 쓰기 (옵션)
$headers = array("프로그램명","시작시간","종료시간","작동시간(분)","종료방식");

fputcsv($fp, $headers);

// 데이터를 한 줄씩 CSV 파일에 쓰기
while ($row = mysqli_fetch_assoc($result)) {
    $data = array($row["PROGRAM_NAME"],$row["START_TIME"],$row["END_TIME"],$row["USE_TIME"],$row["STOP_TYPE"]);
    fputcsv($fp, $data);
}

// 파일 포인터 닫기
fclose($fp);

// 데이터베이스 연결 닫기
dbclose_local_mysql($connect_local);

// 스크립트 종료 (출력 버퍼를 플러시하고 종료)
exit;
?>
