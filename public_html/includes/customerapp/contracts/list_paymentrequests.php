<?php
    if (isset($_GET['type']) && $_GET['type']=="approved") {
     echo "<script> var action_name='listApproved';</script>";
     $title="Approved";
    } elseif (isset($_GET['type']) && $_GET['type']=="rejected") {
        echo "<script> var action_name='listRejected';</script>";
        $title="Rejected";
    } elseif (isset($_GET['type']) && $_GET['type']=="request") {
        echo "<script> var action_name='listPendings';</script>";
        $title="Requested";
    } elseif (isset($_GET['type']) && $_GET['type']=="all") {
        echo "<script> var action_name='ListAll';</script>";
        $title="All";
    } else {
        echo "<script> var action_name='listPendings';</script>";
        $title="Requested";
    }
?>
<div class="container-fluid p-0">
<div class="col-sm-12">
     <div class="row">
        <div class="col-12">
            <h1 class="h3">Payment Request</h1>
            <h6 class="card-subtitle text-muted mb-3">List <?php echo $title;?> payment requests</h6>
        </div>
     </div>
        <div class="col-12">
            <a href="<?php echo URL;?>dashboard.php?action=contracts/list_paymentrequests&type=request">Requested</a> | 
            <a href="<?php echo URL;?>dashboard.php?action=contracts/list_paymentrequests&type=approved">Approved</a> | 
            <a href="<?php echo URL;?>dashboard.php?action=contracts/list_paymentrequests&type=rejected">Rejected</a> | 
            <a href="<?php echo URL;?>dashboard.php?action=contracts/list_paymentrequests&type=all">All</a>|
            <?php 
            $path=URL."dashboard.php";
            if (isset($_GET['fpg'])) {
                $path=URL."dashboard.php?action=".$_GET['fpg'];
            }
            ?>
            <a href="<?php echo $path;?>">Back</a>
        </div>
         
     </div>
     <div class="row" id="_content">
     </div>
     </div>
     

<div class="modal fade" id="viewrecentpayments" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Payment Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <div class="modal-body">
           <div class="container-fluid p-0">
              <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
              <input type="hidden" value="<?php echo $data[0][' RateID'];?>" name="RateID" id=" RateID">
              <div class="row">
                    <div class="col-6">
                    <div style="font-weight: bold;">Due Amount <span> (₹) </span></div>
                            <div style="font-size: 30px;" id="DueAmount"></div>
                    </div>
                    <div class="col-6" style="text-align: right;">
                        <div style="font-weight: bold;">Request ID</div>
                            <div id="RequestCode"></div>
                        </div>
                        <div class="col-6">
                        <div style="font-weight: bold;">Payment Date</div>
                            <div id="PaymentDate"></div>
                        </div>
                        <div class="col-6" style="text-align: right;">
                        <div style="font-weight: bold;">Reference Number</div>
                            <div id="BankReferenceNumber"></div>
                        </div>
                        <div class="col-6">
                        <div style="font-weight: bold;">Payment Remarks</div>
                            <div id="PaymentRemarks"></div>
                        </div>
                        <div class="col-6" style="text-align: right;">
                        <div style="font-weight: bold;">Requested On</div>
                            <div id="RequestedOn"></div>
                        </div>
                        
                    <div class="col-6">
                        <div style="font-weight: bold;">Contract Information</div>
                            <div id="ContractInformation"></div>
                    </div>
                    <div class="col-6" style="text-align: right;">
                        <div style="font-weight: bold;">Bank Information</div>
                            <div id="BankInformation"></div>
                        </div> 
                    </div>
                    <div class="col-6">
                        <div style="font-weight: bold;">Status</div>
                            <div id="RequestStatus"></div>
                        </div>
                    </form>
                </div>
             </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary btn-sm" style="font-size: 10px;" data-bs-dismiss="modal">Cancel</button>
      </div>
    </div>
</div>
</div>
                        
<script>

