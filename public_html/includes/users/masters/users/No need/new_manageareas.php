<?php
                                                                                                          
 $data = $mysql->select("select * from _tbl_masters_customers where EmployeeID='".$_GET['employee']."'");?>
    
 <div class="modal fade" id="addconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Area Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid p-0">
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
     <input type="hidden" value="<?php echo $data[0]['EmployeeID'];?>" name="EmployeeID">
      <input type="hidden" value="<?php echo $data[0]['EmployeeName'];?>" name="EmployeeName">
        <div class="row">
            <div class="col-12 col-xl-12">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Customer Name </label>
                                <input type="text" disabled="disabled" value="<?php echo $data[0]['CustomerName'];?>" name="CustomerName" id="CustomerName" class="form-control" placeholder="Customer Name">
                                <span id="ErrCustomerName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Person Name <span style='color:red'>*</span></label>
                                <input type="text" value="" name="PersonName" id="PersonName" class="form-control" placeholder="PersonName">
                                <span id="ErrPersonName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">EmailID </label>
                                <input type="text" value="" name="EmailID" id="EmailID" class="form-control" placeholder="EmailID">
                                <span id="ErrPersonName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Mobile Number <span style='color:red'>*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="" name="MobileNumber" id="MobileNumber" class="form-control" placeholder="MobileNumber">
                                </div>
                                <span id="ErrMobileNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Whatsapp Number </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="" name="WhatsappNumber" id="WhatsappNumber" class="form-control" placeholder="WhatsappNumber">
                                </div>
                                <span id="ErrWhatsappNumber" class="error_msg"></span>
                                </div>
                            <div class="col-sm-6">
                                <label class="form-label">Landline Number </label>
                                <div class="input-group">
                                    <input type="text" value="" name="LandlineNumber" id="LandlineNumber" class="form-control" placeholder="LandlineNumber">
                                </div>
                                <span id="ErrLandlineNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Fax Number </label>
                                <div class="input-group">
                                    <input type="text" value="" name="FaxNumber" id="FaxNumber" class="form-control" placeholder="FaxNumber">
                                </div>
                                <span id="ErrFaxNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Other Contacts </label>
                                <div class="input-group">
                                    <input type="text" value="" name="OtherContacts" id="OtherContacts" class="form-control" placeholder="Other Contacts">
                                </div>
                                <span id="ErrOtherContacts" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                        </div>
                            </div>
                 </div>
            </div>
    </form>
      </div>
        </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Create Contact</button>
      </div>
  </div>
</div>
</div>
<script>
function confirmationtoadd(){
  $('#addconfirmation').modal("show");   
}  
function addNew() {
    $('#addconfirmation').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['PersonName','MobileNumber','WhatsappNumber','EmailID','LandlineNumber','FaxNumber','OtherContacts','Remarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addContact&method=Customers",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#CustomerCode').val(obj.CustomerCode);
                $('#popupcontent').html(success_content(obj.message,"listContacts"));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message);
                } else {
                    $('#failure_div').html(obj.message);
                }
                $('#process_popup').modal('hide');
             }
        }
    });
    /*
    $.post(URL+"webservice.php?action=addNew&method=Customers",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#frm_create').trigger("reset");
            $('#popupcontent').html(successcontent(obj.message));
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
        }
    });
    */
}




