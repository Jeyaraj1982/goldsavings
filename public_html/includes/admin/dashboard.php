<div class="container-fluid p-0">

                    <div class="row mb-2 mb-xl-3">
                        <div class="col-auto d-none d-sm-block">
                            <h3>Dashboard</h3>
                        </div>

                         <div class="col-auto ms-auto text-end mt-n1" style="font-size:11px">
        <?php
            $lastLogin = $mysql->select("select * from _tbl_logs_employees_login where EmployeeID='".$_SESSION['User']['EmployeeID']."' order by LoginID Desc limit 1,1");
            if (sizeof($lastLogin)>0) {
                $t = json_decode( $lastLogin[0]['OtherDetails'],true);
        ?>
          <b>Last Logged:</b> <?php echo date("d-M-Y H:i:s",strtotime($lastLogin[0]['LoggedDateTime']));?><br>
          <b>IP:</b> <?php echo $lastLogin[0]['IP'];?>
          
          <?php } ?> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                            <div class="card illustration flex-fill">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-9">
                                            <div class="illustration-text p-3 m-1">
                                                <p class="mb-0">
                                    <?php
                                        $d = date("H",strtotime(date("Y-m-d H:i:s")));
                                        if ($d>=5 && $d<=11) {
                                            echo "Good Morning ...";
                                        } elseif ($d>=13 && $d<=15) {
                                            echo "Good Afternoon ...";
                                        } else {
                                            echo "Good Evening ...";
                                        }
                                    ?>
                                </p>
                                <h4 class="illustration-text" style="font-size: 26px;margin-bottom: 0px;font-weight: bold;"><!--Welcome Back,--><?php echo strtoupper($_SESSION['User']['EmployeeName']);?></h4>
                                <p class="mb-0" style="color:#9a9dc6"><?php echo $_SESSION['User']['EmployeeCategoryTitle'];?> Dashboard</p>
                           
                                            </div>
                                        </div>
                                        <div class="col-3 align-self-end text-end">
                                            <img src="img/illustrations/customer-support.png" alt="Customer Support" class="img-fluid illustration-img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="col-12 col-sm-6 col-xxl-3 d-flex">
                            <div class="card flex-fill">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h3 class="mb-2">Today's Gold Rate</h3>
                          <div class="card-body">
                            <div class="col-sm-12">
                            <div class="row">
                            <div class="col-sm-4" style="text-align: right;">
                                <label class="form-label">18kt</label>
                                <input type="text" style="text-align: right;" value="" readonly="readonly"  name="Gold18" id="GOLD_18" class="form-control" placeholder="18kt">
                            </div>
                            <div class="col-sm-4" style="text-align: right;">
                                <label class="form-label">22kt</label>
                                <input type="text" style="text-align: right;" value="" readonly="readonly" name="Gold22" id="GOLD_22" class="form-control" placeholder="22kt">
                            </div>
                            <div class="col-sm-4" style="text-align: right;">
                                <label class="form-label">24kt</label>
                                <input type="text" style="text-align: right;" value="" readonly="readonly" name="Gold24" id="GOLD_24" class="form-control" placeholder="24kt">
                            </div>
                             </div>
                        </div>
                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                            <div class="card flex-fill">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h3 class="mb-2">0</h3>
                                            <p class="mb-2">Active<br>Contracts</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                            <div class="card flex-fill">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h3 class="mb-2">0</h3>
                                            <p class="mb-2">Closed<br>Contracts</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                            <div class="card flex-fill">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h3 class="mb-2">0</h3>
                                            <p class="mb-2">Active<br>Customers</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                            <div class="card flex-fill">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h3 class="mb-2">0</h3>
                                            <p class="mb-2">Received<br>Amount</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
                     <div class="card flex-fill" style="padding:15px">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="card-title mb-0">Recent Contracts</h5>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                <a href="<?php echo URL;?>dashboard.php?action=contracts/list" class="btn btn-outline-primary btn-sm" style="font-size: 10px;">More</a>
                            </div>
                     <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                        <thead>
                            <tr>
                                <th style="width:100px">Contract</th>
                                <th>Customer Name</th>
                                <th>Scheme</th>
                                <th>Created On</th>
                                <th style="width:50px">
                                
                                </th>
                            </tr>
                        </thead>
                            <tbody id="tbl_contracts_content">
                                <tr>
                                    <td colspan="8" style="text-align: center;background:#fff !important">Loading Contracts...</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                     </div>    
                     </div>
           </div>        
                    <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
                     <div class="card flex-fill" style="padding:15px">
                        <div class="row">
                                <div class="col-sm-6">
                                    <h5 class="card-title mb-0">Recent Customers </h5>
                                </div>
                                <div class="col-sm-6" style="text-align: right;">
                                    <a href="<?php echo URL;?>dashboard.php?action=masters/customers/list" class="btn btn-outline-primary btn-sm" style="font-size: 10px;">More</a>
                                </div>
                     <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                        <thead>
                            <tr>
                                <th style="width:100px">Customer ID</th>
                                <th>Customer Name</th>
                                <th>Mobile Number</th>
                                <th>Type</th>
                                <th>Joined On</th>
                                <th style="width:50px"></th>
                            </tr>
                        </thead>
                            <tbody id="tbl_customers_content">
                                <tr>
                                    <td colspan="7" style="text-align: center;background:#fff !important">Loading customers...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                 
                    </div>                 
                    </div>                 
           </div>                 
                   <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
                     <div class="card flex-fill" style="padding:15px">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="card-title mb-0">Recent Receipts</h5>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                    <a href="<?php echo URL;?>dashboard.php?action=reports/receipt" class="btn btn-outline-primary btn-sm" style="font-size: 10px;">More</a>
                                </div>
                           <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                        <thead>
                            <tr>
                                <th style="width:100px">Receipt Number</th>
                                <th>Receipt Date</th>
                                <th>Customer Name</th>
                                <th>Contract ID</th>
                                <th>Gold In Grams</th>
                                <th>Amount</th>
                                <th style="width:50px"></th>
                            </tr>
                        </thead>
                            <tbody id="tbl_receipts_content">
                                <tr>
                                    <td colspan="7" style="text-align: center;background:#fff !important">Loading receipts...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                    </div>  
                    </div>  
                    </div>  
                   <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
                     <div class="card flex-fill" style="padding:15px">
                        <div class="row">
                            <div class="col-sm-6">
                                <h5 class="card-title mb-0">Recent Voucher</h5>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                    <a href="<?php echo URL;?>dashboard.php?action=reports/voucher" class="btn btn-outline-primary btn-sm" style="font-size: 10px;">More</a>
                                </div>
                        <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                        <thead>
                            <tr>
                                <th style="width:100px">Voucher Number</th>
                                <th>Voucher Date</th>
                                <th>Customer Name</th>
                                <th>ContractCode</th>
                                <th>Gold In Grams</th>
                                <th>Amount</th>
                                <th style="width:50px"></th>
                            </tr>
                        </thead>
                            <tbody id="tbl_voucher_content">
                                <tr>
                                    <td colspan="8" style="text-align: center;background:#fff !important">Loading vouchers...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                    </div> 
                    </div> 
                    </div> 
                    <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
                     <div class="card flex-fill" style="padding:15px">
                        <div class="row">
                            <div class="col-sm-6"> 
                                <h5 class="card-title mb-0">Pending Dues</h5>
                            </div>
                            <div class="col-sm-6" style="text-align: right;">
                                    <a href="<?php echo URL;?>dashboard.php?action=reports/voucher" class="btn btn-outline-primary btn-sm" style="font-size: 10px;">More</a>
                                </div>
                        <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                        <thead>
                            <tr>
                                <th style="width:100px">Customer Name</th>
                                <th>Contract ID</th>
                                <th>Due Number</th>
                                <th>Due Amount</th>
                                <th>Due Date</th>
                                <th style="width:50px"></th>
                            </tr>
                        </thead>
                            <tbody id="tbl_pendingdues_content">
                                <tr>
                                    <td colspan="6" style="text-align: center;background:#fff !important">No data found</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    </div>
                    </div>
                    </div>
                   </div>
                    
 </div>              
