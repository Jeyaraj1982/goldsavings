<?php include_once("config.php"); 
if (isset($_SESSION['User']['UserRole'])) {
     define("UserRole",$_SESSION['User']['UserRole']);
}
if ($_GET['action']!='profile/changepassword') {
    if ($_SESSION['User']['AllowToChangePasswordFirstLogin']=="1")     {
        echo "<script>location.href='dashboard.php?action=profile/changepassword';</script>";
        exit; 
    }                                     
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Bootstrap 5 Admin &amp; Dashboard Template">
	<meta name="author" content="Bootlab">
    <base href="https://appstack.bootlab.io" />
	<title>Gold Chit Management Software</title>
	<link rel="canonical" href="https://appstack.bootlab.io/dashboard-default.html" />
	<link rel="shortcut icon" href="img/favicon.ico">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
	<link class="js-stylesheet" href="css/light.css" rel="stylesheet">
	<style>
     /*
     .modal-footer{padding: 3px !important;background: #cfdbee !important;}
     .modal-header{background: #474779;padding: 6px 14px !important}
     .modal-header .modal-title{color:#fff !important;}
     .modal-header .btn-close{color:#fff !important;}
     */
     #btn-back-to-top {position: fixed;bottom: 20px;right: 20px;display: none;}
     
     #success_div {}
     #failure_div {}
        
     .error_msg {color:red;font-size:11px}
 
  /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 20px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 12px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {                                  
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
} 
    </style>
    <script>
    var URL = '<?php echo URL;?>';
    
    function successcontent(message) {
         return '<div style="margin:0px auto;color: #69a869;font-weight: bold;font-size: 18px;"><img src="'+URL+'assets/gif/success.gif" style="width:150px;margin:0px auto"><br><br>'+message+'<br><br><button type="button" onclick="closePopup()" class="btn btn-primary btn-sm">Continue</button></div>'
    }
    function success_content(message) {
         return '<div style="margin:0px auto;color: #69a869;font-weight: bold;font-size: 18px;"><img src="'+URL+'assets/gif/success.gif" style="width:150px;margin:0px auto"><br><br>'+message+'<br><br><button type="button" onclick="closePopup()" class="btn btn-primary btn-sm">Continue</button></div>'
    }
     function success_content(message,fun) {
         return '<div style="margin:0px auto;color: #69a869;font-weight: bold;font-size: 18px;"><img src="'+URL+'assets/gif/success.gif" style="width:150px;margin:0px auto"><br><br>'+message+'<br><br><button type="button" onclick="'+fun+'()" class="btn btn-primary btn-sm">Continue</button></div>'
    }
    function successcontent(message,link) {
         return '<div style="margin:0px auto;color: #69a869;font-weight: bold;font-size: 18px;"><img src="'+URL+'assets/gif/success.gif" style="width:150px;margin:0px auto"><br><br>'+message+'<br><br><a href="' + URL + link + '" class="btn btn-primary btn-sm">Continue</button></div>'
    }                             
    function errorcontent(message) {
         return '<div style="margin:0px auto;color: orange;font-weight: bold;font-size: 18px;"><img src="'+URL+'assets/warning.png" style="width:150px;margin:0px auto"><br><br>'+message+'<br><br><button type="button" onclick="closePopup()" class="btn btn-primary btn-sm">Continue</button></div>'
    }
    
    function openPopup() {
        var h = '<img src="'+URL+'assets/gif/spinner.gif" style="width:80px;margin:0px auto">Processing ...';
        $('#popupcontent').html(h);
        $('#process_popup').modal("show"); 
    }
    
    function closePopup(){
      $('#process_popup').modal('hide');  
    }
    
    function clearDiv(divs) {
        for(i=0;i<=divs.length;i++) {
            $('#Err'+divs[i]).html("");
        }
    }
    
    function printDate(d) {
        var formattedDate = new Date(d);
        var d = formattedDate.getDate();
        var m =  formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11
        var y = formattedDate.getFullYear();
        return d + "-" + m + "-" + y;
    }
    function printDateTime(d) {
        var formattedDate = new Date(d);
        var d = formattedDate.getDate();
        var m =  formattedDate.getMonth();
        m += 1;  // JavaScript months are 0-11
        var y = formattedDate.getFullYear();
        h=formattedDate.getHours();
        i=formattedDate.getMinutes();
        return d + "-" + m + "-" + y + " "+ h +":"+i;
    }
    </script>                                   
    
    <style>
.ath_container {width: 100%;}
#uploadStatus {color: #00e200;}
.ath_container a {text-decoration: none;color: #2f20d1;}
.ath_container a:hover {text-decoration: underline;}
.ath_container img {height: auto;max-width: 100%;vertical-align: middle;}
.ath_container .label {color: #565656;margin-bottom: 2px;}
.ath_container .message {padding: 6px 20px;font-size: 1em;color: rgb(40, 40, 40);box-sizing: border-box;margin: 0px;border-radius: 3px;width: 100%;overflow: auto;}
.ath_container .error {padding: 6px 20px;border-radius: 3px;background-color: #ffe7e7;border: 1px solid #e46b66;color: #dc0d24;}
.ath_container .success {background-color: #48e0a4;border: #40cc94 1px solid;border-radius: 3px;color: #105b3d;}
.ath_container .validation-message {color: #e20900;}
.ath_container .font-bold {font-weight: bold;}
.ath_container .display-none {display: none;}
.ath_container .inline-block {display: inline-block;}
.ath_container .float-right {float: right;}
.ath_container .float-left {float: left;}
.ath_container .text-center {text-align: center;}
.ath_container .text-left {text-align: left;}
.ath_container .text-right {text-align: right;}
.ath_container .full-width {width: 100%;}
.ath_container .cursor-pointer {cursor: pointer;}
.ath_container .mr-20 {margin-right: 20px;}
.ath_container .m-20 {margin: 20px;}
.ath_container table {border-collapse: collapse;border-spacing: 0;width: 100%;border: 1px solid #ddd;}
.ath_container table th, .ath_container table td {text-align: left;padding: 5px;border: 1px solid #ededed;width: 50%;}
/*tr:nth-child(even) {background-color: #f2f2f2}*/
.ath_container .progress {margin: 20px 0 0 0;width: 300px;border: 1px solid #ddd;padding: 5px;border-radius: 5px;}
.ath_container .progress-bar {width: 0%;height: 24px;background-color: #4CAF50;border-radius: 12px;text-align: center;color: #fff;}
@media all and (max-width: 780px) {
    .ath_container {width: auto;}
}
.ath_container input, .ath_container textarea, .ath_container select {box-sizing: border-box;width: 200px;height: initial;padding: 8px 5px;border: 1px solid #9a9a9a;border-radius: 4px;}
.ath_container input[type="checkbox"] {width: auto;vertical-align: text-bottom;}
.ath_container textarea {width: 300px;}
.ath_container select {display: initial;height: 30px;padding: 2px 5px;}
.ath_container button, .ath_container input[type=submit], .ath_container input[type=button] {padding: 8px 30px;font-size: 1em;cursor: pointer;border-radius: 25px;color: #ffffff;background-color: #6213d3;border-color: #9554f1 #9172bd #4907a9;}
.ath_container input[type=submit]:hover {background-color: #f7c027;}
::placeholder {color: #bdbfc4;}
.ath_container label {display: block;color: #565656;}
@media all and (max-width: 400px) {
    .ath_container {padding: 0px 20px;}
    .ath_container {width: auto;}
    .ath_container input,
    .ath_container textarea,
    .ath_container select {width: 100%;}
}
</style> 
 <style>
    .dropdown-menu .myheader {background: #efefef;padding: 5px;font-size: 12px;}
    .dropdown-menu .mycontainer {font-size: 11px;padding: 10px !important;}
  </style>
  
  <!-- multi-select-->
  <link href='<?php echo URL;?>assets/select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>
 
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
  .select2-container{z-index:10000}
  .ui-datepicker{z-index: 99999999 !important};
  </style>
  
  <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/blitzer/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  <link type="text/css" href="<?php echo WEB_URL;?>assets/jquery.ui.datepicker/jquery.ui.datepicker.monthyearpicker.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo WEB_URL;?>assets/jquery.ui.datepicker/jquery.ui.datepicker.monthyearpicker.js"></script>

<style>                                                
        #EntryDate, #FromDate, #ToDate, #PaymentDate, #Date, #DateOfBirth {
            background: url(<?php echo WEB_URL;?>assets/datepicker.png) no-repeat right;
            background-position-y: center;
            background-size: auto;
            background-origin: padding-box;
            width: 122px !important;
            background-size: 16px;
            background-position-y: center;
            background-origin: content-box;
        }
        .select2-selection--single {
            padding: 3px !important;
  height: 35px !important;
  border: 1px solid #ddd;
        }
        
        .ui-widget-header {
  border: 1px solid #7aacd9 !important;
  background: #3e6c95 !important;
        }
        .container {
        
  padding: 20px !important;
        }
</style>
</head>
 
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">
        <?php if ($_SESSION['User']['UserRole']=="admin") {?>
        <?php } else { ?>
        <!--
		<nav id="sidebar" class="sidebar">
			<?php //include_once("includes/".$_SESSION['User']['UserRole']."/leftmenu.php");?>
		</nav>
        -->
        <?php } ?>
		<div class="main">
            <?php
            $css= " style='padding:0px 10px !important' ";
            $css2= "";
                if (UserRole=="customerapp") {
                    $css = 'style="position: fixed;z-index: 1;"';
                    $css2 = 'style="margin-top:70px;"';
                }
            ?>
			<nav class="navbar navbar-expand navbar-light navbar-bg" <?php echo $css;?> >
				<a class="sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
                <ul class="navbar-nav">
				    <li class="nav-item px-2 dropdown" style="line-height: 14px;padding: 0px !important;">
					    <a class="nav-link" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="line-height:19px;">
                            <b style="font-size:21px !important">NANA</b> Jewellers<br>
                            <?php if (strlen(trim($_SESSION['User']['BranchName']))>0) { ?>
                            Branch: <?php echo $_SESSION['User']['BranchName']; ?>
                            <?php } ?>
                        </a>
					</li>
				</ul>
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-circle"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Ashley Briggs">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Ashley Briggs</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="Carl Jenkins">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Carl Jenkins</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Stacie Hall">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Stacie Hall</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Bertha Martin">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Bertha Martin</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="<?php echo URL;?>dashboard.php?action=messages/showall" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell-off"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">6h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.1</div>
												<div class="text-muted small mt-1">8h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Anna accepted your request.</div>
												<div class="text-muted small mt-1">12h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="<?php echo URL;?>dashboard.php?action=notifications/showall" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						 
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i class="align-middle" data-feather="settings"></i>
              </a>

							<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <!--<img src="img/avatars/avatar.jpg" class="avatar img-fluid rounded-circle me-1" alt="Chris Wood" />--> <span class="text-dark">
                
                <?php if ($_SESSION['User']['UserModule']=="branchuser") { ?>
                    <b>Branch User</b><br>
                    <?php echo $_SESSION['User']['UserName'];?>     
                <?php } elseif ($_SESSION['User']['UserModule']=="branchadmin") { ?>
                    <b>Branch Admin</b><br>
                    <span style="color:#888"><?php echo $_SESSION['User']['UserName'];?></span>
                <?php } elseif ($_SESSION['User']['UserModule']=="admin") { ?>
                    <b>Administrator</b><br>
                    <span style="color:#888"><?php echo $_SESSION['User']['AdministratorName'];?></span>
                <?php } elseif ($_SESSION['User']['UserModule']=="subadmin") { ?>
                    <b>Sub Admin</b><br>
                    <span style="color:#888"><?php echo $_SESSION['User']['UserName'];?></span>
                <?php } elseif (isset($_SESSION['User']['SalesmanID']) && $_SESSION['User']['SalesmanID']>0) { ?>
                    <b>Salesman</b><br>
                    <span style="color:#888"><?php echo $_SESSION['User']['SalesmanName'];?></span>
                <?php } elseif (isset($_SESSION['User']['DeveloperID']) && $_SESSION['User']['DeveloperID']>0) { ?>
                    <b>Developer Portal</b><br>
                    <span style="color:#888"><?php echo $_SESSION['User']['DeveloperName'];?></span>
                <?php } else {?>
                    <?php echo $_SESSION['User']['EmployeeName'];?> 
                    <?php echo $_SESSION['User']['UserRole'];?>
                <?php } ?>
                </span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
                                <?php
                                    if (isset($_SESSION['User']['DeveloperID']) && $_SESSION['User']['DeveloperID']>0) {
                                        
                                    } else {
                                ?>
								<a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=profile/profile"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<!--<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>-->
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=profile/changepassword">Change Password</a>
								<!--<a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=help/index">Help</a>-->
                                <a class="dropdown-item" href="<?php echo URL.substr($_SERVER['REQUEST_URI'],1,strlen($_SERVER['REQUEST_URI']));?>">Refresh</a>
                                <?php } ?>
								<a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=logout">Sign out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
              <div>
              <style>
             

          


    





.menu2 {
    background-color: #293042;
}
.menu2 ul {
    all: unset;
    list-style: none;
    display: flex;
    flex-wrap: wrap;
    background-color: #293042;
}
            
.menu2 ul li {
    position: relative;
    z-index: 100000;
    
}

.menu2 ul li a {
    display: block;
    font-size: 13px;
    color: rgb(204, 204, 204);
    text-align: left;
    padding: 8px 12px;
    text-decoration: none;
}

/* Style the submenus */
.menu2 ul li ul {
    position: absolute;
    display: none;
    flex-direction: column;
}

.menu2 ul ul li {
    width: max-content;
    min-width: 160px;
    max-width: 200px;
}

.menu2 ul a {
    all: unset;
    color: #fff;
    cursor: pointer;
    font-size: 13px;
    color: rgb(204, 204, 204);
    text-align: left;
    padding: 8px 12px;
    text-decoration: none;
}

.menu2 ul a:hover {
    background: rgba(0, 0, 0, 0.7);
}

.menu2 ul li:hover > ul {
    display: flex; /* Show submenus on hover */
}

.menu2 ul li ul li a {
       
    cursor: pointer;
    font-size: 12px;
    color: rgb(204, 204, 204);
    text-align: left;
    padding: 6px 12px;
    text-decoration: none;
}
.menu2 ul li ul li a:hover {
    cursor: pointer;
    font-size: 12px;
    text-align: left;
    padding: 6px 12px;
    text-decoration: none;
}
            /* Style the third-level submenu */
            .menu2 ul ul ul {
                top: 0;
                left: 100%;
            }
 
  .content{padding:20px !important}
</style>
            <?php 
                //if ($_SESSION['User']['UserRole']=="admin") {
                    include_once("includes/".$_SESSION['User']['UserRole']."/menu_horizontal.php");
                //} 
            ?>
			<main class="content" <?php echo $css2;?>>
				<?php 
                if (isset($_GET['action'])) {
                    include_once("includes/".UserRole."/".$_GET['action'].".php");
                } else {
                    include_once("includes/".UserRole."/dashboard.php");
                }
                ?>
                
			</main>
			<footer class="footer" style="position: fixed;width: 100%;bottom: 0;display:none">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="<?php echo URL;?>dashboard.php?actoin=support/index">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="<?php echo URL;?>dashboard.php?actoin=help/index">Help Center</a>
								</li>
							</ul>
						</div>
						<div class="col-6 text-end">
							<p class="mb-0">
								&copy; 2020 - 23 <a href="https://nexifysoftware.com/" class="text-muted">Nexify Software</a>
							</p>
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

<script src="<?php echo WEB_URL;?>assets/app.js"></script>
      
    
    <div class="modal" id="process_popup" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="popupcontent" style="text-align: center;padding:30px;">
        <img src="<?php echo URL;?>assets/gif/spinner.gif" style="width:80px;margin:0px auto">
        Processing ...
    </div>
  </div>
</div>
  <div class="modal" id="internet_failure" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
    <div class="modal-content" id="popupcontent" style="text-align: center;padding:30px;">
       Please check your internet connection
        
    </div>
    <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
            </div>
    </div>
  </div>
</div>
<button type="button" class="btn btn-danger btn-floating btn-lg" style="font-size: 10px; " id="btn-back-to-top">
                       <i class="fas fa-arrow-up" data-feather="arrow-up-circle"></i>
                   </button>
                   
<div class="modal fade" id="networkerrors" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form name="frm_errormsg" id="frm_errormsg">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      Unable to connect server,please check your network
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Ok</button>
      </div>
     </form> 
    </div>
  </div>
</div>

</body>
<script>
function networkunavailable(){
    $('#process_popup').modal('hide');
    $('#networkerrors').modal("show");  
}
function uploadFiles() {
    var fileInput = document.getElementById('DocumentFiles');
    var files = fileInput.files;

    for (var i = 0; i < files.length; i++) {
        var allowedExtensions = ['.jpg', '.jpeg', '.png', '.pdf', '.svg', '.zip', '.docx', '.xlsx'];
        var fileExtension = files[i].name.substring(files[i].name.lastIndexOf('.')).toLowerCase();

        if (allowedExtensions.includes(fileExtension)) {
            uploadFile(files[i]);
        } else {
            alert('Invalid file type: ' + fileExtension);
        }
    }
}

function getUniqueID() {
    var date = new Date;
    var seconds = date.getSeconds();
    var minutes = date.getMinutes();
    var hour = date.getHours();
    var year = date.getFullYear();
    var month = date.getMonth(); // beware: January = 0; February = 1, etc.
    var day = date.getDate();
    var dayOfWeek = date.getDay(); // Sunday = 0, Monday = 1, etc.
    var milliSeconds = date.getMilliseconds();
    return "file"+year+month+day+hour+minutes+seconds+milliSeconds;
}

function uploadFile(file) {
    var formData = new FormData();
    formData.append('file', file);

    var progressBarContainer = document.createElement('div'); // Container for progress bar and file name
    progressBarContainer.className = 'progress-container';

    var fileName = document.createElement('div'); // Display file name
    fileName.className = 'file-name';
    fileName.textContent = file.name;
    //progressBarContainer.appendChild(fileName);

    var progressBar = document.createElement('div'); // Create a new progress bar element
    progressBar.className = 'progress-bar';
    progressBar.id = 'progressBar_' + file.name;

    progressBarContainer.appendChild(progressBar);

    var progressBarsContainer = document.getElementById('progressBarsContainer');

    var newRow = document.createElement('tr'); // Create a new table row
    var newCell = document.createElement('td'); // Create a new table cell
    var newCell2 = document.createElement('td'); // Create a new table cell
    
    var input = document.createElement("input");
    input.setAttribute('type', 'hidden');
    input.setAttribute('name', 'files[]');
    var id= getUniqueID();
    input.setAttribute('id', id);
    input.setAttribute('value', "0");
    
    newCell.appendChild(fileName);
    newCell2.appendChild(progressBarContainer);
    newCell2.appendChild(input);
    newRow.appendChild(newCell);
    newRow.appendChild(newCell2);
    progressBarsContainer.appendChild(newRow);

    var xhr = new XMLHttpRequest();

    xhr.upload.addEventListener('progress', function(event) {
        if (event.lengthComputable) {
            var percent = Math.round((event.loaded / event.total) * 100);
            progressBar.style.width = percent + '%';
            progressBar.innerHTML = percent + '%';
        }
    });

    xhr.addEventListener('load', function(event) {
        //var uploadStatus = document.getElementById('uploadStatus');
        //uploadStatus.innerHTML = event.target.responseText;
        $('#'+id).val(event.target.responseText);
     // Reset the input field of type "file"
        //document.getElementById('fileUpload').value = '';
    });

    xhr.open('POST', '<?php echo WEB_URL;?>webservice.php?action=fileUpload', true);
    xhr.send(formData);
    //https://bootstrapfriendly.com/blog/uploading-multiple-files-with-progress-bar-via-ajax-and-php
}

let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

</script>                   
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.3/jquery.inputmask.bundle.min.js"></script>-->
<script src="<?php echo URL;?>assets/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/tableExport.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/html2canvas.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/jspdf/jspdf.js"></script>
<script type="text/javascript" src="<?php echo URL;?>assets/jspdf/libs/base64.js"></script>
<!--<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>-->

<script src='<?php echo URL;?>assets/select2/dist/js/select2.min.js' type='text/javascript'></script>
<script>
$(":input").inputmask();
</script>
<script>
if ($('#AreaNameCode').length){
    /*Alphanumeric without space*/
    $('#AreaNameCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#AreaNameCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}

if ($('#DistrictNameCode').length){
    /*Alphanumeric without space*/
    $('#DistrictNameCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#DistrictNameCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}

if ($('#StateNameCode').length){
    /*Alphanumeric without space*/
    $('#StateNameCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#StateNameCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}

if ($('#CustomerCode').length){
    /*Alphanumeric without space*/
    $('#CustomerCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#CustomerCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}

if ($('#ContractCode').length){
    /*Alphanumeric without space*/
    $('#ContractCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#ContractCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}

if ($('#ContractCode').length){
    /*Alphanumeric without space*/
    $('#ContractCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#ContractCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}

if ($('#ContactCode').length){
    /*Alphanumeric without space*/
    $('#ContactCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#ContactCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}if ($('#ContactCode').length){
    /*Alphanumeric without space*/
    $('#ContactCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#ContactCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#EventCode').length){
    /*Alphanumeric without space*/
    $('#EventCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#EventCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#CompanyCode').length){
    /*Alphanumeric without space*/
    $('#CompanyCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#CompanyCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#EmployeeCode').length){
    /*Alphanumeric without space*/
    $('#EmployeeCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#EmployeeCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#UserCode').length){
    /*Alphanumeric without space*/
    $('#UserCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#UserCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#SalesmanCode').length){
    /*Alphanumeric without space*/
    $('#SalesmanCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#SalesmanCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#BranchCode').length){
    /*Alphanumeric without space*/
    $('#BranchCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#BranchCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#CustomerTypeCode').length){
    /*Alphanumeric without space*/
    $('#CustomerTypeCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#CustomerTypeCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#DocumentTypeCode').length){
    /*Alphanumeric without space*/
    $('#DocumentTypeCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#DocumentTypeCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#EmployeeCategoryCode').length){
    /*Alphanumeric without space*/
    $('#EmployeeCategoryCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#EmployeeCategoryCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#ExtensionCode').length){
    /*Alphanumeric without space*/
    $('#ExtensionCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#ExtensionCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#PaymentBankCode').length){
    /*Alphanumeric without space*/
    $('#PaymentBankCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#PaymentBankCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#IFSCode').length){
    /*Alphanumeric without space*/
    $('#IFSCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#IFSCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#editIFSCode').length){
    /*Alphanumeric without space*/
    $('#editIFSCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editIFSCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#PaymentModeCode').length){
    /*Alphanumeric without space*/
    $('#PaymentModeCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#PaymentModeCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#RelationNameCode').length){
    /*Alphanumeric without space*/
    $('#RelationNameCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#RelationNameCode').on("cut copy paste",function(e){
        e.preventDefault();
    });  
    
}
if ($('#SchemeCode').length){
    /*Alphanumeric without space*/
    $('#SchemeCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#SchemeCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#UserRoleCode').length){
    /*Alphanumeric without space*/
    $('#UserRoleCode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#UserRoleCode').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#CustomerName').length){
/*Alphabets with space and dot  */
    $('#CustomerName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            // console.log(e.keyCode);
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,103,104,105,100,101,102,97,98,99,96,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,110,190,46]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    }); 
    $('#CustomerName').on("cut copy paste",function(e){
        e.preventDefault();
    }); 
}


if ($('#EmployeeName').length){
/*Alphabets with space and dot  */
    $('#EmployeeName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    }); 
    $('#EmployeeName').on("cut copy paste",function(e){
        e.preventDefault();
    }); 
} 
if ($('#SalesmanName').length){
/*Alphabets with space and dot  */
    $('#SalesmanName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#SalesmanName').on("cut copy paste",function(e){
        e.preventDefault();
    });  
}
 if ($('#UserName').length){
/*Alphabets with space and dot  */
    $('#UserName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#UserName').on("cut copy paste",function(e){
        e.preventDefault();
    });  
} 
 if ($('#ContactPersonName').length){
/*Alphabets with space and dot  */
    $('#ContactPersonName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#ContactPersonName').on("cut copy paste",function(e){
        e.preventDefault();
    });  
} 
if ($('#CompanyName').length){
/*Alphabets with space and dot  */
    $('#CompanyName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#CompanyName').on("cut copy paste",function(e){
        e.preventDefault();
    });  
} 
if ($('#EventTitle').length){
/*Alphabets with space and dot  */
    $('#EventTitle').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#EventTitle').on("cut copy paste",function(e){
        e.preventDefault();
    });  
} 
    
  if ($('#FatherName').length){   
    /*Alphabets with space and dot  */
    $('#FatherName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
     $('#FatherName').on("cut copy paste",function(e){
        e.preventDefault();
    });
  }  
  if ($('#LoginUserName').length){
    /*Alphanumeric without space*/
    $('#LoginUserName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#LoginUserName').on("cut copy paste",function(e){
        e.preventDefault();
    });
}

 if ($('#AreaName').length){
/* Alphabets with space*/
   $('#AreaName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#AreaName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
  if ($('#editAreaName').length){
/* Alphabets with space*/
   $('#editAreaName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editAreaName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 } 
 if ($('#BranchName').length){
/* Alphabets with space*/
   $('#BranchName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#BranchName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 } 
 if ($('#CustomerTypeName').length){
/* Alphabets with space*/
   $('#CustomerTypeName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#CustomerTypeName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#editCustomerTypeName').length){
/* Alphabets with space*/
   $('#editCustomerTypeName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editCustomerTypeName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 } 

  if ($('#DistrictName').length){
/* Alphabets with space*/
   $('#DistrictName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#DistrictName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 } 
 if ($('#editDistrictName').length){
/* Alphabets with space*/
   $('#editDistrictName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editDistrictName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#DocumentTypeName').length){
/* Alphabets with space*/
   $('#DocumentTypeName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#DocumentTypeName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 } 
 if ($('#editDocumentTypeName').length){
/* Alphabets with space*/
   $('#editDocumentTypeName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editDocumentTypeName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
  if ($('#EmployeeCategoryTitle').length){
/* Alphabets with space*/
   $('#EmployeeCategoryTitle').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#EmployeeCategoryTitle').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#editEmployeeCategoryTitle').length){
/* Alphabets with space*/
   $('#editEmployeeCategoryTitle').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editEmployeeCategoryTitle').on("cut copy paste",function(e){
        e.preventDefault();
    });
 } 
 if ($('#FileExtension').length){
/* Alphabets without space*/
   $('#FileExtension').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [32,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190]
            var allowedkeys  = [9,8,46,48,49,50,51,52,53,54,55,56,57,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,103,104,105,100,101,102,97,98,99,96,]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#FileExtension').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#editFileExtension').length){
/* Alphabets without space*/
   $('#editFileExtension').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [32,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190]
            var allowedkeys  = [9,8,46,48,49,50,51,52,53,54,55,56,57,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,103,104,105,100,101,102,97,98,99,96,]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editFileExtension').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#BankName').length){
/* Alphabets with space*/
   $('#BankName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#BankName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
  if ($('#editBankName').length){
/* Alphabets with space*/
   $('#editBankName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editBankName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
   if ($('#AccountHolderName').length){
/* Alphabets with space*/
   $('#AccountHolderName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#AccountHolderName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
   if ($('#editAccountHolderName').length){
/* Alphabets with space*/
   $('#editAccountHolderName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editAccountHolderName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#Branch').length){
/* Alphabets with space*/
   $('#Branch').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Branch').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#editBranch').length){
/* Alphabets with space*/
   $('#editBranch').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editBranch').on("cut copy paste",function(e){
        e.preventDefault();
    });
 } 
 if ($('#AccountNumber').length){
/* Numbers without space*/
   $('#AccountNumber').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#AccountNumber').on("cut copy paste",function(e){
        e.preventDefault();
    });
 } 
 if ($('#editAccountNumber').length){
/* Numbers without space*/
   $('#editAccountNumber').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editAccountNumber').on("cut copy paste",function(e){
        e.preventDefault();
    });
 } 
  if ($('#PaymentMode').length){
/* Alphabets with space*/
   $('#PaymentMode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#PaymentMode').on("cut copy paste",function(e){
        e.preventDefault();
    });
 } 
 if ($('#editPaymentMode').length){
/* Alphabets with space*/
   $('#editPaymentMode').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editPaymentMode').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#LinkedBank').length){
/* Alphabets with space*/
   $('#LinkedBank').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#LinkedBank').on("cut copy paste",function(e){
        e.preventDefault();
    });
 } 
 if ($('#NomineeName').length){
/* Alphabets with space*/
   $('#NomineeName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#RelationName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 
 if ($('#Age').length){
/* Numbers without space*/
   $('#Age').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Age').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
  
 if ($('#editLinkedBank').length){
/* Alphabets with space*/
   $('#editLinkedBank').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editLinkedBank').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#RelationName').length){
/* Alphabets with space*/
   $('#RelationName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#RelationName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#editRelationName').length){
/* Alphabets with space*/
   $('#editRelationName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editRelationName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#StateName').length){
/* Alphabets with space*/
   $('#StateName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#StateName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#editStateName').length){
/* Alphabets with space*/
   $('#editStateName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editStateName').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#UserRole').length){
/* Alphabets with space*/
   $('#UserRole').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#UserRole').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#Module').length){
/* Alphabets with space*/
   $('#Module').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,32,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46,103,104,105,100,101,102,97,98,99,96,110,190]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Module').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#Remarks').length){
/* Alphnumeric and special characters, not allow !\$"'~  */
 $('#Remarks').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            //console.log(e.keyCode);
            var notallowkeys = [220,222,49,52,192]
            var allowedkeys  = [9,8,46,32,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,103,104,105,100,101,102,97,98,99,96,48,49,50,51,52,53,54,55,56,57,173,61,110,190,191,221,219,111,106,109,107,59,188]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }  
        }
 
    });
    $('#Remarks').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#editRemarks').length){
/* Alphnumeric and special characters, not allow !\$"'~  */
 $('#editRemarks').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [220,222,49,52,192]
            var allowedkeys  = [9,8,46,32,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,103,104,105,100,101,102,97,98,99,96,48,49,50,51,52,53,54,55,56,57,173,61,110,190,191,221,219,111,106,109,107,59,188]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }  
        }
 
    });
    $('#editRemarks').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 
 if ($('#PaymentRemarks').length){
/* Alphnumeric and special characters, not allow !\$"'~  */
 $('#PaymentRemarks').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [220,222,49,52,192]
            var allowedkeys  = [9,8,46,32,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,103,104,105,100,101,102,97,98,99,96,48,49,50,51,52,53,54,55,56,57,173,61,110,190,191,221,219,111,106,109,107,59,188]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }  
        }
 
    });
    $('#PaymentRemarks').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 
 if ($('#LoginUserName').length){
    /*Alphanumeric with space*/
    $('#LoginUserName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#LoginUserName').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#AddressLine1').length){
    /*Alphanumeric with space and allow #\-. */
    $('#AddressLine1').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [48,49,50,52,53,54,55,56,57,188,190,191,59,220,221,222,219,61,192,173,106,107,46]
            var allowedkeys  = [32,51,173,111,109,191,190,110,96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12,188]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#AddressLine1').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#AddressLine2').length){
    /*Alphanumeric with space and allow #\-. */
    $('#AddressLine2').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [48,49,50,52,53,54,55,56,57,188,190,191,59,220,221,222,219,61,192,173,106,107,46]
            var allowedkeys  = [51,173,111,109,191,190,110,96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12,188]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#AddressLine2').on("cut copy paste",function(e){
        e.preventDefault();
    });
}

if ($('#LoginPassword').length){
/* Alphnumeric and special characters, not allow !\$"'~  */
 $('#LoginPassword').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [220,222,49,52,192]
            var allowedkeys  = [9,8,46,32,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,103,104,105,100,101,102,97,98,99,96,48,49,50,51,52,53,54,55,56,57,173,61,110,190,191,221,219,111,106,109,107,59,188]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }  
        }
 
    });
    $('#LoginPassword').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 
 if ($('#GSTIN').length){
    /*Alphanumeric without space*/
    $('#GSTIN').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#GSTIN').on("cut copy paste",function(e){
        e.preventDefault();
    });
}

 if ($('#ShortDescription').length){
/* Alphnumeric and special characters, not allow !\$"'~  */
 $('#ShortDescription').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [220,222,49,52,192]
            var allowedkeys  = [9,8,46,32,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,103,104,105,100,101,102,97,98,99,96,48,49,50,51,52,53,54,55,56,57,173,61,110,190,191,221,219,111,106,109,107,59,188]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }  
        }
 
    });
    $('#ShortDescription').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#DocumentTypeShortDescription').length){
/* Alphnumeric and special characters, not allow !\$"'~  */
 $('#DocumentTypeShortDescription').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [220,222,49,52,192]
            var allowedkeys  = [9,8,46,32,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,103,104,105,100,101,102,97,98,99,96,48,49,50,51,52,53,54,55,56,57,173,61,110,190,191,221,219,111,106,109,107,59,188]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }  
        }
 
    });
    $('#DocumentTypeShortDescription').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#editDocumentTypeShortDescription').length){
/* Alphnumeric and special characters, not allow !\$"'~  */
 $('#editDocumentTypeShortDescription').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [220,222,49,52,192]
            var allowedkeys  = [9,8,46,32,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,103,104,105,100,101,102,97,98,99,96,48,49,50,51,52,53,54,55,56,57,173,61,110,190,191,221,219,111,106,109,107,59,188]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }  
        }
 
    });
    $('#editDocumentTypeShortDescription').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 
 if ($('#MinDueAmount').length){
/* Numbers without space*/
   $('#MinDueAmount').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#MinDueAmount').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#MaxDueAmount').length){
/* Numbers without space*/
   $('#MaxDueAmount').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#MaxDueAmount').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#MinDuration').length){
/* Numbers without space*/
   $('#MinDuration').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#MinDuration').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#MaxDuration').length){
/* Numbers without space*/
   $('#MaxDuration').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#MaxDuration').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#WastageDiscount').length){
/* Numbers without space*/
   $('#WastageDiscount').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            //console.log(e.keyCode);
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#WastageDiscount').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#MakingChargeDiscount').length){
/* Numbers without space*/
   $('#MakingChargeDiscount').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#MakingChargeDiscount').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#Benefits').length){
/* Alphnumeric and special characters, not allow !\$"'~  */
 $('#Benefits').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [220,222,49,52,192]
            var allowedkeys  = [9,8,46,32,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,103,104,105,100,101,102,97,98,99,96,48,49,50,51,52,53,54,55,56,57,173,61,110,190,191,221,219,111,106,109,107,59,188]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }  
        }
 
    });
    $('#Benefits').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#TermsOfConditions').length){
/* Alphnumeric and special characters, not allow !\$"'~  */
 $('#TermsOfConditions').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            //console.log(e.keyCode);
            var notallowkeys = [220,222,49,52,192]
            var allowedkeys  = [9,8,46,32,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,103,104,105,100,101,102,97,98,99,96,48,49,50,51,52,53,54,55,56,57,173,61,110,190,191,221,219,111,106,109,107,59,188]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }  
        }
 
    });
    $('#TermsOfConditions').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#BusinessName').length){
