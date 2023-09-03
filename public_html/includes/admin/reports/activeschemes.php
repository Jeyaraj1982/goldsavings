<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Active Schemes</h1>
            <h6 class="card-subtitle text-muted mb-3">List all active schemes</h6>
        </div>
        <!--<div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=customers/new" class="btn btn-primary btn-sm">New Customer</a>
        </div>-->
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:100px">Code</th>
                                <th>Customer Name</th>
                                <th>Mobile Number</th>
                                <th>Email ID</th>
                                <th>Type</th>
                                <th>Remarks</th>
                                <th style="width:100px">Status</th>
                                <th style="width:220px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="8" style="text-align: center;background:#fff !important">Loading customers ...</td>
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
    $.post(URL+ "webservice.php?action=ListAll&method=Customers","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.CustomerCode + '</td>'
                            + '<td>' + data.CustomerName + '</td>'
                            + '<td>' + data.MobileNumber + '</td>'
                            + '<td>' + data.EmailID + '</td>'
                            + '<td>' + data.CustomerTypeName + '</td>'
                            + '<td>' + data.Remarks + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="Remove(\''+data.CustomerID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=customers/edit&edit='+data.CustomerID+'" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=customers/view&edit='+data.CustomerID+'" class="btn btn-success btn-sm">View</a></td>'
                      + '</tr>';
            });   
            $('#tbl_content').html(html);
            // document.addEventListener("DOMContentLoaded", function() {
            $("#datatables-fixed-header").DataTable({
                fixedHeader: true,
                pageLength: 25
                
            });
            //});                                        
        } else {
            alert(obj.message);
        }
    });
}
setTimeout("d()",2000);

function Remove(ID) {
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=Customers&ID="+ID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(successcontent(obj.message));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.CustomerCode + '</td>'
                            + '<td>' + data.CustomerName + '</td>'
                            + '<td>' + data.MobileNumber + '</td>'
                            + '<td>' + data.EmailID + '</td>'
                            + '<td>' + data.CustomerTypeName + '</td>'
                            + '<td>' + data.Remarks + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="Remove(\''+data.CustomerID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=customers/edit&edit='+data.CustomerID+'" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a href="'+URL+'dashboard.php?action=customers/view&edit='+data.CustomerID+'" class="btn btn-success btn-sm">View</a></td>'
                      + '</tr>';
            });    
            $('#tbl_content').html(html);
            // document.addEventListener("DOMContentLoaded", function() {
            //$("#datatables-fixed-header").DataTable({
              //  fixedHeader: true,
               // pageLength: 25
           // });
            
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
      
}
</script>