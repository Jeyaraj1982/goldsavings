<div class="container-fluid p-0">
<div class="col-sm-12">
     <div class="row">
        <div class="col-6">
            <h1 class="h3">Contracts</h1>
            <h6 class="card-subtitle text-muted mb-3">List all Contracts</h6>
        </div>
        <div class="col-6" style="text-align:right;">
            <a href="<?php echo URL;?>dashboard.php?action=contracts/new" class="btn btn-primary btn-sm">New Contract</a>&nbsp;
            <a href="<?php echo URL;?>dashboard.php?" class="btn btn-outline-primary btn-sm">Back</a>
        </div>
     </div>
</div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card mb-2">
                <div class="card-body">
                    <form id="frm_contract" name="frm_contract" id="frm_contract">
                                <div class="col-sm-12 mb-2">
                                        <label class="form-label">Date Range <span style='color:red'>*</span></label>
                                    <div class="input-group">
                                        <input type="date" name="FromDate" value="<?php echo date("Y-m-d");?>" id="FromDate" class="form-control" placeholder="From Date">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">To</span>
                                    </div>
                                        <input type="date" value="<?php echo date("Y-m-d");?>" name="ToDate" id="ToDate" class="form-control" placeholder="To Date">
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-2">
                                    <label class="form-label">Select Status <span style='color:red'>*</span></label>
                                        <div class="input-group">
                                            <select class="form-select" name="SelectType" id="SelectType">
                                                <option value="ALL">All</option>
                                                <option value="ACTIVE">Active</option>
                                                <option value="CLOSED">Closed</option>
                                            </select>
                                        <div class="input-group-prepend">
                                            <button type="button" onclick="getData()" class="btn btn-primary">Get Data</button>
                                        </div> 
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <div class="row" id="_content" style="display:none">
                <!--<div class="card-body" style="padding-top:25px">
                <div class="card-actions float-end">
                      <a  href="#"  id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="align-middle" data-feather="download"></i></a>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Excel</a></li>
                        <li><a class="dropdown-item" href="#">PDF</a></li>
                      </ul>
                    </div>-->
                </div>
            </div>
<script>

function getData() {
    var param = $('#frm_contract').serialize();
    openPopup();
    $.post(URL+ "webservice.php?action=ListAll&method=Contracts",param,function(data){
        closePopup();
        var obj = JSON.parse(data);
        if (obj.status=="success") {
            var html = "";
            $.each(obj.data, function (index, data) {
                html += '<div class="col-sm-12">'
                            + '<div class="card mb-2">'
                                + '<div class="card-body" style="padding:10px 15px">'
                                    + '<div class="row">'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Contract ID</div>'
                                            + '<div style="">'+data.ContractCode+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right">'
                                             + '<div class="dropdown position-relative">'
                                                + '<a href="javascript:void(0)" data-bs-toggle="dropdown" data-bs-display="static" style="color:#9a9dc6">'
                                                 + '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal align-middle"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>'
                                                + '</a>'
                                                + '<div class="dropdown-menu dropdown-menu-end">'
                                                    + '<a class="dropdown-item" href="'+URL+'dashboard.php?action=contracts/view&view='+data.ContractCode+'&fpg=contracts/list">View</a>'
                                             + '</div>'
                                         + '</div>'
                                        + '<div class="col-12">'
                                            if (data.IsClosed=="0") {
                                                html += '<span class="badge bg-success">Active</span>';
                                            } else if (data.IsClosed=="1") {
                                                html += '<span class="badge bg-primary">Closed</span>';
                                            } 
                                          html += '</div>'
                                          + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Customer Name</div>'
                                            + '<div style="">'+data.CustomerName+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right;">'
                                            + '<div style="font-weight:bold;">Scheme Name</div>'
                                            + '<div style="">'+data.SchemeName+'</div>'
                                        + '</div>'
                                        + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">Scheme Amount</div>'
                                            + '<span>₹</span>&nbsp;<span style="">'+data.ContractAmount+'</span>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right;">'
                                            + '<div style="font-weight:bold;">Started</div>'
                                            + '<div style="">'+data.StartDate+'</div>'
                                        + '</div>'
                                         + '<div class="col-6">'
                                            + '<div style="font-weight:bold;">End</div>'
                                            + '<div style="">'+data.EndDate+'</div>'
                                        + '</div>'
                                        + '<div class="col-6" style="text-align:right;">'
                                            + '<span style="font-weight: bold;">' + data.PaidDues + '</span>' + '&nbsp;/&nbsp;' + '<span style="font-weight: bold;">' + data.UnPaidDues + '</span>&nbsp;<span>' + data.InstallmentMode + '</span>'
                                         + '</div>'
                                    + '</div>'
                                        
                                        +'<div class="col-sm-6" style="padding-top:5px;">'
                                            +'<table>'
                                                +'<tr>'
                                                    +'<td style="vertical-align: top"><img src="<?php echo URL;?>assets/gold-bars.png" align="middle"></td>'
                                                    +'<td style="line-height: 12px;"><span id="GoldInGram"><b>' + data.GoldInGram +'</b><br><span style="font-size:10px">Gms</span></span></td>'
                                                +'</tr>'
                                            +'</table>'
                                        +'</div>' 
                                   
                                        
                                + '</div>'
                            + '</div>';
 });
            if (obj.data.length=="") {
         html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
    }  
            $('#_content').html(html);
            $('#_content').show();
            
        } else {
            html += '<div>'
                    + '<div style="text-align: center;background:#fff !important">No Data Found</div>'
               + '</div>';
                $('#_content').html(html);
            $('#process_popup').modal('hide');
        }
    });
}


</script>