<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 08/06/2015
 * Time: 10:30
 */


class layout_basic_button_link extends layout
{

    private $params;

    private $text;

    function __construct( $text, $params=array() )
    {

        $this->params = $params;

        $this->text = $text;

    }

    public function render()
    {

        echo '<a ';

        $class = false;
        foreach( $this->params as $label => $value )
        {

            if( $label == 'class' )
            {
                echo ' ', $label, '="btn btn-large ', $value, '"';
                $class = true;
            }
            else
            {
                echo ' ', $label, '="', $value, '"';
            }

        }

        if( !$class )
        {
            echo ' class="btn btn-large"';
        }

        echo '>', $this->text, '</a>';

    }

}
