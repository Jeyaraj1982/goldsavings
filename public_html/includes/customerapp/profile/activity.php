<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6 mb-2">
            <h1 class="h3 mb-0">Activity</h1>
        </div>
        <div class="col-6" style="text-align: right;">
            <a href="<?php echo URL;?>dashboard.php?action=profile/profile" style="font-size: 10px" class="btn btn-outline-primary">Back</a>
        </div>
    </div>
      
    <div class="col-12 col-sm-12 col-xxl-12">
         <div class="card">
            <div class="card-body">
                <div class="row">
                    WELCOME
                </div>
            </div>
         </div>
    </div> 
</div> 