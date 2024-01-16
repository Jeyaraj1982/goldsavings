<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table style="width:100%">
                            <tr>
                                <td>
                                    <div style="font-weight: bold;">Branch Name</div>
                                    <?php echo $data[0]['BranchName'];?>
                                </td>
                                <td style="text-align:right;width:50px">
                                    <div class="dropdown position-relative">'
                                        <a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">
                                            <img src="<?php echo URL;?>assets/icons/more.png" style=" rotate: 90deg;">
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" style="padding: 2px 12px !important" href="<?php echo URL;?>dashboard.php?action=branch/view&edit=<?php echo $data[0]['BranchID'];?>&fpg=branch/list">View</a>
                                            <a class="dropdown-item" style="padding: 2px 12px !important" href="'<?php echo URL;?>dashboard.php?action=branch/edit&view=<?php echo $data[0]['BranchID'];?>&fpg=branch/list">Edit</a>
                                            <a class="dropdown-item" style="padding: 2px 12px !important" href="javascript:void(0)" onclick="confirmationtoDelete('<?php echo $data[0]['BranchID'];?>')">Delete</a>
                                            <hr style="margin:0px !important">
                                            <a class="dropdown-item" style="padding: 2px 12px !important" href="<?php echo URL;?>dashboard.php?action=branch/branchadmins&branch=<?php echo $data[0]['BranchID'];?>&fpg=branch/list">Branch Admins</a>
                                            <a class="dropdown-item" style="padding: 2px 12px !important" href="<?php echo URL;?>dashboard.php?action=branch/branchusers&branch=<?php echo $data[0]['BranchID'];?>&fpg=branch/list">Branch Users</a>
                                            <a class="dropdown-item" style="padding: 2px 12px !important" href="<?php echo URL;?>dashboard.php?action=branch/salesman&branch=<?php echo $data[0]['BranchID'];?>&fpg=branch/list">Salesmans</a>
                                            <a class="dropdown-item" style="padding: 2px 12px !important" href="<?php echo URL;?>dashboard.php?action=branch/customers&branch=<?php echo $data[0]['BranchID'];?>&fpg=branch/list">Customers</a>
                                            <a class="dropdown-item" style="padding: 2px 12px !important" href="<?php echo URL;?>dashboard.php?action=branch/contracts&branch=<?php echo $data[0]['BranchID'];?>&fpg=branch/list">Contracts</a>
                                            <a class="dropdown-item" style="padding: 2px 12px !important" href="<?php echo URL;?>dashboard.php?action=branch/receipt&branch=<?php echo $data[0]['BranchID'];?>&fpg=branch/list">Receipts</a>
                                            <a class="dropdown-item" style="padding: 2px 12px !important" href="<?php echo URL;?>dashboard.php?action=branch/pendingdues&branch=<?php echo $data[0]['BranchID'];?>&fpg=branch/list">Pending Dues</a>
                                            <a class="dropdown-item" style="padding: 2px 12px !important" href="<?php echo URL;?>dashboard.php?action=branch/upcommingdues&branch=<?php echo $data[0]['BranchID'];?>&fpg=branch/list">Upcomming Dues</a>
                                            <a class="dropdown-item" style="padding: 2px 12px !important" href="<?php echo URL;?>dashboard.php?action=branch/voucher&branch=<?php echo $data[0]['BranchID'];?>&fpg=branch/list">Vouchers</a>
                                            <hr style="margin:0px !important">
                                            <a class="dropdown-item" style="padding: 2px 12px !important" href="<?php echo URL;?>dashboard.php?action=branch/customized_branchlist&fpg=branch/list">Cutomize columns</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>        