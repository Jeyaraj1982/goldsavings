 
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
                                <p class="mb-0" style="color:#9a9dc6"><?php echo $_SESSION['User']['EmployeeCategoryTitle'];?> CUSTOMER</p>
                                   <div class="col-6" style="text-align:right;">
                                            <h3 class="mb-2" id="myDownlines">0</h3>
                                            <p style="margin-bottom:0px !important">My Downlines</p>
                                            </div>
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
                <div class="row" style="display: none;">
                    <div class="col-6" style="padding-right: 5px;" id="goldrate">
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
                                            <h3 class="mb-2" id="upcommingDues">0</h3>
                                            <p style="margin-bottom:0px !important">Upcomming<br>Dues</p>
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
                                            <h3 class="mb-2" id="pendingDues">0</h3>
                                            <p style="margin-bottom:0px !important">Pending<br>Dues</p>
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
                    <h5 class="card-title mb-0">Payment requests</h5>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th style="width:100px;">Request<br>ID</th>
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
                   
                        <div class="modal fade" id="viewrecentpayments" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">View Payment Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                                <div class="modal-body">
                                   <div class="container-fluid p-0">
                                      <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
                                      <input type="hidden" value="<?php echo $data[0][' RateID'];?>" name="RateID" id=" RateID">
                                      <div class="row">
                                            <div class="col-sm-6 mb-3">
                                            <div style="font-weight: bold;">Due Amount <span> (₹) </span></div>
                                                    <div style="font-size: 30px;" id="DueAmount"></div>
                                                <div style="font-weight: bold;">Request ID</div>
                                                    <div id="RequestCode"></div>
                                                <div style="font-weight: bold;">Payment Date</div>
                                                    <div id="PaymentDate"></div>
                                                <div style="font-weight: bold;">BankReferenceNumber</div>
                                                    <div id="BankReferenceNumber"></div>
                                                <div style="font-weight: bold;">Payment Remarks</div>
                                                    <div id="PaymentRemarks"></div>
                                                <div style="font-weight: bold;">Requested On</div>
                                                    <div id="RequestedOn"></div>
                                                <div class="mb-3"></div>
                                                <div style="font-weight: bold;">Status</div>
                                                    <div id="RequestStatus"></div>
                                                    <div id="RequestUpdated"></div>
                                                </div>
                                            <div class="col-sm-6 mb-3">
                                                <div style="font-weight: bold;">Contract Information</div>
                                                    <div id="ContractInformation"></div>
                                                <div style="font-weight: bold;">Bank Information</div>
                                                    <div id="BankInformation"></div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                     </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
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
                                    <h5 class="card-title mb-0">Recently created Contracts</h5>
                                </div>
                             <div class="col-sm-12">   
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Contract<br>ID</th>
                                    <th>Scheme</th>
                                    <th style="text-align:right;">Contract<br>Amount(₹)</th>
                                    <th>Start<br>Date</th>
                                    <th>End<br>Date</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_content">
                                <tr>
                                    <td colspan="6" style="text-align: center;background:#fff !important">Loading Contracts...</td>
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
                    <h5 class="card-title mb-0">Recently closed contracts</h5>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Contract<br>ID</th>
                                    <th>Scheme</th>
                                    <th style="text-align:right;">Contract<br>Amount(₹)</th>
                                    <th>Start<br>Date</th>
                                    <th>End<br>Date</th>
                                    <th>Closed<br>On</th>
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
                        <a href="<?php echo URL;?>dashboard.php?action=contracts/upcommingdues" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                            <h5 class="card-title mb-0">Upcomming Dues</h5>
                        </div>
                        
                        <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Contract<br>ID</th>
                                    <th>Scheme</th>
                                    <th>Due<br>Date</th>
                                    <th style="text-align: right;">Due<br>Number</th>
                                    <th style="text-align: right;">Due<br>Amount(₹)</th>
                                    <th> </th>
                                </tr>
                            </thead>
                            <tbody id="tbl_upcommingdues_content">
                                <tr>
                                    <td colspan="6" style="text-align: center;background:#fff !important">Loading Upcomming Dues...</td>
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
                        <a href="<?php echo URL;?>dashboard.php?action=contracts/pendingdues" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                            <h5 class="card-title mb-0">Pending Dues</h5>
                        </div>
                        <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Contract<br>ID</th>
                                    <th>Scheme</th>
                                    <th>Due<br>Date</th>
                                    <th style="text-align: right;">Due<br>Number</th>
                                    <th style="text-align: right;">Due<br>Amount(₹)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbl_pendingdues_content">
                                <tr>
                                    <td colspan="6" style="text-align: center;background:#fff !important">Loading Pending Dues...</td>
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
                        <a href="<?php echo URL;?>dashboard.php?action=schemes/activescheme" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                                <h5 class="card-title mb-0">Scheme</h5>
                            </div>
                     <div class="col-sm-12">
                        <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Scheme ID</th>
                                <th>Scheme Name</th>
                                <th style="width: 140px; text-align: right;">Wastage<br>Discount(%)</th>
                                <th style="width: 140px; text-align: right;">Making Charge<br>Discount(%)</th>
                                <th style="width:50px;"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_scheme_content">
                            <tr>
                                <td colspan="5" style="text-align: center;background:#fff !important">Loading Schemes...</td>
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
                        <a href="<?php echo URL;?>dashboard.php?action=receipts/receipt" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                                <h5 class="card-title mb-0">Recent Receipts</h5>
                            </div>
                           <div class="col-sm-12">
                         <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Receipt<br>Number</th>
                                    <th>Receipt<br>Date</th>
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
               <div class="col-12 col-sm-12 col-xxl-12 d-flex">          
            <div class="card flex-fill" style="padding:15px">
                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                    <div class="card-actions float-end">
                        <a href="<?php echo URL;?>dashboard.php?action=vouchers/voucher" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                                <h5 class="card-title mb-0">Recent Vouchers</h5>
                            </div>
                        <div class="col-sm-12">
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Voucher<br>Number</th>
                                    <th>Voucher<br>Date</th>
                                    <th>Contract<br>ID</th>
                                    <th>Voucher<br>Type</th>
                                    <th style="text-align: right;">Gold<br>(Grams)</th>
                                    <th style="text-align: right;">Settlement<br>Amount(₹)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tbl_voucher_content">
                                <tr>
                                    <td colspan="7" style="text-align: center;background:#fff !important">Loading vouchers...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
        </div> 
