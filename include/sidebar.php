<?date_default_timezone_set('Asia/Seoul');?>
<?php
session_start();
if (empty($_SESSION["userId"])) {
    header("Location:./signin.html");
}
?>
<div class="main-sidebar main-sidebar-sticky side-menu">
	<div class="sidemenu-logo">
		<a class="main-logo text-white font-weight-bold" href="monitoring.html" style="line-height: 24px;font-size: 21px">
            <!--<img src="../assets/img/logo.png" class="header-brand-img desktop-logo" alt="logo">-->
            <img src="../assets/img/logo-icon.png" class="header-brand-img icon-logo" alt="logo" height="24px" style="display: inline-block">
            서울월드컵경기장
		</a>
	</div>
	<div class="main-sidebar-body">
		<ul class="nav">
			<li class="nav-item">
                <a class="nav-link" href="monitoring.html">
                    <span class="shape1"></span> <span class="shape2"></span>
                    <i class="fe fe-grid sidemenu-icon"></i>
                    <span class="sidemenu-label">통합모니터링 요약(그라운드)</span>
			    </a>
            </li>
            <!--
			<li class="nav-item"><a class="nav-link" href="monitoring-equipment.html"> <span class="shape1"></span> <span class="shape2"></span> <i
					class="fe fe-database sidemenu-icon"></i> <span class="sidemenu-label">잔디생육환경 데이터</span>
			</a></li>

            <li class="nav-item">
                    <a class="nav-link" href="ndvi-summary.html">
                    <span class="shape1"></span> <span class="shape2"></span>
                    <i class="fe fe-camera sidemenu-icon"></i>식생지수정보 상세</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="soil-summary.html">
                    <span class="shape1"></span> <span class="shape2"></span>
                    <i class="fe fe-database sidemenu-icon"></i>토양관측정보 상세</a></li>
            <li class="nav-item"><a class="nav-link" href="weather-summary.html">
                    <span class="shape1"></span> <span class="shape2"></span>
                    <i class="fe fe-sun sidemenu-icon"></i>기상센서정보 상세</a></li>
            -->

            <li class="nav-item show">
                <a class="nav-link with-sub" href="#">
                    <span class="shape1"></span>
                    <span class="shape2"></span>
                    <i class="ti-file sidemenu-icon"></i>
                    <span class="sidemenu-label" onclick="location.href='monitoring-equipment.html'">잔디생육환경 데이터</span>
                    <i class="angle fe fe-chevron-right sidemenu-label" style="display: none"></i>
                </a>
                <ul class="nav-sub">
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="ndvi-summary.html">식생지수정보</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="ndvi-detail.html">식생지수정보 상세</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="soil-summary.html">토양관측정보</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="soil-detail.html">토양관측정보 상세</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="weather-summary.html">기상센서정보</a>
                    </li>
                    <li class="nav-sub-item">
                        <a class="nav-sub-link" href="weather-detail.html">기상센서정보 상세</a>
                    </li>
                </ul>
            </li>

			<li class="nav-item"><a class="nav-link" href="observation.html"> <span class="shape1"></span> <span class="shape2"></span> <i
					class="ti-stats-up sidemenu-icon"></i> <span class="sidemenu-label">관측상세 정보</span>
			</a></li>
			<li class="nav-item"><a class="nav-link" href="remote-operation.html"> <span class="shape1"></span> <span class="shape2"></span> <i
					class="ti-layers sidemenu-icon"></i> <span class="sidemenu-label">원격작동 정보</span>
			</a></li>
            <!--
			<li class="nav-item"><a class="nav-link" href="work-history.html"> <span class="shape1"></span> <span class="shape2"></span> <i
					class="fe fe-list sidemenu-icon"></i> <span class="sidemenu-label">작업내역 목록</span>
			</a></li>-->
			<li class="nav-item"><a class="nav-link" href="user-management.html"> <span class="shape1"></span> <span class="shape2"></span> <i
					class="ti-user sidemenu-icon"></i> <span class="sidemenu-label">사용자관리</span>
			</a></li>
		</ul>
		<div class="date-box">
			<div class="date-box-icon mr-1">
				<i class="mdi mdi-alarm"></i>
			</div>
			<div class="date-info ml-2">
				<h5 class="m-0 text-white"><?=date("Y");?>년 <?=date("m");?>월 <?=date("d");?>일</h5>
				<span class="text-light"><?=date("H:i");?></span>
			</div>
		</div>
		<div>
			<a href="calendar.html" class="sub-link-box link-bg-1">
				<div class="sub-link-box-icon mr-1">
					<i class="ti-calendar"></i>
				</div>
				<div class="sub-link-title ml-2">
					<h5 class="m-0 text-white">작업정보 캘린더</h5>
				</div>
			</a>
		</div>
	</div>
</div>