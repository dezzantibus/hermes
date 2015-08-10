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

        $header  = $this->getHeaderData();
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData( $category );

        if( empty( $this->data['page'] ) )
        {
            $articles = model_article::getCategoryPage( $category, 1 );
        }
        else
        {
            $articles = model_article::getCategoryPage( $category, $this->data['page'] );
        }

        if( $this->data['page'] > 1 )
        {
            $pinned = new data_array();
        }
        else
        {
            $pinned = model_article::getCategoryPinned( $category, 6 );
        }

        // Render page
        $page = new layout_category_page( $header, $footer, $sidebar, $category, $articles, $pinned );
        $page->render();

    }

}