setTimeout(function(){
listContacts();   
},2000);
</script>

 <div class="row">
        <div class="col-6">
            <h1 class="h3">Contact Names</h1>
            <h6 class="card-subtitle text-muted mb-3">List all Contact Names</h6>
        </div>
            <div class="col-sm-6" style="text-align:right;">
                <button onclick="confirmationtoadd()" type="button" class="btn btn-primary">New</button>    
            </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:100px">Person Name</th>
                                <th>Mobile Number</th>
                                <th>Whatsapp Number</th>
                                <th>EmailID</th>
                                <th style="width:100px">Status</th>
                                <th style="width:200px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="6" style="text-align: center;background:#fff !important">No Data Found</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="viewContactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Person Name </label>
                                <input type="text" value="" readonly="readonly" name="viewPersonName" id="viewPersonName" class="form-control" placeholder="PersonName">
                                <span id="ErrPersonName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">EmailID </label>
                                <input type="text" value="" readonly="readonly" name="viewEmailID" id="viewEmailID" class="form-control" placeholder="EmailID">
                                <span id="ErrPersonName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Mobile Number </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="" readonly="readonly" name="viewMobileNumber" id="viewMobileNumber" class="form-control" placeholder="MobileNumber">
                                </div>
                                <span id="ErrMobileNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Whatsapp Number </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="" readonly="readonly" name="viewWhatsappNumber" id="viewWhatsappNumber" class="form-control" placeholder="WhatsappNumber">
                                </div>
                                <span id="ErrWhatsappNumber" class="error_msg"></span>
                                </div>
                                <div class="col-sm-6">
                                <label class="form-label">Landline Number </label>
                                <div class="input-group">
                                    <input type="text" value="" readonly="readonly" name="viewLandlineNumber" id="viewLandlineNumber" class="form-control" placeholder="LandlineNumber">
                                </div>
                                <span id="ErrLandlineNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Fax Number </label>
                                <div class="input-group">
                                    <input type="text" value="" readonly="readonly" name="viewFaxNumber" id="viewFaxNumber" class="form-control" placeholder="FaxNumber">
                                </div>
                                <span id="ErrFaxNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">IsActive </label>
                               <input type="text" value="" name="viewIsActive" id="viewIsActive" readonly="readonly" class="form-control">
                                <span id="ErrIsActive" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Other Contacts </label>
                                <div class="input-group">
                                    <input type="text" value="" readonly="readonly" name="viewOtherContacts" id="viewOtherContacts" class="form-control" placeholder="Other Contacts">
                                </div>
                                <span id="ErrOtherContacts" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="" readonly="readonly" name="viewRemarks" id="viewRemarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                        </div>
                            </div>
                           
                       
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editContactModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contact Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form name="frm_edit_contact"  id="frm_edit_Contact">
            <input type="hidden" name="ContactID" id="editContactID">
               <div class="row">
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Person Name <span style='color:red'>*</span></label>
                                <input type="text" value="" name="PersonName" id="editPersonName" class="form-control" placeholder="PersonName">
                                <span id="ErrPersonName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">EmailID </label>
                                <input type="text" value=""  name="EmailID" id="editEmailID" class="form-control" placeholder="EmailID">
                                <span id="ErrPersonName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Mobile Number <span style='color:red'>*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>                                                  
                                    <input type="text" value="" name="MobileNumber" id="editMobileNumber" class="form-control" placeholder="MobileNumber">
                                </div>
                                <span id="ErrMobileNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label">Whatsapp Number </label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">+91</span>
                                    </div>
                                    <input type="text" value="" name="WhatsappNumber" id="editWhatsappNumber" class="form-control" placeholder="WhatsappNumber">
                                </div>
                                <span id="ErrWhatsappNumber" class="error_msg"></span>
                                </div>
                                <div class="col-sm-6">
                                <label class="form-label">Landline Number </label>
                                <div class="input-group">
                                    <input type="text" value="" name="LandlineNumber" id="editLandlineNumber" class="form-control" placeholder="LandlineNumber">
                                </div>
                                <span id="ErrLandlineNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Fax Number </label>
                                <div class="input-group">
                                    <input type="text" value="" name="FaxNumber" id="editFaxNumber" class="form-control" placeholder="FaxNumber">
                                </div>
                                <span id="ErrFaxNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Other  Contacts </label>
                                <div class="input-group">
                                    <input type="text" value="" name="OtherContacts" id="editOtherContacts" class="form-control" placeholder="Other Contacts">
                                </div>
                                <span id="ErrOtherContacts" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <label class="form-label">Is Active </label>
                                <select name="IsActive" id="editIsActive" class="form-select">
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >Active</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >Deactivated</option>
                                </select>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="" name="Remarks" id="editRemarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                        </div>
                            </div>
                </form>           
                       
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button onclick="doContactUpdate()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
            </div>
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
                Do you want to Delete ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" onclick="Remove()" class="btn btn-primary">Yes, Remove</button>
            </div>
        </div>
    </div>
</div>
      
