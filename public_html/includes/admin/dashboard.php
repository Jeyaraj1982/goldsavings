<div id="tgoldprice"></div>
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
            <div class="card flex-fill" style="padding:15px">
                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                    <div class="card-actions float-end">
                        <a href="https://goldsavings.nexifysoftware.in/dashboard.php?action=Todaysgoldrate/list" title="Previous Gold Rates" style="font-size: 10px;" style="color:#888;text-decoration:none;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                        <h5 class="card-title mb-0">Today's Gold Rate</h5>
                </div>  
                <div class="row">
                        <div class="col-sm-4 mb-3" style="text-align: right;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 40px;" id="basic-addon1">18k</span>
                                </div>
                                    <input type="text" style="text-align: right;" value="" readonly="readonly"  name="Gold18" id="GOLD_18" class="form-control" placeholder="18kt">
                                </div>
                            </div>
                        <div class="col-sm-4 mb-3" style="text-align: right;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 40px;" id="basic-addon1">22k</span>
                                </div>
                                    <input type="text" style="text-align: right;" value="" readonly="readonly"  name="Gold22" id="GOLD_22" class="form-control" placeholder="22kt">
                                </div>
                            </div>
                       <div class="col-sm-4 mb-3" style="text-align: right;">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" style="width: 40px;" id="basic-addon1">24k</span>
                                </div>
                                    <input type="text" style="text-align: right;" value="" readonly="readonly"  name="Gold24" id="GOLD_24" class="form-control" placeholder="24kt">
                                </div>
                            </div>
                       </div>
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                    
                          <div class="card-body">
                          
                            <div class="row">
                                <div class="col-sm-12">
                                
                                    
                            </div>
                             <div class="col-sm-12">
                             <div class="align-self-center chart chart-lg">
                                        <canvas id="chartjs-dashboard-bar-24"></canvas>
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
                            <h3 class="mb-2" id="activeContracts">0</h3>
                            <p style="margin-bottom:0px !important">Active<br>Contracts</p>
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
                            <h3 class="mb-2" id="closedContracts">0</h3>
                            <p style="margin-bottom:0px !important">Closed<br>Contracts</p>
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
                            <h3 class="mb-2" id="activeCustomers">0</h3>
                            <p style="margin-bottom:0px !important">Active<br>Customers</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-3 col-xxl-3 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1" style="text-align:right;">
                            <h3 class="mb-2" id="receivedAmount">0</h3>
                            <p  style="margin-bottom:0px !important">Received<br>Amount(₹)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
            <div class="card flex-fill" style="padding:15px">
                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                    <div class="card-actions float-end">
                        <a href="<?php echo URL;?>dashboard.php?action=contracts/list_paymentrequests" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                    <h5 class="card-title mb-0">Customer's payment requests</h5>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th style="width:100px;">Request<br>ID</th>
                                    <th>Customer<br>Name</th>
                                    <th>Contract<br>ID</th>
                                    <th style="width:100px;">Payment<br>Date</th>
                                    <th style="width:100px;text-align:right">Due<br>Amount(₹)</th>
                                    <th style="width:150px;">Reference<br>Number</th>
                                    <th style="width:150px;">Payment<br>Frequencey</th>
                                    <th style="width:70px;">Status</th>
                                    <th style="width:50px;"></th>
                                </tr>
                            </thead>
                            <tbody id="tbl_paymentrequest_content">
                                <tr>
                                    <td colspan="9" style="text-align: center;background:#fff !important">Loading payment requests...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
        <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
            <div class="card flex-fill" style="padding:15px">
                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                    <div class="card-actions float-end">
                        <a href="<?php echo URL;?>dashboard.php?action=reports/pendingdues" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                    <h5 class="card-title mb-0">Pending Dues</h5>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Contract<br>ID</th>
                                    <th>Customer<br>Name</th>
                                    <th>Scheme</th>
                                    <th>Due<br>Date</th>
                                    <th style="text-align:right">Due<br>Number</th>
                                    <th style="text-align:right">Due<br>Amount(₹)</th>
                                    <th style="text-align:right">&nbsp;</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbl_pendingdues_content">
                                <tr>
                                    <td colspan="8" style="text-align: center;background:#fff !important">Loading dues...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
            <div class="card flex-fill" style="padding:15px">
                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                    <div class="card-actions float-end">
                        <a href="<?php echo URL;?>dashboard.php?action=contracts/list" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                    <h5 class="card-title mb-0">Recently created contracts</h5>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Contract<br>ID</th>
                                    <th>Customer<br>Name</th>
                                    <th>Scheme</th>
                                    <th style="text-align:right;">Contract<br>Amount(₹)</th>
                                    <th style="text-align:right;">Start<br>Date</th>
                                    <th style="text-align:right;">End<br>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbl_contracts_content">
                                <tr>
                                    <td colspan="7" style="text-align: center;background:#fff !important">Loading contracts...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
        <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
            <div class="card flex-fill" style="padding:15px">
                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                    <div class="card-actions float-end">
                        <a href="<?php echo URL;?>dashboard.php?action=contracts/list" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                    <h5 class="card-title mb-0">Recently closed contracts</h5>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Contract<br>ID</th>
                                    <th>Customer<br>Name</th>
                                    <th>Scheme</th>
                                    <th style="text-align:right;">Contract<br>Amount(₹)</th>
                                    <th>Start<br>Date</th>
                                    <th>End<br>Date</th>
                                    <th>Closed<br>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbl_closedcontracts_content">
                                <tr>
                                    <td colspan="8" style="text-align: center;background:#fff !important">Loading contracts...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </div>        
        <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
            <div class="card flex-fill" style="padding:15px">
                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                    <div class="card-actions float-end">
                        <a href="<?php echo URL;?>dashboard.php?action=masters/customers/list" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                    <h5 class="card-title mb-0">Recently joined customers</h5>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Mobile Number</th>
                                    <th>Type</th>
                                    <th>Joined On</th>
                                    <th>Referred By</th>
                                    <th style="width:50px"></th>
                                </tr>
                            </thead>
                            <tbody id="tbl_customers_content">
                                <tr>
                                    <td colspan="8" style="text-align: center;background:#fff !important">Loading customers...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                 
                </div>                 
            </div>                 
        </div> 
        <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
            <div class="card flex-fill" style="padding:15px">
                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                    <div class="card-actions float-end">
                        <a href="<?php echo URL;?>dashboard.php?action=reports/receipt" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                    <h5 class="card-title mb-0">Recent receipts</h5>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Receipt<br>Number</th>
                                    <th>Receipt<br>Date</th>
                                    <th>Customer<br>Name</th>
                                    <th>Contract<br>ID</th>
                                    <th style="text-align:right">Due<br>Number</th>
                                    <th style="text-align:right">Gold<br>(Grams)</th>
                                    <th style="text-align: right;">Paid<br>Amount(₹)</th>
                                    <th></th>
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
                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                    <div class="card-actions float-end">
                        <a href="<?php echo URL;?>dashboard.php?action=reports/voucher" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                    <h5 class="card-title mb-0">Recent vouchers</h5>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Voucher<br>Number</th>
                                    <th>Voucher<br>Date</th>
                                    <th>Customer<br>Name</th>
                                    <th>Contract<br>ID</th>
                                    <th>Voucher<br>Type</th>
                                    <th style="text-align: right;">Gold<br>(Grams)</th>
                                    <th style="text-align: right;">Settlement<br>Amount(₹)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbl_voucher_content">
                                <tr>
                                    <td colspan="9" style="text-align: center;background:#fff !important">Loading vouchers...</td>
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
    function loadDashboardData(){
        $('#viewModal').modal("show");
        $.post(URL+ "webservice.php?action=getDashboardData","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            listPaymentrequest(obj.data.paymentrequests);    
            listRecentContracts(obj.data.recentContracts);
            listRecentClosedContracts(obj.data.recentClosedContracts);
            listRecentCustomers(obj.data.recentCustomers);
            listRecentReceipts(obj.data.recentReceipts);
            listRecentVouchers(obj.data.recentVouchers);
            listPendingDues(obj.data.pendingDues);
            var today_goldrate=obj.data.todaGoldRates;
            if (today_goldrate.length==0){
                $('#tgoldprice').html('<marquee behavior="alternate" id="tgoldprice" style="margin-bottom:8px;background: #ffebeb;color: red;/*! font-weight: bold; */border: 1px solid #ffc4c4;padding: 5px !important;border-radius: 5px;" >            Please update Gold Rate        </marquee>');
            } else {
                $.each(obj.data.todaGoldRates, function (index, data) {
                    $('#GOLD_18').val(data.GOLD_18);
                    $('#GOLD_22').val(data.GOLD_22);
                    $('#GOLD_24').val(data.GOLD_24);
                }); 
                /*$('#tgoldprice').html('<table style="margin-bottom:8px;width:100%;" cellspacing="0"><tr><td style="width:125px"><div style="background: #3f80ea ;color: #f1f6ff;/*! font-weight: bold; border: 1px solid #3f80ea;padding: 5px !important;border-radius: 5px;">Today Gold Rate</div></td><td><marquee behavior="alternate" id="tgoldprice" style="background: #f1f6ff;color: #3f80ea;/*! font-weight: bold; border: 1px solid #3f80ea;padding: 5px !important;border-radius: 5px;" >  18kt: '+$('#GOLD_18').val() +',&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 22kt: '+$('#GOLD_22').val() +',&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;24kt: '+$('#GOLD_24').val() +'       </marquee></td></tr></table>');  */
            }
            var additionalInfo =  obj.data.additionalInfo;
            $('#activeContracts').html(additionalInfo.activeContracts);
            $('#closedContracts').html(additionalInfo.closedContracts);
            $('#receivedAmount').html(additionalInfo.receivedAmount);
            $('#activeCustomers').html(additionalInfo.activeCustomers); 
            
            
             gold24Chart(obj.data.goldRates);
        } 
        
         
        });
    }

    function listRecentContracts(obj) {
        var html = "";
        $.each(obj, function (index, data) {
            html += '<tr>'
                        + '<td>' + data.ContractCode + '</td>'
                        + '<td>' + data.CustomerName + '</td>'
                        + '<td>' + data.SchemeName + '</td>'
                        + '<td style="text-align:right">' + data.ContractAmount + '</td>'
                        + '<td style="text-align:right;">' + data.StartDate + '</td>'
                        + '<td style="text-align:right;">' + data.EndDate + '</td>'
                        /*+ '<td>';
                            if (data.IsActive=="1") {
                                html += '<span class="badge bg-success">Active</span>';
                            } else if (data.IsActive=="0") {
                                html += '<span class="badge bg-secondary">Disabled</span>';
                            } else if (data.IsActive=="3") {
                                html += '<span class="badge bg-primary">Closed</span>';
                            }
                        html += '</td>'
                        */
                        html += '<td style="text-align:right">'
                                    + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View</a>'
                                                /*+ '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.ContractID+'\')">Delete</a>'*/
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/customers/view&customer='+data.CustomerID+'">View Customer</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/schemes/view&edit='+data.SchemeID+'">View Scheme</a>'
                                        html += '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
            });
        if (obj.length==0) {
            html += '<tr>'
                        + '<td colspan="7" style="text-align: center;background:#fff !important">No data found.</td>'
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
                            + '<td>' + data.ReferredByName + ' ('+ data.ReferByText +')</td>'
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
                    + '<td colspan="7" style="text-align: center;background:#fff !important">No data found.</td>'
               + '</tr>';
    }   
    $('#tbl_customers_content').html(html);
     
}

