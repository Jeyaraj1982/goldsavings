<?php
  $data = $mysql->select("select * from _tbl_employees where EmployeeID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">View Employee</h1>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['CustomerID'];?>" name="CustomerID">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Employee Code</label>
                                <input type="text" value="<?php echo $data[0]['EmployeeCode'];?>" readonly="readonly"  class="form-control">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Profile Photo</label>
                                <div class="row">
                                    <div class="col-sm-12  mb-1">
                                        <img src="<?php echo WEBAPP_URL;?>assets/docs/profiles/<?php echo $data[0]['CustomerID'];?>/<?php echo $data[0]['ProfilePhoto'];?>" style="max-width:100%">
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-6 mb-3">   
                                <label class="form-label">Employee Category<!--<span style='color:red'>*</span>--></label>
                                <input type="text" value="<?php echo $data[0]['EmployeeCategoryTitle'];?>" readonly="readonly"  class="form-control">
                                <span id="ErrEmployeeCategoryID" class="error_msg"></span>
                            </div><!--
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Employee Type</label>
                                <input type="text" value="<?php echo $data[0]['EmployeeTypeName'];?>" readonly="readonly"  class="form-control">
                            </div> -->
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Employee Name</label>
                                <input type="text" value="<?php echo $data[0]['EmployeeName'];?>" readonly="readonly" class="form-control" placeholder="Customer Name">
                            </div><!--
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Business Name</label>
                                <input type="text" value="<?php echo $data[0]['BusinessName'];?>" readonly="readonly" class="form-control" placeholder="Business Name">
                            </div>-->
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Father/Husband's Name<!--<Span style='color:red;'>*</span>--></label>
                                <input type="text" value="<?php echo $data[0]['FatherName'];?>" name="FatherName" id="FatherName" class="form-control" placeholder="Father/Husband's Name">
                                <span id="ErrFatherName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Gender<!--<Span style='color:red;'>*</span>--></label>
                                <select class="form-select" name="Gender" id="Gender">
                                    <option value="Male" <?php echo ($data[0]['Gender']=="Male") ? " selected='selected' " : "";?>>Male</option>
                                    <option value="Female" <?php echo ($data[0]['Gender']=="Female") ? " selected='selected' " : "";?>>Female</option>
                                    <option value="TransGender" <?php echo ($data[0]['Gender']=="TransGender") ? " selected='selected' " : "";?>>TransGender</option>
                                </select>
                                <span id="ErrGender" class="error_msg"></span>
                            </div>
                             <div class="col-sm-6 mb-3">
                                <label class="form-label">Date Of Birth</label>
                                <input type="date" value="<?php echo $data[0]['DateOfBirth'];?>" name="DateOfBirth" id="DateOfBirth" class="form-control" placeholder="Date Of Birth">
                                <span id="ErrDateOfBirth" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">EmailID <!--<span style='color:red'>*</span></label>-->
                                <input type="text" value="<?php echo $data[0]['EmailID'];?>"  readonly="readonly" class="form-control" placeholder="EmailID">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Mobile Number</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['MobileNumber'];?>" readonly="readonly" class="form-control" placeholder="Mobile Number">
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Whatsapp Number <!--<span style='color:red'>*</span>--></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['WhatsappNumber'];?>" readonly="readonly" class="form-control" placeholder="WhatsappNumber">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <hr>
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <label class="form-label">Login User Name</label>
                                <input type="text" value="<?php echo $data[0]['LoginUserName'];?>" readonly="readonly" class="form-control" placeholder="Login User Name">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Login Password</label>
                                <input type="text" value="<?php echo $data[0]['LoginPassword'];?>" readonly="readonly" class="form-control" placeholder="Login Password">
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <label class="form-label">Is Active <!--<span style='color:red'>*</span>--></label>
                                <input type="text" value="<?php echo ($data[0]['IsActive']==1) ? " Active' " : "Deactivated";?>" readonly="readonly" class="form-control" placeholder="Login Password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">                            
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">PAN Card Number <!--<span style='color:red'>*</span>--></label>
                                <input type="text" value="<?php echo $data[0]['PancardNumber'];?>" readonly="readonly" class="form-control" placeholder="Pan Card Number">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">PAN Card Attachment</label>
                                <div class="row">
                                    <div class="col-sm-12  mb-1">
                                        <img src="<?php echo WEBAPP_URL;?>assets/docs/profiles/<?php echo $data[0]['CustomerID'];?>/<?php echo $data[0]['PanCardAttachment'];?>" style="max-width:100%">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Aadhaar Card Number</label>
                                <input type="text" value="<?php echo $data[0]['AadhaarCardNumber'];?>" readonly="readonly" class="form-control" placeholder="Aadhaar Card Number">
                            </div>
                            <div class="col-sm-6 mb-3">
                                 <label class="form-label">Aadhaar Attachment</label>
                                 <div class="row">
                                    <div class="col-sm-12 mb-1">
                                        <img src="<?php echo WEBAPP_URL;?>assets/docs/profiles/<?php echo $data[0]['CustomerID'];?>/<?php echo $data[0]['AadhaarCardAttachment'];?>" style="max-width:100%">
                                    </div>
                                </div>
                            </div> <!--
                            <div class="col-sm-6">
                                <label class="form-label">GSTIN (if have)</label>
                                <input type="text" value="<?php echo $data[0]['GSTIN'];?>" readonly="readonly" class="form-control" placeholder="GSTIN">
                            </div>-->
                            <div class="col-sm-6">
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Address Line 1 <!--<span style='color:red'>*</span>--></label>
                                <input type="text" value="<?php echo $data[0]['AddressLine1'];?>" readonly="readonly" class="form-control" placeholder="Address Line 1">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Address Line 2</label>
                                <input type="text" value="<?php echo $data[0]['AddressLine2'];?>" readonly="readonly" class="form-control" placeholder="Address Line 2">
                            </div>
                            <div class="col-sm-6  mb-3">
                                <label class="form-label">State Name<!--<span style='color:red'>*</span>--></label>
                                <input type="text" value="<?php echo $data[0]['StateName'];?>" readonly="readonly" class="form-control" placeholder="Address Line 2">
                            </div>
                            <div class="col-sm-6  mb-3">
                                <label class="form-label">District Name<!--<span style='color:red'>*</span>--></label>
                                <input type="text" value="<?php echo $data[0]['DistrictName'];?>" readonly="readonly" class="form-control" placeholder="Address Line 2">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Area Name<!--<span style='color:red'>*</span>--></label>
                                <input type="text" value="<?php echo $data[0]['AreaName'];?>" readonly="readonly" class="form-control" placeholder="Address Line 2">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">PinCode <!--<span style='color:red'>*</span>--></label>
                                <input type="text" value="<?php echo $data[0]['PinCode'];?>" readonly="readonly" class="form-control" placeholder="Pincode">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="form-label">Referred By</label>
                                <input type="text" value="<?php echo $data[0]['ReferredBy'];?>"  readonly="readonly"  class="form-control" placeholder="Referred By">
                            </div> -->
                            <div class="col-sm-8">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" readonly="readonly"  class="form-control" placeholder="Remarks">
                            </div> 
                        </div>
                    </div>
                </div>      
            </div>
             <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=masters/employees/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <button onclick="doUpdate()" type="button" class="btn btn-primary">Update Employee</button>
            </div> 
        </div>
    </form>                            
</div>