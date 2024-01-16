<?php
class PaymentModes {
    
    function addNew() {
        
        global $mysql;
        
        if (isset($_POST['PaymentModeCode'])) {
            if (strlen(trim($_POST['PaymentModeCode']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Payment Mode Code","div"=>"PaymentModeCode"));    
            }  else {
                $dupCode = $mysql->select("select * from _tbl_masters_paymentmodes where PaymentModeCode='".trim($_POST['PaymentModeCode'])."'");
                if (sizeof($dupCode)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"PaymentModeCode"));    
                }
            }  
        } else {
            $_POST['PaymentModeCode'] = SequnceList::updateNumber("_tbl_masters_paymentmodes");
        }
        
        if (strlen(trim($_POST['PaymentMode']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Payment Mode","div"=>"PaymentMode"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_masters_paymentmodes where PaymentMode='".trim($_POST['PaymentMode'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Payment Mode is already used","div"=>"PaymentMode"));    
            }
        }
     
        $id = $mysql->insert("_tbl_masters_paymentmodes",array("PaymentModeCode" => $_POST['PaymentModeCode'],
                                                               "PaymentMode" => $_POST['PaymentMode'],
                                                               "LinkedBank" => $_POST['LinkedBank'],
                                                               "Remarks"          => $_POST['Remarks'],
                                                               "CreatedOn"        => date("Y-m-d H:i:s"),
                                                               "IsActive"         => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","PaymentModeCode"=>SequnceList::updateNumber("_tbl_masters_paymentmodes")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create.","div"=>"PaymentMode"));
        }
     }
     
     public static function doUpdate() {
         
         global $mysql;
         
         if (strlen(trim($_POST['PaymentMode']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter PaymentMode","div"=>"PaymentMode"));    
         } else {
            $dupCode = $mysql->select("select * from _tbl_masters_paymentmodes where PaymentMode='".trim($_POST['PaymentMode'])."' and PaymentModeID<>'".$_POST['PaymentModeID']."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"PaymentMode is already used","div"=>"PaymentMode"));    
            }
        }
        $mysql->execute("update _tbl_masters_paymentmodes set PaymentMode ='".$_POST['PaymentMode']."',
                                                              LinkedBank  ='".$_POST['LinkedBank']."',
                                                              Remarks     ='".$_POST['Remarks']."',
                                                              IsActive    ='".$_POST['IsActive']."' where PaymentModeID='".$_POST['PaymentModeID']."'");
                                                          
        return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
    }
     
    public static function remove() {
        
        global $mysql;

        $data = $mysql->select("select * from _tbl_wallet where PaymentModeID='".$_GET['ID']."'");
        if (sizeof($data)==0) {
            $mysql->execute("delete from _tbl_masters_paymentmodes where PaymentModeID='".$_GET['ID']."'");
            return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_paymentmodes")));
        }  else {
            return json_encode(array("status"=>"failure","message"=>"Unable to remmove. This Payment Mode used to ".sizeof($data)." wallet transaction(s)"));    
        }
        
    }

    public static function listAll() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_paymentmodes");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function listAllActive() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_paymentmodes where IsActive='1'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function getDetailsByID($PaymentModeID) {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_paymentmodes where PaymentModeID='".$PaymentModeID."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
    
    public static function getData() {
        global $mysql;
        $data = $mysql->select("select * from _tbl_masters_paymentmodes where PaymentModeID='".$_GET['ID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
}
?>