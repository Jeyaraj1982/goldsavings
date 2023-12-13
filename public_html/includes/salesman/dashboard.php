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
                                <p class="mb-0" style="color:#9a9dc6"><?php echo $_SESSION['User']['EmployeeCategoryTitle'];?> Salesman</p>
                           
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
                <div style="text-align: center; display: none;" id="goldrate_message">
                   Gold rates not found
                </div>  
                <div class="row" id="goldrate" style="display: none;">
                    <div class="col-6" style="padding-right: 5px;">
                        <button type="button" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" id="gold22rate" style="width:100%;background: #fff !important;border: 1px solid #ccc;width: 100% !important;padding: 5px 5px;text-align: left;border-radius: 7px !important;color:#555 !important">
                        <img src="<?php echo URL;?>assets/goldcoin.png" style="width:32px; padding:0px">&nbsp;&nbsp;Loading ...
                        </button>
                        <ul class="dropdown-menu" id="goldrate_list">
                        </ul>
                    </div>
                     <div class="col-6" style="padding-right: 5px;">
                        <button type="button" id="SILVER" style="width:100%;background: #fff !important;border: 1px solid #ccc;width: 100% !important;padding: 5px 5px;text-align: left;border-radius: 7px !important;color:#555 !important">
                        <img src="<?php echo URL;?>assets/silvercoin.png" style="width:32px; padding:0px">&nbsp;&nbsp;Loading ...
                        </button>
                       
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
                            <p style="margin-bottom:0px !important">Active<br>My Contracts</p>
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
                                        <a href="<?php echo URL;?>dashboard.php?action=myareas/list" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                                    </div>
                                    <h5 class="card-title mb-0">My Areas</h5>
                                </div>
                                    <div class="col-sm-12">
                                    <table id="datatables-dashboard-projects" class="table table-striped my-0">
                                    <thead>
                                        <tr>
                                            <th>Area Name</th>
                                            <th>District Name</th>
                                            <th>State Name</th>
                                            <th>Asigned On</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                        <tbody id="tbl_content">
                                            <tr>
                                                <td colspan="6" style="text-align: center;background:#fff !important">Loading Areas...</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
                            <div class="card flex-fill" style="padding:15px">
                                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                                    <div class="card-actions float-end">
                                        <a href="<?php echo URL;?>dashboard.php?action=pendingdues/pendingdueslist" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                                    </div> 
                                <h5 class="card-title mb-0">Pending Dues</h5>
                            </div>
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
                                            <td colspan="8" style="text-align: center;background:#fff !important">loading dues...</td>
                                        </tr>
                                    </tbody>
                                </table>
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
                                                    <th></th>
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
                        <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
                            <div class="card flex-fill" style="padding:15px">
                                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                                    <div class="card-actions float-end">
                                        <a href="<?php echo URL;?>dashboard.php?action=customers/list" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
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
                                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                                    <div class="card-actions float-end">
                                        <a href="<?php echo URL;?>dashboard.php?action=reports/receipt" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                                    </div>
                                        <h5 class="card-title mb-0">Recent Receipts</h5>
                                    </div>
                                   <div class="col-sm-12">
                                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                                        <thead>
                                            <tr>
                                                <th>Receipt Number</th>
                                                <th>Receipt Date</th>
                                                <th>Customer Name</th>
                                                <th>Contract ID</th>
                                                <th>Due<br>Number</th>
                                                <th style="text-align: right;">Gold<br>(Grams)</th>
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
                       <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
                            <div class="card flex-fill" style="padding:15px">
                                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                                    <div class="card-actions float-end">
                                        <a href="<?php echo URL;?>dashboard.php?action=reports/voucher" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                                    </div>
                                            <h5 class="card-title mb-0">Recent Voucher</h5>
                                        </div>
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
                                                <td colspan="8" style="text-align: center;background:#fff !important">Loading vouchers...</td>
                                            </tr>
                                        </tbody>
                                    </table>
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
            var html = "";     
            listMyAreas(obj.data.assigned_area);
            listRecentContracts(obj.data.recentContracts);
            listRecentCustomers(obj.data.recentCustomers);
            listRecentReceipts(obj.data.recentReceipts);
            listRecentVouchers(obj.data.recentVouchers);
            listPendingDues(obj.data.pendingDues);
             $.each(obj.data.todaGoldRates, function (index, data) {
                    $('#GOLD_18').val(data.GOLD_18);
                    $('#GOLD_22').val(data.GOLD_22);
                    $('#GOLD_24').val(data.GOLD_24);
                    $('#SILVER').val(data.SILVER);
             });   
              var additionalInfo =  obj.data.additionalInfo;
            $('#activeContracts').html(additionalInfo.activeContracts);
            $('#closedContracts').html(additionalInfo.closedContracts);
            $('#receivedAmount').html(additionalInfo.receivedAmount);
            $('#activeCustomers').html(additionalInfo.activeCustomers); 
             gold24Chart(obj.data.goldRates);
         var gold_rates="";
            $.each(obj.data.todaGoldRates, function (index, data) {
           // if(data.todaGoldRates>0){
                $('#goldrate').show();
                $('#goldrate_message').hide();
                gold_rates += '<li><a class="dropdown-item" href="javascript:void(0)">18 KT: &nbsp;&nbsp;'+data.GOLD_18+'</a></li>' ;
                gold_rates += '<li><a class="dropdown-item" href="javascript:void(0)">22 KT: &nbsp;&nbsp;'+data.GOLD_22+'</a></li>' ;
                gold_rates += '<li><a class="dropdown-item" href="javascript:void(0)">24 KT: &nbsp;&nbsp;'+data.GOLD_24+'</a></li>' ;
                $('#gold22rate').html("<img src='<?php echo URL;?>assets/goldcoin.png' style='width:32px; padding:0px'>&nbsp;&nbsp;<span style='font-size:11px;'>22 KT:</span>&nbsp;&nbsp;<span style='font-weight:bold;'>"+data.GOLD_22+'&nbsp;&nbsp;</span>');
                $('#SILVER').html("<table style='width:90%'><tr><td style='width:36px'><img src='<?php echo URL;?>assets/silvercoin.png' style='width:30px; height:30px'></td><td style='font-weight:bold; text-align:right'>"+data.SILVER+'</td></tr></table>');
          // } else {
           //     $('#goldrate_message').hide();
           // }
            });
            $('#goldrate_list').html(gold_rates);
            
    } 
    });
        }      
