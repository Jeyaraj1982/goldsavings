<div class="modal fade" id="fundform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Fund</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid p-0">
                <form id="frm_credit" name="frm_credit" id="frm_credit">
                 <input type="hidden" value="" name="CustomerID" id="creditCustomerID">
                 <input type="hidden" value="" name="PaymentType" id="PaymentType1">
                        <div class="row">
                        <div class="col-12 mb-1">
                             <label style="font-weight: bold;" class="form-label">Payment Type <span style='color:red'>*</span> </label>
                            </div> 
                             <div class="col-12 mb-1">
                            <input class="form-check-input" type="Radio" value="CASH" id="Cash" name="PaymentType2" onclick="showmethod('Cash')">&nbsp;
                           Cash  &nbsp;&nbsp;
                             <input class="form-check-input" type="Radio" value="BANK" id="Bank" name="PaymentType2" onclick="showmethod('Bank')">&nbsp;
                                    Bank/UPI
                            </div>
                            <div class="col-12">
                                <span id="ErrPaymentType" class="error_msg"></span>
                            </div>
                                 <div class="col-sm-12"  style="display:none" id="selectBank">
                                    <div class="row">
                                    <div class="col-6">
                                     <label class="form-label">Payment Mode <span style='color:red'>*</span></label>
                                        <div class="input-group">
                                          <select data-live-search="true" data-size="5" name="PaymentModeID" id="PaymentModeID" class="form-select mstateselect">
                                            <option value="0">All Payment modes</option>
                                        </select>
                                      </div>
                                        <span id="ErrPaymentModeID" class="error_msg"></span>
                                         </div>
                                        <div class="col-6 mb-2">
                                         <label class="form-label">Bank Transaction ID <span style='color:red'>*</span>
                                          <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton2" data-bs-toggle="dropdown">
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="padding:0px;">
                                                <div class="myheader">Bank Transaction ID</div>
                                                <div class="mycontainer">
                                                    1. Allow only alphanumeric characters<br>
                                                    2. Minimum 8 characters require<br>
                                                    3. Maximum 20 characters require<br>
                                                    4. Not allow cut,copy,paste
                                                </div>
                                            </div>
                                         </label>
                                        <input type="text" name="TransactionID" id="TransactionID" class="form-control" placeholder="Bank Transaction ID">
                                        <span id="ErrTransactionID" class="error_msg"></span>
                                        </div>
                                     </div>   
                                     
                                </div>
                                <script>
                                    function showmethod(m) {    
                                       clearDiv(['PaymentType']); 
                                        if (m=="Cash"){
                                            $('#selectBank').hide();   
                                            $('#PaymentType1').val("CASH");   
                                            $('#amt').show();
                                            $('#Cashdenomination').show();             
                                            $('#amountrequired').show();
                                            $('#dropdownMenuButton1').hide();
                                            $('#Amount').attr("readonly","readonly");
                                        } 
                                        if (m=="Bank")  {
                                            $('#Cashdenomination').hide();
                                            $('#PaymentType1').val("BANK"); 
                                            $('#selectBank').show();  
                                            $('#amt').show();  
                                            $('#amountrequired').show();
                                            $('#dropdownMenuButton1').show();
                                            $('#Amount').removeAttr("readonly");
                                       
                                          
                                        }
                                        
                                    } 
                                </script>
                                  <div class="col-12 mb-2"  style="display:none" id="Cashdenomination"> 
                                      <table align="right">
                                        <tr>
                                            <td>
                                               <input type="text" value="500" style="width: 55px; text-align: right; padding-right:10px;" disabled="disabled">
                                            </td>
                                            <td style="width: 25px; text-align: center;">
                                                X
                                            </td>
                                            <td>
                                                 <input type="text" id="Quantity500" style="width: 50px; text-align: right; padding-right:10px;" maxlength="3" placeholder="0" onkeyup="getTotal()">
                                            </td>
                                            <td  style="width: 25px; text-align: center;">
                                             =
                                            </td>
                                            <td>
                                              <input type="text" id="Amount500" style="width: 100px; text-align: right; padding-right:10px;" placeholder="0.00" disabled="disabled">
                                            </td>
                                        </tr>
                                       
                                        <tr>
                                            <td>
                                               <input type="text" value="200" style="width: 55px; text-align: right; padding-right:10px;" placeholder="0" disabled="disabled">
                                            </td>
                                            <td style="width: 25px; text-align: center;">
                                                X
                                            </td>
                                            <td>
                                                 <input type="text" id="Quantity200" style="width: 50px; text-align: right; padding-right:10px;" placeholder="0" maxlength="3" onkeyup="getTotal()">
                                            </td>
                                            <td  style="width: 25px; text-align: center;">
                                             =
                                            </td>
                                            <td>
                                              <input type="text" id="Amount200" style="width: 100px; text-align: right; padding-right:10px;" placeholder="0.00" disabled="disabled">
                                            </td>
                                        </tr>
                                       <tr>
                                            <td>
                                               <input type="text" value="100" style="width: 55px; text-align: right; padding-right:10px;" disabled="disabled">
                                            </td>
                                            <td style="width: 25px; text-align: center;">
                                                X
                                            </td>
                                            <td>
                                                 <input type="text" id="Quantity100" style="width: 50px; text-align: right; padding-right:10px;" placeholder="0" maxlength="3" onkeyup="getTotal()">
                                            </td>
                                            <td  style="width: 25px; text-align: center;">
                                             =
                                            </td>
                                            <td>
                                              <input type="text" id="Amount100" style="width: 100px; text-align: right; padding-right:10px;" placeholder="0.00" disabled="disabled">
                                            </td>
                                        </tr>
                                       <tr>
                                            <td>
                                               <input type="text" value="50" style="width: 55px; text-align: right; padding-right:10px;" disabled="disabled">
                                            </td>
                                            <td style="width: 25px; text-align: center;">
                                                X
                                            </td>
                                            <td>
                                                 <input type="text" id="Quantity50" style="width: 50px; text-align: right; padding-right:10px;" placeholder="0" maxlength="3" onkeyup="getTotal()">
                                            </td>
                                            <td  style="width: 25px; text-align: center;">
                                             =
                                            </td>
                                            <td>
                                              <input type="text" id="Amount50" style="width: 100px; text-align: right; padding-right:10px;" placeholder="0.00" disabled="disabled">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <input type="text" value="20" style="width: 55px; text-align: right; padding-right:10px;" disabled="disabled">
                                            </td>
                                            <td style="width: 25px; text-align: center;">
                                                X
                                            </td>
                                            <td>
                                                 <input type="text" id="Quantity20" style="width: 50px; text-align: right; padding-right:10px;" placeholder="0" maxlength="3" onkeyup="getTotal()">
                                            </td>
                                            <td  style="width: 25px; text-align: center;">
                                             =
                                            </td>
                                            <td>
                                              <input type="text" id="Amount20" style="width: 100px; text-align: right; padding-right:10px;" placeholder="0.00" disabled="disabled">
                                            </td>
                                        </tr>
                                       <tr>
                                            <td>
                                               <input type="text" value="10" style="width: 55px; text-align: right; padding-right:10px;" disabled="disabled">
                                            </td>
                                            <td style="width: 25px; text-align: center;">
                                                X
                                            </td>
                                            <td>
                                                 <input type="text" id="Quantity10" style="width: 50px; text-align: right; padding-right:10px;" placeholder="0" maxlength="3" onkeyup="getTotal()">
                                            </td>
                                            <td  style="width: 25px; text-align: center;">
                                             =
                                            </td>
                                            <td>
                                              <input type="text" id="Amount10" style="width: 100px; text-align: right; padding-right:10px;" placeholder="0.00" disabled="disabled">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                               <input type="text" value="5" style="width: 55px; text-align: right; padding-right:10px;" disabled="disabled">
                                            </td>
                                            <td style="width: 25px; text-align: center;">
                                                X
                                            </td>
                                            <td>
                                                 <input type="text" id="Quantity5" style="width: 50px; text-align: right; padding-right:10px;" placeholder="0" maxlength="3" onkeyup="getTotal()">
                                            </td>
                                            <td  style="width: 25px; text-align: center;">
                                             =
                                            </td>
                                            <td>
                                              <input type="text" id="Amount5" style="width: 100px; text-align: right; padding-right:10px;" placeholder="0.00" disabled="disabled">
                                            </td>
                                        </tr>
                                       <tr>
                                            <td>
                                               <input type="text" value="Coins" style="width: 55px; text-align: right; padding-right:10px;" disabled="disabled">
                                            </td>
                                            <td style="width: 25px; text-align: center;">
                                                &nbsp;
                                            </td>
                                            <td>
                                                 <input type="text" id="QuantityCoins" style="width: 50px; text-align: right; padding-right:10px;" placeholder="0" maxlength="3" onkeyup="getTotal()">
                                            </td>
                                            <td  style="width: 25px; text-align: center;">
                                             =
                                            </td>
                                            <td>
                                              <input type="text" id="AmountCoins" style="width: 100px; text-align: right; padding-right:10px;" placeholder="0.00" disabled="disabled">
                                            </td>
                                        </tr>
                                      </table>
                                      <script>
                                            function getTotal() {
                                                /* Rs 500*/
                                                var quantity500 = parseFloat($('#Quantity500').val()== "" ? 0 : $('#Quantity500').val());
                                                var Amount500 = 500*quantity500;
                                                $('#Amount500').val(Amount500.toFixed(2));
                                                /* Rs 200*/
                                                var quantity200 = parseFloat($('#Quantity200').val()== "" ? 0 : $('#Quantity200').val());
                                                var Amount200 = 200*quantity200;
                                                $('#Amount200').val(Amount200.toFixed(2));
                                                /* Rs 100*/
                                                var quantity100 = parseFloat($('#Quantity100').val()== "" ? 0 : $('#Quantity100').val());
                                                var Amount100 = 100*quantity100;
                                                $('#Amount100').val(Amount100.toFixed(2));
                                                /* Rs 50*/
                                                var quantity50 = parseFloat($('#Quantity50').val()== "" ? 0 : $('#Quantity50').val());
                                                var Amount50 = 50*quantity50;
                                                $('#Amount50').val(Amount50.toFixed(2));
                                                /* Rs 20*/
                                                var quantity20 = parseFloat($('#Quantity20').val()== "" ? 0 : $('#Quantity20').val());
                                                var Amount20 = 20*quantity20;
                                                $('#Amount20').val(Amount20.toFixed(2));
                                                
                                                /* Rs 10*/
                                                var quantity10 = parseFloat($('#Quantity10').val()== "" ? 0 : $('#Quantity10').val());
                                                var Amount10 = 10*quantity10;
                                                $('#Amount10').val(Amount10.toFixed(2));
                                                /* Rs 5*/
                                                var quantity5 = parseFloat($('#Quantity5').val()== "" ? 0 : $('#Quantity5').val());
                                                var Amount5 = 5*quantity5;
                                                $('#Amount5').val(Amount5.toFixed(2));
                                                
                                                /* Coins*/
                                                var AmountCoins = parseFloat($('#QuantityCoins').val()== "" ? 0 : $('#QuantityCoins').val());
                                                $('#AmountCoins').val(AmountCoins.toFixed(2));
                                                var total=Amount500+Amount200+Amount100+Amount50+Amount20+Amount10+Amount5+AmountCoins;
                                                $('#Amount').val(total.toFixed(2));
                                            }
                                        </script>
                                  </div>
                            <div class="col-12"  style="display:none" id="amt">
                            <div class="row">
                           
                                                                                                               
                            <div class="col-8"></div>
                            <div class="col-4">
                                    <label class="form-label">Amount <span style='color:red' id="amountrequired">*</span>
                            <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Amount</div>
                                    <div class="mycontainer">
                                        1. Allow only numbers<br>
                                        2. Minimum 3 digits require<br>
                                        2. Maximum 6 digits require<br>
                                        3. Not allow cut,copy,paste
                                    </div>
                                </div>
                            </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">₹</span>
                                </div>
                                <input type="text" style="text-align: right;" name="Amount" id="Amount" class="form-control" placeholder="0">
                            </div>
                            <span id="ErrAmount" class="error_msg"></span>
                            </div>
                              <div class="col-sm-12">
                                    <label class="form-label">Payment Remarks <span style='color:red'>*</span>
                                    <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton2" data-bs-toggle="dropdown">
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2" style="padding:0px;">
                                        <div class="myheader">PaymentRemarks</div>
                                        <div class="mycontainer">
                                            1. Allow all characters, not allow <span style='color:red'>\'!~$"</span><br>
                                            2. Maximum 250 characters require<br>
                                            3. Not allow cut,copy,paste
                                        </div>
                                    </div>
                                    </label>
                                    <input type="text" value="" name="PaymentRemarks" id="PaymentRemarks" class="form-control" placeholder="Payment Remarks" maxlength="250">
                                     <span id="ErrPaymentRemarks" class="error_msg"></span>
                                </div>
                                
                            
                            </div>
                           
                        </div>
                            
                        </div>
                 </form>
                </div>
            </div>
             <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button onclick="addFundSubmit()" type="button" class="btn btn-primary">Submit</button> 
             </div>
        </div>
    </div>
