<?php
    $data = $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Edit Scheme</h1>
    <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
     <input type="hidden" value="<?php echo $data[0]['SchemeID'];?>" name="SchemeID">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Scheme ID</label>
                                <input type="text" value="<?php echo $data[0]['SchemeCode'];?>" disabled="disabled" name="SchemeCode" id="SchemeCode" class="form-control" placeholder="Scheme ID">
                                <span id="ErrCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Entry Date <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo date("d-m-Y",strtotime($data[0]['EntryDate']));?>" name="EntryDate" id="EntryDate" class="form-control" placeholder="Scheme Name" style="width: 120px !important">
                                <span id="ErrEntryDate" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <label class="form-label">Scheme Name <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Scheme Name</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="<?php echo $data[0]['SchemeName'];?>" name="SchemeName" id="SchemeName" class="form-control" placeholder="Scheme Name">
                                <span id="ErrSchemeName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-4">
                                <label class="form-label">Short Description <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Short Description</div>
                                    <div class="mycontainer">
                                        1. Allow all characters, not allow <span style='color:red'>\'!~$"</span><br>
                                        2. Maximum 250 characters require<br>
                                        3. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="<?php echo $data[0]['ShortDescription'];?>" name="ShortDescription" id="ShortDescription" maxlength="250" class="form-control" placeholder="Short Description">
                                <span id="ErrShortDescription" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="row" >
                                    <div class="col-sm-12 mb-1">
                                    <label class="form-label">Due Amount <span style='color:red'>*</span>
                                        <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Due Amount</div>
                                    <div class="mycontainer">
                                        1. Allow only numbers<br>
                                        2. Minimum 3 digits require<br>
                                        2. Maximum 6 digits require<br>
                                        3. Not allow cut,copy,paste
                                    </div>
                                </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-6 mb-1">
                                        
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Min(₹)</span>
                                        </div>
                                            <input type="text" style="text-align: right;" value="<?php echo $data[0]['MinDueAmount'];?>" name="MinDueAmount" id="MinDueAmount" class="form-control" placeholder="0.00">
                                        </div>
                                    </div>
                            <div class="col-sm-6 mb-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Max(₹)</span>
                                    </div>
                                        <input type="text" style="text-align: right;" value="<?php echo $data[0]['MaxDueAmount'];?>" name="MaxDueAmount" id="MaxDueAmount" class="form-control" placeholder="0.00">
                                    </div>
                                    </div>
                                    <span id="ErrDueAmount" class="error_msg"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="row" >
                            <div class="col-sm-12 mb-1">
                             <label class="form-label">Duration<span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Duration</div>
                                    <div class="mycontainer">
                                        1. Allow only numbers<br>
                                        2. Minimum 1 digits require<br>
                                        3. Maximum 3 digits require<br>
                                        4. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                            </div>
                            <div class="col-sm-6 mb-1">
                                <div class="input-group">
                                   <span class="input-group-text" id="basic-addon1">Min</span>
                                <input type="text" style="text-align: right;" value="<?php echo $data[0]['MinDuration'];?>" name="MinDuration" id="MinDuration" class="form-control" placeholder="0">
                            </div>
                            </div>
                            <div class="col-sm-6 mb-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Max</span>
                                        </div>
                                            <input type="text" style="text-align: right;" value="<?php echo $data[0]['MaxDuration'];?>" name="MaxDuration" id="MaxDuration" class="form-control" placeholder="0">
                                        </div>
                                    </div>
                                    <span id="ErrDuration" class="error_msg"></span>
                                </div>
                            </div>
                        <div class="col-sm-6 mb-3">
                            <div class="input-group">
                             <span class="input-group-text" id="basic-addon3" style="width:200px">Wastage Discount </span>
                                <input type="text" style="text-align: right;" value="<?php echo $data[0]['WastageDiscount'];?>" name="WastageDiscount" id="WastageDiscount" class="form-control" placeholder="0.00" maxlength="">
                                <span class="input-group-text" id="basic-addon3">%</span>
                             </div>
                                <span id="ErrWastageDiscount" class="error_msg"></span>
                             </div>
                        <div class="col-sm-6 mb-3">
                            <div class="input-group">
                             <span class="input-group-text" id="basic-addon3" style="width:200px">Making Charge Discount </span>
                                <input type="text" style="text-align: right;" value="<?php echo $data[0]['MakingChargeDiscount'];?>" name="MakingChargeDiscount" id="MakingChargeDiscount" class="form-control" placeholder="0.00" maxlength="">
                                <span class="input-group-text" id="basic-addon3">%</span>
                                </div>
                                <span id="ErrMakingChargeDiscount" class="error_msg"></span>
                             </div>
                        
                            <div class="col-sm-6">         
                                <label class="form-label">Status <span style='color:red'>*</span></label>
                                <select name="IsActive" id="IsActive" class="form-select">
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >Active</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >Deactivated</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                              <div class="col-sm-12">
                                <label class="form-label">Benefits <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Benefits</div>
                                    <div class="mycontainer">
                                        1. Allow all characters, not allow <span style='color:red'>\'!~$"</span><br>
                                        2. Maximum 250 characters require<br>
                                        3. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <textarea id="Benefits" name="Benefits" class="form-control" maxlength="250" rows="4" cols="50"><?php echo $data[0]['Benefits'];?></textarea>
                                <span id="ErrBenefits" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">      
                            <div class="col-sm-12">
                                <label class="form-label">Terms and Condition <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Terms and Condition</div>
                                    <div class="mycontainer">
                                        1. Allow all characters, not allow <span style='color:red'>\'!~$"</span><br>
                                        2. Maximum 250 characters require<br>
                                        3. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <textarea id="TermsOfConditions" name="TermsOfConditions" maxlength="250" class="form-control" rows="4" cols="50"><?php echo $data[0]['TermsOfConditions'];?></textarea>
                                <span id="ErrTermsOfConditions" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div> 
                 <div class="card">
                    <div class="card-body">
                        <div class="row">      
                            <div class="col-sm-12">
                                <label class="form-label">Remarks
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Remarks</div>
                                    <div class="mycontainer">
                                        1. Allow all characters, not allow <span style='color:red'>\'!~$"</span><br>
                                        2. Maximum 250 characters require<br>
                                        3. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="<?php echo $data[0]['Remarks'];?>" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks" maxlength="250">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                        </div>
                      </div> 
                </form>
            </div>
            <div class="col-sm-12" style="text-align:right;">
                <?php 
                $path=URL."dashboard.php?action=";
                if (isset($_GET['fpg'])) {
                $path.=$_GET['fpg'];
                }
            if (isset($_GET['type'])) {
                $path.="&type=".$_GET['type'];
            }
            ?>
            <a href="<?php echo   $path;?>" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                    <button onclick="confirmationtoUpdate()" type="button" class="btn btn-primary">Update Scheme</button>    
            </div>

