<? $this->load->view("header"); ?>

<script>

function go_link(link_name){

window.location=link_name;	

}

</script>


<?

if(count($static_list_index)=="0" and $main_alias=="sale"){

?>

	<div id=topic style=padding-top:100px!important>

	We currently do not have any items on SALE, however, 

	<br>sign up for our newsletter and we  will alert you once we do have styles on SALE!

	</div>

	<p>

		<table border="0" cellpadding="0" cellspacing="0" width="">
		<form name="myform" action="/sign_up" method="POST" enctype="multipart/form-data">
		<tbody><tr><td height="25">Your fullname</td><td><input type="text" name="member_fullname" id="member_fullname" size="30" value=""> </td></tr>
		<tr><td height="25">Your email</td><td><input type="text" name="member_email" id="member_email" size="30" value=""> </td></tr>
		<tr><td width="160" height="30"></td><td height="25"> enter below code to right box</td></tr>
		<tr><td height="25"><img src="http://www.yoonnyc.com/pic_captcha.php"></td><td><input type="text" name="captcha_code" id="captcha_code" size="30" value=""> </td></tr>
		<tr><td height="30"></td><td><input type="submit" value="sign up"></td></tr></tbody></table></form>
		</p></center></td></tr></tbody></table>
		</td>
		<td valign="top">
		</td>
		</tr>
		</tbody></table>



<?

} elseif ( count($static_list_index)=="0") {
	
?>

<div id=topic style=padding-top:100px!important>

Sorry for your patronage, unfortunately this is not available yet, please check back soon!

</div>

<?

} else {
	
?>


<table  border="0" cellpadding="0" cellspacing="0" width="100%">  


<tr>

<td width=135 valign=top style="position:fixed">


<div id=topic>

CATEGORY

</div>


<?php

foreach($category_list as $key=>$value){


echo "<div style=padding-bottom:5px><a href=/products/$main_alias/category/$value[main_alias]> $value[main_name] </a></div>";

}

?>

<p>



<div id=topic>



TYPE



</div>


<?php

foreach($type_list as $key=>$value){

echo "<div style=padding-bottom:5px><a href=/products/$main_alias/type/$value[main_alias]> $value[main_name] </a></div>";

}

?>



</td>



<td width=860 valign=top>



<div  id=topic>



<?=$topic_name?>



</div>



<table  border="0" cellpadding="0" cellspacing="0" > 


<?

$i=0;

foreach($static_list_index as $key=>$value){

if($i==0){ echo "<tr>"; }

?>

<td height=360 valign=top>

	<center>

	<div id=main_div style="width:214px;height:290px;position:relative;text-align:left;background:url(/temp/214_<?=$value['static_pic']?>);background-repeat:no-repeat;margin-bottom:15px">


		<a href=/product/<?=$value['static_alias']?>  style="font:bold 9pt arial;color:black"> <img src=/images/spacer.gif width=214 height=290 border=0> </a>


	</div>	


		<a href=/product/<?=$value['static_alias']?>  style="font:bold 9pt arial;color:black"><?=$value['static_name']?>  

			<br>

			<span style='text-decoration:line-through;'>$ <? echo round($value['static_cost']*1); ?></span> 

			<div style='color:red'>$<? echo number_format(round($value['static_cost']*1)*0.40,2); ?> </div>

		</a>

		<p>

		<a class=group href="/ajax/<?=$value['static_alias']?> " style="border-radius:5px;background-color:#000;color:white;padding:3px;font:normal 8pt arial;">QUICK VIEW</a>



</td>


<?

$i=$i+1;

if($i==4){

?>


</tr>

<tr><td colspan=10 height=30><hr></td></tr>


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

</td>



</tr>



</table>


<?

}

?>



<? $this->load->view("footer"); ?>
