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
                            <div class="col-sm-6 mb-2">
                                <label class="form-label">Scheme Code </label>
                                <input type="text" value="<?php echo $data[0]['SchemeCode'];?>" disabled="disabled" name="SchemeCode" id="SchemeCode" class="form-control" placeholder="Scheme Code">
                                <span id="ErrCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <label class="form-label">Scheme Name <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['SchemeName'];?>" name="SchemeName" id="SchemeName" class="form-control" placeholder="Scheme Name">
                                <span id="ErrSchemeName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <label class="form-label">Short Description <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['ShortDescription'];?>" name="ShortDescription" id="ShortDescription" class="form-control" placeholder="Scheme Name">
                                <span id="ErrShortDescription" class="error_msg"></span>
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label class="form-label"> Amount <span style='color:red'>*</span></label>
                                <input type="text" style="text-align: right;" value="<?php echo $data[0]['Amount'];?>" name="Amount" id="Amount" class="form-control" placeholder="0.00" onkeyup="getInstallmentAmount()">
                                <span id="ErrAmount" class="error_msg"></span>
                                <script>
                                function getInstallmentAmount() {
                                     var amount= parseFloat($('#Amount').val()); 
                                     var installments= parseFloat($('#Installments').val()); 
                                     var installmentamount= amount/installments;
                                     $('#InstallmentAmount').val(installmentamount);
                                }
                                </script>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label"> Duration <span style='color:red'>*</span></label>
                                <div class="input-group"> 
                                <select data-live-search="true" style="text-align: right;" data-size="12" name="Installments" id="Installments" class="form-select mselect" >
                                    <option value="1" <?php echo ($data[0]['Installments']==1) ? " selected='selected' " : "";?> >01</option>
                                    <option value="2" <?php echo ($data[0]['Installments']==2) ? " selected='selected' " : "";?> >02</option>
                                    <option value="3" <?php echo ($data[0]['Installments']==3) ? " selected='selected' " : "";?> >03</option>
                                    <option value="4" <?php echo ($data[0]['Installments']==4) ? " selected='selected' " : "";?> >04</option>
                                    <option value="5" <?php echo ($data[0]['Installments']==5) ? " selected='selected' " : "";?> >05</option>
                                    <option value="6" <?php echo ($data[0]['Installments']==6) ? " selected='selected' " : "";?> >06</option>
                                    <option value="7" <?php echo ($data[0]['Installments']==7) ? " selected='selected' " : "";?> >07</option>
                                    <option value="8" <?php echo ($data[0]['Installments']==8) ? " selected='selected' " : "";?> >08</option>
                                    <option value="9" <?php echo ($data[0]['Installments']==9) ? " selected='selected' " : "";?> >09</option>
                                    <option value="10" <?php echo ($data[0]['Installments']==10) ? " selected='selected' " : "";?> >10</option>
                                    <option value="11" <?php echo ($data[0]['Installments']==11) ? " selected='selected' " : "";?> >11</option>
                                    <option value="12" <?php echo ($data[0]['Installments']==12) ? " selected='selected' " : "";?> >12</option>
                                </select>
                                <select name="InstallmentMode" id="InstallmentMode" class="form-select mselect" onchange="printLable()">
                                    <option value="WEEKLY" <?php echo ($data[0]['InstallmentMode']=="WEEKLY") ? " selected='selected' " : "";?> >WEEKLY</option>
                                    <option value="MONTHLY" <?php echo ($data[0]['InstallmentMode']=="MONTHLY") ? " selected='selected' " : "";?> >MONTHLY</option>
                                </select>                                               
                            </div>
                            <span id="ErrInstallmentMode" class="error_msg"></span>
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
                                <label class="form-label"><span id="_printlabel"></span> Installment Amount <span style='color:red'>*</span></label>
                                <input type="text" style="text-align: right" value="<?php echo $data[0]['InstallmentAmount'];?>" name="InstallmentAmount" id="InstallmentAmount" class="form-control" placeholder="0.00">
                                <span id="ErrInstallmentAmount" class="error_msg"></span>
                            </div>
                             <div class="col-sm-6 mb-3">
                                <label class="form-label">Based On</label>
                                <select data-live-search="true" class="form-select mselect" data-size="12"  name="ModeOfBenifits" id="ModeOfBenifits" onchange="printChange()">
                                    <option value="AMOUNT" <?php echo ($data[0]['ModeOfBenifits']=="AMOUNT") ? " selected='selected' " : "";?> >AMOUNT</option>
                                    <option value="GOLD" <?php echo ($data[0]['ModeOfBenifits']=="GOLD") ? " selected='selected' " : "";?> >GOLD</option>
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
                             <?php if ($data[0]['ModeOfBenifits']=="GOLD"){?>
                                <div class="col-sm-6" id="Gold_benefits"  style="display:none">
                                    <label class="form-label"><span id="_printChange"></span> Material Type <span style='color:red'>*</span></label>
                                    <select class="form-select" name="MaterialType" id="MaterialType">
                                        <option value="GOLD_18" <?php echo ($data[0]['MaterialType']=="GOLD_18") ? " selected='selected' " : "";?> >GOLD_18</option>
                                        <option value="GOLD_22" <?php echo ($data[0]['MaterialType']=="GOLD_22") ? " selected='selected' " : "";?> >GOLD_22</option>
                                        <option value="GOLD_24" <?php echo ($data[0]['MaterialType']=="GOLD_24") ? " selected='selected' " : "";?> >GOLD_24</option>
                                    </select>
                                    <span id="ErrMaterialType" class="error_msg"></span> 
                                </div>
                                <?php } else { ?>
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
                            <?php } ?>
                            </div>
                            <div class="col-sm-6 mb-3">
                            </div>
                            <div class="col-sm-6 mb-3">
                            <div class="input-group mb-3">
                             <span class="input-group-text" id="basic-addon3" style="width:200px">Making Charge Discount <span style='color:red'>*</span></span>
                                <select data-live-search="true" data-size="12" style="text-align: right;" name="MakingChargeDiscount" id="MakingChargeDiscount" class="form-select mselect" >
                                    <option value="0">0</option>
                                    <?php for($i=1;$i<=100;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php } ?>
                                </select>
                                <span class="input-group-text" id="basic-addon3">%</span>
                                </div>
                            <div class="input-group">
                             <span class="input-group-text" id="basic-addon3" style="width:200px">Wastage Discount <span style='color:red'>*</span></span>
                                <select data-live-search="true" data-size="12" style="text-align: right;" name="WastageDiscount" id="WastageDiscount" class="form-select mselect" >
                                    <option value="0">0</option>
                                    <?php for($i=1;$i<=100;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php } ?>
                                </select>
                                <span class="input-group-text" id="basic-addon3">%</span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <label class="form-label">Status <span style='color:red'>*</span></label>
                                <select name="Status" id="Status" class="form-select">
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
                              <div class="col-sm-12 mb-3">
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
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Terms of Condition <span style='color:red'>*</span></label>
                                <textarea id="TermsOfConditions" name="TermsOfConditions" class="form-control" rows="4" cols="50"><?php echo $data[0]['TermsOfConditions'];?></textarea>
                                <span id="ErrTermsOfConditions" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div> 
                 <div class="card">
                    <div class="card-body">
                        <div class="row">      
                            <div class="col-sm-12 mb-3">
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
      clearDiv(['SchemeCode','SchemeName','Amount','ShortDescription','Installments','InstallmentMode','InstallmentAmount','MaterialType','ModeOfBenifits','Remarks','IsActive','Benefits','TermsOfConditions']);
   
} 
function doUpdate() {
    $('#confirmation').modal("hide");
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['SchemeCode','SchemeName','Amount','ShortDescription','Installments','InstallmentMode','InstallmentAmount','MaterialType','ModeOfBenifits','Remarks','IsActive','Benefits','TermsOfConditions']);
    
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
                    $('#failure_div').html(obj.message);
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