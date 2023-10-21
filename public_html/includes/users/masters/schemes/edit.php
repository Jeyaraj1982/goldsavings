<?php
    $data = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Edit Scheme</h1>
    <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
     <input type="hidden" value="<?php echo $data[0]['SchemeID'];?>" name="SchemeID">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Scheme ID</label>
                                <input type="text" value="<?php echo $data[0]['SchemeCode'];?>" disabled="disabled" name="SchemeCode" id="SchemeCode" class="form-control" placeholder="Scheme Code">
                                <span id="ErrCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Entry Date <span style='color:red'>*</span></label>
                                <input type="date" value="<?php echo $data[0]['EntryDate'];?>" name="EntryDate" id="EntryDate" class="form-control" placeholder="Scheme Name">
                                <span id="ErrEntryDate" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <label class="form-label">Scheme Name <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['SchemeName'];?>" name="SchemeName" id="SchemeName" class="form-control" placeholder="Scheme Name">
                                <span id="ErrSchemeName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-4">
                                <label class="form-label">Short Description <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['ShortDescription'];?>" name="ShortDescription" id="ShortDescription" class="form-control" placeholder="Scheme Name">
                                <span id="ErrShortDescription" class="error_msg"></span>
                            </div>
                        <div class="col-sm-6 mb-3">
                            <div class="input-group">
                             <span class="input-group-text" id="basic-addon3" style="width:200px">Wastage Discount <span style='color:red'>*</span></span>
                                <select data-live-search="true" data-size="12" style="text-align: right;" name="WastageDiscount" id="WastageDiscount" class="form-select mselect" >
                                    <option value="0">0</option>
                                    <?php for($i=1;$i<=100;$i++){?>
                                    <option value="<?php echo $i;?>" <?php echo ($data[0]['WastageDiscount']==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>
                                    <?php } ?>
                                </select>
                                <span class="input-group-text" id="basic-addon3">%</span>
                             </div>
                                <span id="ErrWastageDiscount" class="error_msg"></span>
                             </div>
                        <div class="col-sm-6 mb-3">
                            <div class="input-group">
                             <span class="input-group-text" id="basic-addon3" style="width:200px">Making Charge Discount <span style='color:red'>*</span></span>
                                <select data-live-search="true" data-size="12" style="text-align: right;" name="MakingChargeDiscount" id="MakingChargeDiscount" class="form-select mselect" >
                                    <option value="0">0</option>
                                    <?php for($i=1;$i<=100;$i++){?>
                                    <option value="<?php echo $i;?>" <?php echo ($data[0]['MakingChargeDiscount']==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>
                                    <?php } ?>
                                </select>
                                <span class="input-group-text" id="basic-addon3">%</span>
                                </div>
                                <span id="ErrMakingChargeDiscount" class="error_msg"></span>
                             </div>
                        
                            <div class="col-sm-6">         
                                <label class="form-label">Status <span style='color:red'>*</span></label>
                                <select name="IsActive" id="IsActive" class="form-select">
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >Active</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >Deactivated</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                              <div class="col-sm-12">
                                <label class="form-label">Benefits <span style='color:red'>*</span></label>
                                <textarea id="Benefits" name="Benefits" class="form-control" rows="4" cols="50"><?php echo $data[0]['Benefits'];?></textarea>
                                <span id="ErrBenefits" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">      
                            <div class="col-sm-12">
                                <label class="form-label">Terms and Condition <span style='color:red'>*</span></label>
                                <textarea id="TermsOfConditions" name="TermsOfConditions" class="form-control" rows="4" cols="50"><?php echo $data[0]['TermsOfConditions'];?></textarea>
                                <span id="ErrTermsOfConditions" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div> 
                 <div class="card">
                    <div class="card-body">
                        <div class="row">      
                            <div class="col-sm-12">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                        </div>
                      </div> 
                </form>
            </div>
            <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=masters/schemes/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                    <button onclick="confirmationtoUpdate()" type="button" class="btn btn-primary">Update Scheme</button>    
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

 
<script>
var _EmployeeCategoryID = "<?php echo $data[0]['SchemeID'];?>";

function confirmationtoUpdate(){
  $('#confirmation').modal("show");
    clearDiv(['SchemeCode','SchemeName','Remarks','EntryDate','IsActive','Benefits','TermsOfConditions','MakingChargeDiscount','WastageDiscount']);
} 
function doUpdate() {
    $('#confirmation').modal("hide");
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['SchemeCode','SchemeName','Remarks',,'EntryDate','IsActive','Benefits','TermsOfConditions','MakingChargeDiscount','WastageDiscount']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=Schemes",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(success_content(obj.message,'closePopup'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message)
                } else {
                    $('#popupcontent').html(errorcontent(obj.message));
                }
                $('#process_popup').modal('hide');
             }
        }
    });
    /*
    $.post(URL+"webservice.php?action=doUpdate&method=Customers",param,function(data){
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
    */
}
</script> 