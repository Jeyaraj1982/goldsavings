<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Document Types</h1>
            <h6 class="card-subtitle text-muted mb-3">List all document types</h6>
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
                                <th>Document Type</th>
                                <th>Remarks</th>
                                <th style="width:100px">Status</th>
                                <th style="width:200px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="5" style="text-align: center;background:#fff !important">Loading document types ...</td>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" onclick="Remove()" class="btn btn-primary">Yes, Remove</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New DocumentType</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                                <label class="form-label">Document Type Code <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_documenttypes");?>" name="DocumentTypeCode" id="DocumentTypeCode" class="form-control" placeholder="Document Type Code">
                                <span id="ErrDocumentTypeCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Document Type Name <span style='color:red'>*</span></label>
                                <input type="text" name="DocumentTypeName" id="DocumentTypeName" class="form-control" placeholder="Document Type Name">
                                <span id="ErrDocumentTypeName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Short Description</label>
                                <input type="text" name="DocumentTypeShortDescription" id="DocumentTypeShortDescription" class="form-control" placeholder="Short Description">
                                <span id="ErrDocumentTypeShortDescription" class="error_msg"></span>
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
                <button type="button" onclick="addNew()" class="btn btn-primary">Create Document Type</button>
            </div>
        </div>
    </div>
</div>
    
<div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Document Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="frm_edit"  id="frm_edit">
                    <input type="hidden" name="DocumentTypeNameID" id="editDocumentTypeNameID">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                                <label class="form-label">Document Type Code</label>
                                <input type="text" disabled="disabled"  name="DocumentTypeCode" id="editDocumentTypeCode" value="<?php echo $data[0]['DocumentTypeCode'];?>" class="form-control">
                                <span id="ErrDocumentTypeCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Document Type Name<span style='color:red'>*</span></label>
                                <input type="text" value="" name="DocumentTypeName" id="editDocumentTypeName" class="form-control" placeholder="Document Type Name">
                                <span id="ErrDocumentTypeName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Short Description</label>
                                <input type="text" value="" name="DocumentTypeShortDescription" id="editDocumentTypeShortDescription" class="form-control" placeholder="Short Description">
                                <span id="ErrDocumentTypeShortDescription" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="" name="Remarks" id="editRemarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
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
                <button onclick="doUpdate()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="viewForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Document Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                 <div class="row">
                           <div class="col-sm-6 mb-3">
                                <label class="form-label">Document Type Code</label>
                                <input type="text" readonly="readonly"  name="DocumentTypeCode" id="viewDocumentTypeCode" value="" class="form-control">
                                <span id="ErrDocumentTypeCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Document Type Name</label>
                                <input type="text" value="" readonly="readonly" name="DocumentTypeName" id="viewDocumentTypeName" class="form-control" placeholder="Document Type Name">
                                <span id="ErrDocumentTypeName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Short Description</label>
                                <input type="text" value="" readonly="readonly" name="DocumentTypeShortDescription" id="viewDocumentTypeShortDescription" class="form-control" placeholder="Short Description">
                                <span id="ErrDocumentTypeShortDescription" class="error_msg"></span>
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
}  
function addNew() {
    $('#addconfirmation').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['DocumentTypeName','DocumentTypeShortDescription','Remarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=DocumentTypes",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#DocumentTypeCode').val(obj.DocumentTypeCode);
                $('#popupcontent').html(success_content(obj.message,"listDocumenttypes"));
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

function listDocumenttypes() {
    openPopup();
    $.post(URL+ "webservice.php?action=listAll&method=DocumentTypes","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.DocumentTypeCode + '</td>'
                            + '<td>' + data.DocumentTypeName + '</td>'
                            + '<td>' + data.Remarks + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.DocumentTypeID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a onclick="edit(\''+data.DocumentTypeID+'\')" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a onclick="view(\''+data.DocumentTypeID+'\')" class="btn btn-success btn-sm">VIEW</a>  </td>'
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
setTimeout("listDocumenttypes()",2000);

function edit(DocumentTypeID){
    $('#editForm').modal("show");
    $.post(URL+ "webservice.php?action=getData&method=DocumentTypes&ID="+DocumentTypeID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            $.each(obj.data, function (index, data) {
                $('#editDocumentTypeName').val(data.DocumentTypeName);
                $('#editIsActive').val(data.IsActive);
                $('#editRemarks').val(data.Remarks);
                $('#editDocumentTypeCode').val(data.DocumentTypeCode);
                $('#editDocumentTypeShortDescription').val(data.DocumentTypeShortDescription);
                $('#editDocumentTypeID').val(data.DocumentTypeID);
            });   
        }  
    });
}
function confirmationtoUpdate(){
  $('#confirmation').modal("show");   
}  
function doUpdate() {
    $('#confirmationtoupdate').modal("hide");
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['DocumentTypeName','DocumentTypeShortDescription','Remarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=DocumentTypes",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(success_content(obj.message,'listDocumenttypes'));
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

function view(DocumentTypeID){
  $('#viewForm').modal("show");
  
  $.post(URL+ "webservice.php?action=getData&method=DocumentTypes&ID="+DocumentTypeID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                 $('#viewDocumentTypeName').val(data.DocumentTypeName);
                 $('#viewDocumentTypeShortDescription').val(data.DocumentTypeShortDescription);
                 $('#viewRemarks').val(data.Remarks);
                 $('#viewDocumentTypeID').val(data.DocumentTypeID);
                 $('#viewDocumentTypeCode').val(data.DocumentTypeCode);
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

var RemoveID="";
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show"); 
}
function Remove() {
     $('#confirmation').modal("hide"); 
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=DocumentTypes&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.DocumentTypeCode + '</td>'
                            + '<td>' + data.DocumentTypeName + '</td>'
                            + '<td>' + data.Remarks + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.DocumentTypeID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a onclick="edit(\''+data.DocumentTypeID+'\')" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a onclick="view(\''+data.DocumentTypeID+'\')" class="btn btn-success btn-sm">VIEW</a>  </td>'
                      + '</tr>';
            });   
            $('#tbl_content').html(html);
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
      
}
</script> 