<?php /* Smarty version Smarty-3.1.12, created on 2013-09-06 15:36:06
         compiled from "/webroot/hermes2/templates/admin/head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1416376276522469539e9c25-68604237%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c02e646f8434d74a1c1f287523219cf564c803f' => 
    array (
      0 => '/webroot/hermes2/templates/admin/head.tpl',
      1 => 1378463504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1416376276522469539e9c25-68604237',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_52246953a238c9_00506998',
  'variables' => 
  array (
    'title' => 0,
    'mex' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52246953a238c9_00506998')) {function content_52246953a238c9_00506998($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>

	<title>Hermes News - <?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? 'Page' : $tmp);?>
</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<link type="text/css" href="/js/jquery/jquery-ui.css" />

	<script type="text/javascript" src="/js/jquery/colorbox/jquery.colorbox-min.js"></script>
	<link type="text/css" href="/js/jquery/colorbox/colorbox.css" />

	<script type="text/javascript" src="/js/library.js"></script>
	<style type="text/css">@import "/css/style.css";</style>

	<style type="text/css" media="only screen and (max-width : 1024px)">@import "/css/style1024w.css";</style>

	<style type="text/css" media="only screen and (max-width : 720px)">@import "/css/style720w.css";</style>

	<!--[if lte IE 7]>
		<style type="text/css" media="all">@import "/css/styleIE7.css";</style>
	<![endif]-->

	<!--[if gte IE 8]>
		<style type="text/css" media="all">@import "/css/styleIE8.css";</style>
	<![endif]-->

	
	<script type="text/javascript">

		$(document).ready(function(){

			$('.hover').hover(
					function(){this.src = this.src.replace("-rest","-hover");},
					function(){this.src = this.src.replace("-hover","-rest");}
			);

			/*$('.photoGallery').colorbox({current:"Photo {current} of {total}"});*/

			if($('#messages').html().length > 0)
			{
				$('#messages').dialog();
			}

		});

	</script>
	

</head>
<body id="admin">
<?php $_smarty_tpl->smarty->loadPlugin('Smarty_Internal_Debug'); Smarty_Internal_Debug::display_debug($_smarty_tpl); ?>
<div style="display:none">
	<div id="messages"><?php  $_smarty_tpl->tpl_vars['mex'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mex']->_loop = false;
 $_from = Message::getList(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mex']->key => $_smarty_tpl->tpl_vars['mex']->value){
$_smarty_tpl->tpl_vars['mex']->_loop = true;
?><p class="<?php echo $_smarty_tpl->tpl_vars['mex']->value['type'];?>
"><?php echo $_smarty_tpl->tpl_vars['mex']->value['content'];?>
</p><?php } ?></div>
</div>

<div id="box">

	<header>

		<img src="/images/header/logo_admin.gif">

		<p class="clear"></p>

		<nav>

			<ul>

				<li>
					<a href="/admin/category.html"><?php echo @Albanian::ADMIN_MENU_CATEGORY;?>
</a>
					
				</li>

				<li>
					<a href="/admin/article.html"><?php echo @Albanian::ADMIN_MENU_ARTICLE;?>
</a>
				</li>

				<li>
					<a href="/admin/journalist.html"><?php echo @Albanian::ADMIN_MENU_JOURNALIST;?>
</a>
				</li>

				<li>
					<a href="/admin/journalist.html"><?php echo @Albanian::ADMIN_MENU_NEWSLETTER;?>
</a>
				</li>

			</ul>

		</nav>

	</header>

	<div class="clear"></div>
<?php }} ?>