/*Alphabets with space and dot  */
    $('#BusinessName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            // console.log(e.keyCode);
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,103,104,105,100,101,102,97,98,99,96,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107]
            var allowedkeys  = [9,8,32,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,110,190,46]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    }); 
    $('#BusinessName').on("cut copy paste",function(e){
        e.preventDefault();
    }); 
}
 
if ($('#CompanyName').length){
    /*Alphanumeric without space*/
    $('#CompanyName').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#CompanyName').on("cut copy paste",function(e){
        e.preventDefault();
    });
}
if ($('#BankReferenceNumber').length){
/* Numbers without space*/
   $('#BankReferenceNumber').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            //console.log(e.keyCode);
            var notallowkeys = [32,48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96,,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#BankReferenceNumber').on("cut copy paste",function(e){
        e.preventDefault();
    });
 } 
 
 if ($('#Gold18').length){
/* Numbers without space only allow dot */
   $('#Gold18').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Gold18').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#editGold18').length){
/* Numbers without space only allow dot */
   $('#editGold18').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editGold18').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#Gold22').length){
/* Numbers without space only allow dot */
   $('#Gold22').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Gold22').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#editGold22').length){
/* Numbers without space only allow dot */
   $('#editGold22').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editGold22').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#Gold24').length){
/* Numbers without space only allow dot */
   $('#Gold24').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Gold24').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
  if ($('#editGold24').length){
/* Numbers without space only allow dot */
   $('#editGold24').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#editGold24').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#Silver').length){
/* Numbers without space only allow dot */
   $('#Silver').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Silver').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
  if ($('#Silver').length){
/* Numbers without space only allow dot */
   $('#Silver').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            console.log(e.keyCode);
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96,110,190]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Silver').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 
if ($('#EntryDate').length){
    
    $('#EntryDate').datepicker({
        dateFormat: "dd-mm-yy",
        minDate:new Date(2023,0,1),
        maxDate:new Date(<?php echo date("Y");?>,<?php echo date("m")-1;?>,<?php echo date("d");?>) 
        
    });
}
if ($('#FromDate').length){                             
    
    $('#FromDate').datepicker({
        dateFormat: "dd-mm-yy",                 
        minDate:new Date(2023,0,1),
        maxDate:new Date(<?php echo date("Y");?>,<?php echo date("m")-1;?>,<?php echo date("d");?>) 
        
    });
    
    $('#FromDate').on("change",function(){
          var seldate=$(this).val();
          //alert(seldate);
          if ($('#ToDate').length){
            $('#ToDate').datepicker("destroy") ;
            $('#ToDate').datepicker({
                dateFormat: "dd-mm-yy",
                minDate:($(this).val()),
                maxDate:new Date(<?php echo date("Y");?>,<?php echo date("m")-1;?>,<?php echo date("d");?>) 
                
            });
        
}
    });

}
if ($('#ToDate').length){
    
    /*$('#ToDate').datepicker({
        dateFormat: "dd-mm-yy",
        minDate:new Date(2023,0,1),
        maxDate:new Date(<?php echo date("Y");?>,<?php echo date("m")-1;?>,<?php echo date("d");?>) 
        
    }); */
        
}                                        
if ($('#PaymentDate').length){
    
    $('#PaymentDate').datepicker({
        dateFormat: "dd-mm-yy",
        minDate:new Date(<?php echo date("Y");?>,<?php echo date("m")-1;?>,<?php echo date("d-5");?>),
        maxDate:new Date(<?php echo date("Y");?>,<?php echo date("m")-1;?>,<?php echo date("d");?>) 
        
    });
}
if ($('#PreCloseDate').length){
    
    $('#PreCloseDate').datepicker({
        dateFormat: "dd-mm-yy",
        minDate:new Date(<?php echo date("Y");?>,<?php echo date("m")-1;?>,<?php echo date("d-5");?>),
        maxDate:new Date(<?php echo date("Y");?>,<?php echo date("m")-1;?>,<?php echo date("d");?>) 
        
    });
}
if ($('#Date').length){             
    
    $('#Date').datepicker({
        dateFormat: "dd-mm-yy",
        minDate:new Date(2023,0,1),
        maxDate:new Date(<?php echo date("Y");?>,<?php echo date("m")-1;?>,<?php echo date("d");?>) 
        
    });
}

if ($('#DateOfBirth').length){
    
    $('#DateOfBirth').datepicker({
        dateFormat: "dd-mm-yy",
        minDate:new Date(1950,0,1),
        maxDate:new Date(<?php echo date("Y")-18;?>,<?php echo date("m");?>,<?php echo date("d");?>) 
        
    });
}

if ($('#PancardNumber').length){
$('#PancardNumber').on("cut copy paste",function(e){
        e.preventDefault();
    });
}

if ($('#AadhaarCardNumber').length){
$('#AadhaarCardNumber').on("cut copy paste",function(e){
        e.preventDefault();
    });
}

if ($('#TransactionID').length){
    /*Alphanumeric without space*/
    $('#TransactionID').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,188,190,191,59,220,221,222,219,173,61,192,111,106,109,107,46]
            var allowedkeys  = [96,97,98,99,100,101,102,103,104,105,9,8,16,46,35,36,37,38,39,40,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,48,49,50,51,52,53,54,55,56,57,33,34,35,36,37,38,39,40,45,12]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#TransactionID').on("cut copy paste",function(e){
        e.preventDefault();
    });
}

