<div class="container-fluid p-0">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-6">
                <h1 class="h3">Branches</h1>
                <h6 class="card-subtitle text-muted mb-3">List all branches</h6>
            </div>
            <div class="col-6" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=branch/new" class="btn btn-primary btn-sm">New Branch</a>&nbsp;
                <a href="<?php echo URL;?>dashboard.php?action=branch/customized_branchlist" class="btn btn-warning btn-sm">Customize Columns</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:150px;">Branch ID</th>
                                <th style="width:200px;">Branch Name</th>
                                <th>Location</th>
                                <th style="width:70px;">Status</th>
                                <th style="width:50px;"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="5" style="text-align: center;background:#fff !important">Loading branches...</td>
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
function loadBranches() {
    openPopup();
    $.post(URL+ "webservice.php?action=ListAll&method=Branch","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.BranchCode + '</td>'
                            + '<td>' + data.BranchName + '</td>'
                            + '<td>' + data.AreaName + ',&nbsp;'+ data.DistrictName + ',&nbsp;'+ data.StateName + ',&nbsp;-&nbsp'+ data.PinCode + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" style="padding: 2px 12px !important" href="'+URL+'dashboard.php?action=branch/view&edit='+data.BranchID+'&fpg=branch/list">View</a>'
                                                + '<a class="dropdown-item" style="padding: 2px 12px !important" href="'+URL+'dashboard.php?action=branch/edit&view='+data.BranchID+'&fpg=branch/list">Edit</a>'
                                                + '<a class="dropdown-item" style="padding: 2px 12px !important" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.BranchID+'\')">Delete</a>'
                                                + '<hr style="margin:0px !important">'
                                                + '<a class="dropdown-item" style="padding: 2px 12px !important" href="'+URL+'dashboard.php?action=branch/branchadmins&branch='+data.BranchID+'&fpg=branch/list">Branch Admins</a>'
                                                + '<a class="dropdown-item" style="padding: 2px 12px !important" href="'+URL+'dashboard.php?action=branch/branchusers&branch='+data.BranchID+'&fpg=branch/list">Branch Users</a>'
                                                + '<a class="dropdown-item" style="padding: 2px 12px !important" href="'+URL+'dashboard.php?action=branch/salesman&branch='+data.BranchID+'&fpg=branch/list">Salesmans</a>'
                                                + '<a class="dropdown-item" style="padding: 2px 12px !important" href="'+URL+'dashboard.php?action=branch/customers&branch='+data.BranchID+'&fpg=branch/list">Customers</a>'
                                                + '<a class="dropdown-item" style="padding: 2px 12px !important" href="'+URL+'dashboard.php?action=branch/contracts&branch='+data.BranchID+'&fpg=branch/list">Contracts</a>'
                                                + '<a class="dropdown-item" style="padding: 2px 12px !important" href="'+URL+'dashboard.php?action=branch/receipt&branch='+data.BranchID+'&fpg=branch/list">Receipts</a>'
                                                + '<a class="dropdown-item" style="padding: 2px 12px !important" href="'+URL+'dashboard.php?action=branch/pendingdues&branch='+data.BranchID+'&fpg=branch/list">Pending Dues</a>'
                                                + '<a class="dropdown-item" style="padding: 2px 12px !important" href="'+URL+'dashboard.php?action=branch/upcommingdues&branch='+data.BranchID+'&fpg=branch/list">Upcomming Dues</a>'
                                                + '<a class="dropdown-item" style="padding: 2px 12px !important" href="'+URL+'dashboard.php?action=branch/voucher&branch='+data.BranchID+'&fpg=branch/list">Vouchers</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'                                                                                                    
                      + '</tr>';
                           
            });
            if(obj.data.length==0){
            html += '<tr>'
                + '<td colspan="6" style="text-align: center;background:#fff !important">No data found</td>'
                + '</tr>'
            }   
            $('#tbl_content').html(html);
             if (($.fn.dataTable.isDataTable("#datatables-fixed-header"))) {
                $("#datatables-fixed-header").DataTable({
                    fixedHeader: true,
                    pageLength: 25
                });
            }
        } else {
            $('#popupcontent').html(errorcontent(obj.message));      
        }
    }).fail(function(){
        networkunavailable(); 
    });
}
setTimeout("loadBranches()",2000);

var RemoveID=0;
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show"); 
}
function Remove() {
    $('#confirmation').modal("hide"); 
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=Branch&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.BranchCode + '</td>'
                            + '<td>' + data.BranchName + '</td>'
                            + '<td>' + data.AreaName + ',&nbsp;'+ data.DistrictName + ',&nbsp;'+ data.StateName + ',&nbsp;-&nbsp'+ data.PinCode + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=branch/view&edit='+data.BranchID+'&fpg=branch/list">View</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=branch/edit&view='+data.BranchID+'&fpg=branch/list">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.BranchID+'\')">Delete</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'                                                                                                    
                      + '</tr>';
                           
            });
            if(obj.data.length==0){
            html += '<tr>'
                + '<td colspan="6" style="text-align: center;background:#fff !important">No data found</td>'
                + '</tr>'
            }   
            $('#tbl_content').html(html);
             if (($.fn.dataTable.isDataTable("#datatables-fixed-header"))) {
                $("#datatables-fixed-header").DataTable({
                    fixedHeader: true,
                    pageLength: 25
                });
            }
        } else {
            $('#popupcontent').html(errorcontent(obj.message));      
        }
    }).fail(function(){
        networkunavailable(); 
    });
}
</script>