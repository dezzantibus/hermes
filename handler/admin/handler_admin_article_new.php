<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 15:20
 */

class handler_admin_article_new extends handler
{

    public function run()
    {

        // Collect data

        // Render page
        $page = new layout_admin_article_page();
        $page->render();

    }

}