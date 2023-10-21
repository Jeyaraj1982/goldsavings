<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-0">Customers</h1>
            <p>List of Contracts</p>
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
                                <th>Contract<br>ID</th>
                                <th>Scheme</th>
                                <th style="text-align:right;">Contract<br>Amount(₹)</th>
                                <th>Start<br>Date</th>
                                <th>End<br>Date</th>
                                <th></th>
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
</div>

<script>
function listContracts() {
    openPopup();
    $.post(URL+ "webservice.php?action=listCustomerWise&method=Contracts&CustomerID=<?php echo $data[0]['CustomerID']; ?>","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.ContractCode + '</td>'
                        + '<td>' + data.SchemeName + '</td>'
                        + '<td style="text-align:right">' + data.ContractAmount + '</td>'
                        + '<td style="text-align:right;">' + data.StartDate + '</td>'
                        + '<td style="text-align:right;">' + data.EndDate + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                        + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/customers/viewcontract&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/schemes/view&edit='+data.SchemeID+'">View Scheme</a>'
                                                 
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });                                                               
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="6" style="text-align: center;background:#fff !important">No Data Found</td>'
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
setTimeout("listContracts()",2000);
</script>           