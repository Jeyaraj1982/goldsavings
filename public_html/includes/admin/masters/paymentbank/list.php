<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Payment Bank</h1>
            <h6 class="card-subtitle text-muted mb-3">List all payment banks</h6>
        </div>
        <div class="col-6" style="text-align:right;">
             <button onclick="addForm()" type="button" class="btn btn-primary">New</button>
        </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:15px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Code</th>
                                <th>Bank Name</th>
                                <th style="width: 200px;">Account Number</th>
                                <th style="width: 200px;">Account Holder Name</th>
                                <th style="width: 70px;">Status</th>
                                <th style="width: 50px;"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="6" style="text-align: center;background:#fff !important">Loading Payment banks...</td>
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

<div class="modal fade" id="addconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Payment Bank</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid p-0">
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $data[0][' PaymentBankID'];?>" name="PaymentBankID" id=" PaymentBankID">
        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Payment Bank Code <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Payment Bank Code</div>
                                    <div class="mycontainer">
                                        1. Allow only alphanumeric characters<br>
                                        2. Minimum 8 characters require<br>
                                        3. Maximum 20 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_paymentbanks");?>" name="PaymentBankCode" id="PaymentBankCode" class="form-control" placeholder="Payment Bank Code" maxlength="20" oninput="this.value=this.value.toUpperCase()">
                                <span id="ErrPaymentBankCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Bank Name <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Bank Name</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste 
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="BankName" id="BankName" class="form-control" placeholder="Bank Name" maxlength="50">
                                <span id="ErrBankName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Account Number <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Account Number</div>
                                    <div class="mycontainer">
                                        1. Allow only numbers<br>
                                        2. Minimum 5 characters require<br>
                                        3. Maximum 25 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="AccountNumber" id="AccountNumber" class="form-control" placeholder="Account Number" maxlength="25">
                                <span id="ErrAccountNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Account Holder Name <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Account Holder Name</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="AccountHolderName" id="AccountHolderName" class="form-control" placeholder="Account Holder Name" maxlength="50">
                                <span id="ErrAccountHolderName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">IFSC Code <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">IFSC Code</div>
                                    <div class="mycontainer">
                                        1. Allow only alphanumeric characters<br>
                                        2. Minimum 11 characters require<br>
                                        3. Maximum 15 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="IFSCode" id="IFSCode" class="form-control" placeholder="IFSC Code" maxlength="15">
                                <span id="ErrIFSCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Branch <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Branch</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="Branch" id="Branch" class="form-control" placeholder="Branch">
                                <span id="ErrBranch" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Remarks</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
        </div>
    </form>
    </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Create Payment Bank</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Payment Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form name="frm_edit"  id="frm_edit">
            <input type="hidden" name="PaymentBankID" id="editPaymentBankID">
               <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Payment Bank Code</label>
                                <input type="text" disabled="disabled" value="" name="PaymentBankCode" id="editPaymentBankCode" class="form-control">
                                <span id="ErreditPaymentBankCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Bank Name<span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Bank Name</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="" name="BankName" id="editBankName" class="form-control" placeholder="Bank Name" maxlength="50">
                                <span id="ErreditBankName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Account Number <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Account Number</div>
                                    <div class="mycontainer">
                                        1. Allow only numbers<br>
                                        2. Minimum 5 characters require<br>
                                        3. Maximum 25 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="" name="AccountNumber" id="editAccountNumber" class="form-control" placeholder="Account Number" maxlength="25"> 
                                <span id="ErreditAccountNumber" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Account Holder Name <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Account Holder Name</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="" name="AccountHolderName" id="editAccountHolderName" class="form-control" placeholder="Account Holder Name" maxlength="50">
                                <span id="ErreditAccountHolderName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">IFSC Code <span style='color:red'>*</span>
                                 <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">IFSC Code</div>
                                    <div class="mycontainer">
                                        1. Allow only alphanumeric characters<br>
                                        2. Minimum 11 characters require<br>
                                        3. Maximum 15 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="" name="IFSCode" id="editIFSCode" class="form-control" placeholder="IFSC Code" maxlength="15">
                                <span id="ErreditIFSCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Branch <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Branch</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="" name="Branch" id="editBranch" class="form-control" placeholder="Branch" maxlength="50">
                                <span id="ErreditBranch" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Remarks</div>
                                    <div class="mycontainer">
                                        1. Allow only alphabets and space<br>
                                        2. Minimum 3 characters require<br>
                                        3. Maximum 50 characters require<br>
                                        4. Not allow cut,copy,paste
                                        
                                    </div>
                                </div>
                                </label>
                                <input type="text" value="" name="Remarks" id="editRemarks" class="form-control" placeholder="Remarks" maxlength="250">
                                <span id="ErreditRemarks" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Status</label>
                                <select name="IsActive" id="editIsActive" class="form-select">
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' ": "''";?>>Active</option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' ": "''";?>>DeActivated</option>
                                </select>
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
    
    <div class="modal fade" id="viewForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Payment Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form name="frm_view"  id="frm_view">
            <input type="hidden" name="PaymentBankID" id="viewPaymentBankID">
               <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Payment Bank Code</label>
                                <input type="text" disabled="disabled" value="" readonly="readonly" name="PaymentBankCode" id="viewPaymentBankCode" class="form-control">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Bank Name</label>
                                <input type="text" value="" name="BankName" id="viewBankName" readonly="readonly" class="form-control" placeholder="Bank Name">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Account Number</label>
                                <input type="text" value="" name="AccountNumber" id="viewAccountNumber" readonly="readonly" class="form-control" placeholder="Account Number">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Account Holder Name</label>
                                <input type="text" value="" name="AccountHolderName" id="viewAccountHolderName" readonly="readonly" class="form-control" placeholder="Account Name">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">IFSC Code</label>
                                <input type="text" value="" name="IFSCode" id="viewIFSCode" readonly="readonly" class="form-control" placeholder="IFSC Code">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Branch</label>
                                <input type="text" value="" name="Branch" id="viewBranch" readonly="readonly" class="form-control" placeholder="Branch">
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" value="" name="Remarks" id="viewRemarks" readonly="readonly" class="form-control" placeholder="Remarks">
                            </div>
                             <div class="col-sm-6 mb-3">
                                <label class="form-label">Status </label>
                               <input type="text" value="" name="viewIsActive" id="viewIsActive" readonly="readonly" class="form-control">
                            </div>
                          </div>
                   </form>
         </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
    </div>
