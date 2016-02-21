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
            $banner->id = model_banner::create( $banner );
        }
        else
        {
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