<?php
    if (isset($_GET['type']) && $_GET['type']=="active") {
     echo "<script> var action_name='listAllActive';</script>";
     $title="Active";
    } elseif (isset($_GET['type']) && $_GET['type']=="deactive") {
        echo "<script> var action_name='listAllDeActivated';</script>";
        $title="DeActive";
    } 
?>
<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Schemes</h1>
            <h6 class="card-subtitle text-muted mb-3">Active Schemes</h6>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=schemes/scheme&type=active">Active</a> | 
            <a href="<?php echo URL;?>dashboard.php?action=schemes/scheme&type=deactive">Deactive</a> 
        </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                       <thead>
                            <tr>
                                <th style="width: 100px;">Scheme ID</th>
                                <th>Scheme Name</th>
                                <th style="width: 140px; text-align: right;">Wastage<br>Discount(%)</th>
                                <th style="width: 140px; text-align: right;">Making Charge<br>Discount(%)</th>
                                <th style="width: 100px; text-align: right;">Contracts</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="7" style="text-align: center;background:#fff !important">loading schemes...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

function d() { 
    openPopup();
    $.post(URL+ "webservice.php?action="+action_name+"&method=Schemes","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                             + '<td>' + data.SchemeCode + '</td>'
                            + '<td>' + data.SchemeName + '</td>'
                            + '<td style="text-align: right">' + data.WastageDiscount + '</td>'
                            + '<td style="text-align: right">' + data.MakingChargeDiscount + '</td>' 
                            + '<td style="text-align:right">'+ data.ContractCount + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/viewactivescheme&edit='+data.SchemeID+'">View</a>'
                                        + '</div>'
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

</script>