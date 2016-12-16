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

        $search  = array( ' ', '&', '%', '?', '$', '+', 'ë', 'Ë', 'ç', '"', ',', "'", '(', ')', '.', '€',   '/', '\\', '<br>' );
        $replace = array( '-', '',  '',  '',  '',  '',  'e', 'E', 'c', '',  '',  '',  '',  '',  '',  'euro', '', '',   '' );

        return str_replace( $search, $replace, trim( $string ) );

    }
	
	public static function dateForDisplay( $in )
	{
		return self::translateDate( date( 'D j M, Y', strtotime( $in ) ) );
	}

    private static function translateDate( $in )
    {

        if( constant::$text['language'] == 'english' )
        {
            return $in;
        }

        $search = array(
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec',

            'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun',
        );

        $replace = array(
            'Janar', 'Shkurt', 'Mars', 'Prill', 'Maj', 'Qershor',
            'Korrik', 'Gusht', 'Shtator', 'Tetor', 'Nëntor', 'Dhjetor',

            'e Hënë', 'e Martë', 'e Mërkurë', 'e Enjte', 'e Premte', 'e Shtunë', 'e Diel',
        );

        return str_replace( $search, $replace, $in );
    }

}