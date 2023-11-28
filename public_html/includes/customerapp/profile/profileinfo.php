<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
    <div class="row mb-2">
        <div class="col-6">
            <h1 class="h3">Profile Info</h1>
        </div>
         <div class="col-6" style="text-align: right;">
            <a href="<?php echo URL;?>dashboard.php?action=profile/profile" style="font-size: 10px" class="btn btn-outline-primary">Back</a>
        </div>
    </div>
     
    <div class="row">
        <form id="frm_edit" name="frm_edit" method="post" enctype="multipart/form-data">
            <div class="col-12 col-sm-12 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-2">
                                <div style="font-weight: bold">Customer ID</div>
                                <div id="CustomerCode"></div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div style="font-weight: bold">Customer Type</div>
                                <div  id="CustomerTypeName"></div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div style="font-weight: bold">Customer Name</div>
                                <div  id="CustomerName"></div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div style="font-weight: bold">Father/Husband's Name</div>
                                <div id="FatherName"></div>
                            </div>
                            <div class="col-sm-12 mb-2">
                                <div style="font-weight: bold">EmailID</div>
                                <div id="EmailID"></div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div style="font-weight: bold">Mobile Number</div>
                                    +91 <span id="MobileNumber"></span>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold">Whatsapp Number </div>
                                     +91 <span id="WhatsappNumber"></span>
                            </div>
                            <div class="col-sm-12">
                                <hr>
                            </div>
                            <div class="col-sm-6">         
                                <div style="font-weight: bold">Login User Name</div>
                                <div id="LoginUserName"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">                            
                            <div class="col-sm-6 mb-2">
                                <div style="font-weight: bold">PAN Card Number </div>
                                <div id="PancardNumber"></div>
                            </div>
                            <div class="col-sm-6">
                                <div style="font-weight: bold">Aadhaar Card Number</div>
                                <div id="AadhaarCardNumber"></div>
                            </div> 
                            <div class="col-sm-6">
                            </div> 
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-2">
                                <div style="font-weight: bold">Address</div>
                                <div id="Address"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-2">         
                                <div style="font-weight: bold">Referred By </div>
                               <div id="ReferredBy"></div>
                            </div>
                            <div class="col-sm-6 mb-2">
                                <div style="font-weight: bold">Joined On</div>
                                <div id="EntryDate"></div>
                            </div> 
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
    $.post(URL+ "webservice.php?action=myData&method=Customers","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#CustomerCode').html(data.CustomerCode );
                $('#CustomerTypeName').html(data.CustomerTypeName);
                $('#customer_type').html(data.CustomerTypeName);
                $('#CustomerName').html(data.CustomerName);
                $('#customer_name').html(data.CustomerName);
                $('#FatherName').html(data.FatherName);
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
                $('#PancardNumber').html(data.PancardNumber);
                $('#AadhaarCardNumber').html(data.AadhaarCardNumber);
                 $('#Address').html(data.AddressLine1 +', '+data.AddressLine2 +', '+ data.AreaName +', '+data.DistrictName +','+data.StateName +'. ' +data.PinCode );
                 $('#ReferredBy').html(data.ReferredByName);
                 $('#EntryDate').html(data.CreatedOn);
            });   
}  
  });
}
setTimeout(function(){
    view();
},2000);
</script>