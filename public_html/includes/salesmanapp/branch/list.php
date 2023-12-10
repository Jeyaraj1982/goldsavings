<div class="container-fluid p-0">
    <div class="col-sm-12">
        <div class="row">
        <div class="col-9">
            <h1 class="h3">Branches</h1>
        </div>
        <div class="col-3" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?" class="btn btn-outline-primary btn-sm">Back</a>
     </div>
     </div>
     </div>
     <div class="row" id="_content"> 
     </div>
        
</div>


   
<script> 

function ListBranches() {
    openPopup();
    $.post(URL+ "webservice.php?action=ListAll&method=Branch","",function(data){
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
                                            + '<div style="font-weight:bold;">Branch Name</div>'
                                            + '<div style="">'+data.BranchName+'</div>'
                                        + '</div>'
                                        + '<div class="col-12">'
                                            + '<div style="font-weight:bold;">Address</div>'
                                            + '<div style="">'+ data.AreaName + ',&nbsp;'+ data.DistrictName + ',&nbsp;'+ data.StateName + '&nbsp;<br>Pincode:&nbsp'+ data.PinCode +'</div>'
                                        + '</div>'
                                         + '<div class="col-12" style="text-align: right;">'
                                            + '<a href="<?php echo URL;?>dashboard.php?action=branch/view&edit='+data.BranchID+'&fpg=branch/list" class="btn btn-outline-primary" style="font-size: 10px;">View</a>'
                                        +'</div>'
                                         + '</div>'                                                                 
                      + '</div></div>';
                           
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
setTimeout("ListBranches()",2000);
</script>