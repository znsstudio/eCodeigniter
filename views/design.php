<html>
<head>
<style>

#siteFooter {
	width:100%;
	background:#000;
	bottom: 0;
	color: #fff;
	font-size: 110%;
	left:0;
	overflow:hidden;
	z-index:100;
	line-height:100%;
	height:65px;
}

#siteFooter {
	position:fixed; /* testato fino a IE7 compreso */
}


#wrapper {

margin: 0;
padding: 0;
border: 0;
font-size: 100%;
font: inherit;
vertical-align: baseline;
font-weight: normal;
position: relative;
height: 100%;

}

#siteHeader {
	position: fixed;
}

#siteHeader {
	margin: 0 auto;
	background: #000;
	top: 0; left: 0;
	/* overflow: hidden; -- commented to fix bug */
	z-index: 100;
	width: 100%;
	height:65px;
}

		nav {

		  z-index:10000;

		}



		nav ul ul {

			display: none;

			font : normal 10pt Arial;

			z-index:10000;

		}



		nav ul li:hover > ul {

			display: block;

			font : normal 10pt Arial;

			z-index:10000;

		}



		nav ul {

			list-style: none;

			position: relative;

			display: inline-table;

			font : normal 10pt Arial;

			z-index:10000;

		}

		

		nav ul:after {

			content: ""; clear: both; display: block;

			font : normal 10pt Arial;

			z-index:10000;

		}



		nav ul li {

			float: left;

			font : normal 10pt Arial;

			z-index:10000;

			padding:5px;



		}

		

		nav ul li:hover {

			font : normal 10pt Arial;

			z-index:10000;

		}

		

		nav ul li:hover a {

			color: #fff;

			font : normal 10pt Arial;

			z-index:10000;

			text-decoration:none;

		}

		

		nav ul li a {

			color:#fff; 

			text-decoration:none;  

			padding:3px; 

			font : normal 10pt Arial; 

			z-index:10000;

		}

				

		nav ul ul {

			background: #000; border-radius: 0px; padding: 0;

			position: absolute; top: 100%;

			font : normal 10pt Arial;

			z-index:10000;

		}

		

		nav ul ul li {

			float: none; 

			z-index:10000;

			padding:5px;

		}

		

		nav ul ul li a {

			font : normal 10pt Arial;

			z-index:10000;

			color:#fff;

		}	

		

		nav ul ul li a:hover {

			font : normal 10pt Arial;

			z-index:10000;

			color:#fff;

		}

			

		nav ul ul ul {

			position: absolute; left: 100%; top:0;

			font : normal 10pt Arial;

			z-index:10000;

		}

</style>

</head>

<body>

<header id=siteHeader>  

	<div style='float:left'>

		<img src=/images/logo_white.png>


	</div>
	
	<div style='float:left;width:400px'>	

		<nav style="margin-left: -20px;margin-top:10px">

			<ul>


              <? 

              foreach($menu['menu_main'] as $key=>$value){ 

                 echo "<li>";	

				 echo "<a href='$value[seo_link]'>$value[main_name]</a>";           

                 	echo '<ul>';

						foreach($menu['menu_info'] as $keys=>$values){ 

							if($values[menu_id]==$value[id]){	

				                echo "<li>";	

				                echo "<a href='$values[seo_link]'>$values[main_name]</a>";        

				                echo  "</li>";

			            	}

		              	} 

		            echo '</ul>';  	

                 echo  "</li>";

              } 

              ?>


			</ul>

		
		</nav>

	</div>

	<div style='float:right;margin-top:20px;margin-right:10px'>


	</div>	

 </header>

<div id="wrapper" style="margin-top: 70px; margin-bottom: 65px;">

  <?

	$i=0;

	foreach($static_list_index as $key=>$value){

 ?>

	<a href=/product/<?=$value['static_alias']?>  style="font:bold 9pt arial;color:black"><?=$value['static_name']?>  <br>$ <?=$value['static_cost']?> </a>";
 
 <?

	}

 ?>

<div style="height:70px"></div>

</div>

<footer id=siteFooter>  


	<div style='float:right;margin-top:20px;margin-right:10px'>


		<a href="https://pinterest.com/yoonnyc" target="_blank"><img src="/social/pinterest.png" border="0"></a> 

		<a href="http://www.facebook.com/yoonnyc" target="_blank"><img src="/social/facebook.png" border="0"></a> 

		<a href="http://www.twitter.com/yoon_nyc" target="_blank"><img src="/social/twitter.png" border="0"></a> 

		<a href="http://www.instagram.com/yoon_nyc" target="_blank"><img src="/social/instagram.png" border="0"></a>

		<a href="http://yoonnyc.tumblr.com" target="_blank"><img src="/social/tumblr.png" border="0"></a>
		

	</div>	

</footer>

</body>

</html>	
