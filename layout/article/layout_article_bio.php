<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 15/06/2015
 * Time: 14:02
 */


class layout_article_bio extends layout
{

    private $journalist;

    function __construct( data_journalist $journalist )
    {
        $this->journalist = $journalist;
    }

    public function render()
    {
        echo
        '<div class="post-bio">',
            '<img src="', empty( $this->journalist->icon ) ? '/100/40/journalists/hermes/hermes2.jpg' : '/100/100' . $this->journalist->icon, '" alt="Author"/>',
            '<div class="description">',
                '<a class="bio" href="#">', $this->journalist->display_name, '</a>',
                '<p>', $this->journalist->bio, '</p>',
            '</div>',
        '</div>';
    }

}