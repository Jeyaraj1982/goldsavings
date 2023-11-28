<div class="container-fluid p-0">
    <div class="col-sm-12">
        <div class="row">
        <div class="col-9">
            <h1 class="h3">My Contracts</h1>
        </div>
        <div class="col-3" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?" class="btn btn-outline-primary btn-sm">Back</a>
     </div>
     </div>
     </div>
     <div class="row" id="_content">        </div>
        
</div>
<script>
function loadContracts() {
    openPopup();
    $.post(URL+ "webservice.php?action=ListAll&method=Contracts","",function(data){
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
                                            + '<div style="font-weight:bold;">Contract ID</div>'
                                            + '<div style="">'+data.ContractCode+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right">'
                                             + '<div class="dropdown position-relative">'
                                                + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static" style="color:#9a9dc6">'
                                                 + '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>'
                                                + '</a>'
                                                + '<div class="dropdown-menu dropdown-menu-end">'
                                                    + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/viewcontract&view='+data.ContractCode+'&fpg=contracts/list">View Contract</a>'
                                                    + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'&fpg=contracts/list">View Scheme</a>';
                                                    if (parseInt(data.Receipts)>0) {
                                                        html +=  '<a class="dropdown-item" href="'+URL+'dashboard.php?action=receipts/receipt&contract='+data.ContractCode+'&fpg=contracts/list">View Receipts</a>';
                                                    } else {
                                                        html +=  '<a class="dropdown-item" href="javascript:void(0)" style="color:#aaa">View Receipts</a>';
                                                    }
                                                    if (data.VoucherNumber!="") {
                                                        html +=  '<a class="dropdown-item" href="'+URL+'dashboard.php?action=vouchers/viewvoucher&number='+data.VoucherNumber+'&fpg=contracts/list">View Voucher</a>';
                                                    } else {
                                                        html +=  '<a class="dropdown-item" href="javascript:void(0)" style="color:#aaa">View Voucher</a>';
                                                    }
                                                html += '</div>'
                                                + '</div>'
                                                 + '<div class="col-12">';
                                                    if (data.IsActive=="1") {
                                                        html += '<span class="badge bg-success" style="text-align: right;">Active</span>';
                                                    } else if (data.IsActive=="0") {
                                                        html += '<span class="badge bg-secondary" style="text-align: right;">Disabled</span>';
                                                    } else if (data.IsActive=="3") {
                                                        html += '<span class="badge bg-primary" style="text-align: right;">Closed</span>';
                                                    }
                                                html += '</div>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight: bold;">Scheme Name</div>'
                                            + '<div>' + data.SchemeName + '</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right">'
                                            + '<div style="font-weight: bold;">Amount </div>'
                                            + '<span>₹</span>&nbsp;<span>' + data.ContractAmount + '</span>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight: bold;">Started</div>'
                                            + '<div>' + data.StartDate + '</div>'
                                        + '</div>'
                                        + '<div class="col-6">';
                                            if (data.IsActive=="1") {
                                                html += '<div style="font-weight: bold; text-align:right">End Date</div>'
                                                    + '<div style="text-align:right">' + data.EndDate + '</div>'
                                            } else if (data.IsActive=="3") {
                                               html += '<div style="font-weight: bold; text-align:right">Closed</div>'
                                                    + '<div style="text-align:right">' + data.ClosedOn + '</div>'
                                            } else if (data.IsActive=="0") {
                                                html += '<div style="font-weight: bold; text-align:right">End Date</div>'
                                                    + '<div style="text-align:right">' + data.EndDate + '</div>'
                                            }
                                        html += '</div>'
                                        +'<div class="col-6" style="padding-top:5px">'
                                            +'<table>'
                                                +'<tr>'
                                                    +'<td style="vertical-align: top"><img src="<?php echo URL;?>assets/gold-bars.png" align="middle"></td>'
                                                    +'<td style="line-height: 12px;"><span id="GoldInGrams"><b>' + data.GoldInGram +'</b><br><span style="font-size:10px">Gms</span></span></td>'
                                                +'</tr>'
                                            +'</table>'
                                        +'</div>' 
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
            
        } else {
            html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
                $('#_content').html(html);
            $('#process_popup').modal('hide');
        }
    });
}
setTimeout("loadContracts()",2000);
</script>