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

        $header  = $this->getHeaderData();
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData();

        $category = model_category::getByRouting( $this->data['routing'] );

        $articles = model_article::getCategoryPage( $category->id, $this->data['page'] );

        // Render page
        $page = new layout_category_page( $header, $footer, $sidebar, $category, $articles );
        $page->render();

    }

}