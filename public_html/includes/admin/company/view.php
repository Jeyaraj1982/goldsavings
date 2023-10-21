<?php
    $data = $mysql->select("select * from _tbl_companies where CompanyID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">View Company</h1>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['CompanyID'];?>" name="CompanyID">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Company Code</div>
                                <?php echo $data[0]['CompanyCode'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Company Name </div>
                                    <?php echo $data[0]['CompanyName'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">GSTIN </div>
                                    <?php echo $data[0]['GSTIN'];?>
                            </div>
                            <div class="col-sm-12">
                                 <div style="font-weight: bold;">Logo </div>
                                 <input type="file" value="<?php echo $data[0]['Logo'];?>" readonly="readonly" name="Logo" id="Logo" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row"> 
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Email ID </div> 
                                <?php echo $data[0]['EmailID'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Website Name </div>
                                 https:// <?php echo $data[0]['WebsiteName'];?>
                                </div>
                            </div>
                           <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold">Mobile Number</div>
                                +91 <?php echo $data[0]['MobileNumber'];?>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold">Whatsapp Number</div>
                                <?php 
                                    if (strlen($data[0]['WhatsappNumber'])>0) {
                                        echo "+91 ".$data[0]['WhatsappNumber'];  
                                    } else {
                                       echo "N/A";     
                                    }
                                ?>
                                </div>
                             <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold">Landline Number </div>
                                   <?php 
                                    if (strlen($data[0]['LandlineNumber'])>0) {
                                        echo "".$data[0]['LandlineNumber'];  
                                    } else {
                                       echo "N/A";     
                                    }
                                ?>
                            </div>
                             <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold">Fax Number </div>
                                   <?php echo $data[0]['FaxNumber'];?>
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
                                <div style="font-weight: bold;">PinCode </div>
                                <?php echo $data[0]['PinCode'];?>
                            </div>
                        </div>
                    </div>
                    </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-6  mb-3">
                                <div style="font-weight: bold;">Currency</div>
                                    <?php echo $data[0]['Currency'];?>
                            </div>
                             <div class="col-sm-6  mb-3">
                                <div style="font-weight: bold;">Currency Symbol</div>
                                    <?php echo $data[0]['CurrencySymbol'];?>
                            </div> 
                              <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Date Format </div>
                                    <?php echo $data[0]['DateFormat'];?>
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <div style="font-weight: bold;">Time Format </div>
                                    <?php echo ($data[0]['TimeFormat']==1) ? " 12hours " : "24hours";?>
                             </div>
                             <div class="col-sm-6">
                                <div style="font-weight: bold;">Time Zone</div>
                                    <?php echo $data[0]['TimeZone'];?>
                            </div>
                              <div class="col-sm-6">         
                                <div style="font-weight: bold;">Status </div>
                                    <?php echo ($data[0]['IsActive']==1) ? " Active " : "Deactivated";?>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                                <div style="font-weight: bold;">Remarks</div>
                                    <?php echo $data[0]['Remarks'];?>
                            </div> 
                        </div>
                    </div>
        </div>
            <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=company/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
            </div>
    </form>                            
</div>