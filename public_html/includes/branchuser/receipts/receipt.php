<?php $data= $mysql->select("select * from _tbl_receipts where ReceiptNumber='".$_GET['number']."'");?>

<div class="container-fluid p-0">
    <h1 style="font-weight: bold;" class="h3">Receipt</h1>
    <div class="row"> 
        <div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                         <div class="col-6">
                            <img src="<?php echo WEB_URL."/assets/qrcodes/".md5($data[0]["ReceiptNumber"]).".png";?>">
                        </div>
                         <div class="col-6 mb-2" style="text-align: right;">
                           <div style="font-weight: bold" id="CustomerName"> Customer Information</div>
                           <div class="mb-4"><?php echo $data[0]["CustomerName"];?><br>#.<?php echo $data[0]["ContractCode"];?></div>
                           <div style="font-weight: bold" id="PaymentDate"> Receipt Information</div>
                           <div class="mb-2"><?php echo date("d-m-Y",strtotime($data[0]["ReceiptDate"])) ;?><br>#.<?php echo $data[0]["ReceiptNumber"];?></div>
                         </div>
                         <div class="col-12">
                         <h3 class="mb-4" style="text-align: center;">Payment Receipt</h3>
                            <p>We have received sum of ₹<b>&nbsp;<?php echo $data[0]["DueAmount"];?></b> (in words <?php echo getIndianCurrency($data[0]["DueAmount"]);?>) from <b><?php echo $data[0]["CustomerName"];?></b>&nbsp;(Customer ID: <?php echo $data[0]["CustomerCode"];?>) due to contract ID <b><?php echo $data[0]["ContractCode"];?></b> with <b><?php echo addOrdinalNumnberSuffix($data[0]["DueNumber"]);?></b> credited by <b><?php echo $data[0]["PaymentMode"];?></b>.</p>  
                         </div>
                         <div class="col-12" style="text-align: right;">
                            <p>By</p>    
                         </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    <div class="col-sm-12 mb-3" style="text-align: center;">
        <button type="button" onclick="print()" class="btn btn-primary">Print this Receipt</button>
        </div>
        <div class="col-sm-12" style="text-align: center;">
        <a style="color: #999 !important;" href="<?php echo URL;?>dashboard.php?action=contracts/view&view=<?php echo $data[0]['ContractCode'];?>">Back</a>
        </div>
    </div>

         