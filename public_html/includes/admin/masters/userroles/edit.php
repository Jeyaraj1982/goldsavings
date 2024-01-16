<?php
  $data = $mysql->select("select * from _tbl_masters_user_roles where UserRoleID='".$_GET['edit']."'");
?>

<div class="container-fluid p-0">
<div class="row">
        <div class="col-6">
        <h1 class="h3 mb-3">Edit User Role</h1>
        </div>
    </div>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['UserRoleID'];?>" name="UserRoleID" id="UserRoleID">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">User Role Code </label>
                                <input type="text" value="<?php echo $data[0]['UserRoleCode'];?>" name="UserRoleCode" id="UserRoleCode" disabled="disabled"  class="form-control" maxlength="20">
                                <span id="ErrUserRoleCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">User Role <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">User Role</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="<?php echo $data[0]['UserRole'];?>" name="UserRole" id="UserRole" class="form-control" placeholder="User Name" maxlength="50">
                                <span id="ErrUserRole" class="error_msg"></span>
                            </div>
                             <div class="col-sm-12 mb-3">
                                <label class="form-label">Module <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Module</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="<?php echo $data[0]['Module'];?>" name="Module" id="Module" class="form-control" placeholder="Module" maxlength="50">
                                <span id="ErrModule" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <label class="form-label">Status <span style='color:red'>*</span></label>
                                <select name="IsActive" id="IsActive" class="form-select">
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >Active</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >Deactivated</option>
                                </select>
                                <span id="ErrIsActive" class="error_msg"></span>
                            </div>
                             <div class="col-sm-12">
                                <label class="form-label">Remarks
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Remarks</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks" maxlength="250">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 mb-3" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=masters/userroles/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <button onclick="confirmationtoUpdate()" type="button" class="btn btn-primary">Update Role</button>
            </div>
        </div>
    </form>                            
</div>
<div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Update ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="doUpdate()" class="btn btn-primary">Yes, Update</button>
      </div>
     </div>
  </div>
</div>

  

<div class="modal" id="page_popup" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="page_popup_content" style="text-align: center;padding:30px;">
        <img src="<?php echo URL;?>assets/gif/spinner.gif" style="width:80px;margin:0px auto">
        Processing ...
    </div>
  </div>
</div>

 

<script>

function confirmationtoUpdate(){
  $('#confirmation').modal("show");   
} 
function doUpdate() {
    $('#confirmation').modal("hide");
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['UserRoleCode','UserRole','Module','Remarks','IsActive']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=UserRoles",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(success_content(obj.message,'closePopup') );
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message)
                } else {
                   $('#popupcontent').html( errorcontent(obj.message));
                }
              
             }
        },
        error:networkunavailable 
    });
}
setTimeout(function d(){
},2000);

</script> 