function listRecentClosedContracts(obj) {
        var html = "";
        $.each(obj, function (index, data) {
            html += '<tr>'
                        + '<td>' + data.ContractCode + '</td>'
                        + '<td>' + data.CustomerName + '</td>'
                        + '<td>' + data.SchemeName + '</td>'
                        + '<td style="text-align:right">' + data.ContractAmount + '</td>'
                        + '<td>' + data.StartDate + '</td>'
                        + '<td>' + data.EndDate + '</td>'
                        + '<td>' + data.ClosedOn + '</td>';
                        /*+ '<td>';
                            if (data.IsActive=="1") {
                                html += '<span class="badge bg-success">Active</span>';
                            } else if (data.IsActive=="0") {
                                html += '<span class="badge bg-secondary">Disabled</span>';
                            } else if (data.IsActive=="3") {
                                html += '<span class="badge bg-primary">Closed</span>';
                            }
                        html += '</td>'
                        */
                        html += '<td style="text-align:right">'
                                    + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View</a>'
                                                /*+ '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.ContractID+'\')">Delete</a>'*/
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/view&customer='+data.CustomerID+'">View Customer</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'">View Scheme</a>'
                                        html += '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
            });
        if (obj.length==0) {
            html += '<tr>'
                        + '<td colspan="8" style="text-align: center;background:#fff !important">No data found.</td>'
                    + '</tr>';
        }   
        $('#tbl_closedcontracts_content').html(html);
    }

