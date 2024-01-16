<?php
include_once("config.php");
$contract_data= $mysql->select("select * from _tbl_contracts where ContractCode='".$_GET['code']."'");
$customer_data= $mysql->select("select * from _tbl_masters_customers where CustomerID='".$contract_data[0]['CustomerID']."'");
$scheme_data= $mysql->select("select * from _tbl_masters_schemes where SchemeID='".$contract_data[0]['SchemeID']."'");
$contract_dues= $mysql->select("select * from _tbl_contracts_dues where ContractID='".$contract_data[0]['ContractID']."'");
?>
<script>
function printnow() {
    document.getElementById("print_btn").style.display="none";
    window.print();
}
</script>
<form action="passbook.php?" method="get" target="_blank">
    <input type="hidden" value="<?php echo $_GET['code'];?>" name="code">
    <div style="width:800px;margin:0px auto">
        <table style="width: 100%;font-family: arial;font-size: 13px;"  cellspacing="0">
            <tr>
                <td style="width: 50%">
                    <?php 
                        if (!isset($_GET['fullPrint']) ||  $_GET['fullPrint']=="Full Print") {
                            if (isset($_GET['selPrint'])) {
                            
                            } else {
                            ?>
                            <table style="width: 100%;font-family: arial;font-size: 13px;">
                                <tr>
                                    <td style="width: 50%;">
                                        <div style="font-weight: bold;">Saving Cotract ID</div>
                                        <div><?php echo $contract_data[0]['ContractCode'];?></div><div>&nbsp;</div>
                                    </td>
                                    <td style="text-align: right;">
                                        <div style="font-weight: bold;">Branch Info</div>
                                        <div><?php echo $contract_data[0]['BranchCode'];?></div>
                                        <div><?php echo $contract_data[0]['BranchName'];?></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><hr></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div style="font-weight: bold;" class="mb-2">Customer Info</div>
                                        <div><?php echo $contract_data[0]['CustomerCode'];?></div>
                                        <div><?php echo strtoupper($customer_data[0]['CustomerName']);?></div> 
                                        <span> +91 </span> <span><?php echo $customer_data[0]['MobileNumber'];?></span>
                                        <div><?php echo $customer_data[0]['EmailID'];?></div>
                                        <div>
                                            <?php echo ucwords($customer_data[0]['AddressLine1']);?>, 
                                            <?php echo ucwords($customer_data[0]['AddressLine2']);?>, 
                                            <?php echo ucwords(strtolower($customer_data[0]['AreaName']));?>.
                                            <?php echo ucwords(strtolower($customer_data[0]['DistrictName']));?>.
                                            <?php echo ucwords(strtolower($customer_data[0]['StateName']));?>.
                                            <br>Pincode:&nbsp;<?php echo $customer_data[0]['PinCode'];?>
                                        </div>
                                    </td>
                                </tr> 
                                <tr>
                                    <td colspan="2"><hr></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div style="font-weight: bold;" >Contract Info</div>
                                        <table style="width: 100%;font-family: arial;font-size: 13px;" border="1"  cellspacing="0" cellpadding="3">
                                            <tbody>
                                                <tr>
                                                    <td>Scheme</td>
                                                    <td>:&nbsp;<?php echo $scheme_data[0]['SchemeName'];?></td>
                                                </tr>
                                                <tr>
                                                    <td>Matrial Type</td>
                                                    <td>:&nbsp;<?php echo $contract_data[0]['MaterialType'];?></td>
                                                </tr>
                                                <tr>
                                                    <td>Wastage Discount</td>
                                                    <td>:&nbsp;<?php echo $scheme_data[0]['WastageDiscount'];?>&nbsp;%</td>
                                                </tr>
                                                <tr>
                                                    <td>Making Charge Discount</td>
                                                    <td>:&nbsp;<?php echo $scheme_data[0]['MakingChargeDiscount'];?>&nbsp;%</td>
                                                </tr>
                                                <tr>
                                                    <td>Contract Amount</td>
                                                    <td>:&nbsp;₹&nbsp;<?php echo $contract_data[0]['ContractAmount'];?></td>
                                                </tr>
                                                <tr>
                                                    <td>Duration</td>
                                                    <td>:&nbsp;<?php echo $contract_data[0]['Duration'];?>&nbsp;/&nbsp;<?php echo $contract_data[0]['InstallmentMode'];?></td>
                                                </tr>
                                                <tr>
                                                    <td>Due Amount</td>
                                                    <td>:&nbsp;₹&nbsp;<?php echo $contract_data[0]['DueAmount'];?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr> 
                            </table>
                            <?php 
                            } 
                        } 
                    ?>
                </td>
                <td style="width: 50%; vertical: top;vertical-align: top;padding:10px">
                    <?php if (isset($_GET['fullPrint'])) {?>
                    <table style="width: 100%;font-family: arial;font-size: 13px;" border="1"  cellspacing="0"  cellpadding="5">
                        <thead>
                            <tr>
                                <th scope="col">Due.No</th>
                                <th scope="col">Due date</th>
                                <th scope="col">Paid date</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Gold(Grams)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($contract_dues as $due){ ?>
                            <tr>
                                <td><?php echo $due['DueNumber'];?></td>
                                <td style="text-align: center"><?php echo $due['DueDate'];?></td>
                                <td style="text-align: center"><?php echo $due['PaymentDate'];?></td>
                                <td><?php echo $due['ReceiptNumber'];?></td>
                                <td style="text-align: right"><?php echo $due['GoldInGram']==0 ? "":$due['GoldInGram'];?>&nbsp;&nbsp;</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <?php  } elseif (isset($_GET['selPrint'])) { ?>
                    <table style="width: 100%;font-family: arial;font-size: 13px;" cellspacing="0"  cellpadding="5">
                        <thead>
                            <tr>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">&nbsp;</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>     
                            <?php foreach($contract_dues as $due){ ?>
                                <?php if (isset($_GET['Dues'][$due['DueNumber']]) && $_GET['Dues'][$due['DueNumber']]=="on") { ?>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td style="text-align: center">&nbsp;</td>
                                    <td style="text-align: center"><?php echo strlen(trim($due['PaymentDate']))>0 ?  date("d-m-Y",strtotime($due['PaymentDate'])) : "";?></td>
                                    <td><?php echo $due['ReceiptNumber'];?></td>
                                    <td style="text-align: right"><?php echo $due['GoldInGram']==0 ? "":$due['GoldInGram'];?>&nbsp;&nbsp;</td>
                                </tr>
                                <?php } else { ?>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td style="text-align: center">&nbsp;</td>
                                    <td style="text-align: center">&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td style="text-align: right">&nbsp;</td>
                                </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>    
                    <?php } else { ?>
                    <table style="width: 100%;font-family: arial;font-size: 13px;" border="1"  cellspacing="0" cellpadding="5">
                        <thead>
                            <tr>
                                <th scope="col">Due.No</th>
                                <th scope="col">Due date</th>
                                <th scope="col">Paid date</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Gold(Grams)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($contract_dues as $due){ ?>
                            <tr>
                                <td>
                                    <?php if ($due['GoldInGram']>0) {?>
                                    <input type="checkbox" name="Dues[<?php echo $due['DueNumber'];?>]">
                                    <?php  } else {?>
                                    <input type="checkbox" disabled="disabled">
                                    <?php } ?>
                                    <?php echo $due['DueNumber'];?>
                                </td>
                                <td style="text-align: center"><?php echo date("d-m-Y",strtotime($due['DueDate']));?></td>
                                <td style="text-align: center"><?php echo strlen(trim($due['PaymentDate']))>0 ?  date("d-m-Y",strtotime($due['PaymentDate'])) : "";?></td>
                                <td><?php echo $due['ReceiptNumber'];?></td>
                                <td style="text-align: right"><?php echo $due['GoldInGram']==0 ? "":$due['GoldInGram'];?>&nbsp;&nbsp;</td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                 <?php } ?>
                </td>
            </tr>
        </table> 
    </div>
    <div style="text-align:center;padding-top:10px">
        <?php if (isset($_GET['fullPrint']) || isset($_GET['selPrint'])) { ?>
            <input type="button" id="print_btn" value="Print Now" onclick="printnow()">
        <?php } else { ?>
            <input type="submit" value="Full Print" name="fullPrint"> &nbsp;&nbsp;
            <input type="submit" value="Selected Row Print" name="selPrint">
        <?php } ?>
    </div>
</form>