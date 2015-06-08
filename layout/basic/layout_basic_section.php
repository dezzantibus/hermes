<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 08/06/2015
 * Time: 10:30
 */


class layout_basic_section extends layout
{

    private $id;

    private $class;

    function __construct( $id=null, $class=null )
    {

        $this->id    = $id;
        $this->class = $class;

    }

    protected function renderTop()
    {
        echo '<section id="', $this->id, '" class="', $this->class, '">';
    }

    protected function renderBottom()
    {
        echo '</section>';
    }

}