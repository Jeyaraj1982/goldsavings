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
                                <input type="text" value="" style="text-align: right;" readonly="readonly"  name="Gold18" id="viewGold18" class="form-control" placeholder="18kt">
                                <span id="ErrGold18" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4" style="text-align: right;">
                                <label class="form-label">22kt</label>
                                <input type="text" value="" style="text-align: right;" readonly="readonly" name="Gold22" id="viewGold22" class="form-control" placeholder="22kt">
                                <span id="ErrGold22" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4" style="text-align: right;">
                                <label class="form-label">24kt</label>
                                <input type="text" style="text-align: right;" value="" readonly="readonly" name="Gold24" id="viewGold24" class="form-control" placeholder="24kt">
                                <span id="ErrGold24" class="error_msg"></span>
                            </div>
                             </div>
                        </div>
                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                    </div>
                        <div class="card flex-fill">
                            <div class="card-header">
                                <div class="card-actions float-end">
                                    <div class="dropdown position-relative">
                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                            <i class="align-middle" data-feather="more-horizontal"></i>
                                        </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Contracts</h5>
                        </div>
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Scheme Name</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_content">
                                <tr>
                                    <td colspan="8" style="text-align: center;background:#fff !important">Loading Contracts...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                     <div class="card flex-fill">
                            <div class="card-header">
                                <div class="card-actions float-end">
                                    <div class="dropdown position-relative">
                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                            <i class="align-middle" data-feather="more-horizontal"></i>
                                        </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Upcomming Dues</h5>
                        </div>
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Contract ID</th>
                                    <th>Scheme Name</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_upcommingdues_content">
                                <tr>
                                    <td colspan="8" style="text-align: center;background:#fff !important">Loading Upcomming Dues...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                
                 <div class="card flex-fill">
                            <div class="card-header">
                                <div class="card-actions float-end">
                                    <div class="dropdown position-relative">
                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                            <i class="align-middle" data-feather="more-horizontal"></i>
                                        </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Pending Dues</h5>
                        </div>
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Contract ID</th>
                                    <th>Scheme Name</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_pendingdues_content">
                                <tr>
                                    <td colspan="8" style="text-align: center;background:#fff !important">Loading Pending Dues...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                <div class="card flex-fill">
                            <div class="card-header">
                                <div class="card-actions float-end">
                                    <div class="dropdown position-relative">
                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                            <i class="align-middle" data-feather="more-horizontal"></i>
                                        </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Recent Payments</h5>
                        </div>
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                            <thead>
                                <tr>
                                    <th>Contract ID</th>
                                    <th>Scheme Name</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_recentpayments_content">
                                <tr>
                                    <td colspan="8" style="text-align: center;background:#fff !important">Loading Payments...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                <div class="card flex-fill">
                            <div class="card-header">
                                <div class="card-actions float-end">
                                    <div class="dropdown position-relative">
                                        <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                            <i class="align-middle" data-feather="more-horizontal"></i>
                                        </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
                                    </div>
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Scheme</h5>
                        </div>
                        <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Scheme Name</th>
                                <th>Amount</th>
                                <th>Installments</th>
                                <th style="width:50px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_scheme_content">
                            <tr>
                                <td colspan="8" style="text-align: center;background:#fff !important">Loading Schemes...</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
<script>
function view(){
  $('#viewModal').modal("show");
  
    $.post(URL+ "webservice.php?action=viewTodayGoldRate&method=GoldRates","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#viewGold18').val(data.GOLD_18);
                $('#viewGold22').val(data.GOLD_22);
                $('#viewGold24').val(data.GOLD_24);
                 $('#viewRemarks').val(data.Remarks);
            });   
}  
  });
}
setTimeout(function(){
    view();
    listMyContracts();
    listSchemes();
    listUpcommingDues();
    listRecentPayments;
},10000);  


