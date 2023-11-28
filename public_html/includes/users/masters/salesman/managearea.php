<?php
    $data = $mysql->select("select * from _tbl_masters_salesman where SalesmanID='".$_GET['salesman']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-0">Salesman</h1>
            <p> Manage Area</p>
        </div>
         <div class="col-6 mb-3" style="text-align:right;">
            <button onclick="assignAreaShowModal()" type="button" class="btn btn-primary">New Area</button>    
        </div> 
   </div>
      
    <div class="row">
        <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("salesman_side_menu.php"); ?>
        </div>
            <div class="col-9 col-sm-9 col-xxl-9">
                <div class="card">
            <div class="card-body" style="padding-top:25px">
                <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                        <th style="width:100px">State Name</th>
                        <th>District Name</th>
                        <th>Area Name</th>
                        <th>Assigned On</th>
                        <th style="width:100px">Status</th>
                        <th style="width:100px"></th>
                        </tr>
                    </thead>
                <tbody id="tbl_content">
                        <tr>
                        <td colspan="6" style="text-align: center;background:#fff !important">Loading areanames ...</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>
 </div>
    </div>
    </div>
 <div class="modal fade" id="assignareadelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
 
<div class="modal fade" id="assignAreaForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Area Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
<div class="modal-body">
    <div class="container-fluid p-0">
        <form id="frm_createarea" name="frm_createarea" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['SalesmanID'];?>" name="SalesmanID">
        <input type="hidden" value="<?php echo $data[0]['SalesmanName'];?>" name="SalesmanName">
    <div class="row">
        <div class="col-12 col-xl-12">
            <div class="row">
                <div class="col-sm-6  mb-3">
                    <label class="form-label">State Name <span style='color:red'>*</span></label>
                    <select data-live-search="true" data-size="5" name="StateNameID" id="NewStateNameID" class="form-select mstateselect" onchange="getNewDistrictNames()">
                    <option>loading...</option>
                    </select>
                    <span id="ErrStateNameID" class="error_msg"></span>
                </div>
                <div class="col-sm-6  mb-3">
                    <label class="form-label">District Name <span style='color:red'>*</span></label>
                     <select data-live-search="true" data-size="5" name="DistrictNameID" id="NewDistrictNameID" class="form-select mdistrictselect" onchange="getNewAreaNames()">
                     <option>District Names</option>
                     </select>
                     <span id="ErrDistrictNameID" class="error_msg"></span>
                </div>
                <div class="col-sm-6">
                    <label class="form-label">Area Name <span style='color:red'>*</span></label>
                    <select data-live-search="true" data-size="5" name="AreaNameID" id="NewAreaNameID" class="form-select mareaselect">
                    <option>Area Names</option>
                    </select>
                    <span id="ErrAreaNameID" class="error_msg"></span>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
</div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
            <button type="button" onclick="addNew()" class="btn btn-primary">Create </button>
        </div>
      </div>
   </div>
</div>



<div class="modal fade" id="deactivemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form name="frm_create_deactive" id="frm_create_deactive">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Deactive?
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="assignareaDeactive()" class="btn btn-primary">Yes, Deactive</button>
      </div>
     </form> 
    </div>
  </div>
</div>

<div class="modal fade" id="activemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form name="frm_create_deactive" id="frm_create_deactive">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Active?
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="assignareaActive()" class="btn btn-primary">Yes, Active</button>
      </div>
     </form> 
    </div>
  </div>
</div>
    
<script>

function listAssignedSalesmanAreas() {
     $.post(URL+ "webservice.php?action=listAssignedSalesmanAreas&method=Salesman&SalesmanID=<?php echo $data[0]['SalesmanID'];?>","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.StateName + '</td>'
                            + '<td>' + data.DistrictName + '</td>'
                            + '<td>' + data.AreaName + '</td>'
                            + '<td>' + data.AssignedOn + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Deactivated</span>" ) + '</td>'
                            + '<td style="text-align:right">'
                             + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                        + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete('+data.AssignedAreaID+')">Delete</a>';
                                         if (data.IsActive=="1"){
                                               html += '<a class="dropdown-item" onclick="AssignAreaDeactive('+data.AssignedAreaID+')" class="btn btn-primary btn-sm">DeActive</a>';
                                                } else {
                                                html += '<a class="dropdown-item" onclick="AssignAreaActive('+data.AssignedAreaID+')" class="btn btn-primary btn-sm">Active</a>';
                                                }
                                        html += '</div>'
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

setTimeout(function(){
    listNewStateNames();
    listAssignedSalesmanAreas();
},2000);


function assignAreaShowModal(){
        clearDiv(['StateName','DistrictName','AreaName','Remarks']);
    listNewStateNames();
      $('#NewDistrictNameID').html("<option value='0'> Select District Name</option>");
       $('#NewAreaNameID').html("<option value='0'> Select Area Name</option>");
  $('#assignAreaForm').modal("show");   
}  
function addNew() {
    var param = $('#frm_createarea').serialize();
    openPopup();
        clearDiv(['StateName','DistrictName','AreaName','Remarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=assignSalesmanArea&method=Salesman",
        data: new FormData($("#frm_createarea")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                 $('#assignAreaForm').modal("hide");
                $('#frm_createarea').trigger("reset");
                $('#SalesmanCode').val(obj.SalesmanCode);
                $('#popupcontent').html(success_content(obj.message,'closePopup();listAssignedSalesmanAreas'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message);
                } else {
                    $('#failure_div').html(obj.message);
                }
                $('#process_popup').modal('hide');
             }
        }
    });
} 
 
      


function listNewStateNames() {
    $.post(URL+ "webservice.php?action=listAllActive&method=StateNames","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select State Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.StateNameID+'">'+data.StateName+'</option>';
            });   
            $('#NewStateNameID').html(html);
            $("#NewStateNameID").append($("#NewStateNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $('#NewStateNameID').val("0");
            setTimeout(function(){
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

var RemoveID=0;
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#assignareadelete').modal("show"); 
}
function Remove() {
    $('#assignareadelete').modal("hide");
  openPopup();
    $.post(URL+ "webservice.php?action=removeSalesmanArea&method=Salesman&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup ; listAssignedSalesmanAreas()'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                           + '<td>' + data.StateName + '</td>'
                            + '<td>' + data.DistrictName + '</td>'
                            + '<td>' + data.AreaName + '</td>'
                            + '<td>' + data.AssignedOn + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.AssignedAreaID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a onclick="AssignAreaDeactive(\''+data.AssignedAreaID+'\')" class="btn btn-primary btn-sm">DeActive</a></td>'
                        if (data.IsActive=="1"){
                                html +='<a onclick="AssignAreaDeactive(\''+data.AssignedAreaID+'\')" class="btn btn-primary btn-sm">DeActive</a>';
                            } else {
                                html += '<a onclick="AssignAreaActive(\''+data.AssignedAreaID+'\')" class="btn btn-primary btn-sm">Active</a>';
                            }
                            html +='</td>'
                            
                      + '</tr>';
            }); 
             if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="6" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            } 
            $('#tbl_content').html(html);
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
      
}

var DeactiveID=0;
function AssignAreaDeactive(AssignedAreaID){
     DeactiveID=AssignedAreaID;
  $('#deactivemodal').modal("show");   
}
function assignareaDeactive() {
   
   $('#deactivemodal').modal("hide");
  openPopup();
    $.post(URL+ "webservice.php?action=deactiveSalesmanArea&method=Salesman&ID="+DeactiveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup ; listAssignedSalesmanAreas()'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                           + '<td>' + data.StateName + '</td>'
                            + '<td>' + data.DistrictName + '</td>'
                            + '<td>' + data.AreaName + '</td>'
                            + '<td>' + data.AssignedOn + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.AssignedAreaID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a onclick="AssignAreaDeactive(\''+data.AssignedAreaID+'\')" class="btn btn-primary btn-sm">DeActive</a></td>'
                             if (data.IsActive=="1"){
                                html +='<a onclick="AssignAreaDeactive(\''+data.AssignedAreaID+'\')" class="btn btn-primary btn-sm">DeActive</a>';
                            } else {
                                html += '<a onclick="AssignAreaActive(\''+data.AssignedAreaID+'\')" class="btn btn-primary btn-sm">Active</a>';
                            }
                            html +='</td>'
                            
                      + '</tr>';
                     
            }); 
             if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="6" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            } 
            $('#tbl_content').html(html);
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
      
}

var ActiveID=0;
function AssignAreaActive(AssignedAreaID){
     ActiveID=AssignedAreaID;
  $('#activemodal').modal("show");   
}
function assignareaActive() {
   
   $('#activemodal').modal("hide");
  openPopup();
    $.post(URL+ "webservice.php?action=activeSalesmanArea&method=Salesman&ID="+ActiveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup ; listAssignedSalesmanAreas()'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                           + '<td>' + data.StateName + '</td>'
                            + '<td>' + data.DistrictName + '</td>'
                            + '<td>' + data.AreaName + '</td>'
                            + '<td>' + data.AssignedOn + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.AssignedAreaID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a onclick="AssignAreaDeactive(\''+data.AssignedAreaID+'\')" class="btn btn-primary btn-sm">DeActive</a></td>'
                         if (data.IsActive=="1"){
                                html +='<a onclick="AssignAreaDeactive(\''+data.AssignedAreaID+'\')" class="btn btn-primary btn-sm">DeActive</a>';
                            } else {
                                html += '<a onclick="AssignAreaActive(\''+data.AssignedAreaID+'\')" class="btn btn-primary btn-sm">Active</a>';
                            }
                            html +='</td>'
                            
                      + '</tr>';
            }); 
             if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="6" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            } 
            $('#tbl_content').html(html);
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
      
}

function getNewDistrictNames() {
    $.post(URL+ "webservice.php?action=listAllActive&method=DistrictNames&StateNameID="+$('#NewStateNameID').val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select District Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.DistrictNameID+'">'+data.DistrictName+'</option>';
            });   
            $('#NewDistrictNameID').html(html);
            $("#NewDistrictNameID").append($("#DistrictNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $('#NewDistrictNameID option').each(function() {
            });
            setTimeout(function(){
                //$('.mdistrictselect').selectpicker();
                //getNewAreaNames();
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function getNewAreaNames() {
    $.post(URL+ "webservice.php?action=listAllActive&method=AreaNames&DistrictNameID="+$('#NewDistrictNameID').val()+"&StateNameID="+$("#NewStateNameID").val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select Area Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.AreaNameID+'">'+data.AreaName+'</option>';
            });   
            $('#NewAreaNameID').html(html);
            $("#NewAreaNameID").append($("#NewAreaNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $('#NewAreaNameID option').each(function() {
            });
            setTimeout(function(){
                //$('.mareaselect').selectpicker();
            },1500);
        } else {
            alert(obj.message);
        }
    });
}
</script>
