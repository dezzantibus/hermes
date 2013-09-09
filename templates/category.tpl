{include file='include/head.tpl'}

<main class="mainColumn" id="category">

	{*

		{foreach from=$list item='item' key='key'}

			{include file="include/category.tpl"}

			{if $key == 2 || $key == 6}

				{$google->adwords('728x15')}

			{/if}

		{/foreach}

	*}

	{include file="include/paging_bar.tpl"}

	<div id="list">

		{include file="include/cell/category.tpl"}

		{include file="include/cell/category.tpl"}

		{include file="include/cell/category.tpl"}

		{$google->adwords('728x15')}

		{include file="include/cell/category.tpl"}

		{include file="include/cell/category.tpl"}

		{include file="include/cell/category.tpl"}

		{include file="include/cell/category.tpl"}

		{$google->adwords('728x15')}

		{include file="include/cell/category.tpl"}

		{include file="include/cell/category.tpl"}

		{include file="include/cell/category.tpl"}

	</div>

	{include file="include/paging_bar.tpl"}

</main>

<script type="text/javascript">

	$('#list a').each(function(){

		var height = 126;

		height -= $(this).children('.title').outerHeight(true);
		$(this).children('.text').css('height', height + 'px');

	});

</script>

{include file="include/right_column.tpl"}

<div class="clear"></div>

{include file='include/feet.tpl'}
