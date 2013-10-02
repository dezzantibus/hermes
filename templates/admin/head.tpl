<!DOCTYPE html>
<html>
<head>

	<title>Hermes News - {$title|default:'Page'}</title>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<link type="text/css" href="/js/jquery/jquery-ui.css" />

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

	{literal}
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
	{/literal}

</head>
<body id="admin">
{debug}
<div style="display:none">
	<div id="messages">{foreach from=Message::getList() item='mex'}<p class="{$mex.type}">{$mex.content}</p>{/foreach}</div>
</div>

<div id="box">

	<header>

		<img src="/images/header/logo_admin.gif">

		<p class="clear"></p>

		<nav>

			<ul>

				<li>
					<a href="/admin/category.html">{$smarty.const.Albanian::ADMIN_MENU_CATEGORY}</a>
					{*
					<ul>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
						<li><a href="">Sottocategoria</a></li>
					</ul>
					*}
				</li>

				<li>
					<a href="/admin/article.html">{$smarty.const.Albanian::ADMIN_MENU_ARTICLE}</a>
				</li>

				<li>
					<a href="/admin/journalist.html">{$smarty.const.Albanian::ADMIN_MENU_JOURNALIST}</a>
				</li>

				<li>
					<a href="/admin/journalist.html">{$smarty.const.Albanian::ADMIN_MENU_NEWSLETTER}</a>
				</li>

			</ul>

		</nav>

	</header>

	<div class="clear"></div>
