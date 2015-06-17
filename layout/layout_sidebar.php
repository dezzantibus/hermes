<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 08/06/2015
 * Time: 11:01
 */

class layout_sidebar extends layout
{

    function __construct()
    {

    }

    public function render()
    {

        ?>

        <!-- Aside -->
        <aside id="sidebar" role="complementary">

        <!-- Search widget -->
        <div class="widget">
            <h3 class="widget-title">Search</h3>
            <form class="searchform">
                <input type="text" placeholder="To search type and hit enter"/>
                <input type="submit" value="&#xf002;"/>
            </form>
        </div>

        <!-- Banner 300x250 -->
        <div class="widget">
            <h3 class="widget-title">Advertisement</h3>
            <div class="ad-banner-300x250">
                <a href="http://themeforest.net/user/CreativeKingdom/portfolio?ref=CreativeKingdom" target="_blank"><img src="demo/300x250.gif" alt="Banner"/></a>
            </div>
        </div>

        <!-- Tabs -->
        <div class="widget">
            <div class="tabs">
                <ul>
                    <li><a href="#tab-popular">Popular</a></li>
                    <li><a href="#tab-recent">Recent</a></li>
                    <li><a href="#tab-comments">Comments</a></li>
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

        <!-- Recent comments -->
        <div class="widget">
            <h3 class="widget-title">Recent comments</h3>
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

        <!-- Recent posts -->
        <div class="widget">
            <h3 class="widget-title">Recent posts</h3>
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

        <!-- Archive widget -->
        <div class="widget">
            <h3 class="widget-title">Archive</h3>
            <ul class="widget-archive">
                <li><a href="#">September 2014</a> (39)</li>
                <li><a href="#">October 2014</a> (8)</li>
                <li><a href="#">July 2014</a> (1)</li>
                <li><a href="#">December 2014</a> (16)</li>
                <li><a href="#">November 2014</a> (184)</li>
            </ul>
        </div>

        <!-- Category widget -->
        <div class="widget">
            <h3 class="widget-title">Categories</h3>
            <ul class="widget-categories">
                <li><a href="#">Photography</a></li>
                <li><a href="#">Design</a></li>
                <li><a href="#">Fashion</a></li>
                <li><a href="#">Photoshop</a></li>
                <li><a href="#">Magazine</a></li>
                <li><a href="#">Development</a></li>
            </ul>
        </div>

        <!-- Meta widget -->
        <div class="widget">
            <h3 class="widget-title">Meta</h3>
            <ul>
                <li><a href="#">Site admin</a></li>
                <li><a href="#">Log out</a></li>
                <li><a href="#">Entries RSS</a></li>
                <li><a href="#">Comments RSS</a></li>
                <li><a href="#">Wordpress.org</a></li>
            </ul>
        </div>

        <!-- Text widget -->
        <div class="widget">
            <h3 class="widget-title">Text</h3>
            <p>Etiam luctus neque vel enim molestie pretium. Etiam vitae purus ac urna molestie ultrices vel molestie...</p>
        </div>

        <!-- Banner 125x125 -->
        <div class="widget">
            <h3 class="widget-title">Advertisement</h3>
            <ul class="ad-banner-125x125">
                <li><a href="http://themeforest.net/user/CreativeKingdom/portfolio?ref=CreativeKingdom" target="_blank"><img src="demo/125x125.gif" alt="Banner"/></a></li>
                <li><a href="http://themeforest.net/user/CreativeKingdom/portfolio?ref=CreativeKingdom" target="_blank"><img src="demo/125x125.gif" alt="Banner"/></a></li>
                <li><a href="http://themeforest.net/user/CreativeKingdom/portfolio?ref=CreativeKingdom" target="_blank"><img src="demo/125x125.gif" alt="Banner"/></a></li>
                <li><a href="http://themeforest.net/user/CreativeKingdom/portfolio?ref=CreativeKingdom" target="_blank"><img src="demo/125x125.gif" alt="Banner"/></a></li>
            </ul>
        </div>

        <!-- Tag cloud widget -->
        <div class="widget">
            <h3 class="widget-title">Tag cloud</h3>
            <div class="tagcloud">
                <div><a href="#">design</a><span>3</span></div>
                <div><a href="#">photography</a><span>16</span></div>
                <div><a href="#">tutorial</a><span>23</span></div>
                <div><a href="#">css3</a><span>1</span></div>
                <div><a href="#">photoshop</a><span>6</span></div>
                <div><a href="#">show</a><span>14</span></div>
                <div><a href="#">business</a><span>63</span></div>
                <div><a href="#">code</a><span>43</span></div>
                <div><a href="#">magazine</a><span>22</span></div>
                <div><a href="#">premium</a><span>10</span></div>
                <div><a href="#">theme</a><span>2</span></div>
                <div><a href="#">development</a><span>9</span></div>
                <div><a href="#">illustration</a><span>17</span></div>
                <div><a href="#">school</a><span>8</span></div>
                <div><a href="#">culture</a><span>1</span></div>
                <div><a href="#">fashion</a><span>5</span></div>
                <div><a href="#">music</a><span>63</span></div>
                <div><a href="#">technology</a><span>1</span></div>
            </div>
        </div>

        </aside>

        <?php

    }

}