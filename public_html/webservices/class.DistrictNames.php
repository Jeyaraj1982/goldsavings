<?php
class DistrictNames {
    
    function addNew() {
        
        global $mysql;
        
        if (isset($_POST['DistrictNameCode'])) {
            
            if (strlen(trim($_POST['DistrictNameCode']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter District Name Code","div"=>"DistrictNameCode"));    
            } else {
                $dupCode = $mysql->select("select * from _tbl_masters_districtnames where DistrictNameCode='".trim($_POST['DistrictNameCode'])."'");
                if (sizeof($dupCode)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"DistrictNameCode"));    
                }
            }
        
        } else {
            $_POST['DistrictNameCode'] =  SequnceList::updateNumber("_tbl_masters_districtnames");
        }
        
        if (strlen(trim($_POST['DistrictName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter district name","div"=>"DistrictName"));    
        } 
        
        if ($_POST['StateNameID']=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select state name","div"=>"StateNameID"));        
        }
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $dupCode = $mysql->select("select * from _tbl_masters_districtnames where StateNameID='".$_POST['StateNameID']."' and DistrictName='".trim($_POST['DistrictName'])."'");
        if (sizeof($dupCode)>0) {   
            return json_encode(array("status"=>"failure","message"=>"District name is already in ".$StatName[0]['StateName'],"div"=>"DistrictName"));    
        }
     
        $id = $mysql->insert("_tbl_masters_districtnames",array("DistrictNameCode" => $_POST['DistrictNameCode'],
                                                                "DistrictName" => $_POST['DistrictName'],
                                                                "StateNameID" => $StatName[0]['StateNameID'],
                                                                "StateName" => $StatName[0]['StateName'],
                                                                "Remarks"          => $_POST['Remarks'],
                                                                "CreatedOn"        => date("Y-m-d H:i:s"),
                                                                "IsActive"         => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","DistrictNameCode"=>SequnceList::updateNumber("_tbl_masters_districtnames")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
     }
     
     public static function remove() {
         global $mysql;
         
         $customers = $mysql->select("select * from _tbl_masters_customers where DistrictNameID='".$_GET['ID']."'");
         if (sizeof($customers)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name assigned  to ".sizeof($customers)." cusotmer(s)"));    
         }
         
         $administrators = $mysql->select("select * from _tbl_administrators where DistrictNameID='".$_GET['ID']."'");
         if (sizeof($administrators)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name assigned  to ".sizeof($administrators)." administrator(s)"));    
         }
         
         $employees = $mysql->select("select * from _tbl_employees where DistrictNameID='".$_GET['ID']."'");
         if (sizeof($employees)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name assigned  to ".sizeof($employees)." employee(s)"));    
         } 
         
         $branchadmins = $mysql->select("select * from _tbl_masters_users where UserModule='branchadmin' and DistrictNameID='".$_GET['ID']."'");
         if (sizeof($branchadmins)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name assigned to ".sizeof($branchadmins)." branch admin(s)"));    
         }
         
         $branchusers = $mysql->select("select * from _tbl_masters_users where UserModule='branchuser' and DistrictNameID='".$_GET['ID']."'");
         if (sizeof($branchusers)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name assigned to ".sizeof($branchusers)."  branch user(s)"));    
         } 
         
         $subadmins = $mysql->select("select * from _tbl_masters_users where UserModule='subadmin' and DistrictNameID='".$_GET['ID']."'");
         if (sizeof($subadmins)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name assigned to ".sizeof($subadmins)." sub admin(s)"));    
         }
         
         $salesman = $mysql->select("select * from _tbl_masters_salesman where DistrictNameID='".$_GET['ID']."'");
         if (sizeof($salesman)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name assigned  to ".sizeof($salesman)."  salesman(s)"));    
         }
         
         $areanames = $mysql->select("select * from _tbl_master_areanames where DistrictNameID='".$_GET['ID']."'");
         if (sizeof($areanames)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name assigned to ".sizeof($areanames)." area names "));    
         }
         
         $salesman_assigned = $mysql->select("select * from _tbl_salesman_areas where DistrictNameID='".$_GET['ID']."'");
         if (sizeof($areanames)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name allocated to ".sizeof($salesman_assigned)." salesman(s) "));    
         }
         
         //branch
         $branchs = $mysql->select("select * from _tbl_masters_branches where DistrictNameID='".$_GET['ID']."'");
         if (sizeof($branchs)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name assigned  to ".sizeof($branchs)." branch(s)"));    
         }
         
         //company
         $companies = $mysql->select("select * from _tbl_companies where DistrictNameID='".$_GET['ID']."'");
         if (sizeof($companies)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name assigned  to ".sizeof($companies)." compan(y/ies)"));    
         }
          
         //address book
         $addressbook = $mysql->select("select * from _tbl_apps_addressbook where DistrictNameID='".$_GET['ID']."'");
         if (sizeof($addressbook)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name assigned  to ".sizeof($addressbook)." contact(s)"));    
         } 

         $mysql->execute("delete from _tbl_masters_districtnames where DistrictNameID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_districtnames")));
     }

     public static function listAll() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_districtnames order by DistrictName");
         
         $data = $mysql->select("SELECT t1.*, IFNULL(t2.cnt,0) AS  AreaCount 
                                    FROM 
                                        _tbl_masters_districtnames AS t1
                                    LEFT JOIN 
                                        (SELECT DistrictNameID, COUNT(*) AS cnt FROM _tbl_masters_areanames GROUP BY DistrictNameID) AS t2
                                    ON 
                                    t1.DistrictNameID=t2.DistrictNameID");
                                    
         return json_encode(array("status"=>"success","data"=>$data));  
     }
     
      public static function listAllActive() {
         global $mysql;
         if (isset($_GET['StateNameID'])) {
            $data = $mysql->select("select * from _tbl_masters_districtnames where IsActive='1' and StateNameID='".$_GET['StateNameID']."' order by DistrictName ");
         } else { 
            $data = $mysql->select("select * from _tbl_masters_districtnames where IsActive='1' order by DistrictName "); 
         }
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function getDetailsByID($DistrictNameID) {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_districtnames where DistrictNameID='".$DistrictNameID."' order by DistrictName");
         return json_encode(array("status"=>"success","data"=>$data));
     } 
     
     public static function listDistrictNames() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_districtnames where StateNameID='".$_GET['StateNameID']."' order by DistrictName");
         return json_encode(array("status"=>"success","data"=>$data));
     }

     public static function doUpdate() {
         global $mysql;
         
         if (strlen(trim($_POST['DistrictName']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter District Name","div"=>"DistrictName"));    
         } 

         if ($_POST['StateNameID']=="0") {
            return json_encode(array("status"=>"failure","message"=>"Please select statename","div"=>"StateNameID"));        
         }
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
        $dupCode = $mysql->select("select * from _tbl_masters_districtnames where StateNameID='".$_POST['StateNameID']."' and DistrictName='".trim($_POST['DistrictName'])."'");
        if (sizeof($dupCode)>0) {   
            return json_encode(array("status"=>"failure","message"=>"District Name is already in ".$StatName[0]['StateName'],"div"=>"DistrictName"));    
        }
        
         $mysql->execute("update _tbl_masters_districtnames set DistrictName ='".$_POST['DistrictName']."',
                                                                StateNameID  ='".$StatName[0]['StateNameID']."',
                                                                StateName  ='".$StatName[0]['StateName']."',
                                                                Remarks  ='".$_POST['Remarks']."',
                                                                IsActive ='".$_POST['IsActive']."' where DistrictNameID='".$_POST['DistrictNameID']."'");
                                                          
         return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
     }
     
     public static function getData() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_districtnames where DistrictNameID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function listByDistrictNames() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_districtnames where StateNameID='".$_GET['StateNameID']."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
}
?>