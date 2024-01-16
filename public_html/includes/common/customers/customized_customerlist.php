 <script>
    var today="<?php echo date("d-m-Y");?>"; 
 </script>
<div class="container-fluid p-0 mb-3">
    <form id="frm_customreport" name="frm_create" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-6">
                        <h1 class="h3">Customers</h1>
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
                                        $('#FromDate').val(today);
                                        $('#ToDate').val(today);
                                    }
                                }                 
                            </script>
                            <div class="col-sm-6 mb-1">
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="BranchName" name="BranchName" onclick="printBranchName()">&nbsp;
                                Branch Name
                                <div  style="display:none" id="selectBranchName">
                                    <div class="input-group">
                                      <select data-live-search="true" data-size="5" name="BranchID" id="BranchID" class="form-select mstateselect">
                                        <option value="0">All Branch Names</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function printBranchName() {
                                    OrderByContent();
                                    var checkBox = document.getElementById("BranchName");
                                    var div = document.getElementById("selectBranchName");
                                    if (checkBox.checked == true){
                                        div.style.display = "block";
                                    } else {
                                        div.style.display = "none";
                                        $('#BranchID').val("0");
                                    }
                                } 
                            </script>
                             <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="BranchCode" name="BranchCode" onclick="OrderByContent()">&nbsp;
                                Branch ID
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
                                <input class="form-check-input" type="checkbox" value="1" id="FatherName" name="FatherName"  onclick="OrderByContent()">&nbsp;
                                Father / Husband Name
                            </div>
                            <script>
                                function printChangegender() {
                                    OrderByContent();
                                    var checkBox = document.getElementById("Gender");
                                    var div = document.getElementById("SelectGender");
                                    if (checkBox.checked == true){
                                        div.style.display = "block";
                                    } else {
                                        div.style.display = "none";
                                        $('#selectGenderFilter').val("0");
                                    }
                                } 
                            </script>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="Gender" name="Gender" onclick="printChangegender()">&nbsp;
                                Gender
                                <div style="display:none" id="SelectGender">
                                    <div class="input-group">
                                        <select class="form-select" name="selectGenderFilter" id="selectGenderFilter">
                                            <option value="0">All</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="TransGender">TransGender</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function printCustomertypename() {
                                    OrderByContent();
                                    var checkBox = document.getElementById("CustomerTypeName");
                                    var div = document.getElementById("selectCustomerTypeName");
                                    if (checkBox.checked == true){
                                        div.style.display = "block";
                                    } else {
                                        div.style.display = "none";
                                        $('#CustomerTypeNameID').val("0");
                                    }
                                } 
                            </script>                                                      
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="CustomerTypeName" name="CustomerTypeName" onclick="printCustomertypename()">&nbsp;
                                Customer Type
                                <div style="display:none" id="selectCustomerTypeName">
                                    <div class="input-group">
                                        <select data-live-search="true" data-size="5" name="CustomerTypeNameID" id="CustomerTypeNameID" class="form-select mselect">
                                            <option>loading...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="IsActive" name="IsActive" onclick="printStatus()">&nbsp;
                                Status
                                <div style="display:none" id="selectStatus">
                                    <div class="input-group">
                                        <select class="form-select" name="selectStatusFilter" id="selectStatusFilter">
                                            <option value="All">All</option>
                                            <option value="Active">Active</option>
                                            <option value="Deactive">Deactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            <script>
                                function printStatus() {
                                    OrderByContent();
                                    var checkBox = document.getElementById("IsActive");
                                    var div = document.getElementById("selectStatus");
                                    if (checkBox.checked == true){
                                        div.style.display = "block";
                                    } else {
                                        div.style.display = "none";
                                        $('#selectStatusFilter').val("0");
                                    }
                                } 
                            </script>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="EmailID" name="EmailID" onclick="OrderByContent()">&nbsp;
                                Email ID
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="MobileNumber" name="MobileNumber" onclick="OrderByContent()">&nbsp;
                                Mobile Number
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="WhatsappNumber" name="WhatsappNumber" onclick="OrderByContent()">&nbsp;
                                Whatsapp Number
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="AlternativeMobileNumber" name="AlternativeMobileNumber" onclick="OrderByContent()">&nbsp;
                                Alternative Mobile Number
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="DateofBirth" name="DateofBirth" onclick="OrderByContent()">&nbsp;
                                Date of Birth
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="LoginUserName" name="LoginUserName" onclick="OrderByContent()">&nbsp;
                                Login User Name
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="LoginPassword" name="LoginPassword" onclick="OrderByContent()">&nbsp;
                                Login Password
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="PancardNumber" name="PancardNumber" onclick="OrderByContent()">&nbsp;
                                PAN Card Number
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="AadhaarCardNumber" name="AadhaarCardNumber" onclick="OrderByContent()">&nbsp;
                                Aadhaar Card Number
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="ReferredByName" name="ReferredByName" onclick="OrderByContent()">&nbsp;
                                Referred By Name
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="RefMobileNumber" name="RefMobileNumber" onclick="OrderByContent()">&nbsp;
                                Referred By MobileNumber
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="Referrals" name="Referrals" onclick="OrderByContent()">&nbsp;
                                Referrals
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="CreatedBy" name="CreatedBy" onclick="OrderByContent()">&nbsp;
                                Created By
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="CreatedByName" name="CreatedByName" onclick="OrderByContent()">&nbsp;
                                Created By Name
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="Contracts" name="Contracts" onclick="OrderByContent()">&nbsp;
                                Contracts
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="Pendingdues" name="Pendingdues" onclick="OrderByContent()" >&nbsp;
                                Pending dues
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="Remarks" name="Remarks" onclick="OrderByContent()" >&nbsp;
                                Remarks
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="AddressLine1" name="AddressLine1" onclick="OrderByContent()">&nbsp;
                                Address Line 1
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="AddressLine2" name="AddressLine2" onclick="OrderByContent()">&nbsp;
                                Address Line 2
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="PinCode" name="PinCode" onclick="OrderByContent()">&nbsp;
                                Pincode
                            </div>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="StateName" name="StateName" onclick="printStateName()">&nbsp;
                                State Name
                                <div  style="display:none" id="selectStateName">
                                    <div class="input-group">
                                      <select data-live-search="true" data-size="5" name="StateNameID" id="StateNameID" class="form-select mstateselect" onchange="getDistrictNames()">
                                        <option value="0">All State Names</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <script>
                                function printStateName() {
                                    OrderByContent();
                                    var checkBox = document.getElementById("StateName");
                                    var div = document.getElementById("selectStateName");
                                    if (checkBox.checked == true){
                                        div.style.display = "block";
                                    } else {
                                        div.style.display = "none";
                                        $('#StateNameID').val("0");
                                    }
                                } 
                            </script>
                            <div class="col-sm-4 mb-1">
                                <input class="form-check-input" type="checkbox" value="1" id="DistrictName" name="DistrictName" onclick="printDistrictName()">&nbsp;
                                District Name
                                <div style="display:none" id="selectDistrictName">
                                    <div class="input-group">
                                        <select data-live-search="true" data-size="5" name="DistrictNameID" id="DistrictNameID" class="form-select mdistrictselect" onchange="getAreaNames()">
                                            <option value="0">All District Names</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <script>
                                function printDistrictName() {
                                    OrderByContent();
                                 var checkBox = document.getElementById("DistrictName");
                                 var div = document.getElementById("selectDistrictName");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                        $('#DistrictNameID').val("0");
                                      }
                                    } 
                                </script>
                                <div class="col-sm-4 mb-1">
                                  <input class="form-check-input" type="checkbox" value="1" id="AreaName" name="AreaName" onclick="printAreaName()">&nbsp;
                                    Area Name
                                <div style="display:none" id="selectAreaName">
                                    <div class="input-group">
                                    <select data-live-search="true" data-size="5" name="AreaNameID" id="AreaNameID" class="form-select mareaselect">
                                        <option value="0">All Area Names</option>
                                </select>
                                    </div>
                                </div>
                            </div>
                                <script>
                                function printAreaName() {
                                    OrderByContent();
                                 var checkBox = document.getElementById("AreaName");
                                 var div = document.getElementById("selectAreaName");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                        $('#AreaNameID').val("0");
                                      }
                                    } 
                                </script>
                                
                                
                                
                                <script>
                                function printReferredby() {
                                    OrderByContent();
                                 var checkBox = document.getElementById("CheckboxReferByText");
                                 var div = document.getElementById("ReferByText");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                        $('#SelectReferByText').val("0");
                                      }
                                    } 
                                </script>
                                <div class="col-sm-4">
                                  <input class="form-check-input" type="checkbox" value="1" id="CheckboxReferByText" onclick="printReferredby()">&nbsp;
                                    Referred By
                                <div style="display:none" id="ReferByText">
                                    <div class="input-group">
                                        <select class="form-select" name="SelectReferByText" id="SelectReferByText">
                                            <option value="0">All</option>
                                            <option value="Customer">Customer</option>
                                            <option value="Employee">Employee</option>
                                            <option value="Salesman">Salesman</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>
                                </div>
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
                                        $('#selectCustomerFilter').val("0");
                                        $('#SearchCustomerName').val("");
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
                                         $('#selectMobileNumberFilter').val("0");
                                         $('#SearchMobileNumber').val("");
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
  flex: inherit;">
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
        <a href="<?php echo URL;?>dashboard.php?action=../common/customers/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
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
                                <!--<li><a target="_blank" class="dropdown-item" style="padding-left: 11px;" onclick="$('#datatables-fixed-header').tableExport({type:'png',escape:'false'});"> <img src="<?php echo URL;?>assets/images/png.png" width="24px"> PNG</a></li>
                                <li><a target="_blank" class="dropdown-item" style="padding-left: 11px;" onclick="$('#datatables-fixed-header').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="<?php echo URL;?>assets/images/pdf.png" width="24px"> PDF</a></li>
                                <li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src="<?php echo URL;?>images/json.jpg" width="24px">JSON (ignoreColumn)</a></li>
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
                            <td colspan="8" style="text-align: center;background:#fff !important">Loading reports...</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

 <script>
 function ListBranches() {
    openPopup();
    $.post(URL+ "webservice.php?action=listAllActive&method=Branch","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'>All Branch Names</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.BranchID+'">'+data.BranchName+'</option>';
            });   
            $('#BranchID').html(html);
                 $("#BranchID").val("0");
                  setTimeout(function(){
            },1500);
            closePopup();
        } else {
           $('#popupcontent').html(errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}
 function ListCustomerTypes() {
     openPopup();
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
            closePopup();
        } else {
           $('#popupcontent').html(errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}

function listStateNames() {
    openPopup();
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
            closePopup();
        } else {
            $('#popupcontent').html(errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}

function getDistrictNames() {
    openPopup();
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
            closePopup();
        } else {
            $('#popupcontent').html(errorcontent(obj.message));
        }
    });
}

