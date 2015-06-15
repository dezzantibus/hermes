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

        // Collect data

        // Render page
        $page = new layout_category_page();
        $page->render();

    }

}