<div class="container-fluid p-0">
<form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
<div class="col-sm-12">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">Balance Sheet </h1>
        </div>
        <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <div style="font-weight: bold;">Date</div>
                                <?php echo $data[0]['SalesmanCode'];?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Received Amount </div> 
                                <?php echo $data[0]['EmailID'];?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>      
    </form>                            
</div> 