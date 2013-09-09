<?php /* Smarty version Smarty-3.1.12, created on 2013-09-06 23:42:35
         compiled from "/webroot/hermes2/templates/include/head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141413115052248ba225a7b5-42232127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3a8c44008fffa5d4b2984e12022b53de45676fed' => 
    array (
      0 => '/webroot/hermes2/templates/include/head.tpl',
      1 => 1378463504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141413115052248ba225a7b5-42232127',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_52248ba22a97b9_20035439',
  'variables' => 
  array (
    'title' => 0,
    'mex' => 0,
    'google' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52248ba22a97b9_20035439')) {function content_52248ba22a97b9_20035439($_smarty_tpl) {?><!DOCTYPE html>
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
<body>

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

		<?php echo $_smarty_tpl->tpl_vars['google']->value->adwords('125x125');?>


		<img src="/images/header/logo.gif">

		<?php echo $_smarty_tpl->tpl_vars['google']->value->adwords('125x125');?>


		<p class="clear"></p>

		<nav>

			<ul>

				<li>
					<a href="#">Categoria</a>
					<ul>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
					</ul>
				</li>

				<li>
					<a href="#">Categoria</a>
					<ul>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
					</ul>
				</li>
				<li>
					<a href="#">Categoria</a>
					<ul>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
					</ul>
				</li>

				<li>
					<a href="#">Categoria</a>
					<ul>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
					</ul>
				</li>

				<li>
					<a href="#">Categoria</a>
					<ul>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
					</ul>
				</li>

			</ul>

		</nav>

	</header>

	<div class="clear"></div>
<?php }} ?>