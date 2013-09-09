{include file='admin/head.tpl'}

<h1>{$smarty.const.Albanian::ADMIN_MENU_JOURNALIST}</h1>

<table id="adminList">

	<tr>

		<th>{$smarty.const.Albanian::LABEL_FNAME}</th>

		<th>{$smarty.const.Albanian::LABEL_LNAME}</th>

		<th>{$smarty.const.Albanian::LABEL_EMAIL}</th>

		<th><a href="?j=0">{$smarty.const.Albanian::ADMIN_MENU_NEW}</a></th>

	</tr>

	{foreach from=$journalists item='j'}

		<tr>

			<td>{$j->getData( 'fname' )}</td>

			<td>{$j->getData( 'lname' )}</td>

			<td>{$j->getData( 'email' )}</td>

			<td><a href="?j={$j->getData( 'id' )}">{$smarty.const.Albanian::ADMIN_MENU_EDIT}</a></td>

		</tr>

	{/foreach}

</table>

{include file='include/feet.tpl'}