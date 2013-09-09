<?php

if( isset( $_GET['j'] ) )
{

    $journalist = new Admin_Journalist( $_GET['j'] );
    Template::assign( 'journalist', $journalist );
    Template::display( 'admin/journalist/form.tpl' );
    exit();

}

if( isset( $_POST['id'] ) )
{

    $journalist = new Admin_Journalist();
    if( $_POST['id'] > 0 )
    {
        $journalist->load( $_POST['id'] );
    }

    $data = array(
        'manager_id' => $_POST['manager_id'] > 0 ? $_POST['manager_id'] : 1,
        'fname'      => $_POST['fname'],
        'lname'      => $_POST['lname'],
        'email'      => $_POST['email'],
    );

    if( !empty ( $_POST['pass'] ) )
    {
        $data['pass'] = md5( $_POST['pass'] );
    }

    $journalist->setData( $data );
    $journalist->save();

}

$page = 1;
if( isset( $_GET['page'] ) )
{
    $page =  $_GET['page'];
}
Template::assign( 'page', $page );

$journalist = new Admin_Journalist();
$journalist->setOrder( 'fname, lname' );

Template::assign( 'journalists', $journalist->getFullList() );

Template::display( 'admin/journalist/list.tpl' );