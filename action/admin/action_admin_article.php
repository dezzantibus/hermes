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

        /** @TODO save images */

        if( empty( $article->id ) )
        {
            model_article::create( $article );
        }
        else
        {
            model_article::update( $article );
        }

        $this->success();

    }

    private function failure()
    {

        /** @TODO collect data to display the form */

        $page = new layout_admin_article_page();
        $page->render();

    }

    private function success()
    {

        /** @TODO show list of articles in admin */

    }

}