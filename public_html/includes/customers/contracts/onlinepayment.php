<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Online Payment</h1>
     <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <input type="hidden" name="DueID">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Installment Number</label>
                                <input type="text" style="text-align: right;" name="Installment" id="viewInstallment" class="form-control" placeholder="Installment">
                                <span id="ErrInstallment" class="error_msg"></span>
                            </div>
                             <div class="col-sm-4 mb-3">
                                <label class="form-label">Due Amount </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">₹</span>
                                    </div>
                                    <input type="text" style="text-align: right;" name="DueAmount" id="viewDueAmount" class="form-control" placeholder="Due Amount">
                                </div>
                                <span id="ErrDueAmount" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Mode Of Benifits</label>
                                <input type="text" name="ModeOfBenifits" id="viewModeOfBenifits" class="form-control" placeholder="ModeOfBenefits">
                                <span id="ErrModeOfBenefits" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3" >
                                <label class="form-label">Gold Price </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">₹</span>
                                    </div>
                                    <input type="text" style="text-align: right;" name="GoldPrice" id="viewGoldPrice" class="form-control" placeholder="Gold Price">
                                </div>
                                <span id="ErrGoldPrice" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Gold in Grams </label>
                                <input type="text" style="text-align: right;" name="GoldInGrams" id="viewGoldInGrams" readonly="readonly" class="form-control" placeholder="GoldInGrams">
                            </div>                              
                            <div class="col-sm-8 mb-3">
                                <label class="form-label">Payment Mode<span style='color:red'>*</span></label>
                                <select data-live-search="true" data-size="5" name="PaymentModeID" id="PaymentModeID" class="form-select mstateselect">
                                <option>loading...</option>
                                </select>
                                <span id="ErrPaymentModeID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Payment Remarks</label>
                                <input type="text" name="PaymentRemarks" id="PaymentRemarks" class="form-control" placeholder="Payment Remarks">
                                <span id="ErrPaymentRemarks" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </form>
<div class="col-sm-12" style="text-align:right;">
    <a href="<?php echo URL;?>dashboard.php?action" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
    <button onclick="confirmationtoadd()" type="button" class="btn btn-primary">Pay </button>    
</div>
</div>
                    
                    

<div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Create ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="getData()" class="btn btn-primary">Yes, Create</button>
      </div>
    </div>
  </div>
</div>



<script>

function confirmationtoadd(){
  $('#confirmation').modal("show");   
}     
function getData() {
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=getPreCollectDueInformation&method=Contracts&ID=<?php echo $_GET['due']; ?>",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#viewInstallment').val(obj.data.Installment);
                $('#viewDueAmount').val(obj.data.DueAmount);
                $('#viewGoldInGrams').val(obj.data.GoldInGrams);
               $('#viewGoldPrice').val(obj.data.GoldPrice);
               $('#viewModeOfBenifits').val(obj.data.ModeOfBenifits +' / '+obj.data.MaterialType);
               $('#DueID').val(obj.data.DueID);
               $('#PaymentModeID').val("0");
               $('#PaymentRemarks').val("");
                $('#PaymentModeID').val(obj.PaymentModeID);
                $('#popupcontent').html(success_content(obj.message,'closePopup'));
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
setTimeout (function (){
    getData(); 
},1000)  ;

</script>
         