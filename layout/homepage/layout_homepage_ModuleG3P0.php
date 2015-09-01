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
        '<div class="block-layout-four row" id="', $this->list->routing, '">',
            '<p class="title" style="color:', $this->list->colour, '"><span><strong>', $this->list->name, '</strong></span></p>';

            foreach( $this->list->home_articles->getData() as $index => $article )
            {

                echo
                '<div class="grid_4" id="', $this->list->routing, $index, '">',
                    '<div class="main-item">',
                        '<div class="post-img">',
                            '<a href="', $article->getLink(), '"><img src="', empty( $article->image_1 ) ? 'demo/276x200.gif' : '/276/200' . $article->image_1, '" alt="Post"/></a>';

                            if( $article->journalist_id > 0 )
                            {
                                echo'<span><a href="#">', $article->journalist->display_name, '</a></span>';
                            }

                        echo
                        '</div>',
                        '<h3><a href="', $article->getLink(), '">', $article->title, '</a></h3>',
                        '<p class="date">', data_article::dateForDisplay( $article->created ), '</p>',
                    '</div>',
                    '<p>', empty( $article->brief ) ? substr( $article->text, 0, 300 ) . '...' : $article->brief, '</p>',
                '</div>';

            }

        echo '</div>',

        '<script type="text/javascript">',
            '$( document ).ready(function() {',

                'var maxHeight = $("#', $this->list->routing, '0 .h3").height();',
                'if( $("#', $this->list->routing, '1 h3").height() > maxHeight ) maxHeight = $("#', $this->list->routing, '1 h3").height();',
                'if( $("#', $this->list->routing, '2 h3").height() > maxHeight ) maxHeight = $("#', $this->list->routing, '2 h3").height();',
                '$("#', $this->list->routing, ' h3").height( maxHeight )',

            '});',
        '</script>';


    }

}