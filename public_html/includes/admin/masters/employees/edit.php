<?php $data = $mysql->select("select * from _tbl_employees where EmployeeID='".$_GET['employees']."'"); ?>
<div class="container-fluid p-0">
<div class="row">
    <div class="col-6">
        <h1 class="h3">Edit Employee</h1>
    </div>
</div>
    <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['EmployeeID'];?>" name="EmployeeID" id="EmployeeID">
<div class="row">
    <div class="col-3 col-sm-3 col-xxl-3">
        <?php include_once("employee_side_menu.php"); ?>
    </div>
    <div class="col-9 col-sm-9 col-xxl-9">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 mb-3">
                                <label class="form-label">Branch</label>
                                <input type="text" disabled="disabled" value="<?php echo $data[0]['BranchName'];?>" name="BranchName" id="BranchName" class="form-control" placeholder="Branch Name">
                                <span id="ErrBranchName" class="error_msg"></span>
                            </div>
                            
                    <div class="col-sm-6 mb-3"></div>
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Employee ID</label>
                        <input type="text" value="<?php echo $data[0]['EmployeeCode'];?>" disabled="disabled"  class="form-control">
                        <span id="ErrEmployeeCode" class="error_msg"></span>
                    </div>
                     <div class="col-sm-6 mb-3">
                        <label class="form-label">Entry Date <span style='color:red'>*</span></label>
                        <div class="input-group">
                            <input type="date" readonly="readonly" value="<?php echo $data[0]['EntryDate'];?>" name="EntryDate" id="EntryDate" class="form-control" placeholder="Entry Date">
                        </div>
                        <span id="ErrEntryDate" class="error_msg"></span>
                    </div>
                     <div class="col-sm-6 mb-3">
                        <label class="form-label">Employee Category <span style='color:red'>*</span></label>
                        <select data-live-search="true" data-size="5" name="EmployeeCategoryID" id="EmployeeCategoryID" class="form-select mselect">
                            <option>loading...</option>
                        </select>
                        <span id="ErrEmployeeCategoryID" class="error_msg"></span>
                    </div>
                     
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Employee Name <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Employee Name</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="<?php echo $data[0]['EmployeeName'];?>" name="EmployeeName" id="EmployeeName" class="form-control" placeholder="Employee Name">
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
                                <input type="text" value="<?php echo $data[0]['FatherName'];?>" name="FatherName" id="FatherName" class="form-control" placeholder="Father/Husband's Name">
                                <span id="ErrFatherName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Email ID <span style='color:red'>*</span></label>
                                <input type="text" style="text-transform: lowercase;" value="<?php echo $data[0]['EmailID'];?>" name="EmailID" id="EmailID" class="form-control" placeholder="Email ID">
                                <span id="ErrEmailID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Gender <span style='color:red'>*</span></label>
                                <select class="form-select" name="Gender" id="Gender">
                                    <option value="Male" <?php echo ($data[0]['Gender']=="Male") ? " selected='selected' " : "";?>>Male</option>
                                    <option value="Female" <?php echo ($data[0]['Gender']=="Female") ? " selected='selected' " : "";?>>Female</option>
                                    <option value="TransGender" <?php echo ($data[0]['Gender']=="TransGender") ? " selected='selected' " : "";?>>TransGender</option>
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
                                <input type="text" readonly="readonly" name="DateOfBirth" id="DateOfBirth" value="<?php echo date("d-m-Y",strtotime($data[0]['DateOfBirth']));?>" class="form-control" placeholder="Date Of Birth">
                                <span id="ErrDateOfBirth" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Mobile Number <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['MobileNumber'];?>" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Mobile Number" data-masked="" data-inputmask="'mask':'9999999999'">
                                </div>
                                <span id="ErrMobileNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Whatsapp Number </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['WhatsappNumber'];?>" name="WhatsappNumber" id="WhatsappNumber" class="form-control" placeholder="Whatsapp Number" data-masked="" data-inputmask="'mask':'9999999999'">
                                </div>
                                <span id="ErrWhatsappNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Alternative Mobile Number </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['AlternativeMobileNumber'];?>" name="AlternativeMobileNumber" id="AlternativeMobileNumber" class="form-control" placeholder="Alternative Mobile Number" data-masked="" data-inputmask="'mask':'9999999999'">
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
                                <input type="text" value="<?php echo $data[0]['LoginUserName'];?>" name="LoginUserName" id="LoginUserName" class="form-control" placeholder="Login User Name" maxlength="8">
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
                                <input type="text" value="<?php echo $data[0]['LoginPassword'];?>" name="LoginPassword" id="LoginPassword" class="form-control" placeholder="Login Password" maxlength="8">
                                <span id="ErrLoginPassword" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">         
                                <label class="form-label">Status <span style='color:red'>*</span></label>
                                <select name="IsActive" id="IsActive" class="form-select">
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >Active</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >Deactivated</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">                            
                            <div class="col-sm-6">
                                <label class="form-label">PAN Card Number <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['PancardNumber'];?>" name="PancardNumber" id="PancardNumber" class="form-control" placeholder="ABCTY1234D" data-masked="" data-inputmask="'mask':'aaaaa9999a'" style="text-transform: uppercase;">
                                <span id="ErrPancardNumber" class="error_msg"></span>
                                </div>
                            <div class="col-sm-6">
                                <label class="form-label">Aadhaar Card Number <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['AadhaarCardNumber'];?>" name="AadhaarCardNumber" id="AadhaarCardNumber" class="form-control" placeholder="Aadhaar Card Number" data-masked="" data-inputmask="'mask':'9999 9999 9999'">
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
                                <input type="text" value="<?php echo $data[0]['AddressLine1'];?>" name="AddressLine1" id="AddressLine1" class="form-control" placeholder="Address Line 1">
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
                                <input type="text" value="<?php echo $data[0]['AddressLine2'];?>" name="AddressLine2" id="AddressLine2" class="form-control" placeholder="Address Line 2">
                                <span id="ErrAddressLine2" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">State Name <span style='color:red'>*</span></label>
                                    <select data-live-search="true" data-size="5" name="StateNameID" id="StateNameID" class="form-select mstateselect" onchange="getDistrictNames()">
                                        <option>State Name</option>
                                    </select>
                                <span id="ErrStateNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">District Name<span style='color:red'>*</span></label>
                                
                                <select data-live-search="true" data-size="5" name="DistrictNameID" id="DistrictNameID" class="form-select mdistrictselect" onchange="getAreaNames()">
                                    <option>District Name</option>
                                </select>
                                <span id="ErrDistrictNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Area Name<span style='color:red'>*</span></label>
                                 
                                <select data-live-search="true" data-size="5" name="AreaNameID" id="AreaNameID" class="form-select mareaselect">
                                    <option>Area Name</option>
                                </select>
                                <span id="ErrAreaNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Pincode <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['PinCode'];?>" name="PinCode" id="PinCode" class="form-control" placeholder="Pincode" data-masked="" data-inputmask="'mask':'999 999'">
                                <span id="ErrPinCode" class="error_msg"></span>
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
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>"  name="Remarks" id="Remarks" class="form-control" placeholder="Remarks" maxlength="250">
                                <span id="ErrRemarks" class="error_msg"></span>
                        </div> 
                        </div>
                    </div>
                </div>      
            </div>
     </div>
     </div>
       <div class="col-sm-12" style="text-align:right;">
            <?php 
            $path=URL."dashboard.php";
            if (isset($_GET['fpg'])) {
                $path=URL."dashboard.php?action=".$_GET['fpg'];
            }
            if (isset($_GET['employees'])) {
                $path.="&employees=".$_GET['employees'];
            }
            ?>
            <a href="<?php echo $path;?>" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
            <button onclick="confirmationtoUpdate()" type="button" class="btn btn-primary">Update Employee</button>
       </div>
    </form>
    </div>
