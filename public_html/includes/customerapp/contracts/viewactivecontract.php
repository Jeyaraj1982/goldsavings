<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6 mb-1">
            <!--<h1 class="h3" style="font-weight: bold;">Contract</h1>--->
        </div>
        <div class="col-6 mb-1" style="text-align: right;">
            <a href="<?php echo URL;?>dashboard.php?action=contracts/active" class="btn btn-outline-primary btn-sm">Back</a>&nbsp;
            <a href="<?php echo URL;?>dashboard.php?action=" class="btn btn-primary btn-sm">Download</a>
        </div>
        <div class="col-sm-12 col-xl-12 mt-2">
            <div class="card mb-2">
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
                                    <td style="line-height: 12px;text-align: right;"><span  style="text-align: right;"><b id="GoldInGrams">...</b><br><span style="font-size:10px">Gms</span></span></td>
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
                            <div style="font-weight: bold;">End</div>
                            <div id="EndDate">...</div>
                        </div>
                        <div class="col-4">
                            <div style="font-weight: bold;">Paid Dues</div>
                            <span id="PaidDues" style="font-weight: bold;">...</span> &nbsp;outof&nbsp;<span id="UnPaidDues" style="font-weight: bold;">...</span>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
       
        <div class="col-12" id="ContractAdditionalInformation" style="text-align: right; font-size: 10px;">
        </div>
        <div class="col-12 col-xl-12"> 
            <div class="row">
                <div class="col-sm-12 mt-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="row" >
                                <div class="col-6 mb-1">
                                    <div style="font-weight: bold;"> Scheme ID</div>
                                    <div id="SchemeCode">...</div>
                                </div>
                                <div class="col-6 mb-1" style="text-align: right;">
                                    <a style="color:#888;text-decoration:none;" id="viewscheme" href="" title="View Customer Information"><i class="align-middle" data-feather="external-link"></i></a>
                                </div>
                                <div class="col-sm-12 mb-1">
                                    <div style="font-weight: bold;"> Scheme Name</div>
                                    <div id="SchemeName">...</div>
                                </div>
                                <div class="col-6">    
                                    <div style="font-weight: bold;" id="basic-addon3">Making Charge<br>Discount:&nbsp;&nbsp;<span id="MakingChargeDiscount" style="font-weight:normal">...</span> <span style="font-weight:normal">%</span></div>
                                </div>
                                <div class="col-6" style="text-align: right;">
                                    <div style="font-weight: bold;" id="basic-addon3">Wastage<br>Discount:&nbsp;&nbsp;<span id="WastageDiscount" style="font-weight:normal">...</span> <span style="font-weight:normal">%</span></div>
                                </div>
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
    
    </div>
    <div class="row" id=_content>
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
            $('#viewscheme'). attr ("href","<?php echo URL;?>dashboard.php?action=schemes/view&edit="+ContractData.SchemeID);
            $('#CustomerCode').html(CustomerData.CustomerCode);
            $('#CustomerName').html(CustomerData.CustomerName);
            $('#MobileNumber').html(CustomerData.MobileNumber);
            $('#EmailID').html(CustomerData.EmailID);
            $('#EntryDate').html(CustomerData.EntryDate);
               /* if(CustomerData.IsActive=="1"){
                    $('#IsActive').html("Active");    
                }
                 if(CustomerData.IsActive=="0"){
                 $('#IsActive').html("Deactivated");    
                }   */
            $('#AddressLine1').html(CustomerData.AddressLine1);
            $('#AddressLine2').html(CustomerData.AddressLine2);
            $('#AddressLine3').html(CustomerData.AreaName +', '+CustomerData.DistrictName +','+CustomerData.StateName +', PinCode: ' +CustomerData.PinCode );
            $('#SchemeCode').html(ContractData.SchemeCode);
            $('#SchemeName').html(ContractData.SchemeName);
            $('#MakingChargeDiscount').html(ContractData.MakingChargeDiscount);
            $('#WastageDiscount').html(ContractData.WastageDiscount);
            $('#ModeOfBenifits').html(ContractData.ModeOfBenifits+ ' / '+ContractData.MaterialType);
            //$('#IsActive').html(ContractData.IsActive);
            
            if(ContractData.IsActive=="1"){
                    $('#IsActive').html('<span class="badge bg-success" style="text-align: right;">Active</span>');    
                }
                
               
          
            $('#Amount').html(ContractData.Amount);
            $('#StartDate').html(ContractData.StartDate);
            $('#EndDate').html(ContractData.EndDate);
            $('#PaidDues').html(ContractData.PaidDues);
            $('#UnPaidDues').html(ContractData.UnPaidDues);
            $('#GoldInGrams').html(ContractData.GoldInGram);
            $('#Installments').html(ContractData.Duration + ' / '+ContractData.InstallmentMode);
            $('#InstallmentAmount').html(ContractData.DueAmount);
           // $('#InstallmentMode').html(ContractData.InstallmentMode);
            $('#ContractCode').html(ContractData.ContractCode);
            $('#ContractCreatedOn').html(ContractData.CreatedOn);
            $('#CreatedBy').html(ContractData.CreatedBy);
            $('#CreatedByName').html(ContractData.CreatedByName);
            /* if(ContractData.IsActive=="1"){
                    $('#ContractIsActive').html("Active");    
                }
                 if(ContractData.IsActive=="0"){
                 $('#ContractIsActive').html("Deactivated");    
                }
                if(ContractData.IsActive=="3"){
                 $('#ContractIsActive').html("Closed");    
                } */
             var html = "";
            $.each(DueData, function (index, duedata) {
                 html += '<div class="col-sm-12">'
                            + '<div class="card mb-2">'
                                + '<div class="card-body" style="padding:10px 15px">';
                                if (duedata.ReceiptNumber!=""){
                                         html += '<div class="row">'
                                                     + '<div class="col-6 mb-1">'
                                                            + '<div style="font-weight: bold;">Receipt Number</div>'
                                                            + '<div>' +  duedata.ReceiptNumber + '</div>'
                                                     +'</div>'
                                                        + '<div class="col-6 mb-1" style="text-align:right">'
                                                        + '<a href="'+URL+'dashboard.php?action=receipts/receipt&number='+duedata.ReceiptNumber+'" class="btn btn-outline-primary btn-sm">View</a>'
                                                     +  '</div>'
                                                       + '<div class="col-6 mb-1">'
                                                        + '<div style="font-weight: bold;">Due Number</div>'
                                                        + '<div>' + duedata.DueNumber + '</div>'
                                                     +'</div>'
                                                      + '<div class="col-6 mb-1">'
                                                        + '<div style="font-weight: bold; text-align:right;">Due Date</div>'
                                                        + '<div style="text-align:right;">' + duedata.DueDate + '</div>'
                                                     + '</div>'
                                                       + '<div class="col-6 mb-1">'
                                                        + '<div style="font-weight: bold;">Due Amount</div>'
                                                        +  '<span>₹&nbsp;</span><span>' + duedata.DueAmount + '</span>'
                                                     + '</div>'
                                                      + '<div class="col-6 mb-1">'
                                                        + '<div style="font-weight: bold; text-align:right">Payment Date</div>'
                                                        + '<div style="text-align:right">' + (duedata.PaymentDate!=null ? duedata.PaymentDate : '')+ '</div>'
                                                     +'</div>'
                                                       +'<div class="col-6" style="padding-top:5px">'
                                                        +'<table>'
                                                            +'<tr>'
                                                                +'<td style="vertical-align: top"><img src="<?php echo URL;?>assets/gold-bars.png" align="middle"></td>'
                                                                +'<td style="line-height: 12px;"><span id="GoldInGram"><b>' + duedata.GoldInGram +'</b><br><span style="font-size:10px">Gms</span></span></td>'
                                                            +'</tr>'
                                                        +'</table>'
                                                    +'</div>'
                                                      + '<div class="col-6 mb-1"  style="text-align:right;">'
                                                        + '<div style="font-weight: bold;">Gold price</div>'
                                                        + '<span>₹&nbsp;</span><span  style="text-align:right;text-align:right;line-height: 17px;">' + (duedata.GoldPriceOnDate!=null ? duedata.GoldPrice +'<!--<br><span style="font-size:10px">'+duedata.GoldPriceOnDate+'</span>-->' : '')+ '</span>'
                                                     +'</div>';
                                                      if(ContractData.VoucherID!="0"){
                                                             $('#ContractAdditionalInformation').html('<a href="'+URL+'dashboard.php?action=contracts/voucher&number='+ContractData.VoucherNumber+'" class="btn btn-outline-primary btn-sm">View Voucher</a>');   
                                                            } else {
                                                                
                                                            }
                                                     +'</div>';
                                     
                                } else {
                                    /*
                                       html += '<div class="row">'
                                    
                                                    + '<div class="col-6" style="text-align:right">';
                                                       
                                                           if  (duedata.IsShowPayButton=="05")
                                                           {
                                                               html += ''
                                                    + '</div>' 
                                                    + '<div class="col-6" style="text-align:right">'
                                                        + '<div class="dropdown position-relative">'
                                                            + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                                            + '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>'
                                                            + '</a>'
                                                            + '<div class="dropdown-menu dropdown-menu-end">'
                                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/offlinepayment&due='+duedata.DueID+'">Make Offline Payment</a>'
                                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/onlinepayment&due='+duedata.DueID+'">Make Online Payment</a>'
                                                            + '</div>'
                                                    + '</div>'
                                                    
                                               +'</div>';
                                                   } 
                                             
                                           html+=  '</div>'
                                           */
                                           html += '<div class="row">'
                                           + '<div class="col-6">'
                                                + '<div style="font-weight: bold;">Due Number</div>'
                                                   + '<div>' + duedata.DueNumber + '</div>'
                                           +'</div>'
                                           + '<div class="col-6">'
                                                + '<div style="font-weight: bold; text-align:right;">Due Date</div>'
                                                + '<div style="text-align:right;">' + duedata.DueDate + '</div>'
                                           + '</div>'
                                            + '<div class="col-6">'
                                                + '<div style="font-weight: bold;">Due Amount</div>'
                                                + '<span>₹&nbsp;</span><span>' + duedata.DueAmount + '</span>'
                                           + '</div>'
                                           + '<div class="col-6" style="text-align:right;padding-top:10px">';
                                            if  (duedata.IsShowPayButton=="1") {
                                                html+= '<a href="javascript:void(0)" onclick="paymentForm(\''+duedata.DueID+'\',\''+duedata.DueNumber+'\',\''+duedata.DueAmount+'\')" class="btn btn-primary btn-sm">Pay</a>';
                                            }
                                            html += '</div>'
                                            html+='</div>';
                                           
                                          
                                }      
                                           
                                           
                                        html += '</div>'
                                    + '</div>'                                                                 
                                + '</div>';
              });
            if (obj.data.length=="") {
         html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
    }  
            $('#_content').html(html);
            
        } else {
            html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
                $('#_content').html(html);
        }
        closePopup();
    });
}    
setTimeout("getData()",2000);
</script> 