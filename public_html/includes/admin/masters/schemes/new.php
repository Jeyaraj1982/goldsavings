<div class="container-fluid p-0">
    <h1 class="h3 mb-3">New Scheme</h1>
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <label class="form-label">Scheme ID <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Scheme ID</div>
                                    <div class="mycontainer">
                                        1. Allow only alphanumeric characters<br>
                                        2. Minimum 8 characters require<br>
                                        3. Maximum 20 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div> 
                                </label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_schemes");?>" name="SchemeCode" id="SchemeCode" class="form-control" placeholder="Scheme ID" maxlength="20" oninput="this.value=this.value.toUpperCase()">
                                <span id="ErrSchemeCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Entry Date <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo date("d-m-Y");?>" name="EntryDate" id="EntryDate" class="form-control" placeholder="Entry Date" style="width: 120px !important">
                                <span id="ErrEntryDate" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-4">
                                <label class="form-label">Scheme Name <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Scheme Name</div>
                                    <div class="mycontainer">
                                        1. Allow only alphanumeric and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="" name="SchemeName" id="SchemeName" class="form-control" placeholder="Scheme Name" maxlength="50">
                                <span id="ErrSchemeName" class="error_msg"></span>
                            </div>  
                            <div class="col-sm-12 mb-2">
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
                                <input type="text" value="" name="ShortDescription" id="ShortDescription" class="form-control" placeholder="Short Description" maxlength="250">
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
                                            <input type="text" style="text-align: right;" name="MinDueAmount" id="MinDueAmount" class="form-control" placeholder="0" maxlength="3">
                                        </div>
                                    </div>
                            <div class="col-sm-6 mb-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Max(₹)</span>
                                    </div>
                                        <input type="text" style="text-align: right;" name="MaxDueAmount" id="MaxDueAmount" class="form-control" placeholder="0" maxlength="6">
                                    </div>
                                    </div>
                                    <span id="ErrDueAmount" class="error_msg"></span>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div class="row" >
                                    <div class="col-sm-12">   
                                    <label class="form-label">Duration(Months) <span style='color:red'>*</span>
                                        <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Duration</div>
                                    <div class="mycontainer">
                                        1. Allow only numbers<br>
                                        2. Minimum 1 digits require<br>
                                        2. Maximum 3 digits require<br>
                                        3. Not allow cut,copy,paste
                                    </div>
                                </div>
                                        </label>
                                    </div>
                                    <div class="col-sm-6 mb-1">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Min</span>
                                        </div>
                                            <input type="text" style="text-align: right;" name="MinDuration" id="MinDuration" class="form-control" placeholder="0" maxlength="1">
                                        </div>
                                    </div>
                            <div class="col-sm-6 mb-1">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Max</span>
                                    </div>
                                        <input type="text" style="text-align: right;" name="MaxDuration" id="MaxDuration" class="form-control" placeholder="0" maxlength="3">
                                    </div>
                                    </div>
                                    <span id="ErrDuration" class="error_msg"></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="input-group">
                             <span class="input-group-text" style="width: 190px;" id="basic-addon3">Wastage Discount </span>
                             <input type="text" style="text-align: right;" name="WastageDiscount" id="WastageDiscount" class="form-control" value="0.00" maxlength="">
                                <!--<select data-live-search="true" data-size="12" style="text-align: right;" name="WastageDiscount" id="WastageDiscount" class="form-select mselect" >
                                    <option value="0">0</option>
                                    <?php for($i=1;$i<=100;$i++){?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php } ?>
                                </select>-->
                                <span class="input-group-text" id="basic-addon3">%</span>
                                </div>
                                <span id="ErrWastageDiscount" class="error_msg"></span>
                            </div>
                        <div class="col-sm-6">
                            <div class="input-group">
                                <span class="input-group-text" style="width: 190px;" id="basic-addon3">Making Charge Discount </span>
                                    <input type="text" style="text-align: right;" name="MakingChargeDiscount" id="MakingChargeDiscount" class="form-control" value="0.00" maxlength="">
                                <span class="input-group-text" id="basic-addon3">%</span>
                            </div>
                            <span id="ErrMakingChargeDiscount" class="error_msg"></span>
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
                                <textarea id="Benefits" name="Benefits" class="form-control" maxlength="250" rows="4" cols="50"></textarea>
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
                                <textarea id="TermsOfConditions" name="TermsOfConditions" maxlength="250" class="form-control" rows="4" cols="50"></textarea>
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
                                <input type="text" id="Remarks" name="Remarks" placeholder="Remarks" maxlength="250" class="form-control"></input>
                                <span id="ErrRemarks" class="error_msg"></span>
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
            <a href="<?php echo $path;?>" class="btn btn-outline-primary">Back</a>
    &nbsp;&nbsp;
                        <button onclick="confirmation()" type="button" class="btn btn-primary">Create Scheme</button>    
                </div>

<div class="modal fade" id="confimation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to create scheme ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Yes, Create</button>
      </div>
    </div>
  </div>
</div>
<script>
 function confirmation(){
         clearDiv(['SchemeName','Amount','ShortDescription','DueAmount','Duration','Remarks','Benefits','TermsOfConditions','WastageDiscount','MakingChargeDiscount']);
   $('#confimation').modal("show"); 
    
 }
function addNew() {
     $('#confimation').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['SchemeName','Amount','ShortDescription','DueAmount','Duration','Remarks','Benefits','TermsOfConditions','WastageDiscount','MakingChargeDiscount']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=Schemes",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#SchemeCode').val(obj.nextcode);
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
});
setTimeout(function(){
},2000);

</script>  
 <!--
 https://bootstrap-autocomplete.readthedocs.io/en/latest/
 https://www.w3schools.com/howto/howto_js_autocomplete.asp
  -->