function listMyContracts() {
    openPopup();
    $.post(URL+ "webservice.php?action=ListAll&method=Contracts","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.SchemeName + '</td>'
                            + '<td >' + data.CreatedOn + '</td>'
                            + '<td >' + data.CreatedOn + '</td>'
                            + '<td >' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'                                                                   
                            + '<td style="text-align:right"><a href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'" class="btn btn-outline-primary btn-sm" style="font-size:10px">View</a></td>'
                      + '</tr>';
            });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="5" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_content').html(html);
             if (($.fn.dataTable.isDataTable("#datatables-dashboard-projects"))) {
              setTimeout(function(){  $("#datatables-dashboard-projects").DataTable({
                pageLength: 6,
                lengthChange: false,
                bFilter: false,
                autoWidth: false
            });
            },5000);  
            }
        } else {
            alert(obj.message);
        }
    });
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
                            + '<td>' + data.SchemeName + '</td>'
                            + '<td>' + data.Amount + '</td>'
                            + '<td>' + data.Installments + ', '+ data.InstallmentMode +'</td>'
                            + '<td style="text-align:right">'
                                + '<a href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'" class="btn btn-outline-primary btn-sm" style="font-size:10px">View</a>'
                            + '</td>'
                      + '</tr>';
            });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="8" style="text-align: center;background:#fff !important">No Data Found</td>'
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
            },5000);  
            }
        } else {
            alert(obj.message);
        }
    });
}

function listUpcommingDues() { 
    openPopup();
    $.post(URL+ "webservice.php?action=listAllActive&method=Dues","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.ContractCode + '</td>'
                            + '<td>' + data.SchemeName + '</td>'
                            + '<td>' + data.DueDate + '</td>'
                            + '<td >' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right">'
                                + '<a href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'" class="btn btn-outline-primary btn-sm" style="font-size:10px">View</a>'
                            + '</td>'
                      + '</tr>';
            });
             if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="5" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }  
            $('#tbl_upcommingdues_content').html(html);
             if (($.fn.dataTable.isDataTable("#datatables-dashboard-projects"))) {
              setTimeout(function(){  $("#datatables-dashboard-projects").DataTable({
                pageLength: 6,
                lengthChange: false,
                bFilter: false,
                autoWidth: false
            });
            },5000);  
            }
        } else {
            alert(obj.message);
        }
    });
}

function listPendingDues() { 
    openPopup();
    $.post(URL+ "webservice.php?action=listAllActive&method=Schemes","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.ContractCode + '</td>'
                            + '<td>' + data.SchemeName + '</td>'
                            + '<td>' + data.DueDate + '</td>'
                            + '<td >' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right">'
                                + '<a href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'" class="btn btn-outline-primary btn-sm" style="font-size:10px">View</a>'
                            + '</td>'
                      + '</tr>';
            });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="8" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_pendingdues_content').html(html);
             if (($.fn.dataTable.isDataTable("#datatables-dashboard-projects"))) {
              setTimeout(function(){  $("#datatables-dashboard-projects").DataTable({
                pageLength: 6,
                lengthChange: false,
                bFilter: false,
                autoWidth: false
            });
            },5000);  
            }
        } else {
            alert(obj.message);
        }
    });
}

function listRecentPayments() { 
    openPopup();
    $.post(URL+ "webservice.php?action=listAllActive&method=Schemes","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.ContractCode + '</td>'
                            + '<td>' + data.SchemeName + '</td>'
                            + '<td>' + data.DueDate + '</td>'
                            + '<td >' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right">'
                                + '<a href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'" class="btn btn-outline-primary btn-sm" style="font-size:10px">View</a>'
                            + '</td>'
                      + '</tr>';
            });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="8" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_recentpayments_content').html(html);
             if (($.fn.dataTable.isDataTable("#datatables-dashboard-projects"))) {
              setTimeout(function(){  $("#datatables-dashboard-projects").DataTable({
                pageLength: 6,
                lengthChange: false,
                bFilter: false,
                autoWidth: false
            });
            },5000);  
            }
        } else {
            alert(obj.message);
        }
    });
}

</script>                 