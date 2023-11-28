<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Change Password</h1>
        </div>
    </div>
    <div class="row">
    <div class="col-12 col-sm-12 col-xxl-12">
         <div class="card">
            <div class="card-body">
                    <form id="frm_create" name="frm_create">
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <label class="form-label">Current Password <span style='color:red'>*</span></label>
                                <input type="password" name="CurrentPassword" id="CurrentPassword" class="form-control" placeholder="Current Password">
                                <span id="ErrCurrentPassword" class="error_msg"></span>
                            </div>
                             <div class="col-sm-12 mb-2">
                                <label class="form-label">New Password <span style='color:red'>*</span></label>
                                <input type="password" name="NewPassword" id="NewPassword" class="form-control" placeholder="New Password">
                                <span id="ErrNewPassword" class="error_msg"></span>
                            </div>
                             <div class="col-sm-12">
                                <label class="form-label">Confirm New Password <span style='color:red'>*</span></label>
                                <input type="password" name="CNewPassword" id="CNewPassword" class="form-control" placeholder="Confirm New Password">
                                <span id="ErrCNewPassword" class="error_msg"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                <div class="col-sm-12" style="text-align:right;">
                    <a href="<?php echo URL;?>dashboard.php?action=profile/profile" style="font-size: 10px;" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                    <button onclick="confirmationtoadd()" type="button" style="font-size: 10px;" class="btn btn-primary">Change Password</button>
                </div>
        </div>
    </div>
</div>   
<div class="modal fade" id="confimation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Change ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="changePassword()" class="btn btn-primary">Yes, Change</button>
      </div>
    </div>
  </div>
</div>
<script>
function confirmationtoadd(){
   $('#confimation').modal("show");  
 }
function changePassword() {
    $('#confimation').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['CurrentPassword','NewPassword','CNewPassword']);
    $.post(URL+"webservice.php?action=changePassword&method=Customers",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#frm_create').trigger("reset");
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
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
</script>