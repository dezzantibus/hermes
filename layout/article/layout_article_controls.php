<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 15/06/2015
 * Time: 14:02
 */


class layout_article_controls extends layout
{

    function __construct()
    {

    }

    public function render()
    {

        echo
        '<div class="post-controls">',
            '<a href="#" class="prev">',
                '<span><i class="fa fa-angle-left"></i></span>',
                '<p>Dico splendide eos inulla detraxit ferri interesset sollicitudin neque</p>',
            '</a>',
            '<a href="#" class="next">',
                '<span><i class="fa fa-angle-right"></i></span>',
                '<p>Dico splendide eos inulla detraxit ferri interesset sollicitudin neque</p>',
            '</a>',
        '</div>';

    }

}