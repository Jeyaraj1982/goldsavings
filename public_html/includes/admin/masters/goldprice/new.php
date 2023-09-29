<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Gold price</h1>
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Date <span style='color:red'>*</span></label>
                                <input type="date" name="SchemeCode" id="Scheme Code" class="form-control" placeholder="PRICE">
                                <span id="ErrCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                            </div> 
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(18kt) <span style='color:red'>*</span></label>
                                <input type="text"  name="price" id="price" class="form-control" placeholder="PRICE">
                                <span id="Errprice " class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(22kt)<span style='color:red'>*</span></label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="PRICE">
                                <span id="Errprice" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(24kt) <span style='color:red'>*</span></label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="PRICE">
                                <span id="Errprice" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                               <label class="form-label">Remarks</label>
                               <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                               <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12" style="text-align:right;">
                                <a href="<?php echo URL;?>dashboard.php?action=masters/employees/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                                <button onclick="ConfirmationToAdd()" type="button" class="btn btn-primary">Creat</button>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="confimation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Creat ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Yes, Continue</button>
      </div>
    </div>
  </div>
</div>
<script>
function ConfirmationToAdd() {
   $('#confimation').modal("show"); 
}
function addNew() {
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['EmployeeCode','EmployeeCategoryID','FatherName','EmployeeName','EmailID','MobileNumber','WhatsappNumber','AddressLine1','PinCode','ProfilePhoto','FatherName','StateNameID','DistrictNameID','AreaNameID','PancardNumber', 'AadhaarCardNumber','LoginUserName','LoginPassword','PinCode']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=Employees",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#EmployeeCode').val(obj.EmployeeCode);
                $('#popupcontent').html(successcontent(obj.message));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message)
                } else {
                    $('#failure_div').html(obj.message);
                }
                $('#process_popup').modal('hide');
             }
        }
    });
}

</script>