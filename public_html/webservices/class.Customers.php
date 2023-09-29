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
        if (strlen(trim($_POST['FatherName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Father/Husband Name","div"=>"FatherName"));    
        }
        
        if (trim($_POST['Gender'])=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select Gender","div"=>"Gender"));    
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
        
        if (isset($_SESSION['User']['SalesmanID'])) {
            
            $_POST['ReferredBy']      = 3;
            $_POST['RefMobileNumber'] = $_SESSION['User']['MobileNumber'];
            $ReferByText = "Salesman";
            $RefID = $_SESSION['User']['SalesmanID'];
            $RefName = $_SESSION['User']['SalesmanName'];
        
        } else {
            
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
                    return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number","div"=>"RefMobileNumber"));    
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
        
        $CustomerID = $mysql->insert("_tbl_masters_customers",array("CustomerCode"              => $_POST['CustomerCode'],
                                                                    "CustomerTypeNameID"        => $cus_type[0]['CustomerTypeNameID'],
                                                                    "CustomerTypeName"          => $cus_type[0]['CustomerTypeName'],
                                                                    "CustomerName"              => $_POST['CustomerName'],
                                                                    "FatherName"                => $_POST['FatherName'],
                                                                    "EmailID"                   => trim($_POST['EmailID']),
                                                                    "MobileNumber"              => trim($_POST['MobileNumber']),
                                                                    "WhatsappNumber"            => trim($_POST['WhatsappNumber']),
                                                                    "Gender"                    => trim($_POST['Gender']),
                                                                    "AlternativeMobileNumber"   => trim($_POST['AlternativeMobileNumber']),
                                                                    "DateOfBirth"               => trim($_POST['DateOfBirth']),
                                                                    "LoginUserName"             => trim($_POST['LoginUserName']),
                                                                    "LoginPassword"             => $_POST['LoginPassword'],
                                                                    "PancardNumber"             => $_POST['PancardNumber'],
                                                                    "AadhaarCardNumber"         => $_POST['AadhaarCardNumber'],
                                                                    "GSTIN"                     => $_POST['GSTIN'],
                                                                    "AddressLine1"              => $_POST['AddressLine1'],
                                                                    "AddressLine2"              => $_POST['AddressLine2'],
                                                                    "StateNameID"               => $StatName[0]['StateNameID'],
                                                                    "StateName"                 => $StatName[0]['StateName'],
                                                                    "DistrictNameID"            => $DistrictName[0]['DistrictNameID'],
                                                                    "DistrictName"              => $DistrictName[0]['DistrictName'],
                                                                    "AreaNameID"                => $AreaName[0]['AreaNameID'],
                                                                    "AreaName"                  => $AreaName[0]['AreaName'],
                                                                    "PinCode"                   => $_POST['PinCode'],
                                                                    
                                                                    "ReferredBy"                => $_POST['ReferredBy'],
                                                                    "ReferByText"               => $ReferByText,
                                                                    "ReferredByID"              => $RefID,
                                                                    "ReferredByName"            => $RefName,
                                                                    "RefMobileNumber"           => $_POST['RefMobileNumber'],

                                                                    "Remarks"                   => $_POST['Remarks'],
                                                                    "CreatedOn"                 => date("Y-m-d H:i:s"),
                                                                    "IsActive"                  => '1'));     
        if ($CustomerID>0) {
            
            $path = "assets/uploads/customers/".$CustomerID;
            if (!is_dir($path)) {
                mkdir("assets/uploads/customers/".$CustomerID, 0777); 
            } 
            return json_encode(array("status"=>"success","message"=>"successfully created".$_FILES["ProfilePhoto"]["tmp_name"],"div"=>"","CustomerCode"=>SequnceList::updateNumber("_tbl_masters_customers")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
    }
    
    function ListAll() {
        global $mysql;
        if (isset($_SESSION['User']['SalesmanID'])) {
            $data = $mysql->select("select * from _tbl_masters_customers WHERE ReferByText='Salesman' and ReferredByID='".$_SESSION['User']['SalesmanID']."'");    
        } else {
            $data = $mysql->select("select * from _tbl_masters_customers");
        }
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
        
        if (strlen(trim($_POST['FatherName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Father/Husband Name","div"=>"FatherName"));    
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

        
          if (strlen(trim($_POST['DateOfBirth']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Date Of Birth","div"=>"DateOfBirth"));    
        }
        
        if (strlen(trim($_POST['Gender']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Gender","div"=>"Gender"));    
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
                        $RefID = $dupMobile[0]['Salesman']; 
                        $RefName = $dupMobile[0]['SalesmanName'];
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
                                                                 FatherName   = '".$_POST['FatherName']."',
                                                                 EmailID        = '".$_POST['EmailID']."',
                                                                 MobileNumber   = '".$_POST['MobileNumber']."',
                                                                 WhatsappNumber = '".$_POST['WhatsappNumber']."',
                                                                 Gender         = '".trim($_POST['Gender'])."',
                                                                 AlternativeMobileNumber         ='".trim($_POST['AlternativeMobileNumber'])."',
                                                                 DateOfBirth         ='". trim($_POST['DateOfBirth'])."',
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
                                                                 
                                                                 ReferredBy             = '".$_POST['ReferredBy']."',
                                                                 ReferByText            = '".$ReferByText."',
                                                                 ReferredByID           = '".$RefID."',
                                                                 ReferredByName         = '".$RefName."',
                                                                 RefMobileNumber        = '".$_POST['RefMobileNumber']."',   
                                                                 
                                                                 Remarks   = '".$_POST['Remarks']."',
                                                                 PinCode        = '".$_POST['PinCode']."',
                                                                 CustomerTypeNameID ='".$cus_type[0]['CustomerTypeNameID']."',
                                                                 CustomerTypeName   ='".$cus_type[0]['CustomerTypeName']."',
                                                                 IsActive       = '".$_POST['IsActive']."' where CustomerID='".$_POST['CustomerID']."'");
        $path = "assets/uploads/customers/".$_POST['CustomerID'];
        
            if (!is_dir($path)) {
                mkdir("assets/uploads/customers/".$_POST['CustomerID'], 0777); 
            }                                         
            
            
        return json_encode(array("status"=>"success","message"=>"successfully updated","div"=>""));
    }
    
     public static function remove() {
         global $mysql;
         $mysql->execute("delete from _tbl_masters_customers where CustomerID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_customers")));
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
             $data = $mysql->select("select * from _tbl_masters_customers WHERE ReferByText='Customer' and ReferredByID='".$_SESSION['User']['CustomerID']."'");    
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
}
?>