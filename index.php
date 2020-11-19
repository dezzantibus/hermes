<?php

if( $_SERVER['HTTP_HOST'] == 'hermesnews.al' )
{
    header("Location: https://www.hermesnews.al/");
    exit;
}

require_once __DIR__ . '/tools/class_finder.php';

spl_autoload_register( 'class_finder::getClassFile' );

/*
switch( $_SERVER['HTTP_HOST'] )
{
//    case 'eroitaliano.com':
//    case 'www.eroitaliano.com':
    case 'hermesnews.al':
    case 'www.hermesnews.al':
    case 'local.hermesnews.org':
    case 'hermesnews.org':
    case 'www.hermesnews.org':
        constant::$text = text_hermesnews::text();
        db::$schema = 'hermes2';
        break;

    case 'athena.news':
    case 'www.athena.news':
        constant::$text = text_athena::text();
        db::$schema = 'athena';
        break;

}
/*/
constant::$text = text_hermesnews::text();
db::$schema = 'hermes2';
//*/


session_start();

if( isset( $_GET['handler'] ) )
{
    $handler = $_GET['handler'];
}
else
{
    $handler = 'handler_homepage';
}

/** @var handler $page */
$page = new $handler;
$page->run();
