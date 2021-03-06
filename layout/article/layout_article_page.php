<?php

class layout_article_page extends layout_page
{

    public function __construct
    (
        data_header  $header,
        data_footer  $footer,
        data_sidebar $sidebar,
        data_article $article,
        data_array   $comments
    )
    {

        $this->title = $article->title;

        $this->description = $article->brief;

        $this->article = $article;

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

        $main->addChild( new layout_article_content( $article ) );

        if( $article->journalist_id > 0 )
        {
            $main->addChild( new layout_article_bio( $article->journalist ) );
        }

//        $main->addChild( new layout_article_controls() );

//        $main->addChild( new layout_article_related() );

        $main->addChild( new layout_article_comments( $comments, $article ) );

        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}