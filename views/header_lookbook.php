<html xmlns:fb="http://ogp.me/ns/fb#">

<head>


<?

if(isset($static_list)){

foreach ($static_list as $key => $value) {

?>

<title><?=$value[static_name]?></title>

<meta property="og:title" content="<?=$value[static_name]?>"/>

<meta property="og:type" content="product"/>

<meta property="og:url" content="http://www.yoonnyc.com/product/<? echo trim(strtolower(str_replace(" ", "-", $value[static_name]))); ?>"/>

<meta property="og:image" content="http://www.yoonnyc.com/files/<?=$value[static_pic]?>"/>

<meta property="og:description"  content="<?=$value[static_content]?>"/>
                  
<?

}

}
else
{	

?>

<meta property="og:title" content="<?=$site[page_title]?>"/>

<meta property="og:type" content="article"/>

<meta property="og:image" content="http://www.yoonnyc.com/images/logo.jpg"/>

<meta property="og:description"  content="<?=$site[page_desc]?>"/>

<meta http-equiv="Description" content="<?=$site[page_desc]?>">

<meta  name="keywords" content="<?=$site[page_keyword]?>">

<?

}

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta property="fb:admins" content="100000731861452"/>

<? $this->load->view("style_lookbook"); ?>

<link href="https://www.yoonnyc.com/css/fonts.css" type="text/css" rel="stylesheet" />	

<script type="text/javascript" src="https://www.yoonnyc.com/js/site.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> 

<link rel="stylesheet" type="text/css" href="https://www.yoonnyc.com/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<script type="text/javascript" src="https://www.yoonnyc.com/fancybox/jquery.fancybox-1.3.4.js"></script>

<script type="text/javascript" src="https://www.yoonnyc.com/js/jquery.cookie.js"></script>

<script type="text/javascript" src="https://www.yoonnyc.com/js/easySlider1.7.js"></script>

<script src="https://www.yoonnyc.com/js/slides.min.jquery.js"></script>

<script type="text/javascript" src="https://www.yoonnyc.com/js/CreateHTML5Elements.js"></script>

</head>

<body marginwidth=0 marginheight=0 topmargin=0 leftmargin=0>


<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=352670034807023";

  fjs.parentNode.insertBefore(js, fjs);

}(document, 'script', 'facebook-jssdk'));</script>


<center>

	

<table width="995"  border="0" cellpadding="0" cellspacing="0"> 



<tr>

			

<td  colspan=10>

	

	<table width="995"  border="0" cellpadding="0" cellspacing="0"> 



	<tr>

			


	<td>



	<? $this->load->view("inc_top_menu"); ?>



	</td>

	

	<form action=index.php method=get>

	

	<input type=hidden name=action value=static_list>

	

	<td  width=200>



	<table width="166"  border="0" cellpadding="0" cellspacing="0" style="background:url(https://www.yoonnyc.com/images/searching.png) no-repeat top center;">

	

	<tr>	



	<td style="width:96px;height:24px">

	

	<input type=text name=q style="width:94px;height:18px;border:0;margin-left:5px">



	</td>



	<td>



	<input type=image src=http://www.yoonnyc.com/images/spacer.gif style="width:70;height:24">

	

	</td>



	</tr>



	</table>

	

	</td>

	

	</form>

	

	<td  width=150>

	

	<a href=https://pinterest.com/yoonnyc target=_blank><img src=http://www.yoonnyc.com/images/pinterest.png border=0></a> 

	<a href=http://www.facebook.com/yoonnyc target=_blank><img src=http://www.yoonnyc.com/images/facebook.png border=0></a> 

	<a href=http://www.twitter.com/yoon_nyc target=_blank><img src=http://www.yoonnyc.com/images/twitter.png border=0></a> 

	<a href=http://www.instagram.com/yoon_nyc target=_blank><img src=http://www.yoonnyc.com/images/instagram.png border=0></a>

		<a href=http://yoonnyc.tumblr.com target=_blank><img src=https://www.yoonnyc.com/images/tumblr.png border=0></a>
	

	</td>	

	

	<td  width=25>

	

	<a href=/basket><img src=https://www.yoonnyc.com/images/bag.png border=0 style=margin-bottom:5px></a>

	

	</td>

	

	<td width=35>

	

	( <? echo $basket_check; ?> )

	

	</td>



	</tr>



	</table>





</td>



</tr>


<tr>

<td colspan=10>

<center>

<a href=/><img src=/images/header_logo.jpg border=0></a>


</td>


</tr>

<tr>

<tr>



<td colspan=5 height=10>



		<table width="995"  border="0" cellpadding="0" cellspacing="0"> 



	<tr>

			

	<td  width=248 height=40>



	<font face=arial>  FREE SHIPPING ON ALL ORDERS! </font> </center>

	

	</td>

	

	<td  width=248 height=40 align=center>

	

	<a href=/sign_up style='font-weight:normal'> <font face=arial > SIGN UP FOR NEWSLETTER  CLICK HERE </font> </center> </a>

	

	</td>



	<td  width=248 height=40 align=right>

	

	<a href=/track style='font-weight:normal'> <font face=arial > TRACK YOUR ORDER </font> </center> </a>


	</td>


	<td  width=248 height=40 align=right>

	<?

	$member_id=$this->session->userdata('member_id');

	if($member_id==""){

	?>

	<a href=/login style='font-weight:normal'> <font face=arial > SIGN IN / SIGN UP </font> </center> </a>

	<?

	}

	else

	{

	?>

	<a href=/member style='font-weight:normal'> <font face=arial > Welcome, <?=$this->Content->sql("select member_fullname from member_info where id='$member_id'","member_fullname")?> </font>  </a>  <a href=/destroy style='font-weight:normal'> LOGOUT </a>

	<?

	}	

	?>

	</td>	


	</tr>


	</table>

</td>

</tr>

<tr>

<td valign=top colspan=10 height=500>

<div id=mine>