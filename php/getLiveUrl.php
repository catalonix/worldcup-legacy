<?php
	header("Content-Type: application/json");
	
	$type = $_GET["type"];
	
	$target = "";
	
	if($type=="남"){
		$target = "input_text.worldcup_south_rgb_url";
	}else if($type=="동"){
		$target = "input_text.worldcup_east_rgb_url";
	}else{
		$target = "input_text.worldcup_west_rgb_url";
	}
	
	$ch = curl_init();
		
	// Set cURL options
	curl_setopt($ch, CURLOPT_URL, 'https://seoul-api.fieldon.io/api/states/'.$target);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	
	$headers = array();
	$headers[] = 'Accept: */*';
	$headers[] = 'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiIzYjhiYWY3NmFjYjE0ZjM1YTgwYmU4YTZjODRjNDI2YiIsImlhdCI6MTY3MDU3OTQwMCwiZXhwIjoxOTg1OTM5NDAwfQ.OuC-DCFJ4pXOPap_zh2j0zVGqC04X9TEQTnRPzsu1uQ';
	$headers[] = 'Content-Type: application/json';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	
	//$data = json_encode(array('entity_id' => 'input_text.worldcup_south_rgb_url'));
	//curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	
	// Execute cURL session and get the response
	$response = curl_exec($ch);

	
	curl_close($ch);
	
	// Print the response (optional)
	echo $response;

?>