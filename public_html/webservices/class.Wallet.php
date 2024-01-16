<?php
class Wallet {
    
    function creditToCustomer() {
        
        global $mysql;
        if ($_POST['PaymentType']=="") {
            return json_encode(array("status"=>"failure","message"=>"Please select Payment Type","div"=>"PaymentType"));    
        }
                                             
        if ($_POST['PaymentType']=="BANK") {
            if ($_POST['PaymentModeID']=="0") {
                return json_encode(array("status"=>"failure","message"=>"Please select Payment Mode","div"=>"PaymentModeID"));    
            }
            if (strlen(trim($_POST['TransactionID']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter TransactionID","div"=>"TransactionID"));    
            }
        }
        if ((trim($_POST['Amount']))<=0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter valid amount","div"=>"Amount"));    
        }
        
        if ($_POST['PaymentRemarks']=="") {
            return json_encode(array("status"=>"failure","message"=>"Please enter payment remarks","div"=>"PaymentRemarks"));    
        }
        
        if (strlen(trim($_POST['CustomerID']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Missing Customer ID","div"=>""));    
        }
        
        $Customer = $mysql->select("select * from  _tbl_masters_customers where CustomerID='".$_POST['CustomerID']."'");
        if (sizeof($Customer)==0) {
            return json_encode(array("status"=>"failure","message"=>"Customer not found","div"=>""));    
        }
        
        if (strlen(trim($_POST['Amount']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter amount","div"=>"Amount"));    
        }
        
        
        
        $PaymentMode = $mysql->select("select * from _tbl_masters_paymentmodes where  PaymentModeID='".$_POST['PaymentModeID']."'");
        $Balance = $mysql->select("select (sum(Credits)-sum(Debits)) as balance from _tbl_wallet where CustomerID='".$Customer[0]['CustomerID']."'");
        $Balance = isset($Balance[0]['balance']) ? $Balance[0]['balance'] : "0.00";
        $NewBalance =  $Balance + $_POST['Amount']; 
        
        if ($_POST['PaymentType']=="CASH") {
            $Particulars="Cr/".$_POST['PaymentType'];
            $TransactionID = "";
            $PaymentMode="";
            $PaymentModeID="0"; 
        } else {              
            $Particulars="Cr/".$_POST['PaymentType']."/".$_POST['TransactionID']; 
            $TransactionID = $_POST['TransactionID'];
            $PaymentMode=$PaymentMode[0]['PaymentMode'];
            $PaymentModeID=$_POST['PaymentModeID'];
        }
        
        $id = $mysql->insert("_tbl_wallet",array("TxnDate"         => date("Y-m-d H:i:s"),
                                                 "EntryDate"       => date("Y-m-d"),
                                                 "TxnRefID"        => "",
                                                 "CustomerID"      => $Customer[0]['CustomerID'],
                                                 "CustomerCode"    => $Customer[0]['CustomerCode'],
                                                 "CustomerName"    => $Customer[0]['CustomerName'],
                                                 "Particulars"     => $Particulars, 
                                                 "Credits"         => $_POST['Amount'],
                                                 "Debits"          => "0",
                                                 "Balance"         => $NewBalance,
                                                 "PaymentType"     => $_POST['PaymentType'],
                                                 "PaymentModeID"   => $PaymentModeID,
                                                 "PaymentMode"     => $PaymentMode,
                                                 "BankTransaction" => $TransactionID,
                                                 "InputParam" => json_encode($_POST),
                                                 "Remarks"         => $_POST['PaymentRemarks']));
        
        if ($id>0) {
            $TxnID = SequnceList::updateNumber("_tbl_wallet");
            $mysql->execute("update _tbl_wallet set TxnRefID='".$TxnID."',Particulars='".$Particulars."/".$TxnID."' where TxnID='".$id."'");
            $mysql->execute("update _tbl_masters_customers set WalletBalance='".$NewBalance."' where CustomerID='".$Customer[0]['CustomerID']."'");
            return json_encode(array("status"=>"success","message"=>"Rs. ".number_format($_POST['Amount'],2)." Credited successfully.<br>TxnID. ".$TxnID."<br>New Balance: ".number_format($NewBalance,2),"balance"=>$NewBalance)); 
        } else {
             return json_encode(array("status"=>"failure","message"=>"Error found, unable to credit amount","div"=>""));    
        }
    }
    
    function getBalance() {
        
        global $mysql;
        
        if (!(isset($_GET['CustomerID']))) {
            return json_encode(array("status"=>"failure","message"=>"Missing Customer ID","div"=>""));    
        }
        
        if (strlen(trim($_GET['CustomerID']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Missing Customer ID","div"=>""));    
        }
        
        $Balance = $mysql->select("select (sum(Credits)-sum(Debits)) as balance from _tbl_wallet where CustomerID='".$_GET['CustomerID']."'");
        $Balance = isset($Balance[0]['balance']) ? $Balance[0]['balance'] : "0.00";
        
        return json_encode(array("status"=>"success","message"=>"","balance"=>$Balance)); 
    }
    
    function listAll() {
         global $mysql;
         if (strlen(trim($_POST['FromDate']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please select Start date","div"=>"message"));    
             } else {
                $fromDate = strtotime($_POST['FromDate']);
                if (!($fromDate<=strtotime(date("Y-m-d")))) {
                    return json_encode(array("status"=>"failure","message"=>"Please select valid Start date (date must have lessthan or equal to ".date("d-m-Y")."","div"=>"message"));        
                }
             }
             
             if (strlen(trim($_POST['ToDate']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please select End date","div"=>"message"));    
             } else {
                $toDate = strtotime($_POST['ToDate']);
                if (!($toDate<=strtotime(date("Y-m-d")))) {
                    return json_encode(array("status"=>"failure","message"=>"Please select valid End date (date must have lessthan or equal to ".date("d-m-Y")."","div"=>"message"));        
                }           
             }
             
             if (!(strtotime($_POST['FromDate'])<=strtotime($_POST['ToDate']))) {
                return json_encode(array("status"=>"failure","message"=>"Please select valid date (Start date must be equal or lessthan End Date)","div"=>"message"));        
             }
             
             if (strlen(trim($_POST['CustomerID']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Missing Customer Reference","div"=>""));    
             }
             $data = $mysql->select("select 
             TxnID,TxnRefID,TxnDate,EntryDate,CustomerID,CustomerCode,CustomerName,Particulars,
             FORMAT(Credits, 2) as `Credits`,
             FORMAT(Debits, 2) as `Debits`,
             FORMAT(Balance, 2) as `Balance`,
             PaymentType,
             PaymentMode,
             BankTransaction,
             Remarks
             
              from _tbl_wallet where CustomerID='".$_POST['CustomerID']."' and ( date(EntryDate)>=date('".(date("Y-m-d",strtotime($_POST['FromDate'])))."') and date(EntryDate)<=date('".(date("Y-m-d",strtotime($_POST['ToDate'])))."') )");
             return json_encode(array("status"=>"success","data"=>$data));
    }
    
    function getData() {
        
        global $mysql;
        
        if (!(isset($_GET['ID']))) {
            return json_encode(array("status"=>"failure","message"=>"Missing Customer Reference","div"=>""));    
        }
        $data = $mysql->select("select 
                TxnID,TxnRefID,TxnDate,EntryDate,CustomerID,CustomerCode,CustomerName,Particulars,
             FORMAT(Credits, 2) as `Credits`,
             FORMAT(Debits, 2) as `Debits`,
             FORMAT(Balance, 2) as `Balance`,
             PaymentType,
             PaymentMode,
             BankTransaction,
             Remarks                                
             
              from _tbl_wallet where TxnID='".$_GET['ID']."'");
             return json_encode(array("status"=>"success","data"=>$data));
    }
}
?>