</div> </div>
</div>
<script>
function view(){
  $('#viewModal').modal("show");
  
    $.post(URL+ "webservice.php?action=getDashboardData","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";     
            listPaymentrequest(obj.data.paymentrequests);
            listRecentReceipts(obj.data.recentReceipts);
            listRecentVouchers(obj.data.recentVouchers);
            listContracts(obj.data.recentContracts);
            listRecentClosedContracts(obj.data.recentClosedContracts);
            listPendingDues(obj.data.pendingDues);
            listUpcommingDues(obj.data.upcommingDues);
            $.each(obj.data.todaGoldRates, function (index, data) {
                    $('#GOLD_18').val(data.GOLD_18);
                    $('#GOLD_22').val(data.GOLD_22);
                    $('#GOLD_24').val(data.GOLD_24);
                    $('#SILVER').val(data.SILVER);
             });
              var additionalInfo =  obj.data.additionalInfo;
            $('#activeContracts').html(additionalInfo.activeContracts);
            $('#closedContracts').html(additionalInfo.closedContracts);
            $('#upcommingDues').html(additionalInfo.upcommingDues);
            $('#pendingDues').html(additionalInfo.pendingDues); 
            $('#myDownlines').html(additionalInfo.myDownlines); 
             gold24Chart(obj.data.goldRates);
              var gold_rates="";
            $.each(obj.data.todaGoldRates, function (index, data) {
                 $('#goldrate').show();
                $('#goldrate_message').hide();
                gold_rates += '<li><a class="dropdown-item" href="javascript:void(0)">18 KT: &nbsp;&nbsp;'+data.GOLD_18+'</a></li>' ;
                gold_rates += '<li><a class="dropdown-item" href="javascript:void(0)">22 KT: &nbsp;&nbsp;'+data.GOLD_22+'</a></li>' ;
                gold_rates += '<li><a class="dropdown-item" href="javascript:void(0)">24 KT: &nbsp;&nbsp;'+data.GOLD_24+'</a></li>' ;
                $('#gold22rate').html("<img src='<?php echo URL;?>assets/goldcoin.png' style='width:32px; padding:0px'>&nbsp;&nbsp;<span style='font-size:11px;'>22 KT:</span>&nbsp;&nbsp;<span style='font-weight:bold;'>"+data.GOLD_22+'&nbsp;&nbsp;</span>');
                $('#SILVER').html("<table style='width:90%'><tr><td style='width:36px'><img src='<?php echo URL;?>assets/silvercoin.png' style='width:30px; height:30px'></td><td style='font-weight:bold; text-align:right'>"+data.SILVER+'</td></tr></table>');
            });
            $('#goldrate_list').html(gold_rates);
    } 
    });
        }    