function listPaymentbank() {
    openPopup();
    $.post(URL+ "webservice.php?action="+action_name+"&method=PaymentRequests","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                 html += '<div class="col-sm-12">'
                            + '<div class="card mb-2">'
                                + '<div class="card-body" style="padding:10px 15px">'
                                    + '<div class="row">'
                                          + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Request ID</div>'
                                            + '<div style="">'+data.RequestCode+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right">'
                                            + '<div style="font-weight:bold;">Payment Date</div>'
                                            + '<div style="">'+data.PaymentDate+'</div>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Due Amount</div>'
                                            + '<span>₹</span>&nbsp;<span style="">'+data.DueAmount+'</span>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right">'
                                            + '<div style="font-weight:bold;">Reference Number</div>'
                                            + '<div style="">'+data.BankReferenceNumber+'</div>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;"></div>'
                                            + '<div style="">'+data.Frequency+'</div>'
                                        + '</div>'
                                              if (data.RequestStatus=="REQUEST") {
                                                html += '<div> <span class="badge bg-info">REQUEST</span> </div>';
                                            } else if (data.RequestStatus=="APPROVED") {
                                                html += '<div> <span class="badge bg-success">APPROVED</span> </div>';
                                            } else if (data.RequestStatus=="REJECTED") {
                                                html += '<div> <span class="badge bg-danger">REJECTED</span> </div>';
                                            }
                                            html+= '<div style="text-align:right"><a onclick="viewpayments('+data.PaymentRequestID+')" class="btn btn-primary btn-sm" style="font-size:10px">View</a></div>'
                                      + '</div>'
                                      + '</div>'
                                      + '</div>';
              });
            if (obj.data.length=="") {
         html += '<div>'
                    + '<div style="text-align: center;background:#fff !important;margin-top: 5px;">No data found</div>'
               + '</div>';
    }  
            $('#_content').html(html);
            
        } else {
            html += '<div>'
                    + '<div style="text-align: center;background:#fff !important;margin-top: 5px;">No data found</div>'
               + '</div>';
                $('#_content').html(html);
            $('#process_popup').modal('hide');
        }
    });
}
setTimeout("listPaymentbank()",2000);

function viewpayments(ID) {
   $('#viewrecentpayments').modal("show"); 


    $.post(URL+ "webservice.php?action=getData&method=PaymentRequests&ID="+ID,"",function(data){
        var  obj = JSON.parse(data);
        if (obj.status=="success") {
            $('#viewrecentpayments').modal("hide");
            var html="";
             $.each(obj.data, function (index, data) {
            $('#RequestCode').html(data.RequestCode);
            $('#PaymentDate').html(data.PaymentDate);
            $('#ContractInformation').html(data.ContractCode + '<br> Due Number:&nbsp;' + data.DueNumber + '<br> Due Amount:&nbsp;<span>₹</span>&nbsp;' + data.DueAmount);
            $('#ModeOfBenifits').html(data.ModeOfBenifits);
            $('#PaymentBank').html(data.PaymentBank);
            $('#DueAmount').html(data.DueAmount);
            $('#RequestedOn').html(data.RequestedOn);
            $('#BankReferenceNumber').html(data.BankReferenceNumber);
            if (data.PaymentRemarks=="") {
                $('#PaymentRemarks').html('N/A');
            }  if (data.PaymentRemarks>0) {
                $('#PaymentRemarks').html(data.PaymentRemarks);
            } 
             $('#BankInformation').html(data.PaymentBankAccountHolderName + '<br>'+data.PaymentBankName  + '<br>' +data.PaymentBankNumber + '<br>' +data.PaymentBankIFSCode);
             
             if (data.RequestStatus=="REQUEST") {
                                $('#RequestStatus').html( '<span class="badge bg-info">REQUEST</span> ');
                            } else if (data .RequestStatus=="APPROVED") {
                                $('#RequestStatus').html( '<span class="badge bg-success">APPROVED</span>');
                            } else if (data.RequestStatus=="REJECTED") {
                                $('#RequestStatus').html( '<span class="badge bg-danger">REJECT</span> ');
                            }
             });
               closePopup();
        }
  });
}
</script>