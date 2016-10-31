<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 16/06/2015
 * Time: 10:09
 */

class data_comment extends data
{

    public $id;

    public $user_id = 0;

    public $article_id;

    public $nick;

    public $text;

    public $approved;

    public $created;

    public $article_title;

    public $category_name;

    function __construct( $data=null, $article_title=null, $category_name=null )
    {

        if( isset( $data ) )
        {
            if( isset( $data['id'] ) )         $this->id         = $data['id'];
            if( isset( $data['user_id'] ) )    $this->user_id    = $data['user_id'];
            if( isset( $data['article_id'] ) ) $this->article_id = $data['article_id'];
            if( isset( $data['nick'] ) )       $this->nick       = $data['nick'];
            if( isset( $data['text'] ) )       $this->text       = $data['text'];
            if( isset( $data['approved'] ) )   $this->approved   = $data['approved'];
            if( isset( $data['created'] ) )    $this->created    = $data['created'];
        }

        if( isset( $article_title ) ) $this->article_title = $article_title;
        if( isset( $category_name ) ) $this->category_name = $category_name;

    }

}
