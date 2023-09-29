<?php
  $data = $mysql->select("select * from _tbl_masters_users where UserID='".$_GET['User']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">My Profile</h1>
        </div>
        </div>
     <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-3 col-sm-3 col-xxl-3">
            <?php include_once("userprofile_side_menu.php"); ?>
        </div>
            <div class="col-9 col-sm-9 col-xxl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">My ID</div>
                                <div id="UserCode"></div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;"> Name</div>
                                <div id="UserName"></div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Father/Husband's Name</div>
                                <div id="FatherName"></div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Gender</div>
                                <div id="Gender"></div>
                            </div>
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Date Of Birth</div>
                                <div id="DateOfBirth"></div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">EmailID </div> 
                                <div id="EmailID"></div>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">Mobile Number</div>
                                    <div id="MobileNumber"></div>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">Whatsapp Number </div>
                                    <div id="WhatsappNumber"></div>
                            </div>
                            <div class="col-sm-12">
                                <hr>
                            </div>
                            <div class="col-sm-6 mb-3">         
                                <div style="font-weight: bold;">Login User Name</div>
                                <div id="LoginUserName"></div>
                            </div>
                            </div>
                        </div>
                    </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Address Line 1 </div>
                                <div id="AddressLine1"></div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Address Line 2</div>
                                <div id="AddressLine2"></div>
                            </div>
                            <div class="col-sm-6  mb-3">
                                <div style="font-weight: bold;">State Name</div>
                                <div id="StateName"></div>
                            </div>
                            <div class="col-sm-6  mb-3">
                                <div style="font-weight: bold;">District Name</div>
                                <div id="DistrictName"></div>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">Area Name</div>
                                <div id="AreaName"></div>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">PinCode </div>
                                <div id="PinCode"></div>
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div style="font-weight: bold;">Joined On</div>
                                <div id="JoinedOn"></div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>      
            <div class="col-sm-12 mb-3" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
            </div> 
    </form>                            
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
function view(){
    openPopup();
    $.post(URL+ "webservice.php?action=myData&method=Users","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#UserCode').html(data.UserCode );
                $('#UserName').html(data.UserName);
                $('#FatherName').html(data.FatherName);
                $('#Gender').html(data.Gender);
                $('#DateOfBirth').html(data.DateOfBirth);
                $('#EmailID').html(data.EmailID);
                $('#MobileNumber').html(data.MobileNumber);
                $('#WhatsappNumber').html(data.WhatsappNumber);
                $('#LoginUserName').html(data.LoginUserName);
                 $('#AddressLine1').html(data.AddressLine1);
                 $('#AddressLine2').html(data.AddressLine2);
                 $('#StateName').html(data.StateName);
                 $('#DistrictName').html(data.DistrictName);
                 $('#AreaName').html(data.AreaName);
                 $('#PinCode').html(data.PinCode);
                 $('#JoinedOn').html(data.CreatedOn);
            });   
}  
  });
}
setTimeout(function(){
    view();
},2000);
</script>