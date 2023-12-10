<?php $data= $mysql->select("select * from _tbl_receipts where ReceiptNumber='".$_GET['number']."'");?>
<div class="container-fluid p-0">
<div class="col-sm-12">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Pending Dues</h1>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?" class="btn btn-outline-primary btn-sm">Back</a>
     </div>
     </div>
     </div>
    <div class="row" id="_content">
    </div>
    <div class="modal fade" id="addPaymentmode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Select payment mode</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12">
                        <div class="list-group">
                              <a class="list-group-item list-group-item-action" id="Offline_Url">Offline payment</a>
                              <a href="javascript:void(0)" class="list-group-item list-group-item-action">Online payment</a>  
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
    </div>
  </div>
</div>
</div>

<script>
function selectpaymentForm(dueID){
     var offline_url= URL+"dashboard.php?action=contracts/offlinepayment&due="+dueID+'&fpg=contracts/pendingDues';
     $('#Offline_Url').attr("href",offline_url);
  $('#addPaymentmode').modal("show");
      clearDiv(['Offlinpayment','Onlinepayment']);
}  
function addNew() {
    var param = $('#frm_create').serialize();
      clearDiv(['Offlinpayment','Onlinepayment']);
    $.post(URL+"webservice.php?action=addNew&method=PaymentModes",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#addPaymentmode').modal("hide");
             openPopup();
            $('#frm_create').trigger("reset");
            if (obj.PaymentModeCode.length>3) {
                $('#PaymentModeCode').val(obj.PaymentModeCode);
            }
            $('#popupcontent').html(success_content(obj.message,'closePopup()')); 
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

function getData() {
    var param = $('#frm_pendingdues').serialize();
    openPopup();
    clearDiv(['message']);
    $.post(URL+ "webservice.php?action=getPendingDues",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                 html += '<div class="col-sm-12">'
                            + '<div class="card mb-2">'
                                + '<div class="card-body" style="padding:10px 15px">'
                                    + '<div class="row">'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Contract ID</div>'
                                                   + '<div>' + data.ContractCode + '</div>'
                                            + '</div>'
                                         + '<div class="col-6" style="text-align:right">'
                                                    + '<div class="dropdown position-relative">'
                                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static" style="color:#9a9dc6">'
                                                            + '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>'
                                                        + '</a>' 
                                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                            + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/viewcontract&view='+data.ContractCode+'&fpg=contracts/pendingdues"">View Contract</a>'
                                                            + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=schemes/view&edit='+data.SchemeID+'&fpg=contracts/pendingdues"">View Scheme</a>'
                                                           + '</div>' 
                                                        + '</div>'
                                                    + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Scheme Name</div>'
                                                + '<div>' + data.SchemeName + '</div>'
                                            + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold; text-align:right">Due Date</div>'
                                                   + '<div style="text-align:right">' + data.DueDate + '</div>'
                                            + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Due Number</div>'
                                                   + '<div>' + data.DueNumber + '</div>'
                                            + '</div>'
                                        + '<div class="col-6" style="text-align: right;">'
                                             + '<div style="font-weight:bold;">Due Amount</div>'
                                                   + '<span>₹</span>&nbsp;<span>' + data.DueAmount + '</span>'
                                            + '</div>'
                                         + '<div class="col-6">'
                                                + '<div><span class="badge badge-soft-danger" style="font-size:10px;"> -'+data.DaysBefore+' days</span></div>'
                                            + '</div>'
                                        + '<div class="col-6" style="text-align:right;padding-top:10px">';
                                            if  (data.IsShowPayButton=="1") {
                                                html+= '<a href="javascript:void(0)" onclick="selectpaymentForm(\''+data.DueID+'\',\''+data.DueNumber+'\',\''+data.DueAmount+'\')" class="btn btn-primary btn-sm" style="font-size:10px">Pay</a>';
                                            }
                                            html += '</div>'
                                        + '<td style="text-align:right">';
                                               /*if  (data.ReceiptID!="0") {
                                                   html += '<a href="'+URL+'dashboard.php?action=receipts/receipt&number='+data.ReceiptNumber+'" class="btn btn-outline-primary btn-sm">View</a>';
                                              } else {
                                                  if  (data.IsShowPayButton=="1") {
                                                       html+= '<a href="javascript:void(0)" onclick="paymentForm(\''+data.DueID+'\',\''+data.DueNumber+'\',\''+data.DueAmount+'\')" class="btn btn-primary btn-sm">Pay</a>';
                                                   } else {
                                                              
                                                   }
                                               }  */
                                              
                                           html+=  '</td>'
                                     + '</div>'
                                    + '</div>'
                                + '</div>'
                            + '</div>';
    });
            if (obj.data.length=="") {
         html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
    }  
            $('#_content').html(html);
            //$('#listData').show();
            
        } else {
            html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
                $('#_content').html(html);
            $('#process_popup').modal('hide');
        }
    });
}
setTimeout(function(){
    getData();               
},2000);
</script>
         