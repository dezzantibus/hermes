<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 08/06/2015
 * Time: 10:30
 */


class layout_basic_section extends layout
{

    private $params;

    function __construct( $params=array() )
    {

        $this->params = $params;

    }

    protected function renderTop()
    {

        echo '<section';

        foreach( $this->params as $label => $value )
        {

            echo ' ', $label, '="', $value, '"';

        }

        echo '>';

    }

    protected function renderBottom()
    {
        echo '</section>';
    }

}