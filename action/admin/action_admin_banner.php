<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04/07/2015
 * Time: 22:55
 */

class action_admin_banner extends action
{

    public function run()
    {

        $banner = new data_banner( $this->data );

        /** @TODO validation */

        if( empty( $banner->id ) )
        {
            $banner->active = 1;
            $banner->id     = model_banner::create( $banner );
        }
        else
        {
            $db_banner      = model_banner::getById( $banner->id );
            $banner->active = $db_banner->active;
            $banner->views  = $db_banner->views;
            $banner->file   = $db_banner->file;
            model_banner::update( $banner );
        }

        $image = file::saveFromPost( 'file', $banner->id, 'banner' );
        if( $image )
        {
            $banner->file = '/upload' . $image;
        }

        model_banner::update( $banner );

        $this->success();

    }

    private function failure( data_article $article )
    {
        $handler = new handler_admin_article_edit();
        $handler->run( $article );
    }

    private function success()
    {
        $handler = new handler_admin_banner_list();
        $handler->run();
    }

}