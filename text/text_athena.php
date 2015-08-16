<?php

date_default_timezone_set( "Europe/London" );

class text_athena
{

    static function text()
    {

        $text = array(
            'Insert new'        => 'Insert new',
            'Modify'            => 'Modify',
            'Advertising'       => 'Advertising',
            'Search'            => 'Search',
            'Popular'           => 'Popular',
            'Recent comments'   => 'Recent comments',
            'Recent articles'   => 'Recent articles',
            'Categories'        => 'Categories',
            'header_name'       => 'Athena<span>News</span>',
            'header_under_name' => 'The portal for rational news',
            'popular_articles'  => 'Popular <strong>articles</strong>',
            'pagination_first'  => 'First',
            'pagination_last'   => 'Last',
            'share_post'        => 'Share this post',
        );

        return $text;

    }

}