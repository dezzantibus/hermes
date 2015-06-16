<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 16/06/2015
 * Time: 09:18
 */

class data_article extends data
{

    public $id;

    public $category_id;

    public $category;

    public $journalist_id;

    public $journalist;

    public $title;

    public $subtitle;

    public $brief;

    public $text;

    public $created;

    public $sent;

    public $hero;

    public $homepage;

    function __construct( $data=null, data_journalist $journalist=null, data_category $category=null )
    {

        if( !empty( $data ) )
        {
            if( isset( $data['id'] ) )             $this->id            = $data['id'];
            if( isset( $data['category_id'] ) )    $this->category_id   = $data['category_id'];
            if( isset( $data['journalist_id'] ) )  $this->journalist_id = $data['journalist_id'];
            if( isset( $data['title'] ) )          $this->title         = $data['title'];
            if( isset( $data['subtitle'] ) )       $this->subtitle      = $data['subtitle'];
            if( isset( $data['brief'] ) )          $this->brief         = $data['brief'];
            if( isset( $data['text'] ) )           $this->text          = $data['text'];
            if( isset( $data['created'] ) )        $this->created       = $data['created'];
            if( isset( $data['sent'] ) )           $this->sent          = $data['sent'];
            if( isset( $data['hero'] ) )           $this->hero          = $data['hero'];
            if( isset( $data['homepage'] ) )       $this->homepage      = $data['homepage'];
        }

        if( isset( $journalist ) ) $this->journalist = $journalist;
        if( isset( $category ) )   $this->category   = $category;

    }

}