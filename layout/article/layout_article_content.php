<?php
/**
 * Created by PhpStorm.
 * User: zante
 * Date: 15/06/2015
 * Time: 14:02
 */


class layout_article_content extends layout
{

    function __construct()
    {

    }

    public function render()
    {
        ?>
        <article class="single-post">
            <div class="featured">
                <a href="#"><img src="demo/860x450.gif" alt="Post"/></a>
            </div>
            <h1 class="post-title">Among a crowd of political automatons, Nigel Farage is like a wacky neighbour in a sitcom</h1>
            <h3 class="lead">The figures from the Office for National Statistics showed that inflation is once again outpacing wage growth, with the latest available data showing average pay rises of 1.7% in the three months.</h3>
            <div class="post-meta">
                <span class="author">Author <a href="#">John Doe</a></span>
                <span class="date">Published <a href="#">December 13, 2014</a></span>
                <span class="comments">Comments <a href="#">152</a></span>
            </div>
            <div class="post-container">
                <p>Aliquam justo mi, lobortis posuere lacus ut, ultricies feugiat nulla. Nulla vestibulum lacinia sollicitudin. Quisque ultricies semper congue. Aenean nec odio ante. Etiam rutrum hendrerit nulla, et accumsan justo dapibus ac. Duis varius sit amet sapien vitae ultricies. Nulla cursus dolor et justo pulvinar mattis. Vestibulum diam nisl, vulputate vitae blandit tristique, feugiat vitae libero. Etiam in tellus vitae purus posuere vestibulum a sed nunc. Integer ultrices magna nec viverra lobortis. Donec viverra sed elit in tempor. Duis lacus libero, mollis vitae pellentesque a, elementum quis mauris. Nullam non elit sed diam varius convallis et nec felis. Maecenas nec ultrices sapien, ut pretium erat. Curabitur iaculis in quam in vulputate. Fusce non urna purus.</p>
                <blockquote>
                    <p>Vestibulum diam nisl, vulputate vitae blandit tristique, feugiat vitae libero. Etiam in tellus vitae purus posuere vestibulum a sed nunc. Integer ultrices magna nec viverra lobortis. Donec viverra sed elit in tempor. Duis lacus libero, mollis vitae pellentesque a, elementum quis mauris.</p>
                </blockquote>
                <p>Aliquam justo mi, lobortis posuere lacus ut, ultricies feugiat nulla. Nulla vestibulum lacinia sollicitudin. Quisque ultricies semper congue. Aenean nec odio ante. Etiam rutrum hendrerit nulla, et accumsan justo dapibus ac. Duis varius sit amet sapien vitae ultricies. Nulla cursus dolor et justo pulvinar mattis. Vestibulum diam nisl, vulputate vitae blandit tristique, feugiat vitae libero. Etiam in tellus vitae purus posuere vestibulum a sed nunc. Integer ultrices magna nec viverra lobortis. Donec viverra sed elit in tempor. Duis lacus libero, mollis vitae pellentesque a, elementum quis mauris. Nullam non elit sed diam varius convallis et nec felis. Maecenas nec ultrices sapien, ut pretium erat. Curabitur iaculis in quam in vulputate. Fusce non urna purus.</p>
                <h4>Sample code</h4>
<pre>
.class-name {
    display: block;
    position: relative;
    color: #333;
}</pre>
                <p>Nam bibendum ante ipsum, vitae ullamcorper risus accumsan et. Proin at metus elementum justo adipiscing scelerisque eu quis lacus. Nunc eleifend tellus at viverra interdum. Mauris blandit magna non felis fringilla viverra. Pellentesque dui nisi, ultrices id facilisis et, consectetur a orci. Proin viverra massa sed erat pulvinar eleifend. Nullam eleifend tortor at diam facilisis, pharetra pharetra justo sagittis. Nulla quis leo eget nulla cursus porta. Aliquam justo mi, lobortis posuere lacus ut, ultricies feugiat nulla. Nulla vestibulum lacinia sollicitudin. Quisque ultricies semper congue. Aenean nec odio ante. Etiam rutrum hendrerit nulla, et accumsan justo dapibus ac. Duis varius sit amet sapien vitae ultricies. Nulla cursus dolor et justo pulvinar mattis. Vestibulum diam nisl, vulputate vitae blandit tristique, feugiat vitae libero. Etiam in tellus vitae purus posuere vestibulum a sed nunc. Integer ultrices magna nec viverra lobortis. Donec viverra sed elit in tempor. Duis lacus libero, mollis vitae pellentesque a, elementum quis mauris. Nullam non elit sed diam varius convallis et nec felis. Maecenas nec ultrices sapien, ut pretium erat. Curabitur iaculis in quam in vulputate. Fusce non urna purus.</p>
            </div>
            <!-- Post info -->
            <div class="post-info">
                <span class="tags">Tags <a href="#">Design</a>, <a href="#">Code</a>, <a href="#">Html5</a></span>
                <span class="category">Category <a href="#">Sport</a></span>
                <span class="views">Views <a href="#">3526</a></span>
            </div>
            <div class="post-share">
                <span class="share-text">Share this post:</span>
                <ul>
                    <li><a data-tip="Share on Twitter!" href="#" class="twitter"><span class="socicon">a</span></a><p>16</p></li>
                    <li><a data-tip="Share on Facebook!" href="#" class="facebook"><span class="socicon">b</span></a><p>16</p></li>
                    <li><a data-tip="Share on Google+!" href="#" class="google"><span class="socicon">c</span></a><p>16</p></li>
                    <li><a data-tip="Share on Pinterest!" href="#" class="google"><span class="socicon">d</span></a><p>16</p></li>
                    <li><a data-tip="Share on LinkedIn!" href="#" class="linkedin"><span class="socicon">j</span></a><p>16</p></li>
                    <li><a data-tip="Share on Tumblr!" href="#" class="tumblr"><span class="socicon">z</span></a><p>16</p></li>
                </ul>
            </div>
        </article>
        <?php
    }

}