<?php


class layout_header extends layout
{

    public function __construct()
    {

    }

    public function render()
    {


        echo '<header id="header" class="dark" role="banner">';

            $this->top_bar();

            $this->mid_bar();

            $this->low_bar();

        echo '</header>';

    }

    private function top_bar()
    {

        ?>

        <!-- Top bar -->
        <div class="top-bar dark">
            <div class="inner-wrapper">

                <!-- Responsive menu -->
                <a class="click-to-open-menu"><i class="fa fa-align-justify"></i></a>

                <!-- Top menu -->
                <nav class="top-menu" role="navigation">
                    <ul class="top-menu">
                        <li><a href="index.html"><span>Home</span></a>
                            <ul class="sub-menu">
                                <li><a href="index.html">Home page</a></li>
                                <li><a href="index_1.html">Home page 1</a></li>
                                <li><a href="index_2.html">Home page 2</a></li>
                                <li><a href="index_3.html">Home page 3</a></li>
                                <li><a href="index_4.html">Home page 4</a></li>
                            </ul>
                        </li>
                        <li><a href="post_single.html"><span>Posts</span></a>
                            <ul class="sub-menu">
                                <li><a href="post_single.html">Post single</a></li>
                                <li><a href="post_single_review.html">Single review</a></li>
                                <li><a href="post_single_image_full.html">Single fullwidth image</a></li>
                                <li><a href="post_single_full_page.html">Single full page</a></li>
                                <li><a href="post_single_audio.html">Single audio</a></li>
                                <li><a href="post_single_video.html">Single video</a></li>
                                <li><a href="post_single_gallery.html">Single slider</a></li>
                                <li><a href="post_single_no_image.html">Single no image</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html"><span>Blog</span></a>
                            <ul class="sub-menu">
                                <li><a href="blog.html">Blog style</a></li>
                                <li><a href="blog_grid.html">Blog grid</a></li>
                                <li><a href="blog_left_sidebar.html">Blog left sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="shop.html"><span>Shop</span></a>
                            <ul class="sub-menu">
                                <li><a href="shop.html">Shop category</a></li>
                                <li><a href="shop_full_page.html">Shop full page</a></li>
                                <li><a href="shop_single.html">Shop single</a></li>
                                <li><a href="shop_single_full_page.html">Shop single full page</a></li>
                            </ul>
                        </li>
                        <li><a href="404.html"><span>Pages</span></a>
                            <ul class="sub-menu">
                                <li><a href="404.html">404 Page</a></li>
                                <li><a href="contact.php">Contact form</a></li>
                                <li><a href="post_single_full_page.html">Full width page</a></li>
                                <li><a href="blog_left_sidebar.html">Left sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="gallery_full_page.html"><span>Gallery</span></a>
                            <ul class="sub-menu">
                                <li><a href="gallery_full_page.html">Gallery full page</a></li>
                                <li><a href="gallery.html">Gallery sidebar</a></li>
                                <li><a href="gallery_single_full_page.html">Single gallery full page</a></li>
                                <li><a href="gallery_single.html">Single sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="shortcodes.html">Shortcodes</a></li>
                        <li><a href="http://themeforest.net/user/different-themes/portfolio?ref=CreativeKingdom" target="_blank"><i class="fa fa-shopping-cart"></i> Buy DialyMagazine</a></li>
                    </ul>
                </nav>

                <!-- Weather -->
                <div class="weather-report">
                    <span class="report">+28°C</span>
                    <img src="images/weather/light-weather-thunder.png" alt="Sunny">
                    <span class="city">London, England</span>
                </div>

            </div>
        </div>



    <?
    }

    private function mid_bar()
    {
        ?>
        <div class="inner-wrapper row">

            <!-- Logo -->
            <div id="logo">
                <h1 id="site-logo"><a href="index.html">Dialy<span>Magazine</span></a></h1>
                <h2 id="site-description">Premium HTML5 Magazine Theme</h2>
            </div>

            <!-- Ad banner -->
            <div class="ad-banner-728x90">
                <a href="http://themeforest.net/user/CreativeKingdom/portfolio?ref=CreativeKingdom" target="_blank"><img src="demo/728x90.gif" alt="Banner"/></a>

            </div>

        </div>


        <?
    }

