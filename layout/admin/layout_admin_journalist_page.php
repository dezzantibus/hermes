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

        // This will become the manager drop down
        //$form->addChild( new layout_form_dropdown( 'category_id', 'Kategori', $dropdown_data, $article->category_id ) );

        $form->addChild( new layout_form_text( 'first_name', 'Emri i parë', $journalist->first_name ) );

        $form->addChild( new layout_form_text( 'last_name', 'Mbiemër', $journalist->last_name ) );

        $form->addChild( new layout_form_text( 'email', 'Email', $journalist->email ) );

        $form->addChild( new layout_form_text( 'password', 'Fjalëkalim' ) );

        $form->addChild( new layout_form_text( 'repeat_password', 'Fjalëkalim përsëritje' ) );

        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}