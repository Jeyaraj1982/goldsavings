<?php
 $data = $mysql->select("select * from _tbl_masters_goldrates where RateID='".$_GET['ID']."'");?>

 <div class="container-fluid p-0">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Gold Price</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form id="frm_goldrate" name="frm_goldrate" id="frm_goldrate">
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
                <div class="card-body" style="padding-top:25px;">
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:50px">Date</th>
                                <th style="width: 100px; text-align: right;">18kt</th>
                                <th style="width: 100px; text-align: right;">22kt</th>
                                <th style="width: 100px; text-align: right;">24kt</th>
                                <th style="width: 100px; text-align: right;">Silver</th>
                                <th style="width:50px"></th>
                            </tr>
                        </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="7" style="text-align: center;background:#fff !important">Loading Gold & silver price ...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

function getData() {
    var param = $('#frm_goldrate').serialize();
    openPopup();
    clearDiv(['message']);
    $.post(URL+ "webservice.php?action=listAll&method=goldRates",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                            + '<td>' + data.Date + '</td>'
                            + '<td  style="text-align:right">' + data.GOLD_18 + '</td>'
                            + '<td  style="text-align:right">' + data.GOLD_22 + '</td>'
                            + '<td  style="text-align:right">' + data.GOLD_24 + '</td>'
                            + '<td  style="text-align:right">' + data.SILVER + '</td>'
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
                    + '<td colspan="7" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }
            $('#tbl_content').html(html);
            $('#listData').show();
             
            
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message)
            } else {
                errorcontent(obj.message);
            }
             $('#tbl_content').html("");
            $('#listData').hide();
            $('#process_popup').modal('hide');
        }
    });
}
</script>