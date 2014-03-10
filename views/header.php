<html xmlns:fb="http://ogp.me/ns/fb#">

<head>


<?

if(isset($static_list)){

foreach ($static_list as $key => $value) {

?>

<title><?=$value[static_name]?> / <?=$category_name?></title>

<meta property="og:title" content="<?=$value[static_name]?> / <?=$category_name?>"/>

<meta property="og:type" content="product"/>

<meta property="og:url" content="/product/<? echo trim(strtolower(str_replace(" ", "-", $value[static_name]))); ?>"/>

<meta property="og:image" content="/files/<?=$value[static_pic]?>"/>

<meta property="og:description"  content="<?=strip_tags(trim($value[static_content]))?>"/>

<meta http-equiv="description" content="<?=$site[page_desc]?>">

<meta  name="keywords" content="<?=$site[page_keyword]?>">

<?

}

}
else
{	

?>

<title><?=$site[page_title]?></title>

<meta http-equiv="description" content="<?=$site[page_desc]?>">

<meta  name="keywords" content="<?=$site[page_keyword]?>">

<?

}

?>

<meta property="twitter:account_id" content="823306380" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta property="fb:admins" content="100000731861452"/>

<? $this->load->view("style"); ?>

<link href="/css/fonts.css" type="text/css" rel="stylesheet" />	

<script type="text/javascript" src="/js/site.js"></script>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> 

<link rel="stylesheet" type="text/css" href="/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

<script type="text/javascript" src="/fancybox/jquery.fancybox-1.3.4.js"></script>

<script type="text/javascript" src="/js/jquery.cookie.js"></script>

<script type="text/javascript" src="/js/easySlider1.7.js"></script>

<script src="/js/slides.min.jquery.js"></script>

<script type="text/javascript" src="/js/CreateHTML5Elements.js"></script>

</head>

<body marginwidth=0 marginheight=0 topmargin=0 leftmargin=0>

<center>

<table width="100%"  border="0" cellpadding="0" cellspacing="0" bgcolor="white" id="logo-scroll" style="display:none"> 

<tr>

<td height=50>

<center>

	

<table width="995"  border="0" cellpadding="0" cellspacing="0"> 



<tr>

<td width=945>

	<a href=/><img src=/images/logo.jpg></a>

</td>


	<td  width=25>

	

	<a href=/basket><img src=/images/bag.png border=0 style=margin-bottom:5px></a>

	

	</td>

	

	<td width=35>

	

	( <? echo $basket_check; ?> )

	

	</td>

	</tr>

</table>

</td>

</tr>

</table>

</center>


<div id="fb-root"></div>

<script>(function(d, s, id) {

  var js, fjs = d.getElementsByTagName(s)[0];

  if (d.getElementById(id)) return;

  js = d.createElement(s); js.id = id;

  js.src = "https://connect.facebook.net/en_US/all.js#xfbml=1&appId=352670034807023";

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

	

	<form action=/search method=post>


	<td  width=200>



	<table width="166"  border="0" cellpadding="0" cellspacing="0" style="background:url(/images/searching.png) no-repeat top center;">

	

	<tr>	



	<td style="width:96px;height:24px">

	

	<input type=text name=q style="width:94px;height:18px;border:0;margin-left:5px">



	</td>



	<td>



	<input type=image src=/images/spacer.gif style="width:70;height:24">

	

	</td>



	</tr>



	</table>

	

	</td>

	

	</form>

	

	<td  width=150>

	

	<a href=https://pinterest.com/yoonnyc target=_blank><img src=/images/pinterest.png border=0></a> 

	<a href=http://www.facebook.com/yoonnyc target=_blank><img src=/images/facebook.png border=0></a> 

	<a href=http://www.twitter.com/yoon_nyc target=_blank><img src=/images/twitter.png border=0></a> 

	<a href=http://www.instagram.com/yoon_nyc target=_blank><img src=/images/instagram.png border=0></a>

	<a href=http://yoonnyc.tumblr.com target=_blank><img src=/images/tumblr.png border=0></a>
	

	</td>	

	

	<td  width=25>

	

	<a href=/basket><img src=/images/bag.png border=0 style=margin-bottom:5px></a>

	

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