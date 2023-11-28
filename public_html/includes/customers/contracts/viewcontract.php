<div class="container-fluid p-0">
    <div class="row">
        <div class="col-sm-6  mb-2">
            <h1 class="h3" style="font-weight: bold;">Contracts</h1>
        </div>
        <div class="col-sm-6  mb-2" style="text-align:right;">
            <?php 
            $path=URL."dashboard.php";
            if (isset($_GET['fpg'])) {
                $path=URL."dashboard.php?action=".$_GET['fpg'];
            }
            ?>
            <a href="<?php echo $path;?>" class="btn btn-outline-primary btn-sm">Back</a>&nbsp;
            <a href="<?php echo URL;?>dashboard.php?action=" class="btn btn-primary btn-sm">Download</a>
     </div>
      
        <div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                       <div class="col-6">
                            <div style="font-weight: bold;">Contract ID</div>
                            <div id="ContractCode">...</div>
                        </div>
                        <div class="col-6">
                            <div id="IsActive" style="text-align: right;">...</div>
                        </div> 
                        <div class="col-6">
                            <div style="font-weight: bold;"> Mode Of Benifits</div>
                            <div id="ModeOfBenifits">...</div> 
                        </div>
                        <div class="col-6" style="text-align: right;padding-top:5px">
                            <table align="right">
                                <tr>
                                    <td style="vertical-align: top"><img src="<?php echo URL;?>assets/gold-bars.png" align="middle"></td>
                                    <td style="line-height: 12px;text-align: right;"><span id="GoldInGrams" style="text-align: right;"><b id="GoldInGram">...</b></span><br><span style="font-size:10px">Gms</span></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">
                            <div style="font-weight: bold;">Installment</div>
                            <div id="Installments">...</div>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <div style="font-weight: bold;">Due Amount</div>
                            <span>₹&nbsp;</span><span id="InstallmentAmount" style="text-align: right;">...</span>
                        </div>
                        <div class="col-6">
                            <div style="font-weight: bold;">Started</div>
                            <div id="StartDate">...</div>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <div style="font-weight: bold;">Ended</div>
                            <div id="EndDate">...</div>
                        </div>
                        <div class="col-6">
                            <div style="font-weight: bold;">Closed</div>
                            <div id="ClosedOn">N/A</div>
                        </div>
                        <div class="col-6" style="text-align: right;">
                            <span id="PaidDues" style="font-weight: bold;">...</span> &nbsp;/&nbsp;<span id="UnPaidDues" style="font-weight: bold;">...</span>&nbsp;&nbsp;<span id="InstallmentMode">...</span>
                        </div>
                      </div>   
                    </div>
                </div>
            </div>
    <div class="col-12 col-xl-12"> 
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
                            <div class="col-sm-12 mb-2">
                                    <div style="font-weight: bold;"> Scheme Code</div>
                                    <div id="SchemeCode"></div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div style="font-weight: bold;"> Scheme Name</div>
                                <div id="SchemeName"></div>
                            </div>
                          
                            <div class="col-sm-12 mb-2">    
                                <span style="font-weight: bold;" id="basic-addon3" style="width:200px">Making Charge Discount <span>:</span></span>&nbsp;
                                <span id="MakingChargeDiscount"></span><span>%</span>
                            </div>
                            <div class="col-sm-12">
                                <span style="font-weight: bold;" id="basic-addon3" style="width:200px">Wastage Discount <span>:</span></span>&nbsp;
                                <span id="WastageDiscount"></span><span>%</span>
                            </div>
                            </div>
            </div>
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
            $('#viewcustomer'). attr ("href","<?php echo URL;?>dashboard.php?action=customers/view&customer="+CustomerData.CustomerID);
            $('#viewscheme').attr('<a href","<?php echo URL;?>dashboard.php?action=schemes/view&edit='+ContractData.SchemeID+'&fpg=contracts/viewcontract&view='+data.ContractCode+'"</a>');
            //$('#viewscheme'). attr ("href","<?php echo URL;?>dashboard.php?action=schemes/view&edit="+ContractData.SchemeID);
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
            $('#SchemeCode').html(ContractData.SchemeCode);
            $('#SchemeName').html(ContractData.SchemeName);
            $('#MakingChargeDiscount').html(ContractData.MakingChargeDiscount);
            $('#WastageDiscount').html(ContractData.WastageDiscount);
            $('#ModeOfBenifits').html(ContractData.ModeOfBenifits);
                    if(ContractData.IsClosed=="0"){
                    $('#IsActive').html('<span class="badge bg-success" style="text-align: right;">Active</span>');    
                }
                 if(ContractData.IsClosed=="1"){
                 $('#IsActive').html('<span class="badge bg-primary" style="text-align: right;">Closed</span>');     
                } 
            
            $('#Amount').html(ContractData.Amount);
            $('#Installments').html(ContractData.Duration + ' / '+ContractData.InstallmentMode);
            $('#InstallmentAmount').html(ContractData.DueAmount);
            $('#InstallmentMode').html(ContractData.InstallmentMode);
            $('#StartDate').html(ContractData.StartDate);
            $('#EndDate').html(ContractData.EndDate);
            //$('#closedOn').html(ContractData.closedOn);
            $('#ContractCode').html(ContractData.ContractCode);
            $('#GoldInGrams').html(ContractData.GoldInGram);
            $('#PaidDues').html(ContractData.PaidDues);
            $('#UnPaidDues').html(ContractData.UnPaidDues);
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
                                   html += '<a href="'+URL+'dashboard.php?action=receipts/receipt&number='+duedata.ReceiptNumber+'" class="btn btn-outline-primary btn-sm">View</a>';
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