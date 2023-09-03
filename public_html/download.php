<?php  
include_once("config.php");
$data = $mysql->select("select * from _tbl_customers_assets where IsActive='1' and md5(concat('J2J',AttachmentID))='".$_GET['file']."'");
//$file_url = 'http://www.javatpoint.com/f.txt';  
$file_url = SERVER_PATH."/uploads/assets/".$data[0]['CustomerID']."/".$data[0]['FileName'];  
header('Content-Type: application/octet-stream');  
header("Content-Transfer-Encoding: utf-8");   
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");   
readfile($file_url);  
?>