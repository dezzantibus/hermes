<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 10/06/2015
 * Time: 14:54
 */

class layout_homepage_popular extends layout
{

    function __construct()
    {

    }

    public function render()
    {
        ?>
        <div class="block-layout-one">
            <p class="title"><span>Popular <strong>posts</strong></span></p>
            <div class="row">
                <div class="item grid_4">
                    <a href="#"><img src="demo/80x65.gif" /></a>
                    <div>
                        <span><a href="#">Sport</a></span>
                        <h3><a href="#">Wenger: FA Cup is my most important trophy</a></h3>
                        <p class="date">December 13, 2014</p>
                    </div>
                </div>
                <div class="item grid_4">
                    <a href="#"><img src="demo/80x65.gif"/></a>
                    <div>
                        <span><a href="#">Culture</a></span>
                        <h3><a href="#">Sigrid Rausing: 'The sadness was overwhelming'</a></h3>
                        <p class="date">December 13, 2014</p>
                    </div>
                </div>
                <div class="item grid_4">
                    <a href="#"><img src="demo/80x65.gif" /></a>
                    <div>
                        <span><a href="#">Technology</a></span>
                        <h3><a href="#">Is Brixton London's next tech hipster hub?</a></h3>
                        <p class="date">December 13, 2014</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="item grid_4">
                    <a href="#"><img src="demo/80x65.gif" /></a>
                    <div>
                        <span><a href="#">Travel</a></span>
                        <h3><a href="#">The Giro d'Italia comes to Northern Ireland</a></h3>
                        <p class="date">December 13, 2014</p>
                    </div>
                </div>
                <div class="item grid_4">
                    <a href="#"><img src="demo/80x65.gif" /></a>
                    <div>
                        <span><a href="#">Business</a></span>
                        <h3><a href="#">Does your business need to get a grip on marketing?</a></h3>
                        <p class="date">Septmeber 16, 2014</p>
                    </div>
                </div>
                <div class="item grid_4">
                    <a href="#"><img src="demo/80x65.gif" /></a>
                    <div>
                        <span><a href="#">Politics</a></span>
                        <h3><a href="#">Ryanair profits endure bumpy landing</a></h3>
                        <p class="date">June 2, 2014</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }


}