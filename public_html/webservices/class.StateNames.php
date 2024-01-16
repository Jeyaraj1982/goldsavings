<?php
class StateNames {
    
    function addNew() {
        
        global $mysql;
        
        if (isset($_POST['StateNameCode'])) {
        if (strlen(trim($_POST['StateNameCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter State Name Code","div"=>"StateNameCode"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_statenames where StateNameCode='".trim($_POST['StateNameCode'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"StateNameCode"));    
            }
        }
        } else {
          $_POST['StateNameCode']= SequnceList::updateNumber("_tbl_masters_statenames"); 
        }
        
        if (strlen(trim($_POST['StateName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter State Name","div"=>"StateName"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_statenames where StateName='".trim($_POST['StateName'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"State Name is already used","div"=>"StateName"));    
            }
        }
        
        $id = $mysql->insert("_tbl_masters_statenames",array("StateNameCode" => $_POST['StateNameCode'],
                                                             "StateName"     => $_POST['StateName'],
                                                             "Remarks"       => $_POST['Remarks'],
                                                             "CreatedOn"     => date("Y-m-d H:i:s"),
                                                             "IsActive"      => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","StateNameCode"=>SequnceList::updateNumber("_tbl_masters_statenames")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
     }
     
     public static function remove() {
         global $mysql;
         
         $customers = $mysql->select("select * from _tbl_masters_customers where StateNameID='".$_GET['ID']."'");
         if (sizeof($customers)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This state name assigned  to ".sizeof($customers)." cusotmer(s)"));    
         }
         
         $administrators = $mysql->select("select * from _tbl_administrators where StateNameID='".$_GET['ID']."'");
         if (sizeof($administrators)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This state name assigned  to ".sizeof($administrators)." administrator(s)"));    
         }
         
         $employees = $mysql->select("select * from _tbl_employees where StateNameID='".$_GET['ID']."'");
         if (sizeof($employees)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This state name assigned  to ".sizeof($employees)." employee(s)"));    
         } 
         
         $branchadmins = $mysql->select("select * from _tbl_masters_users where UserModule='branchadmin' and StateNameID='".$_GET['ID']."'");
         if (sizeof($branchadmins)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This state name assigned to ".sizeof($branchadmins)." branch admin(s)"));    
         }
         
         $branchusers = $mysql->select("select * from _tbl_masters_users where UserModule='branchuser' and StateNameID='".$_GET['ID']."'");
         if (sizeof($branchusers)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This state name assigned to ".sizeof($branchusers)."  branch user(s)"));    
         } 
         
         $subadmins = $mysql->select("select * from _tbl_masters_users where UserModule='subadmin' and StateNameID='".$_GET['ID']."'");
         if (sizeof($subadmins)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This state name assigned to ".sizeof($subadmins)." sub admin(s)"));    
         }
         
         $salesman = $mysql->select("select * from _tbl_masters_salesman where StateNameID='".$_GET['ID']."'");
         if (sizeof($salesman)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This state name assigned  to ".sizeof($salesman)."  salesman(s)"));    
         }
         
         $districtnames = $mysql->select("select * from _tbl_masters_districtnames where StateNameID='".$_GET['ID']."'");
         if (sizeof($districtnames)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This statename assigned  to ".sizeof($districtnames)." district names"));    
         }
         
         $areanames = $mysql->select("select * from _tbl_master_areanames where StateNameID='".$_GET['ID']."'");
         if (sizeof($areanames)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This state name assigned to ".sizeof($areanames)." area names "));    
         }
         
         $salesman_assigned = $mysql->select("select * from _tbl_salesman_areas where StateNameID='".$_GET['ID']."'");
         if (sizeof($areanames)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This state name allocated to ".sizeof($salesman_assigned)." salesman(s) "));    
         }
         
         //branch
         $branchs = $mysql->select("select * from _tbl_masters_branches where StateNameID='".$_GET['ID']."'");
         if (sizeof($branchs)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This state name assigned  to ".sizeof($branchs)." branch(s)"));    
         }
         
         //company
         $companies = $mysql->select("select * from _tbl_companies where StateNameID='".$_GET['ID']."'");
         if (sizeof($companies)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This state name assigned  to ".sizeof($companies)." compan(y/ies)"));    
         }
          
         //address book
         $addressbook = $mysql->select("select * from _tbl_apps_addressbook where StateNameID='".$_GET['ID']."'");
         if (sizeof($addressbook)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This state name assigned  to ".sizeof($addressbook)." contact(s)"));    
         }

         $mysql->execute("delete from _tbl_masters_statenames where StateNameID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_statenames")));
     }

     public static function listAll() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_statenames order by StateName");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function listAllActive() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_statenames where IsActive='1' order by StateName");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function getDetailsByID($StateNameID) {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_statenames where StateNameID='".$StateNameID."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }

     public static function doUpdate() {
         global $mysql;
         if (strlen(trim($_POST['StateName']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter State Name","div"=>"StateName"));    
         } else {
             $dupCode = $mysql->select("select * from _tbl_masters_statenames where StateName='".trim($_POST['StateName'])."' and StateNameID<>'".$_POST['StateNameID']."'");
             if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"State Name is already used","div"=>"StateName"));    
             }
         }
         $mysql->execute("update _tbl_masters_statenames set StateName ='".$_POST['StateName']."',
                                                            Remarks  ='".$_POST['Remarks']."',
                                                            IsActive ='".$_POST['IsActive']."' where StateNameID='".$_POST['StateNameID']."'");
                                                          
         return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
     }
     
     public static function getData() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_statenames where StateNameID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
      
}
?>