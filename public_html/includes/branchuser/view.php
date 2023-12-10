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
                      <th scope="col">Gold Price On Date</th>
                      <th scope="col">Paid On</th>
                      <th scope="col">Receipt ID</th>
                      <th scope="col">Payment ID</th>
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
    
    
<div class="modal fade" id="addconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Payment Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container-fluid p-0">
                <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
                <input type="hidden" value="<?php echo $data[0][' StateNameID'];?>" name="StateNameID" id=" StateNameID">
        <div class="row">
            <div class="col-sm-12 mb-3">
                <label class="form-label">Amount <span style='color:red'>*</span></label>
                <input type="text" name="Amount" id="Amount" class="form-control" placeholder="Amount">
                <span id="ErrAmounte" class="error_msg"></span>
            </div><div class="col-sm-12 mb-3">
                <label class="form-label">Gold<span style='color:red'>*</span></label>
                <input type="text" name="Gold" id="Gold" class="form-control" placeholder="Gold">
                <span id="ErrGold" class="error_msg"></span>
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
        <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Pay</button>
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-12">
        <div style="background: #ffd6d6;padding: 25px;text-align: center;"> <button type="button" onclick="CloseModal()" class="btn btn-danger">Close Contract</button></div>
    </div>
</div>

 <div class="modal fade" id="closetoconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you want to Close Contract ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
                <button type="button" onclick="CloseContract()" class="btn btn-danger">Yes, Continue</button>
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
                           + '<td>' + (duedata.DueGold!="0" ? duedata.DueGold : '')+ '</td>'
                           + '<td>' + (duedata.GoldPriceOnDate!=null ? duedata.GoldPriceOnDate : '')+ '</td>'
                           + '<td>' + (duedata.PaidOn!=null ? duedata.PaidOn : '')+ '</td>'
                           + '<td>' + (duedata.ReceiptID!="0" ? duedata.ReceiptID : '')+ '</td>'
                           + '<td>' + (duedata.PaymentID!="0" ? duedata.PaymentID : '')+ '</td>'
                           + '<td style="text-align:right"><a href="javascript:void(0)" onclick="addForm(\''+data.ContractID+'\')" class="btn btn-primary btn-sm">Pay</a></td>'

                      + '</tr>';
             });
$('#tbl_content').html(html);
               closePopup();
        }
  });
}

function addForm(){
  $('#addconfirmation').modal("show");
      clearDiv(['Amount','Gold']);
}  
function addNew() {
    var param = $('#frm_create').serialize();
      clearDiv(['Amount','Gold']);
    $.post(URL+"webservice.php?action=addNew&method=Contracts",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#addconfirmation').modal("hide");
             openPopup();
            $('#frm_create').trigger("reset");
            if (obj.StateNameCode.length>3) {
                $('#Amount').val(obj.Amount);
            }
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

setTimeout("getData()",2000);

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

</script>