<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 17/06/2015
 * Time: 17:02
 */

class model_related extends model
{

    static public function create( $article_id, $related_id )
    {

        $sql = '
            INSERT INTO related
                ( article_id, related_id )
            VALUES
                ( :article_id, :related_id )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':article_id', $article_id )
            ->bindInt   ( ':related_id', $related_id )
            ->execute();

        return db::lastInsertId();

    }

    static public function update()
    {
    }

    static public function delete( $article_id, $related_id )
    {

        $sql = '
            DELETE FROM related
            WHERE article_id = :article_id
                AND related_id = :related_id
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt( ':article_id', $article_id )
            ->bindInt( ':related_id', $related_id )
            ->execute();

    }

    static public function deleteForArticleId( $article_id )
    {

        $sql = '
            DELETE FROM related
            WHERE article_id = :article_id
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt( ':article_id', $article_id )
            ->execute();

    }

}