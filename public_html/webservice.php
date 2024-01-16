<?php
include_once("config.php"); 
function hideMobilNumber($number) {
    $number = array_map('intval', str_split(trim($number)));
     return $number[0].$number[1]."X"."X"."X"."X"."X".$number[7].$number[8].$number[9];
}
function isLogged() {
    if (isset($_SESSION['User']['IsActive'])) {
        return true;
    }
    return false;
}
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
include_once("webservices/class.PaymentBanks.php");
include_once("webservices/class.PaymentRequests.php"); 
include_once("webservices/class.Branch.php"); 
include_once("webservices/class.Vouchers.php"); 
include_once("webservices/class.Receipts.php"); 
include_once("webservices/class.Administrators.php"); 
include_once("webservices/class.Wallet.php"); 


class MailController {
    
    public static function sendMail($to,$customerName,$subject,$msgbody) {
        
        global $mail,$mysql;
        
        $mail->isSMTP(); 
        $mail->SMTPDebug = 0; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
        $mail->Host = "mail.nexifysoftware.in"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
        $mail->Port = 465; // TLS only 587
        $mail->SMTPSecure = 'ssl'; // ssl is depracated tls
        $mail->SMTPAuth = true;
        $mail->Username = "support@nexifysoftware.in";
        $mail->Password = "Welcome@@1982";        
        $mail->setFrom("support@nexifysoftware.in", "nexifysoftware");
        $mail->addAddress($to,$customerName);
        $mail->Subject = $subject;
        $mail->msgHTML($msgbody); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
        $mail->AltBody = 'HTML messaging not supported';
        // $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file
        //$mail->addAttachment('logo.png'); //Attach an image file
        if(!$mail->send()){
            return "Mailer Error: " . $mail->ErrorInfo;
        } else{
            return "Message sent!";
        }
    }
}

function IsValidPanCard($pannumber) {
    if (!preg_match("/^([a-zA-Z]){5}([0-9]){4}([a-zA-Z]){1}?$/", $pannumber)) {
        return false;
    }
    return true;
}

function IsValidEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
       return true;
    }
    return false;
}

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
    
    $todaGoldRates = $mysql->select("select * from _tbl_masters_goldrates where date(Date)=date('".date("Y-m-d")."')");
    
    $days_before="7";
    $date = date('Y-m-d', strtotime(date("Y-m-d"). ' - '.$days_before.' days'));
    
    $goldRates = $mysql->select("select DATE_FORMAT(Date,'".appConfig::DATEFORMAT."') as `Date`,GOLD_18,GOLD_22,GOLD_24,SILVER from _tbl_masters_goldrates where  date(Date)>date('".$date."') order by date(Date)");
    
    if (isset($_SESSION['User']['CustomerID'])) {
        
        $_recentContracts=array();
        $recentContracts = $mysql->select("select * from  _tbl_contracts where CustomerID='".$_SESSION['User']['CustomerID']."' order by ContractID desc limit 0,5");
        foreach($recentContracts as $recentContract) {
            $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and CustomerID='".$_SESSION['User']['CustomerID']."' and ContractID='".$recentContract['ContractID']."'");
            $tmp=array();
            $tmp['ContractCode']= $recentContract['ContractCode'];
            $tmp['SchemeID']=  $recentContract['SchemeID'];
            $tmp['SchemeName']= $recentContract['SchemeName'];
            $tmp['ContractAmount']= number_format($recentContract['ContractAmount'],2);
            $tmp['StartDate']= date("d-m-Y",strtotime($recentContract['StartDate']));
            $tmp['EndDate']= date("d-m-Y",strtotime($recentContract['EndDate']));
            $tmp['IsActive']= $recentContract['IsActive'];
            
            if ($tmp['IsActive']=="1"){
                $tmp['StatusString']= "Active";
            }
            
            if ($recentContract['IsClosed']=="1"){
                $tmp['IsActive']="3";
                $tmp['StatusString']= "Closed";
            }
            
            $tmp['Receipts']= sizeof($dues);
            $tmp['VoucherNumber']= $recentContract['VoucherNumber'];
            $_recentContracts[]=$tmp; 
        }
        
        $_recentReceipts = array();
        $recentReceipts = $mysql->select("select * from  _tbl_receipts where CustomerID='".$_SESSION['User']['CustomerID']."'  order by ReceiptID desc limit 0,5");
        foreach($recentReceipts as $recentReceipt) {
            $tmp=array(); 
            $tmp['ReceiptNumber']=$recentReceipt['ReceiptNumber'];
            $tmp['ReceiptDate']= date("d-m-Y",strtotime($recentReceipt['ReceiptDate']));
            $tmp['ContractCode']=$recentReceipt['ContractCode'];
            $tmp['DueGold']=number_format($recentReceipt['DueGold'],3);
            $tmp['DueAmount']= number_format($recentReceipt['DueAmount'],2);
            $tmp['DueNumber']= $recentReceipt['DueNumber'];
            $_recentReceipts[]=$tmp; 
        }
        
        $_recentVouchers = array();
        $recentVouchers = $mysql->select("select * from  _tbl_vouchers  where CustomerID='".$_SESSION['User']['CustomerID']."' order by VoucherID desc limit 0,5");
        foreach($recentVouchers as $voucher) {
            $tmp=array(); 
            $tmp['VoucherNumber']=$voucher['VoucherNumber'];
            $tmp['VoucherDate']= date("d-m-Y",strtotime($voucher['VoucherDate']));
            $tmp['ContractCode']=$voucher['ContractCode'];
            $tmp['GoldInGrams']=number_format($voucher['GoldInGrams'],3);
            $tmp['TotalPaidAmount']=number_format($voucher['TotalPaidAmount'],2);
            $tmp['VoucherType'] = $voucher['VoucherType'];
            $_recentVouchers[]=$tmp; 
        }
        
        $_pendingDues=array();
        $pendingDues = $mysql->select("select * from  _tbl_contracts_dues where CustomerID='".$_SESSION['User']['CustomerID']."' and ReceiptID=0 and date(DueDate)<=date('".date("Y-m-d")."') order by DueID desc limit 0,5");
        foreach($pendingDues as $pendingDue) {
            $tmp=array(); 
            $tmp['DueID']        = $pendingDue['DueID'];
            $tmp['DueNumber']    = $pendingDue['DueNumber'];
            $tmp['DueDate']      = date("d-m-Y",strtotime($pendingDue['DueDate']));
            $tmp['DueAmount']    = number_format($pendingDue['DueAmount'],2);
            $tmp['CustomerID']   = $pendingDue['CustomerID'];
            $tmp['CustomerName'] = $pendingDue['CustomerName'];
            $tmp['ContractID']   = $pendingDue['ContractID'];
            $tmp['ContractCode'] = $pendingDue['ContractCode'];
            $tmp['SchemeID']     = $pendingDue['SchemeID'];
            $tmp['SchemeCode']   = $pendingDue['SchemeCode'];
            $tmp['SchemeName']   = $pendingDue['SchemeName'];
            $tmp['DaysBefore']   = (strtotime(date("Y-m-d"))-strtotime($pendingDue['DueDate']))/(60*60*24);
            $_pendingDues[]=$tmp; 
        }
        
        $_upcommingDues=array();
        $upcommingDues = $mysql->select("select * from  _tbl_contracts_dues where CustomerID='".$_SESSION['User']['CustomerID']."' and ReceiptID=0 and date(DueDate)>=date('".date("Y-m-d")."') order by DueID limit 0,1");
        foreach($upcommingDues as $upcommingDue) {
            $tmp=array(); 
            $tmp['DueID']        = $upcommingDue['DueID'];
            $tmp['DueNumber']    = $upcommingDue['DueNumber'];
            $tmp['DueDate']      = date("d-m-Y",strtotime($upcommingDue['DueDate']));
            $tmp['DueAmount']    = number_format($upcommingDue['DueAmount'],2);
            $tmp['CustomerID']   = $upcommingDue['CustomerID'];
            $tmp['CustomerName'] = $upcommingDue['CustomerName'];
            $tmp['ContractID']   = $upcommingDue['ContractID'];
            $tmp['ContractCode'] = $upcommingDue['ContractCode'];
            $tmp['SchemeID']     = $upcommingDue['SchemeID'];
            $tmp['SchemeCode']   = $upcommingDue['SchemeCode'];
            $tmp['SchemeName']   = $upcommingDue['SchemeName'];
            $_upcommingDues[]=$tmp; 
        }
        
        $_paymentrequests = array();
        $paymentrequests = $mysql->select("select * from _tbl_payemt_requests where CustomerID='".$_SESSION['User']['CustomerID']."' order by PaymentRequestID desc");
        foreach($paymentrequests as $paymentrequest) {
            $tmp=array(); 
            $tmp['PaymentRequestID']        = $paymentrequest['PaymentRequestID'];
            $tmp['RequestCode']        = $paymentrequest['RequestCode'];
            $tmp['PaymentDate']      = date("d-m-Y",strtotime($paymentrequest['PaymentDate']));
            $tmp['DueAmount']    = number_format($paymentrequest['DueAmount'],2);
            $tmp['ContactCode']   = $paymentrequest['ContactCode'];
            $tmp['PaymentBankAccountHolderName']   = $paymentrequest['PaymentBankAccountHolderName'];
            $tmp['PaymentBankName'] = $paymentrequest['PaymentBankName'];
            $tmp['PaymentBankNumber']   = $paymentrequest['PaymentBankNumber'];
            $tmp['PaymentBankIFSCode'] = $paymentrequest['PaymentBankIFSCode'];
            $tmp['BankReferenceNumber']     = $paymentrequest['BankReferenceNumber'];
            $tmp['Frequency']     = $paymentrequest['Frequency'];
            $tmp['RequestStatus']   = $paymentrequest['RequestStatus'];
            $tmp['RequestedOn']   = $paymentrequest['RequestedOn'];
            $_paymentrequests[]=$tmp;                
        } 
        
        $_recentClosedContracts=array();
        $recentClosedContracts = $mysql->select("select * from  _tbl_contracts where IsClosed='1' and CustomerID='".$_SESSION['User']['CustomerID']."' order by ContractID desc limit 0,5");
        foreach($recentClosedContracts as $recentClosedContract) {
            $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and   ContractID='".$recentContract['ContractID']."'");
            $tmp=array();
            $tmp['ContractCode']= $recentClosedContract['ContractCode'];
            $tmp['SchemeID']=  $recentClosedContract['SchemeID'];
            $tmp['SchemeName']= $recentClosedContract['SchemeName'];
            $tmp['StartDate']= date("d-m-Y",strtotime($recentClosedContract['StartDate']));
            $tmp['EndDate']= date("d-m-Y",strtotime($recentClosedContract['EndDate']));
            $tmp['CustomerID']= $recentClosedContract['CustomerID'];
            $tmp['CustomerCode']= $recentClosedContract['CustomerCode'];
            $tmp['ContractAmount']= number_format($recentClosedContract['ContractAmount'],2);
            $tmp['ClosedOn']= date("d-m-Y",strtotime($recentClosedContract['ClosedOn']));
            $tmp['Receipts'] = sizeof($dues);
            $tmp['VoucherNumber']= $recentContract['VoucherNumber'];
            $_recentClosedContracts[]=$tmp; 
        } 
    
        $mydownlines     = $mysql->select("select * from _tbl_masters_customers WHERE ReferByText='Customer' and ReferredByID='".$_SESSION['User']['CustomerID']."'");    
        $closedContracts = $mysql->select("SELECT * FROM _tbl_contracts WHERE CustomerID='".$_SESSION['User']['CustomerID']."' and IsClosed='1'");
        $activeContracts = $mysql->select("SELECT * FROM _tbl_contracts WHERE CustomerID='".$_SESSION['User']['CustomerID']."' and IsActive='1' and IsClosed='0'");
        $receivedAmount  = $mysql->select("SELECT sum(DueAmount) as Amount FROM _tbl_receipts WHERE CustomerID='".$_SESSION['User']['CustomerID']."' and date(ReceiptDate)='".date("Y-m-d")."'");
        $activeSchemes   = $mysql->select("SELECT *  FROM _tbl_masters_schemes WHERE IsActive='1'");
        
        $data = array("recentContracts"       => $_recentContracts,
                      "recentReceipts"        => $_recentReceipts,
                      "recentVouchers"        => $_recentVouchers,
                      "pendingDues"           => $_pendingDues,
                      "upcommingDues"         => $_upcommingDues,
                      "paymentrequests"       => $_paymentrequests,
                      "recentClosedContracts" => $_recentClosedContracts,
                      "todaGoldRates"         => $todaGoldRates,
                      "goldRates"             => $goldRates,
                      "additionalInfo"        => array("closedContracts" => sizeof($closedContracts),
                                                       "activeContracts" => sizeof($activeContracts),
                                                       "pendingDues"     => sizeof($pendingDues),
                                                       "myDownlines"     => sizeof($mydownlines),
                                                       "activeSchemes"   => sizeof($activeSchemes),
                                                       "upcommingDues"   => sizeof($_upcommingDues)));
        return json_encode(array("status"=>"success","data"=>$data)); 
    }
    
    if (isset($_SESSION['User']['SalesmanID'])) {
        $closedContracts=$mysql->select("SELECT * FROM _tbl_contracts WHERE IsClosed='1'");
        $activeContracts=$mysql->select("SELECT * FROM _tbl_contracts WHERE IsActive='1' and IsClosed='0'");
        $activeCustomers=$mysql->select("SELECT * FROM _tbl_masters_customers WHERE   BranchID='".$_SESSION['User']['BranchID']."' and AreaNameID in (select AreaNameID from _tbl_salesman_areas where SalesmanID='".$_SESSION['User']['SalesmanID']."' and IsActive='1') ");
        $receivedAmount=$mysql->select("SELECT sum(DueAmount) as Amount FROM _tbl_receipts WHERE date(ReceiptDate)='".date("Y-m-d")."'");

        $_recentCustomers = array();
        $recentCustomers = $mysql->select("select * from  _tbl_masters_customers where BranchID='".$_SESSION['User']['BranchID']."' and AreaNameID in (select AreaNameID from _tbl_salesman_areas where SalesmanID='".$_SESSION['User']['SalesmanID']."' and IsActive='1') order by CustomerID desc limit 0,5");
        foreach($recentCustomers as $_recentCustomer) {
            $tmp=array(); 
            $tmp['CustomerID']=$_recentCustomer['CustomerID'];
            $tmp['CustomerCode']=$_recentCustomer['CustomerCode'];
            $tmp['CustomerName']=$_recentCustomer['CustomerName'];
            $tmp['MobileNumber']=$_recentCustomer['MobileNumber'];
            $tmp['CustomerTypeName']=$_recentCustomer['CustomerTypeName'];
            $tmp['ReferredByName']=$_recentCustomer['ReferredByName'];
            $tmp['ReferByText']=$_recentCustomer['ReferByText'];
            $tmp['ReferredID']=$_recentCustomer['ReferredByID'];
            $tmp['CreatedOn']= date("d-m-Y H:i",strtotime($_recentCustomer['CreatedOn']));
            $_recentCustomers[]=$tmp; 
        }
        
        $_recentReceipts = array();
        $recentReceipts = $mysql->select("select * from  _tbl_receipts order by ReceiptID desc limit 0,5");
        foreach($recentReceipts as $recentReceipt) {
            $tmp=array(); 
            $tmp['ReceiptNumber']=$recentReceipt['ReceiptNumber'];
            $tmp['ReceiptDate']= date("d-m-Y",strtotime($recentReceipt['ReceiptDate']));
            $tmp['ContractCode']=$recentReceipt['ContractCode'];
            $tmp['CustomerName']=$recentReceipt['CustomerName'];
            $tmp['DueGold']=$recentReceipt['DueGold'];
            $tmp['DueAmount']= $recentReceipt['DueAmount'];
            $tmp['DueNumber']= $recentReceipt['DueNumber'];
            $_recentReceipts[]=$tmp; 
        }
         
        $_recentVouchers = array();
        $recentVouchers = $mysql->select("select * from  _tbl_vouchers order by VoucherID desc limit 0,5");
        foreach($recentVouchers as $voucher) {
            $tmp=array(); 
            $tmp['VoucherNumber']=$voucher['VoucherNumber'];
            $tmp['VoucherDate']= date("d-m-Y",strtotime($voucher['VoucherDate']));
            $tmp['ContractCode']=$voucher['ContractCode'];
            $tmp['CustomerName']=$voucher['CustomerName'];
            $tmp['GoldInGrams']=$voucher['GoldInGrams'];
            $tmp['TotalPaidAmount']=$voucher['TotalPaidAmount'];
            $tmp['VoucherType'] = $voucher['VoucherType'];
            $_recentVouchers[]=$tmp; 
        } 
            
        $_recentContracts=array();
        $recentContracts = $mysql->select("select * from  _tbl_contracts where IsClosed='0' order by ContractID desc limit 0,5");
        foreach($recentContracts as $recentContract) {
            $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and   ContractID='".$recentContract['ContractID']."'");
            $tmp=array();
            $tmp['ContractCode']= $recentContract['ContractCode'];
            $tmp['SchemeID']=  $recentContract['SchemeID'];
            $tmp['SchemeName']= $recentContract['SchemeName'];
            $tmp['StartDate']= date("d-m-Y",strtotime($recentContract['StartDate']));
            $tmp['EndDate']= date("d-m-Y",strtotime($recentContract['EndDate']));
            
            $tmp['CustomerName']= $recentContract['CustomerName'];
            $tmp['CustomerID']= $recentContract['CustomerID'];
            $tmp['CustomerCode']= $recentContract['CustomerCode'];
            $tmp['ContractAmount']= number_format($recentContract['ContractAmount'],2);
            
            $tmp['IsActive']= $recentContract['IsActive'];
            
            if ($tmp['IsActive']=="1"){
                $tmp['StatusString']= "Active";
            }
            
            if ($recentContract['IsClosed']=="1"){
                $tmp['IsActive']="3";
                $tmp['StatusString']= "Closed";
            }
            
            $tmp['Receipts']= sizeof($dues);
            $tmp['VoucherNumber']= $recentContract['VoucherNumber'];
            $_recentContracts[]=$tmp; 
        } 
        
        $_recentClosedContracts=array();
        $recentClosedContracts = $mysql->select("select * from  _tbl_contracts where IsClosed='1' order by ContractID desc limit 0,5");
        foreach($recentClosedContracts as $recentClosedContract) {
            $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and   ContractID='".$recentContract['ContractID']."'");
            $tmp=array();
            $tmp['ContractCode']= $recentClosedContract['ContractCode'];
            $tmp['SchemeID']=  $recentClosedContract['SchemeID'];
            $tmp['SchemeName']= $recentClosedContract['SchemeName'];
            $tmp['StartDate']= date("d-m-Y",strtotime($recentClosedContract['StartDate']));
            $tmp['EndDate']= date("d-m-Y",strtotime($recentClosedContract['EndDate']));
            
            $tmp['CustomerName']= $recentClosedContract['CustomerName'];
            $tmp['CustomerID']= $recentClosedContract['CustomerID'];
            $tmp['CustomerCode']= $recentClosedContract['CustomerCode'];
            $tmp['ContractAmount']= number_format($recentClosedContract['ContractAmount'],2);
            
            $tmp['ClosedOn']= date("d-m-Y",strtotime($recentClosedContract['ClosedOn']));
            $tmp['VoucherType'] = $recentClosedContract['VoucherType'];
            $tmp['Receipts'] = sizeof($dues);
            $tmp['VoucherNumber']= $recentClosedContract['VoucherNumber'];
            $_recentClosedContracts[]=$tmp; 
        }  
        
        $_pendingDues=array();
        $pendingDues = $mysql->select("select * from  _tbl_contracts_dues where ReceiptID=0 and date(DueDate)<=date('".date("Y-m-d")."') order by DueID desc limit 0,5");
        foreach($pendingDues as $pendingDue) {
            $tmp=array(); 
            $tmp['DueID']        = $pendingDue['DueID'];
            $tmp['DueNumber']    = $pendingDue['DueNumber'];
            $tmp['DueDate']      = date("d-m-Y",strtotime($pendingDue['DueDate']));
            $tmp['DueAmount']    = number_format($pendingDue['DueAmount'],2);
            $tmp['CustomerID']   = $pendingDue['CustomerID'];
            $tmp['CustomerName'] = $pendingDue['CustomerName'];
            $tmp['ContractID']   = $pendingDue['ContractID'];
            $tmp['ContractCode'] = $pendingDue['ContractCode'];
            $tmp['SchemeID']     = $pendingDue['SchemeID'];
            $tmp['SchemeCode']   = $pendingDue['SchemeCode'];
            $tmp['SchemeName']   = $pendingDue['SchemeName'];
            $tmp['DaysBefore']   = (strtotime(date("Y-m-d"))-strtotime($pendingDue['DueDate']))/(60*60*24);
            $_pendingDues[]=$tmp; 
        }
        
        $_paymentrequests = array();
        $paymentrequests = $mysql->select("select * from _tbl_payemt_requests where  RequestStatus='REQUEST' order by PaymentRequestID desc");
        foreach($paymentrequests as $paymentrequest) {
            $tmp=array(); 
            
            $tmp['PaymentRequestID']     = $paymentrequest['PaymentRequestID'];
            $tmp['RequestCode']          = $paymentrequest['RequestCode'];
            $tmp['PaymentDate']          = date("d-m-Y",strtotime($paymentrequest['PaymentDate']));
            $tmp['DueAmount']            = number_format($paymentrequest['DueAmount'],2);
            $tmp['ContractCode']         = $paymentrequest['ContractCode'];
            $tmp['CustomerName']         = $paymentrequest['CustomerName'];
            $tmp['CustomerCode']         = $paymentrequest['CustomerCode'];
            $tmp['PaymentBankAccountHolderName']   = $paymentrequest['PaymentBankAccountHolderName'];
            $tmp['PaymentBankName']     = $paymentrequest['PaymentBankName'];
            $tmp['PaymentBankNumber']   = $paymentrequest['PaymentBankNumber'];
            $tmp['PaymentBankIFSCode']  = $paymentrequest['PaymentBankIFSCode'];
            $tmp['BankReferenceNumber'] = $paymentrequest['BankReferenceNumber'];
            $tmp['RequestStatus']       = $paymentrequest['RequestStatus'];
            $tmp['RequestedOn']         = $paymentrequest['RequestedOn'];
            $tmp['Frequency']           = $paymentrequest['Frequency'];
            
            $_paymentrequests[]=$tmp;                
        } 
        
        $assigned_area = $mysql->select("select * from _tbl_salesman_areas where IsActive='1' and SalesmanID='".$_SESSION['User']['SalesmanID']."'");
        
        $data = array("recentContracts"       => $_recentContracts,
                      "recentCustomers"       => $_recentCustomers,
                      "recentReceipts"        => $_recentReceipts,
                      "recentVouchers"        => $_recentVouchers,
                      "pendingDues"           => $_pendingDues,
                      "paymentrequests"       => $_paymentrequests,
                      "todaGoldRates"         => $todaGoldRates,
                      "recentClosedContracts" => $_recentClosedContracts,
                      "assigned_area"         => $assigned_area,
                      "goldRates" => $goldRates,
                      "additionalInfo"        => array("closedContracts" => sizeof($closedContracts),
                                                       "activeContracts" => sizeof($activeContracts),
                                                       "activeCustomers" => sizeof($activeCustomers),
                                                       "receivedAmount"  => number_format(((isset($receivedAmount[0]['Amount']))? $receivedAmount[0]['Amount'] : "0"),2))
                      );
         
         return json_encode(array("status"=>"success","data"=>$data));
    }
    
    if ($_SESSION['User']['UserModule']=="branchadmin" || $_SESSION['User']['UserModule']=="branchuser" ) {
        $closedContracts=$mysql->select("SELECT * FROM _tbl_contracts WHERE IsClosed='1' and  BranchID='".$_SESSION['User']['BranchID']."'");
        $activeContracts=$mysql->select("SELECT * FROM _tbl_contracts WHERE IsActive='1' and IsClosed='0' and  BranchID='".$_SESSION['User']['BranchID']."'");
        $activeCustomers=$mysql->select("SELECT * FROM _tbl_masters_customers WHERE IsActive='1' and  BranchID='".$_SESSION['User']['BranchID']."'");
        $receivedAmount=$mysql->select("SELECT sum(DueAmount) as Amount FROM _tbl_receipts WHERE date(ReceiptDate)='".date("Y-m-d")."' and  BranchID='".$_SESSION['User']['BranchID']."'");

        $_recentCustomers = array();                   
        $recentCustomers = $mysql->select("select * from  _tbl_masters_customers where BranchID='".$_SESSION['User']['BranchID']."' order by CustomerID desc limit 0,5");
        
        $_recentReceipts = array();
        $recentReceipts = $mysql->select("select * from  _tbl_receipts where BranchID='".$_SESSION['User']['BranchID']."' order by ReceiptID desc limit 0,5");
        
        $_recentVouchers = array();
        $recentVouchers = $mysql->select("select * from  _tbl_vouchers where BranchID='".$_SESSION['User']['BranchID']."' order by VoucherID desc limit 0,5");
        
        $_recentContracts=array();
        $recentContracts = $mysql->select("select * from  _tbl_contracts where IsClosed='0' and  BranchID='".$_SESSION['User']['BranchID']."' order by ContractID desc limit 0,5");
        
        $_recentClosedContracts=array();
        $recentClosedContracts = $mysql->select("select * from  _tbl_contracts where IsClosed='1' and  BranchID='".$_SESSION['User']['BranchID']."' order by ContractID desc limit 0,5");
        
        $_pendingDues=array();
        $pendingDues = $mysql->select("select * from  _tbl_contracts_dues where ReceiptID=0 and date(DueDate)<=date('".date("Y-m-d")."') order by DueID desc limit 0,5");
        
        $_paymentrequests = array();
        $paymentrequests = $mysql->select("select * from _tbl_payemt_requests where  RequestStatus='REQUEST' order by PaymentRequestID desc");
    
    }
   
   
    if ($_SESSION['User']['UserModule']=="admin" || $_SESSION['User']['UserModule']=="subadmin" ) {
        //$_recentReceipts = $mysql->select("SELECT `ReceiptNumber`, `CustomerID`, `CustomerName`, DATE_FORMAT(ReceiptDate,'".appConfig::DATEFORMAT."') as `ReceiptDate`, `ContractCode`, FORMAT(DueGold, 3) as `DueGold`, FORMAT(DueAmount, 2) as `DueAmount`, `DueNumber` from  `_tbl_receipts` where BranchID='".$_SESSION['User']['BranchID']."' and date(ReceiptDate)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(ReceiptDate)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."') order by `ReceiptID` desc");
        $closedContracts=$mysql->select("SELECT * FROM _tbl_contracts WHERE IsClosed='1'");
        $activeContracts=$mysql->select("SELECT * FROM _tbl_contracts WHERE IsActive='1' and IsClosed='0'");
        $activeCustomers=$mysql->select("SELECT * FROM _tbl_masters_customers WHERE IsActive='1'");
        $receivedAmount=$mysql->select("SELECT sum(DueAmount) as Amount FROM _tbl_receipts WHERE date(ReceiptDate)='".date("Y-m-d")."'");

        $_recentCustomers = array();
        $recentCustomers = $mysql->select("select * from  _tbl_masters_customers  order by CustomerID desc limit 0,5");
        
        $_recentReceipts = array();
        $recentReceipts = $mysql->select("select * from  _tbl_receipts order by ReceiptID desc limit 0,5");
        
        $_recentVouchers = array();
        $recentVouchers = $mysql->select("select * from  _tbl_vouchers order by VoucherID desc limit 0,5");
        
        $_recentContracts=array();
        $recentContracts = $mysql->select("select * from  _tbl_contracts where IsClosed='0' order by ContractID desc limit 0,5");
        
        $_recentClosedContracts=array();
        $recentClosedContracts = $mysql->select("select * from  _tbl_contracts where IsClosed='1' order by ContractID desc limit 0,5");
        
        $_pendingDues=array();
        $pendingDues = $mysql->select("select * from  _tbl_contracts_dues where ReceiptID=0 and date(DueDate)<=date('".date("Y-m-d")."') order by DueID desc limit 0,5");
        
        $_paymentrequests = array();
        $paymentrequests = $mysql->select("select * from _tbl_payemt_requests where  RequestStatus='REQUEST' order by PaymentRequestID desc");
    
    }
    
    if (isset($_SESSION['User']['SalesmanID']) &&  $_SESSION['User']['SalesmanID']>0 ) {
        $_recentReceipts = $mysql->select("SELECT `ReceiptNumber`, `CustomerID`, `CustomerName`, DATE_FORMAT(ReceiptDate,'".appConfig::DATEFORMAT."') as `ReceiptDate`, `ContractCode`, FORMAT(DueGold, 3) as `DueGold`, FORMAT(DueAmount, 2) as `DueAmount`, `DueNumber` from  `_tbl_receipts` where  date(ReceiptDate)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(ReceiptDate)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."') and CustomerID in (select CustomerID from _tbl_masters_customers where BranchID='".$_SESSION['User']['BranchID']."' and AreaNameID in (select AreaNameID from _tbl_salesman_areas where SalesmanID='".$_SESSION['User']['SalesmanID']."')) order by `ReceiptID` desc");
    }
        
    foreach($recentCustomers as $_recentCustomer) {
        $tmp=array(); 
        $tmp['CustomerID']=$_recentCustomer['CustomerID'];
        $tmp['CustomerCode']=$_recentCustomer['CustomerCode'];
        $tmp['CustomerName']=$_recentCustomer['CustomerName'];
        $tmp['MobileNumber']=$_recentCustomer['MobileNumber'];
        $tmp['CustomerTypeName']=$_recentCustomer['CustomerTypeName'];
        $tmp['ReferredByName']=$_recentCustomer['ReferredByName'];
        $tmp['ReferByText']=$_recentCustomer['ReferByText'];
        $tmp['ReferredID']=$_recentCustomer['ReferredByID'];
        $tmp['BranchName']=$_recentCustomer['BranchName'];
        $tmp['EntryDate']= date("d-m-Y",strtotime($_recentCustomer['EntryDate']));
        $_recentCustomers[]=$tmp; 
    }
    
    foreach($recentReceipts as $recentReceipt) {
        $tmp=array(); 
        $tmp['ReceiptNumber']=$recentReceipt['ReceiptNumber'];
        $tmp['ReceiptDate']= date("d-m-Y",strtotime($recentReceipt['ReceiptDate']));
        $tmp['ContractCode']=$recentReceipt['ContractCode'];
        $tmp['CustomerID']= $recentReceipt['CustomerID'];
        $tmp['CustomerName']=$recentReceipt['CustomerName'];
        $tmp['DueGold']=$recentReceipt['DueGold'];
        $tmp['DueAmount']= $recentReceipt['DueAmount'];
        $tmp['DueNumber']= $recentReceipt['DueNumber'];
        $_recentReceipts[]=$tmp; 
    }
    
    foreach($recentVouchers as $voucher) {
        $tmp=array(); 
        $tmp['VoucherNumber']=$voucher['VoucherNumber'];
        $tmp['VoucherDate']= date("d-m-Y",strtotime($voucher['VoucherDate']));
        $tmp['ContractCode']=$voucher['ContractCode'];
        $tmp['CustomerName']=$voucher['CustomerName'];
        $tmp['CustomerID']=$voucher['CustomerID'];
        $tmp['GoldInGrams']=$voucher['GoldInGrams'];
        $tmp['TotalPaidAmount']=$voucher['TotalPaidAmount'];
        $tmp['VoucherType'] = $voucher['VoucherType'];
        $_recentVouchers[]=$tmp; 
    } 
        
    foreach($recentContracts as $recentContract) {
        $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and   ContractID='".$recentContract['ContractID']."'");
        $tmp=array();
        $tmp['ContractCode']= $recentContract['ContractCode'];
        $tmp['SchemeID']=  $recentContract['SchemeID'];
        $tmp['SchemeName']= $recentContract['SchemeName'];
        $tmp['StartDate']= date("d-m-Y",strtotime($recentContract['StartDate']));
        $tmp['EndDate']= date("d-m-Y",strtotime($recentContract['EndDate']));
        
        $tmp['CustomerName']= $recentContract['CustomerName'];
        $tmp['CustomerID']= $recentContract['CustomerID'];
        $tmp['CustomerCode']= $recentContract['CustomerCode'];
        $tmp['ContractAmount']= number_format($recentContract['ContractAmount'],2);
        
        $tmp['IsActive']= $recentContract['IsActive'];
        
        if ($tmp['IsActive']=="1"){
            $tmp['StatusString']= "Active";
        }
        
        if ($recentContract['IsClosed']=="1"){
            $tmp['IsActive']="3";
            $tmp['StatusString']= "Closed";
        }
        
        $tmp['Receipts']= sizeof($dues);
        $tmp['VoucherNumber']= $recentContract['VoucherNumber'];
        $_recentContracts[]=$tmp; 
    } 
    
    foreach($recentClosedContracts as $recentClosedContract) {
        $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and   ContractID='".$recentContract['ContractID']."'");
        $tmp=array();
        $tmp['ContractCode']= $recentClosedContract['ContractCode'];
        $tmp['SchemeID']=  $recentClosedContract['SchemeID'];
        $tmp['SchemeName']= $recentClosedContract['SchemeName'];
        $tmp['StartDate']= date("d-m-Y",strtotime($recentClosedContract['StartDate']));
        $tmp['EndDate']= date("d-m-Y",strtotime($recentClosedContract['EndDate']));
        
        $tmp['CustomerName']= $recentClosedContract['CustomerName'];
        $tmp['CustomerID']= $recentClosedContract['CustomerID'];
        $tmp['CustomerCode']= $recentClosedContract['CustomerCode'];
        $tmp['ContractAmount']= number_format($recentClosedContract['ContractAmount'],2);
        
        $tmp['ClosedOn']= date("d-m-Y",strtotime($recentClosedContract['ClosedOn']));
        $tmp['VoucherType'] = $recentClosedContract['VoucherType'];
        $tmp['Receipts'] = sizeof($dues);
        $tmp['VoucherNumber']= $recentClosedContract['VoucherNumber'];
        $_recentClosedContracts[]=$tmp; 
    }  
    
    foreach($pendingDues as $pendingDue) {
        $tmp=array(); 
        $tmp['DueID']        = $pendingDue['DueID'];
        $tmp['DueNumber']    = $pendingDue['DueNumber'];
        $tmp['DueDate']      = date("d-m-Y",strtotime($pendingDue['DueDate']));
        $tmp['DueAmount']    = number_format($pendingDue['DueAmount'],2);
        $tmp['CustomerID']   = $pendingDue['CustomerID'];
        $tmp['CustomerName'] = $pendingDue['CustomerName'];
        $tmp['ContractID']   = $pendingDue['ContractID'];
        $tmp['ContractCode'] = $pendingDue['ContractCode'];
        $tmp['SchemeID']     = $pendingDue['SchemeID'];
        $tmp['SchemeCode']   = $pendingDue['SchemeCode'];
        $tmp['SchemeName']   = $pendingDue['SchemeName'];
        $tmp['DaysBefore']   = (strtotime(date("Y-m-d"))-strtotime($pendingDue['DueDate']))/(60*60*24);
        $_pendingDues[]=$tmp; 
    }
    
    foreach($paymentrequests as $paymentrequest) {
        $tmp=array(); 
        
        $tmp['PaymentRequestID']     = $paymentrequest['PaymentRequestID'];
        $tmp['RequestCode']          = $paymentrequest['RequestCode'];
        $tmp['PaymentDate']          = date("d-m-Y",strtotime($paymentrequest['PaymentDate']));
        $tmp['DueAmount']            = number_format($paymentrequest['DueAmount'],2);
        $tmp['ContractCode']         = $paymentrequest['ContractCode'];
        $tmp['CustomerName']         = $paymentrequest['CustomerName'];
        $tmp['CustomerCode']         = $paymentrequest['CustomerCode'];
        $tmp['PaymentBankAccountHolderName']   = $paymentrequest['PaymentBankAccountHolderName'];
        $tmp['PaymentBankName']     = $paymentrequest['PaymentBankName'];
        $tmp['PaymentBankNumber']   = $paymentrequest['PaymentBankNumber'];
        $tmp['PaymentBankIFSCode']  = $paymentrequest['PaymentBankIFSCode'];
        $tmp['BankReferenceNumber'] = $paymentrequest['BankReferenceNumber'];
        $tmp['RequestStatus']       = $paymentrequest['RequestStatus'];
        $tmp['RequestedOn']         = $paymentrequest['RequestedOn'];
        $tmp['Frequency']           = $paymentrequest['Frequency'];
        
        $_paymentrequests[]=$tmp;                
    } 
    
    $data = array("recentContracts"       => $_recentContracts,
                  "recentCustomers"       => $_recentCustomers,
                  "recentReceipts"        => $_recentReceipts,
                  "recentVouchers"        => $_recentVouchers,
                  "pendingDues"           => $_pendingDues,
                  "paymentrequests"       => $_paymentrequests,
                  "todaGoldRates"         => $todaGoldRates,
                  "recentClosedContracts" => $_recentClosedContracts,
                  "goldRates" => $goldRates,
                  "additionalInfo"        => array("closedContracts" => sizeof($closedContracts),
                                                   "activeContracts" => sizeof($activeContracts),
                                                   "activeCustomers" => sizeof($activeCustomers),
                                                   "receivedAmount"  => number_format(((isset($receivedAmount[0]['Amount']))? $receivedAmount[0]['Amount'] : "0"),2))
                  );
     
     return json_encode(array("status"=>"success","data"=>$data));
}

