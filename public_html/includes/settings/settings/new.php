<?php
    $data = $mysql->select("select * from _tbl_employees where EmployeeID='".$_GET['edit']."'");
?>
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">SMTP Settings</h1>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $data[0]['SmtpsettingsID'];?>" name="SmtpsettingsID">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Host Name <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['HostName'];?>" name="HostName" id="Host Name" class="form-control" placeholder="Host Name">
                                <span id="ErrHostName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">User Name <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['UserName'];?>" name="UserName" id="UserName" class="form-control" placeholder="User Name">
                                <span id="ErrUserName" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label"> Password <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['Password'];?>" name="Password" id="Password" class="form-control" placeholder="Password">
                                <span id="ErrPassword" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Protocol <span style='color:red'>*</span></label>
                                <select class="form-select" name="Protocol" id="Protocol">
                                    <option value="" <?php echo ($data[0]['Protocol']=="Select Protocol") ? " selected='selected' " : "";?>>Select Protocol</option>
                                    <option value="Male" <?php echo ($data[0]['Protocol']=="SSL") ? " selected='selected' " : "";?>>SSL</option>
                                    <option value="Female" <?php echo ($data[0]['Protocol']=="TLS") ? " selected='selected' " : "";?>>TLS</option>
                                </select>
                                <span id="ErrProtocol" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                            </div>
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">port Number <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo $data[0]['portNumber'];?>" name="portNumber" id="portNumber" class="form-control" placeholder="port Number">
                                <span id="ErrportNumber" class="error_msg"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mb-3" style="text-align:left;">
                <button onclick="totest()" type="button" class="btn btn-warning">Test</button>
            </div>
            <div class="col-sm-6 mb-3" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
                <button onclick="tosave()" type="button" class="btn btn-primary">save</button>
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
        Do you want to Test ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="dotest()" class="btn btn-primary">Yes,Test</button>
      </div>
    </div>
  </div>
</div>
 <div class="modal fade" id="save" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confimation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Do you want to Save ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="button" onclick="dosave()" class="btn btn-primary">Yes,Save</button>
      </div>
    </div>
  </div>
</div>                                
<div class="modal" id="page_popup" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content" id="page_popup_content" style="text-align: center;padding:30px;">
        <img src="<?php echo URL;?>assets/gif/spinner.gif" style="width:80px;margin:0px auto">
        Processing ...
    </div>
  </div>
</div>                            
<script>
function totest(){
   $('#confimation').modal("show");  
 }
 function tosave(){
   $('#save').modal("show");  
 }
var _EmployeeCategoryID = "<?php echo $data[0]['EmployeeCategoryID'];?>";
var _StateNameID = "<?php echo $data[0]['StateNameID'];?>";
var _DistrictNameID = "<?php echo $data[0]['DistrictNameID'];?>";
var _AreaNameID = "<?php echo $data[0]['AreaNameID'];?>";

function dotest() {
    $('#confimation').modal("hide");  
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['SmtpsettingsID','HostName','UserName','Password','Protocol','portNumber']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=Employees",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(success_content(obj.message));
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
function dosave() {
    $('#save').modal("hide");  
    var param = $('#frm_edit').serialize();
    openPopup();
    clearDiv(['SmtpsettingsID','HostName','UserName','Password','Protocol','portNumber']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=Employees",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                $('#popupcontent').html(success_content(obj.message));
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
    /*
    $.post(URL+"webservice.php?action=doUpdate&method=Customers",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            //$('#frm_newservice').trigger("reset");
            $('#popupcontent').html(successcontent(obj.message));
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            closePopup();
        }
    });
    */
}

function ListEmployeeCategories() {
    $.post(URL+ "webservice.php?action=ListAll&method=EmployeeCategories","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select Category</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.EmployeeCategoryID+'">'+data.EmployeeCategoryTitle+'</option>';
            });   
            $('#EmployeeCategoryID').html(html);
            
            
             $("#EmployeeCategoryID").append($("#EmployeeCategoryID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            setTimeout(function(){
                //$('.mselect').selectpicker();
                $('#EmployeeCategoryID option').each(function() {
                    if($(this).val() == _EmployeeCategoryID) {
                        $(this).prop("selected", true);
                    }
                });
            },1500);
        } else {
            alert(obj.message);
        }
        
    });
}

function listStateNames() {
    $.post(URL+ "webservice.php?action=ListAll&method=StateNames","",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select State Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.StateNameID+'">'+data.StateName+'</option>';
            });   
            $('#StateNameID').html(html);
            $("#StateNameID").append($("#StateNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $('#StateNameID option').each(function() {
                if($(this).val() == _StateNameID) {
                    $(this).prop("selected", true);
                }
            });
            setTimeout(function(){
               // $('.mstateselect').selectpicker();
                getDistrictNames();
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
            var html = "<option value='0'> Select State Name</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.DistrictNameID+'">'+data.DistrictName+'</option>';
            });   
            $('#DistrictNameID').html(html);
            $("#DistrictNameID").append($("#DistrictNameID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $('#DistrictNameID option').each(function() {
                if($(this).val() == _DistrictNameID) {
                    $(this).prop("selected", true);
                }
            });
            setTimeout(function(){
                //$('.mdistrictselect').selectpicker();
                getAreaNames();
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
            $('#AreaNameID option').each(function() {
                    if($(this).val() == _AreaNameID) {
                        $(this).prop("selected", true);
                    }
            });
            setTimeout(function(){
                //$('.mareaselect').selectpicker();
            },1500);
        } else {
            alert(obj.message);
        }
    });
}
setTimeout(function(){
    ListEmployeeCategories();
    listStateNames();
},2000);
</script> 