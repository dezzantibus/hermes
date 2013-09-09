<?php /* Smarty version Smarty-3.1.12, created on 2013-09-06 15:51:38
         compiled from "/webroot/hermes2/templates/admin/article/form.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15161042305229daabccc7c9-65923923%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5415270e7f639f19b2c54a284e2506c745b65b60' => 
    array (
      0 => '/webroot/hermes2/templates/admin/article/form.tpl',
      1 => 1378475471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15161042305229daabccc7c9-65923923',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_5229daabd9ffb8_83026712',
  'variables' => 
  array (
    'article' => 0,
    'category' => 0,
    'session' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5229daabd9ffb8_83026712')) {function content_5229daabd9ffb8_83026712($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h1><?php echo (($tmp = @$_smarty_tpl->tpl_vars['article']->value->getData('title'))===null||$tmp==='' ? @Albanian::NEW_ARTICLE : $tmp);?>
</h1>

<form action="?cat=<?php echo $_smarty_tpl->tpl_vars['category']->value->getData('id');?>
" method="post">

	<input type="hidden" name="category_id" value="<?php echo $_smarty_tpl->tpl_vars['category']->value->getData('id');?>
">

	<input type="hidden" name="journalist_id" value="<?php echo $_smarty_tpl->tpl_vars['session']->value['journalist']['id'];?>
">

	<label><?php echo @Albanian::LABEL_TITLE;?>
</label>
	<input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['article']->value->getData('title');?>
">

	<label><?php echo @Albanian::LABEL_SUBTITLE;?>
</label>
	<input type="text" name="subtitle" value="<?php echo $_smarty_tpl->tpl_vars['article']->value->getData('subtitle');?>
">

	<label><?php echo @Albanian::LABEL_BRIEF;?>
</label>
	<textarea name="brief"><?php echo $_smarty_tpl->tpl_vars['article']->value->getData('brief');?>
</textarea>

	<label><?php echo @Albanian::LABEL_TEXT;?>
</label>
	<textarea name="text"><?php echo $_smarty_tpl->tpl_vars['article']->value->getData('text');?>
</textarea>

	<input type="checkbox" name="hero"<?php if ($_smarty_tpl->tpl_vars['article']->value->getData('hero')==1){?> checked="checked"<?php }?>>
	<label><?php echo @Albanian::LABEL_HERO;?>
</label>

	<input type="checkbox" name="homepage"<?php if ($_smarty_tpl->tpl_vars['article']->value->getData('homepage')==1){?> checked="checked"<?php }?>>
	<label><?php echo @Albanian::LABEL_HOMEPAGE;?>
</label>

	<input type="checkbox" name="highlight"<?php if ($_smarty_tpl->tpl_vars['article']->value->getData('highlight')==1){?> checked="checked"<?php }?>>
	<label><?php echo @Albanian::HIGHLIGHTED;?>
</label>

	<input type="submit" value="<?php echo @Albanian::ADMIN_MENU_SAVE;?>
">

</form>

<?php echo $_smarty_tpl->getSubTemplate ('include/feet.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>