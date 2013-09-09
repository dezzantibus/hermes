<?php
class Message
{
	 
	private static $list = array();

	/**
	 * Adds a non-error message to the Messages array
	 *
	 * @param $content
	 * @param null $extra
	 */
	static function addMessage($content, $extra=null)
	{
		self::add('message', $content, $extra, Albanian::MESSAGE);
	}

	/**
	 * Adds an error message to the Messages array
	 *
	 * @param $content
	 * @param null $extra
	 */
	static function addError($content, $extra=null)
	{
		self::add('error', $content, $extra, Albanian::ERROR);
	}

	/**
	 * Adds a message to the Messages array
	 *
	 * @param $type
	 * @param $content
	 * @param null $extra
	 * @param null $title
	 */
	private static function add($type, $content, $extra=null, $title=null)
	{

		if(!empty($extra)){
			$content = sprintf($content, $extra);
		}

		self::$list[] = array(
			'type'		=> $type,
			'content'	=> $content,
			'title'		=> $title
		);

	}

	/**
	 * Checks for the presence of an
	 * error in the Messages array
	 *
	 * @return bool
	 */
	static function haveErrors()
	{

		foreach (self::$list as $item)
		{
			if ($item['type'] == 'error')
			{
				return true;
			}
		}

		return false;

	}

	/**
	 * Returns the Messages array
	 *
	 * @return array
	 */
	static function getList()
	{
		return self::$list;
	}
	 
}