setTimeout(function(){
    loadDashboardData();               
},2000);

function listMyAreas(obj) {
            var html = ""; 
            $.each(obj, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.AreaName + '</td>'
                            + '<td>' + data.DistrictName + '</td>'
                            + '<td>' + data.StateName + '</td>'
                            + '<td>' + data.AssignedOn + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Deactivated</span>" ) + '</td>'
                           + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=myareas/list_byareas&area='+data.AreaNameID+'">View Customers</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });
                            
             if (obj.length==0) {
                 html += '<tr>'
                            + '<td colspan="6" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_content').html(html);
       
       
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
                        + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.ContractID+'\')">Delete</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/view&customer='+data.CustomerID+'">View Customer</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'">View Scheme</a>'

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
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/view&customer='+data.CustomerID+'">View</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/edit&customer='+data.CustomerID+'">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.CustomerID+'\')">Delete</a>'
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
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/view&customer='+data.CustomerID+'">View Customer</a>'
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
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/view&customer='+data.CustomerID+'">View Customer</a>'
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
                                        + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/view&customer='+data.CustomerID+'">View Customer</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'">View Scheme</a>'
                                                 
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });
             if (obj.length==0) {
                 html += '<tr>'
                            + '<td colspan="8" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_pendingdues_content').html(html);
          
        } 

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
        /*if(obj.data.todaGoldRates>0){
            $('#goldrate').show();
        } else {
            
        } */
        
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

</script>
                 