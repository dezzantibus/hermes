{include file='admin/head.tpl'}

<h1>{$smarty.const.Albanian::ADMIN_MENU_ARTICLE}</h1>

<select onchange="window.location='?cat=' + this.value">

	<option value="-1">{$smarty.const.Albanian::MEX_SELECT_OPTION}</option>

	{foreach from=$categories item='cat'}

		{if $cat.children|@count == 0}

			<option value="{$cat.id}"{if $cat.id eq $category->getData( 'id' )} selected="selected"{/if}>{$cat.name}</option>

		{else}

			<optgroup label="{$cat.name}">

				{foreach from=$cat.children item='child'}

					<option value="{$child.id}"{if $child.id eq $category->getData( 'id' )} selected="selected"{/if}>{$child.name}</option>

				{/foreach}

			</optgroup>

		{/if}

	{/foreach}

</select>

<table id="adminList">

	<tr>

        <th>{$smarty.const.Albanian::LABEL_DATE}</th>

    	<th>{$smarty.const.Albanian::LABEL_TITLE}</th>
        
        <th>{$smarty.const.Albanian::LABEL_CATEGORY}</th>
    
        <th>{$smarty.const.Albanian::LABEL_JOURNALIST}</th>

		<th><a href="?cat={$category->getData( 'id' )}&amp;art=0">{$smarty.const.Albanian::ADMIN_MENU_NEW}</a></th>
    
    </tr>

    {foreach from=$category->getPage() item='article'}
    
		<tr>
        
        	<td>{$article->getData( 'created' )}</td>
        
        	<td>{$article->getData( 'title' )}</td>
        
        	<td>{$category->getData( 'name' )}</td>
        
        	<td>{$session.journalist.fname} {$session.journalist.lname}</td>

			<td>
				<a href="?cat={$category->getData( 'id' )}&amp;art={$article->getData( 'id' )}">{$smarty.const.Albanian::ADMIN_MENU_EDIT}</a>
				<a href="?cat={$category->getData( 'id' )}&amp;art={$article->getData( 'id' )}&show=pics">{$smarty.const.Albanian::ADMIN_MENU_PICS}</a>
			</td>
        
        </tr>
    
    {/foreach}

</table>

{include file='include/feet.tpl'}