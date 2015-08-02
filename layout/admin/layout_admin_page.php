<?php

class layout_admin_page extends layout_page
{

    public function __construct
    (
        data_header  $header,
        data_footer  $footer,
        data_sidebar $sidebar
    )
    {

        $this->addChild( new layout_header( $header ) );

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


        $params = array(
            'href' => '/admin/article/list',
        );
        $main->addChild( new layout_basic_button_link( 'Articoli', $params ) );

        $params = array(
            'href' => '/admin/journalist/list',
            'disabled' => 'true',
        );
        $main->addChild( new layout_basic_button_link( 'Giornalisti', $params ) );



        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}