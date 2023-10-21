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
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Payment Request</h1>
            <h6 class="card-subtitle text-muted mb-3">List <?php echo $title;?> payment requests</h6>
        </div>
        <div class="col-6" style="text-align: right;">
            <a href="<?php echo URL;?>dashboard.php?action=contracts/list_paymentrequests&type=request">Requested</a> | 
            <a href="<?php echo URL;?>dashboard.php?action=contracts/list_paymentrequests&type=approved">Approved</a> | 
            <a href="<?php echo URL;?>dashboard.php?action=contracts/list_paymentrequests&type=rejected">Rejected</a> | 
            <a href="<?php echo URL;?>dashboard.php?action=contracts/list_paymentrequests&type=all">All</a>
        </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:15px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                                <tr>
                                    <th style="width:100px;">Request<br>ID</th>
                                    <th style="width:100px;">Payment<br>Date</th>
                                    <th style="width:100px;text-align:right">Due<br>Amount(₹)</th>
                                    <th style="width:150px;">Reference<br>Number</th>
                                    <th style="width:150px;">Payment<br>Frequencey</th>
                                    <th style="width:70px;">Status</th>
                                    <th style="width:50px;"></th>
                                </tr>
                            </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="7" style="text-align: center;background:#fff !important">Loading payment requests...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
                        <div style="font-weight: bold;">Contract Information</div>
                            <div id="ContractInformation"></div>
                        <div style="font-weight: bold;">Bank Information</div>
                            <div id="BankInformation"></div>
                        </div>
                    </div>
                    </form>
                </div>
             </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
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
                html += '<tr>'
                           + '<td>' + data.RequestCode + '</td>'
                            + '<td>' + data.PaymentDate + '</td>'
                            + '<td style="text-align:right;text-align:right">' + data.DueAmount + '</td>'
                            + '<td>' + data.BankReferenceNumber + '</td>'
                            + '<td>' + data.Frequency + '</td>'
                              if (data.RequestStatus=="REQUEST") {
                                html += '<td> <span class="badge bg-info">REQUEST</span> </td>';
                            } else if (data.RequestStatus=="APPROVED") {
                                html += '<td> <span class="badge bg-success">APPROVED</span> </td>';
                            } else if (data.RequestStatus=="REJECTED") {
                                html += '<td> <span class="badge bg-danger">REJECTED</span> </td>';
                            }
                            html+= '<td style="text-align:right"><a onclick="viewpayments('+data.PaymentRequestID+')" class="btn btn-primary btn-sm" style="font-size:10px">View</a></td>'
                      + '</tr>';
            });
            if (obj.data=="") {
                 html += '<tr>'
                            + '<td colspan="7" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_content').html(html);
             if (($.fn.dataTable.isDataTable("#datatables-fixed-header"))) {
                $("#datatables-fixed-header").DataTable({
                    fixedHeader: true,
                    pageLength: 25
                });
            }
        } else {
            alert(obj.message);
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
                            } else if (data .RequestStatus=="APPROVED") {
                                $('#RequestStatus').html( '<span class="badge bg-sucess">APPROVED</span>');
                            } else if (data.RequestStatus=="REJECT") {
                                $('#RequestStatus').html( '<span class="badge bg-danger">REJECT</span> ');
                            }
             });
               closePopup();
        }
  });
}
</script>