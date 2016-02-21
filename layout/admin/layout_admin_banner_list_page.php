<?php

class layout_admin_banner_list_page extends layout_page
{

    public function __construct
    (
        data_header  $header,
        data_footer  $footer,
        data_sidebar $sidebar,
        data_array   $banners
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
            'href'  => '/admin/banner/new.form',
            'class' => 'btn-large',
        );
        $main->addChild( new layout_basic_button_link( constant::$text['Insert new'], $params ) );

        /** @var $banner data_banner */
        foreach( $banners->getData() as $banner )
        {
            $main->addChild( new layout_admin_listcell_banner( '/admin/banner/edit.form?id=' . $banner->id, $banner->name ) );
        }

        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}