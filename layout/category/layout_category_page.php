<?php

class layout_category_page extends layout_page
{

    public function __construct()
    {

        $this->addChild( new layout_header() );

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

        $params  = array( 'class' => 'block-layout-five' );
        $content = $main->addChild( new layout_basic_div( $params ) );

        $content->addChild( new layout_category_item() );
        $content->addChild( new layout_category_item() );
        $content->addChild( new layout_category_item() );
        $content->addChild( new layout_category_item() );
        $content->addChild( new layout_category_item() );
        $content->addChild( new layout_category_item() );

        $main->addChild( new layout_category_pagination() );

        $wrapper->addChild( new layout_sidebar() );

        $this->addChild( new layout_footer() );

    }

}