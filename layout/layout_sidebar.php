<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 08/06/2015
 * Time: 11:01
 */

class layout_sidebar extends layout
{

    /** @var  data_sidebar */
    private $data;

    public function __construct( data_sidebar $data )
    {
        $this->data = $data;
    }

    public function render()
    {

        //<!-- Aside -->
        echo '<aside id="sidebar" role="complementary">';

//        $this->search();

        $this->banner( $this->data->adData, 'side1' );

        //$this->tabs();

//        $this->recentComments();

        $this->recentPosts();

        //$this->archive();

        $this->category();

        $this->meta();

        $this->text();

        $this->banner( $this->data->adData, 'side2' );

//        $this->tags();

        echo '</aside>';

    }

    private function search()
    {

        //<!-- Search widget -->
        echo
        '<div class="widget">',
            '<h3 class="widget-title">', constant::$text['Search'], '</h3>',
            '<form class="searchform">',
                '<input type="text" placeholder="To search type and hit enter"/>',
                '<input type="submit" value="&#xf002;"/>',
            '</form>',
        '</div>';

    }

    private function banner( $data, $position )
    {

        switch( constant::$text['site'] )
        {
            case 'athena':
                if( !( $data instanceof data_journalist ) )
                {
                    $data = $position;
                }
                break;

            case 'hermes':
                $data = $position;
                break;
        }

        //<!-- Banner 300x250 -->
        echo
        '<div class="widget">',
            '<h3 class="widget-title">', constant::$text['Advertising'], '</h3>',
            '<div class="ad-banner-300x250">';
                if( $position == 'side1')
                {
                    switch( rand( 1, 5 ) )
                    {
                        case 1: echo '<a href="https://www.facebook.com/Marketing-p%C3%ABr-t%C3%AB-gjitha-firmat-213678692307984/"><img src="/banner/HermesNews_Banner300x60px_1.jpg"></a>';  break;
                        case 2: echo '<a href="https://www.facebook.com/Marketing-p%C3%ABr-t%C3%AB-gjitha-firmat-213678692307984/"><img src="/banner/HermesNews_Banner300x60px_2.jpg"></a>';  break;
                        case 3: echo '<a href="https://www.facebook.com/Marketing-p%C3%ABr-t%C3%AB-gjitha-firmat-213678692307984/"><img src="/banner/HermesNews_Banner300x60px_A1.jpg"></a>'; break;
                        case 4: echo '<a href="https://www.facebook.com/Marketing-p%C3%ABr-t%C3%AB-gjitha-firmat-213678692307984/"><img src="/banner/HermesNews_Banner300x60px_B.jpg"></a>';  break;
                        case 5: echo '<a href="https://www.facebook.com/Marketing-p%C3%ABr-t%C3%AB-gjitha-firmat-213678692307984/"><img src="/banner/HermesNews_Banner300x60px_C.jpg"></a>';  break;
                    }
                }
                else
                {
                    banner::automatic( $data );
                }
            echo
            '</div>',
        '</div>';

    }

    private function tabs()
    {

        ?>

        <!-- Tabs -->
        <div class="widget">
            <div class="tabs">
                <ul>
                    <li><a href="#tab-popular">', constant::$text['Popular'], '</a></li>
                    <li><a href="#tab-recent">Fundit</a></li>
                    <li><a href="#tab-comments">Komentet</a></li>
                </ul>
                <div id="tab-popular">
                    <ul class="recent-posts">
                        <li>
                            <div class="image">
                                <a href="#"><img src="demo/80x65.gif" alt="Post"/></a>
                            </div>
                            <div class="text">
                                <h3><a href="#">The Giro d'Italia comes to Northern Ireland</a></h3>
                                <p class="date">September 16, 2104</p>
                            </div>
                        </li>
                        <li>
                            <div class="image">
                                <a href="#"><img src="demo/80x65.gif" alt="Post"/></a>
                            </div>
                            <div class="text">
                                <h3><a href="#">The Giro d'Italia comes to Northern Ireland</a></h3>
                                <p class="date">September 16, 2104</p>
                            </div>
                        </li>
                        <li>
                            <div class="image">
                                <a href="#"><img src="demo/80x65.gif" alt="Post"/></a>
                            </div>
                            <div class="text">
                                <h3><a href="#">The Giro d'Italia comes to Northern Ireland</a></h3>
                                <p class="date">September 16, 2104</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="tab-recent">
                    <ul class="recent-posts">
                        <li>
                            <div class="image">
                                <a href="#"><img src="demo/80x65.gif" alt="Post"/></a>
                            </div>
                            <div class="text">
                                <h3><a href="#">Standard Chartered under pressure over executive pay</a></h3>
                                <p class="date">September 16, 2104</p>
                            </div>
                        </li>
                        <li>
                            <div class="image">
                                <a href="#"><img src="demo/80x65.gif" alt="Post"/></a>
                            </div>
                            <div class="text">
                                <h3><a href="#">Standard Chartered under pressure over executive pay</a></h3>
                                <p class="date">September 16, 2104</p>
                            </div>
                        </li>
                        <li>
                            <div class="image">
                                <a href="#"><img src="demo/80x65.gif" alt="Post"/></a>
                            </div>
                            <div class="text">
                                <h3><a href="#">Standard Chartered under pressure over executive pay</a></h3>
                                <p class="date">September 16, 2104</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="tab-comments">
                    <ul class="recent-comments">
                        <li>
                            <p class="author">FreddoFrog</p>
                            <h3><a href="#">I love the template! Really easy to modify. Really first class!</a></h3>
                        </li>
                        <li>
                            <p class="author">Noosalife</p>
                            <h3><a href="#">Perfect design, have a client right now that needs that sort of display.</a></h3>
                        </li>
                        <li>
                            <p class="author">Wi_Hoosier</p>
                            <h3><a href="#">CreativeKingdom knocked it out of the park with this one.</a></h3>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <?php

    }

