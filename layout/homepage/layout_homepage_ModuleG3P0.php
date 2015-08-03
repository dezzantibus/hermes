<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 10/06/2015
 * Time: 14:58
 */

class layout_homepage_ModuleG3P0 extends layout
{

    /** @var  data_category */
    private $list;

    function __construct( data_category $list )
    {

        $this->list = $list;

        /** @TODO delete this filler */
        $this->list->home_articles = new data_array();

        $this->list->home_articles->add( 'filler' );
        $this->list->home_articles->add( 'filler' );
        $this->list->home_articles->add( 'filler' );

    }

    public function render()
    {

        echo
        '<div class="block-layout-four row">',
            '<p class="title" style="color:', $this->list->colour, '"><span><strong>', $this->list->name, '</strong></span></p>';

            foreach( $this->list->home_articles->getData() as $article )
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
                    '<p>Donec nibh urna, mattis nec lacinia egestas, volutpat quis risus. Morbi sagittis blandit cursus. Morbi in velit dui. Suspendisse aliquam porttitor tortor at tempus. Ut gravida, eros a porttitor ornare, quam mauris dignissim nisl, ac eleifend metus erat dignissim felis. Donec nibh urna, mattis nec lacinia egestas, volutpat quis risus</p>',
                '</div>';

            }

        echo '</div>';

    }

}