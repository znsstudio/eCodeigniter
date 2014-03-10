
		<ul>
		
		{foreach key=keys item=values from=$info_list}

		{if $values.menu_id==$value.id}

		{if $values.page_id!="0"}
		
		<li><a href="/index.php?action=page_view&page_id={$values.page_id}" class="header_menu">{$values.main_name}</a></li>

		{/if}

		{if $values.static_id!="0"}
		
		<li><a href="/index.php?action=static_detail&static_id={$values.static_id}"  class="header_menu">{$values.main_name}</a></li>
		
		{/if}

		{if $values.main_link!=""}
		
		<li><a href="/{$values.main_link}"  class="header_menu">{$values.main_name}</a></li>
		
		{/if}

		{if $values.module_id!="0"}

		<li><a href="{$values.module_id|getmain:"module_info":"module_link"}">{$values.main_name}</a></li>
				
		{/if}

		{if $values.category_id!="0"}

		<li><a href="/index.php?action=static_list&category_id={$values.category_id}">{$values.main_name}</a></li>
				
		{/if}

		{if $values.sub_id!="0"}

		<li><a href="/index.php?action=static_list&sub_id={$values.sub_id}">{$values.main_name}</a></li>
				
		{/if}
						
		{/if}
				
		{/foreach}
		
		</ul>
