<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 15/06/2015
 * Time: 13:54
 */

class handler_article extends handler
{

    public function run()
    {

        $header  = $this->getHeaderData();
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData();

        $article = model_article::getByRouting(
            $this->data['routing'],
            $this->data['parent']
        );

        // Render page
        $page = new layout_article_page( $header, $footer, $sidebar, $article );
        $page->render();

    }

}