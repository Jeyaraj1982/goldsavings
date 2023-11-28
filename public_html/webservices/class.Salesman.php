<?php
class Salesman {
    
    function addNew() {
        
        global $mysql;
        
        if (strlen(trim($_POST['SalesmanCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Salesman Code","div"=>"SalesmanCode"));    
        } else {
             $dup = $mysql->select("select * from _tbl_masters_salesman where SalesmanCode='".trim($_POST['SalesmanCode'])."'");
             if (sizeof($dup)>0) {
                 return json_encode(array("status"=>"failure","message"=>"Salesman Code already exists","div"=>"SalesmanCode"));    
             }
        }
        
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

        if (strlen(trim($_POST['SalesmanName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Salesman Name","div"=>"SalesmanName"));    
        }
        
        if (strlen(trim($_POST['FatherName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Father/Husband Name","div"=>"FatherName"));    
        }
        
        if (trim($_POST['Gender'])=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select gender","div"=>"Gender"));        
        }
        
        if (strlen(trim($_POST['DateOfBirth']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Date Of Birth","div"=>"DateOfBirth"));    
        } else {
            $currentYear = date("Y",strtotime(date("Y-m-d H:i:s")));
            $dobYear = date("Y",strtotime($_POST['DateOfBirth']));
            if (($currentYear-$dobYear)<=18) {
                return json_encode(array("status"=>"failure","message"=>"Age must be greater than 18","div"=>"DateOfBirth"));    
            }
        }
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Email ID","div"=>"EmailID"));    
        } else {
            $email = (trim($_POST["EmailID"]));
            if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Email ID","div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_masters_salesman where EmailID='".trim($_POST['EmailID'])."'");
                if (sizeof($dupEmail)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Email ID is already exists","div"=>"EmailID"));    
                }
            }
        }
        
        if (strlen(trim($_POST['DateOfBirth']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Date Of Birth","div"=>"DateOfBirth"));    
        } else {
            $currentYear = date("Y",strtotime(date("Y-m-d H:i:s")));
            $dobYear = date("Y",strtotime($_POST['DateOfBirth']));
            if (($currentYear-$dobYear)<=18) {
                return json_encode(array("status"=>"failure","message"=>"Age must be greater than 18","div"=>"DateOfBirth"));    
            }
        }
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Mobile Number","div"=>"MobileNumber"));    
        } else {
            if (strlen(trim($_POST['MobileNumber']))==10) {
                if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number","div"=>"MobileNumber"));    
                } else {
                    $dupMobile = $mysql->select("select * from _tbl_masters_salesman where MobileNumber='".trim($_POST['MobileNumber'])."'");
                    if (sizeof($dupMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>"Mobile Number is already exists","div"=>"MobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number","div"=>"MobileNumber"));    
            }
        }
        
       
        if (!(strlen(trim($_POST['WhatsappNumber'])))==0) {
            if (strlen(trim($_POST['WhatsappNumber']))==10) {
                if (!($_POST['WhatsappNumber']>=6000000000 && $_POST['WhatsappNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>"Please enter valid Whatsapp Number","div"=>"WhatsappNumber"));    
                } else {
                    $dupWaMobile = $mysql->select("select * from _tbl_masters_salesman where WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                    if (sizeof($dupWaMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>"Whatsapp Number is already exists","div"=>"WhatsappNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid MobileNumber","div"=>"MobileNumber"));    
            }
        }

        if (strlen(trim($_POST['LoginUserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Login User Name","div"=>"LoginUserName"));    
        } else {
            if (strlen(trim($_POST['LoginUserName']))<6) {
                return json_encode(array("status"=>"failure","message"=>"Minimum 6 characters require","div"=>"LoginUserName"));    
            }
            if (strlen(trim($_POST['LoginUserName']))>8) {
                return json_encode(array("status"=>"failure","message"=>"Maximum 8 characters require","div"=>"LoginUserName"));    
            }
           $dupLoginName = $mysql->select("select * from _tbl_masters_salesman where LoginUserName='".trim($_POST['LoginUserName'])."'");
           if (sizeof($dupLoginName)>0) {
               return json_encode(array("status"=>"failure","message"=>"Login User Name is already used","div"=>"LoginUserName"));    
           } 
        }
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Login Password","div"=>"LoginPassword"));    
        }  else {
            if (strlen(trim($_POST['LoginPassword']))<6) {
                return json_encode(array("status"=>"failure","message"=>"Minimum 6 characters require","div"=>"LoginPassword"));    
            }
            if (strlen(trim($_POST['LoginPassword']))>8) {
                return json_encode(array("status"=>"failure","message"=>"Maximum 8 characters require","div"=>"LoginPassword"));    
            }
        }
        
        
         if (strlen(trim($_POST['PancardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter PAN Card Number","div"=>"PancardNumber"));    
        } else {
            if (!(IsValidPanCard(trim($_POST['PancardNumber'])))) {
                return json_encode(array("status"=>"failure","message"=>"PAN Card Number is invalid format","div"=>"PancardNumber"));        
            }
            $dupPancard = $mysql->select("select * from _tbl_masters_employees where PancardNumber='".trim($_POST['PancardNumber'])."'");
            if (sizeof($dupPancard)>0) {
                return json_encode(array("status"=>"failure","message"=>"PAN Card Number is already used","div"=>"PancardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AadhaarCardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Aadhaar Card Number","div"=>"AadhaarCardNumber"));    
        } else {
            
            $Aadhaar=str_replace("_","",trim($_POST['AadhaarCardNumber']));
            $Aadhaar=str_replace(" ","",$Aadhaar);
            
            if (strlen($Aadhaar)!=12) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Aadhaar Card number","div"=>"AadhaarCardNumber"));    
            }
            
            $dupAadhaar = $mysql->select("select * from _tbl_masters_employees where AadhaarCardNumber='".trim($_POST['AadhaarCardNumber'])."'");
            if (sizeof($dupAadhaar)>0) {
                return json_encode(array("status"=>"failure","message"=>"Aadhaar Card Number is already used","div"=>"AadhaarCardNumber"));    
            }
        }
        
        
        if (strlen(trim($_POST['AddressLine1']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Address Line 1","div"=>"AddressLine1"));    
        }
        
        if ($_POST['StateNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select State Name","div"=>"StateNameID"));    
        } else {
            if ($_POST['DistrictNameID']==0) {
                return json_encode(array("status"=>"failure","message"=>"Please select District Name","div"=>"DistrictNameID"));    
            } else {
                if ($_POST['AreaNameID']==0) {
                    return json_encode(array("status"=>"failure","message"=>"Please select Area Name","div"=>"AreaNameID"));    
                }  
            }
        }

        if (strlen(trim($_POST['PinCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Pincode","div"=>"PinCode"));    
        } else {
              $PinCode=str_replace("_","",trim($_POST['PinCode']));
            $PinCode=str_replace(" ","",$PinCode);
            
            if (strlen($PinCode)!=6) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Pincode","div"=>"PinCode"));    
            }
        }
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $AllowToChangePasswordFirstLogin = (isset($_POST['AllowToChangePasswordFirstLogin']) && $_POST['AllowToChangePasswordFirstLogin']==1) ? 1 : 0;
        
        $SalesmanID = $mysql->insert("_tbl_masters_salesman",array("SalesmanCode"           => $_POST['SalesmanCode'],
                                                                    "EntryDate"             => $_POST['EntryDate'],
                                                                    "SalesmanName"          => $_POST['SalesmanName'],
                                                                    "FatherName"            => $_POST['FatherName'],
                                                                    "Gender"                => $_POST['Gender'],
                                                                    "DateOfBirth"           => $_POST['DateOfBirth'],
                                                                    "EmailID"               => trim($_POST['EmailID']),
                                                                    "MobileNumber"          => trim($_POST['MobileNumber']),
                                                                    "WhatsappNumber"        => trim($_POST['WhatsappNumber']),
                                                                    "AadhaarCardNumber"     => $_POST['AadhaarCardNumber'],
                                                                    "PancardNumber"         => strtoupper($_POST['PancardNumber']),
                                                                    "AlternativeMobileNumber" => $_POST['AlternativeMobileNumber'],
                                                                    "LoginUserName"         => trim($_POST['LoginUserName']),
                                                                    "LoginPassword"         => $_POST['LoginPassword'],
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
                                                                    "AllowToChangePasswordFirstLogin" => $AllowToChangePasswordFirstLogin,
                                                                    "CreatedOn"             => date("Y-m-d H:i:s"),
                                                                    "IsActive"              => '1'));     
        if ($SalesmanID>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","SalesmanCode"=>SequnceList::updateNumber("_tbl_masters_salesman")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create".$mysql->error,"div"=>""));
        }
    }
    
    function ListAll() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_salesman");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    function doUpdate() {
        
        global $mysql;
        
          if (strlen(trim($_POST['EntryDate']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Date","div"=>"EntryDate"));    
        }
        
        if (strlen(trim($_POST['SalesmanName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Salesman Name","div"=>"SalesmanName"));    
        }
        
        if (strlen(trim($_POST['FatherName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Father/Husband Name","div"=>"FatherName"));    
        }
        
        if (trim($_POST['Gender'])=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select gender","div"=>"Gender"));        
        }
        
        if (strlen(trim($_POST['DateOfBirth']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Date Of Birth","div"=>"DateOfBirth"));    
        } else {
            $currentYear = date("Y",strtotime(date("Y-m-d H:i:s")));
            $dobYear = date("Y",strtotime($_POST['DateOfBirth']));
            if (($currentYear-$dobYear)<=18) {
                return json_encode(array("status"=>"failure","message"=>"Age must be greater than 18","div"=>"DateOfBirth"));    
            }
        }
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Email ID","div"=>"EmailID"));    
        }  else {
            if (!checkemail(trim($_POST["EmailID"]))) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Email ID","div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_masters_salesman where SalesmanID<>'".$_POST['SalesmanID']."' and EmailID='".trim($_POST['EmailID'])."'");
                if (sizeof($dupEmail)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Email ID is already exists","div"=>"EmailID"));    
                }
            }
        }
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter MobileNumber","div"=>"MobileNumber"));    
        } else {
            if (strlen(trim($_POST['MobileNumber']))==10) {
                if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number.","div"=>"MobileNumber"));    
                } else {
                    $dupMobile = $mysql->select("select * from _tbl_masters_salesman where SalesmanID<>'".$_POST['SalesmanID']."' and MobileNumber='".trim($_POST['MobileNumber'])."'");
                    if (sizeof($dupMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>"Mobile Number is already exists","div"=>"MobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number","div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
            //return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['WhatsappNumber']))==10) {
                if (!($_POST['WhatsappNumber']>=6000000000 && $_POST['WhatsappNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>"Please enter valid Whatsapp Number","div"=>"WhatsappNumber"));    
                } else {
                    $dupWaMobile = $mysql->select("select * from _tbl_masters_salesman where SalesmanID<>'".$_POST['SalesmanID']."' and WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                    if (sizeof($dupWaMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>"Whatsapp Number is already exists","div"=>"WhatsappNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid whatsapp number","div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['LoginUserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Login User Name","div"=>"LoginUserName"));    
        } else {
           if (strlen(trim($_POST['LoginUserName']))<6) {
                return json_encode(array("status"=>"failure","message"=>"Minimum 6 characters require","div"=>"LoginUserName"));    
            }
            if (strlen(trim($_POST['LoginUserName']))>8) {
                return json_encode(array("status"=>"failure","message"=>"Maximum 8 characters require","div"=>"LoginUserName"));    
            }
            
            $dupLoginName = $mysql->select("select * from _tbl_masters_salesman where SalesmanID<>'".$_POST['SalesmanID']."' and LoginUserName='".trim($_POST['LoginUserName'])."'");
           if (sizeof($dupLoginName)>0) {
               return json_encode(array("status"=>"failure","message"=>"Login User Name is already used","div"=>"LoginUserName"));    
           }
        }
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Login Password","div"=>"LoginPassword"));    
        } else {
            if (strlen(trim($_POST['LoginPassword']))<6) {
                return json_encode(array("status"=>"failure","message"=>"Minimum 6 characters require","div"=>"LoginPassword"));    
            }
            if (strlen(trim($_POST['LoginPassword']))>8) {
                return json_encode(array("status"=>"failure","message"=>"Maximum 8 characters require","div"=>"LoginPassword"));    
            }
        }
        
        if (strlen(trim($_POST['PancardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter PAN Card Number","div"=>"PancardNumber"));    
        } else {
            if (!(IsValidPanCard(trim($_POST['PancardNumber'])))) {
                return json_encode(array("status"=>"failure","message"=>"PAN Card Number is invalid format","div"=>"PancardNumber"));        
            }
            $dupPancard = $mysql->select("select * from _tbl_masters_salesman where SalesmanID<>'".$_POST['SalesmanID']."' and  PancardNumber='".trim($_POST['PancardNumber'])."'");
            if (sizeof($dupPancard)>0) {
                return json_encode(array("status"=>"failure","message"=>"PAN Card Number is already used","div"=>"PancardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AadhaarCardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Aadhaar Card Number","div"=>"AadhaarCardNumber"));    
        } else {
            $Aadhaar=str_replace("_","",trim($_POST['AadhaarCardNumber']));
            $Aadhaar=str_replace(" ","",$Aadhaar);
            
            if (strlen($Aadhaar)!=12) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Aadhaar Card number","div"=>"AadhaarCardNumber"));    
            }
            
            $dupAadhaar = $mysql->select("select * from _tbl_masters_salesman where SalesmanID<>'".$_POST['SalesmanID']."' and  AadhaarCardNumber='".trim($_POST['AadhaarCardNumber'])."'");
            if (sizeof($dupAadhaar)>0) {
                return json_encode(array("status"=>"failure","message"=>"Aadhaar Card Number is already used","div"=>"AadhaarCardNumber"));    
            }
        }
                         
        if (strlen(trim($_POST['AddressLine1']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Address Line 1","div"=>"AddressLine1"));    
        }
        
        if ($_POST['StateNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select State Name","div"=>"StateNameID"));    
        } else {
            if ($_POST['DistrictNameID']==0) {
                return json_encode(array("status"=>"failure","message"=>"Please select District Name","div"=>"DistrictNameID"));    
            } else {
                if ($_POST['AreaNameID']==0) {
                    return json_encode(array("status"=>"failure","message"=>"Please select Area Name","div"=>"AreaNameID"));    
                }  
            }
        }

        if (strlen(trim($_POST['PinCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Pincode","div"=>"PinCode"));    
        } else {
            $PinCode=str_replace("_","",trim($_POST['PinCode']));
            $PinCode=str_replace(" ","",$PinCode);
            
            if (strlen($PinCode)!=6) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid PinCode","div"=>"PinCode"));    
            }
        }
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $id = $mysql->execute("update _tbl_masters_salesman set SalesmanName   = '".$_POST['SalesmanName']."',
                                                         EntryDate     = '".$_POST['EntryDate']."',
                                                         FatherName     = '".$_POST['FatherName']."',
                                                         Gender         = '".$_POST['Gender']."',
                                                         DateOfBirth    = '".$_POST['DateOfBirth']."',
                                                         EmailID        = '".$_POST['EmailID']."',
                                                         MobileNumber   = '".$_POST['MobileNumber']."',
                                                         WhatsappNumber = '".$_POST['WhatsappNumber']."',
                                                         LoginUserName  = '".$_POST['LoginUserName']."',
                                                         LoginPassword  = '".$_POST['LoginPassword']."',
                                                         AddressLine1   = '".$_POST['AddressLine1']."',
                                                         AddressLine2   = '".$_POST['AddressLine2']."',
                                                         AadhaarCardNumber       = '".$_POST['AadhaarCardNumber']."',
                                                         PancardNumber           = '".strtoupper($_POST['PancardNumber'])."',
                                                         AlternativeMobileNumber = '".$_POST['AlternativeMobileNumber']."',
                                                         StateNameID   = '".$StatName[0]['StateNameID']."',
                                                         StateName   = '".$StatName[0]['StateName']."',
                                                         DistrictNameID   = '".$DistrictName[0]['DistrictNameID']."',
                                                         DistrictName   = '".$DistrictName[0]['DistrictName']."',
                                                         AreaNameID   = '".$AreaName[0]['AreaNameID']."',
                                                         AreaName   = '".$AreaName[0]['AreaName']."',
                                                         Remarks   = '".$_POST['Remarks']."',
                                                         PinCode        = '".$_POST['PinCode']."',
                                                         CreatedOn      = '".date("Y-m-d H:i:s")."',
                                                         IsActive       = '".$_POST['IsActive']."' where SalesmanID='".$_POST['SalesmanID']."'");
        
        return json_encode(array("status"=>"success","message"=>"successfully updated","div"=>""));
    }
    
    public static function remove() {
        global $mysql;
        $mysql->execute("delete from _tbl_masters_salesman where SalesmanID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_salesman")));
    }
    
    function listAssignedSalesmanAreas() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_salesman_areas where SalesmanID='".$_GET['SalesmanID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
                         
    function assignSalesmanArea() {
        global $mysql;
        
        if ($_POST['StateNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select State Name","div"=>"StateNameID"));    
        } else {
            if ($_POST['DistrictNameID']==0) {
                return json_encode(array("status"=>"failure","message"=>"Please select District Name","div"=>"DistrictNameID"));    
            } else {
                if ($_POST['AreaNameID']==0) {
                    return json_encode(array("status"=>"failure","message"=>"Please select Area Name","div"=>"AreaNameID"));    
                }  
            }
        }
        
        $salesman  = $mysql->select("select * from _tbl_masters_salesman where SalesmanID='".$_POST['SalesmanID']."'");
        if (sizeof($salesman)==0) {
            return json_encode(array("status"=>"failure","message"=>"unable to find salesman reference","div"=>"StateNameID"));    
        }
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $mysql->insert("_tbl_salesman_areas",array("SalesmanID"     => $_POST['SalesmanID'],
                                                   "SalesmanName"   => "",
                                                   "StateNameID"    => $StatName[0]['StateNameID'],
                                                   "StateName"      => $StatName[0]['StateName'],
                                                   "DistrictNameID" => $DistrictName[0]['DistrictNameID'],
                                                   "DistrictName"   => $DistrictName[0]['DistrictName'],
                                                   "AreaNameID"     => $AreaName[0]['AreaNameID'],
                                                   "AreaName"       => $AreaName[0]['AreaName'],
                                                   "AssignedOn"     => date("Y-m-d H:i:s"),
                                                   "IsActive"       => "1"));
        return json_encode(array("status"=>"success","message"=>"successfully assigned","div"=>""));
    }
    function deactiveSalesmanArea() {
        global $mysql;
        $data = $mysql->execute("update _tbl_salesman_areas set IsActive='0'  where AssignedAreaID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>"successfully deactivated", "data"=>$data));
    }
    function activeSalesmanArea() {               
        global $mysql;
        $data = $mysql->execute("update _tbl_salesman_areas set IsActive='1'  where AssignedAreaID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>"successfully activated","data"=>$data));
    }
    
    function removeSalesmanArea() {
        global $mysql;
        $data = $mysql->execute("delete from _tbl_salesman_areas   where AssignedAreaID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>"removed successfully","data"=>$data));
    }
    
    public static function myData() {   
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_salesman where SalesmanID='".$_SESSION['User']['SalesmanID']."'");
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
         
         $validPassword = $mysql->select("select * from _tbl_masters_salesman where LoginPassword='".trim($_POST['CurrentPassword'])."' and SalesmanID='".$_SESSION['User']['SalesmanID']."'");
         if (sizeof($validPassword)==0) {
            return json_encode(array("status"=>"failure","message"=>"Current Password is invalid","div"=>"CurrentPassword"));    
         }

         $mysql->execute("update _tbl_masters_salesman set LoginPassword ='".$_POST['NewPassword']."',
                                                    AllowToChangePasswordFirstLogin='0'
                                                            where SalesmanID='".$_SESSION['User']['SalesmanID']."'");
         
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
        
        $path = "assets/uploads/salesman/".$_POST['SalesmanID'];
        if (!is_dir($path)) {
            mkdir("assets/uploads/salesman/".$_POST['SalesmanID'], 0777); 
        }
        
        $DocumentType = $mysql->select("select * from _tbl_masters_documenttypes where DocumentTypeID='".$_POST['DocumentTypeID']."'");
        
        foreach($_POST['files'] as $file) {
            $file = str_replace("\\r","",$file);
            $file = str_replace("\\n","",$file);
            $source = SERVER_PATH."/tmp/".$file;
            $destination = SERVER_PATH."/assets/uploads/salesman/".$_POST['SalesmanID']."/".$file;
            if( !copy($source, $destination) ) { 
                
            } else { 
                $mysql->insert("_tbl_assets",array("SalesmanID"       =>$_POST['SalesmanID'],
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
         $data = $mysql->select("select * from _tbl_assets WHERE SalesmanID='".$_GET['SalesmanID']."'");    
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     function listCustomize() {
        global $mysql;
        //sleep(10);
        if (isset($_SESSION['User']['SalesmanID'])) {
            $data = $mysql->select("select * from _tbl_masters_saleman WHERE ReferByText='Salesman' and ReferredByID='".$_SESSION['User']['SalesmanID']."'");    
        } else {
            if (isset($_POST['OrderBy']) && $_POST['OrderBy']=="0") {
                return json_encode(array("status"=>"failure","message"=>"Please select any one column","div"=>"message"));        
            }
            
            $sql = "select 
                        `SalesmanID`,
                        DATE_FORMAT(EntryDate,'".appConfig::DATEFORMAT."') as `EntryDate`,
                        `SalesmanCode`,
                        `SalesmanName`,
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
                        `IsActive`
                   from _tbl_masters_salesman where SalesmanID>0 ";
             
            if (isset($_POST['SalesmanNameS']) && $_POST['SalesmanNameS']==1) {
                if ($_POST['selectSalesmanFilter']=="0") {
                    $sql .= " and SalesmanName like '%".$_POST['SearchSalesmanName']."%' ";    
                }
                if ($_POST['selectSalesmanFilter']=="Startwith") {
                    $sql .= " and SalesmanName like '".$_POST['SearchSalesmanName']."%' ";    
                }
                if ($_POST['selectSalesmanFilter']=="Endwith") {
                    $sql .= " and SalesmanName like '%".$_POST['SearchSalesmanName']."' ";    
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
            
                $sql .= " and  (date(EntryDate)>=date('".$_POST['FromDate']."') and date(EntryDate)<=date('".$_POST['ToDate']."')) ";    
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
        }
        return json_encode(array("status"=>"success","data"=>$data,"sql"=>$sql));
    }
}
?>