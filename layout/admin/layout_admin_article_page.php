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

        // Data from submit to be added here.

        $form->addChild( new layout_form_hidden( 'id', $article->id ) );

        if( !empty( $article->id ) )
        {
            $params = array(
//                'href'    => '/admin/article_delete.action?id=' . $article->id,
                'class'   => 'btn-large',
                'onclick' => 'if(confirm(\'Sicuro di voler cancellare?\')) window.location=\'/admin/article_delete.action?id=' . $article->id . '\'',
            );
            $form->addChild( new layout_basic_button_link( 'Cancella', $params ) );
        }

        $form->addChild( new layout_form_hidden( 'routing', $article->routing ) );

        $form->addChild( new layout_form_dropdown( 'category_id', constant::$text['category'], $dropdown_data, $article->category_id ) );

        $form->addChild( new layout_form_text( 'title', constant::$text['title'], $article->title ) );

        $form->addChild( new layout_form_text( 'subtitle', constant::$text['subtitle'], $article->subtitle ) );

        $form->addChild( new layout_form_textarea( 'brief', constant::$text['brief'], $article->brief ) );

        $form->addChild( new layout_form_textarea( 'text', constant::$text['text'], $article->text, 25 ) );

        for( $i=1; $i<=4; $i++ )
        {
            $form->addChild( new layout_form_file( 'image' . $i, constant::$text['image'] . ' ' . $i ), null );
        }

        switch( constant::$text['site'] )
        {
            case 'athena':
                $form->addChild( new layout_form_hidden( 'journalist_id', empty( $article->journalist_id ) ? $_SESSION['journalist']->id : $article->journalist_id ) );
                break;

            case 'hermes':
                $radio_data = new data_array();
                $radio_data->add( array(
                    'label' => constant::$text['yes'],
                    'value' => $_SESSION['journalist']->id,
                ) );
                $radio_data->add( array(
                    'label' => constant::$text['no'],
                    'value' => 0,
                ) );

                $form->addChild( new layout_form_radio( 'journalist_id', constant::$text['show journalist'], $radio_data, $article->journalist_id ) );

                break;
        }

        $radio_data = new data_array();
        $radio_data->add( array(
            'label' => constant::$text['yes'],
            'value' => 1,
        ) );
        $radio_data->add( array(
            'label' => constant::$text['no'],
            'value' => 0,
        ) );

        $form->addChild( new layout_form_radio( 'hero', 'Hero', $radio_data, $article->hero ) );

        $form->addChild( new layout_form_radio( 'homepage', 'Homepage', $radio_data, $article->homepage ) );

        $form->addChild( new layout_form_radio( 'pinned', constant::$text['pinned'], $radio_data, $article->pinned ) );

        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}