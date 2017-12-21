<?php

class weather
{

    public static $data;

    public static $day1;

    public static $day2;

    public static $day3;

    public static $day4;

    private static $translateFrom;

    private static $translateTo;

    public static function load( $city )
    {

        self::$translateFrom = array(
            'shi',
            'Mundesi Shiu',
            'i kthjellet',
        );

        self::$translateTo = array(
            'Shi',
            'vran&euml;sira',
            'i kthjell&euml;t'
        );

        $call = cache_apis::weather_retrieve( $city );

        if( empty( $call ) )
        {
            error_log( 'weather cache empty' );
            $call = file_get_contents( 'http://api.wunderground.com/api/03aa91bcfad8b663/forecast/lang:AL/q/Albania/' . $city . '.json' );
            cache_apis::weather_save( $city, $call );
        }
        else
        {
            error_log( 'weather cache found' );
        }

        self::$data = json_decode( $call, 1 );

        self::processData();

    }

    private static function processData()
    {

        self::$data = self::$data['forecast']['simpleforecast']['forecastday'];

        self::$day1 = self::$data[0];
        self::$day2 = self::$data[1];
        self::$day3 = self::$data[2];
        self::$day4 = self::$data[3];

    }

    private static function echoCell( $data )
    {

        echo
        '<li>',
            '<div class="image"><img src="', $data['icon_url'], '" alt="Post"></div>',
            '<div class="text">',
                '<h3>', str_replace( self::$translateFrom, self::$translateTo, $data['conditions'] ), '</h3>',
                '<p class="date">', $data['date']['pretty'], '</p>',
            '</div>',
        '</li>';

    }

    public static function echoHtml()
    {

        echo
        '<div class="widget">',
            '<h3 class="widget-title">MOTI N&Euml; SHQIP&euml;RI</h3>',
            '<ul class="recent-posts">';

                self::echoCell( self::$day1 );
                self::echoCell( self::$day2 );
                self::echoCell( self::$day3 );
                self::echoCell( self::$day4 );

            echo
            '</ul>',
        '</div>';
    }

}