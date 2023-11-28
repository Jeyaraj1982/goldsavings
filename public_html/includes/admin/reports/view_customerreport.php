 <?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
<form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
<div class="col-sm-12">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Report </h1>
        </div>
        <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Number of Contracts</div>
                                <?php echo $data[0]['SalesmanCode'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold">Pending Dues</div>
                                  <?php echo $data[0]['MobileNumber'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold">Referral</div>
                                  <?php echo $data[0]['MobileNumber'];?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div> 
        <div class="col-sm-6">
            <div class="col-6">
                <h2 class="h3">Customer Wise </h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                         
                </div>      
            </div>      
        </div>      
    </div>
    <div class="col-sm-6">
        <div class="col-6">
            <h2 class="h3">Date Wise </h2>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                
                     
                </div>      
            </div>      
        </div>      
    </div>      
</div>      
    </form>                            
 </div>            
 <div class="col-sm-12" style="text-align:right;">
   <?php 
            $path=URL."dashboard.php";
            if (isset($_GET['fpg'])) {
                $path=URL."dashboard.php?action=".$_GET['fpg'];
            }
            ?>
            <a href="<?php echo $path;?>" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
 </div>
        
