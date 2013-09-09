<?php

$id = null;

if(isset($_GET['id']) && is_numeric($_GET['id']))
{
	$id   = $_GET[$id];
}
else
{
	//header('Location: /');
}

if(isset($_GET['page']) && is_numeric($_GET['page']))
{
	$page = $_GET['page'];
}
else
{
	$page = 1;
}

$category = new Category( $id );

Template::assign( 'list', $category->getPage( $page ) );

Template::assign( 'paging', $category->pagingLinkArray() );

Template::assign( 'upsell', Upsell::category($id) );

Template::assign( 'message', Message::getList() );

Template::display( 'category.tpl' );