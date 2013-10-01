{include file='admin/head.tpl'}

<h1>{$smarty.const.Albanian::ADMIN_MENU_LOGIN}</h1>

<form action="?" method="post">

	<input type="hidden" name="action" value="adminLogin">

	<label>{$smarty.const.Albanian::LABEL_EMAIL}</label>
	<input type="text" name="email">

	<label>{$smarty.const.Albanian::LABEL_PASSWORD}</label>
	<input type="password" name="password">

	<input type="submit" value="{$smarty.const.Albanian::ADMIN_MENU_LOGIN}">

</form>


{include file='include/feet.tpl'}