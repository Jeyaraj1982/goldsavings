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
                                <div style="font-weight: bold;">Scheme ID </div>
                                <?php echo $data[0]['SchemeCode'];?>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div style="font-weight: bold;">Scheme Name </div>
                                <?php echo $data[0]['SchemeName'];?>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div style="font-weight: bold;">Short Description </div>
                                <?php echo $data[0]['ShortDescription'];?>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <div style="font-weight: bold;"> Amount <span>(₹)</span> </div>
                                    <?php echo $data[0]['Amount'];?> 
                            </div>                                      
                            <div class="col-sm-4 mb-3">
                                <div style="font-weight: bold;"> Duration </div>
                                  <?php echo $data[0]['InstallmentMode'];?>, <?php echo $data[0]['Installments'];?>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <div style="font-weight: bold;"><span id="_printlabel"></span> Installment Amount <span>(₹)</span>  </div>
                                 <?php echo $data[0]['InstallmentAmount'];?>
                            </div>
                            <div class="col-sm-4  mb-3">
                                <div style="font-weight: bold;">Based On </div>
                                    <?php echo ($data[0]['ModeOfBenifits']=="AMOUNT") ? " AMOUNT " : "GOLD";?>
                            </div>       
                            <?php if ($data[0]['ModeOfBenifits']=="GOLD"){?>
                            <div class="col-sm-4  mb-3">
                                <div style="font-weight: bold;">Material Type </div>
                                 <?php echo $data[0]['MaterialType'];?>
                            </div>
                            <?php } else { ?>
                              <div class="col-sm-4 mb-3">
                                <div id="Cash_benefits" >
                                    <div style="font-weight: bold;"><span id="_printChange"></span>Bonus</div>
                                    <?php echo $data[0]['BonusPercentage'];?>
                                </div>
                            </div>
                            <?php } ?>      
                           
                            <div class="col-sm-4 mb-3">
                            </div>
                            <div class="col-sm-4 mb-3">
                                <div style="font-weight: bold;" id="basic-addon3" style="width:200px">Making Charge Discount</div>
                                    <?php echo $data[0]['MakingChargeDiscount'];?> <span>%</span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <div style="font-weight: bold;" id="basic-addon3" style="width:200px">Wastage Discount</div>
                                    <?php echo $data[0]['WastageDiscount'];?> <span>%</span>
                             </div>
                            <div class="col-sm-6">         
                                <div style="font-weight: bold;">Status </div>
                                    <?php echo ($data[0]['IsActive']==1) ? " Active " : "Deactivated";?>
                            </div>
                            </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                              <div class="col-sm-12">
                                <div style="font-weight: bold;">Benefits </div>
                                    <?php echo $data[0]['Benefits'];?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">      
                            <div class="col-sm-12">
                                <div style="font-weight: bold;">Terms of Condition </div>
                                    <?php echo $data[0]['TermsOfConditions'];?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                              <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Remarks</div>
                                <?php echo $data[0]['Remarks'];?>
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