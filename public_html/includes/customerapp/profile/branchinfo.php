<?php
    $data = $mysql->select("select * from _tbl_masters_branches where BranchID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">View Branch</h1>
        </div>
     <form id="frm_view" name="frm_view" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['BranchID'];?>" name="BranchID">
    <div class="row">
       <div class="col-12 col-xl-6">
                <div class="card mb-2">
                    <div class="card-body" style="padding:10px 15px">
                        <div class="row">
                            <div class="col-sm-12">
                                <div style="font-weight: bold;">Branch Name</div>
                                <?php echo $data[0]['BranchName'];?>
                            </div>
                             <div class="col-sm-12">
                                <div style="font-weight: bold;">Email ID </div> 
                                <?php echo $data[0]['EmailID'];?>
                            </div>
                             <div class="col-6">
                                <div style="font-weight: bold">Mobile Number</div>
                                +91 <?php echo $data[0]['MobileNumber'];?>
                            </div>
                            <div class="col-6">
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
                <div class="card mb-2">
                    <div class="card-body" style="padding:10px 15px">
                        <div class="row">
                             <div class="col-sm-12">
                                <div style="font-weight: bold;">Address</div>
                                <?php echo $data[0]['AddressLine1'];?>,&nbsp;<?php echo $data[0]['AddressLine2'];?>,&nbsp; <?php echo $data[0]['AreaName'];?>,&nbsp;<?php echo $data[0]['DistrictName'];?>,&nbsp;<?php echo $data[0]['StateName'];?><br>Pincode:&nbsp;<?php echo $data[0]['PinCode'];?>
                            </div>
                        </div>
                    </div>
                </div>
                               </div>
            <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=branch/list" class="btn btn-outline-primary btn-sm" style="font-size: 10px">Back</a>&nbsp;&nbsp;
            </div>
        </div>
    </form>                            
</div>
</div>