function listPaymentrequest(obj) {
    var html = "";
                $.each(obj, function (index, data) {
                 html += '<tr>'
                           + '<td>' + data.RequestCode + '</td>'
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
                            html += '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="viewpayments('+data.PaymentRequestID+')">View</a>'
                                        html += '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
            });
            if (obj.length==0) {
                 html += '<tr>'
                            + '<td colspan="8" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_paymentrequest_content').html(html);
} 

function viewpayments(ID) {
   $('#viewrecentpayments').modal("show"); 


    $.post(URL+ "webservice.php?action=getData&method=PaymentRequests&ID="+ID,"",function(data){
        var  obj = JSON.parse(data);
        if (obj.status=="success") {
            $('#viewrecentpayments').modal("hide");
            var html="";
             $.each(obj.data, function (index, data) {
            $('#RequestCode').html(data.RequestCode);
            $('#RequestUpdated').html(data.RequestUpdated);
            $('#PaymentDate').html(data.PaymentDate);
            $('#ContractInformation').html(data.ContactCode + '<br> Due Number:&nbsp;' + data.DueID + '<br> Due Amount:&nbsp;' + data.DueAmount);
            $('#ModeOfBenifits').html(data.ModeOfBenifits);
            $('#PaymentBank').html(data.PaymentBank);
            $('#DueAmount').html(data.DueAmount);
            $('#RequestedOn').html(data.RequestedOn);
            $('#BankReferenceNumber').html(data.BankReferenceNumber);
            $('#PaymentRemarks').html(data.PaymentRemarks);
             $('#BankInformation').html(data.PaymentBankAccountHolderName + '<br>'+data.PaymentBankName  + '<br>' +data.PaymentBankNumber + '<br>' +data.PaymentBankIFSCode);
             
             if (data.RequestStatus=="REQUEST") {
                                $('#RequestStatus').html( '<span class="badge bg-info">REQUEST</span> ');
                            } else if (data.RequestStatus=="APPROVED") {
                                $('#RequestStatus').html( '<span class="badge bg-success">APPROVED</span>');
                            } else if (data.RequestStatus=="REJECTED") {
                                $('#RequestStatus').html( '<span class="badge bg-danger">REJECTED</span> ');
                            }
             });
               closePopup();
        }
  });
}

