<?php

class layout_admin_category_page extends layout_page
{

    public function __construct
    (
        data_header   $header,
        data_footer   $footer,
        data_sidebar  $sidebar,
        data_array    $categories,
        data_category $category
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
        // repurpose for the homepage blocks
//        $dropdown_data = new data_array();
//        foreach( $categories->getData() as $category )
//        {
//            $dropdown_data->add( array(
//                'label' => $category->name,
//                'value' => $category->id,
//            ) );
//        }

        $form->addChild( new layout_form_hidden( 'id', $category->id ) );

        $form->addChild( new layout_form_text( 'name', 'Name', $category->name ) );

        $form->addChild( new layout_form_dropdown( 'home_block', 'Home block', $dropdown_data, $category->home_block ) );

        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}