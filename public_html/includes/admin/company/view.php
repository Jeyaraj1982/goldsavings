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
                                <label class="form-label">Company Code</label>
                                <input type="text" value="<?php echo $data[0]['CompanyCode'];?>" readonly="readonly"  class="form-control" placeholder="Company Code">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Company Name </label>
                                <input type="text" value="<?php echo $data[0]['CompanyName'];?>" readonly="readonly" name="CompanyName" id="CompanyName" class="form-control" placeholder="Company Name">
                                <span id="ErrCompanyName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">GSTIN </label>
                                <input type="text" value="<?php echo $data[0]['GSTIN'];?>" readonly="readonly" name="GSTIN" id="GSTIN" class="form-control" placeholder="GSTIN">
                                <span id="ErrGSTIN" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                                 <label class="form-label">Logo </label>
                                 <input type="file" value="<?php echo $data[0]['Logo'];?>" readonly="readonly" name="Logo" id="Logo" class="form-control">
                                 <span id="ErrLogo" class="error_msg"></span>
                            </div>
                            </div>
                            </div>
                            </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row"> 
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">EmailID </label>
                                <input type="text" value="<?php echo $data[0]['EmailID'];?>" readonly="readonly" name="EmailID" id="EmailID" class="form-control" placeholder="EmailID">
                                <span id="ErrEmailID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Website Name </label>
                                <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">https://</span>
                                 <input type="text" value="<?php echo $data[0]['WebsiteName'];?>" readonly="readonly" name="WebsiteName" id="WebsiteName" class="form-control" placeholder="www.example.com">
                                </div>
                                <span id="ErrWebsiteName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Mobile Number </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['MobileNumber'];?>" readonly="readonly" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Mobile Number">
                                </div>
                                <span id="ErrMobileNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Whatsapp Number </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['WhatsappNumber'];?>" readonly="readonly" name="WhatsappNumber" id="WhatsappNumber" class="form-control" placeholder="WhatsappNumber">
                                </div>
                                <span id="ErrWhatsappNumber" class="error_msg"></span>
                            </div>
                             <div class="col-sm-6 mb-3">
                                <label class="form-label">Landline Number </label>
                                    <input type="text" value="<?php echo $data[0]['LandlineNumber'];?>" readonly="readonly" name="LandlineNumber" id="LandlineNumber" class="form-control" placeholder="Landline Number">
                                <span id="ErrLandlineNumber" class="error_msg"></span>
                            </div>
                             <div class="col-sm-6 mb-3">
                                <label class="form-label">Fax Number </label>
                                    <input type="text" value="<?php echo $data[0]['FaxNumber'];?>" readonly="readonly" name="FaxNumber" id="FaxNumber" class="form-control" placeholder="Fax Number">
                                <span id="ErrFaxNumber" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Address Line 1 </label>
                                <input type="text" value="<?php echo $data[0]['AddressLine1'];?>" readonly="readonly" class="form-control" placeholder="Address Line 1">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Address Line 2</label>
                                <input type="text" value="<?php echo $data[0]['AddressLine2'];?>" readonly="readonly" class="form-control" placeholder="Address Line 2">
                            </div>
                            <div class="col-sm-6  mb-3">
                                <label class="form-label">State Name</label>
                                <input type="text" value="<?php echo $data[0]['StateName'];?>" readonly="readonly" class="form-control" placeholder="State Name">
                            </div>
                            <div class="col-sm-6  mb-3">
                                <label class="form-label">District Name</label>
                                <input type="text" value="<?php echo $data[0]['DistrictName'];?>" readonly="readonly" class="form-control" placeholder="District Name">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Pincode </label>
                                <input type="text" value="<?php echo $data[0]['Pincode'];?>" readonly="readonly" class="form-control" placeholder="Pincode">
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-6  mb-3">
                                <label class="form-label">Currency</label>
                                <input type="text" value="<?php echo $data[0]['Currency'];?>" readonly="readonly" class="form-control" placeholder="Currency">
                            </div>
                             <div class="col-sm-6  mb-3">
                                <label class="form-label">Currency Symbol</label>
                                <input type="text" value="<?php echo $data[0]['CurrencySymbol'];?>" readonly="readonly" class="form-control" placeholder="Currency Symbol">
                            </div> 
                              <div class="col-sm-6 mb-3">
                                <label class="form-label">Date Format </label>
                                <input type="text" value="<?php echo $data[0]['DateFormat'];?>" readonly="readonly" name="Date" id="Date" class="form-control" placeholder="Date">
                                <span id="ErrDateFormat" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <label class="form-label">Time Format </label>
                                <input type="text" value="<?php echo ($data[0]['TimeFormat']==1) ? " 12hours " : "24hours";?>" readonly="readonly" class="form-control" placeholder="Time Format">
                                <span id="ErrTimeFormat" class="error_msg"></span>
                             </div>
                             <div class="col-sm-6  mb-3">
                                <label class="form-label">Time Zone</label>
                                <input type="text" value="<?php echo $data[0]['TimeZone'];?>" readonly="readonly" class="form-control" placeholder="Time Zone">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" readonly="readonly" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=company/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
            </div>
        </div>
    </form>                            
</div>