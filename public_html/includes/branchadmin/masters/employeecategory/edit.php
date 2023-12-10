<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Edit Employee Category</h1>
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <?php $data = $mysql->select("select * from _tbl_masters_employee_categories where EmployeeCategoryID='".$_GET['edit']."'"); ?>
                    <form id="frm_edit" name="frm_edit">
                        <input type="hidden" value="<?php echo $data[0]['EmployeeCategoryID'];?>" name="EmployeeCategoryID" id="EmployeeCategoryID">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Employee Category Code</label>
                                <input type="text" disabled="disabled" value="<?php echo $data[0]['EmployeeCategoryCode'];?>" class="form-control">
                                <span id="ErrEmployeeCategoryCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Employee Category Title <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['EmployeeCategoryTitle'];?>" name="EmployeeCategoryTitle" id="EmployeeCategoryTitle" class="form-control" placeholder="Employee Category Title">
                                <span id="ErrEmployeeCategoryTitle" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Status</label>
                                <select name="IsActive" id="IsActive" class="form-select">
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' ": "''";?>>Active</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' ": "''";?>>DeActivated</option>
                                </select>
                            </div>
                            <div class="col-sm-12" style="text-align:right;">
                                <a href="<?php echo URL;?>dashboard.php?action=masters/employeecategory/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                                <button onclick="confirmationtoUpdate()" type="button" class="btn btn-primary">Update Employee Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>                            
        </div>
  </div>
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
    clearDiv(['EmployeeCategoryCode','EmployeeCategoryTitle','Remarks']);
    $.post(URL+"webservice.php?action=doUpdate&method=EmployeeCategories",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            //$('#frm_newservice').trigger("reset");
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
           
        }
    });
}

 
</script>