<?php

class layout_homepage_page extends layout_page
{

    public function __construct
    (
        data_header  $header,
        data_footer  $footer,
        data_sidebar $sidebar,
        data_array   $home_categories,
        data_array   $hero_articles,
        data_array   $popular_articles
    )
    {

        switch( constant::$text['site'] )
        {
            case 'hermes': $this->title = 'Hermes news'; break;
            case 'athena': $this->title = 'Athena news'; break;
        }

        $this->description = constant::$text['site text'];

        $this->addChild( new layout_header( $header ) );

        $this->addChild( new layout_homepage_hero( $hero_articles ) );

        $params  = array( 'id' => 'section' );
        $section = $this->addChild( new layout_basic_section( $params ) );

        $params  = array( 'class' => 'inner-wrapper' );
        $wrapper = $section->addChild( new layout_basic_div( $params ) );

        $params = array(
            'id'    => 'main',
            'class' => 'left',
            'role'  => 'main',
        );
        $main = $wrapper->addChild( new layout_basic_div( $params ) );

        $main->addChild( new layout_homepage_popular( $popular_articles ) );

        /** @var $category data_category */
        foreach( $home_categories->getData() as $category )
        {
            if( !empty( $category->home_block ) )
            {
                $type = $category->home_block;
                $main->addChild( new $type( $category ) );
            }
        }

        // end categories

        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}