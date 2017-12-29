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

    static public function savePopular( $data, $category='home' )
    {
        self::save( 'popular-' . $category, $data, 600 );
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

    static public function returnHomeCategory( $id, $number )
    {
        return self::retrieve( 'homecategory' . $id . '-' . $number );
    }

    static public function saveHomeCategory( $data, $id, $number )
    {
        self::save( 'homecategory' . $id . '-' . $number, $data, rand( 300, 600 ) );
    }

    static public function returnCategoryPage( $id, $page )
    {
        return self::retrieve( 'CategoryPage-' . $id . '-' . $page );
    }

    static public function saveCategoryPage( $data, $id, $page )
    {
        self::save( 'CategoryPage-' . $id . '-' . $page, $data, rand( 300, 600 ) );
    }

}