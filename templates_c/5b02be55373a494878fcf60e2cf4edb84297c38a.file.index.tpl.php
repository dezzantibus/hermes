<?php /* Smarty version Smarty-3.1.12, created on 2013-09-06 23:42:35
         compiled from "/webroot/hermes2/templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125076653452248ba21ab254-38976693%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5b02be55373a494878fcf60e2cf4edb84297c38a' => 
    array (
      0 => '/webroot/hermes2/templates/index.tpl',
      1 => 1378463504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125076653452248ba21ab254-38976693',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_52248ba2253547_69057327',
  'variables' => 
  array (
    'google' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52248ba2253547_69057327')) {function content_52248ba2253547_69057327($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('include/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<main class="mainColumn" id="index">

	<?php echo $_smarty_tpl->getSubTemplate ("include/home_hero.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="highlight">

		<?php echo $_smarty_tpl->getSubTemplate ('include/cell/home_article_vertical.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('include/cell/home_article_vertical.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('include/cell/home_article_vertical.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	</div>

	<?php echo $_smarty_tpl->tpl_vars['google']->value->adwords('728x90');?>


	<div class="highlight">

		<?php echo $_smarty_tpl->getSubTemplate ('include/cell/home_popular.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('include/cell/home_article_horizontal.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('include/cell/home_article_horizontal.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	</div>

	<?php echo $_smarty_tpl->tpl_vars['google']->value->adwords('728x90');?>


	<div class="highlight">

		<?php echo $_smarty_tpl->getSubTemplate ('include/cell/home_article_vertical.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('include/cell/home_article_horizontal.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('include/cell/home_article_horizontal.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	</div>

	<?php echo $_smarty_tpl->tpl_vars['google']->value->adwords('728x90');?>


	<?php echo $_smarty_tpl->getSubTemplate ("include/home_latest.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


</main>

<?php echo $_smarty_tpl->getSubTemplate ("include/right_column.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="clear"></div>

<?php echo $_smarty_tpl->getSubTemplate ('include/feet.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>