<?php
$subjectPrefix = 'Write the title for email header';
$emailTo = 'Write your email here';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = stripslashes(trim($_POST['form-name']));
    $email = stripslashes(trim($_POST['form-email']));
    $message = stripslashes(trim($_POST['form-message']));

    $emailIsValid = preg_match('/^[^0-9][A-z0-9._%+-]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/', $email);

    if ($name && $email && $emailIsValid && $message) {
        $subject = "$subjectPrefix";
        $body = "Name: $name <br /> Email: $email <br /> Message: $message";

        $headers = 'MIME-Version: 1.1' . PHP_EOL;
        $headers .= 'Content-type: text/html; charset=utf-8' . PHP_EOL;
        $headers .= "From: $name <$email>" . PHP_EOL;
        $headers .= "Return-Path: $emailTo" . PHP_EOL;
        $headers .= "Reply-To: $email" . PHP_EOL;

        mail($emailTo, $subject, $body, $headers);
        $emailSent = true;
    } else {
        $hasError = true;
    }
}
?>



<!DOCTYPE html>
<html lang="en-US">
    <head>
        
        <!-- Site title -->
        <title>DialyMagazine | Premium HTML5 Magazine Theme</title>
        
        <!-- Favicons -->
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144-precomposed.png">
        
        <!-- Meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="description" content="Premium HTML5 Magazine Theme">
        
        <!-- Normalize -->
        <link rel="stylesheet" href="css/normalize.css">
        
        <!-- Main style -->
        <link rel="stylesheet" href="css/style.css">
        
        <!-- Layout style -->
        <link rel="stylesheet" href="css/layout.css">
        
        <!-- Colors style -->
        <link rel="stylesheet" href="css/colors.css">
        
        <!-- Retina icons -->
        <link rel="stylesheet" href="css/fontawesome.css">
        
        <!-- Responsive style -->
        <link rel="stylesheet" media="(min-width:0px) and (max-width:760px)"  href="css/mobile.css">
        <link rel="stylesheet" media="(min-width:761px) and (max-width:1080px)" href="css/720.css">
        <link rel="stylesheet" media="(min-width:1081px) and (max-width:1300px)" href="css/960.css">
        <link rel="stylesheet" media="(min-width:1301px)" href="css/1200.css">
        
        <!-- Fonts Google -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
        
        <!-- Fonts library -->
        <link rel="stylesheet" href="css/fonts.css">
        
        <!-- Load jQuery -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
        
        <!-- Load Google map API -->
        <script src="https://maps.googleapis.com/maps/api/js"></script>
        <script>
            var map;
            function initialize() {
              var mapOptions = {
                zoom: 8,
                scrollwheel: false,                
                // Here you type your latitude of place you want show
                // For more info visit:
                // https://developers.google.com/maps/documentation/javascript/tutorial
                //https://developers.google.com/maps/documentation/javascript/reference
                center: new google.maps.LatLng(-34.397, 150.644)
              };
              map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        
        <style>
            #map-canvas { height: 600px }
        </style>

    </head>
    <body>
        
        <!-- Wrapper -->
        <div id="wrapper">
            
            <!-- Header -->
            <header id="header" class="dark" role="banner">
                
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
                
            </header>
            
            <!-- Canvas Google map -->
            <div class="above-the-fold light featured map">
                <div id="map-canvas"></div>
            </div>

            <!-- Page title -->
            <div class="above-the-fold">
                <div class="inner-wrapper">
                    <h2 class="page-title">Contact us</h2>
                </div>
            </div>
            
            <!-- Section -->
            <section id="section">
                <div class="inner-wrapper">
                    
                    <!-- Main -->
                    <div id="main" class="left" role="main">
                        
                        <!-- Form validation -->
                        <?php if(isset($emailSent) && $emailSent): ?>
                            <div class="alert green">Your message has been sent!</div>
                        <?php else: ?>
                        <?php if(isset($hasError) && $hasError): ?>
                            <div class="alert red">Your message has not been sent, please try again!</div>
                        <?php endif; ?>
                        <?php endif; ?>
                            
                        <h4>Send us a message</h4>
                        <p>Nulla dapibus nulla quis orci tempor, et iaculis augue euismod. Vivamus accumsan tempor urna, quis ullamcorper risus faucibus iaculis. Praesent congue ornare hendrerit. Maecenas ultricies vestibulum magna non pellentesque. Fusce commodo enim ac vulputate tempor. Morbi quis nisi eros. Nullam neque eros, mattis in sagittis at, blandit sed libero. Praesent dolor tellus, porta tempor dolor adipiscing, dapibus varius lacus. Aliquam malesuada, nisl vitae interdum dictum, neque nisl hendrerit eros, in porttitor ipsum ante in velit. Suspendisse mattis nunc non scelerisque tincidunt.</p>
                        
                        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="contact-form" method="post">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="form-name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="form-email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Mensagem</label>
                                <textarea name="form-message" placeholder="Message" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-blue">Send a message</button>
                            </div>
                        </form>
                    </div>
                    
                    <!-- Aside -->
                    <aside id="sidebar" role="complementary">
                        
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
                        
                    </aside>                    
                </div>
            </section>
            
            <!-- Footer -->
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
            
        </div>
    
    <!-- Load scripts -->    
    <script src="js/modernizr.min.js"></script>
    <script src="js/easing.min.js"></script>
    <script src="js/stickykit.min.js"></script>
    <script src="js/menu.min.js"></script>
    <script src="js/flexslider.min.js"></script>
    <script src="js/isotope.js"></script>
    <script src="js/fitvids.min.js"></script>
    <script src="js/contact.form.js"></script>
    <script src="js/init.js"></script>
    
    </body>
</html>
