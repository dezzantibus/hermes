<?php

class layout_homepage_page extends layout_page
{

    public function __construct()
    {

        $this->addChild( new layout_header() );

        $this->addChild( new layout_homepage_hero( new data_array ) );

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

        $main->addChild( new layout_homepage_popular( new data_array ) );

        // categories
        // this will be dynaminc with a foreach
        // and a switch to determine the layout object
        $main->addChild( new layout_homepage_ModuleG1P6( new data_array ) );
        $main->addChild( new layout_homepage_ModuleG2P6( new data_array ) );
        $main->addChild( new layout_homepage_ModuleG3P0( new data_array ) );
        $main->addChild( new layout_homepage_ModuleG2P0( new data_array ) );

        // end categories

        $wrapper->addChild( new layout_sidebar() );

        $this->addChild( new layout_footer() );

    }

}