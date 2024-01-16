<?php
class EmployeesErrors {
    const EmployeeCode_Empty = "Please enter Employee Code";
    const EmployeeCode_Duplicate = "Employee Code already exists";
    const EntryDate_Empty = "Please select date";
    const EntryDate_GreaterThanToday = "Please select date on/or before ";
    const EmployeeCategory_Empty = "Please select Employee Category";
    const EmployeeName_Empty = "Please enter Employee Name";
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
    
    const Salesman_Assigned = "successfully assigned";
    const Salesman_Activated = "successfully activated";
    const Salesman_Deactivated = "successfully deactivated";
    const Salesman_removed_success = "removed successfully";
    
    const Document_Attach_success = "Added successfully";
    const Document_Attachment_Type_Empty = "Please select document type";
    const Document_File_Empty = "Please select and attach file(s)";
}
class Employees {
    
    public function addNew() {
        
        global $mysql;
        
        if ($_SESSION['User']['UserModule']=="admin" || $_SESSION['User']['UserModule']=="subadmin") {
           if ($_POST['BranchID']=="0") {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::BranchName_Empty,"div"=>"BranchID"));    
            }
        }
        
        if (strlen(trim($_POST['EmployeeCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::EmployeeCode_Empty,"div"=>"EmployeeCode"));    
        } else {
             $dup = $mysql->select("select * from _tbl_employees where EmployeeCode='".trim($_POST['EmployeeCode'])."'");
             if (sizeof($dup)>0) {
                 return json_encode(array("status"=>"failure","message"=>EmployeesErrors::EmployeeCode_Duplicate,"div"=>"EmployeeCode"));    
             }
        }
        
        if (strlen(trim($_POST['EntryDate']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::EntryDate_Empty,"div"=>"EntryDate"));    
        } else {
            $currentdate = strtotime(date("Y-m-d"));
            $entrydate = strtotime($_POST['EntryDate']);
            if ($entrydate>$currentdate) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::EntryDate_GreaterThanToday.date("d-m-Y"),"div"=>"EntryDate"));        
            }
        }
        $_POST['EntryDate'] = date("Y-m-d",strtotime($_POST['EntryDate']));
        
        if ($_POST['EmployeeCategoryID']==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::EmployeeCategory_Empty,"div"=>"EmployeeCategoryID"));    
        }
        
        if (strlen(trim($_POST['EmployeeName']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::EmployeeName_Empty,"div"=>"EmployeeName"));    
        }
        
        if (strlen(trim($_POST['FatherName']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::FatherName_Empty,"div"=>"FatherName"));    
        }
        
        if (trim($_POST['Gender'])=="0") {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::Gender_Empty,"div"=>"Gender"));        
        }
        
        if (strlen(trim($_POST['DateOfBirth']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::DateOfBirth_Empty,"div"=>"DateOfBirth"));    
        } else {
            $currentYear = date("Y",strtotime(date("Y-m-d H:i:s")));
            $dobYear = date("Y",strtotime($_POST['DateOfBirth']));
            if (($currentYear-$dobYear)<18) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::DateOfBirth_MinimumYear,"div"=>"DateOfBirth"));    
            }
        }
        $_POST['DateOfBirth'] = date("Y-m-d",strtotime($_POST['DateOfBirth']));
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::EmailID_Empty,"div"=>"EmailID"));    
        } else {
            $email = (trim($_POST["EmailID"]));
            if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::EmailID_InvalidFormat,"div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_employees where EmailID='".trim($_POST['EmailID'])."'");
                if (sizeof($dupEmail)>0) {
                    return json_encode(array("status"=>"failure","message"=>EmployeesErrors::EmailID_Duplicate,"div"=>"EmailID"));    
                }
            }
        }
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::MobileNumber_Empty,"div"=>"MobileNumber"));    
        } else {
            if (strlen(trim($_POST['MobileNumber']))==10) {
                if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>EmployeesErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
                } else {
                    $dupMobile = $mysql->select("select * from _tbl_employees where MobileNumber='".trim($_POST['MobileNumber'])."'");
                    if (sizeof($dupMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>EmployeesErrors::MobileNumber_Duplicate,"div"=>"MobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
            //return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['WhatsappNumber']))==10) {
                if (!($_POST['WhatsappNumber']>=6000000000 && $_POST['WhatsappNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>EmployeesErrors::WhatsappNumber_InvalidFormat,"div"=>"WhatsappNumber"));    
                } else {
                    $dupWaMobile = $mysql->select("select * from _tbl_employees where WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                    if (sizeof($dupWaMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>EmployeesErrors::WhatsappNumber_Duplicate,"div"=>"WhatsappNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::WhatsappNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AlternativeMobileNumber']))==0) {
           // return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['AlternativeMobileNumber']))==10) {
                if (!($_POST['AlternativeMobileNumber']>=6000000000 && $_POST['AlternativeMobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
                } else {
                    $dupAltrMobile = $mysql->select("select * from _tbl_employees where AlternativeMobileNumber='".trim($_POST['AlternativeMobileNumber'])."'");
                    if (sizeof($dupAltrMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AlternativeMobileNumber_Duplicate,"div"=>"AlternativeMobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
            }
        }
            
        if (strlen(trim($_POST['LoginUserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginUserName_Empty,"div"=>"LoginUserName"));    
        } else {
            if (strlen(trim($_POST['LoginUserName']))<6) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginUserName_RequireMinimumLength,"div"=>"LoginUserName"));    
            }
            if (strlen(trim($_POST['LoginUserName']))>8) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginUserName_RequireMaximumLength,"div"=>"LoginUserName"));    
            }
            $dupLoginName = $mysql->select("select * from _tbl_employees where LoginUserName='".trim($_POST['LoginUserName'])."'");
            if (sizeof($dupLoginName)>0) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginUserName_Duplicate,"div"=>"LoginUserName"));    
            } 
        }
        
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginPassword_Empty,"div"=>"LoginPassword"));    
        } else {
            if (strlen(trim($_POST['LoginPassword']))<6) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginPassword_RequireMinimumLength,"div"=>"LoginPassword"));    
            }
            if (strlen(trim($_POST['LoginPassword']))>8) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginPassword_RequireMaximumLength,"div"=>"LoginPassword"));    
            }
        }
        
        if (strlen(trim($_POST['PancardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::PancardNumber_Empty,"div"=>"PancardNumber"));    
        } else {
            if (!(IsValidPanCard(trim($_POST['PancardNumber'])))) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::PancardNumber_InvalidFormat,"div"=>"PancardNumber"));        
            }
            $dupPancard = $mysql->select("select * from _tbl_employees where PancardNumber='".trim($_POST['PancardNumber'])."'");
            if (sizeof($dupPancard)>0) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::PancardNumber_Duplicate,"div"=>"PancardNumber"));    
            }
        }
         
        if (strlen(trim($_POST['AadhaarCardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AadhaarCardNumber_Empty,"div"=>"AadhaarCardNumber"));    
        } else {
            
            $Aadhaar=str_replace("_","",trim($_POST['AadhaarCardNumber']));
            $Aadhaar=str_replace(" ","",$Aadhaar);
            
            if (strlen($Aadhaar)!=12) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AadhaarCardNumber_InvalidFormat,"div"=>"AadhaarCardNumber"));    
            }
            
            $dupAadhaar = $mysql->select("select * from _tbl_employees where AadhaarCardNumber='".trim($_POST['AadhaarCardNumber'])."'");
            if (sizeof($dupAadhaar)>0) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AadhaarCardNumber_Duplicate,"div"=>"AadhaarCardNumber"));    
            }
        }
         
        if (strlen(trim($_POST['AddressLine1']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AddressLine1_Empty,"div"=>"AddressLine1"));    
        }
        
        if ($_POST['StateNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::StateName_Empty,"div"=>"StateNameID"));    
        } else {
            if ($_POST['DistrictNameID']==0) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::DistrictName_Empty,"div"=>"DistrictNameID"));    
            } else {
                if ($_POST['AreaNameID']==0) {
                    return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AreaName_Empty,"div"=>"AreaNameID"));    
                }  
            }
        }

        if (strlen(trim($_POST['PinCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::PinCode_Empty,"div"=>"PinCode"));    
        } else {
            $PinCode=str_replace("_","",trim($_POST['PinCode']));
            $PinCode=str_replace(" ","",$PinCode);
            
            if (strlen($PinCode)!=6) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::PinCode_InvalidFormat,"div"=>"PinCode"));    
            }
        }
        
        $ProfilePhoto=""; 
        $PanCardAttachment="";
        $AadhaarCardAttachment = "";
        
        $emp_type = json_decode(EmployeeCategories::getDetailsByID($_POST['EmployeeCategoryID']),true);
        $emp_type = $emp_type['data'];
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $AllowToChangePasswordFirstLogin = (isset($_POST['AllowToChangePasswordFirstLogin']) && $_POST['AllowToChangePasswordFirstLogin']==1) ? 1 : 0;
        
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
        if (sizeof($Branch)>0) {
        $BranchID=$Branch[0]['BranchID'];
        $BranchCode=$Branch[0]['BranchCode'];
        $BranchName=$Branch[0]['BranchName'];
        }
        $EmployeeID = $mysql->insert("_tbl_employees",array("EmployeeCode"          => $_POST['EmployeeCode'],
                                                            "EntryDate"          => $_POST['EntryDate'],
                                                            "EmployeeName"          => $_POST['EmployeeName'],
                                                            "ProfilePhoto"          => $ProfilePhoto,
                                                            "FatherName"            => $_POST['FatherName'],
                                                            "Gender"                => $_POST['Gender'],
                                                            "DateOfBirth"           => $_POST['DateOfBirth'],
                                                            "EmailID"               => trim($_POST['EmailID']),
                                                            "MobileNumber"          => trim($_POST['MobileNumber']),
                                                            "WhatsappNumber"        => trim($_POST['WhatsappNumber']),
                                                            "AlternativeMobileNumber"        => trim($_POST['AlternativeMobileNumber']),
                                                            "LoginUserName"         => trim($_POST['LoginUserName']),
                                                            "LoginPassword"         => $_POST['LoginPassword'],
                                                            "PancardNumber"         => strtoupper($_POST['PancardNumber']),
                                                            "PanCardAttachment"     => $PanCardAttachment,
                                                            "AadhaarCardNumber"     => $_POST['AadhaarCardNumber'],
                                                            "AadhaarCardAttachment" => $AadhaarCardAttachment,
                                                            "AddressLine1"          => $_POST['AddressLine1'],
                                                            "AddressLine2"          => $_POST['AddressLine2'],
                                                            "StateNameID"           => $StatName[0]['StateNameID'],
                                                            "StateName"             => $StatName[0]['StateName'],
                                                            "DistrictNameID"        => $DistrictName[0]['DistrictNameID'],
                                                            "DistrictName"          => $DistrictName[0]['DistrictName'],
                                                            "AreaNameID"            => $AreaName[0]['AreaNameID'],
                                                            "AreaName"              => $AreaName[0]['AreaName'],
                                                            "EmployeeCategoryID"    => $emp_type[0]['EmployeeCategoryID'],
                                                            "EmployeeCategoryCode"  => $emp_type[0]['EmployeeCategoryCode'],
                                                            "EmployeeCategoryTitle" => $emp_type[0]['EmployeeCategoryTitle'],
                                                            "PinCode"               => $_POST['PinCode'],
                                                            "Remarks"               => $_POST['Remarks'],
                                                            "AllowToChangePasswordFirstLogin" => $AllowToChangePasswordFirstLogin,
                                                             "BranchID"              => $BranchID,
                                                            "BranchCode"            => $BranchCode,
                                                            "BranchName"            => $BranchName,
                                                            "CreatedBy"             => $CreatedBy,
                                                            "CreatedByID"           => $CreatedByID,
                                                            "CreatedByCode"          => $CreatedByCode,
                                                            "CreatedByName"         => $CreatedByName,
                                                            "CreatedOn"             => date("Y-m-d H:i:s"),
                                                            "IsActive"              => '1'));     
        if ($EmployeeID>0) {
            
            $path = "assets/docs/employees/".$EmployeeID;
            if (!is_dir($path)) {
                mkdir("assets/docs/employees/".$EmployeeID, 0777); 
            } 
            
            $ProfilePhoto=time()."_".strtolower($_FILES["ProfilePhoto"]['name']);
            if (move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"],$path."/".$ProfilePhoto)) {
                $mysql->execute("update _tbl_employees set ProfilePhoto='".$ProfilePhoto."' where EmployeeID='".$EmployeeID."'");
            } 
            
            $PanCardAttachment=time()."_".strtolower($_FILES["PanCardAttachment"]['name']);
            if (move_uploaded_file($_FILES["PanCardAttachment"]["tmp_name"],$path."/".$PanCardAttachment)) {
                $mysql->execute("update _tbl_employees set PanCardAttachment='".$PanCardAttachment."' where EmployeeID='".$EmployeeID."'");
            }
            
            $AadhaarCardAttachment=time()."_".strtolower($_FILES["AadhaarCardAttachment"]['name']);
            if (move_uploaded_file($_FILES["AadhaarCardAttachment"]["tmp_name"],$path."/".$AadhaarCardAttachment)) {
                $mysql->execute("update _tbl_employees set AadhaarCardAttachment='".$AadhaarCardAttachment."' where EmployeeID='".$EmployeeID."'");
            } 
         
            return json_encode(array("status"=>"success","message"=>EmployeesErrors::Create_Success,"div"=>"","EmployeeCode"=>SequnceList::updateNumber("_tbl_employees")));
        } else {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::Create_Failure,"div"=>""));
        }
    }         
    
    public static function ListAll() {
        global $mysql;
        $data = array();
        
        if ($_SESSION['User']['UserModule']=="branchadmin") {
                $data = $mysql->select("select * from _tbl_employees where BranchID='".$_SESSION['User']['BranchID']."'");    
            }
        if (isset($_SESSION['User']['BranchID']) && ($_SESSION['User']['BranchID']>0) ) {
            if ($_SESSION['User']['UserModule']=="branchAdmin") {
                $data = $mysql->select("select * from _tbl_employees where BranchID='".$_SESSION['User']['BranchID']."'");    
            }
            if (isset($_GET['filter']) && $_GET['filter']=="CreatedByMe") {
                $data = $mysql->select("select * from _tbl_employees where BranchID='".$_SESSION['User']['BranchID']."' and  CreatedByCode='".$_SESSION['User']['UserCode']."'");   
            }
             
        } else {
            $data = $mysql->select("select * from _tbl_employees");
            if ($_SESSION['User']['UserModule']=="admin") {
                if (isset($_GET['filter']) && $_GET['filter']=="CreatedByMe") {
                    $data = $mysql->select("select * from _tbl_employees where CreatedByCode='".$_SESSION['User']['AdministratorCode']."'");   
                }
            }
            if ($_SESSION['User']['UserModule']=="subadmin") {
                if (isset($_GET['filter']) && $_GET['filter']=="CreatedByMe") {
                    $data = $mysql->select("select * from _tbl_employees where CreatedByCode='".$_SESSION['User']['UserCode']."'");   
                }
            }
            
        }
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function ListAllSalesman() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_employees where EmployeeCategoryCode='EMP08'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function doUpdate() {
        
        global $mysql;
        
        if (strlen(trim($_POST['EntryDate']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Date","div"=>"EntryDate"));    
        }  else {
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
        
        if (strlen(trim($_POST['EmployeeName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Employee Name","div"=>"EmployeeName"));    
        }
        
        if ($_POST['EmployeeCategoryID']==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::EmployeeCategory_Empty,"div"=>"EmployeeCategoryID"));    
        }
        
        if (strlen(trim($_POST['FatherName']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::FatherName_Empty,"div"=>"FatherName"));    
        }
        
        if (trim($_POST['Gender'])=="0") {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::Gender_Empty,"div"=>"Gender"));        
        }
        
        if (strlen(trim($_POST['DateOfBirth']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::DateOfBirth_Empty,"div"=>"DateOfBirth"));    
        }  else {
            $currentYear = date("Y",strtotime(date("Y-m-d H:i:s")));
            $dobYear = date("Y",strtotime($_POST['DateOfBirth']));
            if (($currentYear-$dobYear)<18) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::DateOfBirth_MinimumYear,"div"=>"DateOfBirth"));    
            }
        }
        $_POST['DateOfBirth'] = date("Y-m-d",strtotime($_POST['DateOfBirth']));
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::EmailID_Empty,"div"=>"EmailID"));    
        }  else {
            if (!checkemail(trim($_POST["EmailID"]))) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::EmailID_InvalidFormat,"div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_employees where EmployeeID<>'".$_POST['EmployeeID']."' and EmailID='".trim($_POST['EmailID'])."'");
                if (sizeof($dupEmail)>0) {
                    return json_encode(array("status"=>"failure","message"=>EmployeesErrors::EmailID_Duplicate,"div"=>"EmailID"));    
                }
            }
        }
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::MobileNumber_Empty,"div"=>"MobileNumber"));    
        } else {
            if (strlen(trim($_POST['MobileNumber']))==10) {
                if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>EmployeesErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
                } else {
                    $dupMobile = $mysql->select("select * from _tbl_employees where EmployeeID<>'".$_POST['EmployeeID']."' and MobileNumber='".trim($_POST['MobileNumber'])."'");
                    if (sizeof($dupMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>EmployeesErrors::MobileNumber_Duplicate,"div"=>"MobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
           // return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['WhatsappNumber']))==10) {
                if (!($_POST['WhatsappNumber']>=6000000000 && $_POST['WhatsappNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>EmployeesErrors::WhatsappNumber_InvalidFormat,"div"=>"WhatsappNumber"));    
                } else {
                    $dupWaMobile = $mysql->select("select * from _tbl_employees where EmployeeID<>'".$_POST['EmployeeID']."' and WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                    if (sizeof($dupWaMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>EmployeesErrors::WhatsappNumber_Duplicate,"div"=>"WhatsappNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::WhatsappNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AlternativeMobileNumber']))==0) {
           // return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['AlternativeMobileNumber']))==10) {
                if (!($_POST['AlternativeMobileNumber']>=6000000000 && $_POST['AlternativeMobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
                } else {
                    $dupAltrMobile = $mysql->select("select * from _tbl_employees where EmployeeID<>'".$_POST['EmployeeID']."' and AlternativeMobileNumber='".trim($_POST['AlternativeMobileNumber'])."'");
                    if (sizeof($dupAltrMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AlternativeMobileNumber_Duplicate,"div"=>"AlternativeMobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['LoginUserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginUserName_Empty,"div"=>"LoginUserName"));    
        } else {
           if (strlen(trim($_POST['LoginUserName']))<6) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginUserName_RequireMinimumLength,"div"=>"LoginUserName"));    
            }
            if (strlen(trim($_POST['LoginUserName']))>8) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginUserName_RequireMaximumLength,"div"=>"LoginUserName"));    
            }
           $dupLoginName = $mysql->select("select * from _tbl_employees where EmployeeID<>'".$_POST['EmployeeID']."' and LoginUserName='".trim($_POST['LoginUserName'])."'");
           if (sizeof($dupLoginName)>0) {
               return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginUserName_Duplicate,"div"=>"LoginUserName"));    
           } 
        }
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginPassword_Empty,"div"=>"LoginPassword"));    
        } else {
            if (strlen(trim($_POST['LoginPassword']))<6) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginPassword_RequireMinimumLength,"div"=>"LoginPassword"));    
            }
            if (strlen(trim($_POST['LoginPassword']))>8) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::LoginPassword_RequireMaximumLength,"div"=>"LoginPassword"));    
            }
        }
        
        if (strlen(trim($_POST['PancardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::PancardNumber_Empty,"div"=>"PancardNumber"));    
        } else {
            if (!(IsValidPanCard(trim($_POST['PancardNumber'])))) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::PancardNumber_InvalidFormat,"div"=>"PancardNumber"));        
            }
            $dupPancard = $mysql->select("select * from _tbl_employees where EmployeeID<>'".$_POST['EmployeeID']."' and  PancardNumber='".trim($_POST['PancardNumber'])."'");
            if (sizeof($dupPancard)>0) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::PancardNumber_Duplicate,"div"=>"PancardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AadhaarCardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AadhaarCardNumber_Empty,"div"=>"AadhaarCardNumber"));    
        } else {
            $Aadhaar=str_replace("_","",trim($_POST['AadhaarCardNumber']));
            $Aadhaar=str_replace(" ","",$Aadhaar);
            
            if (strlen($Aadhaar)!=12) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AadhaarCardNumber_InvalidFormat,"div"=>"AadhaarCardNumber"));    
            }
            
            $dupAadhaar = $mysql->select("select * from _tbl_employees where EmployeeID<>'".$_POST['EmployeeID']."' and  AadhaarCardNumber='".trim($_POST['AadhaarCardNumber'])."'");
            if (sizeof($dupAadhaar)>0) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AadhaarCardNumber_Duplicate,"div"=>"AadhaarCardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AddressLine1']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AddressLine1_Empty,"div"=>"AddressLine1"));    
        }
        
        if ($_POST['StateNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::StateName_Empty,"div"=>"StateNameID"));    
        } else {
            if ($_POST['DistrictNameID']==0) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::DistrictName_Empty,"div"=>"DistrictNameID"));    
            } else {
                if ($_POST['AreaNameID']==0) {
                    return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AreaName_Empty,"div"=>"AreaNameID"));    
                }  
            }
        }

        if (strlen(trim($_POST['PinCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::PinCode_Empty,"div"=>"PinCode"));    
        } else {
            $PinCode=str_replace("_","",trim($_POST['PinCode']));
            $PinCode=str_replace(" ","",$PinCode);
            
            if (strlen($PinCode)!=6) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::PinCode_InvalidFormat,"div"=>"PinCode"));    
            }
        }
        
        $cus_type = json_decode(EmployeeCategories::getDetailsByID($_POST['EmployeeCategoryID']),true);
        $cus_type = $cus_type['data'];
        
        //return json_encode(array("status"=>"failure","message"=>"Please enter Employee Name","div"=>"EmployeeName"));    
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $id = $mysql->execute("update _tbl_employees set EmployeeName   = '".$_POST['EmployeeName']."',
                                                         EntryDate      = '".$_POST['EntryDate']."',
                                                         FatherName     = '".$_POST['FatherName']."',
                                                         Gender         = '".$_POST['Gender']."',
                                                         DateOfBirth    = '".$_POST['DateOfBirth']."',
                                                         EmailID        = '".$_POST['EmailID']."',
                                                         MobileNumber   = '".$_POST['MobileNumber']."',
                                                         WhatsappNumber = '".$_POST['WhatsappNumber']."',
                                                         AlternativeMobileNumber = '".$_POST['AlternativeMobileNumber']."',
                                                         LoginUserName  = '".$_POST['LoginUserName']."',
                                                         LoginPassword  = '".$_POST['LoginPassword']."',
                                                         PancardNumber  = '".trim($_POST['PancardNumber'])."',
                                                         AadhaarCardNumber = '".$_POST['AadhaarCardNumber']."',
                                                         AddressLine1   = '".$_POST['AddressLine1']."',
                                                         AddressLine2   = '".$_POST['AddressLine2']."',
                                                         StateNameID    = '".$StatName[0]['StateNameID']."',
                                                         StateName      = '".$StatName[0]['StateName']."',
                                                         DistrictNameID = '".$DistrictName[0]['DistrictNameID']."',
                                                         DistrictName   = '".$DistrictName[0]['DistrictName']."',
                                                         AreaNameID     = '".$AreaName[0]['AreaNameID']."',
                                                         AreaName       = '".$AreaName[0]['AreaName']."',
                                                         Remarks        = '".$_POST['Remarks']."',
                                                         PinCode        = '".$_POST['PinCode']."',
                                                         CreatedOn      = '".date("Y-m-d H:i:s")."',
                                                         IsActive       = '".$_POST['IsActive']."' where EmployeeID='".$_POST['EmployeeID']."'");
        $path = "assets/docs/employees/".$_POST['EmployeeID'];
            if (!is_dir($path)) {
                mkdir("assets/docs/employees/".$_POST['EmployeeID'], 0777); 
            } 
            
            $ProfilePhoto=time()."_".strtolower($_FILES["ProfilePhoto"]['name']);
            if (move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"],$path."/".$ProfilePhoto)) {
                $mysql->execute("update _tbl_employees set ProfilePhoto='".$ProfilePhoto."' where EmployeeID='".$_POST['EmployeeID']."'");
            } 
            
            $PanCardAttachment=time()."_".strtolower($_FILES["PanCardAttachment"]['name']);
            if (move_uploaded_file($_FILES["PanCardAttachment"]["tmp_name"],$path."/".$PanCardAttachment)) {
                $mysql->execute("update _tbl_employees set PanCardAttachment='".$PanCardAttachment."' where EmployeeID='".$_POST['EmployeeID']."'");
            }
            
            $AadhaarCardAttachment=time()."_".strtolower($_FILES["AadhaarCardAttachment"]['name']);
            if (move_uploaded_file($_FILES["AadhaarCardAttachment"]["tmp_name"],$path."/".$AadhaarCardAttachment)) {
                $mysql->execute("update _tbl_employees set AadhaarCardAttachment='".$AadhaarCardAttachment."' where EmployeeID='".$_POST['EmployeeID']."'");
            } 
        
        return json_encode(array("status"=>"success","message"=>EmployeesErrors::Update_Success,"div"=>""));
    }
    
    public static function remove() {
        global $mysql;
        $mysql->execute("delete from _tbl_employees where EmployeeID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>EmployeesErrors::Delete_Success,"data"=>$mysql->select("select * from _tbl_employees")));
    }
    
    public static function listAssignedSalesmanAreas() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_salesman_areas where EmployeeID='".$_GET['EmployeeID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
                         
    public static function assignSalesmanArea() {
        global $mysql;
        
        if ($_POST['StateNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::StateName_Empty,"div"=>"StateNameID"));    
        } else {
            if ($_POST['DistrictNameID']==0) {
                return json_encode(array("status"=>"failure","message"=>EmployeesErrors::DistrictName_Empty,"div"=>"DistrictNameID"));    
            } else {
                if ($_POST['AreaNameID']==0) {
                    return json_encode(array("status"=>"failure","message"=>EmployeesErrors::AreaName_Empty,"div"=>"AreaNameID"));    
                }  
            }
        }
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $mysql->insert("_tbl_salesman_areas",array("EmployeeID"     => $_POST['EmployeeID'],
                                                   "EmployeeName"   => "",
                                                   "StateNameID"    => $StatName[0]['StateNameID'],
                                                   "StateName"      => $StatName[0]['StateName'],
                                                   "DistrictNameID" => $DistrictName[0]['DistrictNameID'],
                                                   "DistrictName"   => $DistrictName[0]['DistrictName'],
                                                   "AreaNameID"     => $AreaName[0]['AreaNameID'],
                                                   "AreaName"       => $AreaName[0]['AreaName'],
                                                   "AssignedOn"     => date("Y-m-d H:i:s"),
                                                   "IsActive"       => "1"));
        return json_encode(array("status"=>"success","message"=>EmployeesErrors::Salesman_Assigned,"div"=>""));
    }                                                   
    
    public static function deactiveSalesmanArea() {
        global $mysql;
        $data = $mysql->execute("update _tbl_salesman_areas set IsActive='0'  where AssignedAreaID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>EmployeesErrors::Salesman_Deactivated, "data"=>$data));
    }
    
    public static function activeSalesmanArea() {               
        global $mysql;
        $data = $mysql->execute("update _tbl_salesman_areas set IsActive='1'  where AssignedAreaID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>EmployeesErrors::Salesman_Activated,"data"=>$data));
    }
    
    public static function removeSalesmanArea() {
        global $mysql;
        $data = $mysql->execute("delete from _tbl_salesman_areas   where AssignedAreaID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>EmployeesErrors::Salesman_removed_success,"data"=>$data));
    }
    
    public static function listByEmployeeCategory() {   
        global $mysql;
        $data = $mysql->select("select * from _tbl_employees where EmployeeCategoryID='".$_GET['EmployeeCategoryID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function addDocument() {
         global $mysql;
                                           
         if (trim($_POST['DocumentTypeID'])=="0") {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::Document_Attachment_Type_Empty,"div"=>"DocumentTypeID"));    
        }
         if (sizeof($_POST['files'])==0) {
            return json_encode(array("status"=>"failure","message"=>EmployeesErrors::Document_File_Empty,"div"=>"DocumentFiles"));    
        }
        
        $path = "assets/uploads/employees/".$_POST['EmployeeID'];
        if (!is_dir($path)) {
            mkdir("assets/uploads/employees/".$_POST['EmployeeID'], 0777); 
        }
        
        $DocumentType = $mysql->select("select * from _tbl_masters_documenttypes where DocumentTypeID='".$_POST['DocumentTypeID']."'");
        
        foreach($_POST['files'] as $file) {
            $file = str_replace("\\r","",$file);
            $file = str_replace("\\n","",$file);
            $source = SERVER_PATH."/tmp/".$file;
            $destination = SERVER_PATH."/assets/uploads/employees/".$_POST['EmployeeID']."/".$file;
            if( !copy($source, $destination) ) { 
                
            } else { 
                $mysql->insert("_tbl_assets",array("EmployeeID"       =>$_POST['EmployeeID'],
                                                   "CreatedOn"        =>date("Y-m-d H:i:s"),
                                                   "DocumentTypeID"   =>$DocumentType[0]['DocumentTypeID'],
                                                   "DocumentTypeName" =>$DocumentType[0]['DocumentTypeName'],
                                                   "FileName"         =>$file));
            } 
            
        }
         return json_encode(array("status"=>"success","message"=>EmployeesErrors::Document_Attach_success));
        
     }
     
    public static function listDocuments() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_assets WHERE EmployeeID='".$_GET['EmployeeID']."'");    
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     function listCustomize() {
        global $mysql;
        //sleep(10);
            if (isset($_POST['OrderBy']) && $_POST['OrderBy']=="0") {
                return json_encode(array("status"=>"failure","message"=>"Please select any one column","div"=>"message"));        
            }
            
            $sql = "select
                        `EmployeeID`,
                        DATE_FORMAT(EntryDate,'".appConfig::DATEFORMAT."') as `EntryDate`,
                        `EmployeeCode`,
                        `EmployeeName`,
                        `FatherName`,
                        `Gender`,
                        `ProfilePhoto`,
                        DATE_FORMAT(DateOfBirth,'".appConfig::DATEFORMAT."') as `DateOfBirth`,
                        `EmailID`,
                        `MobileNumber`,
                        `WhatsappNumber`,
                        `AlternativeMobileNumber`,
                        `LoginUserName`,
                        `LoginPassword`,
                        `PancardNumber`,
                        `PanCardAttachment`,
                        `AadhaarCardNumber`,
                        `AadhaarCardAttachment`,
                        `AddressLine1`,
                        `AddressLine2`,
                        `StateNameID`,
                        `StateName`,
                        `DistrictNameID`,
                        `DistrictName`,
                        `AreaNameID`,
                        `AreaName`,
                        `PinCode`,
                        `Remarks`,
                        `CreatedOn`,
                        `IsActive`,
                        `CreatedByID`,
                        `CreatedByName`,
                        `CreatedByCode`,
                        `CreatedBy`,
                        `BranchID`,
                        `BranchCode`,
                        `BranchName`,
                        `EmployeeCategoryID`,
                        `EmployeeCategoryCode`,
                        `EmployeeCategoryTitle`
                    from _tbl_employees where EmployeeID>0 ";
             
            if (isset($_POST['EmployeeNameS']) && $_POST['EmployeeNameS']==1) {
                if ($_POST['selectEmployeeFilter']=="0") {
                    $sql .= " and EmployeeName like '%".$_POST['SearchEmployeeName']."%' ";    
                }
                if ($_POST['selectEmployeeFilter']=="Startwith") {
                    $sql .= " and EmployeeName like '".$_POST['SearchEmployeeName']."%' ";    
                }
                if ($_POST['selectEmployeeFilter']=="Endwith") {
                    $sql .= " and EmployeeName like '%".$_POST['SearchEmployeeName']."' ";    
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
                    return json_encode(array("status"=>"failure","message"=>Employees::EntryDate_GreaterThanToday.date("d-m-Y",strtotime($_POST['ToDate'])),"div"=>"EntryDate"));        
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
            
            if (isset($_POST['EmployeeCategory']) && $_POST['EmployeeCategory']=="1") {
                if ($_POST['EmployeeCategoryID']!="0") {
                    $sql .= " and EmployeeCategoryID='".$_POST['EmployeeCategoryID']."' ";    
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
            
            if ($_POST['OrderBy']=="EmployeeCategoryID") {
                $_POST['OrderBy']="EmployeeCategoryTitle";
            }
            
            if ($_POST['OrderBy']=="DateOfBirth") {
                $_POST['OrderBy']="date(DateOfBirth)";
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