<?php $data = $mysql->select("select * from _tbl_administrators where AdministratorID='".$_GET['administrator']."'"); ?>

<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-0">Administrator</h1>
            <p>Activity</p>
        </div>
        <div class="col-6">
        </div>
    </div>
    <div class="row" style="max-width:980px">
        <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("administrators_side_menu.php"); ?>
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