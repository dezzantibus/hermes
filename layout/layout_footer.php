<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 08/06/2015
 * Time: 10:24
 */

class layout_footer extends layout
{

    function __construct()
    {

    }

    public function render()
    {

        ?>

        <footer id="footer" role="contentinfo">
            <div class="inner-wrapper">

                <!-- About widget -->
                <div class="widget">
                    <h3 class="widget-title">About theme</h3>
                    <p>DialyMagazine is clean & professional Html5/Css3 magazine template. It is full responsive so it adapts to any device it’s viewed on. It’s loaded with few header styles, different layouts, mega menu, fixed navigation and more...</p>
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
                                <h3><a href="#">Sweden fights back as Pfizer move on jobs</a></h3>
                                <p class="date">September 16, 2104</p>
                            </div>
                        </li>
                        <li>
                            <div class="image">
                                <a href="#"><img src="demo/80x65.gif" alt="Post"/></a>
                            </div>
                            <div class="text">
                                <h3><a href="#">Sweden fights back as Pfizer move on jobs</a></h3>
                                <p class="date">September 16, 2104</p>
                            </div>
                        </li>
                        <li>
                            <div class="image">
                                <a href="#"><img src="demo/80x65.gif" alt="Post"/></a>
                            </div>
                            <div class="text">
                                <h3><a href="#">Sweden fights back as Pfizer move on jobs</a></h3>
                                <p class="date">September 16, 2104</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Category widget -->
                <div class="widget">
                    <h3 class="widget-title">Categories widget</h3>
                    <ul class="widget-categories">
                        <li><a href="#">Photography</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Photoshop</a></li>
                        <li><a href="#">Magazine</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Illustration</a></li>
                        <li><a href="#">Code</a></li>
                        <li><a href="#">Business</a></li>
                    </ul>
                </div>

            </div>

            <!-- Copyright -->
            <div id="copyright">
                <div class="inner-wrapper">
                    <div class="row">
                        <div class="grid_6">&copy; Copyright 2014. All rights reserved.</div>
                        <div class="grid_6">Theme made by <a href="http://themeforest.net/user/CreativeKingdom/portfolio?ref=CreativeKingdom" target="_blank">CreativeKingdom</a> :)</div>
                    </div>
                </div>
            </div>

        </footer>

        <?php

    }

}