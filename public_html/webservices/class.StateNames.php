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
                return json_encode(array("status"=>"failure","message"=>"StateName is already used","div"=>"StateName"));    
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
         $statenames = $mysql->select("select * from _tbl_employees where StateNameID='".$_GET['ID']."'");
         if (sizeof($statenames)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This statename assigned in some employees"));    
         }
         $customers = $mysql->select("select * from _tbl_masters_customers where StateNameID='".$_GET['ID']."'");
         if (sizeof($statenames)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This statename assigned in some cusotmer cutomers"));    
         } 
         
         $districtnames = $mysql->select("select * from _tbl_master_districtnames where StateNameID='".$_GET['ID']."'");
         if (sizeof($districtnames)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This statename assigned in some district names"));    
         }
         
         $areanames = $mysql->select("select * from _tbl_master_areanames where StateNameID='".$_GET['ID']."'");
         if (sizeof($areanames)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This statename assigned in some area names "));    
         }

         $mysql->execute("delete from _tbl_masters_statenames where StateNameID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_statenames")));
     }

     public static function listAll() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_statenames");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function listAllActive() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_statenames where IsActive='1'");
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
                return json_encode(array("status"=>"failure","message"=>"StateName is already used","div"=>"StateName"));    
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