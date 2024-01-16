<?php
class RelationNames {
    
    function addNew() {
        
        global $mysql;
        
        if (isset($_POST['RelationNameCode'])) {
        if (strlen(trim($_POST['RelationNameCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Relation Name Code","div"=>"RelationNameCode"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_relationnames where RelationNameCode='".trim($_POST['RelationNameCode'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"RelationNameCode"));    
            }
        }
        } else {
          $_POST['RelationNameCode']= SequnceList::updateNumber("_tbl_masters_relationnames"); 
        }
        
        if (strlen(trim($_POST['RelationName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Relation Name","div"=>"RelationName"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_relationnames where RelationName='".trim($_POST['RelationName'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Relation Name is already used","div"=>"RelationName"));    
            }
        }
        
        $id = $mysql->insert("_tbl_masters_relationnames",array("RelationNameCode" => $_POST['RelationNameCode'],
                                                             "RelationName"     => $_POST['RelationName'],
                                                             "Remarks"       => $_POST['Remarks'],
                                                             "CreatedOn"     => date("Y-m-d H:i:s"),
                                                             "IsActive"      => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","RelationNameCode"=>SequnceList::updateNumber("_tbl_masters_relationnames")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
     }
     
     public static function remove() {
         global $mysql;
         $data_nominees = $mysql->select("select * from  _tbl_customers_nominees where RelationNameID='".$_GET['ID']."'");
         if (sizeof($data_nominees)==0) {
            $mysql->execute("delete from _tbl_masters_relationnames where RelationNameID='".$_GET['ID']."'");
            return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_relationnames")));
         } else {
             return json_encode(array("status"=>"failure","message"=>"Error: unable to delete relation name. Reason: Relation Name has assigned ".(sizeof($data_exists))." customer(s)","div"=>""));
         }
     }

     public static function listAll() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_relationnames");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function listAllActive() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_relationnames where IsActive='1'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function getDetailsByID($RelationNameID) {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_relationnames where RelationNameID='".$RelationNameID."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }

     public static function doUpdate() {
         global $mysql;
         if (strlen(trim($_POST['RelationName']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter Relation Name","div"=>"RelationName"));    
         } else {
             $dupCode = $mysql->select("select * from _tbl_masters_relationnames where RelationName='".trim($_POST['RelationName'])."' and RelationNameID<>'".$_POST['RelationNameID']."'");
             if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Relation Name is already used","div"=>"RelationName"));    
             }
         }
         $mysql->execute("update _tbl_masters_relationnames set RelationName ='".$_POST['RelationName']."',
                                                            Remarks  ='".$_POST['Remarks']."',
                                                            IsActive ='".$_POST['IsActive']."' where RelationNameID='".$_POST['RelationNameID']."'");
                                                          
         return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
     }
     
     public static function getData() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_relationnames where RelationNameID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
      
}
?>