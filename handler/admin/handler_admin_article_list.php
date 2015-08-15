<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 15:20
 */

class handler_admin_article_list extends handler
{

    public function run()
    {

        $header  = $this->getHeaderData();
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData();

        $this->login( $header, $footer, $sidebar );

        // Get list of articles
        $page = $this->data['page'];
        if( empty( $page ) )
        {
            $page = 1;
        }
        $articles = model_article::getAdminPage( $page );

        $pages = model_article::getAdminPageNumber();

        // Render page
        $page = new layout_admin_article_list_page( $header, $footer, $sidebar, $articles, $pages, $page );
        $page->render();

    }

}