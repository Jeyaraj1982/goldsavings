<?php $data= $mysql->select("select * from _tbl_receipts where ReceiptNumber='".$_GET['number']."'");?>
<div class="container-fluid p-0">
<div class="col-sm-12">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Pending Dues</h1>
        </div>
        
        <div class="col-6" style="text-align: right;">
            <a href="<?php echo URL;?>dashboard.php?action=reports/pendingdues">All</a>&nbsp;|&nbsp;       
            
            <a href="<?php echo URL;?>dashboard.php?action=reports/pendingdues">Customer Wise</a>&nbsp;|&nbsp;        
            
            
            <a href="<?php echo URL;?>dashboard.php?action=reports/pendingdues">Salesman Wise</a>        
            </div>
        
     </div>
     </div>
    <!--<div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form id="frm_pendingdues" name="frm_pendingdues" id="frm_pendingdues">
                    <div class="row">
                    <div class="col-sm-9 mb-3">
                                <label class="form-label">Date Range <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <input type="date" name="FromDate" value="<?php echo date("Y-m-d");?>" id="FromDate" class="form-control" placeholder="From Date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">To</span>
                                </div>
                                <input type="date" name="ToDate" value="<?php echo date("Y-m-d");?>" id="ToDate" class="form-control" placeholder="To Date">
                                <button type="button" onclick="getData()" class="btn btn-primary">Get Data</button>
                            </div> 
                           <span id="Errmessage" class="error_msg"></span>
                    </div>
                     </div>
                    </form>
                </div>
            </div>
        </div>
    </div>-->
    <div class="row" id="listData">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Contract ID</th>
                                <th>Scheme</th>
                                <th>Due Date</th>
                                <th style="text-align: right;">Due Number</th>
                                <th style="text-align: right;">Due Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="7" style="text-align: center;background:#fff !important">Loading dues ...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?" class="btn btn-outline-primary btn-sm">Back</a>
     </div>
</div>


<script>

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
                html += '<tr>'
                           + '<td>' + data.CustomerName + '</td>'
                           + '<td>' + data.ContractCode + '</td>'
                           + '<td>' + data.SchemeName + '</td>'
                           + '<td>' + data.DueDate + '</td>'
                           + '<td style="text-align:right">' + data.DueNumber + '</td>'
                           + '<td style="text-align:right">' + data.DueAmount + '</td>'
                           + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                        + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                        + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/customers/view&customer='+data.CustomerID+'">View Customer</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'">View Contract</a>'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=masters/schemes/view&edit='+data.SchemeID+'">View Scheme</a>'
                                                 
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                      + '</tr>';
    });
            if (obj.data.length==0) {
         html += '<tr>'
                    + '<td colspan="7" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }  
            $('#tbl_content').html(html);
            //$('#listData').show();
            
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
setTimeout(function(){
    getData();               
},2000);
</script>
         