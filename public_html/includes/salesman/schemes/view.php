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
                            <div class="col-sm-12 mb-2">
                                <div class="row" >
                                    <div class="col-sm-6">
                                        <div style="font-weight: bold;">Due Amount(₹) </div>
                                         Min&nbsp;:&nbsp;<?php echo $data[0]['MinDueAmount'];?>&nbsp;
                                         Max&nbsp;:&nbsp;<?php echo $data[0]['MaxDueAmount'];?>
                                    </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">Duration(Months) </div>
                                    Min&nbsp;:&nbsp;<?php echo $data[0]['MinDuration'];?>&nbsp;
                                    Max&nbsp;:&nbsp;<?php echo $data[0]['MaxDuration'];?>
                            </div>
                            </div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div style="font-weight: bold;" id="basic-addon3" style="width:200px">Making Charge Discount</div>
                                    <?php echo $data[0]['MakingChargeDiscount'];?> <span>%</span>
                            </div>
                            <div class="col-sm-6 mb-2">
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
                 
                        </div>
                      </div> 
                </form>
            </div>
            <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=masters/schemes/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
            </div>