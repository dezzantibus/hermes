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

        // Collect data

        // Render page
        $page = new layout_article_page();
        $page->render();

    }

}