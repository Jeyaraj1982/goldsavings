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
        
        if (strlen(trim($_POST['ShortDescription']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Short Description","div"=>"ShortDescription"));    
        }
        
        if (strlen(trim($_POST['Amount']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Amount","div"=>"Amount"));    
        }
        
        if (trim($_POST['Installments'])=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select Installments","div"=>"Installments"));    
        }
        if (trim($_POST['InstallmentMode'])=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select Installment mode","div"=>"Installments"));    
        }
        
        if (strlen(trim($_POST['InstallmentAmount']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Installment Amount","div"=>"InstallmentAmount"));    
        }
        
        if (trim($_POST['ModeOfBenifits'])=="0") {
              return json_encode(array("status"=>"failure","message"=>"Please select Mode Of Benifits","div"=>"ModeOfBenifits"));    
        }
        
        if ($_POST['ModeOfBenifits']=="GOLD") {
             $_POST['BonusPercentage']="0";
             if ((trim($_POST['MaterialType']))=="0") {
                return json_encode(array("status"=>"failure","message"=>"Please select Material Type","div"=>"MaterialType"));    
             }      
        }
         
        if ($_POST['ModeOfBenifits']=="AMOUNT") {
            $_POST['MaterialType']="0";
            if (trim($_POST['BonusPercentage'])=="") {
                return json_encode(array("status"=>"failure","message"=>"Please select Bonus Percentage","div"=>"BonusPercentage"));    
            }  
        } 
        
        if (strlen(trim($_POST['Benefits']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Benefits","div"=>"Benefits"));    
        }
        
        if (strlen(trim($_POST['TermsOfConditions']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter TermsOfConditions","div"=>"TermsOfConditions"));    
        }
        
        $id = $mysql->insert("_tbl_masters_schemes",array("SchemeCode"        => $_POST['SchemeCode'],
                                                          "SchemeName"        => $_POST['SchemeName'],
                                                          "ShortDescription"  => $_POST['ShortDescription'],
                                                          "Amount"            => $_POST['Amount'],
                                                          "Installments"      => $_POST['Installments'],
                                                          "InstallmentMode"   => $_POST['InstallmentMode'],
                                                          "InstallmentAmount" => $_POST['InstallmentAmount'],
                                                          "MaterialType"      => $_POST['MaterialType'],
                                                          "ModeOfBenifits"    => $_POST['ModeOfBenifits'],
                                                          "BonusPercentage"    => $_POST['BonusPercentage'],
                                                          "MakingChargeDiscount"    => $_POST['MakingChargeDiscount'],
                                                          "WastageDiscount"    => $_POST['WastageDiscount'],
                                                          "Benefits"          => $_POST['Benefits'],
                                                          "TermsOfConditions" => $_POST['TermsOfConditions'],
                                                          "Remarks"           => $_POST['Remarks'],
                                                          "CreatedOn"         => date("Y-m-d H:i:s"),
                                                          "IsActive"          => '1'));
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
         //$data = $mysql->select("select * from _tbl_masters_schemes");
         $data = $mysql->select("SELECT t1.*, IFNULL(t2.cnt,0) AS ContractCount FROM _tbl_masters_schemes AS t1
LEFT JOIN 
(SELECT SchemeID, COUNT(*) AS cnt FROM _tbl_contracts GROUP BY SchemeID) AS t2
ON t1.SchemeID=t2.SchemeID");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function listAllActive() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_schemes where IsActive='1'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     public static function listAllDeactivated() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_schemes where IsActive='0'");
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
         
         if (strlen(trim($_POST['ShortDescription']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Short Description","div"=>"ShortDescription"));    
        }
        
        if (strlen(trim($_POST['Amount']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Amount","div"=>"Amount"));    
        }
        
        if (trim($_POST['Installments'])=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select Installments","div"=>"Installments"));    
        }
        if (trim($_POST['InstallmentMode'])=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select Installment mode","div"=>"Installments"));    
        }
        
        if (strlen(trim($_POST['InstallmentAmount']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Installment Amount","div"=>"InstallmentAmount"));    
        }
        
        if (trim($_POST['ModeOfBenifits'])=="0") {
              return json_encode(array("status"=>"failure","message"=>"Please select Mode Of Benifits","div"=>"ModeOfBenifits"));    
         }
        
        if ($_POST['ModeOfBenifits']=="GOLD") {
             $_POST['BonusPercentage']="0";
             if ((trim($_POST['MaterialType']))=="0") {
                return json_encode(array("status"=>"failure","message"=>"Please select Material Type","div"=>"MaterialType"));    
             }      
        }
         
        if ($_POST['ModeOfBenifits']=="AMOUNT") {
            $_POST['MaterialType']="0";
            if ((trim($_POST['BonusPercentage']))=="") {
                return json_encode(array("status"=>"failure","message"=>"Please select Bonus Percentage","div"=>"BonusPercentage"));    
            }  
        }
        
        if (strlen(trim($_POST['Benefits']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Benefits","div"=>"Benefits"));    
        }
        
        if (strlen(trim($_POST['TermsOfConditions']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter TermsOfConditions","div"=>"TermsOfConditions"));    
        }
        
         $mysql->execute("update _tbl_masters_schemes set SchemeName         = '".$_POST['SchemeName']."',
                                                          ShortDescription             = '".$_POST['ShortDescription']."',
                                                          Amount             = '".$_POST['Amount']."',
                                                          Installments       = '".$_POST['Installments']."',
                                                          InstallmentMode    = '".$_POST['InstallmentMode']."',
                                                          InstallmentAmount  = '".$_POST['InstallmentAmount']."',
                                                          MaterialType       = '".$_POST['MaterialType']."',
                                                          ModeOfBenifits     = '".$_POST['ModeOfBenifits']."',
                                                          BonusPercentage    =  '".$_POST['BonusPercentage']."',
                                                          MakingChargeDiscount    = '". $_POST['MakingChargeDiscount']."',
                                                          WastageDiscount    = '". $_POST['WastageDiscount']."',
                                                          Benefits     = '".$_POST['Benefits']."',
                                                          TermsOfConditions     = '".$_POST['TermsOfConditions']."',
                                                          Remarks            = '".$_POST['Remarks']."',
                                                          IsActive           = '".$_POST['IsActive']."' where SchemeID='".$_POST['SchemeID']."'");
                                                          
         return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
     }
     
     
     
     
}
?>