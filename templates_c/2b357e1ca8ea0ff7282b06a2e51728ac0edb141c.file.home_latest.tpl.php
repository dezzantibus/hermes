<?php /* Smarty version Smarty-3.1.12, created on 2013-09-06 23:42:35
         compiled from "/webroot/hermes2/templates/include/home_latest.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21760597152248ba23141e1-12373802%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b357e1ca8ea0ff7282b06a2e51728ac0edb141c' => 
    array (
      0 => '/webroot/hermes2/templates/include/home_latest.tpl',
      1 => 1378463504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21760597152248ba23141e1-12373802',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_52248ba2346998_27855366',
  'variables' => 
  array (
    'google' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52248ba2346998_27855366')) {function content_52248ba2346998_27855366($_smarty_tpl) {?><section id="homeLatest">

	<h2><?php echo @Albanian::LATEST;?>
</h2>

	<?php echo $_smarty_tpl->getSubTemplate ('include/cell/links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<?php echo $_smarty_tpl->tpl_vars['google']->value->adwords('728x15');?>


	<?php echo $_smarty_tpl->getSubTemplate ('include/cell/links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<?php echo $_smarty_tpl->tpl_vars['google']->value->adwords('728x15');?>


	<?php echo $_smarty_tpl->getSubTemplate ('include/cell/links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<?php echo $_smarty_tpl->tpl_vars['google']->value->adwords('728x15');?>


	<?php echo $_smarty_tpl->getSubTemplate ('include/cell/links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<?php echo $_smarty_tpl->tpl_vars['google']->value->adwords('728x15');?>


	<?php echo $_smarty_tpl->getSubTemplate ('include/cell/links.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</section>
<?php }} ?>