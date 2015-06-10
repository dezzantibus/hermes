<?php

class layout_homepage_page extends layout_page
{

    public function __construct()
    {

        $this->addChild( new layout_header() );

        $this->addChild( new layout_homepage_hero() );

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

        // here we add all the layout blocks to $main
        //
        //
        //

        $wrapper->addChild( new layout_sidebar() );

        $this->addChild( new layout_footer() );

    }

}