		<nav style="margin-left: -50px">

		

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