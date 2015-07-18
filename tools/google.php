<?php

class google
{

    const SECONDS_ANDREA = 60;

    private static $who = null;

    public static function analytics()
    {

        return "
			<script type=\"text/javascript\">

			  var _gaq = _gaq || [];
			  _gaq.push(['_setAccount', 'UA-15643626-6']);
			  _gaq.push(['_trackPageview']);

			  (function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			  })();

			</script>
		";

    }

    public static function automatic()
    {

        if( self::chooseWho() == 'Andrea' )
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
        else
        {

        }
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