<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Nominee</h1>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?" class="btn btn-outline-primary btn-sm">Back</a>
        </div>
    <div class="col-12">
        <?php include_once("customer_side_menu.php"); ?>
    </div>
</div>

    <div class="row" id="_content">
        
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
                html += '<div class="col-12">'
                            + '<div class="card mb-2">'
                                + '<div class="card-body" style="padding:10px 15px">'
                                    + '<div class="row">'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Nominee Name</div>'
                                            + '<div style="">'+data.NomineeName+'</div>'
                                        + '</div>'
                                         + '<div class="col-6" style="text-align:right">'
                                         + '<div class="dropdown position-relative">'
                                            + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static" style="color:#9a9dc6">'
                                            + '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>'
                                            + '</a>'
                                     + '<div class="dropdown-menu dropdown-menu-end">'
                                            + '<a class="dropdown-item" onclick="view(\''+data.NomineeID+'\')">View</a>'                                             
                                     + '</div>'
                                       + '<div>'
                                                if (data.IsActive=="1") {
                                                    html += '<span class="badge bg-success" style="text-align: right;">Active</span>';
                                                } else if (data.IsActive=="0") {
                                                    html += '<span class="badge bg-secondary" style="text-align: right;">Disabled</span>';
                                                } 
                                            html += '</div>'
                                           + '</div>'
                                
                                        + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Relation Name</div>'
                                            + '<div style="">'+data.RelationName+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right">'
                                            + '<div style="font-weight:bold;">Age</div>'
                                            + '<div style="">'+data.Age+'</div>'
                                        + '</div>'
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

