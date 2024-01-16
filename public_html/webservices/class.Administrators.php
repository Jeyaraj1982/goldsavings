<?php
class AdministratorsErrors {
    const AdministratorCode_Empty = "Please enter Administrator Code";
    const AdministratorCode_Duplicate = "Administrator Code already exists";
    const EntryDate_Empty = "Please select date";
    const EntryDate_GreaterThanToday = "Please select date on/or before ";
    
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
    
}
class Administrators {
    
    public function addNew() {
        
        global $mysql;
        
        if (strlen(trim($_POST['AdministratorCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AdministratorCode_Empty,"div"=>"AdministratorCode"));    
        } else {
             $dup = $mysql->select("select * from _tbl_administrators where AdministratorCode='".trim($_POST['AdministratorCode'])."'");
             if (sizeof($dup)>0) {
                 return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AdministratorCode_Duplicate,"div"=>"AdministratorCode"));    
             }
        }
        
        if (strlen(trim($_POST['EntryDate']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::EntryDate_Empty,"div"=>"EntryDate"));    
        } else {
            $currentdate = strtotime(date("Y-m-d"));
            $entrydate = strtotime($_POST['EntryDate']);
            if ($entrydate>$currentdate) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::EntryDate_GreaterThanToday.date("d-m-Y"),"div"=>"EntryDate"));        
            }
        }
        $_POST['EntryDate'] = date("Y-m-d",strtotime($_POST['EntryDate']));
        
        if (strlen(trim($_POST['AdministratorName']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AdministratorName_Empty,"div"=>"AdministratorName"));    
        }
        
        if (strlen(trim($_POST['FatherName']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::FatherName_Empty,"div"=>"FatherName"));    
        }
        
        if (trim($_POST['Gender'])=="0") {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::Gender_Empty,"div"=>"Gender"));        
        }
        
        if (strlen(trim($_POST['DateOfBirth']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::DateOfBirth_Empty,"div"=>"DateOfBirth"));    
        } else {
            $currentYear = date("Y",strtotime(date("Y-m-d H:i:s")));
            $dobYear = date("Y",strtotime($_POST['DateOfBirth']));
            if (($currentYear-$dobYear)<18) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::DateOfBirth_MinimumYear,"div"=>"DateOfBirth"));    
            }
        }
        $_POST['DateOfBirth'] = date("Y-m-d",strtotime($_POST['DateOfBirth']));
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::EmailID_Empty,"div"=>"EmailID"));    
        } else {
            $email = (trim($_POST["EmailID"]));
            if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::EmailID_InvalidFormat,"div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_administrators where EmailID='".trim($_POST['EmailID'])."'");
                if (sizeof($dupEmail)>0) {
                    return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::EmailID_Duplicate,"div"=>"EmailID"));    
                }
            }
        }
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::MobileNumber_Empty,"div"=>"MobileNumber"));    
        } else {
            if (strlen(trim($_POST['MobileNumber']))==10) {
                if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
                } else {
                    $dupMobile = $mysql->select("select * from _tbl_administrators where MobileNumber='".trim($_POST['MobileNumber'])."'");
                    if (sizeof($dupMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::MobileNumber_Duplicate,"div"=>"MobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
            //return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['WhatsappNumber']))==10) {
                if (!($_POST['WhatsappNumber']>=6000000000 && $_POST['WhatsappNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::WhatsappNumber_InvalidFormat,"div"=>"WhatsappNumber"));    
                } else {
                    $dupWaMobile = $mysql->select("select * from _tbl_administrators where WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                    if (sizeof($dupWaMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::WhatsappNumber_Duplicate,"div"=>"WhatsappNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::WhatsappNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AlternativeMobileNumber']))==0) {
           // return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['AlternativeMobileNumber']))==10) {
                if (!($_POST['AlternativeMobileNumber']>=6000000000 && $_POST['AlternativeMobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
                } else {
                    $dupAltrMobile = $mysql->select("select * from _tbl_masters_administrators where AlternativeMobileNumber='".trim($_POST['AlternativeMobileNumber'])."'");
                    if (sizeof($dupAltrMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AlternativeMobileNumber_Duplicate,"div"=>"AlternativeMobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
            }
        }
            
        if (strlen(trim($_POST['LoginUserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginUserName_Empty,"div"=>"LoginUserName"));    
        } else {
            if (strlen(trim($_POST['LoginUserName']))<6) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginUserName_RequireMinimumLength,"div"=>"LoginUserName"));    
            }
            if (strlen(trim($_POST['LoginUserName']))>8) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginUserName_RequireMaximumLength,"div"=>"LoginUserName"));    
            }
            $dupLoginName = $mysql->select("select * from _tbl_administrators where LoginUserName='".trim($_POST['LoginUserName'])."'");
            if (sizeof($dupLoginName)>0) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginUserName_Duplicate,"div"=>"LoginUserName"));    
            } 
        }
        
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginPassword_Empty,"div"=>"LoginPassword"));    
        } else {
            if (strlen(trim($_POST['LoginPassword']))<6) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginPassword_RequireMinimumLength,"div"=>"LoginPassword"));    
            }
            if (strlen(trim($_POST['LoginPassword']))>8) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginPassword_RequireMaximumLength,"div"=>"LoginPassword"));    
            }
        }
        
        if (strlen(trim($_POST['PancardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::PancardNumber_Empty,"div"=>"PancardNumber"));    
        } else {
            if (!(IsValidPanCard(trim($_POST['PancardNumber'])))) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::PancardNumber_InvalidFormat,"div"=>"PancardNumber"));        
            }
            $dupPancard = $mysql->select("select * from _tbl_masters_administrators where PancardNumber='".trim($_POST['PancardNumber'])."'");
            if (sizeof($dupPancard)>0) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::PancardNumber_Duplicate,"div"=>"PancardNumber"));    
            }
        }
         
        if (strlen(trim($_POST['AadhaarCardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AadhaarCardNumber_Empty,"div"=>"AadhaarCardNumber"));    
        } else {
            
            $Aadhaar=str_replace("_","",trim($_POST['AadhaarCardNumber']));
            $Aadhaar=str_replace(" ","",$Aadhaar);
            
            if (strlen($Aadhaar)!=12) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AadhaarCardNumber_InvalidFormat,"div"=>"AadhaarCardNumber"));    
            }
            
            $dupAadhaar = $mysql->select("select * from _tbl_masters_administrators where AadhaarCardNumber='".trim($_POST['AadhaarCardNumber'])."'");
            if (sizeof($dupAadhaar)>0) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AadhaarCardNumber_Duplicate,"div"=>"AadhaarCardNumber"));    
            }
        }
         
        if (strlen(trim($_POST['AddressLine1']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AddressLine1_Empty,"div"=>"AddressLine1"));    
        }
        
        if ($_POST['StateNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::StateName_Empty,"div"=>"StateNameID"));    
        } else {
            if ($_POST['DistrictNameID']==0) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::DistrictName_Empty,"div"=>"DistrictNameID"));    
            } else {
                if ($_POST['AreaNameID']==0) {
                    return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AreaName_Empty,"div"=>"AreaNameID"));    
                }  
            }
        }

        if (strlen(trim($_POST['PinCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::PinCode_Empty,"div"=>"PinCode"));    
        } else {
            $PinCode=str_replace("_","",trim($_POST['PinCode']));
            $PinCode=str_replace(" ","",$PinCode);
            
            if (strlen($PinCode)!=6) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::PinCode_InvalidFormat,"div"=>"PinCode"));    
            }
        }
        
        $ProfilePhoto=""; 
        $PanCardAttachment="";
        $AadhaarCardAttachment = "";
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $AllowToChangePasswordFirstLogin = (isset($_POST['AllowToChangePasswordFirstLogin']) && $_POST['AllowToChangePasswordFirstLogin']==1) ? 1 : 0;
        
        $AdministratorID = $mysql->insert("_tbl_administrators",array("AdministratorCode"          => $_POST['AdministratorCode'],
                                                            "EntryDate"          => $_POST['EntryDate'],
                                                            "AdministratorName"          => $_POST['AdministratorName'],
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
                                                            "PinCode"               => $_POST['PinCode'],
                                                            "Remarks"               => $_POST['Remarks'],
                                                            "UserModule"               => "admin",
                                                            "AllowToChangePasswordFirstLogin" => $AllowToChangePasswordFirstLogin,
                                                            "CreatedOn"             => date("Y-m-d H:i:s"),
                                                            "IsActive"              => '1'));     
        if ($AdministratorID>0) {
            
            $path = "assets/docs/administrators/".$AdministratorID;
            if (!is_dir($path)) {
                mkdir("assets/docs/administrators/".$AdministratorID, 0777); 
            } 
            
            $ProfilePhoto=time()."_".strtolower($_FILES["ProfilePhoto"]['name']);
            if (move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"],$path."/".$ProfilePhoto)) {
                $mysql->execute("update _tbl_administrators set ProfilePhoto='".$ProfilePhoto."' where AdministratorID='".$AdministratorID."'");
            } 
            
            $PanCardAttachment=time()."_".strtolower($_FILES["PanCardAttachment"]['name']);
            if (move_uploaded_file($_FILES["PanCardAttachment"]["tmp_name"],$path."/".$PanCardAttachment)) {
                $mysql->execute("update _tbl_administrators set PanCardAttachment='".$PanCardAttachment."' where AdministratorID='".$AdministratorID."'");
            }
            
            $AadhaarCardAttachment=time()."_".strtolower($_FILES["AadhaarCardAttachment"]['name']);
            if (move_uploaded_file($_FILES["AadhaarCardAttachment"]["tmp_name"],$path."/".$AadhaarCardAttachment)) {
                $mysql->execute("update _tbl_administrators set AadhaarCardAttachment='".$AadhaarCardAttachment."' where AdministratorID='".$AdministratorID."'");
            } 
         
            return json_encode(array("status"=>"success","message"=>AdministratorsErrors::Create_Success,"div"=>"","AdministratorCode"=>SequnceList::updateNumber("_tbl_administrators")));
        } else {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::Create_Failure,"div"=>""));
        }
    }         
    
    public static function ListAll() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_administrators");
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
        
        if (strlen(trim($_POST['AdministratorName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Administrator Name","div"=>"AdministratorName"));    
        }
        
        if (strlen(trim($_POST['FatherName']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::FatherName_Empty,"div"=>"FatherName"));    
        }
        
        if (trim($_POST['Gender'])=="0") {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::Gender_Empty,"div"=>"Gender"));        
        }
        
        if (strlen(trim($_POST['DateOfBirth']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::DateOfBirth_Empty,"div"=>"DateOfBirth"));    
        }  else {
            $currentYear = date("Y",strtotime(date("Y-m-d H:i:s")));
            $dobYear = date("Y",strtotime($_POST['DateOfBirth']));
            if (($currentYear-$dobYear)<18) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::DateOfBirth_MinimumYear,"div"=>"DateOfBirth"));    
            }
        }
        $_POST['DateOfBirth'] = date("Y-m-d",strtotime($_POST['DateOfBirth']));
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::EmailID_Empty,"div"=>"EmailID"));    
        }  else {
            if (!checkemail(trim($_POST["EmailID"]))) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::EmailID_InvalidFormat,"div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_masters_administrators where AdministratorID<>'".$_POST['AdministratorID']."' and EmailID='".trim($_POST['EmailID'])."'");
                if (sizeof($dupEmail)>0) {
                    return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::EmailID_Duplicate,"div"=>"EmailID"));    
                }
            }
        }
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::MobileNumber_Empty,"div"=>"MobileNumber"));    
        } else {
            if (strlen(trim($_POST['MobileNumber']))==10) {
                if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
                } else {
                    $dupMobile = $mysql->select("select * from _tbl_masters_administrators where AdministratorID<>'".$_POST['AdministratorID']."' and MobileNumber='".trim($_POST['MobileNumber'])."'");
                    if (sizeof($dupMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::MobileNumber_Duplicate,"div"=>"MobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::MobileNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
           // return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['WhatsappNumber']))==10) {
                if (!($_POST['WhatsappNumber']>=6000000000 && $_POST['WhatsappNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::WhatsappNumber_InvalidFormat,"div"=>"WhatsappNumber"));    
                } else {
                    $dupWaMobile = $mysql->select("select * from _tbl_masters_administrators where AdministratorID<>'".$_POST['AdministratorID']."' and WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                    if (sizeof($dupWaMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::WhatsappNumber_Duplicate,"div"=>"WhatsappNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::WhatsappNumber_InvalidFormat,"div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AlternativeMobileNumber']))==0) {
           // return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['AlternativeMobileNumber']))==10) {
                if (!($_POST['AlternativeMobileNumber']>=6000000000 && $_POST['AlternativeMobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
                } else {
                    $dupAltrMobile = $mysql->select("select * from _tbl_masters_administrators where AdministratorID<>'".$_POST['AdministratorID']."' and AlternativeMobileNumber='".trim($_POST['AlternativeMobileNumber'])."'");
                    if (sizeof($dupAltrMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AlternativeMobileNumber_Duplicate,"div"=>"AlternativeMobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AlternativeMobileNumber_InvalidFormat,"div"=>"AlternativeMobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['LoginUserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginUserName_Empty,"div"=>"LoginUserName"));    
        } else {
           if (strlen(trim($_POST['LoginUserName']))<6) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginUserName_RequireMinimumLength,"div"=>"LoginUserName"));    
            }
            if (strlen(trim($_POST['LoginUserName']))>8) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginUserName_RequireMaximumLength,"div"=>"LoginUserName"));    
            }
           $dupLoginName = $mysql->select("select * from _tbl_masters_administrators where AdministratorID<>'".$_POST['AdministratorID']."' and LoginUserName='".trim($_POST['LoginUserName'])."'");
           if (sizeof($dupLoginName)>0) {
               return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginUserName_Duplicate,"div"=>"LoginUserName"));    
           } 
        }
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginPassword_Empty,"div"=>"LoginPassword"));    
        } else {
            if (strlen(trim($_POST['LoginPassword']))<6) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginPassword_RequireMinimumLength,"div"=>"LoginPassword"));    
            }
            if (strlen(trim($_POST['LoginPassword']))>8) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::LoginPassword_RequireMaximumLength,"div"=>"LoginPassword"));    
            }
        }
        
        if (strlen(trim($_POST['PancardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::PancardNumber_Empty,"div"=>"PancardNumber"));    
        } else {
            if (!(IsValidPanCard(trim($_POST['PancardNumber'])))) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::PancardNumber_InvalidFormat,"div"=>"PancardNumber"));        
            }
            $dupPancard = $mysql->select("select * from _tbl_masters_administrators where AdministratorID<>'".$_POST['AdministratorID']."' and  PancardNumber='".trim($_POST['PancardNumber'])."'");
            if (sizeof($dupPancard)>0) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::PancardNumber_Duplicate,"div"=>"PancardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AadhaarCardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AadhaarCardNumber_Empty,"div"=>"AadhaarCardNumber"));    
        } else {
            $Aadhaar=str_replace("_","",trim($_POST['AadhaarCardNumber']));
            $Aadhaar=str_replace(" ","",$Aadhaar);
            
            if (strlen($Aadhaar)!=12) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AadhaarCardNumber_InvalidFormat,"div"=>"AadhaarCardNumber"));    
            }
            
            $dupAadhaar = $mysql->select("select * from _tbl_masters_administrators where AdministratorID<>'".$_POST['AdministratorID']."' and  AadhaarCardNumber='".trim($_POST['AadhaarCardNumber'])."'");
            if (sizeof($dupAadhaar)>0) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AadhaarCardNumber_Duplicate,"div"=>"AadhaarCardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AddressLine1']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AddressLine1_Empty,"div"=>"AddressLine1"));    
        }
        
        if ($_POST['StateNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::StateName_Empty,"div"=>"StateNameID"));    
        } else {
            if ($_POST['DistrictNameID']==0) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::DistrictName_Empty,"div"=>"DistrictNameID"));    
            } else {
                if ($_POST['AreaNameID']==0) {
                    return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::AreaName_Empty,"div"=>"AreaNameID"));    
                }  
            }
        }

        if (strlen(trim($_POST['PinCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::PinCode_Empty,"div"=>"PinCode"));    
        } else {
            $PinCode=str_replace("_","",trim($_POST['PinCode']));
            $PinCode=str_replace(" ","",$PinCode);
            
            if (strlen($PinCode)!=6) {
                return json_encode(array("status"=>"failure","message"=>AdministratorsErrors::PinCode_InvalidFormat,"div"=>"PinCode"));    
            }
        }
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $id = $mysql->execute("update _tbl_administrators set AdministratorName   = '".$_POST['AdministratorName']."',
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
                                                         IsActive       = '".$_POST['IsActive']."' where AdministratorID='".$_POST['AdministratorID']."'");
        $path = "assets/docs/administrators/".$_POST['AdministratorID'];
            if (!is_dir($path)) {
                mkdir("assets/docs/administrators/".$_POST['AdministratorID'], 0777); 
            } 
            
            $ProfilePhoto=time()."_".strtolower($_FILES["ProfilePhoto"]['name']);
            if (move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"],$path."/".$ProfilePhoto)) {
                $mysql->execute("update _tbl_administrators set ProfilePhoto='".$ProfilePhoto."' where AdministratorID='".$_POST['AdministratorID']."'");
            } 
            
            $PanCardAttachment=time()."_".strtolower($_FILES["PanCardAttachment"]['name']);
            if (move_uploaded_file($_FILES["PanCardAttachment"]["tmp_name"],$path."/".$PanCardAttachment)) {
                $mysql->execute("update _tbl_administrators set PanCardAttachment='".$PanCardAttachment."' where AdministratorID='".$_POST['AdministratorID']."'");
            }
            
            $AadhaarCardAttachment=time()."_".strtolower($_FILES["AadhaarCardAttachment"]['name']);
            if (move_uploaded_file($_FILES["AadhaarCardAttachment"]["tmp_name"],$path."/".$AadhaarCardAttachment)) {
                $mysql->execute("update _tbl_administrators set AadhaarCardAttachment='".$AadhaarCardAttachment."' where AdministratorID='".$_POST['AdministratorID']."'");
            } 
        
        return json_encode(array("status"=>"success","message"=>AdministratorsErrors::Update_Success,"div"=>""));
    }
    
    public static function remove() {
        global $mysql;
        $mysql->execute("delete from _tbl_administrators where AdministratorID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>AdministratorsErrors::Delete_Success,"data"=>$mysql->select("select * from _tbl_administrators")));
    }
    
    public static function listDocuments() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_assets WHERE AdministratorID='".$_GET['AdministratorID']."'");    
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     function listCustomize() {
        global $mysql;
        //sleep(10);
            if (isset($_POST['OrderBy']) && $_POST['OrderBy']=="0") {
                return json_encode(array("status"=>"failure","message"=>"Please select any one column","div"=>"message"));        
            }
            
            $sql = "select
                        `AdministratorID`,
                        DATE_FORMAT(EntryDate,'".appConfig::DATEFORMAT."') as `EntryDate`,
                        `AdministratorCode`,
                        `AdministratorName`,
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
                        `IsActive`
                        
                    from _tbl_administrators where AdministratorID>0 ";
             
            if (isset($_POST['AdministratorNameS']) && $_POST['AdministratorNameS']==1) {
                if ($_POST['selectAdministratorFilter']=="0") {
                    $sql .= " and AdministratorName like '%".$_POST['SearchAdministratorName']."%' ";    
                }
                if ($_POST['selectAdministratorFilter']=="Startwith") {
                    $sql .= " and AdministratorName like '".$_POST['SearchAdministratorName']."%' ";    
                }
                if ($_POST['selectAdministratorFilter']=="Endwith") {
                    $sql .= " and AdministratorName like '%".$_POST['SearchAdministratorName']."' ";    
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
                    return json_encode(array("status"=>"failure","message"=>Administrators::EntryDate_GreaterThanToday.date("d-m-Y",strtotime($_POST['ToDate'])),"div"=>"EntryDate"));        
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
            
            if ($_POST['OrderBy']=="StateNameID") {
                $_POST['OrderBy']="StateName";
            }
            
             if ($_POST['OrderBy']=="DistrictNameID") {
                $_POST['OrderBy']="DistrictName";
            }
            
            if ($_POST['OrderBy']=="AreaNameID") {
                $_POST['OrderBy']="AreaName";
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
        $data = $mysql->select("select * from _tbl_logs_activity_admins where AdministratorID='".(isset($_GET['ID']) ? $_GET['ID'] : $_SESSION['User']['AdministratorID'])."'");
        return json_encode(array("status"=>"success","data"=>$data,"sql"=>$sql));
    }
}
?>