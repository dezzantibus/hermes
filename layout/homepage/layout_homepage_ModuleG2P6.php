<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 10/06/2015
 * Time: 14:58
 */

class layout_homepage_ModuleG2P6 extends layout
{

    /** @var  data_category */
    private $list;

    function __construct( data_category $list )
    {

        $this->list = $list;

        /** @TODO delete this filler */
        $this->list->home_articles = new data_array();

        $this->list->home_articles->add( new data_article() );
        $this->list->home_articles->add( new data_article() );
        $this->list->home_articles->add( new data_article() );
        $this->list->home_articles->add( new data_article() );
        $this->list->home_articles->add( new data_article() );
        $this->list->home_articles->add( new data_article() );
        $this->list->home_articles->add( new data_article() );
        $this->list->home_articles->add( new data_article() );

    }

    public function render()
    {

        echo
        '<div class="block-layout-two row">',
            '<p class="title"><span><strong>', $this->list->name, '</strong></span></p>',
            '<div class="grid_6">';

                $this->large( $this->list->home_articles->getIndex( 0 ) );

                $this->small( $this->list->home_articles->getIndex( 2 ) );
                $this->small( $this->list->home_articles->getIndex( 3 ) );
                $this->small( $this->list->home_articles->getIndex( 4 ) );

            echo
            '</div>',
            '<div class="grid_6">';

                $this->large( $this->list->home_articles->getIndex( 1 ) );

                $this->small( $this->list->home_articles->getIndex( 5 ) );
                $this->small( $this->list->home_articles->getIndex( 6 ) );
                $this->small( $this->list->home_articles->getIndex( 7 ) );

            echo
            '</div>',
        '</div>';

    }

    private function large( data_article $article )
    {

        echo
        '<div class="main-item">',
            '<div class="post-img">',
                '<a href="#"><img src="demo/422x260.gif" alt="Post"/></a>',
                '<span><a href="#">Fashion</a></span>',
            '</div>',
            '<h3><a href="#">The Homesman rides, The Expendables assemble</a></h3>',
            '<div class="post-dca">',
                '<span class="date">June 8, 2014</span>',
                '<span class="comments"><a href="#">23 Comments</a></span>',
                '<span class="author"><a href="#">John Doe</a></span>',
                '<ul class="rating-list">',
                    '<li>',
                        '<div class="rating-stars" title="Rating: 4.5">',
                            '<span style="width: 90%"></span>',
                        '</div>',
                    '</li>',
                '</ul>',
            '</div>',
            '<p>Adipisicing nam cras consequat ipsum. Donec excepteur aptent incididunt class. Congue natoque varius bibendum primis. Maecenas fermentum integer eleifend feugiat nisi. Ac nostrud porta …</p>',
        '</div>';

    }

    private function small( data_article $article )
    {

        echo
        '<div class="item">',
            '<a href="#"><img src="demo/80x65.gif" alt="Post"/></a>',
            '<div>',
                '<h3><a href="#">Thinking of buying dungarees? Just don\'t expect them to transform you into Alexa Chung</a></h3>',
                '<p class="date">December 13, 2014</p>',
            '</div>',
        '</div>';

    }

}