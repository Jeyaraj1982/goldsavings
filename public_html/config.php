<?php
session_start();
date_default_timezone_set('Asia/Calcutta');  

define("SERVER_PATH",__DIR__);
define("log_path",SERVER_PATH."/logs/");
define("sql_log",SERVER_PATH."/logs/");
define("WEB_URL","https://goldsavings.nexifysoftware.in/");
define("WEBAPP_URL","https://goldsavings.nexifysoftware.in/app/");
define("LOGOUT_PATH","https://goldsavings.nexifysoftware.in/");
define("WEB_Title"," ");   
define("URL","https://goldsavings.nexifysoftware.in/");
define("DBSERVER","localhost");                        
define("DBUSER","nexifyso_user");       
define("DBPASSWORD","mysql@Pwd");
define("DBNAME","nexifysoftware_goldsavings");

if (isset($_GET['action']) && $_GET['action']=="logout") {
    $role = $_SESSION['User']['UserRole'];
    session_destroy();
    echo "<script>location.href='".LOGOUT_PATH.$role."';</script>";
    exit;
}

include_once("controllers/class.DatabaseController.php");
$mysql = new MySqldatabase(DBSERVER,DBUSER,DBPASSWORD,DBNAME);
                   
/*
define("Mail_Host","mail.gbmaligai.com");
define("SMTP_UserName","support@gbmaligai.com");
define("SMTP_Password","Welcome@82");
define("SMTP_Sender","gbmaligai");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'/lib/mail/src/Exception.php';
require __DIR__.'/lib/mail/src/PHPMailer.php';
require __DIR__.'/lib/mail/src/SMTP.php';

$mail    = new PHPMailer;
function reInitMail() {
    global $mail;
    $mail    = new PHPMailer;
}

include('lib/PHPExcel-1.8/Classes/PHPExcel.php');
$objPHPExcel    =   new PHPExcel();
    
include_once("controllers/EmailController.php");

//$settings_data = $mysql->select("select * from _tbl_settings_application");
//$_SETTINGS=array();
//foreach($settings_data as $d) {
  // $_SETTINGS[$d['Param']] = $d['ParamValue'];
//}
//include_once("app/controller/class.TelegramMessageController.php");

if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="User") {
    define("UserRole","user");
}
if (isset($_SESSION['User']) && $_SESSION['User']['Role']=="Admin") {
    define("UserRole","admin");
}

$_CONFIG['LOGO_URL'] = WEB_URL."/assets/new_weblogo.png";
 
 */
 
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


 function checkemail($str) {
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
   }


class J2JViews {
    
    function _DisplayErrorMessage($message) {
        $message = str_replace("'","\'",$message);
        $message = str_replace('"','\"',$message);
        $return ='<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="alert alert-danger outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                                <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b> '.$message.'.</p>
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                  </div>';
        return $return;
    }

    function _DisplaySuccessMessage($message) {
        $message = str_replace("'","\'",$message);
        $message = str_replace('"','\"',$message);
        $return = '<div class="row">
                     <div class="col-12">
                        <div class="card">
                            <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                                <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b> '.$message.'..</p>
                                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                     </div>
                   </div>';
        return $return;
    }

    function getIndianCurrency($number) {
        $decimal = round($number - ($no = floor($number)), 2) * 100;
        $hundred = null;
        $digits_length = strlen($no);
        $i = 0;
        $str = array();
        $words = array(0 => '', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen', 19 => 'nineteen', 20 => 'twenty', 30 => 'thirty', 40 => 'forty', 50 => 'fifty', 60 => 'sixty', 70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
        $digits = array('', 'hundred','thousand','lakh', 'crore');
        while( $i < $digits_length ) {
            $divider = ($i == 2) ? 10 : 100;
            $number = floor($no % $divider);
            $no = floor($no / $divider);
            $i += $divider == 10 ? 1 : 2;
            if ($number) {
                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
            } else $str[] = null;
        }
        $Rupees = implode('', array_reverse($str));
        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
        return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
    }
}

class JValidations {
    public static function IsValidMobileNumber($number) {
        if (strlen(trim($number))==10) {
            
        } else {
            return false;
        }
    }
}



class SequnceList {
    
    public function getNextNumber($tbl) {
        global $mysql;
        $data = $mysql->select("select * from _tbl_settings_sequnce_master where ModuleName='".$tbl."'");
        $code = $data[0]['Prefix'].str_pad( ($data[0]['LastUpdated']+1),$data[0]['NumberOfLength'],"0",STR_PAD_LEFT);
        return $code;
    }
    
    public function updateNumber($tbl) {
        global $mysql;
        $data = $mysql->select("select * from _tbl_settings_sequnce_master where ModuleName='".$tbl."'");
        $mysql->execute("update _tbl_settings_sequnce_master set LastUpdated='".($data[0]['LastUpdated']+1)."' where ModuleName='".$tbl."'");
        $code = $data[0]['Prefix'].str_pad( ($data[0]['LastUpdated']+2),$data[0]['NumberOfLength'],"0",STR_PAD_LEFT);
        return $code;
    }
}
function getIndianCurrency(float $number)
{
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'one', 2 => 'two',
        3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
        7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve',
        13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
        16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
        19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty',
        70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
    $digits = array('', 'hundred','thousand','lakh', 'crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '') . $paise;
}

function addOrdinalNumnberSuffix($num) {
    if (!in_array(($num % 100),array(11,12,13))){
        switch ($num % 10){
                  case 1: return $num.'<sup>st</sup>';
                  case 2: return $num.'<sup>nd</sup>';
                  case 3: return $num.'<sup>rd</sup>';
        }
    }
    return $num.'<sup>th</sup>';
}
class appConfig {
    const DATEFORMAT = "%d-%m-%Y";
}
?>