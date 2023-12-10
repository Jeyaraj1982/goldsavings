<?php
    $data = $mysql->select("select * from _tbl_employees where EmployeeID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Edit Employee</h1>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['EmployeeID'];?>" name="EmployeeID">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Employee Code</label>
                                <input type="text" value="<?php echo $data[0]['EmployeeCode'];?>" disabled="disabled"  class="form-control">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Profile Photo</label>
                                <div class="row">
                                    <div class="col-sm-12  mb-1">
                                        <img src="<?php echo WEBAPP_URL;?>assets/docs/employees/<?php echo $data[0]['EmployeeID'];?>/<?php echo $data[0]['ProfilePhoto'];?>" style="max-width:100%">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Employee Category<span style='color:red'>*</span></label>
                                <select data-live-search="true" data-size="5" name="EmployeeCategoryID" id="EmployeeCategoryID" class="form-select mselect">
                                    <option>loading...</option>
                                </select>
                                <span id="ErrEmployeeCategoryID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                
                                <input type="file" name="ProfilePhoto" id="ProfilePhoto" class="form-control">
                                <span id="ErrProfilePhoto" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Employee Name <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['EmployeeName'];?>" name="EmployeeName" id="Employee Name" class="form-control" placeholder="Employee Name">
                                <span id="ErrEmployeeName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Father/Husband's Name<Span style='color:red;'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['FatherName'];?>" name="FatherName" id="FatherName" class="form-control" placeholder="Father/Husband's Name">
                                <span id="ErrFatherName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Gender<Span style='color:red;'>*</span></label>
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
                                <label class="form-label">EmailID <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['EmailID'];?>" name="EmailID" id="EmailID" class="form-control" placeholder="EmailID">
                                <span id="ErrEmailID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Mobile Number <span style='color:red'>*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['MobileNumber'];?>" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Mobile Number">
                                </div>
                                <span id="ErrMobileNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Whatsapp Number <span style='color:red'>*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['WhatsappNumber'];?>" name="WhatsappNumber" id="WhatsappNumber" class="form-control" placeholder="Whatsapp Number">
                                </div>
                                <span id="ErrWhatsappNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                                <hr>
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <label class="form-label">Login User Name <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['LoginUserName'];?>" name="LoginUserName" id="LoginUserName" class="form-control" placeholder="Login User Name">
                                <span id="ErrLoginUserName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Login Password <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['LoginPassword'];?>" name="LoginPassword" id="LoginPassword" class="form-control" placeholder="Login Password">
                                <span id="ErrLoginPassword" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <label class="form-label">Is Active <span style='color:red'>*</span></label>
                                <select name="IsActive" id="IsActive" class="form-select">
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >Active</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >Deactivated</option>
                                </select>
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
                                <label class="form-label">PAN Card Number <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['PancardNumber'];?>" name="PancardNumber" id="PancardNumber" class="form-control" placeholder="Pan Card Number">
                                <span id="ErrPancardNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">PAN Card Attachment</label>
                                <div class="row">
                                    <div class="col-sm-12  mb-1">
                                        <img src="<?php echo WEBAPP_URL;?>assets/docs/employees/<?php echo $data[0]['EmployeeID'];?>/<?php echo $data[0]['PanCardAttachment'];?>" style="max-width:100%">
                                    </div>
                                </div>
                                <input type="file" name="PanCardAttachment" id="PanCardAttachment" class="form-control">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Aadhaar Card Number <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['AadhaarCardNumber'];?>" name="AadhaarCardNumber" id="AadhaarCardNumber" class="form-control" placeholder="Aadhaar Card Number">
                                <span id="ErrAadhaarCardNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                 <label class="form-label">Aadhaar Attachment</label>
                                 <div class="row">
                                    <div class="col-sm-12 mb-1">
                                        <img src="<?php echo WEBAPP_URL;?>assets/docs/employees/<?php echo $data[0]['EmployeeID'];?>/<?php echo $data[0]['AadhaarCardAttachment'];?>" style="max-width:100%">
                                    </div>
                                </div>
                                 <input type="file" name="AadhaarCardAttachment" id="AadhaarCardAttachment" class="form-control">
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Address Line 1 <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['AddressLine1'];?>" name="AddressLine1" id="AddressLine1" class="form-control" placeholder="Address Line 1">
                                <span id="ErrAddressLine1" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Address Line 2</label>
                                <input type="text" value="<?php echo $data[0]['AddressLine2'];?>" name="AddressLine2" id="EstimatedDuration" class="form-control" placeholder="Address Line 2">
                                <span id="ErrAddressLine2" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6  mb-3">
                                <label class="form-label">State Name<span style='color:red'>*</span></label>
                                <select data-live-search="true" data-size="5" name="StateNameID" id="StateNameID" class="form-select mstateselect" onchange="getDistrictNames()">
                                    <option>loading...</option>
                                </select>
                                <span id="ErrStateNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6  mb-3">
                                <label class="form-label">District Name<span style='color:red'>*</span></label>
                                <select data-live-search="true" data-size="5" name="DistrictNameID" id="DistrictNameID" class="form-select mdistrictselect" onchange="getAreaNames()">
                                    <option>District Names</option>
                                </select>
                                <span id="ErrDistrictNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Area Name<span style='color:red'>*</span></label>
                                <select data-live-search="true" data-size="5" name="AreaNameID" id="AreaNameID" class="form-select mareaselect">
                                    <option>Area Names</option>
                                </select>
                                <span id="ErrAreaNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">PinCode <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['PinCode'];?>" name="PinCode" id="PinCode" class="form-control" placeholder="Pincode">
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
                                <label class="form-label">Remarks</label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
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

function doUpdate() {
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['EmployeeCode','EmployeeName','EmailID','MobileNumber','WhatsappNumber','AddressLine1','PinCode']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=Employees",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(successcontent(obj.message));
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
    /*
    $.post(URL+"webservice.php?action=doUpdate&method=Customers",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            //$('#frm_newservice').trigger("reset");
            $('#popupcontent').html(successcontent(obj.message));
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            closePopup();
        }
    });
    */
}

function ListEmployeeCategories() {
    $.post(URL+ "webservice.php?action=ListAll&method=EmployeeCategories","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select Category</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.EmployeeCategoryID+'">'+data.EmployeeCategoryTitle+'</option>';
            });   
            $('#EmployeeCategoryID').html(html);
            
            
             $("#EmployeeCategoryID").append($("#EmployeeCategoryID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            setTimeout(function(){
                //$('.mselect').selectpicker();
                $('#EmployeeCategoryID option').each(function() {
                    if($(this).val() == _EmployeeCategoryID) {
                        $(this).prop("selected", true);
                    }
                });
            },1500);
        } else {
            alert(obj.message);
        }
        
    });
}