<script>

function listPaymentbank() {
    openPopup();
    $.post(URL+ "webservice.php?action=ListAll&method=PaymentBanks","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.PaymentBankCode + '</td>'
                            + '<td>' + data.BankName + '</td>'
                            + '<td>' + data.AccountNumber + '</td>'
                            + '<td>' + data.AccountHolderName + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                             + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.PaymentBankID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.PaymentBankID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.PaymentBankID+'\')">Delete</a>'
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
             //if (($.fn.dataTable.isDataTable("#datatables-fixed-header"))) {
              //  $("#datatables-fixed-header").DataTable({
                //    fixedHeader: true,
                //    pageLength: 25
               // });
           // }
        } else {
           $('#popupcontent').html( errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}
setTimeout("listPaymentbank()",2000);

function addForm(){
  $('#addconfirmation').modal("show");
      clearDiv(['PaymentBankID','PaymentBank','PaymentBankCode','BankName','Branch','AccountNumber','AccountHolderName','IFSCode','Remarks','IsActive']);
   $('#PaymentBank').val("");
   $('#PaymentBankID').val("");
   $('#BankName').val("");
   $('#Branch').val("");
   $('#AccountNumber').val("");
   $('#AccountHolderName').val("");
   $('#IFSCode').val("");
   $('#Remarks').val("");
      clearDiv(['PaymentBankID','PaymentBank','PaymentBankCode','BankName','Branch','AccountNumber','AccountHolderName','IFSCode','Remarks','IsActive']);
}  
function addNew() {
    var param = $('#frm_create').serialize();
    openPopup();
      clearDiv(['PaymentBankID','PaymentBank','PaymentBankCode','BankName','Branch','AccountNumber','AccountHolderName','IFSCode','Remarks','IsActive']);
   jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=PaymentBanks",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#PaymentBankCode').val(obj.PaymentBankCode);
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

function edit(ID){
  $('#editForm').modal("show");
   openPopup(); 
      clearDiv(['editPaymentBankID','editPaymentBankCode','editBankName','editBranch','editAccountNumber','editAccountHolderName','editIFSCode','editRemarks','editIsActive']);
    $.post(URL+ "webservice.php?action=getData&method=PaymentBanks&ID="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#editPaymentBankCode').val(data.PaymentBankCode);
                $('#editBankName').val(data.BankName);
                $('#editAccountNumber').val(data.AccountNumber);
                $('#editAccountHolderName').val(data.AccountHolderName);
                $('#editIFSCode').val(data.IFSCode);
                $('#editBranch').val(data.Branch);
                $('#editRemarks').val(data.Remarks);
                $('#editPaymentBankID').val(data.PaymentBankID);
                $('#editIsActive').val(data.IsActive);
                $('#editRemarks').val(data.Remarks);
            });   
}  
  }).fail(function(){
        networkunavailable(); 
    });
} 
function doUpdate() {
    var param = $('#frm_edit').serialize();
      clearDiv(['editPaymentBankID','editPaymentBankCode','editBankName','editBranchName','editAccountNumber','editAccountHolderName','editIFSCode','editRemarks','editIsActive']);
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=PaymentBanks",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
              if (obj.status=="success") {
            $('#editForm').modal("hide"); 
            openPopup();
            //$('#frm_newservice').trigger("reset");
            $('#popupcontent').html(success_content(obj.message,'listPaymentbank'));
        } else {
            if (obj.div!="") {
                $('#Erredit'+obj.div).html(obj.message);
                $('#process_popup').modal('hide');
            } else {
               $('#popupcontent').html(errorcontent(obj.message));
            }
            closePopup();
        }
        },
        error:networkunavailable 
    });
}

