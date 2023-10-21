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
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form id="frm_goldprice" name="frm_goldprice" id="frm_goldprice">
                    <div class="row">
                    <div class="col-sm-9 mb-3">
                                <label class="form-label">Date Range <span style='color:red'>*</span></label>
                                <div class="input-group">
                                    <input type="date" name="FromDate" value="<?php echo date("Y-m-d");?>" id="FromDate" class="form-control" placeholder="From Date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">To</span>
                                </div>
                                <input type="date" value="<?php echo date("Y-m-d");?>" name="ToDate" id="ToDate" class="form-control" placeholder="To Date">
                                <button type="button" onclick="getData()" class="btn btn-primary">Get Data</button>
                            </div> 
                           <span id="Errmessage" class="error_msg"></span>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <div class="row" id="listData" style="display:none">
        <div class="col-12">
            <div class="card">
                <div class="card-body" style="padding-top:15px">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th style="width:100px">18kt</th>
                                <th style="width:100px">22kt</th>
                                <th style="width:100px">24kt</th>
                                <th style="width:70px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="5" style="text-align: center;background:#fff !important">Loading Gold price ...</td>
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
                    <input type="date"  value="<?php echo date("Y-m-d");?>" name="Date" id="Date" class="form-control" placeholder="Date">
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
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">No</button>
                <button type="button" onclick="confirmRemove()" class="btn btn-danger">Yes, Remove</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gold Price Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form name="frm_edit"  id="frm_edit">
            <input type="hidden" name="RateID" id="editRateID">
               <div class="row">
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Date <span style='color:red'>*</span></label>
                                <input type="date" name="Date" id="editDate" class="form-control" placeholder="Date">
                                <span id="ErreditDate" class="error_msg"></span>
                            </div>
                            <div class="col-sm-6 mb-3">
                            </div> 
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(18kt) <span style='color:red'>*</span></label>
                                <input type="text"  name="Gold18" id="editGold18" class="form-control" placeholder="PRICE(18kt)">
                                <span id="ErreditGold18" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(22kt)<span style='color:red'>*</span></label>
                                <input type="text" name="Gold22" id="editGold22" class="form-control" placeholder="PRICE(22kt)">
                                <span id="ErreditGold22" class="error_msg"></span>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label class="form-label">Price(24kt) <span style='color:red'>*</span></label>
                                <input type="text" name="Gold24" id="editGold24" class="form-control" placeholder="PRICE(24kt)">
                                <span id="ErreditGold24" class="error_msg"></span>
                            </div>
                            <div class="col-sm-12 mb-3">
                               <label class="form-label">Remarks</label>
                               <input type="text" name="Remarks" id="editRemarks" class="form-control" placeholder="Remarks">
                               <span id="ErreditRemarks" class="error_msg"></span>
                            </div>
            </div>
    </form>
</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Cancel</button>
                <button onclick="doUpdate()" type="button" class="btn btn-primary">Update</button>
            </div></div></div></div>
       
 <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gold Price Information</h5>
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
                $('#popupcontent').html(success_content(obj.message,"getData"));
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




function getData() {
     var param = $('#frm_goldprice').serialize();
    openPopup();
    $.post(URL+ "webservice.php?action=listAll&method=GoldRates",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.Date + '</td>'
                            + '<td>' + data.GOLD_18 + '</td>'
                            + '<td>' + data.GOLD_22 + '</td>'
                            + '<td>' + data.GOLD_24 + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.RateID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.RateID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.RateID+'\')">Delete</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
                            + '</tr>';
                             });
           if (obj.data.length==0) {
         html += '<tr>'
                    + '<td colspan="5" style="text-align: center;background:#fff !important">No Data Found</td>'
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
  
function edit(ID){
  $('#editForm').modal("show");
    $.post(URL+ "webservice.php?action=viewGoldRate&method=GoldRates&id="+ID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";                    
            $.each(obj.data, function (index, data) {
                $('#editDate').val(data.Date);
                $('#editGold18').val(data.GOLD_18);
                $('#editGold22').val(data.GOLD_22);
                $('#editGold24').val(data.GOLD_24);
                $('#editRemarks').val(data.Remarks);
                $('#editRateID').val(data.RateID);
            });   
}  
  });
}
 function doUpdate() {
    var param = $('#frm_edit').serialize();
    clearDiv(['editDate','editGold18','editGold22','editGold24','editRemarks']);
    jQuery.ajax({
        type: 'POST',
        url:URL+"webservice.php?action=doUpdate&method=GoldRates",
        data: new FormData($("#frm_edit")[0]),
        processData: false, 
        contentType: false, 
        success: function(data) {
             var obj = JSON.parse(data); 
             if (obj.status=="success") {
                 $('#editForm').modal("hide");
                 openPopup();
                $('#popupcontent').html(success_content(obj.message,"listAll"));
             } else {
                if (obj.div!="") {
                    $('#Erredit'+obj.div).html(obj.message)
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
                $('#viewGold18').val(data.GOLD_18);
                $('#viewGold22').val(data.GOLD_22);
                $('#viewGold24').val(data.GOLD_24);
                 $('#viewRemarks').val(data.Remarks);
                $('#viewRateID').val(data.RateID);
            });   
}  
  });
}

var RemoveID=0;
function confirmationtoDelete(ID){
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
                            + '<td>' + data.GOLD_18 + '</td>'
                            + '<td>' + data.GOLD_22 + '</td>'
                            + '<td>' + data.GOLD_24 + '</td>'
                            + '<td style="text-align:right">' 
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" onclick="view(\''+data.RateID+'\')">View</a>'
                                                + '<a class="dropdown-item" onclick="edit(\''+data.RateID+'\')">Edit</a>'
                                                + '<a class="dropdown-item" href="javascript:void(0)" onclick="confirmationtoDelete(\''+data.RateID+'\')">Delete</a>'
                                        + '</div>'
                                + '</div>'
                            + '</td>'
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