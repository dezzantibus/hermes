<?php /* Smarty version Smarty-3.1.12, created on 2013-09-02 15:35:42
         compiled from "/webroot/hermes2/templates/admin/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:944197686522469539706e0-33825825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c491b2f34ce218c11fd65ceb06f3097fd2c2fdf7' => 
    array (
      0 => '/webroot/hermes2/templates/admin/category.tpl',
      1 => 1378128354,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '944197686522469539706e0-33825825',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_522469539e45b8_64822279',
  'variables' => 
  array (
    'categories' => 0,
    'cat' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_522469539e45b8_64822279')) {function content_522469539e45b8_64822279($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h1><?php echo @Albanian::ADMIN_MENU_CATEGORY;?>
</h1>

<ul class="categoryTree">

	<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>

		<?php echo $_smarty_tpl->getSubTemplate ('admin/cell_category.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('category'=>$_smarty_tpl->tpl_vars['cat']->value,'level'=>1), 0);?>


	<?php } ?>

	<li>

		<table>

			<tr>

				<form action='' id="formNew0" method="post">

					<input type="hidden" value="0" name="parent_id" />

					<input type="hidden" value="new" name="action" />

					<td><input type="text" name="name" value="" /></td>

					<td>
						<a onclick="newCat(0)"><?php echo @Albanian::ADMIN_MENU_NEW;?>
</a>
					</td>

				</form>

			</tr>

		</table>

	</li>

</ul>

<script type="text/javascript">

	var delmex = '<?php echo @Albanian::ADMIN_DELETE_MEX;?>
';

	

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

	

</script>


<?php echo $_smarty_tpl->getSubTemplate ('include/feet.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>