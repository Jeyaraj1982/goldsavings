<?php
include_once("config.php"); 
include_once("webservices/class.AreaNames.php");
include_once("webservices/class.Customers.php");
include_once("webservices/class.CustomerTypes.php");
include_once("webservices/class.DistrictNames.php");
include_once("webservices/class.DocumentTypes.php");
include_once("webservices/class.Employees.php");
include_once("webservices/class.EmployeeCategories.php");
include_once("webservices/class.FileExtensions.php");
include_once("webservices/class.GoldRates.php");
include_once("webservices/class.Profile.php");
include_once("webservices/class.StateNames.php");
include_once("webservices/class.Schemes.php");


include_once("webservices/class.AddressBook.php");
include_once("webservices/class.Benefits.php");
include_once("webservices/class.Contracts.php");
include_once("webservices/class.Companies.php");
include_once("webservices/class.Events.php");
include_once("webservices/class.Salesman.php");
include_once("webservices/class.Users.php");
include_once("webservices/class.UserRoles.php");
include_once("webservices/class.RelationNames.php");
include_once("webservices/class.PaymentModes.php");


function fileUpload() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $uploadDir = 'tmp/';
    $fileName = uniqid() . '_' . $file['name'];
    if (move_uploaded_file($file['tmp_name'], $uploadDir . $fileName)) {
        echo $fileName;
    } else {
        echo "error";
    }
}
}

function getDashboardData() {
    global $mysql;
    $recentContracts = $mysql->select("select * from  _tbl_contracts order by ContractID desc limit 0,5");
    $recentCustomers = $mysql->select("select * from  _tbl_masters_customers order by CustomerID desc limit 0,5");
    $recentReceipts = $mysql->select("select * from  _tbl_receipts order by ReceiptID desc limit 0,5");
    $recentVouchers = $mysql->select("select * from  _tbl_vouchers order by VoucherID desc limit 0,5");
    $pendingDues = $mysql->select("select * from  _tbl_contracts_dues where ReceiptID=0 and date(DueDate)<=date('".date("Y-m-d")."') order by DueID desc limit 0,5");
    
    $todaGoldRates = $mysql->select("select * from _tbl_masters_goldrates where date(Date)=date('".date("Y-m-d")."')");
    
    $activeCustomers=0;
    $totalContracts=0;
    $closedContracts=0;
    $activeContracts=0;
    $receviedAmounts=0;
    $data = array
     (
        "recentContracts"=>$recentContracts,
        "recentCustomers"=>$recentCustomers,
        "recentReceipts"=>$recentReceipts,
        "recentVouchers"=>$recentVouchers,
        "pendingDues"=>$pendingDues,
        "todaGoldRates"=>$todaGoldRates,
        
     );
     
     return json_encode(array("status"=>"success","data"=>$data));

}

function getVouchers() {
    
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
    
    $data = $mysql->select("select * from  _tbl_vouchers where date(VoucherDate)>=date('".$_POST['FromDate']."') and date(VoucherDate)<=date('".$_POST['ToDate']."') order by VoucherID desc");
    return json_encode(array("status"=>"success","data"=>$data));
}

function getReceipts() {
    global $mysql;
    
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

    
    $data = $mysql->select("select * from  _tbl_receipts where date(ReceiptDate)>=date('".$_POST['FromDate']."') and date(ReceiptDate)<=date('".$_POST['ToDate']."') order by ReceiptID desc");
    return json_encode(array("status"=>"success","data"=>$data));
}


if (isset($_GET['method'])) {     
    $class=$_GET['method'];
    $action=$_GET['action'];
    $ws = new $class();
    echo $ws->$action();
} else {
    echo $_GET['action']();
}
?>