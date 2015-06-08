<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 08/06/2015
 * Time: 10:16
 */

class layout_homepage_hero extends layout
{

    function __construct()
    {

    }


    public function render()
    {

        ?>
        <!-- Above the fold -->
        <div id="above-the-fold" class="above-the-fold light">
            <div class="inner-wrapper">

                <!-- Flexslider -->
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img src="demo/785x505.gif" alt="Image" />
                            <div class="post-box-text">
                                <span><a href="#">Culture</a></span>
                                <h3><a href="#">Amazon and Snapchat rank low for protecting user data from government</a></h3>
                                <p>July 18, 2014</p>
                            </div>
                        </li>
                        <li>
                            <img src="demo/785x505.gif" alt="Image" />
                            <div class="post-box-text">
                                <span><a href="#">Culture</a></span>
                                <h3><a href="#">Amazon and Snapchat rank low for protecting user data from government</a></h3>
                                <p>July 18, 2014</p>
                            </div>
                        </li>
                        <li>
                            <img src="demo/785x505.gif" alt="Image" />
                            <div class="post-box-text">
                                <span><a href="#">Culture</a></span>
                                <h3><a href="#">Amazon and Snapchat rank low for protecting user data from government</a></h3>
                                <p>July 18, 2014</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- Block with 2 posts -->
                <div class="block-with-two-posts">
                    <div class="post-block">
                        <a href="#"><img src="demo/390x250.gif" alt="Post"/></a>
                        <div class="post-box-text">
                            <span><a href="#">Culture</a></span>
                            <h3><a href="#">Britain's Got Talent: will Piers Morgan return to replace David Walliams?</a></h3>
                            <p>December 9, 2014</p>
                        </div>
                    </div>
                    <div class="post-block">
                        <a href="#"><img src="demo/390x250.gif" alt="Post"/></a>
                        <div class="post-box-text">
                            <span><a href="#">Sport</a></span>
                            <h3><a href="#">Wenger to sign new Arsenal three-year deal worth £24m</a></h3>
                            <p>December 9, 2014</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php

    }

}