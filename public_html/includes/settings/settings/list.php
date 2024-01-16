<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">SMTP</h1>
            <h6 class="card-subtitle text-muted mb-3">List all SMTP</h6>
        </div>
        <div class="col-6" style="text-align:right;">
            <button onclick="addForm()" type="button" class="btn btn-primary">New</button></div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:50px">Code</th>
                                <th>Host Name</th>
                                <th>User Name</th>
                                <th>CreatedOn</th>
                                <th style="width:300px">Status</th>
                                <th style="width:10px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="6" style="text-align: center;background:#fff !important">Loading smtp...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New SMTP Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
                        <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="form-label">SMTP Code <span style='color:red'>*</span></label>
                            <input type="text" name="SMTPCode" id="SMTPCode" class="form-control" placeholder="SMTP Code">
                            <span id="ErrSMTPCode" class="error_msg"></span>
                       </div>
                       <div class="col-sm-12">
                       </div>
                        <div class="col-sm-6 mb-3">
                                <label class="form-label">Host Name <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['HostName'];?>" name="HostName" id="Host Name" class="form-control" placeholder="Host Name">
                                <span id="ErrHostName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                       </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">User Name <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['UserName'];?>" name="UserName" id="UserName" class="form-control" placeholder="User Name">
                                <span id="ErrUserName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label"> Password <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['Password'];?>" name="Password" id="Password" class="form-control" placeholder="Password">
                                <span id="ErrPassword" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Protocol <span style='color:red'>*</span></label>
                                <select class="form-select" name="Protocol" id="Protocol">
                                    <option value="" <?php echo ($data[0]['Protocol']=="Select Protocol") ? " selected='selected' " : "";?>>Select Protocol</option>
                                    <option value="Male" <?php echo ($data[0]['Protocol']=="SSL") ? " selected='selected' " : "";?>>SSL</option>
                                    <option value="Female" <?php echo ($data[0]['Protocol']=="TLS") ? " selected='selected' " : "";?>>TLS</option>
                                </select>
                                <span id="ErrProtocol" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Port Number <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['portNumber'];?>" name="PortNumber" id="PortNumber" class="form-control" placeholder="port Number">
                                <span id="ErrPortNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
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
            <div class="col-sm-12 mb-3">
                <div class="row">           
                    <div class="col-sm-6">
                        <button onclick="totest()" type="button" class="btn btn-warning">Test</button>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" onclick="addNew()" class="btn btn-primary">Create SMTP</button>
                    </div>
                </div>
            </div>
            </div>
            <!--<div class="modal-footer" class="col-sm-6 mb-3" >
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" onclick="addNew()" class="btn btn-primary">Create SMTP</button>
                <button onclick="totest()" type="button" class="btn btn-warning">Test</button>
            </div>-->
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

<div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit SMTP Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="frm_edit"  id="frm_edit">
                    <input type="hidden" name="RateID" id="editRateID">
            <div class="row">
            <div class="col-sm-6 mb-3">
                    <label class="form-label">SMTP Code</label>
                    <input type="text" name="SMTPCode" id="editSMTPCode" disabled="disabled" class="form-control" placeholder="SMTP Code">
                    <span id="ErreditHostName" class="error_msg"></span>
               </div>
                <div class="col-sm-12">
               </div>
               <div class="col-sm-6 mb-3">
                    <label class="form-label">Host Name <span style='color:red'>*</span></label>
                    <input type="text" name="HostName" id="editHostName" class="form-control" placeholder="Host Name">
                    <span id="ErreditSMTPCode" class="error_msg"></span>
               </div>
               <div class="col-sm-12">
               </div>
               <div class="col-sm-6 mb-3">
                    <label class="form-label">User Name <span style='color:red'>*</span></label>
                    <input type="text" name="UserName" id="editUserName" class="form-control" placeholder="User Name">
                    <span id="ErreditUserName" class="error_msg"></span>
               </div>
               <div class="col-sm-6 mb-3">
                    <label class="form-label"> Password <span style='color:red'>*</span></label>
                    <input type="text" name="Password" id="editPassword" class="form-control" placeholder="Password">
                    <span id="ErreditPassword" class="error_msg"></span>
               </div>
               <div class="col-sm-6 mb-3">
                    <label class="form-label">Protocol <span style='color:red'>*</span></label>
                    <select class="form-select" name="Protocol" id="editProtocol">
                    <option value="SSL" <?php echo ($data[0]['Protocol']=="SSL") ? " selected='selected' " : "";?>>SSL</option>
                    <option value="TLS" <?php echo ($data[0]['Protocol']=="TLS") ? " selected='selected' " : "";?>>TLS</option>
                    </select>
                    <span id="ErreditProtocol" class="error_msg"></span>
               </div>
               <div class="col-sm-6 mb-3">
                    <label class="form-label">Port Number <span style='color:red'>*</span></label>
                    <input type="text" name="PortNumber" id="editPortNumber" class="form-control" placeholder="port Number">
                    <span id="ErrPortNumber" class="error_msg"></span>
               </div>
               <div class="col-sm-6 mb-3">         
                   <label class="form-label">Status <span style='color:red'>*</span></label>
                   <select name="Status" id="Status" class="form-select">
                   <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >Active</option>
                   <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >Deactivated</option>
                   </select>
               </div>
               <div class="col-sm-12 mb-3">
                    <label class="form-label">Remarks</label>
                    <input type="text" name="Remarks" id="editRemarks" class="form-control" placeholder="Remarks">
               <span id="ErreditRemarks" class="error_msg"></span>
               </div>
            </div>
        </form>
