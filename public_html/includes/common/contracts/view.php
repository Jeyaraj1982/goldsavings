 <div class="container-fluid p-0">
    <div class="row">
        <div class="col-sm-6  mb-2">
            <h1 class="h3" style="font-weight: bold;">Contracts</h1>
        </div>
        <div class="col-sm-6  mb-2" style="text-align:right;">
        <?php   
                 $path=URL."dashboard.php";
                if (isset($_GET['fpg'])) {
                $path.="?action=".$_GET['fpg'];
            }        
            if (isset($_GET['SchemeID'])) {
                $path.="&SchemeID=".$_GET['SchemeID'];
            }
            ?>
            <a href="<?php echo $path;?>" class="btn btn-outline-primary btn-sm">Back</a>&nbsp;&nbsp;
            <a href="<?php echo URL;?>dashboard.php?action=" class="btn btn-primary btn-sm">Download</a>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                <div class="col-12 mb-0">
                    <div class="row">
                        <div class="col-6 mb-0">
                                <div style="font-weight: bold;">Contract ID</div>
                                <div id="ContractCode"></div>
                            </div>
                          <div class="col-6 mb-0" style="text-align: right;">
                                <div style="font-weight: bold;">Entry Date</div>
                                <div id="viewEntryDate"></div>
                            </div> 
                            </div> 
                        <div class="row">
                        <div class="col-6 mb-0">
                                <div style="font-weight: bold;"> Mode Of Benefits</div>
                                <div id="ModeOfBenifits"></div>
                            </div>
                            <div class="col-6 mb-0" style="text-align: right;">
                            <div style="font-weight: bold;">Created by</div>
                            <span id="CreatedByName"></span>&nbsp;/&nbsp; <span id="CreatedBy"></span>
                            
                        </div></div>
                        <div class="row">
                            <div class="col-6 mb-0">
                                <div id="gold" style="display: none;">
                                    <div style="font-weight: bold;">Material Type</div>
                                    <div id="MaterialType"></div>
                                </div>
                            </div>
                            <div class="col-6 mb-0" style="text-align: right;">
                                <div style="font-weight: bold;">Installment</div>
                                <div id="Installments"></div>
                            </div>
                            </div>
                            <div class="col-12 mb-0">
                                <div id="schemeamount" style="display: none;">
                                    <div style="font-weight: bold;">Amount <span>(₹)</span></div>
                                    <div id="Amount"></div>
                                </div>
                                <div class="col-12 mb-0">
                                <div style="font-weight: bold;">Installment Amount <span>(₹)</span></div>
                                <div id="InstallmentAmount"></div>
                            </div>
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
                <div class="col-sm-3 col-xl-3 mb-2" style="text-align: right;">
                    <a style="color:#888;text-decoration:none;" id="viewcustomer" href="" title="View Customer Information"><i class="align-middle" data-feather="external-link"></i></a>
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
                            <div style="font-weight: bold;">Email ID</div>
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
                            <div class="col-sm-12 mb-0">
                                    <div style="font-weight: bold;"> Scheme Code</div>
                                    <div id="SchemeCode"></div>
                            </div>
                            <div class="col-sm-12 mb-0">
                                <div style="font-weight: bold;"> Scheme Name</div>
                                <div id="SchemeName"></div>
                            </div>
                            
                            <div class="col-sm-6 mb-0">
                                <div id="bonus" style="display: none;">
                                    <div style="font-weight: bold;">Bouns <span>(%)</span></div>
                                    <div id="BonusPercentage"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-2">    
                                <div style="font-weight: bold;" id="basic-addon3" style="width:200px">Making Charge Discount <span>(%)</span></div>
                                <div id="MakingChargeDiscount"></div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div style="font-weight: bold;" id="basic-addon3" style="width:200px">Wastage Discount <span>(%)</span></div>
                                <div id="WastageDiscount"></div>
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
                                <th scope="col" style="text-align:right">Due<br>Amount(₹)</th>
                                <th scope="col" style="text-align:right">Gold<br>(Grams)</th>
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
    </div>
 </div>
 <div class="row mb-3">
    <div class="col-12" id="ContractAdditionalInformation">
    </div>
 </div>
 
  <div class="row mb-3">
  <div class="col-sm-12  mb-2">
            <h6 style="margin-bottom: 0px;font-size: 16px;font-weight: bold;">Passbook</h6>
        </div>
 <div class="col-sm-12 col-xl-12">
  
        <div class="card">
           
            <div class="card-body">
                <iframe src="<?php echo URL;?>passbook.php?code=<?php echo $_GET['view'];?>" style="width: 100%; height: 550px;background: #f4f4f4;border: 1px solid #cccccc;margin: 0px;"></iframe>
            </div>
        </div>
    
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
                        <label class="form-label">Closing Date <span style='color:red'>*</span></label>
                        <div class="input-group">
                            <input type="text" value="<?php echo date("Y-m-d");?>" name="PreCloseDate" id="PreCloseDate" class="form-control" placeholder="Close Date">
                        </div>
                        <span id="ErrPreCloseDate" class="error_msg"></span>
                    </div>
                    <div class="col-sm-6 mb-3"></div>
                    <div class="col-sm-6 mb-3">
                        <label class="form-label">Material Type </label>
                        <input type="text" name="MaterialType" id="closeMaterialType" readonly="readonly" class="form-control" placeholder="Material Type">
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
            <div class="col-sm-12">
                <hr>
            </div>
            <div class="col-sm-12" style="font-weight: bold;">
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
            </script>
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
var contract_mode="";
 var ContractID="<?php echo $_GET['view'];?>";
