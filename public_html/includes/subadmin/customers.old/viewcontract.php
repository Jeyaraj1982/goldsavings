<div class="container-fluid p-0">
    <div class="row">
        <div class="col-sm-6  mb-2">
            <h1 class="h3" style="font-weight: bold;">Contracts</h1>
        </div>
        <div class="col-sm-6  mb-2" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=contracts/list" class="btn btn-outline-primary btn-sm">Back</a> &nbsp;
            <a href="<?php echo URL;?>dashboard.php?action=" class="btn btn-primary btn-sm">Download</a>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div id="ContractCode">CONTRACT_CODE</div>        
                            <div id="EntryDate">ENTRY DATE</div>
                        </div>
                        <div class="col-sm-6" style="text-align:right;">
                            <div id="CreatedByName" style="font-weight: bold;">CREATED BY NAME</div>
                            <div id="CreatedBy">CREATED BY</div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-6">
            <div class="row"> 
                <div class="col-sm-9 col-xl-9 mb-2">      
                    <h6 style="margin-bottom: 0px;font-size: 16px;font-weight: bold;">Customer Information</h6>
                </div>
                <div class="col-sm-3 col-xl-9 mb-2" style="text-align: right;">
                    <a style="color:#888;text-decoration:none;" id="viewscheme" href="" title="View Customer Information"><i class="align-middle" data-feather="external-link"></i></a>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div style="font-weight: bold;">Customer ID</div>
                            <div id="CustomerCode"></div>
                            <div style="font-weight: bold;">Customer Name</div>
                            <div id="CustomerName"></div>
                            <div style="font-weight: bold;">Mobile Number</div>
                            <span> +91 </span> <span id="MobileNumber"></span>
                            <div style="font-weight: bold;">EmailID</div>
                            <div id="EmailID"></div>
                            <div style="font-weight: bold;">Created On</div>
                            <div id="CustomerCreatedOn"></div>
                            <div style="font-weight: bold;">Status</div>
                            <div id="IsActive"></div>
                            <div style="font-weight: bold;">Address</div>
                            <div id="AddressLine3"></div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="col-6 col-xl-6">       
            <div class="row">
                <div class="col-sm-9 col-xl-9 mb-2">      
                    <h6 style="margin-bottom: 0px;font-size: 16px;font-weight: bold;">Scheme Information</h6>
                </div> 
                <div class="col-sm-3 col-xl-3 mb-2" style="text-align: right;">
                    <a style="color:#888;text-decoration:none;" id="viewscheme" href="" title="View Scheme Information"><i class="align-middle" data-feather="external-link"></i></a>
                </div>
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" >
                                <div style="font-weight: bold;"> Scheme Code</div>
                                <div id="SchemeCode"></div>
                                <div style="font-weight: bold;"> Scheme Name</div>
                                <div id="SchemeName"></div>
                                <div style="font-weight: bold;"> Mode Of Benifits</div>
                                <div id="ModeOfBenifits"></div>
                                <div id="gold" style="display: none;">
                                <div style="font-weight: bold;">Material Type</div>
                                <div id="MaterialType"></div>
                                <div id="amount" style="display: none;">
                                    <div style="font-weight: bold;">Amount <span>(₹)</span></div>
                                    <div id="Amount"></div>
                                </div>
                                <div style="font-weight: bold;">Installment</div>
                                <div id="Installments"></div>
                                <div style="font-weight: bold;">Installment Amount <span>(₹)</span></div>
                                <div id="InstallmentAmount"></div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
        </div>
        <div class="col-sm-12  mb-2">
            <h6 style="margin-bottom: 0px;font-size: 16px;font-weight: bold;">Payment/Due Information</h6>
        </div>
        <div class="col-sm-12  mb-2">
            <div class="card">
                <div class="card-body" style="padding-top:10px">
                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th scope="col">Due<br>Number</th>
                                <th scope="col">Due<br>Date</th> 
                                <th scope="col" style="text-align:right">Due<br>Amount</th>
                                <th scope="col" style="text-align:right">Gold<br>In-Grams</th>
                                <th scope="col">Gold Price<br>On Date</th>
                                <th scope="col">Receipt<br>Number</th>
                                <th scope="col">Payment<br>Date</th>
                                <th style="width:50px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="9" style="text-align: center;background:#fff !important">Loading  ...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    <div class="row">
        <div class="col-12" id="ContractAdditionalInformation">
        </div>
    </div>
 <div class="modal fade" id="Colseconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid p-0">
                <form id="frm_close" name="frm_close" method="post" enctype="multipart/form-data">
                <input type="hidden" value="" name="ContractID" id="ContractID">
            <div class="row">
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Mode of Benifits </label>
                        <input type="text" name="ModeOfBenifits" id="closeModeOfBenifits" readonly="readonly" class="form-control" placeholder="Mode of Benifits">
                    </div>  
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Scheme Name </label>
                        <input type="text" name="SchemeName" id="closeSchemeName" readonly="readonly" class="form-control" placeholder="Scheme Name">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3" style="width:180px">Making Charge Discount</span>
                            <input type="text" style="text-align: right;" readonly="readonly" name="MakingChargeDiscount" id="closeMakingChargeDiscount" class="form-control">
                            <span class="input-group-text" id="basic-addon3">%</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon3" style="width:180px">Wastage Discount</span>
                            <input type="text" style="text-align: right;" readonly="readonly" name="WastageDiscount" id="closeWastageDiscount" class="form-control">
                            <span class="input-group-text" id="basic-addon3">%</span>
                        </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Total Paid Amount </label>
                        <input type="text" style="text-align: right;" name="TotalPaidAmount" id="closeTotalPaidAmount" readonly="readonly" class="form-control" placeholder="Total Paid Amount">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Total Gold In Grams </label>
                        <input type="text" style="text-align: right;" name="TotalGoldInGrams" id="closeTotalGoldInGrams" readonly="readonly" class="form-control" placeholder="Total Gold In Grams">
                    </div>
                    <div class="col-sm-12 mb-3">
                        <label class="form-label">Remarks</label>
                        <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                        <span id="ErrRemarks" class="error_msg"></span>
                    </div>
                 </div>
            </form>
        </div>
    </div>
     <div class="modal-footer">
         <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
         <button type="button" onclick="closeContract()" class="btn btn-danger">Yes, Continue</button>
     </div>
     </div>
    </div>