<script>

function viewContact(ContactID){
  $('#viewContactModal').modal("show");
  
  $.post(URL+ "webservice.php?action=viewContact&method=Customers&customer=<?php echo $data[0]['CustomerID'];?>&contact="+ContactID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#viewPersonName').val(data.PersonName);
                $('#viewMobileNumber').val(data.MobileNumber);
                $('#viewWhatsappNumber').val(data.WhatsappNumber);
                $('#viewEmailID').val(data.EmailID);
                $('#viewLandlineNumber').val(data.LandlineNumber);
                $('#viewFaxNumber').val(data.FaxNumber);
                $('#viewOtherContacts').val(data.OtherContacts);
                if(data.IsActive=="1"){
                $('#viewIsActive').val("Active");    
                }
                 if(data.IsActive=="0"){
                $('#viewIsActive').val("Deactivated");    
                }
                $('#viewRemarks').val(data.Remarks);
            });   
}  
  });
}

function editContact(ContactID){
  $('#editContactModal').modal("show");
  
  $.post(URL+ "webservice.php?action=viewContact&method=Customers&customer=<?php echo $data[0]['CustomerID'];?>&contact="+ContactID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = ""; 
            $.each(obj.data, function (index, data) {
                $('#editPersonName').val(data.PersonName);
                $('#editMobileNumber').val(data.MobileNumber);
                $('#editWhatsappNumber').val(data.WhatsappNumber);
                $('#editEmailID').val(data.EmailID);
                $('#editLandlineNumber').val(data.LandlineNumber);
                $('#editFaxNumber').val(data.FaxNumber);
                $('#editOtherContacts').val(data.OtherContacts);
                $('#editIsActive').val(data.IsActive);
                $('#editRemarks').val(data.Remarks);
                $('#editContactID').val(data.ContactID);
                
            });
           
}  
  });
}



function doContactUpdate() {
    $('#confirmationtoupdate').modal("hide");
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['PersonName','MobileNumber','WhatsappNumber','EmailID','LandlineNumber','FaxNumber','OtherContacts','Remarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doContactUpdate&method=Customers",
        data: new FormData($("#frm_edit_Contact")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(success_content(obj.message,"listContacts"));
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
 

function listContacts() {
    openPopup();
    $.post(URL+ "webservice.php?action=listContacts&method=Customers&customer=<?php echo $data[0]['CustomerID'];?>","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.PersonName + '</td>'
                            + '<td>' + data.MobileNumber + '</td>'
                            + '<td>' + data.WhatsappNumber + '</td>'
                            + '<td>' + data.EmailID + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.ContactID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a onclick="viewContact(\''+data.ContactID+'\')" class="btn btn-success btn-sm">View</a>&nbsp;&nbsp;<a onclick="editContact(\''+data.ContactID+'\')" class="btn btn-primary btn-sm">Edit</a></td>'
                      + '</tr>';
            });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="6" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_content').html(html);
            if (($.fn.dataTable.isDataTable("#datatables-fixed-header"))) {
                $("#datatables-fixed-header").DataTable({
                    fixedHeader: true,
                    pageLength: 25
                });
            }
        } else {
            alert(obj.message);
        }
    });
}

    
setTimeout(function(){
    listContacts();
    },2000);
   
   var RemoveID=0;
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show");
} 
function Remove(ID) {
    $('#confirmation').modal("hide");
  openPopup();
    $.post(URL+ "webservice.php?action=removeContact&method=Customers&contact="+RemoveID+"&customer=<?php echo $data[0]['CustomerID'];?>","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,"closePopup"));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.PersonName + '</td>'
                            + '<td>' + data.MobileNumber + '</td>'
                            + '<td>' + data.WhatsappNumber + '</td>'
                            + '<td>' + data.EmailID + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.ContactID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a onclick="viewContact(\''+data.ContactID+'\')" class="btn btn-success btn-sm">View</a>&nbsp;&nbsp;<a onclick="editContact(\''+data.ContactID+'\')" class="btn btn-primary btn-sm">Edit</a></td>'
                      + '</tr>';
            });   
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="6" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            } 
            $('#tbl_content').html(html);
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
}
</script>