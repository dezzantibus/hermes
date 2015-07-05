<?php

class layout_admin_article_page extends layout_page
{

    public function __construct()
    {

        $this->addChild( new layout_header() );

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
            '/admin/article.action',
            'form_article',
            'form_article',
            '/admin/article',
            '/admin/article/new.form'
        ) );

        $filler = new data_array();
        $filler->add( array( 'label' => 'Data 1', 'value' => 1 ) );
        $filler->add( array( 'label' => 'Data 2', 'value' => 2 ) );
        $filler->add( array( 'label' => 'Data 3', 'value' => 3 ) );

        // Data from submit to be added here.

        $form->addChild( new Layout_form_hidden( 'id', null ) );

        $form->addChild( new layout_form_dropdown( 'category_id', 'Kategori', $filler ) );

        $form->addChild( new layout_form_text( 'title', 'Titull', null ) );

        $form->addChild( new layout_form_text( 'subtitle', 'Nëntitull', null ) );

        $form->addChild( new layout_form_textarea( 'brief', 'Shkurtër', null ) );

        $form->addChild( new layout_form_textarea( 'text', 'Tekst', null, 25 ) );

        $form->addChild( new layout_form_radio( 'hero', 'Hero', $filler, null ) );

        $form->addChild( new layout_form_radio( 'homepage', 'Homepage', $filler, null ) );

        $wrapper->addChild( new layout_sidebar() );

        $this->addChild( new layout_footer() );

    }

}