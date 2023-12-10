<div class="container-fluid p-0">
    <div class="row">
        <div class="col-9">
            <h1 class="h3">Offline payment</h1>
        </div>
        
     </div>
     <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <input type="hidden" name="DueID" value="<?php echo $_GET['due']?>" id=" DueID">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 mb-2">
                                <label class="form-label">Installment Number</label>
                                <input type="text" style="text-align: right;" name="Installment" id="viewInstallment" class="form-control" placeholder="Installment">
                                <span id="ErrInstallment" class="error_msg"></span>
                            </div>
                             <div class="col-6 mb-2">
                                <label class="form-label">Due Amount </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">₹</span>
                                    </div>
                                    <input type="text" style="text-align: right;" name="DueAmount" id="viewDueAmount" class="form-control" placeholder="Due Amount">
                                </div>
                                <span id="ErrDueAmount" class="error_msg"></span>
                            </div>
                            
                            
                            <div class="col-6 mb-2" >
                                <label class="form-label">Gold Price </label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">₹</span>
                                    </div>
                                    <input type="text" style="text-align: right;" name="GoldPrice" id="viewGoldPrice" class="form-control" placeholder="Gold Price">
                                </div>
                                <span id="ErrGoldPrice" class="error_msg"></span>
                            </div>
                            <div class="col-6 mb-2">
                                <label class="form-label">Gold in Grams </label>
                                <input type="text" style="text-align: right;" name="GoldInGrams" id="viewGoldInGrams" readonly="readonly" class="form-control" placeholder="GoldInGrams">
                            </div>
                            <div class="col-12 mb-2">
                                <label class="form-label">Mode Of Benifits</label>
                                <input type="text" name="ModeOfBenifits" id="viewModeOfBenifits" class="form-control" placeholder="ModeOfBenefits">
                                <span id="ErrModeOfBenefits" class="error_msg"></span>
                            </div>
                            <div class="col-12 mb-2">
                                <label class="form-label">Transaction Date <span style='color:red'>*</span>
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Transaction Date</div>
                                    <div class="mycontainer">
                                        1. Allow only last 5 days transaction<br>
                                    </div>
                                </div>
                                </label>
                                <input type="text" readonly="readonly" value="<?php echo date("d-m-Y");?>" name="PaymentDate" id="PaymentDate" class="form-control" placeholder="Transaction Date">
                                <span id="ErrPaymentDate" class="error_msg"></span>
                            </div>                              
                            <div class="col-12 mb-2">
                                <label class="form-label">Select Bank <span style='color:red'>*</span>
                                 <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Select Bank</div>
                                    <div class="mycontainer">
                                        1. Cash deposit not allow<br>
                                    </div>
                                </div>
                                </label>
                                <select data-live-search="true" data-size="5" name="PaymentBankID" id="PaymentBankID" class="form-select mstateselect" onchange="getBankdetails()">
                                <option>loading...</option>
                                </select>
                                <span id="ErrPaymentBankID" class="error_msg"></span>
                                <div id="get_Bankdetails"></div>
                            </div>
                            <div class="col-12 mb-2">
                                <label class="form-label">Reference Number <span style='color:red'>*</span>
                                  <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Reference Number</div>
                                    <div class="mycontainer">
                                        1. Allow alphanumeric characters<br>
                                        2. Not allow cut,copy,paste<br>
                                        3. Not allow special charecters and space
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="BankReferenceNumber" id="BankReferenceNumber" class="form-control" placeholder="Bank Reference Number">
                                <span id="ErrBankReferenceNumber" class="error_msg"></span>
                            </div>  
                            
                            <div class="col-12 mb-3">
                                <label class="form-label">Payment Remarks 
                                <img src="<?php echo URL;?>assets/question.png" style="width: 12px;" class="dropdown"  id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="padding:0px;">
                                    <div class="myheader">Payment Remarks</div>
                                    <div class="mycontainer">
                                        1. Allow all characters, not allow <span style='color:red'>\'!~$"</span><br>
                                        2. Maximum 250 characters require<br>
                                        3. Not allow cut,copy,paste
                                    </div>
                                </div>
                                </label>
                                <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Payment Remarks">
                                <span id="ErrPaymentRemarks" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </form>
