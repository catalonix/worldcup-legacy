<?
header("Content-Type: application/json");

include "../include/db_connect.php";

$connect_local = dbconn_local_mysql('ctlx');
mysqli_query($connect_local,"set names utf8");

mysqli_query($connect_local,"SET @rank=0, @prev_value=NULL");

$qry =  "SELECT * FROM (
            SELECT * FROM(
            SELECT
                LOG_NO,
                START_TIME,
                END_TIME,
                @rank := IF(@prev_value = PROGRAM_ID, @rank + 1, 1) AS RNK,
                @prev_value := PROGRAM_ID AS PROGRAM_ID
                FROM
                WATER_PROGRAM_LOG
                ORDER BY
                PROGRAM_ID, LOG_NO
            ) A WHERE RNK<4
        ) B
        JOIN
        (SELECT PROGRAM_ID,MAX(rnk) MAX_RNK FROM(
                SELECT
                LOG_NO,
                START_TIME,
                END_TIME,
                @rank := IF(@prev_value = PROGRAM_ID, @rank + 1, 1) AS RNK,
                @prev_value := PROGRAM_ID AS PROGRAM_ID
                FROM
                WATER_PROGRAM_LOG
                ORDER BY
                PROGRAM_ID, LOG_NO
            ) A WHERE RNK<4
            GROUP BY PROGRAM_ID
        ) C
        USING(PROGRAM_ID)";

$result = mysqli_query($connect_local,$qry);

$list = array();

while($row = mysqli_fetch_assoc($result)){
    array_push($list,$row);
}

dbclose_local_mysql($connect_local);

echo json_encode($list);
?>