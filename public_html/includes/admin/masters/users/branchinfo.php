<?php
  $data = $mysql->select("select * from _tbl_masters_users where UserID='".$_GET['user']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Branch Info</h1>
        </div>
     <form id="frm_view" name="frm_view" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['BranchID'];?>" name="BranchID">
    <div class="row">
    <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("users_side_menu.php"); ?>
        </div>
        <div class="col-9 col-sm-9 col-xxl-9">
            <?php
                $branch_data = $mysql->select("select * from _tbl_masters_branches where BranchID='".$data[0]['BranchID']."'");
            ?>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Branch ID</div>
                                <?php echo $branch_data[0]['BranchCode'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Branch Name</div>
                                <?php echo $branch_data[0]['BranchName'];?>
                            </div>
                             <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Address Line 1 </div>
                                <?php echo $branch_data[0]['AddressLine1'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold">Address Line 2</div>
                                <?php 
                                    if (strlen($branch_data[0]['AddressLine2'])>0) {
                                        echo " ".$branch_data[0]['AddressLine2'];  
                                    } else {
                                       echo "N/A";     
                                    }
                                ?>
                                </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Area Name</div>
                                <?php echo $branch_data[0]['AreaName'];?>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">District Name</div>
                                <?php echo $branch_data[0]['DistrictName'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">State Name</div>
                                <?php echo $branch_data[0]['StateName'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">Pincode </div>
                                <?php echo $branch_data[0]['PinCode'];?>
                            </div>
                           </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Email ID </div> 
                                <?php echo $branch_data[0]['EmailID'];?>
                            </div>
                             <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold">Mobile Number</div>
                                +91 <?php echo $branch_data[0]['MobileNumber'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold">Whatsapp Number</div>
                                <?php 
                                    if (strlen($branch_data[0]['WhatsappNumber'])>0) {
                                        echo "+91 ".$branch_data[0]['WhatsappNumber'];  
                                    } else {
                                       echo "N/A";     
                                    }
                                ?>
                                </div>  
                        </div>
                    </div>
                </div>
                  
                </div>
            <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=profile/profile" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
            </div>
        </div>
    </form>                            
</div>
</div>
