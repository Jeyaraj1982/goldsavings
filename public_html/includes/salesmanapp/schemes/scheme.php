<?php
    if (isset($_GET['type']) && $_GET['type']=="active") {
     echo "<script> var action_name='listAllActive';</script>";
     $title="Active Schemes";
    } elseif (isset($_GET['type']) && $_GET['type']=="deactive") {
        echo "<script> var action_name='listAllDeActivated';</script>";
        $title="DeActive Schemes";
    } 
?>
<div class="container-fluid p-0">
     <div class="col-sm-12">
        <div class="row">
            <div class="col-6">
            <h1 class="h3 mb-0">Schemes</h1>
        </div>
            <div class="col-6 mb-2" style="text-align:right; font-size: 10px;">
            <a href="<?php echo URL;?>dashboard.php?" class="btn btn-outline-primary btn-sm">Back</a> 
        </div>
     </div>
</div>
       <div class="row" id="_content">
       </div>
        
</div>
<script>


function d() { 
    openPopup();
    $.post(URL+ "webservice.php?action=listAllActive&method=Schemes","",function(data){
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
                                            + '<div style="font-weight:bold;">Scheme ID</div>'
                                            + '<div style="">'+data.SchemeCode+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right">'
                                             + '<div class="dropdown position-relative">'
                                                + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static" style="color:#9a9dc6">'
                                                 + '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>'
                                                + '</a>'
                                                + '<div class="dropdown-menu dropdown-menu-end">'
                                                    + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/viewscheme&edit='+data.SchemeID+'&fpg=schemes/scheme"">View Scheme</a>'
                                                    + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/new&scheme='+data.SchemeID+'&fpg=schemes/scheme"">Join Scheme</a>'
                                                if (parseInt(data.ContractCount)>0) {
                                                    if (parseInt(data.ContractCount)==1) {
                                                        html +=  '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/contractslist_byscheme&view='+data.SchemeID+'&fpg=schemes/scheme">View Contract</a>';
                                                    } else {
                                                        html +=  '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/contractslist_byscheme&view='+data.SchemeID+'&fpg=schemes/scheme">View Contracts</a>';
                                                    }
                                                    } 
                                                    
                                                html += '</div>' 
                                             + '</div>'
                                             + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Scheme Name</div>'
                                            + '<div style="">'+data.SchemeName+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right;">'
                                            if (parseInt(data.ContractCount)>0) {
                                                    html += '<div style="font-weight:bold;">Contracts</div>'
                                                   + '<div style="">'+data.ContractCount+'</div>';
                                                } else {
                                                }
                                            html += '</div>'
                                        + '<div class="col-6">'
                                            + '<span style="font-weight:bold;">Wastage<br>Discount&nbsp;:</span>&nbsp;'
                                            + '<span style="">'+data.WastageDiscount+'</span>&nbsp;<span>%</span>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right;">'
                                            + '<span style="font-weight:bold;">Making Charge <br>Discount&nbsp;:</span>&nbsp;'
                                            + '<span style="">'+data.MakingChargeDiscount+'</span>&nbsp;<span>%</span>'
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
setTimeout("d()",2000);

</script>