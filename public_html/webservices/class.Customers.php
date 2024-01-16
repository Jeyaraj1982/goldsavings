<?php
class CustomersErrors {
    const CustomerCode_Empty = "Please enter Customer Code";
    const CustomerCode_Duplicate = "Customer Code already exists";
    const EntryDate_Empty = "Please select date";
    const EntryDate_GreaterThanToday = "Please select date on/or before ";
    const CustomerType_Empty = "Please select Customer Type";
    const CustomerName_Empty = "Please enter Customer Name";
    const BranchName_Empty = "Please branch Name";
    
    const FatherName_Empty = "Please enter Father/Husband's Name";
    const Gender_Empty = "Please select gender";
    const DateOfBirth_Empty = "Please select Date Of Birth";
    const DateOfBirth_MinimumYear = "Age must be greater than 18";
    const EmailID_Empty = "Please enter Email ID";
    const EmailID_InvalidFormat = "Please enter valid Email ID";
    const EmailID_Duplicate = "Email ID is already exists";
    const MobileNumber_Empty = "Please enter Mobile Number";
    const MobileNumber_InvalidFormat = "Please enter valid Mobile Number";
    const MobileNumber_Duplicate = "Mobile Number is already exists";
    
    const WhatsappNumber_Empty = "Please enter Whatsapp Number";
    const WhatsappNumber_InvalidFormat = "Please enter valid Whatsapp Number";
    const WhatsappNumber_Duplicate = "Whatsapp Number is already exists";
    
    const AlternativeMobileNumber_Empty = "Please enter Alternative Mobile Number";
    const AlternativeMobileNumber_InvalidFormat = "Please enter valid Alternative Mobile Number";
    const AlternativeMobileNumber_Duplicate = "Alternative Mobile Number is already exists";
    
    const LoginUserName_Empty = "Please enter Login User Name";
    const LoginUserName_Duplicate = "Login User Name is already used";
    const LoginUserName_RequireMinimumLength = "Minimum 6 characters require";
    const LoginUserName_RequireMaximumLength = "Maximum 8 characters require";
    
    const LoginPassword_Empty = "Please enter Login Password";
    const LoginPassword_RequireMinimumLength = "Minimum 6 characters require";
    const LoginPassword_RequireMaximumLength = "Maximum 8 characters require";
    
    const PancardNumber_Empty = "Please enter PAN Card Number";
    const PancardNumber_Duplicate = "PAN Card Number is already used";
    const PancardNumber_InvalidFormat = "PAN Card Number is invalid format";
    
    const AadhaarCardNumber_Empty = "Please enter Aadhaar Card Number";
    const AadhaarCardNumber_Duplicate = "Aadhaar Card Number is already used";
    const AadhaarCardNumber_InvalidFormat = "Aadhaar Card Number is invalid format";
    
    const AddressLine1_Empty = "Please enter Address Line 1";
    const StateName_Empty = "Please select State Name";
    const DistrictName_Empty = "Please select District Name";
    const AreaName_Empty = "Please select Area Name";
    const PinCode_Empty = "Please select Pincode";
    const PinCode_InvalidFormat = "Please enter valid Pincode";
    
    const Create_Success = "successfully created";
    const Create_Failure = "unable to create";
    
    const Update_Success = "successfully updated";
    const Update_Failure = "unable to update";
    
    const Delete_Success = "successfully deleted";
    const Delete_Failure = "unable to delete";
    
    const Document_Attach_success = "Added successfully";
    const Document_Attachment_Type_Empty = "Please select document type";
    const Document_File_Empty = "Please select and attach file(s)";
    
}

class Customers {
    
