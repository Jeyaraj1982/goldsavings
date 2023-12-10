<div class="container-fluid p-0">
    <h1 class="h3 mb-3">New State Name</h1>
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form id="frm_create" name="frm_create">
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
                            <div class="col-sm-12" style="text-align:right;">
                                <a href="<?php echo URL;?>dashboard.php?action=masters/statenames/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                                <button onclick="confirmationtoadd()" type="button" class="btn btn-primary">Create State Name</button>
                            </div>
                        </div>
                    </form>
                    <div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">confirmation</h5>
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
    clearDiv(['StateNameCode','StateName','Remarks']);
    $.post(URL+"webservice.php?action=addNew&method=StateNames",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#frm_create').trigger("reset");
            if (obj.StateNameCode.length>3) {
                $('#StateNameCode').val(obj.StateNameCode);
            }
            $('#popupcontent').html(success_content(obj.message)); 
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