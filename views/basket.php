<? $this->load->view("header"); ?>


<div id=topic>SHOPPING CART</div>


<?php

if($this->uri->segment('2')=="promoerror"){
	
echo "<div style='padding:5px;background-color:red;color:white'>The promotional code you entered is expired or inactive.</div>";

}

if($basket_check>0){

?>

<table  border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-top:10px;padding-bottom:10px;"> 

<tr><td colspan=10><hr></td></tr>

<?

foreach ($basket_index as $key => $value) {

?>

<td valign="top" width="100"> 

<a href=/product/<?=$value[static_alias]?>><img src=https://www.yoonnyc.com/pic.php?file_name=files/<?=$value[static_pic]?>&thumb=100 border=0></a>

</td>

<td valign=top style=padding:5px>

<a href=/product/<?=$value[static_alias]?>><b><?=$value[static_name]?></a>

<div style="padding:10px 0px 10px 0px;font:normal 10px arial"> <i>Color : <?=$this->Content->sql("select main_en from color_main where id='$value[basket_color]'","main_en")?> Size : <?=$this->Content->sql("select main_en from size_main where id='$value[basket_size]'","main_en")?> </i></div>

<a href=/deletebasket/<?=$value[id]?>>REMOVE</a>

</td>

<td width=100 valign=top>

<?=$value[basket_count]?>

</td>

<td width=150 valign=top  align=right>

<?=money_format('%i',$value[product_cost])?> $

</td>

</tr>

<tr><td colspan=10 align=right height=10><hr></td></tr>

<?

}

?>

<tr><td colspan=3 align=right height=25 style=padding-right:10px>Merchandise Total:</td><td align=right>$<?=money_format('%i',$basket_total)?></td></tr>

<tr><td colspan=3 align=right height=25 style=padding-right:10px>Shipping:</td><td align=right>$<?=money_format('%i',$basket_shipping)?></td></tr>


<tr><td colspan=3 align=right height=25 style=padding-right:10px>Tax:</td><td align=right>$<?=money_format('%i',$basket_tax)?></td></tr>

<?

if($promo_sale>0){

?>

<tr><td colspan=3 align=right height=25 style="font-size:14px;font-weight:bold;color:red">Discount:</td><td align=right  style="font-size:14px;font-weight:bold;color:red">$<?=money_format('%i',$promo_sale)?></td></tr>

<?

}

?>

<tr><td colspan=3 align=right height=25 style="font-size:18px;font-weight:bold">Total:</td><td align=right  style="font-size:18px;font-weight:bold">$<?=money_format('%i',$basket_total_pay)?></td></tr>

</table>

<table  border="0" cellpadding="0" cellspacing="0" width="100%"  style="margin-top:20px"> 

<tr>

<form action=/ method=post>

<td height=50 width=33% align=left valign=top>

<input type=submit  value="CONTINUE SHOPPING" style="padding:5px"> 

</td>

</form>

<form action=/applycode method=post>

<td width=33% align=left valign=top>

<input type=text name=promo_code size=20 style="padding:5px">

<input type=submit  value="APPLY PROMOCODE" style="padding:5px;"> 

</td>

</form>

<td align=right valign=top>

<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">

    <!-- Identify your business so that you can collect the payments. -->
    <input type="hidden" name="business" value="info@yoonnyc.com">

    <!-- Specify a PayPal Shopping Cart Add to Cart button. -->
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="add" value="1">

    <!-- Specify details about the item that buyers will purchase. -->
    <input type="hidden" name="item_name" value="YoonNYC | Order No : <?=$basket_id?>">
    <input type="hidden" name="amount" value="<?=money_format('%i',$basket_total_pay)?>">
    <input type="hidden" name="currency_code" value="USD">

    <!-- Continue shopping on the webpage for birthday cards -->
    <input type="hidden" name="shopping_url" value="http://www.yoonnyc.com/">
    <input type="hidden" name="return" value="http://www.yoonnyc.com/paypal">
    <input type="hidden" name="custom" value="<?=$this->session->userdata('basket_sesid')?>">

    <!-- Display the payment button. -->
    <input type="image" name="submit" border="0" src="https://www.paypalobjects.com/en_US/i/btn/btn_xpressCheckout.gif" alt="PayPal - The safer, easier way to pay online">
    <img alt="" border="0" width="1" height="1"  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
</form>

</td>

<form action=/login method=post>

<td align=right valign=top>

<input type=submit value="PAY SECURELY NOW" style="padding:10px;background-color:#771013;color:white;border:0px;">

</td>


</form>



</tr>

</table>



<?

}
else
{

?>

<table  border="0" cellpadding="0" cellspacing="0" width="100%"> 

<tr>

<form action=/ method=post>

<td height=40>

<input type=submit  value="CONTINUE SHOPPING"> 

</td>

</form>

</table>

<?

}

?>

<!-- Google Code for Shopping Cart Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 974087545;
var google_conversion_language = "en";
var google_conversion_format = "2";
var google_conversion_color = "ffffff";
var google_conversion_label = "fX6oCO-1-QgQ-cq90AM";
var google_conversion_value = 0;
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript"  
src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt=""  
src="//www.googleadservices.com/pagead/conversion/974087545/?value=0&amp;label=fX6oCO-1-QgQ-cq90AM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

<? $this->load->view("footer"); ?>