function listRecentReceipts(obj) {
    var html = "";
    $.each(obj, function (index, data) {
        html += '<tr>'
                    + '<td>' + data.ReceiptNumber + '</td>'
                    + '<td>' + data.ReceiptDate + '</td>'
                    + '<td>' + data.CustomerName + '</td>'
                    + '<td>' + data.ContractCode + '</td>'
                    + '<td style="text-align:right">' + data.DueNumber + '</td>'
                    + '<td style="text-align:right">' + data.DueGold + '</td>'
                    + '<td style="text-align:right">' + data.DueAmount + '</td>'
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
                    + '<td colspan="8" style="text-align: center;background:#fff !important">No data found.</td>'
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
                    + '<td>' + data.VoucherType + '</td>'
                    + '<td style="text-align:right">' + data.GoldInGrams + '</td>'
                    + '<td style="text-align:right">' + data.TotalPaidAmount + '</td>'
                    + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/voucher&number='+data.VoucherNumber+'">View Voucher</a>'
                                                + '<a   class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/customers/view&customer='+data.CustomerID+'">View Customer</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });
    if(obj.length==0) {
         html += '<tr>'
                    + '<td colspan="9" style="text-align: center;background:#fff !important">No data found.</td>'
               + '</tr>';
    }   
    $('#tbl_voucher_content').html(html);
    
}

function listPendingDues(obj) {
    var html = "";
    $.each(obj, function (index, data) {
        html += '<tr>'
                    + '<td>' + data.ContractCode + '</td>'
                    + '<td>' + data.CustomerName + '</td>'
                    + '<td>' + data.SchemeName + '</td>'
                     + '<td>' + data.DueDate + '</td>'
                    + '<td style="text-align:right">' + data.DueNumber + '</td>'
                    + '<td style="text-align:right">' + data.DueAmount + '</td>'
                    + '<td style="text-align:right"><span class="badge badge-soft-danger"> -'+data.DaysBefore+' days</span></td>'
                     + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                        + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/customers/view&customer='+data.CustomerID+'">View Customer</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/schemes/view&edit='+data.SchemeID+'">View Scheme</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });
             if (obj.length==0) {
                 html += '<tr>'
                            + '<td colspan="8" style="text-align: center;background:#fff !important">No data found.</td>'
                       + '</tr>';
            }    
            $('#tbl_pendingdues_content').html(html);
          
        } 

function listPaymentrequest(obj) {
    var html = "";
                $.each(obj, function (index, data) {
                 html += '<tr>'
                            + '<td>' + data.RequestCode + '</td>'
                            + '<td>' + data.CustomerName + '</td>'
                            + '<td>' + data.ContractCode + '</td>'
                            + '<td>' + data.PaymentDate + '</td>'
                            + '<td style="text-align:right;text-align:right">' + data.DueAmount + '</td>'
                            + '<td>' + data.BankReferenceNumber + '</td>'
                            + '<td>' + data.Frequency + '</td>'
                              if (data.RequestStatus=="REQUEST") {
                                html += '<td> <span class="badge bg-info">REQUEST</span> </td>';
                            } else if (data.RequestStatus=="APPROVED") {
                                html += '<td> <span class="badge bg-success">APPROVED</span> </td>';
                            } else if (data.RequestStatus=="REJECTED") {
                                html += '<td> <span class="badge bg-danger">REJECTED</span> </td>';
                            }
                            html+= '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                        + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/viewrecentpayment&id='+data.PaymentRequestID+'">View</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });
            if (obj=="") {
                 html += '<tr>'
                          + '<td colspan="9" style="text-align: center;background:#fff !important">No data found.</td>'
                      + '</tr>';
            }   
            
            $('#tbl_paymentrequest_content').html(html); 
}

setTimeout(function(){
    loadDashboardData();               
},2000);
 
function gold24Chart(goldRates) {
    var _label=[];
    var _price_18=[];
    var _price_22=[];
    var _price_24=[];
    $.each(goldRates, function (index, data) {
        _label.push(data.Date);
        _price_18.push(data.GOLD_18);
        _price_22.push(data.GOLD_22);
        _price_24.push(data.GOLD_24);
    });
    
    new Chart(document.getElementById("chartjs-dashboard-bar-24"), {
        type: "bar",
        data: {
            labels: _label,
            datasets: [{
                        label: "18K: ",
                        backgroundColor: window.theme.primary,
                        borderColor: window.theme.primary,
                        hoverBackgroundColor: window.theme.primary,
                        hoverBorderColor: window.theme.primary,
                        data: _price_18,
                        barPercentage: .325,
                        categoryPercentage: .5
                       },
                       {
                        label: "22K: ",
                        backgroundColor: window.theme["primary-light"],
                        borderColor: window.theme["primary-light"],
                        hoverBackgroundColor: window.theme["primary-light"],
                        hoverBorderColor: window.theme["primary-light"],
                        data: _price_22,
                        barPercentage: .325,
                        categoryPercentage: .5
                       },
                       {
                        label: "24K: ",
                        backgroundColor: window.theme.info,
                        borderColor: window.theme.info,
                        hoverBackgroundColor: window.theme.info,
                        hoverBorderColor: window.theme.info,
                        data: _price_24,
                        barPercentage: .325,
                        categoryPercentage: .5
                       }]
        },
        options: {
            maintainAspectRatio: false,
            cornerRadius: 15,
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        stepSize: 500
                    },
                    stacked: false}],
                xAxes: [{
                    gridLines: {
                        color: "transparent"
                    },
                    stacked: false}]
                }
            }
    }); 
}
//document.addEventListener("DOMContentLoaded", function() {
    // Bar chart
	//	gold24Chart();
//	});
</script>