</div>      
        <div class="modal-footer">
            <div class="col-sm-12 mb-3">
                <div class="row">           
                    <div class="col-sm-6">
                        <button onclick="totest()" type="button" class="btn btn-warning">Test</button>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                       <button onclick="doUpdate()" type="button" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
            </div>
          </div>
      </div>
</div>
 
 <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View SMTP Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                   <div class="col-sm-6 mb-3">
                        <label class="form-label">SMTP Code</label>
                        <input type="text" name="SMTPCode" id="viewSMTPCode" class="form-control" placeholder="SMTP Code">
                        <span id="ErrviewSMTPCode" class="error_msg"></span>
                   </div>
                   <div class="col-sm-12">
                   </div>
                   <div class="col-sm-6 mb-3">
                        <label class="form-label">Host Name</label>
                        <input type="text" value"" readonly="readonly" name="HostName" id="viewHostName" class="form-control" placeholder="Host Name">
                        <span id="ErrviewSMTPCode" class="error_msg"></span>
                   </div>
                    <div class="col-sm-12">
                   </div>
                   <div class="col-sm-6 mb-3">
                       <label class="form-label">User Name</label>
                       <input type="text" value"" readonly="readonly" name="UserName" id="viewUserName" class="form-control" placeholder="User Name">
                       <span id="ErrviewUserName" class="error_msg"></span>
                   </div>
                   <div class="col-sm-6 mb-3">
                       <label class="form-label"> Password</label>
                       <input type="text" value"" creadonly="readonly" name="Password" id="viewPassword" class="form-control" placeholder="Password">
                       <span id="ErrviewPassword" class="error_msg"></span>
                   </div>
                   <div class="col-sm-12">
                   </div>
                   <div class="col-sm-6 mb-3">
                       <label class="form-label">Protocol</label>
                       <input type="text" value"" readonly="readonly" name="Protocol" id="viewProtocol" class="form-control" placeholder="Protocol">
                       <span id="ErrviewProtocol" class="error_msg"></span>
                   </div>
                   <div class="col-sm-6 mb-3">
                       <label class="form-label">Port Number</label>
                       <input type="text" value"" readonly="readonly" name="PortNumber" id="viewPortNumber" class="form-control" placeholder="port Number">
                       <span id="ErrviewPortNumber" class="error_msg"></span>
                   </div>
                   <div class="col-sm-6 mb-3">         
                       <label class="form-label">Status </label>
                       <input type="text" value="<?php echo ($data[0]['IsActive']==1) ? " Active " : "Deactivated";?>" readonly="readonly" class="form-control" placeholder="Status">
                   </div>
                   <div class="col-sm-12 mb-3">
                       <label class="form-label">Remarks </label>
                       <input type="text" value="" readonly="readonly" name="Remarks" id="viewRemarks" class="form-control" placeholder="Remarks">
                       <span id="ErrviewRemarks" class="error_msg"></span>
                   </div>
            </div>
            </div>
            <div class="modal-footer">
            <div class="col-sm-12 mb-3">
                <div class="row">           
                    <div class="col-sm-6">
                        <button onclick="totest()" type="button" class="btn btn-warning">Test</button>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
  
  <div class="modal fade" id="testconfimation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Test ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="dotest()" class="btn btn-primary">Yes,Test</button>
      </div>
    </div>
  </div>
