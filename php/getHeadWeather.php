<?
    header("Content-Type: application/json");

    include "../include/db_connect.php";

    $connect_local = dbconn_local_mysql('ctlx');
    mysqli_query($connect_local,"set names utf8");

    $qry = "SELECT   ROUND(AVG(TEMP),1) AS TEMP,
                     ROUND(AVG(HUMI),1) AS HUMI,
                     ROUND(AVG(WS),1) AS WS,
                     ROUND(AVG(PM10),1) AS PM10,
                     ROUND(AVG(PM25),1) AS PM25,
                     ROUND(AVG(LIGHT),1) AS LIGHT,
                     ROUND(AVG(CO2),1) AS CO2,
                (
                CASE 
                    WHEN AVG(COS(RADIANS(wd))) = 0 
                        THEN 0
                    ELSE DEGREES(ATAN2(AVG(SIN(RADIANS(wd))), AVG(COS(RADIANS(wd)))))
                END 
                + 360) % 360 AS WD  
            FROM WEATHER_SENSOR W
            JOIN (SELECT SENSOR_CODE,MAX(TM) TM FROM WEATHER_SENSOR WHERE SENSOR_CODE LIKE '%W00%' GROUP BY SENSOR_CODE) M
            USING(SENSOR_CODE,TM)
            WHERE TEMP<200";

    $result = mysqli_query($connect_local,$qry);

    $row = mysqli_fetch_assoc($result);

    dbclose_local_mysql($connect_local);

    echo json_encode($row);
?>