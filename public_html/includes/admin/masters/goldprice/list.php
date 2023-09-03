<?php
 $data = $mysql->select("select * from _tbl_masters_goldrates where RateID='".$_GET['ID']."'");?>

<div class="container-fluid p-0">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Gold price</h1>
            <h6 class="card-subtitle text-muted mb-3">List of Gold price</h6>
        </div>
        <div class="col-6" style="text-align:right;">
                <button onclick="confirmationtoadd()" type="button" class="btn btn-primary">New</button>    
            </div>
     </div>
     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:25px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:100px">Date</th>
                                <th>18kt</th>
                                <th>22kt</th>
                                <th>24kt</th>
                                <th style="width:200px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="5" style="text-align: center;background:#fff !important">Loading Goldprice ...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addconfirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New Gold Price</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid p-0">
    <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $data[0][' RateID'];?>" name="RateID" id=" RateID">
        <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Date <span style='color:red'>*</span></label>
                                <input type="date" name="Date" id="Date" class="form-control" placeholder="Date">
                                <span id="ErrDate" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(18kt) <span style='color:red'>*</span></label>
                                <input type="text"  name="Gold18" id="Gold18" class="form-control" placeholder="PRICE(18kt)">
                                <span id="ErrGold18" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(22kt)<span style='color:red'>*</span></label>
                                <input type="text" name="Gold22" id="Gold22" class="form-control" placeholder="PRICE(22kt)">
                                <span id="ErrGold22" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(24kt) <span style='color:red'>*</span></label>
                                <input type="text" name="Gold24" id="Gold24" class="form-control" placeholder="PRICE(24kt)">
                                <span id="ErrGold24" class="error_msg"></span>
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
        <button type="button" onclick="addNew()" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="confirmation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you want to Delete ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <button type="button" onclick="confirmRemove()" class="btn btn-primary">Yes, Remove</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">GoldPrice Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form name="frm_edit"  id="frm_edit">
            <input type="hidden" name="RateID" id="editRateID">
               <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Date <span style='color:red'>*</span></label>
                                <input type="date" name="Date" id="editDate" class="form-control" placeholder="Date">
                                <span id="ErrDate" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                            </div> 
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(18kt) <span style='color:red'>*</span></label>
                                <input type="text"  name="Gold18" id="editGold18" class="form-control" placeholder="PRICE(18kt)">
                                <span id="ErrGold18" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(22kt)<span style='color:red'>*</span></label>
                                <input type="text" name="Gold22" id="editGold22" class="form-control" placeholder="PRICE(22kt)">
                                <span id="ErrGold22" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(24kt) <span style='color:red'>*</span></label>
                                <input type="text" name="Gold24" id="editGold24" class="form-control" placeholder="PRICE(24kt)">
                                <span id="ErrGold24" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                               <label class="form-label">Remarks</label>
                               <input type="text" name="Remarks" id="editRemarks" class="form-control" placeholder="Remarks">
                               <span id="ErrRemarks" class="error_msg"></span>
                            </div>
            </div>
    </form>
</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button onclick="doUpdate()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
            </div></div></div></div>
       
 <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">GoldPrice Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Date </label>
                                <input type="date" value="" readonly="readonly" name="Date" id="viewDate" class="form-control" placeholder="Date">
                                <span id="ErrDate" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                            </div> 
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(18kt) </label>
                                <input type="text" value="" readonly="readonly"  name="Gold18" id="viewGold18" class="form-control" placeholder="PRICE(18kt)">
                                <span id="ErrGold18" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(22kt) </label>
                                <input type="text" value="" readonly="readonly" name="Gold22" id="viewGold22" class="form-control" placeholder="PRICE(22kt)">
                                <span id="ErrGold22" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(24kt) </label>
                                <input type="text" value="" readonly="readonly" name="Gold24" id="viewGold24" class="form-control" placeholder="PRICE(24kt)">
                                <span id="ErrGold24" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                               <label class="form-label">Remarks </label>
                               <input type="text" value="" readonly="readonly" name="Remarks" id="viewRemarks" class="form-control" placeholder="Remarks">
                               <span id="ErrRemarks" class="error_msg"></span>
                            </div>
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

