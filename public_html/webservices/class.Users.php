<?php
class UsersErrors {
    
    const UserCode_Empty = "Please enter User Code";
    const UserCode_Duplicate = "User Code already exists";
    const EntryDate_Empty = "Please select date";
    const EntryDate_GreaterThanToday = "Please select date on/or before "; 
    const BranchName_Empty = "Please branch Name";
    
    const UserName_Empty = "Please enter User Name";
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

class Users {
    
    function addNew() {
        
        global $mysql;
        
        if (trim($_POST['UserRoleID'])=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select User Role","div"=>"UserRoleID"));    
        }
        
        if ($_POST['UserRoleID']!="subadmin") {
            if ($_POST['BranchID']=="0") {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::BranchName_Empty,"div"=>"BranchID"));    
            }
        }
        
        if (strlen(trim($_POST['UserCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::UserCode_Empty,"div"=>"UserCode"));    
        } else {
             $dup = $mysql->select("select * from _tbl_masters_users where UserCode='".trim($_POST['UserCode'])."'");
             if (sizeof($dup)>0) {
                 return json_encode(array("status"=>"failure","message"=>UsersErrors::UserCode_Duplicate,"div"=>"UserCode"));    
             }
        }
        
        if (strlen(trim($_POST['EntryDate']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::EntryDate_Empty,"div"=>"EntryDate"));    
        } else {
            $currentdate = strtotime(date("Y-m-d"));
            $entrydate = strtotime($_POST['EntryDate']);
            if ($entrydate>$currentdate) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::EntryDate_GreaterThanToday.date("d-m-Y"),"div"=>"EntryDate"));        
            }
        }
        $_POST['EntryDate'] = date("Y-m-d",strtotime($_POST['EntryDate']));
        
