<?
	header("Content-Type: application/json");
		
	include "../include/db_connect.php";
	
	$sensorNo = $_POST["sensorNo"];
		
	$connect_local = dbconn_local_mysql('ctlx');
	mysqli_query($connect_local,"set names utf8");

	//ndvi 이미지 경로
	$qry = "SELECT SUBSTRING(DATE(TM), 1, 10) AS TM, ROUND(AVG(NDVI),3) AS NDVI 
            FROM NDVI_IMG
            WHERE SENSOR_NO = '$sensorNo'
            GROUP BY SUBSTRING(DATE(TM), 1, 10)
            ORDER BY SUBSTRING(DATE(TM), 1, 10) DESC
            LIMIT 5;";
	
    $qry2 = "SELECT SENSOR_NO,ROUND(NDVI_daily,3) NDVI_daily,ROUND(NDVI_ma5,3) NDVI_ma5 
            FROM FUTURE WHERE SENSOR_NO IN('C001','C002','C003') ORDER BY TM DESC LIMIT 3";

    $qry3 = "SELECT SUBSTRING(DATE(TM), 1, 10) AS TM, ROUND(AVG(NDVI),3) AS NDVI 
                FROM NDVI_IMG
                WHERE SENSOR_NO = 'C001'
                GROUP BY SUBSTRING(DATE(TM), 1, 10)
                ORDER BY SUBSTRING(DATE(TM), 1, 10) DESC
                LIMIT 5";

    $qry4 = "SELECT SUBSTRING(DATE(TM), 1, 10) AS TM, ROUND(AVG(NDVI),3) AS NDVI 
                FROM NDVI_IMG
                WHERE SENSOR_NO = 'C002'
                GROUP BY SUBSTRING(DATE(TM), 1, 10)
                ORDER BY SUBSTRING(DATE(TM), 1, 10) DESC
                LIMIT 5";

    $qry5 = "SELECT SUBSTRING(DATE(TM), 1, 10) AS TM, ROUND(AVG(NDVI),3) AS NDVI 
                FROM NDVI_IMG
                WHERE SENSOR_NO = 'C003'
                GROUP BY SUBSTRING(DATE(TM), 1, 10)
                ORDER BY SUBSTRING(DATE(TM), 1, 10) DESC
                LIMIT 5";

    $resultMap = new stdClass();
    //현재
	$result = mysqli_query($connect_local,$qry);
	
	$list = array();
    $list2 = array();
    $c001 = array();
    $c002 = array();
    $c003 = array();

	while($row = mysqli_fetch_assoc($result)){
	    array_push($list,$row);
	}

    $result = mysqli_query($connect_local,$qry3);
    while($row = mysqli_fetch_assoc($result)){
        array_push($c001,$row);
    }

    $result = mysqli_query($connect_local,$qry4);
    while($row = mysqli_fetch_assoc($result)){
        array_push($c002,$row);
    }

    $result = mysqli_query($connect_local,$qry5);
    while($row = mysqli_fetch_assoc($result)){
        array_push($c003,$row);
    }

	//미래
	$result2 = mysqli_query($connect_local,$qry2);
	
    while($row = mysqli_fetch_assoc($result2)){
        array_push($list2,$row);
    }
		
	dbclose_local_mysql($connect_local);

    $directory = '../data/C001';
    $directory2 = '../data/C002';
    $directory3 = '../data/C003';

    // 디렉토리 내의 모든 파일 목록 가져오기
    $files = scandir($directory);

    // 파일 목록을 역순으로 정렬하여 마지막 파일을 찾기
    $files = array_reverse($files);

    $lastFile = "";
    // "raw"를 포함한 마지막 파일 찾기
    foreach ($files as $file) {
        if (strpos($file, 'raw') !== false && (strpos($file, '13') !== false || strpos($file, '12') !== false)) {
            $lastFile = $file;
            break;
        }
    }

    $files = scandir($directory2);
    // 파일 목록을 역순으로 정렬하여 마지막 파일을 찾기
    $files = array_reverse($files);

    $lastFile2 = "";
    // "raw"를 포함한 마지막 파일 찾기
    foreach ($files as $file) {
        if (strpos($file, 'raw') !== false && (strpos($file, '13') !== false || strpos($file, '12') !== false)) {
            $lastFile2 = $file;
            break;
        }
    }

    $files = scandir($directory3);
    // 파일 목록을 역순으로 정렬하여 마지막 파일을 찾기
    $files = array_reverse($files);

    $lastFile3 = "";
    // "raw"를 포함한 마지막 파일 찾기
    foreach ($files as $file) {
        if (strpos($file, 'raw') !== false && (strpos($file, '13') !== false || strpos($file, '12') !== false)) {
            $lastFile3 = $file;
            break;
        }
    }
	
	$resultMap -> now = $list2;
	$resultMap -> list = $list;
    $resultMap -> c001 = $c001;
    $resultMap -> c002 = $c002;
    $resultMap -> c003 = $c003;
    $resultMap -> last = $lastFile;
    $resultMap -> last2 = $lastFile2;
    $resultMap -> last3 = $lastFile3;
	
	echo json_encode($resultMap);
?>