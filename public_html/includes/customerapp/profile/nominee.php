<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
    <div class="row mb-2">
        <div class="col-6">
            <h1 class="h3 mb-0">Nominee Info</h1>
        </div>
        <div class="col-6" style="text-align: right;">
            <a href="<?php echo URL;?>dashboard.php?action=profile/profile" style="font-size: 10px" class="btn btn-outline-primary">Back</a>
        </div>
    </div>
    <div class="row"  id="_content">
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
                 html += '<div class="col-sm-12">'
                            + '<div class="card">'
                                + '<div class="card-body" style="padding:10px 15px">'
                                    + '<div class="row">'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Nominee Name</div>'
                                            + '<div style="">'+data.NomineeName+'</div>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Relation Name</div>'
                                            + '<div style="">'+data.RelationName+'</div>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Age</div>'
                                            + '<div style="">'+data.Age+'</div>'
                                        + '</div>'
                                        + '<div>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</div>'
                                  html += '</div>'
                                 + '</div>'
                                +'</div>'
                            +'</div>'
                 +'</div>'
                      
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

setTimeout("listnominees()",2000);
</script> 

