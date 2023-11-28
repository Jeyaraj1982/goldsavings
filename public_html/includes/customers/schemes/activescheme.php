<div class="container-fluid p-0">
<div class="col-sm-12">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Schemes</h1>
        </div>
       <div class="col-sm-6  mb-2" style="text-align:right;">
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
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                       <thead>
                            <tr>
                                <th style="width: 100px;">Scheme ID</th>
                                <th>Scheme Name</th>
                                <th style="width: 140px; text-align: right;">Wastage<br>Discount(%)</th>
                                <th style="width: 140px; text-align: right;">Making Charge<br>Discount(%)</th>
                                <th style="width: 140px; text-align: right;">Contracts</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="8" style="text-align: center;background:#fff !important">Loading Schemes...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you want to Delete ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
                <button type="button" onclick="Remove()" class="btn btn-danger">Yes, Remove</button>
            </div>
        </div>
    </div>
</div>
<script>

var RemoveID=0;
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show"); 
}
function d() { 
    openPopup();
    $.post(URL+ "webservice.php?action=listAllActive&method=Schemes","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                           + '<td>' + data.SchemeCode + '</td>'
                            + '<td>' + data.SchemeName + '</td>'
                            + '<td style="text-align: right">' + data.WastageDiscount + '</td>'
                            + '<td style="text-align: right">' + data.MakingChargeDiscount + '</td>'
                             + '<td style="text-align:right">'+ data.ContractCount + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/new&scheme='+data.SchemeCode+'">Join Scheme</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'">View Scheme</a>'
                                                if (parseInt(data.ContractCount)>0) {
                                                    if (parseInt(data.ContractCount)==1) {
                                                        html +=  '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/contractslist_byscheme&view='+data.SchemeID+'&fpg=schemes/activescheme">View Contract</a>';
                                                    } else {
                                                        html +=  '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/contractslist_byscheme&view='+data.SchemeID+'&fpg=schemes/activescheme">View Contracts</a>';
                                                    }
                                                    } 
                                                    
                                                html += '</div>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });
                           
             $('#tbl_content').html(html);
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
      
}
setTimeout("d()",2000);

</script>