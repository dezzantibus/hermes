<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 17/06/2015
 * Time: 17:02
 */

class model_banner extends model
{

    static public function create( data_banner $data )
    {

        $sql = '
            INSERT INTO banner
                (
                position_id, category_id, `name`,
                date_from, date_to, file, link,
                active, views
                )
            VALUES
                (
                :position_id, :category_id, :name,
                :date_from, :date_to, :file, :link,
                :active, :views
                )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':position_id',   $data->position_id )
            ->bindInt   ( ':category_id',   $data->category_id )
            ->bindString( ':name',          $data->name )
            ->bindDate  ( ':date_from',     $data->date_from )
            ->bindDate  ( ':date_to',       $data->date_to )
            ->bindString( ':file',          $data->file )
            ->bindString( ':link',          $data->link )
            ->bindInt   ( ':active',        $data->active )
            ->bindInt   ( ':views',         0 )
            ->execute();

        return db::lastInsertId();

    }

    static public function update( data_banner $data )
    {

        $sql = '
            UPDATE banner
            SET position_id = :position_id,
                category_id = :category_id,
                `name`      = :name,
                date_from   = :date_from,
                date_to     = :date_to,
                file        = :file,
                link        = :link,
                active      = :active
            WHERE id = :id
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':position_id',   $data->position_id )
            ->bindInt   ( ':category_id',   $data->category_id )
            ->bindString( ':name',          $data->name )
            ->bindDate  ( ':date_from',     $data->date_from )
            ->bindDate  ( ':date_to',       $data->date_to )
            ->bindString( ':file',          $data->file )
            ->bindString( ':link',          $data->link )
            ->bindInt   ( ':active',        $data->active )
            ->bindInt   ( ':id',            $data->id )
            ->execute();

    }

    static public function delete( $id )
    {

        $sql = 'DELETE FROM banner WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

    }

    static public function getById( $id )
    {

        $sql = 'SELECT * FROM banner WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

        $row = $query->fetch();

        return new data_banner( $row );

    }

}