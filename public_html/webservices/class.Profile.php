<?php
class Profile {

     public static function changePassword() {
         global $mysql;
         if (strlen(trim($_POST['CurrentPassword']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please Current Password","div"=>"CurrentPassword"));    
         }
         
         if (strlen(trim($_POST['NewPassword']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please New Password","div"=>"NewPassword"));    
         }
         
         if (strlen(trim($_POST['NewPassword']))<6) {
             return json_encode(array("status"=>"failure","message"=>"New Password Must have six Characters","div"=>"NewPassword"));    
         } 
         
         if (strlen(trim($_POST['CNewPassword']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please Confrim New Password","div"=>"CNewPassword"));    
         }
         
         if ($_POST['CNewPassword']!=$_POST['NewPassword']) {
             return json_encode(array("status"=>"failure","message"=>"New Password & Confirm New Password not match","div"=>"CNewPassword"));    
         }
         
         $validPassword = $mysql->select("select * from _tbl_employees where LoginPassword='".trim($_POST['CurrentPassword'])."' and EmployeeID='".$_SESSION['User']['EmployeeID']."'");
         if (sizeof($validPassword)==0) {
            return json_encode(array("status"=>"failure","message"=>"Current Password is invalid","div"=>"CurrentPassword"));    
         }

         $mysql->execute("update _tbl_employees set LoginPassword ='".$_POST['NewPassword']."',
                                                    AllowToChangePasswordFirstLogin='0'
                                                            where EmployeeID='".$_SESSION['User']['EmployeeID']."'");
         
         $_SESSION['User']['AllowToChangePasswordFirstLogin']=0;
                                                          
         return json_encode(array("status"=>"success","message"=>"Password changed successfully updated ".$mysql->error,"div"=>""));
     }
}
?>