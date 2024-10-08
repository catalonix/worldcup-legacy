<?
header("Content-Type: application/json");

include "../include/db_connect.php";

$data = $_GET["data"];

$data = explode(',', $data);

if(count($data)!=15){
    $result["Input Data"] = $data;
    
    $result["result"] = "fail";
    
    echo json_encode($result);
    
    exit();
}

$connect_local = dbconn_local_mysql('grow');
mysqli_query($connect_local_mysql, "set names utf8");

$qry = "INSERT INTO API_DATA VALUES(?,SYSDATE(),?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = mysqli_prepare($connect_local, $qry);

$bind = mysqli_stmt_bind_param($stmt, "sssssssssssssss", $data[6], $data[0],
        $data[1], $data[2], $data[3], $data[4], $data[5], $data[7], $data[8],
        $data[9], $data[10], $data[11], $data[12], $data[13], $data[14]);
if ($bind === false) {
    // echo('파라미터 바인드 실패 : ' . mysqli_error($connect_local));

    $result["Input Data"] = $data;

    $result["result"] = "fail";

    echo json_encode($result);

    exit();
}

mysqli_stmt_execute($stmt);

dbclose_local_mysql($connect_local_mysql);

$result["Input Data"] = $data;

$result["result"] = "success";

echo json_encode($result);

?>