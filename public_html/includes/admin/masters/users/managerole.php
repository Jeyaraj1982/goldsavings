<?php
    $data = $mysql->select("select * from _tbl_masters_users where UserID='".$_GET['user']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6 mb-3">
            <h1 class="h3 mb-0">User</h1>
            <span>Information</span>
        </div>
        <div class="col-6 mb-3" style="text-align:right;">
    <button onclick="assignRoleShowModal()" type="button" class="btn btn-primary">New Role</button>    
 </div>
         <div class="col-6 mb-3" style="text-align:right;">
            </div>
         <div class="row">
        <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("users_side_menu.php"); ?>
        </div>
            <div class="col-9 col-sm-9 col-xxl-9">
                <div class="card">
            <div class="card-body" style="padding-top:25px">
                <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                        <th>User Role Name</th>
                        <th>Assigned Date</th>
                        <th>End Date</th>
                        <th style="width:100px"></th>
                        </tr>
                    </thead>
                <tbody id="tbl_content">
                        <tr>
                        <td colspan="6" style="text-align: center;background:#fff !important">No data found</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
 </div>
</div>
         </div>
         </div>

 
<div class="modal fade" id="assignRoleForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New User Role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<div class="modal-body">
    <div class="container-fluid p-0">
        <form id="frm_createrole" name="frm_createrole" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['UserID'];?>" name="UserID">
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="row">
                <div class="col-sm-6 mb-3">
                                <label class="form-label">User Role <span style='color:red'>*</span></label>
                                    <select data-live-search="true" data-size="5" name="UserRoleID" id="UserRoleID" class="form-select mstateselect">
                                        <option>loading...</option>
                                    </select>
                                <span id="ErrUserRoleID" class="error_msg"></span>
                            </div> 
                </div>
            </div>
        </div>
    </form>
</div>
</div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" onclick="addNew()" class="btn btn-primary">Create </button>
        </div>
      </div>
   </div>
</div>

<div class="modal fade" id="viewForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View User Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form name="frm_view"  id="frm_view">
            <input type="hidden" name="UserRoleID" id="UserRoleID">
               <div class="row">
                             <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">User Role Code</div>
                                   <div id="UserRoleCode"></div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">User Role</div>
                                    <div id="UserRole"></div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Assigned Date</div>
                                    <div id="CreatedOn"></div>
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <div style="font-weight: bold;">Status </div>
                                    <div id="IsActive"></div>
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
function listAssignedUserRoles() {
     $.post(URL+ "webservice.php?action=listAssignedUserRoles&method=Users&UserID=<?php echo $data[0]['UserID'];?>","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                           + '<td>' + data.UserRole + '</td>'
                            + '<td>' + data.AssignedOn + '</td>'
                            + '<td>' + (data.EndedOn!=null ? data.EndedOn : "") + '</td>'
                            
                            + '<td style="text-align:right"><a onclick="view('+data.UserRoleID+')" class="btn btn-outline-primary btn-sm">View</a></td>'
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

function assignRoleShowModal(){
  $('#assignRoleForm').modal("show");
  listUserRoles(); 
      clearDiv(['UserRole']);
  
}  
function addNew() {
    $('#assignRoleForm').modal("hide");
   
    var param = $('#frm_createrole').serialize();
    openPopup();
      clearDiv(['UserRole']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=assignUserRole&method=Users",
        data: new FormData($("#frm_createrole")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_createrole').trigger("reset");
                $('#UserCode').val(obj.UserCode);
                $('#popupcontent').html(success_content(obj.message,'closePopup();listAssignedUserRoles'));
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
} 

function listUserRoles() {
    $.post(URL+ "webservice.php?action=listAllActive&method=UserRoles","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select User Role</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.UserRoleID+'">'+data.UserRole+'</option>';
            });   
            $('#UserRoleID').html(html);
             $("#UserRoleID").append($("#UserRoleID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $("#UserRoleID").val("0");
            setTimeout(function(){
            },1500);
        } else {
            alert(obj.message);
        }
    });
}


function view(ID) {
   $('#viewForm').modal("show");
    $.post(URL+ "webservice.php?action=getData&method=UserRoles&ID="+ID,"",function(data){
        var  obj = JSON.parse(data);
        if (obj.status=="success") {
            $('#viewForm').modal("hide");
            var html="";
             $.each(obj.data, function (index, data) {
            $('#UserRoleCode').html(data.UserRoleCode);
            $('#CreatedOn').html(data.CreatedOn);
            $('#UserRole').html(data.UserRole);
             if(data.IsActive=="1"){
                $('#IsActive').html("Active");    
                }
                 if(data.IsActive=="0"){
                $('#IsActive').html("Deactivated");    
                }
             
            
             });
               closePopup();
        }
  });
}
setTimeout(function(){
    listAssignedUserRoles();
    listUserRoles();
},2000);
</script>
