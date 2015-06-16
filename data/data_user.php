<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 16/06/2015
 * Time: 10:04
 */

class data_user extends data
{

    public $id;

    public $username;

    public $password;

    public $first_name;

    public $last_name;

    public $email;

    public $created;

    function __construct( $data=null )
    {

        if( isset( $data ) )
        {
            if( isset( $data['id'] ) )         $this->id         = $data['id'];
            if( isset( $data['username'] ) )   $this->username   = $data['username'];
            if( isset( $data['password'] ) )   $this->password   = $data['password'];
            if( isset( $data['first_name'] ) ) $this->first_name = $data['first_name'];
            if( isset( $data['last_name'] ) )  $this->last_name  = $data['last_name'];
            if( isset( $data['email'] ) )      $this->email      = $data['email'];
            if( isset( $data['created'] ) )    $this->created    = $data['created'];
        }

    }

}
