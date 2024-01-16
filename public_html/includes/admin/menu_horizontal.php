<div class="menu2">
    <ul>
        <li><a href="<?php echo URL;?>dashboard.php">Home</a></li>
        <li>
            <a href="javascript:void(0)">Administrations</a>
            <ul>
                <li><a href="javascript:void(0)">Branches</a>
                    <ul>
                        <li><a href="<?php echo URL;?>dashboard.php?action=branch/new">New Branch</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=branch/list">Manage Branches</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)">Users</a>
                    <ul>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/users/new">New User</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/users/list">View Users</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/users/searchusers">Search Users</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)">Employees</a>
                    <ul>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/employees/new">New Employee</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/employees/list">View Employees</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/employees/createdbyme">Created by Me</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/employees/searchemployees">Search Employees</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)">Salesman</a>
                    <ul>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/salesman/new">New Salesman</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/salesman/list">View Salesmans</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/salesman/createdbyme">Created by Me</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/salesman/searchsalesman">Search Salesmans</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)">Masters</a>
                    <ul>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/areanames/list">Area Names</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/customertypes/list">Customer Types</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/districtnames/list">District Names</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/documenttypes/list">Document Types</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/employeecategory/list">Employee Categories</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/file_extensions/list">File Extensions</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/goldprice/list"> Gold & Silver Rates</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/paymentbank/list">Payment Banks</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/paymentmode/list">Payment Modes</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/relationnames/list">Relation Names</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/schemes/list&type=active">Schemes</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/statenames/list">State Names</a></li>
                        <li><a href="<?php echo URL;?>dashboard.php?action=masters/userroles/list">User Roles</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:void(0)">Customers</a>
            <ul>
                <li><a href="<?php echo URL;?>dashboard.php?action=../common/customers/new">New Customer</a></li>
                <li><a href="<?php echo URL;?>dashboard.php?action=../common/customers/list">View Customers</a></li>
                <li><a href="<?php echo URL;?>dashboard.php?action=../common/customers/createdbyme">Created by Me</a></li>
                <li><a href="<?php echo URL;?>dashboard.php?action=../common/customers/searchcustomers">Search Customers</a></li>
                <li><a href="<?php echo URL;?>dashboard.php?action=../common/customers/wallet">Wallet</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Contracts</a>
            <ul>
                <li><a href="<?php echo URL;?>dashboard.php?action=../common/contracts/new">New Contract</a></li>
                <li><a href="<?php echo URL;?>dashboard.php?action=../common/contracts/list">View Contracts</a></li>
                <li><a href="<?php echo URL;?>dashboard.php?action=../common/contracts/searchcontract">Search Contracts</a></li>
                <li><a href="<?php echo URL;?>dashboard.php?action=../common/contracts/createdbyme">Created by Me</a></li>
            </ul>
        </li>
    </ul>
</div>