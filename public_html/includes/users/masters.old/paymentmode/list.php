<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Payment Mode</h1>
            <h6 class="card-subtitle text-muted mb-3">List all payment modes</h6>
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
                                <th>Payment Mode</th>
                                <th style="width: 200px;">Linked Bank</th>
                                <th style="width: 70px;">Status</th>
                                <th style="width: 50px;"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="5" style="text-align: center;background:#fff !important">Loading Payment modes...</td>
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
        <h5 class="modal-title" id="exampleModalLabel">New Payment Mode</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid p-0">
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $data[0][' PaymentModeID'];?>" name="PaymentModeID" id=" PaymentModeID">
        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Payment Mode Code <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_paymentmodes");?>" name="PaymentModeCode" id="PaymentModeCode" class="form-control" placeholder="Payment Mode Code">
                                <span id="ErrPaymentModeCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Payment Mode <span style='color:red'>*</span></label>
                                <input type="text" name="PaymentMode" id="PaymentMode" class="form-control" placeholder="Payment Mode">
                                <span id="ErrPaymentMode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Linked Bank A/c </label>
                                <input type="text" name="LinkedBank" id="LinkedBank" class="form-control" placeholder="Linked Bank">
                                <span id="ErrLinkedBank" class="error_msg"></span>
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
        <button type="button" onclick="addNew()" class="btn btn-primary">Create Payment Mode</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Payment Mode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form name="frm_edit"  id="frm_edit">
            <input type="hidden" name="PaymentModeID" id="editPaymentModeID">
               <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Payment Mode Code</label>
                                <input type="text" disabled="disabled" value="" name="PaymentModeCode" id="editPaymentModeCode" class="form-control">
                                <span id="ErreditPaymentModeCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Payment Mode<span style='color:red'>*</span></label>
                                <input type="text" value="" name="PaymentMode" id="editPaymentMode" class="form-control" placeholder="Payment Mode">
                                <span id="ErreditPaymentMode" class="error_msg"></span>
                            </div><div class="col-sm-12 mb-3">
                                <label class="form-label">Linked Bank A/c</label>
                                <input type="text" value="" name="LinkedBank" id="editLinkedBank" class="form-control" placeholder="Linked Bank">
                                <span id="ErreditLinkedBank" class="error_msg"></span>
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
                <h5 class="modal-title" id="exampleModalLabel">View Payment Mode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form name="frm_view"  id="frm_view">
            <input type="hidden" name="StateNameID" id="viewStateNameID">
               <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Payment Mode Code</label>
                                <input type="text" disabled="disabled" value="" readonly="readonly" name="PaymentModeCode" id="viewPaymentModeCode" class="form-control">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Payment Mode</label>
                                <input type="text" value="" name="PaymentMode" id="viewPaymentMode" readonly="readonly" class="form-control" placeholder="Payment Mode">
                            </div><div class="col-sm-12 mb-3">
                                <label class="form-label">Linked Bank A/c</label>
                                <input type="text" value="" name="LinkedBank" id="viewLinkedBank" readonly="readonly" class="form-control" placeholder="Linked Bank">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="" name="Remarks" id="viewRemarks" readonly="readonly" class="form-control" placeholder="Remarks">
                            </div>
                             <div class="col-sm-6 mb-3">
                                <label class="form-label">Status </label>
                               <input type="text" value="" name="viewIsActive" id="viewIsActive" readonly="readonly" class="form-control">
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

function listPaymentmodes() {
    openPopup();
    $.post(URL+ "webservice.php?action=ListAll&method=PaymentModes","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.PaymentModeCode + '</td>'
                            + '<td>' + data.PaymentMode + '</td>'
                            + '<td>' + data.LinkedBank + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                             + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.PaymentModeID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.PaymentModeID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.PaymentModeID+'\')">Delete</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
            });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="5" style="text-align: center;background:#fff !important">No Data Found</td>'
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
setTimeout("listPaymentmodes()",2000);

function addForm(){
  $('#addconfirmation').modal("show");
     $('#PaymentMode').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 9)  || (key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
     $('#LinkedBank').keydown(function (e) {
          if (e.ctrlKey || e.altKey || e.shiftKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 9) || (key == 8) || (key == 46) || (key >= 37 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
      clearDiv(['PaymentMode','PaymentModeCode','LinkedBank','Remarks','IsActive']);
}  
function addNew() {
    var param = $('#frm_create').serialize();
      clearDiv(['PaymentMode','PaymentModeCode','LinkedBank','Remarks','IsActive']);
    $.post(URL+"webservice.php?action=addNew&method=PaymentModes",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#addconfirmation').modal("hide");
             openPopup();
            $('#frm_create').trigger("reset");
            if (obj.PaymentModeCode.length>3) {
                $('#PaymentModeCode').val(obj.PaymentModeCode);
            }
            $('#popupcontent').html(success_content(obj.message,'closePopup() ; listPaymentmodes')); 
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
   $('#editPaymentMode').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 9)  || (key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
     $('#editLinkedBank').keydown(function (e) {
          if (e.ctrlKey || e.altKey || e.shiftKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 9) || (key == 8) || (key == 46) || (key >= 37 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
   $('#editPaymentMode').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 9)  || (key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
      clearDiv(['editPaymentMode','editPaymentModeCode','editLinkedBank','editRemarks','editIsActive']);
    $.post(URL+ "webservice.php?action=getData&method=PaymentModes&ID="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#editPaymentModeCode').val(data.PaymentModeCode);
                $('#editPaymentMode').val(data.PaymentMode);
                $('#editLinkedBank').val(data.LinkedBank);
                $('#editIsActive').val(data.IsActive);
                $('#editRemarks').val(data.Remarks);
                $('#editPaymentModeID').val(data.PaymentModeID);
            });   
}  
  });
} 
function doUpdate() {
    var param = $('#frm_edit').serialize();
      clearDiv(['editPaymentMode','editPaymentModeCode','editLinkedBank','editRemarks','editIsActive']);
    $.post(URL+"webservice.php?action=doUpdate&method=PaymentModes",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#editForm').modal("hide"); 
            openPopup();
            //$('#frm_newservice').trigger("reset");
            $('#popupcontent').html(success_content(obj.message,'closePopup() ; listPaymentmodes'));
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
  
  $.post(URL+ "webservice.php?action=getData&method=PaymentModes&ID="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#viewPaymentModeCode').val(data.PaymentModeCode);
                $('#viewPaymentMode').val(data.PaymentMode);
                $('#viewLinkedBank').val(data.LinkedBank);
                $('#viewRemarks').val(data.Remarks);
                $('#viewPaymentModeID').val(data.PaymentModeID);
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
    $.post(URL+ "webservice.php?action=remove&method=PaymentModes&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.PaymentModeCode + '</td>'
                            + '<td>' + data.PaymentMode + '</td>'
                            + '<td>' + data.LinkedBank + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.PaymentModeID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.PaymentModeID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.PaymentModeID+'\')">Delete</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
           });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="5" style="text-align: center;background:#fff !important">No Data Found</td>'
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
</script>