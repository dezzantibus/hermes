<?php

abstract class layout_page extends layout
{

    protected $title;

    protected $description;

    /** @var  data_article */
    protected $article;

    protected function renderTop()
    {

        echo
        '<!DOCTYPE html>',
        '<html lang="sq">',
        '<head>',

            //<!-- Site title -->
            '<title>', $this->title, '</title>',

            //<!-- Favicons -->
            '<link rel="shortcut icon" href="/images/logo/', constant::$text['site'], '-favico.png">',
            '<link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">',
            '<link rel="apple-touch-icon-precomposed" sizes="72x72" href="apple-touch-icon-72x72-precomposed.png">',
            '<link rel="apple-touch-icon-precomposed" sizes="114x114" href="apple-touch-icon-114x114-precomposed.png">',
            '<link rel="apple-touch-icon-precomposed" sizes="144x144" href="apple-touch-icon-144x144-precomposed.png">',

            //<!-- Meta tags -->
            '<meta charset="UTF-8">',
            '<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">',
            '<meta name="description" content="', $this->description, '">',
            constant::$text['webmaster tools'];

            if( $this instanceof layout_article_page && !empty( constant::$text['twitter'] ) )
            {
                echo
                '<meta name="twitter:card" content="summary_large_image">',
                '<meta name="twitter:site" content="', constant::$text['twitter'], '">',
                '<meta name="twitter:title" content="', substr( $this->article->title, 0, 70 ), '">',
                '<meta name="twitter:description" content="', substr( $this->article->title, 0, 200 ), '">',
                '<meta name="twitter:image" content="http://athena.news/860/450', $this->article->image_1, '">';
            }

            echo
            //<!-- Normalize -->
            '<link rel="stylesheet" href="/css/normalize.css">',

            //<!-- Main style -->
            '<link rel="stylesheet" href="/css/style.css">',

            //<!-- Layout style -->
            '<link rel="stylesheet" href="/css/layout.css">',

            //<!-- Colors style -->
            '<link rel="stylesheet" href="/css/colors.css">',

            //<!-- Retina icons -->
            '<link rel="stylesheet" href="/css/fontawesome.css">',

            //<!-- Responsive style -->
            '<link rel="stylesheet" media="(min-width:0px) and (max-width:760px)"  href="/css/mobile.css">',
            '<link rel="stylesheet" media="(min-width:761px) and (max-width:1080px)" href="/css/720.css">',
            '<link rel="stylesheet" media="(min-width:1081px) and (max-width:1300px)" href="/css/960.css">',
            '<link rel="stylesheet" media="(min-width:1301px)" href="/css/1200.css">',

            //<!-- Fonts Google -->
            "<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>",
            "<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>",

            //<!-- Fonts library -->
            '<link rel="stylesheet" href="/css/fonts.css">',

            //<!-- Load jQuery -->
            '<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>',
            '<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>',

            '<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>',

            '<link rel="stylesheet" href="/css/mine.css">',

            '<link rel="stylesheet" href="/css/', constant::$text['site'], '.css">',

        '</head>',
        '<body>',

            '<div id="wrapper">';



    }

    protected function renderBottom()
    {

                echo
                '</div>',

            //<!-- Load scripts -->
            '<script src="/js/modernizr.min.js"></script>',
            '<script src="/js/easing.min.js"></script>',
            '<script src="/js/stickykit.min.js"></script>',
            '<script src="/js/flexslider.min.js"></script>',
            '<script src="/js/isotope.js"></script>',
            '<script src="/js/fitvids.min.js"></script>',
            '<script src="/js/contact.form.js"></script>',
            '<script src="/js/init.js"></script>';

            switch( constant::$text['site'] )
            {
                case 'athena':
                    echo '<script>',

                        "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){",
                        '(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),',
                        'm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)',
                        "})(window,document,'script','//www.google-analytics.com/analytics.js','ga');",

                        "ga('create', 'UA-15643626-12', 'auto');",
                        "ga('send', 'pageview');",

                    '</script>';
                    break;

                case 'hermes':
                    echo '<script>',

                        "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){",
                        '(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),',
                        'm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)',
                        "})(window,document,'script','//www.google-analytics.com/analytics.js','ga');",

                        "ga('create', 'UA-15643626-13', 'auto');",
                        "ga('send', 'pageview');",

                        "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){",
                        '(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),',
                        'm=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)',
                        "})(window,document,'script','//www.google-analytics.com/analytics.js','ga');",

                        "ga('create', 'UA-67247006-1', 'auto');",
                        "ga('send', 'pageview');",

                    '</script>';
                    break;

            }

        echo
        '</body>',
        '</html>';

    }

}