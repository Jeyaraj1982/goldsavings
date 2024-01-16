<?php
    $data = $mysql->select("select * from _tbl_masters_branches where BranchID='".$_GET['branch']."'");
?>
<div class="container-fluid p-0">
    <div class="col-sm-12">
        <div class="row">
            <div class="col-6">
                <h1 class="h3">Customers</h1>
            </div>
            <div class="col-6" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=branch/list" class="btn btn-outline-primary btn-sm">Back</a>
            </div>
        </div>
    </div>
     <?php include_once(SERVER_PATH."/includes/admin/branch/branch_header.php");?>   
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
                                <th>Entry Date</th>
                                <th>Referred By</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="8" style="text-align: center;background:#fff !important">Loading branch wise customers ...</td>
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

function ListallCustomers() {
    if(!(navigator.onLine )) {
        $('#internet_failure').modal("show");
        return false;
    }
    
    openPopup();
    $.post(URL+ "webservice.php?action=listBranchCustomers&method=Customers&Branch=<?php echo $data[0]['BranchID']; ?>","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.CustomerCode + '</td>'
                            + '<td>' + data.CustomerName + '</td>'
                            + '<td>' + data.MobileNumber + '</td>'
                            + '<td>' + data.EntryDate + '</td>'
                            if (data.ReferByText.length>4) {
                            html += '<td>' + data.ReferredByName + ' ('+ data.ReferByText +')</td>';    
                            } else {
                            html += '<td></td>';                                
                            }
                            html += '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=../common/customers/view&customer='+data.CustomerID+'&fpg=../common/customers/list">View</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=../common/customers/edit&customer='+data.CustomerID+'&fpg=../common/customers/list">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.CustomerID+'\')">Delete</a>'
                                                + '<hr style="margin:0px !important">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=../common/customers/contracts&customer='+data.CustomerID+'&fpg=../common/customers/list">View Contracts</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=../common/receipts/receipt&customer='+data.CustomerID+'&fpg=../common/customers/list">View Receipts</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=reports/voucher&customer='+data.CustomerID+'&fpg=../common/customers/list">View Vouchers</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=../common/customers/list_myreferrel&customer='+data.CustomerID+'&fpg=../common/customers/list">View Referrals</a>'
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
            $('#popupcontent').html(errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}
setTimeout("ListallCustomers()",2000);



var RemoveID=0;
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show"); 
}
function Remove() {
     $('#confirmation').modal("hide"); 
    if(!(navigator.onLine )) {
        $('#internet_failure').modal("show");
        return false;
    }
  
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
                            + '<td>' + data.EntryDate + '</td>'
                            if (data.ReferByText.length>4) {
                            html += '<td>' + data.ReferredByName + ' ('+ data.ReferByText +')</td>';    
                            } else {
                            html += '<td></td>';                                
                            }
                            html += '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=../common/customers/view&customer='+data.CustomerID+'&fpg=../common/customers/list">View</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=../common/customers/edit&customer='+data.CustomerID+'&fpg=../common/customers/list">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.CustomerID+'\')">Delete</a>'
                                                + '<hr style="margin:0px !important">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=../common/customers/contracts&customer='+data.CustomerID+'&fpg=../common/customers/list">View Contracts</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=../common/receipts/receipt&customer='+data.CustomerID+'&fpg=../common/customers/list">View Receipts</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=reports/voucher&customer='+data.CustomerID+'&fpg=../common/customers/list">View Vouchers</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=../common/customers/list_myreferrel&customer='+data.CustomerID+'&fpg=../common/customers/list">View Referrals</a>'
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
           $('#popupcontent').html(errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}
</script>