<?php

if( isset( $_POST['action'] ) && $_POST['action'] == 'adminLogin' )
{
    Journalist::login($_POST['email'], $_POST['password']);
}

if( isset( $_POST['action'] ) && $_POST['action'] == 'adminLogout' )
{
    unset( $_SESSION['journalist'] );
}

if( empty( $_SESSION['journalist'] ) )
{
    Template::display( 'admin/login.tpl' );
    exit();
}

if(isset($_GET['adminPath']))
{
    if( file_exists( Config::$folders['pages'] . '/admin/' . $_GET['adminPath'] . '.php' ) )
    {
        include_once Config::$folders['pages'] . '/admin/' . $_GET['adminPath'] . '.php';
    }
    else
    {
        include_once Config::$folders['pages'] . '404.php';
    }
}
else
{
    Template::display('admin/index.tpl');
}
