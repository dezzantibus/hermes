<?php

class layout_category_page extends layout_page
{

    public function __construct
    (
        data_header   $header,
        data_footer   $footer,
        data_sidebar  $sidebar,
        data_category $category,
        data_array    $articles,
        data_array    $pinned
    )
    {

        $this->addChild( new layout_header( $header ) );

        $this->addChild( new layout_category_title() );

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

        // pinned articles
//        $main->addChild( new layout_homepage_ModuleG2P0( $category ) );

        $params  = array( 'class' => 'block-layout-five' );
        $content = $main->addChild( new layout_basic_div( $params ) );

        foreach( $articles->getData() as $article )
        {
            $content->addChild( new layout_category_item( $article ) );
        }

        //$main->addChild( new layout_category_pagination() );

        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}