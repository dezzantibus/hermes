<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 15/06/2015
 * Time: 14:02
 */


class layout_article_related extends layout
{

    private $related;

    function __construct( data_array $related )
    {
        $this->related = $related;
    }

    public function render()
    {

        if( $this->related->isEmpty() )
        {
            return;
        }

        echo
        '<div class="block-layout-one">',
            '<p class="title"><span>Lajme t&euml; ngjashme <strong></strong></span></p>',
            '<div class="row">';

                $counter = 0;

                /** var $item data_article */
                foreach( $this->related->getData() as $item )
                {

                    if( !( $counter % 3 ) && $counter > 0 )
                    {
                        echo
                        '</div>',
                        '<div class="row">';
                    }

                    echo
                    '<div class="item grid_4">',
                        '<a href="#"><img src="demo/80x65.gif" /></a>',
                        '<div>',
                            '<span><a href="#">Sport</a></span>',
                            '<h3><a href="#">Wenger: FA Cup is my most important trophy</a></h3>',
                            '<p class="date">December 13, 2014</p>',
                        '</div>',
                    '</div>';

                    $counter++;

                }

            echo
            '</div>',
        '</div>';

    }

}