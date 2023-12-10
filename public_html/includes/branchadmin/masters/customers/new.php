<div class="container-fluid p-0">
    <h1 class="h3 mb-3">New Customer</h1>
     <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <input type="hidden" name="CustomerID">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Branch </label>
                                <input type="text" disabled="disabled" value="<?php echo $_SESSION['User']['BranchName'];?>" name="BranchName" id="BranchName" class="form-control" placeholder="Branch">
                            </div>
                            <div class="col-sm-6 mb-3"></div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Customer ID <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Customer ID</div>
                                    <div class="mycontainer">
                                        1. Allow only alphanumeric characters<br>
                                        2. Minimum 8 characters require<br>
                                        3. Maximum 20 characters require<br>
                                        4. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <input type="text" 
                                       value="<?php echo SequnceList::getNextNumber("_tbl_masters_customers");?>" 
                                       name="CustomerCode" 
                                       id="CustomerCode" 
                                       class="form-control" 
                                       placeholder="Customer ID" 
                                       oninput="this.value=this.value.toUpperCase()" 
                                       maxlength="20"
                                       jss-allow-char="AlphaNumeric"
                                       jss-max-length="20"
                                       jss-max-length-error="Maximum allowed 20 characters"
                                       jss-min-length="10"
                                       jss-min-length-error="Minimum 10 characters required"
                                       >
                                <span id="ErrCustomerCode" class="error_msg"></span>
                            </div>
                             <div class="col-sm-6 mb-3">
                                <label class="form-label">Entry Date <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <input type="text" readonly="readonly" value="<?php echo date("d-m-Y");?>" name="EntryDate" id="EntryDate" class="form-control" placeholder="Entry Date">
                                </div>
                                <span id="ErrEntryDate" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Customer Type <span style='color:red'>*</span></label>
                                <div class="input-group">
                                <select data-live-search="true" data-size="5" name="CustomerTypeNameID" id="CustomerTypeNameID" class="form-select mselect">
                                    <option>loading...</option>
                                </select>
                                </div>
                                <span id="ErrCustomerTypeNameID" class="error_msg"></span>
                            </div>
                            
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Customer Name <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Customer Name</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="CustomerName" id="CustomerName" class="form-control" placeholder="Customer Name">
                                <span id="ErrCustomerName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Father/Husband's Name <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Father/Husband's Name</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="FatherName" id="FatherName" class="form-control" placeholder="Father/Husband's Name">
                                <span id="ErrFatherName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Gender <span style='color:red'>*</span></label>
                                <select class="form-select" name="Gender" id="Gender">
                                    <option value="0">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="TransGender">TransGender</option>
                                </select>
                                <span id="ErrGender" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Date Of Birth <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Date Of Birth</div>
                                    <div class="mycontainer">
                                        1. Age must be greater than 18<br>
                                    </div>
                                </div>
                                </label>
                                <input type="text" readonly="readonly" name="DateOfBirth" id="DateOfBirth" class="form-control" placeholder="Date Of Birth">
                                <span id="ErrDateOfBirth" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Email ID <span style='color:red'>*</span></label>
                                <input type="text" style="text-transform: lowercase;" name="EmailID" id="EmailID" class="form-control" placeholder="Email ID">
                                <span id="ErrEmailID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Mobile Number <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Mobile Number" data-masked="" data-inputmask="'mask':'9999999999'">
                                </div>
                                <span id="ErrMobileNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Whatsapp Number </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" name="WhatsappNumber" id="WhatsappNumber" class="form-control" placeholder="Whatsapp Number" data-masked="" data-inputmask="'mask':'9999999999'">
                                </div>
                                <span id="ErrWhatsappNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Alternative Mobile Number </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" name="AlternativeMobileNumber" id="AlternativeMobileNumber" class="form-control" placeholder="Alternative Mobile Number" data-masked="" data-inputmask="'mask':'9999999999'">
                                </div>
                                <span id="ErrAlternativeMobileNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                                <hr>
                            </div>
                            <div class="col-sm-6">         
                                <label class="form-label">Login User Name <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Login Username</div>
                                    <div class="mycontainer">
                                        1. Allow all characters<br>
                                        2. Minimum 6 characters require<br>
                                        3. Maximum 8 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="LoginUserName" id="LoginUserName" class="form-control" placeholder="Login User Name" maxlength="8">
                                <span id="ErrLoginUserName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Login Password <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Login Password</div>
                                    <div class="mycontainer">
                                        1. Allow all characters<br>
                                        2. Not allow special charecters <span style="color:red;">\'!~$"</span><br>
                                        3. Minimum 6 characters require<br>
                                        4. Maximum 8 characters require<br>
                                        5. Not allow cut,copy,paste<br>
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="" name="LoginPassword" id="LoginPassword" class="form-control" placeholder="Login Password" maxlength="8">
                                <span id="ErrLoginPassword" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">                            
                            <div class="col-sm-6">                                                                                                                                     
                                <label class="form-label">PAN Card Number <span style='color:red'>*</span>
                                </label>
                                <input type="text"  name="PancardNumber" id="PancardNumber" class="form-control" placeholder="ABCTY1234D" data-masked="" data-inputmask="'mask':'aaaaa9999a'" style="text-transform: uppercase;">
                                <span id="ErrPancardNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Aadhaar Card Number <span style='color:red'>*</span></label>
                                <input type="text" value="" name="AadhaarCardNumber" id="AadhaarCardNumber" class="form-control" placeholder="Aadhaar Card Number" data-masked="" data-inputmask="'mask':'9999 9999 9999'">
                                <span id="ErrAadhaarCardNumber" class="error_msg"></span>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Address Line 1 <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Address Line 1</div>
                                    <div class="mycontainer">
                                        1. Allow alphanumeric characters<br>
                                        2. Not allow cut,copy,paste<br>
                                        3. Allow only special charecters <span style="color:green;"> #/-.<span>
                                    </div>
                                </div></label>
                                <input type="text" name="AddressLine1" id="AddressLine1" class="form-control" placeholder="Address Line 1">
                                <span id="ErrAddressLine1" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Address Line 2
                                 <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Address Line 2</div>
                                    <div class="mycontainer">
                                        1. Allow alphanumeric characters<br>
                                        2. Not allow cut,copy,paste<br>
                                        3. Allow only special charecters <span style="color:green;"> #/-.<span>
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="AddressLine2" id="AddressLine2" class="form-control" placeholder="Address Line 2">
                                <span id="ErrAddressLine2" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">State Name <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <select data-live-search="true" data-size="5" name="StateNameID" id="StateNameID" class="form-select mstateselect" onchange="getDistrictNames()">
                                        <option>loading...</option>
                                    </select>
                                </div>
                                <span id="ErrStateNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">District Name <span style='color:red'>*</span></label>
                                 <div class="input-group">
                                <select data-live-search="true" data-size="5" name="DistrictNameID" id="DistrictNameID" class="form-select mdistrictselect" onchange="getAreaNames()">
                                    <option>District Name</option>
                                </select>
                                </div>
                                <span id="ErrDistrictNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Area Name <span style='color:red'>*</span></label>
                                  <div class="input-group">
                                <select data-live-search="true" data-size="5" name="AreaNameID" id="AreaNameID" class="form-select mareaselect">
                                    <option>Area Name</option>
                                </select>
                                <button class="btn btn-success" onclick="areanew()" type="button">+</button>
                                </div>
                                <span id="ErrAreaNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Pincode <span style='color:red'>*</span></label>
                                <input type="text" value="" name="PinCode" id="PinCode" class="form-control" placeholder="Pincode" data-masked="" data-inputmask="'mask':'999 999'">
                                <span id="ErrPinCode" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">         
                                <label class="form-label">Referred By </label>
                                <select name="ReferredBy" id="ReferredBy" class="form-select" placeholder="Referred By" onchange="printLable()">
                                    <option value="0">Select Referred By</option> 
                                    <option value="1">Customer</option>
                                    <option value="2">Employee</option>
                                    <option value="3">Salesman</option>
                                </select>
                                <span id="ErrReferredBy" class="error_msg"></span>
                                <script>
                                function printLable() {
                                    $('#mobilefetch').hide();
                                    if ($('#ReferredBy').val()=="1"){
                                        $('#mobilefetch').show();
                                        $('#_printlabel').html("Customer's Mobile Number");    
                                    }
                                    if ($('#ReferredBy').val()=="2"){
                                        $('#mobilefetch').show();
                                        $('#_printlabel').html("Employee's Mobile Number");    
                                    }
                                    if ($('#ReferredBy').val()=="0"){
                                        $('#mobilefetch').hide();  
                                    }
                                    if ($('#ReferredBy').val()=="3"){
                                        $('#mobilefetch').show();
                                        $('#_printlabel').html("Salesman's Mobile Number");    
                                    }
                                }
                                </script>
                            </div>
                            <div class="col-sm-6 mb-3">
                             <div id="mobilefetch" style="display: none;">
                                <label class="form-label"><span id="_printlabel">Mobile Number</span> <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="" name="RefMobileNumber" id="RefMobileNumber" class="form-control" placeholder="Mobile Number" data-masked="" data-inputmask="'mask':'9999999999'">
                                <button onclick='fetchData()' type="button" class="btn btn-primary">Fetch</button>
                                </div>
                                <span id="ErrRefferalName" class="error_msg" style="color: green;"></span>
                                <span id="ErrRefMobileNumber" class="error_msg"></span>
                            </div>  
                        </div>  
                            <div class="col-sm-12">
                                <label class="form-label">Remarks
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Remarks</div>
                                    <div class="mycontainer">
                                        1. Allow all characters, not allow <span style='color:red'>\'!~$"</span><br>
                                        2. Maximum 250 characters require<br>
                                        3. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks" maxlength="250">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div> 
                        </div>
                    </div>
                </div>      
            </div>
            <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=masters/customers/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <button onclick="confirmationtoadd()" type="button" class="btn btn-primary">Create Customer</button>    
            </div>
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
 
 <div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Create ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Yes, Create</button>
      </div>
    </div>
  </div>
