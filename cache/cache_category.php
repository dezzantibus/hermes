<?php

class cache_category extends cache
{

    static $path = '-category-';

    static public function returnHomeCategories()
    {
        return self::retrieve( 'home' );
    }

    static public function saveHomeCategories( $data )
    {
        self::save( 'home', $data, rand( 300, 600 ) );
    }

    static public function returnFullList( $order )
    {
        return self::retrieve( 'fullList-' . $order );
    }

    static public function saveFullList( $data, $order )
    {
        self::save( 'fullList-' . $order, $data, rand( 600, 1200 ) );
    }

}