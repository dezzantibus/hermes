<?php /* Smarty version Smarty-3.1.12, created on 2013-09-06 15:43:41
         compiled from "/webroot/hermes2/templates/admin/article/list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191076425552299e33a75821-98545904%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b3d915f9cde877fbd8a81e4598b2270f809dc14' => 
    array (
      0 => '/webroot/hermes2/templates/admin/article/list.tpl',
      1 => 1378475006,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191076425552299e33a75821-98545904',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_52299e342832e7_32726271',
  'variables' => 
  array (
    'categories' => 0,
    'cat' => 0,
    'category' => 0,
    'child' => 0,
    'article' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52299e342832e7_32726271')) {function content_52299e342832e7_32726271($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h1><?php echo @Albanian::ADMIN_MENU_ARTICLE;?>
</h1>

<select onchange="window.location='?catid=' + this.value">

	<option value="0"><?php echo @Albanian::MEX_SELECT_OPTION;?>
</option>

	<?php  $_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cat']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->key => $_smarty_tpl->tpl_vars['cat']->value){
$_smarty_tpl->tpl_vars['cat']->_loop = true;
?>

		<?php if (count($_smarty_tpl->tpl_vars['cat']->value['children'])==0){?>

			<option value="<?php echo $_smarty_tpl->tpl_vars['cat']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['cat']->value['id']==$_smarty_tpl->tpl_vars['category']->value->getData('id')){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</option>

		<?php }else{ ?>

			<optgroup label="<?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
">

				<?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cat']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>

					<option value="<?php echo $_smarty_tpl->tpl_vars['child']->value['id'];?>
"<?php if ($_smarty_tpl->tpl_vars['cat']->value['id']==$_smarty_tpl->tpl_vars['category']->value->getData('id')){?> selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['child']->value['name'];?>
</option>

				<?php } ?>

			</optgroup>

		<?php }?>

	<?php } ?>

</select>

<table id="adminList">

	<tr>

        <th><?php echo @Albanian::LABEL_DATE;?>
</th>

    	<th><?php echo @Albanian::LABEL_TITLE;?>
</th>
        
        <th><?php echo @Albanian::LABEL_CATEGORY;?>
</th>
    
        <th><?php echo @Albanian::LABEL_JOURNALIST;?>
</th>

		<th><a href="?cat=<?php echo $_smarty_tpl->tpl_vars['category']->value->getData('id');?>
&art=0"><?php echo @Albanian::ADMIN_MENU_NEW;?>
</a></th>
    
    </tr>

    <?php  $_smarty_tpl->tpl_vars['article'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['article']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['category']->value->getPage(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['article']->key => $_smarty_tpl->tpl_vars['article']->value){
$_smarty_tpl->tpl_vars['article']->_loop = true;
?>
    
		<tr>
        
        	<td><?php echo $_smarty_tpl->tpl_vars['article']->value->getData('created');?>
</td>
        
        	<td><?php echo $_smarty_tpl->tpl_vars['article']->value->getData('title');?>
</td>
        
        	<td><?php echo $_smarty_tpl->tpl_vars['article']->value->category->getData('name');?>
</td>
        
        	<td><?php echo $_smarty_tpl->tpl_vars['article']->value->journalist->getData('fname');?>
 <?php echo $_smarty_tpl->tpl_vars['article']->value->journalist->getData('fname');?>
</td>

			<td><a href="?cat=<?php echo $_smarty_tpl->tpl_vars['category']->value->getData('id');?>
&art=<?php echo $_smarty_tpl->tpl_vars['article']->value->getData('id');?>
"><?php echo @Albanian::ADMIN_MENU_EDIT;?>
</a></td>
        
        </tr>
    
    <?php } ?>

</table>

<?php echo $_smarty_tpl->getSubTemplate ('include/feet.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>