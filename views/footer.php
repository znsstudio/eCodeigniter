</div>



</td>



<tr>



<tr>



<td colspan=10 height=35 align=right style=padding-top:10px;padding-bottom:10px>

<hr>

<a href=/privacy> Privacy Policy</a> | &copy; 2013 Copyright by YOON

</td>



</tr>



</table>



</center>

<script>

function show_div(div_name){

$(div_name).css('display','');

}

function hide_div(div_name){

$(div_name).css('display','none');

}

var fixed = false;

$(document).scroll(function() {
    if( $(this).scrollTop() > 100 ) {
        if( !fixed ) {
            fixed = true;
            $('#logo-scroll').css({position:'none', display:'block'});
        }
    } else {
        if( fixed ) {
            fixed = false;
            $('#logo-scroll').css({display:'none'});
        }
    }
});

$(document).ready(function() {

			// Set starting slide to 1

			var startSlide = 1;

			// Get slide number if it exists

			if (window.location.hash) {

				startSlide = window.location.hash.replace('#','');

			}

			// Initialize Slides

			$('#slides').slides({

				preload: true,

				preloadImage: 'img/loading.gif',

				generatePagination: true,

				play: 5000,

				pause: 2500,

				hoverPause: true,

				// Get the starting slide

				start: startSlide,

				animationComplete: function(current){

					// Set the slide number as a hash

					window.location.hash = '#' + current;

				}

			});

			$("#slider").easySlider({

				auto: true, 

				continuous: true,

				prevText: '',

				nextText: '',

				speed : 1800

			});		


			$("a#inline").fancybox({

					'hideOnContentClick': true

				})

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

<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-619318-72', 'yoonnyc.com');

  ga('send', 'pageview');


</script>

<script type="text/javascript">
adroll_adv_id = "U3UAHFXC4JG57KAIRIJ7XN";
adroll_pix_id = "JAIXGLGFVRCUPMMVKPDIOH";
(function () {
var oldonload = window.onload;
window.onload = function(){
   __adroll_loaded=true;
   var scr = document.createElement("script");
   var host = (("https:" == document.location.protocol) ? "https://s.adroll.com" : "http://a.adroll.com");
   scr.setAttribute('async', 'true');
   scr.type = "text/javascript";
   scr.src = host + "/j/roundtrip.js";
   ((document.getElementsByTagName('head') || [null])[0] ||
    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
   if(oldonload){oldonload()}};
}());
</script>


</body>

</html>