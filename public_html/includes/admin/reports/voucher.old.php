<?php $data= $mysql->select("select * from _tbl_receipts where ReceiptNumber='".$_GET['number']."'");?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Voucher</h1>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=reports/customized_voucherlist" class="btn btn-warning btn-sm">Customize Columns</a>
     </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form id="frm_voucher" name="frm_voucher" id="frm_voucher">
                    <div class="row">
                    <div class="col-sm-9 mb-3">
                                <label class="form-label">Date Range <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <input type="text" readonly="readonly" name="FromDate" value="<?php echo date("d-m-Y");?>" id="FromDate" class="form-control" placeholder="From Date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">To</span>
                                </div>
                                <input type="text" readonly="readonly" name="ToDate" value="<?php echo date("d-m-Y");?>" id="ToDate" class="form-control" placeholder="To Date">
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
                                    <th>Voucher<br>Number</th>
                                    <th>Voucher<br>Date</th>
                                    <th>Customer<br>Name</th>
                                    <th>Contract<br>ID</th>
                                    <th>Voucher<br>Type</th>
                                    <th style="text-align: right;">Gold<br>(Grams)</th>
                                    <th style="text-align: right;">Settlement<br>Amount(₹)</th>
                                    <th></th>
                                </tr>
                            </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="9" style="text-align: center;background:#fff !important">Loading customers ...</td>
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
    var param = $('#frm_voucher').serialize();
    openPopup();
    clearDiv(['message']);
    $.post(URL+ "webservice.php?action=listAll&method=Vouchers",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                             + '<td>' + data.VoucherNumber + '</td>'
                    + '<td>' + data.VoucherDate + '</td>'
                    + '<td>' + data.CustomerName + '</td>'
                    + '<td>' + data.ContractCode + '</td>'
                    + '<td>' + data.VoucherType + '</td>'
                    + '<td style="text-align:right">' + data.GoldInGrams + '</td>'
                    + '<td style="text-align:right">' + data.TotalPaidAmount + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/voucher&number='+data.VoucherNumber+'&fpg=reports/voucher">View Voucher</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'&fpg=reports/voucher">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/customers/view&customer='+data.CustomerID+'&fpg=reports/voucher">View Customer</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
            }); 
            if (obj.data.length==0) {
         html += '<tr>'
                    + '<td colspan="9" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }  
            $('#tbl_content').html(html);
            $('#listData').show();
            
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#popupcontent').html(errorcontent(obj.message));
            }
            $('#process_popup').modal('hide');
        }
    });
}
</script>
         