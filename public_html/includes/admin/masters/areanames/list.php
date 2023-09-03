<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Area Names</h1>
            <h6 class="card-subtitle text-muted mb-3">List all area names</h6>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=masters/areanames/new" class="btn btn-primary btn-sm">New Area Name</a>
        </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Area Code</th>
                                <th>Area Name</th>
                                <th>District Name</th>
                                <th>State Name</th>
                                <th>Remarks</th>
                                <th style="width:100px">Status</th>
                                <th style="width:130px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="7" style="text-align: center;background:#fff !important">Loading area names ...</td>
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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" onclick="Remove()" class="btn btn-primary">Yes, Remove</button>
            </div>
        </div>
    </div>
</div>   
<script>
var RemoveID="";
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show"); 
}
//                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="Remove(\''+data.DistrictNameID+'\')"  class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=masters/districtnames/edit&edit='+data.DistrictNameID+'" class="btn btn-primary btn-sm">Edit</a></td>'
function d() {
    openPopup();
    $.post(URL+ "webservice.php?action=ListAll&method=AreaNames","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.AreaNameCode + '</td>'
                            + '<td>' + data.AreaName + '</td>'
                            + '<td>' + data.DistrictName + '</td>'
                            + '<td>' + data.StateName + '</td>'
                            + '<td>' + data.Remarks + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.AreaNameID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=masters/areanames/edit&edit='+data.AreaNameID+'" class="btn btn-primary btn-sm">Edit</a></td>'
                      + '</tr>';
            });   
            $('#tbl_content').html(html);
            // document.addEventListener("DOMContentLoaded", function() {
            $("#datatables-fixed-header").DataTable({
                fixedHeader: true,
                pageLength: 25
                
            });
            //});                                        
        } else {
            alert(obj.message);
        }
    });
}
setTimeout("d()",2000);
function Remove() {
     $('#confirmation').modal("hide"); 
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=FileExtensions&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.ExtensionCode + '</td>'
                            + '<td>' + data.FileExtension + '</td>'
                            + '<td>' + data.Remarks + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.FileExtensionID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=file_extensions/edit&edit='+data.FileExtensionID+'" class="btn btn-primary btn-sm">Edit</a> </td>'
                      + '</tr>';
            });   
            $('#tbl_content').html(html);
            // document.addEventListener("DOMContentLoaded", function() {
            //$("#datatables-fixed-header").DataTable({
               // fixedHeader: true,
               // pageLength: 25
            //});
            
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
      
}
</script>