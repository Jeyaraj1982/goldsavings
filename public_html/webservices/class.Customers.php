<?php
class Customers {
    
    function addNew() {
        
        global $mysql;
        
        if (strlen(trim($_POST['CustomerCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Customer Code","div"=>"CustomerCode"));    
        }
        
        if ($_POST['CustomerTypeNameID']==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Customer Type","div"=>"CustomerTypeNameID"));    
        }
        
        if (strlen(trim($_POST['CustomerName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Customer Name","div"=>"CustomerName"));    
        }
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter EmailID","div"=>"EmailID"));    
        } else {
             
            //if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            if (!checkemail(trim($_POST["EmailID"]))) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid EmailID","div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_masters_customers where EmailID='".trim($_POST['EmailID'])."'");
                if (sizeof($dupEmail)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Email ID is already exists","div"=>"EmailID"));    
                }
            }
        }
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Mobile Number","div"=>"MobileNumber"));    
        } else {
            if (strlen(trim($_POST['MobileNumber']))==10) {
                if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number.","div"=>"MobileNumber"));    
                } else {
                    $dupMobile = $mysql->select("select * from _tbl_masters_customers where MobileNumber='".trim($_POST['MobileNumber'])."'");
                    if (sizeof($dupMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>"Mobile Number is already exists","div"=>"MobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number","div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
           // return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['WhatsappNumber']))==10) {
                if (!($_POST['WhatsappNumber']>=6000000000 && $_POST['WhatsappNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>"Please enter valid Whatsapp Number","div"=>"WhatsappNumber"));    
                } else {
                    $dupWaMobile = $mysql->select("select * from _tbl_masters_customers where WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                    if (sizeof($dupWaMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>"Whatsapp Number is already exists","div"=>"WhatsappNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid MobileNumber","div"=>"MobileNumber"));    
            }
        }

        if (strlen(trim($_POST['LoginUserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Login UserName","div"=>"LoginUserName"));    
        } else {
            
           $space = explode(" ",$_POST['LoginUserName']);
           if (sizeof($space)>1) {
               return json_encode(array("status"=>"failure","message"=>"Space Not allowed in Login UserName","div"=>"LoginUserName"));    
           }
           $dupLoginName = $mysql->select("select * from _tbl_masters_customers where LoginUserName='".trim($_POST['LoginUserName'])."'");
           if (sizeof($dupLoginName)>0) {
               return json_encode(array("status"=>"failure","message"=>"Login UserName is already used","div"=>"LoginUserName"));    
           } 
        }
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Login Password","div"=>"LoginPassword"));    
        }
        
        if (strlen(trim($_POST['PancardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Pancard Number","div"=>"PancardNumber"));    
        } else {
            $dupPancard = $mysql->select("select * from _tbl_masters_customers where PancardNumber='".trim($_POST['PancardNumber'])."'");
            if (sizeof($dupPancard)>0) {
                return json_encode(array("status"=>"failure","message"=>"Pancard Number is already used","div"=>"PancardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AadhaarCardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter AadhaarCard Number","div"=>"AadhaarCardNumber"));    
        } else {
            $dupAadhaar = $mysql->select("select * from _tbl_masters_customers where AadhaarCardNumber='".trim($_POST['AadhaarCardNumber'])."'");
            if (sizeof($dupAadhaar)>0) {
                return json_encode(array("status"=>"failure","message"=>"Aadhaar Card Number is already used","div"=>"AadhaarCardNumber"));    
            }
        }
        
         if (strlen(trim($_POST['GSTIN']))>0) {
             $dupGSTIN = $mysql->select("select * from _tbl_masters_customers where GSTIN='".trim($_POST['GSTIN'])."'");
             if (sizeof($dupGSTIN)>0) {
                return json_encode(array("status"=>"failure","message"=>"GSTIN is already used","div"=>"GSTIN"));    
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
        }
        
        if (trim($_POST['ReferredBy'])==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select ReferredBy","div"=>"ReferredBy"));    
        }          
        
        if (strlen(trim($_POST['RefMobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Mobile Number","div"=>"RefMobileNumber"));    
        } else {
            if (strlen(trim($_POST['RefMobileNumber']))==10) {
                if (!($_POST['RefMobileNumber']>=6000000000 && $_POST['RefMobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number.","div"=>"RefMobileNumber"));    
                } else {
                    if ($_POST['ReferredBy']==1) {
                        $dupMobile = $mysql->select("select * from _tbl_masters_customers where MobileNumber='".trim($_POST['RefMobileNumber'])."'");
                        if (sizeof($dupMobile)==0) {
                            return json_encode(array("status"=>"failure","message"=>"Customer's Mobile Number is not found","div"=>"RefMobileNumber"));    
                        }
                    }
                    
                    if ($_POST['ReferredBy']==2) {
                        $dupMobile = $mysql->select("select * from _tbl_employees where MobileNumber='".trim($_POST['RefMobileNumber'])."'");
                        if (sizeof($dupMobile)==0) {
                            return json_encode(array("status"=>"failure","message"=>"Employee's Mobile Number is not found","div"=>"RefMobileNumber"));    
                        }
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number","div"=>"MobileNumber"));    
            }
        }
        
        $ProfilePhoto=""; 
        $PanCardAttachment="";
        $AadhaarCardAttachment = "";
                                            
        $cus_type = json_decode(CustomerTypes::getDetailsByID($_POST['CustomerTypeNameID']),true);
        $cus_type = $cus_type['data'];
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $CustomerID = $mysql->insert("_tbl_masters_customers",array("CustomerCode"          => $_POST['CustomerCode'],
                                                                    "CustomerTypeNameID"    => $cus_type[0]['CustomerTypeNameID'],
                                                                    "CustomerTypeName"      => $cus_type[0]['CustomerTypeName'],
                                                                    "CustomerName"          => $_POST['CustomerName'],
                                                                    "ProfilePhoto"          => $ProfilePhoto,
                                                                    "BusinessName"          => $_POST['BusinessName'],
                                                                    "EmailID"               => trim($_POST['EmailID']),
                                                                    "MobileNumber"          => trim($_POST['MobileNumber']),
                                                                    "WhatsappNumber"        => trim($_POST['WhatsappNumber']),
                                                                    "LoginUserName"         => trim($_POST['LoginUserName']),
                                                                    "LoginPassword"         => $_POST['LoginPassword'],
                                                                    "PancardNumber"         => $_POST['PancardNumber'],
                                                                    "PanCardAttachment"     => $PanCardAttachment,
                                                                    "AadhaarCardNumber"     => $_POST['AadhaarCardNumber'],
                                                                    "AadhaarCardAttachment" => $AadhaarCardAttachment,
                                                                    "GSTIN"                 => $_POST['GSTIN'],
                                                                    "AddressLine1"          => $_POST['AddressLine1'],
                                                                    "AddressLine2"          => $_POST['AddressLine2'],
                                                                    "StateNameID"           => $StatName[0]['StateNameID'],
                                                                    "StateName"             => $StatName[0]['StateName'],
                                                                    "DistrictNameID"        => $DistrictName[0]['DistrictNameID'],
                                                                    "DistrictName"          => $DistrictName[0]['DistrictName'],
                                                                    "AreaNameID"            => $AreaName[0]['AreaNameID'],
                                                                    "AreaName"              => $AreaName[0]['AreaName'],
                                                                    "PinCode"               => $_POST['PinCode'],
                                                                    "ReferredBy"            => $_POST['ReferredBy'],
                                                                    "RefMobileNumber"       => $_POST['RefMobileNumber'],
                                                                    "Remarks"               => $_POST['Remarks'],
                                                                    "CreatedOn"             => date("Y-m-d H:i:s"),
                                                                    "IsActive"              => '1'));     
        if ($CustomerID>0) {
            
            $path = "assets/uploads/customers/".$CustomerID;
            if (!is_dir($path)) {
                mkdir("assets/uploads/customers/".$CustomerID, 0777); 
            } 
            
            $ProfilePhoto=time()."_".strtolower($_FILES["ProfilePhoto"]['name']);
            if (move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"],$path."/".$ProfilePhoto)) {
                $mysql->execute("update _tbl_masters_customers set ProfilePhoto='".$ProfilePhoto."' where CustomerID='".$CustomerID."'");
            } 
            
            $PanCardAttachment=time()."_".strtolower($_FILES["PanCardAttachment"]['name']);
            if (move_uploaded_file($_FILES["PanCardAttachment"]["tmp_name"],$path."/".$PanCardAttachment)) {
                $mysql->execute("update _tbl_masters_customers set PanCardAttachment='".$PanCardAttachment."' where CustomerID='".$CustomerID."'");
            }                                                 
            
            $AadhaarCardAttachment=time()."_".strtolower($_FILES["AadhaarCardAttachment"]['name']);
            if (move_uploaded_file($_FILES["AadhaarCardAttachment"]["tmp_name"],$path."/".$AadhaarCardAttachment)) {
                $mysql->execute("update _tbl_masters_customers set AadhaarCardAttachment='".$AadhaarCardAttachment."' where CustomerID='".$CustomerID."'");
            } 
         
            return json_encode(array("status"=>"success","message"=>"successfully created".$_FILES["ProfilePhoto"]["tmp_name"],"div"=>"","CustomerCode"=>SequnceList::updateNumber("_tbl_masters_customers")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
    }
    
    function ListAll() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_customers");
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
            return json_encode(array("status"=>"failure","message"=>"Please select Customer Type","div"=>"CustomerTypeNameID"));    
        }
        
        if (strlen(trim($_POST['CustomerName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Customer Name","div"=>"CustomerName"));    
        }
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter EmailID","div"=>"EmailID"));    
        } else {
             
            //if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
            if (!checkemail(trim($_POST["EmailID"]))) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid EmailID","div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_masters_customers where CustomerID<>'".$_POST['CustomerID']."' and EmailID='".trim($_POST['EmailID'])."'");
                if (sizeof($dupEmail)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Email ID is already exists","div"=>"EmailID"));    
                }
            }
        }
                                               
        
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter MobileNumber","div"=>"MobileNumber"));    
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
            //return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        }

        if (strlen(trim($_POST['LoginUserName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Login UserName","div"=>"LoginUserName"));    
        } else {
            $space = explode(" ",$_POST['LoginUserName']);
           if (sizeof($space)>1) {
               return json_encode(array("status"=>"failure","message"=>"Space Not allowed in Login UserName","div"=>"LoginUserName"));    
           }
        }
        
        
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Login Password","div"=>"LoginPassword"));    
        }
        
        if (strlen(trim($_POST['PancardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Pancard Number","div"=>"PancardNumber"));    
        }
        
        if (strlen(trim($_POST['AadhaarCardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter AadhaarCard Number","div"=>"AadhaarCardNumber"));    
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
        }
        
        if (trim($_POST['ReferredBy'])==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select ReferredBy","div"=>"ReferredBy"));    
        }          
        
        if (strlen(trim($_POST['RefMobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Mobile Number","div"=>"RefMobileNumber"));    
        } else {
            if (strlen(trim($_POST['RefMobileNumber']))==10) {
                if (!($_POST['RefMobileNumber']>=6000000000 && $_POST['RefMobileNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number.","div"=>"RefMobileNumber"));    
                } else {
                    if ($_POST['ReferredBy']==1) {
                        $dupMobile = $mysql->select("select * from _tbl_masters_customers where MobileNumber='".trim($_POST['RefMobileNumber'])."'");
                        if (sizeof($dupMobile)==0) {
                            return json_encode(array("status"=>"failure","message"=>"Customer's Mobile Number is not found","div"=>"RefMobileNumber"));    
                        }
                    }
                    
                    if ($_POST['ReferredBy']==2) {
                        $dupMobile = $mysql->select("select * from _tbl_employees where MobileNumber='".trim($_POST['RefMobileNumber'])."'");
                        if (sizeof($dupMobile)==0) {
                            return json_encode(array("status"=>"failure","message"=>"Employee's Mobile Number is not found","div"=>"RefMobileNumber"));    
                        }
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number","div"=>"MobileNumber"));    
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
                                                                 BusinessName   = '".$_POST['BusinessName']."',
                                                                 EmailID        = '".$_POST['EmailID']."',
                                                                 MobileNumber   = '".$_POST['MobileNumber']."',
                                                                 WhatsappNumber = '".$_POST['WhatsappNumber']."',
                                                                 LoginUserName = '".$_POST['LoginUserName']."',
                                                                 LoginPassword = '".$_POST['LoginPassword']."',
                                                                 PancardNumber = '".$_POST['PancardNumber']."',
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
                                                                 ReferredBy   = '".$_POST['ReferredBy']."',
                                                                 RefMobileNumber   = '".$_POST['RefMobileNumber']."',
                                                                 Remarks   = '".$_POST['Remarks']."',
                                                                 PinCode        = '".$_POST['PinCode']."',
                                                                 
                                                                 CustomerTypeNameID ='".$cus_type[0]['CustomerTypeNameID']."',
                                                                 CustomerTypeName   ='".$cus_type[0]['CustomerTypeName']."',
                                                                 IsActive       = '".$_POST['IsActive']."' where CustomerID='".$_POST['CustomerID']."'");
        $path = "assets/uploads/customers/".$_POST['CustomerID'];
        
            if (!is_dir($path)) {
                mkdir("assets/uploads/customers/".$_POST['CustomerID'], 0777); 
            }                                         
            
            $ProfilePhoto=time()."_".strtolower($_FILES["ProfilePhoto"]['name']);
            if (move_uploaded_file($_FILES["ProfilePhoto"]["tmp_name"],$path."/".$ProfilePhoto)) {
                $mysql->execute("update _tbl_masters_customers set ProfilePhoto='".$ProfilePhoto."' where CustomerID='".$_POST['CustomerID']."'");
            } 
            
            $PanCardAttachment=time()."_".strtolower($_FILES["PanCardAttachment"]['name']);
            if (move_uploaded_file($_FILES["PanCardAttachment"]["tmp_name"],$path."/".$PanCardAttachment)) {
                $mysql->execute("update _tbl_masters_customers set PanCardAttachment='".$PanCardAttachment."' where CustomerID='".$_POST['CustomerID']."'");
            }
            
            $AadhaarCardAttachment=time()."_".strtolower($_FILES["AadhaarCardAttachment"]['name']);
            if (move_uploaded_file($_FILES["AadhaarCardAttachment"]["tmp_name"],$path."/".$AadhaarCardAttachment)) {
                $mysql->execute("update _tbl_masters_customers set AadhaarCardAttachment='".$AadhaarCardAttachment."' where CustomerID='".$_POST['CustomerID']."'");
            } 
        
        return json_encode(array("status"=>"success","message"=>"successfully updated","div"=>""));
    }
    
     public static function remove() {
         global $mysql;
         //$data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['ID']."'");
         //if (sizeof($data)==0) {
            $mysql->execute("delete from _tbl_masters_customers where CustomerID='".$_GET['ID']."'");
            return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_customers")));
         //} else {
           // return json_encode(array("status"=>"failure","message"=>"already assigned to contacts."));
         //}
     }
     
      public static function getDetailsByID($CustomerID) {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$CustomerID."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
}
?>