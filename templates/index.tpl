{include file='include/head.tpl'}

<main class="mainColumn" id="index">

	{include file="include/home_hero.tpl"}

	<div class="highlight">

		{include file='include/cell/home_article_vertical.tpl'}
		{include file='include/cell/home_article_vertical.tpl'}
		{include file='include/cell/home_article_vertical.tpl'}

	</div>

	{$google->adwords('728x90')}

	<div class="highlight">

		{include file='include/cell/home_popular.tpl'}
		{include file='include/cell/home_article_horizontal.tpl'}
		{include file='include/cell/home_article_horizontal.tpl'}

	</div>

	{$google->adwords('728x90')}

	<div class="highlight">

		{include file='include/cell/home_article_vertical.tpl'}
		{include file='include/cell/home_article_horizontal.tpl'}
		{include file='include/cell/home_article_horizontal.tpl'}

	</div>

	{$google->adwords('728x90')}

	{include file="include/home_latest.tpl"}

</main>

{include file="include/right_column.tpl"}

<div class="clear"></div>

{include file='include/feet.tpl'}
