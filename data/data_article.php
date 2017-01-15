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

    public $routing;

    public $title;

    public $subtitle;

    public $brief;

    public $text;

    public $created;

    public $sent;

    public $image_1;

    public $image_2;

    public $image_3;

    public $image_4;

    public $caption_1;

    public $caption_2;

    public $caption_3;

    public $caption_4;

    public $hero;

    public $homepage;

    public $pinned;

    public $related;

    function __construct( $data=null, data_category $category=null, data_journalist $journalist=null, data_array $related=null )
    {

        if( !empty( $data ) )
        {
            if( isset( $data['id'] ) )             $this->id            = $data['id'];
            if( isset( $data['category_id'] ) )    $this->category_id   = $data['category_id'];
            if( isset( $data['journalist_id'] ) )  $this->journalist_id = $data['journalist_id'];
            if( isset( $data['routing'] ) )        $this->routing       = $data['routing'];
            if( isset( $data['title'] ) )          $this->title         = $data['title'];
            if( isset( $data['subtitle'] ) )       $this->subtitle      = $data['subtitle'];
            if( isset( $data['brief'] ) )          $this->brief         = $data['brief'];
            if( isset( $data['text'] ) )           $this->text          = $data['text'];
            if( isset( $data['created'] ) )        $this->created       = $data['created'];
            if( isset( $data['sent'] ) )           $this->sent          = $data['sent'];
            if( isset( $data['image_1'] ) )        $this->image_1       = $data['image_1'];
            if( isset( $data['image_2'] ) )        $this->image_2       = $data['image_2'];
            if( isset( $data['image_3'] ) )        $this->image_3       = $data['image_3'];
            if( isset( $data['image_4'] ) )        $this->image_4       = $data['image_4'];
            if( isset( $data['caption_1'] ) )      $this->caption_1     = $data['caption_1'];
            if( isset( $data['caption_2'] ) )      $this->caption_2     = $data['caption_2'];
            if( isset( $data['caption_3'] ) )      $this->caption_3     = $data['caption_3'];
            if( isset( $data['caption_4'] ) )      $this->caption_4     = $data['caption_4'];
            if( isset( $data['hero'] ) )           $this->hero          = $data['hero'];
            if( isset( $data['homepage'] ) )       $this->homepage      = $data['homepage'];
            if( isset( $data['pinned'] ) )         $this->pinned        = $data['pinned'];
        }

        if( isset( $journalist ) ) $this->journalist = $journalist;
        if( isset( $category ) )   $this->category   = $category;
        if( isset( $related ) )    $this->related    = $related;

    }

    public function getLink()
    {
        return '/' . $this->category->routing . '/' . $this->routing . '.html';
    }

}