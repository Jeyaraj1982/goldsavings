<?php
class GeneralSettings {
    const GOLD_MAXIMUM_RATE = 8000;
    const GOLD_MINIMUM_RATE = 5000;
}

class GoldRates {
    
    function addNew() {
        
        global $mysql;
        
        if (strlen(trim($_POST['Date']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please Select Date","div"=>"Date"));    
        }  else {
            $dupCode = $mysql->select("select * from _tbl_masters_goldrates where Date='".trim($_POST['Date'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Date is already used","div"=>"Date"));    
            }
        }
        
        if (strlen(trim($_POST['Gold18']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Gold value","div"=>"Gold18"));    
        } else {
            if ($_POST['Gold18']>GeneralSettings::GOLD_MAXIMUM_RATE) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Gold value max.".GeneralSettings::GOLD_MAXIMUM_RATE,"div"=>"Gold18"));    
            }
            if ($_POST['Gold18']<GeneralSettings::GOLD_MINIMUM_RATE) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Gold value min.".GeneralSettings::GOLD_MINIMUM_RATE,"div"=>"Gold18"));    
            }
        }
        
        if (strlen(trim($_POST['Gold22']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Gold value","div"=>"Gold22"));    
        } else {
            if ($_POST['Gold22']>GeneralSettings::GOLD_MAXIMUM_RATE) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Gold value max.".GeneralSettings::GOLD_MAXIMUM_RATE,"div"=>"Gold22"));    
            }
            if ($_POST['Gold22']<GeneralSettings::GOLD_MINIMUM_RATE) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Gold value min.".GeneralSettings::GOLD_MINIMUM_RATE,"div"=>"Gold22"));    
            }
        }
        
        if (strlen(trim($_POST['Gold24']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Gold value","div"=>"Gold24"));    
        } else {
            if ($_POST['Gold24']>GeneralSettings::GOLD_MAXIMUM_RATE) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Gold value max.".GeneralSettings::GOLD_MAXIMUM_RATE,"div"=>"Gold24"));    
            }
            if ($_POST['Gold24']<GeneralSettings::GOLD_MINIMUM_RATE) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Gold value min.".GeneralSettings::GOLD_MINIMUM_RATE,"div"=>"Gold24"));    
            }
        }

        $id = $mysql->insert("_tbl_masters_goldrates",array("Date"      => $_POST['Date'],
                                                            "Gold18"    => $_POST['Gold18'],
                                                            "Gold22"    => $_POST['Gold22'],
                                                            "Gold24"    => $_POST['Gold24'],
                                                            "Remarks"   => $_POST['Remarks'],
                                                            "CreatedOn" => date("Y-m-d H:i:s"),
                                                            "IsActive"  => '1'));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>""));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create.","div"=>"Date"));
        }
     }
     
     public static function remove() {
         
         global $mysql;
         
         $mysql->execute("delete from _tbl_masters_goldrates where RateID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_masters_goldrates")));
     }

     public static function listAll() {
         
         global $mysql;
         
         $data = $mysql->select("select `RateID`,DATE_FORMAT(`Date`,'%d/%m/%Y') AS `Date`,`Gold18`,`Gold22`,`Gold24`     from _tbl_masters_goldrates");
         return json_encode(array("status"=>"success","data"=>$data));
     }

     public static function doUpdate() {
     
         global $mysql;
         
         if (strlen(trim($_POST['Gold18']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Gold value","div"=>"Gold18"));    
        } else {
            if ($_POST['Gold18']>GeneralSettings::GOLD_MAXIMUM_RATE) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Gold value max.".GeneralSettings::GOLD_MAXIMUM_RATE,"div"=>"Gold18"));    
            }
            if ($_POST['Gold18']<GeneralSettings::GOLD_MINIMUM_RATE) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Gold value min.".GeneralSettings::GOLD_MINIMUM_RATE,"div"=>"Gold18"));    
            }
        }
        
        if (strlen(trim($_POST['Gold22']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Gold value","div"=>"Gold22"));    
        } else {
            if ($_POST['Gold22']>GeneralSettings::GOLD_MAXIMUM_RATE) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Gold value max.".GeneralSettings::GOLD_MAXIMUM_RATE,"div"=>"Gold22"));    
            }
            if ($_POST['Gold22']<GeneralSettings::GOLD_MINIMUM_RATE) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Gold value min.".GeneralSettings::GOLD_MINIMUM_RATE,"div"=>"Gold22"));    
            }
        }
        
        if (strlen(trim($_POST['Gold24']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Gold value","div"=>"Gold24"));    
        } else {
            if ($_POST['Gold24']>GeneralSettings::GOLD_MAXIMUM_RATE) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Gold value max.".GeneralSettings::GOLD_MAXIMUM_RATE,"div"=>"Gold24"));    
            }
            if ($_POST['Gold24']<GeneralSettings::GOLD_MINIMUM_RATE) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Gold value min.".GeneralSettings::GOLD_MINIMUM_RATE,"div"=>"Gold24"));    
            }
        }
         
         $mysql->execute("update _tbl_masters_goldrates set Gold18 ='".$_POST['Gold18']."',
                                                            Gold22          ='".$_POST['Gold22']."',
                                                            Gold24          ='".$_POST['Gold24']."',
                                                            Remarks          ='".$_POST['Remarks']."' 
                                                            where RateID='".$_POST['RateID']."'");
                                                          
         return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
     }
     
     public static function viewGoldRate() {
         
         global $mysql;
         
         $data = $mysql->select("select * from _tbl_masters_goldrates where RateID='".$_GET['id']."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
}
  /*
{"data":
{"id":3866885,
"beneficiary":1463196,
"payment_method":"IMPS","status":"Success","fees":413,"amount":100000,
"bank_reference_id":"324112086553","metadata":{"ifsc_code":"CIUB0000452","account_number":"500101013599602"},"created_at":"2023-08-29T06:56:51.971559Z","updated_at":"2023-08-29T06:56:56.277939Z"},"success":true}
*/
?>