</div>
</div>

 <div class="modal fade" id="newstate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form name="frm_create_statename" id="frm_create_statename">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">State Name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-sm-6">
            <label class="form-label">State Name <span style='color:red'>*</span></label>
        <div class="input-group">
            <input type="text" name="StateName" id="StateName" class="form-control" placeholder="State Name">
        </div>
            <span id="ErrStateName" class="error_msg"></span>
        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="addNewStateName()" class="btn btn-primary">Add State Name</button>
      </div>
     </form> 
    </div>
  </div>
</div>

<div class="modal fade" id="newdistrict" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form name="frm_create_districtname" id="frm_create_districtname">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">District Name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="col-sm-6 mb-3">
            <label class="form-label">State Name </label>
            <input type="hidden"  name="StateNameID" id="StateNameByDistrictNameID" class="form-control" value="">
            <input type="text" disabled="disabled" name="StateName" id="StateNameByDistrictName" class="form-control" value="">
        </div>
        <div class="col-sm-6">
            <label class="form-label">District Name <span style='color:red'>*</span></label>
        <div class="input-group">
            <input type="text" name="DistrictName" id="DistrictName" class="form-control" placeholder="District Name">
        </div>
         <span id="ErrDistrictName" class="error_msg"></span>
        </div>
        
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="addNewDistrictName()" class="btn btn-primary">Add District Name</button>
      </div>
     </form> 
    </div>
  </div>
