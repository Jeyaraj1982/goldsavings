<div class="container-fluid p-0 mb-3">
    <form id="frm_customreport" name="frm_create" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-6">
                        <h1 class="h3">Recent Payments</h1>
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
                                <input class="form-check-input" type="checkbox" value="1" id="PaymentRequestDate" name="PaymentRequestDate"  onclick="printPaymentRequestdate()">&nbsp;
                               Payment Request Date
                                <div id="PaymentRequestdate" style="display: none;">
                                    <div class="input-group">
                                        <input type="date" name="FromDate" value="<?php echo date("Y-m-d");?>" id="FromDate" class="form-control" placeholder="From Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">To</span>
                                        </div>
                                        <input type="date" name="ToDate" value="<?php echo date("Y-m-d");?>" id="ToDate" class="form-control" placeholder="To Date">
                                    </div>
                                    <span id="ErrPaymentRequestDate" class="error_msg"></span> 
                                </div> 
                            </div>
                            <script>
                                function printPaymentRequestdate() {
                                    OrderByContent();
                                    var checkBox = document.getElementById("PaymentRequestDate");
                                    var div = document.getElementById("PaymentRequestdate");
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
                                <input class="form-check-input" type="checkbox" value="1" id="PaymentRequestCode" name="PaymentRequestCode" onclick="OrderByContent()">&nbsp;
                                Payment Request ID
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
                                <input class="form-check-input" type="checkbox" value="1" id="ContractCode" name="ContractCode" onclick="OrderByContent()">&nbsp;
                                Contract ID
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="DueDate" name="DueDate" onclick="OrderByContent()">&nbsp;
                                Due Date
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
                                <input class="form-check-input" type="checkbox" value="1" id="BankName" name="BankName" onclick="OrderByContent()">&nbsp;
                                Bank Name
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="AccountNumber" name="AccountNumber" onclick="OrderByContent()">&nbsp;
                                Account Number
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="AccountHolderName" name="AccountHolderName" onclick="OrderByContent()">&nbsp;
                                Account Holder Name
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="IFSCode" name="IFSCode" onclick="OrderByContent()">&nbsp;
                                IFSC Code
                            </div>
                            
                             <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="Branch" name="Branch" onclick="OrderByContent()">&nbsp;
                                Branch
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="BankReferenceNumber" name="BankReferenceNumber" onclick="OrderByContent()">&nbsp;
                                Bank Reference Number
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="Frequency" name="Frequency" onclick="OrderByContent()">&nbsp;
                                Frequency
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="RequestStatus" name="RequestStatus" onclick="OrderByContent()">&nbsp;
                                Request Status
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="RequestUpdated" name="RequestUpdated" onclick="OrderByContent()">&nbsp;
                                Request Updated
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="PaymentRemarks" name="PaymentRemarks" onclick="OrderByContent()">&nbsp;
                                Payment Remarks
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="AdminRemarks" name="AdminRemarks" onclick="OrderByContent()">&nbsp;
                                Admin Remarks
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
     if ($('#PaymentRequestDate').prop("checked")) {
        html += "<option value='PaymentRequestDate'>Payment Request Date</option>";
     }
     
     if ($('#PaymentRequestCode').prop("checked")) {
        html += "<option value='PaymentRequestCode'>Payment Request ID</option>";
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
     if ($('#DueDate').prop("checked")) {
        html += "<option value='DueDate'>Due Date</option>";
     }
     if ($('#DueNumber').prop("checked")) {
        html += "<option value='DueNumber'>Due Number</option>";
     }
     if ($('#DueAmount').prop("checked")) {
        html += "<option value='DueAmount'>Due Amount</option>";
     }
     if ($('#BankName').prop("checked")) {
        html += "<option value='BankName'>Bank Name</option>";
     }
     if ($('#AccountNumber').prop("checked")) {
        html += "<option value='AccountNumber'>Account Number</option>";
     }
     if ($('#AccountHolderName').prop("checked")) {
        html += "<option value='AccountHolderName'>Account Holder Name</option>";
     }
     if ($('#IFSCode').prop("checked")) {
        html += "<option value='IFSCode'>IFSC Code</option>";
     }
     if ($('#Branch').prop("checked")) {
        html += "<option value='Branch'>Branch</option>";
     }
     if ($('#BankReferenceNumber').prop("checked")) {
        html += "<option value='BankReferenceNumber'>Bank Reference Number</option>";
     }
     if ($('#Frequency').prop("checked")) {
        html += "<option value='Frequency'>Frequency</option>";
     }
     if ($('#RequestStatus').prop("checked")) {
        html += "<option value='RequestStatus'>Request Status</option>";
     }
     if ($('#RequestUpdated').prop("checked")) {
        html += "<option value='RequestUpdated'>Request Updated</option>";
     }
     if ($('#PaymentRemarks').prop("checked")) {
        html += "<option value='PaymentRemarks'>Payment Remarks</option>";
     }
     if ($('#AdminRemarks').prop("checked")) {
        html += "<option value='AdminRemarks'>Admin Remarks</option>";
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
    $.post(URL+ "webservice.php?action=listCustomize&method=Customers",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        var column_count=0;
        if (obj.status=="success") {
            var html = "";
            var header="";
            
            header ="<tr>";
            if ($('#PaymentRequestDate').prop("checked")) {
                header += "<th>Payment Request Date</th>";
                column_count++;
            }
            if ($('#CustomerCode').prop("checked")) {
                header += "<th>Customer ID</th>";
                column_count++;
            }
            if ($('#PaymentRequestCode').prop("checked")) {
                header += "<th>Payment Request ID</th>";
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
            if ($('#DueDate').prop("checked")) {
                header += "<th>Due Date</th>";
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
            if ($('#BankName').prop("checked")) {
                header += "<th>Bank Name</th>";
                column_count++;
            }
            if ($('#AccountNumber').prop("checked")) {
                header += "<th>Account Number</th>";
                column_count++;
            }
            if ($('#AccountHolderName').prop("checked")) {
                header += "<th>Account Holder Name</th>";
                column_count++;
            }
            if ($('#IFSCode').prop("checked")) {
                header += "<th>IFSC Code</th>";
                column_count++;
            }
            if ($('#Branch').prop("checked")) {
                header += "<th>Branch</th>";
                column_count++;
            }
            if ($('#BankReferenceNumber').prop("checked")) {
                header += "<th>Bank Reference Number</th>";
                column_count++;
            }
            if ($('#Frequency').prop("checked")) {
                header += "<th>Frequency</th>";
                column_count++;
            }
            if ($('#RequestStatus').prop("checked")) {
                header += "<th>RequestStatus</th>";
                column_count++;
            }
            if ($('#RequestUpdated').prop("checked")) {
                header += "<th>RequestUpdated</th>";
                column_count++;
            }
            if ($('#PaymentRemarks').prop("checked")) {
                header += "<th>Payment Remarks</th>";
                column_count++;
            }
            if ($('#AdminRemarks').prop("checked")) {
                header += "<th>Admin Remarks</th>";
                column_count++;
            }
           
        header += "</tr>";
            
            $('#tbl_header').html(header) ;
            $.each(obj.data, function (index, data) {
              html +=    '<tr>';
              if ($('#PaymentRequestDate').prop("checked")) {
               html += '<td>' + data.PaymentRequestDate + '</td>';
              }
              if ($('#PaymentRequestCode').prop("checked")) {
               html += '<td>' + data.PaymentRequestCode + '</td>';
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
              if ($('#DueDate').prop("checked")) {
               html += '<td>' + data.DueDate + '</td>';
              }
              if ($('#DueNumber').prop("checked")) {
               html += '<td>' + data.DueNumber + '</td>';
              }
              if ($('#DueAmount').prop("checked")) {
               html += '<td>' + data.DueAmount + '</td>';
              }
              if ($('#BankName').prop("checked")) {
               html += '<td>' + data.BankName + '</td>';
              }
              if ($('#AccountNumber').prop("checked")) {
               html += '<td>' + data.AccountNumber + '</td>';
              }
              if ($('#AccountHolderName').prop("checked")) {
               html += '<td>' + data.AccountHolderName + '</td>';
              }
              if ($('#IFSCode').prop("checked")) {
               html += '<td>' + data.IFSCode + '</td>';
              }
              if ($('#Branch').prop("checked")) {
               html += '<td>' + data.Branch + '</td>';
              }
              if ($('#BankReferenceNumber').prop("checked")) {
               html += '<td>' + data.BankReferenceNumber + '</td>';
              }
              if ($('#Frequency').prop("checked")) {
               html += '<td>' + data.Frequency + '</td>';
              }
              if ($('#RequestStatus').prop("checked")) {
               html += '<td>' + data.RequestStatus + '</td>';
              }
              if ($('#RequestUpdated').prop("checked")) {
               html += '<td>' + data.RequestUpdated + '</td>';
              }
              if ($('#PaymentRemarks').prop("checked")) {
               html += '<td>' + data.PaymentRemarks + '</td>';
              }
              if ($('#AdminRemarks').prop("checked")) {
               html += '<td>' + data.AdminRemarks + '</td>';
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
     printPaymentRequestdate();
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
     printPaymentRequestdate();
     printCustomername();
     printMobilenumber();
    OrderByContent();
 }
 </script>      