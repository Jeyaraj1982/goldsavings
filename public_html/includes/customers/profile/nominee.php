<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-0">Profile</h1>
            <p>Nominee</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("customerprofile_side_menu.php"); ?>
        </div>
    <div class="col-9 col-sm-9 col-xxl-9">
         <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                            <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nominee Name</th>
                                <th>Relation Name</th>
                                <th>Age</th>
                                <th style="width:50px">Status</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="7" style="text-align: center;background:#fff !important">Loading nominees ...</td>
                            </tr>
                        </tbody>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>



    
<script>
function listnominees() {
    openPopup();
    $.post(URL+ "webservice.php?action=listNominees&method=Customers&CustomerID=","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.NomineeName + '</td>'
                            + '<td>' + data.RelationName + '</td>'
                            + '<td>' + data.Age + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
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

setTimeout("listnominees()",2000);
</script> 

