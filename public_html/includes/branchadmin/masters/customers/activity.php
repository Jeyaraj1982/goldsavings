<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Activity</h1>
        </div>
         <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=masters/customers/list" class="btn btn-outline-primary btn-sm">Back</a>
     </div>
    </div>
    <div class="row">
        <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("customer_side_menu.php"); ?>
        </div>
    <div class="col-9 col-sm-9 col-xxl-9">
         <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Last Login</th>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="1" style="text-align: center;background:#fff !important">Loading activity ...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
function listActivities() {
    openPopup();
    $.post(URL+ "webservice.php?action=listpayments&method=Payments&CustomerID=<?php echo $data[0]['CustomerID']; ?>","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.PaymentDate + '</td>'
                            + '<td>' + data.PaymentBank + '</td>'
                            + '<td>' + data.BankReference + '</td>'
                            + '<td>' + data.RequestedOn + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'                                                                   
                            + '<td style="text-align:right"><a href="'+URL+'dashboard.php?action=customers/viewcontract&view='+data.ContractCode+'&customer=<?php echo $data[0]['CustomerID']; ?>" class="btn btn-success btn-sm">View</a></td>'
                      + '</tr>';
            });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="5" style="text-align: center;background:#fff !important">No Data Found</td>'
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
//setTimeout("listPayments()",2000);
</script> 
    