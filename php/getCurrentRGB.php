<?php
$sensorNo= $_GET["sensorNo"];

$directory = '../data/'.$sensorNo;

// 디렉토리 내의 모든 파일 목록 가져오기
$files = scandir($directory);

// 파일 목록을 역순으로 정렬하여 마지막 파일을 찾기
$files = array_reverse($files);

$lastFile = "";
// "raw"를 포함한 마지막 파일 찾기
foreach ($files as $file) {
    if (strpos($file, 'raw') !== false) {
        $lastFile = $file;
        break;
    }
}

// 결과 출력
echo $lastFile;
?>