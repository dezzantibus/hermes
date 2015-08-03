<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 16/06/2015
 * Time: 09:28
 */

class data_category extends data
{

    public $id;

    public $parent_id;

    public $name;

    public $routing;

    public $order;

    public $home_order;

    public $home_block;

    public $home_articles;

    public $colour;

    function __construct( $data=null )
    {

        if( isset( $data ) )
        {
            if( isset( $data['id'] ) )          $this->id         = $data['id'];
            if( isset( $data['parent_id'] ) )   $this->parent_id  = $data['parent_id'];
            if( isset( $data['name'] ) )        $this->name       = $data['name'];
            if( isset( $data['routing'] ) )     $this->routing    = $data['routing'];
            if( isset( $data['order'] ) )       $this->order      = $data['order'];
            if( isset( $data['home_order'] ) )  $this->home_order = $data['home_order'];
            if( isset( $data['home_block'] ) )  $this->home_block = $data['home_block'];
            if( isset( $data['colour'] ) )      $this->colour     = $data['colour'];
        }

    }

}