<div class="container-fluid p-0 mb-3">
    <form id="frm_customreport" name="frm_create" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-6">
                        <h1 class="h3">Contracts</h1>
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
                                <input class="form-check-input" type="checkbox" value="1" id="EntryDateC" name="EntryDate"  onclick="printEntrydate()">&nbsp;
                                Entry Date
                                <div id="Entrydate" style="display: none;">
                                    <div class="input-group">
                                        <input type="text" readonly="readonly" name="FromDate" value="<?php echo date("d-m-Y");?>" id="FromDate" class="form-control" placeholder="From Date">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">To</span>
                                        </div>
                                        <input type="text" readonly="readonly" name="ToDate" value="<?php echo date("d-m-Y");?>" id="ToDate" class="form-control" placeholder="To Date">
                                    </div>
                                    <span id="ErrEntryDate" class="error_msg"></span> 
                                </div> 
                            </div>
                            <script>
                                function printEntrydate() {
                                    OrderByContent();
                                    var checkBox = document.getElementById("EntryDateC");
                                    var div = document.getElementById("Entrydate");
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
                                <input class="form-check-input" type="checkbox" value="1" id="SchemeCode" name="SchemeCode" onclick="OrderByContent()">&nbsp;
                                Scheme ID
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="SchemeName" name="SchemeName" onclick="OrderByContent()">&nbsp;
                                Scheme Name
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="ContractCode" name="ContractCode" onclick="OrderByContent()">&nbsp;
                                Contract ID
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="ContractAmount" name="ContractAmount" onclick="OrderByContent()">&nbsp;
                                Contract Amount
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="DueAmount" name="DueAmount" onclick="OrderByContent()">&nbsp;
                                Due Amount
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="Duration" name="Duration" onclick="OrderByContent()">&nbsp;
                                Duration
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="InstallmentMode" name="InstallmentMode" onclick="OrderByContent()">&nbsp;
                                Installment Mode
                            </div>
                             <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="StartDate" name="StartDate" onclick="OrderByContent()">&nbsp;
                                Start Date
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="EndDate" name="EndDate" onclick="OrderByContent()">&nbsp;
                                End Date
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="MaterialType" name="MaterialType" onclick="OrderByContent()">&nbsp;
                                Material Type
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="ModeOfBenifits" name="ModeOfBenifits" onclick="OrderByContent()">&nbsp;
                                Mode Of Benifits
                            </div>
                              <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="WastageDiscount" name="WastageDiscount" onclick="OrderByContent()">&nbsp;
                                Wastage Discount
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="MakingChargeDiscount" name="MakingChargeDiscount" onclick="OrderByContent()">&nbsp;
                                Making Charge Discount
                            </div>
                             <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="TotalPaidAmount" name="TotalPaidAmount" onclick="OrderByContent()">&nbsp;
                                Total Paid Amount
                            </div>
                            
                             <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="IsClosed" name="IsClosed" onclick="printStatus()">&nbsp;
                                Status
                                <div style="display:none" id="selectStatus">
                                    <div class="input-group">
                                        <select class="form-select" name="selectStatusFilter" id="selectStatusFilter">
                                            <option value="All">All</option>
                                            <option value="Active">Active</option>
                                            <option value="PreClosed">PreClosed</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            <script>
                                function printStatus() {
                                    OrderByContent();
                                    var checkBox = document.getElementById("IsClosed");
                                    var div = document.getElementById("selectStatus");
                                    if (checkBox.checked == true){
                                        div.style.display = "block";
                                    } else {
                                        div.style.display = "none";
                                    }
                                } 
                            </script>
                            
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="SettlementGold" name="SettlementGold" onclick="OrderByContent()">&nbsp;
                                Settlement Gold
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="SettlementMaterial" name="SettlementMaterial" onclick="OrderByContent()">&nbsp;
                                Settlement Material
                            </div>
                             <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="VoucherNumber" name="VoucherNumber" onclick="OrderByContent()">&nbsp;
                                Voucher Number
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="CreatedBy" name="CreatedBy" onclick="OrderByContent()">&nbsp;
                                Created By
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="ClosedOn" name="ClosedOn" onclick="OrderByContent()">&nbsp;
                                Closed On
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
        <a href="<?php echo URL;?>dashboard.php?action=contracts/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
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
 
 function ListCustomerTypes() {
    $.post(URL+ "webservice.php?action=listAllActive&method=CustomerTypes","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>All Customer Types</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.CustomerTypeNameID+'">'+data.CustomerTypeName+'</option>';
            });   
            $('#CustomerTypeNameID').html(html);
            /*$("#CustomerTypeNameID").append($("#CustomerTypeNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            })); */
           
                 $("#CustomerTypeNameID").val("0");
                 setTimeout(function(){
            },1500);
           
        } else {
            alert(obj.message);
        }
    });
}

