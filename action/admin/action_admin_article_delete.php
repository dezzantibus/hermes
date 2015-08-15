<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04/07/2015
 * Time: 22:55
 */

class action_admin_article_delete extends action
{

    public function run()
    {

        model_article::delete( $_GET['id'] );

        $handler = new handler_admin_article_list();
        $handler->run();

    }

}