{include file='admin/head.tpl'}

<h1>{$smarty.const.Albanian::ADMIN_MENU_CATEGORY}</h1>

<ul class="categoryTree">

	{foreach from=$categories item='cat'}

		{include file='admin/cell_category.tpl' category=$cat level=1}

	{/foreach}

	<li>

		<table>

			<tr>

				<form action='' id="formNew0" method="post">

					<input type="hidden" value="0" name="parent_id" />

					<input type="hidden" value="new" name="action" />

					<td><input type="text" name="name" value="" /></td>

					<td>
						<a onclick="newCat(0)">{$smarty.const.Albanian::ADMIN_MENU_NEW}</a>
					</td>

				</form>

			</tr>

		</table>

	</li>

</ul>

<script type="text/javascript">

	var delmex = '{$smarty.const.Albanian::MEX_DELETE}';

	{literal}

	function editCat( id )
	{
		$( '#action' + id ).attr( 'value', 'edit' );
		$( '#form' + id ).submit();
	}

	function deleteCat( id )
	{

		$conf = confirm( delmex );

		if( $conf )
		{
			$( '#action' + id ).attr( 'value', 'delete' );
			$( '#form' + id ).submit();
		}

	}

	function newCat( id )
	{

		$( '#formNew' + id ).submit();

	}

	{/literal}

</script>


{include file='include/feet.tpl'}