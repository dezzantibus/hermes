<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 10/06/2015
 * Time: 14:58
 */

class layout_homepage_ModuleG1P6 extends layout
{

    /** @var  data_array */
    private $list;

    function __construct( data_array $list )
    {

        $this->list = $list;

        /** @TODO delete this filler */
        $this->list = new data_array();

        $this->list->add( 'filler' );
        $this->list->add( 'filler' );
        $this->list->add( 'filler' );
        $this->list->add( 'filler' );
        $this->list->add( 'filler' );
        $this->list->add( 'filler' );
        $this->list->add( 'filler' );

    }

    public function render()
    {

        $main = $this->list->first();

        echo
        '<div class="block-layout-three row">',
            '<div class="grid_12">',
                '<p class="title"><span>Latest from <strong>travel</strong></span></p>',
                '<div class="main-item">',
                    '<div class="post-img">',
                        '<a href="#"><img src="/demo/422x260.gif" alt="Post"/></a>',
                        '<span><a href="#">Travel</a></span>',
                    '</div>',
                    '<h3><a href="#">Travel news roundup: Wales, eco-luxury in the Galapagos …</a></h3>',
                    '<div class="post-dca">',
                        '<span class="date">June 8, 2014</span>',
                        '<span class="comments"><a href="#">23 Comments</a></span>',
                        '<ul class="rating-list">',
                            '<li>',
                                '<div class="rating-stars" title="Rating: 4.5">',
                                    '<span style="width: 90%"></span>',
                                '</div>',
                            '</li>',
                        '</ul>',
                    '</div>',
                    '<p>Donec nibh urna, mattis nec lacinia egestas, volutpat quis risus. Morbi sagittis blandit cursus. Morbi in velit dui. Suspendisse aliquam porttitor tortor at tempus. Ut gravida, eros a porttitor ornare, quam mauris dignissim nisl, ac eleifend metus erat dignissim felis.</p>',
                '</div>',
                '<div class="small-items">';

                    foreach( $this->list->getData() as $article )
                    {
                        echo
                        '<div class="item">',
                            '<a href="#"><img src="/demo/80x65.gif" alt="Post"/></a>',
                            '<div>',
                                '<h3><a href="#">Ut gravida, eros a porttitor ornare, quam mauris dignissim nisl ac eleifend metus erat</a></h3>',
                                '<p class="date">December 13, 2014</p>',
                            '</div>',
                        '</div>';
                    }

                echo
                '</div>',
            '</div>',
        '</div>';

    }

}