function listStateNames() {
   
    $.post(URL+ "webservice.php?action=listAllActive&method=StateNames","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>All State Names</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.StateNameID+'">'+data.StateName+'</option>';
            });   
            $('#StateNameID').html(html);
            /*$("#CustomerTypeNameID").append($("#CustomerTypeNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));*/
           
                 $("#StateNameID").val("0");
                  setTimeout(function(){
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function getDistrictNames() {
    $.post(URL+ "webservice.php?action=listAllActive&method=DistrictNames&StateNameID="+$('#StateNameID').val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>All District Names</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.DistrictNameID+'">'+data.DistrictName+'</option>';
            });   
            $('#DistrictNameID').html(html);
            /*$("#DistrictNameID").append($("#DistrictNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            })); */
            $("#DistrictNameID").val("0");
            setTimeout(function(){
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function getAreaNames() {
    $.post(URL+ "webservice.php?action=listAllActive&method=AreaNames&DistrictNameID="+$('#DistrictNameID').val()+"&StateNameID="+$("#StateNameID").val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>All Area Names</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.AreaNameID+'">'+data.AreaName+'</option>';
            });   
            $('#AreaNameID').html(html);
            /*$("#AreaNameID").append($("#AreaNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));*/
            $("#AreaNameID").val("0");
            setTimeout(function(){
               // $('.mareaselect').selectpicker();
            },1500);
        } else {
            alert(obj.message);
        }
    });
} 

