<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 16:40
 */

class layout_category_pagination extends layout
{

    private $number;

    private $current;

    function __construct($number, $current)
    {
        $this->number  = $number;
        $this->current = $current;
    }

    public function render()
    {

        echo '<ul class="page-numbers">';

            if( $this->current > 1 )
            {
                echo '<li><a class="page-numbers" href="#">M&euml;parsh&euml;m</a></li>';
            }

            for( $page=1; $page<=$this->number; $page++ )
            {

                if( $page == $this->current )
                {
                    echo '<li><span class="page-numbers current">', $page, '</span></li>';
                }
                else
                {
                    echo '<li><a class="page-numbers" href="#">', $page, '</a></li>';
                }

            }

            if( $this->current != $this->number )
            {
                echo '<li><a class="page-numbers" href="#">Vijues</a></li>';
            }

        echo '</ul>';

    }

}