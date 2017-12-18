<?php

class cache_apis extends cache
{

    static $path = '-api-';

    static public function weather_retrieve( $city )
    {
        return self::retrieve( 'weather-' . $city );
    }

    static public function weather_save( $city, $data )
    {
        self::save( 'weather-' . $city, $data, 3600 );
    }


}