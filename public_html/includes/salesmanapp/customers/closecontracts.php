<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
        <div class="row">
            <div class="col-9">
                <h1 class="h3">Closed contracts</h1>
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
<div class="col-12">
        <?php include_once("customer_side_menu.php"); ?>
    </div>
</div>
    <div class="row" id="_content">
    </div>
</div>

<script>
function listContracts() {
    openPopup();
    $.post(URL+ "webservice.php?action=ListAllClosed&method=Contracts&CustomerID=<?php echo $data[0]['CustomerID']; ?>","",function(data){
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
                                            + '<div style="font-weight:bold;">Contract ID</div>'
                                            + '<div style="">'+data.ContractCode+'</div>'
                                        + '</div>'
                                         + '<div class="col-6" style="text-align:right">'
                                            + '<div class="dropdown position-relative">'
                                                                + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static" style="color:#9a9dc6">'
                                                                + '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>'
                                                                + '</a>'
                                                         + '<div class="dropdown-menu dropdown-menu-end">'
                                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
                                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'">View Scheme</a>'
                                                          if (parseInt(data.Receipts)>0) {
                                                        html +=  '<a class="dropdown-item" href="'+URL+'dashboard.php?action=receipts/receipt&contract='+data.ContractCode+'&fpg=contracts/active"">View Receipts</a>';
                                                    } else {
                                                        html +=  '<a class="dropdown-item" href="javascript:void(0)" style="color:#aaa">View Receipts</a>';
                                                    }
                                                    
                                                html += '</div>' 
                                             + '</div>'
                                             + '<div class="col-12">';
                                                if (data.IsClosed=="0") {
                                                    html += '<span class="badge bg-success" style="text-align: right;">Active</span>';
                                                } else if (data.IsClosed=="1") {
                                                    html += '<span class="badge bg-primary" style="text-align: right;">Closed</span>';
                                                } 
                                            html += '</div>'
                                
                                        + '</div>'
                                         + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Scheme Name</div>'
                                            + '<div style="">'+data.SchemeName+'</div>'
                                        + '</div>'
                                         + '<div class="col-6" style="text-align:right">'
                                            + '<div style="font-weight:bold;">Scheme Amount</div>'
                                            + '<span>₹</span>&nbsp;<span style="">'+data.ContractAmount+'</span>'
                                        + '</div>'
                                         + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Started</div>'
                                            + '<div style="">'+data.StartDate+'</div>'
                                        + '</div>'
                                         + '<div class="col-6" style="text-align:right">'
                                            + '<div style="font-weight:bold;">End</div>'
                                            + '<div style="">'+data.EndDate+'</div>'
                                        + '</div>'
                                        +'<div class="col-6" style="padding-top:5px">'
                                            +'<table>'
                                                +'<tr>'
                                                    +'<td style="vertical-align: top"><img src="<?php echo URL;?>assets/gold-bars.png" align="middle"></td>'
                                                    +'<td style="line-height: 12px;"><span id="GoldInGram"><b>' + data.GoldInGram +'</b><br><span style="font-size:10px">Gms</span></span></td>'
                                                +'</tr>'
                                            +'</table>'
                                        +'</div>'
                                         + '<div class="col-6" style="text-align:right">'
                                            + '<span style="font-weight: bold;">' + data.PaidDues + '</span>' + '&nbsp;/&nbsp;' + '<span style="font-weight: bold;">' + data.UnPaidDues + '</span>&nbsp;<span>' + data.InstallmentMode + '</span>'
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
setTimeout("listContracts()",2000);
</script>           