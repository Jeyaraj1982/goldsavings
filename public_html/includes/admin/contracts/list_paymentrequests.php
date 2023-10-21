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
                                <th>Customer<br>Name</th>
                                <th>Conract<br>ID</th>
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
                                <td colspan="9" style="text-align: center;background:#fff !important">Loading Payments...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
                            + '<td>' + data.CustomerName + '</td>'
                            + '<td>' + data.ContractCode + '</td>'
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
                             html+= '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                        + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/viewrecentpayment&id='+data.PaymentRequestID+'">View</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });
            if (obj.data=="") {
                 html += '<tr>'
                            + '<td colspan="9" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_content').html(html);
            
        } else {
            alert(obj.message);
        }
    });
} 
setTimeout("listPaymentbank()",2000);
</script>