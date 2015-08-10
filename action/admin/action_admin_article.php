<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 04/07/2015
 * Time: 22:55
 */

class action_admin_article extends action
{

    public function run()
    {

        $article = new data_article( $this->data );

        /** @TODO validation */

        if( empty( $article->id ) )
        {
            $article->routing = data_article::clean_for_url( $article->title );
            $article->id      = model_article::create( $article );
        }
        else
        {
            $db_article = model_article::getById( $article->id );
            $article->image_1 = $db_article->image_1;
            $article->image_2 = $db_article->image_2;
            $article->image_3 = $db_article->image_3;
            $article->image_4 = $db_article->image_4;
            model_article::update( $article );
        }

        for( $i=1; $i<=4; $i++ )
        {
            $image = file::saveFromPost( 'image' . $i, $article->id );
            if( $image )
            {
                $property = 'image_' . $i;
                $article->$property = $image;
            }
        }

        model_article::update( $article );

        $this->success();

    }

    private function failure( data_article $article )
    {
        $handler = new handler_admin_article_edit();
        $handler->run( $article );
    }

    private function success()
    {
        $handler = new handler_admin_article_list();
        $handler->run();
    }

}