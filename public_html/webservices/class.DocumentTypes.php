<?php
class DocumentTypes {
    
    public static function addNew() {
        
        global $mysql;
        if (isset($_POST['DocumentTypeCode'])) {
            if (strlen(trim($_POST['DocumentTypeCode']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Document Type Code","div"=>"DocumentTypeCode"));    
            } else {
                $dupCode = $mysql->select("select * from _tbl_masters_documenttypes where DocumentTypeCode='".trim($_POST['DocumentTypeCode'])."'");
                if (sizeof($dupCode)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"DocumentTypeCode"));    
                }
            }
        } else {
            $_POST['DocumentTypeCode'] =  SequnceList::updateNumber("_tbl_masters_documenttypes");
        }
        
        if (strlen(trim($_POST['DocumentTypeName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Document Type Name","div"=>"DocumentTypeName"));    
        }  else {
            $dupCode = $mysql->select("select * from _tbl_masters_documenttypes where DocumentTypeName='".trim($_POST['DocumentTypeName'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"DocumentTypeName is already used","div"=>"DocumentTypeName"));    
            }
        }
     
        $id = $mysql->insert("_tbl_masters_documenttypes",array("DocumentTypeCode" => $_POST['DocumentTypeCode'],
                                                                "DocumentTypeName" => $_POST['DocumentTypeName'],
                                                                "DocumentTypeShortDescription"          => $_POST['DocumentTypeShortDescription'],
                                                                "Remarks"          => $_POST['Remarks'],
                                                                "CreatedOn"        => date("Y-m-d H:i:s"),
                                                                "IsActive"         => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","DocumentTypeCode"=>SequnceList::updateNumber("_tbl_masters_documenttypes")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
    }
    
    public static function doUpdate() {
        
        global $mysql;
        
        if (strlen(trim($_POST['DocumentTypeName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Document Type Name","div"=>"CustomerTypeName"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_documenttypes where DocumentTypeName='".trim($_POST['DocumentTypeName'])."' and DocumentTypeID<>'".$_POST['DocumentTypeID']."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"DocumentTypeName is already used","div"=>"DocumentTypeName"));    
            }
        }
        
        $mysql->execute("update _tbl_masters_documenttypes set DocumentTypeName ='".$_POST['DocumentTypeName']."',
                                                               DocumentTypeShortDescription          ='".$_POST['DocumentTypeShortDescription']."',
                                                               Remarks          ='".$_POST['Remarks']."',
                                                               IsActive         ='".$_POST['IsActive']."' where DocumentTypeID='".$_POST['DocumentTypeID']."'");
                                                          
        return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
    }

    public static function remove() {
        
        global $mysql;
        
        $mysql->execute("delete from _tbl_masters_documenttypes where DocumentTypeID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_documenttypes")));
    }
    
    public static function listAll() {
        
        global $mysql;
        
        $data = $mysql->select("select * from _tbl_masters_documenttypes");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function listAllActive() {
        
        global $mysql;
        
        $data = $mysql->select("select * from _tbl_masters_documenttypes where IsActive='1'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function getData() {
        
        global $mysql;
        
        $data = $mysql->select("select * from _tbl_masters_documenttypes where DocumentTypeID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
}
?>