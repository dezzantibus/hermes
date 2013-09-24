{include file='admin/head.tpl'}

<h1>{$article->getData( 'title' )|default:$smarty.const.Albanian::NEW_ARTICLE}</h1>

<form action="?cat={$category->getData( 'id' )}" method="post">

	<input type="hidden" name="id" value="{$article->getData( 'id' )|default:'0'}">

	<input type="hidden" name="category_id" value="{$category->getData( 'id' )}">

	<input type="hidden" name="journalist_id" value="{$session.journalist.id|default:1}">

	<label>{$smarty.const.Albanian::FORM_TITLE}</label>
	<input type="text" name="title" value="{$article->getData( 'title' )}">

	<label>{$smarty.const.Albanian::FORM_SUBTITLE}</label>
	<input type="text" name="subtitle" value="{$article->getData( 'subtitle' )}">

	<label>{$smarty.const.Albanian::FORM_BRIEF}</label>
	<textarea name="brief">{$article->getData( 'brief' )}</textarea>

	<label>{$smarty.const.Albanian::FORM_TEXT}</label>
	<textarea name="text">{$article->getData( 'text' )}</textarea>

	<input type="checkbox" name="hero"{if $article->getData( 'hero' ) eq 1} checked="checked"{/if}>
	<label>{$smarty.const.Albanian::FORM_HERO}</label>

	<input type="checkbox" name="homepage"{if $article->getData( 'homepage' ) eq 1} checked="checked"{/if}>
	<label>{$smarty.const.Albanian::LABEL_HOMEPAGE}</label>

	<input type="checkbox" name="highlight"{if $article->getData( 'highlight' ) eq 1} checked="checked"{/if}>
	<label>{$smarty.const.Albanian::LABEL_HIGHLIGHTED}</label>

	<input type="submit" value="{$smarty.const.Albanian::ADMIN_MENU_SAVE}">

</form>

{include file='include/feet.tpl'}