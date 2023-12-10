<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<?php
    if (isset($_GET['type']) && $_GET['type']=="approved") {
     echo "<script> var action_name='listApproved';</script>";
     $title="Approved";
    } elseif (isset($_GET['type']) && $_GET['type']=="rejected") {
        echo "<script> var action_name='listRejected';</script>";
        $title="Rejected";
    } elseif (isset($_GET['type']) && $_GET['type']=="request") {
        echo "<script> var action_name='listPendings';</script>";
        $title="Requested";
    } elseif (isset($_GET['type']) && $_GET['type']=="all") {
        echo "<script> var action_name='ListAll';</script>";
        $title="All";
    } else {
        echo "<script> var action_name='listPendings';</script>";
        $title="Requested";
    }
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Payments</h1>
        </div>
        <div class="col-6" style="text-align: right;">
            <a href="<?php echo URL;?>dashboard.php?action=masters/customers/payments&type=request&customer=<?php echo $_GET['customer'];?>">Requested</a> | 
            <a href="<?php echo URL;?>dashboard.php?action=masters/customers/payments&type=approved&customer=<?php echo $_GET['customer'];?>">Approved</a> | 
            <a href="<?php echo URL;?>dashboard.php?action=masters/customers/payments&type=rejected&customer=<?php echo $_GET['customer'];?>">Rejected</a> | 
            <a href="<?php echo URL;?>dashboard.php?action=masters/customers/payments&type=all&customer=<?php echo $_GET['customer'];?>">All</a>
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
                                <th style="width: 100px;">Request<br>ID</th>
                                <th style="width: 100px;">Transaction<br>Date</th>
                                <th style="width: 200px;">Due<br>Amount</th>
                                <th style="width: 200px;">Reference<br>Number</th>
                                <th style="width: 50px;"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="6" style="text-align: center;background:#fff !important">Loading Payments...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

function listPaymentbank() {
    openPopup();
    $.post(URL+ "webservice.php?action="+action_name+"&method=PaymentRequests&customer=<?php echo $data[0]["CustomerID"];?>","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.RequestCode + '</td>'
                            + '<td>' + data.PaymentDate + '</td>'
                            + '<td style=text-align:right>' + data.DueAmount + '</td>'
                            + '<td>' + data.BankReferenceNumber + '</td>';
                              
                            html+= '<td style="text-align:right"><a href="'+URL+'dashboard.php?action=masters/customers/viewrecentpayment&id='+data.PaymentRequestID+'&customer=<?php echo $_GET['customer'];?>" class="btn btn-outline-primary btn-sm">View</a></td>' 
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
setTimeout("listPaymentbank()",2000);

</script>