</div>

<div class="modal fade" id="newarea" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form name="frm_create_areaname" id="frm_create_areaname">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">District Name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="col-sm-6 mb-3">
            <label class="form-label">State Name </label>
            <input type="hidden"  name="StateNameID" id="StateNameByDistrictNameModalID" class="form-control" value="">
            <input type="text" disabled="disabled" name="StateName" id="StateNameByDistrictNameModal" class="form-control" value="">
        </div>
        <div class="col-sm-6 mb-3">
            <label class="form-label">District Name </label>
            <input type="hidden"  name="DistrictNameID" id="DistrictNameByAreaNameID" class="form-control" value="">
            <input type="text" disabled="disabled" name="DistrictName" id="DistrictNameByAreaName" class="form-control" value="">
        </div>
        <div class="col-sm-6">
            <label class="form-label">Area Name <span style='color:red'>*</span></label>
        <div class="input-group">
            <input type="text" name="AreaName" id="AreaName" class="form-control" placeholder="Area Name">
        </div>
         <span id="ErrAreaName" class="error_msg"></span>
        </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="addNewAreaName()" class="btn btn-primary">Add Area Name</button>
      </div>
     </form> 
    </div>
  </div>
  </div>


<div class="modal fade" id="newcustomertype" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form name="frm_create_customertype" id="frm_create_customertype">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-sm-6">
            <label class="form-label">Customer Type <span style='color:red'>*</span></label>
        <div class="input-group">
            <input type="text" name="CustomerTypeName" id="CustomerTypeName" class="form-control" placeholder="Customer Type">
        </div>
            <span id="ErrCustomerTypeName" class="error_msg"></span>
        </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="addNewCustomerType()" class="btn btn-primary">Add Customer Type</button>
      </div>
     </form> 
    </div>
  </div>
