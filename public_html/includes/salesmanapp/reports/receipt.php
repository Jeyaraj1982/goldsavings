<?php $data= $mysql->select("select * from _tbl_receipts where ReceiptNumber='".$_GET['number']."'");?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Receipt</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-2">
                <div class="card-body">
                    <form id="frm_receipt" name="frm_receipt" id="frm_receipt">
                    <div class="row">
                    <div class="col-12">
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
    <div class="row" id="_content" style="display:none">
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
                html += '<div class="col-sm-12">'
                            + '<div class="card mb-2">'
                                + '<div class="card-body" style="padding:10px 15px">'
                                    + '<div class="row">'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Receipt Number</div>'
                                            + '<div style="">'+data.ReceiptNumber+'</div>'
                                        + '</div>'
                                         + '<div class="col-6" style="text-align:right">'
                                            + '<div class="dropdown position-relative">'
                                                                + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static" style="color:#9a9dc6">'
                                                                + '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>'
                                                                + '</a>'
                                                         + '<div class="dropdown-menu dropdown-menu-end">'
                                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=receipts/receipt&number='+data.ReceiptNumber+'&fpg=reports/receipt">View Receipt</a>'
                                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'&fpg=reports/receipt">View Contract</a>'
                                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/view&customer='+data.CustomerID+'&fpg=reports/receipt">View Customer</a>'
                                                         + '</div>'
                                            + '</div>'
                                         + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Receipt Date</div>'
                                            + '<div style="">'+data.ReceiptDate+'</div>'
                                        + '</div>' 
                                         + '<div class="col-6" style="text-align:right">'
                                            + '<div style="font-weight:bold;">Customer Name</div>'
                                            + '<div style="">'+data.CustomerName+'</div>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Contract ID</div>'
                                            + '<div style="">'+data.ContractCode+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right">'
                                            + '<div style="font-weight:bold;">Due Number</div>'
                                            + '<div style="">'+data.DueNumber+'</div>'
                                        + '</div>'
                                         +'<div class="col-6" style="padding-top:5px;">'
                                            +'<table>'
                                                +'<tr>'
                                                    +'<td style="vertical-align: top"><img src="<?php echo URL;?>assets/gold-bars.png" align="middle"></td>'
                                                    +'<td style="line-height: 12px;"><span id="DueGold"><b>' + data.DueGold +'</b><br><span style="font-size:10px">Gms</span></span></td>'
                                                +'</tr>'
                                            +'</table>'
                                        +'</div>'
                                        + '<div class="col-6" style="text-align:right">'
                                            + '<div style="font-weight:bold;">Paid Amount</div>'
                                            + '<span>₹</span>&nbsp;<span style="">'+data.DueAmount+'</span>'
                                        + '</div>'
                                    + '</div>'                                                                 
                      + '</div></div>';
                     
           });
            if (obj.data.length=="") {
         html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
    }  
            $('#_content').html(html);
            $('#_content').show();
        } else {
            html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
                $('#_content').html(html);
            $('#process_popup').modal('hide');
        }
    });
}
</script>
         