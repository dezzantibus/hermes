<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 17/06/2015
 * Time: 17:02
 */

class model_article extends model
{

    static public function create( data_article $data )
    {

        $sql = '
            INSERT INTO article
                (
                category_id, journalist_id,
                title, subtitle, brief
                text, hero, homepage
                )
            VALUES
                (
                :category_id, :journalist_id,
                :title, :subtitle, :brief
                :text, :hero, :homepage
                )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':category_id',   $data->category_id )
            ->bindInt   ( ':journalist_id', $data->journalist_id )
            ->bindString( ':title',         $data->title )
            ->bindString( ':subtitle',      $data->subtitle )
            ->bindString( ':brief',         $data->brief )
            ->bindString( ':text',          $data->text )
            ->bindInt   ( ':hero',          $data->hero )
            ->bindInt   ( ':homepage',      $data->homepage )
            ->execute();

        return db::lastInsertId();

    }

    static public function update( data_article $data )
    {

        $sql = '
            UPDATE article
            SET category_id = :category_id,
                journalist_id = :journalist_id
                title = :title
                subtitle = :subtitle
                brief = :brief
                text = :text
                sent = :sent
                hero = :hero
                homepage = :homepage
            WHERE id = :id
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':category_id',   $data->category_id )
            ->bindInt   ( ':journalist_id', $data->journalist_id )
            ->bindString( ':title',         $data->title )
            ->bindString( ':subtitle',      $data->subtitle )
            ->bindString( ':brief',         $data->brief )
            ->bindString( ':text',          $data->text )
            ->bindInt   ( ':sent',          $data->sent )
            ->bindInt   ( ':hero',          $data->hero )
            ->bindInt   ( ':homepage',      $data->homepage )
            ->bindInt   ( ':id',            $data->id )
            ->execute();

    }

    static public function delete( $id )
    {

        $sql = 'DELETE FROM article WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

    }

    static public function getById( $id )
    {

        $sql = 'SELECT * FROM article WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

        $row = $query->fetch();

        return new data_article( $row );

    }

}