</div>
<script>
var newcustomercategory="";
var newstatename="";
var newdistrictname="";
var newareaname="";
function confirmationtoadd(){
  $('#confirmation').modal("show");   
}     
function addNew() {
   $('#confirmation').modal("hide"); 
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(["BranchID",'EntryDate','CustomerCode','CustomerTypeNameID','CustomerName','FatherName','Gender','DateOfBirth','EmailID','MobileNumber','WhatsappNumber','AlternativeMobileNumber','AddressLine1','StateNameID','DistrictNameID','AreaNameID','PinCode','RefMobileNumberID','ReferredBy','LoginUserName','LoginPassword','PancardNumber','AadhaarCardNumber','RefferalName']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=Customers",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#CustomerCode').val(obj.CustomerCode);
                $('#popupcontent').html(success_content(obj.message,'closePopup'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message)
                } else {
                    $('#failure_div').html(obj.message);
                }
                $('#process_popup').modal('hide');
             }
        }
    });
}
  
function ListCustomerTypes() {
    var i=0;
    $.post(URL+ "webservice.php?action=listAllActive&method=CustomerTypes","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select Customer Type</option>";
            $.each(obj.data, function (index, data) {
                if ((newcustomercategory==data.CustomerTypeName)) {
                    i=data.CustomerTypeNameID;
                }
                html += '<option value="'+data.CustomerTypeNameID+'" '+((newcustomercategory==data.CustomerTypeName) ? '"selected=selected"' : '')+'>'+data.CustomerTypeName+'</option>';
            });   
            $('#CustomerTypeNameID').html(html);
            /*$("#CustomerTypeNameID").append($("#CustomerTypeNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));*/
           
                 $("#CustomerTypeNameID").val(i);
           
        } else {
            alert(obj.message);
        }
    });
}

function listStateNames() {
    var i=0;
    $.post(URL+ "webservice.php?action=listAllActive&method=StateNames","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select State Name</option>";
            $.each(obj.data, function (index, data) {
                if ((newstatename==data.StateName)) {
                    i=data.StateNameID;
                }
                html += '<option value="'+data.StateNameID+'" '+((newstatename==data.StateName) ? '"selected=selected"' : '')+'>'+data.StateName+'</option>';
            });   
            $('#StateNameID').html(html);
            /*$("#CustomerTypeNameID").append($("#CustomerTypeNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));*/
           
                 $("#StateNameID").val(i);
           
        } else {
            alert(obj.message);
        }
    });
}

