<?php $data= $mysql->select("select * from _tbl_vouchers where VoucherNumber='".$_GET['number']."'");?>

<div class="container-fluid p-0">
    <h1 style="font-weight: bold;" class="h3">Voucher</h1>
    <div class="row"> 
        <div class="col-sm-12 col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                         <div class="col-6">
                        </div>
                         <div class="col-6 mb-2" style="text-align: right;">
                           <div style="font-weight: bold" id="CustomerName"> Customer Information</div>
                           <div class="mb-3"><?php echo $data[0]["CustomerName"];?><br><?php echo $data[0]["CustomerCode"];?></div>
                           
                            <div style="font-weight: bold" id="VoucherID"> Voucher Information</div>
                           <div class="mb-3"><?php echo $data[0]["VoucherNumber"];?><br><?php echo $data[0]["VoucherDate"];?></div>
                           
                           <div style="font-weight: bold" id="ContractCode"> Contract Information</div>
                           <div class="mb-0"><?php echo $data[0]["ContractCode"];?></div>
                         </div>
                        </div>
                <div class="row">
                    <div class="col-12" style="text-align: center;">
                        <h3 style="font-weight: bold;" class="h3 mb-0">Voucher</h3>
                    </div>
                </div>
          <div class="row">
            <div class="col-sm-12 col-xl-12">
            <div style="padding:10px;">  <div style="font-size: 25px; font-weight: bold;"><?php echo $data[0]["GoldInGrams"];?></div>
            Gold In Grams
            </div>
                <table class="table">  
                          <tr>
                               <td>Total Paid Amount</td>
                               <td><?php echo $data[0]["TotalPaidAmount"];?></td>
                          </tr>
                          <tr>
                               <td>Wastage Discount</td>
                               <td><?php echo $data[0]["WastageDiscount"];?>%</td>
                          </tr>
                          <tr>
                               <td>Making Charge Discount</td>
                               <td><?php echo $data[0]["MakingChargeDiscount"];?>%</td>
                          </tr>
                          <tr>
                               <td>Bonus Percentage</td>
                               <td><?php echo $data[0]["BonusPercentage"];?>%</td>
                          </tr>
                          <tr>
                               <td>Bonus Amount</td>
                               <td><?php echo $data[0]["BonusAmount"];?></td>
                          </tr>
                          </table>
                          </div>
                </div>
        </div>
            </div>
        </div>
    </div>

<div class="col-sm-12 mb-3" style="text-align: center;">
        <button type="button" onclick="print()" class="btn btn-primary">Print this Voucher</button>
        </div>
       <div class="col-sm-12" style="text-align: center;">
            <?php 
            $path=URL."dashboard.php";
            if (isset($_GET['fpg'])) {
                $path=URL."dashboard.php?action=".$_GET['fpg'];
            }
            ?>
            <a style="color: #999 !important;" href="<?php echo $path;?>">Back</a>
     </div>
    </div>

         