<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 17/06/2015
 * Time: 17:02
 */

class model_comment extends model
{

    static public function create( data_comment $data )
    {

        $sql = '
            INSERT INTO comment
                (  user_id,  article_id,  nick,  text )
            VALUES
                ( :user_id, :article_id, :nick, :text )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':user_id',    $data->user_id )
            ->bindInt   ( ':article_id', $data->article_id )
            ->bindString( ':nick',       $data->nick )
            ->bindString( ':text',       $data->text )
            ->execute();

        return db::lastInsertId();

    }

    static public function update( data_comment $data )
    {

        $sql = '
            UPDATE comment
            SET user_id    = :user_id,
                article_id = :article_id,
                nick       = :nick,
                text       = :text
            WHERE id = :id
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':user_id',    $data->user_id )
            ->bindInt   ( ':article_id', $data->article_id )
            ->bindString( ':nick',       $data->nick )
            ->bindString( ':text',       $data->text )
            ->bindInt   ( ':id',         $data->id )
            ->execute();

    }

    static public function delete( $id )
    {

        $sql = 'DELETE FROM comment WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

    }

    static public function getById( $id )
    {

        $sql = 'SELECT * FROM comment WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

        $row = $query->fetch();

        return new data_comment( $row );

    }

    static public function getForArticle( $article_id )
    {

        $sql = '
            SELECT *
            FROM comment
            WHERE article_id = :article_id
                AND approved = 1
            ORDER BY created DESC
        ';

        $query = db::prepare( $sql );
        $query->bindInt( ':article_id', $article_id )->execute();

        $return = new data_array();
        while( $row = $query->fetch() )
        {
            $return->add( new data_comment( $row ) );
        }

        return $return;

    }

}