function getDistrictNames() {
     var i=0;
    $.post(URL+ "webservice.php?action=listAllActive&method=DistrictNames&StateNameID="+$('#StateNameID').val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select District Name</option>";
            $.each(obj.data, function (index, data) {
                 if ((newdistrictname==data.DistrictName)) {
                    i=data.DistrictNameID;
                }
                html += '<option value="'+data.DistrictNameID+'" '+((newdistrictname==data.DistrictName) ? '"selected=selected"' : '')+'>'+data.DistrictName+'</option>';

            });   
            $('#DistrictNameID').html(html);
            /*$("#DistrictNameID").append($("#DistrictNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            })); */
            $("#DistrictNameID").val(i);
            setTimeout(function(){
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function getAreaNames() {
    var i=0;
    $.post(URL+ "webservice.php?action=listAllActive&method=AreaNames&DistrictNameID="+$('#DistrictNameID').val()+"&StateNameID="+$("#StateNameID").val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select Area Name</option>";
            $.each(obj.data, function (index, data) {
                 if ((newareaname==data.AreaName)) {
                    i=data.AreaNameID;
                }
                html += '<option value="'+data.AreaNameID+'" '+((newareaname==data.AreaName) ? '"selected=selected"' : '')+'>'+data.AreaName+'</option>';
            });   
            $('#AreaNameID').html(html);
            /*$("#AreaNameID").append($("#AreaNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));*/
            $("#AreaNameID").val(i);
            setTimeout(function(){
               // $('.mareaselect').selectpicker();
            },1500);
        } else {
            alert(obj.message);
        }
    });
}   

function statenew(){
  $('#newstate').modal("show");   
}
function addNewStateName() {
     newstatename="";
    var param = $('#frm_create_statename').serialize();
   
    //clearDiv(['StateName','Remarks']);
    $.post(URL+"webservice.php?action=addNew&method=StateNames",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            newstatename=$('#StateName').val();
            $('#frm_create_statename').trigger("reset");
              openPopup();
               $('#newstate').modal("hide");                                   
            $('#popupcontent').html(success_content(obj.message,'closePopup();listStateNames')); 
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
        }
    });
}

function districtnew(){
  $('#newdistrict').modal("show"); 
  $('#StateNameByDistrictNameID').val( $('#StateNameID').val() );  
  $('#StateNameByDistrictName').val( $('#StateNameID  option:selected').text() );  
}
function addNewDistrictName() {
    newdistrictname="";
    var param = $('#frm_create_districtname').serialize();
    clearDiv(['DistricName','StateName','Remarks']);
    $.post(URL+"webservice.php?action=addNew&method=DistrictNames",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            newdistrictname=$('#DistrictName').val();
            $('#frm_create_districtname').trigger("reset");
              openPopup();
               $('#newdistrict').modal("hide");                                   
            $('#popupcontent').html(success_content(obj.message,'closePopup() ; getDistrictNames')); 
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
        }
    });
}

function areanew(){
  $('#newarea').modal("show"); 
 $('#StateNameByDistrictNameModalID').val( $('#StateNameID').val() );  
  $('#StateNameByDistrictNameModal').val( $('#StateNameID  option:selected').text() );
   $('#DistrictNameByAreaNameID').val( $('#DistrictNameID').val() );  
  $('#DistrictNameByAreaName').val( $('#DistrictNameID  option:selected').text() );  
}
function addNewAreaName() {
    newareaname="";
    var param = $('#frm_create_areaname').serialize();
    clearDiv(['DistricName','StateName','AreaName','Remarks']);
    $.post(URL+"webservice.php?action=addNew&method=AreaNames",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
             newareaname=$('#AreaName').val();
            $('#frm_create_areaname').trigger("reset");
              openPopup();
               $('#newarea').modal("hide");                                   
            $('#popupcontent').html(success_content(obj.message,'closePopup() ; getAreaNames')); 
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
        }
    });
}

function customertypenew(){
  $('#newcustomertype').modal("show");   
}
function addNewCustomerType() {
    newcustomercategory="";
    var param = $('#frm_create_customertype').serialize();
   
    //clearDiv(['StateName','Remarks']);
    $.post(URL+"webservice.php?action=addNew&method=CustomerTypes",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            newcustomercategory=$('#CustomerTypeName').val();
            $('#frm_create_customertype').trigger("reset");
              openPopup();
               $('#newcustomertype').modal("hide");                           
            $('#popupcontent').html(success_content(obj.message,'closePopup();ListCustomerTypes')); 
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
        }
    });
}

function fetchData() {
    $('#confirmation').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv([,'RefMobileNumberID','RefMobileNumber','ReferredBy','RefferalName']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=fetchRefferalData&method=Customers",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                 
                   $('#ErrRefferalName').html(obj.Name);
                    $('#process_popup').modal('hide');
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message)
                } else {
                    $('#failure_div').html(obj.message);
                }
                $('#process_popup').modal('hide');
             }
        }
    });

}

setTimeout(function(){
    ListCustomerTypes();
    listStateNames();
},2000);
</script>