<div class="col-sm-12" style="text-align:right;">
    <a href="<?php echo URL;?>dashboard.php?action=contracts/list_paymentrequests" class="btn btn-warning btn-sm"  style="font-size: 10px">Previous Transaction</a>&nbsp;
    
            <?php 
            $path=URL."dashboard.php";
            if (isset($_GET['fpg'])) {
                $path=URL."dashboard.php?action=".$_GET['fpg'];
            }
            ?>
            <a href="<?php echo $path;?>" class="btn btn-outline-primary btn-sm" style="font-size: 10px">Back</a>
    &nbsp;
    <button onclick="confirmationtoadd()" type="button" class="btn btn-primary btn-sm" style="font-size: 10px">Submit</button>    
</div>
</div>
                    
                    

<div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Create ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" style="font-size: 10px;" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="addNew()" class="btn btn-primary btn-sm" style="font-size: 10px;">Yes, Continue</button>
      </div>
    </div>
  </div>
</div>



<script>

function confirmationtoadd(){
    clearDiv(['DueID','PaymentDate','PaymentBankID','BankReferenceNumber','Remarks']);
  $('#confirmation').modal("show");   
}     
function getData() {   
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=getPreCollectDueInformation&method=Contracts&ID=<?php echo $_GET['due']; ?>",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#viewInstallment').val(obj.data.Installment);
                $('#viewDueAmount').val(obj.data.DueAmount);
                $('#viewGoldInGrams').val(obj.data.GoldInGrams);
               $('#viewGoldPrice').val(obj.data.GoldPrice);
               $('#viewModeOfBenifits').val(obj.data.ModeOfBenifits +' / '+obj.data.MaterialType);
               $('#DueID').val(obj.data.DueID);
               $('#PaymentRemarks').val("");
                $('#PaymentBankID').val(obj.data.PaymentBankID);
                $('#popupcontent').html(success_content(obj.message,'closePopup'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message)
                } else {
                    $('#failure_div').html(obj.message);
                }
                $('#process_popup').modal('hide');
             }
        }
    });
}

function addNew() {
   $('#confirmation').modal("hide"); 
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['DueID','PaymentDate','PaymentBankID','BankReferenceNumber','Remarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=PaymentRequests",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#PaymentBankID').val(obj.PaymentBankID);
                $('#popupcontent').html(success_content(obj.message,'closePopup(); opencontractview'));
             } else {
                if (obj.div!="") {
                    $('#Err'+obj.div).html(obj.message)
                    $('#process_popup').modal('hide');
                } else {
                    $('#popupcontent').html( errorcontent(obj.message));
                }
                
             }
        }
    });
}
function opencontractview()  {
  location.href=URL +'dashboard.php?action=contracts/list_paymentrequests';  
}
setTimeout (function (){
    getData();
    listPaymentbank(); 
},1000)  ;

function listPaymentbank() {
    $.post(URL+ "webservice.php?action=listAllActive&method=PaymentBanks","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select Payment Bank</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.PaymentBankID+'">'+data.BankName+'</option>';
            });   
            $('#PaymentBankID').html(html);
             $("#PaymentBankID").append($("#PaymentBankID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $("#PaymentBankID").val("0");
            setTimeout(function(){
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

var PaymentRequestID="";

function getBankdetails() {
     $('#get_Bankdetails').html(""); 
     $('#ErrPaymentBankID').html(""); 
    if ($('#PaymentBankID').val()==0){
       $('#ErrPaymentBankID').html("Please Select Bank"); 
    }
  openPopup();
    $.post(URL+ "webservice.php?action=getDetails&method=PaymentBanks&ID="+$('#PaymentBankID').val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            closePopup();
            html = "";
            $.each(obj.data, function (index, data) {
                html += '<div style="padding: left;padding-left: 20px;font-size: 12px;background: #f9ffea;">'
                         + '<span>Name:&nbsp;&nbsp;' + data.AccountHolderName + '</span><br>'
                         + '<span>A/C Number:&nbsp;&nbsp;' + data.AccountNumber + '</span><br>'
                         + '<span>IFSC Code:&nbsp;&nbsp;' + data.IFSCode + '</span><br>'
                         + '<span>Branch:&nbsp;&nbsp;' + data.Branch + '</span><br>'
                         + '<span>Bank Name:&nbsp;&nbsp;' + data.BankName + '</span>'
                      + '</div>'; 
              }); 
            $('#get_Bankdetails').html(html);
            
        }  else {
            alert(obj.message);
        }
    });
}

</script>
         