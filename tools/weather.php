<?php

class weather
{

    public static $data;

    public static $day1;

    public static $day2;

    public static $day3;

    public static $day4;

    public static function load( $city )
    {

        $call = cache::retrieve( 'weather-' . $city );

        if( empty( $call ) )
        {
            $call = file_get_contents( 'http://api.wunderground.com/api/03aa91bcfad8b663/forecast/lang:AL/q/Albania/' . $city . '.json' );
            cache::save( 'weather-' . $city, $call, 3600 );
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

        print_r(self::$day1);

    }

    private static function echoCell( $data )
    {
        echo
        '<li>',
            '<div class="image"><img src="', $data['icon_url'], '" alt="Post"></div>',
            '<div class="text">',
                '<h3>', $data['conditions'], '</h3>',
                '<p class="date">', $data['date']['pretty'], '</p>',
            '</div>',
        '</li>';

    }

    public static function echoHtml()
    {

        echo
        '<div class="widget">',
            '<h3 class="widget-title">Parashikimet e motit</h3>',
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