<script>

function confirmationtoadd() {
   $('#addconfirmation').modal("show"); 
}
function addNew() {
     
    var param = $('#frm_create').serialize();
    
    clearDiv(['Date','Gold18','Gold22','Gold24','Remarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=addNew&method=GoldRates",
        data: new FormData($("#frm_create")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                 $('#addconfirmation').modal("hide");
                 openPopup();
                $('#frm_create').trigger("reset");
                $('#GoldRates').val(obj.GoldRates);
                $('#popupcontent').html(success_content(obj.message,'listAll'));
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


setTimeout(function(){
listAll();   
},2000);

function listAll() {
    openPopup();
    $.post(URL+ "webservice.php?action=listAll&method=GoldRates","",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.Date + '</td>'
                            + '<td>' + data.Gold18 + '</td>'
                            + '<td>' + data.Gold22 + '</td>'
                            + '<td>' + data.Gold24 + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="Remove(\''+data.RateID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a onclick="edit(\''+data.RateID+'\')" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a onclick="view(\''+data.RateID+'\')" class="btn btn-success btn-sm">View</a></td>'
                            + '</tr>';
            });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="5" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }   
            $('#tbl_content').html(html);
             if (($.fn.dataTable.isDataTable("#datatables-fixed-header"))) {
                $("#datatables-fixed-header").DataTable({
                    fixedHeader: true,
                    pageLength: 25
                });
            }
        } else {
            alert(obj.message);
        }
    });
} 
setTimeout("listAll()",2000);
  
function edit(ID){
  $('#editModal').modal("show");
  
    $.post(URL+ "webservice.php?action=viewGoldRate&method=GoldRates&id="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#editDate').val(data.Date);
                $('#editGold18').val(data.Gold18);
                $('#editGold22').val(data.Gold22);
                $('#editGold24').val(data.Gold24);
                $('#editRemarks').val(data.Remarks);
                $('#editRateID').val(data.RateID);
            });   
}  
  });
}
 function doUpdate() {
    $('#confirmationtoupdate').modal("hide");
    var param = $('#frm_edit').serialize();
    
    clearDiv(['Date','Gold18','Gold22','Gold24','Remarks']);
    
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=GoldRates",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                 
                 openPopup();
                $('#popupcontent').html(success_content(obj.message,"listAll"));
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

function view(ID){
  $('#viewModal').modal("show");
  
    $.post(URL+ "webservice.php?action=viewGoldRate&method=GoldRates&id="+ID,"",function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                $('#viewDate').val(data.Date);
                $('#viewGold18').val(data.Gold18);
                $('#viewGold22').val(data.Gold22);
                $('#viewGold24').val(data.Gold24);
                 $('#viewRemarks').val(data.Remarks);
                $('#viewRateID').val(data.RateID);
            });   
}  
  });
}

var RemoveID=0;
function Remove(ID){
    RemoveID=ID;
    $('#confirmation').modal("show");
}
function confirmRemove() {
    $('#confirmation').modal("hide");
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=GoldRates&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,"closePopup"));
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                          + '<td>' + data.Date + '</td>'
                            + '<td>' + data.Gold18 + '</td>'
                            + '<td>' + data.Gold22 + '</td>'
                            + '<td>' + data.Gold24 + '</td>'
                            + '<td style="text-align:right"><a href="javascript:void(0)" onclick="Remove(\''+data.RateID+'\')" class="btn btn-outline-danger btn-sm">Delete</a>&nbsp;&nbsp;<a onclick="edit(\''+data.RateID+'\')" class="btn btn-primary btn-sm">Edit</a>&nbsp;&nbsp;<a onclick="view(\''+data.RateID+'\')" class="btn btn-success btn-sm">View</a></td>'
                            + '</tr>';
            });
            if (obj.data.length==0) {
                 html += '<tr>'
                            + '<td colspan="5" style="text-align: center;background:#fff !important">No Data Found</td>'
                       + '</tr>';
            }  
            $('#tbl_content').html(html);
        } else {
            $('#popupcontent').html(errorcontent(obj.message));            
        }
    });
}   

</script>