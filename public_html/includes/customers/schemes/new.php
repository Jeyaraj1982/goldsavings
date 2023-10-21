<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Joined Scheme</h1>
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body" style="padding-bottom:0px;">
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <h1 class="h4 mb-3">Scheme Information</h1>
                                </div>
                            <div class="col-sm-12 mb-2">
                                <div style="font-weight: bold;"> Scheme Name</div>
                                <div id="SchemeName"> Scheme Name</div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div style="font-weight: bold;" id="basic-addon3" style="width:200px">Wastage Discount <span>(%)</span></div>
                                <div id="WastageDiscount">Wastage Discount</div>
                            </div>
                            <div class="col-sm-12 mb-2">    
                                <div style="font-weight: bold;" id="basic-addon3" style="width:200px">Making Charge Discount <span>(%)</span></div>
                                <div id="MakingChargeDiscount">Making Charge Discount</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body" style="padding-bottom:0px;">
                        <div class="row">
                        <div class="col-sm-4 mb-3">
                                <label class="form-label">Due Amount <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">₹</span>
                                    </div>
                                    <input type="text" style="text-align: right;" name="DueAmount" id="DueAmount" class="form-control" placeholder="Due Amount"  onkeyup="getTotalAmount()">
                                </div>
                                <span id="ErrDueAmount" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Duration <span style='color:red'>*</span></label>
                                <div class="input-group">
                                <select data-live-search="true" data-size="2" name="InstallmentMode" id="InstallmentMode" class="form-select mselect" onchange="printLable()">
                                     <!-- <option value="0">Select Mode</option>
                                    <option  value="WEEKLY">WEEKLY</option> -->
                                    <option value="MONTHLY">MONTHLY</option>
                                </select>
                                <input type="text" style="text-align: right;" name="Installments" id="Installments" class="form-control" placeholder="Installments" data-masked="" data-inputmask="'mask':'99'"  onkeyup="getTotalAmount()">
                            </div>
                            <span id="ErrInstallments" class="error_msg"></span>
                            </div>
                            <script>
                                function printLable() {
                                    if ($('#InstallmentMode').val()=="WEEKLY"){
                                        $('#_printlabel').html("Weekly");    
                                    }
                                    if ($('#InstallmentMode').val()=="MONTHLY"){
                                        $('#_printlabel').html("Monthly");    
                                    }
                                    if ($('#InstallmentMode').val()=="0"){
                                        $('#_printlabel').html("");    
                                    }
                                }
                                </script>
                                <div class="col-sm-4 mb-3">
                                <label class="form-label">Total Amount <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">₹</span>
                                    </div>
                                    <input type="text" readonly="readonly" style="text-align: right; "name="Amount" id="Amount" class="form-control" placeholder="0.00">
                                </div>
                                <span id="ErrAmount" class="error_msg"></span>
                                <script>
                                function getTotalAmount() {
                                    var _dueamount=$('#DueAmount').val()==""?0:$('#DueAmount').val();
                                    var _intallment=$('#Installments').val()==""?0:$('#Installments').val();
                                     var amount= parseFloat(_dueamount);       
                                     var installments= parseFloat(_intallment); 
                                     var Amount= amount*installments;
                                     $('#Amount').val(Amount.toFixed(2));
                                }
                                </script>
                            </div>
                                <div class="col-sm-6 mb-3">
                                <div id="Gold_benefits">
                                    <label class="form-label"><span id="_printChange"></span> Material Type <span style='color:red'>*</span></label>
                                    <select class="form-select" name="MaterialType" id="MaterialType">
                                        <option value="0">Select Material Type </option>
                                        <option value="GOLD_18">GOLD_18</option>
                                        <option value="GOLD_22">GOLD_22</option>
                                        <option value="GOLD_24">GOLD_24</option>
                                    </select>
                                    <span id="ErrMaterialType" class="error_msg"></span> 
                                </div>
                            </div>
                            <div class="col-sm-6  mb-3">
                                <label class="form-label">Payment Mode <span style='color:red'>*</span></label>
                                <select data-live-search="true" data-size="5" name="PaymentModeID" id="PaymentModeID" class="form-select mstateselect">
                                    <option>loading...</option>
                                </select>
                                <span id="ErrPaymentModeID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Payment Remarks <span style='color:red'>*</span></label>
                                <input type="text" name="PaymentRemarks" id="PaymentRemarks" class="form-control" placeholder="Payment Remarks">
                                <span id="ErrPaymentRemarks" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=schemes/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <button  type="button" onclick="Confirmationtoadd()" class="btn btn-primary">Joined Scheme</button>    
            </div>
        </div>                
    </form>
</div>

<div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to create Contract ? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Yes, Create</button>
      </div>
    </div>
  </div>
</div>
            <style>
              
              .autocomplete {
  position: relative;
  display: inline-block;
}
.autocomplete-items {
  /*position: absolute;*
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
  margin:0px 10px;
  
  border: 1px solid #ccc;border-top: 0px;
}

.autocomplete-items div {
  padding: 5px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
              </style>              
                           
  
  

<script>  
                                                       
function Confirmationtoadd(){
   $('#confirmation').modal("show");  
 }
 var CreatedContractID=0;
function addNew() {
     $('#confirmation').modal("hide");
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['CustomerName','MobileNumber','ReferralName','Amount','Installments','InstallmentMode','InstallmentAmount','MaterialType','ModeOfBenifits','Remarks','IsActive']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=Contracts&Customer="+selectedCustomerID+"&Scheme="+selectedSchemeID,
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                CreatedContractID = obj.ContractID;
                $('#popupcontent').html(success_content(obj.message,'closePopup(); opencontractview'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message)
                } else {
                    $('#popupcontent').html(errorcontent(obj.message));
                }
                $('#process_popup').modal('hide');
             }
        }
    });
}
setTimeout("listpaymentmodes()",2000);

/*function opencontractview()  {
  location.href=URL +'dashboard.php?action=contracts/view&view='+CreatedContractID;  
}

function CreateContract() {
    if (selectedCustomerID==0) {
        $('#ErrCustomerID').html("please select customer");
        return;
    }
    if (selectedSchemeID==0) {
        $('#ErrSchemeID').html("please select scheme");
        return;
    }
    openPopup();
    $.post(URL+"webservice.php?action=addNew&method=Contracts&Customer="+selectedCustomerID+"&Service="+selectedSchemeID,"",function(data){
        
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            //$('#frm_create').trigger("reset");
            //if (obj.BankNameCode.length>3) {
                //$('#BankNameCode').val(obj.BankNameCode);
            //}                   
            $('#popupcontent').html(successcontent(obj.message,'dashboard.php?action=contracts/edit&edit='+obj.id));
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
        }
        
    });
}    */

function listpaymentmodes() {
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
            alert(obj.message);
        }
    });
}

function getData(){
    openPopup();
    $.post(URL+ "webservice.php?action=getData&method=schemes&contract=<?php echo $_GET['view'];?>","",function(data){
        var  obj = JSON.parse(data);
        if (obj.status=="success") {
            var data = obj.data;
            var html="";
            $('#SchemeName').html(data.SchemeName);
            $('#WastageDiscount').html(data.CustomerName);
            $('#MobileNumber').html(data.WastageDiscount);
            $('#MakingChargeDiscount').html(data.MakingChargeDiscount);
$('#tbl_content').html(html);
               closePopup();
        }
  });
}   

</script>  
 <!--
 https://bootstrap-autocomplete.readthedocs.io/en/latest/
 https://www.w3schools.com/howto/howto_js_autocomplete.asp
  -->