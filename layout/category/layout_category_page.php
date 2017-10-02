<?php

class layout_category_page extends layout_page
{

    public function __construct
    (
        data_header   $header,
        data_footer   $footer,
        data_sidebar  $sidebar,
        data_category $category,
        data_array    $articles,
        data_array    $pinned,
                      $pages,
                      $page
    )
    {

        $this->title = $category->name;

        $this->background = $category->background;

        $this->addChild( new layout_header( $header ) );

        $this->addChild( new layout_category_title( $category ) );

        $params  = array( 'id' => 'section' );
        $section = $this->addChild( new layout_basic_section( $params ) );

        $params  = array( 'class' => 'inner-wrapper', 'style' => 'background:' . $this->background );
        $wrapper = $section->addChild( new layout_basic_div( $params ) );

        $params = array(
            'id'    => 'main',
            'class' => 'left',
            'role'  => 'main',
        );
        $main = $wrapper->addChild( new layout_basic_div( $params ) );

        // pinned articles
//        $main->addChild( new layout_category_pinned( $articles ) );

        $params  = array( 'class' => 'block-layout-five' );
        $content = $main->addChild( new layout_basic_div( $params ) );

        $counter = 0;
        foreach( $articles->getData() as $article )
        {
            $counter++;
            switch( $counter )
            {
                case  6: $banner = banner::CATEGORY_TOP;    break;
                case 11: $banner = banner::CATEGORY_MIDDLE; break;
                case 16: $banner = banner::CATEGORY_BOTTOM; break;
                default: $banner = false;
            }
            $content->addChild( new layout_category_item( $article, $banner ) );
        }

        $main->addChild( new layout_category_pagination( $pages, $page ) );

        $wrapper->addChild( new layout_sidebar( $sidebar ) );

        $this->addChild( new layout_footer( $footer ) );

    }

}