function getData(){
    openPopup();
    $.post(URL+ "webservice.php?action=getData&method=Contracts&contract=<?php echo $_GET['view'];?>","",function(data){
        var  obj = JSON.parse(data);
        if (obj.status=="success") {
            var CustomerData = obj.data.CustomerData;
            //var SchemeData = obj.data.SchemeData;
            var DueData = obj.data.DueData;
            var ContractData = obj.data.ContractData;
            var html="";
            $('#viewcustomer'). attr ("href","<?php echo URL;?>dashboard.php?action=../common/customers/view&customer="+CustomerData.CustomerID+"&fpg=contracts/view&view="+ContractData.ContractCode);
            $('#viewscheme'). attr ("href","<?php echo URL;?>dashboard.php?action=masters/schemes/view&edit="+ContractData.SchemeID+"&fpg=contracts/view&view="+ContractData.ContractCode);
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
            $('#AddressLine3').html(CustomerData.AreaName +', '+CustomerData.DistrictName +','+CustomerData.StateName +', Pincode: ' +CustomerData.PinCode );
            $('#SchemeCode').html(ContractData.SchemeCode);
            $('#SchemeName').html(ContractData.SchemeName);
            $('#MakingChargeDiscount').html(ContractData.MakingChargeDiscount);
            $('#WastageDiscount').html(ContractData.WastageDiscount);
            $('#ModeOfBenifits').html(ContractData.ModeOfBenifits);
                if (ContractData.ModeOfBenifits == "AMOUNT") {
                    contract_mode="AMOUNT" ;
                    $('#Amount').html(ContractData.Amount);
                    $('#schemeamount').show();
                    $('#BonusPercentage').html(ContractData.BonusPercentage);
                    $('#bonus').show();
                } else {
                     contract_mode="GOLD" ;
                    $('#MaterialType').html(ContractData.MaterialType);  
                    $('#gold').show();  
                }
            $('#Amount').html(ContractData.Amount);
            $('#Installments').html(ContractData.Duration + ' / '+ContractData.InstallmentMode);
            $('#InstallmentAmount').html(ContractData.DueAmount);
           // $('#InstallmentMode').html(SchemeData.InstallmentMode);
            $('#ContractCode').html(ContractData.ContractCode);
            $('#viewEntryDate').html(ContractData.EntryDate);
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
                 $('#ContractAdditionalInformation').html('<a href="'+URL+'dashboard.php?action=../common/vouchers/viewvoucher&number='+ContractData.VoucherNumber+'" class="btn btn-outline-primary btn-sm">View Voucher</a>');   
                }
            $('#TransactionCustomerCode').html(CustomerData.CustomerCode);
            $('#TransactionCustomerName').html(CustomerData.CustomerName);
            $('#TransactionMobileNumber').html(CustomerData.MobileNumber);
            $('#TransactionEmailID').html(CustomerData.EmailID);
            $('#TransactionAddressLine3').html(CustomerData.AreaName +', '+CustomerData.DistrictName +','+CustomerData.StateName +', Pincode: ' +CustomerData.PinCode );
            $('#SavingCotractID').html(CustomerData.SavingCotractID);
            $('#TransactionSchemeName').html(ContractData.SchemeName);
            $('#TransactionWastageDiscount').html('Wastage:&nbsp;' +ContractData.WastageDiscount+ '%');
            $('#TransactionMakingChargeDiscount').html(' Making Charge:&nbsp; ' +ContractData.MakingChargeDiscount+ '%');
            $('#TransactionContractAmount').html(ContractData.ContractAmount);
            $('#TransactionDuration').html(ContractData.Duration);
            $('#TransactionInstallmentMode').html(ContractData.InstallmentMode);
            $('#TransactionMaterialType').html(ContractData.MaterialType);
            $('#TransactionDueAmount').html(ContractData.DueAmount);
            $.each(DueData, function (index, duedata) {
                html += '<tr>'
                           + '<td>' + duedata.DueNumber + '</td>'
                           + '<td>' + duedata.DueDate + '</td>'
                           + '<td style="text-align:right">' + duedata.DueAmount + '</td>';
                           if (contract_mode=="GOLD") {
                             html += '<td style="text-align:right">' + (duedata.GoldInGram!="0" ? duedata.GoldInGram : '')+ '</td>'
                           + '<td>' + (duedata.GoldPriceOnDate!=null ? duedata.GoldPrice +'<br>'+ duedata.GoldPriceOnDate : '')+ '</td>' ;
                             
                           } else {
                               html += '<td style="text-align:right">0.000</td>'
                               + '<td style="text-align:right">&nbsp;</td>' ;
                           }
                           html += '<td>' + (duedata.ReceiptNumber!="0" ? duedata.ReceiptNumber : '')+ '</td>'
                           + '<td>' + (duedata.PaymentDate!=null ? duedata.PaymentDate : '')+ '</td>'
                           + '<td style="text-align:right">';
                               if  (duedata.ReceiptID!="0") {
                                   html += '<a href="'+URL+'dashboard.php?action=../common/receipts/viewreceipt&number='+duedata.ReceiptNumber+'&fpg=../common/contracts/view&view='+ContractData.ContractCode+'" class="btn btn-outline-primary btn-sm">View</a>';
                               } else {
                                   if  (duedata.IsShowPayButton=="1") {
                                       html+= '<a href="'+URL+'dashboard.php?action=../common/contracts/paydue&due='+duedata.DueNumber+'&contract='+ContractData.ContractCode+'" class="btn btn-primary btn-sm">Pay</a>';         //onclick="paymentForm(\''+duedata.DueID+'\',\''+duedata.DueNumber+'\',\''+duedata.DueAmount+'\')"
                                   } else {
                                              
                                   }
                               }
                              
                           html+=  '</td>'
                      + '</tr>';
             });
$('#tbl_content').html(html);
               closePopup();
        }
  }).fail(function(){
        networkunavailable(); 
    });
}           
 
 
 var today="<?php echo date("Y-m-d");?>";

   

function closeContractForm(){
    $('#Colseconfirmation').modal("show");
    clearDiv(['Remarks']);
    $.post(URL+"webservice.php?action=getPreClosureContractInformation&method=Contracts&ContractID=<?php echo $_GET['view'];?>","",function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
               $('#closeMaterialType').val(obj.data.MaterialType);
               $('#PreCloseDate').html(obj.data.PreCloseDate);
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
                $('#Err'+obj.div).html(obj.message);
                $('#process_popup').modal('hide');
            } else {
                $('#popupcontent').html( errorcontent(obj.message));
            }
            
        }
    }).fail(function(){
        networkunavailable(); 
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
                $('#Err'+obj.div).html(obj.message);
                $('#process_popup').modal('hide');
            } else {
                $('#popupcontent').html( errorcontent(obj.message));
            }
            
        }
    }).fail(function(){
        networkunavailable(); 
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
  
setTimeout("getData(),listpaymentmodes()",2000);
</script>