</div>   
                  
<div class="modal fade" id="Dueconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Payment Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid p-0">
                <form id="frm_collect" name="frm_collect" method="post" enctype="multipart/form-data">
                <input type="hidden" value="" name="DueID" id="DueID">
        <div class="row">
         <div class="col-sm-6 mb-3">
            <label class="form-label"><span id="_printlabel">Payment Date</span> <span style='color:red'>*</span></label>
            <div class="input-group">
                <input type="date" value="<?php echo date("Y-m-d");?>" name="PaymentDate" id="PaymentDate" class="form-control" placeholder="Payment Date">
            <button onclick='fetchData()' type="button" class="btn btn-primary">Fetch</button>
            </div>
            <span id="ErrPaymentDate" class="error_msg"></span>
        </div> 
            <div class="col-sm-9">
            </div>
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
            </div>
            <div class="row" id="paymentdata" style="display: none;" >
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
    </form>
  </div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="collectNew()" class="btn btn-primary">Pay</button>
      </div>
    </div>
  </div>
</div>

<script>
 var ContractID="<?php echo $_GET['view'];?>";
function getData(){
    openPopup();
    $.post(URL+ "webservice.php?action=getData&method=Contracts&contract=<?php echo $_GET['view'];?>","",function(data){
        var  obj = JSON.parse(data);
        if (obj.status=="success") {
            var CustomerData = obj.data.CustomerData;
            var SchemeData = obj.data.SchemeData;
            var DueData = obj.data.DueData;
            var ContractData = obj.data.ContractData;
            var html="";
            $('#viewcustomer'). attr ("href","<?php echo URL;?>dashboard.php?action=customers/view&customer="+CustomerData.CustomerID);
            $('#viewscheme'). attr ("href","<?php echo URL;?>dashboard.php?action=schemes/view&edit="+SchemeData.SchemeID);
            $('#CustomerCode').html(CustomerData.CustomerCode);
            $('#CustomerName').html(CustomerData.CustomerName);
            $('#MobileNumber').html(CustomerData.MobileNumber);
            $('#EmailID').html(CustomerData.EmailID);
            $('#CustomerCreatedOn').html(CustomerData.CreatedOn);
                if(CustomerData.IsActive=="1"){
                    $('#IsActive').html("Active");    
                }
                 if(CustomerData.IsActive=="0"){
                 $('#IsActive').html("Deactivated");    
                }
            $('#AddressLine3').html(CustomerData.AreaName +', '+CustomerData.DistrictName +','+CustomerData.StateName +', PinCode: ' +CustomerData.PinCode );
            $('#SchemeCode').html(SchemeData.SchemeCode);
            $('#SchemeName').html(SchemeData.SchemeName);
            $('#ModeOfBenifits').html(SchemeData.ModeOfBenifits);
                if (SchemeData.ModeOfBenifits == "AMOUNT") {
                    $('#Amount').html(SchemeData.Amount);
                    $('#amount').show();
                } else {
                    $('#MaterialType').html(SchemeData.MaterialType);  
                    $('#gold').show();  
                }
            $('#Amount').html(SchemeData.Amount);
            $('#Installments').html(SchemeData.Installments + ' / '+SchemeData.InstallmentMode);
            $('#InstallmentAmount').html(SchemeData.InstallmentAmount);
           // $('#InstallmentMode').html(SchemeData.InstallmentMode);
            $('#ContractCode').html(ContractData.ContractCode);
            $('#EntryDate').html(ContractData.EntryDate);
            $('#CreatedBy').html(ContractData.CreatedBy);
            $('#CreatedByName').html(ContractData.CreatedByName);
             if(ContractData.IsActive=="1"){
                    $('#ContractIsActive').html("Active");    
                }
                 if(ContractData.IsActive=="0"){
                 $('#ContractIsActive').html("Deactivated");    
                } 
                if(ContractData.VoucherID=="0"){
                 $('#ContractAdditionalInformation').html('<div style="background: #ffd6d6;padding: 25px;text-align: center;"> <button type="button" onclick="closeContractForm()" class="btn btn-danger">Close Contract</button></div>');    
                } else{
                 $('#ContractAdditionalInformation').html('<a href="'+URL+'dashboard.php?action=contracts/voucher&number='+ContractData.VoucherNumber+'" class="btn btn-outline-primary btn-sm">View Voucher</a>');   
                }
 
            $.each(DueData, function (index, duedata) {
                html += '<tr>'
                           + '<td>' + duedata.DueNumber + '</td>'
                           + '<td>' + duedata.DueDate + '</td>'
                           + '<td style="text-align:right">' + duedata.DueAmount + '</td>'
                           + '<td style="text-align:right">' + (duedata.GoldInGram!="0" ? duedata.GoldInGram : '')+ '</td>'
                           + '<td>' + (duedata.GoldPriceOnDate!=null ? duedata.GoldPrice +'<br>'+ duedata.GoldPriceOnDate : '')+ '</td>'
                           + '<td>' + (duedata.ReceiptNumber!="0" ? duedata.ReceiptNumber : '')+ '</td>'
                           + '<td>' + (duedata.PaymentDate!=null ? duedata.PaymentDate : '')+ '</td>'
                           + '<td style="text-align:right">';
                               if  (duedata.ReceiptID!="0") {
                                   html += '<a href="'+URL+'dashboard.php?action=receipts/receipt&number='+duedata.ReceiptNumber+'" class="btn btn-outline-primary btn-sm">View</a>';
                               } else {
                                   if  (duedata.IsShowPayButton=="1") {
                                       html+= '<a href="javascript:void(0)" onclick="paymentForm(\''+duedata.DueID+'\',\''+duedata.DueNumber+'\',\''+duedata.DueAmount+'\')" class="btn btn-primary btn-sm">Pay</a>';
                                   } else {
                                              
                                   }
                               }
                              
                           html+=  '</td>'
                      + '</tr>';
             });
$('#tbl_content').html(html);
               closePopup();
        }
  });
}           
 
 
 var today="<?php echo date("Y-m-d");?>";
