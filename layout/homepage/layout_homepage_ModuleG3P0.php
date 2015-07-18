<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 10/06/2015
 * Time: 14:58
 */

class layout_homepage_ModuleG3P0 extends layout
{

    /** @var  data_array */
    private $list;

    function __construct( data_array $list )
    {

        $this->list = $list;

        /** @TODO delete this filler */
        $this->list = new data_array();

        $this->list->add( 'filler' );
        $this->list->add( 'filler' );
        $this->list->add( 'filler' );

    }

    public function render()
    {

        echo
        '<div class="block-layout-four row">',
            '<p class="title"><span>Week <strong>reviews</strong></span></p>';

            foreach( $this->list->getData() as $article )
            {

                echo
                '<div class="grid_4">',
                    '<div class="main-item">',
                        '<div class="post-img">',
                            '<a href="#"><img src="demo/276x200.gif" alt="Post"/></a>',
                            '<span><a href="#">Money</a></span>',
                        '</div>',
                        '<h3><a href="#">Can you afford a £1,000 bill for your child\'s prom?</a></h3>',
                        '<p class="date">December 13, 2014</p>',
                    '</div>',
                    '<ul class="rating-list">',
                        '<li>',
                            '<p>Look</p>',
                            '<div class="rating-stars" title="Rating: 5.0">',
                                '<span style="width: 100%"></span>',
                            '</div>',
                        '</li>',
                        '<li>',
                            '<p>Availability</p>',
                            '<div class="rating-stars" title="Rating: 4.0">',
                                '<span style="width: 80%"></span>',
                            '</div>',
                        '</li>',
                        '<li>',
                            '<p>People</p>',
                            '<div class="rating-stars" title="Rating: 2.5">',
                                '<span style="width: 50%"></span>',
                            '</div>',
                        '</li>',
                        '<li>',
                            '<p>Price</p>',
                            '<div class="rating-stars" title="Rating: 4.5">',
                                '<span style="width: 90%"></span>',
                            '</div>',
                        '</li>',
                    '</ul>',
                '</div>';

            }

        echo '</div>';

    }

}