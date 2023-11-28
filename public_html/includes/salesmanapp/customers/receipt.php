<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Receipt</h1>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?" class="btn btn-outline-primary btn-sm">Back</a>
        </div>
    <div class="col-12">
        <?php include_once("customer_side_menu.php"); ?>
    </div>
</div>
    <div class="row" id="_content">
    </div>
</div>

<script>

function listReceipts() {
    var param = $('#frm_receipt').serialize();
    openPopup();
    clearDiv(['message']);
    $.post(URL+ "webservice.php?action=getReceipts&customer=<?php echo $data[0]['CustomerID']; ?>",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
               html += '<div class="col-12">'
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
                                             + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=receipts/receipt&number='+data.ReceiptNumber+'">View Receipt</a>'
                                             + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
                                     + '</div>'
                                     + '</div>'
                                     + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Receipt Date</div>'
                                            + '<div style="">'+data.ReceiptDate+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right">'
                                            + '<div style="font-weight:bold;">Contract ID</div>'
                                            + '<div style="">'+data.ContractCode+'</div>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Due Number</div>'
                                            + '<div style="">'+data.DueNumber+'</div>'
                                        + '</div>'
                                        
                                        + '<div class="col-6" style="text-align:right">'
                                            + '<div style="font-weight:bold;">Paid Amount</div>'
                                            + '<span>₹</span>&nbsp;<span style="">'+data.DueAmount+'</span>'
                                        + '</div>'
                                         +'<div class="col-6" style="padding-top:5px;">'
                                            +'<table>'
                                                +'<tr>'
                                                    +'<td style="vertical-align: top"><img src="<?php echo URL;?>assets/gold-bars.png" align="middle"></td>'
                                                    +'<td style="line-height: 12px;"><span id="DueGold"><b>' + data.DueGold +'</b><br><span style="font-size:10px">Gms</span></span></td>'
                                                +'</tr>'
                                            +'</table>'
                                        +'</div>'
                                        + '</div>'                                                                 
                      + '</div></div>';
           });
            if (obj.data.length=="") {
         html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
    }  
            $('#_content').html(html);
        } else {
            html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
                $('#_content').html(html);
            $('#process_popup').modal('hide');
        }
    });
}
setTimeout("listReceipts()",2000)
</script>
         