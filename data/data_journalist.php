<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 16/06/2015
 * Time: 09:28
 */

class data_journalist extends data
{

    public $id;

    public $manager_id;

    public $first_name;

    public $last_name;

    public $display_name;

    public $email;

    public $password;

    public $icon;

    public $bio;

    public $created;

    public $google;

    function __construct( $data=null )
    {

        if( isset( $data ) )
        {
            if( isset( $data['id'] ) )           $this->id           = $data['id'];
            if( isset( $data['manager_id'] ) )   $this->manager_id   = $data['manager_id'];
            if( isset( $data['first_name'] ) )   $this->first_name   = $data['first_name'];
            if( isset( $data['last_name'] ) )    $this->last_name    = $data['last_name'];
            if( isset( $data['display_name'] ) ) $this->display_name = $data['display_name'];
            if( isset( $data['email'] ) )        $this->email        = $data['email'];
            if( isset( $data['password'] ) )     $this->password     = $data['password'];
            if( isset( $data['icon'] ) )         $this->icon         = $data['icon'];
            if( isset( $data['bio'] ) )          $this->bio          = $data['bio'];
            if( isset( $data['created'] ) )      $this->created      = $data['created'];
            if( isset( $data['google'] ) )       $this->google       = $data['google'];
        }

    }

}