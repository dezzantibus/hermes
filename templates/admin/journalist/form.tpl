{include file='admin/head.tpl'}

<h1>{$journalist->getData( 'fname' )|default:$smarty.const.Albanian::NEW_JOURNALIST} {$journalist->getData( 'lname' )|default:''}</h1>

<form action="?" method="post">

	<input type="hidden" name="id" value="{$article->getData( 'id' )|default:'0'}">

	<label>{$smarty.const.Albanian::LABEL_FNAME}</label>
	<input type="text" name="fname" value="{$article->getData( 'fname' )}">

	<label>{$smarty.const.Albanian::LABEL_LNAME}</label>
	<input type="text" name="lname" value="{$article->getData( 'lname' )}">

	<label>{$smarty.const.Albanian::LABEL_EMAIL}</label>
	<input type="text" name="email" value="{$article->getData( 'email' )}">

	<label>{$smarty.const.Albanian::LABEL_PASSWORD}</label>
	<input type="text" name="pass" value="">

	<input type="submit" value="{$smarty.const.Albanian::ADMIN_MENU_SAVE}">

</form>

{include file='include/feet.tpl'}