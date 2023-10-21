<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Employee Category</h1>
            <h6 class="card-subtitle text-muted mb-3">List all Employee Categories</h6>
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
                                <th style="width: 100px;">Code</th>
                                <th>Employee Category</th>
                                <th style="text-align: right; width: 100px;">Employees</th>
                                <th style="width: 70px;">Status</th>
                                <th style="width: 50px;"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="5" style="text-align: center;background:#fff !important">Loading Employee Category...</td>
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
                <h5 class="modal-title" id="exampleModalLabel">New Employee Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                                <label class="form-label">Employee Category Code <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_employee_categories");?>" name="EmployeeCategoryCode" id="EmployeeCategoryCode" class="form-control" placeholder="Employee Category Code">
                                <span id="ErrEmployeeCategoryCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Employee Category Title <span style='color:red'>*</span></label>
                                <input type="text" name="EmployeeCategoryTitle" id="EmployeeCategoryTitle" class="form-control" placeholder="Employee Category Title">
                                <span id="ErrEmployeeCategoryTitle" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" onclick="addNew()" class="btn btn-primary">Create Employee Category</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Employee Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="frm_edit"  id="frm_edit">
                    <input type="hidden" name="EmployeeCategoryID" id="editEmployeeCategoryID">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                                <label class="form-label">Employee Category Code</label>
                                <input type="text" disabled="disabled" value="" name="EmployeeCategoryCode" id="editEmployeeCategoryCode" class="form-control">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Employee Category Title <span style='color:red'>*</span></label>
                                <input type="text" value="" name="EmployeeCategoryTitle" id="editEmployeeCategoryTitle" class="form-control" placeholder="Employee Category Title">
                                <span id="ErreditEmployeeCategoryTitle" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="" name="Remarks" id="editRemarks" class="form-control" placeholder="Remarks">
                                <span id="ErreditRemarks" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Status</label>
                                <select name="IsActive" id="editIsActive" class="form-select">
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' ": "''";?>>Active</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' ": "''";?>>DeActivated</option>
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

<div class="modal fade" id="viewForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Employee Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                 <div class="row">
                           <div class="col-sm-6 mb-3">
                                <label class="form-label">Employee Category Code</label>
                                <input type="text"  value="" name="EmployeeCategoryCode" id="viewEmployeeCategoryCode" readonly="readonly" class="form-control">
                                <span id="ErrEmployeeCategoryCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Employee Category Title </label>
                                <input type="text" value="" readonly="readonly" name="EmployeeCategoryTitle" id="viewEmployeeCategoryTitle" class="form-control" placeholder="Employee Type Title">
                                <span id="ErrEmployeeCategoryCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
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

function addForm(){
  $('#addconfirmation').modal("show"); 
      clearDiv(['EmployeeCategoryCode','EmployeeCategoryTitle','Remarks']);
}  
function addNew() {
    var param = $('#frm_create').serialize();
    clearDiv(['EmployeeCategoryCode','EmployeeCategoryTitle','Remarks']);
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=EmployeeCategories",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                 $('#addconfirmation').modal("hide");
                 openPopup();
                $('#frm_create').trigger("reset");
                $('#EmployeeCategoryCode').val(obj.EmployeeCategoryCode);
                $('#popupcontent').html(success_content(obj.message,"listEmployeeCategory"));
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

function edit(EmployeeCategoryID){
    $('#editForm').modal("show");
        clearDiv(['editEmployeeCategoryTitle','editRemarks']);
    $.post(URL+ "webservice.php?action=getData&method=EmployeeCategories&ID="+EmployeeCategoryID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            $.each(obj.data, function (index, data) {
                $('#editEmployeeCategoryTitle').val(data.EmployeeCategoryTitle);
                $('#editIsActive').val(data.IsActive);
                $('#editRemarks').val(data.Remarks);
                $('#editEmployeeCategoryCode').val(data.EmployeeCategoryCode);
                $('#editEmployeeCategoryID').val(data.EmployeeCategoryID);
            });   
        }  
    });
}
function doUpdate() {
    var param = $('#frm_edit').serialize();
    clearDiv(['editEmployeeCategoryTitle','editRemarks']);
    $.post(URL+"webservice.php?action=doUpdate&method=EmployeeCategories",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
                $('#editForm').modal("hide");
                openPopup();
            //$('#frm_newservice').trigger("reset");
            $('#popupcontent').html(success_content(obj.message,"listEmployeeCategory"));
        } else {
            if (obj.div!="") {
                $('#Erredit'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
           
        }
    });
}

function view(EmployeeCategoryID){
  $('#viewForm').modal("show");
  
  $.post(URL+ "webservice.php?action=getData&method=EmployeeCategories&ID="+EmployeeCategoryID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                 $('#viewEmployeeCategoryTitle').val(data.EmployeeCategoryTitle);
                $('#viewRemarks').val(data.Remarks);
                 $('#viewEmployeeCategoryID').val(data.EmployeeCategoryID);
                 $('#viewEmployeeCategoryCode').val(data.EmployeeCategoryCode);
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

function listEmployeeCategory() {
    openPopup();
    $.post(URL+ "webservice.php?action=listAll&method=EmployeeCategories","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.EmployeeCategoryCode + '</td>'
                            + '<td>' + data.EmployeeCategoryTitle + '</td>'
                             + '<td style="text-align:right">' + data.EmployeeCount + '&nbsp;</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>' 
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.EmployeeCategoryID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.EmployeeCategoryID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.EmployeeCategoryID+'\')">Delete</a>'
                                                 if (data.EmployeeCount>0) {
                                                     html += '<hr style="margin:0px !important">';
                                                     html += '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/employeecategory/list_employeesbycategory&EmployeeID='+data.EmployeeCategoryID+'" >View Employees</a>'
                                                } else if (data.EmployeeCount==0) {
                                                     html += '<hr style="margin:0px !important">';
                                                     html += '<a class="dropdown-item" href="javascript:void(0)" style="color:#888">View Employees</a>';
                                                    }
                                        + '</div>'
                                + '</div>'
                            + '</td>'                                                                                                    
                      + '</tr>';
            });   
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
setTimeout("listEmployeeCategory()",2000);

var RemoveID=0;
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show"); 
}
function Remove(ID) {
     $('#confirmation').modal("hide"); 
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=EmployeeCategories&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                           + '<td>' + data.EmployeeCategoryCode + '</td>'
                            + '<td>' + data.EmployeeCategoryTitle + '</td>'
                             + '<td style="text-align:right">' + data.EmployeeCount + '&nbsp;</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                           + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.EmployeeCategoryID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.EmployeeCategoryID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.EmployeeCategoryID+'\')">Delete</a>'
                                                + '<hr style="margin:0px !important">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/employeecategory/list_employeesbycategory&EmployeeID='+data.EmployeeCategoryID+'" >View Employees</a>'

                                        + '</div>'
                                + '</div>'
                            + '</td>'                                                                                                    
                      + '</tr>';
                          
            });   
            $('#tbl_content').html(html);
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
      
}
</script>