<? 

$this->load->view('header');

?>

<h3 style="margin:5px 0px">Your Order</h3>

<table cellpadding="0" cellspacing="0" width="995" border="0">
	
<?

echo "<tr>

<td width=150 style=padding:5px><b>Order ID</td>

<td width=150 style=padding:5px><b>Order Date</td>

<td width=150 style=padding:5px><b>Order Amount</td>

<td width=250 style=padding:5px><b>Order Status</td>

</tr>";

foreach ($orders as $key => $value) {

if($i==0){

echo "<tr bgcolor=#eee>";

}
else
{

echo "<tr>"; $i="-1";

}

echo "

<td style=padding:5px height=30>$value[transaction_id]</td>

<td style=padding:5px>$value[order_date]</td>

<td style=padding:5px>$ $value[order_amount]</td>

<td style=padding:5px>$value[order_note]</td>

</tr>";

$i=$i+1;

}

?>

</table>

<p>

<h3 style="margin:5px 0px">Order Details</h3>

<table  border="0" cellpadding="0" cellspacing="0" width="100%" style="padding-bottom:5px;"> 

<tr><td colspan=10><hr></td></tr>

<?

foreach ($basket_index as $key => $value) {

?>

<td valign="top" width="100"> 

<?

if($value[static_pic]!=""){

?>

<a href=/product/<?=$value[static_alias]?>><img src=https://www.yoonnyc.com/pic.php?file_name=files/<?=$value[static_pic]?>&thumb=100 border=0></a>

<?

}

?>

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

<tr><td colspan=3 align=right height=25 style="font-size:18px;font-weight:bold;color:red">Sale:</td><td align=right  style="font-size:18px;font-weight:bold;color:red"><?=money_format('%i',$promo_sale)?></td></tr>

<?

}

?>

<tr><td colspan=3 align=right height=25 style="font-size:18px;font-weight:bold">Total:</td><td align=right  style="font-size:18px;font-weight:bold">$<?=money_format('%i',$basket_total_pay)?></td></tr>

</table>

<?

$this->load->view('footer'); 

?>