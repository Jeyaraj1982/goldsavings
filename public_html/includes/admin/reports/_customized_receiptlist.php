<div class="container-fluid p-0 mb-3">
    <form id="frm_customreport" name="frm_create" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-6">
                        <h1 class="h3">Receipts</h1>
                    </div>
                    <div class="col-6" style="text-align:right;"  onclick="OrderByContent()">
                        <span style="font-size: 10px;" onclick = "selectAll()">
                            <img src="<?php echo URL;?>assets/selectall.png" style="width: 16px;">
                            Select All
                        </span>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <span style="font-size: 10px;" onclick = "deselectAll()">
                            <img src="<?php echo URL;?>assets/deselectall.png" style="width: 16px;">
                            Deselect All
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="ReceiptDate" name="ReceiptDate"  onclick="printReceiptdate()">&nbsp;
                                Receipt Date
                                <div id="Receiptdate" style="display: none;">
                                    <div class="input-group">
                                        <input type="text" readonly="readonly" name="FromDate" value="<?php echo date("d-m-Y");?>" id="FromDate" class="form-control" placeholder="From Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">To</span>
                                        </div>
                                        <input type="text" readonly="readonly" name="ToDate" value="<?php echo date("d-m-Y");?>" id="ToDate" class="form-control" placeholder="To Date">
                                    </div>
                                    <span id="ErrReceiptDate" class="error_msg"></span> 
                                </div> 
                            </div>
                            <script>
                                function printReceiptdate() {
                                    OrderByContent();
                                    var checkBox = document.getElementById("ReceiptDate");
                                    var div = document.getElementById("Receiptdate");
                                    if (checkBox.checked == true){
                                        div.style.display = "block";
                                    } else {
                                        div.style.display = "none";
                                    }
                                }                 
                            </script>
                            <div class="col-sm-6 mb-1">
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="CustomerCode" name="CustomerCode" onclick="OrderByContent()">&nbsp;
                                Customer ID
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="CustomerName" name="CustomerName"  onclick="OrderByContent()">&nbsp;
                                Customer Name
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="MobileNumber" name="MobileNumber" onclick="OrderByContent()">&nbsp;
                                Mobile Number
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="ReceiptNumber" name="ReceiptNumber" onclick="OrderByContent()">&nbsp;
                                Receipt Number
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="ContractCode" name="ContractCode" onclick="OrderByContent()">&nbsp;
                                Contract ID
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="PriceOnDate" name="PriceOnDate" onclick="OrderByContent()">&nbsp;
                                Price on Date
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="DueNumber" name="DueNumber" onclick="OrderByContent()">&nbsp;
                                Due Number
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="DueAmount" name="DueAmount" onclick="OrderByContent()">&nbsp;
                                Due Amount
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="DueGold" name="DueGold" onclick="OrderByContent()">&nbsp;
                                Due Gold
                            </div>
                            
                             <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="PaidAmount" name="PaidAmount" onclick="OrderByContent()">&nbsp;
                                Paid Amount
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="PaymentMode" name="PaymentMode" onclick="OrderByContent()">&nbsp;
                                Payment Mode
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="PaymentRemarks" name="PaymentRemarks" onclick="OrderByContent()">&nbsp;
                                Payment Remarks
                            </div>
                            <div class="col-sm-12">
                                <hr>
                            </div>
                            <div class="col-12">
                                <p class="h5">Advance Search </p>
                            </div>
                            
                                <script>
                                function printCustomername() {
                                    OrderByContent();
                                 var checkBox = document.getElementById("CustomerNameS");
                                 var div = document.getElementById("selectCustomerName");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>
                                <div class="col-sm-6">
                                  <input class="form-check-input" type="checkbox" value="1" id="CustomerNameS" name="CustomerNameS" onclick="printCustomername()">&nbsp;
                                    Customer Name
                                <div style="display:none" id="selectCustomerName">
                                    <div class="input-group">
                                        <select class="form-select" name="selectCustomerFilter" id="selectCustomerFilter" style="width: 110px !important;
  flex: inherit;">
                                            <option value="0">Any</option>
                                            <option value="Startwith">Start with</option>
                                            <option value="Endwith">End with</option>
                                        </select>
                                        <input type="text" name="SearchCustomerName" id="SearchCustomerName" class="form-control" placeholder="Customer Name">
                                    </div>
                                </div>
                            </div>
                                <div class="col-sm-6">
                                  <input class="form-check-input" type="checkbox" value="1" id="MobileNumberS" name="MobileNumberS" onclick="printMobilenumber()">&nbsp;
                                    Mobile Number
                                <div style="display:none" id="selectMobileNumber">
                                    <div class="input-group">
                                        <select class="form-select" name="selectMobileNumberFilter" id="selectMobileNumberFilter"style="width: 110px !important;
  flex: inherit;">
                                            <option value="0">Any</option>
                                            <option value="Startwith">Start with</option>
                                            <option value="Endwith">End with</option>
                                        </select>
                                        <input type="text" name="SearchMobileNumber" id="SearchMobileNumber" class="form-control" placeholder="Mobile Number" maxlength="5">
                                    </div>
                                </div>
                            </div> 
                                <script>
                                function printMobilenumber() {
                                    OrderByContent();
                                 var checkBox = document.getElementById("MobileNumberS");
                                 var div = document.getElementById("selectMobileNumber");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>
                            <div class="col-sm-12">
                                <hr>
                            </div>
                        <div class="col-sm-6">
                                <label class="form-label">Oredr By</label>
                                <div class="input-group">
                                    <select name="OrderBy" id="OrderBy" class="form-select">
                                    <option value='0'>Select Column</option>
                                    </select>
                                <select name="Filterby" id="Filterby" class="form-select" style="width: 130px !important;
  flex: inherit;">>
                                    <option value="Asc">Ascending </option>
                                    <option value="Desc">Descending</option>
                                </select>
                                    
                                </div> 
                        </div>
                        <div class="col-sm-12">
                         <span id="Errmessage" class="error_msg"></span>
                        </div>
                    </div>
                </div>
        </div>
            
    
       <div class="col-sm-12 mb-3" style="text-align:right;">
        <a href="<?php echo URL;?>dashboard.php" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
            <button type="button" onclick="getData()" class="btn btn-primary">Get Report</button>    
    </div>  
    </div> 
    
</form>
</div>                      
<div class="row" id="listData" style="display:none">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="padding-top:25px">
                  <div class="dropdown" style="text-align: right;">
                      <button class="btn btn-light btn-sm dropdown-toggle" style="font-weight: lighter;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Export to
                      </button> <br>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style=" inset: 25px auto auto 0px !important;">
                                <li><a target="_blank" class="dropdown-item" style="padding-left: 11px;" onclick="$('#datatables-fixed-header').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo URL;?>assets/images/xls.png" width="24px"> XLS</a></li>
                                <li><a target="_blank" class="dropdown-item" style="padding-left: 11px;" onclick="$('#datatables-fixed-header').tableExport({type:'png',escape:'false'});"> <img src="<?php echo URL;?>assets/images/png.png" width="24px"> PNG</a></li>
                                <li><a target="_blank" class="dropdown-item" style="padding-left: 11px;" onclick="$('#datatables-fixed-header').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="<?php echo URL;?>assets/images/pdf.png" width="24px"> PDF</a></li>
                                <!--<li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src="<?php echo URL;?>images/json.jpg" width="24px">JSON (ignoreColumn)</a></li>
                                <li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'json',escape:'true'});"> <img src="<?php echo URL;?>images/json.jpg" width="24px"> JSON (with Escape)</a></li>
                                <!--<li class="divider"></li>
                                <li><a target="_blank" class="dropdown-item"  onclick="$('#datatables-fixed-header').tableExport({type:'xml',escape:'false'});"> <img src="<?php echo URL;?>images/xml.png" width="24px"> XML</a></li>
                                <li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'sql'});"> <img src="<?php echo URL;?>images/sql.png" width="24px"> SQL</a></li>
                                <!--<li class="divider"></li>
                                <li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'csv',escape:'false'});"> <img src="<?php echo URL;?>images/csv.png" width="24px"> CSV</a></li>
                                <li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'txt',escape:'false'});"> <img src="<?php echo URL;?>images/txt.png" width="24px"> TXT</a></li>
                                <!--<li class="divider"></li>             
                                <li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'doc',escape:'false'});"> <img src="<?php echo URL;?>images/word.png" width="24px"> Word</a></li>
                                <li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'powerpoint',escape:'false'});"> <img src="<?php echo URL;?>images/ppt.png" width="24px"> PowerPoint</a></li>
                                <!--<li class="divider"></li>-->
                      </ul>    
                    </div>
                <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                  <thead id="tbl_header">
                        </thead>
                    <tbody id="tbl_content">
                        <tr>
                            <td colspan="8" style="text-align: center;background:#fff !important">Loading reports ...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

 <script>