</div>
 <div class="modal fade" id="save" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Save ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="dosave()" class="btn btn-primary">Yes,Save</button>
      </div>
    </div>
  </div>
</div>            
<script> 

function listAll() { 
    openPopup();
    $.post(URL+ "webservice.php?action=ListAll&method=Events","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.Code + '</td>'
                            + '<td>' + data.HostName + '</td>'
                            + '<td>' + data.UserName + '</td>'
                            + '<td>' + data.CreatedOn + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.CustomerTypeNameID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a onclick="edit(\''+data.CustomerTypeNameID+'\')" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a onclick="view(\''+data.CustomerTypeNameID+'\')" class="btn btn-success btn-sm">View</a> </td>'
                      + '</tr>';
            }); 
            if(obj.data.lengt==0){
                html += '<tr>'
                            '<td colspan="6" style="text-align: center;background:#fff !important">No data found</td>'

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
setTimeout("listAll()",2000);

function addForm(){
  $('#addconfirmation').modal("show"); 
      clearDiv(['HostName','UserName','Password','Protocol','PortNumber','Remarks']);
}  

function addNew() {
    var param = $('#frm_create').serialize();
      clearDiv(['SMTPCode','HostName','UserName','Password','Protocol','PortNumber','Remarks','Status']);
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
                $('#popupcontent').html(success_content(obj.message,"listAll"));
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
 
 function totest(){
   $('#testconfimation').modal("show");  
 }
 function tosave(){
   $('#save').modal("show");  
 } 
 function dotest() {
    $('#testconfimation').modal("hide");  
    var param = $('#frm_create').serialize();
    openPopup();
      clearDiv(['HostName','UserName','Password','Protocol','PortNumber','Remarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=Employees",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(success_content(obj.message));
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
function dosave() {
    $('#save').modal("hide");  
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['SmtpsettingsID','HostName','UserName','Password','Protocol','portNumber']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=Employees",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(success_content(obj.message));
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

function edit(ID){
  $('#editForm').modal("show");
      clearDiv(['editSMTPCode','editHostName','editUserName','editPassword','editProtocol','editPortNumber','editRemarks','editStatus']);
    $.post(URL+ "webservice.php?action=viewGoldRate&method=GoldRates&id="+ID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";                    
            $.each(obj.data, function (index, data) {
                $('#editHostName').val(data.HostName);
                $('#editSMTPCode').val(data.SMTPCode);
                $('#editUserName').val(data.UserName);
                $('#editPassword').val(data.Password);
                $('#editProtocol').val(data.Protocol);
                $('#editRemarks').val(data.Remarks);
                $('#editRateID').val(data.RateID);
            });   
}  
  });
}
 function doUpdate() {
    var param = $('#frm_edit').serialize();
      clearDiv(['editSMTPCode','editHostName','editUserName','editPassword','editProtocol','editPortNumber','editRemarks','editStatus']);
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=GoldRates",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                 $('#editForm').modal("hide");
                 openPopup();
                $('#popupcontent').html(success_content(obj.message,"listAll"));
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

function view(ID){
  $('#viewModal').modal("show");
  
    $.post(URL+ "webservice.php?action=viewGoldRate&method=GoldRates&id="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#viewHostName').val(data.HostName);
                $('#viewSMTPCode').val(data.SMTPCode);
                $('#viewUserName').val(data.UserName);
                $('#viewPassword').val(data.Password);
                $('#viewProtocol').val(data.Protocol);
                $('#viewRemarks').val(data.Remarks);
                $('#viewRateID').val(data.RateID);
            });   
}  
  });
}

var RemoveID=0;
function confirmationtoDelete(ID) {
    RemoveID=ID;
    $('#confirmation').modal("show"); 
}
function Remove() {
     $('#confirmation').modal("hide"); 
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=Events&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
               html += '<tr>'
                             + '<td>' + data.Code + '</td>'
                             + '<td>' + data.HostName + '</td>'
                            + '<td>' + data.UserName + '</td>'
                            + '<td>' + data.CreatedOn + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.CustomerTypeNameID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a onclick="edit(\''+data.CustomerTypeNameID+'\')" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a onclick="view(\''+data.CustomerTypeNameID+'\')" class="btn btn-success btn-sm">View</a> </td>'
                      + '</tr>';
             if(obj.data.lengt==0){
                html += '<tr>'
                            '<td colspan="6" style="text-align: center;background:#fff !important">No data found</td>'

            }  
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
</script>