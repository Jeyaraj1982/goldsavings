<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">State Names</h1>
            <h6 class="card-subtitle text-muted mb-3">List all state names</h6>
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
                                <th>State Name</th>
                                <th style="width: 70px;">Status</th>
                                <th style="width: 50px;"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="4" style="text-align: center;background:#fff !important">Loading state names ...</td>
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
        <h5 class="modal-title" id="exampleModalLabel">New State Name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid p-0">
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $data[0][' StateNameID'];?>" name="StateNameID" id=" StateNameID">
        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">State Code <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_statenames");?>" name="StateNameCode" id="StateNameCode" class="form-control" placeholder="State Name Code">
                                <span id="ErrStateNameCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">State Name <span style='color:red'>*</span></label>
                                <input type="text" name="StateName" id="StateName" class="form-control" placeholder="State Name">
                                <span id="ErrStateName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
        </div>
    </form>
    </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Create State Name</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit State Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form name="frm_edit"  id="frm_edit">
            <input type="hidden" name="StateNameID" id="editStateNameID">
               <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">State Name Code</label>
                                <input type="text" disabled="disabled" value="" name="StateNameCode" id="editStateNameCode" class="form-control">
                                <span id="ErreditStateNameCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">State Name<span style='color:red'>*</span></label>
                                <input type="text" value="" name="StateName" id="editStateName" class="form-control" placeholder="State Name">
                                <span id="ErreditStateName" class="error_msg"></span>
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
                <h5 class="modal-title" id="exampleModalLabel">View State Name</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form name="frm_view"  id="frm_view">
            <input type="hidden" name="StateNameID" id="viewStateNameID">
               <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">State Name Code</label>
                                <input type="text" disabled="disabled" value="" readonly="readonly" name="StateNameCode" id="viewStateNameCode" class="form-control">
                                <span id="ErrStateNameCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">State Name<span style='color:red'>*</span></label>
                                <input type="text" value="" name="StateName" id="viewStateName" readonly="readonly" class="form-control" placeholder="State Name">
                                <span id="ErrStateName" class="error_msg"></span>
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

function d() {
    openPopup();
    $.post(URL+ "webservice.php?action=ListAll&method=StateNames","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.StateNameCode + '</td>'
                            + '<td>' + data.StateName + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                           + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.StateNameID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.StateNameID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.StateNameID+'\')">Delete</a>'
                                                + '<hr style="margin:0px !important">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/districtnames/list&StateNameID='+data.StateNameID+'" >View District Names</a>' 
                                        + '</div>'
                                + '</div>'
                            + '</td>'                                                                                                    
                      + '</tr>';
            });
            if(obj.data.legth==0){
                    html +=  '<tr>'
                    + '<td colspan="7" style="text-align: center;background:#fff !important">No data found</td>'
                    + '</tr>'
            }   
            $('#tbl_content').html(html);
        } else {
            alert(obj.message);
        }
    });                                           
}
setTimeout("d()",2000);

function addForm(){
  $('#addconfirmation').modal("show");
      clearDiv(['StateName','StateNameCode','Remarks','IsActive']);
}  
function addNew() {
    var param = $('#frm_create').serialize();
    clearDiv(['StateName','StateNameCode','Remarks','IsActive']);
    $.post(URL+"webservice.php?action=addNew&method=StateNames",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#addconfirmation').modal("hide");
             openPopup();
            $('#frm_create').trigger("reset");
            if (obj.StateNameCode.length>3) {
                $('#StateNameCode').val(obj.StateNameCode);
            }
            $('#popupcontent').html(success_content(obj.message,'closePopup=d()')); 
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

function edit(ID){
  $('#editForm').modal("show");
       clearDiv(['editStateName','editStateNameCode','editRemarks','editIsActive']);
    $.post(URL+ "webservice.php?action=getData&method=StateNames&ID="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#editStateNameCode').val(data.StateNameCode);
                $('#editStateName').val(data.StateName);
                $('#editIsActive').val(data.IsActive);
                $('#editRemarks').val(data.Remarks);
                $('#editStateNameID').val(data.StateNameID);
            });   
}  
  });
} 
function doUpdate() {
    var param = $('#frm_edit').serialize();
    clearDiv(['editStateName','editStateNameCode','editRemarks','editIsActive']);
    $.post(URL+"webservice.php?action=doUpdate&method=StateNames",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#editForm').modal("hide"); 
            openPopup();
            //$('#frm_newservice').trigger("reset");
            $('#popupcontent').html(success_content(obj.message,'closePopup=d()'));
        } else {
            if (obj.div!="") {
                $('#Erredit'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            closePopup();
        }
    });
}

function view(ID){
  $('#viewForm').modal("show");
  
  $.post(URL+ "webservice.php?action=getData&method=StateNames&ID="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                 $('#viewStateNameCode').val(data.StateNameCode);
                $('#viewRemarks').val(data.Remarks);
                 $('#viewStateNameID').val(data.StateNameID);
                 $('#viewStateName').val(data.StateName);
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
function Remove(ID) {
     $('#confirmation').modal("hide"); 
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=StateNames&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                             + '<td>' + data.StateNameCode + '</td>'
                            + '<td>' + data.StateName + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.StateNameID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.StateNameID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.StateNameID+'\')">Delete</a>'
                                                + '<hr style="margin:0px !important">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/statenames/list_districtnamesbystatenames&StateNameID='+data.StateNameID+'" >View District Names</a>' 
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
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
      
}
</script>