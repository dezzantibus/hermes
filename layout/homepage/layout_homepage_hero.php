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

                        /** @var $article data_article */
                        foreach( $this->large->getData() as $article )
                        {
                            echo
                            '<li>',
                                '<img src="demo/785x500.gif" alt="Image" />',
                                '<div class="post-box-text">',
                                    '<span><a href="', $article->getLink(), '">', $article->category->name, '</a></span>',
                                    '<h3><a href="', $article->getLink(), '">', $article->title, '</a></h3>',
                                    '<p>', data_article::dateForDisplay( $article->created ), '</p>',
                                '</div>',
                            '</li>';

                        }


                    echo
                    '</ul>',
                '</div>',

                //<!-- Block with 2 posts -->
                '<div class="block-with-two-posts">';

                    /** @var $article data_article */
                    foreach( $this->small->getData() as $article )
                    {
                        echo
                        '<div class="post-block">',
                            '<a href="', $article->getLink(), '"><img src="/390/250/filler.jpg" alt="Post"/></a>',
                            '<div class="post-box-text">',
                                '<span><a href="', $article->getLink(), '">', $article->category->name, '</a></span>',
                                '<h3><a href="', $article->getLink(), '">', $article->title, '</a></h3>',
                                '<p>', data_article::dateForDisplay( $article->created ), '</p>',
                            '</div>',
                        '</div>';
                    }

                echo
                '</div>',

            '</div>',
        '</div>';

    }

}