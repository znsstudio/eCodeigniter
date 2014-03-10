<table  border="0" cellpadding="0" cellspacing="0" width="100%"> 

<tr>

<td width=325 valign=top>

<?

foreach ($static_list as $key => $value) {

?>

<a href="http://www.yoonnyc.com/files/<?=$value[static_pic]?>" class="zoom<?=$value[id]?>"><img src="https://www.yoonnyc.com/temp/325_<?=$value[static_pic]?>"/></a>


<?

}


?>



</td>



<td width=15>



</td>



<td valign=top width=450px>

<?

foreach ($static_list as $key => $value) {

?>


<div style="font:bold 1.30em arial;" itemprop="name"><?=$value[static_name]?></div>

<div style="font:normal 1.10em arial;margin-bottom:10px" ><?=$category_name?></div>


<?

if($value['static_price']!=$value['static_cost']){

?>

<div style="font-weight: normal ;color:#404041; text-decoration:line-through; font-size:13px;" >$<?=$value['static_price']?></div>

<?

}

?>

<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
	<span style="font:normal 13pt arial;margin-bottom:10px;color:red" itemprop="price">$<?=$value['static_cost']?></span> <br>
    <link itemprop="availability" href="http://schema.org/InStock" /> In stock
  </div>



<div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating" style="display:none">
    <span itemprop="ratingValue">4</span> stars -
    based on <span itemprop="reviewCount">250</span> reviews
  </div>

<div id=alert_area style="padding:5px;"></div>



<form action=/addbag method=post id=shopping_cart>

<input type=hidden name=pre_action value=add_basket>

<input type=hidden name=static_id value=<?=$value['id']?>>

<?

if($this->uri->segment(3)=="soldout"){

	echo "<font color=red>Please choose differend color, size or quantity. We are already soldout for your choice</font><p>";

}

echo $static_color;

echo $static_size;

echo $static_count;

}

?>

<input type=image src=https://www.yoonnyc.com/images/add_to_bag.png align=absmiddle onclick=call_submit('#shopping_cart')>

</form>

<p>

<?=$value[static_content]?>


</td>

</tr>



</table>