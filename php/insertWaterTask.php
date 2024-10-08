<?
    include "../include/db_connect.php";
    session_start();    
    $userId = $_SESSION["userId"];
    
    $workType = $_POST["workType"];
    $workDate = $_POST["workDate"];
    $workStart = $_POST["workStart"];
    $workEnd = $_POST["workEnd"];
    $workName = $_POST["workName"];
    $workList = $_POST['workList'];
        
    $work = "";
    
    foreach ($workList as $item) {
        $work .= $item.';';
    }
    
    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local, "set names utf8");
    
    $qry = "INSERT INTO WATER_TASK(WORK_TYPE,WORK_NAME,WORK_LIST,USER_ID,WORK_DATE,WORK_START,WORK_END)
    			VALUES(?,?,?,?,?,?,?)";
    
    $stmt = mysqli_prepare($connect_local, $qry);
    
    $bind = mysqli_stmt_bind_param($stmt, "sssssss",$workType,$workName,$work,$userId,$workDate,$workStart,$workEnd);
    
    if ($bind === false) {
        
    }else{
        mysqli_stmt_execute($stmt);
    }
    
    dbclose_local_mysql($connect_local);

    //header("Location:../html/work-history.html");
?>
