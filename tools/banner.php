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
            self::bannerAndrea( $data );
        }

    }

    private static function bannerHermes( $data )
    {

        if( self::chooseWho() == 'Andrea' )
        {
            self::bannerAndrea( $data );
        }
        else
        {
            self::bannerPaolo( $data );
        }

    }

    private static function bannerAndrea( $data )
    {

        switch( constant::$text['site'] )
        {
            case 'athena':
                switch( $data )
                {
                    case 'side1':
                        echo
                        '<ins class="adsbygoogle" ',
                            'style="display:block" ',
                            'data-ad-client="ca-pub-0866520425041689" ',
                            'data-ad-slot="8400124744" ',
                            'data-ad-format="auto"></ins>',
                        '<script>',
                            '(adsbygoogle = window.adsbygoogle || []).push({});',
                        '</script>';
                        break;

                    case 'side2':
                        echo
                        '<SCRIPT charset="utf-8" type="text/javascript" src="http://ws-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&MarketPlace=GB&ID=V20070822%2FGB%2Fathnew-21%2F8009%2F3fa34915-fa49-453d-a069-4780ac20a6a4&Operation=GetScriptTemplate"> </SCRIPT>',
                        '<NOSCRIPT><A HREF="http://ws-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&MarketPlace=GB&ID=V20070822%2FGB%2Fathnew-21%2F8009%2F3fa34915-fa49-453d-a069-4780ac20a6a4&Operation=NoScript">Amazon.co.uk Widgets</A></NOSCRIPT>';
//                        '<script type="text/javascript"><!-- amazon_ad_tag = "athnew-21"; amazon_ad_width = "160"; amazon_ad_height = "600"; amazon_ad_link_target = "new";//--></script>',
//                        '<script type="text/javascript" src="http://ir-uk.amazon-adsystem.com/s/ads.js"></script>';
                        break;

                }
                break;

            case 'hermes':
                switch( $data )
                {
                    case 'side1':
                        echo
                        '<ins class="adsbygoogle" ',
                        'style="display:block" ',
                        'data-ad-client="ca-pub-0866520425041689" ',
                        'data-ad-slot="8400124744" ',
                        'data-ad-format="auto"></ins>',
                        '<script>',
                        '(adsbygoogle = window.adsbygoogle || []).push({});',
                        '</script>';
                        break;

                    case 'side2':
                        echo


                        '<SCRIPT charset="utf-8" type="text/javascript" src="http://ws-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&MarketPlace=GB&ID=V20070822%2FGB%2Fathnew-21%2F8009%2F3fa34915-fa49-453d-a069-4780ac20a6a4&Operation=GetScriptTemplate"> </SCRIPT>',
                        '<NOSCRIPT><A HREF="http://ws-eu.amazon-adsystem.com/widgets/q?ServiceVersion=20070822&MarketPlace=GB&ID=V20070822%2FGB%2Fathnew-21%2F8009%2F3fa34915-fa49-453d-a069-4780ac20a6a4&Operation=NoScript">Amazon.co.uk Widgets</A></NOSCRIPT>';



//                        '<script type="text/javascript"><!-- amazon_ad_tag = "athnew-21"; amazon_ad_width = "160"; amazon_ad_height = "600"; amazon_ad_link_target = "new";//--></script>',
//                        '<script type="text/javascript" src="http://ir-uk.amazon-adsystem.com/s/ads.js"></script>';
                        break;

                    case 'header':
                        echo
                        '<script type="text/javascript"><!-- amazon_ad_tag = "athnew-21"; amazon_ad_width = "728"; amazon_ad_height = "90"; amazon_ad_link_target = "new";//--></script>',
                        '<script type="text/javascript" src="http://ir-uk.amazon-adsystem.com/s/ads.js"></script>';
                        break;

                }
                break;

        }

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