<?php
    $upcommingDues = $mysql->select("select * from  _tbl_contracts_dues where CustomerID='".$_GET['customer']."' and ReceiptID=0 and date(DueDate)>=date('".date("Y-m-d")."') order by DueID limit 0,1");         
    $pendingDues = $mysql->select("select * from  _tbl_contracts_dues where CustomerID='".$_GET['customer']."' and ReceiptID=0 and date(DueDate)<=date('".date("Y-m-d")."') order by DueID desc ");         
?>

<div class="card mb-3">
    <div class="dropdown position-relative" style="text-align: right; padding-right: 10px; padding-top: 10px;">
        <a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static" style="color:#9a9dc6">
        <i class="align-middle" data-feather="external-link"></i>
            <!--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="bi bi-three-dots-vertical" ><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>-->
        </a>
        <div class="dropdown-menu">
    <ul class="list-group">
  <li class="list-group-item"><a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=customers/view&customer=<?php echo $_GET['customer'];?>">Customer Info</a></li>
  <li class="list-group-item"><a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=customers/activecontracts&customer=<?php echo $_GET['customer'];?>">Active Contracts</a></li>
  <li class="list-group-item"><a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=customers/closecontracts&customer=<?php echo $_GET['customer'];?>">Closed Contracts</a></li>
  
  <?php if (sizeof($upcommingDues)>0) { ?>
        <li class="list-group-item"><a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=customers/upcommingdues&customer=<?php echo $_GET['customer'];?>">Upcomming Dues</a> <span class="badge badge-sidebar-primary" style=";padding:5px 10px !important;float:right"><?php echo sizeof($upcommingDues);?></span></li>
            <?php } else { ?>
        <li class="list-group-item"><a class="dropdown-item" href="javascript:void(0)" style="color:#888">Upcomming Dues</a></li>
            <?php } ?>
            <?php if (sizeof($pendingDues)>0) { ?>
        <li class="list-group-item"><a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=customers/pendingdues&customer=<?php echo $_GET['customer'];?>">Pending Dues</a> <span class="badge badge-sidebar-primary" style="background:#d9534f !important;padding:5px 10px !important;float:right"><?php echo sizeof($pendingDues);?></span></li>
            <?php } else {?>
        <li class="list-group-item"><a class="dropdown-item" href="javascript:void(0)" style="color:#888">Pending Dues</a></li>    
            <?php } ?>
  <li class="list-group-item"><a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=customers/documents&customer=<?php echo $_GET['customer'];?>">Documents</a></li>
    <li class="list-group-item"><a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=customers/payments&customer=<?php echo $_GET['customer'];?>">Payments</a></li>
       <li class="list-group-item"><a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=customers/receipt&customer=<?php echo $_GET['customer'];?>">Receipts</a></li>
        <li class="list-group-item"><a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=customers/nominee&customer=<?php echo $_GET['customer'];?>">Nominee</a></li>
        <li class="list-group-item"><a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=customers/list_myreferrel&customer=<?php echo $_GET['customer'];?>">Referrel</a></li>
        <li class="list-group-item"><a class="dropdown-item" href="<?php echo URL;?>dashboard.php?action=customers/activity&customer=<?php echo $_GET['customer'];?>">Activity</a> </li>
 
       </ul> 
       </div>
    
    
</div>
 
    <div class="card-body text-center">
 <div>
 
 
        <img src="img/avatars/avatar.jpg" alt="Chris Wood" class="img-fluid rounded-circle mb-2" style="height: 120px;">
        </div>        
        <h4 class="card-title mb-0"><?php echo $data[0]['CustomerName'];?></h4>
        <div class="text-muted mb-2"><?php echo $data[0]['CustomerTypeName'];?></div>
        <div>
            <!--
                <a class="btn btn-primary btn-sm" href="#">Follow</a>
                <a class="btn btn-primary btn-sm" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg> Message</a>
            -->
        </div> 
    </div>
    </div>
 
