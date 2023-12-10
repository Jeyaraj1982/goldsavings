<?php $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'"); ?>
<div class="container-fluid p-0">
<div class="row">
    <div class="col-6">
        <h1 class="h3">Edit Customers</h1>
    </div>
</div>
    <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['CustomerID'];?>" name="CustomerID">
<div class="row">
    <div class="col-3 col-sm-3 col-xxl-3">
        <?php include_once("customer_side_menu.php"); ?>
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
                        <label class="form-label">Customer ID</label>
                        <input type="text" value="<?php echo $data[0]['CustomerCode'];?>" disabled="disabled"  class="form-control">
                        <span id="ErrCustomerCode" class="error_msg"></span>
                    </div>
                     <div class="col-sm-6 mb-3">
                        <label class="form-label">Entry Date</label>
                        <div class="input-group">
                            <input type="text" readonly="readonly" value="<?php echo date("d-m-Y",strtotime($data[0]["EntryDate"])) ;?>" name="EntryDate" id="EntryDate" class="form-control" placeholder="Entry Date">
                        </div>
                    </div>
                     <div class="col-sm-6 mb-3">
                        <label class="form-label">Customer Type <span style='color:red'>*</span></label>
                        <select data-live-search="true" data-size="5" value="<?php echo $data[0]['CustomerTypeNameID'];?>" name="CustomerTypeNameID" id="CustomerTypeNameID" class="form-select mselect">
                            <option>loading...</option>
                        </select>
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
                                <input type="text" value="<?php echo $data[0]['CustomerName'];?>" name="CustomerName" id="CustomerName" class="form-control" placeholder="Customer Name">
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
                                        3. Maximum 8 characters require <br>
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
                                <span id="ErrPanCardNumber" class="error_msg"></span>
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
                            <div class="col-sm-6 mb-3">         
                                <label class="form-label">Referred By </label>
                                <select name="ReferredBy" id="ReferredBy" class="form-select" placeholder="Referred By" onchange="printLable()">
                                    <option value="0" <?php echo ($data[0]['ReferredBy']==0) ? " selected='selected' " : "";?> >Select Referred By</option> 
                                    <option value="1" <?php echo ($data[0]['ReferredBy']==1) ? " selected='selected' " : "";?> >Customer</option>
                                    <option value="2" <?php echo ($data[0]['ReferredBy']==2) ? " selected='selected' " : "";?> >Employee</option>
                                    <option value="3" <?php echo ($data[0]['ReferredBy']==3) ? " selected='selected' " : "";?> >Salesman</option>
                                </select>
                                <span id="ErrReferredBy" class="error_msg"></span>
                                <script>
                                   function printLable() {
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
                                <div id="mobilefetch" style="display:none;">
                                <label class="form-label"><span id="_printlabel">Mobile Number</span> <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="<?php echo $data[0]['RefMobileNumber'];?>" name="RefMobileNumber" id="RefMobileNumber" class="form-control" placeholder="Mobile Number">
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
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks" maxlength="250">
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
            if (isset($_GET['customer'])) {
                $path.="&customer=".$_GET['customer'];
            }
            ?>
            <a href="<?php echo $path;?>" class="btn btn-outline-primary">Back</a>
               <button onclick="confirmationtoUpdate()" type="button" class="btn btn-primary">Update Customer</button>
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

<div class="modal fade" id="addconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Manage Documents</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid p-0">
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $data[0][' DocumentTypeID'];?>" name="DocumentTypeID" id=" DocumentTypeID">
        <div class="row">
                             <div class="col-sm-12  mb-3">
                                <label class="form-label">Document Type<span style='color:red'>*</span></label>
                                <select data-live-search="true" data-size="5" name="DocumentTypeID" id="DocumentTypeID" class="form-select mstateselect">
                                    <option>loading...</option>
                                </select>
                                <span id="ErrDocumentTypeID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Document File <span style='color:red'>*</span></label>
                                <input type="file" name="DocumentFile" id="DocumentFile" class="form-control" placeholder="Document File">
                                <span id="ErrDocumentFile" class="error_msg"></span>
                            </div>
                             <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Remarks</div>
                                    <div class="mycontainer">
                                        1. Allow all characters, not allow <span style='color:red'>\'!~$"</span><br>
                                        2. Maximum 250 characters require
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
        </div>
    </form>
    </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Attach File</button>
      </div>
    </div>
  </div>
</div> 

<script>
var _BranchID = "<?php echo $data[0]['BranchID'];?>";
var _CustomerTypeNameID = "<?php echo $data[0]['CustomerTypeNameID'];?>";
var _StateNameID = "<?php echo $data[0]['StateNameID'];?>";
var _DistrictNameID = "<?php echo $data[0]['DistrictNameID'];?>";
var _AreaNameID = "<?php echo $data[0]['AreaNameID'];?>";
function confirmationtoUpdate(){
clearDiv(['EnrtyDate','CustomerCode','CustomerTypeNameID','CustomerName','FatherName','Gender','DateOfBirth','EmailID','MobileNumber','WhatsappNumber','AlternativeMobileNumber','AddressLine1','StateNameID','DistrictNameID','AreaNameID','PinCode','RefMobileNumberID','ReferredBy','LoginUserName','LoginPassword','PancardNumber','AadhaarCardNumber']);
  $('#confirmation').modal("show");   
} 
function doUpdate() {
    $('#confirmation').modal("hide");
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['EnrtyDate','CustomerCode','CustomerTypeNameID','CustomerName','FatherName','Gender','DateOfBirth','EmailID','MobileNumber','WhatsappNumber','AlternativeMobileNumber','AddressLine1','StateNameID','DistrictNameID','AreaNameID','PinCode','RefMobileNumberID','ReferredBy','LoginUserName','LoginPassword','PancardNumber','AadhaarCardNumber']);
    
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
function ListBranches() {
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
                if($(this).val() == _BranchID) {
                    $(this).prop("selected", true);
                }
            });
            setTimeout(function(){
                 $("#BranchID").select2({
                  dropdownParent:$('#frm_edit')
              }); 
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function ListCustomerTypes() {
    $.post(URL+ "webservice.php?action=listAllActive&method=CustomerTypes","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select Client Type</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.CustomerTypeNameID+'">'+data.CustomerTypeName+'</option>';
            });   
            $('#CustomerTypeNameID').html(html);
             /*$("#CustomerTypeNameID").append($("#CustomerTypeNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));*/
                
                $('#CustomerTypeNameID option').each(function() {
                    if($(this).val() == _CustomerTypeNameID) {
                        $(this).prop("selected", true);
                    }
                });
                setTimeout(function(){
                 $("#CustomerTypeNameID").select2({
                  dropdownParent:$('#frm_edit')
              });
            
                
            },1500);
        } else {
            alert(obj.message);
        }
        
    });
}

function listStateNames() {
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
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function getDistrictNames() {
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
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function getAreaNames() {
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
            },1500);
        } else {
            alert(obj.message);
        }
    });
} 

function fetchData() {
    $('#confirmation').modal("hide");
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv([,'RefMobileNumberID','RefMobileNumber','ReferredBy','RefferalName']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=fetchRefferalData&method=Customers",
        data: new FormData($("#frm_edit")[0]),
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
    ListBranches();
    ListCustomerTypes();
    listStateNames();
},2000);
</script>