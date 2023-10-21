
<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Payment Request</h1>
            <h6 class="card-subtitle text-muted mb-3">List <?php echo $title;?> payment requests</h6>
        </div>
     </div>
     <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form id="frm_recentpayments" name="frm_recentpayments" id="frm_recentpayments">
                    <div class="row">
                    <div class="col-sm-12 mb-3">
                                <label class="form-label">Date Range <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <input type="date" name="FromDate" value="<?php echo date("Y-m-d");?>" id="FromDate" class="form-control" placeholder="From Date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">To</span>
                                </div>
                                <input type="date" name="ToDate" value="<?php echo date("Y-m-d");?>" id="ToDate" class="form-control" placeholder="To Date">
                                <select class="form-select" name="SelectType" id="SelectType">
                                        <option value="ALL">All</option>
                                        <option value="REQUEST">Request</option>
                                        <option value="APPROVED">Approved</option>
                                        <option value="REJECTED">Reject</option>
                                    </select>
                                <button type="button" onclick="getData()" class="btn btn-primary">Get Data</button>
                            </div> 
                           <span id="Errmessage" class="error_msg"></span>
                    </div>
                    
                     </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <div class="row" id="listData" style="display:none">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:15px">
                <div class="card-actions float-end">
                      <a  href="#"  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="align-middle" data-feather="download"></i></a>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Excel</a></li>
                        <li><a class="dropdown-item" href="#">PDF</a></li>
                      </ul>
                    </div>
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:100px;">Request<br>ID</th>
                                <th>Customer<br>Name</th>
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
                                <td colspan="8" style="text-align: center;background:#fff !important">Loading Payments...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

function getData() {
     var param = $('#frm_recentpayments').serialize();
    openPopup();
    clearDiv(['message']);
    $.post(URL+ "webservice.php?action=listAll&method=PaymentRequests",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                          + '<td>' + data.RequestCode + '</td>'
                            + '<td>' + data.CustomerName + '</td>'
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
             if (obj.data.length==0) {
         html += '<tr>'
                    + '<td colspan="8" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }
            $('#tbl_content').html(html);
            $('#listData').show();
             
            
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
             $('#tbl_content').html("");
            $('#listData').hide();
            $('#process_popup').modal('hide');
        }
    });
}
</script>