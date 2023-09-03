<?php
    $CustomerID=$customer_data[0]['CustomerID'];
?>
 <div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-header" style="padding-bottom:0px">   
            <div class="row">
                <div class="col-sm-6">
                    <h3>Attachments</h3>
                </div>
                <div class="col-sm-6"></div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                <script>
                function frmAttach(){
                    
                    $('#ErrAttachTitle').html("");
                    $('#ErrUploadFile').html("");
                    if ($('#AttachTitle').val().trim()=="")  {
                        $('#ErrAttachTitle').html("Please enter title");
                        return false;
                    }
                    if ($('#UploadFile').val().trim()=="")  {
                        $('#ErrUploadFile').html("Please select file");
                        return false;
                    }
                    return true;
                }
                </script>        
                    <form action="" method="post" enctype="multipart/form-data" onsubmit="return frmAttach();">
                        <input type="hidden" name="CustomerID" id="CustomerID" value="<?php echo $customer_data[0]['CustomerID'];?>">
                        <div class="row">
                            <div class="col-sm-3">
                                <input type="text" name="Title" id="AttachTitle" class="form-control" placeholder="Title">  
                                <span id="ErrAttachTitle" style="color:red"></span>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" name="Description" id="Description" class="form-control" placeholder="Description">  
                            </div>
                            <div class="col-sm-3">
                                <input type="file" name="UploadFile" id="UploadFile" class="form-control">  
                                <span id="ErrUploadFile" style="color:red"></span>
                            </div>
                            <div class="col-sm-2" style="text-align: right;">
                                <input type="submit" value="Upload Documents" name="assignOfficer" id="assignOfficer" class="btn btn-primary btn-sm">
                            </div>
                        </div>
                    </form>
                </div>
                <?php
                if(isset($_FILES['UploadFile'])) {
      $errors= array();
      $file_name = time()."_".strtolower($_FILES['UploadFile']['name']);
      $file_size =$_FILES['UploadFile']['size'];
      $file_tmp =$_FILES['UploadFile']['tmp_name'];
      $file_type=$_FILES['UploadFile']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['UploadFile']['name'])));
      
      //$extensions= array("jpeg","jpg","png","pdf","docx","doc","xls","xlsx","zip","rar");
      $file_extension = $mysql->select("select * from _tbl_masters_file_extensions where FileExtension='".trim(strtolower($file_ext))."'");
      //if(in_array($file_ext,$extensions)=== false){
      if (sizeof($file_extension)==0) {
         $errors[]=$file_ext." extension not allowed ";
      }
      
      if($file_size > 2097152){
         //$errors[]='File size must be excately 2 MB';
      }
      
       $path = SERVER_PATH."/uploads/assets/".$CustomerID;
            if (!is_dir($path)) {
                mkdir(SERVER_PATH."/uploads/assets/".$CustomerID, 0777); 
            } 
            
      if(empty($errors)==true){
         if (move_uploaded_file($file_tmp,SERVER_PATH."/uploads/assets/".$CustomerID."/".$file_name)) {
         $mysql->insert("_tbl_customers_assets",array("CustomerID"=>$CustomerID,
                                                      "CreatedOn"=>date("Y-m-d H:i:s"),
                                                      "Title"=>$_POST['Title'],
                                                      "Description"=>$_POST['Description'],
                                                      "FileName"=>$file_name,
                                                      "CreatedByID"=>$_SESSION['User']['EmployeeID'],
                                                      "CreatedByName"=>$_SESSION['User']['EmployeeName'],
                                                      "IsActive"=>"1")); } else {
                                                  $errors[]='Unable to process at this time.';        
                                                      }
      }else{
         echo "<span style='color:red'>".$errors[0]."</span>";
      }
   }
                ?>
                <div class="col-sm-12 mt-3">
                    <table style="border-top:1px solid #ccc;border-left:1px solid #ccc;border-right:1px solid #ccc;width:100%;font-size:12px;color:#444" cellpadding="2" cellspacing="0">
                        <thead>
                            <tr style="background:#eee;font-size:12px;">
                                <td style="border-bottom:1px solid #ccc;padding-left:10px;color:#222">Title</td>
                                <td style="width:40%;border-bottom:1px solid #ccc;padding-left:10px;color:#222">Description</td>
                                <td style="width:130px;border-bottom:1px solid #ccc;padding-left:10px;color:#222">Created</td>
                                <td style="width:130px;border-bottom:1px solid #ccc;padding-left:10px;color:#222">Created By</td>
                                <td style="width:100px;border-bottom:1px solid #ccc;padding-left:10px;color:#222">Download</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $assigned = $mysql->select("select * from _tbl_customers_assets where IsActive='1' and CustomerID='".$CustomerID."'");
                                foreach($assigned as $d) {
                            ?>
                            <tr style="font-size:12px;">
                                <td style="border-bottom:1px solid #ccc;padding-left:10px;color:#222"><?php echo $d['Title'];?></td>
                                <td style="border-bottom:1px solid #ccc;padding-left:10px;color:#222"><?php echo $d['Description'];?></td>
                                <td style="border-bottom:1px solid #ccc;padding-left:10px;color:#222"><?php echo date("d-m-Y H:i",strtotime($d['CreatedOn']));?></td>
                                <td style="border-bottom:1px solid #ccc;padding-left:10px;color:#222"><?php echo $d['CreatedByName'];?></td>
                                <td style="border-bottom:1px solid #ccc;padding-left:10px;color:#222;text-align:center">
                                <a href="<?php echo WEBAPP_URL;?>download.php?file=<?php echo md5("J2J".$d['AttachmentID']);?>">Download</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                       
                       
                         
                   
                     
                     
                
             
             
        </div>     
                        
                       
                         
                    </div>
                     
                     
                </div>
            </div>
             
        </div> 