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
                                <input type="text" style="text-align: right;" name="Amount" id="Amount" class="form-control" placeholder="0.00" onkeyup="getInstallmentAmount()">
                                <span id="ErrAmount" class="error_msg"></span>
                                <script>
                                function getInstallmentAmount() {
                                     var amount= parseFloat($('#Amount').val()); 
                                     var installments= parseFloat($('#Installments').val()); 
                                     var installmentamount= amount/installments;
                                     $('#InstallmentAmount').val(installmentamount.toFixed(2));
                                }
                                </script>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Duration <span style='color:red'>*</span></label>
                                <div class="input-group">
                                <select data-live-search="true" data-size="2" name="InstallmentMode" id="InstallmentMode" class="form-select mselect" onchange="printLable()">
                                      <option value="0">Select Mode</option>
                                    <option value="WEEKLY">WEEKLY</option>
                                    <option value="MONTHLY">MONTHLY</option>
                                </select>
                                <select data-live-search="true" data-size="12" style="text-align: right;" name="Installments" id="Installments" class="form-select mselect" readonly="readonly" onchange="getInstallmentAmount()" >
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    
                                </select>                                               
                            </div>
                            <span id="ErrInstallments" class="error_msg"></span>
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
                                <label class="form-label"><span id="_printlabel"> </span> Installment Amount</label>
                                <input type="text" style="text-align: right;" readonly="readonly" name="InstallmentAmount" id="InstallmentAmount" class="form-control" placeholder="0.00">
                                <span id="ErrInstallmentAmount" class="error_msg"></span>
                            </div>
                             <div class="col-sm-6 mb-3">
                                <label class="form-label">Based On</label>
                                <select class="form-select" name="ModeOfBenifits" id="ModeOfBenifits" onchange="printChange()">
                                    <option value="0">Select Mode Of Benifits </option>
                                    <option value="AMOUNT">AMOUNT</option>
                                    <option value="GOLD">GOLD</option>
                                </select>
                                <span id="ErrModeOfBenifits" class="error_msg"></span>
                             <script>
                                function printChange() {
                                    if ($('#ModeOfBenifits').val()=="AMOUNT"){
                                        $('#Cash_benefits').show();  
                                        $('#Gold_benefits').hide();  
                                    }
                                    if ($('#ModeOfBenifits').val()=="GOLD"){
                                         $('#Cash_benefits').hide();  
                                        $('#Gold_benefits').show(); 
                                    }
                                    if ($('#ModeOfBenifits').val()=="0"){
                                       $('#Cash_benefits').hide();  
                                        $('#Gold_benefits').hide();  
                                    }
                                }
                                </script>
                                </div>
                            <div class="col-sm-6 mb-3">
                                <div id="Gold_benefits" style="display:none">
                                    <label class="form-label"><span id="_printChange"></span> Material Type <span style='color:red'>*</span></label>
                                    <select class="form-select" name="MaterialType" id="MaterialType">
                                        <option value="0">Select Material Type </option>
                                        <option value="GOLD_18">GOLD_18</option>
                                        <option value="GOLD_22">GOLD_22</option>
                                        <option value="GOLD_24">GOLD_24</option>
                                    </select>
                                    <span id="ErrMaterialType" class="error_msg"></span> 
                                </div>
                                <div id="Cash_benefits" style="display:none">
                                 <label class="form-label"><span id="_printChange"></span>Bonus <span style='color:red'>*</span></label>
                                 <div class="input-group">
                                <select data-live-search="true" data-size="12" style="text-align: right;" name="BonusPercentage" id="BonusPercentage" class="form-select mselect" >
                                    <option value="">Select Bonus</option>
                                    <?php for($i=0;$i<=100;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php } ?>
                                </select>
                                <span class="input-group-text" id="basic-addon3">%</span>
                                 </div>
                                </div>
                                <span id="ErrBonusPercentage" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                            </div>
                            <div class="col-sm-6 mb-3">
                            <div class="input-group mb-3">
                             <span class="input-group-text" id="basic-addon3">Making Charge Discount <span style='color:red'>*</span></span>
                                <select data-live-search="true" data-size="12" style="text-align: right;" name="MakingChargeDiscount" id="MakingChargeDiscount" class="form-select mselect" >
                                    <option value="0">0</option>
                                    <?php for($i=1;$i<=100;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php } ?>
                                </select>
                                <span class="input-group-text" id="basic-addon3">%</span>
                                </div>
                            <div class="input-group">
                             <span class="input-group-text" id="basic-addon3">Wastage Discount <span style='color:red'>*</span></span>
                                <select data-live-search="true" data-size="12" style="text-align: right;" name="WastageDiscount" id="WastageDiscount" class="form-select mselect" >
                                    <option value="0">0</option>
                                    <?php for($i=1;$i<=100;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php } ?>
                                </select>
                                <span class="input-group-text" id="basic-addon3">%</span>
                                </div>
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
    clearDiv(['SchemeName','Amount','ShortDescription','Installments','InstallmentMode','InstallmentAmount','MaterialType','ModeOfBenifits','Remarks','Benefits','TermsOfConditions']);
    
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