<?php

class layout_admin_journalist_page extends layout_page
{

    public function __construct
    (
        data_header     $header,
        data_footer     $footer,
        data_sidebar    $sidebar,
        data_array      $categories,
        data_journalist $journalist
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

        $form = $main->addChild( new layout_form(
            '/admin/journalist.action',
            'form_journalist',
            'form_journalist',
            '/admin/article',
            '/admin/journalist/new.form'
        ) );

        $form->addChild( new layout_form_hidden( 'id', $journalist->id ) );

        $form->addChild( new layout_form_text( 'first_name', constant::$text['first name'], $journalist->first_name ) );

        $form->addChild( new layout_form_text( 'last_name', constant::$text['last name'], $journalist->last_name ) );

        $form->addChild( new layout_form_text( 'email', constant::$text['email'], $journalist->email ) );

        $form->addChild( new layout_form_text( 'password', constant::$text['password'] ) );

        $form->addChild( new layout_form_text( 'repeat_password', constant::$text['repeat password'] ) );

        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}