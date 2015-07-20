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
            '<img src="demo/100x100.gif" alt="Author"/>',
            '<div class="description">',
                '<a class="bio" href="#">John doe</a>',
                '<p>Nam bibendum ante ipsum, vitae ullamcorper risus accumsan et. Proin at metus elementum justo adipiscing scelerisque eu quis lacus. Nunc eleifend tellus at viverra interdum. Mauris blandit magna non felis fringilla viverra. Pellentesque dui nisi, ultrices id facilisis et, consectetur a orci. Proin viverra massa sed erat pulvinar eleifend. Nullam eleifend tortor at diam facilisis, pharetra pharetra justo sagittis. Nulla quis leo eget nulla cursus porta.</p>',
            '</div>',
        '</div>';
    }

}