<?php

/**
 * Class data
 *
 * The data classes are dynamic and contain the data of one row of the database
 * Any method in these classes will be STRICTLY for the immediate manipulation of
 * the data. For example displaying the date in a particular format or rounding
 * decimal numbers.
 */
abstract class data
{

    public static function encode_id( $id )
    {
        return base_convert( $id, 10, 36 );
    }

    public static function decode_id( $id )
    {
        return base_convert( $id, 36, 10 );
    }

    public static function clean_for_url( $string )
    {

        $search  = array( ' ', '&', '%', '?', '$', '+', 'ë', 'ç', '"', ',', "'", '(', ')' );
        $replace = array( '-', '',  '',  '',  '',  '',  'e', 'c', '',  '',  '',  '',  '' );

        return str_replace( $search, $replace, $string );

    }
	
	public static function dateForDisplay( $in )
	{
		return self::translateDate( date( 'jS F, Y', strtotime( $in ) ) );
	}

    private static function translateDate( $in )
    {
        return $in;
    }

}