<?php
    $data = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">View Scheme</h1>
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
                                <span id="ErrSchemeCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <label class="form-label">Scheme Name </label>
                                <input type="text" value="<?php echo $data[0]['SchemeName'];?>" readonly="readonly" name="SchemeName" id="SchemeName" class="form-control" placeholder="Scheme Name">
                                <span id="ErrSchemeName " class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <label class="form-label">Short Description </label>
                                <input type="text" value="<?php echo $data[0]['ShortDescription'];?>" readonly="readonly" name="ShortDescription" id="ShortDescription" class="form-control" placeholder="Scheme Name">
                                <span id="ErrShortDescription " class="error_msg"></span>
                            </div>
                            <div class="col-sm-3 mb-3">
                                <label class="form-label"> Amount </label>
                                <input type="text" style="text-align: right" value="<?php echo $data[0]['Amount'];?>" readonly="readonly" name="Amount" id="Amount" class="form-control" placeholder="0.00">
                                <span id="ErrAmount" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label"> Duration </label>
                                <div class="input-group"> 
                                  <input type="text" style="text-align: right" value="<?php echo $data[0]['Installments'];?>" readonly="readonly" class="form-control" placeholder="Installments">
                                   <input type="text" value="<?php echo $data[0]['InstallmentMode'];?>" readonly="readonly" class="form-control" placeholder="InstallmentMode">
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
                                <label class="form-label"><span id="_printlabel"></span> Installment </label>
                                <input type="text" style="text-align: right" value="<?php echo $data[0]['InstallmentAmount'];?>" readonly="readonly" name="InstallmentAmount" id="InstallmentAmount" class="form-control" placeholder="0.00">
                                <span id="ErrInstallments" class="error_msg"></span>
                            </div>
                             <div class="col-sm-6 mb-3">
                            <p>Based On </p>
                                   <label for="form-label">Gold</label>
                                    <input type="radio" id="ModeOfBenifits" name="ModeOfBenifits" value="form-label">
                                    <label for="form-label">Amount</label>
                                    <input type="radio" id="ModeOfBenifits" name="ModeOfBenifits" value="form-label">
                                    <span id="ErrModeOfBenifits" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                            <p>Material Type</p>
                                     <label for="form-label">Gold 18kt</label>
                                    <input type="radio" id="MaterialType" name="MaterialType" value="form-label">
                                      <label for="form-label">Gold 22kt</label>
                                     <input type="radio" id="MaterialType" name="MaterialType" value="form-label">
                                      <label for="form-label">Gold 24kt</label>
                                    <input type="radio" id="MaterialType" name="MaterialType" value="form-label">
                                    <span id="ErrMaterialType" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <label class="form-label">Is Active </label>
                                <input type="text" value="<?php echo ($data[0]['IsActive']==1) ? " Active " : "Deactivated";?>" readonly="readonly" class="form-control" placeholder="Login Password">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" readonly="readonly" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
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
                                <textarea id="Benefits" readonly="readonly" name="Benefits" class="form-control" rows="4" cols="50"><?php echo $data[0]['Benefits'];?></textarea>
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
                                <textarea id="TermsOfConditions"  readonly="readonly" name="TermsOfConditions" class="form-control" rows="4" cols="50"><?php echo $data[0]['TermsOfConditions'];?></textarea>
                                <span id="ErrTermsOfConditions" class="error_msg"></span>
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
            </div>