<?
    include "../include/db_connect.php";
    
    $remoteCode = $_POST["remoteCode"];
    $workInterval = $_POST["workInterval"];
    $workTime = $_POST["workTime"];
    $currentOper = $_POST["currentOper"];
    $nextOper = $_POST["nextOper"];
        
    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local_mysql, "set names utf8");
    
    for($i=0;$i<count($remoteCode);$i++){
        
        $code = $remoteCode[$i];
        $int = $workInterval[$i];
        $time = $workTime[$i];
        $current = $currentOper[$i];
        $next = $nextOper[$i];
        
        $qry = "UPDATE REMOTE_INFO SET WORK_INTERVAL=$int,WORK_TIME=$time,CURRENT_OPER='$current',NEXT_OPER='$next' WHERE REMOTE_CODE='$code'";
        
        //echo $qry;
        mysqli_query($connect_local_mysql, $qry);
    }
    
    dbclose_local_mysql($connect_local_mysql);
    
    header("Location:../html/remote-operation.html");
?>