<?php $data= $mysql->select("select * from _tbl_receipts where ReceiptNumber='".$_GET['number']."'");?>
<div class="container-fluid p-0">
    <div class="col-sm-12">
        <div class="row">
        <div class="col-9">
            <h1 class="h3">Pending Dues</h1>
        </div>
        <div class="col-3" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?" class="btn btn-outline-primary btn-sm">Back</a>
     </div>
     </div>
     </div>
     <div class="row" id="_content">
     </div>
</div>

<script>

function getData() {
    var param = $('#frm_pendingdues').serialize();
    openPopup();
    clearDiv(['message']);
    $.post(URL+ "webservice.php?action=getPendingDues",param,function(data){
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
                                                    + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/view&customer='+data.CustomerID+'&fpg=pendingdues/pendingdueslist">View Customer</a>'
                                                    + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'&fpg=pendingdues/pendingdueslist">View Contract</a>'
                                                    + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/viewscheme&edit='+data.SchemeID+'&fpg=pendingdues/pendingdueslist">View Scheme</a>'
                                             + '</div>'
                                         + '</div>'
                                         + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Customer Name</div>'
                                            + '<div style="">'+data.CustomerName+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right">'
                                            + '<div style="font-weight:bold;">Scheme Name</div>'
                                            + '<div style="">'+data.SchemeName+'</div>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Due Date</div>'
                                            + '<div style="">'+data.DueDate+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right">'
                                            + '<div style="font-weight:bold;">Due Number</div>'
                                            + '<div style="">'+data.DueNumber+'</div>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Due Amount</div>'
                                            + '<span>₹</span>&nbsp;<span style="">'+data.DueAmount+'</span>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                        + '<div style="text-align:right"><span class="badge badge-soft-danger"> -'+data.DaysBefore+' days</span></div>'
                                        + '</div>'
                                + '</div>'
                            + '</div>'
                      + '</div>';
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
setTimeout(function(){
    getData();               
},2000);
</script>
         