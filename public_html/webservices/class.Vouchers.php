<?php
class Vouchers {
    
    function listAll() {
        
        global $mysql;
        
        if (isset($_SESSION['User']['CustomerID'])) {
            $data = $mysql->select("select * from  _tbl_vouchers Where CustomerID='".$_SESSION['User']['CustomerID']."' order by VoucherID desc");
            $_recentVouchers = array();
            foreach($data as $voucher) {
                $tmp=array(); 
                $tmp['VoucherNumber']=$voucher['VoucherNumber'];
                $tmp['VoucherDate']= date("d-m-Y",strtotime($voucher['VoucherDate']));
                $tmp['ContractCode']=$voucher['ContractCode'];
                $tmp['VoucherType']=$voucher['VoucherType'];
                $tmp['GoldInGrams']=$voucher['GoldInGrams'];
                $tmp['MaterialType']=$voucher['MaterialType'];
                $tmp['TotalPaidAmount']=number_format($voucher['TotalPaidAmount'],2);
                $_recentVouchers[]=$tmp; 
            }
            return json_encode(array("status"=>"success","data"=>$_recentVouchers));
        }
        
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
    
        $data = $mysql->select("select * from  _tbl_vouchers where date(VoucherDate)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(VoucherDate)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."') order by VoucherID desc");
    
        $_recentVouchers = array();
        foreach($data as $voucher) {
            $tmp=array(); 
            $tmp['VoucherNumber']=$voucher['VoucherNumber'];
            $tmp['VoucherDate']= date("d-m-Y",strtotime($voucher['VoucherDate']));
            $tmp['ContractCode']=$voucher['ContractCode'];
            $tmp['GoldInGrams']=$voucher['GoldInGrams'];
            $tmp['CustomerName']=$voucher['CustomerName'];
            $tmp['TotalPaidAmount']=$voucher['TotalPaidAmount']; 
            $tmp['VoucherType']=$voucher['VoucherType'];
            $tmp['MaterialType']=$voucher['MaterialType'];
            $tmp['TotalPaidAmount']=number_format($voucher['TotalPaidAmount'],2);
            $_recentVouchers[]=$tmp; 
        }
                
        return json_encode(array("status"=>"success","data"=>$_recentVouchers));
    }
    
    function listCustomize() {
        
        global $mysql;
        
        if (isset($_POST['OrderBy']) && $_POST['OrderBy']=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select any one column","div"=>"message"));        
        }
        
        $sql = "select `VoucherID`,
                       DATE_FORMAT(VoucherDate,'".appConfig::DATEFORMAT."') as `VoucherDate`,
                       `VoucherNumber`,
                       `CustomerID`,
                       `CustomerCode`,
                       `CustomerName`,
                       `MobileNumber`,
                       `ContractID`,
                       `ContractCode`,
                       FORMAT(GoldInGrams, 3) as `GoldInGrams`,
                       FORMAT(TotalPaidAmount, 2) as `TotalPaidAmount`,
                       FORMAT(WastageDiscount, 2) as `WastageDiscount`,
                       FORMAT(MakingChargeDiscount, 2) as `MakingChargeDiscount`,
                       FORMAT(BonusPercentage, 2) as `BonusPercentage`,
                       FORMAT(BonusAmount, 2) as `BonusAmount`,
                       FORMAT(TotalPaidAmount, 2) as `TotalPaidAmount`,
                       `VoucherType`,
                       `MaterialType`,
                       `VoucherStatus`,
                       DATE_FORMAT(StatusDate,'".appConfig::DATEFORMAT."') as `StatusDate`,
                       DATE_FORMAT(CreatedOn,'".appConfig::DATEFORMAT."') as `CreatedOn`
                   from _tbl_vouchers where VoucherID>0 ";
        
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
        
        if (isset($_POST['VoucherStatus']) && $_POST['VoucherStatus']==1) {
            if ($_POST['selectVoucherStatusFilter']=="Issued") {
                $sql .= " and VoucherStatus = 'Issued' ";    
            }
            if ($_POST['selectVoucherStatusFilter']=="Endwith") {
                $sql .= " and VoucherStatus = 'Settled' ";    
            }
        }
        
        if (isset($_POST['VoucherDate']) && $_POST['VoucherDate']=="1") {
            $fromdate = strtotime($_POST['FromDate']);
            $todate = strtotime($_POST['ToDate']);
            if ($fromdate>$todate) {
                return json_encode(array("status"=>"failure","message"=>"Err","div"=>"VoucherDate"));        
            }
            
            $sql .= " and  (date(VoucherDate)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(VoucherDate)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."')) ";    
        }
        
        if ($_POST['OrderBy']=="VoucherDate") {
            $_POST['OrderBy']=" date(VoucherDate) ";
        }
        
        $sql .= " order by ".$_POST['OrderBy']." ".$_POST['Filterby'];
        $data = $mysql->select($sql);
        return json_encode(array("status"=>"success","data"=>$data,"sql"=>$sql));
    }
}
?>