<?php
class UserRoles {
    
    function addNew() {
        
        global $mysql;
        
        if (isset($_POST['UserRoleCode'])) {
            if (strlen(trim($_POST['UserRoleCode']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter User Role Code","div"=>"UserRoleCode"));    
            }  else {
                $dupCode = $mysql->select("select * from _tbl_masters_user_roles where UserRoleCode='".trim($_POST['UserRoleCode'])."'");
                if (sizeof($dupCode)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"UserRoleCode"));    
                }
            }  
        } else {
            $_POST['UserRoleCode'] = SequnceList::updateNumber("_tbl_masters_user_roles");
        }
        
        if (strlen(trim($_POST['UserRole']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter User Role","div"=>"UserRole"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_user_roles where UserRole='".trim($_POST['UserRole'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"UserRole is already used","div"=>"UserRole"));    
            }
        }
        
        if (strlen(trim($_POST['Module']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Module","div"=>"Module"));    
        }
     
        $id = $mysql->insert("_tbl_masters_user_roles",array("UserRoleCode" => $_POST['UserRoleCode'],
                                                             "UserRole" => $_POST['UserRole'],
                                                             "Module" => $_POST['Module'],
                                                             "Remarks"          => $_POST['Remarks'],
                                                             "CreatedOn"        => date("Y-m-d H:i:s"),
                                                             "IsActive"         => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","UserRoleCode"=>SequnceList::updateNumber("_tbl_masters_user_roles")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create.","div"=>"UserRole"));
        }
     }
     
     public static function doUpdate() {
         
         global $mysql;
         
         if (strlen(trim($_POST['UserRole']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter UserRole","div"=>"UserRole"));    
         } else {
            $dupCode = $mysql->select("select * from _tbl_masters_user_roles where UserRole='".trim($_POST['UserRole'])."' and UserRoleID<>'".$_POST['UserRoleID']."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"UserRole is already used","div"=>"UserRole"));    
            }
        }
        
         if (strlen(trim($_POST['Module']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Module","div"=>"Module"));    
        }
     
        $mysql->execute("update _tbl_masters_user_roles set UserRole ='".$_POST['UserRole']."',
                                                                  Module          ='".$_POST['Module']."',
                                                                  Remarks          ='".$_POST['Remarks']."',
                                                                  IsActive         ='".$_POST['IsActive']."' where UserRoleID='".$_POST['UserRoleID']."'");
                                                          
        return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
    }
     
    public static function remove() {
        
        global $mysql;
        
        $mysql->execute("delete from _tbl_masters_user_roles where UserRoleID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_user_roles")));
    }

    public static function listAll() {
        global $mysql;
        /*
        $data = $mysql->select("SELECT t1.*, IFNULL(t2.cnt,0) AS  CustomerCount 
                                    FROM 
                                        _tbl_masters_customertypename AS t1
                                    LEFT JOIN 
                                        (SELECT CustomerTypeNameID, COUNT(*) AS cnt FROM _tbl_masters_customers GROUP BY CustomerTypeNameID) AS t2
                                    ON 
                                    t1.CustomerTypeNameID=t2.CustomerTypeNameID");
                                    */
        $data = $mysql->select("select * from _tbl_masters_user_roles order by UserRole");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    public static function listAllActive() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_user_roles where IsActive='1'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function getDetailsByID($UserRoleID) {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_user_roles where UserRoleID='".$UserRoleID."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function getData() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_user_roles where UserRoleID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
}
?>