function getupCommingDues() {
    
    global $mysql;
    
    $_pendingDues=array();
    if (isset($_SESSION['User']['CustomerID'])) {
        $pendingDues = $mysql->select("select * from  _tbl_contracts_dues where CustomerID='".$_SESSION['User']['CustomerID']."' and ReceiptID=0 and date(DueDate)>=date('".date("Y-m-d")."') order by DueID limit 0,1");         
    } else {
        if (isset($_GET['customer'])) {            
            $pendingDues = $mysql->select("select * from  _tbl_contracts_dues where CustomerID='".$_GET['customer']."' and ReceiptID=0 and date(DueDate)>=date('".date("Y-m-d")."') order by DueID limit 0,1");         
        } else {
            $pendingDues = $mysql->select("select * from  _tbl_contracts_dues where ReceiptID=0 and date(DueDate)>=date('".date("Y-m-d")."') order by DueID desc ");     
        }
    }
    
    foreach($pendingDues as $pendingDue) {
        $tmp=array(); 
        $tmp['DueID']        = $pendingDue['DueID'];
        $tmp['DueNumber']    = $pendingDue['DueNumber'];
        $tmp['DueDate']      = date("d-m-Y",strtotime($pendingDue['DueDate']));
        $tmp['DueAmount']    = number_format($pendingDue['DueAmount'],2);
        $tmp['CustomerID']   = $pendingDue['CustomerID'];
        $tmp['CustomerName'] = $pendingDue['CustomerName'];
        $tmp['ContractID']   = $pendingDue['ContractID'];
        $tmp['ContractCode'] = $pendingDue['ContractCode'];
        $tmp['SchemeID']     = $pendingDue['SchemeID'];
        $tmp['SchemeCode']   = $pendingDue['SchemeCode'];
        $tmp['SchemeName']   = $pendingDue['SchemeName'];
        $_pendingDues[]=$tmp; 
    }
    return json_encode(array("status"=>"success","data"=>$_pendingDues));
}

