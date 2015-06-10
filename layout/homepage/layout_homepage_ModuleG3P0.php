<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 10/06/2015
 * Time: 14:58
 */

class layout_homepage_ModuleG3P0 extends layout
{

    function __create()
    {

    }

    public function render()
    {
        ?>
        <div class="block-layout-four row">
            <p class="title"><span>Week <strong>reviews</strong></span></p>
            <div class="grid_4">
                <div class="main-item">
                    <div class="post-img">
                        <a href="#"><img src="demo/276x200.gif" alt="Post"/></a>
                        <span><a href="#">Money</a></span>
                    </div>
                    <h3><a href="#">Can you afford a £1,000 bill for your child's prom?</a></h3>
                    <p class="date">December 13, 2014</p>
                </div>
                <ul class="rating-list">
                    <li>
                        <p>Look</p>
                        <div class="rating-stars" title="Rating: 5.0">
                            <span style="width: 100%"></span>
                        </div>
                    </li>
                    <li>
                        <p>Availability</p>
                        <div class="rating-stars" title="Rating: 4.0">
                            <span style="width: 80%"></span>
                        </div>
                    </li>
                    <li>
                        <p>People</p>
                        <div class="rating-stars" title="Rating: 2.5">
                            <span style="width: 50%"></span>
                        </div>
                    </li>
                    <li>
                        <p>Price</p>
                        <div class="rating-stars" title="Rating: 4.5">
                            <span style="width: 90%"></span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="grid_4">
                <div class="main-item">
                    <div class="post-img">
                        <a href="#"><img src="demo/276x200.gif" alt="Post"/></a>
                        <span><a href="#">Culture</a></span>
                    </div>
                    <h3><a href="#">Savers offered fixes of up to seven years</a></h3>
                    <p class="date">October 6, 2014</p>
                </div>
                <ul class="rating-list">
                    <li>
                        <p>Popularity</p>
                        <div class="rating-stars" title="Rating: 1.0">
                            <span style="width: 20%"></span>
                        </div>
                    </li>
                    <li>
                        <p>Design</p>
                        <div class="rating-stars" title="Rating: 4.0">
                            <span style="width: 80%"></span>
                        </div>
                    </li>
                    <li>
                        <p>Effects</p>
                        <div class="rating-stars" title="Rating: 2.5">
                            <span style="width: 50%"></span>
                        </div>
                    </li>
                    <li>
                        <p>Photography</p>
                        <div class="rating-stars" title="Rating: 4.5">
                            <span style="width: 90%"></span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="grid_4">
                <div class="main-item">
                    <div class="post-img">
                        <a href="#"><img src="demo/276x200.gif" alt="Post"/></a>
                        <span><a href="#">Technology</a></span>
                    </div>
                    <h3><a href="#">Is Brixton London's next tech hipster hub?</a></h3>
                    <p class="date">December 13, 2014</p>
                </div>
                <ul class="rating-list">
                    <li>
                        <p>Location</p>
                        <div class="rating-stars" title="Rating: 5.0">
                            <span style="width: 100%"></span>
                        </div>
                    </li>
                    <li>
                        <p>Place</p>
                        <div class="rating-stars" title="Rating: 2.5">
                            <span style="width: 50%"></span>
                        </div>
                    </li>
                    <li>
                        <p>City</p>
                        <div class="rating-stars" title="Rating: 4.0">
                            <span style="width: 80%"></span>
                        </div>
                    </li>
                    <li>
                        <p>People</p>
                        <div class="rating-stars" title="Rating: 4.5">
                            <span style="width: 90%"></span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <?php
    }

}