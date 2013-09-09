<?php /* Smarty version Smarty-3.1.12, created on 2013-09-02 15:35:42
         compiled from "/webroot/hermes2/templates/admin/cell_category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:52300039352246953ada2f8-63576584%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2833556784d8a88bcc86a55689a02d2d9be408b2' => 
    array (
      0 => '/webroot/hermes2/templates/admin/cell_category.tpl',
      1 => 1378128354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '52300039352246953ada2f8-63576584',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_52246953b2ddd6_83874002',
  'variables' => 
  array (
    'category' => 0,
    'level' => 0,
    'cat' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52246953b2ddd6_83874002')) {function content_52246953b2ddd6_83874002($_smarty_tpl) {?><li>

	<table>

		<tr>

			<form action='#' id="form<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" method="post">

				<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" name="id" />

				<input type="hidden" value="" name="action" id="action<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" />

				<td><input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
" /></td>

				<td>
					<a onclick="editCat(<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
)"><?php echo @Albanian::ADMIN_MENU_EDIT;?>
</a>
					<a onclick="deleteCat(<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
)"><?php echo @Albanian::ADMIN_MENU_DELETE;?>
</a>
				</td>

			</form>

		</tr>

		<?php if ($_smarty_tpl->tpl_vars['level']->value>0){?>

			<tr>

				<td colspan="2">

					<ul class="categoryTree">

						<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>

							<?php echo $_smarty_tpl->getSubTemplate ('admin/cell_category.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('category'=>$_smarty_tpl->tpl_vars['cat']->value,'level'=>$_smarty_tpl->tpl_vars['level']->value-1), 0);?>


						<?php } ?>

						<li>

							<table>

								<tr>

									<form action='' id="formNew<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" method="post">

										<input type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
" name="parent_id" />

										<input type="hidden" value="new" name="action" />

										<td><input type="text" name="name" value="" /></td>

										<td>
											<a onclick="newCat(<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
)"><?php echo @Albanian::ADMIN_MENU_NEW;?>
</a>
										</td>

									</form>

								</tr>

							</table>

						</li>

					</ul>

				</td>

			</tr>

		<?php }?>

	</table>

</li>
<?php }} ?>