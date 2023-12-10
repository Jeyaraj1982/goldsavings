<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>

<div class="container-fluid p-0">
    <div class="row">
        <div class="col-sm-6">
            <h1 class="h3 mb-0">Referrel</h1>
            <h6 class="card-subtitle text-muted mb-3">List all customers</h6>
        </div><div class="row">
        <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("customer_side_menu.php"); ?>
        </div>
    <div class="col-9 col-sm-9 col-xxl-9">
         <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Referrel Name</th>
                                <th>Mobile Number</th>
                                <th style="width:25px">Status</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="3" style="text-align: center;background:#fff !important">Loading customers ...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
    $.post(URL+ "webservice.php?action=listDownlines&method=Customers&CustomerID=<?php echo $data[0] ['CustomerID'];?>","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                               + '<td>' + data.CustomerName + '</td>'
                            + '<td>' + data.MobileNumber + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a onclick="view(\''+data.CustomerID+'\')" class="btn btn-outline-primary btn-sm" style="font-size:10px">View</a></td>'
                      + '</tr>';
           });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="3" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }  
            $('#tbl_content').html(html);
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
}   
setTimeout("d()",1000);



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
                            + '<td>' + data.CustomerName + '</td>'
                            + '<td>' + data.MobileNumber + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                      + '</tr>';
           });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="3" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }  
            $('#tbl_content').html(html);
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
}   
</script>