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
        
        if (strlen(trim($_POST['EntryDate']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Date","div"=>"EntryDate"));    
        }  else {
            if (strlen(trim($_POST['EntryDate']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please select date","div"=>"EntryDate"));    
            } else {
                $currentdate = strtotime(date("Y-m-d"));
                $entrydate = strtotime($_POST['EntryDate']);
                if ($entrydate>$currentdate) {
                    return json_encode(array("status"=>"failure","message"=>"Please select date on/or before ".date("d-m-Y"),"div"=>"EntryDate"));        
                }
            }
        }
        $_POST['EntryDate'] = date("Y-m-d",strtotime($_POST['EntryDate']));
        
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
        
        if (strlen(trim($_POST['MinDueAmount']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Minimum Due Amount","div"=>"DueAmount"));    
        } else {
            if (trim($_POST['MinDueAmount'])<=0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Minimum Due Amount","div"=>"DueAmount"));    
            }
        }
        
        if (strlen(trim($_POST['MaxDueAmount']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Maximum Due Amount","div"=>"DueAmount"));    
        } else {
            if (trim($_POST['MaxDueAmount'])<=0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Maximum Due Amount","div"=>"DueAmount"));    
            }
            if ($_POST['MinDueAmount']>=$_POST['MaxDueAmount']) {
                return json_encode(array("status"=>"failure","message"=>"Minimum due amount must have lessthan of maximum due amount","div"=>"DueAmount"));    
            }
        }
        
        
        if (strlen(trim($_POST['MinDuration']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter minimum duration","div"=>"Duration"));    
        } else {
            if (trim($_POST['MinDuration'])<=0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid minimum duration","div"=>"Duration"));    
            }
        }
        
        if (strlen(trim($_POST['MaxDuration']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter maximum duration","div"=>"Duration"));    
        } else {
            if (trim($_POST['MaxDuration'])<=0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid maximum duration","div"=>"Duration"));    
            }
            if ($_POST['MinDuration']>=$_POST['MaxDuration']) {
                return json_encode(array("status"=>"failure","message"=>"Minimum due amount must have lessthan of maximum duration","div"=>"Duration"));    
            }
        }
        
        if (!(isset($_POST['WastageDiscount']) && $_POST['WastageDiscount']>=0)) {
            return json_encode(array("status"=>"failure","message"=>"Please select valid wastage discount","div"=>"WastageDiscount"));    
        }
        
        if (!(isset($_POST['MakingChargeDiscount']) && $_POST['MakingChargeDiscount']>=0)) {
            return json_encode(array("status"=>"failure","message"=>"Please select valid making charge discount","div"=>"MakingChargeDiscount"));    
        }
        
        if (strlen(trim($_POST['Benefits']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Benefits","div"=>"Benefits"));    
        }
        
        if (strlen(trim($_POST['TermsOfConditions']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Terms Of Conditions","div"=>"TermsOfConditions"));    
        }
        
        $_POST['MakingChargeDiscount']= strlen(trim($_POST['MakingChargeDiscount']))==0 ? "0" : $_POST['MakingChargeDiscount'];
         $_POST['WastageDiscount']= strlen(trim($_POST['WastageDiscount']))==0 ? "0" : $_POST['WastageDiscount'];
        
        $id = $mysql->insert("_tbl_masters_schemes",array("SchemeCode"           => $_POST['SchemeCode'],
                                                          "EntryDate"            => $_POST['EntryDate'],
                                                          "SchemeName"           => $_POST['SchemeName'],
                                                          "ShortDescription"     => $_POST['ShortDescription'],
                                                          "MinDueAmount"         => $_POST['MinDueAmount'],
                                                          "MaxDueAmount"         => $_POST['MaxDueAmount'],
                                                          "MinDuration"          => $_POST['MinDuration'],
                                                          "MaxDuration"          => $_POST['MaxDuration'],
                                                          "MakingChargeDiscount" => $_POST['MakingChargeDiscount'],
                                                          "WastageDiscount"      => $_POST['WastageDiscount'],
                                                          "Benefits"             => $_POST['Benefits'],
                                                          "TermsOfConditions"    => $_POST['TermsOfConditions'],
                                                          "Remarks"              => $_POST['Remarks'],
                                                          "CreatedOn"            => date("Y-m-d H:i:s"),
                                                          "IsActive"             => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","nextcode"=>SequnceList::updateNumber("_tbl_masters_schemes")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create. Error: ".$mysql->error,"div"=>""));
        }
     }
     
     public static function remove() {
         
         global $mysql;
                                                    
         $schemes = $mysql->select("select count(*) as cnt from _tbl_contracts where SchemeID='".$_GET['ID']."'");
         if (isset($schemes[0]['cnt']) && $schemes[0]['cnt']>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to remmove. This scheme assigned to ".$schemes[0]['cnt']." contract(s)"));    
         }
         
         $mysql->execute("delete from _tbl_masters_schemes where SchemeID='".$_GET['ID']."'");
         $data = $mysql->select("SELECT t1.*, IFNULL(t2.cnt,0) AS ContractCount 
                                    FROM 
                                        _tbl_masters_schemes AS t1
                                    LEFT JOIN 
                                        (SELECT SchemeID, COUNT(*) AS cnt FROM _tbl_contracts GROUP BY SchemeID) AS t2
                                    ON 
                                    t1.SchemeID=t2.SchemeID");
         
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$data));
     }

     public static function listAll() {
         
         global $mysql;                  
         if (isset($_SESSION['User']['CustomerID'])) {
               $data = $mysql->select("SELECT t1.*, IFNULL(t2.cnt,0) AS ContractCount 
                                    FROM 
                                        _tbl_masters_schemes AS t1
                                    LEFT JOIN 
                                        (SELECT SchemeID, COUNT(*) AS cnt FROM _tbl_contracts where CustomerID='".$_SESSION['User']['CustomerID']."' GROUP BY SchemeID) AS t2
                                    ON 
                                    t1.SchemeID=t2.SchemeID");
         } else {
         
         $data = $mysql->select("SELECT t1.*, IFNULL(t2.cnt,0) AS ContractCount 
                                    FROM 
                                        _tbl_masters_schemes AS t1
                                    LEFT JOIN 
                                        (SELECT SchemeID, COUNT(*) AS cnt FROM _tbl_contracts GROUP BY SchemeID) AS t2
                                    ON 
                                    t1.SchemeID=t2.SchemeID");
                                    
         }                            
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function listAllActive() {
         
         global $mysql;
         if (isset($_SESSION['User']['CustomerID'])) {
         $data = $mysql->select("SELECT t1.*, IFNULL(t2.cnt,0) AS ContractCount 
                                    FROM 
                                        _tbl_masters_schemes AS t1
                                    LEFT JOIN 
                                        (SELECT SchemeID, COUNT(*) AS cnt FROM _tbl_contracts where CustomerID='".$_SESSION['User']['CustomerID']."' GROUP BY SchemeID) AS t2
                                    ON 
                                    t1.SchemeID=t2.SchemeID where t1.IsActive='1'");
         } else {
         $data = $mysql->select("SELECT t1.*, IFNULL(t2.cnt,0) AS ContractCount 
                                    FROM 
                                        _tbl_masters_schemes AS t1
                                    LEFT JOIN 
                                        (SELECT SchemeID, COUNT(*) AS cnt FROM _tbl_contracts GROUP BY SchemeID) AS t2
                                    ON 
                                    t1.SchemeID=t2.SchemeID where t1.IsActive='1'");
         }
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function listAllDeactivated() {
         
         global $mysql;
         
         $data = $mysql->select("SELECT t1.*, IFNULL(t2.cnt,0) AS ContractCount 
                                    FROM 
                                        _tbl_masters_schemes AS t1
                                    LEFT JOIN 
                                        (SELECT SchemeID, COUNT(*) AS cnt FROM _tbl_contracts GROUP BY SchemeID) AS t2
                                    ON 
                                    t1.SchemeID=t2.SchemeID where t1.IsActive='0'");
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
             $dup = $mysql->select("select * from _tbl_masters_schemes where SchemeName='".trim($_POST['SchemeName'])."' and SchemeID<>'".$_POST['SchemeID']."'");
             if (sizeof($dup)>0) {
                return json_encode(array("status"=>"failure","message"=>"Scheme Name is already used","div"=>"SchemeName"));    
             }
         }
         
         if (strlen(trim($_POST['ShortDescription']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter Short Description","div"=>"ShortDescription"));    
         }
         $_POST['MakingChargeDiscount']= strlen(trim($_POST['MakingChargeDiscount']))==0 ? "0" : $_POST['MakingChargeDiscount'];
         $_POST['WastageDiscount']= strlen(trim($_POST['WastageDiscount']))==0 ? "0" : $_POST['WastageDiscount'];
         
         $mysql->execute("update _tbl_masters_schemes set SchemeName           = '".$_POST['SchemeName']."',
                                                          EntryDate            = '".$_POST['EntryDate']."',
                                                          ShortDescription     = '".$_POST['ShortDescription']."',
                                                          
                                                          MinDueAmount         = '".$_POST['MinDueAmount']."',
                                                          MaxDueAmount         = '".$_POST['MaxDueAmount']."',
                                                          MinDuration          = '".$_POST['MinDuration']."',
                                                          MaxDuration          = '".$_POST['MaxDuration']."',       
                                                          
                                                          MakingChargeDiscount = '". $_POST['MakingChargeDiscount']."',
                                                          WastageDiscount      = '". $_POST['WastageDiscount']."',
                                                          Benefits             = '".$_POST['Benefits']."',
                                                          TermsOfConditions    = '".$_POST['TermsOfConditions']."',
                                                          Remarks              = '".$_POST['Remarks']."',
                                                          IsActive             = '".$_POST['IsActive']."' where SchemeID='".$_POST['SchemeID']."'");
         if (strlen($mysql->error)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to update. Error:".$mysql->error,"div"=>""));    
         }                                                  
         return json_encode(array("status"=>"success","message"=>"successfully updated"));
     }
     
     public static function getData() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_schemes where SchemeCode='".$_GET['scheme']."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
}
?>