<?php
  $data = $mysql->select("select * from _tbl_employees where EmployeeID='".$_GET['employees']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">View Employees</h1>
        </div>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['EmployeeID'];?>" name="EmployeeID">
    <div class="row">
        <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("employee_side_menu.php"); ?>
        </div>
            <div class="col-9 col-sm-9 col-xxl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12" style="text-align:right;">
                                <a style="color:#888;text-decoration:none;" href="<?php echo URL;?>dashboard.php?action=employees/edit&employees=<?php echo $data[0]['EmployeeID'];?>"><i class="align-middle me-2" data-feather="edit"></i><span class="align-middle">edit</span></a>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Employee Code</div>
                                <?php echo $data[0]['EmployeeCode'];?>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Entry Date</div>
                                <?php echo $data[0]['EntryDate'];?>
                            </div>   
                            <div class="col-sm-6 mb-3">   
                                <div style="font-weight: bold;">Employee Category</div>
                                <?php echo $data[0]['EmployeeCategoryTitle'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Employee's Name</div>
                                <?php echo $data[0]['EmployeeName'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Father/Husband's Name</div>
                                <?php echo $data[0]['FatherName'];?>
                              </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Gender</div>
                                   <?php echo $data[0]['Gender'];?>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Date Of Birth</div>
                                <?php echo $data[0]['DateOfBirth'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Email ID </div> 
                                <?php echo $data[0]['EmailID'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold">Mobile Number</div>
                                +91 <?php echo $data[0]['MobileNumber'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold">Whatsapp Number</div>
                                <?php 
                                    if (strlen($data[0]['WhatsappNumber'])>0) {
                                        echo "+91 ".$data[0]['WhatsappNumber'];  
                                    } else {
                                       echo "N/A";     
                                    }
                                ?>
                                </div>
                            <div class="col-sm-12">
                                <hr>
                            </div>
                            <div class="col-sm-6">         
                                <div style="font-weight: bold;">Login User Name</div>
                                <?php echo $data[0]['LoginUserName'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">Login Password</div>
                                <?php echo $data[0]['LoginPassword'];?>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">                            
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">PAN Card Number </div>
                                <?php echo $data[0]['PancardNumber'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">Aadhaar Card Number</div>
                                <?php echo $data[0]['AadhaarCardNumber'];?>
                            </div>
                            <div class="col-sm-6">
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Address Line 1 </div>
                                <?php echo $data[0]['AddressLine1'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold">Address Line 2</div>
                                <?php 
                                    if (strlen($data[0]['AddressLine2'])>0) {
                                        echo " ".$data[0]['AddressLine2'];  
                                    } else {
                                       echo "N/A";     
                                    }
                                ?>
                                </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">Area Name</div>
                                <?php echo $data[0]['AreaName'];?>
                            </div>
                            <div class="col-sm-6  mb-3">
                                <div style="font-weight: bold;">District Name</div>
                                <?php echo $data[0]['DistrictName'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">State Name</div>
                                <?php echo $data[0]['StateName'];?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">PinCode </div>
                                <?php echo $data[0]['PinCode'];?>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-6 mb-3">         
                                <div style="font-weight: bold;">Status </div>
                                <?php echo ($data[0]['IsActive']==1) ? " Active " : "Deactivated";?>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">Joined On </div>
                                <?php echo $data[0]['CreatedOn'];?>
                            </div>
                            <div class="col-sm-12">
                                <div style="font-weight: bold">Remarks</div>
                                <?php 
                                    if (strlen($data[0]['Remarks'])>0) {
                                        echo " ".$data[0]['Remarks'];  
                                    } else {
                                       echo "N/A";     
                                    }
                                ?>
                                </div> 
                        </div>
                    </div>
                </div>
            </div>
                      
            <div class="col-sm-12 mb-3" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=masters/employees/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
            </div> 
    </form>                            
 </div>