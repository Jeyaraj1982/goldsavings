<?php
    $data = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <div class="col-sm-12 mb-2">
        <div class="row">
            <div class="col-6">
            <h1 class="h3 mb-0">View Schemes</h1>
        </div>
           <div class="col-6" style="text-align:right;">
            <?php 
            $path=URL."dashboard.php";
            if (isset($_GET['fpg'])) {
                $path=URL."dashboard.php?action=".$_GET['fpg'];
            }
            ?>
            <a href="<?php echo $path;?>" class="btn btn-outline-primary btn-sm">Back</a>
     </div>
     </div>
</div>
    <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
     <input type="hidden" value="<?php echo $data[0]['SchemeID'];?>" name="SchemeID">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <div style="font-weight: bold;">Scheme ID </div>
                                <?php echo $data[0]['SchemeCode'];?>
                            </div>
                            <div class="col-6 mb-2" style="text-align: right;">
                               <a href="<?php echo URL;?>dashboard.php?action=contracts/new&scheme=<?php echo $data[0]["SchemeCode"];?>&fpg=schemes/viewscheme&edit=<?php echo $_GET["edit"];?>">Join Now</a>
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
                                    <div class="col-sm-6 mb-2">
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
                                <span style="font-weight: bold;" id="basic-addon3" style="width:200px">Making Charge Discount :</span>
                                    <?php echo $data[0]['MakingChargeDiscount'];?> <span>%</span>
                            </div>
                            <div class="col-sm-6">
                                <span style="font-weight: bold;" id="basic-addon3" style="width:200px">Wastage Discount :</span>
                                    <?php echo $data[0]['WastageDiscount'];?> <span>%</span>
                             </div>
                            
                            </div>
                    </div>
                </div>
                <div class="card  mb-2">
                    <div class="card-body">
                        <div class="row">
                              <div class="col-sm-12">
                                <div style="font-weight: bold;">Benefits </div>
                                    <?php echo $data[0]['Benefits'];?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card  mb-2">
                    <div class="card-body mb-0">
                        <div class="row">      
                            <div class="col-sm-12">
                                <div style="font-weight: bold;">Terms and Condition </div>
                                    <?php echo $data[0]['TermsOfConditions'];?>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
                      </div> 
                </form>
            </div>
           