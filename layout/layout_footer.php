<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 08/06/2015
 * Time: 10:24
 */

class layout_footer extends layout
{

    /** @var  data_footer */
    private $data;

    public function __construct( data_footer $data )
    {
        $this->data = $data;
    }

    public function render()
    {

        echo
        '<footer id="footer" role="contentinfo">',
            '<div class="inner-wrapper">';

                $this->about();

//                $this->recentComments();
//
//                $this->recentPosts();
//
//                $this->categories();

            echo
            '</div>',

            //<!-- Copyright -->
            '<div id="copyright">',
                '<div class="inner-wrapper">',
                    '<div class="row">',
                        '<div class="grid_6">&copy; Copyright 2014. All rights reserved.</div>',
                        '<div class="grid_6">Theme made by <a href="http://themeforest.net/user/CreativeKingdom/portfolio?ref=CreativeKingdom" target="_blank">CreativeKingdom</a> :)</div>',
                    '</div>',
                '</div>',
            '</div>',

        '</footer>';

    }

    private function about()
    {

        //<!-- About widget -->
        echo
        '<div class="widget">',
            '<h3 class="widget-title">About theme</h3>',
            '<p>DialyMagazine is clean & professional Html5/Css3 magazine template. It is full responsive so it adapts to any device it’s viewed on. It’s loaded with few header styles, different layouts, mega menu, fixed navigation and more...</p>',
        '</div>';

    }

    private function recentComments()
    {

        //<!-- Recent comments -->
        echo
        '<div class="widget">',
            '<h3 class="widget-title">Recent comments</h3>',
            '<ul class="recent-comments">';

                foreach( $this->data->recent_comments->getData() as $comment )
                {
                    echo
                    '<li>',
                        '<p class="author">FreddoFrog</p>',
                        '<h3><a href="#">I love the template! Really easy to modify. Really first class!</a></h3>',
                    '</li>';
                }

            echo
            '</ul>',
        '</div>';

    }

    private function recentPosts()
    {

        //<!-- Recent posts -->
        echo
        '<div class="widget">',
            '<h3 class="widget-title">Recent posts</h3>',
            '<ul class="recent-posts">';

                foreach( $this->data->recent_articles->getData() as $article )
                {
                    echo
                    '<li>',
                        '<div class="image">',
                            '<a href="#"><img src="demo/80x65.gif" alt="Post"/></a>',
                        '</div>',
                        '<div class="text">',
                            '<h3><a href="#">Sweden fights back as Pfizer move on jobs</a></h3>',
                            '<p class="date">September 16, 2104</p>',
                        '</div>',
                    '</li>';
                }

            echo
            '</ul>',
        '</div>';

    }

    private function categories()
    {

        //<!-- Category widget -->
        echo
        '<div class="widget">',
            '<h3 class="widget-title">Categories widget</h3>',
            '<ul class="widget-categories">',
                '<li><a href="#">Photography</a></li>',
                '<li><a href="#">Design</a></li>',
                '<li><a href="#">Fashion</a></li>',
                '<li><a href="#">Photoshop</a></li>',
                '<li><a href="#">Magazine</a></li>',
                '<li><a href="#">Development</a></li>',
                '<li><a href="#">Illustration</a></li>',
                '<li><a href="#">Code</a></li>',
                '<li><a href="#">Business</a></li>',
            '</ul>',
        '</div>';

    }

}