<?
header("Content-Type: application/json");

include "../include/db_connect.php";

$startDate = $_GET["startDate"];
$endDate = $_GET["endDate"];

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");
$qry = "SELECT * FROM RGB_IMG 
        WHERE TM BETWEEN '$startDate 00:00:00' AND '$endDate 23:59:59'
        ORDER BY SENSOR_NO,TM;";

$result = mysqli_query($connect_local,$qry);

$r001 = array();
$r002 = array();
$r003 = array();

while($row = mysqli_fetch_assoc($result)){
    if($row["SENSOR_NO"]=="R001"){
        if(file_exists("/var/www/seoul.fieldon.io/data/R001/".$row["IMG_PATH"]) && filesize("/var/www/seoul.fieldon.io/data/R001/".$row["IMG_PATH"]) > 0){
            array_push($r001,$row);
        }
    };
    if($row["SENSOR_NO"]=="R002"){
        if(file_exists("/var/www/seoul.fieldon.io/data/R002/".$row["IMG_PATH"]) && filesize("/var/www/seoul.fieldon.io/data/R002/".$row["IMG_PATH"]) > 0) {
            array_push($r002, $row);
        }
    };
    if($row["SENSOR_NO"]=="R003"){
        if(file_exists("/var/www/seoul.fieldon.io/data/R003/".$row["IMG_PATH"]) && filesize("/var/www/seoul.fieldon.io/data/R003/".$row["IMG_PATH"]) > 0) {
            array_push($r003, $row);
        }
    };
}
$resultMap = new stdClass();
$resultMap -> r001 = $r001;
$resultMap -> r002 = $r002;
$resultMap -> r003 = $r003;

dbclose_local_mysql($connect_local);

echo json_encode($resultMap);
?>