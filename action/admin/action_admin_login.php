<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04/07/2015
 * Time: 22:55
 */

class action_admin_login extends action
{

    public function run()
    {

        $journalist = model_journalist::login(
            $this->data['email'],
            $this->data['password']
        );

        if( empty( $journalist->id ) )
        {
            $handler = new handler_admin_article_list();
            $handler->run( 'journalist not found' );
        }
        else
        {
            $_SESSION['journalist'] = $journalist;
            $handler = new handler_admin_article_list();
            $handler->run();
        }

    }

}