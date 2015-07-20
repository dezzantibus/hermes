<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 08/06/2015
 * Time: 10:16
 */

class layout_homepage_hero extends layout
{

    private $large;

    private $small;

    function __construct( data_array $list )
    {

        $this->large = $list;

        $this->large = new data_array();
        $this->large->add( 'filler' );
        $this->large->add( 'filler' );
        $this->large->add( 'filler' );
        $this->large->add( 'filler' );
        $this->large->add( 'filler' );
        $this->large->add( 'filler' );

        $this->small = new data_array();
        $this->small->add( $this->large->last() );
        $this->small->add( $this->large->last() );

    }


    public function render()
    {

        echo
        //<!-- Above the fold -->
        '<div id="above-the-fold" class="above-the-fold light">',
            '<div class="inner-wrapper">',

                //<!-- Flexslider -->
                '<div class="flexslider">',
                    '<ul class="slides">';

                        foreach( $this->large->getData() as $article )
                        {
                            echo
                            '<li>',
                                '<img src="demo/785x505.gif" alt="Image" />',
                                '<div class="post-box-text">',
                                    '<span><a href="#">Culture</a></span>',
                                    '<h3><a href="#">Amazon and Snapchat rank low for protecting user data from government</a></h3>',
                                    '<p>July 18, 2014</p>',
                                '</div>',
                            '</li>';

                        }


                    echo
                    '</ul>',
                '</div>',

                //<!-- Block with 2 posts -->
                '<div class="block-with-two-posts">';

                    foreach( $this->small->getData() as $article )
                    {
                        echo
                        '<div class="post-block">',
                            '<a href="#"><img src="/390/250/filler.jpg" alt="Post"/></a>',
                            '<div class="post-box-text">',
                                '<span><a href="#">Culture</a></span>',
                                '<h3><a href="#">Britain\'s Got Talent: will Piers Morgan return to replace David Walliams?</a></h3>',
                                '<p>December 9, 2014</p>',
                            '</div>',
                        '</div>';
                    }

                echo
                '</div>',

            '</div>',
        '</div>';

    }

}