<?php
class EmployeeCategories {
    
    function addNew() {
        
        global $mysql;
        
        if (isset($_POST['EmployeeCategoryCode'])) {
            if (strlen(trim($_POST['EmployeeCategoryCode']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Employee Category Code","div"=>"EmployeeCategoryCode"));    
            } else {
                $dupCode = $mysql->select("select * from _tbl_masters_employee_categories where EmployeeCategoryCode='".trim($_POST['EmployeeCategoryCode'])."'");
                if (sizeof($dupCode)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"EmployeeCategoryCode"));    
                }
            }
        } else {
            $_POST['EmployeeCategoryCode'] = SequnceList::updateNumber("_tbl_masters_employee_categories");
        }
        
        if (strlen(trim($_POST['EmployeeCategoryTitle']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Employee Category Title","div"=>"EmployeeCategoryTitle"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_employee_categories where EmployeeCategoryTitle='".trim($_POST['EmployeeCategoryTitle'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Employee Category Title is already used","div"=>"EmployeeCategoryTitle"));    
            }
        }
     
        $id = $mysql->insert("_tbl_masters_employee_categories",array("EmployeeCategoryCode"  => $_POST['EmployeeCategoryCode'],
                                                                     "EmployeeCategoryTitle" => $_POST['EmployeeCategoryTitle'],
                                                                    "Remarks"                => $_POST['Remarks'],
                                                                    "CreatedOn"              => date("Y-m-d H:i:s"),
                                                                    "IsActive"               => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","EmployeeCategoryCode"=>SequnceList::updateNumber("_tbl_masters_employee_categories")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
    }
    
    public static function listAll() {
        
        global $mysql;
        
        $data = $mysql->select("select * from _tbl_masters_employee_categories order by EmployeeCategoryTitle");
        $data = $mysql->select("
        SELECT t1.*, IFNULL(t2.cnt,0) AS EmployeeCount FROM _tbl_masters_employee_categories AS t1
LEFT JOIN 
(SELECT EmployeeCategoryID, COUNT(*) AS cnt FROM _tbl_employees GROUP BY EmployeeCategoryID) AS t2
ON t1.EmployeeCategoryID=t2.EmployeeCategoryID  order by t1.EmployeeCategoryTitle
        ");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function listAllActive() {
        
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_employee_categories where IsActive='1' order by EmployeeCategoryTitle");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function doUpdate() {
        
        global $mysql;
        
        if (strlen(trim($_POST['EmployeeCategoryTitle']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Employee Category Title","div"=>"EmployeeCategoryTitle"));    
        }
        
        $mysql->execute("update _tbl_masters_employee_categories set EmployeeCategoryTitle = '".$_POST['EmployeeCategoryTitle']."',
                                                                    Remarks               = '".$_POST['Remarks']."',
                                                                    IsActive              = '".$_POST['IsActive']."' where EmployeeCategoryID='".$_POST['EmployeeCategoryID']."'");
                                                          
        return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
    }
     
    public static function remove() {
        
        global $mysql;
        $data_exists = $mysql->select("select * from _tbl_employees where EmployeeCategoryID='".$_GET['ID']."'");
        if (sizeof($data_exists)==0) {
            $mysql->execute("delete from _tbl_masters_employee_categories where EmployeeCategoryID='".$_GET['ID']."'");
            $list = json_decode(self::listAll(),true);
            return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$list['data']));
        } else {
            return json_encode(array("status"=>"failure","message"=>"Error: unable to delete employee cattegory. Reason: Employee category has assigned ".(sizeof($data_exists))." employee(s)","div"=>""));
        }
    }
    
    public static function getData() {
        
        global $mysql;
        
        $data = $mysql->select("select * from _tbl_masters_employee_categories where EmployeeCategoryID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function getDetailsByID($EmployeeCategoryID) {
        
        global $mysql;
        
        $data = $mysql->select("select * from _tbl_masters_employee_categories where EmployeeCategoryID='".$EmployeeCategoryID."' ORDER by EmployeeCategoryTitle");
        
        return json_encode(array("status"=>"success","data"=>$data));
    }
}
?>