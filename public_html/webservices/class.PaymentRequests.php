<?php
class PaymentRequests {
    
    public static function addNew() {
        
        global $mysql;
        
        if (strlen(trim($_POST['DueID']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Missing Due Number","div"=>"DueNumber"));    
        }
        
        if (strlen(trim($_POST['PaymentDate']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Payment Date","div"=>"PaymentDate"));    
        }
        
        if (trim($_POST['PaymentBankID'])=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please enter Payment Bank","div"=>"PaymentBankID"));    
        }
        
        if (strlen(trim($_POST['BankReferenceNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Bank Reference Number","div"=>"BankReferenceNumber"));    
        } 
        $dupRef = $mysql->select("select * from _tbl_payemt_requests where BankReferenceNumber='".$_POST['BankReferenceNumber']."'");
        if (sizeof($dupRef)>0) {
            return json_encode(array("status"=>"failure","message"=>"Bank Reference Number already exists","div"=>"BankReferenceNumber"));        
        }
         
        $duplicate = $mysql->select("select * from _tbl_payemt_requests where DueID='".$_POST['DueID']."' and RequestStatus='0'");
        if (sizeof($duplicate)>0) {
            return json_encode(array("status"=>"failure","message"=>"unable to submit your request. (Your previous request still in-process)","div"=>""));    
        }
        
        $due_information = $mysql->select("select * from _tbl_contracts_dues where DueID='".$_POST['DueID']."'");
        $code = SequnceList::updateNumber("_tbl_masters_paymentbanks"); 
        
        
        $Frequency="OnDate";
        
        if ($_POST['PaymentDate']==$due_information[0]['DueDate']) {
            $Frequency="OnDate";
        }
        if (strtotime($_POST['PaymentDate'])<strtotime($due_information[0]['DueDate'])) {
            $Frequency="Advance";
        }
        if (strtotime($_POST['PaymentDate'])>strtotime($due_information[0]['DueDate'])) {
            $Frequency="Late";
        }
        
        $bank = $mysql->select("select * from _tbl_masters_paymentbanks where PaymentBankID='".$_POST['PaymentBankID']."'");
        $id = $mysql->insert("_tbl_payemt_requests",array("PaymentDate"         => $_POST['PaymentDate'],
                                                          "RequestCode"         => $code,
                                                          "CustomerID"          => $_SESSION['User']['CustomerID'],
                                                          "CustomerCode"        => $_SESSION['User']['CustomerCode'],
                                                          "CustomerName"        => $_SESSION['User']['CustomerName'],
                                                          "ContractID"          => $due_information[0]['ContractID'],
                                                          "ContractCode"        => $due_information[0]['ContractCode'],
                                                          "DueID"               => $due_information[0]['DueID'],
                                                          "DueDate"             => $due_information[0]['DueDate'],
                                                          "DueNumber"           => $due_information[0]['DueNumber'],
                                                          "DueAmount"           => $due_information[0]['DueAmount'],
                                                          "PaymentBankID"       => $_POST['PaymentBankID'],
                                                          "PaymentBankName"     => $bank[0]['BankName'],
                                                          "PaymentBankNumber"   => $bank[0]['AccountNumber'],
                                                          "PaymentBankAccountHolderName"  => $bank[0]['AccountHolderName'],
                                                          "PaymentBankIFSCode"  => $bank[0]['IFSCode'],
                                                          "BankReferenceNumber" => $_POST['BankReferenceNumber'],
                                                          "PaymentRemarks"      => $_POST['Remarks'],
                                                          "Frequency"          => $Frequency,
                                                          "RequestedOn"         => date("Y-m-d H:i:s"),
                                                          "RequestStatus"       => 'REQUEST'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully submitted. Your reference number ".$code,"div"=>"","PaymentBankCode"=>SequnceList::updateNumber("_tbl_masters_paymentbanks")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
     }
     
    public static function listPendings() {
        global $mysql;
        if (isset($_GET['customer'])) {
            $data = $mysql->select("select PaymentRequestID,
                                           RequestCode,
                                           DATE_FORMAT(PaymentDate,'".appConfig::DATEFORMAT."') as `PaymentDate`,
                                           FORMAT(DueAmount, 2) as `DueAmount`,
                                           BankReferenceNumber ,
                                           RequestStatus
                                           from _tbl_payemt_requests where CustomerID='".$_GET['customer']."' and RequestStatus='REQUEST' order by PaymentRequestID desc");
        } elseif (isset($_SESSION['User']['CustomerID'])) {
            $data = $mysql->select("select * from _tbl_payemt_requests where CustomerID='".$_SESSION['User']['CustomerID']."' and RequestStatus='REQUEST' order by PaymentRequestID desc");
        } else {
            $data = $mysql->select("select * from _tbl_payemt_requests where  RequestStatus='REQUEST' order by PaymentRequestID desc");    
        }
        return json_encode(array("status"=>"success","data"=>$data));
    }

    public static function listApproved() {
        global $mysql;
        if (isset($_GET['customer'])) {
            $data = $mysql->select("select PaymentRequestID,
                                           RequestCode,
                                           DATE_FORMAT(PaymentDate,'".appConfig::DATEFORMAT."') as `PaymentDate`,
                                           FORMAT(DueAmount, 2) as `DueAmount`,
                                           BankReferenceNumber ,
                                           RequestStatus
                                           from _tbl_payemt_requests where CustomerID='".$_GET['customer']."' and RequestStatus='APPROVED' order by PaymentRequestID desc");
        } elseif (isset($_SESSION['User']['CustomerID'])) {
            $data = $mysql->select("select * from _tbl_payemt_requests where CustomerID='".$_SESSION['User']['CustomerID']."' and RequestStatus='APPROVED' order by PaymentRequestID desc");
        } else {
            $data = $mysql->select("select * from _tbl_payemt_requests where  RequestStatus='APPROVED' order by PaymentRequestID desc");    
        }
        return json_encode(array("status"=>"success","data"=>$data));
    }
                                                                                                      
    public static function listRejected() {
        global $mysql;
        if (isset($_GET['customer'])) {
            $data = $mysql->select("select PaymentRequestID,
                                           RequestCode,
                                           DATE_FORMAT(PaymentDate,'".appConfig::DATEFORMAT."') as `PaymentDate`,
                                           FORMAT(DueAmount, 2) as `DueAmount`,
                                           BankReferenceNumber ,
                                           RequestStatus
                                           from _tbl_payemt_requests where CustomerID='".$_GET['customer']."' and RequestStatus='REJECTED' order by PaymentRequestID desc");
        } else {
            $data = $mysql->select("select * from _tbl_payemt_requests where  RequestStatus='REJECTED' order by PaymentRequestID desc");
        }
        return json_encode(array("status"=>"success","data"=>$data));
    }
     
    public static function listAll() {
      
      global $mysql;
      if (isset($_GET['customer'])) {
          $data = $mysql->select("select * from _tbl_payemt_requests where CustomerID='".$_GET['customer']."' order by PaymentRequestID desc");
      } elseif (isset($_SESSION['User']['CustomerID'])) {
        $data = $mysql->select("select * from _tbl_payemt_requests where CustomerID='".$_SESSION['User']['CustomerID']."' order by PaymentRequestID desc");
      } else {
          
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

          if ((trim($_POST['SelectType']))=="0") {
              return json_encode(array("status"=>"failure","message"=>"Please select Type","div"=>"SelectType"));    
          }
          
          if ((trim($_POST['SelectType']))=="0") {
              return json_encode(array("status"=>"failure","message"=>"Please select Type","div"=>"SelectType"));    
          }
          
          $data = array();
          
          if ($_POST['SelectType']=="ALL") {
              $data = $mysql->select("select * from _tbl_payemt_requests where (date(PaymentDate)>=date('".$_POST['FromDate']."') and date(PaymentDate)<=date('".$_POST['ToDate']."')) order by PaymentRequestID desc");    
          }
          
          if ($_POST['SelectType']=="REQUEST") {
              $data = $mysql->select("select * from _tbl_payemt_requests where RequestStatus='REQUEST'  and  (date(PaymentDate)>=date('".$_POST['FromDate']."') and date(PaymentDate)<=date('".$_POST['ToDate']."')) order by PaymentRequestID desc");    
          }

          if ($_POST['SelectType']=="APPROVED") {
              $data = $mysql->select("select * from _tbl_payemt_requests where RequestStatus='APPROVED'  and  (date(PaymentDate)>=date('".$_POST['FromDate']."') and date(PaymentDate)<=date('".$_POST['ToDate']."')) order by PaymentRequestID desc");    
          } 
          
          if ($_POST['SelectType']=="REJECTED") {
              $data = $mysql->select("select * from _tbl_payemt_requests where RequestStatus='REJECTED'  and (date(PaymentDate)>=date('".$_POST['FromDate']."') and date(PaymentDate)<=date('".$_POST['ToDate']."')) order by PaymentRequestID desc");    
          } 
          
      }
      return json_encode(array("status"=>"success","data"=>$data));
    }
     
    public static function getData() {
        global $mysql;
//        $data = $mysql->select("select * from _tbl_payemt_requests where PaymentRequestID='".$_GET['ID']."'");
        
        $data = $mysql->select("select PaymentRequestID,
                                           RequestCode,
                                           DATE_FORMAT(PaymentDate,'".appConfig::DATEFORMAT."') as `PaymentDate`,
                                           FORMAT(DueAmount, 2) as `DueAmount`,
                                           BankReferenceNumber ,
                                           RequestStatus,
                                           CustomerCode,
                                           CustomerName,
                                           PaymentBankAccountHolderName,
                                           PaymentBankName,
                                           PaymentBankNumber,
                                           PaymentBankIFSCode,
                                           ContractCode,
                                           DueNumber,
                                           DATE_FORMAT(RequestedOn,'".appConfig::DATEFORMAT."') as `RequestedOn`,
                                           PaymentRemarks
                                           
                                           from _tbl_payemt_requests where PaymentRequestID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
                  
    public static function doApprove() {
     
     global $mysql;
     
     if (strlen(trim($_POST['PaymentRequestID']))==0) {
        return json_encode(array("status"=>"failure","message"=>"Missing token","div"=>""));    
     }
     
     if (strlen(trim($_POST['AdminRemarks']))==0) {
        return json_encode(array("status"=>"failure","message"=>"Please enter remarks","div"=>"AdminRemarks"));    
     }
     
     $data = $mysql->select("select * from _tbl_payemt_requests where PaymentRequestID='".$_POST['PaymentRequestID']."'");
     
     $todayGoldPrice=$mysql->select("select * from  _tbl_masters_goldrates where Date='".$data[0]['PaymentDate']."'");
     if (sizeof($todayGoldPrice)==0) {
         return json_encode(array("status"=>"failure","message"=>"Please update today's Gold Rate","div"=>""));    
     }
     
     $PaymentMode = $mysql->select("select * from _tbl_masters_paymentmodes where  PaymentModeID='".$_POST['PaymentModeID']."'");
     $due_information = $mysql->select("Select * from _tbl_contracts_dues where DueID='".$data[0]['DueID']."'");
     
     $mysql->execute("update _tbl_payemt_requests set RequestStatus='APPROVED',RequestUpdated='".date("Y-m-d H:i:s")."',AdminRemarks='".$_POST['AdminRemarks']."' where PaymentRequestID='".$_POST['PaymentRequestID']."'");
     
     $contract_information = $mysql->select("Select * from _tbl_contracts where ContractID='".$due_information[0]['ContractID']."'");
     $scheme_information = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$contract_information[0]['SchemeID']."'");
     $CustomerData = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$contract_information[0]['CustomerID']."'");

     if ($scheme_information[0]['ModeOfBenifits']=="GOLD") {
         $DueGold = number_format($scheme_information[0]['InstallmentAmount']/$todayGoldPrice[0][$scheme_information[0]['MaterialType']],3);    
     } else {
         $DueGold = 0;
     }
     
     $RecepitNumber = SequnceList::updateNumber("_tbl_receipts");
     
     $RecepitID = $mysql->insert("_tbl_receipts",array("ReceiptNumber"        => $RecepitNumber,
                                                       "ReceiptDate"          => $data[0]['PaymentDate'],
                                                       "CustomerID"           => $CustomerData[0]['CustomerID'],
                                                       "CustomerCode"         => $CustomerData[0]['CustomerCode'],
                                                       "CustomerName"         => $CustomerData[0]['CustomerName'],
                                                       "CustomerMobileNumber" => $CustomerData[0]['MobileNumber'],
                                                       "ContractID"           => $contract_information[0]['ContractID'],
                                                       "ContractCode"         => $contract_information[0]['ContractCode'],
                                                       "DueNumber"            => $due_information[0]['DueNumber'],
                                                       "DueAmount"            => $scheme_information[0]['InstallmentAmount'],
                                                       "DueGold"              => $DueGold,
                                                       "PriceOnDate"          => $data[0]['PaymentDate'],
                                                       "PaidAmount"           => $scheme_information[0]['InstallmentAmount'],
                                                       "PaymentModeID"        => "0",
                                                       "PaymentMode"          => "BANK",
                                                       "CreatedOn"            => date("Y-m-d H:i:s"),
                                                       "PaymentRemarks"       => "BANK: ".$_POST['AdminRemarks']));
            
     $mysql->execute("update _tbl_contracts_dues set ReceiptID       = '".$RecepitID."', 
                                                     ReceiptNumber   = '".$RecepitNumber."', 
                                                     GoldInGram      = '".$DueGold."', 
                                                     GoldPrice       = '".$todayGoldPrice[0][$scheme_information[0]['MaterialType']]."', 
                                                     GoldPriceOnDate = '".$data[0]['PaymentDate']."', 
                                                     PaymentDate     = '".$data[0]['PaymentDate']."', 
                                                     IsShowPayButton ='0'
                                                                where DueID = '".$due_information[0]['DueID']."'");
            
     $dues = $mysql->select("select * from _tbl_contracts_dues where DueID>'".$due_information[0]['DueID']."'");
     $mysql->execute("update _tbl_contracts_dues set IsShowPayButton='1' where DueID = '".$dues[0]['DueID']."'");
     include SERVER_PATH."/lib/phpqrcode/qrlib.php";   
     //QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);   
     $url = WEB_URL."receipt".md5($RecepitNumber);
     QRcode::png($url, SERVER_PATH."/assets/qrcodes/".md5($RecepitNumber).".png");  
     $paiddues = $mysql->select("select * from _tbl_contracts_dues where ContractID='".$contract_information[0]['ContractID']."' and ReceiptID>0");
     if (sizeof($paiddues)==$scheme_information[0]['Installments']) {
             Contracts::closeContract($contract_information[0]['ContractID']);
     }
     return json_encode(array("status"=>"success","message"=>"successfully approved","data"=>$data));
    }

    public static function doReject() {
     global $mysql;                                                                   
     
     if (strlen(trim($_POST['PaymentRequestID']))==0) {
        return json_encode(array("status"=>"failure","message"=>"Missing token","div"=>""));    
     }
     if (strlen(trim($_POST['AdminRemarks']))==0) {
        return json_encode(array("status"=>"failure","message"=>"Please enter remarks","div"=>"AdminRemarks"));    
     }
     $mysql->execute("update _tbl_payemt_requests set RequestStatus='REJECTED',RequestUpdated='".date("Y-m-d H:i:s")."',AdminRemarks='".$_POST['AdminRemarks']."' where PaymentRequestID='".$_POST['PaymentRequestID']."'");
     return json_encode(array("status"=>"success","message"=>"successfully rejected"));
    }
}

function Calculate_interest_amount($start_date,$end_date,$amount) {
    $anual_interest = 7.50/100;
    $day_interest   = $anual_interest/360;
    $day = floor((strtotime($end_date)-strtotime($start_date)) / (60 * 60 * 24)); 
    $interest = $amount * $day * $day_interest;
}
?>