<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 17/06/2015
 * Time: 17:02
 */

class model_journalist extends model
{

    static public function create( data_journalist $data )
    {

        $sql = '
            INSERT INTO journalist
                (  manager_id,  first_name,  last_name,  email,  password )
            VALUES
                ( :manager_id, :first_name, :last_name, :email, :password )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':manager_id', $data->manager_id )
            ->bindString( ':first_name', $data->first_name )
            ->bindString( ':last_name',  $data->last_name )
            ->bindString( ':email',      $data->email )
            ->bindString( ':password',   security::hash( $data->password ) )
            ->execute();

        return db::lastInsertId();

    }

    static public function update( data_journalist $data, $newPassword=false )
    {

        $sql = '
            UPDATE journalist
            SET manager_id = :manager_id,
                first_name = :first_name,
                last_name = :last_name,
                email = :email,
                password = :password,
            WHERE id = :id
        ';

        $password = $newPassword ? security::hash( $data->password ) : $data->password;

        $query = db::prepare( $sql );
        $query
            ->bindInt   ( ':manager_id', $data->manager_id )
            ->bindString( ':first_name', $data->first_name )
            ->bindString( ':last_name',  $data->last_name )
            ->bindString( ':email',      $data->email )
            ->bindString( ':password',   $password )
            ->bindInt   ( ':id',         $data->id )
            ->execute();

    }

    static public function delete( $id )
    {

        $sql = 'DELETE FROM journalist WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

    }

    static public function getById( $id )
    {

        $sql = 'SELECT * FROM journalist WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

        $row = $query->fetch();

        return new data_journalist( $row );

    }

}