<?php
  $data = $mysql->select("select * from _tbl_masters_user_roles where UserroleID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">View User Role</h1>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['UserroleID'];?>" name="UserroleID" id="UserroleID">
        <div class="row" style="max-width:980px">
            <div class="col-6 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">User Role Code</label>
                                <input type="text" value="<?php echo $data[0]['UserRoleCode'];?>" readonly="readonly"  class="form-control">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">User Role</label>
                                <input type="text" value="<?php echo $data[0]['UserRole'];?>" readonly="readonly" class="form-control" placeholder="User Name">
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <label class="form-label">Status </label>
                                <input type="text" value="<?php echo ($data[0]['IsActive']==1) ? " Active " : "Deactivated";?>" readonly="readonly" class="form-control" placeholder="Login Password">
                            </div>
                             <div class="col-sm-12">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" readonly="readonly"  class="form-control" placeholder="Remarks">
                            </div> 
                            </div>
                        </div>
                    </div>
                </div>
           
            <div class="col-6 col-xl-6">
            </div>
            <div class="col-6 mb-3" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=masters/userroles/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
            </div> 
             </div>
    </form>                            
 </div>
