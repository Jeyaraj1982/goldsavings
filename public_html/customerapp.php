<?php include_once("config.php");


$ErrLoginName="";
$ErrLoginPassword="";

if ((isset($_SESSION['User']) && ($_SESSION['User']['CustomerID']>0))) {
    echo "<script>location.href='".WEB_URL."dashboard.php';</script>";
    exit;
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
                body {background-color:#293042; }
        </style>
    </head>
    <body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-behavior="sticky">
        <div class="main d-flex justify-content-center w-100">
            <main class="content d-flex p-0">
                <div class="container d-flex flex-column">
                    <div class="row h-100">
                        <div class="col-sm-12  d-table">
                            <div class="d-table-cell align-middle">
                                <?php if (isset($_GET['role'])) { ?>
                                <div class="text-center mb-4">
                                    <img src="https://goldsavings.nexifysoftware.in/assets/logo.png">
                                    <!--<p class="lead" style="font-weight: bold !important;color: #333;"><?php echo ucfirst($_GET['role']);?> Portal</p>-->
                                </div>
                                <div class="row">
                                    <div class="col-10 mx-auto">
                                        <div class="card" style="background:none;box-shadow: none !important;">
                                            <div class="card-body" style="background:none;padding:0px">
                                                <div class="m-sm-4">                                           
                                                    <form action="" method="post">
                                                        <div class="mb-3" style="margin-bottom: 8px !important;">
                                                            <label class="form-label" style="margin-bottom:4px !important;color:#ccc;font-weight: normal;">User Name</label>
                                                            <input class="form-control form-control-lg" type="text" name="LoginName" id="LoginName" value="<?php echo $_POST['LoginName'];?>" placeholder="User Name" style="font-size:13px" />
                                                            <span style="color:red;font-size:12px;" id="ErrLoginName"><?php echo $ErrLoginName?></span>
                                                        </div>
                                                        <div class="mb-4">
                                                            <label class="form-label" style="margin-bottom:4px !important;color:#ccc;font-weight: normal;">Password</label>
                                                            <input class="form-control form-control-lg" type="password" name="LoginPassword" id="LoginPassword" value="<?php echo $_POST['LoginPassword'];?>" placeholder="Password" style="font-size:13px" />
                                                            <span style="color:red;font-size:12px;" id="ErrLoginPassword"><?php echo $ErrLoginPassword?></span>
                                                        </div>
                                                        <div class="mb-4" style="background: #fff;padding: 10px;border-radius: 5px;line-height: 28px;padding-bottom: 5px;border:1px solid #d5d5d5">
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
                                                            <input type="submit" name="customerloginBtn" class="btn btn-lg btn-danger" value="Sign in">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                                <?php } else {?>
                                
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>