    private function low_bar()
    {
        ?>

        <!-- Primary navigation -->
        <nav class="primary-menu dark sticky-menu" role="navigation">
            <div class="inner-wrapper">

                <!-- Responsive menu -->
                <a class="click-to-open-menu"><i class="fa fa-align-justify"></i></a>

                <!-- Main menu -->
                <ul class="main-menu">
                    <li><a href="index.html"><span>Home</span></a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Home page</a></li>
                            <li><a href="index_1.html">Home page 1</a></li>
                            <li><a href="index_2.html"><span>Home page 2</span></a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home page</a></li>
                                    <li><a href="index_1.html">Home page 1</a></li>
                                    <li><a href="index_2.html">Home page 2</a></li>
                                    <li><a href="index_3.html">Home page 3</a></li>
                                    <li><a href="index_4.html">Home page 4</a></li>
                                </ul>
                            </li>
                            <li><a href="index_3.html">Home page 3</a></li>
                            <li><a href="index_4.html">Home page 4</a></li>
                        </ul>
                    </li>
                    <li class="mega-menu-full"><a href="#"><span><i class="fa fa-th"></i> Mega menu</span></a>
                        <ul class="menu-blocks row">
                            <li class="grid_4">
                                <ul class="menu-content category-menu">
                                    <li><a href="#">Development</a></li>
                                    <li><a href="#">Photography</a></li>
                                    <li><a href="#">Business</a></li>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Magazine</a></li>
                                    <li><a href="#">Illustration</a></li>
                                    <li><a href="#">Travel</a></li>
                                    <li><a href="#">Sport</a></li>
                                </ul>
                            </li>
                            <li class="grid_4">
                                <ul class="menu-content featured-post">
                                    <li>
                                        <div class="block-layout-two">
                                            <div class="main-item">
                                                <div class="post-img">
                                                    <a href="#"><img src="demo/338x250.gif" alt="Post"/></a>
                                                    <span><a href="#">Fashion</a></span>
                                                </div>
                                                <h3><a href="#">The Homesman rides, The Expendables assemble</a></h3>
                                                <p class="date">December 13, 2014</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="grid_4">
                                <ul class="menu-content article-list">
                                    <li>
                                        <ul class="recent-posts">
                                            <li>
                                                <div class="image">
                                                    <a href="#"><img src="demo/80x65.gif" alt="Post"/></a>
                                                </div>
                                                <div class="text">
                                                    <h3><a href="#">Etiam luctus neque vel enim molestie pretium</a></h3>
                                                    <p class="date">September 16, 2104</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <a href="#"><img src="demo/80x65.gif" alt="Post"/></a>
                                                </div>
                                                <div class="text">
                                                    <h3><a href="#">Wenger: FA Cup is my most important trophy</a></h3>
                                                    <p class="date">September 16, 2104</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <a href="#"><img src="demo/80x65.gif" alt="Post"/></a>
                                                </div>
                                                <div class="text">
                                                    <h3><a href="#">Is Brixton London's next tech hipster hub?</a></h3>
                                                    <p class="date">September 16, 2104</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="image">
                                                    <a href="#"><img src="demo/80x65.gif" alt="Post"/></a>
                                                </div>
                                                <div class="text">
                                                    <h3><a href="#">Does your business need to get a grip on marketing?</a></h3>
                                                    <p class="date">September 16, 2104</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Health</a></li>
                    <li><a href="#">Business</a></li>
                    <li><a href="#">Fashion</a></li>
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Music</a></li>
                    <li><a href="#">Video</a></li>
                    <li><a href="#">Design</a></li>
                    <li><a href="#">Culture</a></li>
                    <li><a href="#">Show</a></li>
                    <li><a href="#">Lifestyle</a></li>
                    <li><a href="#">Game</a></li>
                    <li><a href="#">Fun</a></li>
                </ul>
            </div>
        </nav>

        <?
    }

}