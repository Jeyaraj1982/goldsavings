<?php $data= $mysql->select("select * from _tbl_receipts where ReceiptNumber='".$_GET['number']."'");?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h1 class="h3 mb-2">Select payment mode</h1>
        </div>
        <div class="col-12">
            <div class="list-group">
                  <a href="<?php echo URL;?>dashboard.php?action=profile/profileinfo" class="list-group-item list-group-item-action">Offline payment</a>
                  <a href="javascript:void(0)" class="list-group-item list-group-item-action">Online payment</a>
            </div>
</div>  
</div>  
</div>  

         