<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 15/06/2015
 * Time: 13:54
 */

class handler_category extends handler
{

    public function run()
    {

        $category = model_category::getByRouting( $this->data['routing'] );

        // Get list of articles
        $page = $this->data['page'];
        if( empty( $page ) )
        {
            $page = 1;
        }
        $articles = model_article::getCategoryPage( $category, $page );

        $pages = model_article::getCategoryPageNumber( $category );

        if( $this->data['page'] > 1 )
        {
            $pinned = new data_array();
        }
        else
        {
            $pinned = model_article::getCategoryPinned( $category, 6 );
        }


        $header  = $this->getHeaderData();
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData( $category );

        // Render page
        $page = new layout_category_page( $header, $footer, $sidebar, $category, $articles, $pinned, $pages, $page );
        $page->render();

    }

}