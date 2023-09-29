<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Scheme</h1>
            <h6 class="card-subtitle text-muted mb-3">Deactivated Schemes</h6>
        </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                               
                                <th>Scheme Name</th>
                                <th>Amount</th>
                                <th>Installments</th>
                                <th>InstallmentMode</th>
                                <th style="width:700px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="8" style="text-align: center;background:#fff !important">NO DATA FOUND</td>
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
    $.post(URL+ "webservice.php?action=listAllDeactivated&method=Schemes","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.SchemeName + '</td>'
                            + '<td>' + data.Amount + '</td>'
                            + '<td>' + data.Installments + '</td>'
                            + '<td>' + data.InstallmentMode + '</td>'
                            + '<td style="text-align:right">'
                                + '<a href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'" class="btn btn-success btn-sm">View</a>'
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