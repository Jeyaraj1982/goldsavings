<div class="container-fluid p-0">
    <h1 style="font-weight: bold;" class="h3">Contract</h1>
    <div class="row"> 
        <div class="col-sm-12 col-xl-12">
    <div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-6">
            <div id="ContractCode">CONTRACT_CODE</div>        
            <div id="ContractCreatedOn">CONTRACT CREATED ON</div>
            <div id="ContractIsActive">STATUS</div> 
        </div>
        <div class="col-6" style="text-align:right;">
            <div id="CreatedByName" style="font-weight: bold;">CREATED BY NAME</div>
            <div id="CreatedBy">CREATED BY</div>
        </div>
      </div>   
      </div>
      </div>
      </div>
      </div>
    <div class="row"> 
        <div class="col-6 col-xl-6">
            <h6>Customer Information</h6>
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12" style="text-align:right;">
                        <div>
                            <a style="color:#888;text-decoration:none;" id="viewcustomer" href=""><i class="align-middle me-2" data-feather="eye"></i><span class="align-middle">View</span></a>
                        </div>
                    </div>
                    <div id="CustomerCode">CUSTOMER_CODE</div>
                    <div id="CustomerName">CUSTOMER_NAME</div>
                    <div id="MobileNumber">MOBILE NUMBER</div>
                    <div id="EmailID">EMAILID</div>
                    <div id="CustomerCreatedOn">CUSTOMER CREATED ON</div>
                    <div id="IsActive">STATUS</div>
                    <div id="AddressLine1">ADDRESS LINE1</div>
                    <div id="AddressLine2">ADDRESS LINE2</div>
                    <div id="AddressLine3">ADDRESS LINE3</div>
                </div>
            </div>
        </div>
        <div class="col-6 col-xl-6">       
            <h6>Scheme Information</h6>
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12" style="text-align:right;">
                        <div>
                            <a style="color:#888;text-decoration:none;" id="viewscheme" href=""><i class="align-middle me-2" data-feather="eye"></i><span class="align-middle">View</span></a>
                        </div>
                    </div>
                    <div id="SchemeCode">SCHEME_CODE</div>
                    <div id="SchemeName">SCHEME_NAME</div>
                    <div id="ModeOfBenifits">MODE OF BENEFITS</div>
                    <div id="MaterialType">MATERIAL</div>
                    <div id="Amount">AMOUNT</div>
                    <div id="Installments">INSTALLMENTS</div>
                    <div id="InstallmentMode">INSTALLMENT MODE</div>
                    <div id="InstallmentAmount">INSTALLMENT AMOUNT</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<h6>Payment/Due Information</h6>
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="padding-top:10px">
                <table id="table" class="table">
                  <thead>
                    <tr>
                      <th scope="col">Due</th>
                      <th scope="col">Date</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Gold</th>
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
                <input type="hidden" value="<?php echo $data[0]['DueID'];?>" name="DueID" id="DueID">
        <div class="row">
            <div class="col-sm-4 mb-3">
                <label class="form-label">DueAmount </label>
                <input type="text" style="text-align: right;" name="DueAmount" id="viewDueAmount" readonly="readonly" class="form-control" placeholder="DueAmount">
            </div>
            <div class="col-sm-4 mb-3">
                <label class="form-label">Gold in Grams </label>
                <input type="text" style="text-align: right;" name="GoldInGrams" id="viewGoldInGrams" readonly="readonly" class="form-control" placeholder="GoldInGrams">
            </div>
            <div class="col-sm-4 mb-3">
                <label class="form-label">Gold Price</label>
                <input type="text" style="text-align: right;" name="GoldPrice" id="viewGoldPrice" readonly="readonly" class="form-control" placeholder="GoldPrice">
            </div>
            <div class="col-sm-4 mb-3">
                <label class="form-label">Mode Of Benifits</label>
                <input type="text" name="ModeOfBenifits" id="viewModeOfBenifits" class="form-control" placeholder="ModeOfBenefits">
                <span id="ErrModeOfBenefits" class="error_msg"></span>
            </div>
            <div class="col-sm-4 mb-3">
                <label class="form-label">Installment Number</label>
                <input type="text" style="text-align: right;" name="Installment" id="viewInstallment" class="form-control" placeholder="Installment">
                <span id="ErrInstallment" class="error_msg"></span>
            </div>
            <div class="col-sm-8  mb-3">
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
            $('#viewcustomer'). attr ("href","<?php echo URL;?>dashboard.php?action=masters/customers/view&customer="+CustomerData.CustomerID);
            $('#viewscheme'). attr ("href","<?php echo URL;?>dashboard.php?action=masters/schemes/view&edit="+SchemeData.SchemeID);
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
            $('#AddressLine1').html(CustomerData.AddressLine1);
            $('#AddressLine2').html(CustomerData.AddressLine2);
            $('#AddressLine3').html(CustomerData.AreaName +', '+CustomerData.DistrictName +','+CustomerData.StateName +', PinCode: ' +CustomerData.PinCode );
            $('#SchemeCode').html(SchemeData.SchemeCode);
            $('#SchemeName').html(SchemeData.SchemeName);
            $('#ModeOfBenifits').html(SchemeData.ModeOfBenifits);
            $('#MaterialType').html(SchemeData.MaterialType);
            $('#Amount').html(SchemeData.Amount);
            $('#Installments').html(SchemeData.Installments);
            $('#InstallmentAmount').html(SchemeData.InstallmentAmount);
            $('#InstallmentMode').html(SchemeData.InstallmentMode);
            $('#ContractCode').html(ContractData.ContractCode);
            $('#ContractCreatedOn').html(ContractData.CreatedOn);
            $('#CreatedBy').html(ContractData.CreatedBy);
            $('#CreatedByName').html(ContractData.CreatedByName);
             if(ContractData.IsActive=="1"){
                    $('#ContractIsActive').html("Active");    
                }
                 if(ContractData.IsActive=="0"){
                 $('#ContractIsActive').html("Deactivated");    
                }
            
            $.each(DueData, function (index, duedata) {
                html += '<tr>'
                           + '<td>' + duedata.DueNumber + '</td>'
                           + '<td>' + duedata.DueDate + '</td>'
                           + '<td>' + duedata.DueAmount + '</td>'
                           + '<td>' + (duedata.GoldInGram!="0" ? duedata.GoldInGram : '')+ '</td>'
                           + '<td>' + (duedata.GoldPriceOnDate!=null ? duedata.GoldPrice +'<br>'+duedata.GoldPriceOnDate : '')+ '</td>'
                           + '<td>' + (duedata.ReceiptNumber!="0" ? duedata.ReceiptNumber : '')+ '</td>'
                           + '<td>' + (duedata.PaymentDate!=null ? duedata.PaymentDate : '')+ '</td>'
                           + '<td style="text-align:right">';
                               if  (duedata.ReceiptID!="0") {
                                   html += '<a href="'+URL+'dashboard.php?action=receipts/receipt&number='+duedata.ReceiptNumber+'" class="btn btn-outline-primary btn-sm">View Receipt</a>';
                               } //else {
                                   //if  (duedata.IsShowPayButton=="1") {
                                       //html+= '<a href="javascript:void(0)" onclick="paymentForm(\''+duedata.DueID+'\')" class="btn btn-primary btn-sm">Pay</a>';
                                   //} 
                                   else {
                                              
                                   }
                               //}
                           html+=  '</td>'
                      + '</tr>';
             });
