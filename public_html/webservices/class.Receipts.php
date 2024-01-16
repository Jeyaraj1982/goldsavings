<?php
class Receipts {
    
    function listAll() {
        
        global $mysql;
        if (isset($_SESSION['User']['CustomerID'])) {
            $_recentReceipts = $mysql->select("SELECT `ReceiptNumber`,
                                                      `CustomerID`,
                                                      `CustomerName`,
                                                      `ContractCode`, 
                                                      `DueNumber`,
                                                      FORMAT(DueGold, 3) as `DueGold`,
                                                      FORMAT(DueAmount, 2) as `DueAmount`,
                                                      DATE_FORMAT(ReceiptDate,'".appConfig::DATEFORMAT."') as `ReceiptDate`
                                                      FROM 
                                                        `_tbl_receipts` 
                                                      WHERE 
                                                        `CustomerID`='".$_SESSION['User']['CustomerID']."' 
                                                        order by `ReceiptID` desc");
                                           
            return json_encode(array("status"=>"success","data"=>$_recentReceipts));
        }
    
        if (isset($_GET['customer'])) {
            $_recentReceipts = $mysql->select("SELECT `ReceiptNumber`, `CustomerID`, `CustomerName`, DATE_FORMAT(ReceiptDate,'".appConfig::DATEFORMAT."') as `ReceiptDate`, `ContractCode`, FORMAT(DueGold, 3) as `DueGold`, FORMAT(DueAmount, 2) as `DueAmount`, `DueNumber` from `_tbl_receipts` where `CustomerID`='".$_GET['customer']."' order by `ReceiptID` desc");
            return json_encode(array("status"=>"success","data"=>$_recentReceipts));
        }
    
        if (strlen(trim($_POST['FromDate']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Start date","div"=>"message"));    
        } else {
            $fromDate = strtotime($_POST['FromDate']);
            if (!($fromDate<=strtotime(date("Y-m-d")))) {
                return json_encode(array("status"=>"failure","message"=>"Please select valid Start date (date must have lessthan or equal to ".date("d-m-Y").")","div"=>"message"));        
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
        
        if ($_SESSION['User']['UserModule']=="branchadmin" || $_SESSION['User']['UserModule']=="branchuser" ) {
            $_recentReceipts = $mysql->select("SELECT `ReceiptNumber`, `CustomerID`, `CustomerName`, DATE_FORMAT(ReceiptDate,'".appConfig::DATEFORMAT."') as `ReceiptDate`, `ContractCode`, FORMAT(DueGold, 3) as `DueGold`, FORMAT(DueAmount, 2) as `DueAmount`, `DueNumber` from  `_tbl_receipts` where BranchID='".$_SESSION['User']['BranchID']."' and date(ReceiptDate)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(ReceiptDate)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."') order by `ReceiptID` desc");
        }
    
        if ($_SESSION['User']['UserModule']=="admin" ||$_SESSION['User']['UserModule']=="subadmin" ) {
            $_recentReceipts = $mysql->select("SELECT `ReceiptNumber`, `CustomerID`, `CustomerName`, DATE_FORMAT(ReceiptDate,'".appConfig::DATEFORMAT."') as `ReceiptDate`, `ContractCode`, FORMAT(DueGold, 3) as `DueGold`, FORMAT(DueAmount, 2) as `DueAmount`, `DueNumber` from  `_tbl_receipts` where  date(ReceiptDate)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(ReceiptDate)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."') order by `ReceiptID` desc");
        }
        
        if (isset($_SESSION['User']['SalesmanID']) &&  $_SESSION['User']['SalesmanID']>0 ) {
            $_recentReceipts = $mysql->select("SELECT `ReceiptNumber`, `CustomerID`, `CustomerName`, DATE_FORMAT(ReceiptDate,'".appConfig::DATEFORMAT."') as `ReceiptDate`, `ContractCode`, FORMAT(DueGold, 3) as `DueGold`, FORMAT(DueAmount, 2) as `DueAmount`, `DueNumber` from  `_tbl_receipts` where  date(ReceiptDate)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(ReceiptDate)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."') and CustomerID in (select CustomerID from _tbl_masters_customers where BranchID='".$_SESSION['User']['BranchID']."' and AreaNameID in (select AreaNameID from _tbl_salesman_areas where SalesmanID='".$_SESSION['User']['SalesmanID']."')) order by `ReceiptID` desc");
        }
        
        return json_encode(array("status"=>"success","data"=>$_recentReceipts));
    }
     
    function listCustomize() {
        
        global $mysql;
        
        if (isset($_POST['OrderBy']) && $_POST['OrderBy']=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select any one column","div"=>"message"));        
        }
        
        $sql = "select `ReceiptID`,
                       DATE_FORMAT(ReceiptDate,'".appConfig::DATEFORMAT."') as `ReceiptDate`,
                       `ReceiptNumber`,
                       `CustomerID`,
                       `CustomerCode`,
                       `CustomerName`,
                       `MobileNumber`,
                       `ContractID`,
                       `ContractCode`,
                       `DueNumber`,
                       FORMAT(DueAmount, 2) as `DueAmount`,
                       FORMAT(DueGold, 3) as `DueGold`,
                       DATE_FORMAT(PriceOnDate,'".appConfig::DATEFORMAT."') as `PriceOnDate`,
                       FORMAT(PaidAmount, 2) as `PaidAmount`,
                       `PaymentModeID`,
                       `PaymentMode`,
                       `PaymentRemarks`,
                       DATE_FORMAT(CreatedOn,'".appConfig::DATEFORMAT."') as `CreatedOn` 
                        
                   from _tbl_receipts where ReceiptID>0 ";
             
        if (isset($_POST['CustomerNameS']) && $_POST['CustomerNameS']==1) {
            if ($_POST['selectUserFilter']=="0") {
                $sql .= " and CustomerName like '%".$_POST['SearchCustomerName']."%' ";    
            }
            if ($_POST['selectCustomerFilter']=="Startwith") {
                $sql .= " and CustomerName like '".$_POST['SearchCustomerName']."%' ";    
            }
            if ($_POST['selectUserFilter']=="Endwith") {
                $sql .= " and CustomerName like '%".$_POST['SearchCustomerName']."' ";    
            }
        }
        
        if (isset($_POST['MobileNumberS']) && $_POST['MobileNumberS']==1) {
            if ($_POST['selectMobileNumberFilter']=="0") {
                $sql .= " and MobileNumber like '%".trim(str_replace("_","",$_POST['SearchMobileNumber']))."%' ";    
            }
            if ($_POST['selectMobileNumberFilter']=="Startwith") {
                $sql .= " and MobileNumber like '".trim(str_replace("_","",$_POST['SearchMobileNumber']))."%' ";    
            }
            if ($_POST['selectMobileNumberFilter']=="Endwith") {
                $sql .= " and MobileNumber like '%".trim(str_replace("_","",$_POST['SearchMobileNumber']))."' ";    
            }
        }
        
        if (isset($_POST['ReceiptDate']) && $_POST['ReceiptDate']=="1") {
            $fromdate = strtotime($_POST['FromDate']);
            $todate = strtotime($_POST['ToDate']);
            if ($fromdate>$todate) {
                return json_encode(array("status"=>"failure","message"=>"Err","div"=>"ReceiptDate"));        
            }
            $sql .= " and  (date(ReceiptDate)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(ReceiptDate)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."')) ";    
        }
        
        if ($_POST['OrderBy']=="ReceiptDate") {
            $_POST['OrderBy']=" date(ReceiptDate) ";
        }
        if ($_POST['OrderBy']=="PriceOnDate") {
            $_POST['OrderBy']=" date(PriceOnDate) ";
        }
        
        $sql .= " order by ".$_POST['OrderBy']." ".$_POST['Filterby'];
        $data = $mysql->select($sql);
       
        return json_encode(array("status"=>"success","data"=>$data,"sql"=>$sql));
    }
}
?>