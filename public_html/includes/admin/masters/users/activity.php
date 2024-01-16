<?php
    $data = $mysql->select("select * from _tbl_masters_users where UserID='".$_GET['user']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Activity</h1>
        </div>
         <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=masters/users/list" class="btn btn-outline-primary btn-sm">Back</a>
     </div>
    </div>
    <div class="row">
        <div class="col-3 col-sm-3 col-xxl-3">
           <?php include_once("users_side_menu.php"); ?>
        </div>
    <div class="col-9 col-sm-9 col-xxl-9">
         <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Activity On</th>
                                <th>Activity</th>
                                <th>Activity From</th>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="3" style="text-align: center;background:#fff !important">Loading activity ...</td>
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
    $.post(URL+ "webservice.php?action=ViewAllActivities&method=Users&ID=<?php echo $data[0]['UserID']; ?>","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.ActivityOn + '</td>'
                            + '<td>' + data.Activity + '</td>'
                            + '<td>' + data.ActivityFrom + '</td>'
                      + '</tr>';
            });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="3" style="text-align: center;background:#fff !important">No Data Found</td>'
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
            $('#popupcontent').html(errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}
setTimeout("listActivities()",2000);
</script> 