 <div class="container-fluid p-0">
    <h1 class="h3 mb-3">New Customer</h1>
     <form id="frm_create" name="frm_create" method="post" enctype="multipart/form-data">
        <input type="hidden" name="CustomerID">
        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Customer ID <span style='color:red'>*</span></label>
                                <input type="text" value="<?php echo SequnceList::getNextNumber("_tbl_masters_customers");?>" name="CustomerCode" id="CustomerCode" class="form-control" placeholder="Customer Code">
                                <span id="ErrCustomerCode" class="error_msg"></span>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        