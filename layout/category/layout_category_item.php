<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 16:29
 */

class layout_category_item extends layout
{

    function __construct()
    {

    }

    public function render()
    {

        // this will check if there is an image
        // instead of being random as it is now
        if( rand( 0, 1 ) )
        {
            $this->withImage();
        }
        else
        {
            $this->withoutImage();
        }

    }

    private function withoutImage()
    {

        echo
        '<div class="main-item no-image">',
            '<div class="post-meta">',
                '<h3><a href="#">This post has no image, and has class .no-image</a></h3>',
                '<div class="post-dca">',
                    '<span class="date">June 8, 2014</span>',
                    '<span class="comments"><a href="#">23 Comments</a></span>',
                    '<span class="author"><a href="#">John Doe</a></span>',
                    '<ul class="rating-list">',
                        '<li>',
                            '<div class="rating-stars" title="Rating: 4.5">',
                                '<span style="width: 90%"></span>',
                            '</div>',
                        '</li>',
                   '</ul>',
                '</div>',
                '<p>Donec nibh urna, mattis nec lacinia egestas, volutpat quis risus. Morbi sagittis blandit cursus. Morbi in velit dui. Suspendisse aliquam porttitor tortor at tempus. Ut gravida, eros a porttitor ornare, quam mauris dignissim nisl, ac eleifend metus erat dignissim felis. Donec nibh urna, mattis nec lacinia egestas, volutpat quis risus [...]</p>',
            '</div>',
        '</div>';

    }

    private function withImage()
    {

        echo
        '<div class="main-item">',
            '<div class="post-img">',
                '<a href="#"><img src="demo/350x250.gif" alt="Post"/></a>',
            '</div>',
            '<div class="post-meta">',
                '<h3><a href="#">Travel news roundup: Wales, eco-luxury in the Galapagos</a></h3>',
                '<div class="post-dca">',
                    '<span class="date">June 8, 2014</span>',
                    '<span class="comments"><a href="#">23 Comments</a></span>',
                    '<span class="author"><a href="#">John Doe</a></span>',
                    '<ul class="rating-list">',
                        '<li>',
                            '<div class="rating-stars" title="Rating: 4.5">',
                                '<span style="width: 90%"></span>',
                            '</div>',
                        '</li>',
                    '</ul>',
                '</div>',
                '<p>Donec nibh urna, mattis nec lacinia egestas, volutpat quis risus. Morbi sagittis blandit cursus. Morbi in velit dui. Suspendisse aliquam porttitor tortor at tempus. Ut gravida, eros a porttitor ornare, quam mauris dignissim nisl, ac eleifend metus erat dignissim felis. Donec nibh urna, mattis nec lacinia egestas, volutpat quis risus [...]</p>',
            '</div>',
        '</div>';

    }

}