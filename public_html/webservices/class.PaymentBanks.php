<?php
class PaymentBanks {
    
    function addNew() {
        
        global $mysql;
        
        if (isset($_POST['PaymentBankCode'])) {
            if (strlen(trim($_POST['PaymentBankCode']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Payment Bank  Code","div"=>"PaymentBankCode"));    
            } else {
                $dupCode = $mysql->select("select * from _tbl_masters_paymentbanks where PaymentBankCode='".trim($_POST['PaymentBankCode'])."'");
                if (sizeof($dupCode)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"PaymentBankCode"));    
                }
            }
        } else {
          $_POST['PaymentBankCode']= SequnceList::updateNumber("_tbl_masters_paymentbanks"); 
        }
        
        if (strlen(trim($_POST['BankName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Bank Name","div"=>"BankName"));    
        }
        
         if (strlen(trim($_POST['AccountNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Account Number","div"=>"AccountNumber"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_paymentbanks where AccountNumber='".trim($_POST['AccountNumber'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"AccountNumber is already used","div"=>"AccountNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AccountHolderName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Account Holder Name","div"=>"AccountHolderName"));    
        }
        
        if (strlen(trim($_POST['IFSCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter IFSCode","div"=>"IFSCode"));    
        }
        
        if (strlen(trim($_POST['Branch']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Branch Name","div"=>"Branch"));    
        }
        
        $id = $mysql->insert("_tbl_masters_paymentbanks",array("PaymentBankCode"     => $_POST['PaymentBankCode'],
                                                               "AccountHolderName"     => $_POST['AccountHolderName'],
                                                               "AccountNumber"     => $_POST['AccountNumber'],
                                                               "IFSCode"     => $_POST['IFSCode'],
                                                               "BankName"     => $_POST['BankName'],
                                                               "Branch"     => $_POST['Branch'],
                                                               "Remarks"             => $_POST['Remarks'],
                                                               "CreatedOn"           => date("Y-m-d H:i:s"),
                                                               "IsActive"            => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","PaymentBankCode"=>SequnceList::updateNumber("_tbl_masters_paymentbanks")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
     }
     
     public static function remove() {
         global $mysql;
         $mysql->execute("delete from _tbl_masters_paymentbanks where PaymentBankID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_paymentbanks")));
     }

     public static function listAll() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_paymentbanks");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function listAllActive() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_paymentbanks where IsActive='1'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function getDetailsByID($PaymentBankID) {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_paymentbanks where PaymentBankID='".$PaymentBankID."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }

     public static function doUpdate() {
         global $mysql;
         
          if (strlen(trim($_POST['AccountHolderName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Account Holder Name","div"=>"AccountHolderName"));    
        }
        
        if (strlen(trim($_POST['BankName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Bank Name","div"=>"BankName"));    
        }
                                      
         if (strlen(trim($_POST['AccountNumber']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter Account Number","div"=>"AccountNumber"));    
         } else {
             $dupCode = $mysql->select("select * from _tbl_masters_paymentbanks where AccountNumber='".trim($_POST['AccountNumber'])."' and PaymentBankID<>'".$_POST['PaymentBankID']."'");
             if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Accoun tNumber is already used","div"=>"AccountNumber"));    
             }
         }
         
         if (strlen(trim($_POST['IFSCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter IFSCode","div"=>"IFSCode"));    
        }
        
        
        
        if (strlen(trim($_POST['Branch']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Branch Name","div"=>"Branch"));    
        }
        
         $mysql->execute("update _tbl_masters_paymentbanks set AccountHolderName ='".$_POST['AccountHolderName']."',
                                                            AccountNumber  ='".$_POST['AccountNumber']."',
                                                            IFSCode  ='".$_POST['IFSCode']."',
                                                            BankName  ='".$_POST['BankName']."',
                                                            Branch  ='".$_POST['Branch']."',
                                                            Remarks  ='".$_POST['Remarks']."',
                                                            IsActive ='".$_POST['IsActive']."' where PaymentBankID='".$_POST['PaymentBankID']."'");
                                                          
         return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
     }
     
     public static function getData() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_paymentbanks where PaymentBankID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
      
}
?>