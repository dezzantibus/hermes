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
                (  user_id,  article_id,  nick,  text,  approved )
            VALUES
                ( :user_id, :article_id, :nick, :text, :approved )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':user_id',    $data->user_id )
            ->bindInt   ( ':article_id', $data->article_id )
            ->bindString( ':nick',       $data->nick )
            ->bindString( ':text',       $data->text )
            ->bindInt   ( ':approved',   $data->approved )
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

    static public function getPending()
    {

        $sql = '
            SELECT c.*, a.title, cat.name
            FROM comment c
                INNER JOIN article a
                    ON a.id = c.article_id
                INNER JOIN category cat
                    ON a.category_id = cat.id
            WHERE c.approved = 0
            ORDER BY c.created
        ';

        $query = db::prepare( $sql )->execute();

        $return = new data_array();
        while( $row = $query->fetch() )
        {
            $return->add( new data_comment( $row, $row['title'], $row['name'] ) );
        }

        return $return;

    }

    static public function approve( $id, $approved )
    {

        $sql = '
            UPDATE comment
            SET approved = :approved
            WHERE id = :id
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt( ':approved', $approved )
            ->bindInt( ':id',       $id )
            ->execute();

    }

}