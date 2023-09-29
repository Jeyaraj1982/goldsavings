<?php include_once("config.php"); ?>
<?php


if (isset($_SESSION['User']['UserRole'])) {
     define("UserRole",$_SESSION['User']['UserRole']);
}
if ($_GET['action']!='profile/changepassword') {
    if ($_SESSION['User']['AllowToChangePasswordFirstLogin']=="1")     {
        echo "<script>location.href='dashboard.php?action=profile/changepassword';</script>";
        exit; 
    }                                     
}
define("URL","https://goldsavings.nexifysoftware.in/");
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
	<title>Auditor Office Manangement</title>

	<link rel="canonical" href="https://appstack.bootlab.io/dashboard-default.html" />
	<link rel="shortcut icon" href="img/favicon.ico">

	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">

	 
	 
	 

	 
	 
	<link class="js-stylesheet" href="css/light.css" rel="stylesheet">
	 
	 
    <style>
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
</head>
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
	<div class="wrapper">
		<nav id="sidebar" class="sidebar">
			<?php include_once("includes/".$_SESSION['User']['UserRole']."/leftmenu.php");?>
		</nav>
		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>
             <!--
				<form class="d-none d-sm-inline-block">
					<div class="input-group input-group-navbar">
						<input type="text" class="form-control" placeholder="Search projects…" aria-label="Search">
						<button class="btn" type="button">
              <i class="align-middle" data-feather="search"></i>
            </button>
					</div>
				</form>
            
				<ul class="navbar-nav">
					<li class="nav-item px-2 dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Mega menu
            </a>
						<div class="dropdown-menu dropdown-menu-start dropdown-mega" aria-labelledby="servicesDropdown">
							<div class="d-md-flex align-items-start justify-content-start">
								<div class="dropdown-mega-list">
									<div class="dropdown-header">UI Elements</div>
									<a class="dropdown-item" href="#">Alerts</a>
									<a class="dropdown-item" href="#">Buttons</a>
									<a class="dropdown-item" href="#">Cards</a>
									<a class="dropdown-item" href="#">Carousel</a>
									<a class="dropdown-item" href="#">General</a>
									<a class="dropdown-item" href="#">Grid</a>
									<a class="dropdown-item" href="#">Modals</a>
									<a class="dropdown-item" href="#">Tabs</a>
									<a class="dropdown-item" href="#">Typography</a>
								</div>
								<div class="dropdown-mega-list">
									<div class="dropdown-header">Forms</div>
									<a class="dropdown-item" href="#">Layouts</a>
									<a class="dropdown-item" href="#">Basic Inputs</a>
									<a class="dropdown-item" href="#">Input Groups</a>
									<a class="dropdown-item" href="#">Advanced Inputs</a>
									<a class="dropdown-item" href="#">Editors</a>
									<a class="dropdown-item" href="#">Validation</a>
									<a class="dropdown-item" href="#">Wizard</a>
								</div>
								<div class="dropdown-mega-list">
									<div class="dropdown-header">Tables</div>
									<a class="dropdown-item" href="#">Basic Tables</a>
									<a class="dropdown-item" href="#">Responsive Table</a>
									<a class="dropdown-item" href="#">Table with Buttons</a>
									<a class="dropdown-item" href="#">Column Search</a>
									<a class="dropdown-item" href="#">Muulti Selection</a>
									<a class="dropdown-item" href="#">Ajax Sourced Data</a>
								</div>
							</div>
						</div>
					</li>
				</ul>
                  -->
				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<li class="nav-item dropdown" style="display: none;">
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
						<li class="nav-item dropdown" style="display: none;">
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
                    <?php echo $_SESSION['User']['EmployeeName'];?> 
                    <?php echo $_SESSION['User']['UserRole'];?>
                </span>
              </a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=profile/profile"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<!--<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a>-->
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=profile/changepassword">Change Password</a>
								<!--<a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=help/index">Help</a>-->
								<a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=logout">Sign out</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>

			<main class="content">
				<?php 
                if (isset($_GET['action'])) {
                    include_once("includes/".UserRole."/".$_GET['action'].".php");
                } else {
                    include_once("includes/".UserRole."/dashboard.php");
                }
                ?>
			</main>
			<footer class="footer">
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

	<script src="js/app.js"></script>
      
    
    <div class="modal" id="process_popup" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="popupcontent" style="text-align: center;padding:30px;">
        <img src="<?php echo URL;?>assets/gif/spinner.gif" style="width:80px;margin:0px auto">
        Processing ...
    </div>
  </div>
</div>
</body>
<script>
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
</script>
</html>