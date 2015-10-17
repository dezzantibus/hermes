<?php

class cache_article extends cache
{

    static $path = '-article-';

    static public function insert()
    {

        self::clear( 'hero' );

        cache_handler::clearHomeCategories();

    }

    static public function update()
    {
        self::insert();
    }

    static public function delete()
    {
        self::insert();
    }

    static public function returnPopular( $category='' )
    {
        return self::retrieve( 'popular-' . $category );
    }

    static public function savePopular( $data, $category )
    {
        self::save( 'popular-' . $category, $data );
    }

    static public function returnRecent( $category='' )
    {
        return self::retrieve( 'recent-' . $category );
    }

    static public function saveRecent( $data, $category )
    {
        self::save( 'recent-' . $category, $data );
    }

    static public function returnHero()
    {
        return self::retrieve( 'hero' );
    }

    static public function saveHero( $data )
    {
        self::save( 'hero', $data, 0 );
    }

}