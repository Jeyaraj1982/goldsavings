<?php
class Schemes {
    
    function addNew() {
        
        global $mysql;
        
        if (isset($_POST['SchemeCode'])) {
        if (strlen(trim($_POST['SchemeCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Scheme Code","div"=>"SchemeCode"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_schemes where SchemeCode='".trim($_POST['SchemeCode'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"SchemeCode"));    
            }
        }
        } else {
          $_POST['SchemeCode']= SequnceList::updateNumber("_tbl_masters_schemes"); 
        }
        
        if (strlen(trim($_POST['SchemeName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Scheme Name","div"=>"SchemeName"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_schemes where SchemeName='".trim($_POST['SchemeName'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Scheme Name is already used","div"=>"SchemeName"));    
            }
        }
        
        $id = $mysql->insert("_tbl_masters_schemes",array("SchemeCode" => $_POST['SchemeCode'],
                                                          "SchemeName"     => $_POST['SchemeName'],
                                                          "ShortDescription"     => $_POST['ShortDescription'],
                                                          "Amount"     => $_POST['Amount'],
                                                          "Installments"     => $_POST['Installments'],
                                                          "InstallmentMode"     => $_POST['InstallmentMode'],
                                                          "InstallmentAmount"       => $_POST['InstallmentAmount'],
                                                          "MaterialType"       => $_POST['MaterialType'],
                                                          "ModeOfBenifits"       => $_POST['ModeOfBenifits'],
                                                          "Benefits"       => $_POST['Benefits'],
                                                          "TermsOfConditions"       => $_POST['TermsOfConditions'],
                                                          "Remarks"       => $_POST['Remarks'],
                                                          "CreatedOn"     => date("Y-m-d H:i:s"),
                                                          "IsActive"      => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","StateNameCode"=>SequnceList::updateNumber("_tbl_masters_schemes")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
     }
     
     public static function remove() {
         global $mysql;
          
         $mysql->execute("delete from _tbl_masters_schemes where SchemeID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_schemes")));
     }

     public static function listAll() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_schemes");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function listAllActive() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_schemes where IsActive='1'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function getDetailsByID($SchemeID) {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$SchemeID."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }

     public static function doUpdate() {
         global $mysql;
         if (strlen(trim($_POST['SchemeName']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter Scheme Name","div"=>"SchemeName"));    
         } else {
             $dupCode = $mysql->select("select * from _tbl_masters_schemes where SchemeName='".trim($_POST['SchemeName'])."' and SchemeID<>'".$_POST['SchemeID']."'");
             if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Scheme Name is already used","div"=>"SchemeName"));    
             }
         }
         $mysql->execute("update _tbl_masters_schemes set SchemeName         = '".$_POST['SchemeName']."',
                                                          ShortDescription             = '".$_POST['ShortDescription']."',
                                                          Amount             = '".$_POST['Amount']."',
                                                          Installments       = '".$_POST['Installments']."',
                                                          InstallmentMode    = '".$_POST['InstallmentMode']."',
                                                          InstallmentAmount  = '".$_POST['InstallmentAmount']."',
                                                          MaterialType       = '".$_POST['MaterialType']."',
                                                          ModeOfBenifits     = '".$_POST['ModeOfBenifits']."',
                                                          Benefits     = '".$_POST['Benefits']."',
                                                          TermsOfConditions     = '".$_POST['TermsOfConditions']."',
                                                          Remarks            = '".$_POST['Remarks']."',
                                                          IsActive           = '".$_POST['IsActive']."' where SchemeID='".$_POST['SchemeID']."'");
                                                          
         return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
     }
}
?>