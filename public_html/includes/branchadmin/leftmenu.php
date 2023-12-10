<div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="<?php echo URL;?>dashboard.php">
        <img src="<?php echo URL;?>/assets/logo.png" style="height: 32px;">
    </a>
    <ul class="sidebar-nav">
        
        <li class="sidebar-item active">
            <a href="<?php echo URL;?>dashboard.php"  class="sidebar-link"><i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span></a>
        </li>
        <li class="sidebar-header">Quick Links</li>
         <li class="sidebar-item">
            <a data-bs-target="#customers" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Customers</span>
            </a>
            <ul id="customers" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
              <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/customers/new">New Customer</a></li>
                 <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/customers/list">View Customers</a></li>
                 <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/customers/searchcustomers">Search Customers</a></li>  
            </ul>
        </li>
         <li class="sidebar-item">
            <a data-bs-target="#contracts" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Contracts</span>
            </a>
            <ul id="contracts" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php? action=contracts/new">New Contract</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=contracts/list">View Contracts</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#schemes" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Schemes</span>
            </a>
            <ul id="schemes" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=schemes/scheme&type=active">Active Schemes</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=schemes/schemetype=deactive">Deactivated Schemes</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#reports" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Reports</span>
            </a>
            <ul id="reports" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/customerwise">Customer Wise</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/schemewise">Scheme Wise</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/salesmanwise">Salesman Wise</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/pendingdues">Pending dues</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/upcommingdues">Upcomming dues</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/receipt">Receipts</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/voucher">Vouchers</a></li>
            </ul> 
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#recentpayments" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Recent Payments</span>
            </a>
            <ul id="recentpayments" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=recentpayments/list">View Payments</a></li>
            </ul>
        </li>
        <li class="sidebar-header">Administrators</li>
        <li class="sidebar-item">
            <a data-bs-target="#branch" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Branches</span>
            </a>
            <ul id="branch" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/branch/list">View Branches</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#employees" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Employees</span>
            </a>
            <ul id="employees" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/employees/new">New Employee</a></li>
                 <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/employees/list">View Employees</a></li>
                 <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/employees/searchemployees">Search Employees</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#salesman" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Salesmans</span>
            </a>
            <ul id="salesman" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/salesman/new">New Salesman</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/salesman/list">view Salesmans</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/salesman/searchsalesman">Search Salesman</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#users" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Users</span>
            </a>
            <ul id="users" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/users/list">view Users</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/users/searchusers">Search Users</a></li>
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