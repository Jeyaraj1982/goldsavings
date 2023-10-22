<div class="container-fluid p-0">
    <h1 class="h3 mb-3">New Scheme</h1>
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <label class="form-label">Scheme ID <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_schemes");?>" name="SchemeCode" id="SchemeCode" class="form-control" placeholder="Scheme Code">
                                <span id="ErrCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Entry Date <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <input type="date" value="<?php echo date("Y-m-d");?>" name="EntryDate" id="EntryDate" class="form-control" placeholder="Entry Date">
                                </div>
                                <span id="ErrEntryDate" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-4">
                                <label class="form-label">Scheme Name <span style='color:red'>*</span></label>
                                <input type="text" value="" name="SchemeName" id="SchemeName" class="form-control" placeholder="Scheme Name">
                                <span id="ErrSchemeName" class="error_msg"></span>
                            </div>
                             <div class="col-sm-6 mb-3">
                            <div class="input-group">
                             <span class="input-group-text" style="width: 190px;" id="basic-addon3">Wastage Discount </span>
                                <select data-live-search="true" data-size="12" style="text-align: right;" name="WastageDiscount" id="WastageDiscount" class="form-select mselect" >
                                    <option value="0">0</option>
                                    <?php for($i=1;$i<=100;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php } ?>
                                </select>
                                <span class="input-group-text" id="basic-addon3">%</span>
                                </div>
                                <span id="ErrWastageDiscount" class="error_msg"></span>
                            </div>
                        <div class="col-sm-6 mb-3">
                            <div class="input-group">
                                <span class="input-group-text" style="width: 190px;" id="basic-addon3">Making Charge Discount </span>
                                    <select data-live-search="true" data-size="12" style="text-align: right;" name="MakingChargeDiscount" id="MakingChargeDiscount" class="form-select mselect" >
                                        <option value="0">0</option>
                                        <?php for($i=1;$i<=100;$i++){?>
                                        <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                        <?php } ?>
                                    </select>
                                <span class="input-group-text" id="basic-addon3">%</span>
                            </div>
                            <span id="ErrMakingChargeDiscount" class="error_msg"></span>
                        </div> 
                        <div class="col-sm-12 mb-2">
                                <label class="form-label">Short Description <span style='color:red'>*</span></label>
                                <input type="text" value="" name="ShortDescription" id="ShortDescription" class="form-control" placeholder="Short Description">
                                <span id="ErrShortDescription" class="error_msg"></span>
                            </div>  
                        <div class="col-sm-6 mb-3">
                        </div>
                </div>
            </div>
        </div>
                <div class="card">
                        <div class="card-body">
                            <div class="row">
                              <div class="col-sm-12 mb-3">
                                <label class="form-label">Benefits <span style='color:red'>*</span></label>
                                <textarea id="Benefits" name="Benefits" class="form-control" rows="4" cols="50"></textarea>
                                <span id="ErrBenefits" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">      
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Terms and Condition <span style='color:red'>*</span></label>
                                <textarea id="TermsOfConditions" name="TermsOfConditions" class="form-control" rows="4" cols="50"></textarea>
                                <span id="ErrTermsOfConditions" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
                 <div class="card">
                        <div class="card-body">
                            <div class="row">
                              <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks </label>
                                <input type="text" id="Remarks" name="Remarks" placeholder="Remarks" class="form-control"></input>
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>           
            </form>
        </div>
                <div class="col-sm-12" style="text-align:right;">
                    <a href="<?php echo URL;?>dashboard.php?action=masters/schemes/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                        <button onclick="confirmation()" type="button" class="btn btn-primary">Create Scheme</button>    
                </div>

<div class="modal fade" id="confimation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to create scheme ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Yes, Create</button>
      </div>
    </div>
  </div>
</div>
<script>
 function confirmation(){
   $('#confimation').modal("show");  
 }
function addNew() {
     $('#confimation').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['SchemeName','Amount','ShortDescription','Remarks','Benefits','TermsOfConditions','WastageDiscount','MakingChargeDiscount']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=Schemes",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#SchemeCode').val(obj.nextcode);
                $('#popupcontent').html(success_content(obj.message,'closePopup'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message)
                } else {
                    $('#popupcontent').html(errorcontent(obj.message));
                }
             }
        }
    });
}
</script>