        if (strlen(trim($_POST['UserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::UserName_Empty,"div"=>"UserName"));    
        }
        
        if (strlen(trim($_POST['FatherName']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::FatherName_Empty,"div"=>"FatherName"));    
        }
        
        if (trim($_POST['Gender'])=="0") {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::Gender_Empty,"div"=>"Gender"));        
        }
        
        if (strlen(trim($_POST['DateOfBirth']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::DateOfBirth_Empty,"div"=>"DateOfBirth"));    
        }  else {
            $currentYear = date("Y",strtotime(date("Y-m-d H:i:s")));
            $dobYear = date("Y",strtotime($_POST['DateOfBirth']));
            if (($currentYear-$dobYear)<18) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::DateOfBirth_MinimumYear,"div"=>"DateOfBirth"));    
            }
        }
        $_POST['DateOfBirth'] = date("Y-m-d",strtotime($_POST['DateOfBirth']));
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::EmailID_Empty,"div"=>"EmailID"));    
        } else {
            $email = (trim($_POST["EmailID"]));
            if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::EmailID_InvalidFormat,"div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_masters_users where EmailID='".trim($_POST['EmailID'])."'");
                if (sizeof($dupEmail)>0) {
                    return json_encode(array("status"=>"failure","message"=>UsersErrors::EmailID_Duplicate,"div"=>"EmailID"));    
                }
            }
        }
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::MobileNumber_Empty,"div"=>"MobileNumber"));    
        } else {
            if (strlen(trim($_POST['MobileNumber']))==10) {
                if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>UsersErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
                } else {
                    $dupMobile = $mysql->select("select * from _tbl_masters_users where MobileNumber='".trim($_POST['MobileNumber'])."'");
                    if (sizeof($dupMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>UsersErrors::MobileNumber_Duplicate,"div"=>"MobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
            //return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['WhatsappNumber']))==10) {
                if (!($_POST['WhatsappNumber']>=6000000000 && $_POST['WhatsappNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>UsersErrors::WhatsappNumber_InvalidFormat,"div"=>"WhatsappNumber"));    
                } else {
                    $dupWaMobile = $mysql->select("select * from _tbl_masters_users where WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                    if (sizeof($dupWaMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>UsersErrors::WhatsappNumber_Duplicate,"div"=>"WhatsappNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::WhatsappNumber_InvalidFormat,"div"=>"WhatsappNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AlternativeMobileNumber']))==0) {
           // return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['AlternativeMobileNumber']))==10) {
                if (!($_POST['AlternativeMobileNumber']>=6000000000 && $_POST['AlternativeMobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>UsersErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
                } else {
                    $dupAltrMobile = $mysql->select("select * from _tbl_masters_users where AlternativeMobileNumber='".trim($_POST['AlternativeMobileNumber'])."'");
                    if (sizeof($dupAltrMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>UsersErrors::AlternativeMobileNumber_Duplicate,"div"=>"AlternativeMobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
            }
        }

        if (strlen(trim($_POST['LoginUserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginUserName_Empty,"div"=>"LoginUserName"));    
        } else {
           if (strlen(trim($_POST['LoginUserName']))<6) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginUserName_RequireMinimumLength,"div"=>"LoginUserName"));    
            }
            if (strlen(trim($_POST['LoginUserName']))>8) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginUserName_RequireMaximumLength,"div"=>"LoginUserName"));    
            }
           $dupLoginName = $mysql->select("select * from _tbl_masters_users where LoginUserName='".trim($_POST['LoginUserName'])."'");
           if (sizeof($dupLoginName)>0) {
               return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginUserName_Duplicate,"div"=>"LoginUserName"));    
           } 
        }
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginPassword_Empty,"div"=>"LoginPassword"));    
        }else {
            if (strlen(trim($_POST['LoginPassword']))<6) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginPassword_RequireMinimumLength,"div"=>"LoginPassword"));    
            }
            if (strlen(trim($_POST['LoginPassword']))>8) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginPassword_RequireMaximumLength,"div"=>"LoginPassword"));    
            }
        }
        
        if (strlen(trim($_POST['PancardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::PancardNumber_Empty,"div"=>"PancardNumber"));    
        } else {
            if (!(IsValidPanCard(trim($_POST['PancardNumber'])))) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::PancardNumber_InvalidFormat,"div"=>"PancardNumber"));        
            }
            $dupPancard = $mysql->select("select * from _tbl_masters_users where PancardNumber='".trim($_POST['PancardNumber'])."'");
            if (sizeof($dupPancard)>0) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::PancardNumber_Duplicate,"div"=>"PancardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AadhaarCardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::AadhaarCardNumber_Empty,"div"=>"AadhaarCardNumber"));    
        } else {
            
            $Aadhaar=str_replace("_","",trim($_POST['AadhaarCardNumber']));
            $Aadhaar=str_replace(" ","",$Aadhaar);
            
            if (strlen($Aadhaar)!=12) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::AadhaarCardNumber_InvalidFormat,"div"=>"AadhaarCardNumber"));    
            }
            
            $dupAadhaar = $mysql->select("select * from _tbl_masters_users where AadhaarCardNumber='".trim($_POST['AadhaarCardNumber'])."'");
            if (sizeof($dupAadhaar)>0) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::AadhaarCardNumber_Duplicate,"div"=>"AadhaarCardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AddressLine1']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::AddressLine1_Empty,"div"=>"AddressLine1"));    
        }
        
        if ($_POST['StateNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::StateName_Empty,"div"=>"StateNameID"));    
        } else {
            if ($_POST['DistrictNameID']==0) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::DistrictName_Empty,"div"=>"DistrictNameID"));    
            } else {
                if ($_POST['AreaNameID']==0) {
                    return json_encode(array("status"=>"failure","message"=>UsersErrors::AreaName_Empty,"div"=>"AreaNameID"));    
                }  
            }
        }

        if (strlen(trim($_POST['PinCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::PancardNumber_Empty,"div"=>"PinCode"));    
        } else {
              $PinCode=str_replace("_","",trim($_POST['PinCode']));
            $PinCode=str_replace(" ","",$PinCode);
            
            if (strlen($PinCode)!=6) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::PancardNumber_InvalidFormat,"div"=>"PinCode"));    
            }
        }
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        $AllowToChangePasswordFirstLogin = "0";
        $AllowToChangePasswordFirstLogin = (isset($_POST['AllowToChangePasswordFirstLogin']) && $_POST['AllowToChangePasswordFirstLogin']==1) ? "1" : "0";
        
        $CreatedBy="";
        $CreatedByID=0;
        $CreatedByName="";
        
        $BranchID="0";
            $BranchCode="";
            $BranchName="";
        if ($_POST['BranchID']!="0") {
            $Branch = $mysql->select("select * from _tbl_masters_branches where BranchID='".$_POST['BranchID']."'");
           $BranchID=$Branch[0]['BranchID'];
            $BranchCode=$Branch[0]['BranchCode'];
            $BranchName=$Branch[0]['BranchName'];    
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
            ;
        }
        
        
        
        $UserID = $mysql->insert("_tbl_masters_users",array("UserCode"              => $_POST['UserCode'],
                                                            "EntryDate"             => $_POST['EntryDate'],
                                                            "UserName"              => $_POST['UserName'],
                                                            "FatherName"            => $_POST['FatherName'],
                                                            "Gender"                => $_POST['Gender'],
                                                            "DateOfBirth"           => $_POST['DateOfBirth'],
                                                            "EmailID"               => trim($_POST['EmailID']),
                                                            "MobileNumber"          => trim($_POST['MobileNumber']),
                                                            "WhatsappNumber"        => trim($_POST['WhatsappNumber']),
                                                            "LoginUserName"         => trim($_POST['LoginUserName']),
                                                            "LoginPassword"         => $_POST['LoginPassword'],
                                                            "AddressLine1"          => $_POST['AddressLine1'],
                                                            "AddressLine2"          => $_POST['AddressLine2'],
                                                                    
                                                            "AadhaarCardNumber"     => $_POST['AadhaarCardNumber'],
                                                            "PancardNumber"         => strtoupper($_POST['PancardNumber']),
                                                            "AlternativeMobileNumber" => $_POST['AlternativeMobileNumber'],
                                                                    
                                                            "StateNameID"           => $StatName[0]['StateNameID'],
                                                            "StateName"             => $StatName[0]['StateName'],
                                                            "DistrictNameID"        => $DistrictName[0]['DistrictNameID'],
                                                            "DistrictName"          => $DistrictName[0]['DistrictName'],
                                                            "AreaNameID"            => $AreaName[0]['AreaNameID'],
                                                            "AreaName"              => $AreaName[0]['AreaName'],
                                                            "PinCode"               => $_POST['PinCode'],
                                                            "Remarks"               => $_POST['Remarks'],
                                                            "AllowToChangePasswordFirstLogin" => $AllowToChangePasswordFirstLogin,
                                                            "CreatedOn"             => date("Y-m-d H:i:s"),
                                                            "BranchID"              => $BranchID,
                                                            "BranchCode"            => $BranchCode,
                                                            "BranchName"            => $BranchName,
                                                            "CreatedBy"             => $CreatedBy,
                                                            "CreatedByID"           => $CreatedByID,
                                                            "CreatedByName"         => $CreatedByName,
                                                            "IsActive"              => '1'));     
        if ($UserID>0) {
            $UserRole = $mysql->select("select * from _tbl_masters_user_roles where Module='".$_POST['UserRoleID']."'");
            $mysql->execute("update _tbl_masters_users set UserModule='".$UserRole[0]['Module']."', UserRoleID='".$UserRole[0]['UserRoleID']."', UserRole='".$UserRole[0]['UserRole']."' where UserID='".$UserID."'");
            $mysql->insert("_tbl_users_assigned_roles",array("UserID"     => $UserID,
                                                             "UserRoleID" => $UserRole[0]['UserRoleID'],
                                                             "UserRole"   => $UserRole[0]['UserRole'],
                                                             "Module"     => $UserRole[0]['Module'],
                                                             "AssignedOn" => date("Y-m-d H:i:s")));
             
            return json_encode(array("status"=>"success","message"=>UsersErrors::Create_Success,"div"=>"","UserCode"=>SequnceList::updateNumber("_tbl_masters_users")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create".$mysql->error,"div"=>""));
        }
    }
    
    function ListAll() {
        global $mysql;
        if (isset($_SESSION['User']['BranchID']) && ($_SESSION['User']['BranchID']>0) ) {
        $data = $mysql->select("select * from _tbl_masters_users where BranchID='".$_SESSION['User']['BranchID']."'");
        } else {
            $data = $mysql->select("select * from _tbl_masters_users");
        }
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    function listBranchAdmins() {
        global $mysql;
        $data = $mysql->select("select UserID,UserCode,UserName,MobileNumber,EmailID,IsActive,DATE_FORMAT(EntryDate,'".appConfig::DATEFORMAT."') as `EntryDate` from _tbl_masters_users where BranchID='".$_GET['Branch']."' and  UserModule='branchadmin'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    function listBranchUsers() {
        global $mysql;
        $data = $mysql->select("select UserID,UserCode,UserName,MobileNumber,EmailID,IsActive,DATE_FORMAT(EntryDate,'".appConfig::DATEFORMAT."') as `EntryDate` from _tbl_masters_users where BranchID='".$_GET['Branch']."' and  UserModule='branchuser'");
        return json_encode(array("status"=>"success","data"=>$data));
    }

    function doUpdate() {
        
        global $mysql;
        
        if (strlen(trim($_POST['EntryDate']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::EntryDate_Empty,"div"=>"EntryDate"));    
        } else {
            $currentdate = strtotime(date("Y-m-d"));
            $entrydate = strtotime($_POST['EntryDate']);
            if ($entrydate>$currentdate) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::EntryDate_GreaterThanToday.date("d-m-Y"),"div"=>"EntryDate"));        
            }
        }
        $_POST['EntryDate'] = date("Y-m-d",strtotime($_POST['EntryDate']));
        
        if (strlen(trim($_POST['UserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::UserCode_Empty,"div"=>"UserName"));    
        }
        
        if (strlen(trim($_POST['FatherName']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::FatherName_Empty,"div"=>"FatherName"));    
        }
        
        if (trim($_POST['Gender'])=="0") {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::Gender_Empty,"div"=>"Gender"));        
        }
        
        if (strlen(trim($_POST['DateOfBirth']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::DateOfBirth_Empty,"div"=>"DateOfBirth"));    
        }  else {
            $currentYear = date("Y",strtotime(date("Y-m-d H:i:s")));
            $dobYear = date("Y",strtotime($_POST['DateOfBirth']));
            if (($currentYear-$dobYear)<18) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::DateOfBirth_MinimumYear,"div"=>"DateOfBirth"));    
            }
        }
        $_POST['DateOfBirth'] = date("Y-m-d",strtotime($_POST['DateOfBirth']));
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::EmailID_Empty,"div"=>"EmailID"));    
        }  else {                                                                             
            if (!checkemail(trim($_POST["EmailID"]))) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::EmailID_InvalidFormat,"div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_masters_users where UserID<>'".$_POST['UserID']."' and EmailID='".trim($_POST['EmailID'])."'");
                if (sizeof($dupEmail)>0) {
                    return json_encode(array("status"=>"failure","message"=>UsersErrors::EmailID_Duplicate,"div"=>"EmailID"));    
                }
            }
        }
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::MobileNumber_Empty,"div"=>"MobileNumber"));    
        } else {
            if (strlen(trim($_POST['MobileNumber']))==10) {
                if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>UsersErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
                } else {
                    $dupMobile = $mysql->select("select * from _tbl_masters_users where UserID<>'".$_POST['UserID']."' and MobileNumber='".trim($_POST['MobileNumber'])."'");
                    if (sizeof($dupMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>UsersErrors::MobileNumber_Duplicate,"div"=>"MobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
            //return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['WhatsappNumber']))==10) {
                if (!($_POST['WhatsappNumber']>=6000000000 && $_POST['WhatsappNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>UsersErrors::WhatsappNumber_Empty,"div"=>"WhatsappNumber"));    
                } else {
                    $dupWaMobile = $mysql->select("select * from _tbl_masters_users where UserID<>'".$_POST['UserID']."' and WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                    if (sizeof($dupWaMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>UsersErrors::WhatsappNumber_Duplicate,"div"=>"WhatsappNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::WhatsappNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AlternativeMobileNumber']))==0) {
           // return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['AlternativeMobileNumber']))==10) {
                if (!($_POST['AlternativeMobileNumber']>=6000000000 && $_POST['AlternativeMobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>UsersErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
                } else {
                    $dupAltrMobile = $mysql->select("select * from _tbl_masters_users where UserID<>'".$_POST['UserID']."' and  AlternativeMobileNumber='".trim($_POST['AlternativeMobileNumber'])."'");
                    if (sizeof($dupAltrMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>UsersErrors::AlternativeMobileNumber_Duplicate,"div"=>"AlternativeMobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['LoginUserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginUserName_Empty,"div"=>"LoginUserName"));    
        } else {
           if (strlen(trim($_POST['LoginUserName']))<6) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginUserName_RequireMinimumLength,"div"=>"LoginUserName"));    
            }
            if (strlen(trim($_POST['LoginUserName']))>8) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginUserName_RequireMaximumLength,"div"=>"LoginUserName"));    
            }
            $dupLoginName = $mysql->select("select * from _tbl_masters_users where UserID<>'".$_POST['UserID']."' and LoginUserName='".trim($_POST['LoginUserName'])."'");
           if (sizeof($dupLoginName)>0) {
               return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginUserName_Duplicate,"div"=>"LoginUserName"));    
           }
        }
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginPassword_Empty,"div"=>"LoginPassword"));    
        } else {
            if (strlen(trim($_POST['LoginPassword']))<6) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginPassword_RequireMinimumLength,"div"=>"LoginPassword"));    
            }
            if (strlen(trim($_POST['LoginPassword']))>8) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::LoginPassword_RequireMaximumLength,"div"=>"LoginPassword"));    
            }
        }
        
        if (strlen(trim($_POST['PancardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::PancardNumber_Empty,"div"=>"PancardNumber"));    
        } else {
            if (!(IsValidPanCard(trim($_POST['PancardNumber'])))) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::PancardNumber_InvalidFormat,"div"=>"PancardNumber"));        
            }
            $dupPancard = $mysql->select("select * from _tbl_masters_users where UserID<>'".$_POST['UserID']."' and  PancardNumber='".trim($_POST['PancardNumber'])."'");
            if (sizeof($dupPancard)>0) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::PancardNumber_Duplicate,"div"=>"PancardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AadhaarCardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::AadhaarCardNumber_Empty,"div"=>"AadhaarCardNumber"));    
        } else {
            $Aadhaar=str_replace("_","",trim($_POST['AadhaarCardNumber']));
            $Aadhaar=str_replace(" ","",$Aadhaar);
            
            if (strlen($Aadhaar)!=12) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::AadhaarCardNumber_InvalidFormat,"div"=>"AadhaarCardNumber"));    
            }
            
            $dupAadhaar = $mysql->select("select * from _tbl_masters_users where UserID<>'".$_POST['UserID']."' and  AadhaarCardNumber='".trim($_POST['AadhaarCardNumber'])."'");
            if (sizeof($dupAadhaar)>0) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::AadhaarCardNumber_Duplicate,"div"=>"AadhaarCardNumber"));    
            }
        }
        
        
        if (strlen(trim($_POST['AddressLine1']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::AddressLine1_Empty,"div"=>"AddressLine1"));    
        }
        
        if ($_POST['StateNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::StateName_Empty,"div"=>"StateNameID"));    
        } else {
            if ($_POST['DistrictNameID']==0) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::DistrictName_Empty,"div"=>"DistrictNameID"));    
            } else {
                if ($_POST['AreaNameID']==0) {
                    return json_encode(array("status"=>"failure","message"=>UsersErrors::AreaName_Empty,"div"=>"AreaNameID"));    
                }  
            }
        }

        if (strlen(trim($_POST['PinCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>UsersErrors::PinCode_Empty,"div"=>"PinCode"));    
        } else {
            $PinCode=str_replace("_","",trim($_POST['PinCode']));
            $PinCode=str_replace(" ","",$PinCode);
            
            if (strlen($PinCode)!=6) {
                return json_encode(array("status"=>"failure","message"=>UsersErrors::PinCode_InvalidFormat,"div"=>"PinCode"));    
            }
        }
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $id = $mysql->execute("update _tbl_masters_users set UserName            = '".$_POST['UserName']."',
                                                         EntryDate               = '".$_POST['EntryDate']."',
                                                         FatherName              = '".$_POST['FatherName']."',
                                                         Gender                  = '".$_POST['Gender']."',
                                                         DateOfBirth             = '".$_POST['DateOfBirth']."',
                                                         EmailID                 = '".$_POST['EmailID']."',
                                                         MobileNumber            = '".$_POST['MobileNumber']."',
                                                         WhatsappNumber          = '".$_POST['WhatsappNumber']."',
                                                         LoginUserName           = '".$_POST['LoginUserName']."',
                                                         LoginPassword           = '".$_POST['LoginPassword']."',
                                                         AddressLine1            = '".$_POST['AddressLine1']."',
                                                         AddressLine2            = '".$_POST['AddressLine2']."',
                                                         AadhaarCardNumber       = '".$_POST['AadhaarCardNumber']."',
                                                         PancardNumber           = '".strtoupper($_POST['PancardNumber'])."',
                                                         AlternativeMobileNumber = '".$_POST['AlternativeMobileNumber']."',
                                                         StateNameID             = '".$StatName[0]['StateNameID']."',
                                                         StateName               = '".$StatName[0]['StateName']."',
                                                         DistrictNameID          = '".$DistrictName[0]['DistrictNameID']."',
                                                         DistrictName            = '".$DistrictName[0]['DistrictName']."',
                                                         AreaNameID              = '".$AreaName[0]['AreaNameID']."',
                                                         AreaName                = '".$AreaName[0]['AreaName']."',
                                                         Remarks                 = '".$_POST['Remarks']."',
                                                         PinCode                 = '".$_POST['PinCode']."',
                                                         CreatedOn               = '".date("Y-m-d H:i:s")."',
                                                         IsActive                = '".$_POST['IsActive']."' where UserID='".$_POST['UserID']."'");
       
        
        return json_encode(array("status"=>"success","message"=>UsersErrors::Update_Success,"div"=>""));
    }
    
    public static function remove() {
        global $mysql;
        $mysql->execute("delete from _tbl_masters_users where UserID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>UsersErrors::Delete_Success,"data"=>$mysql->select("select * from _tbl_masters_users")));
    }
    
    function assignUserRole() {
        global $mysql;
        
        $UserRole = $mysql->select("select * from _tbl_masters_user_roles where UserRoleID='".$_POST['UserRoleID']."'");
        $q = $mysql->select("select * from _tbl_users_assigned_roles where   UserID='".$_POST['UserID']."' order by AssignedUserRoleID desc limit 1");
        $mysql->execute("update _tbl_users_assigned_roles set EndedOn='".date("Y-m-d H:i:s")."' where AssignedUserRoleID='".$q[0]['AssignedUserRoleID']."'");
        $mysql->insert("_tbl_users_assigned_roles",array("UserID"       => $_POST['UserID'],
                                                         "UserRoleID"   => $UserRole[0]['UserRoleID'],
                                                         "UserRole"     => $UserRole[0]['UserRole'],
                                                         "Module"       => $UserRole[0]['Module'],
                                                         "AssignedOn"   => date("Y-m-d H:i:s")));
        $mysql->execute("update _tbl_masters_users set UserModule='".$UserRole[0]['Module']."',  UserRoleID='".$UserRole[0]['UserRoleID']."', UserRole='".$UserRole[0]['UserRole']."' where UserID='".$_POST['UserID']."'");
        return json_encode(array("status"=>"success","message"=>"Assigned Successfully"));
    }
    
    function listAssignedUserRoles() {
        global $mysql;
        $UserRole = $mysql->select("select * from _tbl_users_assigned_roles where UserID='".$_GET['UserID']."' order by AssignedUserRoleID desc");
        return json_encode(array("status"=>"success","data"=>$UserRole));
    }
    
     public static function myData() {   
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_users where UserID='".$_SESSION['User']['UserID']."'");
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
         
         $validPassword = $mysql->select("select * from _tbl_masters_users where LoginPassword='".trim($_POST['CurrentPassword'])."' and UserID='".$_SESSION['User']['UserID']."'");
         if (sizeof($validPassword)==0) {
            return json_encode(array("status"=>"failure","message"=>"Current Password is invalid","div"=>"CurrentPassword"));    
         }

         $mysql->execute("update _tbl_masters_users set LoginPassword ='".$_POST['NewPassword']."',
                                                    AllowToChangePasswordFirstLogin='0'
                                                            where UserID='".$_SESSION['User']['UserID']."'");
         
         $_SESSION['User']['AllowToChangePasswordFirstLogin']=0;
                                                          
         return json_encode(array("status"=>"success","message"=>"Password changed successfully".$mysql->error,"div"=>""));
     }
     
 
    
    
    function addDocument() {
         global $mysql;

         if (trim($_POST['DocumentTypeID'])=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select document type","div"=>"DocumentTypeID"));    
        }
         if (sizeof($_POST['files'])==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select and attach file(s)","div"=>"DocumentFiles"));    
        }
        
        $path = "assets/uploads/users/".$_POST['UserID'];
        if (!is_dir($path)) {
            mkdir("assets/uploads/users/".$_POST['UserID'], 0777); 
        }
        
        $DocumentType = $mysql->select("select * from _tbl_masters_documenttypes where DocumentTypeID='".$_POST['DocumentTypeID']."'");
        
        foreach($_POST['files'] as $file) {
            $file = str_replace("\\r","",$file);
            $file = str_replace("\\n","",$file);
            $source = SERVER_PATH."/tmp/".$file;
            $destination = SERVER_PATH."/assets/uploads/users/".$_POST['UserID']."/".$file;
            if( !copy($source, $destination) ) { 
                
            } else { 
                $mysql->insert("_tbl_assets",array("UserID"       =>$_POST['UserID'],
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
         $data = $mysql->select("select * from _tbl_assets WHERE UserID='".$_GET['UserID']."'");    
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     function listCustomize() {
        global $mysql;
   
            if (isset($_POST['OrderBy']) && $_POST['OrderBy']=="0") {
                return json_encode(array("status"=>"failure","message"=>"Please select any one column","div"=>"message"));        
            }
            
            $sql = "select
                        `UserID`,
                        DATE_FORMAT(EntryDate,'".appConfig::DATEFORMAT."') as `EntryDate`,
                        `UserCode`,
                        `UserName`,
                        `FatherName`,
                        `Gender`,
                        DATE_FORMAT(DateOfBirth,'".appConfig::DATEFORMAT."') as `DateOfBirth`,
                        `EmailID`,
                        `MobileNumber`,
                        `WhatsappNumber`,
                        `AlternativeMobileNumber`,
                        `AadhaarCardNumber`,
                        `PancardNumber`,
                        `LoginUserName`,
                        `LoginPassword`,
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
                        `UserRoleID`,
                        `UserRole`,
                        `BranchID`,
                        `BranchName`,
                        `BranchCode`,
                        `CreatedBy`,
                        `CreatedByID`,
                        `CreatedByName`
                   from _tbl_masters_users where UserID>0 ";
             
            if (isset($_POST['UserNameS']) && $_POST['UserNameS']==1) {
                if ($_POST['selectUserFilter']=="0") {
                    $sql .= " and UserName like '%".$_POST['SearchUserName']."%' ";    
                }
                if ($_POST['selectUserFilter']=="Startwith") {
                    $sql .= " and UserName like '".$_POST['SearchUserName']."%' ";    
                }
                if ($_POST['selectUserFilter']=="Endwith") {
                    $sql .= " and UserName like '%".$_POST['SearchUserName']."' ";    
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
                    return json_encode(array("status"=>"failure","message"=>"Err","div"=>"EntryDate"));        
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
            
            if (isset($_POST['BranchName']) && $_POST['BranchName']=="1") {
                if ($_POST['BranchID']!="0") {
                    $sql .= " and BranchID='".$_POST['BranchID']."' ";    
                }
            }
            
            if (isset($_POST['UserRole']) && $_POST['UserRole']=="1") {
                if ($_POST['UserRoleID']!="0") {
                    $sql .= " and UserRoleID='".$_POST['UserRoleID']."' ";    
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
            
            if ($_POST['OrderBy']=="UserRoleID") {
                $_POST['OrderBy']="UserRole";
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
    
    function viewAllActivities() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_logs_activity_users where UserID='".(isset($_GET['ID']) ? $_GET['ID'] : $_SESSION['User']['UserID'])."'");
        return json_encode(array("status"=>"success","data"=>$data,"sql"=>$sql));
    }
}
?>