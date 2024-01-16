
<div class="container-fluid p-0">
     <h1 class="h3 mb-3">Payment</h1>
     <form id="frm_collect" name="frm_collect" method="post" enctype="multipart/form-data">
        <input type="text" value="" name="DueID" id="DueID">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                            <label class="form-label"><span id="_printlabel">Payment Date</span> <span style='color:red'>*</span></label>
                                <div class="input-group">            
                                    <input type="text" value="<?php echo date("Y-m-d");?>" name="PaymentDate" id="PaymentDate" class="form-control" placeholder="Payment Date">
                                <button onclick='fetchData()' type="button" class="btn btn-primary">Fetch</button>
                                </div>
                                <span id="ErrPaymentDate" class="error_msg"></span>
                            </div> 
                            <div class="col-sm-9">       
                            </div>
                            <div class="col-sm-4">
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
                            <!--<div class="col-sm-12" style="font-weight: bold;">
                                Payments
                            </div>
                            <div class="col-6 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="Cash" name="Cash" onclick="printCash()">&nbsp;
                               Cash
                                <div  style="display:none" id="typeCash">
                                      <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">₹</span>
                                                </div>
                                                <input type="text" style="text-align: right;" name="Cashamount" id="Cashamount" class="form-control" placeholder="Cash">
                                            </div>
                                    </div>
                                </div>
                            <script>
                                function printCash() {
                                    var checkBox = document.getElementById("Cash");
                                    var div = document.getElementById("typeCash");
                                    if (checkBox.checked == true){
                                        div.style.display = "block";
                                    } else {
                                        div.style.display = "none";
                                    }
                                } 
                            </script>
                            <div class="col-6 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="Wallet" name="Wallet" onclick="printWallet()">&nbsp;
                               Wallet
                                <div  style="display:none" id="typeWallet">
                                      <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">₹</span>
                                                </div>
                                                <input type="text" readonly="readonly" style="text-align: right;" name="Walletamount" id="Walletamount" class="form-control" placeholder="Wallet">
                                            </div>
                                    </div>
                                </div>
                            <script>
                                function printWallet() {
                                    var checkBox = document.getElementById("Wallet");
                                    var div = document.getElementById("typeWallet");
                                    if (checkBox.checked == true){
                                        div.style.display = "block";
                                    } else {
                                        div.style.display = "none";
                                    }
                                } 
                            </script>-->
                        </div>
                        <div class="row" id="paymentdata" style="display: none;" >
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Material Type</label>
                                <input type="text" name="viewMaterialType" id="viewMaterialType" class="form-control" placeholder="Material Type">
                                <span id="ErrviewMaterialType" class="error_msg"></span>
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
                            <!--<div class="col-sm-8 mb-3">
                                <label class="form-label">Payment Mode<span style='color:red'>*</span></label>
                                <select data-live-search="true" data-size="5" name="PaymentModeID" id="PaymentModeID" class="form-select mstateselect">
                                <option>loading...</option>
                                </select>
                                <span id="ErrPaymentModeID" class="error_msg"></span>
                            </div> -->
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
            <div class="col-12 col-xl-12 mt-2" id="PaymentDetails">
    <div class="col-12 mb-3" style="text-align:right;">
        <a href="javascript:void(0)" class="btn btn-primary btn-sm" onclick="addFundForm('<?php echo $data[0]['CustomerID'];?>')">Add fund</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table style="width:100%;">
                <thead>
                    <tr>
                        <td style="padding:5px 10px;font-weight:bold;background:#f1f1f1;">Payment Type</td>
                        <td style="padding:5px 10px;font-weight:bold;background:#f1f1f1;width:100px;text-align: right;padding-right:0px">Amount</td>
                        <td style="padding:5px 10px;font-weight:bold;background:#f1f1f1;width:20px;text-align: right;">&nbsp;</td>
                        
                    </tr>
                </thead>
                <tbody id="ContractPaymentDetails">
                </tbody>
            </table>
             <table style="width:100%;">
                  <tr>
                        <td style="text-align: right;">Received Amount</td>
                        <td style="width:100px;font-weight:bold;text-align: right;" id="ReceivedAmt"  >0.00</td>
                        <td style="padding:5px 10px;font-weight:bold;width:20px;text-align: right;"></td>
                    </tr>                                      
                
            </table>
            
        </div>
    </div>
</div>
        </form> 
        <div class="col-sm-12" style="text-align: right;">
            <button type="button" onclick="collectNew()" class="btn btn-primary">Pay</button>
        </div>
</div>
<?php include_once(SERVER_PATH."/includes/common/view/addfunds.php");?>
<script>
var selectedCustomerID="0";
var today="<?php echo date("Y-m-d");?>";
function paymentForm(DueID,DueNumber,DueAmount){
    clearDiv(['PaymentModeID','PaymentRemarks','PaymentDate']);
    $('#Dueconfirmation').modal("show");
    $('#paymentdata').hide() ;
    //$('#PaymentModeID').val("0");
    $('#PaymentRemarks').val("");
    $('#PaymentDate').val(today);
    $('#viewInstallment').val(DueNumber);
    $('#viewDueAmount').val(DueAmount);
    $('#DueID').val(DueID);
}

function collectNew() {
var param = $('#frm_collect').serialize();
clearDiv(['PaymentModeID','PaymentDate','PaymentRemarks']);
$.post(URL+"webservice.php?action=CollectDue&method=Contracts",param,function(data){
    var obj = JSON.parse(data); 
    if (obj.status=="success") {
        $('#Dueconfirmation').modal("hide");
         openPopup();
        $('#popupcontent').html(success_content(obj.message,'closePopup() ; getData')); 
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

function fetchData(){
    var param = $('#frm_collect').serialize();
    clearDiv(['PaymentModeID','PaymentRemarks','PaymentDate','paymentdata']);
    $.post(URL+"webservice.php?action=getPreCollectDueInformation&method=Contracts&ID="+$('#DueID').val(),param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
                $('#paymentdata').show() ;
               $('#viewGoldInGrams').val(obj.data.GoldInGrams);
               $('#viewGoldPrice').val(obj.data.GoldPrice);
               $('#viewMaterialType').val(obj.data.MaterialType);
               $('#DueID').val(obj.data.DueID);
               $('#PaymentModeID').val("");
               $('#PaymentRemarks').val("");
               
        } else {
                $('#paymentdata').hide() ;
               // $('#PaymentModeID').val("");
                $('#PaymentRemarks').val("");
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
        }
    });
}

function listpaymentmodes() {
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
            setTimeout(function(){
            },1500);
        } else {
            $('#popupcontent').html( errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}
setTimeout(function(){
    listpaymentmodes();
},2000);

</script>
                  

      