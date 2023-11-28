<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>

<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Refferals</h1>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?" class="btn btn-outline-primary btn-sm">Back</a>
        </div>
    <div class="col-12">
        <?php include_once("customer_side_menu.php"); ?>
    </div>
</div>
    <div class="row" id="_content">
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
               html += '<div class="col-12">'
                            + '<div class="card mb-2">'
                                + '<div class="card-body" style="padding:10px 15px">'
                                    + '<div class="row">'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Customer Name</div>'
                                            + '<div style="">'+data.CustomerName+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right;">';
                                                if (data.IsActive=="1") {
                                                    html += '<span class="badge bg-success" style="text-align: right;">Active</span>';
                                                } else if (data.IsActive=="0") {
                                                    html += '<span class="badge bg-secondary" style="text-align: right;">Disabled</span>';
                                                } 
                                            html += '</div>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">MobileNumber</div>'
                                            + '<div style="">'+data.MobileNumber+'</div>'
                                        + '</div>'
                                    + '</div></div>'
                                +'</div>';
           });
            if (obj.data.length=="") {
         html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
    }  
            $('#_content').html(html);
        } else {
            html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
                $('#_content').html(html);
            $('#process_popup').modal('hide');
        }
    });
}
setTimeout("d()",2000);




</script>