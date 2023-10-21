<?php $data= $mysql->select("select * from _tbl_receipts where ReceiptNumber='".$_GET['number']."'");?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Receipts</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form id="frm_receipt" name="frm_receipt" id="frm_receipt">
                    <div class="row">
                    <div class="col-sm-9">
                                <label class="form-label">Date Range <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <input type="date" name="FromDate" value="<?php echo date("Y-m-d");?>" id="FromDate" class="form-control" placeholder="From Date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">To</span>
                                </div>
                                <input type="date" value="<?php echo date("Y-m-d");?>" name="ToDate" id="ToDate" class="form-control" placeholder="To Date">
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
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:25px">Receipt<br>Number</th>
                                <th>Receipt<br>Date</th>
                                <th>Customer<br>Name</th>
                                <th>Contract<br>ID</th>
                                <th style="text-align: right;">Gold<br>In-Grams</th>
                                <th style="text-align: right;">Amount</th>
                                <th style="width:50px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="7" style="text-align: center;background:#fff !important">No data found</td>
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
    var param = $('#frm_receipt').serialize();
    openPopup();
    clearDiv(['message']);
    $.post(URL+ "webservice.php?action=getReceipts",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                    + '<td>' + data.ReceiptNumber + '</td>'
                    + '<td>' + data.ReceiptDate + '</td>'
                    + '<td>' + data.CustomerName + '</td>'
                    + '<td>' + data.ContractCode + '</td>'
                    + '<td style="text-align: right;">' + data.DueGold + '</td>'
                    + '<td style="text-align: right;">' + data.DueAmount + '</td>'
                    + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=receipts/receipt&number='+data.ReceiptNumber+'">View Receipt</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/view&customer='+data.CustomerID+'">View Customer</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
            });
             if (obj.data.length==0) {
         html += '<tr>'
                    + '<td colspan="7" style="text-align: center;background:#fff !important">No Data Found</td>'
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
         