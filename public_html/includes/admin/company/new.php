<div class="container-fluid p-0">
    <h1 class="h3 mb-3">New Company</h1>
     <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <input type="hidden" name="CompanyID">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Company ID <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Company ID</div>
                                    <div class="mycontainer">
                                        1. Allow only alphanumeric characters<br>
                                        2. Minimum 8 characters require<br>
                                        3. Maximum 20 characters require<br>
                                        4. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_companies");?>" name="CompanyCode" id="CompanyCode" class="form-control" placeholder="Company ID" maxlength="20" oninput="this.value=this.value.toUpperCase()">
                                <span id="ErrCompanyCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Company Name <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Company Name</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="CompanyName" id="CompanyName" class="form-control" placeholder="Company Name">
                                <span id="ErrCompanyName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">GSTIN 
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">GSTIN</div>
                                    <div class="mycontainer">
                                        1. Allow all characters<br>
                                        2. Minimum 8 characters require<br>
                                        3. Maximum 20 characters require<br>
                                        4. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="GSTIN" id="GSTIN" oninput="this.value=this.value.toUpperCase()" class="form-control" placeholder="GSTIN">
                                <span id="ErrGSTIN" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                                 <label class="form-label">Logo </label>
                                 <input type="file" name="Logo" id="Logo" class="form-control">
                                 <span id="ErrLogo" class="error_msg"></span>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row"> 
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Email ID </label>
                                <input type="text" style="text-transform: lowercase;" name="EmailID" id="EmailID" class="form-control" placeholder="Email ID">
                                <span id="ErrEmailID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Website Name </label>
                                <div class="input-group">
                                <span class="input-group-text" id="basic-addon3">https://</span>
                                 <input type="text" name="WebsiteName" id="WebsiteName" class="form-control" placeholder="www.example.com">
                                </div>
                                <span id="ErrWebsiteName" class="error_msg"></span>
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
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Landline Number </label>
                                    <input type="text" name="LandlineNumber" id="LandlineNumber" class="form-control" placeholder="Landline Number">
                                <span id="ErrLandlineNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Fax Number </label>
                                    <input type="text" name="FaxNumber" id="FaxNumber" class="form-control" placeholder="Fax Number">
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
                                <label class="form-label">Address Line 1 <span style='color:red'>*</span>
                                    <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Address Line 1</div>
                                    <div class="mycontainer">
                                        1. Allow alphanumeric characters<br>
                                        2. Not allow cut,copy,paste<br>
                                        3. Allow only special charecters <span style="color:green;"> #/-.<span>
                                    </div>
                                </div>
                                </label>
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
                                    <button class="btn btn-success" onclick="statenew()" type="button">+</button>
                                </div>
                                <span id="ErrStateNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">District Name<span style='color:red'>*</span></label>
                            <div class="input-group">
                                <select data-live-search="true" data-size="5" name="DistrictNameID" id="DistrictNameID" class="form-select mdistrictselect">
                                    <option>District Name</option>
                                </select>
                                    <button class="btn btn-success" onclick="districtnew()" type="button">+</button>
                            </div>
                                <span id="ErrDistrictNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Pincode <span style='color:red'>*</span></label>
                                <input type="text" value="" name="PinCode" id="PinCode" class="form-control" placeholder="Pincode" data-masked="" data-inputmask="'mask':'999 999'">
                                <span id="ErrPinCode" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">         
                                    <label class="form-label">Currency <span style='color:red'>*</span></label>
                                    <select name="Currency" id="Currency" class="form-select" placeholder="Currency">
                                        <option value="0">Select Currency</option> 
                                        <option value="INDIAN_RUPEES">Indian Rupees</option>
                                    </select>
                                    <span id="ErrCurrency" class="error_msg"></span>
                            </div> 
                            <div class="col-sm-6 mb-3">         
                                    <label class="form-label">Currency Symbol <span style='color:red'>*</span></label>
                                    <select name="CurrencySymbol" id="CurrencySymbol" class="form-select" placeholder="Currency Symbol">
                                        <option value="0">Select Currency</option> 
                                        <option value="INR">INR</option>
                                    </select>              
                                    <span id="ErrCurrencySymbol" class="error_msg"></span>
                                 </div> 
                            <div class="col-sm-6 mb-3">
                                    <label class="form-label">Date Format <span style='color:red'>*</span></label>
                                      <select name="DateFormat" id="DateFormat" class="form-select" placeholder="Time Format">
                                        <option value="0">Select Date Format</option> 
                                        <option value="DD/MM/YYYY">DD/MM/YYYY</option>
                                     
                                    </select>
                                    <span id="ErrDateFormat" class="error_msg"></span>
                                </div>
                            <div class="col-sm-6 mb-3">         
                                    <label class="form-label">Time Format <span style='color:red'>*</span></label>
                                    <select name="TimeFormat" id="TimeFormat" class="form-select" placeholder="Time Format">
                                        <option value="0">Select Time Format</option> 
                                        <option value="HOURS_12">12hours</option>
                                        <option value="HOURS_24">24hours</option>
                                    </select>
                                    <span id="ErrTimeFormat" class="error_msg"></span>
                                 </div>
                            <div class="col-sm-6 mb-3">         
                                    <label class="form-label">Time Zone <span style='color:red'>*</span></label>
                                    <select name="TimeZone" id="TimeZone" class="form-select" placeholder="Time Zone">
                                        <option value="0">Select TimeZone</option> 
                                        <option value="Asia/Calcutta">Asia/Calcutta</option>
                                    </select>
                                    <span id="ErrTimeZone" class="error_msg"></span>
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
            <div class="col-12">
                      
            </div>
            <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=company/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <button onclick="confirmationtoadd()" type="button" class="btn btn-primary">Create Company</button>    
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
        <h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
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

<script>
 var newstatename="";
 var newdistrictname="";
function confirmationtoadd(){
  $('#confirmation').modal("show");   
}     
function addNew() {
   $('#confirmation').modal("hide"); 
    var param = $('#frm_create').serialize();
    openPopup();                                                                                                                                                      
    clearDiv(['CompanyCode','CompanyName','GSTIN','EmailID','MobileNumber','WhatsappNumber','LandlineNumber','FaxNumber','WebsiteName','AddressLine1','AddressLine2','Currency','StateNameID','DistrictNameID','CurrencySymbol','DateFormat', 'TimeFormat','TimeZone','CompanyLogo','PinCode','CreatedOn','Remarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=Companies",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#CompanyCode').val(obj.CompanyCode);
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



setTimeout(function(){
    listStateNames();
     },2000);
</script>