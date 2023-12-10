<div class="container-fluid p-0">
    <h1 class="h3 mb-3">New User Role</h1>
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">User Role Code <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_user_roles");?>" name="UserRoleCode" id="UserRoleCode" class="form-control" placeholder="User Role Code">
                                <span id="ErrUserRoleCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">User Role <span style='color:red'>*</span></label>
                                <input type="text" name="UserRole" id="UserRole" class="form-control" placeholder="User Role">
                                <span id="ErrUserRole" class="error_msg"></span>
                            </div>
                             <div class="col-sm-12 mb-3">
                                <label class="form-label">Module  <span style='color:red'>*</span></label>
                                <input type="text" name="Module" id="Module" class="form-control" placeholder="Module">
                                <span id="ErrModule" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                                <label class="form-label">Remarks</label>
                                <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=masters/userroles/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <button onclick="confirmationtoadd()" type="button" class="btn btn-primary">Create Role</button>    
            </div>
    </form>
<div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Create ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Yes, Create</button>
      </div>
    </div>
  </div>
</div>
</div>

<script> 
function confirmationtoadd(){
  $('#confirmation').modal("show");   
}     
function addNew() {
   $('#confirmation').modal("hide"); 
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['UserRoleCode','UserRole','Module','Remarks','IsActive']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=UserRoles",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#UserRoleCode').val(obj.UserRoleCode);
                $('#popupcontent').html(success_content(obj.message,'closePopup'));
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
setTimeout(function d(){
    $('#UserRole').keydown(function (e) {
          if (e.ctrlKey || e.altKey) {
              e.preventDefault();
          } else {
              var key = e.keyCode;
              if (!((key == 9)  || (key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                  e.preventDefault();
              }
          }
      });
},2000);
</script>