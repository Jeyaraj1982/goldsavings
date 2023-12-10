<div class="container-fluid p-0">
    <h1 class="h3 mb-3">New District Name</h1>
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form id="frm_create" name="frm_create">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">District Code <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_districtnames");?>" name="DistrictNameCode" id="DistrictNameCode" class="form-control" placeholder="District Name Code">
                                <span id="ErrDistrictNameCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">District Name <span style='color:red'>*</span></label>
                                <input type="text" name="DistrictName" id="DistrictName" class="form-control" placeholder="District Name">
                                <span id="ErrDistrictName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">State Name<span style='color:red'>*</span></label>
                                <select data-live-search="true" data-size="5" name="StateNameID" id="StateNameID" class="form-select mselect">
                                    <option>loading...</option>
                                </select>
                                <span id="ErrCustomerTypeNameID" class="error_msg"></span>
                                <div style="text-align: right;"><a href="<?php echo URL;?>dashboard.php?action=masters/statenames/new">New State Name</a></div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12" style="text-align:right;">
                                <a href="<?php echo URL;?>dashboard.php?action=masters/districtnames/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                                <button onclick="confirmationtoadd()" type="button" class="btn btn-primary">Create District Name</button>
                            </div>
                        </div>
                    </form>
                     <div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Create ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Yes, Create</button>
      </div>
    </div>
  </div>
</div>       
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function confirmationtoadd(){
  $('#confirmation').modal("show");   
} 
function addNew() {
    $('#confirmation').modal("hide");  
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['DistrictNameCode','DistrictName','Remarks']);
    $.post(URL+"webservice.php?action=addNew&method=DistrictNames",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#frm_create').trigger("reset");
            if (obj.DistrictNameCode.length>3) {
                $('#DistrictNameCode').val(obj.DistrictNameCode);
            }
            $('#popupcontent').html(success_content(obj.message));
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

function listStateNames() {
    $.post(URL+ "webservice.php?action=listAllActive&method=StateNames","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select State Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.StateNameID+'">'+data.StateName+'</option>';
            });   
            $('#StateNameID').html(html);
            
            
             $("#StateNameID").append($("#StateNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            
            $("#StateNameID").val("0");
            setTimeout(function(){
                //$('.mstateselect').selectpicker();
            },1500);
        } else {
            alert(obj.message);
        }
    });
}
setTimeout(function(){
    
    listStateNames();
},2000);
</script>