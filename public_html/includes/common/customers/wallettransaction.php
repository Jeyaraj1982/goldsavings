<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>

<div class="container-fluid p-0">
    <div class="row">
        <div class="col-sm-6">
            <h1 class="h3 mb-0">Wallet Transaction</h1>
            <h6 class="card-subtitle text-muted mb-3">List all Transaction</h6>
        </div>
    <div class="row">
        <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("customer_side_menu.php"); ?>
        </div>
        <div class="col-9 col-sm-9 col-xxl-9">
            <div class="card">
                <div class="card-body">
                    <form id="frm_wallettransaction" name="frm_wallettransaction" id="frm_wallettransaction">
                    <input type="hidden" id="CustomerID" name="CustomerID" value="<?php echo $_GET['customer'];?>"> 
                    <div class="row">
                    <div class="col-12">
                                <label class="form-label">Date Range <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <input type="text" readonly="readonly" name="FromDate" value="<?php echo date("d-m-Y");?>" id="FromDate" class="form-control" placeholder="From Date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">To</span>
                                </div>
                                <input type="text" readonly="readonly" value="<?php echo date("d-m-Y");?>" name="ToDate" id="ToDate" class="form-control" placeholder="To Date">
                                <button type="button" onclick="getData()" class="btn btn-primary">Get Data</button>
                            </div> 
                           <span id="Errmessage" class="error_msg"></span>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
         <div class="card" id="listData" style="display:none">
                <div class="card-body">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Transaction<br>ID</th>
                                <th>Transaction<br>Date</th>
                                <th>Particular</th>
                                <th style="text-align:right">Credits</th>
                                <th style="text-align:right">Debits</th>
                                <th style="text-align:right">Balance</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                        <tr>
                            <td colspan="6" style="text-align: center;background:#fff !important">No data found</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="modal fade" id="modalviewTransaction" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <div class="modal-body">
                     <div class="row">
                           <div class="col-sm-6 mb-0">
                                <div style="font-weight: bold;">Transaction ID</div>
                                <div id="TxnRefID"></div>
                            </div>
                            <div class="col-sm-6 mb-0">
                                <div style="font-weight: bold;">Transaction Date</div>
                                <div id="TransactionDate"></div>
                            </div>
                            <div class="col-sm-6 mb-0">
                                <div style="font-weight: bold;">Particulars</div>
                                <div id="Particulars"></div>
                            </div> 
                            <div class="col-sm-6 mb-0">
                                <div style="font-weight: bold;">Credits</div>
                                <span>₹</span>&nbsp;<span id="Credits"></span>
                            </div>
                            <div class="col-sm-6 mb-0">
                                <div style="font-weight: bold;">Debits</div>
                                <span>₹</span>&nbsp;<span id="Debits"></span>
                            </div>
                            <div class="col-sm-6 mb-0">
                                <div style="font-weight: bold;">Balance</div>
                                <span>₹</span>&nbsp;<span id="Balance"></span>
                            </div>
                            <div class="col-sm-6 mb-0">
                                <div style="font-weight: bold;">PaymentType</div>
                                <div id="PaymentType"></div>
                            </div>
                     </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
   
<script> 
function getData() { 
    var param = $('#frm_wallettransaction').serialize();
    openPopup();
    $.post(URL+ "webservice.php?action=listAll&method=Wallet",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>' 
                    + '<td>' + data.TxnRefID + '</td>'
                    + '<td>' + data.TxnDate + '</td>'
                    + '<td>' + data.Particulars + '</td>'
                    + '<td style="text-align:right">' + data.Credits + '</td>'
                    + '<td style="text-align:right">' + data.Debits + '</td>'
                    + '<td style="text-align:right">' + data.Balance + '</td>'
                    + '<td style="text-align:right"><a class="btn btn-outline-primary btn-sm" style="font-size:10px" href="javascript:void(0)" onclick="view(\''+data.TxnID+'\')">View</a></td>'
                    + '</tr>';
          });
             if (obj.data.length==0) {
         html += '<tr>'
                    + '<td colspan="8" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }
            $('#tbl_content').html(html);
            $('#listData').show();
             
            
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message);
                $('#process_popup').modal('hide');
            } else {
                $('#popupcontent').html(errorcontent(obj.message)); 
            }
             $('#tbl_content').html("");
            $('#listData').hide();
            
        }
    }).fail(function(){
        networkunavailable(); 
    });
}
function view(ID){
  $('#modalviewTransaction').modal("show");          
  openPopup();
  $.post(URL+ "webservice.php?action=getData&method=Wallet&ID="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
            $('#TxnRefID').html(data.TxnRefID+"&nbsp;");
            $('#TransactionDate').html(data.TxnDate);
            $('#CustomerName').html(data.CustomerName);
            $('#Particulars').html(data.Particulars);
            $('#Credits').html(data.Credits);
            $('#Debits').html(data.Debits);
            $('#Balance').html(data.Balance);
            $('#PaymentType').html(data.PaymentType);
              }); 
         
}  
  }).fail(function(){
        networkunavailable(); 
    });
}

</script>