function OrderByContent() {
    
     var html = "";
     if ($('#EntryDateC').prop("checked")) {
        html += "<option value='EntryDate'>Entry Date</option>";
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
     if ($('#SchemeCode').prop("checked")) {
        html += "<option value='SchemeCode'>Scheme ID</option>";
     }
      if ($('#SchemeName').prop("checked")) {
        html += "<option value='SchemeName'>Scheme Name</option>";
     }
     if ($('#ContractCode').prop("checked")) {
        html += "<option value='ContractCode'>Contract ID</option>";
     }
     if ($('#ContractAmount').prop("checked")) {
        html += "<option value='ContractAmount'>Scheme Amount</option>";
     }
     if ($('#DueAmount').prop("checked")) {
        html += "<option value='DueAmount'>Due Amount</option>";
     }
     if ($('#Duration').prop("checked")) {
        html += "<option value='Duration'>Duration</option>";
     }
     if ($('#InstallmentMode').prop("checked")) {
        html += "<option value='InstallmentMode'>Installment Mode</option>";
     }
     if ($('#StartDate').prop("checked")) {
        html += "<option value='StartDate'>Start Date</option>";
     }
     if ($('#EndDate').prop("checked")) {
        html += "<option value='EndDate'>End Date</option>";
     }
      if ($('#MaterialType').prop("checked")) {
        html += "<option value='MaterialType'>Material Type</option>";
     }
     if ($('#ModeOfBenifits').prop("checked")) {
        html += "<option value='ModeOfBenifits'>Mode Of Benifits</option>";
     }
      if ($('#WastageDiscount').prop("checked")) {
        html += "<option value='WastageDiscount'>Wastage Discount</option>";
     }
     if ($('#MakingChargeDiscount').prop("checked")) {
        html += "<option value='MakingChargeDiscount'>Making Charge Discount</option>";
     }
      if ($('#TotalPaidAmount').prop("checked")) {
        html += "<option value='TotalPaidAmount'>Total Paid Amount</option>";
     }
     if ($('#IsClosed').prop("checked")) {
        html += "<option value='IsClosed'>Status</option>";
     }
     if ($('#SettlementGold').prop("checked")) {
        html += "<option value='SettlementGold'>Settlement Gold</option>";
     }
     if ($('#SettlementMaterial').prop("checked")) {
        html += "<option value='SettlementMaterial'>Settlement Material</option>";
     }
     if ($('#VoucherNumber').prop("checked")) {
        html += "<option value='VoucherNumber'>Voucher Number</option>";
     }
     if ($('#CreatedBy').prop("checked")) {
        html += "<option value='CreatedBy'>Created By</option>";
     }
     if ($('#ClosedOn').prop("checked")) {
        html += "<option value='ClosedOn'>Closed On</option>";
     }
        if (html==""){
            html += "<option value='0'>Select Column</option>";
       }
     $('#OrderBy').html(html);
     
}

function getData() {
    $('#listData').hide();
    clearDiv(['EntryDateC','message'])
    var param = $('#frm_customreport').serialize();
    openPopup();
    clearDiv(['EntryDateC','message']);
    $.post(URL+ "webservice.php?action=listCustomize&method=Contracts",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        var column_count=0;
        if (obj.status=="success") {
            var html = "";
            var header="";
            
            header ="<tr>";
            if ($('#EntryDateC').prop("checked")) {
                header += "<th>Entry Date</th>";
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
            if ($('#SchemeCode').prop("checked")) {
                header += "<th>Scheme ID</th>";
                column_count++;
            }
            if ($('#SchemeName').prop("checked")) {
                header += "<th>Scheme Name</th>";
                column_count++;
            }
            if ($('#ContractCode').prop("checked")) {
                header += "<th>Contract ID</th>";
                column_count++;
            }
            if ($('#ContractAmount').prop("checked")) {
                header += "<th style='text-align:right;'>Contract Amount</th>";
                column_count++;
            }
            if ($('#DueAmount').prop("checked")) {
                header += "<th style='text-align:right;'>Due Amount</th>";
                column_count++;
            }
            if ($('#Duration').prop("checked")) {
                header += "<th style='text-align:right;'>Duration</th>";
                column_count++;
            }
            if ($('#InstallmentMode').prop("checked")) {
                header += "<th>Installment Mode</th>";
                column_count++;
            }
            if ($('#StartDate').prop("checked")) {
                header += "<th>Start Date</th>";
                column_count++;
            }
            if ($('#EndDate').prop("checked")) {
                header += "<th>End Date</th>";
                column_count++;
            }
            if ($('#MaterialType').prop("checked")) {
                header += "<th>MaterialType</th>";
                column_count++;
            }
            if ($('#ModeOfBenifits').prop("checked")) {
                header += "<th>Mode Of Benifits</th>";
                column_count++;
            }
            if ($('#WastageDiscount').prop("checked")) {
                header += "<th style='text-align:right;'>Wastage Discount</th>";
                column_count++;
            }
            if ($('#MakingChargeDiscount').prop("checked")) {
                header += "<th style='text-align:right;'>Making Charge Discount</th>";
                column_count++;
            }
            if ($('#TotalPaidAmount').prop("checked")) {
                header += "<th style='text-align:right;'>Total Paid Amount</th>";
                column_count++;
            }
             if ($('#IsClosed').prop("checked")) {
                header += "<th>Status</th>";
                column_count++;
            }
            if ($('#SettlementGold').prop("checked")) {
                header += "<th style='text-align:right;'>Settlement Gold</th>";
                column_count++;
            }
            if ($('#SettlementMaterial').prop("checked")) {
                header += "<th>Settlement Material</th>";
                column_count++;
            }
            if ($('#VoucherNumber').prop("checked")) {
                header += "<th>Voucher Number</th>";
                column_count++;
            }
            if ($('#CreatedBy').prop("checked")) {
                header += "<th>Created By</th>";
                column_count++;
            }
            if ($('#ClosedOn').prop("checked")) {
                header += "<th>Closed On</th>";
                column_count++;
            }
        header += "</tr>";
            
            $('#tbl_header').html(header) ;
            $.each(obj.data, function (index, data) {
              html +=    '<tr>';
              if ($('#EntryDateC').prop("checked")) {
               html += '<td>' + data.EntryDate + '</td>';
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
              if ($('#SchemeCode').prop("checked")) {
               html += '<td>' + data.SchemeCode + '</td>';
              }
              if ($('#SchemeName').prop("checked")) {
               html += '<td>' + data.SchemeName + '</td>';
              }
              if ($('#ContractCode').prop("checked")) {
               html += '<td>' + data.ContractCode + '</td>';
              }
              if ($('#ContractAmount').prop("checked")) {
               html += '<td style="text-align:right;">' + data.ContractAmount + '</td>';
              }
              if ($('#DueAmount').prop("checked")) {
               html += '<td style="text-align:right;">' + data.DueAmount + '</td>';
              }
              if ($('#Duration').prop("checked")) {
               html += '<td style="text-align:right;">' + data.Duration + '</td>';
              }
              if ($('#InstallmentMode').prop("checked")) {
               html += '<td>' + data.InstallmentMode + '</td>';
              }                      
              if ($('#StartDate').prop("checked")) {
               html += '<td>' + data.StartDate + '</td>';
              }
              if ($('#EndDate').prop("checked")) {
               html += '<td>' + data.EndDate + '</td>';
              }
              if ($('#MaterialType').prop("checked")) {
               html += '<td>' + data.MaterialType + '</td>';
              }
              if ($('#ModeOfBenifits').prop("checked")) {
               html += '<td>' + data.ModeOfBenifits + '</td>';
              }
              if ($('#WastageDiscount').prop("checked")) {
               html += '<td style="text-align:right;">' + data.WastageDiscount + '</td>';
              }
              if ($('#MakingChargeDiscount').prop("checked")) {
               html += '<td style="text-align:right;">' + data.MakingChargeDiscount + '</td>';
              }
              if ($('#TotalPaidAmount').prop("checked")) {
               html += '<td style="text-align:right;">' + data.TotalPaidAmount + '</td>';
              }
               if ($('#IsClosed').prop("checked")) {
                if (data.IsClosed=="1")   {
                    html += '<td> Closed </td>';
                } 
                if (data.IsClosed=="0") {
                        html += '<td> Active </td>';
                } 
                if (data.IsClosed=="2")   {
                        html += '<td> PreClosed </td>';
                }}
               if ($('#SettlementGold').prop("checked")) {
               html += '<td style="text-align:right;">' + data.SettlementGold + '</td>';
              } 
              if ($('#SettlementMaterial').prop("checked")) {
               html += '<td>' + data.SettlementMaterial + '</td>';
              } 
              if ($('#VoucherNumber').prop("checked")) {
               html += '<td>' + data.VoucherNumber + '</td>';
              }
              if ($('#CreatedBy').prop("checked")) {
               html += '<td>' + data.CreatedBy + '</td>';
              }
              if ($('#ClosedOn').prop("checked")) {
               html += '<td>' + data.ClosedOn + '</td>';
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
     printEntrydate();
     printStatus();
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
     printEntrydate();
     printStatus();
     printCustomername();
     printMobilenumber();
    OrderByContent();
 }
 </script>      