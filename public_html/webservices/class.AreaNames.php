<?php

class AreaNames {
    
    public static function addNew() {
        
        global $mysql;
        if (isset($_POST['AreaNameCode'])) {
            if (strlen(trim($_POST['AreaNameCode']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Area Name Code","div"=>"AreaNameCode"));    
            } else {
                $dupCode = $mysql->select("select * from _tbl_masters_areanames where AreaNameCode='".trim($_POST['AreaNameCode'])."'");
                if (sizeof($dupCode)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"AreaNameCode"));    
                }
            } 
        } else {
            $_POST['AreaNameCode'] = SequnceList::updateNumber("_tbl_masters_areanames");
        }
        
        if (strlen(trim($_POST['AreaName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Area Name","div"=>"AreaName"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_areanames where AreaName='".trim($_POST['AreaName'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Area Name is already used","div"=>"AreaName"));    
            }
        }
     
        if ($_POST['StateNameID']=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select state name","div"=>"StateNameID"));        
        }
        
           if ($_POST['DistrictNameID']=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select district name","div"=>"DistrictNameID"));        
        }
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
        $DistrictName = $DistrictName['data'];
        
        $id = $mysql->insert("_tbl_masters_areanames",array("AreaNameCode"   => $_POST['AreaNameCode'],
                                                            "AreaName"       => $_POST['AreaName'],
                                                            "StateNameID"    => $StatName[0]['StateNameID'],
                                                            "StateName"      => $StatName[0]['StateName'],
                                                            "DistrictNameID" => $DistrictName[0]['DistrictNameID'],
                                                            "DistrictName"   => $DistrictName[0]['DistrictName'],
                                                            "Remarks"        => $_POST['Remarks'],
                                                            "CreatedOn"      => date("Y-m-d H:i:s"),
                                                            "IsActive"       => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","AreaNameCode"=>SequnceList::updateNumber("_tbl_masters_areanames")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
     }
     
    public static function remove() {
         global $mysql;
         
         $customers = $mysql->select("select * from _tbl_masters_customers where AreaNameID='".$_GET['ID']."'");
         if (sizeof($customers)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This area name assigned  to ".sizeof($customers)." cusotmer(s)"));    
         }
         
         $administrators = $mysql->select("select * from _tbl_administrators where AreaNameID='".$_GET['ID']."'");
         if (sizeof($administrators)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This area name assigned  to ".sizeof($administrators)." administrator(s)"));    
         }
         
         $employees = $mysql->select("select * from _tbl_employees where AreaNameID='".$_GET['ID']."'");
         if (sizeof($employees)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This area name assigned  to ".sizeof($employees)." employee(s)"));    
         } 
         
         $branchadmins = $mysql->select("select * from _tbl_masters_users where UserModule='branchadmin' and AreaNameID='".$_GET['ID']."'");
         if (sizeof($branchadmins)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This area name assigned to ".sizeof($branchadmins)." branch admin(s)"));    
         }
         
         $branchusers = $mysql->select("select * from _tbl_masters_users where UserModule='branchuser' and AreaNameID='".$_GET['ID']."'");
         if (sizeof($branchusers)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This area name assigned to ".sizeof($branchusers)."  branch user(s)"));    
         } 
         
         $subadmins = $mysql->select("select * from _tbl_masters_users where UserModule='subadmin' and AreaNameID='".$_GET['ID']."'");
         if (sizeof($subadmins)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This area name assigned to ".sizeof($subadmins)." sub admin(s)"));    
         }
         
         $salesman = $mysql->select("select * from _tbl_masters_salesman where AreaNameID='".$_GET['ID']."'");
         if (sizeof($salesman)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This area name assigned  to ".sizeof($salesman)."  salesman(s)"));    
         }
         
         $salesman_assigned = $mysql->select("select * from _tbl_salesman_areas where AreaNameID='".$_GET['ID']."'");
         if (sizeof($areanames)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This area name allocated to ".sizeof($salesman_assigned)." salesman(s) "));    
         }
         
         //branch
         $branchs = $mysql->select("select * from _tbl_masters_branches where AreaNameID='".$_GET['ID']."'");
         if (sizeof($branchs)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This area name assigned  to ".sizeof($branchs)." branch(s)"));    
         }
         
         //company
         $companies = $mysql->select("select * from _tbl_companies where AreaNameID='".$_GET['ID']."'");
         if (sizeof($companies)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This area name assigned  to ".sizeof($companies)." compan(y/ies)"));    
         }
          
         //address book
         $addressbook = $mysql->select("select * from _tbl_apps_addressbook where AreaNameID='".$_GET['ID']."'");
         if (sizeof($addressbook)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This area name assigned  to ".sizeof($addressbook)." contact(s)"));    
         }
       
         $mysql->execute("delete from _tbl_masters_areanames where AreaNameID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_areanames")));
     }

