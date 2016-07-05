<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 16:29
 */

class layout_category_item extends layout
{

    private $article;

    private $banner;

    function __construct( data_article $article, $banner=false )
    {
        $this->article = $article;
        $this->banner  = $banner;
    }

    public function render()
    {

        if( $this->banner )
        {
            $banner = banner::getForPosition( $this->banner, $this->article->category_id );
            if( !is_null( $banner ) )
            {
                echo '<div class="main-item no-image">';
                banner::outputBanner( $banner );
                echo '</div>';
            }
        }

        // this will check if there is an image
        // instead of being random as it is now
        if( empty( $this->article->image_1 ) )
        {
            $this->withoutImage();
        }
        else
        {
            $this->withImage();
        }

    }

    private function withoutImage()
    {

        echo
        '<div class="main-item no-image">',
            '<div class="post-meta">',
                '<h3><a href="', $this->article->getLink(), '">', $this->article->title, '</a></h3>',
                '<div class="post-dca">',
                    '<span class="date">', data_article::dateForDisplay( $this->article->created ), '</span>';
//                    '<span class="comments"><a href="', $this->article->getLink(), '">23 Comments</a></span>',

                    if( $this->article->journalist_id > 0 )
                    {
                        echo '<span class="author"><a href="', $this->article->getLink(), '">', $this->article->journalist->display_name, '</a></span>';
                    }

//                    '<ul class="rating-list">',
//                        '<li>',
//                            '<div class="rating-stars" title="Rating: 4.5">',
//                                '<span style="width: 90%"></span>',
//                            '</div>',
//                        '</li>',
//                   '</ul>',
                echo
                '</div>',
                '<p>', empty( $this->article->brief ) ? substr( strip_tags( $this->article->text ), 0, 300 ) . '...' : $this->article->brief, '</p>',
            '</div>',
        '</div>';

    }

    private function withImage()
    {

        echo
        '<div class="main-item">',
            '<div class="post-img">',
                '<a href="', $this->article->getLink(), '"><img src="/350/250', $this->article->image_1, '" alt="Post"/></a>',
            '</div>',
            '<div class="post-meta">',
                '<h3><a href="', $this->article->getLink(), '">', $this->article->title, '</a></h3>',
                '<div class="post-dca">',
                    '<span class="date">', data_article::dateForDisplay( $this->article->created ), '</span>';
//                    '<span class="comments"><a href="', $this->article->getLink(), '">23 Comments</a></span>',

                    if( $this->article->journalist_id > 0 )
                    {
                        echo '<span class="author"><a href="', $this->article->getLink(), '">', $this->article->journalist->display_name, '</a></span>';
                    }
//                    '<ul class="rating-list">',
//                        '<li>',
//                            '<div class="rating-stars" title="Rating: 4.5">',
//                                '<span style="width: 90%"></span>',
//                            '</div>',
//                        '</li>',
//                    '</ul>',
                echo
                '</div>',
                '<p>', empty( $this->article->brief ) ? substr( strip_tags( $this->article->text ), 0, 300 ) . '...' : $this->article->brief, '</p>',
            '</div>',
        '</div>';

    }

}