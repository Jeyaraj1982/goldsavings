<?php
class FileExtensions {
    
    function addNew() {
        
        global $mysql;
        if (strlen(trim($_POST['ExtensionCode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Extension Code","div"=>"ExtensionCode"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_file_extensions where ExtensionCode='".trim($_POST['ExtensionCode'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"ExtensionCode"));    
            }
        }
        
        if (strlen(trim($_POST['FileExtension']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter File Extension","div"=>"FileExtension"));    
        }  else {
            $dupCode = $mysql->select("select * from _tbl_masters_file_extensions where FileExtension='".trim(strtolower($_POST['FileExtension']))."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"File Extension is already used","div"=>"FileExtension"));    
            }
        }
     
        $id = $mysql->insert("_tbl_masters_file_extensions",array("ExtensionCode" => $_POST['ExtensionCode'],
                                                            "FileExtension" => trim(strtolower($_POST['FileExtension'])),
                                                            "Remarks"          => $_POST['Remarks'],
                                                            "CreatedOn"        => date("Y-m-d H:i:s"),
                                                            "IsActive"         => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","ExtensionCode"=>SequnceList::updateNumber("_tbl_masters_file_extensions")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>"FileExtension"));
        }
     }            
     
      public static function remove() {
         global $mysql;
         
         $mysql->execute("delete from _tbl_masters_file_extensions where FileExtensionID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_file_extensions")));
     }

     public static function listAll() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_masters_file_extensions");
         return json_encode(array("status"=>"success","data"=>$data));
     }

     public static function doUpdate() {
         global $mysql;
         if (strlen(trim($_POST['FileExtension']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter File Extension","div"=>"FileExtension"));    
         }  else {
            $dupCode = $mysql->select("select * from _tbl_masters_file_extensions where FileExtension='".trim(strtolower($_POST['FileExtension']))."' and FileExtensionID<>'".$_POST['FileExtensionID']."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"File Extension is already used","div"=>"FileExtension"));    
            }
        }
         $mysql->execute("update _tbl_masters_file_extensions set FileExtension ='".trim(strtolower($_POST['FileExtension']))."',
                                                            Remarks  ='".$_POST['Remarks']."',
                                                            IsActive ='".$_POST['IsActive']."' where FileExtensionID='".$_POST['FileExtensionID']."'");
                                                          
         return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
     }

}
?>