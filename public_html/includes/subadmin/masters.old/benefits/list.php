<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Benefits</h1>
            <h6 class="card-subtitle text-muted mb-3">List all Benefits</h6>
        </div>
        <div class="col-6" style="text-align:right;">
            <button onclick="addForm()" type="button" class="btn btn-primary">New</button> 
        </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:100px">Code</th>
                                <th>Benefit Title</th>
                                <th>Remarks</th>
                                <th style="width:50px">Status</th>
                                <th style="width:200px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="5" style="text-align: center;background:#fff !important">Loading Benefits ...</td>
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
                <h5 class="modal-title" id="exampleModalLabel">New Benefit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label">Benefit Code <span style='color:red'>*</span></label>
                            <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_benefits");?>"  name="BenefitCode" id="BenefitCode" class="form-control" placeholder="Benefit Code">
                            <span id="ErrBenefitCode" class="error_msg"></span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label class="form-label">Benefit Title <span style='color:red'>*</span></label>
                            <input type="text" name="BenefitTitle" id="BenefitTitle" class="form-control" placeholder="Benefit Title">
                            <span id="ErrBenefitTitle" class="error_msg"></span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" name="Description" id="Description" class="form-control" placeholder="Description">
                            <span id="ErrDescription" class="error_msg"></span>
                        </div>
                        <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="" readonly="readonly" name="Remarks" id="viewRemarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" onclick="addNew()" class="btn btn-primary">Create Benefit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Benefit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                 <div class="row">
                           <div class="col-sm-12 mb-3">
                                <label class="form-label">Benefit Code </label>
                                <input type="text" value="" readonly="readonly" name="BenefitCode" id="viewBenefitCode" class="form-control" placeholder="Benefit Code">
                                <span id="ErrBenefitCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Benefit Title </label>
                                <input type="text" value="" readonly="readonly" name="BenefitTitle" id="viewBenefitTitle" class="form-control" placeholder="Benefit Title">
                                <span id="ErrBenefitTitle" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" name="Description" id="Description" class="form-control" placeholder="Description">
                            <span id="ErrDescription" class="error_msg"></span>
                        </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="" readonly="readonly" name="Remarks" id="viewRemarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                             <div class="col-sm-6 mb-3">
                                <label class="form-label">IsActive </label>
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
function view(BenefitID){
  $('#viewForm').modal("show");
  
  $.post(URL+ "webservice.php?action=getData&method=Benefits&ID="+BenefitID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                
                 $('#viewBenefitDescription').val(data.BenefitDescription);
                 $('#viewRemarks').val(data.Remarks);
                 $('#BenefitID').val(data.BenefitID);
                 $('#Benefit').val(data.Benefit);
                 $('#viewBenefitCode').val(data.CustomerTypeCode);
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

function edit(BenefitID){
    $('#editForm').modal("show");
    $.post(URL+ "webservice.php?action=getData&method=Benefits&ID="+BenefitID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            $.each(obj.data, function (index, data) {
                $('#editBenefitDescription').val(data.BenefitDescription);
                $('#editIsActive').val(data.IsActive);
                $('#editRemarks').val(data.Remarks);
                $('#editBenefitID').val(data.BenefitID);
                $('#editBenefit').val(data.Benefit);
                $('#editBenefitCode').val(data.BenefitCode);
            });   
        }  
    });
}

function doUpdate() {
    $('#confirmationtoupdate').modal("hide");
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['BenefitDescription','BenefitCode','Benefit','Remarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=Benefits",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(success_content(obj.message,"listBenefits"));
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

function addForm(){
  $('#addconfirmation').modal("show");   
}  

function addNew() {
    $('#addconfirmation').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['BenefitDescription','BenefitCode','Benefit','Remarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=Benefits",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#BenefitCode').val(obj.BenefitCode);
                $('#popupcontent').html(success_content(obj.message,"listBenefits"));
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
 

 


function listBenefits() {
    openPopup();
    $.post(URL+ "webservice.php?action=listAll&method=Benefits","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.BenefitCode + '</td>'
                            + '<td>' + data.BenefitTitle + '</td>'
                            + '<td>' + data.Remarks + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.BenefitID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a onclick="edit(\''+data.BenefitID+'\')" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a onclick="view(\''+data.BenefitID+'\')" class="btn btn-success btn-sm">View</a> </td>'
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

setTimeout("listBenefits()",2000);

var RemoveID="";
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show");   
}
function Remove() {
     $('#confirmation').modal("hide"); 
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=Benefits&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                           + '<td>' + data.BenefitCode + '</td>'
                            + '<td>' + data.BenefitTitle + '</td>'
                            + '<td>' + data.Remarks + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.BenefitID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a onclick="edit(\''+data.BenefitID+'\')" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a onclick="view(\''+data.BenefitID+'\')" class="btn btn-success btn-sm">View</a> </td>'
                      + '</tr>';
            });   
            $('#tbl_content').html(html);
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
      
}
</script>


<div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Benefit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="frm_edit"  id="frm_edit">
                    <input type="hidden" name="BenefitID" id="editBenefitID">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label">Benefit Code</label>
                            <input type="text" disabled="disabled" name="BenefitCode" id="editBenefitCode" class="form-control">
                            <span id="ErrBenefitCode" class="error_msg"></span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label class="form-label">Benefit Title <span style='color:red'>*</span></label>
                            <input type="text" value="" name="BenefitTitle" id="editBenefitTitle" class="form-control" placeholder="Benefit Title">
                            <span id="ErrCustomerTypeName" class="error_msg"></span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" name="Description" id="Description" class="form-control" placeholder="Description">
                            <span id="ErrDescription" class="error_msg"></span>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label class="form-label">Remarks</label>
                            <input type="text" value="" name="Remarks" id="editRemarks" class="form-control" placeholder="Remarks">
                            <span id="ErrRemarks" class="error_msg"></span>
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
                <button onclick="doUpdate()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
            </div>
        </div>
    </div>
</div>