<div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Update ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="doUpdate()" class="btn btn-primary">Yes, Update</button>
      </div>
     </div>
  </div>                            
</div>


<div class="modal" id="page_popup" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="page_popup_content" style="text-align: center;padding:30px;">
        <img src="<?php echo URL;?>assets/gif/spinner.gif" style="width:80px;margin:0px auto">
        Processing ...
    </div>
  </div>
</div>

<script>
var _EmployeeCategoryID = "<?php echo $data[0]['EmployeeCategoryID'];?>";
var _StateNameID = "<?php echo $data[0]['StateNameID'];?>";
var _DistrictNameID = "<?php echo $data[0]['DistrictNameID'];?>";
var _AreaNameID = "<?php echo $data[0]['AreaNameID'];?>";
function confirmationtoUpdate(){
  $('#confirmation').modal("show");   
} 
function doUpdate() {
    $('#confirmation').modal("hide");
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['EntryDate','EmployeeCode','EmployeeCategoryID','FatherName','Gender','DateOfBirth','EmployeeName','PanCardAttachment','AadhaarCardAttachment','EmailID','MobileNumber','WhatsappNumber','AddressLine1','AddressLine2','PinCode','ProfilePhoto','StateNameID','DistrictNameID','AreaNameID','PancardNumber', 'AadhaarCardNumber','LoginUserName','LoginPassword','PinCode','Remarks']);
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=Employees",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(success_content(obj.message,'closePopup'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message);
                    $('#process_popup').modal('hide');
                } else {
                   $('#popupcontent').html( errorcontent(obj.message));
                }
              
             }
        },
        error:networkunavailable 
    });
}

