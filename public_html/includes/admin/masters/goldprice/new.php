<div class="container-fluid p-0">
    <h1 class="h3 mb-3">Gold price</h1>
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Date <span style='color:red'>*</span></label>
                                <input type="date" name="SchemeCode" id="Scheme Code" class="form-control" placeholder="PRICE">
                                <span id="ErrCode" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                            </div> 
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(18kt) <span style='color:red'>*</span></label>
                                <input type="text"  name="price" id="price" class="form-control" placeholder="PRICE">
                                <span id="Errprice " class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(22kt)<span style='color:red'>*</span></label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="PRICE">
                                <span id="Errprice" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(24kt) <span style='color:red'>*</span></label>
                                <input type="text" name="price" id="price" class="form-control" placeholder="PRICE">
                                <span id="Errprice" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                               <label class="form-label">Remarks</label>
                               <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                               <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12" style="text-align:right;">
                                <a href="<?php echo URL;?>dashboard.php?action=masters/employees/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                                <button onclick="ConfirmationToAdd()" type="button" class="btn btn-primary">Save</button>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade" id="confimation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to save ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="addNew()" class="btn btn-primary">Yes, Continue</button>
      </div>
    </div>
  </div>
</div>
<script>
function ConfirmationToAdd() {
   $('#confimation').modal("show"); 
}
function addNew() {
    var param = $('#frm_create').serialize();
    openPopup();
    clearDiv(['EmployeeCode','EmployeeCategoryID','FatherName','EmployeeName','EmailID','MobileNumber','WhatsappNumber','AddressLine1','PinCode','ProfilePhoto','FatherName','StateNameID','DistrictNameID','AreaNameID','PancardNumber', 'AadhaarCardNumber','LoginUserName','LoginPassword','PinCode']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=Employees",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#frm_create').trigger("reset");
                $('#EmployeeCode').val(obj.EmployeeCode);
                $('#popupcontent').html(successcontent(obj.message));
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

function ListEmployeesCategory() {
    $.post(URL+ "webservice.php?action=ListAll&method=EmployeeCategories","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select Category</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.EmployeeCategoryID+'">'+data.EmployeeCategoryTitle+'</option>';
            });   
            $('#EmployeeCategoryID').html(html);
            
            
             $("#CustomerTypeNameID").append($("#CustomerTypeNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            
            $("#CustomerTypeNameID").val("0");
            setTimeout(function(){
                //$('.mselect').selectpicker();
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
            var html = "<option value='0'>Select State Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.StateNameID+'">'+data.StateName+'</option>';
            });   
            $('#StateNameID').html(html);
            
            
             $("#StateNameID").append($("#StateNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            
            $("#StateNameID").val("0");
            setTimeout(function(){
                //$('.mstateselect').selectpicker();
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function getDistrictNames() {
    $.post(URL+ "webservice.php?action=listDistrictNames&method=DistrictNames&StateNameID="+$('#StateNameID').val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select District Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.DistrictNameID+'">'+data.DistrictName+'</option>';
            });   
            $('#DistrictNameID').html(html);
            
            
             $("#DistrictNameID").append($("#DistrictNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            
            $("#DistrictNameID").val("0");
            setTimeout(function(){
                //$('.mdistrictselect').selectpicker();
            },1500);
        } else {
            alert(obj.message);
        }
    });
}

function getAreaNames() {
    $.post(URL+ "webservice.php?action=ListAreaNames&method=AreaNames&DistrictNameID="+$('#DistrictNameID').val()+"&StateNameID="+$("#StateNameID").val(),"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select Area Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.AreaNameID+'">'+data.AreaName+'</option>';
            });   
            $('#AreaNameID').html(html);
            
            
             $("#AreaNameID").append($("#AreaNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            
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
    ListEmployeesCategory();
    listStateNames();
},2000);
</script>