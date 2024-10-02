<?
    include "../include/db_connect.php";
    
    $userId = $_SESSION["userId"];
    
    $workType = $_POST["workType"];
    $workDate = $_POST["workDate"];
    $workName = $_POST["workName"];
    $workList = $_POST['workList'];
        
    $work = "";
    
    foreach ($workList as $item) {
        $work .= $item.';';
    }
    
    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local_mysql, "set names utf8");
    
    $qry = "INSERT INTO WATER_TASK(WORK_TYPE,WORK_NAME,WORK_LIST,USER_ID,WORK_DATE)
    			VALUES(?,?,?,?,?)";
    
    $stmt = mysqli_prepare($connect_local, $qry);
    
    $bind = mysqli_stmt_bind_param($stmt, "sssss",$workType,$workName,$work,$userId,$workDate);
    
    if ($bind === false) {
        
    }else{
        mysqli_stmt_execute($stmt);
    }
    
    dbclose_local_mysql($connect_local_mysql);

    //header("Location:../html/work-history.html");
?>