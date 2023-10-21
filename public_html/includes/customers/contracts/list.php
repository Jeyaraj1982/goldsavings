<div class="container-fluid p-0">
<div class="col-6">
     <div class="row">
            <h1 class="h3">My Contracts</h1>
            <h6 class="card-subtitle text-muted mb-3">List all Contracts</h6>
        </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                    <th>Contract ID</th>
                                    <th>Scheme</th>
                                    <th>Contract<br>Amount(₹)</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Status</th>
                                </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="6" style="text-align: center;background:#fff !important">Loading Contracts ...</td>
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
                            + '<td>' + data.SchemeName + '</td>'
                            + '<td>' + data.ContractAmount + '</td>'
                            + '<td >' + data.StartDate + '</td>'
                            + '<td >' + data.EndDate + '</td>'
                            + '<td>';
                            if (data.IsActive=="1") {
                                html += '<span class="badge bg-success">Active</span>';
                            } else if (data.IsActive=="0") {
                                html += '<span class="badge bg-secondary">Disabled</span>';
                            } else if (data.IsActive=="3") {
                                html += '<span class="badge bg-primary">Closed</span>';
                            }
                            html += '</td>'
                            + '<td style="text-align:right">' 
                            + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/viewcontract&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'">View Scheme</a>';
                                                if (parseInt(data.Receipts)>0) {
                                                    html +=  '<a class="dropdown-item" href="'+URL+'dashboard.php?action=receipts/receipt&contract='+data.ContractCode+'">View Receipts</a>';
                                                } else {
                                                    html +=  '<a class="dropdown-item" href="javascript:void(0)" style="color:#aaa">View Receipts</a>';
                                                }
                                                
                                                if (data.VoucherNumber!="") {
                                                    html +=  '<a class="dropdown-item" href="'+URL+'dashboard.php?action=vouchers/viewvoucher&number='+data.VoucherNumber+'">View Voucher</a>';
                                                } else {
                                                    html +=  '<a class="dropdown-item" href="javascript:void(0)" style="color:#aaa">View Voucher</a>';
                                                }
                                        html += '</div>'
                                + '</div>'
                            + '</td>'                                                                 
                      + '</tr>';
            });
            if (obj.data.length=="") {
         html += '<tr>'
                    + '<td colspan="6" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }  
            $('#tbl_content').html(html);
            
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
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
                         + '<td>' + data.SchemeName + '</td>'
                            + '<td>' + data.CreatedOn + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'                                                                   
                            + '<td style="text-align:right"><a href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'" class="btn btn-success btn-sm">View</a></td>'
                      + '</tr>';
              });
            if (obj.data.length=="") {
         html += '<tr>'
                    + '<td colspan="6" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }  
            $('#tbl_content').html(html);
            
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
        }
    });
}
</script>