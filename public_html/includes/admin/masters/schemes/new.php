<div class="container-fluid p-0">
    <h1 class="h3 mb-3">New Scheme</h1>
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <label class="form-label">Scheme Code <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_schemes");?>" name="SchemeCode" id="SchemeCode" class="form-control" placeholder="Scheme Code">
                                <span id="ErrCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <label class="form-label">Scheme Name <span style='color:red'>*</span></label>
                                <input type="text" value="" name="SchemeName" id="SchemeName" class="form-control" placeholder="Scheme Name">
                                <span id="ErrSchemeName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <label class="form-label">Short Description <span style='color:red'>*</span></label>
                                <input type="text" value="" name="ShortDescription" id="ShortDescription" class="form-control" placeholder="Short Description">
                                <span id="ErrShortDescription" class="error_msg"></span>
                            </div>  
                            <div class="col-sm-3 mb-3">
                                <label class="form-label"> Amount <span style='color:red'>*</span></label>
                                <input type="text" style="text-align: right;" name="Amount" id="Amount" class="form-control" placeholder="0.00">
                                <span id="ErrAmount" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Duration <span style='color:red'>*</span></label>
                                <div class="input-group">
                                <select data-live-search="true" data-size="12" style="text-align: right;" name="Installments" id="Installments" class="form-select mselect" >
                                    <option value="0">Select Duration</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <select data-live-search="true" data-size="2" name="InstallmentMode" id="InstallmentMode" class="form-select mselect" onchange="printLable()">
                                      <option value="0">Select Mode</option>
                                    <option value="WEEKLY">Weekly</option>
                                    <option value="MONTHLY">Monthly</option>
                                </select>                                               
                            </div>
                            <span id="ErrDuration" class="error_msg"></span>
                            </div>
                            <script>
                                function printLable() {
                                    if ($('#InstallmentMode').val()=="WEEKLY"){
                                        $('#_printlabel').html("Weekly");    
                                    }
                                    if ($('#InstallmentMode').val()=="MONTHLY"){
                                        $('#_printlabel').html("Monthly");    
                                    }
                                    if ($('#InstallmentMode').val()=="0"){
                                        $('#_printlabel').html("");    
                                    }
                                }
                                </script>
                            <div class="col-sm-3 mb-3">
                                <label class="form-label"><span id="_printlabel"></span> Installment <span style='color:red'>*</span></label>
                                <input type="text" style="text-align: right;" name="InstallmentAmount" id="InstallmentAmount" class="form-control" placeholder="0.00">
                                <span id="ErrInstallments" class="error_msg"></span>
                            </div>
                             <div class="col-sm-6 mb-3">
                            <p>Based On <span style='color:red'>*</span></p>
                                   <label for="form-label">Gold</label>
                                    <input type="radio" id="ModeOfBenifits" name="ModeOfBenifits" value="form-label">
                                    <label for="form-label">Amount</label>
                                    <input type="radio" id="ModeOfBenifits" name="ModeOfBenifits" value="form-label">
                                    <span id="ErrModeOfBenifits" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                            <p>Material Type <span style='color:red'>*</span></p>
                                     <label for="form-label">Gold 18kt</label>
                                    <input type="radio" id="MaterialType" name="MaterialType" value="form-label">
                                      <label for="form-label">Gold 22kt</label>
                                     <input type="radio" id="MaterialType" name="MaterialType" value="form-label">
                                      <label for="form-label">Gold 24kt</label>
                                    <input type="radio" id="MaterialType" name="MaterialType" value="form-label">
                                    <span id="ErrMaterialType" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
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
                                <label class="form-label">Terms of Condition <span style='color:red'>*</span></label>
                                <textarea id="TermsOfConditions" name="TermsOfConditions" class="form-control" rows="4" cols="50"></textarea>
                                <span id="ErrTermsOfConditions" class="error_msg"></span>
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
    clearDiv(['SchemeCode','SchemeName','Amount','ShortDescription','Installments','InstallmentMode','InstallmentAmount','MaterialType','ModeOfBenifits','Remarks','IsActive','Benefits','TermsOfConditions']);
    
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
                $('#SchemeCode').val(obj.SchemeCode);
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
</script>