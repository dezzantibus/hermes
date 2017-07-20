<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04/07/2015
 * Time: 22:55
 */

class action_admin_banner_delete extends action
{

    public function run()
    {

        model_banner::delete( $_GET['id'] );

        $handler = new handler_admin_banner_list();
        $handler->run();

    }

}