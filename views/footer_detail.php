</div>



</td>



<tr>



<tr>



<td colspan=10 height=35 align=right style=padding-top:10px>

<hr>


&copy; 2013 Copyright by YOON



</td>



</tr>



</table>



</td>



<td width=5><img src=images/spacer.gif width="5"></td>



</tr>



</table>



</center>



<script type="text/javascript" src="http://www.yoonnyc.com/easyzoom.js"></script>



<script>



function show_div(div_name){



$(div_name).css('display','');



}



function hide_div(div_name){



$(div_name).css('display','none');



}



$(document).ready(function() {


		<?

		if(count($photo_list)>1){

		foreach ($photo_list as $key => $value) {

			echo "$('a.zoom$value[id]').easyZoom(); ";

		}

		}
		else
		{


		foreach ($static_list as $key => $value) {

			echo "$('a.zoom$value[id]').easyZoom(); ";

		}

		}	

		?>	


		$(".tab_content").hide();

			$(".tab_content:first").show(); 



			$("ul.tabs li").click(function() {

				$("ul.tabs li").removeClass("active");

				$(this).addClass("active");

				$(".tab_content").hide();

				var activeTab = $(this).attr("rel"); 

				$("#"+activeTab).fadeIn(); 

			});



			$('.bxslider').bxSlider({



			  pagerCustom: '#bx-pager'

			  

			});



			$("#slider").easySlider({

				auto: true, 

				continuous: true,

				prevText: '',

				nextText: '',

				speed : 1800

			});		

		

			$("a.group").fancybox({

				'transitionIn'	:	'elastic',

				'transitionOut'	:	'elastic',

				'speedIn'		:	600, 

				'speedOut'		:	200, 

				'titleShow'	:	true,

				'overlayShow'	:	true

			});	

	

});



</script>


</body>



</html>