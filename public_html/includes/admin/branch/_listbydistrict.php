<div class="container-fluid p-0">
   <div class="col-sm-12">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">List By District</h1>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=masters/branch/new" class="btn btn-primary btn-sm">New Branch</a>&nbsp;
     </div>
     </div>
     </div>
     <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <input type="hidden" name="BranchID">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">State Name <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <select data-live-search="true" data-size="5" name="StateNameID" id="StateNameID" class="form-select mstateselect" onchange="getDistrictNames()">
                                        <option>loading...</option>
                                    </select>
                                </div>
                                <span id="ErrStateNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">District Name <span style='color:red'>*</span></label>
                                 <div class="input-group">
                                <select data-live-search="true" data-size="5" name="DistrictNameID" id="DistrictNameID" class="form-select mdistrictselect" onchange="getAreaNames()">
                                    <option>District Name</option>
                                </select>
                                </div>
                                <span id="ErrDistrictNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12" style="text-align:right;">
                                <button onclick="getData()" type="button" class="btn btn-outline-primary">View Branches</button>    
                            </div>
                        </div>
                     </div>
                 </div>
              </div>
        </div>
     </form>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" id="listData" style="padding-top:25px; display:none;">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                      <thead>
                                <tr>
                                    <th>Branch ID</th>
                                    <th>Branch Name</th>
                                    <th>State Name</th>
                                    <th>District Name</th>
                                    <th>Area Name</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="6" style="text-align: center;background:#fff !important">Loading branches...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
 </div>
 
<script>


function listStateNames() {
    $.post(URL+ "webservice.php?action=listAllActive&method=StateNames","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select State Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.StateNameID+'">'+data.StateName+'</option>';
            });   
            $('#StateNameID').html(html);
             /*$("#StateNameID").append($("#StateNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));*/
            $("#StateNameID").val("0");
            setTimeout(function(){
                //$('.mstateselect').selectpicker();
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function getDistrictNames() {
    $.post(URL+ "webservice.php?action=listDistrictNames&method=DistrictNames&StateNameID="+$('#StateNameID').val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>Select District</option>";
            html += "<option value='SA'>All Districts</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.DistrictNameID+'">'+data.DistrictName+'</option>';
            });   
            $('#DistrictNameID').html(html);
             /*$("#DistrictNameID").append($("#DistrictNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            })); */
            $("#DistrictNameID").val("0");
            setTimeout(function(){
                //$('.mdistrictselect').selectpicker();
            },1500);
        } else {
            alert(obj.message);
        }
    });
}
setTimeout(function(){
    listStateNames();
},2000);

function getData() {
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['message']);
    $.post(URL+ "webservice.php?action=ListAll&method=Branch",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
               html += '<tr>'
                            + '<td>' + data.BranchCode + '</td>'
                            + '<td>' + data.BranchName + '</td>'
                            + '<td>' + data.StateName + '</td>'
                            + '<td>' + data.DistrictName + '</td>'
                            + '<td>' + data.AreaName + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/branch/view&edit='+data.BranchID+'">View</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/branch/edit&view='+data.BranchID+'">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.BranchID+'\')">Delete</a>'
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
            $('#listData').show();
             
            
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
             $('#tbl_content').html("");
            $('#listData').hide();
            $('#process_popup').modal('hide');
        }
    });
}
</script> 