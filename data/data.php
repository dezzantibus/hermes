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

        $search  = array( ' ', '&', '%', '?', '$', '+', 'ë', 'Ë', 'ç', '"', ',', "'", '(', ')', '.' );
        $replace = array( '-', '',  '',  '',  '',  '',  'e', 'E', 'c', '',  '',  '',  '',  '',  '' );

        return str_replace( $search, $replace, $string );

    }
	
	public static function dateForDisplay( $in )
	{
		return self::translateDate( date( 'D j M, Y', strtotime( $in ) ) );
	}

    private static function translateDate( $in )
    {

        $search = array(
            'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun',

            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',
        );

        $replace = array(
            'e Hënë', 'e Martë', 'e Mërkurë', 'e Enjte', 'e Premte', 'e Shtunë', 'e Diel',

            'Janar', 'Shkurt', 'Mars', 'Prill', 'Maj', 'Qershor',
            'Korrik', 'Gusht', 'Shtator', 'Tetor', 'Nëntor', 'Dhjetor',
        );

        return str_replace( $search, $replace, $in );
    }

}