function listContracts(obj) {
            var html = "";
                $.each(obj, function (index, data) {
                 html += '<tr>'
                            + '<td>' + data.ContractCode + '</td>'
                            + '<td>' + data.SchemeName + '</td>'
                            + '<td style="text-align:right;" >' + data.ContractAmount + '</td>'
                            + '<td >' + data.StartDate + '</td>'
                            + '<td >' + data.EndDate + '</td>'
                            /*+ '<td>';
                            if (data.IsActive=="1") {
                                html += '<span class="badge bg-success">Active</span>';
                            } else if (data.IsActive=="0") {
                                html += '<span class="badge bg-secondary">Disabled</span>';
                            } else if (data.IsActive=="3") {
                                html += '<span class="badge bg-primary">Closed</span>';
                            }
                            html += '</td>' */
                            html += '<td style="text-align:right">' 
                                    + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'">View Scheme</a>';
                                                if (parseInt(data.Receipts)>0) {
                                                    html +=  '<a class="dropdown-item" href="'+URL+'dashboard.php?action=receipts/receipt&contract='+data.ContractCode+'">View Receipts</a>';
                                                } else {
                                                    html +=  '<a class="dropdown-item" href="javascript:void(0)" style="color:#aaa">View Receipts</a>';
                                                }
                                                
                                                if (data.VoucherNumber!="") {
                                                    html +=  '<a class="dropdown-item" href="'+URL+'dashboard.php?action=vouchers/viewvoucher&number='+data.VoucherNumber+'">View Voucher</a>';
                                                } else {
                                                    html +=  '<a class="dropdown-item" href="javascript:void(0)" style="color:#aaa">View Voucher</a>';
                                                }
                                        html += '</div>'
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

function listRecentClosedContracts(obj) {
        var html = "";
        $.each(obj, function (index, data) {
            html += '<tr>'
                        + '<td>' + data.ContractCode + '</td>'
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
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/voucher&number='+data.VoucherNumber+'">View Voucher</a>'
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

function listSchemes() { 
    openPopup();
    $.post(URL+ "webservice.php?action=listAllActive&method=Schemes","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                           + '<td>' + data.SchemeCode + '</td>'
                            + '<td>' + data.SchemeName + '</td>'
                            + '<td style="text-align: right">' + data.WastageDiscount + '</td>'
                            + '<td style="text-align: right">' + data.MakingChargeDiscount + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/new&scheme='+data.SchemeCode+'">Join Scheme</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'">View Scheme</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
            });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="5" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_scheme_content').html(html);
             if (($.fn.dataTable.isDataTable("#datatables-dashboard-projects"))) {
              setTimeout(function(){  $("#datatables-dashboard-projects").DataTable({
                pageLength: 6,
                lengthChange: false,
                bFilter: false,
                autoWidth: false
            });
            },4000);  
            }
        } else {
            alert(obj.message);
        }
    });
}

function listUpcommingDues(obj) { 
    var html = "";
    $.each(obj, function (index, data) {
        html += '<tr>'
                    + '<td>' + data.ContractCode + '</td>'
                    + '<td>' + data.SchemeName + '</td>'
                    + '<td>' + data.DueDate + '</td>'
                    + '<td style="text-align:right">' + data.DueNumber + '</td>'
                    + '<td style="text-align:right">' + data.DueAmount + '</td>'
                    + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/viewcontract&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'">View Scheme</a>'
                                                + '<hr style="margin:0px !important">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/offlinepayment&due='+data.DueID+'">Make Offline Payment</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/onlinepayment&due='+data.DueID+'">Make Online Payment</a>'
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
            $('#tbl_upcommingdues_content').html(html);
}

function listPendingDues(obj) {
    var html = "";
    $.each(obj, function (index, data) {
        html += '<tr>'
                    + '<td>' + data.ContractCode + '</td>'
                    + '<td>' + data.SchemeName + '</td>'
                    + '<td>' + data.DueDate + '</td>'
                    + '<td style="text-align:right">' + data.DueNumber + '</td>'
                    + '<td style="text-align:right">' + data.DueAmount + '</td>'
                    + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/viewcontract&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'">View Scheme</a>'
                                                + '<hr style="margin:0px !important">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/offlinepayment&due='+data.DueID+'">Make Offline Payment</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/onlinepayment&due='+data.DueID+'">Make Online Payment</a>'
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
            $('#tbl_pendingdues_content').html(html);
          
        } 

function listRecentReceipts(obj) {
    var html = "";
    $.each(obj, function (index, data) {
        html += '<tr>'
                     + '<td>' + data.ReceiptNumber + '</td>'
                    + '<td>' + data.ReceiptDate + '</td>'
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
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=receipts/viewreceipt&number='+data.ReceiptNumber+'">View Receipt</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
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
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=vouchers/viewvoucher&number='+data.VoucherNumber+'">View Voucher</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });
    if(obj.length==0) {
         html += '<tr>'
                    + '<td colspan="7" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }   
    $('#tbl_voucher_content').html(html);
    
}

setTimeout(function(){
    view();  
    listSchemes()             
},3000);

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
    //    gold24Chart();
//    });
</script>                 