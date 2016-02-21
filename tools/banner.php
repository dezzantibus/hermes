<?php

class banner
{

    const HOMEPAGE = 1;

    const CATEGORY_TOP = 2;

    const CATEGORY_MIDDLE = 3;

    const CATEGORY_BOTTOM = 4;

    const ARTICLE = 5;

    const SIDEBAR_HOMEPAGE_TOP = 6;

    const SIDEBAR_HOMEPAGE_BOTTOM = 7;

    const SIDEBAR_CATEGORY_TOP = 8;

    const SIDEBAR_CATEGORY_BOTTOM = 9;

    const SIDEBAR_ARTICLE_TOP = 10;

    const SIDEBAR_ARTICLE_BOTTOM = 11;

    const HEADER_HOME = 12;

    const HEADER_CATEGORY = 13;

    const HEADER_ARTICLE = 14;

    const SECONDS_ANDREA = 60;

    public static $list;

    public static function getListOfPositions()
    {

        return array(
            1  => 'Homepage categoria (larghezza 728)',
            2  => 'Categoria sopra (larghezza 728)',
            3  => 'Categoria centrale (larghezza 728)',
            4  => 'Categoria sotto (larghezza 728)',
            5  => 'Articolo (larghezza 728)',
            6  => 'Laterale Homepage sopra (larghezza 300)',
            7  => 'Laterale Homepage sotto (larghezza 300)',
            8  => 'Laterale Categoria sopra (larghezza 300)',
            9  => 'Laterale Categoria sotto (larghezza 300)',
            10 => 'Laterale Articolo sopra (larghezza 300)',
            11 => 'Laterale Articolo sotto (larghezza 300)',
            12 => 'Header Homepage (468 x 60)',
            13 => 'Header Categoria (468 x 60)',
            14 => 'Header Articolo (468 x 60)',
        );

    }

    public static function getForPosition( $position_id, $category_id )
    {

        $banner = null;

        /** @var $item data_banner */
        foreach( self::$list as $item )
        {

            if(
                is_null( $banner ) &&
                $item->category_id == $category_id &&
                $item->position_id == $position_id
            )
            {
                $banner = $item;
                model_banner::logView( $banner->id );
            }

        }

        return $banner;

    }

    public static function bannerAndrea()
    {
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

    public static function outputBanner( $banner, $replace=false )
    {

        if( ! is_null( $banner ) )
        {
            echo '<a href="', $banner->link, '" target="_blank"><img src="', $banner->file, '" alt="Banner"/></a>';
        }
        elseif( $replace )
        {
            self::bannerAndrea();
        }

    }

}