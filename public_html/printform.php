<?php 
include_once("config.php");
$data = $mysql->select("select * from _tbl_forms where ID='".$_GET['form']."'");
?>
<div style="width:1000px;margin:0px auto;font-family:Arial">
    <table style="width:100%;font-family:Arial" cellspacing="0" cellpadding="10">
        <tr>
            <td>
                <h1 style="font-size:20px;text-align:center;font-family:Arial">PARTICULARS FOR CHECK LIST</h1>
            </td>
        </tr>
        <tr>
            <td>
                <table style="width:97%;font-family:Arial">
                    <tr>
                        <td style="width:75%">
                             <h1 style="font-size:16px;text-align:left;font-family:Arial">NAME</h1>
                             <?php echo $data[0]['CustomerName'];?>
                        </td>
                        <td style="width:25%;text-align:right;">
                            <h1 style="font-size:16px;text-align:right;font-family:Arial">MONTH/YEAR</h1>
                            <?php echo $data[0]['MonthYear'];?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>   
                <h3  style="font-size:16px;font-family:Arial;margin-bottom:10px;">GST PARTICULARS</h3>
                <table  style="width:94%;margin:0px auto;font-family:Arial">
                    <tr>
                        <td style="width:45%;vertical-align:top;">
                            <table border='1' cellspacing="0" cellpadding="5" style="width:100%;font-family:Arial;font-size:14px">
                                <tr>
                                    <td style="width:130px;">Form 3B</td>
                                    <td><?php echo $data[0]['Form3B'];?></td>
                                </tr>
                                <tr>
                                    <td>Chellan Payment</td>
                                    <td><?php echo $data[0]['ChellanPayment'];?></td>
                                </tr>
                                <tr>
                                    <td>GSTR 1/2/2A/4</td>
                                    <td><?php echo $data[0]['GSTR'];?></td>
                                </tr>
                            </table>
                        </td>
                        <td style="width:10%;"></td>
                        <td style="width:45%;vertical-align:top;">
                        
                        <table border='1' cellspacing="0" cellpadding="5" style="width:100%;font-family:Arial;font-size:14px">
                                <tr>
                                    <td style="width:100px;">YEAR</td>
                                    <td><?php echo $data[0]['YR'];?></td>
                                </tr>
                                <tr>
                                    <td>REC.NO</td>
                                    <td><?php echo $data[0]['RECNO'];?></td>
                                </tr>
                                <tr>
                                    <td>FEES</td>
                                    <td><?php echo $data[0]['FEES'];?></td>
                                </tr>
                                <tr>
                                    <td>DATE</td>
                                    <td><?php echo $data[0]['DTE'];?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
         
        <tr>
            <td>
                <h3  style="font-size:16px;;font-family:Arial;margin-bottom:10px;">INCOME TAX PARTICULARS</h3>
                <table style="width:96%;margin:0px auto;font-family:Arial;">
                    <tr>
                        <td style="width:100%">
                            <?php $savingac = json_decode($data[0]['SAVINGAC'],true); ?>
                            <table style="width:100%">
                                <tr>
                                    <td><h4 style="font-size:14px;;font-family:Arial;margin-bottom:0px;">BANK ACCOUNTS (SAVINGS  ACCOUNTS)</h4> </td>
                                    <td style="width:50px"><div style="border:1px solid #333;padding:5px;font-size:18px;font-weight:Bold;font-family:arail;text-align:center"><?php echo sizeof($savingac);?></div></td>
                                </tr>
                                <?php if (sizeof($savingac)>0) {?>
                                <tr>
                                    <td>
                                        <ul>
                                        <?php foreach($savingac as $ac) {?>
                                             <li style="font-size:14px;"><?php echo strtoupper($ac);?></li>
                                        <?php } ?>
                                        </ul> 
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                           
                           
                        </td>
                    </tr>
                    <tr>
                        <td><hr style="border:none;border:1px solid #ccc"></td>
                    </tr>
                    <tr>
                        <td style="width:100%">
                            <?php $currentac = json_decode($data[0]['CURRECTAC'],true); ?>
                            <table style="width:100%">
                                <tr>
                                    <td><h4 style="font-size:14px;;font-family:Arial;margin-bottom:0px;">BANK ACCOUNTS (BUSINESS/CURRENT ACCOUNTS)</h4> </td>
                                    <td style="width:50px"><div style="border:1px solid #333;padding:5px;font-size:18px;font-weight:Bold;font-family:arail;text-align:center"><?php echo sizeof($currentac);?></div></td>
                                </tr>
                                <?php if (sizeof($currentac)>0) {?>
                                <tr>
                                    <td>
                                        <ul>
                                        <?php foreach($currentac as $ac) {?>
                                             <li style="font-size:14px;"><?php echo strtoupper($ac);?></li>
                                        <?php } ?>
                                        </ul> 
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                           
                           
                        </td>
                    </tr>
                    <tr>
                        <td><hr style="border:none;border:1px solid #ccc"></td>
                    </tr>
                    <tr>
                        <td style="width:100%">
                            <?php $loanac = json_decode($data[0]['LOANAC'],true); ?>
                            <table style="width:100%">
                                <tr>
                                    <td><h4 style="font-size:14px;;font-family:Arial;margin-bottom:0px;">BANK ACCOUNTS (OD/LOAN)</h4> </td>
                                    <td style="width:50px"><div style="border:1px solid #333;padding:5px;font-size:18px;font-weight:Bold;font-family:arail;text-align:center"><?php echo sizeof($loanac);?></div></td>
                                </tr>
                                <?php if (sizeof($loanac)>0) {?>
                                <tr>
                                    <td>
                                        <ul>
                                        <?php foreach($loanac as $ac) {?>
                                             <li style="font-size:14px;"><?php echo strtoupper($ac);?></li>
                                        <?php } ?>
                                        </ul> 
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                           
                           
                        </td>
                    </tr>
                     
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <h3  style="font-size:16px;;font-family:Arial;margin-bottom:10px;">INVESTMENT DETAILS</h3>
                
                <table border='1' cellspacing="0" cellpadding="5" style="width:94%;margin:0px auto;font-family:Arial;font-size:14px">
                    <tr>
                        <td style="width:130px;">LIC Premium Paid</td>
                        <td><?php echo $data[0]['INVEST_LIC'];?></td> 
                    </tr>
                    <tr>
                        <td>Tution Fees</td>
                        <td><?php echo $data[0]['INVEST_TUT'];?></td> 
                    </tr>
                    <tr>
                        <td>Fixed Deposit</td>
                        <td><?php echo $data[0]['INVEST_FD'];?></td> 
                    </tr>
                    <tr>
                        <td>Donation</td>
                        <td><?php echo $data[0]['INVEST_DONATION'];?></td> 
                    </tr>
                    <tr>
                        <td>Land Purchase & Sales Doc Copy</td>
                        <td><?php echo $data[0]['INVEST_LAND'];?></td> 
                    </tr>
                    <tr>
                        <td>Others</td>
                        <td><?php echo $data[0]['INVEST_OTHERS'];?></td> 
                    </tr>
                </table>
                        
            </td>
        </tr>
        <tr>
            <td>
                <h3  style="font-size:16px;font-family:Arial;margin-bottom:10px">OTHER PARTICULARS</h3>
                <table border='1' cellspacing="0" cellpadding="5" style="width:94%;margin:0px auto;font-family:Arial;font-size:14px">
                    <tr>
                        <td style="width:130px;">Form 16</td>
                        <td><?php echo $data[0]['OTHER_FORM16'];?></td> 
                    </tr>
                    <tr>
                        <td>Form 16A</td>
                        <td><?php echo $data[0]['OTHER_FORM16A'];?></td> 
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <table cellspacing="0" cellpadding="5" style="width:94%;margin:0px auto;font-family:Arial;font-size:14px">
                    <tr>
                        <td colspan="3">
                            I declare that to the best of my knowledge and belief, the information furnished in the form is correct and truly stated.
                        </td>
                    </tr>
                    <tr>
                        <td class="3"><br><Br></td>
                    </tr>   
                    <tr>
                        <td style="font-weight:Bold;text-align:center">APPROVED BY</td>
                        <td style="font-weight:Bold;text-align:center">RECEIVED BY</td>
                        <td style="font-weight:Bold;text-align:center">PAID BY</td>
                    </tr>
                </table>
            
            </td>
            
        </tr>
        
    </table>

</div>
<script>
    window.print();
</script>