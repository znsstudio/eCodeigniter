<? $this->load->view("header"); ?>

<script>

function go_link(link_name){

window.location=link_name;	

}

</script>

<div id="example">



	<div id="slides">



		<div class="slides_container">





			<div class="slide">



			<a href=/products/fall2013><img src=/images/yearsale.jpg width=995></a>



			</div>	


			<div class="slide">



			<a href=/product/colette><img src=/images/colette.jpg width=995></a>



			</div>	


		</div>	


	</div>

</div>


<table  border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top:10px;margin-bottom:10px"> 

<tr>

<td colspan=10 height=20 bgcolor=white>

<DIV style="padding:10px 0px 10px 0px;color:black;font:normal 12pt 'Ubuntu', sans-serif">ACCESSORIES ( <a href=http://www.yoonnyc.com/products/accessories>VIEW ALL</a> )</DIV> 

</td>

</tr>



<?

$i=0;

foreach($static_list_accessory as $key=>$value){

if($i==0){ echo "<tr>"; }

?>

<td background="/pic.php?file_name=files/<?=$value['static_pic']?>&thumb=194&style=width" style="background-repeat:no-repeat;background-color:#eee">

	<div id=main_div style="width:195px;height:266px;position:relative;text-align:left;" onmouseover=show_div('#product_<?=$value['id']?>') onmouseout=hide_div('#product_<?=$value['id']?>') >

		<div style='height:205px;width:194px;position:absolute;margin-left:5px;margin-top:0px;z-index:2;cursor:hand' onclick="go_link('/product/<? echo trim(strtolower(str_replace(" ", "-", $value[static_name]))); ?>')">
		
		</div>

		<div id=product_<?=$value[id]?> style="height:50px;width:194px;position:absolute;margin-left:5px;margin-top:185px;z-index:2;display:none;">

		<div style="height:75px;width:184px;position:absolute;background-color:#FFF;border-radius:5px;opacity:0.4;filter:alpha(opacity=40);">

		</div>

		<div style="height:50px;width:194px;position:absolute;text-align:center;margin-top:10px">

		<a href=/product/<?=$value['static_alias']?>  style="font:bold 9pt arial;color:black"><?=$value['static_name']?>  <br>$ <?=$value['static_cost']?> </a>

		<p>

		<a class=group href="/ajax/<?=$value['static_alias']?> " style="border-radius:5px;background-color:#000;color:white;padding:3px;font:normal 8pt arial;">QUICK VIEW</a>

		</div>	

		</div>

		</div>

	</div>

</td>

<?

$i=$i+1;

if($i==5){

?>


</tr>

<tr><td colspan=10 height=3></td></tr>


<?

$i=0;

}
else
{

?>

<td width=5></td>

<? 

}

}

?>

</table>

<table  border="0" cellpadding="0" cellspacing="0" width="100%"> 


<tr>

<td colspan=10 height=20 bgcolor=white>

<DIV style="padding:10px 0px 10px 0px;color:black;font:normal 12pt 'Ubuntu', sans-serif">NEW ARRIVALS ( <a href=/products/fall2013>VIEW ALL</a> )</DIV> 

</td>

</tr>



<?

$i=0;

foreach($static_list_index as $key=>$value){

if($i==0){ echo "<tr>"; }

?>

<td background="/pic.php?file_name=files/<?=$value['static_pic']?>&thumb=194&style=width" style="background-repeat:no-repeat;background-color:#eee">

	<div id=main_div style="width:195px;height:266px;position:relative;text-align:left;" onmouseover=show_div('#product_<?=$value['id']?>') onmouseout=hide_div('#product_<?=$value['id']?>') >

		<div style='height:205px;width:194px;position:absolute;margin-left:5px;margin-top:0px;z-index:2;cursor:hand' onclick="go_link('/product/<? echo trim(strtolower(str_replace(" ", "-", $value[static_name]))); ?>')">
		
		</div>

		<div id=product_<?=$value[id]?> style="height:50px;width:194px;position:absolute;margin-left:5px;margin-top:185px;z-index:2;display:none;">

		<div style="height:75px;width:184px;position:absolute;background-color:#FFF;border-radius:5px;opacity:0.4;filter:alpha(opacity=40);">

		</div>

		<div style="height:50px;width:194px;position:absolute;text-align:center;margin-top:10px">

		<a href=/product/<?=$value['static_alias']?>  style="font:bold 9pt arial;color:black"><?=$value['static_name']?>  <br>$ <?=$value['static_cost']?> </a>

		<p>

		<a class=group href="/ajax/<?=$value['static_alias']?> " style="border-radius:5px;background-color:#000;color:white;padding:3px;font:normal 8pt arial;">QUICK VIEW</a>

		</div>	

		</div>

		</div>

	</div>

</td>

<?

$i=$i+1;

if($i==5){

?>


</tr>

<tr><td colspan=10 height=3></td></tr>


<?

$i=0;

}
else
{

?>

<td width=5></td>

<? 

}

}

?>

</table>


<? $this->load->view("footer"); ?>