<?php
session_start();

require_once 'lib/Config.php';

Config::initialise();

Database::connect();

Template::initialise();

Template::assign( 'session', $_SESSION );

Template::assign( 'categories', Category::getTree() );

Template::assign( 'google',   new Google() );
Template::assign( 'albanian', new Albanian() );

if(isset($_GET['path']))
{
	if( file_exists( Config::$folders['pages'] . $_GET['path'] . '.php' ) )
	{
		include_once Config::$folders['pages'] . $_GET['path'] . '.php';
	}
	else
	{
		include_once Config::$folders['pages'] . '404.php';
	}
}
else
{
	include_once Config::$folders['pages'] . 'index.php';
}

Database::disconnect();
