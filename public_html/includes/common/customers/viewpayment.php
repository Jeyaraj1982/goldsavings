 <div class="container-fluid p-0">
 <div class="col-sm-12">
    <div class="row">
        <div class="col-6">
            <h1 class="h3">View Payment</h1>
        </div>
     <div class="row"> 
        <div class="col-sm-12 col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Transaction Date</div>
                                <?php echo date("d-m-Y",strtotime($data[0]["TransactionDate"])) ;?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Installment Number</div>
                                <?php echo $data[0]['Installment'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Due Amount (₹)</div>
                                <?php echo $data[0]['DueAmount'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Mode Of Benifits</div>
                                <?php echo $data[0]['ModeOfBenifits'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">GoldPrice</div>
                                <?php echo $data[0]['GoldPrice'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Gold In Grams </div> 
                                <?php echo $data[0]['GoldInGrams'];?>
                            </div>
                            <div class="col-sm-12 mb-3">         
                                <div style="font-weight: bold;">Bank Name</div>
                                <?php echo $data[0]['PaymentBank'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Bank Reference Number</div>
                               <?php echo $data[0]['BankReferenceNumber'];?>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div style="font-weight: bold;">Payment Remarks</div>
                               <?php echo $data[0]['PaymentRemarks'];?>
                            </div>
                            
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>
<div class="col-sm-12" style="text-align:right;">
                <a href="<?php echo URL;?>dashboard.php?action=../common/customers/list" class="btn btn-outline-primary">Back</a>&nbsp;&nbsp;
            </div>

