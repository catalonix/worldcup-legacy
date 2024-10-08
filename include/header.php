<script src="../assets/plugins/jquery/jquery.min.js"></script>
<div class="main-header side-header sticky sticky-pin" style="margin-bottom: -64px;">
	<div class="container-fluid">
		<div class="main-header-left">
			<a class="main-header-menu-icon" href="#" id="mainSidebarToggle"><span></span></a>
			<button class="navbar-toggler navresponsive-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fe fe-more-vertical header-icons navbar-toggler-icon"></i>
			</button>
		</div>
		<div class="main-header-center">
			<div class="responsive-logo text-white font-weight-bold" style="line-height: 21px;font-size: 19px;">
				<!--<a href="monitoring.html"><img src="../assets/img/logo.png" class="mobile-logo" alt="logo"></a>-->
				<img src="../assets/img/logo-icon.png" class="header-brand-img icon-logo" alt="logo" height="24px" style="display: inline-block">
            	서울월드컵경기장
			</div>
		</div>
		<div class="main-header-right">
			<div class="pm-info">
				<div class="pm-situation">
					<h5>미세먼지</h5>
					<span class="pm-good" id="headPm10">좋음</span>
					
				</div>
				<div class="pm-situation">
					<h5>초미세먼지</h5>
					<span class="pm-bad" id="headPm25">나쁨</span>
				</div>
			</div>
			<div class="climate-box">
				<div class="climate-temperatures">
					<i class="wi wi-thermometer"></i>
					<h5 class="mb-0">
						기온 : <span id="headTemp">2ºC</span>
					</h5>
				</div>
				<div class="climate-precipitation">
					<i class="wi wi-rain"></i>
					<h5 class="mb-0">
						강수량 : <span id="headRain">0mm</span>
					</h5>
				</div>
				<div class="climate-humidity">
					<i class="wi wi-humidity"></i>
					<h5 class="mb-0">
						습도 : <span id="headHumi">2%</span>
					</h5>
				</div>
				<div class="climate-wind">
					<i class="wi wi-strong-wind"></i>
					<h5 class="mb-0">
						풍속 : <span id="headWs">0.2m/s</span>
					</h5>
					<span id="headWd">북북서</span>
				</div>
			</div>
			<div class="dropdown main-profile-menu">
				<a class="d-flex" href=""> <span class="main-img-user"><img alt="avatar" src="../assets/img/users/1.jpg"></span> <span class="main-user-text"><?=$_SESSION["userId"]?></span>
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="../php/logout.php"> <i class="fe fe-power"></i> 로그아웃
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="mobile-main-header">
	<div class="mb-1 navbar navbar-expand-lg  nav nav-item  navbar-nav-right responsive-navbar navbar-dark">
		<div class="navbar-collapse collapse" id="navbarSupportedContent-4">
			<div class="order-lg-2 ml-auto mobile-weather-info">
				<div class="pm-info dropdown mt-3 mb-3">
					<div class="pm-situation">
						<h5>미세먼지</h5>
						<span class="pm-good" id="mobilePm10">좋음</span>
					</div>
					<div class="pm-situation">
						<h5>초미세먼지</h5>
						<span class="pm-bad" id="mobilePm25">나쁨</span>
					</div>
				</div>
				<div class="climate-box dropdown">
					<div class="climate-temperatures">
						<i class="wi wi-thermometer"></i>
						<h5 class="mb-0">기온 : <span id="mobileTemp">2ºC</span></h5>
					</div>
					<div class="climate-precipitation">
						<i class="wi wi-rain"></i>
						<h5 class="mb-0">강수량 : <span id="mobileRain">1mm</span></h5>
					</div>
					<div class="climate-humidity">
						<i class="wi wi-humidity"></i>
						<h5 class="mb-0">습도 : <span id="mobileHumi">2%</span></h5>
					</div>
					<div class="climate-wind">
						<i class="wi wi-strong-wind"></i>
						<h5 class="mb-0">풍속 : <span id="mobileWs">0.2m/s</span></h5>
						<span id="mobileWd">북북서</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(function(){

	function Chg_wdirk($wdir){
		//16방
		$wdirk = "";
		
		$wdir = $wdir*1;
		
		if (0 <= $wdir && $wdir <= 11.25){
			$wdirk = "북";
		}else if (11.25 < $wdir && $wdir <= 33.75){
			$wdirk = "북북동";
		}else if (33.75 < $wdir && $wdir <= 56.25){ 
			$wdirk = "북동";
		}else if (56.25 < $wdir && $wdir <= 78.75){ 
			$wdirk = "동북동";
		}else if (78.75 < $wdir && $wdir <= 101.25){ 
			$wdirk = "동";
		}else if (101.25 < $wdir && $wdir <= 123.75){ 
			$wdirk = "동남동";
		}else if (123.75 < $wdir && $wdir <= 146.25){ 
			$wdirk = "남동";
		}else if (146.25 < $wdir && $wdir <= 168.75){ 
			$wdirk = "남남동";
		}else if (168.75 < $wdir && $wdir <= 191.25){ 
			$wdirk = "남";
		}else if (191.25 < $wdir && $wdir <= 213.75){ 
			$wdirk = "남남서";
		}else if (213.75 < $wdir && $wdir <= 236.25){ 
			$wdirk = "남서";
		}else if (236.25 < $wdir && $wdir <= 258.75){ 
			$wdirk = "서남서";
		}else if (258.75 < $wdir && $wdir <= 281.25){ 
			$wdirk = "서";
		}else if (281.25 < $wdir && $wdir <= 303.75){ 
			$wdirk = "서북서";
		}else if (303.75 < $wdir && $wdir <= 326.25){ 
			$wdirk = "북서";
		}else if (326.25 < $wdir && $wdir <= 348.75){ 
			$wdirk = "북북서";
		}else if (348.75 < $wdir){ 
			$wdirk = "북";
		}else{
			$wdirk = '-';
		}

		return $wdirk;

	}

	function getPm10Grade(value,id){

		value = value*1
		
		if(value<=30){
			$(id).text("좋음");
			$(id).attr('class','pm-good')
		}else if(value<=80){
			$(id).text("보통");
			$(id).attr('class','pm-usually')
		}else if(value<=150){
			$(id).text("나쁨");
			$(id).attr('class','pm-bad')
		}else{
			$(id).text("매우나쁨");
			$(id).attr('class','pm-very-bad')
		}
	}

	function getPm25Grade(value,id){

		value = value*1
		
		if(value<=15){
			$(id).text("좋음");
			$(id).attr('class','pm-good')
		}else if(value<=35){
			$(id).text("보통");
			$(id).attr('class','pm-usually')
		}else if(value<=75){
			$(id).text("나쁨");
			$(id).attr('class','pm-bad')
		}else{
			$(id).text("매우나쁨");
			$(id).attr('class','pm-very-bad')
		}
	}

	/*
	$.ajax({
		url : "../php/getCurrentWeather.php",
		success : function(result){
			console.log(result);
			$('#headTemp').text(result.TEMP+'ºC')
			$('#headHumi').text(result.HUMI+'%')
			$('#headWs').text(result.WS+'m/s')
			$('#headWd').text(Chg_wdirk(result.WD))
			
			$('#mobileTemp').text(result.TEMP+'ºC')
			$('#mobileHumi').text(result.HUMI+'%')
			$('#mobileWs').text(result.WS+'m/s')
			$('#mobileWd').text(Chg_wdirk(result.WD))

			getPm10Grade(result.PM10,'#headPm10')
			getPm25Grade(result.PM25,'#headPm25')

			getPm10Grade(result.PM10,'#mobilePm10')
			getPm25Grade(result.PM25,'#mobilePm25')
			
		}
	})*/

	$.ajax({
		url : "https://hosting.apeak.co.kr/API/worldcup.php",
		success : function(result){
			console.log(result)
			var weather = result[0];
			var air = result[1];

            /*$('#headHumi').text(weather.humi+'%');
            $('#headTemp').text(weather.temp+'ºC');
            $('#headWs').text(weather.wspeed+'m/s');
            $('#headWd').text(weather.wdirk);*/
            $('#headRain').text(weather.rain+"mm");

            /*$('#mobileHumi').text(weather.humi+'%');
            $('#mobileTemp').text(weather.temp+'ºC');
            $('#mobileWs').text(weather.wspeed+'m/s');
            $('#mobileWd').text(weather.wdirk);*/
            $('#mobileRain').text(weather.rain+"mm");
            /*
            getPm10Grade(air.pm10_value,'#headPm10')
            getPm25Grade(air.pm25_value,'#headPm25')

            getPm10Grade(air.pm10_value,'#mobilePm10')
            getPm25Grade(air.pm25_value,'#mobilePm25')
             */
		}
	})

    $.ajax({
        url : "../php/getHeadWeather.php",
        success : function(result){
            console.log(result)

            $('#headHumi').text(result.HUMI+'%');
            $('#headTemp').text(result.TEMP+'ºC');
            $('#headWs').text(result.WS+'m/s');
            $('#headWd').text(Chg_wdirk(result.WD));

            $('#mobileHumi').text(result.HUMI+'%');
            $('#mobileTemp').text(result.TEMP+'ºC');
            $('#mobileWs').text(result.WS+'m/s');
            $('#mobileWd').text(Chg_wdirk(result.WD));

            getPm10Grade(result.PM10,'#headPm10')
            getPm25Grade(result.PM25,'#headPm25')

            getPm10Grade(result.PM10,'#mobilePm10')
            getPm25Grade(result.PM25,'#mobilePm25')
        }
    })
})
</script>