<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 10/06/2015
 * Time: 14:58
 */

class layout_homepage_ModuleG1P4 extends layout
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
        '<div class="block-layout-five">',
            '<p class="title" style="color:', $this->list->colour, '"><span><strong>', $this->list->name, '</strong></span></p>';

            $article = $this->list->home_articles->first();

            echo
            '<div class="main-item">',
                '<div class="post-img">',
                    '<a href="', $article->getLink(), '"><img src="', empty( $article->image_1 ) ? 'demo/350x250.gif' : '/350/250' . $article->image_1, '" alt="Post"/></a>',
                '</div>',
                '<div class="post-meta">',
                    '<h3><a href="', $article->getLink(), '">', $article->title, '</a></h3>',
                    '<div class="post-dca">',
                        '<span class="date">', data_article::dateForDisplay( $article->created ), '</span>';
//                        '<span class="comments"><a href="', $article->getLink(), '">23 Comments</a></span>',
                        if( $article->journalist_id > 0 )
                        {
                            echo '<span class="author"><a href="', $article->getLink(), '">', $article->journalist->display_name, '</a></span>';
                        }
//                        '<ul class="rating-list">',
//                            '<li>',
//                                '<div class="rating-stars" title="Rating: 4.5">',
//                                    '<span style="width: 90%"></span>',
//                                '</div>',
//                            '</li>',
//                        '</ul>',
                        echo
                        '</div>',
                    '<p>', empty( $article->brief ) ? substr( $article->text, 0, 350 ) . '...' : $article->brief, '</p>',
                '</div>',
            '</div>';



        echo
        '</div>';


        echo
        '<div class="block-layout-two row">',
            '<div class="grid_6">';

                $this->small( $this->list->home_articles->getIndex( 0 ) );
                $this->small( $this->list->home_articles->getIndex( 1 ) );

            echo
            '</div>',
            '<div class="grid_6">';

                $this->small( $this->list->home_articles->getIndex( 2 ) );
                $this->small( $this->list->home_articles->getIndex( 3 ) );

            echo
            '</div>',
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