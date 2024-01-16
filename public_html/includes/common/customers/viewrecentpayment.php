<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-0">View Payment</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("customer_side_menu.php"); ?>
        </div>
    <div class="col-9 col-sm-9 col-xxl-9">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                    <div class="col-sm-6 mb-3">
                    <div style="font-weight: bold;">Due Amount <span> (₹) </span></div>
                            <div style="font-size: 30px;" id="DueAmount"></div>
                        <div style="font-weight: bold;">Request ID</div>
                            <div id="RequestCode"></div>
                        <div style="font-weight: bold;">Payment Date</div>
                            <div id="PaymentDate"></div>
                        <div style="font-weight: bold;">BankReferenceNumber</div>
                            <div id="BankReferenceNumber"></div>
                        <div style="font-weight: bold;">Payment Remarks</div>
                            <div id="PaymentRemarks"></div>
                        <div style="font-weight: bold;">Requested On</div>
                            <div id="RequestedOn"></div>
                            <div class="mb-3"></div>
                        <div style="font-weight: bold;">Status</div>
                            <div id="RequestStatus"></div>
                            <div id="RequestUpdated"></div>
                        </div>
                    <div class="col-sm-6 mb-3">
                        <div style="font-weight: bold;">Customer Information</div>
                            <div id="CustomerInformation"></div>
                        <div style="font-weight: bold;">Contract Information</div>
                            <div id="ContractInformation"></div>
                        <div style="font-weight: bold;">Bank Information</div>
                            <div id="BankInformation"></div>
                        </div>
                        <div class="col-sm-12" id="remarks" style="display: none">
                                <label class="form-label" style="font-weight: bold;">Admin Remarks <span style='color:red'>*</span></label>
                                <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
                                <input type="hidden"  name="PaymentRequestID" id="PaymentRequestID" class="form-control" value="">
                                <input type="text" name="AdminRemarks" id="AdminRemarks" class="form-control" placeholder="Admin Remarks">
                                <span id="ErrAdminRemarks" class="error_msg"></span>
                                </form>
                            </div>
                            <div class="col-sm-12" id="remarks1" style="display: none">
                            <div style="font-weight: bold;">Admin Remarks</div>
                                 <div id="viewAdminRemarks"></div>
                            </div>
                    </div>
                </div>
             </div>
        </div>
    </div>
 </div>
<div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=contracts/list_paymentrequests" style="font-size: 10px" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <button type="button" id="btnReject" onclick="rejectconfirmation()" style="font-size: 10px;display: none" class="btn btn-danger">Reject</button>&nbsp;&nbsp;
                <button type="button" id="btnApprove" onclick="approvedconfirmation()" style="font-size: 10px;display: none" class="btn btn-primary">Approve</button>
            </div>
            
<div class="modal fade" id="confirmationtoReject" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Reject ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="RejectNew()" class="btn btn-danger">Yes, Reject</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmationtoApproved" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Approved ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="ApprovedNew()" class="btn btn-primary">Yes, Approved</button>
      </div>
    </div>
  </div>
</div>
<script>
function getData(){
    openPopup();
    $.post(URL+ "webservice.php?action=getData&method=PaymentRequests&ID=<?php echo $_GET['id'];?>","",function(data){
        var  obj = JSON.parse(data);
        if (obj.status=="success") {
            var html="";
             $.each(obj.data, function (index, data) {
            $('#PaymentRequestID').val(data.PaymentRequestID);
            $('#RequestCode').html(data.RequestCode);
            $('#RequestUpdated').html(data.RequestUpdated);
            $('#PaymentDate').html(data.PaymentDate);
            $('#CustomerInformation').html(data.CustomerName + '<br>' + data.CustomerCode);
            $('#ContractInformation').html(data.ContractCode + '<br> Due Number:&nbsp;' + data.DueID + '<br> Due Amount:&nbsp;' + data.DueAmount);
            $('#ModeOfBenifits').html(data.ModeOfBenifits);
            $('#PaymentBank').html(data.PaymentBank);
            $('#DueAmount').html(data.DueAmount);
            $('#RequestedOn').html(data.RequestedOn);
            $('#BankReferenceNumber').html(data.BankReferenceNumber);
            $('#PaymentRemarks').html(data.PaymentRemarks);
            $('#viewAdminRemarks').html(data.AdminRemarks);
             $('#BankInformation').html(data.PaymentBankAccountHolderName + '<br>'+data.PaymentBankName  + '<br>' +data.PaymentBankNumber + '<br>' +data.PaymentBankIFSCode);
             
             if (data.RequestStatus=="REQUEST") {
                                $('#RequestStatus').html( '<span class="badge bg-info">REQUEST</span> ');
                                $('#remarks').show(); 
                                $('#btnReject').show(); 
                                $('#btnApprove').show(); 
                            } else if (data.RequestStatus=="APPROVED") {
                                $('#remarks1').show(); 
                                $('#RequestStatus').html( '<span class="badge bg-success">APPROVED</span>');
                            } else if (data.RequestStatus=="REJECTED") {
                                $('#remarks1').show(); 
                                $('#RequestStatus').html( '<span class="badge bg-danger">REJECTED</span> ');
                            }
             });

               closePopup();
        }
  }).fail(function(){
        networkunavailable(); 
    });
} 

setTimeout("getData()",2000);  

function rejectconfirmation(){
    clearDiv(['AdminRemarks']);
   $('#confirmationtoReject').modal("show");  
 }
function RejectNew() {
     $('#confirmationtoReject').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['AdminRemarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doReject&method=PaymentRequests",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                 $('#frm_create').trigger("reset");
                $('#PaymentRequestID').val(obj.PaymentRequestID);
                $('#popupcontent').html(success_content(obj.message,'location.href=location.href; closePopup'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message);
                    $('#process_popup').modal('hide');
                } else {
                   $('#popupcontent').html( errorcontent(obj.message));
                }
              
             }
        },
        error:networkunavailable 
    });
}

function approvedconfirmation(){
   $('#confirmationtoApproved').modal("show");  
 }
function ApprovedNew() {
     $('#confirmationtoApproved').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['AdminRemarks']);    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doApprove&method=PaymentRequests",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                CreatedContractID = obj.ContractID;
                $('#popupcontent').html(success_content(obj.message,'location.href=location.href;closePopup'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message);
                    $('#process_popup').modal('hide');
                } else {
                    $('#popupcontent').html(errorcontent(obj.message));
                }
              //  $('#process_popup').modal('hide');
             }
        }
    }).fail(function(){
        networkunavailable(); 
    });
}  
</script>
