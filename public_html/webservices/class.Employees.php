<?php
class Employees {
    
    function addNew() {
        
        global $mysql;
        
        if (strlen(trim($_POST['EmployeeCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Employee Code","div"=>"EmployeeCode"));    
        }
        
        if ($_POST['EmployeeCategoryID']==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Employee Category","div"=>"EmployeeCategoryID"));    
        }
        
        if (strlen(trim($_POST['EmployeeName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Employee Name","div"=>"EmployeeName"));    
        }
        
        if (strlen(trim($_POST['FatherName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Father/Husband Name","div"=>"FatherName"));    
        }
        if (strlen(trim($_POST['DateOfBirth']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Date Of Birth","div"=>"DateOfBirth"));    
        }
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter EmailID","div"=>"EmailID"));    
        } else {
            $email = (trim($_POST["EmailID"]));
            if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid EmailID","div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_employees where EmailID='".trim($_POST['EmailID'])."'");
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
                    return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number","div"=>"MobileNumber"));    
                } else {
                    $dupMobile = $mysql->select("select * from _tbl_employees where MobileNumber='".trim($_POST['MobileNumber'])."'");
                    if (sizeof($dupMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>"Mobile Number is already exists","div"=>"MobileNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Mobile Number","div"=>"MobileNumber"));    
            }
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
        } else {
            if (strlen(trim($_POST['WhatsappNumber']))==10) {
                if (!($_POST['WhatsappNumber']>=6000000000 && $_POST['WhatsappNumber']<=9999999999)) {
                    return json_encode(array("status"=>"failure","message"=>"Please enter valid Whatsapp Number","div"=>"WhatsappNumber"));    
                } else {
                    $dupWaMobile = $mysql->select("select * from _tbl_employees where WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
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
           
           $dupLoginName = $mysql->select("select * from _tbl_employees where LoginUserName='".trim($_POST['LoginUserName'])."'");
           if (sizeof($dupLoginName)>0) {
               return json_encode(array("status"=>"failure","message"=>"LoginUserName is already used","div"=>"LoginUserName"));    
           } 
        }
        
        if (strlen(trim($_POST['LoginPassword']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Login Password","div"=>"LoginPassword"));    
        }
        
        if (strlen(trim($_POST['PancardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Pancard Number","div"=>"PancardNumber"));    
        } else {
            $dupPancard = $mysql->select("select * from _tbl_employees where PancardNumber='".trim($_POST['PancardNumber'])."'");
            if (sizeof($dupPancard)>0) {
                return json_encode(array("status"=>"failure","message"=>"Pancard Number is already used","div"=>"PancardNumber"));    
            }
        }
        
        if (strlen(trim($_POST['AadhaarCardNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter AadhaarCard Number","div"=>"AadhaarCardNumber"));    
        } else {
            $dupAadhaar = $mysql->select("select * from _tbl_employees where AadhaarCardNumber='".trim($_POST['AadhaarCardNumber'])."'");
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
        
        $EmployeeID = $mysql->insert("_tbl_employees",array("EmployeeCode"          => $_POST['EmployeeCode'],
                                                                    "EmployeeName"          => $_POST['EmployeeName'],
                                                                    "ProfilePhoto"          => $ProfilePhoto,
                                                                    "FatherName"            => $_POST['FatherName'],
                                                                    "Gender"                => $_POST['Gender'],
                                                                    "DateOfBirth"           => $_POST['DateOfBirth'],
                                                                    "EmailID"               => trim($_POST['EmailID']),
                                                                    "MobileNumber"          => trim($_POST['MobileNumber']),
                                                                    "WhatsappNumber"        => trim($_POST['WhatsappNumber']),
                                                                    "LoginUserName"         => trim($_POST['LoginUserName']),
                                                                    "LoginPassword"         => $_POST['LoginPassword'],
                                                                    "PancardNumber"         => $_POST['PancardNumber'],
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
         
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","EmployeeCode"=>SequnceList::updateNumber("_tbl_employees")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create".$mysql->error,"div"=>""));
        }
    }
    
    function ListAll() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_employees");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    function ListAllSalesman() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_employees where EmployeeCategoryCode='EMP08'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    function doUpdate() {
        
        global $mysql;
        
        if (strlen(trim($_POST['EmployeeName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Employee Name","div"=>"EmployeeName"));    
        }
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter EmailID","div"=>"EmailID"));    
        }
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter MobileNumber","div"=>"MobileNumber"));    
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
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
        
        $cus_type = json_decode(EmployeeCategories::getDetailsByID($_POST['EmployeeCategoryID']),true);
        $cus_type = $cus_type['data'];
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $id = $mysql->execute("update _tbl_employees set EmployeeName   = '".$_POST['EmployeeName']."',
                                                                 FatherName     = '".$_POST['FatherName']."',
                                                                 Gender         = '".$_POST['Gender']."',
                                                                 DateOfBirth    = '".$_POST['DateOfBirth']."',
                                                                 EmailID        = '".$_POST['EmailID']."',
                                                                 MobileNumber   = '".$_POST['MobileNumber']."',
                                                                 WhatsappNumber = '".$_POST['WhatsappNumber']."',
                                                                 LoginUserName  = '".$_POST['LoginUserName']."',
                                                                 LoginPassword  = '".$_POST['LoginPassword']."',
                                                                 PancardNumber  = '".$_POST['PancardNumber']."',
                                                                 AadhaarCardNumber = '".$_POST['AadhaarCardNumber']."',
                                                                 AddressLine1   = '".$_POST['AddressLine1']."',
                                                                 AddressLine2   = '".$_POST['AddressLine2']."',
                                                                 StateNameID   = '".$StatName[0]['StateNameID']."',
                                                                 StateName   = '".$StatName[0]['StateName']."',
                                                                 DistrictNameID   = '".$DistrictName[0]['DistrictNameID']."',
                                                                 DistrictName   = '".$DistrictName[0]['DistrictName']."',
                                                                 AreaNameID   = '".$AreaName[0]['AreaNameID']."',
                                                                 AreaName   = '".$AreaName[0]['AreaName']."',
                                                                 Remarks   = '".$_POST['Remarks']."',
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
        
        return json_encode(array("status"=>"success","message"=>"successfully updated","div"=>""));
    }
    
    public static function remove() {
        global $mysql;
        $mysql->execute("delete from _tbl_employees where EmployeeID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_employees")));
    }
    
    function listAssignedSalesmanAreas() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_salesman_areas where EmployeeID='".$_GET['EmployeeID']."'");
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
        return json_encode(array("status"=>"success","message"=>"successfully assigned","div"=>""));
    }
    function deactiveSalesmanArea() {
        global $mysql;
        $data = $mysql->execute("update _tbl_salesman_areas set IsActive='0'  where AssignedAreaID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    function activeSalesmanArea() {
        global $mysql;
        $data = $mysql->execute("update _tbl_salesman_areas set IsActive='1'  where AssignedAreaID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    function removeSalesmanArea() {
        global $mysql;
        $data = $mysql->execute("delete from _tbl_salesman_areas set IsActive='1'  where AssignedAreaID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
     public static function listByEmployeeCategory() {   
        global $mysql;
        $data = $mysql->select("select * from _tbl_employees where EmployeeCategoryID='".$_GET['EmployeeCategoryID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
}
?>