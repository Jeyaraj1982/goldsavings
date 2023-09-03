<?php
class DistrictNames {
    
    function addNew() {
        
        global $mysql;
        if (strlen(trim($_POST['DistrictNameCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter District Name Code","div"=>"DistrictNameCode"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_districtnames where DistrictNameCode='".trim($_POST['DistrictNameCode'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"DistrictNameCode"));    
            }
        }
        
        if (strlen(trim($_POST['DistrictName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter District Name","div"=>"DistrictName"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_districtnames where DistrictName='".trim($_POST['DistrictName'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"DistrictName is already used","div"=>"DistrictName"));    
            }
        }
        
        $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
     
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
         $statenames = $mysql->select("select * from _tbl_employees where DistrictNameID='".$_GET['ID']."'");
         if (sizeof($statenames)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name assigned in employees"));    
         }
         $customers = $mysql->select("select * from _tbl_masters_customers where DistrictNameID='".$_GET['ID']."'");
         if (sizeof($statenames)>0) {
            return json_encode(array("status"=>"failure","message"=>"Unable to delete. This district name assigned in cutomers"));    
         } 

         $mysql->execute("delete from _tbl_masters_districtnames where DistrictNameID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_districtnames")));
     }

     public static function listAll() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_districtnames");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function getDetailsByID($DistrictNameID) {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_districtnames where DistrictNameID='".$DistrictNameID."'");
         return json_encode(array("status"=>"success","data"=>$data));
     } 
     
     public static function listDistrictNames() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_districtnames where StateNameID='".$_GET['StateNameID']."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }

     public static function doUpdate() {
         global $mysql;
         if (strlen(trim($_POST['DistrictName']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter District Name","div"=>"DistrictName"));    
         } else {
            $dupCode = $mysql->select("select * from _tbl_masters_districtnames where DistrictName='".trim($_POST['DistrictName'])."' and DistrictNameID<>'".$_POST['DistrictNameID']."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"DistrictName is already used","div"=>"DistrictName"));    
            }
        }
         
         $StatName = json_decode(StateNames::getDetailsByID($_POST['StateNameID']),true);
        $StatName = $StatName['data'];
        
         $mysql->execute("update _tbl_masters_districtnames set DistrictName ='".$_POST['DistrictName']."',
                                                                StateNameID  ='".$StatName[0]['StateNameID']."',
                                                                StateName  ='".$StatName[0]['StateName']."',
                                                                Remarks  ='".$_POST['Remarks']."',
                                                                IsActive ='".$_POST['IsActive']."' where DistrictNameID='".$_POST['DistrictNameID']."'");
                                                          
         return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
     }
}
?>