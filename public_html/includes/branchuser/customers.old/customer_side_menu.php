<?php
    $upcommingDues = $mysql->select("select * from  _tbl_contracts_dues where CustomerID='".$_GET['customer']."' and ReceiptID=0 and date(DueDate)>=date('".date("Y-m-d")."') order by DueID limit 0,1");         
    $pendingDues = $mysql->select("select * from  _tbl_contracts_dues where CustomerID='".$_GET['customer']."' and ReceiptID=0 and date(DueDate)<=date('".date("Y-m-d")."') order by DueID desc ");         
?>
<div class="card mb-3">
    <div class="card-body text-center">
 <div>
        <i class="align-middle me-2" data-feather="camera" onclick="addProfileForm()" style="cursor:pointer; position: absolute;top: 130px !important;right: 50px !important;"></i>
        <img src="img/avatars/avatar.jpg" alt="Chris Wood" class="img-fluid rounded-circle mb-2" width="128" height="128">
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
    <ul style="text-align:left;" class="list-group list-group-flush">
        <li class="list-group-item"><a href="<?php echo URL;?>dashboard.php?action=customers/view&customer=<?php echo $_GET['customer'];?>">Customer Info</a></li>
        <li class="list-group-item"><a href="<?php echo URL;?>dashboard.php?action=customers/contracts&customer=<?php echo $_GET['customer'];?>">Contracts</a></li>
        <li class="list-group-item"><a href="<?php echo URL;?>dashboard.php?action=customers/contracts&customer=<?php echo $_GET['customer'];?>">Closed Contracts</a></li>
        <?php if (sizeof($upcommingDues)>0) { ?>
            <li class="list-group-item"><a href="<?php echo URL;?>dashboard.php?action=customers/upcommingdues&customer=<?php echo $_GET['customer'];?>">Upcomming Dues</a> <span class="badge badge-sidebar-primary" style=";padding:5px 10px !important;float:right"><?php echo sizeof($upcommingDues);?></span></li> 
        <?php } else { ?>
            <li class="list-group-item"><a href="javascript:void(0)" style="color:#888">Upcomming Dues</a></li>
        <?php } ?>
        <?php if (sizeof($pendingDues)>0) { ?>
            <li class="list-group-item"><a href="<?php echo URL;?>dashboard.php?action=customers/pendingdues&customer=<?php echo $_GET['customer'];?>">Pending Dues <span class="badge badge-sidebar-primary" style="background:#d9534f !important;padding:5px 10px !important;float:right"><?php echo sizeof($pendingDues);?></span></a></li>
        <?php } else {?>
            <li class="list-group-item"><a href="javascript:void(0)" style="color:#888">Pending Dues</a></li>    
        <?php } ?>
        <li class="list-group-item"><a href="<?php echo URL;?>dashboard.php?action=customers/documents&customer=<?php echo $_GET['customer'];?>">Documents</a></li>
        <li class="list-group-item"><a href="<?php echo URL;?>dashboard.php?action=customers/payments&customer=<?php echo $_GET['customer'];?>">Payments</a></li>
        <li class="list-group-item"><a href="<?php echo URL;?>dashboard.php?action=customers/receipt&customer=<?php echo $_GET['customer'];?>">Receipts</a></li>
        <li class="list-group-item"><a href="<?php echo URL;?>dashboard.php?action=customers/nominee&customer=<?php echo $_GET['customer'];?>">Nominee</a></li>
        <li class="list-group-item"><a href="<?php echo URL;?>dashboard.php?action=customers/list_myreferrel&customer=<?php echo $_GET['customer'];?>">Referrel</a></li>
        <li class="list-group-item"><a href="<?php echo URL;?>dashboard.php?action=customers/activity&customer=<?php echo $_GET['customer'];?>">Activity</a></li> 
    </ul>
    <div style="height:50px">
    
    </div> 
</div>

<div class="modal fade" id="profileconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Profile Photo Upload</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid p-0">
    <form id="frm_create_ProfilePhoto" name="frm_create_ProfilePhoto" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $data[0][' EmployeeID'];?>" name="EmployeeID" id=" EmployeeID">
        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Select Image <span style='color:red'>*</span></label>
                                <input type="file" name="ProfilePhoto" id="ProfilePhoto" class="form-control" placeholder="ProfilePhoto">
                                <span id="ErrProfilePhoto" class="error_msg"></span>
                            </div>
                             
                         </div>
                      </form>
                   </div>
               </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="addProfileNew()" class="btn btn-primary">Upload</button>
      </div>
    </div>
  </div>
</div>
<script>
function addProfileForm(){
  $('#profileconfirmation').modal("show");
    clearDiv(['ProfilePhoto']);
   
}  
function addProfileNew() {
    var param = $('#frm_create_ProfilePhoto').serialize();
    clearDiv(['ProfilePhoto']);
    $.post(URL+"webservice.php?action=addNew&method=Employees",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#profileconfirmation').modal("hide");
            openPopup();
            $('#frm_create_ProfilePhoto').trigger("reset");
            if (obj.EmployeeCode.length>3) {
                $('#EmployeeCode').val(obj.EmployeeCode);
            }
            $('#popupcontent').html(success_content(obj.message,'closePopup')); 
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
        }
    });
}
</script>