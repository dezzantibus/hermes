<?php

class Config 
{
	
	const DBSERVER  = '127.0.0.1';
	const DBUSER	= 'root';
	const DBPASS	= 'antani75';
	const DBNAME	= 'hermes2';

	const ARTICLES_PER_PAGE = 10;
	
	static $folders = array();

	/**
	 * Sets the rules to load class files
	 *
	 * @param $class
	 */
	static function autoloader($class)
	{
		
		if(substr($class, 0, 6) == 'Smarty')
		{
			$class = strtolower($class);
			$class = 'Smarty/sysplugins/'.$class;
		}
		else
		{
			$class = str_replace('_', '/', $class);
		}
		
		@include_once __DIR__."/$class.php";
		
	}

	/**
	 * Kick starts the application
	 */
	static function initialise()
	{

		self::$folders['root']	  = __DIR__ . '/../';
		self::$folders['uploads'] = self::$folders['root'] . 'uploads/';
		self::$folders['pages']	  = self::$folders['root'] . 'pages/';
		self::$folders['sitemap'] = self::$folders['root'] . 'sitemap/';

		spl_autoload_register( 'Config::autoloader' );
		
		date_default_timezone_set( 'Europe/Tirane' );
		
	}
	
}