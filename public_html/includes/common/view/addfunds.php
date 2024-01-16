<div class="modal fade" id="fundform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Fund</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid p-0">
                <form id="frm_credit" name="frm_credit">
                 <input type="hidden" value="" name="CustomerID" id="creditCustomerID">
                 <input type="hidden" value="" name="PaymentType" id="PaymentType1">
                        <div class="row">
                            <div class="col-12 mb-1">
                                <label style="font-weight: bold;" class="form-label">Payment Type <span style='color:red'>*</span> </label>
                            </div> 
                            <div class="col-12 mb-1">
                                <input class="form-check-input" type="Radio" value="CASH" id="Cash" name="PaymentType2" onclick="showmethod('Cash')">&nbsp;
                                <label for="Cash">Cash</label>&nbsp;&nbsp;
                                <input class="form-check-input" type="Radio" value="BANK" id="Bank" name="PaymentType2" onclick="showmethod('Bank')">&nbsp;
                                <label for="Bank">Bank/UPI</label>&nbsp;&nbsp;
                                <input class="form-check-input" disabled="disabled" type="Radio" value="WALLET" id="Wallet" name="PaymentType2" onclick="showmethod('Wallet')">&nbsp;
                                <label for="Wallet">Wallet</label>&nbsp;&nbsp;
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
                                <div class="col-8" style="display:none" id="space"></div> 
                                    <div class="col-6" style="display:none" id="selectWallet">
                                    <label class="form-label">Wallet Balance <span style='color:red'>*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">₹</span>
                                            </div>
                                                <input type="text" style="text-align: right;" name="WalletBalance" id="WalletBalance" class="form-control" placeholder="0.00">
                                            </div>
                                        <span id="ErrWalletBalance" class="error_msg"></span>
                                    </div>
                                    <div class="col-4">
                                        <label class="form-label">Amount <span style='color:red' id="amountrequired">*</span>
                                            <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownamountrequired" data-bs-toggle="dropdown">
                                                <div class="dropdown-menu" aria-labelledby="dropdownamountrequired" style="padding:0px;">
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
                                                <input type="text" style="text-align: right;" name="Amount" id="Amount" class="form-control" placeholder="0.00">
                                            </div>
                                            <span id="ErrAmount" class="error_msg"></span>
                                        </div>
                                    <div class="col-sm-12" id="_PaymentRemarks">
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
                <button onclick="addFundDetailsSubmit()" type="button" class="btn btn-primary">Add Fund Details</button> 
             </div>
        </div>
    </div>
</div>

<script>
function clearpaymentform(){
    $('#Amount').val(""); 
    $('#TransactionID').val(""); 
    $("#PaymentModeID").val("0");
    $('#PaymentRemarks').val(""); 
    $('#Quantity500').val("");
    $('#Quantity200').val("");
    $('#Quantity100').val("");
    $('#Quantity50').val("");
    $('#Quantity20').val("");
    $('#Quantity10').val("");
    $('#Quantity5').val("");
    $('#QuantityCoins').val("");
    $('#Amount500').val("");
    $('#Amount200').val("");
    $('#Amount100').val("");
    $('#Amount50').val("");
    $('#Amount20').val("");
    $('#Amount10').val("");
    $('#Amount5').val("");
    $('#AmountCoins').val("");
    $('#WalletBalance').val("");
   
}

