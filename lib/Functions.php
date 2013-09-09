<?php

class Functions
{

	/**
	 * Removes URL-unfriendly characters
	 *
	 * @param $string
	 * @return mixed
	 */
	static function urlFriendly($string)
	{

		$from = array(' ', '&',   '?', '%',  '"',      "'");

		$to   = array('_', 'and', '_', 'pc', '&quot;', '&apos;');

		return str_replace($from, $to, $string);

	}

    static function hash( $string )
    {

        return md5( $string );

    }

}