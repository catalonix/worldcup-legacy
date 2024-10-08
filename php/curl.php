<?
	error_reporting( E_ALL );
	ini_set( "display_errors", 1 );

	$url = $_POST["url"];
	$auth = $_POST["auth"];
	
	$headers = array(
		"Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiIzYjhiYWY3NmFjYjE0ZjM1YTgwYmU4YTZjODRjNDI2YiIsImlhdCI6MTY3MDU3OTQwMCwiZXhwIjoxOTg1OTM5NDAwfQ.OuC-DCFJ4pXOPap_zh2j0zVGqC04X9TEQTnRPzsu1uQ"
	);
	
	$ch = curl_init();                                 //curl 초기화
	curl_setopt($ch, CURLOPT_URL, $url);               //URL 지정하기
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    //요청 결과를 문자열로 반환
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);      //connection timeout 10초
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);   //원격 서버의 인증서가 유효한지 검사 안함
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
	$response = curl_exec($ch);
	curl_close($ch);
	
	echo $response;
?>