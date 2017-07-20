<?php

class layout_admin_banner_page extends layout_page
{

    public function __construct
    (
        data_header  $header,
        data_footer  $footer,
        data_sidebar $sidebar,
        data_array   $categories,
        data_array   $positions,
        data_banner  $banner
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
            '/admin/banner.action',
            'form_banner',
            'form_banner',
            '/admin/banner',
            '/admin/banner/new.form'
        ) );

        $position_data = new data_array();
        foreach( banner::getListOfPositions() as $id => $position )
        {
            $position_data->add( array(
                'label' => $position,
                'value' => $id,
            ) );
        }

        /** @var  $category data_category */
        $category_data = new data_array();
        foreach( $categories->getData() as $category )
        {
            $category_data->add( array(
                'label' => $category->name,
                'value' => $category->id,
            ) );
        }

        // Data from submit to be added here.

        $form->addChild( new layout_form_hidden( 'id', $banner->id ) );

        if( !empty( $banner->id ) )
        {
            $params = array(
//                'href'    => '/admin/article_delete.action?id=' . $article->id,
                'class'   => 'btn-large',
                'onclick' => 'if(confirm(\'Sicuro di voler cancellare?\')) window.location=\'/admin/banner_delete.action?id=' . $banner->id . '\'',
            );
            $form->addChild( new layout_basic_button_link( 'Cancella', $params ) );
        }

        $form->addChild( new layout_form_dropdown( 'position_id', 'Posizione', $position_data, $banner->position_id ) );

        $form->addChild( new layout_form_dropdown( 'category_id', 'Categoria', $category_data, $banner->category_id ) );

        $form->addChild( new layout_form_text( 'name', 'Nome', $banner->name ) );

        $form->addChild( new layout_form_datepicker( 'date_from', 'Data inizio', $banner->date_from ) );

        $form->addChild( new layout_form_datepicker( 'date_to', 'Data fine', $banner->date_to ) );

        $form->addChild( new layout_form_file( 'file', 'File', null ) );

        $form->addChild( new layout_form_text( 'link', 'Link', $banner->link ) );

        $form->addChild( new layout_form_text( 'views', 'Visto', $banner->views ) );

        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}