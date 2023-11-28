<div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="<?php echo URL;?>dashboard.php">
        <img src="<?php echo URL;?>/assets/logo.png" style="height: 32px;">
    </a>
    <ul class="sidebar-nav">
        
        <li class="sidebar-item active">
            <a href="<?php echo URL;?>dashboard.php"  class="sidebar-link"><i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span></a>
        </li>
        <li class="sidebar-header">Quick Links</li> 
        <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=profile/mydownlines">My Downlines</a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=contracts/upcommingdues">Upcomming Dues</a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=contracts/pendingdues">Pending Dues</a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=contracts/list_paymentrequests">Recent Payments</a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=receipts/receipt">Receipts</a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=vouchers/voucher">Vouchers</a></li>
        <li class="sidebar-item">
            <a data-bs-target="#schemes" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Schemes</span>
            </a>
            <ul id="schemes" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=schemes/activescheme">Active Schemes</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#contracts" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">My Contracts</span>
            </a>
            <ul id="contracts" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <!--<li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=contracts/new">New Contract</a></li>-->
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=contracts/list">View Contracts</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#events" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Events</span>
            </a>
            <ul id="events" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=events/currentevents">Current Events</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#activities" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Activities</span>
            </a>
            <ul id="activities" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=activities/recentlogin">Recent Login</a></li>
            </ul>
        </li>
    </ul>
    <div class="sidebar-cta" style="border-top:1px solid #666;margin-top:30px">
         <div class="sidebar-cta-content" style="background: none;padding: 0px !important;margin-top:10px">
        <div style="color:#ccc;font-weight: normal;font-size: 13px;"><?php echo $_SESSION['User']['EmployeeCategoryTitle'];?></div>
        <div style="color:#999;font-weight: normal;font-size: 11px;">Ver 1.22.9</div>
    </div>
    <div class="sidebar-cta" style="display: none;">
        <div class="sidebar-cta-content">
            <strong class="d-inline-block mb-2">Monthly Sales Report</strong>
            <div class="mb-3 text-sm">
                Your monthly sales report is ready for download!
            </div>
            <div class="d-grid">
                <a href="https://themes.getbootstrap.com/product/appstack-responsive-admin-template/" class="btn btn-primary" target="_blank">Download</a>
            </div>
        </div>
    </div>
</div> 