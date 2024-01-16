<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">File Extensions</h1>
            <h6 class="card-subtitle text-muted mb-3">List all file extensions</h6>
        </div>
        <div class="col-6" style="text-align:right;">
            <button onclick="addForm()" type="button" class="btn btn-primary">New</button>
        </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:15px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Code</th>
                                <th>File Extensions</th>
                                <th style="width: 70px;">Status</th>
                                <th style="width: 50px;"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="4" style="text-align: center;background:#fff !important">Loading file-extensions...</td>
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
        <h5 class="modal-title" id="exampleModalLabel">New File Extension</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
        <div class="container-fluid p-0">
            <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $data[0][' FileExtensionID'];?>" name="FileExtensionID" id=" FileExtensionID">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label class="form-label">File Extension Code <span style='color:red'>*</span>
                    <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">File Extension Code</div>
                                    <div class="mycontainer">
                                        1. Allow only alphanumeric characters<br>
                                        2. Minimum 8 characters require<br>
                                        3. Maximum 20 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                    </label>
                    <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_file_extensions");?>" name="ExtensionCode" id="ExtensionCode" class="form-control" placeholder="File Extension Code" maxlength="20" oninput="this.value=this.value.toUpperCase()">
                        <span id="ErrExtensionCode" class="error_msg"></span>
                </div>
                <div class="col-sm-12 mb-3">
                    <label class="form-label">File Extension <span style='color:red'>*</span>
                    <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">File Extension</div>
                                    <div class="mycontainer">
                                        1. Allow only alphanumeric<br>
                                        2. Minimum 1  characters require<br>
                                        3. Maximum 5 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                    </label>
                    <input type="text" name="FileExtension" id="FileExtension" class="form-control" placeholder="File Extension" maxlength="5">
                        <span id="ErrFileExtension" class="error_msg"></span>
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
                    <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks" maxlength="250">
                        <span id="ErrRemarks" class="error_msg"></span>
                </div>
            </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Create File Extension</button>
      </div>
    </div>
  </div>
</div>
 
 <div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit File Extension</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form name="frm_edit"  id="frm_edit">
            <input type="hidden" name="FileExtensionID" id="editFileExtensionID">
               <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">File Extension Code</label>
                                <input type="text" disabled="disabled" value="" name="ExtensionCode" id="editExtensionCode" class="form-control">
                                <span id="ErrExtensionCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">File Extension <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">File Extension</div>
                                    <div class="mycontainer">
                                        1. Allow only alphanumeric<br>
                                        2. Minimum 1 characters require<br>
                                        3. Maximum 5 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="" name="FileExtension" id="editFileExtension" class="form-control" placeholder="File Extension" maxlength="5">
                                <span id="ErreditFileExtension" class="error_msg"></span>
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
                <h5 class="modal-title" id="exampleModalLabel">View File Extension</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
        <div class="modal-body">
            <form name="frm_view"  id="frm_view">
            <input type="hidden" name="FileExtensionID" id="viewFileExtensionID">
    <div class="row">
        <div class="col-sm-6 mb-3">
            <label class="form-label">File Extension Code</label>
            <input type="text" disabled="disabled" readonly="readonly" value="" name="ExtensionCode" id="viewExtensionCode" class="form-control">
                <span id="ErrExtensionCode" class="error_msg"></span>
        </div>
        <div class="col-sm-12 mb-3">
            <label class="form-label">File Extension </label>
             <input type="text" value="" readonly="readonly" name="FileExtension" id="viewFileExtension" class="form-control" placeholder="File Extension">
                <span id="ErrFileExtension" class="error_msg"></span>
        </div>
        <div class="col-sm-12 mb-3">
            <label class="form-label">Remarks</label>
            <input type="text" value="" name="Remarks" id="viewRemarks" readonly="readonly" class="form-control" placeholder="Remarks">
                <span id="ErrRemarks" class="error_msg"></span>
        </div>
        <div class="col-sm-6 mb-3">
            <label class="form-label">Status </label>
            <input type="text" value="" name="viewIsActive" id="viewIsActive" readonly="readonly" class="form-control">
                <span id="ErrIsActive" class="error_msg"></span>
        </div>
    </div>
</form>
    </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        </div>
    </div>
</div>
</div>    
<script>

function listAll() {
    openPopup();
    $.post(URL+ "webservice.php?action=listAll&method=FileExtensions","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.ExtensionCode + '</td>'
                            + '<td>' + data.FileExtension + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.FileExtensionID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.FileExtensionID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.FileExtensionID+'\')">Delete</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
            });
            if(obj.data.legth==0){
                    html +=  '<tr>'
                    + '<td colspan="4" style="text-align: center;background:#fff !important">No data found</td>'
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
             $('#popupcontent').html(errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}
setTimeout("listAll()",2000);

function addForm(){
  $('#addconfirmation').modal("show");
      clearDiv(['ExtensionCode','FileExtension','Remarks']);
      $('#FileExtension').val("");
      $('#Remarks').val("");
}  
function addNew() {
    openPopup();
    var param = $('#frm_create').serialize();
    clearDiv(['ExtensionCode','FileExtension','Remarks']);
     jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=FileExtensions",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#ExtensionCode').val(obj.ExtensionCode);
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
    
  

function edit(ID){
  $('#editForm').modal("show");
      openPopup();
      clearDiv(['editFileExtension','editRemarks']);
  $.post(URL+ "webservice.php?action=getData&method=FileExtensions&ID="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#editExtensionCode').val(data.ExtensionCode);
                $('#editFileExtension').val(data.FileExtension);
                $('#editIsActive').val(data.IsActive);
                $('#editRemarks').val(data.Remarks);
                $('#editFileExtensionID').val(data.FileExtensionID);
            });   
}  
  }).fail(function(){
        networkunavailable(); 
    });
}   

function doUpdate() {
    var param = $('#frm_edit').serialize();
    clearDiv(['editFileExtension','editRemarks']);
     jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=FileExtensions",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
               var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#editForm').modal("hide");
            openPopup();
            $('#popupcontent').html(success_content(obj.message,'closePopup=listAll()'));
        } else {
            if (obj.div!="") {
                $('#Erredit'+obj.div).html(obj.message);
                $('#process_popup').modal('hide');
            } else {
                   $('#popupcontent').html( errorcontent(obj.message));
                }
              
             }
        },
        error:networkunavailable
    });

}

function view(ID){
  $('#viewForm').modal("show");
  openPopup();
  $.post(URL+ "webservice.php?action=getData&method=FileExtensions&ID="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                 $('#viewExtensionCode').val(data.ExtensionCode);
                $('#viewRemarks').val(data.Remarks);
                 $('#viewFileExtension').val(data.FileExtension);
                 $('#viewFileExtensionID').val(data.FileExtensionID);
                if(data.IsActive=="1"){
                $('#viewIsActive').val("Active");    
                }
                 if(data.IsActive=="0"){
                $('#viewIsActive').val("Deactivated");    
                }
                $('#viewRemarks').val(data.Remarks);
            });   
}  
  }).fail(function(){
        networkunavailable(); 
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
    $.post(URL+ "webservice.php?action=remove&method=FileExtensions&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.ExtensionCode + '</td>'
                            + '<td>' + data.FileExtension + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.FileExtensionID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.FileExtensionID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.FileExtensionID+'\')">Delete</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
                            
            });   
            $('#tbl_content').html(html); 
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    }).fail(function(){
        networkunavailable(); 
    });
      
}
</script>