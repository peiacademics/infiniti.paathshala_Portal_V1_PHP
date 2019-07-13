<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Invoice</title>
</head>
<style>
    @page { margin: 20px 20px 80px 20px; }
    #footer { position: fixed; left: -20px; bottom: 10px; right: -20px; }
    .td1 { height:25px; }
    @font-face {
        font-family: Futura Md BT;
        src: url('<?php echo site_url('fonts/futura.ttf'); ?>');
    }
    @font-face {
        font-family: Futura BD BT;
        src: url('<?php echo site_url('fonts/futura_bd.ttf'); ?>');
    }
    #billing_tbl {
        border:0;
        margin:0 auto;
        padding:0;
        border-collapse:collapse;   
    }
    #billing_tbl td {
        border-bottom:1px #333 solid;
        padding:2px;
        margin:0;
    }
  .term{
        width:100%;
        height:90px;
        font-size:12px;
      }
</style>

<body style="font-family:'Futura Md BT'">
<table border="0" align="center" width="100%">
  <tr>
    <td width="55%" style="text-align:right;">
    <img src="<?php echo base_url() ;?>img/logo.jpg" height="100" style="margin:10px;" />
    </td>
    <td width="45%"  style="text-align:right;" >
     <?php
     //     if($DETAIL['DETAILS2'][0]['bill_type'] != "Estimate" && $DETAIL['DETAILS2'][0]['bill_Category'] =="Paid" )
        // {
    ?>
    <img src="<?php echo base_url() ;?>img/jTxEbrB8c.png" height="120" style="margin:10px 40px 10px 0px;" />
    <?php //} ?>
    </td>
   
  </tr>
</table>
<table border="0" align="center" width="100%">
  
  <tr>
    <td colspan="2" style="text-align:left; padding-left:30px;"><p style="background:#606062; vertical-align:top; color:#ffffff; width:130px; font-size:18px; font-family: Futura BD BT;">&nbsp;Receipt TO</p>
    <p style="font-size:14px;">
     <br />
     <?php echo (@$DETAIL['referal']) ? @$DETAIL['referal']['name'].',' : '____________';?><br>
    <?php echo @$DETAIL['referal']['address']; ?>.<br />
    </p></td>
    
    <td width="" style="text-align:right; padding-right:30px;"><p style="font-family: Futura BD BT;color:#96989A; padding:0; margin:0; font-weight:; font-size:30px; line-height:40px; vertical-align:middle;"><?php echo strtoupper('Reciept'); ?></p>
      <p style="line-height:20px; padding:0; margin:0; font-size:16px;">Receipt No.: <?php echo $DETAIL['DETAILS'][0]['receipt_no'];?></p><br />
      <p style="line-height:20px; padding:0; margin:0; font-size:16px;">Date: <?php echo $DETAIL['DETAILS'][0]['date'];?></p><br />
    <p style="line-height:20px; padding:0; margin:0; font-size:16px;">Payment Mode: <?php echo @$DETAIL['DETAILS'][0]['paymentMode'];?></p></td>
  </tr>
  </table>
  
  <!--   Footer start......  -->

<div id="footer">
<table border="0" align="center" width="100%">
  <tr>
    <td  style="text-align:center; " width='30%'><p style="line-height:20px; height:20px; vertical-align:middle;"><img src="<?php echo base_url() ;?>img/mail.png" style="height:20px;" /> paathshala@gmail.com</p></td>
    <td style="text-align:center;" width='30%'><p style="line-height:20px; height:20px; vertical-align:middle;"><img src="<?php echo base_url() ;?>img/mob.png" style="height:20px;" /> +91 9234354676</p></td>
    <td style="text-align:center;" width='30%'><p style="line-height:20px; height:20px; vertical-align:middle;"><img src="<?php echo base_url() ;?>img/at.png" style="height:20px;"/> www.paathshalaiit.com</p></td>
</table>
    <br>
    <div style="background:#006cb5;color:#FFF; line-height:30px;">
        <div  style="text-align:center; padding:0px 0px 15px 0px;">Thane, Pin Code - 400601. </div>
    </div>
</div>
 <!--   Footer End......  -->
 
  <!--  start  Products...   -->
  
  
  <table cellpadding="0" cellspacing="0" width="92%" border="0" align="center" id="billing_tbl">
  <?php if(!empty($DETAIL['DETAILS']))
            { ?>
      <tr style="background:#606062; color:#ffffff;font-size:18 px;" >
        <td height="25"><strong>DESCRIPTION</strong></td>
        <td><strong>TOTAL</strong></td>
      </tr>
      <?php
      $count = 0;  ?>
      <!-- <tr style="font-size:12px;">
        <td class="td1" valign="top">Before Paid Amount</td>
        <td class="td1" align="left" valign="top">&nbsp;&nbsp;<?php //echo $DETAIL['collection']-$DETAIL['DETAILS'][0]['amount']; ?></td>
      </tr> -->
      <tr style="font-size:16px;">
        <td class="td1 text-center" valign="top">Transaction Receipt is generated against amount paid.</td>
        <td  class="td1" align="left" valign="top">&nbsp;&nbsp;<?php echo $DETAIL['DETAILS'][0]['amount']; ?></td>
      </tr>
   <!--   <tr style="font-size:12px;">
        <td class="td1" valign="top">Total Paid Amount</td>
        <td class="td1" align="left" valign="top">&nbsp;&nbsp;<?php //echo $DETAIL['collection']?>

                                                         ( <small>-->

                                               <?php //echo $DETAIL['percent']?>

                                           <!-- </small>)</td>
      </tr>-->
      <?php  }?>
      
   </table>
   
  <!--    Products  End ...   -->    
      
    <br>  
    <table  width="85%" border="0" style="font-size:14px;" align="center">
      <tr>
        <td align="right">TOTAL AMOUNT : </td>
        <td width="15%" align="left"><?php echo 'Rs. '.$DETAIL['DETAILS'][0]['amount']; ?></td>
      </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  
  <tr>
    <td colspan="3" style="text-align:center; font-size:16px;">
    Amount In Words -  <?php echo @$DETAIL['DETAILS2'][0]['words'];
     ?> Rupees Only</td>
  </tr>
 
</table>

<table class="term">
      <tr>
        <td>
          <br><br>
<!-- <?php
//if(!empty($DETAIL['DETAILS2'][0]['tnc']))
{ ?>
<?php //echo $DETAIL['DETAILS2'][0]['tnc']; ?>
<?php } ?> -->
<!-- I/We hereby certify that my/our Registration Certificate under the Maharashtra Value Added Tax Act. 2002 is in force on the date on which the sale of the goods specified in this tax invoice is made by me/us and that transaction of the sale covered by this tax invoice has been effected by me/us and it shall be accounted for in the turn over of sales while filling of return and the due tax, it any payable on the sales has been paid or shall be paid.
 -->        
        </td>
      </tr> 
    </table>
<!-- 
<table border="0" style="text-align:center; font-size:16px; color:#96989A" width="100%">
  <tr>
    <td colspan="3"  style="text-align:center;"><hr size="2.2"/>If you have any query or comment regarding this <?php echo strtolower($DETAIL['DETAILS2'][0]['bill_type']); ?>, please contact.</td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center;">Thank You For Choosing Us.</td>
  </tr>
</table> -->



</body>
</html>
