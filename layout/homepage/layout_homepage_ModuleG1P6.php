<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 10/06/2015
 * Time: 14:58
 */

class layout_homepage_ModuleG1P6 extends layout
{

    /** @var  data_category */
    private $list;

    function __construct( data_category $list )
    {
        $this->list = $list;
    }

    public function render()
    {

        /** @var $main data_article */
        $main = $this->list->home_articles->first();

        echo
        '<div class="block-layout-three row">',
            '<div class="grid_12">',
                '<p class="title" style="color:', $this->list->colour, '"><span><strong>', $this->list->name, '</strong></span></p>',
                '<div class="main-item">',
                    '<div class="post-img">',
                        '<a href="', $main->getLink(), '"><img src="', empty($main->image_1) ? '/demo/422x260.gif' : '/422/260' . $main->image_1, '" alt="Post"/></a>',
//                        '<span><a href="#">Travel</a></span>',
                    '</div>',
                    '<h3><a href="', $main->getLink(), '">', $main->title, '</a></h3>',
                    '<div class="post-dca">',
                        '<span class="date">', data_article::dateForDisplay( $main->created ), '</span>',
//                        '<span class="comments"><a href="#">23 Comments</a></span>',
//                        '<ul class="rating-list">',
//                            '<li>',
//                                '<div class="rating-stars" title="Rating: 4.5">',
//                                    '<span style="width: 90%"></span>',
//                                '</div>',
//                            '</li>',
//                        '</ul>',
                    '</div>',
                    '<p>', empty( $main->brief ) ? substr( $main->text, 0, 400 ) . '...' : $main->brief, '</p>',
                '</div>',
                '<div class="small-items">';

                    /** @var $article data_article  */
                    foreach( $this->list->home_articles->getData() as $article )
                    {
                        echo
                        '<div class="item">',
                            '<a href="', $article->getLink(), '"><img src="', empty( $article->image_1 ) ? '/demo/80x65.gif' : '/80/65' . $article->image_1, '" alt="Post"/></a>',
                            '<div>',
                                '<h3><a href="', $article->getLink(), '">', $article->title, '</a></h3>',
                                '<p class="date">', data_article::dateForDisplay( $article->created ), '</p>',
                            '</div>',
                        '</div>';
                    }

                echo
                '</div>',
            '</div>',
        '</div>';

    }

}