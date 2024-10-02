<?
    include "../include/db_connect.php";
    
    
    $workNo = $_POST["workNo"];
    $workType = $_POST["workType"];
    $workDate = $_POST["workDate"];
    $workName = $_POST["workName"];
    $workList = $_POST["workList"];
    
    $work = "";
    
    foreach ($workList as $item) {
        $work .= $item.';';
    }
    
    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local_mysql, "set names utf8");
    
    $qry = "UPDATE WATER_TASK SET WORK_TYPE=?,WORK_NAME=?,WORK_LIST=?,WORK_DATE=? WHERE WORK_NO=?";
    
    $stmt = mysqli_prepare($connect_local, $qry);
    
    $bind = mysqli_stmt_bind_param($stmt, "sssss",$workType,$workName,$work,$workDate,$workNo);
    
    if ($bind === false) {
        
    }else{
        mysqli_stmt_execute($stmt);
        //header("Location:../html/work-history.html");
    }
    
    dbclose_local_mysql($connect_local_mysql);
    
    header("Location:../html/work-history.html");
?>