</div>
<script>
function addFundListpaymentmodes() {
     openPopup();
    $.post(URL+ "webservice.php?action=listAllActive&method=PaymentModes","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select Payment Mode</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.PaymentModeID+'">'+data.PaymentMode+'</option>';
            });   
            $('#PaymentModeID').html(html);
             $("#PaymentModeID").append($("#PaymentModeID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $("#PaymentModeID").val("0");
            closePopup();
            setTimeout(function(){
            },1500);
        } else {
            $('#popupcontent').html(errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}

   
function addFundForm(customerID) {
$('#listData').hide();
$('#Transactionform').hide();  
$('#PaymentType1').val("");   
$('#fundform').modal("show"); 
$('#Cashdenomination').hide();
$('#creditCustomerID').val(customerID);
$('#amt').hide();
$('#selectBank').hide();
$('#Cash').prop('checked',false);
$('#Bank').prop('checked',false);
clearDiv(['PaymentModeID','PaymentRemarks','CustomerID','Amount','TransactionID','PaymentType']);
   
} 
function addFundSubmit() {
    clearDiv(['PaymentModeID','PaymentRemarks','CustomerID','Amount','TransactionID']);
     var param = $('#frm_credit').serialize();
    $.post(URL+"webservice.php?action=creditToCustomer&method=Wallet",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#fundform').modal("hide");
             openPopup();
             $('#frm_credit').trigger("reset");
             $('#Bank').val("");
            $('#popupcontent').html(success_content(obj.message,'closePopup')); 
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message);
               // $('#process_popup').modal('hide');
            } else {
                 $('#popupcontent').html( errorcontent(obj.message));
            }
            
        }
    }).fail(function(){
        networkunavailable(); 
    });
}

setTimeout(function(){
    addFundListpaymentmodes();
},2000);
</script>