function getPendingDues() {
    
    global $mysql;
    
    $_pendingDues=array();
    if (isset($_SESSION['User']['CustomerID'])) {
        $pendingDues = $mysql->select("select * from  _tbl_contracts_dues where CustomerID='".$_SESSION['User']['CustomerID']."' and ReceiptID=0 and date(DueDate)<=date('".date("Y-m-d")."') order by DueID ");         
    } else {
        if (isset($_GET['customer'])) {            
            $pendingDues = $mysql->select("select * from  _tbl_contracts_dues where CustomerID='".$_GET['customer']."' and ReceiptID=0 and date(DueDate)<=date('".date("Y-m-d")."') order by DueID ");     
        } else {
            $pendingDues = $mysql->select("select * from  _tbl_contracts_dues where ReceiptID=0 and date(DueDate)<=date('".date("Y-m-d")."') order by DueID ");     
        }
    }
    
    foreach($pendingDues as $pendingDue) {
        $tmp=array(); 
        $tmp['DueID']        = $pendingDue['DueID'];
        $tmp['DueNumber']    = $pendingDue['DueNumber'];
        $tmp['DueDate']      = date("d-m-Y",strtotime($pendingDue['DueDate']));
        $tmp['DueAmount']    = number_format($pendingDue['DueAmount'],2);
        $tmp['CustomerID']   = $pendingDue['CustomerID'];
        $tmp['CustomerName'] = $pendingDue['CustomerName'];
        $tmp['ContractID']   = $pendingDue['ContractID'];
        $tmp['ContractCode'] = $pendingDue['ContractCode'];
        $tmp['SchemeID']     = $pendingDue['SchemeID'];
        $tmp['SchemeCode']   = $pendingDue['SchemeCode'];
        $tmp['SchemeName']   = $pendingDue['SchemeName'];
        $tmp['IsShowPayButton']   = $pendingDue['IsShowPayButton'];     
        $tmp['DaysBefore']   = (strtotime(date("Y-m-d"))-strtotime($pendingDue['DueDate']))/(60*60*24);
        $_pendingDues[]=$tmp;   
    }
    return json_encode(array("status"=>"success","data"=>$_pendingDues));
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