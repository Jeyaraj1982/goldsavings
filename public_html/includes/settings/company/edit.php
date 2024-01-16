<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Edit Customer</h1>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['CustomerID'];?>" name="CustomerID">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Customer Code</label>
                                <input type="text" value="<?php echo $data[0]['CustomerCode'];?>" disabled="disabled"  class="form-control">
                                <span id="ErrCustomerCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Profile Photo</label>
                                <div class="row">
                                    <div class="col-sm-12  mb-1">
                                        <img src="<?php echo WEBAPP_URL;?>assets/docs/profiles/<?php echo $data[0]['CustomerID'];?>/<?php echo $data[0]['ProfilePhoto'];?>" style="max-width:100%">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Customer Type <span style='color:red'>*</span></label>
                                <div class="input-group mb-3">
                                <select data-live-search="true" data-size="5" name="CustomerTypeNameID" id="CustomerTypeNameID" class="form-select mselect">
                                    <option>loading...</option>
                                </select>
                                <button class="btn btn-success" onclick="customertypenew()" type="button">+</button>
                                <span id="ErrCustomerTypeNameID" class="error_msg"></span>
                            </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                
                                <input type="file" name="ProfilePhoto" id="ProfilePhoto" class="form-control">
                                <span id="ErrProfilePhoto" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Customer Name <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['CustomerName'];?>" name="CustomerName" id="CustomerName" class="form-control" placeholder="Customer Name">
                                <span id="ErrCustomerName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Email ID </label>
                                <input type="text" value="<?php echo $data[0]['EmailID'];?>" name="EmailID" id="EmailID" class="form-control" placeholder="EmailID">
                                <span id="ErrEmailID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Mobile Number <span style='color:red'>*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['MobileNumber'];?>" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="Mobile Number">
                                </div>
                                <span id="ErrMobileNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Whatsapp Number </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['WhatsappNumber'];?>" name="WhatsappNumber" id="WhatsappNumber" class="form-control" placeholder="WhatsappNumber">
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
                                <label class="form-label">Status <span style='color:red'>*</span></label>
                                <select name="IsActive" id="IsActive" class="form-select">
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >Active</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >Deactivated</option>
                                </select>
                                 <span id="ErrIsActive" class="error_msg"></span>
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
                                <label class="form-label">PAN Card Attachment <span style='color:red'>*</span></label>
                                <div class="row">
                                    <div class="col-sm-12  mb-1">
                                        <img src="<?php echo WEBAPP_URL;?>assets/docs/profiles/<?php echo $data[0]['CustomerID'];?>/<?php echo $data[0]['PanCardAttachment'];?>" style="max-width:100%">
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
                                        <img src="<?php echo WEBAPP_URL;?>assets/docs/profiles/<?php echo $data[0]['CustomerID'];?>/<?php echo $data[0]['AadhaarCardAttachment'];?>" style="max-width:100%">
                                    </div>
                                </div>
                                 <input type="file" name="AadhaarCardAttachment" id="AadhaarCardAttachment" class="form-control">
                            </div>
                            <div class="col-sm-6">
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
                                        2. Allow only special charecters <span style="color:green;"> #/-.<span>
                                    </div>
                                </div>
                                </label>
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
                                        2. Allow only special charecters <span style="color:green;"> #/-.<span>
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="<?php echo $data[0]['AddressLine2'];?>" name="AddressLine2" id="EstimatedDuration" class="form-control" placeholder="Address Line 2">
                                <span id="ErrAddressLine2" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">State Name <span style='color:red'>*</span></label>
                                
                                <div class="input-group mb-3">
                                    <select data-live-search="true" data-size="5" name="StateNameID" id="StateNameID" class="form-select mstateselect" onchange="getDistrictNames()">
                                        <option>State Name</option>
                                    </select>
                                    <button class="btn btn-success" onclick="statenew()" type="button">+</button>
                                </div>
                                <span id="ErrStateNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
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
                            <div class="col-sm-6">         
                                <label class="form-label">Referred By <span style='color:red'>*</span></label>
                                <select name="ReferredBy" id="ReferredBy" class="form-select" placeholder="Referred By" onchange="printLable()">
                                    <option value="0" <?php echo ($data[0]['ReferredBy']==0) ? " selected='selected' " : "";?> >Select Referred By</option> 
                                    <option value="1" <?php echo ($data[0]['ReferredBy']==1) ? " selected='selected' " : "";?> >Employee</option>
                                    <option value="2" <?php echo ($data[0]['ReferredBy']==2) ? " selected='selected' " : "";?> >Customer</option>
                                </select>
                                <span id="ErrReferredBy" class="error_msg"></span>
                                <script>
                                function printLable() {
                                    if ($('#ReferredBy').val()=="1"){
                                        $('#_printlabel').html("Employee's Mobile Number");    
                                    }
                                    if ($('#ReferredBy').val()=="2"){
                                        $('#_printlabel').html("Customer's Mobile Number");    
                                    }
                                    if ($('#ReferredBy').val()=="0"){
                                        $('#_printlabel').html("Mobile Number");    
                                    }
                                }
                                </script>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label"><span id="_printlabel">Mobile Number</span> <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['RefMobileNumber'];?>" name="RefMobileNumber" id="RefMobileNumber" class="form-control" placeholder="Mobile Number">
                                </div>
                                <span id="ErrRefMobileNumber" class="error_msg"></span>
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
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks" maxlength="250">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div> 
                        </div>
                    </div>
                </div>      
            </div>
            <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=customers/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <button onclick="confirmationtoUpdate()" type="button" class="btn btn-primary">Update Customer</button>
            </div>
        </div>
    </form>
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
</div>


  

