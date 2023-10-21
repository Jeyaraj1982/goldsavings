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
                                                            "GOLD_18"    => $_POST['Gold18'],
                                                            "GOLD_22"    => $_POST['Gold22'],
                                                            "GOLD_24"    => $_POST['Gold24'],
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
         
         //Check Recepit
         //Check voucher
         $mysql->execute("delete from _tbl_masters_goldrates where RateID='".$_GET['ID']."'");
         $data = $mysql->select("select `RateID`,DATE_FORMAT(`Date`,'%d-%m-%Y') AS `Date`,`GOLD_18`,`GOLD_22`,`GOLD_24` from _tbl_masters_goldrates order by Date(Date) desc");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$data));
     }

     public static function listAll() {
                                                                    
         global $mysql;
                 if (strlen(trim($_POST['FromDate']))==0) {
        return json_encode(array("status"=>"failure","message"=>"Please select Start date","div"=>"message"));    
    } else {
        $fromDate = strtotime($_POST['FromDate']);
        if (!($fromDate<=strtotime(date("Y-m-d")))) {
            return json_encode(array("status"=>"failure","message"=>"Please select valid Start date (date must have lessthan or equal to ".date("d-m-Y")."","div"=>"message"));        
        }
    }
    
    if (strlen(trim($_POST['ToDate']))==0) {
        return json_encode(array("status"=>"failure","message"=>"Please select End date","div"=>"message"));    
    } else {
        $toDate = strtotime($_POST['ToDate']);
        if (!($toDate<=strtotime(date("Y-m-d")))) {
            return json_encode(array("status"=>"failure","message"=>"Please select valid End date (date must have lessthan or equal to ".date("d-m-Y")."","div"=>"message"));        
        }
    }
    
    if (!(strtotime($_POST['FromDate'])<=strtotime($_POST['ToDate']))) {
        return json_encode(array("status"=>"failure","message"=>"Please select valid date (Start date must be equal or lessthan End Date)","div"=>"message"));        
    }
    
         $data = $mysql->select("select `RateID`,DATE_FORMAT(`Date`,'%d-%m-%Y') AS `Date`,`GOLD_18`,`GOLD_22`,`GOLD_24` from _tbl_masters_goldrates where  date(Date)>=date('".$_POST['FromDate']."') and date(Date)<=date('".$_POST['ToDate']."') order by Date(Date) desc");
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
         
         $mysql->execute("update _tbl_masters_goldrates set GOLD_18 ='".$_POST['Gold18']."',
                                                            GOLD_22          ='".$_POST['Gold22']."',
                                                            GOLD_24          ='".$_POST['Gold24']."',
                                                            Remarks          ='".$_POST['Remarks']."' 
                                                            where RateID='".$_POST['RateID']."'");
                                                          
         return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
     }
     
     public static function viewGoldRate() {
         
         global $mysql;
         
         $data = $mysql->select("select * from _tbl_masters_goldrates where RateID='".$_GET['id']."'");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
      public static function viewTodayGoldRate() {
         
         global $mysql;
         
         $data = $mysql->select("select * from _tbl_masters_goldrates where date(Date)=date('".date("Y-m-d")."')");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
      public static function getGoldRate() {
         
         global $mysql;
         
         if (isset($_GET['date'])) {
             $data = $mysql->select("select Date,GOLD_18,GOLD_22,GOLD_24 from _tbl_masters_goldrates where date(Date)=Date('".$_GET['date']."') ");     
         } else {
            $data = $mysql->select("select Date,GOLD_18,GOLD_22,GOLD_24 from _tbl_masters_goldrates where date(Date)=Date('".date("Y-m-d")."') ");     
         }
         
         if (sizeof($data)==1) {
            return json_encode(array("status"=>"success","data"=>$data[0]));
         } else {
            return json_encode(array("status"=>"failure","message"=>"gold rate not found"));    
         }
     }
}   
?>