function showmethod(m) {    
    clearDiv(['PaymentType']); 
    clearpaymentform();
    if (m=="Cash") {
        $('#selectBank').hide();   
        $('#PaymentType1').val("CASH");   
        $('#amt').show();
        $('#space').show();
        $('#Cashdenomination').show();             
        $('#amountrequired').show();
        $('#_PaymentRemarks').hide();
        $('#selectWallet').hide();
        $('#dropdownamountrequired').hide();
        $('#Amount').attr("readonly","readonly");
    } 
    if (m=="Bank") {
        $('#selectWallet').hide(); 
        $('#Cashdenomination').hide();
        $('#space').show();
        $('#_PaymentRemarks').show();
        $('#PaymentType1').val("BANK"); 
        $('#selectBank').show();  
        $('#amt').show();                                       
        $('#amountrequired').show();
        $('#dropdownamountrequired').show();
        $('#Amount').removeAttr("readonly");
    }
    if (m=="Wallet") {
        $('#amt').show();  
        $('#space').hide();  
        $('#Cashdenomination').hide();
        $('#_PaymentRemarks').show();
        $('#PaymentType1').val("WALLET"); 
        $('#selectBank').hide();  
        $('#selectWallet').show();  
        $('#amountrequired').show();
        $('#dropdownamountrequired').show();
        $('#Amount').removeAttr("readonly");
        $.post(URL+ "webservice.php?action=getBalance&method=Wallet&CustomerID="+selectedCustomerID,"",function(data){
            closePopup();
             var obj = JSON.parse(data);
             if (obj.status=="success") {
                $('#WalletBalance').val(obj.balance);
             }  
        }).fail(function(){
            $('#WalletBalance').val("0.00");
        });
    }
}
                                           
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
    $('#frm_credit').trigger("reset");
    $('#listData').hide();
    $('#Transactionform').hide();  
    $('#PaymentType1').val("");   
    $('#fundform').modal("show");
       
    $('#Cashdenomination').hide();
    $('#creditCustomerID').val(selectedCustomerID);
    $('#amt').hide();
    $('#selectBank').hide();
    $('#Cash').prop('checked',false);
    $('#Bank').prop('checked',false);
    $('#Wallet').prop('checked',false);
    clearDiv(['PaymentModeID','PaymentRemarks','CustomerID','Amount','TransactionID','PaymentType']);
}

 

