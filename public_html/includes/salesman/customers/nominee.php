<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3 mb-0">Customers</h1>
            <p>Nominee</p>
        </div>
    </div>
    <div class="row">
        <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("customer_side_menu.php"); ?>
        </div>
    <div class="col-9 col-sm-9 col-xxl-9">
         <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12" style="text-align:right;">
                        <a style="color:#888;text-decoration:none;"  onclick="addForm()"><i class="align-middle me-2" data-feather="plus-square"></i><span class="align-middle">Add Nominee</span></a>
                    </div>
                    <div class="col-12">
                            <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Nominee Name</th>
                                <th>Relation Name</th>
                                <th>Age</th>
                                <th style="width:50px">Status</th>
                                <th style="width:50px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="6" style="text-align: center;background:#fff !important">Loading nominees ...</td>
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


<div class="modal fade" id="addconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Nominee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid p-0">
            <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $data[0]['CustomerID'];?>" name="CustomerID" id="CustomerID">
        <div class="row">
        <div class="col-sm-12 mb-3">
            <label class="form-label">Name <span style='color:red'>*</span></label>
            <input type="text" name="NomineeName" id="NomineeName" class="form-control" placeholder="Nominee Name">
            <span id="ErrNomineeName" class="error_msg"></span>
        </div>
        <div class="col-sm-6  mb-3">
            <label class="form-label">Relation<span style='color:red'>*</span></label>
            <select data-live-search="true" data-size="5" name="RelationNameID" id="RelationNameID" class="form-select mstateselect">
                <option>loading...</option>
            </select>
            <span id="ErrRelationNameID" class="error_msg"></span>
        </div>
        <div class="col-sm-6 mb-3">
            <label class="form-label">Age <span style='color:red'>*</span></label>
            <input type="text" name="Age" id="Age" class="form-control" placeholder="Age">
            <span id="ErrAge" class="error_msg"></span>
        </div>
        
        
        <div class="col-sm-12 mb-3">
            <label class="form-label">Remarks</label>
            <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
            <span id="ErrRemarks" class="error_msg"></span>
        </div>
        </div>
    </form>
  </div>
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Add Nominee</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Nominee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="frm_edit"  id="frm_edit">
                        <input type="hidden" name="NomineeID" id="editNomineeID">
                       <div class="row">
                    <div class="col-sm-12 mb-3">
                    <label class="form-label">Name </label>
                    <input type="text" name="NomineeName" id="editNomineeName" class="form-control" placeholder="Nominee Name">
                    <span id="ErreditNomineeName" class="error_msg"></span>
                </div>
                <div class="col-sm-6  mb-3">
                    <label class="form-label">Relation</label>
                    <input type="text" readonly="readonly" name="RelationNameID" id="editRelationNameID" class="form-control" placeholder="Relation Name">
                    <span id="ErreditRelationNameID" class="error_msg"></span>
                </div>
                <div class="col-sm-6 mb-3">
                    <label class="form-label">Age </label>
                    <input type="text" readonly="readonly" name="Age" id="editAge" class="form-control" placeholder="Age">
                    <span id="ErreditAge" class="error_msg"></span>
                </div>
                 <div class="col-sm-6 mb-3">
                    <label class="form-label">Status</label>
                    <select name="IsActive" id="editIsActive" class="form-select">
                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' ": "''";?>>Active</option>
                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' ": "''";?>>DeActivated</option>
                    </select>
                 </div>
                
                <div class="col-sm-12 mb-3">
                    <label class="form-label">Remarks</label>
                    <input type="text" name="Remarks" readonly="readonly" id="editRemarks" class="form-control" placeholder="Remarks">
                    <span id="ErreditRemarks" class="error_msg"></span>
                </div>
                </div>
            </form>
         </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button onclick="doUpdate()" type="button" class="btn btn-primary">Update</button>
            </div>
          </div>
        </div>
    </div>
    
<script>

var _CustomerID = "<?php echo $data[0]['CustomerID'];?>";

function listnominees() {
    openPopup();
    $.post(URL+ "webservice.php?action=listNominees&method=Customers&CustomerID="+_CustomerID,"",function(data){
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
                             + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                        + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.NomineeID+'\')">View</a>'
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

setTimeout("listnominees()",2000);


function addForm(){
  $('#addconfirmation').modal("show");
  listRelationNames();
  clearDiv(['NomineeName','RelationName','RelationNameID','Age','Remarks']);
  $('#CustomerID').val(_CustomerID);
}
  
function addNew() {
    var param = $('#frm_create').serialize();
  clearDiv(['NomineeName','RelationName','RelationNameID','Age','Remarks']);
    $.post(URL+"webservice.php?action=addNominee&method=Customers",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#addconfirmation').modal("hide");
            openPopup();
            $('#frm_create').trigger("reset");
           
            $('#popupcontent').html(success_content(obj.message,'closePopup();listnominees')); 
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
        }
    });
}



function listRelationNames() {
    $.post(URL+ "webservice.php?action=listAllActive&method=RelationNames","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select Relation Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.RelationNameID+'">'+data.RelationName+'</option>';
            });   
            $('#RelationNameID').html(html);
             $("#RelationNameID").append($("#RelationNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $("#RelationNameID").val("0");
            setTimeout(function(){
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function view(NomineeID){
  $('#editForm').modal("show");
       clearDiv(['editNomineeName','editRelationName','editAge','editRelationNameID','editRemarks','editIsActive']);
    $.post(URL+ "webservice.php?action=getNominee&method=Customers&ID="+NomineeID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#editNomineeName').val(data.NomineeName);
                $('#editNomineeID').val(data.NomineeID);
                $('#editRelationName').val(data.RelationName);
                $('#editIsActive').val(data.IsActive);
                $('#editAge').val(data.Age);
                $('#editRemarks').val(data.Remarks);
                $('#editRelationNameID').val(data.RelationNameID);
            });   
}  
  });
} 
function doUpdate() {
    var param = $('#frm_edit').serialize();
       clearDiv(['editNomineeName','editRelationName','editAge','editRelationNameID','editRemarks','editIsActive']);
    $.post(URL+"webservice.php?action=doUpdateNominee&method=Customers",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#editForm').modal("hide"); 
            openPopup();
            //$('#frm_newservice').trigger("reset");
            $('#popupcontent').html(success_content(obj.message,'closePopup(); listnominees'));
        } else {
            if (obj.div!="") {
                $('#Erredit'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            closePopup();
        }
    });
}

</script> 

