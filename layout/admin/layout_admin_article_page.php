<?php

class layout_admin_article_page extends layout_page
{

    public function __construct
    (
        data_header  $header,
        data_footer  $footer,
        data_sidebar $sidebar,
        data_array   $categories,
        data_article $article
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
            '/admin/article.action',
            'form_article',
            'form_article',
            '/admin/article',
            '/admin/article/new.form'
        ) );

        /** @var  $category data_category */
        $dropdown_data = new data_array();
        foreach( $categories->getData() as $category )
        {
            $dropdown_data->add( array(
                'label' => $category->name,
                'value' => $category->id,
            ) );
        }

        $radio_data = new data_array();
        $radio_data->add( array(
            'label' => 'Po',
            'value' => 1,
        ) );
        $radio_data->add( array(
            'label' => 'Jo',
            'value' => 0,
        ) );

        // Data from submit to be added here.

        $form->addChild( new layout_form_hidden( 'id', $article->id ) );

        $form->addChild( new layout_form_hidden( 'routing', $article->routing ) );

        $form->addChild( new layout_form_dropdown( 'category_id', 'Kategori', $dropdown_data, $article->category_id ) );

        $form->addChild( new layout_form_text( 'title', 'Titull', $article->title ) );

        $form->addChild( new layout_form_text( 'subtitle', 'Nëntitull', $article->subtitle ) );

        $form->addChild( new layout_form_textarea( 'brief', 'Shkurtër', $article->brief ) );

        $form->addChild( new layout_form_textarea( 'text', 'Tekst', $article->text, 25 ) );

        for( $i=1; $i<=4; $i++ )
        {
            $form->addChild( new layout_form_file( 'image' . $i, 'Imazh ' . $i ), null );
        }

        $form->addChild( new layout_form_radio( 'hero', 'Hero', $radio_data, $article->hero ) );

        $form->addChild( new layout_form_radio( 'homepage', 'Homepage', $radio_data, $article->homepage ) );

        $form->addChild( new layout_form_radio( 'pinned', 'R&euml;nd&euml;sish&euml;m', $radio_data, $article->pinned ) );

        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}