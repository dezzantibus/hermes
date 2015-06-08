<?php

class layout_homepage_page extends layout_page
{

    public function __construct()
    {

        $this->addChild( new layout_header() );

        $this->addChild( new layout_homepage_hero() );

        $section = $this->addChild( new layout_basic_section( 'section' ) );

//        $section->addChild( stuff to add );

        $this->addChild( new layout_footer() );

    }

}