function view(ID){
  $('#viewForm').modal("show");
  openPopup();
  $.post(URL+ "webservice.php?action=getData&method=PaymentBanks&ID="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#viewPaymentBankCode').val(data.PaymentBankCode);
                $('#viewBankName').val(data.BankName);
                $('#viewAccountNumber').val(data.AccountNumber);
                $('#viewAccountHolderName').val(data.AccountHolderName);
                $('#viewIFSCode').val(data.IFSCode);
                $('#viewBranch').val(data.Branch);
                $('#viewRemarks').val(data.Remarks);
                $('#viewPaymentBankID').val(data.PaymentBankID);
                if(data.IsActive=="1"){
                $('#viewIsActive').val("Active");    
                }
                 if(data.IsActive=="0"){
                $('#viewIsActive').val("Deactivated");    
                }
                $('#viewRemarks').val(data.Remarks);
            });   
}  
  }).fail(function(){
        networkunavailable(); 
    });
}

var RemoveID="";
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show"); 
}
function Remove(ID) {
     $('#confirmation').modal("hide"); 
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=PaymentBanks&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                             + '<td>' + data.PaymentBankCode + '</td>'
                            + '<td>' + data.BankName + '</td>'
                            + '<td>' + data.AccountNumber + '</td>'
                            + '<td>' + data.AccountName + '</td>'
                            + '<td>' + ( (data.IsActive=="1") ? "<span class='badge bg-success'>Active</span>" : "<span class='badge bg-secondary'>Disabled</span>" ) + '</td>'
                             + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.PaymentBankID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.PaymentBankID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.PaymentModeID+'\')">Delete</a>'
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
            // if (($.fn.dataTable.isDataTable("#datatables-fixed-header"))) {
              //  $("#datatables-fixed-header").DataTable({
                 //   fixedHeader: true,
                 //   pageLength: 25
               // });
          //  }
        } else {
           $('#popupcontent').html( errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}
</script>