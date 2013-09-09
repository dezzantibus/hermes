<?php

class Datetime
{
	
	const DATE        = 'l j F Y';
	const TIME        = 'H:i';
	const DATETIME    = 'l j F Y H:i';

	/**
	 * Formats a datetime value as a date
	 *
	 * @param null $in
	 * @return mixed
	 */
	static function date($in = null)
	{
		$out = date(self::DATE, $in);
		$out = self::translate($out);
		return $out;
	}

	/**
	 * Formats a datetime value as a time
	 *
	 * @param null $in
	 * @return bool|string
	 */
	static function time($in = null)
	{
		return date(self::TIME, $in);
	}

	/**
	 * Formats a datetime value as a date and time
	 *
	 * @param null $in
	 * @return mixed
	 */
	static function dateTime($in = null)
	{
		$out = date(self::DATETIME, $in);
		$out = self::translate($out);
		return $out;
	}

	/**
	 * Translates days of the week and months
	 *
	 * @param $in
	 * @return mixed
	 */
	static function translate($in)
	{

		$out = str_replace(
			Albanian::$month['english'],
			Albanian::$month['albanian'],
			$in
		);

		$out = str_replace(
			Albanian::$day['english'],
			Albanian::$day['albanian'],
			$out
		);

		return $out;

	}

}