<?php

class banner
{

    const SECONDS_ANDREA = 60;

    private static $who = null;

    public static function automatic( $data=null )
    {

        switch( constant::$text['site'] )
        {

            case 'hermes': self::bannerHermes( $data ); break;
            case 'athena': self::bannerAthena( $data ); break;

        }

    }

    private static function bannerAthena( $data )
    {

        if( $data instanceof data_journalist && !empty( $data->google ) )
        {
            echo $data->google;
        }
        else
        {
            self::bannerAndrea();
        }

    }

    private static function bannerHermes( $data )
    {

        if( self::chooseWho() == 'Andrea' )
        {
            self::bannerAndrea();
        }
        else
        {
            self::bannerPaolo( $data );
        }

    }

    private static function bannerAndrea()
    {
        //<!-- Hermes scuro automatico -->
        echo
        '<ins class="adsbygoogle" ',
            'style="display:block" ',
            'data-ad-client="ca-pub-0866520425041689" ',
            'data-ad-slot="8400124744" ',
            'data-ad-format="auto"></ins>',
        '<script>',
            '(adsbygoogle = window.adsbygoogle || []).push({});',
        '</script>';

    }

    private static function bannerPaolo( $data )
    {

    }

    private static function chooseWho()
    {

        if( empty( self::$who ) )
        {
            if(self::SECONDS_ANDREA > date('s'))
            {
                self::$who = 'Andrea';
            }
            else
            {
                self::$who = 'Paolo';
            }

        }

        return self::$who;

    }

}