function OrderByContent() {
    
     var html = "";
     if ($('#ReceiptDate').prop("checked")) {
        html += "<option value='ReceiptDate'>Receipt Date</option>";
     }
     
     if ($('#CustomerCode').prop("checked")) {
        html += "<option value='CustomerCode'>Customer ID</option>";
     }
     if ($('#CustomerName').prop("checked")|| $('#CustomerNameS').prop("checked")) {
        html += "<option value='CustomerName'>Customer Name</option>";
     }
     if ($('#MobileNumber').prop("checked")|| $('#MobileNumberS').prop("checked")) {
        html += "<option value='MobileNumber'>Mobile Number</option>";
     } 
     if ($('#ContractCode').prop("checked")) {
        html += "<option value='ContractCode'>Contract ID</option>";
     }
     if ($('#PriceOnDate').prop("checked")) {
        html += "<option value='PriceOnDate'>Price On Date</option>";
     }
     if ($('#DueNumber').prop("checked")) {
        html += "<option value='DueNumber'>Due Number</option>";
     }
     if ($('#DueAmount').prop("checked")) {
        html += "<option value='DueAmount'>Due Amount</option>";
     }
     if ($('#DueGold').prop("checked")) {
        html += "<option value='DueGold'>Due Gold</option>";
     }
     if ($('#PaidAmount').prop("checked")) {
        html += "<option value='PaidAmount'>Paid Amount</option>";
     }
     if ($('#PaymentMode').prop("checked")) {
        html += "<option value='PaymentMode'>Payment Mode</option>";
     }
     if ($('#PaymentRemarks').prop("checked")) {
        html += "<option value='PaymentRemarks'>Payment Remarks</option>";
     }
        if (html==""){
            html += "<option value='0'>Select Column</option>";
       }
     $('#OrderBy').html(html);
     
}

