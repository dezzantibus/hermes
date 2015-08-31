<?php

require_once __DIR__ . '/tools/class_finder.php';

spl_autoload_register( 'class_finder::getClassFile' );

switch( $_SERVER['HTTP_HOST'] )
{
    case 'eroitaliano.com':
    case 'www.eroitaliano.com':
    case 'hermesnews.al':
    case 'www.hermesnews.al':
    case 'local.hermesnews.org':
        constant::$text = text_hermesnews::text();
        db::$schema = 'hermes2';
        break;

    case 'athena.news':
    case 'www.athena.news':
        constant::$text = text_athena::text();
        db::$schema = 'athena';
        break;

}

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
