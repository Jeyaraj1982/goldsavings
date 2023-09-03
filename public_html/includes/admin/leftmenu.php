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
        <li class="sidebar-header">
            App Masters & Settings
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#app_team" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Administration</span>
            </a>
            <a data-bs-target="#app_employees" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Employees</span>
            </a>
            <ul id="app_employees" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/employees/new">New Employee</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/employees/list">View Employees</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/employees/list_salesman">Salesman</a></li>
            </ul>
            <a data-bs-target="#app_contracts" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Contracts</span>
            </a>
            <ul id="app_contracts" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=contracts/new">New Contract</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=contracts/list">View Contracts</a></li>
            </ul>
            <a data-bs-target="#app_masters" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Masters</span>
            </a>
            <ul id="app_masters" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/customertypes/list">Customer Types</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/employeecategory/list">Employee Category</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/schemes/list"> Schemes</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/goldprice/list"> Gold price</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/documenttypes/list">Document Types</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/statenames/list">State Name Master</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/districtnames/list">District Name Master</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/areanames/list">Area Name Master</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/benefits/list">Benefits</a></li>
            </ul>
             <a data-bs-target="#app_reports" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Reports</span>
            </a>
            <ul id="app_reports" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/customers">Customer </a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/schemewise">Scheme Wise</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/upcomingdues">Upcoming Dues</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/pendingdues">Pending Dues</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/receiveddues">Received Dues</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/closedschemes">Closed Schemes</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/activeschemes">Active Schemes</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=reports/requesttocloseschemes">Request To Close Schemes</a></li>
            </ul>
             <a data-bs-target="#app_settings" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Settings</span>
            </a>
            <ul id="app_settings" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=settings/smtp">SMTP</a></li>
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