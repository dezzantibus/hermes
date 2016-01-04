<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 15/06/2015
 * Time: 13:54
 */

class handler_article extends handler
{

    public function run()
    {

        $article = model_article::getByRouting(
            $this->data['routing'],
            $this->data['parent']
        );

        $article->journalist = model_journalist::getById( $article->journalist_id );

        $header  = $this->getHeaderData();
        $footer  = $this->getFooterData();
        $sidebar = $this->getSidebarData( $article->category, $article );

        model_hit::log( $article );

        $comments = model_comment::getForArticle( $article->id );

        // Render page
        $page = new layout_article_page( $header, $footer, $sidebar, $article, $comments );
        $page->render();

    }

}