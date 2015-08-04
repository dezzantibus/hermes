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
                            '<a href="', $article->getLink(), '"><img src="demo/276x200.gif" alt="Post"/></a>',
                            //'<span><a href="#">Money</a></span>',
                        '</div>',
                        '<h3><a href="', $article->getLink(), '">', $article->title, '</a></h3>',
                        '<p class="date">', data_article::dateForDisplay( $article->created ), '</p>',
                    '</div>',
                    '<p>', $article->brief, '</p>',
                '</div>';

            }

        echo '</div>';

    }

}