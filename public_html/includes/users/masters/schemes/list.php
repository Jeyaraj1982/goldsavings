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
            <h6 class="card-subtitle text-muted mb-3">List of Schemes</h6>
        </div>
        <div class="col-6" style="text-align:right;">
        <a href="<?php echo URL;?>dashboard.php?action=masters/schemes/new&fpg=masters/schemes/list&type=<?php echo $_GET['type'];?>" class="btn btn-primary">New scheme</a>
        </div>
        <div class="col-12" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=masters/schemes/list&type=active">Active</a> | 
            <a href="<?php echo URL;?>dashboard.php?action=masters/schemes/list&type=deactive">Deactive</a> | 
            
        </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:15px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Scheme ID</th>
                                <th>Scheme Name</th>
                                <th style="text-align: right; width: 140px;">Wastage<br>Discount(%)</th>
                                <th style="text-align: right; width: 140px;">Making Charge<br>Discount(%)</th>
                                <th style="text-align: right; width: 140px;">Contracts</th>
                                <th style="width: 70px;">Status</th>
                                <th style="width:50px;"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="8" style="text-align: center;background:#fff !important">loading schemes...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
 <div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you want to Delete ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
                <button type="button" onclick="Remove()" class="btn btn-danger">Yes, Remove</button>
            </div>
        </div>
    </div>
</div>
<script>

var RemoveID=0;
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show"); 
}
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
                            + '<td style="text-align:right">' + data.WastageDiscount + '</td>'
                            + '<td style="text-align:right">' + data.MakingChargeDiscount + '</td>'
                            + '<td style="text-align:right">' + data.ContractCount + '&nbsp;</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/schemes/view&edit='+data.SchemeID+'&fpg=schemes/list&type=<?php echo $_GET['type'];?>">View</a>'
                                                + '<a class="dropdown-item"  href="'+URL+'dashboard.php?action=masters/schemes/edit&edit='+data.SchemeID+'&fpg=schemes/list&type=<?php echo $_GET['type'];?>">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.SchemeID+'\')">Delete</a>';
                                                if (data.ContractCount>0)  {
                                                html += '<hr style="margin:0px !important">';
                                                html += '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/schemes/list_contractsbyscheme&SchemeID='+data.SchemeID+'" >View Contracts</a>';
                                               }  else if (data.ContractCount==0) {
                                                html += '<hr style="margin:0px !important">';
                                                 html += '<a class="dropdown-item" href="javascript:void(0)" style="color:#888">View Contracts</a>';
                                                }
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
            });   
             if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="8" style="text-align: center;background:#fff !important">No Data Found</td>'
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


function Remove(ID) {
    $('#confirmation').modal("hide");
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=Schemes&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.SchemeCode + '</td>'
                            + '<td>' + data.SchemeName + '</td>'
                            + '<td style="text-align:right">' + data.WastageDiscount + '</td>'
                            + '<td style="text-align:right">' + data.MakingChargeDiscount + '</td>'
                            + '<td style="text-align:right">' + data.ContractCount + '&nbsp;</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/schemes/view&edit='+data.SchemeID+'">View</a>'
                                                + '<a class="dropdown-item"  href="'+URL+'dashboard.php?action=masters/schemes/edit&edit='+data.SchemeID+'">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.SchemeID+'\')">Delete</a>';
                                                if (data.ContractCount>0)  {
                                                html += '<hr style="margin:0px !important">';
                                                html += '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/schemes/list_contractsbyscheme&SchemeID='+data.SchemeID+'" >View Contracts</a>';
                                               }  else if (data.ContractCount==0) {
                                                html += '<hr style="margin:0px !important">';
                                                 html += '<a class="dropdown-item" href="javascript:void(0)" style="color:#888">View Contracts</a>';
                                                }
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
</script>