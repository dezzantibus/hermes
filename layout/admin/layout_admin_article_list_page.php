<?php

class layout_admin_article_list_page extends layout_page
{

    public function __construct
    (
        data_header  $header,
        data_footer  $footer,
        data_sidebar $sidebar,
        data_array   $articles,
                     $pages,
                     $page
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
            'href'  => '/admin/article/new.form',
            'class' => 'btn-large',
        );
        $main->addChild( new layout_basic_button_link( constant::$language['Insert new'], $params ) );

        /** @var $article data_article */
        foreach( $articles->getData() as $article )
        {
            $main->addChild( new layout_admin_listcell( '/admin/article/edit.form?id=' . $article->id, $article->title ) );
        }

        $main->addChild( new layout_category_pagination( $pages, $page ) );

        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}