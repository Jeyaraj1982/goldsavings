<?php
class Contracts {
    
    function addNew() {
        
        global $mysql;
                              
        if ( isset($_SESSION['User']['SalesmanID']) || isset($_SESSION['User']['CustomerID'])) {
           $_POST['EntryDate'] = date("Y-m-d"); 
        } else {
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
        
        if (isset($_POST['ContractCode'])) {
            if (strlen(trim($_POST['ContractCode']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Contract Code","div"=>"ContractCode"));    
            } else {
                $dupCode = $mysql->select("select * from _tbl_contracts where ContractCode='".trim($_POST['ContractCode'])."'");
                if (sizeof($dupCode)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"ContractCode"));    
                }
            }
            $ContractCode = $_POST['ContactCode'];
        } else {
          $ContractCode= SequnceList::updateNumber("_tbl_contracts"); 
        }
        
        if (isset($_SESSION['User']['CustomerID'])) {
            $_GET['Customer']=$_SESSION['User']['CustomerID'];
        } else {
            if (strlen(trim($_GET['Customer']))==0 || trim($_GET['Customer'])=="0") {
                return json_encode(array("status"=>"failure","message"=>"Please select customer","div"=>"CustomerID"));    
            } 
        }
        
        if (strlen(trim($_GET['Scheme']))==0 || trim($_GET['Scheme'])=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select scheme","div"=>"SchemeID"));    
        }
        
        $SchemeData = json_decode(Schemes::getDetailsByID($_GET['Scheme']),true);
        $SchemeData = $SchemeData['data']; 
        
        if (strlen(trim($_POST['DueAmount']))==0 || trim($_POST['DueAmount'])=="") {
            return json_encode(array("status"=>"failure","message"=>"Please enter due amount min: ".$SchemeData[0]['MinDueAmount']." & max: ".$SchemeData[0]['MaxDueAmount'],"div"=>"DueAmount"));    
        } else {
             if (!($_POST['DueAmount']>=$SchemeData[0]['MinDueAmount'])) {
                 return json_encode(array("status"=>"failure","message"=>"Require minimum due amount is ".$SchemeData[0]['MinDueAmount'],"div"=>"DueAmount"));    
             }
             
              if (!($_POST['DueAmount']<=$SchemeData[0]['MaxDueAmount'])) {
                 return json_encode(array("status"=>"failure","message"=>"Require maximum due amount is ".$SchemeData[0]['MaxDueAmount'],"div"=>"DueAmount"));    
             }
        }
        
        
        if (strlen(trim($_POST['Duration']))==0 || trim($_POST['Duration'])=="") {
            return json_encode(array("status"=>"failure","message"=>"Please enter duration  min: ".$SchemeData[0]['MinDuration']." & max: ".$SchemeData[0]['MaxDuration'],"div"=>"Duration"));    
        } else {
             if (!($_POST['Duration']>=$SchemeData[0]['MinDuration'])) {
                 return json_encode(array("status"=>"failure","message"=>"Require minimum duration is ".$SchemeData[0]['MinDuration'],"div"=>"Duration"));    
             }
             
              if (!($_POST['Duration']<=$SchemeData[0]['MaxDuration'])) {
                 return json_encode(array("status"=>"failure","message"=>"Require maximum duration is ".$SchemeData[0]['MaxDuration'],"div"=>"Duration"));    
             }
        }
        
        if (strlen(trim($_POST['MaterialType']))==0 || trim($_POST['MaterialType'])=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select material type","div"=>"MaterialType"));    
        }
        
        if ($_POST['PaymentModeID']=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select Payment Mode","div"=>"PaymentModeID"));    
        }
        
        if ($_POST['PaymentRemarks']=="") {
            return json_encode(array("status"=>"failure","message"=>"Please enter payment remarks","div"=>"PaymentRemarks"));    
        }
        
        $todayGoldPrice=$mysql->select("select * from  _tbl_masters_goldrates where Date='".$_POST['EntryDate']."'");
        if (sizeof($todayGoldPrice)==0) {
           return json_encode(array("status"=>"failure","message"=>"Please update gold price on ".date("d-m-Y",strtotime($_POST['EntryDate'])),"div"=>"PaymentModeID"));     
        }

        $CustomerData = json_decode(Customers::getDetailsByID($_GET['Customer']),true);
        $CustomerData = $CustomerData['data'];                              
        
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
                                
        $_POST['ModeOfBenifits'] = "GOLD";
        if ($_SESSION['User']['UserModule']=="admin" || $_SESSION['User']['UserModule']=="subadmin") {
            $Branch = $mysql->select("select * from _tbl_masters_branches where BranchID='".$_POST['BranchID']."'");
        } else {
            $Branch = $mysql->select("select * from _tbl_masters_branches where BranchID='".$_SESSION['User']['BranchID']."'");
        }
        if ($_SESSION['User']['UserModule']=="admin") {
            $CreatedBy="Administrator";
            $CreatedByID=$_SESSION['User']['AdministratorID'];
            $CreatedByName=$_SESSION['User']['AdministratorName'];
        } 
        if ($_SESSION['User']['UserModule']=="subadmin") {
            $CreatedBy="Sub Admin";
            $CreatedByID=$_SESSION['User']['UserID'];
            $CreatedByName=$_SESSION['User']['UserName'];
        }
        if ($_SESSION['User']['UserModule']=="branchadmin") {
            $CreatedBy="Branch Admin";
            $CreatedByID=$_SESSION['User']['UserID'];
            $CreatedByName=$_SESSION['User']['UserName'];
        }
        if ($_SESSION['User']['UserModule']=="branchuser") {
            $CreatedBy="Branch User";
            $CreatedByID=$_SESSION['User']['UserID'];
            $CreatedByName=$_SESSION['User']['UserName'];
        }
        $BranchID=$Branch[0]['BranchID'];
        $BranchCode=$Branch[0]['BranchCode'];
        $BranchName=$Branch[0]['BranchName'];
        $ContractID = $mysql->insert("_tbl_contracts",array("ContractCode"         => $ContractCode,
                                                            "EntryDate"            => $_POST['EntryDate'],
                                                            
                                                            "CustomerID"           => $_GET['Customer'],
                                                            "CustomerCode"         => $CustomerData[0]['CustomerCode'],
                                                            "CustomerName"         => $CustomerData[0]['CustomerName'],
                                                            "MobileNumber"         => $CustomerData[0]['MobileNumber'],
                                                            "CustomerData"         => json_encode($CustomerData[0]),
                                                            
                                                            "SchemeID"             => $_GET['Scheme'],
                                                            "SchemeCode"           => $SchemeData[0]['SchemeCode'],
                                                            "SchemeName"           => $SchemeData[0]['SchemeName'],
                                                            "SchemeData"           => json_encode($SchemeData[0]),
                                                           
                                                            "ModeOfBenifits"       => $_POST['ModeOfBenifits'],
                                                            "InstallmentMode"      => $_POST['InstallmentMode'],
                                                            "ContractAmount"       => $_POST['Duration']*$_POST['DueAmount'],

                                                            "DueAmount"            => $_POST['DueAmount'],
                                                            "Duration"             => $_POST['Duration'],      
                                                            "MaterialType"         => $_POST['MaterialType'],
                                                           
                                                            "CreatedOn"            => date("Y-m-d H:i:s"),
                                                            "CreatedBy"            => $CreatedBy,
                                                            "CreatedByID"          => $CreatedByID,
                                                            "VoucherNumber"        => "",
                                                            "WastageDiscount"      => $SchemeData[0]['WastageDiscount'],
                                                            "MakingChargeDiscount" => $SchemeData[0]['MakingChargeDiscount'],
                                                            
                                                            "BranchID"              => $BranchID,
                                                            "BranchCode"            => $BranchCode,
                                                            "BranchName"            => $BranchName,
                                                            "CreatedBy"             => $CreatedBy,
                                                            "CreatedByID"           => $CreatedByID,
                                                            "CreatedByName"         => $CreatedByName,
                                                            "CreatedByName"        => $CreatedByName));
        if ($ContractID>0) {

            $scheme_information = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$_GET['Scheme']."'");
            
            if ($_POST['InstallmentMode']=="MONTHLY") {
                
                for($i=1;$i<=$_POST['Duration'];$i++) {
                    $dueDate = date('Y-m-d', strtotime($_POST['EntryDate']. ' + '.(($i-1)*30).' days'));
                    $mysql->insert("_tbl_contracts_dues",array("CustomerID"     => $CustomerData[0]['CustomerID'],
                                                               "CustomerCode"   => $CustomerData[0]['CustomerCode'],
                                                               "CustomerName"   => $CustomerData[0]['CustomerName'],
                                                               
                                                               "ContractID"     => $ContractID,
                                                               "ContractCode"   => $ContractCode,
                                                               
                                                               "SchemeID"       => $scheme_information[0]['SchemeID'],
                                                               "SchemeCode"     => $scheme_information[0]['SchemeCode'],
                                                               "SchemeName"     => $scheme_information[0]['SchemeName'],
                                                               
                                                               "DueNumber"      => $i,
                                                               "DueDate"        => $dueDate,
                                                               "ReceiptNumber"  => "",
                                                               "DueAmount"      => $_POST['DueAmount'],
                                                               "IsShowPayButton"=> '0',
                                                               "GoldInGram"     => "0"))   ;
                }
                
                $mysql->execute("update _tbl_contracts set StartDate='".$_POST['EntryDate']."', 
                                                           EndDate='".$dueDate."' 
                                                                where ContractID='".$ContractID."'");
                
                if ($_POST['ModeOfBenifits']=="GOLD") {
                    $DueGold = number_format($_POST['DueAmount']/$todayGoldPrice[0][$_POST['MaterialType']],3);    
                    $GoldPrice=$todayGoldPrice[0][$_POST['MaterialType']];
                } else {
                    $DueGold = 0;
                    $GoldPrice="0";
                }
                
                $RecepitNumber = SequnceList::updateNumber("_tbl_receipts");
                $PaymentMode = $mysql->select("select * from _tbl_masters_paymentmodes where  PaymentModeID='".$_POST['PaymentModeID']."'");
                
                $RecepitID = $mysql->insert("_tbl_receipts",array("ReceiptNumber"        => $RecepitNumber,
                                                                  "ReceiptDate"          => $_POST['EntryDate'],
                                                                  "CustomerID"           => $CustomerData[0]['CustomerID'],
                                                                  "CustomerCode"         => $CustomerData[0]['CustomerCode'],
                                                                  "CustomerName"         => $CustomerData[0]['CustomerName'],
                                                                  "MobileNumber"        => $CustomerData[0]['MobileNumber'],
                                                                  "ContractID"           => $ContractID,
                                                                  "ContractCode"         => $ContractCode,
                                                                  "DueNumber"            => '1',
                                                                  "DueAmount"            => $_POST['DueAmount'],
                                                                  "DueGold"              => $DueGold,
                                                                  "PriceOnDate"          => $_POST['EntryDate'],
                                                                  "PaidAmount"           => $_POST['DueAmount'],
                                                                  "PaymentModeID"        => $PaymentMode[0]['PaymentModeID'],
                                                                  "PaymentMode"          => $PaymentMode[0]['PaymentMode'],
                                                                  "PaymentRemarks"       => $_POST['PaymentRemarks'],
                                                                  "CreatedOn"            => date("Y-m-d H:i:s")));
                                                              
                $dues = $mysql->select("select * from _tbl_contracts_dues where ContractID='".$ContractID."'");
                
                $mysql->execute("update _tbl_contracts_dues set ReceiptID       = '".$RecepitID."', 
                                                                ReceiptNumber   = '".$RecepitNumber."', 
                                                                GoldInGram      = '".$DueGold."', 
                                                                GoldPrice       = '".$GoldPrice."', 
                                                                GoldPriceOnDate = '".$_POST['EntryDate']."', 
                                                                PaymentDate     = '".$_POST['EntryDate']."', 
                                                                PaymentDateTime = '".date("Y-m-d H:i:s")."', 
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
            return json_encode(array("status"=>"failure","message"=>"unable to create".$mysql->error,"div"=>""));
        }
     }
     
     public static function remove() {
         global $mysql;
         return json_encode(array("status"=>"success","message"=>"Unable to delete, You must close contract","data"=>$mysql->select("select * from _tbl_contracts order by ContractID desc ")));
         $mysql->execute("delete from _tbl_contracts where ContractID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_contracts")));
     }

     public static function listAll() {
         
         global $mysql;
         
         if (isset($_SESSION['User']['SalesmanID'])) {
             if (isset($_POST['SelectType'])) {
                 switch($_POST['SelectType']) {
                     case 'ALL':
                        $data = $mysql->select("select * from _tbl_contracts where date(CreatedOn)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(CreatedOn)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."')");
                        break;
                     case 'ACTIVE':
                        $data = $mysql->select("select * from _tbl_contracts where (date(CreatedOn)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(CreatedOn)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."')) and IsClosed='0'");
                        break;
                     case 'CLOSED':
                        $data = $mysql->select("select * from _tbl_contracts where (date(CreatedOn)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(CreatedOn)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."')) and  IsClosed='1'");
                        break;
                     default:
                        $data = $mysql->select("select * from _tbl_contracts");
                        break;
                 }
             } else {
                $data = $mysql->select("select * from _tbl_contracts");
             }
             
             $_recentContracts=array();
             foreach($data as $recentContract) {
                 
                $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$recentContract['ContractID']."'");
                $golds = $mysql->select("select sum(GoldInGram) as GoldInGram from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$recentContract['ContractID']."'");
                $totaldues = $mysql->select("select * from _tbl_contracts_dues where  ContractID='".$recentContract['ContractID']."'");
                 
                $tmp=array();
                $tmp['CustomerName']    = $recentContract['CustomerName'];
                $tmp['ContractCode']    = $recentContract['ContractCode'];
                $tmp['SchemeID']        =  $recentContract['SchemeID'];
                $tmp['SchemeName']      = $recentContract['SchemeName'];
                $tmp['ContractAmount']  = number_format($recentContract['ContractAmount'],2);
                $tmp['StartDate']       = date("d-m-Y",strtotime($recentContract['StartDate']));
                $tmp['EndDate']         = date("d-m-Y",strtotime($recentContract['EndDate']));
                $tmp['IsActive']        = $recentContract['IsActive'];
                $tmp['GoldInGram']      = number_format($golds[0]['GoldInGram'],3);
                $tmp['PaidDues']        = sizeof($dues);
                $tmp['UnPaidDues']      = sizeof($totaldues)-sizeof($dues);
                $tmp['IsClosed']        = $recentContract['IsClosed'];   
                $tmp['InstallmentMode'] = $recentContract['InstallmentMode'];   
                if ($tmp['IsActive']=="1"){
                    $tmp['StatusString']= "Active";
                }
                if ($recentContract['IsClosed']=="1"){
                    $tmp['IsActive']    = "3";
                    
                    $tmp['StatusString']= "Closed";
                    $tmp['ClosedOn']    = date("d-m-Y",strtotime($recentContract['ClosedOn']));
                }
                $tmp['Receipts']        = sizeof($dues);
                $tmp['VoucherNumber']   = $recentContract['VoucherNumber'];
                $_recentContracts[] = $tmp; 
             }
             return json_encode(array("status"=>"success","data"=>$_recentContracts));
             
             
         } elseif (isset($_SESSION['User']['CustomerID'])) {
             
             $data = $mysql->select("select * from _tbl_contracts where CustomerID='".$_SESSION['User']['CustomerID']."'");
             $_recentContracts=array();
             foreach($data as $recentContract) {
                $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$recentContract['ContractID']."'");
                $golds = $mysql->select("select sum(GoldInGram) as GoldInGram from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$recentContract['ContractID']."'");
                $totaldues = $mysql->select("select * from _tbl_contracts_dues where  ContractID='".$recentContract['ContractID']."'");
               
                $tmp=array();
                $tmp['ContractCode']= $recentContract['ContractCode'];
                $tmp['SchemeID']=  $recentContract['SchemeID'];
                $tmp['SchemeName']= $recentContract['SchemeName'];
                $tmp['ContractAmount']= number_format($recentContract['ContractAmount'],2);
                $tmp['StartDate']= date("d-m-Y",strtotime($recentContract['StartDate']));
                $tmp['EndDate']= date("d-m-Y",strtotime($recentContract['EndDate']));
                $tmp['IsActive']= $recentContract['IsActive'];
                $tmp['GoldInGram']      = number_format($golds[0]['GoldInGram'],3);
                $tmp['PaidDues']        = sizeof($dues);
                $tmp['UnPaidDues']      = sizeof($totaldues)-sizeof($dues);
                $tmp['IsClosed']        = $recentContract['IsClosed'];   
                $tmp['InstallmentMode'] = $recentContract['InstallmentMode'];  
                if ($tmp['IsActive']=="1"){
                    $tmp['StatusString']= "Active";
                }
                if ($recentContract['IsClosed']=="1"){
                    $tmp['IsActive']="3";
                    $tmp['StatusString']= "Closed";
                    $tmp['ClosedOn']=date("d-m-Y",strtotime($recentContract['ClosedOn']));
                }
                $tmp['Receipts']= sizeof($dues);
                $tmp['VoucherNumber']= $recentContract['VoucherNumber'];
                $_recentContracts[]=$tmp; 
             }
             return json_encode(array("status"=>"success","data"=>$_recentContracts));
             
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
             
             $data = array();
             
             if ($_POST['SelectType']=="ALL") {
                 $data = $mysql->select("select * from _tbl_contracts where date(StartDate)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(StartDate)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."')");
             }
             
             if ($_POST['SelectType']=="ACTIVE") {
                 $data = $mysql->select("select * from _tbl_contracts where IsClosed='0' and (date(StartDate)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(StartDate)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."')) ");
             }
             
             if ($_POST['SelectType']=="CLOSED") {
                 $data = $mysql->select("select * from _tbl_contracts where IsClosed='1' and (date(StartDate)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(StartDate)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."')) ");
             }
             
             $_recentContracts=array();
             foreach($data as $recentContract) {
                 $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and   ContractID='".$recentContract['ContractID']."'");
                 $golds = $mysql->select("select sum(GoldInGram) as GoldInGram from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$recentContract['ContractID']."'");
                $totaldues = $mysql->select("select * from _tbl_contracts_dues where  ContractID='".$recentContract['ContractID']."'");
               
                 $tmp=array();
                 $tmp['ContractCode']= $recentContract['ContractCode'];
                 $tmp['SchemeID']=  $recentContract['SchemeID'];
                 $tmp['SchemeName']= $recentContract['SchemeName'];
                 $tmp['ContractAmount']= number_format($recentContract['ContractAmount'],2);
                 $tmp['StartDate']= date("d-m-Y",strtotime($recentContract['StartDate']));
                 $tmp['EndDate']= date("d-m-Y",strtotime($recentContract['EndDate']));
                 $tmp['CustomerName']= $recentContract['CustomerName'];
                 $tmp['CustomerID']= $recentContract['CustomerID'];
                 $tmp['CustomerCode']= $recentContract['CustomerCode'];
                 $tmp['IsActive']= $recentContract['IsActive'];
                  $tmp['GoldInGram']      = number_format($golds[0]['GoldInGram'],3);
                $tmp['PaidDues']        = sizeof($dues);
                $tmp['UnPaidDues']      = sizeof($totaldues)-sizeof($dues);
                $tmp['IsClosed']        = $recentContract['IsClosed'];   
                 $tmp['IsClosed']        = $recentContract['IsClosed'];   
                $tmp['InstallmentMode'] = $recentContract['InstallmentMode']; 
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
             return json_encode(array("status"=>"success","data"=>$_recentContracts));
         }
     }
     
     public static function listAllActive() {
         
         global $mysql;
         
         if (isset($_SESSION['User']['SalesmanID'])) {
             
             $data = $mysql->select("select * from _tbl_contracts");
             return json_encode(array("status"=>"success","data"=>$data));
             
         } elseif (isset($_SESSION['User']['CustomerID'])) {
             
             $data = $mysql->select("select * from _tbl_contracts where CustomerID='".$_SESSION['User']['CustomerID']."' and IsClosed='0' order by ContractID");
             $_recentContracts=array();
             
             foreach($data as $recentContract) {
                 
                 $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$recentContract['ContractID']."'");
                 $golds = $mysql->select("select sum(GoldInGram) as GoldInGram from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$recentContract['ContractID']."'");
                 $totaldues = $mysql->select("select * from _tbl_contracts_dues where  ContractID='".$recentContract['ContractID']."'");
                 
                 $tmp=array();
                 $tmp['ContractCode']   = $recentContract['ContractCode'];
                 $tmp['SchemeID']       = $recentContract['SchemeID'];
                 $tmp['SchemeName']     = $recentContract['SchemeName'];
                 $tmp['ContractAmount'] = number_format($recentContract['ContractAmount'],2);
                 $tmp['StartDate']      = date("d-m-Y",strtotime($recentContract['StartDate']));
                 $tmp['EndDate']        = date("d-m-Y",strtotime($recentContract['EndDate']));
                 $tmp['GoldInGram']    = number_format($golds[0]['GoldInGram'],3);
                 $tmp['PaidDues']       = sizeof($dues);
                 $tmp['UnPaidDues']     = sizeof($totaldues)-sizeof($dues);
                 $tmp['IsActive']       = $recentContract['IsActive'];
                 $tmp['InstallmentMode'] = $recentContract['InstallmentMode']; 
                 if ($tmp['IsActive']=="1") {
                     $tmp['StatusString']= "Active";
                 }
                 if ($recentContract['IsClosed']=="1") {
                     $tmp['IsActive']="3";
                     $tmp['StatusString']= "Closed";
                     $tmp['ClosedOn']=date("d-m-Y",strtotime($recentContract['ClosedOn']));
                     $tmp['VoucherNumber']= $recentContract['VoucherNumber'];
                 }
                 $_recentContracts[]=$tmp; 
             }
             return json_encode(array("status"=>"success","data"=>$_recentContracts));
             
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
    
    $data = array();
    
    if ($_POST['SelectType']=="ALL") {
        $data = $mysql->select("select * from _tbl_contracts where date(StartDate)>=date('".$_POST['FromDate']."') and date(StartDate)<=date('".$_POST['ToDate']."')");
    }
    
    if ($_POST['SelectType']=="ACTIVE") {
        $data = $mysql->select("select * from _tbl_contracts where IsClosed='0' and (date(StartDate)>=date('".$_POST['FromDate']."') and date(StartDate)<=date('".$_POST['ToDate']."')) ");
    }
      
    if ($_POST['SelectType']=="CLOSED") {
        $data = $mysql->select("select * from _tbl_contracts where IsClosed='1' and (date(StartDate)>=date('".$_POST['FromDate']."') and date(StartDate)<=date('".$_POST['ToDate']."')) ");
    }       
    
    $_recentContracts=array();
             foreach($data as $recentContract) {
                 $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and   ContractID='".$recentContract['ContractID']."'");
                 $tmp=array();
                 $tmp['ContractCode']= $recentContract['ContractCode'];
                 $tmp['SchemeID']=  $recentContract['SchemeID'];
                 $tmp['SchemeName']= $recentContract['SchemeName'];
                 $tmp['ContractAmount']= $recentContract['ContractAmount'];
                 $tmp['StartDate']= date("d-m-Y",strtotime($recentContract['StartDate']));
                 $tmp['EndDate']= date("d-m-Y",strtotime($recentContract['EndDate']));
                 $tmp['CustomerName']= $recentContract['CustomerName'];
                 $tmp['CustomerID']= $recentContract['CustomerID'];
                 $tmp['CustomerCode']= $recentContract['CustomerCode'];
                 $tmp['IsActive']= $recentContract['IsActive'];
                 $tmp['InstallmentMode'] = $recentContract['InstallmentMode']; 
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
             return json_encode(array("status"=>"success","data"=>$_recentContracts));
         }
         
     }
     
     public static function listAllClosed() {
         
         global $mysql;
         
         if (isset($_SESSION['User']['SalesmanID'])) {
             $data = $mysql->select("select * from _tbl_contracts");
             return json_encode(array("status"=>"success","data"=>$data));
             
             
         } elseif (isset($_SESSION['User']['CustomerID'])) {
             
             $data = $mysql->select("select * from _tbl_contracts where CustomerID='".$_SESSION['User']['CustomerID']."'  and IsClosed='1'");
             $_recentContracts=array();
             foreach($data as $recentContract) {
                $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$recentContract['ContractID']."'");
                  $golds = $mysql->select("select sum(GoldInGram) as GoldInGram from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$recentContract['ContractID']."'");
                 $totaldues = $mysql->select("select * from _tbl_contracts_dues where  ContractID='".$recentContract['ContractID']."'");
               
                
                $tmp=array();
                $tmp['ContractCode']   = $recentContract['ContractCode'];
                $tmp['SchemeID']       =  $recentContract['SchemeID'];
                $tmp['SchemeName']     = $recentContract['SchemeName'];
                $tmp['ContractAmount'] = number_format($recentContract['ContractAmount'],2);
                $tmp['StartDate']      = date("d-m-Y",strtotime($recentContract['StartDate']));
                $tmp['EndDate']        = date("d-m-Y",strtotime($recentContract['EndDate']));
                $tmp['GoldInGram']     = number_format($golds[0]['GoldInGram'],3);
                $tmp['PaidDues']       = sizeof($dues);
                $tmp['UnPaidDues']     = sizeof($totaldues)-sizeof($dues);
                $tmp['IsActive']= $recentContract['IsActive'];
                $tmp['InstallmentMode'] = $recentContract['InstallmentMode']; 
                if ($tmp['IsActive']=="1"){
                    $tmp['StatusString']= "Active";
                }
                if ($recentContract['IsClosed']=="1"){
                    $tmp['IsActive']="3";
                    $tmp['StatusString']= "Closed";
                    $tmp['ClosedOn']=date("d-m-Y",strtotime($recentContract['ClosedOn']));
                }
                $tmp['Receipts']= sizeof($dues);
                $tmp['VoucherNumber']= $recentContract['VoucherNumber'];
                $_recentContracts[]=$tmp; 
             }
             return json_encode(array("status"=>"success","data"=>$_recentContracts));
             
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
    
    $data = array();
    
    if ($_POST['SelectType']=="ALL") {
        $data = $mysql->select("select * from _tbl_contracts where date(StartDate)>=date('".$_POST['FromDate']."') and date(StartDate)<=date('".$_POST['ToDate']."')");
    }
    
    if ($_POST['SelectType']=="ACTIVE") {
        $data = $mysql->select("select * from _tbl_contracts where IsClosed='0' and (date(StartDate)>=date('".$_POST['FromDate']."') and date(StartDate)<=date('".$_POST['ToDate']."')) ");
    }
      
    if ($_POST['SelectType']=="CLOSED") {
        $data = $mysql->select("select * from _tbl_contracts where IsClosed='1' and (date(StartDate)>=date('".$_POST['FromDate']."') and date(StartDate)<=date('".$_POST['ToDate']."')) ");
    }       
    
    $_recentContracts=array();
             foreach($data as $recentContract) {
                 $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and   ContractID='".$recentContract['ContractID']."'");
                 $tmp=array();
                 $tmp['ContractCode']= $recentContract['ContractCode'];
                 $tmp['SchemeID']=  $recentContract['SchemeID'];
                 $tmp['SchemeName']= $recentContract['SchemeName'];
                 $tmp['ContractAmount']= $recentContract['ContractAmount'];
                 $tmp['StartDate']= date("d-m-Y",strtotime($recentContract['StartDate']));
                 $tmp['EndDate']= date("d-m-Y",strtotime($recentContract['EndDate']));
                 $tmp['CustomerName']= $recentContract['CustomerName'];
                 $tmp['CustomerID']= $recentContract['CustomerID'];
                 $tmp['CustomerCode']= $recentContract['CustomerCode'];
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
             return json_encode(array("status"=>"success","data"=>$_recentContracts));
         }
         
     }
     
     public static function listBySchemes() {
         
         global $mysql;
         
         if (isset($_SESSION['User']['CustomerID'])) {
             
             $data = $mysql->select("select * from _tbl_contracts where SchemeID='".$_GET['SchemeID']."' and CustomerID='".$_SESSION['User']['CustomerID']."'  order by ContractID desc");
             
             $_recentContracts=array();
             foreach($data as $recentContract) {
                 
                 $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$recentContract['ContractID']."'");
                 $golds = $mysql->select("select sum(GoldInGram) as GoldInGram from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$recentContract['ContractID']."'");
                 $totaldues = $mysql->select("select * from _tbl_contracts_dues where  ContractID='".$recentContract['ContractID']."'");
                 
                 $tmp=array();
                 $tmp['ContractCode']   = $recentContract['ContractCode'];
                 $tmp['SchemeID']       = $recentContract['SchemeID'];
                 $tmp['SchemeName']     = $recentContract['SchemeName'];
                 $tmp['ContractAmount'] = number_format($recentContract['ContractAmount'],2);
                 $tmp['StartDate']      = date("d-m-Y",strtotime($recentContract['StartDate']));
                 $tmp['EndDate']        = date("d-m-Y",strtotime($recentContract['EndDate']));
                 $tmp['GoldInGram']     = number_format($golds[0]['GoldInGram'],3);
                 $tmp['PaidDues']       = sizeof($dues);
                 $tmp['UnPaidDues']     = sizeof($totaldues)-sizeof($dues);
                 $tmp['IsActive']       = $recentContract['IsActive'];
                 if ($tmp['IsActive']=="1") {
                     $tmp['StatusString']= "Active";
                     $tmp['VoucherNumber']= "";
                 }
                 if ($recentContract['IsClosed']=="1") {
                     $tmp['IsActive']="3";
                     $tmp['StatusString']= "Closed";
                     $tmp['ClosedOn']=date("d-m-Y",strtotime($recentContract['ClosedOn']));
                     $tmp['VoucherNumber']= $recentContract['VoucherNumber'];
                 }
                 $tmp['Receipts']       = sizeof($dues);
                 $_recentContracts[]=$tmp; 
             }
             return json_encode(array("status"=>"success","data"=>$_recentContracts));
             
         } else {
             $data = $mysql->select("select * from _tbl_contracts where SchemeID='".$_GET['SchemeID']."'");
             return json_encode(array("status"=>"success","data"=>$data));
         }
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
         $contract_data[0]['EntryDate']=date("d-m-Y",strtotime($contract_data[0]['EntryDate']));
         $contract_data[0]['CreatedOn']=date("d-m-Y",strtotime($contract_data[0]['CreatedOn']));
         
         $dues = $mysql->select("select * from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$contract_data[0]['ContractID']."'");
         $golds = $mysql->select("select sum(GoldInGram) as GoldInGram from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$contract_data[0]['ContractID']."'");
         $totaldues = $mysql->select("select * from _tbl_contracts_dues where  ContractID='".$contract_data[0]['ContractID']."'");
                
         $contract_data[0]['GoldInGram']= number_format($golds[0]['GoldInGram'],3);
         $contract_data[0]['DueAmount']= number_format($contract_data[0]['DueAmount'],2);
         $contract_data[0]['StartDate']= date("d-m-Y",strtotime($contract_data[0]['StartDate']));
         $contract_data[0]['EndDate']= date("d-m-Y",strtotime($contract_data[0]['EndDate']));
         $contract_data[0]['PaidDues']= sizeof($dues);
         $contract_data[0]['UnPaidDues']= sizeof($totaldues)-sizeof($dues);
                
         $data['ContractData'] = $contract_data[0];
         
         $data['DueData'] = $mysql->select("select DATE_FORMAT(DueDate,'%d-%m-%Y') AS DueDate,
                                                   DATE_FORMAT(GoldPriceOnDate,'%d-%m-%Y') AS GoldPriceOnDate,
                                                   DATE_FORMAT(PaymentDate,'%d-%m-%Y') AS PaymentDate,
                                                   DueNumber,
                                                   FORMAT(DueAmount, 2) as DueAmount,
                                                   FORMAT(GoldPrice, 2) as GoldPrice,
                                                   ReceiptNumber,
                                                   ReceiptID,
                                                   IF (GoldInGram=0,'0',FORMAT(GoldInGram, 3)) as GoldInGram,
                                                   DueID,
                                                   IsShowPayButton
                                                        from _tbl_contracts_dues where CustomerID='".$contract_data[0]['CustomerID']."' and ContractID='".$contract_data[0]['ContractID']."'");
         
         
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
    public static function listCustomerWise() {
         global $mysql;
         $data = $mysql->select("select 
         ContractID,
         ContractCode,
         SchemeName,
         FORMAT(ContractAmount, 2) as ContractAmount,
         DATE_FORMAT(StartDate,'%d-%m-%Y') AS StartDate,
         DATE_FORMAT(EndDate,'%d-%m-%Y') AS EndDate,
         DATE_FORMAT(ClosedOn,'%d-%m-%Y') AS EndDate,
         SchemeID
          from _tbl_contracts where CustomerID='".$_GET['CustomerID']."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
    public static function getPreCollectDueInformation() {
         
         global $mysql;
         $GoldPrice = array();
         if (isset($_SESSION['User']['CustomerID'])) {
            $_POST['PaymentDate'] = date("Y-m-d") ;
            $GoldPrice=$mysql->select("select * from  _tbl_masters_goldrates where Date='".$_POST['PaymentDate']."'");
         } else {
             if (strlen(trim($_POST['PaymentDate']))==0) {
                 return json_encode(array("status"=>"failure","message"=>"Please select date","div"=>"PaymentDate"));    
             } else {
                $currentdate = strtotime(date("Y-m-d"));
                $entrydate = strtotime($_POST['PaymentDate']);
                if (!($entrydate<=$currentdate)) {
                    return json_encode(array("status"=>"failure","message"=>"Please select date on/or before ".date("d-m-Y"),"div"=>"PaymentDate"));        
                }
             }
             
             $GoldPrice=$mysql->select("select * from  _tbl_masters_goldrates where Date='".$_POST['PaymentDate']."'");
             if (sizeof($GoldPrice)==0) {
                return json_encode(array("status"=>"failure","message"=>"Gold price not available this date ".date("d-m-Y",strtotime($_POST['PaymentDate'])),"div"=>"PaymentDate"));    
             }
         }
         
         $due_information = $mysql->select("Select * from _tbl_contracts_dues where DueID='".$_GET['ID']."'");
         $contract_information = $mysql->select("Select * from _tbl_contracts where ContractID='".$due_information[0]['ContractID']."'");
         $scheme_information = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$contract_information[0]['SchemeID']."'");
         $CustomerData = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$contract_information[0]['CustomerID']."'");
         
         //if ($scheme_information[0]['ModeOfBenifits']=="GOLD") {
             $DueGold = number_format($contract_information[0]['DueAmount']/$GoldPrice[0][$contract_information[0]['MaterialType']],3);    
        // } else {
         //    $DueGold = 0;
        // }
         $data = array("MaterialType"    => $contract_information[0]['MaterialType'],
                       "ModeOfBenifits"  => $contract_information[0]['ModeOfBenifits'],
                       "DueAmount"       => $contract_information[0]['DueAmount'],
                       "GoldPrice"       => $GoldPrice[0][$contract_information[0]['MaterialType']],
                       "GoldInGrams"     => $DueGold,
                       "DueID"           => $due_information[0]['DueID'],
                       "Installment"     => $due_information[0]['DueNumber'],
                       "ActualDueDate"   => date("d-m-Y",strtotime($due_information[0]['DueDate'])));

         return json_encode(array("status"=>"success","data"=>$data));
     }
    
    public static function collectDue() {
         
         global $mysql;
         
         $due_information = $mysql->select("Select * from _tbl_contracts_dues where DueID='".$_POST['DueID']."'");
         $todayGoldPrice=$mysql->select("select * from  _tbl_masters_goldrates where Date='".$_POST['PaymentDate']."'");
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

         $DueGold = number_format($contract_information[0]['DueAmount']/$todayGoldPrice[0][$contract_information[0]['MaterialType']],3);    
         $RecepitNumber = SequnceList::updateNumber("_tbl_receipts");
         
         $RecepitID = $mysql->insert("_tbl_receipts",array("ReceiptNumber"        => $RecepitNumber,
                                                           "ReceiptDate"          => $_POST['PaymentDate'],
                                                           "CustomerID"           => $CustomerData[0]['CustomerID'],
                                                           "CustomerCode"         => $CustomerData[0]['CustomerCode'],
                                                           "CustomerName"         => $CustomerData[0]['CustomerName'],
                                                           "MobileNumber"         => $CustomerData[0]['MobileNumber'],
                                                           "ContractID"           => $contract_information[0]['ContractID'],
                                                           "ContractCode"         => $contract_information[0]['ContractCode'],
                                                           "DueNumber"            => $due_information[0]['DueNumber'],
                                                           "DueAmount"            => $contract_information[0]['DueAmount'],
                                                           "DueGold"              => $DueGold,
                                                           "PriceOnDate"          => $_POST['PaymentDate'],
                                                           "PaidAmount"           => $contract_information[0]['DueAmount'],
                                                           "PaymentModeID"        => $PaymentMode[0]['PaymentModeID'],
                                                           "PaymentMode"          => $PaymentMode[0]['PaymentMode'],
                                                           "CreatedOn"            => date("Y-m-d H:i:s"),
                                                           "PaymentRemarks"       => $_POST['PaymentRemarks']));
                
         $mysql->execute("update _tbl_contracts_dues set ReceiptID       = '".$RecepitID."', 
                                                         ReceiptNumber   = '".$RecepitNumber."', 
                                                         GoldInGram      = '".$DueGold."', 
                                                         GoldPrice       = '".$todayGoldPrice[0][$contract_information[0]['MaterialType']]."', 
                                                         GoldPriceOnDate = '".$_POST['PaymentDate']."', 
                                                         PaymentDate     = '".$_POST['PaymentDate']."', 
                                                         IsShowPayButton ='0'
                                                                    where DueID = '".$due_information[0]['DueID']."'");
                
         $dues = $mysql->select("select * from _tbl_contracts_dues where DueID>'".$due_information[0]['DueID']."'");
         $mysql->execute("update _tbl_contracts_dues set IsShowPayButton='1' where DueID = '".$dues[0]['DueID']."'");
         include SERVER_PATH."/lib/phpqrcode/qrlib.php";   
         $url = WEB_URL."receipt".md5($RecepitNumber);
         QRcode::png($url, SERVER_PATH."/assets/qrcodes/".md5($RecepitNumber).".png");  
         $paiddues = $mysql->select("select * from _tbl_contracts_dues where ContractID='".$contract_information[0]['ContractID']."' and ReceiptID>0");
         if (sizeof($paiddues)==$contract_information[0]['Duration']) {
            self::closeContract($contract_information[0]['ContractID'],$_POST['PaymentDate'],"Regular");
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
         
         //if ($scheme_information[0]['ModeOfBenifits']=="GOLD") {
             
         //} else {
         //   $DueGold = 0; 
         //}
         $totalGoldInGrams = number_format($totalGoldInGrams,3);
         
         $WastageDiscount=$scheme_information[0]['WastageDiscount'];
         $MakingChargeDiscount=$scheme_information[0]['MakingChargeDiscount'];
         $BonusPercentage=$scheme_information[0]['BonusPercentage'];
         $CashBonusAmount = $totalPaidAmount * $scheme_information[0]['BonusPercentage']/100;
         $AdditionalNote="";
         if (sizeof($due_information)<=3) {
             $WastageDiscount="0";
             $MakingChargeDiscount="0";
             $BonusPercentage="0";
             $CashBonusAmount=$totalPaidAmount;
             $AdditionalNote="You have paid lessthan 4 dues, so wastage,making,cashbonus not available";
         }
         
         $data = array(
                       "MaterialType"          => $contract_information[0]['MaterialType'],
                       "SchemeName"            => $contract_information[0]['SchemeName'],
                       "WastageDiscount"       => $WastageDiscount,
                       "BonusPercentage"       => $BonusPercentage,
                       "MakingChargeDiscount"  => $MakingChargeDiscount,
                       "TotalPaidAmount"       => $totalPaidAmount,
                       "AdditionalNote"       => $AdditionalNote,
                       "TotalGoldInGrams"      => $totalGoldInGrams);
                     
         return json_encode(array("status"=>"success","data"=>$data));
     } 
     
     function preCloseContract() {
         
         global $mysql;
         
         $contract_information = $mysql->select("Select * from _tbl_contracts where ContractCode='".$_POST['ContractID']."'");
         return self::closeContract($contract_information[0]['ContractID'],date("Y-m-d"),"PreClosure");
     } 
     
     function closeContract($ContractID,$PaymentDate,$closeType) {
         
         global $mysql;
         
         $contract_information = $mysql->select("Select * from _tbl_contracts where ContractID='".$ContractID."'");
         $scheme_information   = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$contract_information[0]['SchemeID']."'");
         $CustomerData         = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$contract_information[0]['CustomerID']."'");
         $due_information      = $mysql->select("Select * from _tbl_contracts_dues where ReceiptID>0 and ContractID='".$contract_information[0]['ContractID']."'");
         
         $totalPaidAmount = 0;
         $totalGoldInGrams = 0;
         
         foreach($due_information as $due) {
             $totalPaidAmount += $due['DueAmount']; 
             $totalGoldInGrams += $due['GoldInGram']; 
         }
         
         $CashBonusAmount = 0;
         $BonusPercentage = 0;
         $totalGoldInGrams     = number_format($totalGoldInGrams,3);
         $VoucherType          = "GOLD";
         
         if (sizeof($due_information)<=3) {
             $WastageDiscount      = "0";
             $MakingChargeDiscount = "0"; 
             $BonusPercentage      = "0";
             $CashBonusAmount      = $totalPaidAmount;
         }
         
         $WastageDiscount = ($WastageDiscount=="") ? "0" : $WastageDiscount;
         $MakingChargeDiscount = ($MakingChargeDiscount=="") ? "0" : $MakingChargeDiscount;
         $BonusPercentage = ($BonusPercentage=="") ? "0" : $BonusPercentage;
         $CashBonusAmount = ($CashBonusAmount=="") ? "0" : $CashBonusAmount;
         
         $VoucherNumber = SequnceList::updateNumber("_tbl_vouchers");
         $VoucherID = $mysql->insert("_tbl_vouchers",array("VoucherNumber"        => $VoucherNumber,
                                                           "VoucherDate"          => $PaymentDate,
                                                           "CustomerID"           => $CustomerData[0]['CustomerID'],
                                                           "CustomerName"         => $CustomerData[0]['CustomerName'],
                                                           "CustomerCode"         => $CustomerData[0]['CustomerCode'],
                                                           "MobileNumber"         => $CustomerData[0]['MobileNumber'],
                                                           "ContractID"           => $contract_information[0]['ContractID'],
                                                           "ContractCode"         => $contract_information[0]['ContractCode'],
                                                           "GoldInGrams"          => $totalGoldInGrams,
                                                           "TotalPaidAmount"      => $totalPaidAmount,
                                                           "WastageDiscount"      => $WastageDiscount,
                                                           "MakingChargeDiscount" => $MakingChargeDiscount,
                                                           "BonusPercentage"      => $BonusPercentage,
                                                           "VoucherType"          => $VoucherType,
                                                           "MaterialType"         => $contract_information[0]['MaterialType'], 
                                                           "CreatedOn"            => date("Y-m-d H:i:s"),
                                                           "BonusAmount"          => $CashBonusAmount));
         
         $mysql->execute("update _tbl_contracts set IsClosed='1',
                                                    ClosedOn='".$PaymentDate."',
                                                    ClosedModel='".$closeType."',
                                                    
                                                    TotalPaidAmount='".$totalPaidAmount."',
                                                    SettlementGold='".$totalGoldInGrams."',
                                                    SettlementMaterial='".$contract_information[0]['MaterialType']."',
                                                    
                                                    WastageDiscount='".$WastageDiscount."',
                                                    MakingChargeDiscount='".$MakingChargeDiscount."',
                                                    CashBonusPercentage='".$BonusPercentage."',
                                                    CashBonusAmount='".$CashBonusAmount."',
                                                    
                                                    VoucherID='".$VoucherID."',
                                                    VoucherNumber='".$VoucherNumber."' where ContractID = '".$contract_information[0]['ContractID']."'") ;
         if ($closeType=="Regular") {
            $mysql->execute("update _tbl_contracts_dues set IsShowPayButton='0' where ContractID = '".$contract_information[0]['ContractID']."'");    
         }
         if ($closeType=="PreClosure") {
            $mysql->execute("update _tbl_contracts_dues set IsShowPayButton='0' where ContractID = '".$contract_information[0]['ContractID']."'");    
         }
         
         return json_encode(array("status"=>"success","message"=>"Contract Closed Successfully"));
     }
     
     function listCustomize() {
        global $mysql;
        //sleep(10);
            if (isset($_POST['OrderBy']) && $_POST['OrderBy']=="0") {
                return json_encode(array("status"=>"failure","message"=>"Please select any one column","div"=>"message"));        
            }
            
            $sql = "select
                        `ContractID`,
                        DATE_FORMAT(EntryDate,'".appConfig::DATEFORMAT."') as `EntryDate`,
                        
                        `ContractCode`,
                        `CustomerID`,
                        `CustomerCode`,
                        `CustomerName`,
                        `MobileNumber`,
                       
                        `SchemeID`,
                        `SchemeCode`,
                        `SchemeName`,
                        FORMAT(ContractAmount, 2) as `ContractAmount`,
                        `ModeOfBenifits`,
                        
                        DATE_FORMAT(StartDate,'".appConfig::DATEFORMAT."') as `StartDate`,
                        DATE_FORMAT(EndDate,'".appConfig::DATEFORMAT."') as `EndDate`,
                        DATE_FORMAT(EffectiveOn,'".appConfig::DATEFORMAT."') as `EffectiveOn`,
                        
                        `InstallmentMode`,
                        `Duration`,
                        `MaterialType`,
                        FORMAT(DueAmount, 2) as `DueAmount`,
                        
                        `CreatedBy`,
                        `CreatedByName`,
                        
                        `IsClosed`,
                        DATE_FORMAT(ClosedOn,'".appConfig::DATEFORMAT."') as `ClosedOn`,
                        `ClosedModel`,
                        FORMAT(TotalPaidAmount, 2) as `TotalPaidAmount`,
                        FORMAT(SettlementGold, 3) as `SettlementGold`,
                        `SettlementMaterial`,
                        `VoucherNumber`,
                        FORMAT(WastageDiscount, 2) as `WastageDiscount`,
                        FORMAT(MakingChargeDiscount, 2) as `MakingChargeDiscount`,
                        FORMAT(CashBonusPercentage, 2) as `CashBonusPercentage`,
                        FORMAT(CashBonusAmount, 2) as `CashBonusAmount`
                         
                         
                    from _tbl_contracts where ContractID>0 ";
             
            if (isset($_POST['CustomerNameS']) && $_POST['CustomerNameS']==1) {
                if ($_POST['selectCustomerNameFilter']=="0") {
                    $sql .= " and CustomerName like '%".$_POST['SearchCustomerName']."%' ";    
                }
                if ($_POST['selectCustomerName']=="Startwith") {
                    $sql .= " and CustomerName like '".$_POST['SearchCustomerName']."%' ";    
                }
                if ($_POST['selectCustomerName']=="Endwith") {
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
            
            if (isset($_POST['EntryDate']) && $_POST['EntryDate']=="1") {
                $fromdate = strtotime($_POST['FromDate']);
                $todate = strtotime($_POST['ToDate']);
                if ($fromdate>$todate) {
                    return json_encode(array("status"=>"failure","message"=>"Please select date on/or before ".date("d-m-Y",strtotime($_POST['ToDate'])),"div"=>"EntryDate"));        
                }
            
                $sql .= " and  (date(EntryDate)>=date('".$_POST['FromDate']."') and date(EntryDate)<=date('".$_POST['ToDate']."')) ";    
            }
              
            
            if ($_POST['OrderBy']=="EntryDate") {
                $_POST['OrderBy']="date(EntryDate)";
            }
            
            $sql .= " order by ".$_POST['OrderBy']." ".$_POST['Filterby'];
            $data = $mysql->select($sql);
        return json_encode(array("status"=>"success","data"=>$data,"sql"=>$sql));
    }
}
?>