<?php
  $data = $mysql->select("select * from _tbl_masters_salesman where SalesmanID='".$_GET['salesman']."'");
?>

<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">My Profile</h1>
        </div>
        <div class="col-6" style="text-align: right;">
            <a href="<?php echo URL;?>dashboard.php?" style="font-size: 10px" class="btn btn-outline-primary btn-sm">Back</a>
        </div>
        <div class="col-12">
            <div class="list-group">
                  <a href="<?php echo URL;?>dashboard.php?action=profile/profileinfo" class="list-group-item list-group-item-action">Profile Info</a>
                  <a href="<?php echo URL;?>dashboard.php?action=profile/changepassword" class="list-group-item list-group-item-action">Change Password</a>
                  <a href="<?php echo URL;?>dashboard.php?action=profile/activity" class="list-group-item list-group-item-action">Activity</a>
            </div>
</div>  
</div>  
</div>                  
                            
