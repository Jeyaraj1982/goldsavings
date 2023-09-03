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
                                <label class="form-label">Contact Code </label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_apps_addressbook");?>" readonly="readonly" name="ContactCode" id="ContactCode" class="form-control" placeholder="Contact Code">
                                <span id="ErrContactCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Contact Person Name </label>
                                <input type="text" value="<?php echo $data[0]['ContactPersonName'];?>" readonly="readonly" name="ContactPersonName" id="ContactPersonName" class="form-control" placeholder="Contact Person Name">
                                <span id="ErrCustomerName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Business Name</label>
                                <input type="text" value="<?php echo $data[0]['BusinessName'];?>" readonly="readonly" name="BusinessName" id="BusinessName" class="form-control" placeholder="Business Name">
                                <span id="ErrCustomerName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">EmailID </label>
                                <input type="text" value="<?php echo $data[0]['EmailID'];?>" readonly="readonly" name="EmailID" id="EmailID" class="form-control" placeholder="EmailID">
                                <span id="ErrEmailID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Mobile Number </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['MobileNumber'];?>" readonly="readonly" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Mobile Number">
                                </div>
                                <span id="ErrMobileNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Whatsapp Number </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['WhatsappNumber'];?>" readonly="readonly" name="WhatsappNumber" id="WhatsappNumber" class="form-control" placeholder="WhatsappNumber">
                                </div>
                                <span id="ErrWhatsappNumber" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Address Line 1 </label>
                                <input type="text" value="<?php echo $data[0]['AddressLine1'];?>" readonly="readonly" name="AddressLine1" id="AddressLine1" class="form-control" placeholder="Address Line 1">
                                <span id="ErrAddressLine1" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Address Line 2</label>
                                <input type="text" value="<?php echo $data[0]['AddressLine2'];?>" readonly="readonly" name="AddressLine2" id="EstimatedDuration" class="form-control" placeholder="Address Line 2">
                                <span id="ErrAddressLine2" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6  mb-3">
                                <label class="form-label">State Name</label>
                                <input type="text" value="<?php echo $data[0]['StateName'];?>" readonly="readonly" class="form-control" placeholder="Address Line 2">
                            </div>
                            <div class="col-sm-6  mb-3">
                                <label class="form-label">District Name</label>
                                <input type="text" value="<?php echo $data[0]['DistrictName'];?>" readonly="readonly" class="form-control" placeholder="Address Line 2">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Area Name</label>
                                <input type="text" value="<?php echo $data[0]['AreaName'];?>" readonly="readonly" class="form-control" placeholder="Address Line 2">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">PinCode </label>
                                <input type="text" value="<?php echo $data[0]['PinCode'];?>" readonly="readonly" name="PinCode" id="PinCode" class="form-control" placeholder="Pincode">
                                <span id="ErrPinCode" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                     <div class="col-sm-6 mb-3">         
                                <label class="form-label">Is Active </label>
                                <input type="text" value="<?php echo ($data[0]['IsActive']==1) ? " Active " : "Deactivated";?>" readonly="readonly" class="form-control" placeholder="Login Password">
                            </div>
                            <div class="col-sm-6 mb-3">
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" readonly="readonly" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
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