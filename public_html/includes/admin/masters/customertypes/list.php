<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Customer Types</h1>
            <h6 class="card-subtitle text-muted mb-3">List all customer types</h6>
        </div>
        <div class="col-6" style="text-align:right;">
            <button onclick="addForm()" type="button" class="btn btn-primary">New</button> 
        </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding:15px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 100px;" >Code</th>
                                <th>Customer Type</th>
                                <th style="text-align: right; width: 100px;">Customers</th>
                                <th style="width: 70px;">Status</th>
                                <th style="width: 50px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="5" style="text-align: center;background:#fff !important">Loading customer types ...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
                <button type="button" onclick="Remove()" class="btn btn-danger">Yes, Remove</button>
            </div>
        </div>
    </div>
</div>
 
<div class="modal fade" id="addconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Customer Type </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label">Customer Type Code <span style='color:red'>*</span>
                            <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Customer Type Code</div>
                                    <div class="mycontainer">
                                        1. Allow only alphanumeric characters<br>
                                        2. Minimum 8 characters require<br>
                                        3. Maximum 20 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                            </label>
                            <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_customertypename");?>"  name="CustomerTypeCode" id="CustomerTypeCode" class="form-control" placeholder="Customer Type Code" maxlength="20" oninput="this.value=this.value.toUpperCase()">
                            <span id="ErrCustomerTypeCode" class="error_msg"></span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label class="form-label">Customer Type Name <span style='color:red'>*</span>
                            <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Customer Type Name</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                            </label>
                            <input type="text" name="CustomerTypeName" id="CustomerTypeName" class="form-control" placeholder="Customer Type Name" maxlength="50">
                            <span id="ErrCustomerTypeName" class="error_msg"></span>
                        </div>
                        <div class="col-sm-12 mb-3">
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
                                </div>
                            </label>
                            <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks" maxlength="250">
                            <span id="ErrRemarks" class="error_msg"></span>
                        </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" onclick="addNew()" class="btn btn-primary">Create Customer Type</button>
            </div>
        </div>
    </div>

<div class="modal fade" id="viewForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Customer Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                 <div class="row">
                           <div class="col-sm-12 mb-3">
                                <label class="form-label">Customer Type Code </label>
                                <input type="text" value="" readonly="readonly" name="CustomerTypeCode" id="viewCustomerTypeCode" class="form-control" placeholder="Customer Type Code">
                                <span id="ErrCustomerTypeCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Customer Type Name 
                                </label>
                                <input type="text" value="" readonly="readonly" name="CustomerTypeName" id="viewCustomerTypeName" class="form-control" placeholder="Customer Type Name">
                                <span id="ErrCustomerTypeName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks
                                </label>
                                <input type="text" value="" readonly="readonly" name="Remarks" id="viewRemarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                             <div class="col-sm-6 mb-3">
                                <label class="form-label">Status </label>
                               <input type="text" value="" name="viewIsActive" id="viewIsActive" readonly="readonly" class="form-control">
                                <span id="ErrIsActive" class="error_msg"></span>
                            </div>
                            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
                             
<script>
function view(CustomerTypeNameID){
  $('#viewForm').modal("show");
  
  $.post(URL+ "webservice.php?action=getData&method=CustomerTypes&ID="+CustomerTypeNameID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                 $('#viewCustomerTypeName').val(data.CustomerTypeName);
                $('#viewRemarks').val(data.Remarks);
                 $('#viewCustomerTypeNameID').val(data.CustomerTypeNameID);
                 $('#viewCustomerTypeCode').val(data.CustomerTypeCode);
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

function edit(CustomerTypeNameID){
    $('#editForm').modal("show");
     
        clearDiv(['editCustomerTypeName','editRemarks']);
    $.post(URL+ "webservice.php?action=getData&method=CustomerTypes&ID="+CustomerTypeNameID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            $.each(obj.data, function (index, data) {
                $('#editCustomerTypeName').val(data.CustomerTypeName);
                $('#editIsActive').val(data.IsActive);
                $('#editRemarks').val(data.Remarks);
                $('#editCustomerTypeNameID').val(data.CustomerTypeNameID);
                $('#editCustomerTypeCode').val(data.CustomerTypeCode);
            });   
        }  
    });
}

