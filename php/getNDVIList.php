<?
header("Content-Type: application/json");

include "../include/db_connect.php";

$startDate = $_GET["startDate"];
$endDate = $_GET["endDate"];

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");
$qry = "SELECT * FROM NDVI_IMG 
        WHERE TM BETWEEN '$startDate 00:00:00' AND '$endDate 23:59:59'
        ORDER BY SENSOR_NO,TM;";

$result = mysqli_query($connect_local,$qry);

$r001 = array();
$r002 = array();
$r003 = array();

while($row = mysqli_fetch_assoc($result)){
    if($row["SENSOR_NO"]=="C001"){
        //if(file_exists("/var/www/seoul.fieldon.io/data/C001/".$row["IMG_PATH"]) && filesize("/var/www/seoul.fieldon.io/data/C001/".$row["IMG_PATH"]) > 0){
            array_push($r001,$row);
        //}
    };
    if($row["SENSOR_NO"]=="C002"){
        //if(file_exists("/var/www/seoul.fieldon.io/data/C002/".$row["IMG_PATH"]) && filesize("/var/www/seoul.fieldon.io/data/C002/".$row["IMG_PATH"]) > 0) {
            array_push($r002, $row);
        //}
    };
    if($row["SENSOR_NO"]=="C003"){
        //if(file_exists("/var/www/seoul.fieldon.io/data/C003/".$row["IMG_PATH"]) && filesize("/var/www/seoul.fieldon.io/data/C003/".$row["IMG_PATH"]) > 0) {
            array_push($r003, $row);
        //}
    };
}
$resultMap = new stdClass();
$resultMap -> c001 = $r001;
$resultMap -> c002 = $r002;
$resultMap -> c003 = $r003;

dbclose_local_mysql($connect_local);

echo json_encode($resultMap);
?>