<?php
include_once("config.php");
if (isset($_POST['loginBtn'])) {
    $data = $mysql->select("select * from _tbl_employees where LoginUserName='".$_POST['LoginName']."' and LoginPassword='".$_POST['LoginPassword']."' and IsActive='1'");
    if (sizeof($data)==0) {
        $loginError= "Login failed. Invalid User Name or Password";
    } else {
        $mybrowser =  get_browser();
        $mysql->insert("_tbl_logs_employees_login",array("EmployeeID"=>$data[0]['EmployeeID'],
                                                         "LoggedDateTime"=>date("Y-m-d H:i:s"),
                                                         "IP"=>get_client_ip(),
                                                         "OtherDetails"=>json_encode($mybrowser)));    
        $_SESSION['User']=$data[0];
        sleep(5);
        echo "<script>location.href='dashboard.php';</script>";
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
    <base href="https://appstack.bootlab.io/">
    <title></title>
    <link rel="canonical" href="https://appstack.bootlab.io/pages-sign-in.html" />
    <link rel="shortcut icon" href="img/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500&display=swap" rel="stylesheet">
    <link class="js-stylesheet" href="css/light.css" rel="stylesheet">
    <style>
    body { 
  background: url('https://img.indiafilings.com/learn/wp-content/uploads/2020/09/12003625/auditor-and-his-role-in-a-company.jpeg') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  opacity: 0.5;
}
    </style>
</head>
<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
    <div class="main d-flex justify-content-center w-100">
        <main class="content d-flex p-0">
            <div class="container d-flex flex-column">
                <div class="row h-100">
                    <div class="col-sm-10 col-md-8 col-lg-4 mx-auto d-table h-100">
                        <div class="d-table-cell align-middle">
                            <div class="text-center mt-4">
                                <p class="lead">
                                    Sign in to your account to continue
                                </p>
                            </div>
                            <div class="card">
                                <div class="card-body" style="padding:0px">
                                    <div class="m-sm-4">
                                        <form action="" method="post">
                                            <div class="mb-3">
                                                <label class="form-label">User Name</label>
                                                <input class="form-control form-control-lg" type="text" name="LoginName" id="LoginName" value="<?php echo $_POST['LoginName'];?>" placeholder="User Name" style="font-size:13px" />
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Password</label>
                                                <input class="form-control form-control-lg" type="password" name="LoginPassword" id="LoginPassword" value="<?php echo $_POST['LoginPassword'];?>" placeholder="Password" style="font-size:13px" />
                                            </div>
                                            <div>
                                                <div class="form-check align-items-center">
                                                    <input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked>
                                                    <label class="form-check-label text-small" for="customControlInline">Remember me next time</label>
                                                </div>
                                            </div>
                                            <?php if (isset($loginError) && strlen(trim($loginError))>0) {?>
                                            <div class="mb-3" style="color:red">
                                                <?php echo $loginError;?>
                                            </div>
                                            <?php } ?>
                                            <div class="text-center mt-3">
                                                <input type="submit" name="loginBtn" class="btn btn-lg btn-primary" value="Sign in">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>