function getAreaNames() {
    openPopup();
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
            closePopup();
        } else {
            $('#popupcontent').html(errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
} 

function OrderByContent() {
     var html = "";
     if ($('#EntryDateC').prop("checked")) {
        html += "<option value='EntryDate'>Entry Date</option>";
     }
        if ($('#BranchName').prop("checked")) {
        html += "<option value='BranchID'>Branch Name</option>";
     }
     if ($('#BranchID').prop("checked")) {
        html += "<option value='BranchCode'>Branch ID</option>";
     }
     if ($('#CustomerName').prop("checked")|| $('#CustomerNameS').prop("checked")) {
        html += "<option value='CustomerName'>Customer Name</option>";
     }
     if ($('#CustomerCode').prop("checked")) {
        html += "<option value='CustomerCode'>Customer ID</option>";
     }
     if ($('#FatherName').prop("checked")) {
        html += "<option value='FatherName'>Father/Husband Name</option>";
     }
     if ($('#CustomerTypeName').prop("checked")) {
        html += "<option value='CustomerTypeNameID'>Customer Type</option>";
     }
      if ($('#CheckboxGender').prop("checked")) {
        html += "<option value='Gender'>Gender</option>";
     }
     if ($('#IsActive').prop("checked")) {
        html += "<option value='IsActive'>Status</option>";
     }
     if ($('#EmailID').prop("checked")) {
        html += "<option value='EmailID'>Email ID</option>";
     }
      if ($('#MobileNumber').prop("checked")|| $('#MobileNumberS').prop("checked")) {
        html += "<option value='MobileNumber'>Mobile Number</option>";
     }
     if ($('#WhatsappNumber').prop("checked")) {
        html += "<option value='WhatsappNumber'>Whatsapp Number</option>";
     }
     if ($('#AlternativeMobileNumber').prop("checked")) {
        html += "<option value='AlternativeMobileNumber'>Alternative Mobile Number</option>";
     }
      if ($('#DateofBirth').prop("checked")) {
        html += "<option value='DateOfBirth'>Date Of Birth</option>";
     }
     if ($('#LoginUserName').prop("checked")) {
        html += "<option value='LoginUserName'>Login User Name</option>";
     }
     if ($('#LoginPassword').prop("checked")) {
        html += "<option value='LoginPassword'>Login Password</option>";
     }
     if ($('#PancardNumber').prop("checked")) {
        html += "<option value='PancardNumber'>PAN Card Number</option>";
     }
     if ($('#AadhaarCardNumber').prop("checked")) {
        html += "<option value='AadhaarCardNumber'>Aadhaar Card Number</option>";
     }
     if ($('#ReferredByName').prop("checked")) {
        html += "<option value='ReferredByName'>Referred By Name</option>";
     }
     if ($('#RefMobileNumber').prop("checked")) {
        html += "<option value='RefMobileNumber'>Referred By Mobile Number</option>";
     }
     if ($('#ReferredByText').prop("checked")) {
        html += "<option value='ReferredByText'>Referred By</option>";
     }
      if ($('#CreatedBy').prop("checked")) {
        html += "<option value='CreatedBy'>Created By</option>";
     }
     if ($('#CreatedByName').prop("checked")) {
        html += "<option value='CreatedByName'>Created By Name</option>";
     }
     if ($('#Contracts').prop("checked")) {
        html += "<option value='Contracts'>Contracts</option>";
     }
     if ($('#PendingDues').prop("checked")) {
        html += "<option value='PendingDues'>PendingDues</option>";
     }
     if ($('#Remarks').prop("checked")) {
        html += "<option value='Remarks'>Remarks</option>";
     }
     if ($('#AddressLine1').prop("checked")) {
        html += "<option value='AddressLine1'>Address Line 1</option>";
     }
     if ($('#AddressLine2').prop("checked")) {
        html += "<option value='AddressLine2'>Address Line 2</option>";
     }
     if ($('#PinCode').prop("checked")) {
        html += "<option value='PinCode'>Pincode</option>";
     }
     if ($('#StateName').prop("checked")) {
        html += "<option value='StateNameID'>State Name</option>";
     }
     if ($('#DistrictName').prop("checked")) {
        html += "<option value='DistrictNameID'>District Name</option>";
     }
     if ($('#AreaName').prop("checked")) {
        html += "<option value='AreaNameID'>AreaName</option>";
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
    $.post(URL+ "webservice.php?action=listCustomize&method=Customers",param,function(data){
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
             if ($('#BranchName').prop("checked")) {
                header += "<th>Branch Name</th>";
                column_count++;
            }
            if ($('#BranchCode').prop("checked")) {
                header += "<th>Branch ID</th>";
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
            if ($('#FatherName').prop("checked")) {
                header += "<th>Father / Husband Name</th>";
                 column_count++;
            }
             if ($('#Gender').prop("checked")) {
                header += "<th>Gender</th>";
                 column_count++;
            }
            if ($('#CustomerTypeName').prop("checked")) {
                header += "<th>Customer Type</th>";
                 column_count++;
            }
             if ($('#IsActive').prop("checked")) {
                header += "<th>Status</th>";
                 column_count++;
            }
             if ($('#EmailID').prop("checked")) {
                header += "<th>Email ID</th>";
                 column_count++;
            }
            if ($('#MobileNumber').prop("checked") || $('#MobileNumberS').prop("checked")) {
                header += "<th>Mobile Number</th>";
                 column_count++;
            }
           
            if ($('#WhatsappNumber').prop("checked")) {
                header += "<th>Whatsapp Number</th>";
                 column_count++;
            }
            if ($('#AlternativeMobileNumber').prop("checked")) {
                header += "<th>Alternative Mobile Number</th>";
                 column_count++;
            }
            if ($('#DateofBirth').prop("checked")) {
                header += "<th>Date Of Birth</th>";
                 column_count++;
            }
             if ($('#LoginUserName').prop("checked")) {
                header += "<th>Login User Name</th>";
                 column_count++;
            }
            if ($('#LoginPassword').prop("checked")) {
                header += "<th>Login Password</th>";
                 column_count++;
            }
             if ($('#PancardNumber').prop("checked")) {
                header += "<th>PAN Card Number</th>";
                 column_count++;
            }
            if ($('#AadhaarCardNumber').prop("checked")) {
                header += "<th>Aadhaar Card Number</th>";
                 column_count++;
            }
             if ($('#ReferredByName').prop("checked")) {
                header += "<th>Referred By Name</th>";
                 column_count++;
            } 
             if ($('#RefMobileNumber').prop("checked")) {
                header += "<th>Refered by Mobile Number</th>";
                 column_count++;
            }
            if ($('#Referrals').prop("checked")) {
                header += "<th>Referrals</th>";
                 column_count++;
            }
             if ($('#CreatedBy').prop("checked")) {
                header += "<th>Created By</th>";
                 column_count++;
            }
            if ($('#CreatedByName').prop("checked")) {
                header += "<th>Created By Name</th>";
                 column_count++;
            }
             if ($('#Contracts').prop("checked")) {
                header += "<th>Contracts</th>";
                 column_count++;
            } 
            if ($('#Pendingdues').prop("checked")) {
                header += "<th>Pendingdues</th>";    
                 column_count++;
            }
            if ($('#Remarks').prop("checked")) {
                header += "<th>Remarks</th>";
                 column_count++;
            }
             if ($('#AddressLine1').prop("checked")) {
                header += "<th>Address Line 1</th>";
                 column_count++;
            } 
            if ($('#AddressLine2').prop("checked")) {
                header += "<th>Address Line 2</th>";
                 column_count++;
            }
             if ($('#PinCode').prop("checked")) {
                header += "<th>Pincode</th>";
                 column_count++;
            }
            if ($('#StateName').prop("checked")) {
                header += "<th>State Name</th>";
                 column_count++;
            }
             if ($('#DistrictName').prop("checked")) {
                header += "<th>District Name</th>";
                 column_count++;
            } 
            if ($('#AreaName').prop("checked")) {
                header += "<th>Area Name</th>";
                 column_count++;
            } 
            
             if ($('#CheckboxReferByText').prop("checked")) {
                header += "<th>Refer By</th>";
                 column_count++;
            }
           
           
        header += "</tr>";
            
            $('#tbl_header').html(header) ;
            $.each(obj.data, function (index, data) {
              html +=    '<tr>';
              if ($('#EntryDateC').prop("checked")) {
               html += '<td>' + data.EntryDate + '</td>';
              }
               if ($('#BranchName').prop("checked")) {
               html += '<td>' + data.BranchName + '</td>';
              }
              if ($('#BranchCode').prop("checked")) {
               html += '<td>' + data.BranchCode + '</td>';
              }
              if ($('#CustomerCode').prop("checked")) {
               html += '<td>' + data.CustomerCode + '</td>';
              }
              if ( $('#CustomerName').prop("checked") || $('#CustomerNameS').prop("checked")   ) {
               html += '<td>' + data.CustomerName + '</td>';
              }
              if ($('#FatherName').prop("checked")) {
               html += '<td>' + data.FatherName + '</td>';
              }
              if ($('#Gender').prop("checked")) {
               html += '<td>' + data.Gender + '</td>';
              }
              if ($('#CustomerTypeName').prop("checked")) {
               html += '<td>' + data.CustomerTypeName + '</td>';
              } 
               if ($('#IsActive').prop("checked")) {
                if (data.IsActive=="1")   {
                    html += '<td> Active </td>';
                } else { 
                    if (data.IsActive=="0")
                        html += '<td> DeActive </td>';
                }}
                if ($('#EmailID').prop("checked")) {
               html += '<td>' + data.EmailID + '</td>';
              }
              if ($('#MobileNumber').prop("checked") || $('#MobileNumberS').prop("checked") ) {
               html += '<td>' + data.MobileNumber + '</td>';
              }
               
               if ($('#WhatsappNumber').prop("checked")) {
               html += '<td>' + data.WhatsappNumber + '</td>';
              }
               if ($('#AlternativeMobileNumber').prop("checked")) {
               html += '<td>' + data.AlternativeMobileNumber + '</td>';
              }
              if ($('#DateofBirth').prop("checked")) {
               html += '<td>' + data.DateOfBirth + '</td>';
              }
               if ($('#LoginUserName').prop("checked")) {
               html += '<td>' + data.LoginUserName + '</td>';
              }
              if ($('#LoginPassword').prop("checked")) {
               html += '<td>' + data.LoginPassword + '</td>';
              } 
              if ($('#PancardNumber').prop("checked")) {
               html += '<td>' + data.PancardNumber + '</td>';
              }
              if ($('#AadhaarCardNumber').prop("checked")) {
               html += '<td>' + data.AadhaarCardNumber + '</td>';
              }
               if ($('#ReferredByName').prop("checked")) {
               html += '<td>' + data.ReferredByName + '</td>';
              }
              if ($('#RefMobileNumber').prop("checked")) {
               html += '<td>' + data.RefMobileNumber + '</td>';
              }
               if ($('#Referrals').prop("checked")) {
               html += '<td>' + data.Referrals + '</td>';
              }
              if ($('#CreatedBy').prop("checked")) {
               html += '<td>' + data.CreatedBy + '</td>';
              }
              if ($('#CreatedByName').prop("checked")) {
               html += '<td>' + data.CreatedByName + '</td>';
              }
              if ($('#Contracts').prop("checked")) {
               html += '<td>' + data.Contracts + '</td>';
              }
               if ($('#Pendingdues').prop("checked")) {
               html += '<td>' + data.Pendingdues + '</td>';
              }
              if ($('#Remarks').prop("checked")) {
               html += '<td>' + data.Remarks + '</td>';
              }
               if ($('#AddressLine1').prop("checked")) {
               html += '<td>' + data.AddressLine1 + '</td>';
              }
              if ($('#AddressLine2').prop("checked")) {
               html += '<td>' + data.AddressLine2 + '</td>';
              } 
              if ($('#PinCode').prop("checked")) {
               html += '<td>' + data.PinCode + '</td>';
              }
              if ($('#StateName').prop("checked")) {
                  html += '<td>' + data.StateName + '</td>';
              }
              if ($('#DistrictName').prop("checked")) {
               html += '<td>' + data.DistrictName + '</td>';
              }
              if ($('#AreaName').prop("checked")) {
               html += '<td>' + data.AreaName + '</td>';
              }
              
              if ($('#CheckboxReferByText').prop("checked")) {
               html += '<td>' + data.ReferByText + '</td>';
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
function selectAll() {
     var checkboxes = document.getElementsByTagName('input');    
     for (var i = 0; i < checkboxes.length; i++) {
         if (checkboxes[i].type == 'checkbox') {
            // checkboxes[i].setAttribute('checked', true) // Or inputs[i].checked = true;
              checkboxes[i].checked = true;
         }
     }
     printEntrydate();
     printBranchName();
     printChangegender();
     printCustomertypename();
     printStatus();
     printStateName();
     printDistrictName();
     printAreaName();
     printReferredby();
     printCustomername();
     printMobilenumber();
    OrderByContent();
 }
 function deselectAll() {
     $('#listData').hide();
     OrderByContent();
     var checkboxes = document.getElementsByTagName('input');  
     for (var i = 0; i < checkboxes.length; i++) {
         if (checkboxes[i].type == 'checkbox') {
             //checkboxes[i].setAttribute('checked', false);
             checkboxes[i].checked = false; // Or inputs[i].checked = true;
         }
     }
     printEntrydate();
     printBranchName();
     printChangegender();
     printCustomertypename();
     printStatus();
     printStateName();
     printDistrictName();
     printAreaName();
     printReferredby();
     printCustomername();
     printMobilenumber();
    OrderByContent();
     $('#CustomerTypeNameID').val("0");
     $('#BranchID').val("0");
     $('#selectGenderFilter').val("0");
     $('#selectStatusFilter').val("All");
     $('#SelectReferByText').val("0");
     $('#StateNameID').val("0");
     $('#DistrictNameID').val("0");
     $('#AreaNameID').val("0");
     $('#selectCustomerFilter').val("0");
     $('#selectMobileNumberFilter').val("0");
     $('#SearchCustomerName').val("");
     $('#SearchMobileNumber').val("");
     $('#FromDate').val(today);
     $('#ToDate').val(today);
    // $('#listData').hide();
 }

setTimeout(function(){
    ListBranches();
    ListCustomerTypes();
    listStateNames();
},2000);
 </script>      