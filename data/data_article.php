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
            if( !empty( $data['id'] ) )             $this->id            = $data['id'];
            if( !empty( $data['category_id'] ) )    $this->category_id   = $data['category_id'];
            if( !empty( $data['journalist_id'] ) )  $this->journalist_id = $data['journalist_id'];
            if( !empty( $data['title'] ) )          $this->title         = $data['title'];
            if( !empty( $data['subtitle'] ) )       $this->subtitle      = $data['subtitle'];
            if( !empty( $data['brief'] ) )          $this->brief         = $data['brief'];
            if( !empty( $data['text'] ) )           $this->text          = $data['text'];
            if( !empty( $data['created'] ) )        $this->created       = $data['created'];
            if( !empty( $data['sent'] ) )           $this->sent          = $data['sent'];
            if( !empty( $data['hero'] ) )           $this->hero          = $data['hero'];
            if( !empty( $data['homepage'] ) )       $this->homepage      = $data['homepage'];
        }

        if( !empty( $journalist ) ) $this->journalist = $journalist;
        if( !empty( $category ) )   $this->category   = $category;

    }

}