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

    function __construct( data_article $article )
    {
        $this->article = $article;
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

//            '<div class="post-meta">',
//                '<span class="author">Author <a href="#">John Doe</a></span>',
//                '<span class="date">Published <a href="#">December 13, 2014</a></span>',
//                '<span class="comments">Comments <a href="#">152</a></span>',
//            '</div>',

            '<div class="post-container"><p>', str_replace( chr(13).chr(10), '</p><p>', $this->article->text ), '</p></div>',


            //<!-- Post info -->
//            '<div class="post-info">',
//                '<span class="tags">Tags <a href="#">Design</a>, <a href="#">Code</a>, <a href="#">Html5</a></span>',
//                '<span class="category">Category <a href="#">Sport</a></span>',
//                '<span class="views">Views <a href="#">3526</a></span>',
//            '</div>',

            '<div class="post-share">',
                '<span class="share-text">Share this post:</span>',
                '<ul>',
                    '<li><a data-tip="Share on Twitter!" href="#" class="twitter"><span class="socicon">a</span></a><p>16</p></li>',
                    '<li><a data-tip="Share on Facebook!" href="#" class="facebook"><span class="socicon">b</span></a><p>16</p></li>',
                    '<li><a data-tip="Share on Google+!" href="#" class="google"><span class="socicon">c</span></a><p>16</p></li>',
                    '<li><a data-tip="Share on Pinterest!" href="#" class="google"><span class="socicon">d</span></a><p>16</p></li>',
                    '<li><a data-tip="Share on LinkedIn!" href="#" class="linkedin"><span class="socicon">j</span></a><p>16</p></li>',
                    '<li><a data-tip="Share on Tumblr!" href="#" class="tumblr"><span class="socicon">z</span></a><p>16</p></li>',
                '</ul>',
            '</div>',

        '</article>';

    }

}