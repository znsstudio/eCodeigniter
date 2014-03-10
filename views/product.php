<? $this->load->view("header"); ?>



<script src="/js/jquery.bxslider.js"></script>

<link href="/css/jquery.bxslider.css" rel="stylesheet" />



<link rel="stylesheet" href="/css/jquery-ui.css" />

<script src="/js/jquery-ui.js"></script>



<table  border="0" cellpadding="0" cellspacing="0" width="100%"> 



<tr>



<td width=106 valign=top>


<div id="bx-pager">


<?

$j=0;

if(count($photo_list)>1){

foreach ($photo_list as $key => $value) {

	echo "<a data-slide-index=\"$j\" href=\"\"><img src=\"/pic.php?file_name=files/$value[static_pic]&thumb=106&style=width\" style=\"margin-bottom:5px\"/></a>";

	$j = $j + 1;

}

}
else
{


foreach ($static_list as $key => $value) {

	echo "<a data-slide-index=\"$j\" href=\"\" class=\"zoom$value[id]\"><img src=\"/pic.php?file_name=files/$value[static_pic]&thumb=106&style=width\"/></a>";		

}

}

?>

</div>



</td>



<td width=5>



</td>



<td width=325 valign=top>



<ul class="bxslider">		



<?

if(count($photo_list)>1){

foreach ($photo_list as $key => $value) {

?>		


<li><a href="/files/<?=$value[static_pic]?>" class="zoom<?=$value[id]?>"><img src="/files/<?=$value[static_pic]?>" width="325"/></a></li>		


<?

}

}
else
{

foreach ($static_list as $key => $value) {

?>

<li><a href="/files/<?=$value[static_pic]?>" class="zoom<?=$value[id]?>"><img src="/files/<?=$value[static_pic]?>" width="325"/></a></li>		


<?

}

}

?>


</ul>




</td>



<td width=15>



</td>



<td valign=top>



<div itemscope itemtype="https://schema.org/Product" style=position:absolute >



<div style=position:absolute;top:0px;left:0px>



<navs></navs>



</div>



<div style=position:absolute;top:0px;left:0px;width:600px>


<?

foreach ($static_list as $key => $value) {

?>


<div style="font:bold 1.30em arial;" itemprop="name"><?=$value[static_name]?></div>



<div style="font:normal 1.10em arial;margin-bottom:10px" ><?=$category_name?></div>


<?

if($value['static_price']==$value['static_cost']){

?>

<div style="font-weight: normal ;color:#404041; text-decoration:line-through; font-size:13px;" >$<? echo round($value['static_price']); ?></div>

<?

}

?>

<!-- <div style="font-weight: normal ;color:#404041; text-decoration:line-through; font-size:13px;" >$<? echo round($value['static_cost']); ?></div> -->

<div itemprop="offers" itemscope itemtype="https://schema.org/Offer">
	<span style="font:normal 13pt arial;margin-bottom:10px;color:red" itemprop="price">$<? echo number_format(round($value['static_cost'])*0.40,2); ?></span> <br>
    <link itemprop="availability" href="https://schema.org/InStock" /> In stock
</div>



<div itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating" style="display:none">
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

?>

<input type=image src=/images/add_to_bag.png align=absmiddle onclick=call_submit('#shopping_cart')>

</form>

<ul class="tabs"> 

        <li class="active" rel="tab1"> <div style=padding-top:10px> PRODUCT DETAIL </div></li>

        <li rel="tab2"> <div style=padding-top:10px> REVIEW </div></li>

        <li rel="tab3"> <div style=padding-top:10px> SHIPPING & RETURNS</div></li>

</ul>

<div class="tab_container"> 

     <div id="tab1" class="tab_content"> 

 

	<?=$value['static_content']?>

	

	<div style=height:30px></div>


	<!-- AddThis Button BEGIN -->

	<div class="addthis_toolbox addthis_default_style ">

	<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>

	<a class="addthis_button_tweet"></a>

	<a class="addthis_button_pinterest_pinit"></a>

	<a class="addthis_counter addthis_pill_style"></a>

	</div>

	<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>

	<script type="text/javascript" src="https://s7.addthis.com/js/300/addthis_widget.js#pubid=ra-512295d120f1ad45"></script>

	<!-- AddThis Button END -->


     </div><!-- #tab1 -->

     <div id="tab2" class="tab_content"> 


		<table border="0" cellpadding="0" cellspacing="0" width="100%">
		<form name="myform" action="/reviewadd" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="static_id" value="<?=$value[id]?>">
		<tbody><tr><td height="25">Your fullname</td><td><input type="text" name="review_fullname" id="review_fullname" size="40" value=""> </td></tr>
		<tr><td height="25">Your email</td><td><input type="text" name="review_email" id="review_email" size="40" value=""> </td></tr>
		<tr><td colspan="2" height="2"></td></tr><tr><td valign="top">Your Review</td><td><textarea name="review_content" id="review_content" cols="40" rows="5"></textarea></td></tr>
		<tr><td width="150"></td><td></td></tr>
		<tr><td height="30"></td><td><input type="submit" value="add your review"></td></tr></tbody></form></table> 	


	<p>	

	 

	<b>Reviews</b>



	<p>



	<table  border="0" cellpadding="0" cellspacing="0" width="100%"> 


	<?

	if(count($review_list)>0){

	foreach ($review_list as $key => $value) {

	echo "	

	<tr><td style=padding:5px>$value[review_fullname] | $value[review_date]</td></tr>

	<tr><td style=padding:5px><a name=review_$value[id]></a> $value[review_content]</td></tr>

	<tr><td height=20><hr color=#E5E5E5></td></tr>";

	}

	}
	else
	{

		echo "Be first to write and receive exclusive DISCOUNT from us after approval.";

	}	

	?>



	</table>



     </div><!-- #tab2 -->

     <div id="tab3" class="tab_content"> 

	 

	 FREE SHIPPING ON ALL ORDERS

	 

	 <p>



	We hope that every purchase made on yoonnyc.com is a perfect match, however

	if you are not 100% satisfied with your purchase, you may return or exchange

	the items within 30 days of the purchase for a full refund.  Returned or

	exchanged products MUST be in the condition you received them with original

	tags attached. In case of an exchange, shipping for the new item will be

	free of charge.





     </div><!-- #tab3 -->



     

 </div> <!-- .tab_container --> 





<?

}

?>



</div>



</div>



</td>



</tr>



</table>



<div id=topic>YOU MAY ALSO LIKE</div>



		<table  border="0" cellpadding="0" cellspacing="0" width="100%"> 

		<?

		$i=0;

		foreach ($related_articles as $key => $value) {

		if ($i==0) {
			
			echo "<tr>";

		}

		?>

		<td valign="top" background="/pic.php?file_name=files/<?=$value[static_pic]?>&thumb=110&style=width"> 

		<center>

		<a href=/product/<?=$value[static_alias]?>><img src="/images/spacer.gif" border="0" width="110" height="151"></a>

		</a>

		</td>

		<?

		$i=$i+1;

		if ($i==10) {
			
			echo "</tr>";

		}
		else
		{

			echo '<td width=1><img src=/images/spacer.gif width=5></td>';

		}	

		}

		?>

		</table>


<script>



function call_submit(form_name){

$(form_name).submit(function() {

static_size = $('#static_size').val();

static_color = $('#static_color').val();

  if(static_size>0 && static_color>0){

	return true;

  }

  else

  {

	$('#alert_area').html('PLEASE CHOOSE COLOR AND SIZE');

	return false;

  }

});

}



</script>


<? $this->load->view("footer_detail"); ?>
