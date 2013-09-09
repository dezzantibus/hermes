<?php

require_once __DIR__ . '/Smarty/Smarty.class.php';

class Template {
	
	static protected $tpl = '';

	/**
	 * Sets up all the data for use
	 */
	static function initialise()
	{
		static::$tpl = new Smarty();

		static::$tpl->template_dir = __DIR__ . '/../templates';

		static::$tpl->compile_dir = __DIR__ . '/../templates_c';
		
		if(!file_exists(static::$tpl->compile_dir))
		{
			mkdir(static::$tpl->compile_dir, 0777, true);
		}
	}

	/**
	 * Wrapper for the Smarty::assign function
	 *
	 * @param $name
	 * @param $value
	 */
	static function assign($name, $value)
	{
		static::$tpl->assign($name, $value);
	}

	/**
	 * Wrapper for the Smarty::fetch function
	 *
	 * @param $template
	 * @return mixed
	 */
	static function fetch($template)
	{
		static::assign('message', Message::getList());
		return static::$tpl->fetch($template);
	}

	/**
	 * Wrapper for the Smarty::display function
	 *
	 * @param $template
	 */
	static function display($template)
	{
		static::assign('message', Message::getList());
		static::$tpl->display($template);
	}

}