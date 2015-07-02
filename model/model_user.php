<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 17/06/2015
 * Time: 17:02
 */

class model_user extends model
{

    static public function create( data_user $data)
    {

        $sql = '
            INSERT INTO `user`
                (  username,  password,  first_name,  last_name,  email )
            VALUES
                ( :username, :password, :first_name, :last_name, :email )
        ';

        $query = db::prepare( $sql );
        $query
            ->bindString( ':username', $data->username )
            ->bindString( ':password', security::hash( $data->password ) )
            ->bindString( ':first_name', $data->first_name )
            ->bindString( ':last_name', $data->last_name )
            ->bindString( ':email', $data->email )
            ->execute();

        return db::lastInsertId();

    }

    static public function update( data_user $data, $newPassword=false )
    {

        $sql = '
            UPDATE `user`
            SET username = :username,
                password = :password,
                first_name = :first_name,
                last_name = :last_name,
                email = :email
            WHERE id = :id
        ';

        $password = $newPassword ? security::hash( $data->password ) : $data->password;

        $query = db::prepare( $sql );
        $query
            ->bindString( ':username',   $data->username )
            ->bindString( ':password',   $password )
            ->bindString( ':first_name', $data->first_name )
            ->bindString( ':last_name',  $data->last_name )
            ->bindString( ':email',      $data->email )
            ->bindInt   ( ':id',         $data->id )
            ->execute();

    }

    static public function delete( $id )
    {

        $sql = 'DELETE FROM `user` WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

    }

    static public function getById( $id )
    {

        $sql = 'SELECT * FROM `user` WHERE id = :id';

        $query = db::prepare( $sql );
        $query->bindInt( ':id', $id )->execute();

        $row = $query->fetch();

        return new data_comment( $row );

    }

}