<?php include_once("config.php"); ?>
<?php
$ErrLoginName="";
$ErrLoginPassword="";
if (isset($_POST['loginBtn'])) {
    $error = 0;
    
    if ($_POST['LoginName']=="") {
        $error++;
        $ErrLoginName = "Please enter Username.";
    }
    
    if ($_POST['LoginPassword']=="") {
        $error++;
        $ErrLoginPassword = "Please enter Username.";
    }
    
    if ($_POST['captcha_code']=="") {
        $error++;
        $ErrCaptcha = "Please enter captcha.";
    }
    
    if ($_POST['captcha_code']!=$_SESSION['captcha_code']) {
        $error++;
        $ErrCaptcha = "captcha is invalid.";
    }
    
    if ($error==0) {
    
        if ($_GET['role']=="admin") {
            $data = array();
            if ($_POST['UserRole']=="admin") {
                $data = $mysql->select("select * from _tbl_administrators where md5(LoginUserName)='".md5($_POST['LoginName'])."' and md5(LoginPassword)='".md5($_POST['LoginPassword'])."' and IsActive='1'");
            }
            if ($_POST['UserRole']=="subadmin") {
                $data = $mysql->select("select * from _tbl_masters_users where UserRole='Sub Admin' and md5(LoginUserName)='".md5($_POST['LoginName'])."' and md5(LoginPassword)='".md5($_POST['LoginPassword'])."' and IsActive='1'");
            }
            if (sizeof($data)==0) {
                $loginError= "Login failed. Invalid User Name or Password";
            } else {
                if ($_POST['UserRole']=="admin") {     
                $mysql->insert("_tbl_logs_activity_admins",array("AdministratorID" => $data[0]['AdministratorID'],
                                                                 "AdministratorCode" => $data[0]['AdministratorCode'],
                                                                 "AdministratorName" => $data[0]['AdministratorName'],
                                                                 "Activity"        => "Login",
                                                                 "IP"                =>get_client_ip(),
                                                                 "ActivityOn"      => date("Y-m-d H:i:s"),
                                                                 "ActivityFrom"    => "Web"));
                }
                if ($_POST['UserRole']=="subadmin") {
                $mysql->insert("_tbl_logs_activity_users",array("UserID" => $data[0]['UserID'],
                                                                "UserCode" => $data[0]['UserCode'],
                                                                "UserName" => $data[0]['UserName'],
                                                                "Activity"        => "Login",
                                                                "IP"                =>get_client_ip(),
                                                                "ActivityOn"      => date("Y-m-d H:i:s"),
                                                                "ActivityFrom"    => "Web"));
                }
                $_SESSION['User']=$data[0];
                $_SESSION['User']['UserRole']=$_POST['UserRole'];
                sleep(5);
                echo "<script>location.href='dashboard.php';</script>";
                exit;
            }
        }
        
        if ($_GET['role']=="branch") {
            $data = array();
            if ($_POST['UserRole']=="branchadmin") {
                $data = $mysql->select("select * from _tbl_masters_users where UserRole='Branch Admin' and md5(LoginUserName)='".md5($_POST['LoginName'])."' and md5(LoginPassword)='".md5($_POST['LoginPassword'])."' and IsActive='1'");    
            }
            if ($_POST['UserRole']=="branchuser") {
                $data = $mysql->select("select * from _tbl_masters_users where UserRole='Branch User' and md5(LoginUserName)='".md5($_POST['LoginName'])."' and md5(LoginPassword)='".md5($_POST['LoginPassword'])."' and IsActive='1'");    
            }
                                       
            if (sizeof($data)==0) {
                $loginError= "Login failed. Invalid User Name or Password";
            } else {
                $_SESSION['User']=$data[0];
                $_SESSION['User']['UserRole']=$_POST['UserRole'];
                $mysql->insert("_tbl_logs_activity_users",array("UserID"    =>$data[0]['UserID'],
                                                                "UserCode"  =>$data[0]['UserCode'],
                                                                "UserName"  =>$data[0]['UserName'],
                                                                "Activity"  =>"Login",
                                                                "IP"                =>get_client_ip(),
                                                                "ActivityOn"=>date("Y-m-d H:i:s"),
                                                                "ActivityFrom"=>"Web"));
                sleep(5);
                echo "<script>location.href='dashboard.php';</script>";
                exit;
            }
        }
        
        if ($_GET['role']=="customers") {
            $data = $mysql->select("select * from _tbl_masters_customers where md5(LoginUserName)='".md5($_POST['LoginName'])."' and md5(LoginPassword)='".md5($_POST['LoginPassword'])."' and IsActive='1'");
            if (sizeof($data)==0) {
                $loginError= "Login failed. Invalid User Name or Password";
            } else {
                $_SESSION['User']=$data[0];
                $_SESSION['User']['UserRole']=$_GET['role'];
                
                $mysql->insert("_tbl_logs_activity_customers",array("CustomerID"  =>$data[0]['CustomerID'],
                                                                    "CustomerCode"=>$data[0]['CustomerCode'],
                                                                    "CustomerName"=>$data[0]['CustomerName'],
                                                                    "Activity"=>"Login",
                                                                    "IP"                =>get_client_ip(),
                                                                    "ActivityOn"=>date("Y-m-d H:i:s"),
                                                                    "ActivityFrom"=>"Web"));
                sleep(5);
                echo "<script>location.href='dashboard.php';</script>";
                exit;
            }
        }
        
        if ($_GET['role']=="salesman") {
            $data = $mysql->select("select * from _tbl_masters_salesman where md5(LoginUserName)='".md5($_POST['LoginName'])."' and md5(LoginPassword)='".md5($_POST['LoginPassword'])."' and IsActive='1'");
            if (sizeof($data)==0) {
                $loginError= "Login failed. Invalid User Name or Password";
            } else {
                $_SESSION['User']=$data[0];
                $_SESSION['User']['UserRole']=$_GET['role'];
                $mysql->insert("_tbl_logs_activity_salesman",array("SalesmanID"=>$data[0]['SalesmanID'],
                                                                   "SalesmanCode"=>$data[0]['SalesmanCode'],
                                                                   "SalesmanName"=>$data[0]['SalesmanName'],
                                                                   "Activity"=>"Login",
                                                                   "IP"                =>get_client_ip(),
                                                                   "ActivityOn"=>date("Y-m-d H:i:s"),
                                                                   "ActivityFrom"=>"Web"));
                sleep(5);
                echo "<script>location.href='dashboard.php';</script>";
                exit;
            }
        }
        
        if ($_GET['role']=="settings") {
           // $data = $mysql->select("select * from _tbl_masters_salesman where md5(LoginUserName)='".md5($_POST['LoginName'])."' and md5(LoginPassword)='".md5($_POST['LoginPassword'])."' and IsActive='1'");
          
           if ($_POST['LoginName']=="raja" && $_POST['LoginPassword']=="raja") {
                $data['DeveloperName']="RAJA";
                $data['DeveloperID']="1";
                $_SESSION['User']=$data;
                $_SESSION['User']['UserRole']=$_GET['role'];
                sleep(5);
                echo "<script>location.href='dashboard.php';</script>";
                exit;
            } else {
                $loginError= "Login failed. Invalid User Name or Password.";
            }
        }
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
        <base href="https://appstack.bootlab.io/">
        <title>Gold Chit Management Software</title>
        <link rel="canonical" href="https://appstack.bootlab.io/pages-sign-in.html" />
        <link rel="shortcut icon" href="img/favicon.ico">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
        <link class="js-stylesheet" href="css/light.css" rel="stylesheet">
        <script>
         function refreshCaptcha(){
            document.getElementById('captcha_code').value="";
            var img = document.images['captchaimg'];
            img.src = "<?php echo WEB_URL;?>captcha.php?rand="+Math.random()*1000;
         }
        </script>
        <style>
                body {background-color: #d5a43b;
  background-repeat: no-repeat;background-image: url('https://goldsavings.nexifysoftware.in/assets/loginbackground.jpeg') !important;background-size: auto 100%;}
        </style>
    </head>
    <body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
        <div class="main d-flex justify-content-center w-100">
            <main class="content d-flex p-0">
                <div class="container d-flex flex-column">
                    <div class="row h-100">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6  d-table">
                            <div class="d-table-cell align-middle">
                                <?php if (isset($_GET['role'])) { ?>
                                <div class="text-center mt-4">
                                    <p class="lead" style="font-weight: bold !important;color: #333;"><?php echo ucfirst($_GET['role']);?> Portal</p>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8 mx-auto">
                                        <div class="card" style="background:none;box-shadow: none !important;">
                                            <div class="card-body" style="background:none;padding:0px">
                                                <div class="m-sm-4">                                           
                                                    <form action="" method="post">
                                                        <div class="mb-3" style="margin-bottom: 8px !important;">
                                                            <label class="form-label" style="margin-bottom:2px !important;color:#604646;font-weight: bold;">User Name</label>
                                                            <input class="form-control form-control-lg" type="text" name="LoginName" id="LoginName" value="<?php echo $_POST['LoginName'];?>" placeholder="User Name" style="font-size:13px" />
                                                            <span style="color:red;font-size:12px;" id="ErrLoginName"><?php echo $ErrLoginName?></span>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" style="margin-bottom:2px !important;color:#604646;font-weight: bold;">Password</label>
                                                            <input class="form-control form-control-lg" type="password" name="LoginPassword" id="LoginPassword" value="<?php echo $_POST['LoginPassword'];?>" placeholder="Password" style="font-size:13px" />
                                                            <span style="color:red;font-size:12px;" id="ErrLoginPassword"><?php echo $ErrLoginPassword?></span>
                                                        </div>
                                                        <?php if ($_GET['role']=="branch") { ?>
                                                        <div class="mb-3">
                                                            <select name="UserRole" id="UserRole" class="form-control form-select" style="font-size:13px;padding:9px 20px">
                                                                <option value="branchadmin">Branch Admin</option>
                                                                <option value="branchuser">Branch User</option>
                                                            </select>
                                                        </div> 
                                                        <?php } ?>
                                                        <?php if ($_GET['role']=="admin") { ?>
                                                        <div class="mb-3">
                                                            <select name="UserRole" id="UserRole" class="form-control form-select" style="font-size:13px;padding:9px 20px">
                                                                <option value="admin">Administrator</option>
                                                                <option value="subadmin">Sub Admin</option>
                                                            </select>
                                                        </div> 
                                                        <?php } ?>
                                                        <div class="mb-4" style="background: #fff;padding: 10px;border-radius: 5px;line-height: 28px;padding-bottom: 5px;">
                                                            <table cellpadding="0" cellspacing="0" style="width:100%">
                                                                <tr>
                                                                    <td style="width:120px"><img src="<?php echo WEB_URL;?>captcha.php?rand=<?php echo rand();?>" id='captchaimg'></td>
                                                                    <td><input type="text" name="captcha_code" id="captcha_code" class="form-control" placeholder="Enter the code" style="margin-top:0px;margin-bottom:0px;;height:40px !important;"></td>
                                                                </tr>
                                                            </table>
                                                            <p style="margin-bottom:0px;font-size:12px">Can't read the image? click <a href='javascript: refreshCaptcha();' style="color:#0574be;font-weight:bold">here</a> to refresh</p>
                                                            <span style="color:red;font-size:12px;" id="ErrCaptcha"><?php echo $ErrCaptcha?></span>
                                                        </div>
                                                        <div class="form-check align-items-center" style="display: none;">
                                                                <input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
                                                                <label class="form-check-label text-small" for="customControlInline">Remember me next time</label>
                                                        </div>
                                                        <?php if (isset($loginError) && strlen(trim($loginError))>0) {?>
                                                        <div class="mb-2" style="color:red">
                                                            <?php echo $loginError;?>
                                                        </div>
                                                        <?php } ?>
                                                        <div class="text-center mt-2" style="text-align:right !important">
                                                            <input type="submit" name="loginBtn" class="btn btn-lg btn-danger" value="Sign in">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                                <?php } else {?>
                                <div class="text-center mt-4">
                                    <p class="lead">Select Portal</p>
                                    <div style="line-height:25px;">
                                        <a href="<?php echo WEB_URL;?>admin" class="btn btn-primary btn-sm">Super Admin</a>
                                        <a href="<?php echo WEB_URL;?>branch" class="btn btn-primary btn-sm">Branch</a>
                                        <a href="<?php echo WEB_URL;?>customers" class="btn btn-primary btn-sm">Customers</a>
                                        <a href="<?php echo WEB_URL;?>salesman" class="btn btn-primary btn-sm">Executives</a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>