<div class="modal" id="page_popup" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="page_popup_content" style="text-align: center;padding:30px;">
        <img src="<?php echo URL;?>assets/gif/spinner.gif" style="width:80px;margin:0px auto">
        Processing ...
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
</div><br>
<script>
var _CustomerTypeNameID = "<?php echo $data[0]['CustomerTypeNameID'];?>";
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
    clearDiv(['CustomerCode','CustomerTypeNameID','CustomerName','EmailID','MobileNumber','WhatsappNumber','AddressLine1','StateNameID','DistrictNameID','AreaNameID','PinCode','RefMobileNumberID','ReferredBy']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=Customers",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(success_content(obj.message,'closePopup'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message)
                 } else {
                   $('#popupcontent').html( errorcontent(obj.message));
                }
              
             }
        },
        error:networkunavailable 
    });
}

function ListCustomerTypes() {
    $.post(URL+ "webservice.php?action=ListAll&method=CustomerTypes","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select Client Type</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.CustomerTypeNameID+'">'+data.CustomerTypeName+'</option>';
            });   
            $('#CustomerTypeNameID').html(html);
            
            
             $("#CustomerTypeNameID").append($("#CustomerTypeNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            setTimeout(function(){
                //$('.mselect').selectpicker();
                $('#CustomerTypeNameID option').each(function() {
                    if($(this).val() == _CustomerTypeNameID) {
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
            var html = "<option value='0'>Select State Name</option>";
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
            var html = "<option value='0'>Select District Name</option>";
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
            var html = "<option value='0'>Select Area Name</option>";
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

function statenew(){
  $('#newstate').modal("show");   
}
function addNewStateName() {
   
    var param = $('#frm_create_statename').serialize();
   
    //clearDiv(['StateName','Remarks']);
    $.post(URL+"webservice.php?action=addNew&method=StateNames",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
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

function customertypenew(){
  $('#newcustomertype').modal("show");   
}
function addNewCustomerType() {
   
    var param = $('#frm_create_customertype').serialize();
   
    //clearDiv(['StateName','Remarks']);
    $.post(URL+"webservice.php?action=addNew&method=CustomerTypes",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
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

setTimeout(function(){
    ListCustomerTypes();
    listStateNames();
    $('#AddressLine1').keydown(function (e) {
         // alert(e.keyCode);
          if (e.ctrlKey || e.altKey){
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (e.shiftKey) {
                  
                  if (!((key == 51))) {
                    e.preventDefault();
                  }
              } else {
                  if (!((key == 9) || (key == 16) || (key == 50) || (key == 191) || (key == 173) || (key == 190) || (key == 8) || (key == 32) || (key == 46) || (key == 173) || (key == 163) || (key == 109) || (key == 111) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                      e.preventDefault();
                  }
              }
          }
      });
      $('#AddressLine2').keydown(function (e) {
         // alert(e.keyCode);
          if (e.ctrlKey || e.altKey){
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (e.shiftKey) {
                  
                  if (!((key == 51))) {
                    e.preventDefault();
                  }
              } else {
                  if (!((key == 9) || (key == 16) || (key == 50) || (key == 191) || (key == 173) || (key == 190) || (key == 8) || (key == 32) || (key == 46) || (key == 173) || (key == 163) || (key == 109) || (key == 111) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105))) {
                      e.preventDefault();
                  }
              }
          }
      });
},2000);
</script>