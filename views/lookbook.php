<? $this->load->view('header_lookbook'); ?>



<div id="example">



<div id="slides">



<div class="slides_container">


<?

$i=0;

foreach($arr as $key=>$value){

if($i==0){

?>

<div class="slide">

<table>

<tr> 

<?

}

?>

<td background="https://www.yoonnyc.com/pic.php?file_name=files/<?=$value[static_pic]?>&thumb=332&style=width" style="background-repeat:no-repeat;background-color:#eee" width=330 height=467>

<div id=main_div style="width:330px;height:467px;position:relative;text-align:left;" onmouseover=show_div('#product_<?=$value[id]?>') onmouseout=hide_div('#product_<?=$value[id]?>')>

	<div id=product_<?=$value[id]?> style="height:50px;width:200px;position:absolute;margin-left:65px;margin-top:290px;z-index:2;display:none;">

	<div style="height:75px;width:204px;position:absolute;background-color:#FFF;border-radius:5px;opacity:0.4;filter:alpha(opacity=40);">
	
	</div>

	<div style="height:50px;width:204px;position:absolute;text-align:center;margin-top:28px">
	
		<a href="javascript:open_window('http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.yoonnyc.com%2Findex.php%3Faction%3Dlookbook%26category_id%3D<?=$category_id?>&media=http%3A%2F%2Fwww.yoonnyc.com%2Ffiles%2F<?=$value[static_pic]?>&description=Yoon%20Nyc',640,480)" target=_blank><img src=https://www.yoonnyc.com/images/pinterest.png border=0></a> 
		<a href="javascript:open_window('https://www.facebook.com/sharer.php?u=http%3A%2F%2Fwww.yoonnyc.com%2Findex.php%3Faction%3Dlookbook%26category_id%3D<?=$category_id?>&t=YoonNYC.com',640,480)" target=_blank><img src=https://www.yoonnyc.com/images/facebook.png border=0></a> 
		<a href="javascript:open_window('http://twitter.com/share?text=Checkout+Yoon+LOOKBOOK&url=http%3A%2F%2Fwww.yoonnyc.com%2Findex.php%3Faction%3Dlookbook%26category_id%3D<?=$category_id?>',640,480)" target=_blank><img src=https://www.yoonnyc.com/images/twitter.png border=0></a> 

	</div>	
	
	</div>
	
	</div>
		
</div>

</td>

<?

$i = $i + 1;

if($i==3){

?>

</tr>

</table>

</div>

<?

$i=0;

}

}

?>

</div>



<a href="#" class="prev"><img src="https://www.yoonnyc.com/img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>

<a href="#" class="next"><img src="https://www.yoonnyc.com/img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>



</div>



<div id=lookbook_data> <?=$categor_name?> </div>



</div>



<? $this->load->view('footer'); ?>
