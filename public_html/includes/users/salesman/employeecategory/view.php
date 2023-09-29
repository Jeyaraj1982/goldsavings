 <?php
    $data = $mysql->select("select * from _tbl_masters_employee_categories where EmployeeCategoryID='".$_GET['edit']."'");
?>

<div class="container-fluid p-0">
    <h1 class="h3 mb-3">View Employee Category</h1>
    <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $data[0]['EmployeeCategoryID'];?>" readonly="readonly" name="EmployeeCategoryID">
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Employee Category Code</label>
                                <input type="text" disabled="disabled" value="<?php echo $data[0]['EmployeeCategoryCode'];?>" readonly="readonly" class="form-control">
                                <span id="ErrEmployeeCategoryCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Employee Category Title </label>
                                <input type="text" value="<?php echo $data[0]['EmployeeCategoryTitle'];?>" readonly="readonly" name="EmployeeCategoryTitle" id="EmployeeCategoryTitle" class="form-control" placeholder="Employee Type Title">
                                <span id="ErrEmployeeCategoryCode" class="error_msg"></span>
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
                                <a href="<?php echo URL;?>dashboard.php?action=masters/employeecategory/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                            </div>
                        </div>
             </div>
            </div>                            
        </div>
  </div>
  </form>
  </div>

