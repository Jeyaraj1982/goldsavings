<div class="container-fluid p-0">
    <h1 class="h3 mb-3">New Employee</h1>
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Branch <span style='color:red'>*</span></label>
                                <div class="input-group">
                                <select data-live-search="true" data-size="5" name="BranchID" id="BranchID" class="form-select mselect">
                                    <option>loading...</option>
                                </select>
                                </div>
                                <span id="ErrBranchID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label"><span id="_printlabel">Entry Date</span> <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <input type="text" readonly="readonly" value="<?php echo date("d-m-Y");?>" name="EntryDate" id="EntryDate" class="form-control" placeholder="Entry Date">
                                </div>
                                <span id="ErrEntryDate" class="error_msg"></span>
                            </div> 
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Administrator ID <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Administrator ID</div>
                                    <div class="mycontainer">
                                        1. Allow only alphanumeric characters<br>
                                        2. Minimum 8 characters require<br>
                                        3. Maximum 20 characters require<br>
                                        4. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_administrators");?>" name="AdministratorCode" id="AdministratorCode" class="form-control" placeholder="Administrator ID" oninput="this.value=this.value.toUpperCase()" maxlength="20">
                                <span id="ErrAdministratorCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-2 mb-3">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Administrator Name <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Administrator Name</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="AdministratorName" id="AdministratorName" class="form-control" placeholder="Administrator Name">
                                <span id="ErrEmployeeName" class="error_msg"></span>
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
                                <label class="form-label">Gender</label>
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
                            <div class="col-sm-6">
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
                            <div class="col-sm-6 mb-3">         
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
                            <div class="col-sm-6 mb-3">
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
                                <input type="text" name="LoginPassword" id="LoginPassword" class="form-control" placeholder="Login Password" maxlength="8">
                                <span id="ErrLoginPassword" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                                <input type="checkbox" name="AllowToChangePasswordFirstLogin" id="AllowToChangePasswordFirstLogin" value="1">
                                <label class="form-label" for='AllowToChangePasswordFirstLogin'>Allow to change password first login</label>
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
                                <label class="form-label">PAN Card Number <span style='color:red'>*</span></label>
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
                            <div class="col-sm-6">
                                <label class="form-label">State Name <span style='color:red'>*</span></label>
                                <div class="input-group mb-3">
                                    <select data-live-search="true" data-size="5" name="StateNameID" id="StateNameID" class="form-select mstateselect" onchange="getDistrictNames()">
                                        <option>loading...</option>
                                    </select>
                                    <button class="btn btn-success" onclick="statenew()" type="button">+</button>
                                </div>
                                <span id="ErrStateNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">District Name<span style='color:red'>*</span></label>
                                <div class="input-group">
                                <select data-live-search="true" data-size="5" name="DistrictNameID" id="DistrictNameID" class="form-select mdistrictselect" onchange="getAreaNames()">
                                    <option>District Name</option>
                                </select>
                                <button class="btn btn-success" onclick="districtnew()" type="button">+</button>
                                </div>
                                <span id="ErrDistrictNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Area Name<span style='color:red'>*</span></label>
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
                                <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks" maxlength="250">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div> 
                        </div>
                    </div>
                </div>      
            </div>
            <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=masters/administrators/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <button onclick="confirmationtoadd()" type="button" class="btn btn-primary">Create Employee</button>    
            </div>
    </form>
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
        <h5 class="modal-title" id="exampleModalLabel">Area Name</h5>
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


<script> 
var newbranch="";
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
    clearDiv(['EntryDate','AdministratorCode','FatherName','Gender','DateOfBirth','AdministratorName','PanCardAttachment','AadhaarCardAttachment','EmailID','MobileNumber','WhatsappNumber','AddressLine1','AddressLine2','PinCode','ProfilePhoto','StateNameID','DistrictNameID','AreaNameID','PancardNumber', 'AadhaarCardNumber','LoginUserName','LoginPassword','PinCode','Remarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=Administrators",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#AdministratorCode').val(obj.AdministratorCode);
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

function ListBranches() {
    var i=0;
    $.post(URL+ "webservice.php?action=listAllActive&method=Branch","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select Branch</option>";
            $.each(obj.data, function (index, data) {
                if ((newbranch==data.BranchName)) {
                    i=data.BranchID;
                }
                html += '<option value="'+data.BranchID+'" '+((newbranch==data.BranchName) ? '"selected=selected"' : '')+'>'+data.BranchName+'</option>';
            });   
            $('#BranchID').html(html);
            $("#BranchID").val(i);
            setTimeout(function(){
              $("#BranchID").select2({
                  dropdownParent:$('#frm_create')
              });  
            },1000);
           
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
                 setTimeout(function(){
              $("#StateNameID").select2({
                  dropdownParent:$('#frm_create')
              });  
            },1000);
           
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
              $("#DistrictNameID").select2({
                  dropdownParent:$('#frm_create')
              });  
            },1000);
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
            })); */
            $("#AreaNameID").val(i);
           setTimeout(function(){
              $("#AreaNameID").select2({
                  dropdownParent:$('#frm_create')
              });  
            },1000);
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

setTimeout(function(){          
    ListBranches();
    listStateNames();
},2000); 
</script>