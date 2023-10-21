<?php
class Benefits {
    
    function addNew() {
                              
        global $mysql;
        
        if (isset($_POST['BenefitCode'])) {
        if (strlen(trim($_POST['BenefitCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Benefit Code","div"=>"BenefitCode"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_benefits where BenefitCode='".trim($_POST['BenefitCode'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"BenefitCode"));    
            }
        }
        } else {
          $_POST['BenefitCode']= SequnceList::updateNumber("_tbl_masters_Benefits"); 
        }
        
        if (strlen(trim($_POST['Benefit']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Benefit","div"=>"Benefit"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_benefits where Benefit='".trim($_POST['Benefit'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Benefit is already used","div"=>"Benefit"));    
            }
        }
        
        $id = $mysql->insert("_tbl_masters_benefits",array("BenefitCode" => $_POST['BenefitCode'],
                                                           "Benefit"     => $_POST['Benefit'],
                                                           "BenefitDescription"     => $_POST['BenefitDescription'],
                                                           "Remarks"       => $_POST['Remarks'],
                                                           "CreatedOn"     => date("Y-m-d H:i:s"),
                                                           "IsActive"      => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","BenefitCode"=>SequnceList::updateNumber("_tbl_masters_benefits")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
     }
     
     public static function remove() {
         global $mysql;
         $mysql->execute("delete from _tbl_masters_benefits where BenefitID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_benefits")));
     }

     public static function listAll() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_benefits");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function listAllActive() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_benefits where IsActive='1'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function getDetailsByID($BenefitID) {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_benefits where BenefitID='".$BenefitID."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }

     public static function doUpdate() {
         global $mysql;
         if (strlen(trim($_POST['Benefit']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter Benefit","div"=>"Benefit"));    
         } else {
             $dupCode = $mysql->select("select * from _tbl_masters_benefits where Benefit='".trim($_POST['Benefit'])."' and BenefitID<>'".$_POST['BenefitID']."'");
             if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Benefit is already used","div"=>"Benefit"));    
             }
         }
         $mysql->execute("update _tbl_masters_benefits set Benefit ='".$_POST['Benefit']."',
                                                            BenefitDescription  ='".$_POST['BenefitDescription']."',
                                                            Remarks  ='".$_POST['Remarks']."',
                                                            IsActive ='".$_POST['IsActive']."' where BenefitID='".$_POST['BenefitID']."'");
                                                          
         return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
     }
     
      public static function getData() {
        
        global $mysql;
        
        $data = $mysql->select("select * from _tbl_masters_benefits where BenefitID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
}
?>