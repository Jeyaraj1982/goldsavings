<?php
class CustomerTypes {
    
    function addNew() {
        
        global $mysql;
        
        if (isset($_POST['CustomerTypeCode'])) {
            if (strlen(trim($_POST['CustomerTypeCode']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Customer Type Code","div"=>"CustomerTypeCode"));    
            }  else {
                $dupCode = $mysql->select("select * from _tbl_masters_customertypename where CustomerTypeCode='".trim($_POST['CustomerTypeCode'])."'");
                if (sizeof($dupCode)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"CustomerTypeCode"));    
                }
            }  
        } else {
            $_POST['CustomerTypeCode'] = SequnceList::updateNumber("_tbl_masters_customertypename");
        }
        
        if (strlen(trim($_POST['CustomerTypeName']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Customer Type Name","div"=>"CustomerTypeName"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_customertypename where CustomerTypeName='".trim($_POST['CustomerTypeName'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Customer Type Name is already used","div"=>"CustomerTypeName"));    
            }
        }
     
        $id = $mysql->insert("_tbl_masters_customertypename",array("CustomerTypeCode" => $_POST['CustomerTypeCode'],
                                                                   "CustomerTypeName" => $_POST['CustomerTypeName'],
                                                                   "Remarks"          => $_POST['Remarks'],
                                                                   "CreatedOn"        => date("Y-m-d H:i:s"),
                                                                   "IsActive"         => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","CustomerTypeCode"=>SequnceList::updateNumber("_tbl_masters_customertypename")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create.","div"=>"CustomerTypeName"));
        }
     }
     
     public static function doUpdate() {
         
         global $mysql;
         
         if (strlen(trim($_POST['CustomerTypeName']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter Customer Type Name","div"=>"CustomerTypeName"));    
         } else {
            $dupCode = $mysql->select("select * from _tbl_masters_customertypename where CustomerTypeName='".trim($_POST['CustomerTypeName'])."' and CustomerTypeNameID<>'".$_POST['CustomerTypeNameID']."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Customer Type Name is already used","div"=>"CustomerTypeName"));    
            }
        }
        $mysql->execute("update _tbl_masters_customertypename set CustomerTypeName ='".$_POST['CustomerTypeName']."',
                                                                  Remarks          ='".$_POST['Remarks']."',
                                                                  IsActive         ='".$_POST['IsActive']."' where CustomerTypeNameID='".$_POST['CustomerTypeNameID']."'");
                                                          
        return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
    }
     
    public static function remove() {
        
        global $mysql;
        
        $data_exists = $mysql->select("select * from _tbl_masters_customers where CustomerTypeNameID='".$_GET['ID']."'");
        if (sizeof($data_exists)==0) {
            $mysql->execute("delete from _tbl_masters_customertypename where CustomerTypeNameID='".$_GET['ID']."'");
            return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_customertypename")));    
        } else {
             return json_encode(array("status"=>"failure","message"=>"Error: unable to delete customer type name. Reason: Customer Type name has assigned ".(sizeof($data_exists))." customer(s)","div"=>""));
        }
    }

    public static function listAll() {
        global $mysql;
        //$data = $mysql->select("select * from _tbl_masters_customertypename");
        $data = $mysql->select("SELECT t1.*, IFNULL(t2.cnt,0) AS  CustomerCount 
                                    FROM 
                                        _tbl_masters_customertypename AS t1
                                    LEFT JOIN 
                                        (SELECT CustomerTypeNameID, COUNT(*) AS cnt FROM _tbl_masters_customers GROUP BY CustomerTypeNameID) AS t2
                                    ON 
                                    t1.CustomerTypeNameID=t2.CustomerTypeNameID");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function listAllActive() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_customertypename where IsActive='1' order by CustomerTypeName");
        return json_encode(array("status"=>"success","data"=>$data));   
    }
    
    public static function getDetailsByID($CustomerTypeNameID) {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_customertypename where CustomerTypeNameID='".$CustomerTypeNameID."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function getData() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_customertypename where CustomerTypeNameID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
}
?>