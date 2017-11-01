<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 17/06/2015
 * Time: 17:02
 */

class model_category extends model
{

    static public function create( data_category $data )
    {

        $sql = '
            INSERT INTO category
                ( `parent_id`, `name`, `order`, `home_order`, `home_block` )
            VALUES
                ( :parent_id,  :name,  :order,  :home_order,  :home_block )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':parent_id',  $data->parent_id )
            ->bindString( ':name',       $data->name )
            ->bindInt   ( ':order',      $data->order )
            ->bindInt   ( ':home_order', $data->home_order )
            ->bindString( ':home_block', $data->home_block )
            ->execute();

        return db::lastInsertId();

    }

    static public function update( data_category $data )
    {

        $sql = '
            UPDATE category
            SET `parent_id`  = :parent_id,
                `name`       = :name,
                `order`      = :order,
                `home_order` = :home_order,
                `home_block` = :home_block
            WHERE id = :id
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':parent_id',  $data->parent_id )
            ->bindString( ':name',       $data->name )
            ->bindInt   ( ':order',      $data->order )
            ->bindInt   ( ':home_order', $data->home_order )
            ->bindString( ':home_block', $data->home_block )
            ->bindInt   ( ':id',         $data->id )
            ->execute();

    }

    static public function delete( $id )
    {

        $sql = 'DELETE FROM category WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

    }

    static public function getById( $id )
    {

        $sql = 'SELECT * FROM category WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

        $row = $query->fetch();

        return new data_category( $row );

    }

    static public function getByRouting( $routing )
    {

        $sql = 'SELECT * FROM category WHERE routing = :routing';

        $query = db::prepare( $sql );
        $query->bindString( ':routing', $routing )->execute();

        $row = $query->fetch();

        return new data_category( $row );

    }

    static public function getFullList( $order='order' )
    {

        $result = cache_category::returnFullList( $order );

        if( empty( $result ) )
        {

            $sql = "SELECT * FROM category ORDER BY `$order` ASC";

            $query = db::prepare( $sql );
            $query->execute();

            $result = new data_array();
            while( $row = $query->fetch() )
            {
                if( !is_numeric($row[ $order ]) OR $row[ $order ] > 0 )
                {
                    $result->add( new data_category( $row ) );
                }
            }

            cache_category::saveFullList( $result, $order );

        }

        return $result;

    }

    static public function getHomepageList()
    {

        $result = cache_category::returnHomeCategories();

        if( empty( $result ) )
        {

            $sql = 'SELECT * FROM category WHERE home_order > 0 ORDER BY `home_order` ASC';

            $query = db::prepare( $sql );
            $query->execute();

            $result = new data_array();
            while( $row = $query->fetch() )
            {
                $result->add( new data_category( $row ) );
            }

            cache_category::saveHomeCategories( $result );

        }

        return $result;

    }

}