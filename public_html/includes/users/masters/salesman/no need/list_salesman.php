<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Salesman</h1>
            <h6 class="card-subtitle text-muted mb-3">List of Salesmans</h6>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=employees/new" class="btn btn-primary btn-sm">New Salesman</a>
        </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:100px">Emp.Code</th>
                                <th>Employee Name</th>
                                <th>Category</th>
                                <th>Remarks</th>
                                <th style="width:100px">Status</th>
                                <th style="width:100px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="6" style="text-align: center;background:#fff !important">Loading employees ...</td>
                            </tr>
                        </tbody>
                    </table>
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
var RemoveID=0;
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show"); 
}
function d() {
    openPopup();
    $.post(URL+ "webservice.php?action=listAll&method=Employees","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.EmployeeCode + '</td>'
                            + '<td>' + data.EmployeeName + '</td>'
                            + '<td>' + data.EmployeeCategoryTitle + '</td>'
                            + '<td>' + data.Remarks + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.EmployeeID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=employees/edit&edit='+data.EmployeeID+'" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=employees/view&edit='+data.EmployeeID+'" class="btn btn-success btn-sm">View</a></td>'
                            
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
function Remove(ID) {
    $('#confirmation').modal("hide");
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=Employees&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.EmployeeCode + '</td>'
                            + '<td>' + data.EmployeeName + '</td>'
                            + '<td>' + data.EmployeeCategoryTitle + '</td>'
                            + '<td>' + data.Remarks + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.EmployeeID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=employees/edit&edit='+data.EmployeeID+'" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=employees/view&edit='+data.EmployeeID+'" class="btn btn-success btn-sm">View</a></td>'
                      + '</tr>';
            });  
            $('#tbl_content').html(html);
            // document.addEventListener("DOMContentLoaded", function() {
            //$("#datatables-fixed-header").DataTable({
              //  fixedHeader: true,
               // pageLength: 25
           // });
            
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
      
}
</script>