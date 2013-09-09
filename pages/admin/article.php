<?php

$category = new Admin_Category();
if( isset( $_GET['cat'] ) )
{
    $category->load( $_GET['cat'] );
}
Template::assign( 'category', $category );

if( isset( $_GET['art'] ) )
{

    $article = new Admin_Article( $_GET['art'] );
    Template::assign( 'article', $article );
    Template::display( 'admin/article/form.tpl' );
    exit();

}

if( isset( $_POST['id'] ) )
{

    $article = new Admin_Article();
    if( $_POST['id'] > 0 )
    {
        $article->load( $_POST['id'] );
    }

    $data = array(
        'category_id'   => $_POST['category_id'],
        'journalist_id' => $_POST['journalist_id'],
        'title'         => $_POST['title'],
        'subtitle'      => $_POST['subtitle'],
        'brief'         => $_POST['brief'],
        'text'          => $_POST['text'],
        'hero'          => isset( $_POST['hero'] ) ? 1 : 0,
        'highlight'     => isset( $_POST['highlight'] ) ? 1 : 0,
    );

    $article->setData( $data );
    $article->save();

}

$page = 1;
if( isset( $_GET['page'] ) )
{
    $page =  $_GET['page'];
}
Template::assign( 'page', $page );

Template::display( 'admin/article/list.tpl' );