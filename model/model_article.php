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
                title, subtitle, brief,
                text, hero, homepage
                )
            VALUES
                (
                :category_id, :journalist_id,
                :title, :subtitle, :brief,
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
            SET category_id   = :category_id,
                journalist_id = :journalist_id,
                title         = :title,
                subtitle      = :subtitle,
                brief         = :brief,
                text          = :text,
                sent          = :sent,
                image_1       = :image_1,
                image_2       = :image_2,
                image_3       = :image_3,
                image_4       = :image_4,
                hero = :hero,
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
            ->bindString( ':image_1',       $data->image_1 )
            ->bindString( ':image_2',       $data->image_2 )
            ->bindString( ':image_3',       $data->image_3 )
            ->bindString( ':image_4',       $data->image_4 )
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

    static public function getByRouting( $routing, $parent )
    {

        $category = model_category::getByRouting( $parent );

        $sql = '
            SELECT *
            FROM article
            WHERE routing = :routing
                AND category_id = :category_id
        ';

        $query = db::prepare( $sql );
        $query
            ->bindString( ':routing',     $routing )
            ->bindInt   ( ':category_id', $category->id )
            ->execute();

        $row = $query->fetch();

        $journalist = model_journalist::getById( $row['id'] );

        return new data_article( $row, $category, $journalist );

    }

    static public function getHomeCategory( data_category $category, $number )
    {

        $sql = '
            SELECT *
            FROM article
            WHERE category_id = :category_id
                AND homepage = 1
            ORDER BY id DESC
            LIMIT :number
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt( ':category_id', $category->id )
            ->bindInt( ':number',      $number )
            ->execute();

        $result = new data_array();
        while( $row = $query->fetch() )
        {
            $result->add( new data_article( $row, $category ) );
        }

        return $result;

    }

}