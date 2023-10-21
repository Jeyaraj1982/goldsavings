<div class="container-fluid p-0">
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
                                  <input class="form-check-input" type="checkbox" value="" id="CustomerCode">&nbsp;
                                    Customer ID
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="CustomerName">&nbsp;
                                    Customer Name
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="MobileNumber">&nbsp;
                                     Mobile Number
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="EmailID">&nbsp;
                                    Email ID
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="WhatsappNumber">&nbsp;
                                    Whatsapp Number
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="AlternativeMobileNumber">&nbsp;
                                    Alternative Mobile Number
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="DateofBirth">&nbsp;
                                    Date of Birth
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="LoginUserName">&nbsp;
                                    Login User Name
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="LoginPassword">&nbsp;
                                    Login Password
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="PancardNumber">&nbsp;
                                    PAN Card Number
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="AadhaarCardNumber">&nbsp;
                                    Aadhaar Card Number
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="ReferredByName">&nbsp;
                                    Referred By Name
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="RefMobileNumber">&nbsp;
                                    Referred By MobileNumber
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="Referrals">&nbsp;
                                   Referrals
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="contracts">&nbsp;
                                   Number of contracts
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="Pendingdues">&nbsp;
                                   Pending dues
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="AddressLine1">&nbsp;
                                    Address Line 1
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="AddressLine2">&nbsp;
                                    Address Line 2
                                </div>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="PinCode">&nbsp;
                                    PinCode
                                </div>
                                <div class="col-sm-8 mb-3">
                                </div>
                                 <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="CheckboxStateName" onclick="printStateName()">&nbsp;
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
                                 var checkBox = document.getElementById("CheckboxStateName");
                                 var div = document.getElementById("selectStateName");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="CheckboxDistrictName" onclick="printDistrictName()">&nbsp;
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
                                 var checkBox = document.getElementById("CheckboxDistrictName");
                                 var div = document.getElementById("selectDistrictName");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>
                                <div class="col-sm-4 mb-3">
                                  <input class="form-check-input" type="checkbox" value="" id="CheckboxAreaName" onclick="printAreaName()">&nbsp;
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
                                 var checkBox = document.getElementById("CheckboxAreaName");
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
                                  <input class="form-check-input" type="checkbox" value="" id="CheckboxGender" onclick="printChangegender()">&nbsp;
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
                                 var checkBox = document.getElementById("CheckboxCustomerType");
                                 var div = document.getElementById("selectCustomerTypeName");
                                   if (checkBox.checked == true){
                                        div.style.display = "block";
                                      } else {
                                        div.style.display = "none";
                                      }
                                    } 
                                </script>                                                      
                                <div class="col-sm-4 mb-1">
                                  <input class="form-check-input" type="checkbox" value="" id="CheckboxCustomerType" onclick="printCustomertypename()">&nbsp;
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
        <div class="col-sm-12" style="text-align:right;">
        <a href="<?php echo URL;?>dashboard.php" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
            <button type="button" class="btn btn-primary">Get Report</button>    
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

setTimeout(function(){
    ListCustomerTypes();
    listStateNames();               
},2000);
 </script>      