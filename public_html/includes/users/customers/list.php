<div class="container-fluid p-0">
<div class="col-sm-12">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Customers</h1>
            <h6 class="card-subtitle text-muted mb-3">List all customers</h6>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=customers/new" class="btn btn-primary btn-sm">New Customer</a>
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
                                    <th>Customer ID</th>
                                    <th>Customer Name</th>
                                    <th>Mobile Number</th>
                                    <th>Type</th>
                                    <th>Joined On</th>
                                    <th>Referred By</th>
                                    <th></th>
                                </tr>
                            </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="8" style="text-align: center;background:#fff !important">Loading customers ...</td>
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
    $.post(URL+ "webservice.php?action=ListAll&method=Customers","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.CustomerCode + '</td>'
                            + '<td>' + data.CustomerName + '</td>'
                            + '<td>' + data.MobileNumber + '</td>'
                            + '<td>' + data.CustomerTypeName + '</td>'
                            + '<td>' + data.CreatedOn + '</td>'
                            + '<td>' + data.ReferredByName + ' ('+ data.ReferByText +')</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/view&customer='+data.CustomerID+'">View</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/edit&customer='+data.CustomerID+'">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.CustomerID+'\')">Delete</a>'
                                                + '<hr style="margin:0px !important">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/contracts&customer='+data.CustomerID+'">View Contracts</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=reports/receipt&customer='+data.CustomerID+'">View Receipts</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=reports/voucher&customer='+data.CustomerID+'">View Vouchers</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/list_myreferrel&customer='+data.CustomerID+'">View Referrals</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'                                                                                                    
                      + '</tr>';
                           
            });
            if(obj.data.length==0){
            html += '<tr>'
                + '<td colspan="8" style="text-align: center;background:#fff !important">No data found</td>'
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
            alert(obj.message);
        }
    });
}
setTimeout("d()",2000);



var RemoveID=0;
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show"); 
}
function Remove() {
    $('#confirmation').modal("hide"); 
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=Customers&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                           + '<td>' + data.CustomerCode + '</td>'
                            + '<td>' + data.CustomerName + '</td>'
                            + '<td>' + data.MobileNumber + '</td>'
                            + '<td>' + data.CustomerTypeName + '</td>'
                            + '<td>' + data.CreatedOn + '</td>'
                            + '<td>' + data.ReferredByName + ' ('+ data.ReferByText +')</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/view&customer='+data.CustomerID+'">View</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/edit&customer='+data.CustomerID+'">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.CustomerID+'\')">Delete</a>'
                                                + '<hr style="margin:0px !important">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/contracts&customer='+data.CustomerID+'">View Contracts</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=reports/receipt&customer='+data.CustomerID+'">View Receipts</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=reports/voucher&customer='+data.CustomerID+'">View Voucher</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=customers/list_myreferrel&customer='+data.CustomerID+'">View Referrals</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'                                                                                                    
                      + '</tr>';
                           
            });
            if(obj.data.length==0){
            html += '<tr>'
                + '<td colspan="8" style="text-align: center;background:#fff !important">No data found</td>'
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
            alert(obj.message);
        }
    });
}
</script>