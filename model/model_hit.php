<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 17/06/2015
 * Time: 17:02
 */

class model_hit extends model
{

    static public function log( data_article $article )
    {

        $sql = '
            INSERT INTO hit
                (article_id, category_id)
            VALUES
                (:article_id, :category_id)
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt( ':article_id',  $article->id )
            ->bindInt( ':category_id', $article->category_id )
            ->execute();

    }

}