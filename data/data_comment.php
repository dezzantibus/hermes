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

    public $user_id;

    public $article_id;

    public $nick;

    public $text;

    public $created;

    function __construct( $data=null )
    {

        if( isset( $data ) )
        {
            if( isset( $data['id'] ) )         $this->id         = $data['id'];
            if( isset( $data['user_id'] ) )    $this->user_id    = $data['user_id'];
            if( isset( $data['article_id'] ) ) $this->article_id = $data['article_id'];
            if( isset( $data['nick'] ) )       $this->nick       = $data['nick'];
            if( isset( $data['text'] ) )       $this->text       = $data['text'];
            if( isset( $data['created'] ) )    $this->created    = $data['created'];
        }

    }

}
