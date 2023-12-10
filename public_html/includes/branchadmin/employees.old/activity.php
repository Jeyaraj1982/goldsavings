<?php
  //$data = $mysql->select("select * from _tbl_masters_employees where EmployeeID='".$_GET['employees']."'");
   $data = $mysql->select("select * from _tbl_employees where EmployeeID='".$_GET['employees']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-0">Employee</h1>
            <p>Activity</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("employee_side_menu.php"); ?>
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