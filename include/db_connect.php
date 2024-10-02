<?
function dbconn_local_mysql($db_name)
{
    
    global $connect_local_mysql;
    
    $db_host = "3.36.235.36";
    $db_userid = "ctlx";
    $db_pass = "@9WgJyB88X\$zKf5";
    
    if(!$connect_local_mysql)
    {
        $connect_local_mysql = mysqli_connect($db_host, $db_userid, $db_pass,$db_name);
    }
    
    if(!$connect_local_mysql)
    {
        
        echo "Local mysql DB 접속시 에러가 발생했습니다";
    }
    
    mysqli_select_db($connect_local_mysql,$db_name) or die("Local mysql DB Select 에러가 발생했습니다");
    
    return $connect_local_mysql;
}


function dbclose_local_mysql($connect_local_mysql)
{
    if($connect_local_mysql)
    {
        mysqli_close($connect_local_mysql);
        $connect_local_mysql = "";
    }
}


?>