$('#tbl_content').html(html);
               closePopup();
        }
  });
}

function paymentForm(DueID){
    $('#Dueconfirmation').modal("show");
    clearDiv(['PaymentModeID','PaymentRemarks']);
    $.post(URL+"webservice.php?action=getPreCollectDueInformation&method=Contracts&ID="+DueID,"",function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
               $('#viewDueAmount').val(obj.data.DueAmount);
               $('#viewGoldInGrams').val(obj.data.GoldInGrams);
               $('#viewGoldPrice').val(obj.data.GoldPrice);
               $('#viewModeOfBenifits').val(obj.data.ModeOfBenifits +' / '+obj.data.MaterialType);
               //$('#viewMaterialType').val(obj.data.MaterialType);
               $('#viewInstallment').val(obj.data.Installment);
               $('#DueID').val(obj.data.DueID);
               $('#PaymentModeID').val("0");
               $('#PaymentRemarks').val("");
               
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

function collectNew() {
    var param = $('#frm_collect').serialize();
    clearDiv(['PaymentModeID','PaymentRemarks']);
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
   

var CloseID="";
function CloseModal(ID){
    CloseID=ID;
    $('#closetoconfirmation').modal("show"); 
}
function CloseContract(ID) {
     $('#closetoconfirmation').modal("hide"); 
  openPopup();
    $.post(URL+ "webservice.php?action=close&method=Contracts&ID="+CloseID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                 html += '<tr>'
                           

                      + '</tr>';
             });
            if(obj.data.legth==0){
                    html +=  '<tr>'
                    + '<td colspan="7" style="text-align: center;background:#fff !important">No data found</td>'
                    + '</tr>'
            }  
            $('#tbl_content').html(html);
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
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