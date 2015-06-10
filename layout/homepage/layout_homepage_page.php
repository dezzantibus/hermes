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

        $main->addChild( new layout_homepage_popular() );

        // categories
        // this will be dynaminc with a foreach
        // and a switch to determine the layout object
        $main->addChild( new layout_homepage_ModuleG1P6() );
        $main->addChild( new layout_homepage_ModuleG2P6() );
        $main->addChild( new layout_homepage_ModuleG3P0() );
        $main->addChild( new layout_homepage_ModuleG2P0() );

        // end categories

        $wrapper->addChild( new layout_sidebar() );

        $this->addChild( new layout_footer() );

    }

}