<?php

require_once __DIR__ . '/tools/class_finder.php';

spl_autoload_register( 'class_finder::getClassFile' );

date_default_timezone_set( "Europe/Tirane" );

session_start();

if( isset( $_GET['handler'] ) )
{
    $handler = $_GET['handler'];
}
else
{
    $handler = 'handler_homepage';
}
var_dump($handler);
/** @var handler $page */
$page = new $handler;
$page->run();