<script>
function view(){
  $('#viewModal').modal("show");
  
    $.post(URL+ "webservice.php?action=getDashboardData","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";     
            listRecentContracts(obj.data.recentContracts);
            listRecentCustomers(obj.data.recentCustomers);
            listRecentReceipts(obj.data.recentReceipts);
            listRecentVouchers(obj.data.recentVouchers);
            listPendingDues(obj.data.PendingDues);
            $.each(obj.data.todaGoldRates, function (index, data) {
                $('#GOLD_18').val(data.GOLD_18);
                $('#GOLD_22').val(data.GOLD_22);
                $('#GOLD_24').val(data.GOLD_24);
            });   
           
}  
  });
}
setTimeout(function(){
    view();               
},2000);



function listRecentContracts(obj) {
    var html = "";
    $.each(obj, function (index, data) {
        html += '<tr>'
                    + '<td>' + data.ContractCode + '</td>'
                    + '<td>' + data.CustomerName + '</td>'
                    + '<td>' + data.SchemeName + '</td>'
                    + '<td>' + data.CreatedOn + '</td>'
              + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.ContractID+'\')">Delete</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/customers/view&customer='+data.CustomerID+'">View Customer</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/schemes/view&edit='+data.SchemeID+'">View Scheme</a>'

                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });
    if (obj.length==0) {
         html += '<tr>'
                    + '<td colspan="5" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }   
    $('#tbl_contracts_content').html(html);
     
}

function listRecentCustomers(obj) {
    var html = "";
    //+ '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
    $.each(obj, function (index, data) {
        html += '<tr>'
                            + '<td>' + data.CustomerCode + '</td>'
                            + '<td>' + data.CustomerName + '</td>'
                            + '<td>' + data.MobileNumber + '</td>'
                            + '<td>' + data.CustomerTypeName + '</td>'
                            + '<td>' + data.CreatedOn + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/customers/view&customer='+data.CustomerID+'">View</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/customers/edit&customer='+data.CustomerID+'">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.CustomerID+'\')">Delete</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });
    if (obj.length==0) {
         html += '<tr>'
                    + '<td colspan="5" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }   
    $('#tbl_customers_content').html(html);
     
}

function listRecentReceipts(obj) {
    var html = "";
    $.each(obj, function (index, data) {
        html += '<tr>'
                    + '<td>' + data.ReceiptNumber + '</td>'
                    + '<td>' + data.ReceiptDate + '</td>'
                    + '<td>' + data.CustomerName + '</td>'
                    + '<td>' + data.ContractCode + '</td>'
                    + '<td>' + data.DueGold + '</td>'
                    + '<td>' + data.DueAmount + '</td>'
                    + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=receipts/receipt&number='+data.ReceiptNumber+'">View Receipt</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/customers/view&customer='+data.CustomerID+'">View Customer</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });
    if (obj.length==0) {
         html += '<tr>'
                    + '<td colspan="7" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }   
    $('#tbl_receipts_content').html(html);
    
}

function listRecentVouchers(obj) {
    var html = "";
    $.each(obj, function (index, data) {
        html += '<tr>'
                    + '<td>' + data.VoucherNumber + '</td>'
                    + '<td>' + data.VoucherDate + '</td>'
                    + '<td>' + data.CustomerName + '</td>'
                    + '<td>' + data.ContractCode + '</td>'
                    + '<td>' + data.GoldInGrams + '</td>'
                    + '<td>' + data.TotalPaidAmount + '</td>'
                    + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/voucher&number='+data.VoucherNumber+'">View Voucher</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/customers/view&customer='+data.CustomerID+'">View Customer</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });
    if(obj.length==0) {
         html += '<tr>'
                    + '<td colspan="8" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }   
    $('#tbl_voucher_content').html(html);
    
}

function listPendingDues(obj) {
    var html = "";
    $.each(obj, function (index, data) {
        html += '<tr>'
                    + '<td>' + data.CustomerName + '</td>'
                    + '<td>' + data.ContractCode + '</td>'
                    + '<td>' + data.DueNumber + '</td>'
                    + '<td>' + data.DueDate + '</td>'
                    + '<td>' + data.DueAmount + '</td>'
                    + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'                                                                   
                    + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.ContractID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'" class="btn btn-success btn-sm">View</a></td>'
              + '</tr>';
    });
             //if (obj.length==0) {
             if (true) {
                 html += '<tr>'
                            + '<td colspan="6" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_pendingdues_content').html(html);
          
        } 
   
</script>