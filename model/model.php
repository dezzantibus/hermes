<?php

/**
 * Class model
 *
 * Each model class will always refer to a database table and contain the methods
 * to manipulate the data on the table. Model classes will return data objects when
 * retrieving data. Caching classes are used within model classes.
 */
abstract class model
{

    protected static function clean_text( $in )
    {

        $search  = array( '&gt;', '&lt;' );
        $replace = array( '>',    '<' );

        return str_replace( $search, $replace, htmlentities( $in ) );

    }

}