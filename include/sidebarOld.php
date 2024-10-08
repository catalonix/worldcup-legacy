<?date_default_timezone_set('Asia/Seoul');?>
<?php 
    session_start();
    if(empty($_SESSION["userId"])){
        header("Location:./signin.html");
    }
?>
<div class="main-sidebar main-sidebar-sticky side-menu">
	<div class="sidemenu-logo">
		<a class="main-logo" href="monitoring.html"> <img src="../assets/img/logo.png" class="header-brand-img desktop-logo" alt="logo"> <img src="../assets/img/logo-icon.png" class="header-brand-img icon-logo" alt="logo" height="28px">
		</a>
	</div>
	<div class="main-sidebar-body">
		<ul class="nav">
			<li class="nav-item"><a class="nav-link" href="monitoring.html"> <span class="shape1"></span> <span class="shape2"></span> <i class="fe fe-grid sidemenu-icon"></i> <span class="sidemenu-label">통합모니터링 요약(그라운드)</span>
			</a></li>
			<li class="nav-item"><a class="nav-link" href="monitoring-equipment.html"> <span class="shape1"></span> <span class="shape2"></span> <i class="fe fe-database sidemenu-icon"></i> <span class="sidemenu-label">통합모니터링 요약(장비)</span>
			</a></li>
			<li class="nav-item"><a class="nav-link" href="summary.html"> <span class="shape1"></span> <span class="shape2"></span> <i class="ti-file sidemenu-icon"></i> <span class="sidemenu-label">요약분석 정보</span>
			</a></li>
			<li class="nav-item"><a class="nav-link" href="observation.html"> <span class="shape1"></span> <span class="shape2"></span> <i class="ti-stats-up sidemenu-icon"></i> <span class="sidemenu-label">관측상세 정보</span>
			</a></li>
			<li class="nav-item"><a class="nav-link" href="remote-operation.html"> <span class="shape1"></span> <span class="shape2"></span> <i class="ti-layers sidemenu-icon"></i> <span class="sidemenu-label">원격작동 정보</span>
			</a></li>
			<li class="nav-item"><a class="nav-link" href="work-history.html"> <span class="shape1"></span> <span class="shape2"></span> <i class="fe fe-list sidemenu-icon"></i> <span class="sidemenu-label">작업내역 목록</span>
			</a></li>
			<li class="nav-item"><a class="nav-link" href="user-management.html"> <span class="shape1"></span> <span class="shape2"></span> <i class="ti-user sidemenu-icon"></i> <span class="sidemenu-label">사용자관리</span>
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