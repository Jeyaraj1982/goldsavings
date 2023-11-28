 
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
                            <div class="card illustration flex-fill mb-3">
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
            <div class="card flex-fill mb-3" style="padding:15px">
                <div class="card-header" style="padding:0px 10px;margin-bottom:5px;">
                    <div class="card-actions float-end">
                        <a href="https://goldsavings.nexifysoftware.in/dashboard.php?action=Todaysgoldrate/list" title="Previous Gold Rates" style="font-size: 10px;" style="color:#888;text-decoration:none;"><i class="align-middle" data-feather="external-link"></i></a>    
                    </div>
                        <h5 class="card-title mb-0">Today's Gold Rate</h5>
                </div>  
                <div class="row">
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
                <!-- silvercoin.png -->
                <div class="row">
                <div class="d-flex align-items-start">
                    <div class="flex-grow-1">
                          <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">                 
                            </div>
                             <!--<div class="col-sm-12">
                             <div class="align-self-center chart chart-lg">
                                        <canvas id="chartjs-dashboard-bar-24" style="height: 300px; width: 100%;"></canvas>
                                         </div> -->
                             </div>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
                        <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                            <div class="card flex-fill mb-3">
                                <div class="card-body" style="padding: 10px 15px;">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <div class="card-actions float-end">
                                                <a href="<?php echo URL;?>dashboard.php?action=contracts/active" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                                            </div>
                                            <h3 class="mb-2" id="activeContracts">0</h3>
                                            <p style="margin-bottom:0px !important">Active Contracts</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                            <div class="card flex-fill mb-3">
                                <div class="card-body" style="padding: 10px 15px;">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <div class="card-actions float-end">
                                                <a href="<?php echo URL;?>dashboard.php?action=contracts/closed" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                                            </div>
                                            <h3 class="mb-2" id="closedContracts">0</h3>
                                            <p style="margin-bottom:0px !important">Closed Contracts</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                            <div class="card flex-fill mb-3">
                                <div class="card-body" style="padding: 10px 15px;">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <div class="card-actions float-end">
                                                <a href="<?php echo URL;?>dashboard.php?action=contracts/upcommingdues" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                                            </div>
                                            <h3 class="mb-2" id="upcommingDues">0</h3>
                                            <p style="margin-bottom:0px !important">Upcomming Dues</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                            <div class="card flex-fill mb-3">
                                <div class="card-body" style="padding: 10px 15px;">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                             <div class="card-actions float-end">
                                                <a href="<?php echo URL;?>dashboard.php?action=contracts/pendingdues" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                                            </div>
                                            <h3 class="mb-2" id="pendingDues">0</h3>
                                            <p style="margin-bottom:0px !important">Pending Dues</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                            <div class="card flex-fill mb-3">
                                <div class="card-body" style="padding: 10px 15px;">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                             <div class="card-actions float-end">
                                                <a href="<?php echo URL;?>dashboard.php?action=schemes/activescheme" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                                            </div>
                                            <h3 class="mb-2" id="activeSchemes">0</h3>
                                            <p style="margin-bottom:0px !important">Schemes</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-3 col-xxl-3 d-flex">
                            <div class="card flex-fill mb-3">
                                <div class="card-body" style="padding: 10px 15px;">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                             <div class="card-actions float-end">
                                                <a href="<?php echo URL;?>dashboard.php?action=profile/mydownlines" style="font-size: 10px;"><i class="align-middle" data-feather="external-link"></i></a>    
                                            </div>
                                            <h3 class="mb-2" id="myDownlines">0</h3>
                                            <p style="margin-bottom:0px !important">My Downlines</p>
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
            $.each(obj.data.todaGoldRates, function (index, data) {
                    $('#GOLD_18').val(data.GOLD_18);
                    $('#GOLD_22').val(data.GOLD_22);
                    $('#GOLD_24').val(data.GOLD_24);
                    $('#SILVER').val(data.SILVER);
             });   
              var additionalInfo =  obj.data.additionalInfo;
            $('#activeContracts').html(additionalInfo.activeContracts);
            $('#activeSchemes').html(additionalInfo.activeSchemes);
            $('#closedContracts').html(additionalInfo.closedContracts);
            $('#upcommingDues').html(additionalInfo.upcommingDues);
            $('#pendingDues').html(additionalInfo.pendingDues); 
            $('#myDownlines').html(additionalInfo.myDownlines); 
            $('#pendingDues').html(additionalInfo.pendingDues); 
             //gold24Chart(obj.data.goldRates);
            var gold_rates="";
            $.each(obj.data.todaGoldRates, function (index, data) {
                gold_rates += '<li><a class="dropdown-item" href="javascript:void(0)">18 KT: &nbsp;&nbsp;'+data.GOLD_18+'</a></li>' ;
                gold_rates += '<li><a class="dropdown-item" href="javascript:void(0)">22 KT: &nbsp;&nbsp;'+data.GOLD_22+'</a></li>' ;
                gold_rates += '<li><a class="dropdown-item" href="javascript:void(0)">24 KT: &nbsp;&nbsp;'+data.GOLD_24+'</a></li>' ;
                $('#gold22rate').html("<img src='<?php echo URL;?>assets/goldcoin.png' style='width:32px;'>&nbsp;&nbsp;<span style='font-size:11px;'>22 KT:</span>&nbsp;&nbsp;<span style='font-weight:bold;'>"+data.GOLD_22+'&nbsp;&nbsp;</span>');
                $('#SILVER').html("<table style='width:90%'><tr><td style='width:36px'><img src='<?php echo URL;?>assets/silvercoin.png' style='width:30px; height:30px'></td><td style='font-weight:bold; text-align:right'>"+data.SILVER+'</td></tr></table>');
               // $('#SILVER').val(data.SILVER);
            });
            $('#goldrate_list').html(gold_rates);
    } 
    });
        }    

setTimeout(function(){
    view();  
},3000);

/*function gold24Chart(goldRates) {
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
}*/
//document.addEventListener("DOMContentLoaded", function() {
    // Bar chart
    //    gold24Chart();
//    });
</script>                 