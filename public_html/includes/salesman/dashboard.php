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
                                                            <input type="text" style="text-align: right;" value="" readonly="readonly"  name="Gold18" id="viewGold18" class="form-control" placeholder="18kt">
                                                            <span id="ErrGold18" class="error_msg"></span>
                                                        </div>
                                                        <div class="col-sm-4" style="text-align: right;">
                                                            <label class="form-label">22kt</label>
                                                            <input type="text" style="text-align: right;" value="" readonly="readonly" name="Gold22" id="viewGold22" class="form-control" placeholder="22kt">
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
                            <h5 class="card-title mb-0">My Areas</h5>
                        </div>
                        <table id="datatables-dashboard-projects" class="table table-striped my-0">
                        <thead>
                            <tr>
                                <th style="width:100px">State Name</th>
                                <th>District Name</th>
                                <th>Area Name</th>
                                <th>Asigned On</th>
                                <th style="width:100px">Status</th>
                            </tr>
                        </thead>
                            <tbody id="tbl_content">
                                <tr>
                                    <td colspan="8" style="text-align: center;background:#fff !important">Loading Areas...</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>                       
                    <div class="card flex-fill">
                        <div class="card-header">
                            <div class="card-actions float-end">
                                <div class="dropdown position-relative">
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Recently Collected</h5>
                        </div>
                    </div>
                </div> 
                 <div class="card flex-fill">
                        <div class="card-header">
                            <div class="card-actions float-end">
                                <div class="dropdown position-relative">
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Recently Referred</h5>
                        </div>
                    </div>
                </div> 
                <div class="card flex-fill">
                        <div class="card-header">
                            <div class="card-actions float-end">
                                <div class="dropdown position-relative">
                                </div>
                            </div>
                            <h5 class="card-title mb-0">Customer Dues</h5>
                        </div>
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
                $('#viewGold18').val(data.Gold18);
                $('#viewGold22').val(data.Gold22);
                $('#viewGold24').val(data.Gold24);
                 $('#viewRemarks').val(data.Remarks);
            });   
}  
  });
}

setTimeout(function(){
    view();
    listMyAreas();
},2000);

function listMyAreas() {
     $.post(URL+ "webservice.php?action=listAssignedSalesmanAreas&method=Salesman","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.StateName + '</td>'
                            + '<td>' + data.DistrictName + '</td>'
                            + '<td>' + data.AreaName + '</td>'
                            + '<td>' + data.AssignedOn + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Deactivated</span>" ) + '</td>'
                                + '<a href="'+URL+'dashboard.php?action=schemes/view&edit='+data.AssignedAreaID+'" class="btn btn-outline-primary btn-sm" style="font-size:10px">View</a>'
                            if (data.IsActive=="1"){
                                html +='<a onclick="AssignAreaDeactive(\''+data.AssignedAreaID+'\')" class="btn btn-primary btn-sm">DeActive</a>';
                            } else {
                                html += '<a onclick="AssignAreaActive(\''+data.AssignedAreaID+'\')" class="btn btn-primary btn-sm">Active</a>';
                            }
                            html +='</td>'
                            
                      + '</tr>';
            });
             if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="6" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_content').html(html);
           if (($.fn.dataTable.isDataTable("#datatables-fixed-header"))) {
                $("#datatables-fixed-header").DataTable({
                    fixedHeader: true,
                    pageLength: 25
                });
            }
        } else {
            alert(obj.message);
        }
    });
}

</script>
                 