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
            1  => 'Homepage categoria',
            2  => 'Categoria sopra',
            3  => 'Categoria centrale',
            4  => 'Categoria sotto',
            5  => 'Articolo',
            6  => 'Laterale Homepage sopra',
            7  => 'Laterale Homepage sotto',
            8  => 'Laterale Categoria sopra',
            9  => 'Laterale Categoria sotto',
            10 => 'Laterale Articolo sopra',
            11 => 'Laterale Articolo sotto',
            12 => 'Header Homepage',
            13 => 'Header Categoria',
            14 => 'Header Articolo',
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

}