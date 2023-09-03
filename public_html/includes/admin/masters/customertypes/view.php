 <?php
    $data = $mysql->select("select * from _tbl_masters_customertypename where CustomerTypeNameID='".$_GET['edit']."'");
?>

<div class="container-fluid p-0">
    <h1 class="h3 mb-3">View Customer Type</h1>
    <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $data[0]['CustomerTypeNameID'];?>" readonly="readonly" name="CustomerTypeID">
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Customer Type Code</label>
                                <input type="text" disabled="disabled" value="<?php echo $data[0]['CustomerTypeCode'];?>" readonly="readonly" class="form-control">
                                <span id="ErrCustomerTypeCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Customer Type Name </label>
                                <input type="text" value="<?php echo $data[0]['CustomerTypeName'];?>" readonly="readonly" name="CustomerTypeName" id="CustomerTypeName" class="form-control" placeholder="Customer Type Name">
                                <span id="ErrCustomerTypeName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" readonly="readonly" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <label class="form-label">Is Active </label>
                                <input type="text" value="<?php echo ($data[0]['IsActive']==1) ? " Active " : "Deactivated";?>" readonly="readonly" class="form-control" placeholder="Login Password">
                            </div>
                            <div class="col-sm-12" style="text-align:right;">
                                <a href="<?php echo URL;?>dashboard.php?action=masters/customertypes/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                            </div>
                        </div>
             </div>
            </div>                            
        </div>
  </div>
  </form>
  </div>

