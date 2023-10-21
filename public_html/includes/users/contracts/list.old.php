<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Contracts</h1>
            <h6 class="card-subtitle text-muted mb-3">List all Contracts</h6>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=contracts/new" class="btn btn-primary btn-sm">New Contract</a>
        </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                             <tr>
                                <th style="width:100px">Contract ID</th>
                                <th>Customer Name</th>
                                <th style="width: 200px;">Scheme</th>
                               <th style="width:100px">Start Date</th>
                               <th style="width:100px">End Date</th>
                                <th style="width:70px">Status</th>
                                <th style="width:50px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="7" style="text-align: center;background:#fff !important">Loading Contracts ...</td>
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

function d() {
    openPopup();
    $.post(URL+ "webservice.php?action=ListAll&method=Contracts","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.ContractCode + '</td>'
                            + '<td>' + data.CustomerName + '</td>'
                            + '<td>' + data.SchemeName + '</td>'
                           + '<td >' + data.StartDate + '</td>'
                            + '<td >' + data.EndDate + '</td>'
                            + '<td>';
                            + '<td style="text-align:right">'
                            if (data.IsActive=="1") {
                                html += '<span class="badge bg-success">Active</span>';
                            } else if (data.IsActive=="0") {
                                html += '<span class="badge bg-secondary">Disabled</span>';
                            } else if (data.IsActive=="3") {
                                html += '<span class="badge bg-primary">Closed</span>';
                            } 
                              html += '</td>'
                             + '<td>' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'" >View</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.ContractID+'\')">Delete</a>'
                                         html += '</div>'
                                + '</div>'
                            + '</td>'                                                                                                    
                      + '</tr>';
            });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="7" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_content').html(html);
             if (($.fn.dataTable.isDataTable("#datatables-fixed-header"))) {
                $("#datatables-fixed-header").DataTable({
                    fixedHeader: true,
                    pageLength: 25
                });
            }
        } else {
            alert(obj.message);
        }
    });
}
setTimeout("d()",2000);

var RemoveID="";
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show"); 
}
function Remove() {
     $('#confirmation').modal("hide"); 
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=Contracts&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                           + '<td>' + data.ContractCode + '</td>'
                            + '<td>' + data.CustomerName + '</td>'
                            + '<td>' + data.SchemeName + '</td>'
                             + '<td >' + data.StartDate + '</td>'
                            + '<td >' + data.EndDate + '</td>'
                            + '<td>';
                            + '<td style="text-align:right">'
                            if (data.IsActive=="1") {
                                html += '<span class="badge bg-success">Active</span>';
                            } else if (data.IsActive=="0") {
                                html += '<span class="badge bg-secondary">Disabled</span>';
                            } else if (data.IsActive=="3") {
                                html += '<span class="badge bg-primary">Closed</span>';
                            } 
                              html += '</td>'
                             + '<td>' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'" >View</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.ContractID+'\')">Delete</a>'
                                         html += '</div>'
                                + '</div>'
                            + '</td>'                                                                                                    
                      + '</tr>';
            });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="7 " style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_content').html(html);
             if (($.fn.dataTable.isDataTable("#datatables-fixed-header"))) {
                $("#datatables-fixed-header").DataTable({
                    fixedHeader: true,
                    pageLength: 25
                });
            }
        } else {
            alert(obj.message);
        }
    });
}
</script>