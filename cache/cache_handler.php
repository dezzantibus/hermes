<?php

class cache_handler extends cache
{

    static $path = '-handler-';

    static public function retrieveHomeCategories()
    {
        return self::retrieve( 'home_categories' );
    }

    static public function saveHomeCategories( $data )
    {
        self::save( 'home_categories', $data );
    }

    static public function clearHomeCategories()
    {
        self::clear( 'home_categories' );
    }

}