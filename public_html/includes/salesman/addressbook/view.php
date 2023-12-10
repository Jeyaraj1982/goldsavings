<?php
    $data = $mysql->select("select * from _tbl_apps_addressbook where ContactID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">View Contact</h1>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['ContactID'];?>" name="ContactID">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Contact Code </div>
                                <?php echo SequnceList::getNextNumber("_tbl_apps_addressbook");?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Person Name </div>
                               <?php echo $data[0]['ContactPersonName'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Business Name</div>
                                <?php echo $data[0]['BusinessName'];?>
                            </div>
                             <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Email ID </div> 
                                <?php echo $data[0]['EmailID'];?>
                            </div>
                             <div class="col-sm-6">
                                <div style="font-weight: bold">Mobile Number</div>
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
                                <div style="font-weight: bold;">Address Line 1 </div>
                                <?php echo $data[0]['AddressLine1'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold">Address Line 2</div>
                                <?php 
                                    if (strlen($data[0]['AddressLine2'])>0) {
                                        echo " ".$data[0]['AddressLine2'];  
                                    } else {
                                       echo "N/A";     
                                    }
                                ?>
                                </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">Area Name</div>
                                <?php echo $data[0]['AreaName'];?>
                            </div>
                            <div class="col-sm-6  mb-3">
                                <div style="font-weight: bold;">District Name</div>
                                <?php echo $data[0]['DistrictName'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">State Name</div>
                                <?php echo $data[0]['StateName'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">Pincode </div>
                                <?php echo $data[0]['PinCode'];?>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">         
                                <div style="font-weight: bold;">Status </div>
                                <?php echo ($data[0]['IsActive']==1) ? " Active " : "Deactivated";?>
                            </div>
                        <div class="col-sm-6">
                            <div style="font-weight: bold">Remarks</div>
                                <?php 
                                    if (strlen($data[0]['Remarks'])>0) {
                                        echo " ".$data[0]['Remarks'];  
                                    } else {
                                       echo "N/A";     
                                    }
                                ?>
                                </div> 
                        </div>
                    </div>
                </div>
        </div>
        </div>
    </form>
        <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=addressbook/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
        </div>
</div>