function ListBranches() {
    openPopup();
    $.post(URL+ "webservice.php?action=listAllActive&method=Branch","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select Branch</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.BranchID+'">'+data.BranchName+'</option>';
            });   
            $('#BranchID').html(html);
            /*$("#StateNameID").append($("#StateNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));*/
            $('#BranchID option').each(function() {
                if($(this).val() == BranchID) {
                    $(this).prop("selected", true);
                }
            });
             setTimeout(function(){
                 $("#BranchID").select2({
                  dropdownParent:$('#frm_edit')
              }); 
             $(".select2-container").each(function() {$(this).css({'z-index':'500'});}); 
            },1500);
            closePopup();
        } else {
           $('#popupcontent').html( errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}

function ListEmployeesCategory() {
    openPopup();
    $.post(URL+ "webservice.php?action=listAllActive&method=EmployeeCategories","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select Category</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.EmployeeCategoryID+'">'+data.EmployeeCategoryTitle+'</option>';
            });   
            $('#EmployeeCategoryID').html(html);
             /*$("#EmployeeCategoryID").append($("#EmployeeCategoryID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));*/
           
                //$('.mselect').selectpicker();
                $('#EmployeeCategoryID option').each(function() {
                    if($(this).val() == _EmployeeCategoryID) {
                        $(this).prop("selected", true);
                    }
                });
                 setTimeout(function(){
                 $("#EmployeeCategoryID").select2({
                  dropdownParent:$('#frm_edit')
              }); 
            $(".select2-container").each(function() {$(this).css({'z-index':'500'});}); 
            },1500);
            closePopup();
        } else {
           $('#popupcontent').html( errorcontent(obj.message));
        }
        
    }).fail(function(){
        networkunavailable(); 
    });
}

function listStateNames() {
    openPopup();
    $.post(URL+ "webservice.php?action=listAllActive&method=StateNames","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select State Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.StateNameID+'">'+data.StateName+'</option>';
            });   
            $('#StateNameID').html(html);
            /*$("#StateNameID").append($("#StateNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));*/
            $('#StateNameID option').each(function() {
                if($(this).val() == _StateNameID) {
                    $(this).prop("selected", true);
                }
            });
            setTimeout(function(){
              $("#StateNameID").select2({
                  dropdownParent:$('#frm_edit')
              });  
              getDistrictNames();
           $(".select2-container").each(function() {$(this).css({'z-index':'500'});}); 
            },1500);
            closePopup();
        } else {
           $('#popupcontent').html( errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}

function getDistrictNames() {
    openPopup();
    $.post(URL+ "webservice.php?action=listAllActive&method=DistrictNames&StateNameID="+$('#StateNameID').val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select District Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.DistrictNameID+'">'+data.DistrictName+'</option>';
            });   
            $('#DistrictNameID').html(html);
            /*$("#DistrictNameID").append($("#DistrictNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            })); */
            $('#DistrictNameID option').each(function() {
                if($(this).val() == _DistrictNameID) {
                    $(this).prop("selected", true);
                }
            });
            setTimeout(function(){
              $("#DistrictNameID").select2({
                  dropdownParent:$('#frm_edit')
              }); 
              getAreaNames(); 
            $(".select2-container").each(function() {$(this).css({'z-index':'500'});}); 
            },1000);
            closePopup();
        } else {
            $('#popupcontent').html( errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}

function getAreaNames() {
    openPopup();
    $.post(URL+ "webservice.php?action=listAllActive&method=AreaNames&DistrictNameID="+$('#DistrictNameID').val()+"&StateNameID="+$("#StateNameID").val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select Area Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.AreaNameID+'">'+data.AreaName+'</option>';
            });   
            $('#AreaNameID').html(html);
            /*$("#AreaNameID").append($("#AreaNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            })); */
            $('#AreaNameID option').each(function() {
                    if($(this).val() == _AreaNameID) {
                        $(this).prop("selected", true);
                    }
            });
            setTimeout(function(){
              $("#AreaNameID").select2({
                  dropdownParent:$('#frm_edit')
              });  
            $(".select2-container").each(function() {$(this).css({'z-index':'500'});}); 
            },1000);
            closePopup();
        } else {
            $('#popupcontent').html( errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
} 

setTimeout(function(){          
    ListBranches();
    ListEmployeesCategory();
    listStateNames();
},2000);
</script>