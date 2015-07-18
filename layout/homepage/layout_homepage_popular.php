<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 10/06/2015
 * Time: 14:54
 */

class layout_homepage_popular extends layout
{

    /** @var  $list data_array */
    private $list;

    function __construct( data_array $list )
    {

        $this->list = $list;

        /** @TODO delete this filler */
        $this->list = new data_array();

        $this->list->add( new data_article );
        $this->list->add( new data_article );
        $this->list->add( new data_article );
        $this->list->add( new data_article );
        $this->list->add( new data_article );
        $this->list->add( new data_article );

    }

    public function render()
    {
        echo
        '<div class="block-layout-one">',
            '<p class="title"><span>Popular <strong>posts</strong></span></p>',
            '<div class="row">';

                $this->element( $this->list->getIndex( 0 ) );
                $this->element( $this->list->getIndex( 1 ) );
                $this->element( $this->list->getIndex( 2 ) );

            echo
            '</div>',
            '<div class="row">';

                $this->element( $this->list->getIndex( 3 ) );
                $this->element( $this->list->getIndex( 4 ) );
                $this->element( $this->list->getIndex( 5 ) );

            echo
            '</div>',
        '</div>';

    }

    private function element( data_article $article )
    {

        echo
        '<div class="item grid_4">',
            '<a href="#"><img src="/80/65/filler.jpg" /></a>',
            '<div>',
                '<span><a href="#">Sport</a></span>',
                '<h3><a href="#">Wenger: FA Cup is my most important trophy</a></h3>',
                '<p class="date">December 13, 2014</p>',
            '</div>',
        '</div>';

    }

}