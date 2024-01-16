<div class="container-fluid p-0">
<div class="col-sm-12">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Contracts created by me</h1>
            <h6 class="card-subtitle text-muted mb-3">List all contracts</h6>
        </div>
     </div>
</div>
     <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form id="frm_contract" name="frm_contract" id="frm_contract">
                    <div class="row">
                    <div class="col-sm-12 mb-3">
                                <label class="form-label">Date Range <span style='color:red'>*</span></label>
                                <div class="input-group">
                                <select class="form-select" name="SelectType" id="SelectType">
                                        <option value="ALL">All</option>
                                        <option value="ACTIVE">Active</option>
                                        <option value="CLOSED">Closed</option>
                                    </select>
                                    <input type="text" readonly="readonly" name="FromDate" value="<?php echo date("d-m-Y");?>" id="FromDate" class="form-control" placeholder="From Date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">To</span>
                                </div>
                                <input type="text" readonly="readonly" name="ToDate" value="<?php echo date("d-m-Y");?>" id="ToDate" class="form-control" placeholder="To Date">
                                
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
                <div class="card-body" style="padding-top:25px">
                <div class="dropdown" style="text-align: right;">
                      <button class="btn btn-light btn-sm dropdown-toggle" style="font-weight: lighter;" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Export to
                      </button> <br>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style=" inset: 25px auto auto 0px !important;">
                                <li><a target="_blank" class="dropdown-item" style="padding-left: 11px;" onclick="$('#datatables-fixed-header').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo URL;?>assets/images/xls.png" width="24px"> XLS</a></li>
                                <li><a target="_blank" class="dropdown-item" style="padding-left: 11px;" onclick="$('#datatables-fixed-header').tableExport({type:'png',escape:'false'});"> <img src="<?php echo URL;?>assets/images/png.png" width="24px"> PNG</a></li>
                                <li><a target="_blank" class="dropdown-item" style="padding-left: 11px;" onclick="$('#datatables-fixed-header').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> <img src="<?php echo URL;?>assets/images/pdf.png" width="24px"> PDF</a></li>
                                <!--<li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src="<?php echo URL;?>images/json.jpg" width="24px">JSON (ignoreColumn)</a></li>
                                <li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'json',escape:'true'});"> <img src="<?php echo URL;?>images/json.jpg" width="24px"> JSON (with Escape)</a></li>
                                <!--<li class="divider"></li>
                                <li><a target="_blank" class="dropdown-item"  onclick="$('#datatables-fixed-header').tableExport({type:'xml',escape:'false'});"> <img src="<?php echo URL;?>images/xml.png" width="24px"> XML</a></li>
                                <li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'sql'});"> <img src="<?php echo URL;?>images/sql.png" width="24px"> SQL</a></li>
                                <!--<li class="divider"></li>
                                <li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'csv',escape:'false'});"> <img src="<?php echo URL;?>images/csv.png" width="24px"> CSV</a></li>
                                <li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'txt',escape:'false'});"> <img src="<?php echo URL;?>images/txt.png" width="24px"> TXT</a></li>
                                <!--<li class="divider"></li>             
                                <li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'doc',escape:'false'});"> <img src="<?php echo URL;?>images/word.png" width="24px"> Word</a></li>
                                <li><a target="_blank" class="dropdown-item" onclick="$('#datatables-fixed-header').tableExport({type:'powerpoint',escape:'false'});"> <img src="<?php echo URL;?>images/ppt.png" width="24px"> PowerPoint</a></li>
                                <!--<li class="divider"></li>-->
                      </ul>                               
                    </div>
                    <table id="datatables-fixed-header" class="table table-striped" style="width:100%">
                        <thead>
                                <tr>
                                    <th>Contract<br>ID</th>
                                    <th>Customer<br>Name</th>
                                    <th>Scheme</th>
                                    <th style="text-align:right;">Contract<br>Amount(₹)</th>
                                    <th>Start<br>Date</th>
                                    <th>End<br>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                        <tbody id="tbl_content">
                            <tr>
                                <td colspan="8" style="text-align: center;background:#fff !important">Loading Contracts ...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
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
                <button type="button" onclick="Remove()" class="btn btn-danger">Yes, Remove</button>
            </div>
        </div>
    </div>
