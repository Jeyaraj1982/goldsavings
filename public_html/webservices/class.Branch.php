<?php
class Branch {
    
    function addNew() {
        
        global $mysql;
        
        if (strlen(trim($_POST['BranchCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Branch Code","div"=>"BranchCode"));    
        } else {
             $dup = $mysql->select("select * from _tbl_masters_branches where BranchCode='".trim($_POST['BranchCode'])."'");
             if (sizeof($dup)>0) {
                 return json_encode(array("status"=>"failure","message"=>"Branch Code already exists","div"=>"BranchCode"));    
             }
        }
        
        if (strlen(trim($_POST['EntryDate']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Date","div"=>"EntryDate"));    
        }
        
        if (strlen(trim($_POST['BranchName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Branch Name","div"=>"BranchName"));    
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
                            
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Email ID","div"=>"EmailID"));    
        } else {
            $email = (trim($_POST["EmailID"]));
            if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid Email ID","div"=>"EmailID"));    
            } else {
                $dupEmail = $mysql->select("select * from _tbl_branchs where EmailID='".trim($_POST['EmailID'])."'");
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
                    $dupMobile = $mysql->select("select * from _tbl_masters_branches where MobileNumber='".trim($_POST['MobileNumber'])."'");
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
                    $dupWaMobile = $mysql->select("select * from _tbl_masters_branches where WhatsappNumber='".trim($_POST['WhatsappNumber'])."'");
                    if (sizeof($dupWaMobile)>0) {
                        return json_encode(array("status"=>"failure","message"=>"Whatsapp Number is already exists","div"=>"WhatsappNumber"));    
                    }
                }
            } else {
                return json_encode(array("status"=>"failure","message"=>"Please enter valid MobileNumber","div"=>"MobileNumber"));    
            }
        }
        
       
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $BranchID = $mysql->insert("_tbl_masters_branches",array("BranchCode"     => $_POST['BranchCode'],
                                                         "EntryDate"      => $_POST['EntryDate'],
                                                         "BranchName"     => $_POST['BranchName'],
                                                                          
                                                         "EmailID"        => trim($_POST['EmailID']),
                                                         "MobileNumber"   => trim($_POST['MobileNumber']),
                                                         "WhatsappNumber" => trim($_POST['WhatsappNumber']),
                                                         
                                                         "AddressLine1"   => $_POST['AddressLine1'],
                                                         "AddressLine2"   => $_POST['AddressLine2'],
                                                         "StateNameID"    => $StatName[0]['StateNameID'],
                                                         "StateName"      => $StatName[0]['StateName'],
                                                         "DistrictNameID" => $DistrictName[0]['DistrictNameID'],
                                                         "DistrictName"   => $DistrictName[0]['DistrictName'],
                                                         "AreaNameID"     => $AreaName[0]['AreaNameID'],
                                                         "AreaName"       => $AreaName[0]['AreaName'],
                                                         "PinCode"        => $_POST['PinCode'],
                                                         "Remarks"        => $_POST['Remarks'],
                                                         "CreatedOn"      => date("Y-m-d H:i:s"),
                                                         "IsActive"       => '1'));     
        if ($BranchID>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","BranchCode"=>SequnceList::updateNumber("_tbl_masters_branches")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create".$mysql->error,"div"=>""));
        }
    }
    
    function ListAll() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_branches");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    function doUpdate() {
        
        global $mysql;
        
         if (strlen(trim($_POST['EntryDate']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select Date","div"=>"EntryDate"));    
        }
        
        if (strlen(trim($_POST['BranchName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Branch Name","div"=>"BranchName"));    
        }
        
        if (strlen(trim($_POST['EmailID']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Email ID","div"=>"EmailID"));    
        }
        
        if (strlen(trim($_POST['MobileNumber']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter MobileNumber","div"=>"MobileNumber"));    
        }
        
        if (strlen(trim($_POST['WhatsappNumber']))==0) {
            //return json_encode(array("status"=>"failure","message"=>"Please enter Whatsapp Number","div"=>"WhatsappNumber"));    
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
        
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $AreaName = json_decode(AreaNames::getDetailsByID($_POST['AreaNameID']),true);
        $AreaName = $AreaName['data'];
        
        $id = $mysql->execute("update _tbl_masters_branches set BranchName = '".$_POST['BranchName']."',
                                                        EntryDate = '".$_POST['EntryDate']."',
                                                        EmailID = '".$_POST['EmailID']."',
                                                        MobileNumber = '".$_POST['MobileNumber']."',
                                                        WhatsappNumber = '".$_POST['WhatsappNumber']."',
                                                        AddressLine1 = '".$_POST['AddressLine1']."',
                                                        AddressLine2 = '".$_POST['AddressLine2']."',
                                                        StateNameID = '".$StatName[0]['StateNameID']."',
                                                        StateName = '".$StatName[0]['StateName']."',
                                                        DistrictNameID = '".$DistrictName[0]['DistrictNameID']."',
                                                        DistrictName = '".$DistrictName[0]['DistrictName']."',
                                                        AreaNameID = '".$AreaName[0]['AreaNameID']."',
                                                        AreaName = '".$AreaName[0]['AreaName']."',
                                                        Remarks = '".$_POST['Remarks']."',
                                                        PinCode = '".$_POST['PinCode']."',
                                                        IsActive = '".$_POST['IsActive']."' where BranchID='".$_POST['BranchID']."'");
        
        return json_encode(array("status"=>"success","message"=>"successfully updated","div"=>""));
    }
    
    public static function remove() {
        global $mysql;
        $mysql->execute("delete from _tbl_masters_branches where BranchID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_branches")));
    }
}
?>