function doUpdate() {
    var param = $('#frm_edit').serialize();
    clearDiv(['editCustomerTypeName','editRemarks']);
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=CustomerTypes",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                 $('#editForm').modal("hide");
                 openPopup();
                $('#popupcontent').html(success_content(obj.message,"listCustomerTypes"));
             } else {
                if (obj.div!="") {
                    $('#Erredit'+obj.div).html(obj.message)
                } else {
                    $('#failure_div').html(obj.message);
                }
                $('#process_popup').modal('hide');
             }
        }
    });
}

function addForm(){
  $('#addconfirmation').modal("show");
  clearDiv(['CustomerTypeCode','CustomerTypeName','Remarks']);
  $('#CustomerTypeName').val("");
  $('#Remarks').val("");
}  

function addNew() {
    var param = $('#frm_create').serialize();
    clearDiv(['CustomerTypeCode','CustomerTypeName','Remarks']);
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=CustomerTypes",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                  $('#addconfirmation').modal("hide");
                 openPopup();
                $('#frm_create').trigger("reset");
                $('#CustomerTypeCode').val(obj.CustomerTypeCode);
                $('#popupcontent').html(success_content(obj.message,"listCustomerTypes"));
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
 

 


function listCustomerTypes() {
    openPopup();
    $.post(URL+ "webservice.php?action=listAll&method=CustomerTypes","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.CustomerTypeCode + '</td>'
                            + '<td>' + data.CustomerTypeName + '</td>'
                            + '<td style="text-align:right">' + data.CustomerCount + '&nbsp;</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                           + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.CustomerTypeNameID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.CustomerTypeNameID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.CustomerTypeNameID+'\')">Delete</a>';
                                                if (data.CustomerCount>0) {
                                                     html += '<hr style="margin:0px !important">';
                                                     html += '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/customertypes/ list_customersbycategory&CustomerTypeID='+data.CustomerTypeNameID+'" >View Customers</a>';
                                                } else if (data.CustomerCount==0) {
                                                     html += '<hr style="margin:0px !important">';
                                                     html += '<a class="dropdown-item" href="javascript:void(0)" style="color:#888">View Customers</a>';
                                                    }
                                        + '</div>'
                                + '</div>'
                            + '</td>'                                                                                                    
                      + '</tr>';  
              });
            if(obj.data.length==0){
            html += '<tr>'
                + '<td colspan="5" style="text-align: center;background:#fff !important">No data found</td>'
                + '</tr>'
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

setTimeout("listCustomerTypes()",2000);

var RemoveID="";
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show");   
}
function Remove() {
     $('#confirmation').modal("hide"); 
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=CustomerTypes&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                          + '<td>' + data.CustomerTypeCode + '</td>'
                            + '<td>' + data.CustomerTypeName + '</td>'
                             + '<td style="text-align:right">' + data.CustomerCount + '&nbsp;</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.CustomerTypeNameID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.CustomerTypeNameID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.CustomerTypeNameID+'\')">Delete</a>'
                                                + '<hr style="margin:0px !important">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/customertypes/ list_customersbycategory&CustomerTypeID='+data.CustomerTypeNameID+'" >View Customers</a>'

                                        + '</div>'
                                + '</div>'
                            + '</td>'                                                                                                    
                      + '</tr>';  
              });
            if(obj.data.length==0){
            html += '<tr>'
                + '<td colspan="5" style="text-align: center;background:#fff !important">No data found</td>'
                + '</tr>'
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
</script>


<div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Customer Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="frm_edit"  id="frm_edit">
                    <input type="hidden" name="CustomerTypeNameID" id="editCustomerTypeNameID">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label">Customer Type Code</label>
                            <input type="text" disabled="disabled" name="CustomerTypeCode" id="editCustomerTypeCode" class="form-control">
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label class="form-label">Customer Type Name <span style='color:red'>*</span>
                            <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Customer Type Name</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                            </label>
                            <input type="text" value="" name="CustomerTypeName" id="editCustomerTypeName" class="form-control" placeholder="Customer Type Name" maxlength="50">
                            <span id="ErreditCustomerTypeName" class="error_msg"></span>
                        </div>
                        <div class="col-sm-12 mb-3">
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
                            <input type="text" value="" name="Remarks" id="editRemarks" class="form-control" placeholder="Remarks" maxlength="250">
                            <span id="ErreditRemarks" class="error_msg"></span>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="form-label">Status</label>
                            <select name="IsActive" id="editIsActive" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">DeActivated</option>
                            </select>
                        </div>
                    </div>
                </form>           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button onclick="doUpdate()" type="button" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</div>