function addFundDetailsSubmit() {
    var html = "";
    if ($('#PaymentType1').val()=="CASH") {
        var html="";
        var cash_denomination='C500:'+$('#Quantity500').val()+',C200:'+$('#Quantity200').val()+',C100:'+$('#Quantity100').val()+',C50:'+$('#Quantity50').val()+',C20:'+$('#Quantity20').val()+',C10:'+$('#Quantity10').val()+',C5:'+$('#Quantity5').val()+',CCoins:'+$('#QuantityCoins').val();
        html += "<tr>"
                    + "<td style='border-bottom:1px solid #ccc;padding-bottom:3px;padding-left:10px'>CASH</td>"
                    + "<td style='text-align:right;border-bottom:1px solid #ccc;padding-bottom:3px'>"+parseFloat($('#Amount').val()).toFixed(2).toString()
                        +"<input type='hidden' name='cashpayment[]' value='"+$('#Amount').val()+"' class='receviedpayment'>"
                        +"<input type='hidden' name='cashdemoination[]' value='"+cash_denomination+"'>"
                    + "</td>"
                    + "<td style='text-align:center;border-bottom:1px solid #ccc;padding-bottom:3px'><a href='javascript:void(0)' onclick=\"$(this).closest('tr').remove();recalculate();\" style='outline:none'><img src='"+URL+"assets/icons/bin.png' style='width:12px'></a></td>"
             + "</tr>";
        $('#ContractPaymentDetails').html($('#ContractPaymentDetails').html()+html);
        $('#fundform').modal("hide");
        recalculate();
        
    }
    if ($('#PaymentType1').val()=="WALLET") {
        html += "<tr>"
                + "<td style='border-bottom:1px solid #ccc;padding-bottom:3px'>WALLET</td>"
                + "<td style='text-align:right;border-bottom:1px solid #ccc;padding-bottom:3px;padding-left:10px'>"+parseFloat($('#Amount').val()).toFixed(2).toString()
                    +"<input type='hidden' name='walletpayment[]' value='"+$('#Amount').val()+"' class='receviedpayment'>"
                    +"<input type='hidden' name='walletRemarks[]' value='"+$('#Amount').val()+"' >"
                + "</td>"
                + "<td style='text-align:center;border-bottom:1px solid #ccc;padding-bottom:3px'><a href='javascript:void(0)' onclick=\"$(this).closest('tr').remove();recalculate();\" style='outline:none'><img src='"+URL+"assets/icons/bin.png' style='width:12px'></a></td>"
             + "</tr>";
        $('#ContractPaymentDetails').html($('#ContractPaymentDetails').html()+html);
        $('#fundform').modal("hide");
        recalculate();;
        
    }
    if ($('#PaymentType1').val()=="BANK") {
        var html="";
        html += "<tr>"
                    + "<td style='border-bottom:1px solid #ccc;padding-bottom:3px;padding-left:10px'>BANK/"+$('#PaymentModeID  option:selected').text()+"/"+$('#TransactionID').val()+"</td>"
                    + "<td style='border-bottom:1px solid #ccc;padding-bottom:3px;text-align:right'>"+parseFloat($('#Amount').val()).toFixed(2).toString()
                        + "<input type='hidden' name='bankpayment[]' value='"+$('#Amount').val()+"' class='receviedpayment'>"
                        + "<input type='hidden' value="+$('#TransactionID').val()+" name='txnid[]'>"
                        + "<input type='hidden' value="+$('#PaymentRemarks').val()+" name='bankremarks[]'>"
                        + "<input type='hidden' value="+$('#PaymentModeID').val()+" name='paymentmodeid[]'>"
                        + "<input type='hidden' value="+$('#PaymentModeID  option:selected').text()+" name='paymentmodetext[]'>"
                    + "</td>"
                    + "<td style='text-align:center;border-bottom:1px solid #ccc;padding-bottom:3px'><a href='javascript:void(0)' onclick=\"$(this).closest('tr').remove();recalculate();\" style='outline:none'><img src='"+URL+"assets/icons/bin.png' style='width:12px'></a></td>"
             + "</tr>";
        $('#ContractPaymentDetails').html($('#ContractPaymentDetails').html()+html);
        $('#fundform').modal("hide");
        recalculate();;
        
    }
    
    
     $.post(URL+ "webservice.php?action=getBalance&method=Wallet&CustomerID="+selectedCustomerID,"",function(data){
            closePopup();
             var obj = JSON.parse(data);
             if (obj.status=="success") {
                 var b=parseFloat(recalculate());        
                 
                 var d=parseFloat($('#DueAmount').val());
                 
                 var w=parseFloat(obj.balance);
                 
                 
               // $('#WalletBalance').val(obj.balance);
                var html="";
                if (d>b) {                            
                    
                      if (w>=(d-b)) {
                          
                    html += "<tr>"
                + "<td style='border-bottom:1px solid #ccc;padding-bottom:3px;padding-left:10px'>WALLET (Available:"+w.toFixed(2).toString()+")</td>"
                + "<td style='text-align:right;border-bottom:1px solid #ccc;padding-bottom:3px;padding-left:10px'>"+(d-b).toFixed(2).toString()
                    +"<input type='hidden' name='walletpayments[]' value='"+(d-b)+"' class='receviedpayment'>"
                + "</td>"
                + "<td style='text-align:center;border-bottom:1px solid #ccc;padding-bottom:3px'><a href='javascript:void(0)' onclick=\"$(this).closest('tr').remove();recalculate();\" style='outline:none'><img src='"+URL+"assets/icons/bin.png' style='width:12px'></a></td>"
             + "</tr>";
        $('#ContractPaymentDetails').html($('#ContractPaymentDetails').html()+html);
                   //  }
                }
                
        
         recalculate(); 
             }  
             }  
        }).fail(function(){
            //$('#WalletBalance').val("0.00");
        });
}

function recalculate() {
    var totamt = 0; 
    $(".receviedpayment").each(function() {
        totamt += parseFloat($(this).val());
    });    
    $('#ReceivedAmt').html(totamt.toFixed(2));
    return totamt;
}

setTimeout(function(){
    addFundListpaymentmodes();
},2000);
</script>