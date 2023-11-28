
<?php
    $data = $mysql->select("select * from _tbl_masters_customers where CustomerID='".$_GET['customer']."'");
?>
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Documents</h1>
        </div>
        <div class="col-6" style="text-align:right;">
            <button onclick="addForm()" type="button" class="btn btn-primary btn-sm">Add Documents</button>
        </div>
    <div class="col-12">
        <?php include_once("customer_side_menu.php"); ?>
    </div>
</div>
    <div class="row" id="_content">
    </div>
</div> 
   
    
<div class="modal fade" id="addconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Documents</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid p-0">
                    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?php echo $data[0][' DocumentTypeID'];?>" name="DocumentTypeID" id=" DocumentTypeID">
                        <input type="hidden" value="" name="CustomerID" id="CustomerID">
                        <div class="row">
                            <div class="col-sm-12  mb-3">
                                <label class="form-label">Document Type<span style='color:red'>*</span></label>
                                <select data-live-search="true" data-size="5" name="DocumentTypeID" id="DocumentTypeID" class="form-select mstateselect">
                                <option>loading...</option>
                                </select>
                                <span id="ErrDocumentTypeID" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12">
                                    <label class="form-label">Document File <span style='color:red'>*</span></label>
                                    <div class="input-group mb-3">
                                    <input type="file" name="DocumentFiles" id="DocumentFiles" class="form-control" placeholder="Document File" multiple >
                                    <input type="button" onclick=" uploadFiles();" value="Add File(s)" class="btn btn-primary">
                                    </div>
                                    <span id="ErrDocumentFiles" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div class="ath_container tile-container ">
                                    <!--<div id="uploadStatus"></div>-->
                                    <table id="progressBarsContainer">
                                        <!-- Table rows will be dynamically added here -->
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label class="form-label">Remarks</label>
                                <input type="text" name="Remarks" id="Remarks" class="form-control" placeholder="Remarks">
                                <span id="ErrRemarks" class="error_msg"></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" onclick="addNew()" class="btn btn-primary">Attach File</button>
            </div>
        </div>
    </div>
</div>
<script>
var _customerID='<?php echo $data[0]['CustomerID'];?>';

function listdocuments() {
    openPopup();
    $.post(URL+ "webservice.php?action=ListDocuments&method=Customers&CustomerID=<?php echo $data[0]["CustomerID"];?>","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
               html += '<div class="col-12">'
                            + '<div class="card mb-2">'
                                + '<div class="card-body" style="padding:10px 15px">'
                                    + '<div class="row">'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Document Type Name</div>'
                                            + '<div style="">'+data.DocumentTypeName+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right;"> <a href="'+URL+'download.php?file='+data.AttachmentID+'" style="outline:none" target="_blank"><img src="'+URL+'assets/icons/download.png"></a></div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">File Name</div>'
                                            + '<div style="">'+data.FileName+'</div>'
                                        + '</div>'
                     +'</div></div>'
                     +'</div>';
          });
            if (obj.data.length=="") {
         html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
    }  
            $('#_content').html(html);
        } else {
            html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
                $('#_content').html(html);
            $('#process_popup').modal('hide');
        }
    });
}

setTimeout("listdocuments()",2000);

function addForm(){
  $('#addconfirmation').modal("show");
  $('#frm_create').trigger("reset");
  $('#progressBarsContainer').html('');
  $('#CustomerID').val(_customerID);
  listDocumentTypes();
  clearDiv(['DocumentTypes','DocumentFile','Remarks']);
}  
function addNew() {
    
    var param = $('#frm_create').serialize();
    clearDiv(['DocumentTypes','DocumentFile','Remarks']);
    $.post(URL+"webservice.php?action=addDocument&method=Customers",param,function(data){
        var obj = JSON.parse(data); 
        if (obj.status=="success") {
            $('#addconfirmation').modal("hide");
            openPopup();
            $('#frm_create').trigger("reset");
            $('#popupcontent').html(success_content(obj.message,'closePopup();listdocuments')); 
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                $('#failure_div').html(obj.message);
            }
            $('#process_popup').modal('hide');
        }
    });
}
function listDocumentTypes(ID) {
    $.post(URL+ "webservice.php?action=listAllActive&method=DocumentTypes&ID"+ID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "<option value='0'> Select Document Type</option>";
            $.each(obj.data, function (index, data) {
                html += '<option value="'+data.DocumentTypeID+'">'+data.DocumentTypeName+'</option>';
            });   
            $('#DocumentTypeID').html(html);
             $("#DocumentTypeID").append($("#DocumentTypeID option").remove().sort(function(a, b) {
                var at = $(a).text(), bt = $(b).text();
                return (at > bt)?1:((at < bt)?-1:0);
            }));
            $("#DocumentTypeID").val("0");
            setTimeout(function(){
            },1500);
        } else {
            alert(obj.message);
        }
    });
}
</script>