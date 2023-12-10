<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Edit State Name</h1>
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <?php $data = $mysql->select("select * from _tbl_master_statenames where StateNameID='".$_GET['edit']."'"); ?>
                    <form id="frm_edit" name="frm_edit">
                        <input type="hidden" value="<?php echo $data[0]['StateNameID'];?>" name="StateNameID" id="StateNameID">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">State Name Code</label>
                                <input type="text" disabled="disabled" value="<?php echo $data[0]['StateNameCode'];?>" class="form-control">
                                <span id="ErrStateNameCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">State Name<span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['StateName'];?>" name="StateName" id="StateName" class="form-control" placeholder="State Name">
                                <span id="ErrStateName" class="error_msg"></span>
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
                                <a href="<?php echo URL;?>dashboard.php?action=masters/statenames/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                                <button onclick="doUpdate()" type="button" class="btn btn-primary">Update State Name</button>
                            </div>
                        </div>
                    </form>
                </div>
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
function doUpdate() {
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['StateName','Remarks']);
    $.post(URL+"webservice.php?action=doUpdate&method=StateNames",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            //$('#frm_newservice').trigger("reset");
            $('#popupcontent').html(successcontent(obj.message));
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

 
</script>