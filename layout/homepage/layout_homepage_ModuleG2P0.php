<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 10/06/2015
 * Time: 14:58
 */

class layout_homepage_ModuleG2P0 extends layout
{

    /** @var  data_category */
    private $list;

    /** @var  data_banner */
    private $banner;

    function __construct( data_category $list )
    {

        $this->list = $list;

        $this->banner = banner::getForPosition( banner::HOMEPAGE, $list->id );

    }

    public function render()
    {

        banner::outputBanner( $this->banner, false );

        echo
        '<div class="block-layout-five">',
            '<p class="title" style="color:', $this->list->colour, '"><span><strong>', $this->list->name, '</strong></span></p>';

            foreach( $this->list->home_articles->getData() as $article )
            {

                echo
                '<div class="main-item">',
                    '<div class="post-img">',
                        '<a href="', $article->getLink(), '"><img src="', empty( $article->image_1 ) ? 'demo/350x250.gif' : '/350/250' . $article->image_1, '" alt="Post"/></a>',
                    '</div>',
                    '<div class="post-meta">',
                        '<h3><a href="', $article->getLink(), '">', $article->title, '</a></h3>',
                        '<div class="post-dca">',

                            '<span class="date">', data_article::dateForDisplay( $article->created ), '</span>';

//                            '<span class="comments"><a href="', $article->getLink(), '">23 Comments</a></span>',
                            if( $article->journalist_id > 0 )
                            {
                                echo '<span class="author"><a href="', $article->getLink(), '">', $article->journalist->display_name, '</a></span>';
                            }

                            echo
//                            '<ul class="rating-list">',
//                                '<li>',
//                                    '<div class="rating-stars" title="Rating: 4.5">',
//                                        '<span style="width: 90%"></span>',
//                                    '</div>',
//                                '</li>',
//                            '</ul>',
                        '</div>',
                        '<p>', empty( $article->brief ) ? substr( $article->text, 0, 350 ) . '...' : $article->brief, '</p>',
                    '</div>',
                '</div>';

            }

        echo
        '</div>';

    }

}