    function addNew() {
        
        
        global $mysql;
        //if (!isLogged()) {
           // return json_encode(array("status"=>"failure","message"=>"Your login session expired. Login again and continue","div"=>""));    
       // }
        if ($_SESSION['User']['UserModule']=="admin" || $_SESSION['User']['UserModule']=="subadmin") {
           if ($_POST['BranchID']=="0" || $_POST['BranchID']==0 || $_POST['BranchID']=="") {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::BranchName_Empty,"div"=>"BranchID"));    
            }
        }
        if (strlen(trim($_POST['CustomerCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::CustomerCode_Empty,"div"=>"CustomerCode"));    
        } else {
             $dup = $mysql->select("select * from _tbl_masters_customers where CustomerCode='".trim($_POST['CustomerCode'])."'");
             if (sizeof($dup)>0) {
                 return json_encode(array("status"=>"failure","message"=>CustomersErrors::CustomerCode_Duplicate,"div"=>"CustomerCode"));    
             }
        }
        
        if (isset($_SESSION['User']['SalesmanID']) && $_SESSION['User']['SalesmanID']>0) {
            $_POST['EntryDate'] = date("Y-m-d");
        } else {
            if (strlen(trim($_POST['EntryDate']))==0) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::EntryDate_Empty,"div"=>"EntryDate"));    
            } else {
                $currentdate = strtotime(date("Y-m-d"));
                $entrydate = strtotime($_POST['EntryDate']);
                if ($entrydate>$currentdate) {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::EntryDate_GreaterThanToday.date("d-m-Y"),"div"=>"EntryDate"));        
                }
            }
            $_POST['EntryDate'] = date("Y-m-d",strtotime($_POST['EntryDate']));
        }
        
        if ($_POST['CustomerTypeNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::CustomerType_Empty,"div"=>"CustomerTypeNameID"));    
        }
        
        if (strlen(trim($_POST['CustomerName']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::CustomerName_Empty,"div"=>"CustomerName"));    
        }
        
        if (strlen(trim($_POST['FatherName']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::FatherName_Empty,"div"=>"FatherName"));    
        }
        
        if (trim($_POST['Gender'])=="0") {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::Gender_Empty,"div"=>"Gender"));    
        }
        
        if (strlen(trim($_POST['DateOfBirth']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::DateOfBirth_Empty,"div"=>"DateOfBirth"));    
        } else {
            $currentYear = date("Y",strtotime(date("Y-m-d H:i:s")));
            $dobYear = date("Y",strtotime($_POST['DateOfBirth']));
            if (($currentYear-$dobYear)<18) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::DateOfBirth_MinimumYear,"div"=>"DateOfBirth"));    
            }
        }
        $_POST['DateOfBirth'] = date("Y-m-d",strtotime($_POST['DateOfBirth']));
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::EmailID_Empty,"div"=>"EmailID"));    
        } else {
            if (!checkemail(trim($_POST["EmailID"]))) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::EmailID_InvalidFormat,"div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_masters_customers where EmailID='".trim($_POST['EmailID'])."'");
                if (sizeof($dupEmail)>0) {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::EmailID_Duplicate,"div"=>"EmailID"));    
                }
            }
        }
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_Empty,"div"=>"MobileNumber"));    
        } else {
            if (strlen(trim($_POST['MobileNumber']))==10) {
                if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
                } else {
                    $dupMobile = $mysql->select("select * from _tbl_masters_customers where MobileNumber='".trim($_POST['MobileNumber'])."'");
                    if (sizeof($dupMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_Duplicate,"div"=>"MobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
           // return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['WhatsappNumber']))==10) {
                if (!($_POST['WhatsappNumber']>=6000000000 && $_POST['WhatsappNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::WhatsappNumber_Empty,"div"=>"WhatsappNumber"));    
                } else {
                    $dupWaMobile = $mysql->select("select * from _tbl_masters_customers where WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                    if (sizeof($dupWaMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>CustomersErrors::WhatsappNumber_Duplicate,"div"=>"WhatsappNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::WhatsappNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AlternativeMobileNumber']))==0) {
           // return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['AlternativeMobileNumber']))==10) {
                if (!($_POST['AlternativeMobileNumber']>=6000000000 && $_POST['AlternativeMobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
                } else {
                    $dupAltrMobile = $mysql->select("select * from _tbl_masters_customers where AlternativeMobileNumber='".trim($_POST['AlternativeMobileNumber'])."'");
                    if (sizeof($dupAltrMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>CustomersErrors::AlternativeMobileNumber_Duplicate,"div"=>"AlternativeMobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['LoginUserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginUserName_Empty,"div"=>"LoginUserName"));    
        } else {
            if (strlen(trim($_POST['LoginUserName']))<6) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginUserName_RequireMinimumLength,"div"=>"LoginUserName"));    
            }
            if (strlen(trim($_POST['LoginUserName']))>8) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginUserName_RequireMaximumLength,"div"=>"LoginUserName"));    
            }
            $dupLoginName = $mysql->select("select * from _tbl_masters_customers where LoginUserName='".trim($_POST['LoginUserName'])."'");
            if (sizeof($dupLoginName)>0) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginUserName_Duplicate,"div"=>"LoginUserName"));    
            } 
        }
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginPassword_Empty,"div"=>"LoginPassword"));    
        } else {
            if (strlen(trim($_POST['LoginPassword']))<6) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginPassword_RequireMinimumLength,"div"=>"LoginPassword"));    
            }
            if (strlen(trim($_POST['LoginPassword']))>8) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginPassword_RequireMaximumLength,"div"=>"LoginPassword"));    
            }
        }
        
        if (strlen(trim($_POST['PancardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::PancardNumber_Empty,"div"=>"PancardNumber"));    
        } else {
            if (!(IsValidPanCard(trim($_POST['PancardNumber'])))) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::PancardNumber_InvalidFormat,"div"=>"PancardNumber"));        
            }
            $dupPancard = $mysql->select("select * from _tbl_masters_customers where PancardNumber='".trim($_POST['PancardNumber'])."'");
            if (sizeof($dupPancard)>0) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::PancardNumber_Duplicate,"div"=>"PancardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AadhaarCardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::AadhaarCardNumber_Empty,"div"=>"AadhaarCardNumber"));    
        } else {
            
            $Aadhaar=str_replace("_","",trim($_POST['AadhaarCardNumber']));
            $Aadhaar=str_replace(" ","",$Aadhaar);
            
            if (strlen($Aadhaar)!=12) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::AadhaarCardNumber_InvalidFormat,"div"=>"AadhaarCardNumber"));    
            }
            
            $dupAadhaar = $mysql->select("select * from _tbl_masters_customers where AadhaarCardNumber='".trim($_POST['AadhaarCardNumber'])."'");
            if (sizeof($dupAadhaar)>0) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::AadhaarCardNumber_Duplicate,"div"=>"AadhaarCardNumber"));    
            }
        }

        if (strlen(trim($_POST['AddressLine1']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::AddressLine1_Empty,"div"=>"AddressLine1"));    
        }
        
        if ($_POST['StateNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::StateName_Empty,"div"=>"StateNameID"));    
        } else {
            if ($_POST['DistrictNameID']==0) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::DistrictName_Empty,"div"=>"DistrictNameID"));    
            } else {
                if ($_POST['AreaNameID']==0) {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::AreaName_Empty,"div"=>"AreaNameID"));    
                }  
            }
        }

        if (strlen(trim($_POST['PinCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::PinCode_Empty,"div"=>"PinCode"));    
        } else {
              $PinCode=str_replace("_","",trim($_POST['PinCode']));
            $PinCode=str_replace(" ","",$PinCode);
            
            if (strlen($PinCode)!=6) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::PinCode_InvalidFormat,"div"=>"PinCode"));    
            }
        }
        
        if (isset($_SESSION['User']['SalesmanID'])) {
            
            $_POST['ReferredBy']      = 3;
            $_POST['RefMobileNumber'] = $_SESSION['User']['MobileNumber'];
            $ReferByText = "Salesman";
            $RefID = $_SESSION['User']['SalesmanID'];
            $RefName = $_SESSION['User']['SalesmanName'];
        
        } else {
            
            if (trim($_POST['ReferredBy'])=="0") {
                $ReferByText = "";
                $RefID="0";
                $RefName="";
                //return json_encode(array("status"=>"failure","message"=>"Please select ReferredBy","div"=>"ReferredBy"));    
            } else {
                if (strlen(trim($_POST['RefMobileNumber']))==0) {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_Empty,"div"=>"RefMobileNumber"));    
                } else {
                if (strlen(trim($_POST['RefMobileNumber']))==10) { 
                    if (!($_POST['RefMobileNumber']>=6000000000 && $_POST['RefMobileNumber']<=9999999999)) {
                        return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_InvalidFormat,"div"=>"RefMobileNumber"));    
                    } else {
                        if ($_POST['ReferredBy']==1) {
                            
                            $dupMobile = $mysql->select("select * from _tbl_masters_customers where MobileNumber='".trim($_POST['RefMobileNumber'])."'");
                            if (sizeof($dupMobile)==0) {
                                return json_encode(array("status"=>"failure","message"=>"Customer's Mobile Number is not found","div"=>"RefMobileNumber"));    
                            }
                            $ReferByText = "Customer";
                            $RefID = $dupMobile[0]['CustomerID'];
                            $RefName = $dupMobile[0]['CustomerName'];
                        }
                        
                        if ($_POST['ReferredBy']==2) {
                            
                            $dupMobile = $mysql->select("select * from _tbl_employees where MobileNumber='".trim($_POST['RefMobileNumber'])."'");
                            if (sizeof($dupMobile)==0) {
                                return json_encode(array("status"=>"failure","message"=>"Employee's Mobile Number is not found","div"=>"RefMobileNumber"));    
                            }
                            $ReferByText = "Employee";
                            $RefID = $dupMobile[0]['EmployeeID'];
                            $RefName = $dupMobile[0]['EmployeeName'];
                        }
                        
                        if ($_POST['ReferredBy']==3) {
                            
                            $dupMobile = $mysql->select("select * from _tbl_masters_salesman where MobileNumber='".trim($_POST['RefMobileNumber'])."'");
                            if (sizeof($dupMobile)==0) {
                                return json_encode(array("status"=>"failure","message"=>"Sales's Mobile Number is not found","div"=>"RefMobileNumber"));    
                            }
                            $ReferByText = "Salesman";
                            $RefID = $dupMobile[0]['SalesmanID'];
                            $RefName = $dupMobile[0]['SalesmanName'];
                        }
                    }
                } else {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_InvalidFormat,"div"=>"RefMobileNumber"));    
                }
            }
            }
        }
                                            
        $cus_type = json_decode(CustomerTypes::getDetailsByID($_POST['CustomerTypeNameID']),true);
        $cus_type = $cus_type['data'];
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $BranchID="0";
        $BranchCode="";
        $BranchName="";
        
        if ($_SESSION['User']['UserModule']=="admin" || $_SESSION['User']['UserModule']=="subadmin") {
            $Branch = $mysql->select("select * from _tbl_masters_branches where BranchID='".$_POST['BranchID']."'");
        } else {
            $Branch = $mysql->select("select * from _tbl_masters_branches where BranchID='".$_SESSION['User']['BranchID']."'");
        }
        if ($_SESSION['User']['UserModule']=="admin") {
            $CreatedBy="Administrator";
            $CreatedByID=$_SESSION['User']['AdministratorID'];
            $CreatedByName=$_SESSION['User']['AdministratorName'];
            $CreatedByCode=$_SESSION['User']['AdministratorCode'];
             
        } 
        if ($_SESSION['User']['UserModule']=="subadmin") {
            $CreatedBy="Sub Admin";
            $CreatedByID=$_SESSION['User']['UserID'];
            $CreatedByName=$_SESSION['User']['UserName'];
            $CreatedByCode=$_SESSION['User']['UserCode'];
        }
        if ($_SESSION['User']['UserModule']=="branchadmin") {
            $CreatedBy="Branch Admin";
            $CreatedByID=$_SESSION['User']['UserID'];
            $CreatedByName=$_SESSION['User']['UserName'];
            $CreatedByCode=$_SESSION['User']['UserCode'];
        }
        if ($_SESSION['User']['UserModule']=="branchuser") {
            $CreatedBy="Branch User";
            $CreatedByID=$_SESSION['User']['UserID'];
            $CreatedByName=$_SESSION['User']['UserName'];
            $CreatedByCode=$_SESSION['User']['UserCode'];
        }
        if (isset($_SESSION['User']['SalesmanID']) && $_SESSION['User']['SalesmanID']>0) {
            $CreatedBy="Salesman";
            $CreatedByID=$_SESSION['User']['SalesmanID'];
            $CreatedByName=$_SESSION['User']['SalesmanName'];
            $CreatedByCode=$_SESSION['User']['SalesmanCode'];
        }
        if (sizeof($Branch)>0) {
            $BranchID=$Branch[0]['BranchID'];
            $BranchCode=$Branch[0]['BranchCode'];
            $BranchName=$Branch[0]['BranchName'];
        }
        
        $CustomerID = $mysql->insert("_tbl_masters_customers",array("CustomerCode"            => strtoupper($_POST['CustomerCode']),
                                                                    "EntryDate"               => $_POST['EntryDate'],
                                                                    "CustomerTypeNameID"      => $cus_type[0]['CustomerTypeNameID'],
                                                                    "CustomerTypeName"        => $cus_type[0]['CustomerTypeName'],
                                                                    "CustomerName"            => $_POST['CustomerName'],
                                                                    "FatherName"              => $_POST['FatherName'],
                                                                    "EmailID"                 => strtolower(trim($_POST['EmailID'])),
                                                                    "MobileNumber"            => trim($_POST['MobileNumber']),
                                                                    "WhatsappNumber"          => trim($_POST['WhatsappNumber']),
                                                                    "Gender"                  => trim($_POST['Gender']),
                                                                    "AlternativeMobileNumber" => trim($_POST['AlternativeMobileNumber']),
                                                                    "DateOfBirth"             => trim($_POST['DateOfBirth']),
                                                                    "LoginUserName"           => trim($_POST['LoginUserName']),
                                                                    "LoginPassword"           => $_POST['LoginPassword'],
                                                                    "PancardNumber"           => strtoupper($_POST['PancardNumber']),
                                                                    "AadhaarCardNumber"       => $_POST['AadhaarCardNumber'],
                                                                    "GSTIN"                   => $_POST['GSTIN'],
                                                                    "AddressLine1"            => $_POST['AddressLine1'],
                                                                    "AddressLine2"            => $_POST['AddressLine2'],
                                                                    "StateNameID"             => $StatName[0]['StateNameID'],
                                                                    "StateName"               => $StatName[0]['StateName'],
                                                                    "DistrictNameID"          => $DistrictName[0]['DistrictNameID'],
                                                                    "DistrictName"            => $DistrictName[0]['DistrictName'],
                                                                    "AreaNameID"              => $AreaName[0]['AreaNameID'],
                                                                    "AreaName"                => $AreaName[0]['AreaName'],
                                                                    "PinCode"                 => $_POST['PinCode'],
                                                                    
                                                                    "ReferredBy"              => $_POST['ReferredBy'],
                                                                    "ReferByText"             => $ReferByText,
                                                                    "ReferredByID"            => $RefID,
                                                                    "ReferredByName"          => $RefName,
                                                                    "RefMobileNumber"         => $_POST['RefMobileNumber'],
                                                                    
                                                                    "BranchID"                => $BranchID,
                                                                    "BranchCode"              => $BranchCode,
                                                                    "BranchName"              => $BranchName,
                                                                    "CreatedBy"               => $CreatedBy,
                                                                    "CreatedByID"             => $CreatedByID,
                                                                    "CreatedByName"           => $CreatedByName,
                                                                    "CreatedByCode"           => $CreatedByCode,

                                                                    "Remarks"                 => $_POST['Remarks'],
                                                                    "CreatedOn"               => date("Y-m-d H:i:s"),
                                                                    "IsActive"                => '1'));     
        if ($CustomerID>0) {
            
            $path = "assets/uploads/customers/".$CustomerID;
            if (!is_dir($path)) {
                mkdir("assets/uploads/customers/".$CustomerID, 0777); 
            } 
            return json_encode(array("status"=>"success","message"=>CustomersErrors::Create_Success,"div"=>"","CustomerCode"=>SequnceList::updateNumber("_tbl_masters_customers")));
        } else {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::Create_Failure.$_SESSION['User']['UserModule'],"div"=>""));
        }
    }
    
    function ListAll() {
        global $mysql;
        if (isset($_SESSION['User']['BranchID']) && ($_SESSION['User']['BranchID']>0) ) {
            
            if (isset($_SESSION['User']['SalesmanID']) && ($_SESSION['User']['SalesmanID']>0) ) {
                if (isset($_GET['filter']) && $_GET['filter']=="CreatedByMe") {
                    $data = $mysql->select("select * from _tbl_masters_customers where CreatedByCode='".$_SESSION['User']['SalesmanCode']."'");
                } else {
                    $data = $mysql->select("select * from _tbl_masters_customers where BranchID='".$_SESSION['User']['BranchID']."' and AreaNameID in (select AreaNameID from _tbl_salesman_areas where SalesmanID='".$_SESSION['User']['SalesmanID']."' and IsActive='1') ");
                }
            } else {
                if (isset($_GET['filter']) && $_GET['filter']=="CreatedByMe") {
                    $data = $mysql->select("select * from _tbl_masters_customers where CreatedByCode='".$_SESSION['User']['UserCode']."' and   BranchID='".$_SESSION['User']['BranchID']."'");
                } else {
                    $data = $mysql->select("select * from _tbl_masters_customers where BranchID='".$_SESSION['User']['BranchID']."'");
                }
            }
            
        } elseif (isset($_SESSION['User']['AdministratorID']) && ($_SESSION['User']['AdministratorID']>0) ) {
            
            if (isset($_GET['filter']) && $_GET['filter']=="CreatedByMe") {
                $data = $mysql->select("select * from _tbl_masters_customers where CreatedByCode='".$_SESSION['User']['AdministratorCode']."'");
            } else {
                $data = $mysql->select("select * from _tbl_masters_customers ");
            }
            
        } else {
            /*Sub Admin*/
            if (isset($_GET['filter']) && $_GET['filter']=="CreatedByMe") {
                $data = $mysql->select("select * from _tbl_masters_customers where CreatedByCode='".$_SESSION['User']['UserCode']."'");
            } else {
                $data = $mysql->select("select * from _tbl_masters_customers");
            }
        }
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    function listBranchCustomers() {
        global $mysql;
        $data = $mysql->select("select CustomerID,CustomerCode,CustomerName,MobileNumber,EmailID,IsActive,DATE_FORMAT(EntryDate,'".appConfig::DATEFORMAT."') as `EntryDate`,ReferredByID,ReferByText,ReferredByName from _tbl_masters_customers where BranchID='".$_GET['Branch']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    function ListByAreaName() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_customers where AreaNameID='".$_GET['area']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    function RecentDesc() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_customers order by CustomerID Desc limit 0,".$_GET['length']);
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    function doUpdate() {
        
        global $mysql;
        
        if ($_POST['CustomerTypeNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::CustomerType_Empty,"div"=>"CustomerTypeNameID"));    
        }
        
        if (strlen(trim($_POST['EntryDate']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::EntryDate_Empty,"div"=>"EntryDate"));    
        } else {
            $currentdate = strtotime(date("Y-m-d"));
            $entrydate = strtotime($_POST['EntryDate']);
            if ($entrydate>$currentdate) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::EntryDate_GreaterThanToday.date("d-m-Y"),"div"=>"EntryDate"));        
            }
        }
        $_POST['EntryDate'] = date("Y-m-d",strtotime($_POST['EntryDate'])); 
        
        if (strlen(trim($_POST['CustomerName']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::CustomerName_Empty,"div"=>"CustomerName"));    
        }
        
        if (strlen(trim($_POST['FatherName']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::FatherName_Empty,"div"=>"FatherName"));    
        }
          
        if (trim($_POST['Gender'])=="0") {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::Gender_Empty,"div"=>"Gender"));    
        }
        
        if (strlen(trim($_POST['DateOfBirth']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::DateOfBirth_Empty,"div"=>"DateOfBirth"));    
        } else {
            $currentYear = date("Y",strtotime(date("Y-m-d H:i:s")));
            $dobYear = date("Y",strtotime($_POST['DateOfBirth']));
            if (($currentYear-$dobYear)<18) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::DateOfBirth_MinimumYear,"div"=>"DateOfBirth"));    
            }
        }
        $_POST['DateOfBirth'] = date("Y-m-d",strtotime($_POST['DateOfBirth']));
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::EmailID_Empty,"div"=>"EmailID"));    
        } else {
            if (!checkemail(trim($_POST["EmailID"]))) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::EmailID_InvalidFormat,"div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_masters_customers where CustomerID<>'".$_POST['CustomerID']."' and EmailID='".trim($_POST['EmailID'])."'");
                if (sizeof($dupEmail)>0) {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::EmailID_Duplicate,"div"=>"EmailID"));    
                }
            }
        }
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_Empty,"div"=>"MobileNumber"));    
        } else {
            if (strlen(trim($_POST['MobileNumber']))==10) {
                if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
                } else {
                    $dupMobile = $mysql->select("select * from _tbl_masters_customers where CustomerID<>'".$_POST['CustomerID']."' and MobileNumber='".trim($_POST['MobileNumber'])."'");
                    if (sizeof($dupMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_Duplicate,"div"=>"MobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
           // return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['WhatsappNumber']))==10) {
                if (!($_POST['WhatsappNumber']>=6000000000 && $_POST['WhatsappNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::WhatsappNumber_InvalidFormat,"div"=>"WhatsappNumber"));    
                } else {
                    $dupWaMobile = $mysql->select("select * from _tbl_masters_customers where CustomerID<>'".$_POST['CustomerID']."' and WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                    if (sizeof($dupWaMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>CustomersErrors::WhatsappNumber_Duplicate,"div"=>"WhatsappNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::WhatsappNumber_InvalidFormat,"div"=>"WhatsappNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AlternativeMobileNumber']))==0) {
           // return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['AlternativeMobileNumber']))==10) {
                if (!($_POST['AlternativeMobileNumber']>=6000000000 && $_POST['AlternativeMobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
                } else {
                    $dupAltrMobile = $mysql->select("select * from _tbl_masters_customers where CustomerID<>'".$_POST['CustomerID']."' and AlternativeMobileNumber='".trim($_POST['AlternativeMobileNumber'])."'");
                    if (sizeof($dupAltrMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>CustomersErrors::AlternativeMobileNumber_Duplicate,"div"=>"AlternativeMobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['LoginUserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginUserName_Empty,"div"=>"LoginUserName"));    
        } else {
            if (strlen(trim($_POST['LoginUserName']))<6) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginUserName_RequireMinimumLength,"div"=>"LoginUserName"));    
            }
            if (strlen(trim($_POST['LoginUserName']))>8) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginUserName_RequireMaximumLength,"div"=>"LoginUserName"));    
            }
           
            $dupLoginName = $mysql->select("select * from _tbl_masters_customers where CustomerID<>'".$_POST['CustomerID']."' and LoginUserName='".trim($_POST['LoginUserName'])."'");
            if (sizeof($dupLoginName)>0) {
               return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginUserName_Duplicate,"div"=>"LoginUserName"));    
            } 
        }
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginPassword_Empty,"div"=>"LoginPassword"));    
        } else {
            if (strlen(trim($_POST['LoginPassword']))<6) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginPassword_RequireMinimumLength,"div"=>"LoginPassword"));    
            }
            if (strlen(trim($_POST['LoginPassword']))>8) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::LoginPassword_RequireMaximumLength,"div"=>"LoginPassword"));    
            }
        }
        
        
        if (strlen(trim($_POST['PancardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::PancardNumber_Empty,"div"=>"PancardNumber"));    
        } else {
            if (!(IsValidPanCard(trim($_POST['PancardNumber'])))) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::PancardNumber_InvalidFormat,"div"=>"PancardNumber"));        
            }
            $dupPancard = $mysql->select("select * from _tbl_masters_customers where CustomerID<>'".$_POST['CustomerID']."' and  PancardNumber='".trim($_POST['PancardNumber'])."'");
            if (sizeof($dupPancard)>0) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::PancardNumber_Duplicate,"div"=>"PancardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AadhaarCardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::AadhaarCardNumber_Empty,"div"=>"AadhaarCardNumber"));    
        } else {
            
            $Aadhaar=str_replace("_","",trim($_POST['AadhaarCardNumber']));
            $Aadhaar=str_replace(" ","",$Aadhaar);
            
            if (strlen($Aadhaar)!=12) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::AadhaarCardNumber_InvalidFormat,"div"=>"AadhaarCardNumber"));    
            }
            
            $dupAadhaar = $mysql->select("select * from _tbl_masters_customers where CustomerID<>'".$_POST['CustomerID']."' and  AadhaarCardNumber='".trim($_POST['AadhaarCardNumber'])."'");
            if (sizeof($dupAadhaar)>0) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::AadhaarCardNumber_Duplicate,"div"=>"AadhaarCardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AddressLine1']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::AddressLine1_Empty,"div"=>"AddressLine1"));    
        }
        
        if ($_POST['StateNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::StateName_Empty,"div"=>"StateNameID"));    
        } else {
            if ($_POST['DistrictNameID']==0) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::DistrictName_Empty,"div"=>"DistrictNameID"));    
            } else {
                if ($_POST['AreaNameID']==0) {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::AreaName_Empty,"div"=>"AreaNameID"));    
                }  
            }
        }

        if (strlen(trim($_POST['PinCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>CustomersErrors::PinCode_Empty,"div"=>"PinCode"));    
        } else {
            $PinCode=str_replace("_","",trim($_POST['PinCode']));
            $PinCode=str_replace(" ","",$PinCode);
            
            if (strlen($PinCode)!=6) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::PinCode_InvalidFormat,"div"=>"PinCode"));    
            }
        }
        
        if (trim($_POST['ReferredBy'])==0) {
            $ReferByText="";
            $RefID="0";       
            $RefName="";
            $RefMobileNumber="";
           // return json_encode(array("status"=>"failure","message"=>"Please select ReferredBy","div"=>"ReferredBy"));    
        } else {          
        
            $RefMobileNumber=$_POST['RefMobileNumber'];
            if (strlen(trim($_POST['RefMobileNumber']))==0) {
                return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_Empty,"div"=>"RefMobileNumber"));    
            } else {
                if (strlen(trim($_POST['RefMobileNumber']))==10) {
                    if (!($_POST['RefMobileNumber']>=6000000000 && $_POST['RefMobileNumber']<=9999999999)) {
                        return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_InvalidFormat,"div"=>"RefMobileNumber"));    
                    } else {
                        if ($_POST['ReferredBy']=="1") {
                            $dupMobile = $mysql->select("select * from _tbl_masters_customers where MobileNumber='".trim($_POST['RefMobileNumber'])."'");
                            if (sizeof($dupMobile)==0) {
                                return json_encode(array("status"=>"failure","message"=>"Customer's Mobile Number is not found","div"=>"RefMobileNumber"));    
                            }
                            $ReferByText = "Customer";
                            $RefID = $dupMobile[0]['CustomerID']; 
                            $RefName = $dupMobile[0]['CustomerName']; 
                        }
                        
                        if ($_POST['ReferredBy']=="2") {
                            $dupMobile = $mysql->select("select * from _tbl_employees where MobileNumber='".trim($_POST['RefMobileNumber'])."'");
                            if (sizeof($dupMobile)==0) {
                                return json_encode(array("status"=>"failure","message"=>"Employee's Mobile Number is not found","div"=>"RefMobileNumber"));    
                            }
                            $ReferByText = "Employee";
                            $RefID = $dupMobile[0]['EmployeeID']; 
                            $RefName = $dupMobile[0]['EmployeeName'];
                        }
                        
                        if ($_POST['ReferredBy']=="3") {
                            $dupMobile = $mysql->select("select * from _tbl_masters_salesman where MobileNumber='".trim($_POST['RefMobileNumber'])."'");
                            if (sizeof($dupMobile)==0) {
                                return json_encode(array("status"=>"failure","message"=>"Sales's Mobile Number is not found","div"=>"RefMobileNumber"));    
                            }
                            $ReferByText = "Salesman";
                            $RefID = $dupMobile[0]['SalesmanID']; 
                            $RefName = $dupMobile[0]['SalesmanName'];
                        }
                    }
                } else {
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
                }
            }
        }
        
        $cus_type = json_decode(CustomerTypes::getDetailsByID($_POST['CustomerTypeNameID']),true);
        $cus_type = $cus_type['data'];
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $id = $mysql->execute("update _tbl_masters_customers set CustomerName   = '".$_POST['CustomerName']."',
                                                                 EntryDate   = '".$_POST['EntryDate']."',
                                                                 FatherName   = '".$_POST['FatherName']."',
                                                                 EmailID        = '".strtolower(trim($_POST['EmailID']))."',
                                                                 MobileNumber   = '".$_POST['MobileNumber']."',
                                                                 WhatsappNumber = '".$_POST['WhatsappNumber']."',
                                                                 Gender         = '".trim($_POST['Gender'])."',
                                                                 AlternativeMobileNumber         ='".trim($_POST['AlternativeMobileNumber'])."',
                                                                 DateOfBirth         ='". trim($_POST['DateOfBirth'])."',
                                                                 LoginUserName = '".$_POST['LoginUserName']."',
                                                                 LoginPassword = '".$_POST['LoginPassword']."',
                                                                 PancardNumber = '".strtoupper($_POST['PancardNumber'])."',
                                                                 AadhaarCardNumber = '".$_POST['AadhaarCardNumber']."',
                                                                 GSTIN = '".$_POST['GSTIN']."',
                                                                 AddressLine1   = '".$_POST['AddressLine1']."',
                                                                 AddressLine2   = '".$_POST['AddressLine2']."',
                                                                 StateNameID   = '".$StatName[0]['StateNameID']."',
                                                                 StateName   = '".$StatName[0]['StateName']."',
                                                                 DistrictNameID   = '".$DistrictName[0]['DistrictNameID']."',
                                                                 DistrictName   = '".$DistrictName[0]['DistrictName']."',
                                                                 AreaNameID   = '".$AreaName[0]['AreaNameID']."',
                                                                 AreaName   = '".$AreaName[0]['AreaName']."',
                                                                 
                                                                 ReferredBy             = '".$_POST['ReferredBy']."',
                                                                 ReferByText            = '".$ReferByText."',
                                                                 ReferredByID           = '".$RefID."',
                                                                 ReferredByName         = '".$RefName."',
                                                                 RefMobileNumber        = '".$RefMobileNumber."',   
                                                                 
                                                                 Remarks   = '".$_POST['Remarks']."',
                                                                 PinCode        = '".$_POST['PinCode']."',
                                                                 CustomerTypeNameID ='".$cus_type[0]['CustomerTypeNameID']."',
                                                                 CustomerTypeName   ='".$cus_type[0]['CustomerTypeName']."',
                                                                 IsActive       = '".$_POST['IsActive']."' where CustomerID='".$_POST['CustomerID']."'");
        $path = "assets/uploads/customers/".$_POST['CustomerID'];
        
            if (!is_dir($path)) {
                mkdir("assets/uploads/customers/".$_POST['CustomerID'], 0777); 
            }                                         
            
            
        return json_encode(array("status"=>"success","message"=>CustomersErrors::Update_Success,"div"=>""));
    }
    
     public static function remove() {
         global $mysql;         
         $contracts = $mysql->select("select * from _tbl_contracts where CustomerID='".$_GET['ID']."'");
         //return json_encode(array("status"=>"success","message"=>CustomersErrors::Delete_Success.sizeof($contracts),"data"=>$mysql->select("select * from _tbl_masters_customers")));   
          if (sizeof($contracts)==0) {
            $mysql->execute("delete from _tbl_masters_customers where CustomerID='".$_GET['ID']."'");
            return json_encode(array("status"=>"success","message"=>CustomersErrors::Delete_Success,"data"=>$mysql->select("select * from _tbl_masters_customers")));    
         } else {
            return json_encode(array("status"=>"failure","message"=>"Error: unable to delete customer. Reason: Customer has ".(sizeof($contracts))." contract(s)","div"=>""));
         }
     }
      
     public static function getDetailsByID($CustomerID) {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$CustomerID."'");
        return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function listByCustomerType() {   
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_customers where CustomerTypeNameID='".$_GET['CustomerTypeNameID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
     }
    
     public static function myData() {   
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_SESSION['User']['CustomerID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
     }
     
       public static function changePassword() {
         global $mysql;
         if (strlen(trim($_POST['CurrentPassword']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please Current Password","div"=>"CurrentPassword"));    
         }
         
         if (strlen(trim($_POST['NewPassword']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please New Password","div"=>"NewPassword"));    
         }
         
         if (strlen(trim($_POST['NewPassword']))<6) {
             return json_encode(array("status"=>"failure","message"=>"New Password Must have six Characters","div"=>"NewPassword"));    
         } 
         
         if (strlen(trim($_POST['CNewPassword']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please Confrim New Password","div"=>"CNewPassword"));    
         }
         
         if ($_POST['CNewPassword']!=$_POST['NewPassword']) {
             return json_encode(array("status"=>"failure","message"=>"New Password & Confirm New Password not match","div"=>"CNewPassword"));    
         }
         
         $validPassword = $mysql->select("select * from _tbl_masters_customers where LoginPassword='".trim($_POST['CurrentPassword'])."' and CustomerID='".$_SESSION['User']['CustomerID']."'");
         if (sizeof($validPassword)==0) {
            return json_encode(array("status"=>"failure","message"=>"Current Password is invalid","div"=>"CurrentPassword"));    
         }

         $mysql->execute("update _tbl_masters_customers set LoginPassword ='".$_POST['NewPassword']."',
                                                    AllowToChangePasswordFirstLogin='0'
                                                            where CustomerID='".$_SESSION['User']['CustomerID']."'");
         
         $_SESSION['User']['AllowToChangePasswordFirstLogin']=0;
                                                          
         return json_encode(array("status"=>"success","message"=>"Password changed successfully".$mysql->error,"div"=>""));
     }
     
     function fetchRefferalData() {
         
         global $mysql;
         
         if (trim($_POST['ReferredBy'])=="0") {
             return json_encode(array("status"=>"failure","message"=>"Please select ReferredBy","div"=>"ReferredBy"));    
         }
         
         if (strlen(trim($_POST['RefMobileNumber']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter Mobile Number","div"=>"RefMobileNumber"));    
         } else {
             if (strlen(trim($_POST['RefMobileNumber']))==10) {
                 if (!($_POST['RefMobileNumber']>=6000000000 && $_POST['RefMobileNumber']<=9999999999)) {
                     return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number.","div"=>"RefMobileNumber"));    
                 } else {
                     if ($_POST['ReferredBy']=="1") {
                         $dupMobile = $mysql->select("select * from _tbl_masters_customers where MobileNumber='".trim($_POST['RefMobileNumber'])."'");
                         if (sizeof($dupMobile)==0) {
                             return json_encode(array("status"=>"failure","message"=>"Customer's Mobile Number is not found","div"=>"RefMobileNumber"));    
                         }
                         return json_encode(array("status"=>"success","Name"=>$dupMobile[0]['CustomerName']));
                     } elseif ($_POST['ReferredBy']=="2") {
                         $dupMobile = $mysql->select("select * from _tbl_employees where MobileNumber='".trim($_POST['RefMobileNumber'])."'");
                         if (sizeof($dupMobile)==0) {
                             return json_encode(array("status"=>"failure","message"=>"Employee's Mobile Number is not found","div"=>"RefMobileNumber"));    
                         }
                         return json_encode(array("status"=>"success","Name"=>$dupMobile[0]['EmployeeName']));
                     } elseif ($_POST['ReferredBy']=="3") {
                         $dupMobile = $mysql->select("select * from _tbl_masters_salesman where MobileNumber='".trim($_POST['RefMobileNumber'])."'");
                         if (sizeof($dupMobile)==0) {
                            return json_encode(array("status"=>"failure","message"=>"Sales's Mobile Number is not found","div"=>"RefMobileNumber"));    
                         }
                         return json_encode(array("status"=>"success","Name"=>$dupMobile[0]['SalesmanName']));
                     } else {
                         return json_encode(array("status"=>"failure","message"=>"Invalid refer category","div"=>"ReferredBy"));    
                     }
                 }
             } else {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number","div"=>"RefMobileNumber"));    
             }
         }
     }
     
     function addNominee() {
         
         global $mysql;
         
         if (strlen(trim($_POST['NomineeName']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter Nominee Name","div"=>"NomineeName"));    
         }
         
         if ($_POST['RelationNameID']=="0") {
             return json_encode(array("status"=>"failure","message"=>"Please select Relation","div"=>"RelationNameID"));    
         }
         
         if (strlen(trim($_POST['Age']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter Age","div"=>"Age"));    
         }
         
         $relation = $mysql->select("select * from _tbl_masters_relationnames where RelationNameID='".$_POST['RelationNameID']."'");
         $mysql->insert("_tbl_customers_nominees",array("CustomerID"       => $_POST['CustomerID'],
                                                        "NomineeName"      => $_POST['NomineeName'],
                                                        "RelationNameID"   => $_POST['RelationNameID'],
                                                        "RelationName"     => $relation[0]['RelationName'],
                                                        "Age"             => $_POST['Age'],
                                                        "Remarks"          => $_POST['Remarks'],
                                                        "IsActive"         => "1",
                                                        "CreatedOn"        => date("Y-m-d H:i:s")));
         return json_encode(array("status"=>"success","message"=>"Created successfully"));
     }
     
     function listNominees() {
         global $mysql;
         if (isset($_SESSION['User']['CustomerID'])) {
            $UserRole = $mysql->select("select * from _tbl_customers_nominees where CustomerID='".$_SESSION['User']['CustomerID']."' order by NomineeID desc"); 
         } else {
            $UserRole = $mysql->select("select * from _tbl_customers_nominees where CustomerID='".$_GET['CustomerID']."' order by NomineeID desc");
         }
         return json_encode(array("status"=>"success","data"=>$UserRole));
     }
     
     function getNominee() {
         global $mysql;
         $UserRole = $mysql->select("select * from _tbl_customers_nominees where NomineeID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","data"=>$UserRole));
     }
     
     function doUpdateNominee() {
         global $mysql;
         $mysql->execute("update _tbl_customers_nominees set IsActive='".$_POST['IsActive']."' where NomineeID='".$_POST['NomineeID']."'");
         return json_encode(array("status"=>"success","message"=>"Updated successfully"));
     }
     
     function listDownlines() {
         global $mysql;
         if (isset($_SESSION['User']['CustomerID'])) {
             $data = $mysql->select("select * from _tbl_masters_customers WHERE ReferByText='Customer' and ReferredByID='".$_SESSION['User']['CustomerID']."' order by CustomerID");    
             $result = array();
             if (sizeof($data)>0) {
                 $tmp = array();
                 foreach($data as $d) {
                     $tmp['CustomerName'] = $d['CustomerName'];
                     $tmp['EntryDate']    = date("d-m-Y",strtotime($d['EntryDate']));
                     $tmp['MobileNumber'] = hideMobilNumber($d['MobileNumber']);
                     $result[]=$tmp;   
                 }
             }
             return json_encode(array("status"=>"success","data"=>$result));
         } 
         if (isset($_GET['CustomerID'])) {
             $data = $mysql->select("select * from _tbl_masters_customers WHERE ReferByText='Customer' and ReferredByID='".$_GET['CustomerID']."'");    
         }
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     function addDocument() {
         global $mysql;

         if (trim($_POST['DocumentTypeID'])=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select document type","div"=>"DocumentTypeID"));    
        }
         if (sizeof($_POST['files'])==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select and attach file(s)","div"=>"DocumentFiles"));    
        }
        
        $DocumentType = $mysql->select("select * from _tbl_masters_documenttypes where DocumentTypeID='".$_POST['DocumentTypeID']."'");
        
        foreach($_POST['files'] as $file) {
            $file = str_replace("\\r","",$file);
            $file = str_replace("\\n","",$file);
            $source = SERVER_PATH."/tmp/".$file;
            $destination = SERVER_PATH."/assets/uploads/customers/".$_POST['CustomerID']."/".$file;
            if( !copy($source, $destination) ) { 
                
            } else { 
                $mysql->insert("_tbl_assets",array("CustomerID"       =>$_POST['CustomerID'],
                                                   "CreatedOn"        =>date("Y-m-d H:i:s"),
                                                   "DocumentTypeID"   =>$DocumentType[0]['DocumentTypeID'],
                                                   "DocumentTypeName" =>$DocumentType[0]['DocumentTypeName'],
                                                   "FileName"         =>$file));
            } 
            
        }
         return json_encode(array("status"=>"success","message"=>"Added successfully"));
        
     }
     
     function listDocuments() {
         global $mysql;
         
         $category = $mysql->select("select DocumentTypeName from _tbl_assets WHERE CustomerID='".$_GET['CustomerID']."' group by DocumentTypeName");    
         $resultData = array();
         foreach($categories as $category) {
             $items = $mysql->select("select * from _tbl_assets where CustomerID='".$_GET['CustomerID']."'  and DocumentTypeName='".$category['DocumentTypeName']."'");
             $resultData[$category['DocumentTypeName']]=$items;
         }
         
         $data = $mysql->select("select * from _tbl_assets WHERE CustomerID='".$_GET['CustomerID']."'");    
         return json_encode(array("status"=>"success","data"=>$data,"GroupData"=>$resultData));
     }
     
     function removeDocuments() {
         global $mysql;
         
         $mysql->execute("delete from _tbl_assets WHERE CustomerID='".$_GET['CustomerID']."' and AttachmentID='".$_GET['ID']."'");    
         return self::listDocuments();
     }
     
     function listCustomize() {
        global $mysql;
        //sleep(10);
        if (isset($_SESSION['User']['SalesmanID'])) {
            $data = $mysql->select("select * from _tbl_masters_customers WHERE ReferByText='Salesman' and ReferredByID='".$_SESSION['User']['SalesmanID']."'");    
        } else {
            if (isset($_POST['OrderBy']) && $_POST['OrderBy']=="0") {
                return json_encode(array("status"=>"failure","message"=>"Please select any one column","div"=>"message"));        
            }
            
            $sql = "select
                        `CustomerID`,
                        DATE_FORMAT(EntryDate,'".appConfig::DATEFORMAT."') as `EntryDate`,
                        `CustomerCode`,
                        `CustomerName`,
                        `FatherName`,
                        `EmailID`,
                        `MobileNumber`,
                        `WhatsappNumber`,
                        `AlternativeMobileNumber`,
                        `Gender`,
                        DATE_FORMAT(DateOfBirth,'".appConfig::DATEFORMAT."') as `DateOfBirth`,
                        `ProfilePhoto`,
                        `LoginUserName`,
                        `LoginPassword`,
                        `PancardNumber`,
                        `PanCardAttachment`,
                        `AadhaarCardNumber`,
                        `AadhaarCardAttachment`,
                        `GSTIN`,
                        `AddressLine1`,
                        `AddressLine2`,
                        `StateNameID`,
                        `StateName`,
                        `DistrictNameID`,
                        `DistrictName`,
                        `AreaNameID`,
                        `AreaName`,
                        `PinCode`,
                        `CustomerTypeNameID`,
                        `CustomerTypeName`,
                        `ReferredBy`,
                        `ReferByText`,
                        `ReferredByID`,
                        `ReferredByName`,
                        `RefMobileNumber`,
                        `Remarks`,
                        `CreatedOn`,
                        `CreatedByID`,
                        `CreatedByName`,
                        `CreatedByCode`,
                        `CreatedBy`,
                        `BranchID`,
                        `BranchCode`,
                        `BranchName`,
                        `WalletBalance`,
                        
                        `IsActive` 
               from _tbl_masters_customers where CustomerID>0 ";
             
            if (isset($_POST['CustomerNameS']) && $_POST['CustomerNameS']==1) {
                if ($_POST['selectCustomerFilter']=="0") {
                    $sql .= " and CustomerName like '%".$_POST['SearchCustomerName']."%' ";    
                }
                if ($_POST['selectCustomerFilter']=="Startwith") {
                    $sql .= " and CustomerName like '".$_POST['SearchCustomerName']."%' ";    
                }
                if ($_POST['selectCustomerFilter']=="Endwith") {
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
                    return json_encode(array("status"=>"failure","message"=>CustomersErrors::EntryDate_GreaterThanToday.date("d-m-Y",strtotime($_POST['ToDate'])),"div"=>"EntryDate"));        
                }
            
                $sql .= " and  (date(EntryDate)>=date('".date("Y-m-d",strtotime($_POST['FromDate']))."') and date(EntryDate)<=date('".date("Y-m-d",strtotime($_POST['ToDate']))."')) ";    
            }
            
            if (isset($_POST['Gender']) && $_POST['Gender']=="1") {
                
                if ($_POST['selectGenderFilter']=="Male") {
                    $sql .= " and Gender='Male' ";    
                }
                if ($_POST['selectGenderFilter']=="Female") {
                    $sql .= " and Gender='Female' ";    
                } 
                if ($_POST['selectGenderFilter']=="TransGender") {
                    $sql .= " and Gender='TransGender' ";    
                } 
            }
            
            if (isset($_POST['IsActive']) && $_POST['IsActive']=="1") {
                 
                  if ($_POST['selectStatusFilter']=="Active") {
                      $sql .= " and IsActive='1' ";    
                  }
                  if ($_POST['selectStatusFilter']=="Deactive") {
                      $sql .= " and IsActive='0' ";    
                  } 
            }
            
            if (isset($_POST['StateName']) && $_POST['StateName']=="1") {
                if ($_POST['StateNameID']!="0") {
                    $sql .= " and StateNameID='".$_POST['StateNameID']."' ";    
                }
            }
            
            if (isset($_POST['DistrictName']) && $_POST['DistrictName']=="1") {
                if ($_POST['DistrictNameID']!="0") {
                    $sql .= " and DistrictNameID='".$_POST['DistrictNameID']."' ";    
                }
            }
            
            if (isset($_POST['AreaName']) && $_POST['AreaName']=="1") {
                if ($_POST['AreaNameID']!="0") {
                    $sql .= " and AreaNameID='".$_POST['AreaNameID']."' ";    
                }
            }
            
            if (isset($_POST['CustomerTypeName']) && $_POST['CustomerTypeName']=="1") {
                if ($_POST['CustomerTypeNameID']!="0") {
                    $sql .= " and CustomerTypeNameID='".$_POST['CustomerTypeNameID']."' ";    
                }
            }
            
            if (isset($_POST['BranchName']) && $_POST['BranchName']=="1") {
                if ($_POST['BranchID']!="0") {
                    $sql .= " and BranchID='".$_POST['BranchID']."' ";    
                }
            }
            
            if ($_SESSION['User']['UserModule']=="branchadmin" || $_SESSION['User']['UserModule']=="branchuser") {
                $sql .= " and BranchID='".$_SESSION['User']['BranchID']."' ";        
            }
            
            if ($_POST['OrderBy']=="StateNameID") {
                $_POST['OrderBy']="StateName";
            }
            
             if ($_POST['OrderBy']=="DistrictNameID") {
                $_POST['OrderBy']="DistrictName";
            }
            
            if ($_POST['OrderBy']=="AreaNameID") {
                $_POST['OrderBy']="AreaName";
            }
            
            if ($_POST['OrderBy']=="CustomerTypeNameID") {
                $_POST['OrderBy']="CustomerTypeName";
            }
            
            if ($_POST['OrderBy']=="DateOfBirth") {
                $_POST['OrderBy']="date(DateOfBirth)";
            }
            
            if ($_POST['OrderBy']=="EntryDate") {
                $_POST['OrderBy']="date(EntryDate)";
            }
            
            $sql .= " order by ".$_POST['OrderBy']." ".$_POST['Filterby'];
            $data = $mysql->select($sql);
        }
        return json_encode(array("status"=>"success","data"=>$data,"sql"=>$sql));
    }
    function viewAllActivities() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_logs_activity_customers where CustomerID='".(isset($_GET['ID']) ? $_GET['ID'] : $_SESSION['User']['CustomerID'])."'");
        return json_encode(array("status"=>"success","data"=>$data,"sql"=>$sql));
    }
}
?>