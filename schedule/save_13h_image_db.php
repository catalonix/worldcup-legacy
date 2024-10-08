<?php
    include "/home/ec2-user/worldcup/include/db_connect.php";

    date_default_timezone_set('Asia/Seoul');

    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local,"set names utf8");

    $nowDate = date("Ymd");

    $is_file_exist = is_file('/var/www/golfon.io/worldcup/data13/C001/'.$nowDate.'_now.png');
    $is_file_exist2 = file_exists('/var/www/golfon.io/worldcup/data13/C001/'.$nowDate.'_predict.png');

    if($is_file_exist && $is_file_exist2) {
        $img1 = $nowDate.'_now.png';
        $img2 = $nowDate.'_predict.png';

        mysqli_query($connect_local, "REPLACE INTO FUTURE_IMG VALUES('C001','$nowDate','$img1','$img2')");
    }

    $is_file_exist = file_exists('/var/www/golfon.io/worldcup/data13/C002/'.$nowDate.'_now.png');
    $is_file_exist2 = file_exists('/var/www/golfon.io/worldcup/data13/C002/'.$nowDate.'_predict.png');

    if($is_file_exist && $is_file_exist2) {
        $img1 = $nowDate.'_now.png';
        $img2 = $nowDate.'_predict.png';

        mysqli_query($connect_local, "REPLACE INTO FUTURE_IMG VALUES('C002','$nowDate','$img1','$img2')");
    }

    $is_file_exist = file_exists('/var/www/golfon.io/worldcup/data13/C003/'.$nowDate.'_now.png');
    $is_file_exist2 = file_exists('/var/www/golfon.io/worldcup/data13/C003/'.$nowDate.'_predict.png');

    if($is_file_exist && $is_file_exist2) {
        $img1 = $nowDate.'_now.png';
        $img2 = $nowDate.'_predict.png';

        mysqli_query($connect_local, "REPLACE INTO FUTURE_IMG VALUES('C003','$nowDate','$img1','$img2')");
    }
?>