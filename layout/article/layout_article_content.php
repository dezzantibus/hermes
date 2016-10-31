<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 15/06/2015
 * Time: 14:02
 */


class layout_article_content extends layout
{

    private $article;

    private $full_link;

    function __construct( data_article $article )
    {
        $this->article = $article;

        $this->full_link = 'http://' . $_SERVER['HTTP_HOST'] . $this->article->getLink();

    }

    public function render()
    {
        echo
        '<article class="single-post">';

            if( !empty( $this->article->image_1 ) )
            {
                echo
                '<div class="featured">',
//                    '<a href="#">
                        '<img src="/860/450', $this->article->image_1, '" alt="Post"/>',
//                    '</a>',
                '</div>';

            }

            echo
            '<h1 class="post-title">', $this->article->title, '</h1>',
            '<h3 class="lead">', $this->article->subtitle, '</h3>',

            '<div class="post-meta">',
//                '<span class="author">Author <a href="#">John Doe</a></span>',
                '<span class="date">', constant::$text['published'], ' <a href="#">', $this->article->dateForDisplay( $this->article->created ), '</a></span>',
//                '<span class="comments">Comments <a href="#">152</a></span>',
            '</div>',

            '<div class="post-container"><p>', str_replace( chr(13).chr(10), '</p><p>', $this->article->text ), '</p></div>',


            //<!-- Post info -->
//            '<div class="post-info">',
//                '<span class="tags">Tags <a href="#">Design</a>, <a href="#">Code</a>, <a href="#">Html5</a></span>',
//                '<span class="category">Category <a href="#">Sport</a></span>',
//                '<span class="views">Views <a href="#">3526</a></span>',
//            '</div>',

            '<div class="post-share">',
                '<span class="share-text">', constant::$text['share_post'], ':</span>',
                '<ul>',
                    '<li><a target="_blank"  data-tip="Share on Twitter!" href="https://twitter.com/home?status=', $this->full_link, '" class="twitter"><span class="socicon">a</span></a></li>',
                    '<li><a target="_blank" data-tip="Share on Facebook!" href="https://www.facebook.com/sharer/sharer.php?u=', $this->full_link, '" class="facebook"><span class="socicon">b</span></a></li>',
                    '<li><a target="_blank" data-tip="Share on Google+!" href="https://plus.google.com/share?url=', $this->full_link, '" class="google"><span class="socicon">c</span></a></li>',
                    '<li><a target="_blank" data-tip="Share on Pinterest!" href="http://pinterest.com/pin/create/button/?url=', urlencode( $this->full_link ), '&media=', urlencode( 'http://' . $_SERVER['HTTP_HOST'] . '/upload' . $this->article->image_1 ), '" class="google"><span class="socicon">d</span></a></li>',
                    '<li><a data-tip="Share on LinkedIn!" href="http://www.linkedin.com/shareArticle?mini=true&url=', $this->full_link, '&title=', urlencode( $this->article->title ),'" class="linkedin"><span class="socicon">j</span></a></li>',
//                    '<li><a data-tip="Share on Tumblr!" href="#" class="tumblr"><span class="socicon">z</span></a><p>16</p></li>',
                '</ul>',
            '</div>',

        '</article>';

        $banner = banner::getForPosition( banner::ARTICLE, $this->article->category_id );

        banner::outputBanner( $banner );

    }

}