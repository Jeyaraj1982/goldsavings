<div class="container-fluid p-0 mb-3">
<form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
<div class="col-sm-12">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Customer report </h1>
        </div>
        <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Entry Date</label>
                                <div class="input-group">
                                    <input type="date" name="FromDate" value="<?php echo date("Y-m-d");?>" id="FromDate" class="form-control" placeholder="From Date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">To</span>
                                    </div>
                                    <input type="date" name="ToDate" value="<?php echo date("Y-m-d");?>" id="ToDate" class="form-control" placeholder="To Date">
                                </div> 
                                    <span id="Errmessage" class="error_msg"></span>
                                </div>
                                <div class="col-sm-3 mb-3">
                                </div>
                                <!--<div class="col-sm-6 mb-3">
                                <label class="form-label"> 
                                <input  class="form-check-input" type="checkbox" value="" id="CheckboxDateofBirth" onclick="printDateofBirth()">&nbsp;  
                                Date of Birth  </label>
                                <div style="display:none" id="DateofBirth">
                                <div class="input-group">
                                    <input type="date" name="FromDateofBirth" value="<?php echo date("Y-m-d");?>" id="FromDateofBirth" class="form-control" placeholder="From Date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">To</span>
                                    </div>
                                    <input type="date" name="ToDateofBirth" value="<?php echo date("Y-m-d");?>" id="ToDateofBirth" class="form-control" placeholder="To Date">
                                </div> 
                                    <span id="Errmessage" class="error_msg"></span>
                                </div>
                                </div>
                                <script>
                                function printDateofBirth() {
                                 var checkBox = document.getElementById("CheckboxDateofBirth");
                                 var div = document.getElementById("DateofBirth");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>-->
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="CustomerCode" name="CustomerCode">&nbsp;
                                    Customer ID
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="CustomerName" name="CustomerName">&nbsp;
                                    Customer Name
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="MobileNumber" name="MobileNumber">&nbsp;
                                     Mobile Number
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="EmailID" name="EmailID">&nbsp;
                                    Email ID
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="WhatsappNumber" name="WhatsappNumber">&nbsp;
                                    Whatsapp Number
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="AlternativeMobileNumber" name="AlternativeMobileNumber">&nbsp;
                                    Alternative Mobile Number
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="DateofBirth" name="DateofBirth">&nbsp;
                                    Date of Birth
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="LoginUserName" name="LoginUserName">&nbsp;
                                    Login User Name
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="LoginPassword" name="LoginPassword">&nbsp;
                                    Login Password
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="PancardNumber" name="PancardNumber">&nbsp;
                                    PAN Card Number
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="AadhaarCardNumber" name="AadhaarCardNumber">&nbsp;
                                    Aadhaar Card Number
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="ReferredByName" name="ReferredByName">&nbsp;
                                    Referred By Name
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="RefMobileNumber" name="RefMobileNumber">&nbsp;
                                    Referred By MobileNumber
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="Referrals" name="Referrals">&nbsp;
                                   Referrals
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="Contracts" name="Contracts">&nbsp;
                                   Number of contracts
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="Pendingdues" name="Pendingdues">&nbsp;
                                   Pending dues
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="AddressLine1" name="AddressLine1">&nbsp;
                                    Address Line 1
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="AddressLine2" name="AddressLine2">&nbsp;
                                    Address Line 2
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="PinCode" name="PinCode">&nbsp;
                                    Pincode
                                </div>
                                <div class="col-sm-8 mb-3">
                                </div>
                                 <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="StateName" name="StateName" onclick="printStateName()">&nbsp;
                                    State Name
                                <div  style="display:none" id="selectStateName">
                                    <div class="input-group">
                                      <select data-live-search="true" data-size="5" name="StateNameID" id="StateNameID" class="form-select mstateselect" onchange="getDistrictNames()">
                                        <option>All State Names</option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                                <script>
                                function printStateName() {
                                 var checkBox = document.getElementById("StateName");
                                 var div = document.getElementById("selectStateName");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="DistrictName" nam="DistrictName" onclick="printDistrictName()">&nbsp;
                                    District Name
                                <div  style="display:none" id="selectDistrictName">
                                    <div class="input-group">
                                     <select data-live-search="true" data-size="5" name="DistrictNameID" id="DistrictNameID" class="form-select mdistrictselect" onchange="getAreaNames()">
                                    <option>All District Names</option>
                                </select>
                                    </div>
                                </div>
                            </div>
                                <script>
                                function printDistrictName() {
                                 var checkBox = document.getElementById("DistrictName");
                                 var div = document.getElementById("selectDistrictName");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="AreaName" name="AreaName" onclick="printAreaName()">&nbsp;
                                    Area Name
                                <div style="display:none" id="selectAreaName">
                                    <div class="input-group">
                                    <select data-live-search="true" data-size="5" name="AreaNameID" id="AreaNameID" class="form-select mareaselect">
                                        <option>All Area Names</option>
                                </select>
                                    </div>
                                </div>
                            </div>
                                <script>
                                function printAreaName() {
                                 var checkBox = document.getElementById("AreaName");
                                 var div = document.getElementById("selectAreaName");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>
                                
                                <script>
                                function printChangegender() {
                                 var checkBox = document.getElementById("CheckboxGender");
                                 var div = document.getElementById("Gender");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>
                                <div class="col-sm-4 mb-1">
                                  <input class="form-check-input" type="checkbox" value="" id="CheckboxGender" name="CheckboxGender" onclick="printChangegender()">&nbsp;
                                    Gender
                                <div style="display:none" id="Gender">
                                    <div class="input-group">
                                        <select class="form-select" name="Gender" id="Gender">
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
                                 var checkBox = document.getElementById("CustomerType");
                                 var div = document.getElementById("selectCustomerTypeName");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>                                                      
                                <div class="col-sm-4 mb-1">
                                  <input class="form-check-input" type="checkbox" value="" id="CustomerType" name="CustomerType" onclick="printCustomertypename()">&nbsp;
                                    Customer Type
                                <div style="display:none" id="selectCustomerTypeName">
                                    <div class="input-group">
                                        <select data-live-search="true" data-size="5" name="CustomerTypeNameID" id="CustomerTypeNameID" class="form-select mselect">
                                    <option>loading...</option>
                                </select>
                                    </div>
                                </div>
                            </div>
                                <script>
                                function printReferredby() {
                                 var checkBox = document.getElementById("CheckboxReferByText");
                                 var div = document.getElementById("ReferByText");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>
                                <div class="col-sm-4 mb-1">
                                  <input class="form-check-input" type="checkbox" value="" id="CheckboxReferByText" onclick="printReferredby()">&nbsp;
                                    Referred By
                                <div style="display:none" id="ReferByText">
                                    <div class="input-group">
                                        <select class="form-select" name="ReferByText" id="ReferByText">
                                            <option value="0">All</option>
                                            <option value="Customer">Customer</option>
                                            <option value="Employee">Employee</option>
                                            <option value="Salesman">Salesman</option>
                                            <option value="User">User</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-1">
                                <hr>
                            </div>
                            <div class="col-12 mb-3">
                                <p class="h5">Advance Search </p>
                            </div>
                            
                                <script>
                                function printCustomername() {
                                 var checkBox = document.getElementById("CheckboxCustomerName");
                                 var div = document.getElementById("selectCustomerName");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="CheckboxCustomerName" onclick="printCustomername()">&nbsp;
                                    Customer Name
                                <div style="display:none" id="selectCustomerName">
                                    <div class="input-group">
                                        <select class="form-select" name="selectCustomerName" id="selectCustomerName">
                                            <option value="0">Any</option>
                                            <option value="Startwith">Start with</option>
                                            <option value="Endwith">End with</option>
                                        </select>
                                        <input type="text" name="SearchCustomerName" id="SearchCustomerName" class="form-control" placeholder="Customer Name">
                                    </div>
                                </div>
                            </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="CheckboxMobileNumber" onclick="printMobilenumber()">&nbsp;
                                    Mobile Number
                                <div style="display:none" id="selectMobileNumber">
                                    <div class="input-group">
                                        <select class="form-select" name="selectMobileNumber" id="selectMobileNumber">
                                            <option value="0">Select Type</option>
                                            <option value="Startwith">Start with</option>
                                            <option value="Endwith">End with</option>
                                        </select>
                                        <input type="text" name="SearchMobileNumber" id="SearchMobileNumber" class="form-control" placeholder="Mobile Number" data-masked="" data-inputmask="'mask':'9999999999'">
                                    </div>
                                </div>
                            </div> 
                                <script>
                                function printMobilenumber() {
                                 var checkBox = document.getElementById("CheckboxMobileNumber");
                                 var div = document.getElementById("selectMobileNumber");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
        </div>      
    </form>
        <div class="col-sm-12 mb-3" style="text-align:right;">
        <a href="<?php echo URL;?>dashboard.php" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
            <button type="button" onclick="getData()" class="btn btn-primary">Get Report</button>    
    </div>              
</div>

<div class="row" id="listData" style="display:none">
    <div class="col-12">
        <div class="card">
            <div class="card-body" style="padding-top:25px">
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

function getData() {
    var param = $('#frm_goldrate').serialize();
    openPopup();
    clearDiv(['message']);
    $.post(URL+ "webservice.php?action=ListAll&method=Customers",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            var header="";
            
            header ="<tr>";
            if ($('#CustomerCode').prop("checked")) {
                header += "<th>Customer ID</th>";
            }
            if ($('#CustomerName').prop("checked")) {
                header += "<th>Customer Name</th>";
            }
            if ($('#MobileNumber').prop("checked")) {
                header += "<th>MobileNumber</th>";
            }
            if ($('#EmailID').prop("checked")) {
                header += "<th>Email ID</th>";
            }
            if ($('#WhatsappNumber').prop("checked")) {
                header += "<th>Whatsapp Number</th>";
            }
            if ($('#AlternativeMobileNumber').prop("checked")) {
                header += "<th>Alternative Mobile Number</th>";
            }
            if ($('#DateofBirth').prop("checked")) {
                header += "<th>Date Of Birth</th>";
            }
             if ($('#LoginUserName').prop("checked")) {
                header += "<th>Login User Name</th>";
            }
            if ($('#LoginPassword').prop("checked")) {
                header += "<th>Login Password</th>";
            }
             if ($('#PancardNumber').prop("checked")) {
                header += "<th>PAN Card Number</th>";
            }
            if ($('#AadhaarCardNumber').prop("checked")) {
                header += "<th>Aadhaar Card Number</th>";
            }
             if ($('#ReferredByName').prop("checked")) {
                header += "<th>Referred By Name</th>";
            } 
             if ($('#RefMobileNumber').prop("checked")) {
                header += "<th>Refered by Mobile Number</th>";
            }
            if ($('#Referrals').prop("checked")) {
                header += "<th>Referrals</th>";
            }
             if ($('#Contracts').prop("checked")) {
                header += "<th>Contracts</th>";
            } 
            if ($('#Pendingdues').prop("checked")) {
                header += "<th>Pendingdues</th>";
            }
             if ($('#AddressLine1').prop("checked")) {
                header += "<th>AddressLine1</th>";
            } 
            if ($('#AddressLine2').prop("checked")) {
                header += "<th>AddressLine2</th>";
            }
            if ($('#StateName').prop("checked")) {
                header += "<th>State Name</th>";
            }
             if ($('#DistrictName').prop("checked")) {
                header += "<th>District Name</th>";
            } 
            if ($('#AreaName').prop("checked")) {
                header += "<th>Area Name</th>";
            } 
             if ($('#CheckboxGender').prop("checked")) {
                header += "<th>Gender</th>";
            }
            if ($('#CustomerType').prop("checked")) {
                header += "<th>Customer Type</th>";
            }
             if ($('#CheckboxReferByText').prop("checked")) {
                header += "<th>Refer By</th>";
            }
            /*if ($('#CreatedOn').prop("checked")) {
                header += "<th>Created On</th>";
            }
            if ($('#EntryDate').prop("checked")) {
                header += "<th>Entry Date</th>";
            }
             if ($('#PinCode').prop("checked")) {
                header += "<th>Pincode</th>";
            }
           
             if ($('#FatherName').prop("checked")) {
                header += "<th>FatherName</th>";
            }*/ 
           
        header += "</tr>";
            
            $('#tbl_header').html(header) ;
            $.each(obj.data, function (index, data) {
              html +=    '<tr>';
              if ($('#CustomerCode').prop("checked")) {
               html += '<td>' + data.CustomerCode + '</td>';
              }
              if ($('#CustomerName').prop("checked")) {
               html += '<td>' + data.CustomerName + '</td>';
              }
              if ($('#MobileNumber').prop("checked")) {
               html += '<td>' + data.MobileNumber + '</td>';
              }
               if ($('#EmailID').prop("checked")) {
               html += '<td>' + data.EmailID + '</td>';
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
              if ($('#Contracts').prop("checked")) {
               html += '<td>' + data.Contracts + '</td>';
              }
               if ($('#Pendingdues').prop("checked")) {
               html += '<td>' + data.Pendingdues + '</td>';
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
               if ($('#CheckboxGender').prop("checked")) {
               html += '<td>' + data.Gender + '</td>';
              }
              if ($('#CustomerType').prop("checked")) {
               html += '<td>' + data.CustomerTypeName + '</td>';
              } 
              if ($('#CheckboxReferByText').prop("checked")) {
               html += '<td>' + data.ReferByText + '</td>';
              }
              /*if ($('#CreatedOn').prop("checked")) {
               html += '<td>' + data.CreatedOn + '</td>';
              }
              if ($('#EntryDate').prop("checked")) {
               html += '<td>' + data.EntryDate + '</td>';
              }
              if ($('#FatherName').prop("checked")) {
               html += '<td>' + data.FatherName + '</td>';
              }  */
            html += '</tr>';
                           
            });
             if (obj.data.length==0) {
         html += '<tr>'
                    + '<td colspan="7" style="text-align: center;background:#fff !important">No Data Found</td>'
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

setTimeout(function(){
    ListCustomerTypes();
    listStateNames();               
},2000);
 </script>      