</div>   
<script>

function getData() {
    var param = $('#frm_contract').serialize();
    openPopup();
    $.post(URL+ "webservice.php?action=ListAll&method=Contracts&filter=CreatedByMe",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<tr>'
                       
                        + '<td>' + data.ContractCode + '</td>'
                        + '<td>' + data.CustomerName + '</td>'
                        + '<td>' + data.SchemeName + '</td>'
                        + '<td style="text-align:right">' + data.ContractAmount + '</td>'
                        + '<td style="text-align:right;">' + data.StartDate + '</td>'
                        + '<td style="text-align:right;">' + data.EndDate + '</td>'
                        + '<td style="text-align:right;">'
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=../common/contracts/view&view='+data.ContractCode+'&fpg=../common/contracts/createdbyme" >View</a>'
                                        html += '</div>'
                                + '</div>'
                            + '</td>'                                                                                                    
                      + '</tr>';
           }); 
            if (obj.data.length==0) {
         html += '<tr>'
                    + '<td colspan="9" style="text-align: center;background:#fff !important">No Data Found</td>'
               + '</tr>';
    }  
            $('#tbl_content').html(html);
            $('#listData').show();
            
        } else {
            if (obj.div!="") {
                $('#Err'+obj.div).html(obj.message);
                $('#process_popup').modal('hide');
            } else {
                $('#popupcontent').html(errorcontent(obj.message));
            }
            
        }
    }).fail(function(){
        networkunavailable(); 
    });
}

var RemoveID="";
function confirmationtoDelete(ID){
    RemoveID=ID;
    $('#confirmation').modal("show"); 
}
function Remove() {
     $('#confirmation').modal("hide"); 
  openPopup();
    $.post(URL+ "webservice.php?action=remove&method=Contracts&ID="+RemoveID,"",function(data){
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            html = "";
            $('#popupcontent').html(success_content(obj.message,'closePopup'));
            $.each(obj.data, function (index, data) {
                 html += '<tr>'
                       
                        + '<td>' + data.ContractCode + '</td>'
                        + '<td>' + data.CustomerName + '</td>'
                        + '<td>' + data.SchemeName + '</td>'
                        + '<td style="text-align:right">' + data.ContractAmount + '</td>'
                        + '<td style="text-align:right;">' + data.StartDate + '</td>'
                        + '<td style="text-align:right;">' + data.EndDate + '</td>'
                        + '<td style="text-align:right;">'
                                + '<div class="dropdown position-relative">'
                                        + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static">'
                                            + '<img src="'+URL+'assets/icons/more.png">'
                                        + '</a>'
                                        + '<div class="dropdown-menu dropdown-menu-end">'
                                                + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=../common/contracts/view&view='+data.ContractCode+'&fpg=../common/contracts/createdbyme" >View</a>'
                                        html += '</div>'
                                + '</div>'
                            + '</td>'                                                                                                    
                      + '</tr>';
           }); 
            if(obj.data.length==0){
            html += '<tr>'
                + '<td colspan="8" style="text-align: center;background:#fff !important">No data found</td>'
                + '</tr>'
            }   
            $('#tbl_content').html(html);
             if (($.fn.dataTable.isDataTable("#datatables-fixed-header"))) {
                $("#datatables-fixed-header").DataTable({
                    fixedHeader: true,
                    pageLength: 25
                });
            }
        } else {
           $('#popupcontent').html(errorcontent(obj.message));
        }
    }).fail(function(){
        networkunavailable(); 
    });
}
</script>