<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">View Customer</h1>
        </div>
        <div class="col-6" style="text-align:right;">
            <?php 
            $path=URL."dashboard.php";
            if (isset($_GET['fpg'])) {
                $path=URL."dashboard.php?action=".$_GET['fpg'];
            }
            ?>
            <a href="<?php echo $path;?>" class="btn btn-outline-primary btn-sm">Back</a>
        </div>
     </div>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['CustomerID'];?>" name="CustomerID"> 
        <div class="row">
            <div class="col-12">
                <?php include_once("customer_side_menu.php"); ?>
            </div>
        <div class="col-12 mt-0">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div style="font-weight: bold;">Branch</div>
                                <?php 
                                    if (strlen($data[0]['BranchName'])>0) {
                                        echo $data[0]['BranchName'];  
                                    } else {
                                       echo "N/A";     
                                    }
                                ?>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-6">
                                <div style="font-weight: bold;">Customer ID</div>
                                <?php echo $data[0]['CustomerCode'];?>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <div style="font-weight: bold;">Entry Date</div>
                                <?php echo date("d-m-Y",strtotime($data[0]["EntryDate"])) ;?>
                            </div>                          
                              <div class="col-6">
                                <div style="font-weight: bold">Customer Type</div>
                                <?php echo $data[0]['CustomerTypeName'];?>
                            </div>
                            <div class="col-12">
                                <div style="font-weight: bold">Customer's Name</div>
                                <?php echo $data[0]['CustomerName'];?>
                            </div>
                             <div class="col-12">
                                <div style="font-weight: bold">Father/Husband's Name</div>
                                <?php echo $data[0]['FatherName'];?>
                            </div>
                            <div class="col-12">
                                <div style="font-weight: bold">Email ID</div> 
                                <?php echo $data[0]['EmailID'];?>
                            </div>
                            <div class="col-6">
                                <div style="font-weight: bold">Gender </div>
                                <?php echo $data[0]['Gender'];?>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <div style="font-weight: bold">Date Of Birth </div>
                                <?php echo date("d-m-Y",strtotime($data[0]["DateOfBirth"])) ;?>          
                            </div> 
                            <div class="col-6">
                                <div style="font-weight: bold">Mobile Number</div>
                                +91 <?php echo $data[0]['MobileNumber'];?>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <div style="font-weight: bold">Whatsapp Number</div>
                                <?php 
                                    if (strlen($data[0]['WhatsappNumber'])>0) {
                                        echo "+91 ".$data[0]['WhatsappNumber'];  
                                    } else {
                                       echo "N/A";     
                                    }
                                ?>
                                </div>
                                <div class="col-12">
                                <div style="font-weight: bold">Alternative Mobile Number</div>
                                <?php 
                                    if (strlen($data[0]['AlternativeMobileNumber'])>0) {
                                        echo "+91 ".$data[0]['AlternativeMobileNumber'];  
                                    } else {
                                       echo "N/A";     
                                    }
                                ?>
                                
                            </div>
                            <div class="col-12">
                                <hr>
                            </div>
                            <div class="col-6">         
                                <div style="font-weight: bold">Login User Name</div>
                                <?php echo $data[0]['LoginUserName'];?>
                            </div>
                            <div class="col-6">
                            </div> 
                            
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">                            
                            <div class="col-6">
                                <div style="font-weight: bold">PAN Number </div>
                                <?php echo $data[0]['PancardNumber'];?>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <div style="font-weight: bold">Aadhar Number</div>
                                <?php echo $data[0]['AadhaarCardNumber'];?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div style="font-weight: bold">Address Line 1 </div>
                                <?php echo $data[0]['AddressLine1'];?>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <div style="font-weight: bold">Address Line 2</div>
                                <?php echo $data[0]['AddressLine2'];?>
                            </div>
                            <div class="col-6">
                                <div style="font-weight: bold">Area Name</div>
                                <?php echo $data[0]['AreaName'];?>
                            </div>
                             <div class="col-6" style="text-align: right;">
                                <div style="font-weight: bold">District Name</div>
                                <?php echo $data[0]['DistrictName'];?>
                            </div>
                            <div class="col-6">
                                <div style="font-weight: bold">State Name</div>
                                <?php echo $data[0]['StateName'];?>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <div style="font-weight: bold">PinCode </div>
                                <?php echo $data[0]['PinCode'];?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">         
                                <div style="font-weight: bold">Referred By </div>
                                <?php echo $data[0]['ReferByText'];?>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <div style="font-weight: bold"> <?php echo $data[0]['ReferredByName'];?></div>
                                +91 <?php echo $data[0]['RefMobileNumber'];?>
                            </div>
                        </div>
                    </div>
            </div> 
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">         
                                <div style="font-weight: bold">Status </div>
                                <?php echo ($data[0]['IsActive']==1) ? " Active " : "Deactivated";?>
                            </div>
                            <div class="col-6" style="text-align: right;">
                                <div style="font-weight: bold;">Joined On </div>
                                <?php echo date("d-m-Y H:i",strtotime($data[0]["CreatedOn"])) ;?>
                            </div>
                        </div>
                    </div>
                </div>      
            
        </div>
        </div>
    </form>                            
</div>
