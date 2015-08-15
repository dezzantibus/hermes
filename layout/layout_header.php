<?php


class layout_header extends layout
{

    /** @var  data_header */
    private $data;

    public function __construct( data_header $data )
    {
        $this->data = $data;
    }

    public function render()
    {

//        $this->cookies();

        echo '<header id="header" class="light" role="banner">';

            //$this->top_bar();

            $this->mid_bar();

            $this->low_bar();

        echo '</header>';

    }

    /*
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
                    <img src="/images/weather/light-weather-thunder.png" alt="Sunny">
                    <span class="city">London, England</span>
                </div>

            </div>
        </div>
        <?php

    }
    */

    private function cookies()
    {

        echo
        '<script src="/js/cookieconsent.1.0.2.min.js"></script>',
        '<script type="text/javascript">',
            'window.cookieconsent_options = {',
                '"message":',
                    '"Ne jemi duke përdorur cookies që t\'ju japim përvojën më të mirë në faqen tonë. Cookies janë fotografi të ',
                    'depozituara në shfletuesin tuaj dhe janë përdorur nga shumica e faqeve të internetit për të ndihmuar të ',
                    'personalizoni përvojën tuaj në web. <br><br>',
                    'Duke vazhduar të përdorni faqen tonë të internetit pa ndryshuar cilësimet, ju jeni duke rënë dakord për përdorimin e cookies.",',
                '"dismiss":"Un&euml; kam kuptuar",',
                '"learnMore":"More info",',
                '"link":null,',
                '"theme":"dark-top"',
            '};',
        '</script>';

    }

    private function top_bar()
    {



        //<!-- Top bar -->
        echo
        '<div class="top-bar light">',
            '<div class="inner-wrapper">';

                google::automatic();

            echo
            '</div>',
        '</div>';


    }

    private function mid_bar()
    {

        echo
        '<div class="inner-wrapper row">',

            //<!-- Logo -->
            '<div id="logo">',
                '<h1 id="site-logo"><a href="index.html">Hermes<span>News</span></a></h1>',
                '<h2 id="site-description">Lajmi i par&euml; Portali shqiptar</h2>',
            '</div>',

            //<!-- Ad banner -->
            '<div class="ad-banner-728x90">';
                google::automatic();
                //'<a href="http://themeforest.net/user/CreativeKingdom/portfolio?ref=CreativeKingdom" target="_blank"><img src="/728/90/filler.jpg" alt="Banner"/></a>',
            echo
            '</div>',

        '</div>';

    }

    private function low_bar()
    {

        echo

        //<!-- Primary navigation -->
        '<nav class="primary-menu light sticky-menu" role="navigation">',
            '<div class="inner-wrapper">',

                //<!-- Responsive menu -->
                '<a class="click-to-open-menu"><i class="fa fa-align-justify"></i></a>',

                //<!-- Main menu -->
                '<ul class="main-menu">',
                    '<li><a style="border-bottom:2px solid #000; padding:13px 12px;" href="/">Home</a></li>';

                    /** @var $category data_category */
                    foreach( $this->data->category_menu->getData() as $category )
                    {

                        echo
                        '<li>',
                            '<a style="border-bottom:2px solid ', $category->colour, ';color:', $category->colour, '" href="/', $category->routing, '.html">' , $category->name, '</a>',
                        '</li>';

                    }

                    echo
                '</ul>',
            '</div>',
        '</nav>';

    }

}