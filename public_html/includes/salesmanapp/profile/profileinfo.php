<?php
  $data = $mysql->select("select * from _tbl_masters_salesman where SalesmanID='".$_GET['salesman']."'");
?>

<div class="container-fluid p-0">
<div class="col-sm-12">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Profile Info</h1>
        </div>
         <div class="col-6" style="text-align: right;">
            <a href="<?php echo URL;?>dashboard.php?action=profile/profile" style="font-size: 10px" class="btn btn-outline-primary btn-sm">Back</a>
        </div>
    </div>
</div>
        <div class="row">
               <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
            <div class="col-12 col-sm-12 col-xxl-12">
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <div style="font-weight: bold;">My ID</div>
                                <div id="SalesmanCode"></div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div style="font-weight: bold;"> Name</div>
                                <div id="SalesmanName"></div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div style="font-weight: bold;">Father/Husband's Name</div>
                                <div id="FatherName"></div>
                            </div>
                            <div class="col-6 mb-2">
                                <div style="font-weight: bold;">Gender</div>
                                <div id="Gender"></div>
                            </div>
                            <div class="col-6 mb-2">
                                <div style="font-weight: bold;">Date Of Birth</div>
                                <div id="DateOfBirth"></div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div style="font-weight: bold;">EmailID </div> 
                                <div id="EmailID"></div>
                            </div>
                            <div class="col-6 mb-2">
                                <div style="font-weight: bold;">Mobile Number</div>
                                    <div id="MobileNumber"></div>
                            </div>
                            <div class="col-6">
                                <div style="font-weight: bold;">Whatsapp Number </div>
                                    <div id="WhatsappNumber"></div>
                            </div>
                            <div class="col-sm-12">
                                <hr>
                            </div>
                            <div class="col-sm-12">         
                                <div style="font-weight: bold;">Login User Name</div>
                                <div id="LoginUserName"></div>
                            </div>
                            </div>
                        </div>
                    </div>
                <div class="card mb-2">
                    <div class="card-body">
                            <div class="col-sm-12">
                                <div style="font-weight: bold;">Address</div>
                                <div id="Address"></div>
                            </div>
                    </div>
                </div>
        </div>
        </form>      
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
function view(){
    openPopup();
    $.post(URL+ "webservice.php?action=myData&method=Salesman","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#SalesmanCode').html(data.SalesmanCode );
                $('#SalesmanName').html(data.SalesmanName);
                $('#FatherName').html(data.FatherName);
                $('#Gender').html(data.Gender);
                $('#DateOfBirth').html(data.DateOfBirth);
                $('#EmailID').html(data.EmailID);
                $('#MobileNumber').html(data.MobileNumber);
                $('#WhatsappNumber').html(data.WhatsappNumber);
                 if(data.WhatsappNumber>0){
                    $('#WhatsappNumber').html(data.WhatsappNumber);    
                }
                 if(data.WhatsappNumber>0){
                    +'N/A'; 
                }
                $('#LoginUserName').html(data.LoginUserName);
                 $('#Address').html(data.AddressLine1 +', '+data.AddressLine2 +', '+ data.AreaName +', '+data.DistrictName +','+data.StateName +'. ' +data.PinCode );
                 $('#EntryDate').html(data.EntryDate);
                 $('#CreatedOn').html(data.CreatedOn);
            });   
}  
  });
}
setTimeout(function(){
    view();
},2000);
</script>