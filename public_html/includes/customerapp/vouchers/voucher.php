<?php $data= $mysql->select("select * from _tbl_receipts where ReceiptNumber='".$_GET['number']."'");?>
<div class="container-fluid p-0">
    <div class="col-sm-12">
        <div class="row">
        <div class="col-9">
            <h1 class="h3">Vouchers</h1>
        </div>
        <div class="col-3" style="text-align:right;">
            <?php 
            $path=URL."dashboard.php";
            if (isset($_GET['fpg'])) {
                $path=URL."dashboard.php?action=".$_GET['fpg'];
            }
            ?>
            <a href="<?php echo $path;?>" class="btn btn-outline-primary btn-sm">Back</a>
     </div>
     </div>
     </div>
     <div class="row" id="_content">
     </div>
        
</div>

<script>

function listVouchers() {
    var param = $('#frm_voucher').serialize();
    openPopup();
    clearDiv(['message']);
    $.post(URL+ "webservice.php?action=getVouchers",param,function(data){
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
                                            + '<div style="font-weight:bold;">Voucher Number</div>'
                                            + '<div style="">'+data.VoucherNumber+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right">'
                                             + '<div class="dropdown position-relative">'
                                                + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static" style="color:#9a9dc6">'
                                                 + '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>'
                                                + '</a>'
                                                 + '<div class="dropdown-menu dropdown-menu-end">'
                                                    + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=vouchers/viewvoucher&number='+data.VoucherNumber+'&fpg=vouchers/voucher"">View Voucher</a>'
                                                    + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/viewcontract&view='+data.ContractCode+'&fpg=vouchers/voucher">View Contract</a>'
                                                 + '</div>' 
                                               + '</div>' 
                                               + '</div>' 
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Voucher Date</div>'
                                            + '<div style="">'+data.VoucherDate+'</div>'
                                        + '</div>' 
                                         + '<div class="col-6" style="text-align:right;">'
                                            + '<div style="font-weight:bold;">Contract ID</div>'
                                            + '<div style="">'+data.ContractCode+'</div>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                            +'<table>'
                                                +'<tr>'
                                                    +'<td style="vertical-align: top"><img src="<?php echo URL;?>assets/gold-bars.png" align="middle"></td>'
                                                    +'<td style="line-height: 12px;"><span id="GoldInGram"><b>' + data.GoldInGrams +'</b><br><span style="font-size:10px">Gms</span></span></td>'
                                                +'</tr>'
                                            +'</table>'
                                        +'</div>'
                                        + '<div class="col-6" style="text-align:right;">'
                                            + '<div style="font-weight:bold;">Voucher Type</div>'
                                            + '<div style="">'+data.VoucherType+'&nbsp;/&nbsp;'+data.MaterialType+'</div>'
                                        + '</div>'
                                        
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Settlement</div>'
                                            + '<span> ₹ </span><span style="">'+data.TotalPaidAmount+'</span>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right;">'
                                            + '<div style="font-weight:bold;">Cleared</div>'
                                            + '<div style="">N/A</div>'
                                        + '</div>'
                                      + '</div>'                                                                 
                                    + '</div></div>'
                                +'</div>';
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

setTimeout("listVouchers()",2000);

</script>
         