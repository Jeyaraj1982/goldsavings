<div class="sidebar-content js-simplebar">
    <a class="sidebar-brand" href="<?php echo URL;?>dashboard.php">
        <img src="<?php echo URL;?>/assets/logo.png" style="height: 32px;">
    </a>
    <ul class="sidebar-nav">
        <li class="sidebar-item active">
            <a href="<?php echo URL;?>dashboard.php"  class="sidebar-link"><i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span></a>
        </li>
        <li class="sidebar-header">
            App Masters & Settings
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#administrators" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Administrators</span>
            </a>
            <ul id="administrators" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=administrators/new">New Administrator</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=administrators/list">View Administrators</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=administrators/searadministrators">Search Administrators</a></li>
            </ul>
        </li>
        <li class="sidebar-item">
            <a data-bs-target="#app_company" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Company</span>
            </a>
            <ul id="app_company" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=company/new">New Company</a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=company/list">View Companies</a></li>
            </ul>
             <a data-bs-target="#app_settings" data-bs-toggle="collapse" class="sidebar-link collapsed">
                <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Settings</span>
            </a>
            <ul id="app_settings" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
            <li class="sidebar-item"><a class="sidebar-link" href="<?php echo URL;?>dashboard.php?action=masters/userroles/list">User Roles</a></li>
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