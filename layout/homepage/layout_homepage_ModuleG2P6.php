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
    }

    public function render()
    {

        echo
        '<div class="block-layout-two row ', $this->list->routing, '">',
            '<p class="title" style="color:', $this->list->colour, '"><span><strong>', $this->list->name, '</strong></span></p>',
            '<div class="grid_6 column-1">';

                $this->large( $this->list->home_articles->getIndex( 0 ) );

                $this->small( $this->list->home_articles->getIndex( 2 ) );
                $this->small( $this->list->home_articles->getIndex( 3 ) );
                $this->small( $this->list->home_articles->getIndex( 4 ) );

            echo
            '</div>',
            '<div class="grid_6 column-2">';

                $this->large( $this->list->home_articles->getIndex( 1 ) );

                $this->small( $this->list->home_articles->getIndex( 5 ) );
                $this->small( $this->list->home_articles->getIndex( 6 ) );
                $this->small( $this->list->home_articles->getIndex( 7 ) );

            echo
            '</div>',
        '</div>',

        '<script type="text/javascript">',
            '$( document ).ready(function() {',

                'var one = $(".', $this->list->routing, ' .column-1 .main-item p");',
                'var two = $(".', $this->list->routing, ' .column-2 .main-item p");',
                'if(  one.height() > two.height() )',
                    '{two.height( one.height() );}',
                'else',
                    '{one.height( two.height() );}',

                'one = $(".', $this->list->routing, ' .column-1 .main-item h3");',
                'two = $(".', $this->list->routing, ' .column-2 .main-item h3");',
                'if(  one.height() > two.height() )',
                    '{two.height( one.height() );}',
                'else',
                    '{one.height( two.height() );}',

            '});',
        '</script>';


    }

    private function large( data_article $article )
    {

        echo
        '<div class="main-item">',
            '<div class="post-img">',
                '<a href="', $article->getLink(), '"><img src="', empty( $article->image_1 ) ? 'demo/422x260.gif' : '/422/260' . $article->image_1, '" alt="Post"/></a>',
//                '<span><a href="#">Fashion</a></span>',
            '</div>',
            '<h3><a href="', $article->getLink(), '">', $article->title, '</a></h3>',
            '<div class="post-dca">',
                '<span class="date">', data_article::dateForDisplay( $article->created ), '</span>',
//                '<span class="comments"><a href="#">23 Comments</a></span>',
                '<span class="author"><a href="#">', $article->journalist->display_name, '</a></span>',
//                '<ul class="rating-list">',
//                    '<li>',
//                        '<div class="rating-stars" title="Rating: 4.5">',
//                            '<span style="width: 90%"></span>',
//                        '</div>',
//                    '</li>',
//                '</ul>',
            '</div>',
            '<p>', empty( $article->brief ) ? substr( $article->text, 0, 350 ) . '...' : $article->brief, '</p>',
        '</div>';

    }

    private function small( data_article $article )
    {

        echo
        '<div class="item">',
            '<a href="', $article->getLink(), '"><img src="', empty( $article->image_1 ) ? 'demo/80x65.gif' : '/80/65' . $article->image_1, '" alt="Post"/></a>',
            '<div>',
                '<h3><a href="', $article->getLink(), '">', $article->title, '</a></h3>',
                '<p class="date">', data_article::dateForDisplay( $article->created ), '</p>',
            '</div>',
        '</div>';

    }

}