function getData() {
    $('#listData').hide();
    clearDiv(['ReceiptDate','message'])
    var param = $('#frm_customreport').serialize();
    openPopup();
    clearDiv(['ReceiptDate','message']);
    $.post(URL+ "webservice.php?action=listCustomize&method=Receipts",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        var column_count=0;
        if (obj.status=="success") {
            var html = "";
            var header="";
            
            header ="<tr>";
            if ($('#ReceiptDate').prop("checked")) {
                header += "<th>Receipt Date</th>";
                column_count++;
            }
            if ($('#CustomerCode').prop("checked")) {
                header += "<th>Customer ID</th>";
                column_count++;
            }
            if ( $('#CustomerName').prop("checked") || $('#CustomerNameS').prop("checked")   ) {
                header += "<th>Customer Name</th>";
                column_count++;
            }
            if ($('#MobileNumber').prop("checked") || $('#MobileNumberS').prop("checked")) {
                header += "<th>Mobile Number</th>";
                column_count++;
            }
            if ($('#ContractCode').prop("checked")) {
                header += "<th>Contract ID</th>";
                column_count++;
            }
            if ($('#PriceOnDate').prop("checked")) {
                header += "<th>Price On Date</th>";
                column_count++;
            }
            if ($('#DueNumber').prop("checked")) {
                header += "<th>Due Number</th>";
                column_count++;
            }
            if ($('#DueAmount').prop("checked")) {
                header += "<th>Due Amount</th>";
                column_count++;
            }
            if ($('#DueGold').prop("checked")) {
                header += "<th>Due Gold</th>";
                column_count++;
            }
            if ($('#PaidAmount').prop("checked")) {
                header += "<th>Paid Amount</th>";
                column_count++;
            }
            if ($('#PaymentMode').prop("checked")) {
                header += "<th>Payment Mode</th>";
                column_count++;
            }
            if ($('#PaymentRemarks').prop("checked")) {
                header += "<th>Payment Remarks</th>";
                column_count++;
            }
           
        header += "</tr>";
            
            $('#tbl_header').html(header) ;
            $.each(obj.data, function (index, data) {
              html +=    '<tr>';
              if ($('#ReceiptDate').prop("checked")) {
               html += '<td>' + data.ReceiptDate + '</td>';
              }
              if ($('#CustomerCode').prop("checked")) {
               html += '<td>' + data.CustomerCode + '</td>';
              }
              if ( $('#CustomerName').prop("checked") || $('#CustomerNameS').prop("checked")   ) {
               html += '<td>' + data.CustomerName + '</td>';
              }
              if ($('#MobileNumber').prop("checked") || $('#MobileNumberS').prop("checked") ) {
               html += '<td>' + data.MobileNumber + '</td>';
              }
              if ($('#ContractCode').prop("checked")) {
               html += '<td>' + data.ContractCode + '</td>';
              }
              if ($('#PriceOnDate').prop("checked")) {
               html += '<td>' + data.PriceOnDate + '</td>';
              }
              if ($('#DueNumber').prop("checked")) {
               html += '<td>' + data.DueNumber + '</td>';
              }
              if ($('#DueAmount').prop("checked")) {
               html += '<td>' + data.DueAmount + '</td>';
              }
              if ($('#DueGold').prop("checked")) {
               html += '<td>' + data.DueGold + '</td>';
              }
              if ($('#PaidAmount').prop("checked")) {
               html += '<td>' + data.PaidAmount + '</td>';
              }
              if ($('#PaymentMode').prop("checked")) {
               html += '<td>' + data.PaymentMode + '</td>';
              }
              if ($('#PaymentRemarks').prop("checked")) {
               html += '<td>' + data.PaymentRemarks + '</td>';
              }
              
            html += '</tr>';
                           
            });
             if (obj.data.length==0) {
         html += '<tr>'
                    + '<td colspan="'+column_count+'" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }
            $('#tbl_content').html(html);
            $('#listData').show();
             
            
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
             $('#tbl_content').html("");
            $('#listData').hide();
            $('#process_popup').modal('hide');
        }
    });
}
function selectAll() {
     var checkboxes = document.getElementsByTagName('input');    
     for (var i = 0; i < checkboxes.length; i++) {
         if (checkboxes[i].type == 'checkbox') {
            // checkboxes[i].setAttribute('checked', true) // Or inputs[i].checked = true;
              checkboxes[i].checked = true;
         }
     }
     printReceiptdate();
     printCustomername();
     printMobilenumber();
    OrderByContent();
    
 }
 
 function deselectAll() {
     OrderByContent();
     var checkboxes = document.getElementsByTagName('input'); 
     for (var i = 0; i < checkboxes.length; i++) {
         if (checkboxes[i].type == 'checkbox') {
             //checkboxes[i].setAttribute('checked', false);
             checkboxes[i].checked = false; // Or inputs[i].checked = true;
         }
         
     }
     printReceiptdate();
     printCustomername();
     printMobilenumber();
    OrderByContent();
 }
 </script>      