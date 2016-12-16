<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 15/06/2015
 * Time: 14:02
 */


class layout_article_related extends layout
{

    private $related;

    function __construct( data_array $related )
    {
        $this->related = $related;
    }

    public function render()
    {

        if( empty( $this->related ) )
        {
            return;
        }

        if( $this->related->isEmpty() )
        {
            return;
        }

        echo
        '<div class="block-layout-one">',
            '<p class="title"><span>Lajme t&euml; ngjashme <strong></strong></span></p>',
            '<div class="row">';

                $counter = 0;

                /** var $article data_article */
                foreach( $this->related->getData() as $article )
                {

                    if( !( $counter % 3 ) && $counter > 0 )
                    {
                        echo
                        '</div>',
                        '<div class="row">';
                    }

                    echo
                    '<div class="item grid_4">',
                        '<a href="', $article->getLink(), '"><img src="', empty( $article->image_1 ) ? 'demo/80x65.gif' : '/80/65' . $article->image_1, '" /></a>',
                        '<div>',
                            '<span style="background-color:', $article->category->colour, '"><a href="', $article->getLink(), '">', $article->category->name, '</a></span>',
                            '<h3><a href="', $article->getLink(), '">', $article->title, '</a></h3>',
                            '<p class="date">', data_article::dateForDisplay( $article->created ), '</p>',
                        '</div>',
                    '</div>';

                    $counter++;

                }

            echo
            '</div>',
        '</div>';

    }

}