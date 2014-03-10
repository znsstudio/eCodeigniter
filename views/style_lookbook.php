
<style>



img {



	border : 0px;



}



#easy_zoom{

	width:400px;

	height:469px;	

	border:5px solid #eee;

	background:#fff;

	color:#333;

	position:relative;

	top:0px;

	left:0px;

	overflow:hidden;

	-moz-box-shadow:0 0 10px #777;

	-webkit-box-shadow:0 0 10px #777;

	box-shadow:0 0 10px #777;

	/* vertical and horizontal alignment used for preloader text */

	line-height:400px;

	text-align:center;

	z-index:100000000;

}

	

	ul.tabs {

		margin: 0;

		padding: 0;

		float: left;

		list-style: none;

		height: 32px;

		border-bottom: 1px solid #DBCFC3;

		border-left: 1px solid #DBCFC3;

		width: 100%;

		border-top-left-radius:5px;

		border-top-right-radius:5px;

	}

	

	ul.tabs li {

		float: left;

		margin: 0;

		cursor: pointer;

		padding: 0px 21px ;

		height: 31px;

		line-height: 31px;

		border: 1px solid #DBCFC3;

		border-left: none;

		font-weight: bold;

		background: #FFF;

		overflow: hidden;

		position: relative;

		border-top-left-radius:5px;

		border-top-right-radius:5px;

		font:normal 9pt arial;

	}

	

	ul.tabs li:hover {

		background: #FFF;

	}	

	

	ul.tabs li.active{

		background: #FFFFFF;

		border-bottom: 1px solid #FFFFFF;

		border-top-left-radius:5px;

		border-top-right-radius:5px;

	}

	

	.tab_container {

		border: 1px solid #DBCFC3;

		border-top: none;

		clear: both;

		float: left; 

		width: 100%;

		background: #FFFFFF;

		border-bottom-right-radius:5px;

		border-bottom-left-radius:5px;

	}

	

	.tab_content {

		padding: 20px;

		font-size: 10pt;

		display: none;

		border-bottom-right-radius:5px;

		border-bottom-left-radius:5px;	

		border-bottom-right-radius:5px;		

	}



		.cost {

		

		height:50px;

		width:204px;

		position:absolute;

		margin-left:5px;

		margin-right:5px;

		margin-top:145px;

		z-index:2;

		border-radius:5px;

		display:none;

		background-color:black;

		

		}



		#topic {

		

		font:bold 12pt arial;padding-bottom:10px; color: #741012;

		

		}



		.border {



		border: solid 1px #CCCCCC;margin-bottom:10px;padding:5px;



		}



		.topic {



		background-color:#B20000;font:bold 12pt arial;color:#fff;padding:5px;



		}



		a    { font-weight: bold ;color:#454545; text-decoration:none; font-size:8pt;}

		a:hover    { color:#454545; 	font-weight: bold ; text-decoration:none; font-size:8pt;}



		.upper_menu   { font-weight: bold ;color:white; text-decoration:none; font-size:11pt; font-family: font-bold; padding:3px; }

		.upper_menu:hover    { color:#FF9900; 	font-weight: bold ; text-decoration:none; font-size:11pt; font-family: font-bold; padding:3px;  }



		.upper_menu_selected   { font-weight: bold ;color:#FF9900; text-decoration:none; font-size:11pt; font-family: font-bold; padding:3px; }

		.upper_menu_selected:hover    { color:#FFFFFF; 	font-weight: bold ; text-decoration:none; font-size:11pt; font-family:font-bold; padding:3px;  }



		body,table,tr,td {

			font-weight: normal ; font-size: 12px; color: #454545; font-family: arial; text-decoration: none

		}



		textarea,select,input {

			font-weight: normal ; font-size: 12px; color: #454545; font-family: arial; text-decoration: none

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

			color: #000;

			font : normal 10pt Arial;

			z-index:10000;

			text-decoration:none;

		}

		

		nav ul li a {

			color:#000; 

			text-decoration:none;  

			padding:3px; 

			font : normal 10pt Arial; 

			z-index:10000;

		}

				

		nav ul ul {

			background: #fff; border-radius: 0px; padding: 0;

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

			color:black;

		}	

		

		nav ul ul li a:hover {

			font : normal 10pt Arial;

			z-index:10000;

			color:black;

		}

			

		nav ul ul ul {

			position: absolute; left: 100%; top:0;

			font : normal 10pt Arial;

			z-index:10000;

		}



		#content{

		position:relative;

		}



	/* Easy Slider */



	#slider ul, #slider li,

	#slider2 ul, #slider2 li{

		margin:0;

		padding:0;

		list-style:none;

		}



	#slider li, #slider2 li{ 

		/* 

			define width and height of list item (slide)

			entire slider area will adjust according to the parameters provided here

		*/ 

		width:995px;

		height:550px;

		overflow:hidden; 

		}	

	#prevBtn, #nextBtn,

	#slider1next, #slider1prev{ 

		display:block;

		width:30px;

		height:77px;

		position:absolute;

		left:5px;

		top:210px;

		z-index:1000;

		}	

	#nextBtn, #slider1next{ 

		left:965px;

		}														

	#prevBtn a, #nextBtn a,

	#slider1next a, #slider1prev a{  

		display:block;

		position:relative;

		width:30px;

		height:77px;

		background:url(../images/left.png) no-repeat 0 0;	

		}	

	#nextBtn a, #slider1next a{ 

		background:url(../images/right.png) no-repeat 0 0;	

		}	

		

	#lookbook_data {



	padding:5px;

	background-color:#741012;

	color:white;

	font:normal 10pt tahoma;

	position:relative;

	top:-35px;

	z-index:1000000;

	left:735px;

	text-align:center;

	display:block;

	width:250px;

	height:30px;

	}	

		

	// product slider	

	

	#product_slider { margin-top:-20px;  }

		

	#product_slider ul, #product_slider li,

	#product_slider2 ul, #product_slider2 li{

		margin:0;

		padding:0;

		list-style:none;

		}



	#product_slider li, #product_slider2 li{ 

		/* 

			define width and height of list item (slide)

			entire product_slider area will adjust according to the parameters provided here

		*/ 

		width:325px;

		height:478px;

		overflow:hidden; 

		}	

	#product_slider_prevBtn, #product_slider_nextBtn,

	#product_slider1next, #product_slider1prev{ 

		display:block;

		width:30px;

		height:77px;

		position:absolute;

		left:5px;

		top:210px;

		z-index:1000;

		}	

	#product_slider_nextBtn, #product_slider1next{ 

		left:295px;

		}														

	#product_slider_prevBtn a, #product_slider_nextBtn a,

	#product_slider1next a, #product_slider1prev a{  

		display:block;

		position:relative;

		width:30px;

		height:77px;

		background:url(../images/left.png) no-repeat 0 0;	

		}	

	#product_slider_nextBtn a, #product_slider1next a{ 

		background:url(../images/right.png) no-repeat 0 0;	

		}	

		

		

	/* SLIDER */





	/*

		Slideshow style

	*/



	#example {

		width:995px;

		height:487px;

		position:relative;

	}	

	

	#slides {

		z-index:100;

	}



	/*

		Slides container

		Important:

		Set the width of your slides container

		If height not specified height will be set by the slide content

		Set to display none, prevents content flash

	*/



	.slides_container {

		width:995px;

		height:487px;

		overflow:hidden;

		position:relative;

		display:none;

	}



	/*

		Each slide

		Important:

		Set the width of your slides

		Offeset for the 20px of padding

		If height not specified height will be set by the slide content

		Set to display block

	*/



	#slides .slide {

		padding:0px;

		width:995px;

		height:487px;

		display:block;

	}



	/*

		Next/prev buttons

	*/

	

	#slides .next,#slides .prev {

		position:absolute;

		top:220px;

		left:10px;

		width:28px;

		height:43px;

		display:block;

		z-index:101;

	}



	#slides .next {

		left:965px;

	}



	/*

		Pagination

	*/



	.pagination {

		margin:20px auto 0;

		width:350px;

		text-align:center;

	}



	.pagination li {

		float:left;

		margin:0 1px;

		list-style:none;

	}



	.pagination li a {

		display:block;

		width:12px;

		height:0;

		padding-top:12px;

		background-image:url(https://www.yoonnyc.com/img/pagination.png);

		background-position:0 0;

		float:left;

		overflow:hidden;

	}



	.pagination li.current a {

		background-position:0 -12px;

	}

			

		

		

</style>
