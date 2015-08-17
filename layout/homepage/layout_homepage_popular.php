<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 10/06/2015
 * Time: 14:54
 */

class layout_homepage_popular extends layout
{

    /** @var  $list data_array */
    private $list;

    function __construct( data_array $list )
    {
        $this->list = $list;
    }

    public function render()
    {
        if( $this->list->count() > 5 )
        {

            echo
            '<div class="block-layout-one">',
                '<p class="title"><span>', constant::$text['popular_articles'], '</strong></span></p>',
                '<div class="row">';

                    $this->element( $this->list->getIndex( 0 ) );
                    $this->element( $this->list->getIndex( 1 ) );
                    $this->element( $this->list->getIndex( 2 ) );

                echo
                '</div>',
                '<div class="row">';

                    $this->element( $this->list->getIndex( 3 ) );
                    $this->element( $this->list->getIndex( 4 ) );
                    $this->element( $this->list->getIndex( 5 ) );

                echo
                '</div>',
            '</div>';

        }
    }

    private function element( data_article $article )
    {

        echo
        '<div class="item grid_4">',
            '<a href="', $article->getLink(), '"><img src="', empty( $article->image_1 ) ? 'demo/80x65.gif' : '/80/65' . $article->image_1, '" /></a>',
            '<div>',
                '<span style="background-color:', $article->category->colour, '"><a href="', $article->getLink(), '">', $article->category->name, '</a></span>',
                '<h3><a href="', $article->getLink(), '">', $article->title, '</a></h3>',
                '<p class="date">', data_article::dateForDisplay( $article->created ), '</p>',
            '</div>',
        '</div>';

    }

}