{include file='admin/head.tpl'}

<h1>{$article->getData( 'title' )} - {$smarty.const.Albanian::ADMIN_MENU_PICS}</h1>

<form action="?cat={$smarty.get.cat}&art={$smarty.get.cat}&show=pics" method="post">

	<input type="hidden" name="id" value="{$article->getData( 'id' )|default:'0'}">

	{foreach from=$article->getImages() item='pic'}



	{/foreach}

	<input type="submit" value="{$smarty.const.Albanian::ADMIN_MENU_SAVE}">

	<input type="button" value="{$smarty.const.Albanian::ADMIN_MENU_BACK}">

</form>

{include file='include/feet.tpl'}