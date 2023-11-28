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
                    <div class="col-sm-6">
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
                        <div style="font-weight: bold;">Status</div>
                            <div id="RequestStatus"></div>
                        </div>
                    <div class="col-sm-6">
                        <div style="font-weight: bold;">Customer Information</div>
                            <div id="CustomerInformation"></div>
                        <div style="font-weight: bold;">Contract Information</div>
                            <div id="ContractInformation"></div>
                        <div style="font-weight: bold;">Bank Information</div>
                            <div id="BankInformation"></div>
                        </div>
                    </div>
                </div>
             </div>
             <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=contracts/list_paymentrequests" style="font-size: 10px" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <button type="button" onclick="rejectconfirmation()" style="font-size: 10px" class="btn btn-danger">Reject</button>&nbsp;&nbsp;
                <button type="button" onclick="approvedconfirmation()" style="font-size: 10px" class="btn btn-primary">Approved</button>
            </div>
        </div>
    </div>
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
            $('#RequestCode').html(data.RequestCode);
            $('#PaymentDate').html(data.PaymentDate);
            $('#CustomerInformation').html(data.CustomerName + '<br>' + data.CustomerCode);
            $('#ContractInformation').html(data.ContactCode + '<br> Due Number:&nbsp;' + data.DueID + '<br> Due Amount:&nbsp;' + data.DueAmount);
            $('#ModeOfBenifits').html(data.ModeOfBenifits);
            $('#PaymentBank').html(data.PaymentBank);
            $('#DueAmount').html(data.DueAmount);
            $('#RequestedOn').html(data.RequestedOn);
            $('#BankReferenceNumber').html(data.BankReferenceNumber);
            $('#PaymentRemarks').html(data.PaymentRemarks);
             $('#BankInformation').html(data.PaymentBankAccountHolderName + '<br>'+data.PaymentBankName  + '<br>' +data.PaymentBankNumber + '<br>' +data.PaymentBankIFSCode);
             
             if (data.RequestStatus=="REQUEST") {
                                $('#RequestStatus').html( '<span class="badge bg-info">REQUEST</span> ');
                            } else if (data.RequestStatus=="APPROVED") {
                                $('#RequestStatus').html( '<span class="badge bg-sucess">APPROVED</span>');
                            } else if (data.RequestStatus=="REJECT") {
                                $('#RequestStatus').html( '<span class="badge bg-danger">REJECT</span> ');
                            }
             });

               closePopup();
        }
  });
} 

setTimeout("getData()",2000);  

function rejectconfirmation(){
   $('#confirmationtoReject').modal("show");  
 }
function RejectNew() {
     $('#confirmationtoReject').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['CustomerName','MobileNumber','ReferralName','Amount','Installments','InstallmentMode','InstallmentAmount','MaterialType','ModeOfBenifits','Remarks','IsActive']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=Contracts&Customer="+selectedCustomerID+"&Scheme="+selectedSchemeID,
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                CreatedContractID = obj.ContractID;
                $('#popupcontent').html(success_content(obj.message,'closePopup(); opencontractview'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message)
                } else {
                    $('#failure_div').html(obj.message);
                }
                $('#process_popup').modal('hide');
             }
        }
    });
}

function approvedconfirmation(){
   $('#confirmationtoApproved').modal("show");  
 }
function ApprovedNew() {
     $('#confirmationtoApproved').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['CustomerName','MobileNumber','ReferralName','Amount','Installments','InstallmentMode','InstallmentAmount','MaterialType','ModeOfBenifits','Remarks','IsActive']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=Contracts&Customer="+selectedCustomerID+"&Scheme="+selectedSchemeID,
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                CreatedContractID = obj.ContractID;
                $('#popupcontent').html(success_content(obj.message,'closePopup(); opencontractview'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message)
                } else {
                    $('#failure_div').html(obj.message);
                }
                $('#process_popup').modal('hide');
             }
        }
    });
}  
</script>
