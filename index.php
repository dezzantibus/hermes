<?php

require_once __DIR__ . '/tools/class_finder.php';

spl_autoload_register( 'class_finder::getClassFile' );

switch( $_SERVER['HTTP_HOST'] )
{
    case 'eroitaliano.com':
    case 'www.eroitaliano.com':
    case 'local.hermesnews.org':
        constant::$language = language_albanian::text();
        break;

    default:
        constant::$language = language_english::text();
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
