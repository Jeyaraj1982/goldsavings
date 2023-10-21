<?php
  $data = $mysql->select("select * from _tbl_masters_salesman where SalesmanID='".$_GET['salesman']."'");
?>
<div class="container-fluid p-0">
<form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
<div class="col-sm-12">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Over All Report </h1>
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
                                <div style="font-weight: bold;">Number of Contracts</div>
                                <?php echo $data[0]['SalesmanName'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Closed Contracts</div>
                                <?php echo $data[0]['SalesmanName'];?>
                                <div>General Closed: &nbsp;<?php echo $data[0]['SalesmanName'];?> </div>
                                <div>Pre Closed: &nbsp;<?php echo $data[0]['SalesmanName'];?> </div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Settlement</div>
                                <?php echo $data[0]['DateOfBirth'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Not Responsible Contracts </div> 
                                <?php echo $data[0]['EmailID'];?>
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
    <div class="col-sm-6">
        <div class="col-6">
            <h2 class="h3">Due Collection Amount </h2>
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
        <a href="<?php echo URL;?>dashboard.php?action=masters/salesman/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
    </div> 
    </form>                            
 </div>