if ($('#Amount').length){
/* Numbers without space*/
   $('#Amount').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Amount').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 
 if ($('#Quantity500').length){
/* Numbers without space*/
   $('#Quantity500').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Quantity500').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#Quantity200').length){
/* Numbers without space*/
   $('#Quantity200').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Quantity200').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#Quantity100').length){
/* Numbers without space*/
   $('#Quantity100').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Quantity100').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#Quantity50').length){
/* Numbers without space*/
   $('#Quantity50').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Quantity50').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#Quantity20').length){
/* Numbers without space*/
   $('#Quantity20').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Quantity20').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#Quantity10').length){
/* Numbers without space*/
   $('#Quantity10').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Quantity10').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }
 if ($('#Quantity5').length){
/* Numbers without space*/
   $('#Quantity5').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#Quantity5').on("cut copy paste",function(e){
        e.preventDefault();
    });
 } 
 if ($('#QuantityCoins').length){
/* Numbers without space*/
   $('#QuantityCoins').keydown(function (e) {
        if (e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var notallowkeys = [48,49,50,51,52,53,54,55,56,57,16,188,190,191,59,222,220,219,221,173,61,192,111,106,109,107,46,110,190,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90]
            var allowedkeys  = [9,8,46,35,36,37,38,39,40,48,49,50,51,52,53,54,55,56,57,103,104,105,100,101,102,97,98,99,96]
            if (e.shiftKey) {
                if (notallowkeys.includes(e.keyCode)) {
                    e.preventDefault();
                }
            } else {
                if (!(allowedkeys.includes(e.keyCode))) {
                    e.preventDefault();
                }
            }
        }
    });
    $('#QuantityCoins').on("cut copy paste",function(e){
        e.preventDefault();
    });
 }


</script>
</html>