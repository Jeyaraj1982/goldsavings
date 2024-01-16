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
            <a data-bs-target="#branch" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Branches</span>
            </a>
            <ul id="branch" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=branch/new">New Branch</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=branch/list">Manage Branches</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#customers" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Customers</span>
            </a>
            <ul id="customers" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=../common/customers/new">New Customer</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=../common/customers/list">View Customers</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=../common/customers/createdbyme">Created by Me</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=../common/customers/searchcustomers">Search Customers</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=../common/customers/wallet">Wallet</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#contracts" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Contracts</span>
            </a>
            <ul id="contracts" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=../common/contracts/new">New Contract</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=../common/contracts/list">View Contracts</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=../common/contracts/searchcontract">Search Contracts</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=../common/contracts/createdbyme">Created by Me</a></li>
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
        <li class="sidebar-item">
            <a data-bs-target="#addressbook" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Address Book</span>
            </a>
            <ul id="addressbook" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=addressbook/new">New Contact</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=addressbook/list">View Contacts</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#events" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Events</span>
            </a>
            <ul id="events" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=events/new">New Events</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=events/list">View Events</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#reports" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Reports</span>
            </a>
            <ul id="reports" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/balancesheet">Balance Sheet</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/customerwise">Customer Wise</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/overallreport">Overall Report</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/pendingdues">Pending dues</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=../common/receipts/receipt">Receipts</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/salesmanwise">Salesman Wise</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/schemewise">Scheme Wise</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/upcommingdues">Upcomming dues</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/userwise">User Wise</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=../common/vouchers/voucher">Vouchers</a></li>
            </ul> 
        </li>
        <li class="sidebar-header">
            App Masters & Settings
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#app_employees" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Employees</span>
            </a>
            <ul id="app_employees" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/employees/new">New Employee</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/employees/list">View Employees</a></li>
                 <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/employees/createdbyme">Created by Me</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/employees/searchemployees">Search Employees</a></li>
            </ul>
            <a data-bs-target="#app_users" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Users</span>
            </a>
            <ul id="app_users" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/users/new">New User</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/users/list">View Users</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/users/searchusers">Search Users</a></li>
            </ul>
            <a data-bs-target="#app_salesman" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Salesman</span>
            </a>
            <ul id="app_salesman" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/salesman/new">New Salesman</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/salesman/list">View Salesmans</a></li>
                 <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/salesman/createdbyme">Created by Me</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/salesman/searchsalesman">Search Salesmans</a></li>
            </ul>
            <a data-bs-target="#app_masters" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Masters</span>
            </a>
            <ul id="app_masters" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/areanames/list">Area Names</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/customertypes/list">Customer Types</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/districtnames/list">District Names</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/documenttypes/list">Document Types</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/employeecategory/list">Employee Categories</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/file_extensions/list">File Extensions</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/goldprice/list"> Gold & Silver Rates</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/paymentbank/list">Payment Banks</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/paymentmode/list">Payment Modes</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/relationnames/list">Relation Names</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/schemes/list&type=active">Schemes</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/statenames/list">State Names</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/userroles/list">User Roles</a></li>
            </ul>
             <a data-bs-target="#app_settings" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Settings</span>
            </a>
            <ul id="app_settings" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=settings/companylist">View Companies</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=settings/list">View SMTP</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=settings/new">New SMTP</a></li>
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