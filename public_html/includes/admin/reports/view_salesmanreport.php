<?php
  $data = $mysql->select("select * from _tbl_masters_salesman where SalesmanID='".$_GET['salesman']."'");
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
                        <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Salesman Name</div>
                                <?php echo $data[0]['SalesmanName'];?>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Joined On</div>
                                <?php echo $data[0]['CreatedOn'];?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Number of Customers</div>
                                <?php echo $data[0]['SalesmanCode'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Area Wise Customer</div>
                               <div> Area 1: &nbsp;<?php echo $data[0]['SalesmanName'];?></div>
                                
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Contracts</div>
                                <div> Total Contracts: &nbsp;<?php echo $data[0]['SalesmanName'];?></div>
                                <div> Area 1: &nbsp;<?php echo $data[0]['SalesmanName'];?></div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Scheme Wise Customers</div>
                                <div> Scheme 1: &nbsp;<?php echo $data[0]['SalesmanName'];?></div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Number Of Dues Collected</div>
                                <?php echo $data[0]['DateOfBirth'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Collected Dues Amount </div> 
                                <?php echo $data[0]['EmailID'];?>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold">Payment Mode</div>
                                Paymentmode 1: <?php echo $data[0]['MobileNumber'];?>
                            </div>
                            <div class="col-sm-12 mb-3">         
                                <div style="font-weight: bold;">Admin Received Cash (₹)</div>
                                      <?php echo $data[0]['LoginUserName'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Balance (₹)</div>
                                    <?php echo $data[0]['LoginPassword'];?>
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
    <div class="col-sm-12 mb-3" style="text-align:right;">
        <?php 
            $path=URL."dashboard.php";
            if (isset($_GET['fpg'])) {
                $path=URL."dashboard.php?action=".$_GET['fpg'];
            }
            ?>
            <a href="<?php echo $path;?>" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
    </div> 
    </form>                            
 </div>
