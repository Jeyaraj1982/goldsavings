<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-2">My Profile</h1>
        </div>
        <div class="col-12">
            <div class="list-group">
                  <a href="<?php echo URL;?>dashboard.php?action=profile/profileinfo" class="list-group-item list-group-item-action">Profile Info</a>
                  <a href="<?php echo URL;?>dashboard.php?action=profile/branchinfo" class="list-group-item list-group-item-action">Branch Info</a>
                  <a href="<?php echo URL;?>dashboard.php?action=profile/nominee" class="list-group-item list-group-item-action">Nominee</a>
                  <a href="<?php echo URL;?>dashboard.php?action=profile/changepassword" class="list-group-item list-group-item-action">Change Password</a>
                  <a href="<?php echo URL;?>dashboard.php?action=profile/mydownlines&fpg=profile/profile" class="list-group-item list-group-item-action">Referrel</a>
                  <a href="<?php echo URL;?>dashboard.php?action=profile/activity" class="list-group-item list-group-item-action">Activity</a>
                  <a href="<?php echo URL;?>dashboard.php?" class="list-group-item list-group-item-action">Back</a>
            </div>
</div>  
</div>  
</div>  
