<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Activity</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("userprofile_side_menu.php"); ?>
        </div>
    <div class="col-9 col-sm-9 col-xxl-9">
         <div class="card">
            <div class="card-body">
                <div class="row">
                    WELCOME
                </div>
            </div>
         </div>
    </div> 