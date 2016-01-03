<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 16/06/2015
 * Time: 09:18
 */

class data_banner extends data
{

    public $id;

    public $position_id;

    public $category_id;

    public $name;

    public $date_from;

    public $date_to;

    public $file;

    public $link;

    public $active;

    public $views;

    function __construct( $data=null )
    {

        if( !empty( $data ) )
        {
            if( isset( $data['id'] ) )          $this->id          = $data['id'];
            if( isset( $data['position_id'] ) ) $this->position_id = $data['position_id'];
            if( isset( $data['category_id'] ) ) $this->category_id = $data['category_id'];
            if( isset( $data['name'] ) )        $this->name        = $data['name'];
            if( isset( $data['date_from'] ) )   $this->date_from   = $data['date_from'];
            if( isset( $data['date_to'] ) )     $this->date_to     = $data['date_to'];
            if( isset( $data['file'] ) )        $this->file        = $data['file'];
            if( isset( $data['link'] ) )        $this->link        = $data['link'];
            if( isset( $data['active'] ) )      $this->active      = $data['active'];
            if( isset( $data['views'] ) )       $this->views       = $data['views'];
        }

    }

}