    private function recentComments()
    {

        if( !$this->data->recent_comments instanceof data_array )
        {
            return false;
        }

        //<!-- Recent comments -->
        echo
        '<div class="widget">',
            '<h3 class="widget-title">', constant::$text['Recent comments'], '</h3>',
            '<ul class="recent-comments">';

                foreach( $this->data->recent_comments->getData() as $comments )
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

        if( !$this->data->recent_articles instanceof data_array )
        {
            return false;
        }

        //<!-- Recent posts -->
        echo
        '<div class="widget">',
            '<h3 class="widget-title">', constant::$text['Recent articles'], '</h3>',
            '<ul class="recent-posts">';

                foreach( $this->data->recent_articles->getData() as $article )
                {

                    echo
                    '<li>',
                        '<div class="image">',
                            '<a href="', $article->getLink(), '"><img src="', empty( $article->image_1 ) ? 'demo/80x65.gif' : '/80/65' . $article->image_1, '" alt="Post"/></a>',
                        '</div>',
                        '<div class="text">',
                            '<h3><a href="', $article->getLink(), '">', $article->title, '</a></h3>',
                            '<p class="date">', data_article::dateForDisplay( $article->created ), '</p>',
                        '</div>',
                    '</li>';

                }

            echo
            '</ul>',
        '</div>';

    }

    private function archive()
    {

        //<!-- Archive widget -->
        echo
        '<div class="widget">',
            '<h3 class="widget-title">Archive</h3>',
            '<ul class="widget-archive">',
                '<li><a href="#">September 2014</a> (39)</li>',
                '<li><a href="#">October 2014</a> (8)</li>',
                '<li><a href="#">July 2014</a> (1)</li>',
                '<li><a href="#">December 2014</a> (16)</li>',
                '<li><a href="#">November 2014</a> (184)</li>',
            '</ul>',
        '</div>';

    }

    private function category()
    {

        //<!-- Category widget -->
        echo
        '<div class="widget">',
            '<h3 class="widget-title">', constant::$text['Categories'], '</h3>',
            '<ul class="widget-categories">';

                /** @var $category data_category */
                foreach( $this->data->categories->getData() as $category )
                {
                    echo  '<li><a href="/', $category->routing, '.html">', $category->name, '</a></li>';
                }

            echo
            '</ul>',
        '</div>';

    }

    private function meta()
    {
        //<!-- Meta widget -->
        echo
        '<div class="widget">',
            '<h3 class="widget-title">', constant::$text['contacts'], '</h3>',
            constant::$text['contacts text'],
        '</div>';

    }

    private function text()
    {

        //<!-- Text widget -->
        echo
        '<div class="widget">',
            '<h3 class="widget-title">', constant::$text['site name'], '</h3>',
            '<p>', constant::$text['side text'], '</p>',
        '</div>';

    }

    private function tags()
    {

        //<!-- Tag cloud widget -->
        echo
        '<div class="widget">',
            '<h3 class="widget-title">Tag cloud</h3>',
            '<div class="tagcloud">',
                '<div><a href="#">design</a><span>3</span></div>',
                '<div><a href="#">photography</a><span>16</span></div>',
                '<div><a href="#">tutorial</a><span>23</span></div>',
                '<div><a href="#">css3</a><span>1</span></div>',
                '<div><a href="#">photoshop</a><span>6</span></div>',
                '<div><a href="#">show</a><span>14</span></div>',
                '<div><a href="#">business</a><span>63</span></div>',
                '<div><a href="#">code</a><span>43</span></div>',
                '<div><a href="#">magazine</a><span>22</span></div>',
                '<div><a href="#">premium</a><span>10</span></div>',
                '<div><a href="#">theme</a><span>2</span></div>',
                '<div><a href="#">development</a><span>9</span></div>',
                '<div><a href="#">illustration</a><span>17</span></div>',
                '<div><a href="#">school</a><span>8</span></div>',
                '<div><a href="#">culture</a><span>1</span></div>',
                '<div><a href="#">fashion</a><span>5</span></div>',
                '<div><a href="#">music</a><span>63</span></div>',
                '<div><a href="#">technology</a><span>1</span></div>',
            '</div>',
        '</div>';

    }

}