<div class="menu2">
    <ul>
        <li><a href="<?php echo URL;?>dashboard.php">Home</a></li>
        <li>
            <a href="javascript:void(0)">Administrations</a>
            <ul>
                <li><a href="<?php echo URL;?>dashboard.php?action=administrators/new">New Administrator</a></li>
                <li><a href="<?php echo URL;?>dashboard.php?action=administrators/list">View Administrators</a></li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0)">Company</a>
            <ul>
                <li><a href="<?php echo URL;?>dashboard.php?action=company/new">New Company</a></li>
                <li><a href="<?php echo URL;?>dashboard.php?action=company/list">View Companies</a></li>            
            </ul>
        </li>
        <li>
            <a href="javascript:void(0)">Settings</a>
            <ul>
                <li><a href="<?php echo URL;?>dashboard.php?action=masters/userroles/list">User Roles</a></li>
                <li><a href="<?php echo URL;?>dashboard.php?action=settings/list">Manage SMTP</a></li>
            </ul>
        </li>
    </ul>
</div>