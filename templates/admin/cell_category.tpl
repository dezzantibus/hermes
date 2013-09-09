<li>

	<table>

		<tr>

			<form action='#' id="form{$category.id}" method="post">

				<input type="hidden" value="{$category.id}" name="id" />

				<input type="hidden" value="" name="action" id="action{$category.id}" />

				<td><input type="text" name="name" value="{$category.name}" /></td>

				<td>
					<a onclick="editCat({$category.id})">{$smarty.const.Albanian::ADMIN_MENU_EDIT}</a>
					<a onclick="deleteCat({$category.id})">{$smarty.const.Albanian::ADMIN_MENU_DELETE}</a>
				</td>

			</form>

		</tr>

		{if $level > 0}

			<tr>

				<td colspan="2">

					<ul class="categoryTree">

						{foreach from=$category.children item='cat'}

							{include file='admin/cell_category.tpl' category=$cat level=$level-1}

						{/foreach}

						<li>

							<table>

								<tr>

									<form action='' id="formNew{$category.id}" method="post">

										<input type="hidden" value="{$category.id}" name="parent_id" />

										<input type="hidden" value="new" name="action" />

										<td><input type="text" name="name" value="" /></td>

										<td>
											<a onclick="newCat({$category.id})">{$smarty.const.Albanian::ADMIN_MENU_NEW}</a>
										</td>

									</form>

								</tr>

							</table>

						</li>

					</ul>

				</td>

			</tr>

		{/if}

	</table>

</li>