function paymentForm(DueID,DueNumber,DueAmount){
    clearDiv(['PaymentModeID','PaymentRemarks','PaymentDate']);
    $('#Dueconfirmation').modal("show");
    $('#paymentdata').hide() ;
    $('#PaymentModeID').val("0");
    $('#PaymentRemarks').val("");
    $('#PaymentDate').val(today);
    $('#viewInstallment').val(DueNumber);
    $('#viewDueAmount').val(DueAmount);
    $('#DueID').val(DueID);
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
               $('#viewModeOfBenifits').val(obj.data.ModeOfBenifits +' / '+obj.data.MaterialType);
               $('#DueID').val(obj.data.DueID);
               $('#PaymentModeID').val("0");
               $('#PaymentRemarks').val("");
               
        } else {
                $('#paymentdata').hide() ;
                $('#PaymentModeID').val("0");
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

setTimeout("getData(),listpaymentmodes()",2000);
   

function closeContractForm(){
    $('#Colseconfirmation').modal("show");
    clearDiv(['Remarks']);
    $.post(URL+"webservice.php?action=getPreClosureContractInformation&method=Contracts&ContractID=<?php echo $_GET['view'];?>","",function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
               $('#closeModeOfBenifits').val(obj.data.ModeOfBenifits +' / '+obj.data.MaterialType);
               $('#closeSchemeName').val(obj.data.SchemeName);
               $('#closeWastageDiscount').val(obj.data.WastageDiscount);
               //$('#viewMaterialType').val(obj.data.MaterialType);
               $('#closeMakingChargeDiscount').val(obj.data.MakingChargeDiscount);
               $('#closeTotalPaidAmount').val(obj.data.TotalPaidAmount);
               $('#closeTotalGoldInGrams').val(obj.data.TotalGoldInGrams);
               $('#Remarks').val("");
               $('#ContractID').val(ContractID);
              
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

function closeContract() {
    var param = $('#frm_close').serialize();
    clearDiv(['Remarks']);
    $.post(URL+"webservice.php?action=preCloseContract&method=Contracts",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#Colseconfirmation').modal("hide");
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
  
</script>