<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">District Names</h1>
            <h6 class="card-subtitle text-muted mb-3">List all district names</h6>
        </div>
        <div class="col-6" style="text-align:right;">
            <button onclick="addForm()" type="button" class="btn btn-primary">New</button>
        </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:50px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:50px">District Code</th>
                                <th>District Name</th>
                                <th>State Name</th>
                                <th>Remark</th>
                                <th style="width:50px">Status</th>
                                <th style="width:300px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="7" style="text-align: center;background:#fff !important">Loading district names ...</td>
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
        <h5 class="modal-title" id="exampleModalLabel">New districtName</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid p-0">
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $data[0][' DistrictNameID'];?>" name="DistrictNameID" id=" DistrictNameID">
        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">District Code <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_districtnames");?>" name="DistrictNameCode" id="DistrictNameCode" class="form-control" placeholder="District Name Code">
                                <span id="ErrDistrictNameCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">District Name <span style='color:red'>*</span></label>
                                <input type="text" name="DistrictName" id="DistrictName" class="form-control" placeholder="District Name">
                                <span id="ErrDistrictName" class="error_msg"></span>
                            </div>
                             <div class="col-sm-12 mb-3">
                                <label class="form-label">State Name <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <select data-live-search="true" data-size="5" name="StateNameID" id="StateNameID" class="form-select mstateselect">
                                        <option>Select State Name</option>
                                    </select>
                                </div>
                                <span id="ErrStateNameID" class="error_msg"></span>
                                <!--<div style="text-align: right;"><a href="<?php echo URL;?>dashboard.php?action=masters/statenames/new">New State Name</a></div>-->
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
        <button type="button" onclick="addNew()" class="btn btn-primary">Create DistrictName</button>
      </div>
    </div>
  </div>
</div> 

<div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit StateName</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form name="frm_edit"  id="frm_edit">
            <input type="hidden" name="DistrictNameID" id="editDistrictNameID">
               <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">District Name Code</label>
                                <input type="text" disabled="disabled" name="DistrictNameCode" id="editDistrictNameCode" value="<?php echo $data[0]['DistrictNameCode'];?>" class="form-control">
                                <span id="ErrDistrictNameCode" class="error_msg"></span>
                            </div>
                            
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">District Name<span style='color:red'>*</span></label>
                                <input type="text" value="" name="DistrictName" id="editDistrictName" class="form-control" placeholder="District Name">
                                <span id="ErrDistrictName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12  mb-3">
                                <label class="form-label">State Name<span style='color:red'>*</span></label>
                                <select data-live-search="true" data-size="5" name="StateNameID" id="editStateNameID" class="form-select mstateselect">
                                    <option>loading...</option>
                                </select>
                                <span id="ErrStateNameID" class="error_msg"></span>
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
                <h5 class="modal-title" id="exampleModalLabel">View StateName</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form name="frm_view"  id="frm_view">
            <input type="hidden" name="DistrictNameID" id="viewDistrictNameID">
               <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">District Name Code</label>
                                <input type="text" disabled="disabled" value="" readonly="readonly" name="DistrictNameCode" id="viewDistrictNameCode" class="form-control">
                                <span id="ErrStateNameCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">District Name<span style='color:red'>*</span></label>
                                <input type="text" value="" readonly="readonly" name="DistrictName" id="viewDistrictName" class="form-control" placeholder="District Name">
                                <span id="ErrDistrictName" class="error_msg"></span>
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
    $.post(URL+ "webservice.php?action=ListAll&method=DistrictNames","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.DistrictNameCode + '</td>'
                            + '<td>' + data.StateName + '</td>'
                            + '<td>' + data.DistrictName + '</td>'
                            + '<td>' + data.Remarks + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                             + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.DistrictNameID+'\')"  class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=masters/districtnames/list_areanamesbydistrictnames&DistrictNameID='+data.DistrictNameID+'" class="btn btn-warning btn-sm" >View AreaNames</a>&nbsp;&nbsp;<a onclick="edit(\''+data.DistrictNameID+'\')" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a onclick="view(\''+data.DistrictNameID+'\')" class="btn btn-success btn-sm">VIEW</a></td>'
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
}  
function addNew() {
     $('#addconfirmation').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['DistrictName','StateName','DistrictNameCode','Remarks','IsActive']);
    $.post(URL+"webservice.php?action=addNew&method=DistrictNames",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#frm_create').trigger("reset");
            if (obj.DistrictNameCode.length>3) {
                $('#DistrictNameCode').val(obj.DistrictNameCode);
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
            $("#StateNameID").val("0");
            setTimeout(function d(){
            },1500);
        } else {
            alert(obj.message);
        }
    });
}
var _StateNameID = "<?php echo $data[0]['StateNameID'];?>";
function edit(ID){
  $('#editForm').modal("show");
  
    $.post(URL+ "webservice.php?action=getData&method=DistrictNames&ID="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#editDistrictNameCode').val(data.DistrictNameCode);
                $('#editStateName').val(data.StateName);
                $('#editDistrictName').val(data.DistrictName);
                $('#editIsActive').val(data.IsActive);
                $('#editRemarks').val(data.Remarks);
                $('#editDistrictNameID').val(data.DistrictNameID);
                listeditStateNames(data.StateNameID);
            });   
}  
  });
} 
function doUpdate() {
     $('#confirmationtoupdate').modal("hide");   
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['DistrictName','StateName','DistrictNameCode','Remarks','IsActive']);
    $.post(URL+"webservice.php?action=doUpdate&method=DistrictNames",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#popupcontent').html(success_content(obj.message));
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            closePopup();
        }
    });
}

function listeditStateNames(StateNameID) {
    $.post(URL+ "webservice.php?action=ListAll&method=StateNames","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select State Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.StateNameID+'">'+data.StateName+'</option>';
            });   
            $('#editStateNameID').html(html);
            $("#editStateNameID").append($("#editStateNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $("#editStateNameID").val(StateNameID);
            setTimeout(function d(){
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function view(ID){
  $('#viewForm').modal("show");
  
  $.post(URL+ "webservice.php?action=getData&method=DistrictNames&ID="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                 $('#viewDistrictNameCode').val(data.DistrictNameCode);
                $('#viewRemarks').val(data.Remarks);
                 $('#viewDistrictNameID').val(data.DistrictNameID);
                 $('#viewStateName').val(data.StateName);
                 $('#viewDistrictName').val(data.DistrictName);
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
    $.post(URL+ "webservice.php?action=remove&method=DistrictNames&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup=d()'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                             + '<td>' + data.DistrictNameCode + '</td>'
                            + '<td>' + data.DistrictName + '</td>'
                            + '<td>' + data.StateName + '</td>'
                            + '<td>' + data.Remarks + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.DistrictNameID+'\')"  class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=masters/districtnames/list_areanamesbydistrictnames&DistrictNameID='+data.DistrictNameID+'" class="btn btn-warning btn-sm" >View AreaNames</a>&nbsp;&nbsp;<a onclick="edit(\''+data.DistrictNameID+'\')" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a onclick="view(\''+data.DistrictNameID+'\')" class="btn btn-success btn-sm">VIEW</a></td>'
                      + '</tr>';
            });   
            $('#tbl_content').html(html);
         
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
      
}

</script>