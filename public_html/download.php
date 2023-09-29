<?php  
include_once("config.php");
$data = $mysql->select("select * from _tbl_assets where AttachmentID='".$_GET['file']."'");
//$file_url = 'http://www.javatpoint.com/f.txt';  
if ($data[0]['CustomerID']>0) {
$file_url = SERVER_PATH."/assets/uploads/customers/".$data[0]['CustomerID']."/".$data[0]['FileName'];      
}
if ($data[0]['EmployeeID']>0) {
$file_url = SERVER_PATH."/assets/uploads/employees/".$data[0]['EmployeeID']."/".$data[0]['FileName'];      
}
if ($data[0]['UserID']>0) {                 
$file_url = SERVER_PATH."/assets/uploads/users/".$data[0]['UserID']."/".$data[0]['FileName'];      
}
if ($data[0]['SalesmanID']>0) {
$file_url = SERVER_PATH."/assets/uploads/salesman/".$data[0]['SalesmanID']."/".$data[0]['FileName'];      
}
 

header('Content-Type: application/octet-stream');  
header("Content-Transfer-Encoding: utf-8");   
header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");   
readfile($file_url);  
?>