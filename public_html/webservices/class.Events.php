<?php
class Events {
    
    function addNew() {
        
        global $mysql;
        
        if (isset($_POST['EventCode'])) {
            if (strlen(trim($_POST['EventCode']))==0) {
                return json_encode(array("status"=>"failure","message"=>"Please enter Event Code","div"=>"EventCode"));    
            } else {
                $dupCode = $mysql->select("select * from _tbl_apps_events where EventCode='".trim($_POST['EventCode'])."'");
                if (sizeof($dupCode)>0) {
                    return json_encode(array("status"=>"failure","message"=>"Code is already used","div"=>"StateNameCode"));    
                }
            }
        } else {
          $_POST['EventCode']= SequnceList::updateNumber("_tbl_apps_events"); 
        }
        
        if (strlen(trim($_POST['EventDescription']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Event Description","div"=>"EventDescription"));    
        }
        
        if (strlen(trim($_POST['EventTitle']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please enter Event Title","div"=>"EventTitle"));    
        } else {
            $dupCode = $mysql->select("select * from _tbl_apps_events where EventTitle='".trim($_POST['EventTitle'])."'");
            if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Event Title is already used","div"=>"EventTitle"));    
            }
        }
        $EventStart = $_POST['StartYear']."-".$_POST['StartMonth']."-".$_POST['StartDay']." ".$_POST['StartHour'].":".$_POST['StartMinute'].":00";
        if (!(strtotime(date("Y-m-d H:i:s"))<strtotime($EventStart))) {
            return json_encode(array("status"=>"failure","message"=>"Please select valid date","div"=>"EventStart"));    
        }
        
        $EventEnd = $_POST['EndYear']."-".$_POST['EndMonth']."-".$_POST['EndDay']." ".$_POST['EndHour'].":".$_POST['EndMinute'].":00";
        if (!(strtotime($EventStart)<strtotime($EventEnd))) {
            return json_encode(array("status"=>"failure","message"=>"Please select valid date","div"=>"EventEnd"));    
        }
        $id = $mysql->insert("_tbl_apps_events",array("EventCode" => $_POST['EventCode'],
                                                             "EventTitle"     => $_POST['EventTitle'],
                                                             "EventDescription"     => $_POST['EventDescription'],
                                                             "EventStart"       => $EventStart,
                                                             "EventEnd"       => $EventEnd,
                                                             "Remarks"       => $_POST['Remarks'],
                                                             "CreatedOn"     => date("Y-m-d H:i:s"),
                                                             "IsActive"      => '1'));
                                                             
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>"","EventCode"=>SequnceList::updateNumber("_tbl_apps_events")));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
     }
     
     public static function remove() {
         global $mysql;
         $mysql->execute("delete from _tbl_apps_events where EventID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_apps_events")));
     }

     public static function listAll() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_apps_events");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
     public static function getData() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_apps_events where EventID='".$_GET['ID']."'");
         $data[0]['StartDay']=date("d",strtotime($data[0]['EventStart']));
         $data[0]['StartMonth']=date("m",strtotime($data[0]['EventStart']));
         $data[0]['StartYear']=date("Y",strtotime($data[0]['EventStart']));
         $data[0]['StartHour']=date("H",strtotime($data[0]['EventStart']));
         $data[0]['StartMinute']=date("i",strtotime($data[0]['EventStart']));
         
         $data[0]['EndDay']=date("d",strtotime($data[0]['EventEnd']));
         $data[0]['EndMonth']=date("m",strtotime($data[0]['EventEnd']));
         $data[0]['EndYear']=date("Y",strtotime($data[0]['EventEnd']));
         $data[0]['EndHour']=date("H",strtotime($data[0]['EventEnd']));
         $data[0]['EndMinute']=date("i",strtotime($data[0]['EventEnd']));
         
         return json_encode(array("status"=>"success","data"=>$data));
     }

     public static function doUpdate() {
         global $mysql;
         if (strlen(trim($_POST['EventTitle']))==0) {
             return json_encode(array("status"=>"failure","message"=>"Please enter Event Title","div"=>"EventTitle"));    
         } else {
             $dupCode = $mysql->select("select * from _tbl_apps_events where EventTitle='".trim($_POST['EventTitle'])."' and EventID<>'".$_POST['EventID']."'");
             if (sizeof($dupCode)>0) {
                return json_encode(array("status"=>"failure","message"=>"Event Title is already used","div"=>"EventTitle"));    
             }
         }
         $EventStart = $_POST['StartYear']."-".$_POST['StartMonth']."-".$_POST['StartDay']." ".$_POST['StartHour'].":".$_POST['StartMinute'].":00";
         $EventEnd = $_POST['EndYear']."-".$_POST['EndMonth']."-".$_POST['EndDay']." ".$_POST['EndHour'].":".$_POST['EndMinute'].":00";
         
         $EventEnd = $_POST['EndYear']."-".$_POST['EndMonth']."-".$_POST['EndDay']." ".$_POST['EndHour'].":".$_POST['EndMinute'].":00";
         if (!(strtotime($EventStart)<strtotime($EventEnd))) {
            return json_encode(array("status"=>"failure","message"=>"Please select valid date","div"=>"EventEnd"));    
         }
         $mysql->execute("update _tbl_apps_events set EventTitle        = '".$_POST['EventTitle']."',
                                                      EventDescription  = '".$_POST['EventDescription']."',
                                                      EventStart        = '".$EventStart."',
                                                      EventEnd          = '".$EventEnd."',
                                                      Remarks           = '".$_POST['Remarks']."',
                                                      IsActive          = '".$_POST['IsActive']."' where EventID='".$_POST['EventID']."'");
                                                          
         return json_encode(array("status"=>"success","message"=>"successfully updated ".$mysql->error,"div"=>""));
     }
}
?>