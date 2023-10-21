<?php
    $data = $mysql->select("select * from _tbl_employees where EmployeeID='".$_SESSION['User']['EmployeeID']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">My Profile</h1>
        </div>
        </div>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("adminprofile_side_menu.php"); ?>
        </div>
            <div class="col-9 col-sm-9 col-xxl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold">Employee Code</div>
                                <?php echo $data[0]['EmployeeCode'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold">Employee Name </div>
                                <?php echo $data[0]['EmployeeName'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold">Father/Husband's Name </div>
                                <?php echo $data[0]['FatherName'];?>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold">Gender </div>
                                <?php echo $data[0]['Gender'];?>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold">Date Of Birth </div>
                                <?php echo $data[0]['DateOfBirth'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold">EmailID </div>
                                <?php echo $data[0]['EmailID'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold">Mobile Number </div>
                                    +91 <?php echo $data[0]['MobileNumber'];?>
                            </div>
                           <div class="col-sm-6">
                                <div style="font-weight: bold">Whatsapp Number</div>
                                <?php 
                                    if (strlen($data[0]['WhatsappNumber'])>0) {
                                        echo "+91 ".$data[0]['WhatsappNumber'];  
                                    } else {
                                       echo "N/A";     
                                    }
                                ?>
                        </div>
                    </div>
                </div>
            </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold">Address Line 1 </div>
                                <?php echo $data[0]['AddressLine1'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold">Address Line 2</div>
                                <?php echo $data[0]['AddressLine2'];?>
                            </div>
                            <div class="col-sm-6  mb-3">
                                <div style="font-weight: bold">State Name</div>
                                <?php echo $data[0]['StateNameID'];?>
                            </div>
                            <div class="col-sm-6  mb-3">
                                <div style="font-weight: bold">District Name</div>
                               <?php echo $data[0]['DistrictNameID'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold">Area Name</div>
                                <?php echo $data[0]['AreaNameID'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold">PinCode </div>
                                <?php echo $data[0]['PinCode'];?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold">EntryDate </div>
                                <?php echo $data[0]['EntryDate'];?>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold">Joined On </div>
                                <?php echo $data[0]['CreatedOn'];?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-sm-12 mb-3" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <a href="<?php echo URL;?>dashboard.php?action=profile/edit" class="btn btn-primary">Edit</a>            
            </div>
    </form>
<div class="modal" id="page_popup" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="page_popup_content" style="text-align: center;padding:30px;">
        <img src="<?php echo URL;?>assets/gif/spinner.gif" style="width:80px;margin:0px auto">
        Processing ...
    </div>
  </div>
</div>                            
<script>
</script> 