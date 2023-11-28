<div class="container-fluid p-0">
    <div class="col-sm-12">
    <div class="row">
        <div class="col-6">
            <h1 class="h3" style="font-weight: bold;">Contracts</h1>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=contracts/list" class="btn btn-outline-primary btn-sm">Back</a> &nbsp;
            <a href="<?php echo URL;?>dashboard.php?action=" class="btn btn-primary btn-sm">Download</a>
     </div>
     </div>
     </div>
    <div class="row"> 
        <div class="col-sm-12 col-xl-12">
    <div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-6">
            <div id="ContractCode">CONTRACT_CODE</div>        
            <div id="EntryDate">ENTRY DATE</div>
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
            <h6>Scheme Information</h6>
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12" style="text-align:right;">
                        <div>
                            <a style="color:#888;text-decoration:none;" id="viewscheme" href=""><i class="align-middle me-2" data-feather="eye"></i><span class="align-middle">View</span></a>
                        </div>
                    </div>
                    <div style="font-weight: bold;"> Scheme Code</div>
                    <div id="SchemeCode"></div>
                    <div style="font-weight: bold;"> Scheme Name</div>
                    <div id="SchemeName"></div>
                    <div style="font-weight: bold;"> Mode Of Benifits</div>
                    <div id="ModeOfBenifits"></div>
                    <div id="gold" style="display: none;">
                        <div style="font-weight: bold;">Material Type</div>
                        <div id="MaterialType"></div>
                    </div>
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
                      <th scope="col" style="text-align: right;">Amount</th>
                      <th scope="col" style="text-align: right;">Gold</th>
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
                <input type="hidden" value="" name="DueID" id="DueID">
        <div class="row">
        <div class="col-sm-4 mb-3">
            <label class="form-label">Payment Date <span style='color:red'>*</span></label>
            <input type="date" name="PaymentDate" value="<?php echo date("Y-m-d");?>" id="PaymentDate" class="form-control" placeholder="Payment Date">
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
                        <span class="input-group-text" id="basic-addon1">(₹)</span>
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
            <div class="col-sm-4 mb-3">
                <label class="form-label">Gold Price </label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">(₹)</span>
                    </div>
                    <input type="text" style="text-align: right;" name="GoldPrice" id="viewGoldPrice" class="form-control" placeholder="Gold Price">
                </div>
                <span id="ErrGoldPrice" class="error_msg"></span>
            </div>
            <div class="col-sm-4 mb-3">
                <label class="form-label">Gold in Grams </label>
                <input type="text" style="text-align: right;" name="GoldInGrams" id="viewGoldInGrams" readonly="readonly" class="form-control" placeholder="GoldInGrams">
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
            $('#EntryDate').html(CustomerData.EntryDate);
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
                           + '<td style="text-align: right;">' + duedata.DueAmount + '</td>'
                           + '<td style="text-align: right;">' + (duedata.GoldInGram!="0" ? duedata.GoldInGram : '')+ '</td>'
                           + '<td>' + (duedata.GoldPriceOnDate!=null ? duedata.GoldPrice +'<br>'+duedata.GoldPriceOnDate : '')+ '</td>'
                           + '<td>' + (duedata.ReceiptNumber!="0" ? duedata.ReceiptNumber : '')+ '</td>'
                           + '<td>' + (duedata.PaymentDate!=null ? duedata.PaymentDate : '')+ '</td>'
                           + '<td style="text-align:right">';
                               if  (duedata.ReceiptID!="0") {
                                   html += '<a href="'+URL+'dashboard.php?action=receipts/receipt&number='+duedata.ReceiptNumber+'" class="btn btn-outline-primary btn-sm">View Receipt</a>';
                               } else {
                                   if  (duedata.IsShowPayButton=="1") {
                                       html += '' 
                                       + '<div class="dropdown position-relative">'
                                       + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                       + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/offlinepayment&due='+duedata.DueID+'">Make Offline Payment</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/onlinepayment&due='+duedata.DueID+'">Make Online Payment</a>'
                                        + '</div>'
                                + '</div>';
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
setTimeout("getData()",2000);
</script>