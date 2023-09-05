<?php
class Contracts {
    
    function addNew() {
        
        global $mysql;
        
         
        if (strlen(trim($_GET['Customer']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select customer","div"=>"CustomerID"));    
        } 
        
        if (strlen(trim($_GET['Scheme']))==0) {
            return json_encode(array("status"=>"failure","message"=>"Please select scheme","div"=>"SchemeID"));    
        }
         
        $ContractCode= SequnceList::updateNumber("_tbl_contracts"); 
        
        $CustomerData = json_decode(Customers::getDetailsByID($_GET['Customer']),true);
        $CustomerData = $CustomerData['data'];                              
        
        $SchemeData = json_decode(Schemes::getDetailsByID($_GET['Scheme']),true);
        $SchemeData = $SchemeData['data'];                              
                                      
        $id = $mysql->insert("_tbl_contracts",array("ContractCode"  => $ContractCode,
                                                    "CustomerID"    => $_GET['Customer'],
                                                    "CustomerName"  => $CustomerData[0]['CustomerName'],
                                                    "CustomerData"  => json_encode($CustomerData[0]),
                                                    "SchemeID"      => $_GET['Scheme'],
                                                    "SchemeName"    => $SchemeData[0]['SchemeName'],
                                                    "SchemeData"  => json_encode($SchemeData[0]),
                                                    "CreatedOn"     => date("Y-m-d H:i:s")));
        if ($id>0) {
            return json_encode(array("status"=>"success","message"=>"successfully created","div"=>""));
        } else {
            return json_encode(array("status"=>"failure","message"=>"unable to create","div"=>""));
        }
     }
     
     public static function remove() {
         global $mysql;

         $mysql->execute("delete from _tbl_contracts where ContractID='".$_GET['ID']."'");
         return json_encode(array("status"=>"success","message"=>"Deleted Successfully","data"=>$mysql->select("select * from _tbl_contracts")));
     }

     public static function listAll() {
         global $mysql;
         $data = $mysql->select("select * from _tbl_contracts");
         return json_encode(array("status"=>"success","data"=>$data));
     }
     
      public static function listBySchemes() {   
        global $mysql;
        $data = $mysql->select("select * from _tbl_contracts where SchemeID='".$_GET['SchemeID']."'");
        return json_encode(array("status"=>"success","data"=>$data));
    }
     
 
}
?>