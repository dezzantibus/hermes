<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04/07/2015
 * Time: 22:55
 */

class action_admin_comment_approve extends action
{

    public function run()
    {

        model_comment::approve( $_GET['id'], $_GET['value'] );

        $handler = new handler_admin_comment_list();
        $handler->run();

    }

}