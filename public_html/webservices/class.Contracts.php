<?php
class Contracts {
    
    function addNew() {
        
        global $mysql;
        
        if (strlen(trim($_GET['Customer']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select customer","div"=>"CustomerID"));    
        } 
        
        if (strlen(trim($_GET['Scheme']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select scheme","div"=>"SchemeID"));    
        }
        
        if ($_POST['PaymentModeID']=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select Payment Mode","div"=>"PaymentModeID"));    
        }
        
        $todayGoldPrice=$mysql->select("select * from  _tbl_masters_goldrates where Date='".date("Y-m-d")."'");
        if (sizeof($todayGoldPrice)==0) {
           return json_encode(array("status"=>"failure","message"=>"Please update today gold price","div"=>"PaymentModeID"));     
        }
         
        $ContractCode= SequnceList::updateNumber("_tbl_contracts"); 
        
        $CustomerData = json_decode(Customers::getDetailsByID($_GET['Customer']),true);
        $CustomerData = $CustomerData['data'];                              
        
        $SchemeData = json_decode(Schemes::getDetailsByID($_GET['Scheme']),true);
        $SchemeData = $SchemeData['data'];    
        
        if (isset($_SESSION['User']['SalesmanID'])) {
             $CreatedBy="Salesman";
             $CreatedByID=$_SESSION['User']['SalesmanID'];
             $CreatedByName=$_SESSION['User']['SalesmanName'];
        } 
        
        if (isset($_SESSION['User']['UserID'])) {
             $CreatedBy="User";
             $CreatedByID=$_SESSION['User']['UserID'];
             $CreatedByName=$_SESSION['User']['UserName'];
        } 
        
        if (isset($_SESSION['User']['CustomerID'])) {
             $CreatedBy="User";
             $CreatedByID=$_SESSION['User']['CustomerID'];
             $CreatedByName=$_SESSION['User']['CustomerName'];
        } 
        
        if (isset($_SESSION['User']['EmployeeID'])) {
             $CreatedBy="Employee";
             $CreatedByID=$_SESSION['User']['EmployeeID'];
             $CreatedByName=$_SESSION['User']['EmployeeName'];
        }                        
                                      
        $ContractID = $mysql->insert("_tbl_contracts",array("ContractCode"  => $ContractCode,
                                                    "CustomerID"    => $_GET['Customer'],
                                                    "CustomerName"  => $CustomerData[0]['CustomerName'],
                                                    "CustomerData"  => json_encode($CustomerData[0]),
                                                    "SchemeID"      => $_GET['Scheme'],
                                                    "SchemeName"    => $SchemeData[0]['SchemeName'],
                                                    "SchemeData"  => json_encode($SchemeData[0]),
                                                    "CreatedOn"     => date("Y-m-d H:i:s"),
                                                    "CreatedBy"     => $CreatedBy,
                                                    "CreatedByID"     => $CreatedByID,
                                                    "CreatedByName"     => $CreatedByName,
                                                    
                                                    ));
        if ($ContractID>0) {
            
            $scheme_information = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$_GET['Scheme']."'");
            
            if ($scheme_information[0]['InstallmentMode']=="MONTHLY") {
                
                for($i=1;$i<=$scheme_information[0]['Installments'];$i++) {
                    $dueDate = date('Y-m-d', strtotime($Date. ' + '.($i*30).' days'));
                    $mysql->insert("_tbl_contracts_dues",array("CustomerID"     => $_GET['Customer'],
                                                               "ContractID"     => $ContractID,
                                                               "DueNumber"      => $i,
                                                               "DueDate"        => $dueDate,
                                                               "ReceiptNumber"        => "",
                                                               "DueAmount"      => $scheme_information[0]['InstallmentAmount'],
                                                               "IsShowPayButton"=> '0',
                                                               "GoldInGram"     => "0"))   ;
                }
                
                if ($scheme_information[0]['ModeOfBenifits']=="GOLD") {
                    $DueGold = number_format($scheme_information[0]['InstallmentAmount']/$todayGoldPrice[0][$scheme_information[0]['MaterialType']],3);    
                } else {
                    $DueGold = 0;
                }
                
                $RecepitNumber = SequnceList::updateNumber("_tbl_receipts");
                $PaymentMode = $mysql->select("select * from _tbl_masters_paymentmodes where  PaymentModeID='".$_POST['PaymentModeID']."'");
                
                $RecepitID = $mysql->insert("_tbl_receipts",array("ReceiptNumber"        => $RecepitNumber,
                                                                  "ReceiptDate"          => date("Y-m-d H:i:s"),
                                                                  "CustomerID"           => $CustomerData[0]['CustomerID'],
                                                                  "CustomerCode"         => $CustomerData[0]['CustomerCode'],
                                                                  "CustomerName"         => $CustomerData[0]['CustomerName'],
                                                                  "CustomerMobileNumber" => $CustomerData[0]['MobileNumber'],
                                                                  "ContractID"           => $ContractID,
                                                                  "ContractCode"         => $ContractCode,
                                                                  "DueNumber"            => '1',
                                                                  "DueAmount"            => $scheme_information[0]['InstallmentAmount'],
                                                                  "DueGold"              => $DueGold,
                                                                  "PaidAmount"           => $scheme_information[0]['InstallmentAmount'],
                                                                  "PaymentModeID"        => $PaymentMode[0]['PaymentModeID'],
                                                                  "PaymentMode"          => $PaymentMode[0]['PaymentMode'],
                                                                  "PaymentRemarks"       => $_POST['PaymentRemarks']));
                                                              
                $dues = $mysql->select("select * from _tbl_contracts_dues where ContractID='".$ContractID."'");
                
                $mysql->execute("update _tbl_contracts_dues set ReceiptID       = '".$RecepitID."', 
                                                                ReceiptNumber   = '".$RecepitNumber."', 
                                                                GoldInGram      = '".$DueGold."', 
                                                                GoldPrice       = '".$todayGoldPrice[0][$scheme_information[0]['MaterialType']]."', 
                                                                GoldPriceOnDate = '".date("Y-m-d")."', 
                                                                PaymentDate     = '".date("Y-m-d H:i:s")."', 
                                                                IsShowPayButton ='0'
                                                                    where DueID = '".$dues[0]['DueID']."'");
                $mysql->execute("update _tbl_contracts_dues set IsShowPayButton='1' where DueID = '".$dues[1]['DueID']."'");
                
                include SERVER_PATH."/lib/phpqrcode/qrlib.php";   
                //QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);   
                $url = WEB_URL."receipt".md5($RecepitNumber);
                QRcode::png($url, SERVER_PATH."/assets/qrcodes/".md5($RecepitNumber).".png"); 
            }
            return json_encode(array("status"=>"success","message"=>"successfully created","ContractID"=>$ContractCode,"div"=>""));
            
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
     }
     
     public static function remove() {
         global $mysql;

         $mysql->execute("delete from _tbl_contracts where ContractID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_contracts")));
     }

     public static function listAll() {
         
         global $mysql;
         
         if (isset($_SESSION['User']['SalesmanID'])) {
             $data = $mysql->select("select * from _tbl_contracts");
         } elseif (isset($_SESSION['User']['CustomerID'])) {
            $data = $mysql->select("select * from _tbl_contracts where CustomerID='".$_SESSION['User']['CustomerID']."'");
         } else {
            $data = $mysql->select("select * from _tbl_contracts");
         }
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function listBySchemes() {   
         global $mysql;
         $data = $mysql->select("select * from _tbl_contracts where SchemeID='".$_GET['SchemeID']."'");
         return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function getData() {
         global $mysql;
         
         $contract_data = $mysql->select("select * from _tbl_contracts where ContractCode='".$_GET['contract']."'");
         if (sizeof($contract_data)==0) {
            return json_encode(array("status"=>"failure","message"=>"Contract not found"));    
         }
         
         $customer_data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$contract_data[0]['CustomerID']."'");
         if (sizeof($customer_data)==0) {
            return json_encode(array("status"=>"failure","message"=>"Contract's Customer not found"));    
         }
         
         $scheme_data = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$contract_data[0]['SchemeID']."'");
         if (sizeof($scheme_data)==0) {
            return json_encode(array("status"=>"failure","message"=>"Contract's Scheme not found"));    
         }
         
         $data = array();
         $data['CustomerData'] = json_decode(str_replace("\r\n","<br>",$contract_data[0]['CustomerData']),true);
         $data['SchemeData']   = json_decode(str_replace("\r\n","<br>",$contract_data[0]['SchemeData']),true);
         
         $data['ContractData'] = array("CreatedOn"=> $contract_data[0]['CreatedOn'],
                                       "ContractCode"=>$contract_data[0]['ContractCode'],
                                       "CreatedBy"=>$contract_data[0]['CreatedBy'],
                                       "CreatedByName"=>$contract_data[0]['CreatedByName'],
                                       "IsActive"=>$contract_data[0]['IsActive']);
         $data['ContractData'] = $contract_data[0];
         $dueData = $mysql->select("select * from _tbl_contracts_dues where CustomerID='".$contract_data[0]['CustomerID']."' and ContractID='".$contract_data[0]['ContractID']."'");
          
         $data['DueData'] = $dueData;
         
         
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
      public static function listCustomerWise() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_contracts where CustomerID='".$_GET['CustomerID']."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function getPreCollectDueInformation() {
         
         global $mysql;
         
         $due_information = $mysql->select("Select * from _tbl_contracts_dues where DueID='".$_GET['ID']."'");
         
         $contract_information = $mysql->select("Select * from _tbl_contracts where ContractID='".$due_information[0]['ContractID']."'");
         $scheme_information = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$contract_information[0]['SchemeID']."'");
         $CustomerData = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$contract_information[0]['CustomerID']."'");
         
         $todayGoldPrice=$mysql->select("select * from  _tbl_masters_goldrates where Date='".date("Y-m-d")."'");
         
         if ($scheme_information[0]['ModeOfBenifits']=="GOLD") {
             $DueGold = number_format($scheme_information[0]['InstallmentAmount']/$todayGoldPrice[0][$scheme_information[0]['MaterialType']],3);    
         } else {
            $DueGold = 0;
         }
         
         $data = array("ModeOfBenifits" => $scheme_information[0]['ModeOfBenifits'],
                       "MaterialType"   => $scheme_information[0]['MaterialType'],
                       "DueAmount"      => $scheme_information[0]['InstallmentAmount'],
                       "GoldPrice"      => $todayGoldPrice[0][$scheme_information[0]['MaterialType']],
                       "GoldInGrams"    => $DueGold,
                       "DueID"          => $due_information[0]['DueID'],
                       "Installment"    => $due_information[0]['DueNumber'],
                       "ActualDueDate"  => date("d-m-Y",strtotime($due_information[0]['DueDate']))
                       );
                     
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function collectDue() {
         
         global $mysql;
         
         $due_information = $mysql->select("Select * from _tbl_contracts_dues where DueID='".$_POST['DueID']."'");
         $todayGoldPrice=$mysql->select("select * from  _tbl_masters_goldrates where Date='".date("Y-m-d")."'");
         $PaymentMode = $mysql->select("select * from _tbl_masters_paymentmodes where  PaymentModeID='".$_POST['PaymentModeID']."'");
         
         if (sizeof($todayGoldPrice)==0) {
             return json_encode(array("status"=>"failure","message"=>"Please update today's Gold Rate","div"=>"PaymentModeID"));    
         }
         if ($_POST['PaymentModeID']=="0") {
             return json_encode(array("status"=>"failure","message"=>"Please select payment mode","div"=>"PaymentModeID"));    
         }
         
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
                                                           "ReceiptDate"          => date("Y-m-d H:i:s"),
                                                           "CustomerID"           => $CustomerData[0]['CustomerID'],
                                                           "CustomerCode"         => $CustomerData[0]['CustomerCode'],
                                                           "CustomerName"         => $CustomerData[0]['CustomerName'],
                                                           "CustomerMobileNumber" => $CustomerData[0]['MobileNumber'],
                                                           "ContractID"           => $contract_information[0]['ContractID'],
                                                           "ContractCode"         => $contract_information[0]['ContractCode'],
                                                           "DueNumber"            => $due_information[0]['DueNumber'],
                                                           "DueAmount"            => $scheme_information[0]['InstallmentAmount'],
                                                           "DueGold"              => $DueGold,
                                                           "PaidAmount"           => $scheme_information[0]['InstallmentAmount'],
                                                           "PaymentModeID"        => $PaymentMode[0]['PaymentModeID'],
                                                           "PaymentMode"          => $PaymentMode[0]['PaymentMode'],
                                                           "PaymentRemarks"       => $_POST['PaymentRemarks']));
                
         $mysql->execute("update _tbl_contracts_dues set ReceiptID       = '".$RecepitID."', 
                                                         ReceiptNumber   = '".$RecepitNumber."', 
                                                         GoldInGram      = '".$DueGold."', 
                                                         GoldPrice       = '".$todayGoldPrice[0][$scheme_information[0]['MaterialType']]."', 
                                                         GoldPriceOnDate = '".date("Y-m-d")."', 
                                                         PaymentDate     = '".date("Y-m-d H:i:s")."', 
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
                 self::closeContract($contract_information[0]['ContractID']);
         }
         return json_encode(array("status"=>"success","message"=>"successfully Credited"));
     } 
     
     
     public static function getPreClosureContractInformation() {
         
         global $mysql;
         
         $contract_information = $mysql->select("Select * from _tbl_contracts where ContractCode='".$_GET['ContractID']."'");
         $scheme_information = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$contract_information[0]['SchemeID']."'");
         $CustomerData = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$contract_information[0]['CustomerID']."'");
         
         $todayGoldPrice=$mysql->select("select * from  _tbl_masters_goldrates where Date='".date("Y-m-d")."'");
         
         $due_information = $mysql->select("Select * from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$contract_information[0]['ContractID']."'");
         $totalPaidAmount = 0;
         $totalGoldInGrams = 0;
         foreach($due_information as $due) {
             $totalPaidAmount += $due['DueAmount']; 
             $totalGoldInGrams += $due['GoldInGram']; 
         }
         
         if ($scheme_information[0]['ModeOfBenifits']=="GOLD") {
             
         } else {
            $DueGold = 0;
         }
         $totalGoldInGrams = number_format($totalGoldInGrams,3);
         
         $WastageDiscount=$scheme_information[0]['WastageDiscount'];
         $MakingChargeDiscount=$scheme_information[0]['MakingChargeDiscount'];
         $BonusPercentage=$scheme_information[0]['BonusPercentage'];
         $CashBonusAmount = $totalPaidAmount * $scheme_information[0]['BonusPercentage']/100;
         if (sizeof($due_information)<=3) {
             $WastageDiscount="0";
             $MakingChargeDiscount="0";
             $BonusPercentage="0";
             $CashBonusAmount=$totalPaidAmount;
         }
         
         $data = array("ModeOfBenifits"        => $scheme_information[0]['ModeOfBenifits'],
                       "MaterialType"          => $scheme_information[0]['MaterialType'],
                       "SchemeName"            => $scheme_information[0]['SchemeName'],
                       "WastageDiscount"       => $WastageDiscount,
                       "BonusPercentage"       => $BonusPercentage,
                       "MakingChargeDiscount"  => $MakingChargeDiscount,
                       "TotalPaidAmount"       => $totalPaidAmount,
                       "TotalGoldInGrams"      => $totalGoldInGrams);
                     
         return json_encode(array("status"=>"success","data"=>$data));
     } 
     
     function preCloseContract() {
         global $mysql;
         
         $contract_information = $mysql->select("Select * from _tbl_contracts where ContractCode='".$_POST['ContractID']."'");
         
         $scheme_information = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$contract_information[0]['SchemeID']."'");
         $CustomerData = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$contract_information[0]['CustomerID']."'");
         
         $due_information = $mysql->select("Select * from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$contract_information[0]['ContractID']."'");
         $totalPaidAmount = 0;
         $totalGoldInGrams = 0;
         
         foreach($due_information as $due) {
             $totalPaidAmount += $due['DueAmount']; 
             $totalGoldInGrams += $due['GoldInGram']; 
         }
         
         if ($scheme_information[0]['ModeOfBenifits']=="GOLD") {
             
         } else {
            $DueGold = 0;
         }
         
         $totalGoldInGrams = number_format($totalGoldInGrams,3);
         
         $WastageDiscount=$scheme_information[0]['WastageDiscount'];
         $MakingChargeDiscount=$scheme_information[0]['MakingChargeDiscount'];
         $BonusPercentage=$scheme_information[0]['BonusPercentage'];
         $CashBonusAmount = $totalPaidAmount * $scheme_information[0]['BonusPercentage']/100;
         
         if (sizeof($due_information)<=3) {
             $WastageDiscount="0";
             $MakingChargeDiscount="0";
             $BonusPercentage="0";
             $CashBonusAmount = $totalPaidAmount; 
         }
         $VoucherNumber = SequnceList::updateNumber("_tbl_vouchers");
         $VoucherID = $mysql->insert("_tbl_vouchers",array("VoucherNumber"=>$VoucherNumber,
                                                           "VoucherDate"=>date("Y-m-d H:i:s"),
                                                           "CustomerID"=>$CustomerData[0]['CustomerID'],
                                                           "CustomerName"=>$CustomerData[0]['CustomerName'],
                                                           "CustomerCode"=>$CustomerData[0]['CustomerCode'],
                                                           "CustomerMobileNumber"=>$CustomerData[0]['MobileNumber'],
                                                           "ContractID"=>$contract_information[0]['ContractID'],
                                                           "ContractCode"=>$contract_information[0]['ContractCode'],
                                                           "GoldInGrams"=>$totalGoldInGrams,
                                                           "TotalPaidAmount"=>$totalPaidAmount,
                                                           "WastageDiscount"=>$WastageDiscount,
                                                           "MakingChargeDiscount"=>$MakingChargeDiscount,
                                                           "BonusPercentage"=>$BonusPercentage,
                                                           "BonusAmount"=>$CashBonusAmount));
         
         $mysql->execute("update _tbl_contracts set 
                                                    IsClosed='1',
                                                    ClosedOn='".date("Y-m-d H:i:s")."',
                                                    ClosedModel='PreClosure',
                                                    
                                                    TotalPaidAmount='".$totalPaidAmount."',
                                                    SettlementGold='".$totalGoldInGrams."',
                                                    SettlementMaterial='".$scheme_information[0]['MaterialType']."',
                                                    
                                                    WastageDiscount='".$WastageDiscount."',
                                                    MakingChargeDiscount='".$MakingChargeDiscount."',
                                                    CashBonusPercentage='".$BonusPercentage."',
                                                    CashBonusAmount='".$CashBonusAmount."',
                                                    
                                                    VoucherID='".$VoucherID."',
                                                    VoucherNumber='".$VoucherNumber."'");
         $mysql->execute("update _tbl_contracts_dues set IsShowPayButton='0' where ContractID = '".$contract_information[0]['ContractID']."'");
         
         return json_encode(array("status"=>"success","message"=>"Contract Closed Successfully"));
     } 
     
     function closeContract($ContractID) {
         global $mysql;
         
         $contract_information = $mysql->select("Select * from _tbl_contracts where ContractID='".$ContractID."'");
         
         $scheme_information = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$contract_information[0]['SchemeID']."'");
         $CustomerData = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$contract_information[0]['CustomerID']."'");
         
         $due_information = $mysql->select("Select * from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$contract_information[0]['ContractID']."'");
         $totalPaidAmount = 0;
         $totalGoldInGrams = 0;
         
         foreach($due_information as $due) {
             
             $totalPaidAmount += $due['DueAmount']; 
             $totalGoldInGrams += $due['GoldInGram']; 
         }
         
         $totalGoldInGrams = number_format($totalGoldInGrams,3);
         
         if ($scheme_information[0]['ModeOfBenifits']=="GOLD") {
             
         } else {
            $DueGold = 0;
         }
         
         $WastageDiscount=$scheme_information[0]['WastageDiscount'];
         $MakingChargeDiscount=$scheme_information[0]['MakingChargeDiscount'];
         $BonusPercentage=$scheme_information[0]['BonusPercentage'];
         $CashBonusAmount = $totalPaidAmount * $scheme_information[0]['BonusPercentage']/100;
         
         $VoucherNumber = SequnceList::updateNumber("_tbl_vouchers");
         $VoucherID = $mysql->insert("_tbl_vouchers",array("VoucherNumber"=>$VoucherNumber,
                                                           "VoucherDate"=>date("Y-m-d H:i:s"),
                                                           "CustomerID"=>$CustomerData[0]['CustomerID'],
                                                           "CustomerName"=>$CustomerData[0]['CustomerName'],
                                                           "CustomerCode"=>$CustomerData[0]['CustomerCode'],
                                                           "CustomerMobileNumber"=>$CustomerData[0]['MobileNumber'],
                                                           "ContractID"=>$contract_information[0]['ContractID'],
                                                           "ContractCode"=>$contract_information[0]['ContractCode'],
                                                           "GoldInGrams"=>$totalGoldInGrams,
                                                           "TotalPaidAmount"=>$totalPaidAmount,
                                                           "WastageDiscount"=>$WastageDiscount,
                                                           "MakingChargeDiscount"=>$MakingChargeDiscount,
                                                           "BonusPercentage"=>$BonusPercentage,
                                                           "BonusAmount"=>$CashBonusAmount));
         
         $mysql->execute("update _tbl_contracts set 
                                                    IsClosed='1',
                                                    ClosedOn='".date("Y-m-d H:i:s")."',
                                                    ClosedModel='PreClosure',
                                                    
                                                    TotalPaidAmount='".$totalPaidAmount."',
                                                    SettlementGold='".$totalGoldInGrams."',
                                                    SettlementMaterial='".$scheme_information[0]['MaterialType']."',
                                                    
                                                    WastageDiscount='".$WastageDiscount."',
                                                    MakingChargeDiscount='".$MakingChargeDiscount."',
                                                    CashBonusPercentage='".$BonusPercentage."',
                                                    CashBonusAmount='".$CashBonusAmount."',
                                                    
                                                    VoucherID='".$VoucherID."',
                                                    VoucherNumber='".$VoucherNumber."'");
         $mysql->execute("update _tbl_contracts_dues set IsShowPayButton='0' where ContractID = '".$contract_information[0]['ContractID']."'");
     }
 
}
?>