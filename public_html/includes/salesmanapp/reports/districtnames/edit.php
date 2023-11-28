<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Edit District Name</h1>
    <div class="row">
        <div class="col-12 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <?php $data = $mysql->select("select * from _tbl_master_districtnames where DistrictNameID='".$_GET['edit']."'"); ?>
                    <form id="frm_edit" name="frm_edit">
                        <input type="hidden" value="<?php echo $data[0]['DistrictNameID'];?>" name="DistrictNameID" id="DistrictNameID">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">District Name Code</label>
                                <input type="text" disabled="disabled" value="<?php echo $data[0]['DistrictNameCode'];?>" class="form-control">
                                <span id="ErrDistrictNameCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">District Name<span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['DistrictName'];?>" name="DistrictName" id="DistrictName" class="form-control" placeholder="District Name">
                                <span id="ErrDistrictName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12  mb-3">
                                <label class="form-label">State Name<span style='color:red'>*</span></label>
                                <select data-live-search="true" data-size="5" name="StateNameID" id="StateNameID" class="form-select mstateselect" onchange="getDistrictNames()">
                                    <option>loading...</option>
                                </select>
                                <span id="ErrStateNameID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Status</label>
                                <select name="IsActive" id="IsActive" class="form-select">
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' ": "''";?>>Active</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' ": "''";?>>DeActivated</option>
                                </select>
                            </div>
                            <div class="col-sm-12" style="text-align:right;">
                                <a href="<?php echo URL;?>dashboard.php?action=masters/districtnames/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                                <button onclick="doUpdate()" type="button" class="btn btn-primary">Update District Name</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
         
    </div>                            
</div>
<div class="modal" id="page_popup" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="page_popup_content" style="text-align: center;padding:30px;">
        <img src="<?php echo URL;?>assets/gif/spinner.gif" style="width:80px;margin:0px auto">
        Processing ...
    </div>
  </div>
</div>
 
<script>
var _StateNameID = "<?php echo $data[0]['StateNameID'];?>";
function doUpdate() {
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['DistrictName','Remarks']);
    $.post(URL+"webservice.php?action=doUpdate&method=DistrictNames",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            //$('#frm_newservice').trigger("reset");
            $('#popupcontent').html(successcontent(obj.message));
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            closePopup();
        }
    });
}

function listStateNames() {
    $.post(URL+ "webservice.php?action=ListAll&method=StateNames","",function(data){
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
            $('#StateNameID option').each(function() {
                if($(this).val() == _StateNameID) {
                    $(this).prop("selected", true);
                }
            });
            setTimeout(function(){
               // $('.mstateselect').selectpicker();
                getDistrictNames();
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