    public static function listAll() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_areanames order by AreaName");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function listAllActive() {
        global $mysql;
        if (isset($_GET['DistrictNameID'])) {
            $data = $mysql->select("select * from _tbl_masters_areanames where IsActive='1' and DistrictNameID='".$_GET['DistrictNameID']."' order by AreaName");
        } else {
            $data = $mysql->select("select * from _tbl_masters_areanames where IsActive='1' order by AreaName");
        }
        return json_encode(array("status"=>"success","data"=>$data));
    }
     
    public static function ListAreaNames() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_areanames where StateNameID='".$_GET['StateNameID']."' and DistrictNameID='".$_GET['DistrictNameID']."' order by AreaName");
        return json_encode(array("status"=>"success","data"=>$data));
    }
     
     public static function getDetailsByID($AreaNameID) {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_areanames where AreaNameID='".$AreaNameID."'");
         return json_encode(array("status"=>"success","data"=>$data));
     } 

     public static function doUpdate() {
         
         global $mysql;
         if (strlen(trim($_POST['AreaName']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter Area Name","div"=>"AreaName"));    
         }  
         
         if ($_POST['StateNameID']=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select state name","div"=>"StateNameID"));        
         }
        
         if ($_POST['DistrictNameID']=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select district name","div"=>"DistrictNameID"));        
         } 
         
         $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
         $StatName = $StatName['data'];
         
         $DistrictName = json_decode(DistrictNames::getDetailsByID($_POST['DistrictNameID']),true);
         $DistrictName = $DistrictName['data'];
         
         $dupCode = $mysql->select("select * from _tbl_masters_areanames where StateNameID='".$_POST['StateNameID']."' and DistrictNameID='".$_POST['DistrictNameID']."' and AreaName='".$_POST['AreaName']."' and AreaNameID<>'".$_POST['AreaNameID']."'");
         if (sizeof($dupCode)>0) {
            return json_encode(array("status"=>"failure","message"=>"AreaName is already used in ".$DistrictName[0]['DistrictName'].", ".$StatName[0]['StateName'],"div"=>"AreaName"));    
         }      
         
         $mysql->execute("update _tbl_masters_areanames set AreaName        ='".$_POST['AreaName']."',
                                                            StateNameID     ='".$StatName[0]['StateNameID']."',
                                                            StateName       ='".$StatName[0]['StateName']."',
                                                            DistrictNameID  ='".$DistrictName[0]['DistrictNameID']."',
                                                            DistrictName    ='".$DistrictName[0]['DistrictName']."',
                                                            Remarks         ='".$_POST['Remarks']."',
                                                            IsActive        ='".$_POST['IsActive']."' where AreaNameID='".$_POST['AreaNameID']."'");
                                                             
         return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
     }
     
     public static function getData() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_areanames where AreaNameID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function listByAreaNames() {
         global $mysql;                                             
         $data = $mysql->select("select * from _tbl_masters_areanames where DistrictNameID='".$_GET['DistrictNameID']."' order by AreaName");
         return json_encode(array("status"=>"success","data"=>$data));
     }
}
?>