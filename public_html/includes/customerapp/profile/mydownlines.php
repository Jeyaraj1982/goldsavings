<div class="container-fluid p-0">
    <div class="col-sm-12">
        <div class="row">
        <div class="col-9">
            <h1 class="h3">My Downlines</h1>
        </div>
        <div class="col-3" style="text-align:right;">
            <?php 
            $path=URL."dashboard.php";
            if (isset($_GET['fpg'])) {
                $path=URL."dashboard.php?action=".$_GET['fpg'];
            }
            ?>
            <a href="<?php echo $path;?>" class="btn btn-outline-primary btn-sm">Back</a>
     </div>
     </div>
     </div>
     <div class="row" id="_content">
     </div>
</div>


   
<script> 

function d() {
    openPopup();
    $.post(URL+ "webservice.php?action=listDownlines&method=Customers","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
               html += '<div class="col-sm-12">'
                            + '<div class="card mb-2">'
                                + '<div class="card-body" style="padding:10px 15px">'
                                    + '<div class="row">'
                                          + '<div class="col-12">'
                                                + '<div style="font-weight:bold;">Customer Name</div>'
                                                + '<div style="">'+data.CustomerName+'</div>'
                                          + '</div>'
                                          + '<div class="col-6">'
                                                + '<div style="font-weight:bold;">Mobile Number</div>'
                                                + '<div style="">'+data.MobileNumber+'</div>'
                                          + '</div>'
                                           + '<div class="col-6" style="text-align:right;">'
                                                + '<div style="font-weight:bold;">Joined</div>'
                                                + '<div style="">'+data.EntryDate+'</div>'
                                          + '</div>'
                                    + '</div>'
                                + '</div>'
                            + '</div>'
               + '</div>';
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