<div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Update ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="doUpdate()" class="btn btn-primary">Yes, Update</button>
      </div>
     </div>
  </div>                            
</div>

 
<script>
var _EmployeeCategoryID = "<?php echo $data[0]['SchemeID'];?>";

function confirmationtoUpdate(){
  $('#confirmation').modal("show");
    clearDiv(['SchemeCode','SchemeName','Remarks','EntryDate','IsActive','Benefits','TermsOfConditions','MakingChargeDiscount','WastageDiscount']);
} 
function doUpdate() {
    $('#confirmation').modal("hide");
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['SchemeCode','SchemeName','Remarks',,'EntryDate','IsActive','Benefits','TermsOfConditions','MakingChargeDiscount','WastageDiscount']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=Schemes",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(success_content(obj.message,'closePopup'));
            } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message);
                    $('#process_popup').modal('hide');
                } else {
                   $('#popupcontent').html( errorcontent(obj.message));
                }
              
             }
        },
        error:networkunavailable 
    });
}


document.addEventListener('DOMContentLoaded', function () {
    const ele = document.getElementById('MaxDueAmount');
    const state = {
        value: ele.value,
    };

    ele.addEventListener('keydown', function (e) {
        const target = e.target;
        state.selectionStart = target.selectionStart;
        state.selectionEnd = target.selectionEnd;
    });

    ele.addEventListener('input', function (e) {
        const target = e.target;

        if (/^[0-9\s]*$/.test(target.value)) {
            state.value = target.value;
        } else {
            // Users enter the not supported characters
            // Restore the value and selection
            target.value = state.value;
            target.setSelectionRange(state.selectionStart, state.selectionEnd);
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const ele = document.getElementById('MinDueAmount');
    const state = {
        value: ele.value,
    };

    ele.addEventListener('keydown', function (e) {
        const target = e.target;
        state.selectionStart = target.selectionStart;
        state.selectionEnd = target.selectionEnd;
    });

    ele.addEventListener('input', function (e) {
        const target = e.target;

        if (/^[0-9\s]*$/.test(target.value)) {
            state.value = target.value;
        } else {
            // Users enter the not supported characters
            // Restore the value and selection
            target.value = state.value;
            target.setSelectionRange(state.selectionStart, state.selectionEnd);
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const ele = document.getElementById('MaxDuration');
    const state = {
        value: ele.value,
    };

    ele.addEventListener('keydown', function (e) {
        const target = e.target;
        state.selectionStart = target.selectionStart;
        state.selectionEnd = target.selectionEnd;
    });

    ele.addEventListener('input', function (e) {
        const target = e.target;

        if (/^[0-9\s]*$/.test(target.value)) {
            state.value = target.value;
        } else {
            // Users enter the not supported characters
            // Restore the value and selection
            target.value = state.value;
            target.setSelectionRange(state.selectionStart, state.selectionEnd);
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const ele = document.getElementById('MinDuration');
    const state = {
        value: ele.value,
    };

    ele.addEventListener('keydown', function (e) {
        const target = e.target;
        state.selectionStart = target.selectionStart;
        state.selectionEnd = target.selectionEnd;
    });

    ele.addEventListener('input', function (e) {
        const target = e.target;

        if (/^[0-9\s]*$/.test(target.value)) {
            state.value = target.value;
        } else {
            // Users enter the not supported characters
            // Restore the value and selection
            target.value = state.value;
            target.setSelectionRange(state.selectionStart, state.selectionEnd);
        }
    });
}).fail(function(){
        networkunavailable(); 
    });
setTimeout(function(){
},2000);
</script> 