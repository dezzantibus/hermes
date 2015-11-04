<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 12/06/2015
 * Time: 16:29
 */

class layout_category_title extends layout
{

    private $category;

    function __construct( data_category $category )
    {
        $this->category = $category;
    }

    public function render()
    {

        echo
        '<div id="above-the-fold" class="above-the-fold">',
            '<div class="inner-wrapper">',
                '<h2 class="page-title" style="color:', $this->category->colour, '">', $this->category->name, '</h2>',
            '</div>',
        '</div>';

        if( $this->category->id == 9 )
        {
        echo
        '
<div class="inner-wrapper" style="margin-bottom:15px;">
        <a href="http://www.konfindustria.org.al/?lang=en"><img src="/banner/ELISAA_728x90px_D.jpg"></a>
</div>
        ';
        }

    }

}