function listStateNames() {
    $.post(URL+ "webservice.php?action=ListAll&method=StateNames","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select State Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.StateNameID+'">'+data.StateName+'</option>';
            });   
            $('#StateNameID').html(html);
            $("#StateNameID").append($("#StateNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $('#StateNameID option').each(function() {
                if($(this).val() == _StateNameID) {
                    $(this).prop("selected", true);
                }
            });
            setTimeout(function(){
               // $('.mstateselect').selectpicker();
                getDistrictNames();
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function getDistrictNames() {
    $.post(URL+ "webservice.php?action=listDistrictNames&method=DistrictNames&StateNameID="+$('#StateNameID').val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select State Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.DistrictNameID+'">'+data.DistrictName+'</option>';
            });   
            $('#DistrictNameID').html(html);
            $("#DistrictNameID").append($("#DistrictNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $('#DistrictNameID option').each(function() {
                if($(this).val() == _DistrictNameID) {
                    $(this).prop("selected", true);
                }
            });
            setTimeout(function(){
                //$('.mdistrictselect').selectpicker();
                getAreaNames();
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function getAreaNames() {
    $.post(URL+ "webservice.php?action=ListAreaNames&method=AreaNames&DistrictNameID="+$('#DistrictNameID').val()+"&StateNameID="+$("#StateNameID").val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select Area Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.AreaNameID+'">'+data.AreaName+'</option>';
            });   
            $('#AreaNameID').html(html);
            $("#AreaNameID").append($("#AreaNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $('#AreaNameID option').each(function() {
                    if($(this).val() == _AreaNameID) {
                        $(this).prop("selected", true);
                    }
            });
            setTimeout(function(){
                //$('.mareaselect').selectpicker();
            },1500);
        } else {
            alert(obj.message);
        }
    });
}
setTimeout(function(){
    ListEmployeeCategories();
    listStateNames();
},2000);
</script> 